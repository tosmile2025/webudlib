<?php 
	include('../connectdata/cnectDB.php');
$_POST['GMD'] = '';	
if(isset($_POST['GMD'])){
		//echo $_POST['idlink'];
		//echo $data;
		$data = $_POST['GMD'];
		$sqli_cess = mysqli_query($con, 'select * from datpicker_tb');
			while($arr_array = mysqli_fetch_array($sqli_cess)){
			$arr[] = $arr_array;
			}
		/*echo "<pre>";
		print_r($arr);*/
		echo json_encode($arr);

}
		
?>	