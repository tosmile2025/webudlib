<?php 
include('../connectdata/cnectDB.php');

if(isset($_POST['arr_input'])){
	$arr_data = $_POST['arr_input'];
	$arr_by = $_POST['arr_byathor'];
	$errCOde['ercode'] = "";
	$errCOde['sucess'] = "";
	// echo "<pre>";
	// print_r($_POST['arr_input']);
	$sqli = mysqli_query($con, 'select * from book_store_tb
													where ISBN = "'.$_POST['arr_input'][7].'"');
	$countRow = mysqli_num_rows($sqli);
	if($countRow >0){
		Insert_data($con, $arr_data, $arr_by, $errCOde);
		
		}else{
			Insert_data($con, $arr_data, $arr_by, $errCOde);
															//echo "test inser data";				
		}
}
function Insert_data($con, $arr_data, $arr_by, $errCOde){	
	$sumID = "1000000";
	$sqli_max = mysqli_query($con, 'select max(IDLIKBOOK) as maxid from book_store_tb');
	$result = mysqli_fetch_assoc($sqli_max);
	$sumID = $result['maxid']+1;
	$date = date("d-m-Y");
	$errCOde['sucess'] = $sumID;
	$escap_namebk = mysqli_real_escape_string($con, $arr_data[0]);
		$str = '("'.$sumID.'","'.$arr_data[1].'","'.$escap_namebk.'","'.$arr_data[7].'",
						"'.$arr_data[8].'","'.$arr_data[4].'","'.$arr_data[6].'","'.$date.'","'.$arr_data[5].'")';	

	$inSertData = mysqli_query($con, "insert into book_store_tb(IDLIKBOOK,GMDCODE,NAME_BOOK,
															ISBN,PUBCODE,Year_book,COUNTPAGE,YEAR,lang)
															values$str");
	//$result = mysqli_query($con,$inSertData) or die ("Error in query: $inSertData" . mysqli_error());															
	//echo $str;															
	$rrID['idLink'] = $sumID;
	//echo $result;												
	if(!$inSertData){	
		$errCOde['ercode'] = "3";
		echo json_encode($errCOde);
		}else{
			Insert_ByAuthor($con, $arr_by, $sumID, $arr_data, $errCOde);
			}									
}
function Insert_ByAuthor($con, $arr_by, $sumID, $arr_data, $errCOde){
	if($arr_by != null){
		foreach($arr_by as $val){
			//echo $sumID;
		$str = '("'.$sumID.'","'.$val.'")';
		$ist_byauthor = mysqli_query($con, "insert into athor_cat_tb(LINK, LINK_athor)
												values$str");
			if(!$ist_byauthor){
				$errCOde['ercode'] = "1";
				echo json_encode($errCOde);
				}									
			}
			//echo $sumID;
		}
		// echo $sumID;
		Insert_Albumbooks($con, $sumID, $arr_data, $errCOde);	
}
function Insert_Author($con, $sumID, $arr_data, $errCOde){
	
	
		if($arr_data[2] != null){
			//echo $author;
			// echo $sumID;
			$escap_nameauthor = mysqli_real_escape_string($con, $arr_data[2]);
			$str = '("O","'.$sumID.'","'.$escap_nameauthor.'")';	
			$Insert_author = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)
												values$str");
			if(!$Insert_author){				
				$errCOde['ercode'] = "4 ";
				echo json_encode($errCOde);
				}else{
					$escap_E = mysqli_real_escape_string($con, $arr_data[3]);
					$str_E = '("E","'.$sumID.'","'.$escap_E.'")';	
					$Insert_E = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)
														values$str_E");
					if(!$Insert_E){
						$errCOde['ercode'] = "5";
						echo json_encode($errCOde);
					}else{
						//echo json_encode($errCOde);
					}

				}									
			}
			echo json_encode($errCOde);	
}
function Insert_Albumbooks($con, $sumID, $arr_data, $errCOde){
	
	//echo $album;
	// echo $sumID;
	if($arr_data[9] != null){
		$str = '("'.$sumID.'","'.$arr_data[9].'","R")';	
		$insert_album = mysqli_query($con, "insert into album_pmrk_tb(LINK_ALBUM,SUB_ID,STATUS_ALBUM)
											values$str");											
		if(!$insert_album){
			
			$errCOde['ercode'] ="6";
			echo json_encode($errCOde);
			}
		}
		
		Insert_Author($con, $sumID, $arr_data, $errCOde);	
	}	
				
?>























