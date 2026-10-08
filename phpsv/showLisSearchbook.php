<?php 
	include('../connectdata/cnectDB.php');
$output = '';
$query = '';
//$d ="A";
//$_POST['data'] = "";	
//$_POST['data'] = "FR";	
//$_POST['data']= "F08981";
//$_POST['data']= "909422";
//$_POST['data']= "R02129";	 // ไม่มีผู้แต่ง
//$_POST['data']= "ปากกาคอม"; // ไม่มีข้อมูล	
//$_POST['data']= "ทดสอบ";// หลายอเรย์	
//$_POST['data']= "ยอดหญิงหมอเทวดา";	// มีข้อมูล  3 ชื่อเรื่อง
//(!isset($str) || trim($str)="" )

$fix = array('.', 'F','R','2','1','3','4','5','6','7','8','9');						
			
if(isset($_POST['data']))
				{
				$data = $_POST['data'];
				$str = substr($data,0,1);
	
	$sch =  array_search($str,$fix,true);
	//echo $sch;
	if(empty($sch)){
		//echo "ว่าง";
		HupSearch_live($con, $data, $output, $query);
		}else{
			//echo ":ไม่ว่าง";
			HupBarcodeSearch($con, $data, $output, $query);
			}	
	}
function HupBarcodeSearch($con, $data, $output, $query){
	
			$sqli = mysqli_query($con, 'select * from regis_books_tb as d1
										inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
										where BARCODE regexp "'.$data.'" limit 100');
			$numrow = mysqli_num_rows($sqli);														
				if($numrow >0){													
									while($row_sqli = mysqli_fetch_array($sqli)){
										$arr_set['IDLIKBOOK'] = $row_sqli['IDLIKBOOK'];
										$arr_set['NAME_BOOK'] = $row_sqli['NAME_BOOK'];
										$arr_set['ISBN'] = $row_sqli['ISBN'];
										$arr_set['PUBCODE'] = $row_sqli['PUBCODE'];
										$arr_set['COUNTPAGE'] = $row_sqli['COUNTPAGE'];
										$arr_set['Year_book'] = $row_sqli['Year_book'];
										$arr_set['BYNUM'] = $row_sqli['BYNUM'];
										$arr_set['lang'] = $row_sqli['lang'];
										$arr_set['Catbook_store'] = $row_sqli['Catbook_store'];
										$arr_set['GMDCODE'] = $row_sqli['GMDCODE'];
										$arr_set['BARCODE']= $row_sqli['BARCODE'];
										$arr_set['byname']= "";
										$arr_set['Key_O']= "";
										$arr_set['Key_M']= "";
										
											
										$arr_row[] = $arr_set;
											}
									if($arr_row !=""){
								LisveSearch_arr($con, $arr_row);
								}else{
								mysqli_close($con);
								//echo"ไม่พบข้อมูล";
									}			
											
				}else{
					HupSearch_live($con, $data, $output, $query);
					
					}
	}	
				
	
function HupSearch_live($con, $data, $output, $query){
			$query = "
								SELECT * FROM book_store_tb 
								WHERE NAME_BOOK REGEXP '".$data."' 
								OR IDLIKBOOK REGEXP '".$data."' 
								GROUP BY IDLIKBOOK DESC limit 100 
							 ";
				
					$result = mysqli_query($con,$query);	
					$num_row = mysqli_num_rows($result);					
					//echo $num_row;
				
							while($row = mysqli_fetch_array($result))
								{
									
									$arr_set['IDLIKBOOK'] = $row['IDLIKBOOK'];
									$arr_set['NAME_BOOK'] = $row['NAME_BOOK'];
									$arr_set['ISBN'] = $row['ISBN'];
									$arr_set['PUBCODE'] = $row['PUBCODE'];
									$arr_set['COUNTPAGE'] = $row['COUNTPAGE'];
									$arr_set['Year_book'] = $row['Year_book'];
									$arr_set['BYNUM'] = $row['BYNUM'];
									$arr_set['lang'] = $row['lang'];
									$arr_set['Catbook_store'] = $row['Catbook_store'];
									$arr_set['GMDCODE'] = $row['GMDCODE'];
									$arr_set['BARCODE']= $row['BARCODE'];
									$arr_set['byname']= "";
									$arr_set['Key_O']= "";
									$arr_set['Key_M']= "";
										
									$arr_row[] = $arr_set;
									}
									
			if($arr_row !=""){
				LisveSearch_arr($con, $arr_row);
				}else{
				mysqli_close($con);
				//echo"ไม่พบข้อมูล";
					}	
				/*echo"<pre>";
					print_r($arr_row);
					echo "</pre>";*/
	}
	
	
			
function LisveSearch_arr($con, $arr_row){
		//echo json_encode($arr_row);
//echo $arr_row[4][0];	
foreach ($arr_row as $key => $val){			
	$sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 
									inner join byathor_tb as d2 on(d1.LINK_athor = d2.LINKCODE)
									where d1.LINK = "'.$val['IDLIKBOOK'].'"');

	$row = mysqli_fetch_assoc($sqli);	
			if($val['IDLIKBOOK']== $row['LINK']){
				$val['byname']= $row['NAME_BY'];
				$arr_by[] = $val;
				}else{
					$val['byname']= "";
					$arr_by[] = $val;
					// echo 'ว่าง';
					}		
	
		}
	/*echo"<pre>";
	print_r($arr_by);*/
	ShowLivSearch_all_sub($con, $arr_by);
	}

function ShowLivSearch_all_sub($con, $arr_by){	
	foreach($arr_by as $idkey =>$value){
					/*echo "<pre>";
					echo  $value['IDLIKBOOK'];*/
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'"');
					$num_byathor = mysqli_num_rows($sqli);
					if($num_byathor >0){
						$result = mysqli_fetch_assoc($sqli);				
						if($result['TYPE'] == "O"){
							$value['Key_O'] = $result['detail_athormain_tb'];
							 $arrvalue[] = $value;	
							/*echo"<pre>";
							 echo $value['IDLIKBOOK'];	*/				
							}else{
								$arrvalue[] = $value;
							/*echo"<pre>";
								echo $value['IDLIKBOOK'];	*/
							}				
					}else{
						$arrvalue[] = $value;
					}
				
		}	
			/*echo"<pre>";
			print_r($arrvalue);*/
			echo json_encode($arrvalue);
	}	

				
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 