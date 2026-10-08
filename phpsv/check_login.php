<?php

require_once("../connectdata/cnectDB.php");
 /*date_default_timezone_set("Asia/Bangkok");*/
 //$_POST['iduser'] = "admin";
// $_POST['pwuser'] = 'admin';
if(isset($_POST['iduser'])){
	
		$strUsername = $_POST['iduser'];
	
		$strPassword = $_POST['pwuser'];
		$strSQL = mysqli_query($con, "SELECT * FROM admin_tb ");
	
		while($result = mysqli_fetch_array($strSQL)){
			if($result['iduser'] === $strUsername and $result['pwuser'] == $strPassword){
				// ok
						$update = mysqli_query($con, "update admin_tb set LoginStatus = '1'
						where iduser = '".$strUsername."'");
					if(!$update){
					mysqli_close($con);
					}else{	
											
					$arr[0] =  "suc";
					$arr[1] = "assets/index.php";
					$arr[2] = $strUsername;
					}
			}else{
			$arr[0] = "eor";
			}
		}	

	echo json_encode($arr);
	mysqli_close($con);
}
?>