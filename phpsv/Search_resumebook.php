<?php
include('../connectdata/cnectDB.php');
				$output = '';
				$query = '';
				//iptValIDU:iptValIDU,iptSearch:iptSearch
			
			if($_POST['iptSearch']== '')
				{
					
					$query = "
								SELECT * FROM exportbook_tb AS d1 INNER JOIN regis_books_tb AS d2 ON(d1.ID_ex_barcodebook = d2.BARCODE) INNER JOIN book_store_tb AS d3 ON(d2.IDLIKBOOK = d3.IDLIKBOOK)
								WHERE IDuser_exbook = '".$_POST['iptValIDU']."'  ORDER BY d1.id_exbook DESC
								 limit 20
						";
								
								}else{
									
									$query = "
								SELECT * FROM exportbook_tb AS d1 INNER JOIN regis_books_tb AS d2 ON(d1.ID_ex_barcodebook = d2.BARCODE) INNER JOIN book_store_tb AS d3 ON(d2.IDLIKBOOK = d3.IDLIKBOOK)  
								 WHERE (ID_ex_barcodebook REGEXP '".$_POST['iptSearch']."' OR NAME_BOOK REGEXP '".$_POST['iptSearch']."') AND IDuser_exbook = '".$_POST['iptValIDU']."'
								 ORDER BY d1.id_exbook DESC 
								  
							 ";
									
									
									}
					$statement = $connect->prepare($query);
						$statement->execute();
											
						while($row = $statement->fetch(PDO::FETCH_ASSOC))
						{
							$data[] = $row;
							}
							echo json_encode($data);
							//echo $_POST['iptSearch'];

?>