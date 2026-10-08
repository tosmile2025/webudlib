

<?php 
	include('../connectdata/cnectDB.php');
error_reporting( error_reporting() & ~E_NOTICE ); 
// $_POST['code_arr'] = array('212144','212145','212146','212147','212148','212149','212150','212151','212152','212153', '212154','212155','110112','110119');//14
//$_POST['code_arr'] = array('110459','110460','110461','110462');
// $_POST['code_arr'] = array('503783','507750','505933','506497','507427','507427','503144','503611','507048','506270','508482','508482','505065','503525'); //แยกสี
// $_POST['code_arr'] = array('503783','507750','505933','506497','507427','507427','503144','503611','507048','506270','508482','508482','507427','507427'); //แยกสี
//  $_POST['code_arr'] = array('503783', '507750'); //แยกสี
// $_POST['code_arr'] = array('315047','315041','315036','315029','315016','315008','315162','314995','314988','314981','314973','315167','314960','314875');//14 M
// -----------------------------ทดสอบ ปริ้นไม่ครบตำแหน่ง---------------------------
// $_POST['code_arr'] = array('500014','500015','500016','500014','500017','500018','500019','500014','500014','500015','500016','500014','500017','500018','500019'); //14
// $_POST['code_arr'] = array('G02861','G02860','G02857','G02851','G02850','G02849','G02848','G02847','G02846','G02850','G02849','G02848','G02847','G02846');//14
//  $_POST['code_arr'] = array('F08662','F08341','F08327','F08331','F08554','F08553','F08337','F08594','F08593','F08336','F08553','F07796','F08653','F08594');//สี
//  $_POST['code_arr'] = array('F08388','F09157','F09146','F06425','F08397','F08471','F08242','F08583','F08996','//','F08391','F08385','F08545','F08241');// 1 ก-ต ครบทุกหมวดอักษร
//  $_POST['code_arr'] = array('F08812','F08526','F08634','F08537','F08299','F08396','F08595','F08390','F08536','F08386','F08478','F08423','F08683','F08484');// 2 บ-ล ครบทุกหมวดอักษร
//  $_POST['code_arr'] = array('F08520','F08646','F08644','F08473','F08392','F08245','F09462','F08246','F08244','F08386','F08478','F08423','F08683','F08484');// 3 ว- a-z ครบทุกหมวดอักษร
// $_POST['code_arr'] = array('F08652','F08703','F05207');// 1  2 สี 1 code
//  $_POST['code_arr'] = array('F09618','F09620');//สี
//  $_POST['code_arr'] = array('508949','508343','508342','508267','508252','508034','507967','507966','507947','507831','507830','507829','507828','507828');//สี วัดขนาดของเด็ก
//  $_POST['code_arr'] = array('507541','507844','505355','507834','505554','508872','508266','506488','506055','503974','505554','508872','508266','506488');//สี ของเด็กและเยวชน
//  $_POST['code_arr'] = array('F08662', 'F08327');
//  $_POST['code_arr'] = array('R01141','R01138','R01138','R01138','R01138','R01138','R01138','R01141','R01141','R01141','R01141','R01141','R01141','R01141');//14
// $_POST['code_arr'] = array('315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315162');//14
// $_POST['code_arr'] = array("110434 ","110433","110432","110431","110431","110426","110426","110421","110434 ","110433","110432","110431","110431","110426"); // กลุ่มงาน	
//  $_POST['code_arr'] = array('508952'); // ทดลองเลขหมวหมู่หนังสือ เคาะเว้นวรรคตัวอักษรท้ายสุดหาย Pbk 089.095911

//   $_POST['stutplat'] = '2';	//1 = pbk  ผ่านแล้ว
							//2 = นิยาย นวนิยาย  // ทำแล้ว 
							//3 = สร  ผ่านแล้ว
							//4 = อ้างอิง // ทำแล้ว
							//5 = text //ทำแล้ว
							//6 = นิตยสาร // ทำแล้ว
							//7 = text/thai eng เฉพาะกลุ่มงาน // ทำแล้ว
							//9 = ฺPBK เด็ก
							// 10 = ฺPBK เด็ก(วัดขนาดหนังสือ)
// $_POST['numitem'] = array(1); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array	
// $_POST['numitem'] = array(1,2,3); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array						
// $_POST['numitem'] = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
//  $_POST['numitem'] = array(1,14); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
//echo $_POST['IDbook_Last'] ;
//$_POST['numitem'] = array(1); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array

function setColorLabel($v){ 
	// echo $v;
	
// 		$albumColor = array(
// /* เหลือง*/		"#e5df2f"=>array("ก","ภ","ศ","ห","ซ"),
// /*แดง */		"#e82323"=>array("ข","ค","ง" ,"ฆ","จ","ช","ล","ฮ", "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"),
// /*เขียวสว่าง */	"#07f72f"=>array("ค","ฉ","ช","ซ","ฌ","ฐ","ฟ","ฬ","ฆ", "ฉ","ญ"),
// /*เขียว */	"#168e2a"=>array(),
// /*เทา*/		"#929593"=>array("จ","ฌ","ท","ป","ฝ","ผ",),
// /*ฟ้า */	"#3498db "=>array("ญ","ด","ย" ,"ว"),
//  /*ชมพุ */   "#fe65af"=>array("ฐ","ธ","ผ","ฝ","พ","ฟ","ภ","อ"),
//   /*น้ำตาลอ่อน*/   "#e2a11e"=>array("ณ","ด","ต","ถ","ท","ธ", ,"น", "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"),
//    /**ดำ*/          "#000000"=>array("ณ","ศ","ส"),
//   /*น้ำเงิน*/     "#093be7"=>array("ถ","บ","ฬ","อ","ฮ","ห"),
//    /*น้ำตาลเข้ม*/     "#873600 "=>array("ล","ร" ),
//  /*เขียวเข้ม*/		"#0e6655  "=>array("ง" ,"ม" ,"ต","ย"));

$albumColor = array(
		"#e5df2f"=>array("ก","ภ","ศ","ห","ซ"),
		"#e82323"=>array("ข","ค","ง" ,"ฆ","จ","ช","ล","ฮ", "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"),
	"#07f72f"=>array("ค","ฉ","ช","ซ","ฌ","ฐ","ฟ","ฬ","ฆ", "ฉ","ญ"),
	"#168e2a"=>array(),
	"#929593"=>array("จ","ฌ","ท","ป","ฝ","ผ",),
		"#3498db "=>array("ญ","ด","ย" ,"ว"),
	   "#fe65af"=>array("ฐ","ธ","ผ","ฝ","พ","ฟ","ภ","อ"),
	    "#e2a11e"=>array("ณ","ด","ต","ถ","ท","ธ", "น", "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"),
	        "#000000"=>array("ณ","ศ","ส"),
	  "#093be7"=>array("ถ","บ","ฬ","อ","ฮ","ห"),
	    "#873600 "=>array("ล","ร" ),
		"#0e6655  "=>array("ง" ,"ม" ,"ต","ย"));

		// echo $v;
		// echo "<pre>";
		// print_r($albumColor);
// $sequence = array(array("a" =>"ค","ช"),array("b" => "ฟ","ณ"));
	
$arType1_Color = array("ก","ข","ฉ","น","บ","ป","พ","ว","ส","ม","ร"); //สีเดียว
$arType2_Color =  array("ค","ง","ฆ","จ","ฌ","ญ","ฐ","ณ","ต","ถ","A","B"
,"C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"); //2-->1
$arType3_Color =  array("ฟ","ช","ซ","ด","ท","ธ","ผ", "ฝ","ภ","ย","ล","ศ","ห","ฬ","อ","ฮ"); //,1-->2

		foreach($albumColor as $key => $ColorValue){   
			//    echo $ColorValue;
		// 	echo "<pre>";
		//    print_r($ColorValue); 
		foreach($ColorValue as $tyPe => $thaiutp){
			// echo "<pre>";
			// echo $thaiutp;
			
			if($v === $thaiutp){	
				// echo "<pre>";
			//  echo $key;		
				 $ar_Colorstut[] = $key;				
			}else{
		//  echo $v;
			}
   }
	}
	// echo "<pre>";
	//   print_r($ar_1);

	$count = count($ar_Colorstut);
	// echo $count;
	// print_r($ar_Colorstut);
	if($count ==1){
		for($r =0; $r < 2; $r++){		
			// $adColor[] = $ar_Colorstut;
			$ar_Col[0]= $ar_Colorstut[0];
			$ar_Col[1] = $ar_Colorstut[0];			
		}
	}else{
		if(in_array($v,$arType3_Color)){
			// echo $ar_Colorstut[1];
			// echo "สีลำดับ1".$ar_Colorstut[0]."สีลำดับ 2".$ar_Colorstut[1];
			$ar_Col[0]= $ar_Colorstut[0];
			$ar_Col[1] = $ar_Colorstut[1];
		}else if(in_array($v,$arType2_Color)){
			// echo $ar_Colorstut[1];
			// echo "สีลำดับ1".$ar_Colorstut[0]."สีลำดับ 2".$ar_Colorstut[1];
			$ar_Col[0]= $ar_Colorstut[1];
			$ar_Col[1] = $ar_Colorstut[0];
		}
		else if(in_array($v,$arType1_Color)){
			// echo $ar_Colorstut[1];
			// echo "สีลำดับ1".$ar_Colorstut[0]."สีลำดับ 2".$ar_Colorstut[1];
			$ar_Col[0]= $ar_Colorstut[0];
			$ar_Col[1] = $ar_Colorstut[0];
		}
			
	}

	//   echo "<pre>";
	//   print_r($ar_Col);
	//   print_r('<h3 style="background: '.$albumColor[0].';">1233</h3>');
		
			// echo array_search($arr_h["ก"]);+

	//   echo $v;
	return $ar_Col;
}
if(isset($_POST['numitem']))
	{
 

	$position = $_POST['numitem'];	
	$arr_codebook = $_POST['code_arr'];	
	$platform = $_POST['stutplat'];
	//print_r($platform);	
	 if($platform == "2"){
		 //echo "test";
		 Func_platformsticker($con, $platform, $position, $arr_codebook);
		 }else if($platform == "1"){
			 
			 	 Func_platform_NumberOne($con, $platform, $position, $arr_codebook);
			 }else if($platform == "3"){
				 Func_platform_NumberThree($con, $platform, $position, $arr_codebook);
				 }else if($platform == "4"){
				 Func_platform_NumberFour($con, $platform, $position, $arr_codebook);
				 }else if($platform == "5"){
					Func_platform_NumberFive($con, $platform, $position, $arr_codebook);
				 }else if($platform == "6"){					
					Func_platform_NumberSix($con, $platform, $position, $arr_codebook);
				 }else if($platform == "7"){					
					Func_platform_Number_Seve($con, $platform, $position, $arr_codebook);
				
				 }else if($platform == "9"){					
					Func_platform_NumberNine($con, $platform, $position, $arr_codebook);
			 }else if($platform == "10"){
				Func_platform_Number_ten($con, $platform, $position, $arr_codebook);
				 }else{
					 mysqli_close($con);
					 }
	}
