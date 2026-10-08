<?php 
include('../connectdata/cnectDB.php');
			if(isset($_POST['iptValIDU']))
				{
				/*$idu = "02125";*/
				
					$sqli = mysqli_query($con, "select * from exportbook_tb 
												where IDuser_exbook = '".$_POST['iptValIDU']."'
												and Active_book = 1 group by IDuser_exbook ");
											$result_count = mysqli_fetch_assoc($sqli);
													$countDay =  $result_count['Count_day'];
												
					$sqli_num = mysqli_query($con, "select * from exportbook_tb 
												where IDuser_exbook = '".$_POST['iptValIDU']."'
												and Active_book = 1 ");
												$result_row =mysqli_num_rows($sqli_num);
												$arr_num = array($countDay, $result_row);
												echo json_encode($arr_num);
					}

?>