<?php 


	include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");	
	 		
//$_POST['iptValIDU'] = "02125";
//$_POST['iptValIDBook'] = "211792";
//$_POST['iptValIDBook'] = "F08081";

if(isset($_POST['iptValIDU']))
	{
		$idBook = $_POST['iptValIDBook'];
		$iduser = $_POST['iptValIDU'];	
			$sqli_order = mysqli_query($con, 'select * from orderbook_tb 
								where Order_book = (select max(Order_book) from orderbook_tb
									where IDbook_order = "'.$idBook.'" and Active_order = 1) 
									and IDbook_order = "'.$idBook.'" and Active_order = 1');
			$result = mysqli_fetch_assoc($sqli_order);
			
				$numberOrder  =  $result['Order_book'];
				$dayOrder	 =  $result['order_day'];
				$iduser_Order	 =  $result['IDuser_order'];
				//echo count($numberOrder);
				if($numberOrder != ""){// if 1 ตรวจสอบหาค่าการจองหนังสือ
					//echo "ตรวจหาคนจอง มี//";				
					if($iduser_Order == $iduser){
					 	//echo "กรณี ไอดีคนจอง กับคนที่จองไปแล้วซ้ำกัน//";
							exit();
							}else{
							$nums =  $result['Order_book'];
							$numberOrder = $nums+1;
							
							$str_order = "1";						
						 Func_exportBooks($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order);
						}
					}else{
						//echo"ตรวจหาคนจอง ไม่มี//";
							$numberOrder  =  "1";
							$str_order = "0";
							Func_exportBooks($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order);
						}					
								
		
	}
	
/////---------------------ตรวจหาคนยืมหนังสือ	
function Func_exportBooks($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order){
	$datNow_fix = date("Y-m-d");	
		$sqli_exbooks = mysqli_query($con, "select * from exportbook_tb 
								where ID_ex_barcodebook = '".$idBook."' and Active_book = 1 ");
			$result = mysqli_fetch_assoc($sqli_exbooks);
			$exbooks_day = $result['Day_end'];
		 	//echo count($exbooks_day);
			//echo $idBook;
			//echo $exbooks_day;
		if($exbooks_day != ""){
			//echo"ตรวจหายืมหนังสือ: มี//";
			$str_exbook = "1";
			if($str_order == "1"){//ถ้ามีคนจอง
				//echo "มีจอง//";				
				Func_fix_Holiday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order, $str_exbook);
				}else{
					//echo "ไม่มีคนจอง";
					$str_exbook = "0";
					//$dayOrder = $result['Day_end'];
					//echo $dayOrder;
					if(strtotime($dayOrder) <= strtotime($datNow_fix)){
						//echo "น้อยกว่า";
						$dayOrder = $datNow_fix;
						Func_fix_Holiday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order, $str_exbook);
						}else{
							$dayOrder = $result['Day_end'];
								Func_fix_Holiday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order, $str_exbook);
							}
						
				}
		
			}else{
				//echo"ตรวจหาผู้ยืมหนังสือ: ไม่มี//";
				$strx[] = "";
				echo json_encode($strx);
				//Func_Holliday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order);
				}						
	}
