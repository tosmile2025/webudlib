<?php

use Dom\Mysql;

	include('../connectdata/cnectDB.php');
	
	if(isset($_POST['id']))
	{
	$mysqli = mysqli_query($con, 'DELETE FROM datpicker_tb WHERE Lk_picker = "'.$_POST['id'].'"');
			if($mysqli){
					echo json_encode([
					"status" => "success",
					"message" => "บันทึกข้อมูลเรียบร้อยแล้ว",
    					]);
				}else{
				echo json_encode([
					"status" => "error",
					"message" => "บันทึกผิดพลาด",
    					]);
				}	
	}
	
 ?>