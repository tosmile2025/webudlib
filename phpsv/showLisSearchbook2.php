<?php 
	include('../connectdata/cnectDB.php');
$output = '';
$query = '';

//$data = "205337";	
$_POST['data']= "";			
if(isset($_POST['data']))
				{
					$data = $_POST['data'];
					$query = "
								SELECT * FROM book_store_tb AS d1 INNER JOIN regis_books_tb AS d2 
								ON(d1.IDLIKBOOK = d2.IDLIKBOOK)
								WHERE d1.NAME_BOOK REGEXP '".$data."' 
								OR d2.BARCODE REGEXP '".$data."' 
								GROUP BY d1.IDLIKBOOK limit 26
							 ";
				
						$result = mysqli_query($con,$query);
						while($row = mysqli_fetch_array($result))
						{
							
							$arr_set['IDLIKBOOK'] = $row['IDLIKBOOK'];
							$arr_set['BARCODE'] = $row['BARCODE'];
							$arr_set['NAME_BOOK'] = $row['NAME_BOOK'];
							$arr_set['ISBN'] = $row['ISBN'];
							$arr_set['PUBCODE'] = $row['PUBCODE'];
							$arr_set['Year_book'] = $row['Year_book'];
							$arr_set['BYNUM'] = $row['BYNUM'];
							$arr_set['lang'] = $row['lang'];
							$arr_set['Catbook_store'] = $row['Catbook_store'];
							$arr_set['CATBOOK'] = $row['CATBOOK'];
							$arr_set['byauthor'] = $row['byauthor'];
							if($row['GMDCODE']== "TE"){
								
								if($row['lang']=="TH"){
									$arr_set['GMDCODE'] = "TextTh";
									}else{
										$arr_set['GMDCODE'] = "TextEng";
										}
								}else if($row['GMDCODE'] =="FI"){
										$arr_set['GMDCODE'] = "นวนิยาย";
									}else if($row['GMDCODE'] =="PK"){
										$arr_set['GMDCODE'] = "Pocket book";
										}else if($row['GMDCODE'] =="R"){
											$arr_set['GMDCODE'] = "อ้างอิง";
											}else if($row['GMDCODE'] =="MZ"){
												$arr_set['GMDCODE'] = "นิตยสาร";
												}else if($row['GMDCODE'] =="PI"){
													$arr_set['GMDCODE'] = "Pocket book";
													}else if($row['GMDCODE'] =="80"){
															$arr_set['GMDCODE'] = "ธรรมะ";
														}else if($row['GMDCODE'] =="CD"){
														$arr_set['GMDCODE'] = "CD";
													}else if($row['GMDCODE'] =="GP"){
														$arr_set['GMDCODE'] = "สิ่งพิมพ์รัฐ";
												}else if($row['GMDCODE'] =="JE"){
													$arr_set['GMDCODE'] = "En Jnal";
											}else if($row['GMDCODE'] =="JO"){
												$arr_set['GMDCODE'] = "Th Jnal";
										}else if($row['GMDCODE'] =="JT"){
											$arr_set['GMDCODE'] =  "Th Jnal";
									}else if($row['GMDCODE'] =="SO"){
										$arr_set['GMDCODE'] = "Pocket book";	
								}else{
									$arr_set['GMDCODE'] = $row['GMDCODE'];
									}
								
							$arr_row[] = $arr_set;
							}
					/*echo"<pre>";
					print_r($arr_row);
					echo "</pre>";*/
							Query_array_Unique($con, $arr_row);
			//echo json_encode($arr_row);
					/*echo"<pre>";
					print_r($arr_row);
					echo "</pre>";*/
						
	}
	
		
function Query_array_Unique($con, $arr_row){
		//echo json_encode($arr_row);
//echo $arr_row[4][0];	
foreach ($arr_row as $key => $val){
	$sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 
									where d1.LINK = "'.$val['IDLIKBOOK'].'"
									group by d1.LINK');
			$numrow = mysqli_num_rows($sqli);
		while($arr_result = mysqli_fetch_array($sqli)){	
		
		//echo $val['IDLIKBOOK']."<br>";
		if($val['IDLIKBOOK'] == $arr_result['LINK']){
			
					$r[] = $arr_result['LINK'];
					$r[] = $arr_result['NAME_BY'];
			
			
			}
			
		}
	}
	echo "<pre>";
	print_r($r);
}
	
	
function QueryDb_athor_cat(){
	
	
	}	