function setColorLabel_pbkcentimate($v){ 
	
		
		$albumColor = array("#21618c"=>array(1),
					"#7D3c98"=>array(2),			
					"#2ecc71"=>array(3),
					"#000000"=>array(4),					
					"#FF7F50 "=>array(5),
								);
		// $val = "499";
	
		//   echo "<pre>";
		//   echo $v;
				foreach($albumColor as $id => $data){
					//  echo "<pre>";
					//  	echo $data[0];
				
						if($v == $data[0]){
						// 	echo "<pre>";
						//    echo $id;
						$ar_color[] = $id;
					}	
				}

					return $ar_color;
}
function Func_platform_Number_ten($con, $platform, $position, $arr_codebook){
		$set = array();
	//$itemID = $arr_position;
	//echo "<pre>";
	//print_r($arr_codebook);
		foreach($position as $key => $val)
		{
			$position['position'] = $val;
			//echo $position['position'] ;
			$arr_item[] = $position['position'];
		}
	$count =  count($arr_item);	
	//echo $count;
	foreach($arr_codebook as $keybok => $idbook){
		$query = mysqli_query($con, 'select * from regis_books_tb as d1
								inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
								where BARCODE ="'.$idbook.'" limit '.$count.'');
								while($result = mysqli_fetch_array($query))
				{
					
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}	
				}
				
		
			}
 	// echo"<pre>";
	//  print_r($jsonx);
foreach($jsonx as $idbk){
					//echo"<pre>";
					//print_r($idbk[2]);
			$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
			$qry = mysqli_fetch_assoc($query_memo);	
					//echo $arr_memo['detail_athormain_tb'];
					if($idbk['barcode'] == $qry['blink_athor']){
						//echo "<pre>";
					//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
						$idbk['memo'] = $qry['detail_athormain_tb'];
						$x_data[] = $idbk;
					}else{
						//echo "<pre>";
					//	print_r($idbk[2]."else");
						$idbk['memo'] = "";
						$x_data[] = $idbk;
						}
				
			}

	
	

for($ix =0; $ix < count($x_data); $ix ++){
//echo $arr_item[$ix];	
$newStr = $x_data[$ix]['catstroe'];
//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
//echo $newStr."<pre>";
$strcatbk = substr($newStr ,0, 3); // ตัดเอา PBK	 (สร สท0300)
//echo $strcatbk."<pre>";
// $strlen = strlen($newStr);
// $num = $strlen - "3" ; //ลบ 3 เพราะ PBK
// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
$strcatbktttt = mb_substr($newStr,0,3, "UTF-8");
$fontnum = mb_substr($newStr,3,15, "UTF-8");
// $replace = preg_replace('/[^ย\-]/', '', $thai);
// $replace = str_replace("/ย/","",$thai);
//echo $fontnum."<pre>";
//  echo "<pre>";
//  echo print_r($x_data);
$strColor =	setColorLabel_pbkcentimate($x_data[$ix]['Centimeters']);

$arr__json['ID_KEY'] =  $arr_item[$ix];
$arr__json['barcode'] = $x_data[$ix]['barcode'];
$arr__json['namebk'] =  $x_data[$ix]['namebk'];
$arr__json['catbktxt'] = $strcatbk;
$arr__json['catbknum'] = $fontnum;
$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
$arr__json['memo'] = $x_data[$ix]['memo'] ;
$arr__json['Color-R1'] = $strColor[0];
$json_data[] = $arr__json;
}
// echo "<pre>";
// print_r($json_data);

foreach($json_data as $___key => $valdata){
		$text_num = $valdata['ID_KEY'];
		if($text_num == 1){				
			$barcode_P1 = $valdata['barcode'];
			$namebk_P1 = $valdata['namebk'];
			$catbk_P1 = $valdata['catbktxt'];
			$catbk_sub1 = $valdata['catbknum'];
			$yearbk_P1 = $valdata['yearbk'];
			$bynumbk_P1 = $valdata['bynumbk'];
			$memo_P1 = $valdata['memo'];
			$bud_P1 = $valdata['bud'];
			$color_R1P1 = $valdata['Color-R1'];			
			//echo $namebk_P1.":::";
			//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
			//echo $namebk_P1;
					$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
					$new_text_memo_p1 = $new_text."...";
			//echo $new_text_memo_p1;
			}else if($text_num == 2){
				$barcode_P2 = $valdata['barcode'];
				$namebk_P2 = $valdata['namebk'];
				$catbk_P2 = $valdata['catbktxt'];
				$catbk_sub2 = $valdata['catbknum'];
				$yearbk_P2 = $valdata['yearbk'];
				$bynumbk_P2 = $valdata['bynumbk'];
				$memo_P2 = $valdata['memo'];
				$bud_P2 = $valdata['bud'];
				$color_R1P2 = $valdata['Color-R1'];			
				$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
				$new_text_memo_p2 = $new_text."...";						
				}else if($text_num == 3){
					$barcode_P3 = $valdata['barcode'];
					$namebk_P3 = $valdata['namebk'];
					$catbk_P3 = $valdata['catbktxt'];
					$catbk_sub3 = $valdata['catbknum'];
					$yearbk_P3 = $valdata['yearbk'];
					$bynumbk_P3 = $valdata['bynumbk'];
					$memo_P3 = $valdata['memo'];
					$bud_P3 = $valdata['bud'];
					$color_R1P3 = $valdata['Color-R1'];					
					$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
					$new_text_memo_p3 = $new_text."...";	
					}else if($text_num == 4){
						$barcode_P4 = $valdata['barcode'];
						$namebk_P4 = $valdata['namebk'];
						$catbk_P4 = $valdata['catbktxt'];
						$catbk_sub4 = $valdata['catbknum'];
						$yearbk_P4 = $valdata['yearbk'];
						$bynumbk_P4 = $valdata['bynumbk'];
						$memo_P4 = $valdata['memo'];
						$bud_P4 = $valdata['bud'];
						$color_R1P4 = $valdata['Color-R1'];					
						$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
						$new_text_memo_p4 = $new_text."...";	
						}else if($text_num == 5){
							$barcode_P5 = $valdata['barcode'];
							$namebk_P5 = $valdata['namebk'];
							$catbk_P5 = $valdata['catbktxt'];
							$catbk_sub5 = $valdata['catbknum'];
							$yearbk_P5 = $valdata['yearbk'];
							$bynumbk_P5 = $valdata['bynumbk'];
							$memo_P5 = $valdata['memo'];
							$bud_P5 = $valdata['bud'];
							$color_R1P5 = $valdata['Color-R1'];							
							$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
							$new_text_memo_p5 = $new_text."...";	
							}else if($text_num == 6){
								$barcode_P6 = $valdata['barcode'];
								$namebk_P6 = $valdata['namebk'];
								$catbk_P6 = $valdata['catbktxt'];
								$catbk_sub6 = $valdata['catbknum'];
								$yearbk_P6 = $valdata['yearbk'];
								$bynumbk_P6 = $valdata['bynumbk'];
								$memo_P6 = $valdata['memo'];
								$bud_P6 = $valdata['bud'];
								$color_R1P6 = $valdata['Color-R1'];								
								$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
								$new_text_memo_p6 = $new_text."...";	
								}else if($text_num == 7){
									$barcode_P7 = $valdata['barcode'];
									$namebk_P7 = $valdata['namebk'];
									$catbk_P7 = $valdata['catbktxt'];
									$catbk_sub7 = $valdata['catbknum'];
									$yearbk_P7 = $valdata['yearbk'];
									$bynumbk_P7 = $valdata['bynumbk'];
									$memo_P7 = $valdata['memo'];
									$bud_P7 = $valdata['bud'];
									$color_R1P7 = $valdata['Color-R1'];									
									$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
									$new_text_memo_p7 = $new_text."...";	
									}else if($text_num == 8){
										$barcode_P8 = $valdata['barcode'];
										$namebk_P8 = $valdata['namebk'];
										$catbk_P8 = $valdata['catbktxt'];
										$catbk_sub8 = $valdata['catbknum'];
										$yearbk_P8 = $valdata['yearbk'];
										$bynumbk_P8 = $valdata['bynumbk'];
										$memo_P8 = $valdata['memo'];
										$bud_P8 = $valdata['bud'];
										$color_R1P8 = $valdata['Color-R1'];
										$color_R2P8 = $valdata['Color-R2'];
										$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
										$new_text_memo_p8 = $new_text."...";	
										}else if($text_num == 9){
											$barcode_P9 = $valdata['barcode'];
											$namebk_P9 = $valdata['namebk'];
											$catbk_P9 = $valdata['catbktxt'];
											$catbk_sub9 = $valdata['catbknum'];
											$yearbk_P9 = $valdata['yearbk'];
											$bynumbk_P9 = $valdata['bynumbk'];
											$memo_P9 = $valdata['memo'];
											$bud_P9 = $valdata['bud'];
											$color_R1P9 = $valdata['Color-R1'];											
											$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
											$new_text_memo_p9 = $new_text."...";	
											}else if($text_num == 10){
												$barcode_P10 = $valdata['barcode'];
												$namebk_P10 = $valdata['namebk'];
												$catbk_P10 = $valdata['catbktxt'];
												$catbk_sub10 = $valdata['catbknum'];
												$yearbk_P10 = $valdata['yearbk'];
												$bynumbk_P10 = $valdata['bynumbk'];
												$memo_P10 = $valdata['memo'];
												$bud_P10 = $valdata['bud'];
												$color_R1P10 = $valdata['Color-R1'];												
												$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
												$new_text_memo_p10 = $new_text."...";	
												}else if($text_num == 11){
									$barcode_P11 = $valdata['barcode'];
									$namebk_P11 = $valdata['namebk'];
									$catbk_P11 = $valdata['catbktxt'];
									$catbk_sub11 = $valdata['catbknum'];
									$yearbk_P11 = $valdata['yearbk'];
									$bynumbk_P11 = $valdata['bynumbk'];
									$memo_P11 = $valdata['memo'];
									$bud_P11 = $valdata['bud'];
									$color_R1P11 = $valdata['Color-R1'];									
									$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
									$new_text_memo_p11 = $new_text."...";	
					
						}else if($text_num == 12){
								$barcode_P12 = $valdata['barcode'];
								$namebk_P12 = $valdata['namebk'];
								$catbk_P12 = $valdata['catbktxt'];
								$catbk_sub12 = $valdata['catbknum'];
								$yearbk_P12 = $valdata['yearbk'];
								$bynumbk_P12 = $valdata['bynumbk'];
								$memo_P12 = $valdata['memo'];
								$bud_P12 = $valdata['bud'];
								$color_R1P12 = $valdata['Color-R1'];								
								$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
								$new_text_memo_p12 = $new_text."...";	
						}else if($text_num == 13){
							$barcode_P13 = $valdata['barcode'];
							$namebk_P13 = $valdata['namebk'];
							$catbk_P13 = $valdata['catbktxt'];
							$catbk_sub13 = $valdata['catbknum'];
							$yearbk_P13 = $valdata['yearbk'];
							$bynumbk_P13 = $valdata['bynumbk'];
							$memo_P13 = $valdata['memo'];
							$bud_P13 = $valdata['bud'];
							$color_R1P13 = $valdata['Color-R1'];						
							$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
							$new_text_memo_p13 = $new_text."...";	
			
				}else if($text_num == 14){
						$barcode_P14 = $valdata['barcode'];
						$namebk_P14 = $valdata['namebk'];
						$catbk_P14 = $valdata['catbktxt'];
						$catbk_sub14 = $valdata['catbknum'];
						$yearbk_P14 = $valdata['yearbk'];
						$bynumbk_P14 = $valdata['bynumbk'];
						$memo_P14 = $valdata['memo'];
						$bud_P14 = $valdata['bud'];
						$color_R1P14 = $valdata['Color-R1'];						
						$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
						$new_text_memo_p14 = $new_text."...";	
				}
			 }

$html = '

	<html>
	<head>
	<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 16mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:0.6mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:0.5mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:0.8mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
	<table class="tb_box">
		<tr>
				<td class="tdp1">
				<table class="tb_sub_p1">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P1.';" colspan="2"></td>
										
							
								
								<td class="p1_namebud">'.$bud_P1.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P1.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub1.'</td>
												<td class="p1_numbarcode">'.$barcode_P1.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P1.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p1.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
									
									  </tr>
									   
									   
					</table>		
			</td>					
		<td class="tdp1" >
			<table class="tb_sub_p1">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P2.';" colspan="2"></td>								
								<td class="p1_namebud">'.$bud_P2.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P2.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub2.'</td>
												<td class="p1_numbarcode">'.$barcode_P2.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P2.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p2.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P2.'</td>
									
									  </tr>
									   
									   
					</table>		
			</td>
		
		</tr>
			
		<tr>
			<td class="tdp1">
				<table class="tb_sub_p3">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P3.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P3.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P3.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub3.'</td>
												<td class="p1_numbarcode">'.$barcode_P3.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P3.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p3.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
					<table class="tb_sub_p3">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P4.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P4.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P4.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub4.'</td>
												<td class="p1_numbarcode">'.$barcode_P4.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P4.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p4.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
		<tr>
		<td class="tdp1">
					<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P5.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P5.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P5.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub5.'</td>
												<td class="p1_numbarcode">'.$barcode_P5.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P5.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p5.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		<td class="tdp1">
				<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P6.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P6.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P6.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub6.'</td>
												<td class="p1_numbarcode">'.$barcode_P6.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P6.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p6.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>									
									  </tr>
									   
									   
					</table>				
			</td>
		</tr>
		<tr>
		<td class="tdp1">
				<table class="tb_sub_p7">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P7.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P7.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P7.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub7.'</td>
												<td class="p1_numbarcode">'.$barcode_P7.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P7.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p7.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
			<td class="tdp1" >
				<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P8.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P8.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P8.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P8.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub8.'</td>
												<td class="p1_numbarcode">'.$barcode_P8.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P8.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p8.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>									
									  </tr>
									   
									   
					</table>		
			
			</td>
		</tr>
		<tr>
	<td class="tdp1" >
				<table class="tb_sub_p9">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P9.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P9.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P9.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P9.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub9.'</td>
												<td class="p1_numbarcode">'.$barcode_P9.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P9.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p9.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
				<table class="tb_sub_p9">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P10.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P10.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P10.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P10.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub10.'</td>
												<td class="p1_numbarcode">'.$barcode_P10.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P10.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p10.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
		<tr>
		<td class="tdp1">
				<table class="tb_sub_p11">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P11.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P11.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P11.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P11.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub11.'</td>
												<td class="p1_numbarcode">'.$barcode_P11.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P11.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p11.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
				<table class="tb_sub_p11">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P12.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P12.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P12.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P12.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub12.'</td>
												<td class="p1_numbarcode">'.$barcode_P12.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P12.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p12.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
			<tr>
		<td class="tdp1">
				<table class="tb_sub_p13">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P13.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P13.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P13.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P13.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub13.'</td>
												<td class="p1_numbarcode">'.$barcode_P13.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P13.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p13.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P13.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		<td class="tdp1">
					<table class="tb_sub_p13">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P14.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P13.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P13.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P14.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub14.'</td>
												<td class="p1_numbarcode">'.$barcode_P14.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P14.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p14.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>									
									  </tr>
									   
									   
					</table>
			</td>
		</tr>
	
	</table>

</body>
</html>';
// echo $html;

		include("../phpsv/ExportPDF-master/vendor/autoload.php");
		$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		$fontDirs = $defaultConfig['fontDir'];

		$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		$fontData = $defaultFontConfig['fontdata'];

		$mpdf = new \Mpdf\Mpdf([
		'fontDir' => array_merge($fontDirs, [
			__DIR__ . '/tmp',
		]),
		'fontdata' => $fontData + [
			'sarabun' => [
				'R' => 'THSarabunNew.ttf',
				'I' => 'THSarabunNew Italic.ttf',
			]
		],
		'default_font' => 'sarabun'
		]);
		$rand = rand(10,1000);
		$date = date("Y-m-d");
		$sum = $date.$rand;
		$mpdf->WriteHTML($html);
		//echo $html;
		$set_path = "../PDFFILE/".$sum.".pdf";
		$mpdf->Output($set_path );
		echo $set_path ;

}	


