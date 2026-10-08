<?php
		include('../connectdata/cnectDB.php');
	//$_POST['type'] = 'A';	
		
	if(isset($_POST['type'])){
		
		$status = $_POST['type'];
		$sqli = mysqli_query($con, 'select * from status_tb');
		while($res = mysqli_fetch_array($sqli)){
				$rr[] = $res;
				
				}
			foreach($rr as $val){
				
				if($status == $val['KEY_TYPE']){
					$arr_ry[] = $val;
					
					}else{
						$arr_all[] = $val;
						}
				
				}	
		
		$merge = array_merge($arr_ry,$arr_all);
		//echo "<pre>";
		//print_r($merge);
		echo json_encode($merge);
		}
		
		
?>