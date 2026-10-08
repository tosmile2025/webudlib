<?php
	include("../connectdata/cnectDB.php");
//$_POST['iduser'] = "admin";	
	if(isset($_POST['iduser'])){
		$sqli = mysqli_query($con, 'select * from admin_tb where iduser = "'.$_POST['iduser'].'"');
		$result = mysqli_fetch_assoc($sqli);
		$arr[0] = $result['LoginStatus'];
		$arr[1] = $result['Fname'];
		$arr[2] = $result['Lname'];
		$arr[3] = $result['iduser'];
		
		echo json_encode($arr);
		}
		mysqli_close($con);
	
 ?>