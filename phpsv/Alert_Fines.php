<?php	
include('../connectdata/cnectDB.php');
/*$testidu = '02125';*/
if(isset($_POST['iptValIDU']))
	{
	$bath_fix = 5;	
	$sum = 0;
	
	$sqli_exbook = mysqli_query($con, 'select * from exportbook_tb as d1
								inner join regis_books_tb as d2 on (d1.ID_ex_barcodebook = d2.BARCODE)
								inner join book_store_tb as d3 on (d2.IDLIKBOOK = d3.IDLIKBOOK)
								where d1.IDuser_exbook = "'.$_POST['iptValIDU'].'"
								and d1.Active_book = 1');
	$result_row = mysqli_num_rows($sqli_exbook);
	
	if($result_row > 0)
		{								
			 while($result_bk = mysqli_fetch_array($sqli_exbook))
					{
						$return_date = $result_bk['Day_end'];
						$nowday = date('Y-m-d');
						/*echo $return_date;*/
						if($nowday > $return_date)
							{
								$time_today = strtotime($nowday);
								$time_returnday = strtotime($return_date);
								$dayCount = ($time_today - $time_returnday) / ( 60 * 60 * 24 );
								$finesFix = ceil($dayCount) * $bath_fix;	
								$sum += $finesFix;					
								}
							
						}
						
							
							
			echo "มีค่าปรับจำนวน"." .".". ".$sum.".". "บาท";
			
			}
	}else{
		mysqli_close($con);
		
		}



 ?>