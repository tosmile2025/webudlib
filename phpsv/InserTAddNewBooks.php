<?php 
	include('../connectdata/cnectDB.php');

/*$mysqli = mysqli_query($con, "insert into sub_album_tb(ID_sub_album,id_album,album_name,SOURCE,USED,SUBTYPE,DATE,GENERATE)
									values('','".$renameID."','".$album_name."','L','Y','R','".$date."','N')")*/;
	
	$filetemp = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];	
	//echo $strpic ;
	$idlink =  $_POST['filename'];
	// echo $filetemp;
if($filetemp != ''){
	EditPictureBooks($idlink, $filetemp, $filename);	
}
function EditPictureBooks($idlink, $filetemp, $filename){ 
		
		if(isset($filename)){
		$path = "../COVERIMAGES/"; 
		$type = strrchr($filename,".");//.jpg
		$newname = $idlink.$type;
		//echo $newname;
		$pathdel = '../COVERIMAGES/'.$newname.'' ;	
		//echo $newname;
	  if(file_exists($pathdel)){	
			$del = unlink($pathdel);
			if($del){
				echo "del success";
				uploadFilepic($newname, $path, $filetemp);	 
				}
			
		   }else{  
				//echo $type;
				$move_Upload = move_uploaded_file($filetemp,$path.$newname);
				//print_r($arr_byathor);
				if(!$move_Upload){
					
					echo "error";
					}else{
						echo "success";
						
						}
			}
	}	
}
function uploadFilepic($newname, $path, $filetemp){
		
	 $move_Upload = move_uploaded_file($filetemp,$path.$newname);
	  	if(!$move_Upload){
				
				echo "error";
				}else{
					echo "success";
					
					}
	  }
?>


































