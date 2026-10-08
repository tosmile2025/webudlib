<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//echo $_POST['val'];
	if(isset($_POST['val'])){
		$byname_athor = $_POST['val'];
		
		$mysqli = mysqli_query($con, 'DELETE FROM byathor_tb WHERE LINKCODE = "'.$_POST['val'].'"');
		
	}
?>