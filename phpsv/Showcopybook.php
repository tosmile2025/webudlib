<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['idLINK'] = "1043468";
	if(isset($_POST['idLINK'])){
		
		$data = $_POST['idLINK'];
			$sqli = mysqli_query($con, 'select * from regis_books_tb where IDLIKBOOK = "'.$data.'" order by BARCODE DESC');
			while($result = mysqli_fetch_array($sqli)){
				
				$arr[] = $result;
				}
		/*echo "<pre>";
		print_r($arr);*/
		echo json_encode($arr);
		
		}
?>