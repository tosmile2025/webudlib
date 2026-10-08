<?php 
	include('../connectdata/cnectDB.php');
	//S$_POST['bcode'] = '211791';
		if(isset($_POST['bcode'])){
				$data = $_POST['bcode'];
					$sqli_sch = mysqli_query($con, 'select * from regis_books_tb as d1
												inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
												where BARCODE = "'.$data.'"');
			$result_sch = mysqli_fetch_assoc($sqli_sch);
			$path_isbn = $result_sch['ISBN'];
			$path = "../COVERIMAGES/".$path_isbn.".jpg";
			//echo $path;
			if($path_isbn != ""){
					if(file_exists($path)){
						//echo "มี";
						$isbn =$path_isbn;
						$str_chkpic = "P";
						}else{
							//echo "ไม่มี";
							$isbn = "";
							$str_chkpic = "N";
							}
				}
			
			
					$sqli = mysqli_query($con, 'select * from exportbook_tb as d1
												inner join user_tb as d2 
												on(d1.IDuser_exbook = d2.IDUSERCODE)
												where ID_ex_barcodebook = "'.$data.'" and Active_book = 1
												and id_exbook = (select max(id_exbook) from exportbook_tb
												where ID_ex_barcodebook = "'.$data.'" and Active_book = 1)');
						while($result = mysqli_fetch_array($sqli)){							
							$arr['bcexbook'] = $result['ID_ex_barcodebook'];
							$arr['xport'] = "2";
							$arr['Dend'] = $result['Day_end'];
							$arr['FNAME'] = $result['FNAME'];
							$arr['LNAME'] = $result['LNAME'];
							$arr['isbn'] = $isbn;
							$arr['str_pic'] = $str_chkpic;
							$arr_sum[] = $arr;
							}
												
			//echo array_count($arr_sum);				
							
													
		Myfunc_check($con, $data, $arr_sum, $isbn, $str_chkpic);
			//echo "<pre>";
			//print_r($arr_sum);
			//echo count($arr_sum);
			}
			
function  Myfunc_check($con, $data, $arr_sum, $isbn, $str_chkpic){
	
		if($arr_sum != ""){
			
			//echo "มี";
			Check_orderbook($con, $data, $arr_sum, $isbn, $str_chkpic);
			}else{
				
				Func_chkOrder($con, $data, $isbn, $str_chkpic);
				}
			/*echo "<pre>";
			print_r($arr);*/
	}
	
function Check_orderbook($con, $data, $arr_sum, $isbn, $str_chkpic){
	
		$sqli = mysqli_query($con, 'select * from orderbook_tb as d1
									inner join user_tb as d2 
									on(d1.IDuser_order = d2.IDUSERCODE) 
									where IDbook_order = "'.$data.'" and Active_order = 1');
						while($resultOrder = mysqli_fetch_array($sqli)){							
							$arr_order['idorderbk'] = $resultOrder['IDbook_order'];
							$arr_order['order'] = "5";
							$arr_order['order_day'] = $resultOrder['order_day'];
							$arr_order['number'] = $resultOrder['Order_book'];
							$arr_order['FNAME'] = $resultOrder['FNAME'];
							$arr_order['LNAME'] = $resultOrder['LNAME'];							
							$arr_odrsum[] = $arr_order;
							}
						//echo "<pre>";
						//print_r($arr_odrsum);	
					//echo count($arr_odrsum);							
					if($arr_odrsum != ""){
						
						$mage = array_merge($arr_sum,$arr_odrsum);
						//echo "<pre>";
						//print_r($mage);
						echo json_encode($mage);							
					}else{
						
						echo json_encode($arr_sum);
							/*echo "<pre>";
							print_r($arr_sum);	*/			
						}
						
	}
function Func_chkOrder($con, $data, $isbn, $str_chkpic){
			$sqli = mysqli_query($con, 'select * from orderbook_tb as d1
									inner join user_tb as d2 
									on(d1.IDuser_order = d2.IDUSERCODE) 
									where IDbook_order = "'.$data.'" and Active_order = 1');
						while($resultOrder = mysqli_fetch_array($sqli)){
							$arr_order['str'] = "HAVE";
							$arr_order['idorderbk'] = $resultOrder['IDbook_order'];
							$arr_order['order'] = "5";
							$arr_order['isbn'] = $isbn;
							$arr_order['str_pic'] = $str_chkpic;
							$arr_order['order_day'] = $resultOrder['order_day'];
							$arr_order['number'] = $resultOrder['Order_book'];
							$arr_order['FNAME'] = $resultOrder['FNAME'];
							$arr_order['LNAME'] = $resultOrder['LNAME'];
							$arr_odrsum[] = $arr_order;
							}
					//echo count($arr_odrsum);							
					if($arr_odrsum != ""){
						echo json_encode($arr_odrsum);
						}else{
							$arr['str'] = "NO";
							$arr['pic'] = $isbn;
							$arr['str_pic'] = $str_chkpic;
							echo json_encode($arr);
							}
						
	}					

?>