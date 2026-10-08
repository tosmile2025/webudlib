<?php 
	include('../connectdata/cnectDB.php');
if(isset($_POST['GMD'])){
		//echo $_POST['idlink'];
		//echo $data;
		$data = $_POST['GMD'];
		$sqli_cess = mysqli_query($con, 'select * from gmd_tb');
			while($arr_array = mysqli_fetch_array($sqli_cess)){
			$arr[] = $arr_array;
			}
		//echo "<pre>";
		//print_r($json);
	
	foreach($arr as $key => $val){
		if($data == $val['KEY_GMD']){
			
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