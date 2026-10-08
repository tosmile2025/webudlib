<?php 
		include('../connectdata/cnectDB.php');
//$_POST['data'] = '1043119';		
if(isset($_POST['data'])){
	
		$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$_POST['data'].'"');
					$num_autor = mysqli_num_rows($sqli);
						while($data = mysqli_fetch_array($sqli)){
							$result['KEY_O'] = $data['TYPE'];
							$result['detail'] = $data['detail_athormain_tb'];
							$json[] = $result;
							}
	
		echo json_encode($json);
	}

?>