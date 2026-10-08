<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['idalbum'] = "1026108";
	//$_POST['idalbum'] = "1040993";

if(isset($_POST['idcode'])){
	$iddata = $_POST['idcode'];
	$idlink = $_POST['idlinks'];
	//echo $data;
				myFunc_delete_innerjoin_else($con, $iddata, $idlink);

	}
function myFunc_delete_innerjoin_else($con, $iddata, $idlink){
	
		$mysqli = mysqli_query($con, 'DELETE FROM album_pmrk_tb 
										WHERE LINK_ALBUM = "'.$idlink.'"
										AND SUB_ID = "'.$iddata.'"');
		if(!$mysqli){
			echo "ไม่สามารถลบรายการได้";
			
			}else{
				echo "ลบรายการสำเร็จ";
			}						
	}	   
?>
