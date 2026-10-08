<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['code'] = '211791';
	//$_POST['idlink'] = '1043119';
	
	//$_POST['code'] = '109571';
	//$_POST['idlink'] = '1013239';
	if(isset($_POST['CODE'])){
		
		$data[] = $_POST['idlink'];
		$data[] = $_POST['CODE'];
		
		
		foreach ($data as $key => $val){
			//echo $val;
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$val.'" and TYPE = "M"');
			while($result = mysqli_fetch_array($sqli)){
				
				$arr[] = $result;
				}
		}
		//echo "<pre>";
		//print_r($arr);
		echo json_encode($arr);
		
		}
?>
