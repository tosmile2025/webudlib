<?php
	include('../connectdata/cnectDB.php');
	//$_POST['bCode'] = 110293;
	if(isset($_POST['bCode'])){
		$data =  $_POST['bCode'];
			$sqli = mysqli_query($con, 'delete from regis_books_tb 
										where BARCODE = "'.$data.'"');
			myfunc_delete_athor_main_tb($con, $data);					
		}
function myfunc_delete_athor_main_tb($con, $data){
	
		$del = mysqli_query($con, 'delete from athor_main_tb
									where blink_athor = "'.$data.'" and TYPE = "M"');
	}		
	
 ?>