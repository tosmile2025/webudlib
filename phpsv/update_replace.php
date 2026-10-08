<?php 
	include('../connectdata/cnectDB.php');	
	$_POST['data'] = "1043072";
	 if(isset($_POST['data'])){
		 $idmain = $_POST['data'];			 
		//athor_main_tb($con);
		//byathor_tb($con);
		//publish_tb($con);
		//sub_album_tb($con);		
		ReadFile_text_selectsql($con);
		//book_store_tb($con);		
			}
	
		
	 
function athor_main_tb($con){
	
		$query = mysqli_query($con,'select * from athor_main_tb');								
								
						while($row = mysqli_fetch_array($query))
							{
								$arr_row[] = $row;
								}
							foreach($arr_row as $val){
								$id = $val['id_thorEn'];
								$name = $val['detail_athormain_tb'];
								$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
								//echo $textname;
								$mysqli = mysqli_query($con, "update athor_main_tb set detail_athormain_tb = '".$textname."'
														where id_thorEn = '".$id."'");														
							if(!$mysqli){
								echo "<pre>";
								echo $id;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
									}							
								
								}	
	}
	
function byathor_tb($con){
	
		$query = mysqli_query($con,'select * from byathor_tb');								
								
						while($row = mysqli_fetch_array($query))
							{
								$arr_row[] = $row;
								}
							foreach($arr_row as $val){
								$id = $val['ID_BYATHOR'];
								$name = $val['NAME_BY'];
								$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
								//echo $textname;
								$mysqli = mysqli_query($con, "update byathor_tb set NAME_BY = '".$textname."'
														where ID_BYATHOR = '".$id."'");														
							if(!$mysqli){
								echo "<pre>";
								echo $id;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
									}							
								
								}	
	}
function publish_tb($con){
	
		$query = mysqli_query($con,'select * from lpublish_tb');								
								
						while($row = mysqli_fetch_array($query))
							{
								$arr_row[] = $row;
								}
							foreach($arr_row as $val){
								$id = $val['ID_puphlish'];
								$name = $val['PUBNAME'];
								$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
								//echo $textname;
								$mysqli = mysqli_query($con, "update lpublish_tb set PUBNAME = '".$textname."'
														where ID_puphlish = '".$id."'");														
							if(!$mysqli){
								echo "<pre>";
								echo $id;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
									}							
								
								}	
	}
function sub_album_tb($con){
	
		$query = mysqli_query($con,'select * from sub_album_tb');								
								
						while($row = mysqli_fetch_array($query))
							{
								$arr_row[] = $row;
								}
							foreach($arr_row as $val){
								$id = $val['ID_sub_album'];
								$name = $val['album_name'];
								$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
								//echo $textname;
								$mysqli = mysqli_query($con, "update sub_album_tb set album_name = '".$textname."'
														where ID_sub_album = '".$id."'");														
							if(!$mysqli){
								echo "<pre>";
								echo $id;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
									}							
								
								}	
	}
function book_store_tb($con){
	
		$query = mysqli_query($con,'select * from book_store_tb where IDLIKBOOK = "0000136"');								
								
						while($row = mysqli_fetch_array($query))
							{
								$arr_row[] = $row;
								}
							foreach($arr_row as $val){
								$id = $val['IDLIKBOOK'];
								//echo $id;
								$name = $val['NAME_BOOK'];
								$countpage = $val['COUNTPAGE'];								
								$count = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $countpage);
								//echo $count;
								$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
								//echo $textname;
								//$mysqli = mysqli_query($con, "update book_store_tb set NAME_BOOK = '".$textname."'
													//	where IDLIKBOOK = '".$id."'");														
							if(!$query){
								echo "<pre>";
								echo $textname;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
									}							
								
								}	
	}
function ReadFile_text_selectsql($con){
	
		$text ='../fileimage/idbook.txt';				
		$file= fopen( $text, 'r');
				while(!feof($file)){
					$content = fgets($file);					
					$carray = explode(",", $content);
					//list($idbook,$name,$li)= $carray;
					//echo $carray[0];
					$arr[] = $carray[0];		
					//echo $num['NAME_BOOK'];					
					/*echo "<pre>";					
					var_dump($carray);*/
					
					}
					//print_r($arr);
		//$array = array("0000134","0000167","0000200");
		foreach($arr as $key => $val){
			//echo $key;
			//echo $val;
			$trin = trim($val);
			
			//echo "<pre>";
			//echo $trin;
			//var_dump($val);
			$query = mysqli_query($con, 'select * from book_store_tb where NAME_BOOK like "%"'.$trin.'"%"');
			while($result = mysqli_fetch_array($query)){
				$id = $result['IDLIKBOOK'];
				$name = $result['NAME_BOOK'];
				$countpage = $result['COUNTPAGE'];
				$count = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $countpage);
				//echo $count;
				$textname = preg_replace('/[^\PCc^\PCn^\PCs]/u', '', $name);
				//echo $textname;
				$str ="'".$textname."'";
				//$str ="'".$textname."'";
				//$str_count ='"'.$countpage.'"';
				$str_count ="'".$countpage."'";
				echo"<pre>";
				echo $id;				
				//$mysqli = mysqli_query($con, "update book_store_tb set NAME_BOOK=$str
														//where IDLIKBOOK = '".$id."'");			
				/*if(!$mysqli){
								echo "<pre>";
								echo $id;
								}else{
									/*echo "<pre>";
									echo $id."success";*/
								/*	}*/
				//echo "<pre>";
				//echo $result['NAME_BOOK'];
				}
		}
	
	
	}
	
	
																											
?>






























