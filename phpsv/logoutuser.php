<?php
	require_once("../connectdata/cnectDB.php");
//$_POST['iduser'] = "admin";	
	if(isset($_POST['iduser'])){
			$iduser = $_POST['iduser'];
			$update = mysqli_query($con, "update admin_tb set LoginStatus = '0'
										where iduser = '".$iduser."'");
		if(!$update){
			//echo "error";
			$arr_js[0] = "1";
			}else{
				//echo "update str user";
				$arr_js[0] = "2";
				}
	echo json_encode($arr_js);
		}
		mysqli_close($con);
	
 ?>