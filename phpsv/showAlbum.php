<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
///$_POST['data'] = "1013072";
if(isset($_POST['data'])){
			
			$mysqli =  mysqli_query($con, 'select * from album_pmrk_tb as d1
											inner join sub_album_tb as d2 on(d1.SUB_ID = d2.id_album)
											where d1.LINK_ALBUM = "'.$_POST['data'].'" and d1.STATUS_ALBUM = "R" and d2.SUBTYPE ="R"');
			while($result = mysqli_fetch_array($mysqli)){
					$arr_data[] = $result;
				
				}
				echo json_encode($arr_data);	
			//echo "<pre>";							
			//print_r($arr_data);
		}
		
		
	
?>