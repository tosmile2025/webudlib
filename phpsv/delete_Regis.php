<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['idlink'] = '1043501';
	if(isset($_POST['idlink'])){
	$idlink = $_POST['idlink'];
		$slc = mysqli_query($con, 'select * from book_store_tb
									where IDLIKBOOK = "'.$idlink.'"');
		$result = mysqli_fetch_assoc($slc);		
		//echo $isbn;
		if($result != ''){
				//$filename = "1111111111118";
				$filename = $idlink;
				$delstore = del_bookstor($con, $idlink);
				$delmain = delete_athor_main($con, $idlink);
				$delalbum = delete_album_pmrk($con, $idlink);
				$delcat = delete_athor_cat($con, $idlink);
				$delpic = delete_picture($con, $filename);
				$arr_error = array($delstore,$delmain,$delalbum,$delcat,$delpic);
				echo json_encode($arr_error);
				//echo $delpic;
				return;
		
			}
	
	}
function delete_picture($con, $filename){
	$path = "../COVERIMAGES/".$filename.".jpg";
	//echo $path;
	if(file_exists($path)){
		if(!unlink($path)){
			return 6;
			}
				
		}
	}					

function del_bookstor($con, $idlink){
	
	$del_bkstore = mysqli_query($con, 'delete from book_store_tb
											where IDLIKBOOK = "'.$idlink.'"');	
	if(!$del_bkstore){		
		return 1; 	
		}else{
			$del_regisbk = mysqli_query($con, 'delete from regis_books_tb
			where IDLIKBOOK = "'.$idlink.'"');
			if(!$del_regisbk){
			return 1;
			}
		}													
	
	}	
function delete_athor_main($con, $idlink){
		$del = mysqli_query($con, 'delete from athor_main_tb
									where blink_athor = "'.$idlink.'"');
		if(!$del){
			return 2;
			}
		}
function delete_album_pmrk($con, $idlink){
	$del_album = mysqli_query($con, 'delete from album_pmrk_tb
										where LINK_ALBUM = "'.$idlink.'"');
		if(!$del_album){
			return 3;
			}								
	}
function delete_athor_cat($con, $idlink){
	$del_athorcat =mysqli_query($con, 'delete from athor_cat_tb
										where LINK = "'.$idlink.'"');
		if(!$del_athorcat){
			return 4;
			}									
	}

?>











































