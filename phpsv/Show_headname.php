<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$_POST['idlinks'] = "1026108";
	//$_POST['idlinks'] = "1040993";

if(isset($_POST['idlinks'])){
			
			$mysqli =  mysqli_query($con, 'select * from album_pmrk_tb as d1
											inner join sub_album_tb as d2 on(d1.SUB_ID = d2.id_album)
											where d1.LINK_ALBUM = "'.$_POST['idlinks'].'" and STATUS_ALBUM = "S"');
									
			while($result = mysqli_fetch_array($mysqli)){
				
				$box_rr[] = $result;
				}
	echo json_encode($box_rr);
	}
?>









