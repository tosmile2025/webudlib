<?php 
	include('../connectdata/cnectDB.php');
	
		$mysqli = mysqli_query($con, 'select* from type_tb');
	while($qry = mysqli_fetch_array($mysqli)){
		//print_r($qry);
		$arr[] = $qry;
		//echo json_encode($qry);
		
		} 
		
echo json_encode($arr)
?>