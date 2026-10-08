<?php 
	include('../connectdata/cnectDB.php');

/*$mysqli = mysqli_query($con, "insert into sub_album_tb(ID_sub_album,id_album,album_name,SOURCE,USED,SUBTYPE,DATE,GENERATE)
									values('','".$renameID."','".$album_name."','L','Y','R','".$date."','N')")*/;
	
	$filetemp = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	//echo $filetemp;
	$namepic=  $_POST['filename'];
	if(isset($namepic)){
	$path = "../imageuser/";
	$type = strrchr($filename,".");
	$newname = $namepic.$type;
	//echo $newname;
	$pathdel = '../imageuser/'.$newname.'' ;
	
	//echo $newname;
   if(file_exists($pathdel)){	
		$del = unlink($pathdel);
		if($del){
			echo "del success";
			}
		uploadFilepic($filetemp, $pathdel);	 
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
  function uploadFilepic($filetemp, $pathdel){
	  $move_Upload = move_uploaded_file($filetemp,$pathdel);
	  	if(!$move_Upload){
				
				echo "error";
				}else{
					echo "success";
					
					}
	  }	 
?>