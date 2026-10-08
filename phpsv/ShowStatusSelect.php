<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['id_key'] = '211791';
	//$_POST['id_key'] = 'C';
	
	if(isset($_POST['id_key'])){
		
		$data = $_POST['id_key'];
		//echo $_POST['id_key'];
		
			$checkDB = mysqli_query($con, 'select * from status_tb ');
		
		while($result = mysqli_fetch_array($checkDB)){
			$arr[]  = $result;
			
			}
			foreach($arr as $key => $val){
		if($data == $val['KEY_TYPE']){
			
			$ar[] =  $val;
			
	
			
		}else{
			$as[] = $val;
			
			}
			
			
	}
	$meger = array_merge($ar, $as);
		/*echo "<pre>";
		print_r($meger);*/
		
		echo json_encode($meger);
	}

?>