function Func_platform_Number_Seve($con, $platform, $position, $arr_codebook){
	$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						
							if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$arr_x__json['dpart'] = $result['department'];
							$jsonx[] = $arr_x__json;				
						}	
						
							
					}
				
			
				}
				// echo"<pre>";
				// print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	// echo "<pre>";
	// print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
 for($ix =0; $ix < count($x_data); $ix ++){
	//echo $arr_item[$ix];	
	$newStr = $x_data[$ix]['catstroe'];
	//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	//echo $newStr."<pre>";
	$strcatbk = substr($newStr ,0, 2); // ตัดเอา PBK	 (สร สท0300)
	//echo $strcatbk."<pre>";
	$strlen = strlen($newStr);
	$num = $strlen - "2" ; //ลบ 3 เพราะ PBK
	$fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	
	//echo $fontnum."<pre>";
	//echo "<pre>";
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = $strcatbk;
	$arr__json['catbknum'] = $fontnum;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$arr__json['dpart'] = $x_data[$ix]['dpart'];
	$json_data[] = $arr__json;
	}
// echo "<pre>";
// print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			//echo $text_num;
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				$dpart_P1 = "(".$valdata['dpart'].")";
				//echo $memo_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$dpart_P2 = "(".$valdata['dpart'].")";
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$dpart_P3 = "(".$valdata['dpart'].")";
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$dpart_P4 = "(".$valdata['dpart'].")";
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$dpart_P5 = "(".$valdata['dpart'].")";
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$dpart_P6 = "(".$valdata['dpart'].")";
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$dpart_P7 = "(".$valdata['dpart'].")";
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$dpart_P8 = "(".$valdata['dpart'].")";
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$dpart_P9 = "(".$valdata['dpart'].")";
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$dpart_P10 = "(".$valdata['dpart'].")";
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$dpart_P11 = "(".$valdata['dpart'].")";
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$dpart_P12 = "(".$valdata['dpart'].")";
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
							
 				}else if($text_num == 13){
					$barcode_P13 = $valdata['barcode'];
					$namebk_P13 = $valdata['namebk'];
					$catbk_P13 = $valdata['catbktxt'];
					$catbk_sub13 = $valdata['catbknum'];
					$yearbk_P13 = $valdata['yearbk'];
					$bynumbk_P13 = $valdata['bynumbk'];
					$memo_P13 = $valdata['memo'];
					$bud_P13 = $valdata['bud'];
					$dpart_P13 = "(".$valdata['dpart'].")";
					$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
					$new_text_memo_p13 = $new_text."...";	
	
		}else if($text_num == 14){
				$barcode_P14 = $valdata['barcode'];
				$namebk_P14 = $valdata['namebk'];
				$catbk_P14 = $valdata['catbktxt'];
				$catbk_sub14 = $valdata['catbknum'];
				$yearbk_P14 = $valdata['yearbk'];
				$bynumbk_P14 = $valdata['bynumbk'];
				$memo_P14 = $valdata['memo'];
				$bud_P14 = $valdata['bud'];
				$dpart_P14 = "(".$valdata['dpart'].")";
				$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
				$new_text_memo_p14 = $new_text."...";	
		}
	}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		
<body>
<table class="tb_box">
	<tr>
		<td class="tdp1">				
			<table class="tb_sub_p1">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P1.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P1.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub1.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
								  <tr>
									<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
									<td class="p1_numbarcode"><span>'.$barcode_P1.'</span>&nbsp;<span class="dpart-P1">'.$dpart_P1.'</span></td>
								  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
									<td class="p1_namebk">'.$new_text_memo_p1.'</td>
								  </tr>
				</table>
		</td>
		</tr>
		<td class="tdp1">
			<table class="tb_sub_p1">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P2.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P2.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
											<td class="p1_numbarcode">'.$barcode_P2.'</span>&nbsp;<span class="dpart-P2">'.$dpart_P2.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
									<td class="p1_namebk">'.$new_text_memo_p2.'</td>
								  </tr>
				</table>		
		
		
		</td>
		</tr>
		
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p3">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P3.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P3.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
											<td class="p1_numbarcode">'.$barcode_P3.'</span>&nbsp;<span class="dpart-P3">'.$dpart_P3.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
									<td class="p1_namebk">'.$new_text_memo_p3.'</td>
								  </tr>
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p3">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P4.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P4.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
											<td class="p1_numbarcode">'.$barcode_P4.'</span>&nbsp;<span class="dpart-P4">'.$dpart_P4.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
									<td class="p1_namebk">'.$new_text_memo_p4.'</td>
								  </tr>
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p5">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P5.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P5.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
											<td class="p1_numbarcode">'.$barcode_P5.'</span>&nbsp;<span class="dpart-P5">'.$dpart_P5.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
									<td class="p1_namebk">'.$new_text_memo_p5.'</td>
								  </tr>
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p5">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P6.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P6.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
											<td class="p1_numbarcode">'.$barcode_P6.'</span>&nbsp;<span class="dpart-P6">'.$dpart_P6.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
									<td class="p1_namebk">'.$new_text_memo_p6.'</td>
								  </tr>
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p7">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P7.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P7.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
											<td class="p1_numbarcode">'.$barcode_P7.'</span>&nbsp;<span class="dpart-P7">'.$dpart_P7.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
									<td class="p1_namebk">'.$new_text_memo_p7.'</td>
								  </tr>
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p7">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P8.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P8.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
											<td class="p1_numbarcode">'.$barcode_P8.'</span>&nbsp;<span class="dpart-P8">'.$dpart_P8.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
									<td class="p1_namebk">'.$new_text_memo_p8.'</td>
								  </tr>
				</table>		
		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p9">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P9.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P9.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
											<td class="p1_numbarcode">'.$barcode_P9.'</span>&nbsp;<span class="dpart-P9">'.$dpart_P9.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
									<td class="p1_namebk">'.$new_text_memo_p9.'</td>
								  </tr>
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p9">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P10.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P10.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
											<td class="p1_numbarcode">'.$barcode_P10.'</span>&nbsp;<span class="dpart-P10">'.$dpart_P10.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
									<td class="p1_namebk">'.$new_text_memo_p10.'</td>
								  </tr>
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p11">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P11.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P11.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
											<td class="p1_numbarcode">'.$barcode_P11.'</span>&nbsp;<span class="dpart-P11">'.$dpart_P11.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
									<td class="p1_namebk">'.$new_text_memo_p11.'</td>
								  </tr>
				</table>		
		</td>

		<td class="tdp1">
			<table class="tb_sub_p11">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P12.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P12.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
											<td class="p1_numbarcode">'.$barcode_P12.'</span>&nbsp;<span class="dpart-P12">'.$dpart_P12.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>

									<td class="p1_namebk">'.$new_text_memo_p12.'</td>
								  </tr>
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p13">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P13.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P13.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
											<td class="p1_numbarcode">'.$barcode_P11.'</span>&nbsp;<span class="dpart-P11">'.$dpart_P13.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
									<td class="p1_namebk">'.$new_text_memo_p13.'</td>
								  </tr>
				</table>		
		</td>

		<td class="tdp1">
			<table class="tb_sub_p13">
							<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P14.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P14.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
											<td class="p1_numbarcode">'.$barcode_P14.'</span>&nbsp;<span class="dpart-P12">'.$dpart_P12.'</span></td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>

									<td class="p1_namebk">'.$new_text_memo_p14.'</td>
								  </tr>
				</table>		
		</td>
	</tr>

</table>

</body>

</body>
</html>';
// echo $html;

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;
}
function  Func_platform_NumberSix($con, $platform, $position, $arr_codebook){
		$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}	
						
							
					}
				
			
			
				}
				//echo"<pre>";
			//	print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
	
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = "นิตยสาร";
	$arr__json['catbknum'] = "";
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$json_data[] = $arr__json;
	}
