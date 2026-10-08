<?php 
	include('../connectdata/cnectDB.php');
				$output = '';
				$query = '';
				
				
				if(isset($_POST['d']))
				{					
					$query = '
								SELECT * FROM user_tb 
								 WHERE IDUSERCODE like "'.$_POST['d'].'%" 
								 OR FNAME like "'.$_POST['d'].'%" 
								 OR LNAME like "'.$_POST['d'].'%" 
								 limit 250
							 ';
								
					}
					else
					{
						$query = "
								select * from user_tb  limit 5 
						";
						}
						$statement = $connect->prepare($query);
						$statement->execute();
											
						while($row = $statement->fetch(PDO::FETCH_ASSOC))
						{
							$data[] = $row;
							}
							echo json_encode($data);
							//like "%'.$text.'%"
	
?>



