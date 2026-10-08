<?php
	include('../connectdata/cnectDB.php');
	if(isset($_POST['fixdate'])){
			$arr_fixday =  $_POST['arrDayset'];
			$dayfix = $_POST['fixdate'];
			$arr_idbook =  $_POST['arrIdbook'];
			//print_r($fixday);
			//echo $dayfix."//";
			//echo $arr_idbook."//";
			//echo $arr_fixday."//";
			
			for($i = 0; $i <count($arr_idbook);$i++)
				{
					$idbooks = $arr_idbook[$i];
					$arsetDay = $arr_fixday[$i];					
					//echo $idbooks."//";
					//echo $arsetDay."//";
					// echo $dayfix."//";
					// echo $ardayFix."//";	
					// echo "<pre>";	
				//  echo $arsetDay."||".$dayfix;
				$mysqli = mysqli_query($con, "update exportbook_tb set Day_end = '".$dayfix."'
											where ID_ex_barcodebook = '".$idbooks."'
												and Day_end = '".$arsetDay."'
												and Active_book = 1 ");								
												
				}
		}
 ?>
 
 
 