//echo "<pre>";
//print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				//echo $namebk_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
						}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbktxt'];
								$catbk_sub13 = $valdata['catbknum'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_p13 = $new_text."...";	
				
					}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14  = $valdata['namebk'];
							$catbk_P14  = $valdata['catbktxt'];
							$catbk_sub14 = $valdata['catbknum'];
							$yearbk_P14  = $valdata['yearbk'];
							$bynumbk_P14  = $valdata['bynumbk'];
							$memo_P14  = $valdata['memo'];
							$bud_P14  = $valdata['bud'];
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_p14 = $new_text."...";	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		<table class="tb_box">
			<tr>
				<td class="tdp1">				
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P1.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2"></td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$memo_P1.'</td>
											<td class="p1_namebk">'.$new_text_memo_p1.'</td>
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P2.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
													<td class="p1_numbarcode">'.$barcode_P2.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
											<td class="p1_namebk">'.$new_text_memo_p2.'</td>
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P3.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
													<td class="p1_numbarcode">'.$barcode_P3.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
											<td class="p1_namebk">'.$new_text_memo_p3.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P4.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
													<td class="p1_numbarcode">'.$barcode_P4.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
											<td class="p1_namebk">'.$new_text_memo_p4.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P5.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
													<td class="p1_numbarcode">'.$barcode_P5.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
											<td class="p1_namebk">'.$new_text_memo_p5.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P6.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
													<td class="p1_numbarcode">'.$barcode_P6.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
											<td class="p1_namebk">'.$new_text_memo_p6.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P7.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
													<td class="p1_numbarcode">'.$barcode_P7.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
											<td class="p1_namebk">'.$new_text_memo_p7.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P8.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
													<td class="p1_numbarcode">'.$barcode_P8.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
											<td class="p1_namebk">'.$new_text_memo_p8.'</td>
										  </tr>
						</table>		
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P9.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
													<td class="p1_numbarcode">'.$barcode_P9.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
											<td class="p1_namebk">'.$new_text_memo_p9.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P10.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
													<td class="p1_numbarcode">'.$barcode_P10.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
											<td class="p1_namebk">'.$new_text_memo_p10.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P11.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
													<td class="p1_numbarcode">'.$barcode_P11.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
											<td class="p1_namebk">'.$new_text_memo_p11.'</td>
										  </tr>
						</table>		
				</td>

				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P12.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
													<td class="p1_numbarcode">'.$barcode_P12.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>

											<td class="p1_namebk">'.$new_text_memo_p12.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P13.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P13.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
													<td class="p1_numbarcode">'.$barcode_P13.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
											<td class="p1_namebk">'.$new_text_memo_p13.'</td>
										  </tr>
						</table>		
				</td>

				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P14.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P14.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
													<td class="p1_numbarcode">'.$barcode_P14.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>

											<td class="p1_namebk">'.$new_text_memo_p14.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
		
		</table>

</body>
</html>';
// echo $html;
	
include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;

}
function  Func_platform_NumberFive($con, $platform, $position, $arr_codebook){
	$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}	
							
					}
				
			
			
				}
				//echo"<pre>";
			//	print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
	//echo $arr_item[$ix];	
	$newStr = $x_data[$ix]['catstroe'];
	//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	//echo $newStr."<pre>";
	$strcatbk = substr($newStr ,0, 2); // ตัดเอา PBK	 (สร สท0300)
	//echo $strcatbk."<pre>";
	$strlen = strlen($newStr);
	$num = $strlen - "2" ; //ลบ 3 เพราะ PBK
	$fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	
	//echo $fontnum."<pre>";
	//echo "<pre>";
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = $strcatbk;
	$arr__json['catbknum'] = $fontnum;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$json_data[] = $arr__json;
	}
//echo "<pre>";
//print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			//echo $text_num;
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				//echo $memo_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
							}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbktxt'];
								$catbk_sub13 = $valdata['catbknum'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_p13 = $new_text."...";	
				
					}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14 = $valdata['namebk'];
							$catbk_P14 = $valdata['catbktxt'];
							$catbk_sub14 = $valdata['catbknum'];
							$yearbk_P14 = $valdata['yearbk'];
							$bynumbk_P14 = $valdata['bynumbk'];
							$memo_P14 = $valdata['memo'];
							$bud_P14 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_p14 = $new_text."...";	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		<table class="tb_box">
			<tr>
				<td class="tdp1">				
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P1.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub1.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
											<td class="p1_namebk">'.$new_text_memo_p1.'</td>
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P2.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
													<td class="p1_numbarcode">'.$barcode_P2.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
											<td class="p1_namebk">'.$new_text_memo_p2.'</td>
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P3.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
													<td class="p1_numbarcode">'.$barcode_P3.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
											<td class="p1_namebk">'.$new_text_memo_p3.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P4.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
													<td class="p1_numbarcode">'.$barcode_P4.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
											<td class="p1_namebk">'.$new_text_memo_p4.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P5.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
													<td class="p1_numbarcode">'.$barcode_P5.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
											<td class="p1_namebk">'.$new_text_memo_p5.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P6.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
													<td class="p1_numbarcode">'.$barcode_P6.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
											<td class="p1_namebk">'.$new_text_memo_p6.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P7.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
													<td class="p1_numbarcode">'.$barcode_P7.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
											<td class="p1_namebk">'.$new_text_memo_p7.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P8.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
													<td class="p1_numbarcode">'.$barcode_P8.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
											<td class="p1_namebk">'.$new_text_memo_p8.'</td>
										  </tr>
						</table>		
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P9.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
													<td class="p1_numbarcode">'.$barcode_P9.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
											<td class="p1_namebk">'.$new_text_memo_p9.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P10.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
													<td class="p1_numbarcode">'.$barcode_P10.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
											<td class="p1_namebk">'.$new_text_memo_p10.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P11.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
													<td class="p1_numbarcode">'.$barcode_P11.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
											<td class="p1_namebk">'.$new_text_memo_p11.'</td>
										  </tr>
						</table>		
				</td>

				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P12.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
													<td class="p1_numbarcode">'.$barcode_P12.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>

											<td class="p1_namebk">'.$new_text_memo_p12.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P13.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P13.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
													<td class="p1_numbarcode">'.$barcode_P13.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
											<td class="p1_namebk">'.$new_text_memo_p13.'</td>
										  </tr>
						</table>		
				</td>

				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P14.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P14.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
													<td class="p1_numbarcode">'.$barcode_P14.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>

											<td class="p1_namebk">'.$new_text_memo_p14.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
		
		</table>

</body>
</html>';
//echo $html;

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path );
echo $set_path;
}		
function Func_platform_NumberFour($con, $platform, $position, $arr_codebook){
		$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}	
							
					}
				
			
				}
				// echo"<pre>";
				// print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
	//echo $arr_item[$ix];	
	// echo "<pre>";
//  echo  $x_data[$ix]['catstroe'];
	$newStr = $x_data[$ix]['catstroe'];
	//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	//echo $newStr."<pre>";
	$strcatbk = substr($newStr ,0, 3); // ตัดเอา PBK	 (สร สท0300)
	// echo "<pre>";
	// echo $strcatbk."<pre>";
	$strlen = strlen($newStr);
	$num = $strlen - "5" ; //ลบ 3 เพราะ PBK
	$fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	// echo "<pre>";
	// echo $fontnum."<pre>";
	//echo "<pre>";
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = $strcatbk.".";
	$arr__json['catbknum'] =$fontnum ;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$json_data[] = $arr__json;
	}
//  echo "<pre>";
//  print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				//echo $namebk_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
							}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbktxt'];
								$catbk_sub13 = $valdata['catbknum'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_p13 = $new_text."...";	
				
					}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14 = $valdata['namebk'];
							$catbk_P14 = $valdata['catbktxt'];
							$catbk_sub14 = $valdata['catbknum'];
							$yearbk_P14 = $valdata['yearbk'];
							$bynumbk_P14 = $valdata['bynumbk'];
							$memo_P14 = $valdata['memo'];
							$bud_P14 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_p14 = $new_text."...";	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		<table class="tb_box">
			<tr>
				<td class="tdp1">				
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P1.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub1.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
											<td class="p1_namebk">'.$new_text_memo_p1.'</td>
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P2.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
													<td class="p1_numbarcode">'.$barcode_P2.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
											<td class="p1_namebk">'.$new_text_memo_p2.'</td>
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P3.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
													<td class="p1_numbarcode">'.$barcode_P3.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
											<td class="p1_namebk">'.$new_text_memo_p3.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P4.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
													<td class="p1_numbarcode">'.$barcode_P4.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
											<td class="p1_namebk">'.$new_text_memo_p4.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P5.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
													<td class="p1_numbarcode">'.$barcode_P5.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
											<td class="p1_namebk">'.$new_text_memo_p5.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P6.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
													<td class="p1_numbarcode">'.$barcode_P6.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
											<td class="p1_namebk">'.$new_text_memo_p6.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P7.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
													<td class="p1_numbarcode">'.$barcode_P7.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
											<td class="p1_namebk">'.$new_text_memo_p7.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P8.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
													<td class="p1_numbarcode">'.$barcode_P8.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
											<td class="p1_namebk">'.$new_text_memo_p8.'</td>
										  </tr>
						</table>		
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P9.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
													<td class="p1_numbarcode">'.$barcode_P9.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
											<td class="p1_namebk">'.$new_text_memo_p9.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P10.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
													<td class="p1_numbarcode">'.$barcode_P10.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
											<td class="p1_namebk">'.$new_text_memo_p10.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P11.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
													<td class="p1_numbarcode">'.$barcode_P11.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
											<td class="p1_namebk">'.$new_text_memo_p11.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P12.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
													<td class="p1_numbarcode">'.$barcode_P12.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>

											<td class="p1_namebk">'.$new_text_memo_p12.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P13.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P13.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
													<td class="p1_numbarcode">'.$barcode_P13.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
											<td class="p1_namebk">'.$new_text_memo_p13.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P14.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P14.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
													<td class="p1_numbarcode">'.$barcode_P14.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>

											<td class="p1_namebk">'.$new_text_memo_p14.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
		
		</table>

</body>
</html>';

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;
}		
function  Func_platform_NumberThree($con, $platform, $position, $arr_codebook){
		$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						
					if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}								
					}
				
			
			
				}
				//echo"<pre>";
			//	print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
	//echo $arr_item[$ix];	
	$newStr = $x_data[$ix]['catstroe'];
	//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	// echo $newStr."<pre>";
	// $strcatbk = substr($newStr ,0, 2); // ตัดเอา PBK	 (สร สท0300)
	// //echo $strcatbk."<pre>";
	// $strlen = strlen($newStr);
	// $num = $strlen - "2" ; //ลบ 3 เพราะ PBK
	// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	$strcatbk = mb_substr($newStr,3,13, "UTF-8");
	// echo $strcatbk."<pre>";
	//echo "<pre>";
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = "สร";
	$arr__json['catbknum'] = $strcatbk;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$json_data[] = $arr__json;
	}
// echo "<pre>";
// print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				//echo $namebk_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
							}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbktxt'];
								$catbk_sub13 = $valdata['catbknum'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_p13 = $new_text."...";	
				
					}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14 = $valdata['namebk'];
							$catbk_P14 = $valdata['catbktxt'];
							$catbk_sub14 = $valdata['catbknum'];
							$yearbk_P14 = $valdata['yearbk'];
							$bynumbk_P14 = $valdata['bynumbk'];
							$memo_P14 = $valdata['memo'];
							$bud_P14 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_p14 = $new_text."...";	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		<table class="tb_box">
			<tr >
				<td class="tdp1">				
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P1.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub1.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
											<td class="p1_namebk">'.$new_text_memo_p1.'</td>
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P2.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
													<td class="p1_numbarcode">'.$barcode_P2.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
											<td class="p1_namebk">'.$new_text_memo_p2.'</td>
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P3.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
													<td class="p1_numbarcode">'.$barcode_P3.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
											<td class="p1_namebk">'.$new_text_memo_p3.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p3">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P4.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
													<td class="p1_numbarcode">'.$barcode_P4.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
											<td class="p1_namebk">'.$new_text_memo_p4.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P5.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
													<td class="p1_numbarcode">'.$barcode_P5.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
											<td class="p1_namebk">'.$new_text_memo_p5.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P6.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
													<td class="p1_numbarcode">'.$barcode_P6.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
											<td class="p1_namebk">'.$new_text_memo_p6.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P7.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
													<td class="p1_numbarcode">'.$barcode_P7.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
											<td class="p1_namebk">'.$new_text_memo_p7.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P8.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
													<td class="p1_numbarcode">'.$barcode_P8.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
											<td class="p1_namebk">'.$new_text_memo_p8.'</td>
										  </tr>
						</table>		
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P9.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
													<td class="p1_numbarcode">'.$barcode_P9.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
											<td class="p1_namebk">'.$new_text_memo_p9.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P10.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
													<td class="p1_numbarcode">'.$barcode_P10.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
											<td class="p1_namebk">'.$new_text_memo_p10.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P11.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
													<td class="p1_numbarcode">'.$barcode_P11.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
											<td class="p1_namebk">'.$new_text_memo_p11.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p11">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P12.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
													<td class="p1_numbarcode">'.$barcode_P12.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>

											<td class="p1_namebk">'.$new_text_memo_p12.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P13.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P13.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
													<td class="p1_numbarcode">'.$barcode_P13.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
											<td class="p1_namebk">'.$new_text_memo_p13.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p13">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk">'.$catbk_P14.'</td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P14.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
											<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
													<td class="p1_numbarcode">'.$barcode_P14.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>

											<td class="p1_namebk">'.$new_text_memo_p14.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
		
		</table>

