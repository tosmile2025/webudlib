<?php 
	include('../connectdata/cnectDB.php');
$output = '';
$query = '';
		/*$_POST['type'] = '';
		$_POST['schText'] = '';*/
		
//$data = "205337";	
//$_POST['data']= "209259";
//$_POST['data']= "109422";
//$_POST['data']= "R02129";	 // ไม่มีผู้แต่ง
//$_POST['data']= "ปากกาคอม"; // ไม่มีข้อมูล	
//$_POST['schText']= "หัวใจ";// หลายอเรย์	
//$_POST['schText']= "เซียงหมี";	// มีข้อมูล 8 ชื่อเรื่อง
//$_POST['schText']= "211790";	// มีข้อมูล 8 ชื่อเรื่อง
//$_POST['schText']= "Maxillofacial surgery V.2";	// มีข้อมูล  1ชื่อเรื่อง
//$_POST['type'] = 'Hname';
		if($_POST['schText'] == ''){
					//echo "test1";
					showdata_Nodata($con, $output, $query);
					}else if($_POST['schText'] != ''){
						$dataSch = $_POST['schText'];
						$dataType = $_POST['type'];						
						showdata_haveData($con, $dataSch, $dataType);										
						}
							
function showdata_Nodata($con, $output, $query){						
				
					$query = "
								SELECT * FROM book_store_tb AS d1 INNER JOIN regis_books_tb AS d2 ON
								(d1.IDLIKBOOK = d2.IDLIKBOOK) order by IDKEY_REGIS desc limit 50" ;
				
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
							$arr_set['byname'] = "";
							$arr_set['publish_tb'] = "";
							$arr_set['Key_O'] = "";
							$arr_set['Key_M'] = "";
							$arr_set['Key_E'] = "";
								
							$arr_row[] = $arr_set;
							}
				/*echo"<pre>";
					print_r($arr_row);
					echo "</pre>";*/
							LisveSearch_arr($con, $arr_row);
			//echo json_encode($arr_row);
					/*echo"<pre>";
					print_r($arr_row);
						echo "</pre>";*/
		
	}							
