<?php 
include('../connectdata/cnectDB.php');
	date_default_timezone_set("Asia/Bangkok");
	
	// $_POST['iptValIDU'] = '1234';
		$datNow = date("Y-m-d");
		$bath_fix = 5;
		$sum = 0;
		$sumto = 0;
		$sum_cash = 0;
		$nowday = date('Y-m-d');
	//echo $datNow;
	/*$idbk = array(
				"211998",				
				"110177"
			);*/
if(isset($_POST['iptValIDU'])){
	// $idbk= $_POST['iptValIDBook'];
for($i = 0; $i < count($idbk); $i++)
		{
							
		$set_fines['idbk'] = $idbk[$i];
		$set_fines['idu'] = $_POST['iptValIDU'];
		$set_fines['stRenew'] = 1;
		$arr_fines[] = $set_fines;
		}
		
foreach($arr_fines as $val){
	/*echo"<pre>";
	print_r($val);*/
	$sqliuser = mysqli_query($con, 'select * from exportbook_tb where ID_ex_barcodebook = "'.$val['idbk'].'" and Active_book = 1 ');
	while($result = mysqli_fetch_array($sqliuser)){
			
			if($result['IDuser_exbook']!= ""){				
				if(strtotime($result['daynow']) >= strtotime($nowday)){
					// echo "daynow มากกว่าเท่ากับวันปัจจุบัน<br>";					
					}else if(strtotime($result['daynow']) < strtotime($nowday)){
						// echo "daynow น้อยกว่าเท่ากับ วันปัจจุบัน".$result['Day_end']."<br>";
						if(strtotime($result['Day_end']) >= strtotime($nowday)){
							// echo "dayend มากว่าเท่ากับ วันปัจจุบัน-1<br>";						
							/*$updateDay = mysqli_query($con, "update exportbook_tb set daynow = '".$nowday."' 
											where ID_ex_barcodebook = '".$result['ID_ex_barcodebook']."' and Active_book = 1");*/
								}else if(strtotime($result['Day_end']) < strtotime($nowday)){
									//echo "dayend น้อยกว่าวันปัจจุบัน-2<br>";
										$updateDay = mysqli_query($con, "update exportbook_tb set Active_fines = 1, daynow = '".$nowday."' 
												where ID_ex_barcodebook = '".$result['ID_ex_barcodebook']."' and Active_book = 1");
									// $dayend = $result['Day_end'];
									$idbk_check['idbk'] = $result['ID_ex_barcodebook'];
									$idbk_check['idu'] = $val['idu'];
									$arr_check[] = $idbk_check;
									$str_up = "2";
									//echo "sste";
								}											
						}else{
							//echo "daynow ค่าว่าง<br>";
							
							}
				}else{
					//echo "test";
					}
		}
	}
	//echo $str;
	//echo $str_up;	
		if($str_up != ''){
			//echo "test2";
			$strcash = "2";
			 Fucn_ChkRatDay($con, $bath_fix, $sum, $sum_cash, $nowday, $strcash, $arr_check, $arr_fines);			
			}else{
				mysqli_close($con);
				}
		}

function Fucn_ChkRatDay($con, $bath_fix, $sum, $sum_cash, $nowday, $strcash, $arr_check, $arr_fines){
	//echo $nowday;
	/*echo "<pre>";
	print_r($arr_check);*/
	foreach($arr_check as $value){			
			$sqli_exbook = mysqli_query($con, 'select * from exportbook_tb
									where datediff(Day_end, "'.$nowday.'") < 0
									and IDuser_exbook = "'.$value['idu'].'"
									and ID_ex_barcodebook = "'.$value['idbk'].'"
									and Active_fines = 1');
			$result_row = mysqli_num_rows($sqli_exbook);
			$result_bk = mysqli_fetch_array($sqli_exbook);
			//echo $result_row;	
			//echo $result_bk['Day_end'];			
			$fixdaysqli = mysqli_query($con, 'select * from datpicker_tb
										where datpicker between "'.$result_bk['Day_end'].'" and "'.$nowday.'"');
			$num_ber = mysqli_num_rows($fixdaysqli);										
								if($num_ber >0){
									$return_date = $result_bk['Day_end'];
									//echo $return_date;
										$time_today = strtotime($nowday);
											$time_returnday = strtotime($return_date);
											$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 ) - $num_ber;
											$finesFix = ceil($dayCount) * $bath_fix;
										$input['finesbath']		   = $finesFix ;
										$input['fines_daycount'] 	  = $dayCount;
										$input['idbk'] 				= $result_bk['ID_ex_barcodebook'];
										$input['iduser']			  = $result_bk['IDuser_exbook'];//-------------------------------idu
										$input['day_start']		   = $result_bk['Day_start'];
										$input['dayend']			  = $return_date;
										
										$input['daynow']			  = $nowday;
											
										$arr_set[] = $input;								
									
									}else{
										$return_date = $result_bk['Day_end'];
									//echo $return_date;
										$time_today = strtotime($nowday);
											$time_returnday = strtotime($return_date);
											$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 );
											$finesFix = ceil($dayCount) * $bath_fix;
										$input['finesbath']		   = $finesFix ;
										$input['fines_daycount'] 	  = $dayCount;
										$input['idbk'] 				= $result_bk['ID_ex_barcodebook'];
										$input['iduser']			  = $result_bk['IDuser_exbook'];//-------------------------------idu
										$input['day_start']		   = $result_bk['Day_start'];
										$input['dayend']			  = $return_date;
										$input['daynow']			  = $nowday;
										$arr_set[] = $input;
										}	
									
			}
		
		// echo"<pre>";
		// print_r($arr_set);
		if($strcash == 1){
			//echo "ไม่มีค่าปรับ";
			}else if($strcash == 2){
				//echo "myfunction_Cash";			
				myfunction_Cash($arr_set, $con);
				}					
	}

function myfunction_Cash($arr_set, $con)// ฟังก์ชั่น มีค่าปรับ และ มีเงินค้างชำระ
		{
		//echo count($arr_set);		
		foreach($arr_set as $key => $val_cash)
				{				
					$sqli_ex = mysqli_query($con, 'select * from fines_tb
													where iduser_fines = "'.$val_cash['iduser'].'"
													and idbk_fines = "'.$val_cash['idbk'].'"												
													and Active_fines = 1');
					$numrow = mysqli_num_rows($sqli_ex);										
				//echo $numrow;
				if($numrow > 0){													
					while($result = mysqli_fetch_array($sqli_ex)){
						//echo $result['idbk_fines']."tst";														
								if(strtotime($result['daynow_fines']) >= strtotime($val_cash['daynow'])){
									//echo $result['daynow_fines'];							
									//echo "ไม่ต้องอัดเดต";
									//$str = 1;
										if(strtotime($result['fines_dayend']) >= strtotime($val_cash['daynow'])){
											//echo "ไม่ต้องอัดเดต";
											}else if(strtotime($result['fines_dayend']) < strtotime($val_cash['daynow'])){
												//echo "update.1";
												//$str[0] = 1;
												$cashupdet_dn_ar[] =  $val_cash;			
												//updateDataFines_tb($arr_set, $con);
												}
									}else if(strtotime($result['daynow_fines']) < strtotime($val_cash['daynow'])){
										//echo "update";
										//$str[0] = 1;
										$cashupdet_dw_ar[] =  $val_cash;
									}
							}
					}else// $numrow >0;
							{
						//echo "insert";
						//$str[1] = 2;
						/*echo"<pre>";
						print_r($val_cash);*/
						$cash_ar[] =  $val_cash;						
					}
				}
				
				/*echo"<pre>";
				print_r($str);*/
				if($cash_ar != ""){
					//echo "update-tble";
					//echo $cash_ar."cashinsert||";
					insertDataFines_tb($cash_ar, $con);
				}else if($cashupdet_dn_ar != ""){
					//echo $cashupdet_dn_ar."$cashupdet_dn_ar||";
					//echo "insert-tble";
					//insertDataFines_tb($arr_set, $con);
					updateDataFines_dn_tb($cashupdet_dn_ar, $con);
					}else if($cashupdet_dw_ar != ""){
						//echo $cashupdet_dw_ar."$cashupdet_dw_ar||";
						updateDataFines_tb($cashupdet_dw_ar, $con);
						}else{
							echo"2";
							}
					
 }
function updateDataFines_tb($cashupdet_dw_ar, $con){
		//echo json_encode($val_if);
		/*print_r($val_cash);*/
		/*echo $val_cash['idu'];*/
		/*echo"<pre>";
		print_r($arr_set);*/		
		$nowdate = date("Y-m-d");
		foreach($cashupdet_dw_ar as $key_update => $val_up)
			{
				
				$update_ftb = mysqli_query($con, "update fines_tb set countday = '".$val_up['fines_daycount']."',
										cash_book = '".$val_up['finesbath']."',
										fines_dayin = '".$nowdate."', daynow_fines = '".$nowdate."'
										where iduser_fines = '".$val_up['iduser']."' and idbk_fines = '".$val_up['idbk']."'
										and day_start = '".$val_up['day_start']."' and Active_fines = 1");
										//$results = mysqli_query($con,$update_ftb) or die ("Error in query: $update_ftb " . mysqli_error());
				
			}
			//echo "<pre>";
		//print_r($val_if);
		//echo json_encode($val_if);
		echo "1";	
		}
function updateDataFines_dn_tb($cashupdet_dn_ar, $con){
		//echo json_encode($val_if);
		/*print_r($val_cash);*/
		/*echo $val_cash['idu'];*/
		/*echo"<pre>";
		print_r($arr_set);*/		
		$nowdate = date("Y-m-d");
		foreach($cashupdet_dn_ar as $key_update => $val_up)
			{
				
				$update_ftb = mysqli_query($con, "update fines_tb set countday = '".$val_up['fines_daycount']."',
										cash_book = '".$val_up['finesbath']."',
										fines_dayin = '".$nowdate."', daynow_fines = '".$nowdate."'
										where iduser_fines = '".$val_up['iduser']."' and idbk_fines = '".$val_up['idbk']."'
										and day_start = '".$val_up['day_start']."' and Active_fines = 1");
										//$results = mysqli_query($con,$update_ftb) or die ("Error in query: $update_ftb " . mysqli_error());
				
			}
			//echo "<pre>";
		//print_r($val_if);
		//echo json_encode($val_if);
		echo "1";	
		}  
function insertDataFines_tb($cash_ar, $con){
	$nowdate = date("Y-m-d");
	/*echo"<pre>";
	print_r($cash_ar);*/
	foreach($cash_ar as $key_in => $val_in)
		{
			//echo"<pre>";
			//print_r($val_in);
		
			$insert_fdb = mysqli_query($con, "insert into fines_tb(iduser_fines,idbk_fines,countday,cash_book,day_start,fines_dayend,fines_dayin,daynow_fines,Active_fines)
								values('".$val_in['iduser']."','".$val_in['idbk']."',
								'".$val_in['fines_daycount']."','".$val_in['finesbath']."','".$val_in['day_start']."',
								'".$val_in['dayend']."','".$nowdate."','".$val_in['daynow']."','1')");
										
				//$result = mysqli_query($con,$insert_fdb) or die ("Error in query: $insert_fdb " . mysqli_error());
				
				
		}
		//echo "<pre>";
		//print_r($val_else);
		echo "1";
	}




















































							
?>















































