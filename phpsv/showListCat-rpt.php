<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['key'] = 'R';
	//$_POST['arrtxt'] ="11";
	if(isset($_POST['arrtxt'])){
		$a =  $_POST['arrtxt'][0];
		$b =  $_POST['arrtxt'][1];
        $year = $_POST['arrtxt'][2];
	//  echo $key;
	//  echo $val;
		 if($a == ''){
            shows($con);
        } else if($a != '' and  $year == ''){
					//echo "test TE";
			Search_Data($con, $a, $b, $year);
		} 
		
		}
function shows($con){
			$mysqli = mysqli_query($con, 'select * from book_store_tb as d1
										  inner join regis_books_tb as d2 
										  on(d1.IDLIKBOOK = d2.IDLIKBOOK) order by d1.IDLIKBOOK desc limit 50');								 
			while($result = mysqli_fetch_array($mysqli)){		
							$arr['bc'] = $result['BARCODE'];
							$arr['name'] = $result['NAME_BOOK'];
							$arr['isbn'] = $result['ISBN'];
							$arr['cpage'] = $result['COUNTPAGE'];
							$arr['catbk'] = $result['Catbook_store'];
							$arr['year'] = $result['Year_book'];
							$arr['price'] = $result['Price_book'];						
							$json[] = $arr;
				}
				// echo "<pre>";
				// print_r($json);
				echo json_encode($json);
	}		
function Search_Data($con, $a, $b, $year){
			$mysqli = mysqli_query($con, 'select * from book_store_tb as d1
										  inner join regis_books_tb as d2 
										  on(d1.IDLIKBOOK = d2.IDLIKBOOK)
										  where d1.Catbook_store between  "'.$a.'" and "'.$b.'" order by d1.IDLIKBOOK desc');
			$numrow = mysqli_num_rows($mysqli);	
							 
			while($result = mysqli_fetch_array($mysqli)){
				if($year != ''){
					if($year ==  $result['Year_book']){
						$arr['bc'] = $result['BARCODE'];
						$arr['name'] = $result['NAME_BOOK'];						
						$arr['isbn'] = $result['ISBN'];
						$arr['cpage'] = $result['COUNTPAGE'];
						$arr['catbk'] = $result['Catbook_store'];
						$arr['year'] = $result['Year_book'];
						$arr['price'] = $result['Price_book'];
						$arr['num'] = $numrow;
						$json[] = $arr;
						}
					}else{
						$arr['bc'] = $result['BARCODE'];
						$arr['name'] = $result['NAME_BOOK'];						
						$arr['isbn'] = $result['ISBN'];
						$arr['cpage'] = $result['COUNTPAGE'];
						$arr['catbk'] = $result['Catbook_store'];
						$arr['year'] = $result['Year_book'];
						$arr['price'] = $result['Price_book'];
						$arr['num'] = $numrow;
						$json[] = $arr;
					}
				}
			/*echo "<pre>";
			print_r($json);*/
			echo json_encode($json);
	}	
	
	
?>




















































