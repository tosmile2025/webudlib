<?php	
	include('../connectdata/cnectDB.php');
// $_POST['iptValIDU'] = '1234';	
//$iduser = '02125';
	$sumto =0;
	$sum_cash = 0;
	$sum_total = 0;
	$string = 0;
if(isset($_POST['iptValIDU']))
{
	$iduser = $_POST['iptValIDU'];
//$iduser = "02125";
		$sqli_cash = mysqli_query($con, 'select * from cash_fines_tb where idu_cash = "'.$iduser.'" 
									and id_cash = (select max(id_cash) from cash_fines_tb where idu_cash = "'.$iduser.'"
									and Active_cash = 1) and Active_cash = 1');	
		$result_cash = mysqli_fetch_assoc($sqli_cash);
		$num = mysqli_num_rows($sqli_cash);
		$cash_bath = $result_cash['cash_sum'];
	//echo $result_cash['cash_sum'];
	
			$sqli = mysqli_query($con, 'select * from fines_tb as d1 
									inner join regis_books_tb as d2 on(d1.idbk_fines = d2.BARCODE)
									inner join book_store_tb as d3 on(d2.IDLIKBOOK = d3.IDLIKBOOK)
									where iduser_fines = "'.$iduser.'" and Active_fines = 1');
			$num_fines = mysqli_num_rows($sqli);	
			//echo $num_fines;					
			if($num_fines > 0){
				while($result_fines = mysqli_fetch_array($sqli))
					{
						$str = 1;
						$string = $result_cash['cash_sum'];
							$output['str'] = 			$str;
							$output['idu'] = 			$iduser;
							$output['idbk'] =			$result_fines['idbk_fines'];
							$output['dstart'] =			$result_fines['day_start'];
							$output['nstart'] =			$result_fines['fines_dayend'];
							$output['dayinport'] =			$result_fines['fines_dayin'];
							$output['cday'] =				$result_fines['countday'];
							$output['cash_book'] =			$result_fines['cash_book'];
							$output['namebook'] = 			$result_fines['NAME_BOOK'];
							if(empty($string))
								{
									$output['cash_sum'] = 0;
									
									}else{
										$output['cash_sum'] =$string;
										
										}
							$data_json[] = $output;	
						}
			}else if($num > 0)
			
			{
					$string = $result_cash['cash_sum'];
					$output['str'] = $str = 2;
					$output['cash_sum'] = $cash_bath;
					$data_json[] = $output;	
				
				}
						// echo "<pre>";
						// print_r($data_json);
						 echo json_encode($data_json);
						
	}
	
 ?>
 


























