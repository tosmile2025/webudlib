<?php
	include('../connectdata/cnectDB.php');
	
	//$_POST['idlink'] ='';
	if(isset($_POST['idlink'])){
		//echo $_POST['idlink'];
		$idlink = $_POST['idlink'];
		$arript = $_POST['arript'];
		$arrhname = $_POST['arrhname'];
		$arrnmore = $_POST['arrnmore'];
		
		//echo $idlink;
		//  echo "<pre>";
		//  print_r($idlink);
		if($arrnmore != null){	
						foreach($arrnmore as $value){
							// echo "<pre>";
							// echo $value;
										$slc = mysqli_query($con, 'select * from album_pmrk_tb
																	where LINK_ALBUM = "'.$idlink.'"
																			and SUB_ID ="'.$value.'"
																			and STATUS_ALBUM = "T"');
										$numrow = mysqli_num_rows($slc);
										// echo $numrow."<p>";
										if($numrow >0){
											
										}else{
											$str = '("'.$idlink.'","'.$value.'","T")';
											$insert = mysqli_query($con, "insert into album_pmrk_tb(LINK_ALBUM,SUB_ID,STATUS_ALBUM)
																								values$str");
											if(!$insert){
												echo "error insert album_pmrk";
												}else{
													echo "2";												
													}
											}
									}
											
		
		}
			update_HeadName($con, $idlink, $arrhname, $arript);			
		
		
}
function update_HeadName($con, $idlink, $arrhname, $arript){
	// echo "update_HeadName";
	if($arrhname != null){
		
			foreach($arrhname as $data){
				// echo $data;
				$slc_s = mysqli_query($con, 'select * from album_pmrk_tb
																	where LINK_ALBUM = "'.$idlink.'"
																			and SUB_ID ="'.$data.'"
																			and STATUS_ALBUM = "S"');
				$count_row = mysqli_num_rows($slc_s);
				echo $count_row;
				if($count_row > 0){
					echo "มากกว่า 0";
					}else{
						
						//echo "อัพเดตข้อมูล หัวเรื่อง";
						$str = '("'.$idlink.'","'.$data.'","S")';
						$insert_s = mysqli_query($con, "insert into album_pmrk_tb(LINK_ALBUM,SUB_ID,STATUS_ALBUM)
																								values$str");
																								
						if(!$insert_s){
							echo "1 update_HeadName";
							}else{
								echo "2 update_HeadName";
								}																		
						}
				}
		}
			updata_ByAuthor($con, $idlink, $arript);
	
	}
function updata_ByAuthor($con, $idlink, $arript){
	
			$update = mysqli_query($con, "update book_store_tb set BYNUM = '".$arript[1]."',
										Catbook_store = '".$arript[0]."'
										where IDLIKBOOK = '".$idlink."'");
				if(!$update){
				
				echo "updata_ByAuthor error";
				
				}else{
					echo "success";
					}
	}	
 ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 