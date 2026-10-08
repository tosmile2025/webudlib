<?php 
include('../connectdata/cnectDB.php');
	date_default_timezone_set("Asia/Bangkok");
	$idbk= $_POST['iptValIDBook'];
	$datNow = date("Y-m-d");
	//echo $datNow;
	/*$idbk = array(
				"211998",
				"110177"
			);*/
	
	
if(isset($idbk))
				{
					
	for($i = 0; $i < count($idbk); $i++)
		{
							
		$set['idbk'] = $idbk[$i];
		$set['idu'] = $_POST['iptValIDU'];
		$set['stRenew'] = 1;
		$arr[] = $set;
		}
	//echo"<pre>";
	//print_r($arr);
	
	foreach($arr as $land => $data)
    	  {
			$user = mysqli_query($con, 'select * from user_tb where IDUSERCODE = "'.$data['idu'].'"');
			$qry = mysqli_fetch_assoc($user);
			$class_query = $qry['RangClass'];
			//echo $class_query;
			
			$data_2 = mysqli_query($con, 'select * from orderbook_tb as d1 inner join user_tb as d2 on 
								(d1.IDuser_order = d2.IDUSERCODE) where IDbook_order = "'.$data['idbk'].'" 
								and Active_order = 1 
								and Order_book = (select min(Order_book) from orderbook_tb
								where IDbook_order = "'.$data['idbk'].'" and Active_order = 1 )');
												
							$query = mysqli_num_rows($data_2);
							$result_or = mysqli_fetch_array($data_2);
							/*$out[] = $query;*/
							
								if($query == "0")
									{
										
										/*echo $result['ID_ex_barcodebook']. "ต่อหนังสือได้//";*/
										$status_ex = '0';
										$data_dtail[] = $status_ex;
										$data_dtail[] = $data['idu'];
										$data_dtail[] = $data['idbk'];
										$data_dtail[] = $class_query;
										$data_dtail[] = $result['Limit_book'];
										$data_dtail[] = $result['Count_day']+1;
										$data_dtail[] = $datNow;										
										if(strtotime($result['Day_end']) < strtotime($datNow)){
											//echo $result['Day_end']."น้อยกว่าเวลาปัจจุบัน";
											$data_dtail[]  = $datNow;
											//echo $data_dtail[6];
											}else{
												//echo $result['Day_end']."มากกว่าเวลาปัจจุบัน";
												$data_dtail[]  = $datNow;
												//echo $data_dtail[6];
												}
										
										
										/*return test_function($iptvalIDU, $iptvalIDBook, $iptClass, $CountreNewBook, $lastDayExbook);*/
											
										}
										
								else if($query == "1")
									{
										/*echo $result['ID_ex_barcodebook'].$result_or['FNAME']."ยืมไม่ได้";*/
										
										$status_ex_or = '1';
										$data_dtail[] = $status_ex_or;
										$data_dtail[] = $data['idu'];
										$data_dtail[] = $data['idbk'];
										$data_dtail[] = $class_query;
										$data_dtail[] = $result_or['IDbook_order'].". ". "ติดจองโดย "."  ".$result_or['FNAME']." ".$result_or['LNAME']." "."ครบกำหนด(".$result_or['order_day'].")";
										$data_dtail[] = $result['Count_day']+1;
										$data_dtail[]  = $result['Day_end'];
										$data_dtail[] = $datNow;
										}
										
		  }
		  
		
		$arr_ar =	array_chunk($data_dtail,8,false);
		//echo"<pre>";
		//print_r($arr_ar);
				/*$arr_chunkor =	array_chunk($data_set,2,false);*/
				/* print_r($arr_fchunkor_detail);*/
		//echo json_encode($arr_fchunkor_detail);
	My_Connect_function_ifReNewbook($arr_ar);
	//echo"<pre>";			
	//print_r($arr_ar);
		
	}

		
	//----------------------------------------------------------สำการรีนิ้วหนังสือโดยการดึงวันที่จากตารางยืมมาบวกเพิ่ม------------------------------------------------------		
function My_Connect_function_ifReNewbook($arr_ar){
	include('../connectdata/cnectDB.php');
	/*echo $iptValIDBook;*/
	/*echo $iptValIDU;*/
	//print_r($arr_ar);
	//echo $iptClass;
	//echo $arr_ar[7];
	//echo"<pre>";
	//print_r($arr_ar);
	$a = array();
		foreach($arr_ar as $xt){		
			
	$sqli = mysqli_query($con, "select * from book_store_tb as d1 inner join  regis_books_tb as d2 on 
											(d1.IDLIKBOOK = d2.IDLIKBOOK) where BARCODE = '".$xt[2]."'");
	$result = mysqli_fetch_assoc($sqli);
	//echo $result['GMDCODE'];
	$GMD =  $result['GMDCODE'];
			$set_day7 = array('FI','CD','PK','80','GP','VI','TH');
			$set_dayNO = array('R','JT','JE','JO'); //ยืมไม่ได้และต้องเด้งปอบอัพให้ยืมได้และกำหนดวันคืน
			//$day7 = "7"; // แทนค่า จำนวนวันที่ยืม
			$chk_1 = $GMD ;  //"FI";	//รับค่า ajx แทนค่าหนังสือที่   (ยืมได้ 7 วัน) - (ยืมได้กี่วัน 3 วัน) - (เด้งป๊อบอัพให้ยืมได้และกำหนดวันคืน) - 
			
			if(in_array($chk_1,$set_day7) && $xt[3] <= "9")  //ยืมได้ 7 วัน
					{
						//echo "ประเภทสื่อ FI','CD','PK','80','GP','VI','TH ทุกคนยืมได้ 7 วัน///";										
						/*echo "เท่ากับ F ยืมได้ 7 วัน";*/
						$datDay = "7";
						$xt[] = '7';
						array_push($a, $xt);
							//DateTimeRenew($datDay, $xt);
						}
						else if($chk_1 == "TE" && $xt[3] <= "7")
						{
							//echo "ประเภทสื่อ TE ระดับต่ำ <=7 ยืมได้ 7 วัน";
							$datDay = "7";
							$xt[] = '7';
							array_push($a, $xt);
							//DateTimeRenew($datDay, $xt);
						}
						else if($chk_1== "TE" && $xt[3] == "8")
						{
							/*echo "ประเภทสื่อ textbook TE ตำแหน่งอาจารย์หมอได้ 14 วัน";*/
							$datDay = "14";	
							$xt[] = "14";
							/*echo $valMy[2];*/
							//DateTimeRenew($datDay, $xt);
							array_push($a, $xt);
						}
						else if($chk_1== "MZ" && $xt[3] <= "8")
						{
							/*echo "ประเภทสื่อ MZ ทุกคนยืมได้ 3 วัน";*/
							$datDay = "3";
							$xt[] = "3";
							//DateTimeRenew($datDay, $xt);
							array_push($a, $xt);
						}
						else if(in_array($chk_1,$set_dayNO)) //ยืมไม่ได้และต้องเด้งปอบอัพให้ยืมได้และกำหนดวันคืน               /// เงื่อนไขที่ต้องทำ  2
						{
							/*echo "ประเภทสื่อ elseif setdayNO และ ปอปอัพถามว่าให้ยืมหรือไม่ให้พร้อมกำหนดวันคืนเอง";*/
							/*echo $chk_1;*/
							$not_fix = "NO";
						}
					//	echo "<pre>";
				//	print_r($xt);
		}
		/*echo "<pre>";
		print_r($a);*/
			///else if if($_POST['class_Position']<= 7)
	//}//if(isset($_POST['IDUSERCODE']))
		
	//return DateTimeRenew($datDay, $xt);
	DateTimeRenew($a);
	}
//------------------------------------------------------------------------ดึงข้อมูลวันที่จากตารางยืมมาเพื่อบวกวันที่เพ่ิมในการ รีนิวหนังสือ หรือ ต่อหนังสือ----------------------------------------	
	
			
function DateTimeRenew($a)
		{
		
			//echo "<pre>";
			//print_r($a);
			/*echo $valMy[6];*/
		foreach($a as $xt){
			//print_r($xt[7]);
			//$datDay = $xt[7];	
			//echo $xt[7];
			$thenDay = date("Y-m-d",strtotime("+ 30 day"));
			$date = date_create($xt[7]);
					date_modify($date, '+ '.$xt[8].' day');
					$Lday =  date_format($date, 'Y-m-d');
					
			//chk_DateTime($Lday, $thenDay, $valMy, $arr_jsZero);	
					/*echo $set ;*/
					//echo"<pre>";
					//echo $Lday;
					$ab['str'] = $xt[0];
					$ab['idu'] = $xt[1];
					$ab['idbk'] = $xt[2];
					$ab['class'] = $xt[3];
					$ab['orderdtail'] = $xt[4];
					$ab['countor'] = $xt[5];
					$ab['dayex'] = $xt[6];
					$ab['daynow'] = $xt[7];
					$ab['fixday'] = $xt[8];
					$ab['lastday'] = $Lday;
					$ab['thenDay'] = $thenDay;
					$ar_fixday[] = $ab;
					
				}
					// echo "<pre>";
					// print_r($ar_fixday);
					//chk_DateTime($xt);
	
	chk_DateTime($ar_fixday);
	}
	
//------------------------------------ฟังก์ชั่นเช็คว่าตรงกับวันหยุดหรือไม่----------------------------------------------------------------------------
		
function chk_DateTime($ar_fixday){		
		include('../connectdata/cnectDB.php');
		$x= array();
		//echo "<pre>";
		//print_r($ar_fixday);
		//echo $Lday;
		//echo $thenDay;
		/*echo $valMy[2];*/
	foreach($ar_fixday as $keyone => $data){
					
		$sqli = mysqli_query($con,"select * from datpicker_tb where datpicker = '".$data['lastday']."'");
		$result_row = mysqli_num_rows($sqli);
		//echo json_encode($result_row);
		// echo $result_row;		
		if($result_row == 0)
			{
				/*echo $sum_num."ไม่มีค่า อินเซิร์ดข้อมูลได้";*/  
				$data['strholliday'] = "0";				
				array_push($x, $data); 
				  //echo json_encode($Lday);                                                                       /// เงือนไขการ insert ข้อมูล
				}else // else $result_row == 0
					{
						//echo $key;
						//echo $data['idbk'];
						$Lday = $data['lastday'];
						$sqli_picker = mysqli_query($con,"select * from datpicker_tb 
															where datpicker between '".$data['lastday']."' and '".$data['thenDay']."'");
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
									//print_r($value);
										if($value==1)
											{
												array_push($output_array, $key);
										}
									}
					// print_r($output_array); 
					$detLine_Day[] = $output_array[0];
					//echo "มีค่าเท่ากับ ให้บวกวันเพิ่มเป็น==>";
					//echo"<pre>";
					//echo $detLine_Day;
					$txt = $detLine_Day;
					$data['strholliday'] = "1";				
					array_push($x, $data); 
				//Update_tb_exportbook($Lday, $thenDay, $detLine_Day, $valMy, $arr_jsZero);
			
			}// end else if $result_row == 0 
	/*echo $detLine_Day; *//// แสดงค่าวันที่ ที่คำนวนเงื่อนไขวันหยุดที่กำหนดในตาราง datpicker
		}
		
		$datefix =  $detLine_Day[0];
		// echo "<pre>";
		// print_r($x);
		Update_tb_exportbookTwo($x, $datefix);
	}// funtion
	
	
	/*------------------------------------------ฟังก์ชั่น---insert ข้อมูลผ่านไม่ผ่านการบวกเพิ่มวันหยุดแล้ว-------------------------------------------------------*/	
function Update_tb_exportbookTwo($x, $datefix)
						{
							include('../connectdata/cnectDB.php');
							date_default_timezone_set("Asia/Bangkok");
							$nowDay = date("Y-m-d");
							//echo"<pre>";
							//print_r($x);
							//echo $datefix;
							/*$ab['str'] = $xt[0];
							$ab['idu'] = $xt[1];
							$ab['ibk'] = $xt[2];
							$ab['class'] = $xt[3];
							$ab['orderdtail'] = $xt[4];
							$ab['countor'] = $xt[5];
							$ab['dayex'] = $xt[6];
							$ab['daynow'] = $xt[7];
							$ab['fixday'] = $xt[8];
							$ab['lastday'] = $Lday;
							$ab['thenDay'] = $thenDay;
							$ar_fixday[] = $ab;
							$data['strholliday'] = "1";*/							
							foreach($x as $fulldata){								
								//echo"<pre>";
								//echo $fulldata['ibk'];
								if($fulldata['strholliday']== "0"){///เช็ควันหยุด
										//echo"ไม่มีวันหยุด";
										if($fulldata['str']== "0"){ //เช็คจอง
											//echo $fulldata['idbk'];
											//echo"ไม่มีจอง";
											$updat_sqli = mysqli_query($con, "update exportbook_tb set Day_end = '".$fulldata['lastday']."',
														Count_day = '".$fulldata['countor']."'
														where IDuser_exbook = '".$fulldata['idu']."' and ID_ex_barcodebook = '".$fulldata['idbk']."' 
														and Active_book = 1");
										}else{
											$xfile[] = $fulldata;
											}																			
									}else{///เช็ควันหยุด	
									//echo $datefix;																			
									//echo "มีวันหยุด";
										//print_r($detLine_Day);
										if($fulldata['str']== "0"){//เช็คมีคนจอง
											//echo"ไม่มีจอง";
											//echo"<pre>";
											//echo $datefix;
											//echo $fulldata['strholliday']."//".$fulldata['idbk'].$datefix;
										$updat_sqli = mysqli_query($con, "update exportbook_tb set Day_end = '".$datefix."',
														Count_day = '".$fulldata['countor']."'
														where IDuser_exbook = '".$fulldata['idu']."' and ID_ex_barcodebook = '".$fulldata['idbk']."' 
														and Active_book = 1");
											}else{
												//echo"มีคนจอง";
												$xfile[] = $fulldata;
												}
										}
								
							}
							
					
						
			//  echo "<pre>";
			//  print_r($x);	
				// echo json_encode($xfile);	
				 func_insert_TB_countRenewbk($x, $con, $xfile);
						
	}
							
	function  func_insert_TB_countRenewbk($x, $con, $xfile){// จัดเก็บข้อมูลการต่อหนังสือลงได้ฐานข้อมูลเพื่อทำรายงาน	
		date_default_timezone_set("Asia/Bangkok");
		$datetime = date("Y-m-d H:i:s");
		$nowday = date("Y-m-d");
		// echo $datetime;
		foreach($x as $val){
			// echo "<pre>";
			//   echo $val['idbk'];
			$slc_check = mysqli_query($con, "select * from tb_countrenewbk where IDBK_re = '".$val['idbk']."' and date_format(Day_re, '%Y-%m-%d') = '".$nowday."'");
			// $slc_check = mysqli_query($con, 'select * from tb_countrenewbk where IDBK_re ="'.$val['idbk'].'" and date_format(Day_re, "%Y-%m-%d") = 2023');		
		$row = mysqli_num_rows($slc_check);	
	// echo $row;
			if($row == 0) {
				$str = '("'.$val['idu'].'","'.$val['idbk'].'","'.$datetime.'")';	
				$insert = mysqli_query($con, "insert into tb_countrenewbk(userID_re,IDBK_re,Day_re)
				values$str");
			}
		}
		echo json_encode($xfile);	
			// echo("Error description: " . mysqli_error($con));
			// echo "<pre>";
			// echo "errorinsert 'func_insert_TB_countRenewbk'";
	
			// echo "successfully";
		
		
		
	}							
?>















