</body>
</html>';	
include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;
}	



function  Func_platformsticker($con, $platform, $position, $arr_codebook){
				
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		// echo $count;
		foreach($arr_codebook as $keybok => $idbook){
		// echo"<pre>";
		//  print_r($idbook);
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'"');  //where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}									
							
					}
						
			
				}
                
		// echo"<pre>";
		//  print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($x_data);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
    mb_internal_encoding('UTF-8');
	mb_regex_encoding('UTF-8'); 
	
	//echo $arr_item[$ix];	
	$newStr = $x_data[$ix]['catstroe'];
	// $newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	//  echo $newStr."|".$x_data[$ix]['barcode']."<pre>"; 
	 $numBycut =  $x_data[$ix]['bynumbk'];
    //  echo "<pre>";
    //  echo strlen($numBycut);
    //  $strcatbk = substr($numBycut ,0,3); // ตัดเอา PBK	 (สร สท0300)
	$strcatbk = mb_substr($numBycut,0,1, "UTF-8");
  	$codeColor =  setColorLabel($strcatbk);
 
    //  echo $strcatbk."//". $numBycut;
     //echo $strcatbk."<pre>";
	//  $strlen = mb_strlen( $numBycut, 'UTF-8' );
    // $strlen = strlen($s1 );

	// echo "<pre>";
	// echo $strcatbk;
    //  $num = $strlen - "2" ; //ลบ 3 เพราะ PBK
    //  $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	// echo $fontnum."<pre>";
//  echo "<pre>";
//   echo $codeColor;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbk'] = $newStr;
	// $arr__json['catbknum'] = $fontnum;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
    $arr__json['color-R1'] = $codeColor[0] ;
    $arr__json['color-R2'] = $codeColor[1] ;
	$json_data[] = $arr__json;
	}
//  echo "<pre>";
//   print_r($json_data);

foreach($json_data as $___key => $valdata){   
	// echo "<pre>";
	// echo $valdata['ID_KEY'];
			$text_num = $valdata['ID_KEY'];
        //    echo "<pre>";
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbk'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				$Color_1P1 = $valdata['color-R1'];
				$Color_2P1 = $valdata['color-R2'];				
				//echo $namebk_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbk'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";
					$Color_1P2 = $valdata['color-R1'];
						$Color_2P2 = $valdata['color-R2'];						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbk'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";
						$Color_1P3 = $valdata['color-R1'];
						$Color_2P3 = $valdata['color-R2'];	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbk'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";
							$Color_1P4 = $valdata['color-R1'];
							$Color_2P4 = $valdata['color-R2'];	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbk'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";
								$Color_1P5 = $valdata['color-R1'];
								$Color_2P5 = $valdata['color-R2'];	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbk'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									$Color_1P6 = $valdata['color-R1'];
									$Color_2P6 = $valdata['color-R2'];
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbk'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";
										$Color_1P7 = $valdata['color-R1'];
											$Color_2P7 = $valdata['color-R2'];	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbk'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											$Color_1P8 = $valdata['color-R1'];
											$Color_2P8 = $valdata['color-R2'];
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbk'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";
												$Color_1P9 = $valdata['color-R1'];
												$Color_2P9 = $valdata['color-R2'];	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbk'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													$Color_1P10 = $valdata['color-R1'];
													$Color_2P10 = $valdata['color-R2'];;
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbk'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
										$Color_1P11 = $valdata['color-R1'];
										$Color_2P11 = $valdata['color-R2'];
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbk'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";
									$Color_1P12 = $valdata['color-R1'];
									$Color_2P12 = $valdata['color-R2'];	
							}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbk'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_P13 = $new_text."...";
								$Color_1P13 = $valdata['color-R1'];
								$Color_2P13 = $valdata['color-R2'];
						}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14 = $valdata['namebk'];
							$catbk_P14 = $valdata['catbk'];
							$yearbk_P14 = $valdata['yearbk'];
							$bynumbk_P14 = $valdata['bynumbk'];
							$memo_P14 = $valdata['memo'];
							$bud_P14 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_P14 = $new_text."...";
							$Color_1P14 = $valdata['color-R1'];
							$Color_2P14 = $valdata['color-R2'];	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 15.3mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 267mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
/*	border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
/*	border:dotted 1px #b50aba;*/
	width:100%;
	height:45.2mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:33mm;
	margin:0.2mm 0.6mm 0.6mm 0mm;		
	background-color:white;	
	}
table tr td{
	/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:33mm;
	margin:0mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:33mm;
	margin:0.2mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:33mm;
	margin:0mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:0mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:0mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:32m;
	margin:0.1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:4mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:6mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:6mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>

		<table class="tb_box">
			<tr>
				<td class="tdp1">				
					<table class="tb_sub_p1">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P1.'</td>
									
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p1.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P1.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P1.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
									<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk"  colspan="2">'.$catbk_P2.'</td>
									
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P2.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
												  <tr>
													<td class="p1_byauthor" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
													<td class="p1_numbarcode">'.$barcode_P2.'</td>
												  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3">'.$new_text_memo_p2.'</td>
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_1P2.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P2.';" colspan="2"></td>
											
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
			<table class="tb_sub_p3">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P3.'</td>
									
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P3.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
											<td class="p1_numbarcode">'.$barcode_P3.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p3.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P3.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P3.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
		<td class="tdp1">
			<table class="tb_sub_p3">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P4.'</td>
									
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P4.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
											<td class="p1_numbarcode">'.$barcode_P4.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p4.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P4.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P4.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P5.'</td>
									
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P5.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
											<td class="p1_numbarcode">'.$barcode_P5.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p5.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P5.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P5.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P6.'</td>
									
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P6.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
											<td class="p1_numbarcode">'.$barcode_P6.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p6.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P6.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P6.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
			</tr>
			
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P7.'</td>
									
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P7.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
											<td class="p1_numbarcode">'.$barcode_P7.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p7.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P7.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P7.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P8.'</td>
									
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P8.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P8.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
											<td class="p1_numbarcode">'.$barcode_P8.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p8.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P8.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P8.';" colspan="2"></td>
											
										  </tr>
						</table>
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P9.'</td>
									
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P9.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P9.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
											<td class="p1_numbarcode">'.$barcode_P9.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p9.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P9.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P9.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P10.'</td>
									
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P10.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P10.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
											<td class="p1_numbarcode">'.$barcode_P10.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p10.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P10.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P10.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P11.'</td>
									
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P11.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P11.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
											<td class="p1_numbarcode">'.$barcode_P11.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p11.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P11.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P11.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p12">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P12.'</td>
									
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P12.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P12.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>
											<td class="p1_numbarcode">'.$barcode_P12.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_p12.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P12.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P12.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
			</tr>			
				<tr>
				<td class="tdp1">
					<table class="tb_sub_p13">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P13.'</td>
									
									<td class="p1_namebud">'.$bud_P13.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P13.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P13.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
											<td class="p1_numbarcode">'.$barcode_P13.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_P13.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P13.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P13.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
				<td class="tdp1">
				<table class="tb_sub_p13">
								<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
								  <tr>
									<td  class="p1_catbk" colspan="2" >'.$catbk_P14.'</td>
									
									<td class="p1_namebud">'.$bud_P14.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$bynumbk_P14.'</td>
											<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P14.'" size="0.9" height="0.65" type="C128A" class="barcode"/></div></td>
										  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>
											<td class="p1_numbarcode">'.$barcode_P14.'</td>
										  </tr>
										  <tr>
											<td class="p1_yearbk" colspan="2"></td>
											<td class="p1_namebk"  rowspan="3" >'.$new_text_memo_P14.'</td>
										  </tr>
										  <tr>
											<td class="color-r1" style="background-color: '.$Color_1P14.';" colspan="2"></td>
											
										  </tr>
										   <tr>
											<td class="color-r1" style="background-color: '.$Color_2P14.';" colspan="2"></td>
											
										  </tr>
						</table>
				</td>
			</tr>
				</tr>
		</table>

</body>
</html>';
//   echo $html;

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
 echo $set_path;
 
	}	

	
