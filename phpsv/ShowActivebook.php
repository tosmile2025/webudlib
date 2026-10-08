<?php 
	include('../connectdata/cnectDB.php');
 // $_POST['status_txt'] = 'C';
	//$_POST['barcode'] = '0000143';
	
	if(isset($_POST['status_txt'])){
		
		$data = $_POST['status_txt'];
		//echo $_POST['idlink'];

		
		$sqli_cess = mysqli_query($con, 'select * from status_tb');
	while($arr_array = mysqli_fetch_array($sqli_cess)){
		
		$json[] = $arr_array;
	
		
		 
		}
		//echo "<pre>";
		//print_r($json);
		
	echo json_encode($json);
	}

?>