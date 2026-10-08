<?php
		include('../connectdata/cnectDB.php');
		
		$sqli = mysqli_query($con, 'select * from dealerbook_tb');
		while($res = mysqli_fetch_array($sqli)){
			$arr[] = $res;
			}
			echo json_encode($arr);
?>