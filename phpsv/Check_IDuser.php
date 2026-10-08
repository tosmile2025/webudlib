<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['data'] = "987544";
if(isset($_POST['txt'])){
		//echo $_POST['idlink'];
		//echo $data;
		$data = $_POST['txt'];	
		$sqli_cess = mysqli_query($con, 'select (IDUSERCODE) from user_tb where IDUSERCODE = "'.$data.'"');
			$arr = mysqli_num_rows($sqli_cess);
			
			echo $arr;
	
		
}
?>