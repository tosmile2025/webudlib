<?php 
	include('../connectdata/cnectDB.php');
/*$output = '';
$query = '';
*/
//$_POST['data'] = "1044616";//"1044630";	
//  $_POST['data'] = "1044630";	
// $_POST['data']= "1044535";	
//  $_POST['data'] = "1044638";	
if(isset($_POST['data']))
				{
					$data = $_POST['data'];
					
					
				$qry = mysqli_query($con, 'select * from regis_books_tb
											where IDLIKBOOK = "'.$data.'"');
				$numrows = mysqli_num_rows($qry);
				//  echo $numrows;	
				if($numrows > 0){
						
									$query = "
												SELECT * FROM regis_books_tb AS d1 INNER JOIN book_store_tb AS d2 
												ON(d1.IDLIKBOOK = d2.IDLIKBOOK)
												WHERE d1.IDLIKBOOK = '".$data."'
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
											$arr_set['CATBOOK'] = $row['CATBOOK'];
											$arr_set['byauthor'] = $row['byauthor'];
											$arr_set['GMDCODE'] = $row['GMDCODE'];
											$arr_set['IDBY'] = "";
											$arr_set['key_O'] = "";
											$arr_set['key_E'] = "";
											$arr_set['pub'] = "";
											$arr_set['pub_address'] = "";
												
											$arr_row[] = $arr_set;
											}
									// echo"<pre>";
									// print_r($arr_row);
									// echo "</pre>";
											showLiveSearch_all_sub_fix($con, $arr_row);
							//echo json_encode($arr_row);
									/*echo"<pre>";
									print_r($arr_row);
									echo "</pre>";*/
					}else{
		
					Func_show_book_store($con, $data);
				}
	}
function Func_show_book_store($con, $data){
									$qry = mysqli_query($con, 'select * from book_store_tb
											where IDLIKBOOK = "'.$data.'"');
								
										
										while($row = mysqli_fetch_array($qry))
										{
											
											$arr_set['IDLIKBOOK'] = $row['IDLIKBOOK'];
											$arr_set['BARCODE'] = '';
											$arr_set['NAME_BOOK'] = $row['NAME_BOOK'];
											$arr_set['ISBN'] = $row['ISBN'];
											$arr_set['PUBCODE'] = $row['PUBCODE'];
											$arr_set['COUNTPAGE'] = $row['COUNTPAGE'];
											$arr_set['Year_book'] = $row['Year_book'];
											$arr_set['BYNUM'] = $row['BYNUM'];
											$arr_set['lang'] = $row['lang'];
											$arr_set['Catbook_store'] = $row['Catbook_store'];
											$arr_set['CATBOOK'] = "";
											$arr_set['byauthor'] = "";
											$arr_set['GMDCODE'] = $row['GMDCODE'];
											$arr_set['IDBY'] = "";
											$arr_set['key_O'] = "";
											$arr_set['key_E'] = "";
											$arr_set['pub'] = "";
											$arr_set['pub_address'] = "";											
											$arr_row[] = $arr_set;
											}
								/*echo"<pre>";
									print_r($arr_row);*/
										
						//echo json_encode($arr_row);					
	showLiveSearch_all_sub_fix($con, $arr_row);
	}								
function showLiveSearch_all_sub_fix($con, $arr_row){
	$arrvalue =[];
		foreach($arr_row as $idkey =>$value){
						//echo $value['IDLIKBOOK'];
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'"');					
					$num_byathor = mysqli_num_rows($sqli);
					if($num_byathor >0){

						while($result = mysqli_fetch_assoc($sqli)){
							if($result['TYPE'] == "O"){
								$value['key_O'] = $result['detail_athormain_tb'];
								$arrvalue = $value;									 
								/*echo"<pre>";
								 echo $value['IDLIKBOOK'];	*/				
								}else if($result['TYPE'] == "E"){
									$value['key_E'] = $result['detail_athormain_tb'];									
									$arrvalue = $value;	
									/*echo"<pre>";
									 echo $value['IDLIKBOOK'];	*/				
								}
						}

					}else{
						 $arrvalue = $value;
					}
				}
					//  echo "<pre>";
					//   print_r($arrvalue);
					$arrx[] = $arrvalue;
					
							
			 func_lastStep($con, $arrx);					
	
	//  echo "<pre>";
	// print_r($arrx);
	}
function func_lastStep($con, $arr_row){
		$arr=[];
	foreach($arr_row as $val){
		/*echo $all_merge_array2[$pub]['PUBCODE'];*/
		//  echo $val['PUBCODE'];
	$sqli_pub = mysqli_query($con, 'select * from lpublish_tb where PUBID_tb = "'.$val['PUBCODE'].'"');
		$numrow = mysqli_num_rows($sqli_pub);
		$result =mysqli_fetch_assoc($sqli_pub);
			if($numrow > 0){
			
					if($val['PUBCODE'] == $result['PUBID_tb']){
						
						$val['pub'] = $result['PUBNAME'];
						$val['pub_address'] = $result['PUBADRESS'];
						$arr = $val;
				}				
			}else{
				$arr = $val;
			}
		
		}
		$json[] = $arr;	
	//  echo"<pre>";
	//  print_r($arr);
		
	echo json_encode($json);
}
			
 ?>