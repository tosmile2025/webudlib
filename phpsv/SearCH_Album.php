<?php 
include('../connectdata/cnectDB.php');
	
$query = '';

//$data = "205337";	
//$_POST['data']= "";			
if(isset($_POST['data']))
				{
					$data = $_POST['data'];
					$query = "
								SELECT * FROM sub_album_tb
								WHERE album_name REGEXP '".$data."' and SUBTYPE = 'R'
								limit 26 
							 ";
				
						$result = mysqli_query($con,$query);
						while($row = mysqli_fetch_array($result))
								{
								$byathor_arr[] = $row;
									}
									
									//echo "<pre>";
								//	print_r($byathor_arr);
								echo json_encode($byathor_arr);
									
	}

?>