function setColorLabel_pbk($v){ 
	
$chk = array("1" => array("a" => "000", "b" =>"099.9", "r" => "product2"),
"2" => array("a" => "100", "b" => "199.9", "r" => "product3"),

"3" => array("a" => "200", "b" => "299.9", "r" => "product4"),

"4" => array("a" => "300", "b" => "399.9", "r" => "product5"),

"5" => array("a" => "400", "b" => "499.9", "r" => "product6"),

"6" => array("a" => "500", "b" => "599.9", "r" => "product7"),
"7" => array("a" => "600", "b" => "699.9", "r" => "product8"),
"8" => array("a" => "700", "b" => "799.9", "r" => "product9"),
"9" => array("a" => "800", "b" => "899.9", "r" => "product10"),
"10" => array("a" => "900", "b" => "999.9", "r" => "product10"),
);
// $val = "032.3";
// echo "<pre>";
// echo $val;
// https://htmlcolorcodes.com/color-chart/ ตารางสี
//  arry1 = "#afb42b" เขียวออกเหลือง
//  arry2 = "#607d8b" เทาออกน้ำเงิน
//  arry3 = "#ffeb3b " เหลือง
//  arry4 = "#004d40" เขียวออกฟ้าเข้ม
//  arry5 = "#e91e63 " ชมพุ
//  arry6 = "#c62828" แดง
//  arry7 = "#0288d1 " ฟ้าคราม
//  arry8 = "#00acc1 " เขียวออกฟ้าทะเล
//  arry9 = "#ffa726 " ส้มออกเหลือง
//  arry10 = "#5d4037 " น้ำตาล
$albumColor = array("#afb42b"=>array(1),
			"#607d8b"=>array(2),			
			"#ffeb3b"=>array(3),
			"#004d40"=>array(4),
			"#b713c7"=>array(5),
			"#c62828"=>array(6),
			"#0288d1"=>array(7),						
			"#00acc1"=>array(8),
			"#ffa726"=>array(9),
			"#5d4037"=>array(10),
						);
// $val = "499";
foreach ( $chk as $key => $item ) {
//  echo "<pre>";
//  echo $item['b'];
	if ( ($v >= $item['a']) && ($v <= $item['b']) ) {
		// echo $key;
		foreach($albumColor as $id => $data){
			foreach($data as $mainkey => $recive){
				// echo "<pre>";
				//  echo $recive;
				 if($key == $recive){
					// echo "<pre>";
					// echo $id;
					$color_txt[] = $id;
				 }
			}
		}
	}
}
$count = count($color_txt);
			if($count === 1){
				for($sx =0; $sx <2; $sx++){
					$ar_color[0] = $color_txt[0];
					$ar_color[1] = $color_txt[0];
					}
			}else{
				$ar_color = $color_txt;
			}			
			// echo "<pre>";
			// print_r($ar_color);
			return $ar_color;
}
function Func_platform_NumberOne($con, $platform, $position, $arr_codebook){
	$set = array();
//$itemID = $arr_position;
//echo "<pre>";
//print_r($arr_codebook);
	foreach($position as $key => $val)
	{
		$position['position'] = $val;
		//echo $position['position'] ;
		$arr_item[] = $position['position'];
	}
$count =  count($arr_item);	
//echo $count;
foreach($arr_codebook as $keybok => $idbook){
	$query = mysqli_query($con, 'select * from regis_books_tb as d1
							inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
							where BARCODE ="'.$idbook.'" limit '.$count.'');
							while($result = mysqli_fetch_array($query))
			{
				
				if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}
					}									
	
		}
// 	echo"<pre>";
// print_r($jsonx);
foreach($jsonx as $idbk){
				//echo"<pre>";
				//print_r($idbk[2]);
		$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
		$qry = mysqli_fetch_assoc($query_memo);	
				//echo $arr_memo['detail_athormain_tb'];
				if($idbk['barcode'] == $qry['blink_athor']){
					//echo "<pre>";
				//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
					$idbk['memo'] = $qry['detail_athormain_tb'];
					$x_data[] = $idbk;
				}else{
					//echo "<pre>";
				//	print_r($idbk[2]."else");
					$idbk['memo'] = "";
					$x_data[] = $idbk;
					}
			
		}



//echo "<pre>";
//print_r($x_data);
	
	
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
//echo $arr_item[$ix];	
$newStr = $x_data[$ix]['catstroe'];
//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
// echo $newStr."<pre>";
$strcatbk = substr($newStr ,0, 3); // ตัดเอา PBK	 (สร สท0300)
// echo $strcatbk."<pre>";
// $strlen = strlen($newStr);
// $num = $strlen - "3" ; //ลบ 3 เพราะ PBK
// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
$strcatbktttt = mb_substr($newStr,0,3, "UTF-8");
$fontnum = mb_substr($newStr,3,15, "UTF-8");
// $replace = preg_replace('/[^ย\-]/', '', $thai);
// $replace = str_replace("/ย/","",$thai);
//echo $fontnum."<pre>";
// echo "<pre>";
//  echo $fontnum."fonnum";

$arr__json['ID_KEY'] =  $arr_item[$ix];
$arr__json['barcode'] = $x_data[$ix]['barcode'];
$arr__json['namebk'] =  $x_data[$ix]['namebk'];
$arr__json['catbktxt'] = $strcatbk;
$arr__json['catbknum'] = $fontnum;
$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
$arr__json['memo'] = $x_data[$ix]['memo'] ;
$json_data[] = $arr__json;
}
// echo "<pre>";
// print_r($json_data);

foreach($json_data as $___key => $valdata){
	$text_num = $valdata['ID_KEY'];
	if($text_num == 1){				
		$barcode_P1 = $valdata['barcode'];
		$namebk_P1 = $valdata['namebk'];
		$catbk_P1 = $valdata['catbktxt'];
		$catbk_sub1 = $valdata['catbknum'];
		$yearbk_P1 = $valdata['yearbk'];
		$bynumbk_P1 = $valdata['bynumbk'];
		$memo_P1 = $valdata['memo'];
		$bud_P1 = $valdata['bud'];
		//echo $namebk_P1.":::";
		//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
		//echo $namebk_P1;
				$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
				$new_text_memo_p1 = $new_text."...";
		//echo $new_text_memo_p1;
		}else if($text_num == 2){
			$barcode_P2 = $valdata['barcode'];
			$namebk_P2 = $valdata['namebk'];
			$catbk_P2 = $valdata['catbktxt'];
			$catbk_sub2 = $valdata['catbknum'];
			$yearbk_P2 = $valdata['yearbk'];
			$bynumbk_P2 = $valdata['bynumbk'];
			$memo_P2 = $valdata['memo'];
			$bud_P2 = $valdata['bud'];
			$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
			$new_text_memo_p2 = $new_text."...";						
			}else if($text_num == 3){
				$barcode_P3 = $valdata['barcode'];
				$namebk_P3 = $valdata['namebk'];
				$catbk_P3 = $valdata['catbktxt'];
				$catbk_sub3 = $valdata['catbknum'];
				$yearbk_P3 = $valdata['yearbk'];
				$bynumbk_P3 = $valdata['bynumbk'];
				$memo_P3 = $valdata['memo'];
				$bud_P3 = $valdata['bud'];
				$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
				$new_text_memo_p3 = $new_text."...";	
				}else if($text_num == 4){
					$barcode_P4 = $valdata['barcode'];
					$namebk_P4 = $valdata['namebk'];
					$catbk_P4 = $valdata['catbktxt'];
					$catbk_sub4 = $valdata['catbknum'];
					$yearbk_P4 = $valdata['yearbk'];
					$bynumbk_P4 = $valdata['bynumbk'];
					$memo_P4 = $valdata['memo'];
					$bud_P4 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
					$new_text_memo_p4 = $new_text."...";	
					}else if($text_num == 5){
						$barcode_P5 = $valdata['barcode'];
						$namebk_P5 = $valdata['namebk'];
						$catbk_P5 = $valdata['catbktxt'];
						$catbk_sub5 = $valdata['catbknum'];
						$yearbk_P5 = $valdata['yearbk'];
						$bynumbk_P5 = $valdata['bynumbk'];
						$memo_P5 = $valdata['memo'];
						$bud_P5 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
						$new_text_memo_p5 = $new_text."...";	
						}else if($text_num == 6){
							$barcode_P6 = $valdata['barcode'];
							$namebk_P6 = $valdata['namebk'];
							$catbk_P6 = $valdata['catbktxt'];
							$catbk_sub6 = $valdata['catbknum'];
							$yearbk_P6 = $valdata['yearbk'];
							$bynumbk_P6 = $valdata['bynumbk'];
							$memo_P6 = $valdata['memo'];
							$bud_P6 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
							$new_text_memo_p6 = $new_text."...";	
							}else if($text_num == 7){
								$barcode_P7 = $valdata['barcode'];
								$namebk_P7 = $valdata['namebk'];
								$catbk_P7 = $valdata['catbktxt'];
								$catbk_sub7 = $valdata['catbknum'];
								$yearbk_P7 = $valdata['yearbk'];
								$bynumbk_P7 = $valdata['bynumbk'];
								$memo_P7 = $valdata['memo'];
								$bud_P7 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
								$new_text_memo_p7 = $new_text."...";	
								}else if($text_num == 8){
									$barcode_P8 = $valdata['barcode'];
									$namebk_P8 = $valdata['namebk'];
									$catbk_P8 = $valdata['catbktxt'];
									$catbk_sub8 = $valdata['catbknum'];
									$yearbk_P8 = $valdata['yearbk'];
									$bynumbk_P8 = $valdata['bynumbk'];
									$memo_P8 = $valdata['memo'];
									$bud_P8 = $valdata['bud'];
									$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
									$new_text_memo_p8 = $new_text."...";	
									}else if($text_num == 9){
										$barcode_P9 = $valdata['barcode'];
										$namebk_P9 = $valdata['namebk'];
										$catbk_P9 = $valdata['catbktxt'];
										$catbk_sub9 = $valdata['catbknum'];
										$yearbk_P9 = $valdata['yearbk'];
										$bynumbk_P9 = $valdata['bynumbk'];
										$memo_P9 = $valdata['memo'];
										$bud_P9 = $valdata['bud'];
										$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
										$new_text_memo_p9 = $new_text."...";	
										}else if($text_num == 10){
											$barcode_P10 = $valdata['barcode'];
											$namebk_P10 = $valdata['namebk'];
											$catbk_P10 = $valdata['catbktxt'];
											$catbk_sub10 = $valdata['catbknum'];
											$yearbk_P10 = $valdata['yearbk'];
											$bynumbk_P10 = $valdata['bynumbk'];
											$memo_P10 = $valdata['memo'];
											$bud_P10 = $valdata['bud'];
											$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
											$new_text_memo_p10 = $new_text."...";	
											}else if($text_num == 11){
								$barcode_P11 = $valdata['barcode'];
								$namebk_P11 = $valdata['namebk'];
								$catbk_P11 = $valdata['catbktxt'];
								$catbk_sub11 = $valdata['catbknum'];
								$yearbk_P11 = $valdata['yearbk'];
								$bynumbk_P11 = $valdata['bynumbk'];
								$memo_P11 = $valdata['memo'];
								$bud_P11 = $valdata['bud'];
								$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
								$new_text_memo_p11 = $new_text."...";	
				
					}else if($text_num == 12){
							$barcode_P12 = $valdata['barcode'];
							$namebk_P12 = $valdata['namebk'];
							$catbk_P12 = $valdata['catbktxt'];
							$catbk_sub12 = $valdata['catbknum'];
							$yearbk_P12 = $valdata['yearbk'];
							$bynumbk_P12 = $valdata['bynumbk'];
							$memo_P12 = $valdata['memo'];
							$bud_P12 = $valdata['bud'];
							$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
							$new_text_memo_p12 = $new_text."...";	
					}else if($text_num == 13){
						$barcode_P13 = $valdata['barcode'];
						$namebk_P13 = $valdata['namebk'];
						$catbk_P13 = $valdata['catbktxt'];
						$catbk_sub13 = $valdata['catbknum'];
						$yearbk_P13 = $valdata['yearbk'];
						$bynumbk_P13 = $valdata['bynumbk'];
						$memo_P13 = $valdata['memo'];
						$bud_P13 = $valdata['bud'];
						$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
						$new_text_memo_p13 = $new_text."...";	
		
			}else if($text_num == 14){
					$barcode_P14 = $valdata['barcode'];
					$namebk_P14 = $valdata['namebk'];
					$catbk_P14 = $valdata['catbktxt'];
					$catbk_sub14 = $valdata['catbknum'];
					$yearbk_P14 = $valdata['yearbk'];
					$bynumbk_P14 = $valdata['bynumbk'];
					$memo_P14 = $valdata['memo'];
					$bud_P14 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
					$new_text_memo_p14 = $new_text."...";	
			}
		 }

$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 295mm; 
	margin: 14mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:38mm;
	margin:1mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:36mm;
	margin:1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
