<?php 
include('../connectdata/cnectDB.php');
	if(isset($_POST['date']))
		{
			list($year, $month, $day) = explode("-", $_POST['date']);	
			$dayNow = $_POST['date'];
			$label_day = $_POST['text'];
					$strVal = '("'.$day.'","'.$dayNow.'","'.$month.'","'.$year.'", "'.$label_day.'")';					
					$insert = mysqli_query($con, "insert into datpicker_tb(dayfix,datpicker,month,Year_calen, note_tb)values$strVal");		
				if($insert){
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