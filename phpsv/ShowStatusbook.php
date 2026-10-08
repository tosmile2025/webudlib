<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['barcode'] = '211791';
	//$_POST['idlink'] = '0000143';
	
	if(isset($_POST['idlink'])){
		
		$data = $_POST['idlink'];
		//echo $_POST['idlink'];
		
			$checkDB = mysqli_query($con, 'select * from book_store_tb where IDLIKBOOK = "'.$data.'"');
		
		while($arr = mysqli_fetch_array($checkDB)){
			$set['bynum'] = $arr['BYNUM'];
			$set['catbook']=  $arr['Catbook_store'];
			
			}
		//print_r($set);
		if($set != ""){
			check_st($con, $data);
			
		}
	}

function check_st($con, $data){
	
		$sqli = mysqli_query($con, 'select * from regis_books_tb where IDLIKBOOK = "'.$data.'" ');
		while($result = mysqli_fetch_array($sqli)){
			
			$set_arr['status_key'] = $result['status_text'];
			
			}
			$json[] = $set_arr;
	echo json_encode($json);
	}


?>