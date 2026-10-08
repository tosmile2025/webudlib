<?php 
	include('../connectdata/cnectDB.php');
	if(isset($_POST['arr_input'])){
		$idlink = $_POST['idlink'];
		$arr_data = $_POST['arr_input'];
		$arr_by = $_POST['arr_byathor'];
				
		upDate_Book_Store($con, $arr_data, $arr_by, $idlink);		
		if($arr_data[9] != null){
			
		update_func_album($con, $arr_data, $idlink);
			}	
		}
	
function upDate_Book_Store($con, $arr_data, $arr_by, $idlink){
	
		$nbkname_es = mysqli_real_escape_string($con, $arr_data[0]);
	//echo $acut;
		$update = mysqli_query($con, "update book_store_tb set GMDCODE = '".$arr_data[1]."',
											NAME_BOOK = '".$nbkname_es."',ISBN = '".$arr_data[7]."', 
											PUBCODE = '".$arr_data[8]."',Year_book = '".$arr_data[4]."',COUNTPAGE = '".$arr_data[6]."',
											lang = '".$arr_data[5]."'
											where IDLIKBOOK = '".$idlink."'");
				//$objQuery = $update or die ("Error Query [".$update."]");
				//echo $objQuery;
	if(!$update){
		echo "1";
		}else{
			
						
	Update_byAuthor($con, $arr_data, $arr_by, $idlink);
		}
	}
									
function Update_byAuthor($con, $arr_data, $arr_by, $idlink){

	if($arr_by != null){			
					foreach($arr_by as $value){
								//echo $idlk;						
										$slc = mysqli_query($con, "SELECT * FROM athor_cat_tb 
																	WHERE `LINK`='".$idlink."' 
																	AND LINK_athor ='".$value."'");
										$numrow = mysqli_num_rows($slc);
										//echo $numrow."<p>";
										if($numrow >0){
											//echo $value."มากกว่า";
										}else{
											//echo $value;
											$str = '("'.$idlink.'","'.$value.'")';
											$insert = mysqli_query($con, "insert into athor_cat_tb(LINK,LINK_athor)values$str");
																			
											if(!$insert){
													echo "1 Update_byAuthor";
													}else{
														echo "2 Update_byAuthor";
														}															
											}
									}											
					}
	UpDate_athor_main_tb($con, $arr_data, $idlink);
}

function update_func_album($con, $arr_data, $idlink){
			$slc = mysqli_query($con, 'select * from album_pmrk_tb 
								where LINK_ALBUM = "'.$idlink.'" and STATUS_ALBUM = "R"');
								
			$count = mysqli_num_rows($slc);
			//echo $count	;				
		if($count > 0){
			
		$updat_album = mysqli_query($con, "update album_pmrk_tb set SUB_ID = '".$arr_data[9]."'
												where LINK_ALBUM = '".$idlink."' and STATUS_ALBUM = 'R'");
			//echo "ทดสอบอัพเดตเทเบิล อัลปั้ม มีค่ามากกว่า 0 แก้ไข";
			//echo $idlk;
			//echo $idalbum;
			if(!$updat_album){
					echo "1 update_func_album";
				}else{
					echo "2 update_func_album";
					}
			}else{
					$str = '("'.$idlink.'","'.$arr_data[9].'","R")';
				$in = mysqli_query($con, "insert into album_pmrk_tb(LINK_ALBUM,SUB_ID,STATUS_ALBUM)
											values$str");
				//echo "ทดสอบอัพเดตเทเบิล อัลปั้ม มีค่าน้อยกว่า 0 insert";
				if(!$in){
					echo "1 update_func_album insert";
				}else{
					echo "2 update_func_album insert";
					}
				}
	}
function UpDate_athor_main_tb($con, $arr_data, $idlink){
	//echo $ipt_author;
	//echo $idlk;
	if($arr_data[2] != null){
		$ipt_author_es = mysqli_real_escape_string($con, $arr_data[2]);	
			$slc = mysqli_query($con, 'select * from athor_main_tb 
										where blink_athor = "'.$idlink.'" and TYPE = "O"');
										
					$count = mysqli_num_rows($slc);
				if($count > 0){
					$updat_athor = mysqli_query($con, "update athor_main_tb set detail_athormain_tb = '".$ipt_author_es."'
														where blink_athor = '".$idlink."' and TYPE = 'O'");
							if(!$updat_athor){
									echo "1 UpDate_athor_main_tb";
								}else{
									echo "2 UpDate_athor_main_tb";
									}
																
					}else{
						$ipt_author_es = mysqli_real_escape_string($con, $arr_data[2]);
						$str = '("O","'.$idlink.'","'.$ipt_author_es.'")';
						$in = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)values$str");
						if(!$in){
							echo "1 update_func_album insert";
						}else{
							echo "2 update_func_album insert";
							}
						}
		}
		if($arr_data[3] != null){
				$slc = mysqli_query($con, 'select * from athor_main_tb 
										where blink_athor = "'.$idlink.'" and TYPE = "E"');
				$rows = mysqli_num_rows($slc);				
				if($rows >0){
					$updat_athor = mysqli_query($con, "update athor_main_tb set detail_athormain_tb = '".$arr_data[3]."'
														where blink_athor = '".$idlink."' and TYPE = 'E'");
					}else{
						$str = '("E","'.$idlink.'","'.$arr_data[3].'")';
						$in = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)values$str");
						}
			
			}
		
		
	}	
?>



















