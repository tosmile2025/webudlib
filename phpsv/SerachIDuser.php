<?php 
	include('../connectdata/cnectDB.php');
				
				$query = '';
				
				
				if(isset($_POST['d']))
				{					
					$query = "
								SELECT * FROM user_tb 
								 WHERE IDUSERCODE = '".$_POST['d']."' 
							
							 ";
								
				
						}
						$statement = $connect->prepare($query);
						$statement->execute();
											
						while($row = $statement->fetch(PDO::FETCH_ASSOC))
						{
							$data[] = $row;
							}
							echo json_encode($data);
	
?>


