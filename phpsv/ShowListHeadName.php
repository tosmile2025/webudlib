<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$_POST['idlinks'] = "1026108";
	//$_POST['data'] = "";

if(isset($_POST['data'])){
	
		$select = mysqli_query($con, 'select * from sub_album_tb 
								where album_name regexp "'.$_POST['data'].'" and SUBTYPE = "S" limit 26');
								
			//$result = mysqli_query($con,$);
						while($row = mysqli_fetch_array($select))
								{
								$byathor_arr[] = $row;
									}
									//echo "<pre>";
									//print_r($byathor_arr);
									echo json_encode($byathor_arr);
														
	
	}
	 
?>
