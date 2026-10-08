<?php 
	include('../connectdata/cnectDB.php');
	
	//$_POST["iduser"] = 1234566; 
	if(isset($_POST["iduser"]))
	{
		$iduser =  $_POST["iduser"];
		$sqli= mysqli_query($con, 'delete from user_tb
									where IDUSERCODE ="'.$iduser.'" ');
				$file = $iduser."."."jpg";
				$pathdel = '../imageuser/'.$file.'' ;
				//echo $file;
				 if(file_exists($pathdel)){	
				 	$del = unlink($pathdel);
					//echo $pathdel;
					if($del){
						
						echo "delete success";
						}else{
							
							echo "error delete".$file;
							}
				 }
				
											
		
	}
 ?>