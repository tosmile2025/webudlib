<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$_POST['idlinks'] = "1026108";
	//$_POST['idlinks'] = "10689";

if(isset($_POST['idlinks'])){
	$data = $_POST['idlinks'];
		$mysqli = mysqli_query($con, 'DELETE FROM album_pmrk_tb 
								WHERE LINK_ALBUM ="'.$data.'" AND STATUS_ALBUM = "T"');
			//echo $data;					
	}	    
?>



