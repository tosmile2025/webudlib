<?php 
	include('../connectdata/cnectDB.php');
	
	$sql = mysqli_query($con, 'select * from user_tb ');
	while($result = mysqli_fetch_array($sql)){
		
		if($result['RangClass'] === "0"){
			
			$update = mysqli_query($con, "update user_tb set RangClass = '5'
											where IDUSERCODE = '".$result['IDUSERCODE']."'");
			echo "<pre>";
			echo $result['RangClass'].$result['IDUSERCODE'];
			}
		
		}
?>	