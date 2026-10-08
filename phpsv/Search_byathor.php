<?php 
	include('../connectdata/cnectDB.php');
	
$query = '';

//$data = "205337";	
//$_POST['data']= "";			
if(isset($_POST['data']))
				{
					$data = $_POST['data'];
					$query = "
								SELECT * FROM byathor_tb
								WHERE NAME_BY REGEXP '".$data."'
								limit 26 
							 ";
				
						$result = mysqli_query($con,$query);
						while($row = mysqli_fetch_array($result))
								{
								$byathor_arr[] = $row;
									}
									
									echo json_encode($byathor_arr);
									
	}
?>