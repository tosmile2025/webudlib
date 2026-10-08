<?php 
		include('../connectdata/cnectDB.php');

			$select = mysqli_query($con, 'select * from gmd_tb');
			while($result = mysqli_fetch_array($select)){
				
				$arr[] = $result;
				}
				echo json_encode($arr);
			
			
?>