/////---------------------ฟังก์ชั่น คำนวนหาวันหยุดและบวกเพิ่มวันจองหนังสือ
function Func_Holliday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order){
	
	if($str_order == "0"){ // str_order  ค่าสเตตัส คนจองเท่ากับ 0ไม่มี
			$runNumBer = "1";
			$Lday = date("Y-m-d",strtotime("+ 7 day"));
		}else{
			
		$Ymd = date('Y-m-d',strtotime($dayOrder. "+7 day"));
		$runNumBer = $numberOrder;
		$Lday = $Ymd;
		}
	//echo $Lday;
	$thenDay = date("Y-m-d",strtotime("+ 60 day"));
	$sqli = mysqli_query($con,"select * from datpicker_tb where datpicker = '".$Lday."'");
	$result_row = mysqli_num_rows($sqli);
	//echo $result_row;
	if($result_row >0){
		$sqli_picker = mysqli_query($con,"select * from datpicker_tb 
										where datpicker between '".$Lday."' and '".$thenDay."'");
						$result_num = mysqli_num_rows($sqli_picker);
							while($arr = mysqli_fetch_array($sqli_picker))
									{
										$arr_picker[] = $arr['datpicker'];
									}
									/*print_r($arr_picker);*/
							foreach($arr_picker as $valdata)
									{
										while (strtotime($Lday) <= strtotime($valdata)) 
											{										
												$Lday = date ("Y-m-d", strtotime("+1 day", strtotime($Lday)));
												/*print_r($Lday);*/
												$set_arr[] = $Lday;
												
												/*print_r($arr_picker);*/
												}
									}
										/*print_r($set_arr);*/
										/*print_r($arr_picker);*/
										$full_arr = array_merge($set_arr,$arr_picker);
										/*print_r($full_arr);
										if($coUnt = count($full_arr))
											{
												echo $coUnt;
												}
										*/
       								 $output_array = array();
									/*print_r($full_arr);*/
       						 foreach (array_count_values($full_arr)as $key => $value)
							 		 {
									/*print_r($key);*/
									/*print_r($value);*/
										if($value==1)
											{
												array_push($output_array, $key);
										}
									}
								
			$detLine_Day = $output_array[0];			
			$arr_return = array($runNumBer, $detLine_Day);
			//echo "<pre>";
			//print_r($arr_return);			
			echo json_encode($arr_return);
			
		}else{			
		$arr_return = array($runNumBer, $Lday);
		echo json_encode($arr_return);
		}


	}
function Func_fix_Holiday($con, $numberOrder, $dayOrder, $idBook, $iduser, $str_order, $str_exbook){
		//print_r($str_exbook);
	//echo $str_exbook;		
	if($str_order == "1" && $str_exbook == "1"){//มีคนยืมและมีคนจองเอาวันที่ครบจองมาบวกเพิ่ม
		$Ymd = date('Y-m-d',strtotime($dayOrder. "+7 day"));
		$runNumBer = $numberOrder;
		$Lday = $Ymd;
	//echo "ทดสอบ";	
			}else if($str_order == "0" && $str_exbook == "1"){//ไม่มีคนจองแต่มีคนยืม เอาวันที่ยืมมาบวก
			$Ymd = date('Y-m-d',strtotime($dayOrder. "+7 day"));
			$runNumBer = $numberOrder;
			$Lday = $Ymd;
		//echo "ทดสอบ";	
			}else if(
			$str_order == "0" && $str_exbook == "0"){//ไม่มีคนจองแต่มีคนยืม เอาวันที่ยืมมาบวก
			$Ymd = date('Y-m-d',strtotime($dayOrder. "+7 day"));
			$runNumBer = $numberOrder;
			$Lday = $Ymd;
			//echo $Lday;
			}
			//echo $Lday;
	$thenDay = date("Y-m-d",strtotime("+ 60 day"));
	$sqli = mysqli_query($con,"select * from datpicker_tb where datpicker = '".$Lday."'");
	$result_row = mysqli_num_rows($sqli);
	//echo $result_row;
	if($result_row >0){
		$sqli_picker = mysqli_query($con,"select * from datpicker_tb 
										where datpicker between '".$Lday."' and '".$thenDay."'");
						$result_num = mysqli_num_rows($sqli_picker);
							while($arr = mysqli_fetch_array($sqli_picker))
									{
										$arr_picker[] = $arr['datpicker'];
									}
									/*print_r($arr_picker);*/
							foreach($arr_picker as $valdata)
									{
										while (strtotime($Lday) <= strtotime($valdata)) 
											{										
												$Lday = date ("Y-m-d", strtotime("+1 day", strtotime($Lday)));
												/*print_r($Lday);*/
												$set_arr[] = $Lday;
												
												/*print_r($arr_picker);*/
												}
									}
										/*print_r($set_arr);*/
										/*print_r($arr_picker);*/
										$full_arr = array_merge($set_arr,$arr_picker);
										/*print_r($full_arr);
										if($coUnt = count($full_arr))
											{
												echo $coUnt;
												}
										*/
       								 $output_array = array();
									/*print_r($full_arr);*/
       						 foreach (array_count_values($full_arr)as $key => $value)
							 		 {
									/*print_r($key);*/
									/*print_r($value);*/
										if($value==1)
											{
												array_push($output_array, $key);
										}
									}
			
			$detLine_Day = $output_array[0];			
			$arr_return = array($numberOrder, $detLine_Day);
			//echo "<pre>";
			echo json_encode($arr_return);
			
		}else{
		//echo $Lday;			
		$arr_return = array($numberOrder, $Lday);
		echo json_encode($arr_return);
		}
	
	}	



?>