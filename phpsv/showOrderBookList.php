<?php 

	include('../connectdata/cnectDB.php');
	
	if(isset($_POST['iptValIDU']))
			{
			/*$id = "02125";*/
	/*echo $_POST['iptValIDU'];*/
				$sqli_show = mysqli_query($con, 'select * from book_store_tb as d1 
															inner join regis_books_tb as d2 on (d1.IDLIKBOOK = d2.IDLIKBOOK)
															inner join orderbook_tb as d3 on (d2.BARCODE = d3.IDbook_order) 
															where IDuser_order = "'.$_POST['iptValIDU'].'" and Active_order = 1
															');
									while($result = mysqli_fetch_array($sqli_show))
											{
												$data[] = $result;
												}
												echo json_encode($data);
									/*echo json_encode($data);*/
						
		}
								

?>