<?php
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");
// $testidu = '02125';
//   $_POST['iptValIDU'] = "1234";	
//$_POST['iptValIDBook'] = "211791";	
	
	if(isset($_POST['iptValIDU'])){
		$bath_fix = 5;		
		//  $nowday = date('2024-01-14');
		$nowday = date("Y-m-d");
		$iduser = $_POST['iptValIDU'];
		$arr_export = array();
		$statut = '';
		$sqliuser = mysqli_query($con, 'select * from exportbook_tb where IDuser_exbook = "'.$iduser.'" and Active_book = 1 ');
		$numrow = mysqli_num_rows($sqliuser);		
		if($numrow >0){
			while($result = mysqli_fetch_array($sqliuser)){				
				if($result['IDuser_exbook']!= ""){
					//  echo $result['Day_end'];						
						if(strtotime($result['Day_end']) < strtotime($nowday)){
							//echo  'day_end น้อยกว่า เวลาปัจจุบัน'.$result['ID_ex_barcodebook'].'<br>';
							if($result['daynow'] !=''){
								 //echo  'day_now  มีค่า';
									if(strtotime($result['daynow']) < strtotime($nowday)){
										// day_now  มีค่าน้อยกว่า วันปัจจุบัน
										$arr['statut'] ='updat';
										$arr['iduser']= $result['IDuser_exbook'];
										$arr['bcode']= $result['ID_ex_barcodebook'];
										$arr['dayend'] = $result['Day_end'];
										$arr['nowday'] = $nowday;
										array_push($arr_export, $arr);
									}
							}else{ // insert new rows
								$arr['statut'] ='insert';
								$arr['iduser']= $result['IDuser_exbook'];
								$arr['bcode']= $result['ID_ex_barcodebook'];
								$arr['dayend'] = $result['Day_end'];
								$arr['nowday'] = $nowday;
								array_push($arr_export, $arr);
								   /// updat now > เช็คว่ามีค่าปรับหรือไม่  > เช็คค้างค่าปรับ > success
							}
						
						}					
				}
		}
		/*echo "<pre>";
		 print_r($arr_export);*/
		  updat_tb($con, $bath_fix, $arr_export);
		}else{
			mysqli_close($con);
		}
		
		
}
function updat_tb($con, $bath_fix, $arr_export){
// echo  'day_end น้อยกว่าเวลาปัจจุบันinser_fnes_clk'.'<br>';
	// echo count($arr_export);
 if(count($arr_export) > 0 ){	
	// echo  'day_end น้อยกว่าเวลาปัจจุบัน';
	foreach($arr_export as $val){
		// echo  'day_end น้อยกว่าเวลาปัจจุบันinser_fnes_clk'.$val['statut'].'<br>';
	$updateDay = mysqli_query($con, "update exportbook_tb set Active_fines = 1, daynow = '".$val['nowday']."' 
				where ID_ex_barcodebook = '".$val['bcode']."'and IDuser_exbook='".$val['iduser']."'  and Active_book = 1");	
	}
		if(!$updateDay){
			echo "error update sql updat_tb";
		}else{
			// echo "success";
			Fucn_ChkRatDay($con, $bath_fix, $arr_export);
		}
		// Fucn_ChkRatDay($con, $bath_fix, $arr_export);	
 }		
				
}
//-------------------------------------คำนวณค่าปรับ นำค่าปรับค้างเก่ามาบวกกับค่าปรับปัจจุบัน	

	//-------------------------------------------------------------------------------	
function Fucn_ChkRatDay($con, $bath_fix, $arr_export){		
		//echo "test";		
		
	//echo $idbk_check;	
	foreach($arr_export as $data){		
		$sqli_exbook = mysqli_query($con, 'select * from exportbook_tb
									where datediff(Day_end, "'.$data['nowday'].'") < 0
									and IDuser_exbook = "'.$data['iduser'].'"
									and ID_ex_barcodebook = "'.$data['bcode'].'"
									and Active_fines = 1');
		
			$result_bk = mysqli_fetch_array($sqli_exbook);	
										$return_date = $result_bk['Day_end'];
									//echo $return_date;
									$time_today = strtotime($data['nowday']);
											$time_returnday = strtotime($return_date);
											$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 );
											$finesFix = ceil($dayCount) * $bath_fix;
										$input['finesbath']		   = $finesFix ;
										$input['fines_daycount'] 	  = $dayCount;
										$input['idbk'] 				= $result_bk['ID_ex_barcodebook'];
										$input['iduser']				 = $data['iduser'];//-------------------------------idu
										$input['day_start']			 = $result_bk['Day_start'];
										$input['dayend']			  = $return_date;
										$input['daynow']			  = $data['nowday'];
										$arr_set[] = $input;
							
						}
		
			//echo $strcash;
 //echo "<pre>";
	//print_r($arr_set);
	 myfunction_Cash($arr_set, $con);				
	}	
	// ------คำนวณค่าปรับจาตารางวันหยุด
function Fucn_ChkRatDay_disable($con, $bath_fix, $arr_export){		
		//echo "test";		
		
	//echo $idbk_check;	
	foreach($arr_export as $data){		
		$sqli_exbook = mysqli_query($con, 'select * from exportbook_tb
									where datediff(Day_end, "'.$data['nowday'].'") < 0
									and IDuser_exbook = "'.$data['iduser'].'"
									and ID_ex_barcodebook = "'.$data['bcode'].'"
									and Active_fines = 1');
			$result_row = mysqli_num_rows($sqli_exbook);
			$result_bk = mysqli_fetch_array($sqli_exbook);					
			// echo $result_row;	
			//echo $result_bk['Day_end'];			
			$fixdaysqli = mysqli_query($con, 'select * from datpicker_tb
										where datpicker between "'.$data['dayend'].'" and "'.$data['nowday'].'"');
			$num_ber = mysqli_num_rows($fixdaysqli);										
								if($num_ber >0){
									$return_date = $result_bk['Day_end'];
									//echo $return_date;
										$time_today = strtotime($data['nowday']);
											$time_returnday = strtotime($return_date);
											$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 ) - $num_ber;
											$finesFix = ceil($dayCount) * $bath_fix;
										$input['finesbath']		   = $finesFix ;
										$input['fines_daycount'] 	  = $dayCount;
										$input['idbk'] 				= $result_bk['ID_ex_barcodebook'];
										$input['iduser']				 = $data['iduser'];//-------------------------------idu
										$input['day_start']			 = $result_bk['Day_start'];
										$input['dayend']			  = $return_date;										
										$input['daynow']			  = $data['nowday'];											
										$arr_set[] = $input;								
									
									}else{
										$return_date = $result_bk['Day_end'];
									//echo $return_date;
									$time_today = strtotime($data['nowday']);
											$time_returnday = strtotime($return_date);
											$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 );
											$finesFix = ceil($dayCount) * $bath_fix;
										$input['finesbath']		   = $finesFix ;
										$input['fines_daycount'] 	  = $dayCount;
										$input['idbk'] 				= $result_bk['ID_ex_barcodebook'];
										$input['iduser']				 = $data['iduser'];//-------------------------------idu
										$input['day_start']			 = $result_bk['Day_start'];
										$input['dayend']			  = $return_date;
										$input['daynow']			  = $data['nowday'];
										$arr_set[] = $input;
										}	
							
						}
		
			//echo $strcash;
	/*echo "<pre>";
	print_r($arr_set);*/
	 myfunction_Cash($arr_set, $con);				
	}	
	
function myfunction_Cash($arr_set, $con)// ฟังก์ชั่น มีค่าปรับ และ มีเงินค้างชำระ
		{
		// echo count($arr_set);		
		foreach($arr_set as $val_cash)
				{			
					// echo 	$val_cash["daynow"];
					$sqli_ex = mysqli_query($con, 'select * from fines_tb
													where iduser_fines = "'.$val_cash['iduser'].'"
													and idbk_fines = "'.$val_cash['idbk'].'"
													and fines_dayend = "'.$val_cash['dayend'].'"																																			
													and Active_fines = 1');
															
				//  echo $result['idbk_fines'];
		$row = mysqli_num_rows($sqli_ex);
		$result = mysqli_fetch_assoc($sqli_ex);
			if($row >0){
					/*echo "<pre>".$val_cash['dayend'];
					echo "มีข้อมูลในตารางค่าปรับและ วันกำหนดคืนก็มีค่าวันเดียวกัน";*/
				updateDataFines_tb($val_cash, $con);
		
			}else{
				/*echo "<pre>";
				echo "เพิ่มค่าใหม่เข้าตารางค่าปรับ";*/
				insertDataFines_tb($val_cash, $con);
			}	
				
			
			
	}
	
}		
function insertDataFines_tb($val_cash, $con){		
		$insert_fdb = mysqli_query($con, "insert into fines_tb(iduser_fines,idbk_fines,countday,cash_book,day_start,fines_dayend,fines_dayin,daynow_fines,Active_fines)
								values('".$val_cash['iduser']."','".$val_cash['idbk']."',
								'".$val_cash['fines_daycount']."','".$val_cash['finesbath']."','".$val_cash['day_start']."',
								'".$val_cash['dayend']."','".$val_cash['daynow']."','".$val_cash['daynow']."','1')");
										
				//$result = mysqli_query($con,$insert_fdb) or die ("Error in query: $insert_fdb " . mysqli_error());
				
		if(!$insert_fdb){
			echo"error_insertDataFines_tb";
		}else{
			echo "success-insert".'<br>';
		}
	 }
	
function updateDataFines_tb($val_cash, $con){	
	// 5.ต้องการหาข้อมูลช่วงของเดือนธันวาคมปี 2009 ถึง กุมภาพันธ์ ปี 2010	
	// SELECT * FROM test_date WHERE (date_time between 'date_format('2009-12-01','%Y-%m-01')' and 'date_sub(date_add(date_format('2010-02-12','%Y-%m-01'),interval 1 month),interval 1 day)')

		/*echo "<pre>";
		print_r($val_cash);	*/
				$update_ftb = mysqli_query($con, "update fines_tb set countday = '".$val_cash['fines_daycount']."',
										cash_book = '".$val_cash['finesbath']."',
										fines_dayend = '".$val_cash['dayend']."',
										fines_dayin = '".$val_cash['daynow']."', daynow_fines = '".$val_cash['daynow']."'
										where iduser_fines = '".$val_cash['iduser']."' and idbk_fines = '".$val_cash['idbk']."'
										and day_start = '".$val_cash['day_start']."'and fines_dayend = '".$val_cash['dayend']."' and Active_fines = 1");
										//$results = mysqli_query($con,$update_ftb) or die ("Error in query: $update_ftb " . mysqli_error());
			if(!$update_ftb){
				echo"error_updateDataFines_tb";
					}else{
						echo "success-update-fines".'<br>';
					}
		}

	
 ?>
 