function ShowLivSearch_else($con, $arr_row_val_else, $arr_row_val){
		/*echo"<pre>";
		print_r($arr_row_val_else);
		echo "</pre>";*/
	if($arr_row_val_else != null && $arr_row_val != null){
		
			ShowLivSearch_all($con, $arr_row_val_else, $arr_row_val);
		
		}else if($arr_row_val_else != null  && $arr_row_val == null){
			
				ShowLivSearch_all_sub($con, $arr_row_val_else);
			
			}else if($arr_row_val_else == null  && $arr_row_val != null){// if $arr_row_val_else == null
				showLiveSearch_all_sub_fix($con, $arr_row_val);
					
		}else if ($arr_row_val_else == null && $arr_row_val == null){
			
			
			}
		
		
					
	}
function showLiveSearch_all_sub_fix($con, $arr_row_val){
		foreach($arr_row_val as $idkey =>$value){
						//echo $value['IDLIKBOOK'];
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'"');
					$num_byathor = mysqli_num_rows($sqli);
					//echo $num_byathor;
						while($data = mysqli_fetch_array($sqli)){
							
							if($num_byathor > 0)
								$arr_athor[] = $data;
								
						}
								
							//$merge_arr = array_merge($value,$data_arr);
							
					}
					//print_r($arr_athor);
					foreach($arr_athor as $idkey_type => $data){
						
							//echo $arr_athor[$t]['blink_athor'];
							if($data['TYPE']== "O"){
								$data_arr['idkey'] = $data['blink_athor'];
								$data_arr['key_O'] = $data['detail_athormain_tb'];
								}else if($data['TYPE'] == "E"){
									$data_arr['idkey'] = $data['blink_athor'];
									$data_arr['key_E'] = $data['detail_athormain_tb'];
									}else if($data['TYPE'] == "M"){
										$data_arr['idkey'] = $data['blink_athor'];
										$data_arr['key_M'] = $data['detail_athormain_tb'];
										}
										$set[] = $data_arr;
						}
						/*echo"<pre>";
						print_r($arr_row_val);
						echo "</pre>";*/
				for($row =0; $row < count($arr_row_val);$row++){
						for($col =0; $col <count($set);$col++){
							//echo $arr_row_val[$row]['IDLIKBOOK']."<br>";
							//echo $set[$col]['idkey']."<br>";
							if($arr_row_val[$row]['IDLIKBOOK'] == $set[$col]['idkey']){
								
								//echo $arr_athor[$row]['blink_athor'];
								
								$arr_row_val[$row]['IDBY'] = $set[$col]['idkey'];
								$arr_row_val[$row]['key_O'] = $set[$col]['key_O'];
								$arr_row_val[$row]['key_E'] = $set[$col]['key_E'];
								}
							
							}
					
					}
					/*echo"<pre>";
						print_r($arr_row_val);
						echo "</pre>";*/
				
							
							
	echo json_encode($arr_row_val);
	}
	
//---------------------	
					
