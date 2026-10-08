<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['data'] = "211794";
	$datx = date("y-m-d");
	//echo $dat;
	 if(isset($_POST['data'])){
		 $data = $_POST['data'];
		 
					$query = "
								SELECT * FROM book_store_tb AS d1
								INNER JOIN  regis_books_tb AS d2
								ON(d1.IDLIKBOOK = d2.IDLIKBOOK)
								WHERE BARCODE = '".$data."'; 
							 ";
				
						$result = mysqli_query($con,$query);
						
						while($row = mysqli_fetch_array($result))
						{
							
							$arr_set['IDLIKBOOK'] = $row['IDLIKBOOK'];
							$arr_set['BARCODE'] = $row['BARCODE'];
							$arr_set['NAME_BOOK'] = $row['NAME_BOOK'];
							$arr_set['ISBN'] = $row['ISBN'];
							$arr_set['PUBCODE'] = $row['PUBCODE'];
							$arr_set['COUNTPAGE'] = $row['COUNTPAGE'];
							$arr_set['Year_book'] = $row['Year_book'];
							$arr_set['BYNUM'] = $row['BYNUM'];
							$arr_set['lang'] = $row['lang'];
							$arr_set['Catbook_store'] = $row['Catbook_store'];
							$arr_set['GMDCODE'] = $row['GMDCODE'];
								
							$arr_row[] = $arr_set;
							}
						//echo count($arr_row);
						
		if(count($arr_row)>0){
			
			Func_Insert($con, $arr_row, $datx);
			
			}				
			
	}
function Func_Insert($con, $arr_row, $datx){
		foreach($arr_row as $val){
			//echo "<pre>";	
		//print_r($val);
			$slc = mysqli_query($con, 'select * from checkoutbook
										where barcode = "'.$val['BARCODE'].'" ');
			$count = mysqli_num_rows($slc);
			//echo $count;
			if($count>0){
			//	echo "ซ้ำ";
						$arr_str['str'] = "1"; 
						$mysqli = mysqli_query($con, 'SELECT * FROM checkoutbook ORDER BY id DESC');
						$coun = mysqli_num_rows($mysqli);
						while($result = mysqli_fetch_array($mysqli)){
							$jsonarr['str'] = "1"; 
							$jsonarr['id'] = $result['barcode'];
							$jsonarr['namebook'] = $result['namebook'];
							$jsonarr['year'] = $result['year'];
							$jsonarr['countx'] = $coun;
							$arrx[] = $jsonarr;
							}
							/*echo "<pre>";
							print_r($jsonarr);*/
							echo json_encode($arrx);
				}else{					
				$id = $val['BARCODE'];
				 $name = $val['NAME_BOOK'];
				 $year = $val['Year_book']	;
				 $datchk = $datx;		 
				// echo $val['BARCODE'];
				 $arr_str = '("'.$id.'","'.$name.'","'.$year.'","'.$datchk.'")';
				 $inSertData = "insert into checkoutbook(barcode,namebook,year,dt)values$arr_str";											
					//echo("Error description: " . mysqli_error($con));
					$resultx = mysqli_query($con,$inSertData) or die ("Error in query: $inSertData " . mysqli_error());
					//echo $resultx;
					if(!$inSertData){
					$mysqli = mysqli_query($con, 'SELECT * FROM checkoutbook ORDER BY checkoutbook.id DESC LIMIT 150');
						$coun = mysqli_num_rows($mysqli);
						while($result = mysqli_fetch_array($mysqli)){							
							$jsonarr['str'] = "2"; 							
							$jsonarr['id'] = $result['barcode'];
							$jsonarr['namebook'] = $result['namebook'];
							$jsonarr['year'] = $result['year'];
							$jsonarr['countx'] = $coun;
							$arrx[] = $jsonarr;
							}
							/*echo "<pre>";
							print_r($jsonarr);*/
							echo json_encode($arrx);
							//echo "ok if";	
						}else{
					//echo "ok else";					
					//echo json_encode($arr_row);
						
						$mysqli = mysqli_query($con, 'SELECT * FROM checkoutbook ORDER BY checkoutbook.id DESC LIMIT 150');
						$coun = mysqli_num_rows($mysqli);
						while($result = mysqli_fetch_array($mysqli)){	
							$jsonarr['str'] = "3"; 						
							$jsonarr['id'] = $result['barcode'];
							$jsonarr['namebook'] = $result['namebook'];
							$jsonarr['year'] = $result['year'];
							$jsonarr['countx'] = $coun;
							$arrx[] = $jsonarr;
							}
							/*echo "<pre>";
							print_r($jsonarr);*/
							echo json_encode($arrx);
						
						
						
					}			
				}
			}
			
	
	}

	/*$inSertData = mysqli_query($con, "insert into checkoutbook(barcode,namebook,year)
									values('$val['BARCODE']','$val['NAME_BOOK']','$val['Year_book']')");	
									 echo("Error description: " . mysqli_error($con));*/
									// $result = mysqli_query($con,$sqli) or die ("Error in query: $sqli " . mysqli_error());	
?>