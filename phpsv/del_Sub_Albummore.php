<?php 
		include('../connectdata/cnectDB.php');
		
		//idlinks
		if(isset($_POST['idlinksnum'])){
			
			$idlink = $_POST['idlinks'];
			$idmore = $_POST['idlinksnum'];
			
		
			
		$mysqli = mysqli_query($con, 'DELETE FROM album_pmrk_tb 
										WHERE LINK_ALBUM = "'.$idlink.'"
										AND SUB_ID = "'.$idmore.'"');
										

		if(!$mysqli){
			
			echo "ไม่สามารถลบรายการที่".$idmore."หัวเรื่องเพิ่มเติมได้ ระบบอาจมีปัญหา";
			
			}else{
				echo "ทำการเสร็จสมบูรณ์";
				}
		
										
		}
 ?>