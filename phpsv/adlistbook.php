<?php 

	include('../connectdata/cnectDB.php');
	
	if(isset($_POST['iptValIDBook']))
			{
			/*$id = "02125";*/
	
				$sqli_show = mysqli_query($con, 'select * from book_store_tb as d1 
												inner join regis_books_tb as d2 on (d1.IDLIKBOOK = d2.IDLIKBOOK)
												inner join exportbook_tb as d3 on (d2.BARCODE = d3.ID_ex_barcodebook) 
												where IDuser_exbook = "'.$_POST['iptValIDU'].'" and Active_book = 1 order by id_exbook desc
												');
						while($result = mysqli_fetch_array($sqli_show))
								{
									$data[] = $result;
									}
									echo json_encode($data);
						
		}
								

?>