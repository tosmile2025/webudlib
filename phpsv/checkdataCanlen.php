<?php 	
include('../connectdata/cnectDB.php');
	
//$check ="2021-1-26";
if(isset($_POST['ymmdd']))
	{
	$check = $_POST['ymmdd'];	
	$sqli = mysqli_query($con, 'select * from datpicker_tb where datpicker = "'.$check.'" ');
	$result = mysqli_num_rows($sqli);
	echo $result;
	}
?>