<table class="tb_box">
	<tr>
			<td class="tdp1">
			<table class="tb_sub_p1">
		 				<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P1.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P1.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub1.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P1.'</td>
											<td class="p1_numbarcode">'.$barcode_P1.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p1.'</td>
								  </tr>
								
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p1">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P2.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P2.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub2.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P2.'</td>
											<td class="p1_numbarcode">'.$barcode_P2.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p2.'</td>
								  </tr>
								  
				</table>		
		</td>
	
	</tr>
		
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p3">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P3.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P3.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub3.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P3.'</td>
											<td class="p1_numbarcode">'.$barcode_P3.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p3.'</td>
								  </tr>
								 
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p3">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P4.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P4.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub4.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P4.'</td>
											<td class="p1_numbarcode">'.$barcode_P4.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p4.'</td>
								  </tr>
								  
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p5">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P5.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P5.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub5.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P5.'</td>
											<td class="p1_numbarcode">'.$barcode_P5.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p5.'</td>
								  </tr>
								 
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p5">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P6.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P6.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub6.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P6.'</td>
											<td class="p1_numbarcode">'.$barcode_P6.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p6.'</td>
								  </tr>
								 
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p7">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P7.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P7.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub7.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P7.'</td>
											<td class="p1_numbarcode">'.$barcode_P7.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p7.'</td>
								  </tr>
								
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p7">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P8.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P8.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub8.'</td>
									<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P8.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P8.'</td>
											<td class="p1_numbarcode">'.$barcode_P8.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p8.'</td>
								  </tr>
								  
				</table>		
		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p9">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P9.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P9.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub9.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P9.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P9.'</td>
											<td class="p1_numbarcode">'.$barcode_P9.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p9.'</td>
								  </tr>
								
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p9">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P10.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P10.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub10.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P10.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P10.'</td>
											<td class="p1_numbarcode">'.$barcode_P10.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p10.'</td>
								  </tr>
								 
				</table>		
		</td>
	</tr>
	<tr>
		<td class="tdp1">
			<table class="tb_sub_p11">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P11.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P11.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub11.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P11.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P11.'</td>
											<td class="p1_numbarcode">'.$barcode_P11.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p11.'</td>
								  </tr>
								 
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p11">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P12.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P12.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub12.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P12.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P12.'</td>
											<td class="p1_numbarcode">'.$barcode_P12.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p12.'</td>
								  </tr>
								  
				</table>		
		</td>
	</tr>
		<tr>
		<td class="tdp1">
			<table class="tb_sub_p13">
		 					<tr>								
								<td class="ttt" rowspan="8"></td>
							 </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P13.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P13.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub13.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P13.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P13.'</td>
											<td class="p1_numbarcode">'.$barcode_P13.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p13.'</td>
								  </tr>
								 
				</table>		
		</td>
		<td class="tdp1">
			<table class="tb_sub_p13">
		 					<tr>								
									<td class="ttt" rowspan="8"></td>
								  </tr>
						  <tr>
							<td  class="p1_catbk">'.$catbk_P14.'</td>
							<td class="p1_notfont">&nbsp;</td>
							<td class="p1_namebud">'.$bud_P14.'</td>
						  </tr>
								  <tr>
									<td class="p1_numcatbk" colspan="2">'.$catbk_sub14.'</td>
									<td class="p1_barcode"><barcode code="'.$barcode_P14.'" size="0.9" height="0.60" type="C128A" class="barcode"/></td>
								  </tr>
										  <tr>
											<td class="p1_byauthor" colspan="2">'.$bynumbk_P14.'</td>
											<td class="p1_numbarcode">'.$barcode_P14.'</td>
										  </tr>
								  <tr>
									<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>
									<td class="p1_namebk" rowspan="3">'.$new_text_memo_p14.'</td>
								  </tr>
								 
				</table>		
		</td>
	</tr>

</table>

</body>
</html>';
// echo $html;

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
'fontDir' => array_merge($fontDirs, [
__DIR__ . '/tmp',
]),
'fontdata' => $fontData + [
'sarabun' => [
	'R' => 'THSarabunNew.ttf',
	'I' => 'THSarabunNew Italic.ttf',
]
],
'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;

}		





function Func_platform_NumberNine($con, $platform, $position, $arr_codebook){
			$set = array();
		//$itemID = $arr_position;
		//echo "<pre>";
		//print_r($arr_codebook);
			foreach($position as $key => $val)
			{
				$position['position'] = $val;
				//echo $position['position'] ;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		foreach($arr_codebook as $keybok => $idbook){
			$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE ="'.$idbook.'" limit '.$count.'');
									while($result = mysqli_fetch_array($query))
					{
						
						if($result['BARCODE'] != ""){
							// echo"<pre>";
							// echo $result['BARCODE'];
							$set[] = $result;
							$arr_x__json['ID_KEY'] = "";
							$arr_x__json['barcode'] = $result['BARCODE'];
							$arr_x__json['namebk'] = $result['NAME_BOOK'];
							$arr_x__json['catstroe'] = $result['Catbook_store'];
							$arr_x__json['catbktxt'] = "";
							$arr_x__json['catbknum'] = "";
							$arr_x__json['yearbk'] = $result['Year_book'];
							$arr_x__json['bynumbk'] = $result['BYNUM'];
							$arr_x__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$arr_x__json['memo'] = "" ;	
							$jsonx[] = $arr_x__json;				
						}							
							
					}
				
			
			
				}
		// 	echo"<pre>";
		// print_r($jsonx);
	foreach($jsonx as $idbk){
						//echo"<pre>";
						//print_r($idbk[2]);
				$query_memo = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$idbk['barcode'].'" and TYPE = "M"');
				$qry = mysqli_fetch_assoc($query_memo);	
						//echo $arr_memo['detail_athormain_tb'];
						if($idbk['barcode'] == $qry['blink_athor']){
							//echo "<pre>";
						//	print_r($qry['blink_athor'].$qry['detail_athormain_tb']."if");
							$idbk['memo'] = $qry['detail_athormain_tb'];
							$x_data[] = $idbk;
						}else{
							//echo "<pre>";
						//	print_r($idbk[2]."else");
							$idbk['memo'] = "";
							$x_data[] = $idbk;
							}
					
				}
	
		
		
	//echo "<pre>";
	//print_r($x_data);
			
			
//echo "<pre>";
//print_r($date_arr);
//echo "<pre>";
//print_r($DATA_Code);
//echo "<pre>";
//print_r($arrjson);
//echo "<pre>";
//print_r($set);
for($ix =0; $ix < count($x_data); $ix ++){
	//echo $arr_item[$ix];	
	$newStr = $x_data[$ix]['catstroe'];
	//$newStr = preg_replace('/[[:space:]]+/', '', trim($set[$ix]['Catbook_store']));
	//echo $newStr."<pre>";
	$strcatbk = substr($newStr ,0, 3); // ตัดเอา PBK	 (สร สท0300)
	//echo $strcatbk."<pre>";
	// $strlen = strlen($newStr);
	// $num = $strlen - "3" ; //ลบ 3 เพราะ PBK
	// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	$strcatbktttt = mb_substr($newStr,0,3, "UTF-8");
	$fontnum = mb_substr($newStr,3,15, "UTF-8");
	// $replace = preg_replace('/[^ย\-]/', '', $thai);
	// $replace = str_replace("/ย/","",$thai);
	//echo $fontnum."<pre>";
	// echo "<pre>";
 	//  echo $fontnum;
 $strColor =	setColorLabel_pbk($fontnum);

	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbktxt'] = $strcatbk;
	$arr__json['catbknum'] = $fontnum;
	$arr__json['yearbk'] =  $x_data[$ix]['yearbk'];
	$arr__json['bynumbk'] = $x_data[$ix]['bynumbk'];
	$arr__json['bud'] = "ห้องสมุดโรงพยาบาลพุทธชินราช";
	$arr__json['memo'] = $x_data[$ix]['memo'] ;
	$arr__json['Color-R1'] = $strColor[0];	
	$json_data[] = $arr__json;
	}
// echo "<pre>";
// print_r($json_data);

