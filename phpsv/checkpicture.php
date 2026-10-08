<?php
	//$_POST['data'] = "978070201.jpg";
if(isset($_POST['data'])){
	$data = $_POST['data'];

//echo $data;

	//$tt = $_POST['data'];
	$path = "../COVERIMAGES/".$data.".jpg";
	//echo $path;
	if(file_exists($path))
	{
		$arr['idlink'] = $data;
		$arr['stut'] = "1";
		}else{
			$arr['idlink'] = $data;
			$arr['stut'] = "2";
		}
		
		echo json_encode($arr);

}

?>