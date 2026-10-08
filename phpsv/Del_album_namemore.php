<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['idalbum'] = "1026108";
	//$_POST['idalbum'] = "1040993";

	if(isset($_POST['idalbum'])){
		$data = $_POST['idalbum'];
		//echo $data;
					myFunc_delete_innerjoin_else($con, $data);
	//echo $data;
		}


function myFunc_delete_innerjoin_else($con, $data){
	
		$mysqli = mysqli_query($con, 'DELETE FROM sub_album_tb 
								WHERE id_album ="'.$data.'" AND SUBTYPE = "T"');
		if($mysqli){
			echo "3";
			
			}						
	}	   
?>
