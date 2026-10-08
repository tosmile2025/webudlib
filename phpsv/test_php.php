<?php
	include('../connectdata/cnectDB.php');
		//$codeLink = "1043119"; //211791
		//$codeLink = "1008902"; //F00697 00F
		//$codeLink = "100060"; //F00697 00F
		//$codeLink = "205304";	//205304
		
if(isset($_POST['idlinkbk'])){
		
		$codeLink = $_POST['idlinkbk'];
		$sqli = mysqli_query($con, 'select * from regis_books_tb as d1 
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									inner join lpublish_tb as d3 on(d2.PUBCODE = d3.PUBID_tb) 
									where d1.BARCODE = "'.$codeLink.'" group by d1.BARCODE');
		
		
		$result = mysqli_fetch_assoc($sqli);
		$id_Link = $result['IDLIKBOOK'];
		
		
		DataQueryBookDetail($con, $codeLink);
		//DataQueryBookDetail($con, $codeLink);
		}	
		
function DataQueryBookDetail($con, $codeLink){
	$sqli = mysqli_query($con, 'select * from regis_books_tb as d1 
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									inner join lpublish_tb as d3 on(d2.PUBCODE = d3.PUBID_tb) 
									where d1.BARCODE = "'.$codeLink.'"');
	$numrow = mysqli_num_rows($sqli);
	
	if($numrow > 0){								
			$sqli = mysqli_query($con, 'select * from regis_books_tb as d1 
											inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
											inner join lpublish_tb as d3 on(d2.PUBCODE = d3.PUBID_tb) 
											where d1.BARCODE = "'.$codeLink.'"');
			}else{
				$sqli = mysqli_query($con, 'select * from regis_books_tb as d1 
											inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
											where d1.BARCODE = "'.$codeLink.'"');
				
				}
				while($result = mysqli_fetch_array($sqli)){
						$sub['Gmd'] = $result['GMDCODE'];
						$sub['Name_book'] = $result['NAME_BOOK'];
						$sub['Isbn'] = $result['ISBN'];
						$sub['Pubcode'] = $result['PUBCODE'];
						$sub['Year_book'] = $result['Year_book'];
						$sub['Countpage'] = $result['COUNTPAGE'];
						$sub['Bynum'] = $result['BYNUM'];
						$sub['Year'] = $result['YEAR'];
						$sub['Lang'] = $result['Lang'];
						$sub['Catbook_store'] = $result['Catbook_store'];
						$sub['Price_bath'] = $result['price_bath'];
						$sub['Catbook'] = $result['CATBOOK'];
						$sub['RegisDatebooks'] = $result['regisDatebooks'];
						$sub['CodeByauthor'] = $result['byauthor'];
						$sub['Copybook'] = $result['COPYBOOK'];
						$sub['Byname'] = $result['PUBNAME'];
						$sub['Byadress'] = $result['PUBADRESS'];
						$data_details = $sub;
					
					
					}
				//print_r($data_details);
			checkMani_athor_tb($con, $codeLink, $data_details);
		
	}

function checkMani_athor_tb($con, $codeLink, $data_details){
	
	
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$codeLink.'"');
			$numrows =mysqli_num_rows($sqli);
			while($result = mysqli_fetch_array($sqli)){
				$data_type['id'] = $result['blink_athor'];
				$data_type['id_tb'] = $result['id_thorEn'];
				$data_type['type'] = $result['TYPE'];
				$data_type['txt'] = $result['detail_athormain_tb'];
				$data_set[] = $data_type;
				
				
			}
			
			foreach($data_set as $key => $value){
				if($value['type']== "O"){
					$txt_O = $value['txt'];
					$data_arr['key_O'] = $txt_O;
					}else if($value['type'] == "E"){
						$txt_E = $value['txt'];
						$data_arr['key_E'] = $txt_E;
						}else if($value['type'] == "M"){
							$txt_M = $value['txt'];
							$data_arr['key_M'] = $txt_M;
							}				
				}
				
				if($data_arr == null){
					
					checkAthorCatcheckAthorCat_if($con, $codeLink, $json, $data_details); //ทำงานใช้ได้้แล้ว
					
					}else{
						$arr_merge = array_merge($data_arr, $data_details);
						checkAthorCatcheckAthorCat_if($con, $codeLink, $json, $data_details, $arr_merge); //ทำงานใช้ได้้แล้ว
						}
					//echo $codeLink;
		//echo json_encode($json);
	}
	
function checkAthorCatcheckAthorCat_if($con, $codeLink, $json, $data_details, $arr_merge){//ทำงานใช้ได้แล้ว
	//echo $codeLink;
	$mysqli = mysqli_query($con, 'select * from athor_cat_tb where LINK = "'.$codeLink.'"');
	$rownum = mysqli_num_rows($mysqli);
	//echo $rownum;
	$result = mysqli_fetch_assoc($mysqli);
		$dataLinkByathor = $result['LINK_athor'];
			checkByathor_if($con, $codeLink, $json, $data_details, $dataLinkByathor, $arr_merge);
	}
		
function checkByathor_if($con, $codeLink, $json, $data_details, $dataLinkByathor, $arr_merge){
	$mysqli = mysqli_query($con, 'select * from byathor_tb where LINKCODE = "'.$dataLinkByathor.'"');
	$result = mysqli_fetch_assoc($mysqli);
	$BY_NAME = $result['NAME_BY'];
	$sumarray[] = $arr_merge;
	echo json_encode($sumarray);
	
	}		

//$codeLink(id linkของทุกตาราง)   $json(ข้อมูลผู้รับผิดชอบ) $data_details(ข้อมูลหนังสือทั้งหมด) $dataLinkByathor(idตาราง athor_cat_tb);

?>