foreach($json_data as $___key => $valdata){
			$text_num = $valdata['ID_KEY'];
			if($text_num == 1){				
				$barcode_P1 = $valdata['barcode'];
				$namebk_P1 = $valdata['namebk'];
				$catbk_P1 = $valdata['catbktxt'];
				$catbk_sub1 = $valdata['catbknum'];
				$yearbk_P1 = $valdata['yearbk'];
				$bynumbk_P1 = $valdata['bynumbk'];
				$memo_P1 = $valdata['memo'];
				$bud_P1 = $valdata['bud'];
				$color_R1P1 = $valdata['Color-R1'];
				
				//echo $namebk_P1.":::";
				//$strlen = iconv_strlen ($namebk_P1,'UTF-8'); //40
				//echo $namebk_P1;
						$new_text = iconv_substr($namebk_P1, 0, 25, 'UTF-8');
						$new_text_memo_p1 = $new_text."...";
				//echo $new_text_memo_p1;
				}else if($text_num == 2){
					$barcode_P2 = $valdata['barcode'];
					$namebk_P2 = $valdata['namebk'];
					$catbk_P2 = $valdata['catbktxt'];
					$catbk_sub2 = $valdata['catbknum'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$color_R1P2 = $valdata['Color-R1'];
				
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
					}else if($text_num == 3){
						$barcode_P3 = $valdata['barcode'];
						$namebk_P3 = $valdata['namebk'];
						$catbk_P3 = $valdata['catbktxt'];
						$catbk_sub3 = $valdata['catbknum'];
						$yearbk_P3 = $valdata['yearbk'];
						$bynumbk_P3 = $valdata['bynumbk'];
						$memo_P3 = $valdata['memo'];
						$bud_P3 = $valdata['bud'];
						$color_R1P3 = $valdata['Color-R1'];
					
						$new_text = iconv_substr($namebk_P3, 0, 25, 'UTF-8');
						$new_text_memo_p3 = $new_text."...";	
						}else if($text_num == 4){
							$barcode_P4 = $valdata['barcode'];
							$namebk_P4 = $valdata['namebk'];
							$catbk_P4 = $valdata['catbktxt'];
							$catbk_sub4 = $valdata['catbknum'];
							$yearbk_P4 = $valdata['yearbk'];
							$bynumbk_P4 = $valdata['bynumbk'];
							$memo_P4 = $valdata['memo'];
							$bud_P4 = $valdata['bud'];
							$color_R1P4 = $valdata['Color-R1'];
					
							$new_text = iconv_substr($namebk_P4, 0, 25, 'UTF-8');
							$new_text_memo_p4 = $new_text."...";	
							}else if($text_num == 5){
								$barcode_P5 = $valdata['barcode'];
								$namebk_P5 = $valdata['namebk'];
								$catbk_P5 = $valdata['catbktxt'];
								$catbk_sub5 = $valdata['catbknum'];
								$yearbk_P5 = $valdata['yearbk'];
								$bynumbk_P5 = $valdata['bynumbk'];
								$memo_P5 = $valdata['memo'];
								$bud_P5 = $valdata['bud'];
								$color_R1P5 = $valdata['Color-R1'];
							
								$new_text = iconv_substr($namebk_P5, 0, 25, 'UTF-8');
								$new_text_memo_p5 = $new_text."...";	
								}else if($text_num == 6){
									$barcode_P6 = $valdata['barcode'];
									$namebk_P6 = $valdata['namebk'];
									$catbk_P6 = $valdata['catbktxt'];
									$catbk_sub6 = $valdata['catbknum'];
									$yearbk_P6 = $valdata['yearbk'];
									$bynumbk_P6 = $valdata['bynumbk'];
									$memo_P6 = $valdata['memo'];
									$bud_P6 = $valdata['bud'];
									$color_R1P6 = $valdata['Color-R1'];
								
									$new_text = iconv_substr($namebk_P6, 0, 25, 'UTF-8');
									$new_text_memo_p6 = $new_text."...";	
									}else if($text_num == 7){
										$barcode_P7 = $valdata['barcode'];
										$namebk_P7 = $valdata['namebk'];
										$catbk_P7 = $valdata['catbktxt'];
										$catbk_sub7 = $valdata['catbknum'];
										$yearbk_P7 = $valdata['yearbk'];
										$bynumbk_P7 = $valdata['bynumbk'];
										$memo_P7 = $valdata['memo'];
										$bud_P7 = $valdata['bud'];
										$color_R1P7 = $valdata['Color-R1'];
								
										$new_text = iconv_substr($namebk_P7, 0, 25, 'UTF-8');
										$new_text_memo_p7 = $new_text."...";	
										}else if($text_num == 8){
											$barcode_P8 = $valdata['barcode'];
											$namebk_P8 = $valdata['namebk'];
											$catbk_P8 = $valdata['catbktxt'];
											$catbk_sub8 = $valdata['catbknum'];
											$yearbk_P8 = $valdata['yearbk'];
											$bynumbk_P8 = $valdata['bynumbk'];
											$memo_P8 = $valdata['memo'];
											$bud_P8 = $valdata['bud'];
											$color_R1P8 = $valdata['Color-R1'];
										
											$new_text = iconv_substr($namebk_P8, 0, 25, 'UTF-8');
											$new_text_memo_p8 = $new_text."...";	
											}else if($text_num == 9){
												$barcode_P9 = $valdata['barcode'];
												$namebk_P9 = $valdata['namebk'];
												$catbk_P9 = $valdata['catbktxt'];
												$catbk_sub9 = $valdata['catbknum'];
												$yearbk_P9 = $valdata['yearbk'];
												$bynumbk_P9 = $valdata['bynumbk'];
												$memo_P9 = $valdata['memo'];
												$bud_P9 = $valdata['bud'];
												$color_R1P9 = $valdata['Color-R1'];
											
												$new_text = iconv_substr($namebk_P9, 0, 25, 'UTF-8');
												$new_text_memo_p9 = $new_text."...";	
												}else if($text_num == 10){
													$barcode_P10 = $valdata['barcode'];
													$namebk_P10 = $valdata['namebk'];
													$catbk_P10 = $valdata['catbktxt'];
													$catbk_sub10 = $valdata['catbknum'];
													$yearbk_P10 = $valdata['yearbk'];
													$bynumbk_P10 = $valdata['bynumbk'];
													$memo_P10 = $valdata['memo'];
													$bud_P10 = $valdata['bud'];
													$color_R1P10 = $valdata['Color-R1'];
											
													$new_text = iconv_substr($namebk_P10, 0, 25, 'UTF-8');
													$new_text_memo_p10 = $new_text."...";	
													}else if($text_num == 11){
										$barcode_P11 = $valdata['barcode'];
										$namebk_P11 = $valdata['namebk'];
										$catbk_P11 = $valdata['catbktxt'];
										$catbk_sub11 = $valdata['catbknum'];
										$yearbk_P11 = $valdata['yearbk'];
										$bynumbk_P11 = $valdata['bynumbk'];
										$memo_P11 = $valdata['memo'];
										$bud_P11 = $valdata['bud'];
										$color_R1P11 = $valdata['Color-R1'];
									
										$new_text = iconv_substr($namebk_P11, 0, 25, 'UTF-8');
										$new_text_memo_p11 = $new_text."...";	
						
							}else if($text_num == 12){
									$barcode_P12 = $valdata['barcode'];
									$namebk_P12 = $valdata['namebk'];
									$catbk_P12 = $valdata['catbktxt'];
									$catbk_sub12 = $valdata['catbknum'];
									$yearbk_P12 = $valdata['yearbk'];
									$bynumbk_P12 = $valdata['bynumbk'];
									$memo_P12 = $valdata['memo'];
									$bud_P12 = $valdata['bud'];
									$color_R1P12 = $valdata['Color-R1'];
								
									$new_text = iconv_substr($namebk_P12, 0, 25, 'UTF-8');
									$new_text_memo_p12 = $new_text."...";	
							}else if($text_num == 13){
								$barcode_P13 = $valdata['barcode'];
								$namebk_P13 = $valdata['namebk'];
								$catbk_P13 = $valdata['catbktxt'];
								$catbk_sub13 = $valdata['catbknum'];
								$yearbk_P13 = $valdata['yearbk'];
								$bynumbk_P13 = $valdata['bynumbk'];
								$memo_P13 = $valdata['memo'];
								$bud_P13 = $valdata['bud'];
								$color_R1P13 = $valdata['Color-R1'];
					
								$new_text = iconv_substr($namebk_P13, 0, 25, 'UTF-8');
								$new_text_memo_p13 = $new_text."...";	
				
					}else if($text_num == 14){
							$barcode_P14 = $valdata['barcode'];
							$namebk_P14 = $valdata['namebk'];
							$catbk_P14 = $valdata['catbktxt'];
							$catbk_sub14 = $valdata['catbknum'];
							$yearbk_P14 = $valdata['yearbk'];
							$bynumbk_P14 = $valdata['bynumbk'];
							$memo_P14 = $valdata['memo'];
							$bud_P14 = $valdata['bud'];
							$color_R1P14 = $valdata['Color-R1'];
						
							$new_text = iconv_substr($namebk_P14, 0, 25, 'UTF-8');
							$new_text_memo_p14 = $new_text."...";	
					}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 204mm 299mm; 
	margin: 15.5mm 0mm 0mm 5mm;
	margin-header: 0mm;
	margin-footer: 0mm;
	header: html_myHTMLHeaderOdd;
	footer: html_myHTMLFooterOdd;
	background: ...
	background-image: ...
	background-position ...
	background-repeat ...
	background-color ...
	background-gradient: ...
	
}
body{font-size:14px;} 
 
.tb_box{
	font-size:22px;	
	width:99mm;
	height: 269mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	/*border:solid 1px #FF0000;*/
	}		
tr{
	display:flex;	
	}	

.tdp1{	
	/*border:dotted 1px #b50aba;*/
	width:100%;
	height:45.5mm;
	margin:0mm;
	padding:0mm;
	}
.ttt{
	width:8mm;
}
.tb_sub_p1{
	display:flex;
	width:99mm;
	height:34mm;
	margin:0.2mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
table tr td{
/*border:solid 1px #b50aba ;*//*ม้วง*/
}
.tb_sub_p3{	
   /* border:solid 1px #b50aba;*/
	display:flex;	
	height:34mm;
	margin:1mm 0.3mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0.2mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:33mm;
	margin:0mm 0.7mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:0mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:0mm 0.8mm 0.6mm 0mm;	
	background-color:white;	
	}	
.tb_sub_p13{
	
	display:flex;
	width:79.4mm;
	height:32m;
	margin:0.1mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}			
.p1_namebud{
font-size:23px;	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	width:70mm;
	text-align: center;		
	}	
.p1_catbk{
	font-size:23px;	
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	/*border:solid 1px #b50aba;*/
	}
.p1_numcatbk{
	font-size:23px;	
	/*border:solid 1px #FF0000;*/
	width:38mm;
	margin:0mm;	
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{	
	margin:0mm;
	padding:0mm;
	width:25mm;
	}
.p1_yearbk{		
	padding:0mm 0mm 0mm 4mm;
	width:34mm;}
.p1_numbarcode{	
	width:70mm;
	height:5mm;
	text-align: center;	}	
.p1_byauthor{
font-size:23px;	
	width:38mm;	
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	font-size:22px;	
	text-align:center;
	width:70mm;
	display:block;	
	
	}
.Pnamebook{
	color:red;
	width:65mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:60mm;
}	
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000000;
	width:70mm;
}
.color-r1{
	width:38mm;
	height:7mm;	
}
.color-r2{
	border: hidden;
	width:38mm;
	height:7mm;
}
.barcodecell {
	width:67mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
</style>
</head>

<body>
		<table class="tb_box">
		<tr>
				<td class="tdp1">
				<table class="tb_sub_p1">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P1.';" colspan="2"></td>
										
							
								
								<td class="p1_namebud">'.$bud_P1.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P1.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P1.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub1.'</td>
												<td class="p1_numbarcode">'.$barcode_P1.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P1.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p1.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P1.'&nbsp;'.$memo_P1.'</td>
									
									  </tr>
									   
									   
					</table>		
			</td>					
		<td class="tdp1" >
			<table class="tb_sub_p1">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P2.';" colspan="2"></td>								
								<td class="p1_namebud">'.$bud_P2.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P2.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P2.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub2.'</td>
												<td class="p1_numbarcode">'.$barcode_P2.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P2.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p2.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P2.'&nbsp;'.$memo_P2.'</td>
									
									  </tr>
									   
									   
					</table>		
			</td>
		
		</tr>
			
		<tr>
			<td class="tdp1">
				<table class="tb_sub_p3">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P3.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P3.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P3.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P3.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub3.'</td>
												<td class="p1_numbarcode">'.$barcode_P3.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P3.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p3.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P3.'&nbsp;'.$memo_P3.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
					<table class="tb_sub_p3">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P4.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P4.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P4.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P4.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub4.'</td>
												<td class="p1_numbarcode">'.$barcode_P4.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P4.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p4.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P4.'&nbsp;'.$memo_P4.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
		<tr>
		<td class="tdp1">
					<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P5.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P5.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P5.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P5.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub5.'</td>
												<td class="p1_numbarcode">'.$barcode_P5.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P5.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p5.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P5.'&nbsp;'.$memo_P5.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		<td class="tdp1">
				<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P6.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P6.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P6.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P6.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub6.'</td>
												<td class="p1_numbarcode">'.$barcode_P6.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P6.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p6.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P6.'&nbsp;'.$memo_P6.'</td>									
									  </tr>
									   
									   
					</table>				
			</td>
		</tr>
		<tr>
		<td class="tdp1">
				<table class="tb_sub_p7">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P7.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P7.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P7.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P7.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub7.'</td>
												<td class="p1_numbarcode">'.$barcode_P7.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P7.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p7.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P7.'&nbsp;'.$memo_P7.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
			<td class="tdp1" >
				<table class="tb_sub_p5">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P8.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P8.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P8.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P8.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub8.'</td>
												<td class="p1_numbarcode">'.$barcode_P8.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P8.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p8.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P8.'&nbsp;'.$memo_P8.'</td>									
									  </tr>
									   
									   
					</table>		
			
			</td>
		</tr>
		<tr>
	<td class="tdp1" >
				<table class="tb_sub_p9">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P9.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P9.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P9.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P9.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub9.'</td>
												<td class="p1_numbarcode">'.$barcode_P9.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P9.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p9.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P9.'&nbsp;'.$memo_P9.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
				<table class="tb_sub_p9">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P10.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P10.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P10.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P10.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub10.'</td>
												<td class="p1_numbarcode">'.$barcode_P10.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P10.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p10.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P10.'&nbsp;'.$memo_P10.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
		<tr>
		<td class="tdp1">
				<table class="tb_sub_p11">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P11.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P11.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P11.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P11.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub11.'</td>
												<td class="p1_numbarcode">'.$barcode_P11.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P11.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p11.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P11.'&nbsp;'.$memo_P11.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
	<td class="tdp1">
				<table class="tb_sub_p11">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P12.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P12.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P12.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P12.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub12.'</td>
												<td class="p1_numbarcode">'.$barcode_P12.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P12.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p12.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P12.'&nbsp;'.$memo_P12.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		</tr>
			<tr>
		<td class="tdp1">
				<table class="tb_sub_p13">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P13.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P13.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P13.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P13.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub13.'</td>
												<td class="p1_numbarcode">'.$barcode_P13.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P13.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p13.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P13.'&nbsp;'.$memo_P13.'</td>									
									  </tr>
									   
									   
					</table>		
			</td>
		<td class="tdp1">
					<table class="tb_sub_p13">
							<tr>								
								<td class="ttt" rowspan="8"></td>
							  </tr>
							  <tr>
								<td class="color-r1" colspan="2" style="background-color: '.$color_R1P14.';" colspan="2"></td>
								<td class="p1_namebud">'.$bud_P14.'</td>
							  </tr>
									  <tr>
										<td class="p1_numcatbk" colspan="2">'.$catbk_P14.'</td>
										<td class="p1_barcode"><div class="barcodecell"><barcode code="'.$barcode_P14.'" size="0.9" height="0.60" type="C128A" class="barcode"/></div></td>
									  </tr>
											  <tr>
												<td class="p1_byauthor" colspan="2">'.$catbk_sub14.'</td>
												<td class="p1_numbarcode">'.$barcode_P14.'</td>
											  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$bynumbk_P14.'</td>
										<td class="p1_namebk" rowspan="3">'.$new_text_memo_p14.'</td>
									  </tr>
									  <tr>
										<td class="p1_yearbk" colspan="2">'.$yearbk_P14.'&nbsp;'.$memo_P14.'</td>									
									  </tr>
									   
									   
					</table>
			</td>
		</tr>
	
	</table>

</body>
</html>';
 // echo $html;

include("../phpsv/ExportPDF-master/vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
$rand = rand(10,1000);
$date = date("Y-m-d");
$sum = $date.$rand;
$mpdf->WriteHTML($html);
//echo $html;
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path );
echo $set_path ;

	}		


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
    
    
	
	
	
	
	
	
	
	
	
    
    