function ShowLivSearch_all($con, $arr_row_val_else, $arr_row_val){
		/*echo"<pre>";
		print_r($arr_row_val_else);
		echo "</pre>";*/
	
					foreach($arr_row_val_else as $idkey =>$value){
						//echo $value['IDLIKBOOK'];
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'"');
					$num_byathor = mysqli_num_rows($sqli);
						while($data = mysqli_fetch_array($sqli)){
							
							if($num_byathor > 0)
								$arr_athor[] = $data;
								
						}
								
							//$merge_arr = array_merge($value,$data_arr);
							
					}
		/*echo"<pre>";
		print_r($arr_row_val);
		echo "</pre>";*/
					foreach($arr_athor as $idkey_type => $data){
						
							//echo $arr_athor[$t]['blink_athor'];
							if($data['TYPE']== "O"){
								$data_arr['idkey'] = $data['blink_athor'];
								$data_arr['key_O'] = $data['detail_athormain_tb'];
								}else if($data['TYPE'] == "E"){
									$data_arr['idkey'] = $data['blink_athor'];
									$data_arr['key_E'] = $data['detail_athormain_tb'];
									}else if($data['TYPE'] == "M"){
										$data_arr['idkey'] = $data['blink_athor'];
										$data_arr['key_M'] = $data['detail_athormain_tb'];
										}
								$set[] = $data_arr;		
						}
		/*echo"<pre>";
		print_r($arr_row_val_else);//0000490
		echo "</pre>";*/	
				for($row =0; $row < count($arr_row_val_else);$row++){
					
						for($col =0; $col <count($set);$col++){
							//echo $arr_row_val_else[$row]['IDLIKBOOK']."<br>";
							//echo $set[$col]['idkey']."<br>";
							/*echo"<pre>";
							print_r($set);
							echo "</pre>";*/
							if($arr_row_val_else[$row]['IDLIKBOOK'] == $set[$col]['idkey']){
								
								//echo $arr_athor[$row]['blink_athor'];
								
								$arr_row_val_else[$row]['IDBY'] = $set[$col]['idkey'];
								$arr_row_val_else[$row]['key_O'] = $set[$col]['key_O'];
								$arr_row_val_else[$row]['key_E'] = $set[$col]['key_E'];
								//print_r($arr_row_val_else[$row]['key_E']);
								}
							
							}
		
					}
					
				
							$all_merge_array2 = array_merge($arr_row_val_else,$arr_row_val);
		/*echo"<pre>";
		print_r($arr_row_val);
		echo "</pre>";*/
					//echo json_encode($all_merge_array2);
				}	
function ShowLivSearch_all_sub($con, $arr_row_val_else){
		/*echo"<pre>";
		print_r($arr_row_val_else);
		echo "</pre>";*/
	
					foreach($arr_row_val_else as $idkey =>$value){
						//echo $value['IDLIKBOOK'];
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'"');
					$num_byathor = mysqli_num_rows($sqli);
						while($data = mysqli_fetch_array($sqli)){
							
							if($num_byathor > 0)
								$arr_athor[] = $data;
								
						}
								
							//$merge_arr = array_merge($value,$data_arr);
							
					}
					
					foreach($arr_athor as $idkey_type => $data){
						
							//echo $arr_athor[$t]['blink_athor'];
							if($data['TYPE']== "O"){
								$data_arr['idkey'] = $data['blink_athor'];
								$data_arr['key_O'] = $data['detail_athormain_tb'];
								}else if($data['TYPE'] == "E"){
									$data_arr['idkey'] = $data['blink_athor'];
									$data_arr['key_E'] = $data['detail_athormain_tb'];
									}else if($data['TYPE'] == "M"){
										$data_arr['idkey'] = $data['blink_athor'];
										$data_arr['key_M'] = $data['detail_athormain_tb'];
										}
										$set[] = $data_arr;
						}
				for($row =0; $row < count($arr_row_val_else);$row++){
						for($col =0; $col <count($set);$col++){
							//echo $arr_row_val_else[$row]['IDLIKBOOK']."<br>";
							//echo $set[$col]['idkey']."<br>";
							if($arr_row_val_else[$row]['IDLIKBOOK'] == $set[$col]['idkey']){
								
								//echo $arr_athor[$row]['blink_athor'];
								
								$arr_row_val_else[$row]['IDBY'] = $set[$col]['idkey'];
								$arr_row_val_else[$row]['key_O'] = $set[$col]['key_O'];
								$arr_row_val_else[$row]['key_E'] = $set[$col]['key_E'];
								}
							
							}
					
					}
					
		/*echo"<pre>";
		print_r($arr_row_val_else);
		echo "</pre>";*/
						//echo json_encode($arr_row_val_else);
						
					
				}	
				
		

				
 ?>