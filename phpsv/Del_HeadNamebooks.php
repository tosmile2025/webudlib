<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['idHName'] = "1026108";
	//$_POST['idHName'] = "1040993";

if(isset($_POST['idHName'])){
	$data = $_POST['idHName'];
	//echo $data;
				myFunc_delete_innerjoin_else($con, $data);

	}
function myFunc_delete_innerjoin_else($con, $data){
	
		$mysqli = mysqli_query($con, 'DELETE FROM sub_album_tb 
								WHERE id_album ="'.$data.'" AND SUBTYPE = "S"');
		if($mysqli){
			echo "3";
			
			}						
	}	   
?>