function showdata_haveData($con, $dataSch, $dataType){
	//echo "HAVE TO DATA";
		if($dataType == "nm"){ // ทำแล้ว
			$str = "NAME_BOOK";
			$text = $dataSch;
			mySearch_dataText($con, $str, $text);
			}else if($dataType == "bc"){ // ทำแล้ว
				$str = "BARCODE";
				$text = $dataSch;
				mySearch_dataText($con, $str, $text);
				}else if($dataType == "isbn"){// ทำแล้ว
					$str = "ISBN";
					$text = $dataSch;
					mySearch_dataText($con, $str, $text);
					}else if($dataType == "by"){// กำลังทำ
						$str = "NAME_BY";
						$text = $dataSch;
						myFun_searchByauthor($con, $str, $text);
						}else if($dataType == "Hname"){							
							$text = $dataSch;// ทำแล้ว
							 mFunc_SearchHeadnamebooks($con, $text);
							}
		
										
}
function mFunc_SearchHeadnamebooks($con, $text){
	//echo $text;
	$sqli = mysqli_query($con, 'SELECT * FROM book_store_tb d1 
										INNER JOIN regis_books_tb AS d2 ON
										(d1.IDLIKBOOK = d2.IDLIKBOOK)
										INNER JOIN album_pmrk_tb AS d3 ON
										(d2.IDLIKBOOK = d3.LINK_ALBUM)
										INNER JOIN sub_album_tb AS d4 ON 
										(d3.SUB_ID = d4.id_album)WHERE d4.SUBTYPE = "S" AND d4.album_name like "'.$text.'%" limit 1000');	
			$num = mysqli_num_rows($sqli);
	if($num>0){
											
		while($result = mysqli_fetch_array($sqli)){
					$arr_json['IDLIKBOOK'] =  $result['IDLIKBOOK'];
					$arr_json['BARCODE'] =  $result['BARCODE'];
					$arr_json['NAME_BOOK'] = $result['NAME_BOOK'];
					$arr_json['ISBN'] =  $result['ISBN'];
					$arr_json['PUBCODE'] = $result['PUBCODE'];	
					$arr_json['publish'] = "";				
					$arr_json['COUNTPAGE'] = $result['COUNTPAGE'];
					$arr_json['Year_book'] = $result['Year_book'];
					$arr_json['BYNUM'] = $result['BYNUM'] ;
					$arr_json['lang'] = $result['lang'];
					$arr_json['Catbook_store'] = $result['Catbook_store'];
					$arr_json['GMDCODE'] = $result['GMDCODE'];
					$arr_json['TYPE-text'] = $result['SUBTYPE'];					
					$arr_json['byname'] = "";					
					$arr_json['Key_O'] = "";
					$arr_json['Key_M'] = "";
					$arr_json['Key_E'] = "";
					$arr_jsonrow[] = $arr_json;
					/*echo "<pre>";
					print_r($result);*/
				}
				
				
			}else{
				mysqli_close($con);
				}
			if(count($arr_jsonrow)>0){
					//echo "<pre>";
					//print_r($arr_row);
					publisher($con, $arr_jsonrow);
					//LisveSearch_arr($con, $arr_row);	
				}			
	}
	
function publisher($con, $arr_jsonrow){
	foreach($arr_jsonrow as $arrval){
	
			$mysqli = mysqli_query($con, 'select * from lpublish_tb
									where PUBID_tb = "'.$arrval['PUBCODE'].'"');
									
			$assoc = mysqli_fetch_assoc($mysqli);	
			
			if($assoc != ""){
							$arrval['publish'] = $assoc['PUBNAME'].",".$assoc['PUBADRESS'];
							$arr_row[] = $arrval;							
							}else{
									$arr_row[] = $arrval;
									//echo "ว่าง";
									}					
		}
					LisveSearch_arr($con, $arr_row);	
					//echo "<pre>";
					//print_r($arr_row);
	
	}	
	
	
	

function myFun_searchByauthor($con, $str, $text){// ผู้แต่ง
		//echo "<pre>";
		//	print_r($text);
					$arBy['IDLIKBOOK'] =  "";
					$arBy['BARCODE'] =  "";
					$arBy['NAME_BOOK'] = "";
					$arBy['ISBN'] =  "";
					$arBy['PUBCODE'] = "";
					$arBy['COUNTPAGE'] = "";
					$arBy['Year_book'] = "";
					$arBy['BYNUM'] ="";
					$arBy['lang'] = "";
					$arBy['Catbook_store'] ="";
					$arBy['GMDCODE'] ="";
					$arBy['publish'] = "";
					$arBy['byname'] = "";					
					$arBy['Key_O'] = "";
					$arBy['Key_M'] = "";
					$arBy['Key_E'] = "";		
					
		$sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 inner join byathor_tb as d2 
							on(d1.LINK_athor = d2.LINKCODE) where NAME_BY like "'.$text.'%" limit 1000');
		$num = mysqli_num_rows($sqli);	
		//echo $num;
		if($num >0){
					while($byname = mysqli_fetch_array($sqli)){	
						$arBy['IDLIKBOOK'] =  $byname['LINK'];				
						$arBy['byname'] = $byname['NAME_BY'];
						$arrby[] = $arBy;
		
					}
			}else{
				$sqli_main = mysqli_query($con, 'select * from athor_main_tb where detail_athormain_tb like "'.$text.'%"  order by id_thorEn desc limit 1000');				
				$num_main = mysqli_num_rows($sqli_main);
				if($num_main >0){
					
				//echo "มี";
						while($byname_main = mysqli_fetch_array($sqli_main)){
						$arBy['IDLIKBOOK'] = $byname_main['blink_athor'];							
						$arBy['Key_O'] = $byname_main['detail_athormain_tb'];
						$arrby[] = $arBy;
			
						}
					}else{
						
						
						}
				
				}				
		
		if(count($arrby)>0){
				//echo "<pre>";
				//print_r($arrby);
			//actionFunctionHub($con, $arBy);
			myFun_searchByauthor_subTwo($con, $str, $text, $arrby);
			}else{
				mysqli_close($con);
				}
	
	}
function myFun_searchByauthor_subTwo($con, $str, $text, $arrby){
		//echo $text;
			foreach($arrby as $val){
				//echo $val['IDLIKBOOK'];
				
				$sqli = mysqli_query($con, 'SELECT * FROM book_store_tb AS d1 
										INNER JOIN regis_books_tb AS d2 ON
										(d1.IDLIKBOOK = d2.IDLIKBOOK)
										WHERE d2.IDLIKBOOK = "'.$val['IDLIKBOOK'].'" ');	
						$result = mysqli_fetch_assoc($sqli);
						//echo $result['IDLIKBOOK']."<pre>";
						$val['BARCODE']	 = 		 $result['BARCODE'];
						$val['NAME_BOOK']	 = 		$result['NAME_BOOK'];
						$val['ISBN']		 =  			$result['ISBN'];
						$val['PUBCODE'] 	= 			$result['PUBCODE'];
						$val['COUNTPAGE'] = 		$result['COUNTPAGE'];
						$val['Year_book'] = 		$result['Year_book'];
						$val['BYNUM'] 	=  			$result['BYNUM'] ;
						$val['lang'] 		= 			$result['lang'];
						$val['Catbook_store'] = 	$result['Catbook_store'];
						$val['GMDCODE'] =  		$result['GMDCODE'];						
						$arr_all[] = $val;
							
				}
				 $arr_by =  $arr_all;
	//	echo"<pre>";
		//print_r($arr_by);
		ShowLivSearch_all_sub($con, $arr_by);
	}
//(d1.IDLIKBOOK = d2.IDLIKBOOK) order by IDKEY_REGIS desc limit 50" ;	

function mySearch_dataText($con, $str, $text){
	
			$sqli = mysqli_query($con, 'SELECT * FROM book_store_tb AS d1 
										INNER JOIN regis_books_tb AS d2 ON
										(d1.IDLIKBOOK = d2.IDLIKBOOK)
										WHERE '.$str.' like "'.$text.'%"  order by d2.IDKEY_REGIS desc limit 1000');										
			while($row = mysqli_fetch_array($sqli)){
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
							$arr_set['byname'] = "";
							$arr_set['publish'] = "";	
							$arr_set['Key_O'] = "";
							$arr_set['Key_M'] = "";	
							$arr_row[] = $arr_set;
				
				}
		//echo"<pre>";
		//echo json_encode($arr_row);	
		if(count($arr_row)>0){
			LisveSearch_arr($con, $arr_row);
			}else{
				mysqli_close($con);
				}
		
	}

	
function LisveSearch_arr($con, $arr_row){
		//echo json_encode($arr_row);
//echo $arr_row[4][0];	
foreach ($arr_row as $key => $val){	
		/*echo"<pre>";
			print_r($val);
			echo "</pre>";*/
	$sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 
									inner join byathor_tb as d2 on(d1.LINK_athor = d2.LINKCODE)
									where d1.LINK = "'.$val['IDLIKBOOK'].'"');

	$row = mysqli_fetch_assoc($sqli);	
			if($val['IDLIKBOOK']== $row['LINK']){
				
				//echo"<pre>";
				//echo "ไม่ว่าง";
				//echo $row['NAME_BY'].$val['BARCODE'];
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

//---------------------	
function ShowLivSearch_all_sub($con, $arr_by){	
	/*echo "<pre>";
	print_r($arr_by);*/
	foreach($arr_by as $idpub =>$value_pub){
					/*echo "<pre>";
					echo  $value_pub['BARCODE'];*/
					$sqli_pub = mysqli_query($con, 'SELECT * FROM lpublish_tb
											WHERE PUBID_tb = "'.$value_pub['PUBCODE'].'"');	
					/*echo"<pre>";
					echo $value['IDLIKBOOK'];*/
					$data_pub = mysqli_fetch_assoc($sqli_pub);
					//echo $data_pub['PUBNAME'];
						if($data_pub != ""){
							$value_pub['publish'] = $data_pub['PUBNAME'].",".$data_pub['PUBADRESS'];
							$arr_by_pub[] = $value_pub;							
							}else{
									$arr_by_pub[] = $value_pub;
									//echo "ว่าง";
									}
						
		}
	/*echo "<pre>";
	print_r($arr_by_pub);*/
	
	foreach($arr_by_pub as $idkey =>$value){
					/*echo "<pre>";
					echo  $value['BARCODE'];*/
					$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$value['IDLIKBOOK'].'" and TYPE = "O"');					
					$result = mysqli_fetch_assoc($sqli);
					/*echo"<pre>";
					echo $value['IDLIKBOOK'];*/
					
						if($result != ""){
							$value['Key_O'] = $result['detail_athormain_tb'];
							$arr_by_main[] = $value;							
							}else{
									$arr_by_main[] = $value;
									//echo "ว่าง";
									}
						
		}
		
		foreach($arr_by_main as $txttype){
				//echo $txttype['BARCODE'];
					$sqli_M = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$txttype['BARCODE'].'"');
					$data = mysqli_fetch_assoc($sqli_M);
					//echo "<pre>";
				//	print_r($data);
						if($data != ""){
							//echo "test";
							$txttype['Key_M'] = $data['detail_athormain_tb'];
							$arr_by_main_M[] = $txttype;							
							}else{
									$arr_by_main_M[] = $txttype;
									//echo "ว่าง";
									}	
					
			
			
			
			}
			foreach($arr_by_main_M as $txt_E){
				//echo $txttype['BARCODE'];
					$sqli_E = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$txttype['IDLIKBOOK'].'" and TYPE = "E"');
					$data_E = mysqli_fetch_assoc($sqli_E);
					//echo "<pre>";
				//	print_r($data);
						if($data_E != ""){
							//echo "test";
							$txt_E['Key_E'] = $data_E['detail_athormain_tb'];
							$arr_by_main_E[] = $txt_E;							
							}else{
									$arr_by_main_E[] = $txt_E;
									//echo "ว่าง";
									}	
					
			
			
			
			}
			
			
				//echo"<pre>";
				//print_r($arr_by_main_E);
				echo json_encode($arr_by_main_E);

}		
	
				
?>


















