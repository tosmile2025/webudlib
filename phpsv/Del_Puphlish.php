<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//echo $_POST['val'];
	if(isset($_POST['val'])){
		$byname_athor = $_POST['val'];
		
		$mysqli = mysqli_query($con, 'DELETE FROM lpublish_tb WHERE PUBID_tb = "'.$_POST['val'].'"');
		
	}
?>