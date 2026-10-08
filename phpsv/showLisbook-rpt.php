<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['key'] = 'R';
	//$_POST['val']= '2019';
	if(isset($_POST['arrtxt'])){
		$key = $_POST['arrtxt'][1];
		$val = $_POST['arrtxt'][0];
	//  echo $key;
	//  echo $val;
		 if($key =='ALL' && $val !=''){
				SearCh_allData($con, $val);
				}else if($val == 'show'){
					shows($con);
				}else {
					//echo "test TE";
					Search_Data($con, $key, $val);
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
							$arr['year'] = $result['Year_book'];
							$arr['price'] = $result['Price_book'];						
							$json[] = $arr;
				}
				// echo "<pre>";
				// print_r($json);
				echo json_encode($json);
	}		
function SearCh_allData($con, $val){
			$mysqli = mysqli_query($con, 'select * from book_store_tb as d1
										  inner join regis_books_tb as d2 
										  on(d1.IDLIKBOOK = d2.IDLIKBOOK) order by d1.IDLIKBOOK desc');
								 
			while($result = mysqli_fetch_array($mysqli)){
				
				if($val != ''){
					if($val ==  $result['Year_book']){
							// echo "มีค่า";
							$arr['bc'] = $result['BARCODE'];
							$arr['name'] = $result['NAME_BOOK'];
							$arr['isbn'] = $result['ISBN'];
							$arr['cpage'] = $result['COUNTPAGE'];
							$arr['year'] = $result['Year_book'];
							$arr['price'] = $result['Price_book'];						
							$json[] = $arr;
						}
					
					}
				
				}
				// echo "<pre>";
				// print_r($json);
				echo json_encode($json);
	}
function Search_Data($con, $key, $val){
			$mysqli = mysqli_query($con, 'select * from book_store_tb as d1
										  inner join regis_books_tb as d2 
										  on(d1.IDLIKBOOK = d2.IDLIKBOOK)
										  where d1.GMDCODE = "'.$key.'" order by d1.IDLIKBOOK desc');
			$numrow = mysqli_num_rows($mysqli);	
							 
			while($result = mysqli_fetch_array($mysqli)){
				if($val != ''){
					if($val ==  $result['Year_book']){
						$arr['bc'] = $result['BARCODE'];
						$arr['name'] = $result['NAME_BOOK'];
						$arr['isbn'] = $result['ISBN'];
						$arr['cpage'] = $result['COUNTPAGE'];
						$arr['year'] = $result['Year_book'];
						$arr['price'] = $result['Price_book'];
						$arr['num'] = $numrow;
						$json[] = $arr;
						}
					}
				}
			
				// print_r($json);
				echo json_encode($json);
	}	
	
	
?>




















































