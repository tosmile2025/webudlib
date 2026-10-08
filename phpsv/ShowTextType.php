<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['barcode'] = '211791';
	//$_POST['barcode'] = '';
	
	if(isset($_POST['barcode'])){
		
		$data = $_POST['barcode'];
			$sqli = mysqli_query($con, 'select * from type_tb ');
			while($result = mysqli_fetch_array($sqli)){
				
				$arr[] = $result;
				}
		
		
		foreach($arr as $key => $val){
		if($data == $val['TYPEID']){
			
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