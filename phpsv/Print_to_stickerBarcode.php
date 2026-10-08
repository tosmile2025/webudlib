

<?php 
	include('../connectdata/cnectDB.php');
error_reporting( error_reporting() & ~E_NOTICE ); 
//$_POST['code_arr'] = array('212144','212145','212146','212147','212148','212149','212150','212151','212152','212153', '212154','212155');
//$_POST['code_arr'] = array('110459','110460','110461','110462');
//$_POST['code_arr'] = array('509027','509028','509029','509030','509031','509032');
//$_POST['code_arr'] = array('500014','500014','500014','500014','500014','500014','500014','500014','500014','500014','500014','500014');
//$_POST['code_arr'] = array('G00027','G00079','G00027','G00079','G00092','G00092','G00092','G00052','G00052','G00052','G00052','G00052');
//$_POST['code_arr'] = array('211791','211792','211793','211794','211795','211796','211797','211798','211791','211792','211793','211794');
//  $_POST['code_arr'] = array('F08081','F08081','F08081','F08001','F08001','F08001','F08001','F08001','F08001','F08010','F08010','F08010');
// $_POST['code_arr'] = array('R01141','R01138','R01138','R01138','R01138','R01138','R01138','R01141','R01141','R01141','R01141','R01141');
// $_POST['code_arr'] = array('F08081','F08081','F08081','F08081','F08081','F08081','F08084','F08083','F08081','F08085','F08084','F08083');
//$_POST['code_arr'] = array('101121','101121','101121','101121','101121','101122','101128','101124','101125','101126','101127','101120');
//$_POST['code_arr'] = array('315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315162','315167');
// -----------------------------ทดสอบ ปริ้นไม่ครบตำแหน่ง---------------------------
//$_POST['code_arr'] = array('500014','500014','500014','500014','500014','500014','500014','500014','500014');
//$_POST['code_arr'] = array('G00027','G00079','G00027','G00092','G00052','G00052','G00052','G00052');
//$_POST['code_arr'] = array('211791','211792','211793','211794','211795','211796','211797','211798','211791','211792','211793','211794');
//$_POST['code_arr'] = array('F08081','F08081','F08081','F08001','F08001','F08001','F08001','F08001','F08001','F08010','F08010','F08010');
//  $_POST['code_arr'] = array('R01141','R01138','R01138','R01138','R01138','R01138','R01138','R01141','R01141','R01141','R01141','R01141');
//$_POST['code_arr'] = array('F08081','F08081','F08081','F08081','F08081','F08081','F08084','F08083','F08081','F08085','F08084','F08083');
//$_POST['code_arr'] = array('101121','101121','101121','101121','101121','101122','101128','101124','101125','101126','101127','101120');
//$_POST['code_arr'] = array('315162','315162','315162','315162','315162','315162','315162','315162');
//  $_POST['code_arr'] = array('R02410');
	
// $_POST['stutplat'] = '4';	//1 = pbk  ผ่านแล้ว
							//2 = นิยาย นวนิยาย  // ทำแล้ว 
							//3 = สร  ผ่านแล้ว
							//4 = อ้างอิง // ทำแล้ว
							//5 = text //ทำแล้ว
							//6 = นิตยสาร // ทำแล้ว
// $_POST['numitem'] = array(3); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array							
// $_POST['numitem'] = array(1,2,3,4,5,6,7,8,9,10,11,12); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
//echo $_POST['IDbook_Last'] ;
//$_POST['numitem'] = array(1); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
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
				 }else{
					 mysqli_close($con);
					 }
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
	$arr__json['dpart'] = $x_data[$ix]['dpart'];
	$json_data[] = $arr__json;
	}
/*echo "<pre>";
print_r($json_data);*/

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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;
	}	

.tdp1{
	/* border:solid 1px #FF0000;*/
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm 0mm 0mm 2mm;
	}
.tb_sub_p1{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:17mm;
	}
.p1_numcatbk{
	
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:10mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	
	width:40mm;
	padding: 0mm;
    margin: 0mm;
    text-align: center;
    vertical-align: middle;
}
.boxRotate{	
	padding: 0px;
	margin: 0px;
	 width:100%; 	
	display:inline-table;
	font-size:18px;  
    text-align: left;
	transform:scaleX(4);
    color: #FF0000;
	transform: rotate(-90deg);
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
		<td class="tdp1">
			<table class="tb_sub_p1">
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;	
	}	

.tdp1{
	/*border:solid 1px #FF0000;*/
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm;
	}
.tb_sub_p1{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	font-size:16px;
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	/*border:solid 1px #FF0000;*/
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{	
	font-size:16px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{
	text-align:center;	
	width:40mm;
	display:block;
	height:6mm;
	
	}
/*tr td{
	border: solid 1px #FF0000;
}*/
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;	
	}	

.tdp1{
	/*border:solid 1px #FF0000;*/
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm 0mm 0mm 2mm;
	}
.tb_sub_p1{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	/*border:solid 1px #FF0000;*/
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
$mpdf->Output($set_path);
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;
	}		
tr{
	display:flex;		
	}	

.tdp1{
	
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm;	
	}
.tb_sub_p1{	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	/*border:solid 1px #000066;*/
	margin:0mm;
	font-size:19px;	
	padding:2mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	/*border:solid 1px #FF0000;*/
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	/*border:solid 1px #000066;*/
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;	
	}	

.tdp1{
	
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm;
	}
.tb_sub_p1{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	/*border:solid 1px #FF0000;*/
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
//print_r($x_data);
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
	//echo $newStr."|".$x_data[$ix]['barcode']."<pre>";
		
	//echo $fontnum."<pre>";
	//echo "<pre>";
	//echo $strlen;
	$arr__json['ID_KEY'] =  $arr_item[$ix];
	$arr__json['barcode'] = $x_data[$ix]['barcode'];
	$arr__json['namebk'] =  $x_data[$ix]['namebk'];
	$arr__json['catbk'] = $newStr;
	// $arr__json['catbknum'] = $fontnum;
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
				$catbk_P1 = $valdata['catbk'];
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
					$catbk_P2 = $valdata['catbk'];
					$yearbk_P2 = $valdata['yearbk'];
					$bynumbk_P2 = $valdata['bynumbk'];
					$memo_P2 = $valdata['memo'];
					$bud_P2 = $valdata['bud'];
					$new_text = iconv_substr($namebk_P2, 0, 25, 'UTF-8');
					$new_text_memo_p2 = $new_text."...";						
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;	
	}	

.tdp1{
	
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm;
	}
.tb_sub_p1{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	/*border:solid 1px #FF0000;*/
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P1.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P1.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P2.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P2.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P3.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P3.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P4.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P4.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P5.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P5.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P6.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P6.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P7.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P7.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P8.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P8.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P9.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P9.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P10.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P10.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P11.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P11.'</td>
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
									<td  class="p1_catbk"></td>
									<td class="p1_notfont">&nbsp;</td>
									<td class="p1_namebud">'.$bud_P12.'</td>
								  </tr>
										  <tr>
											<td class="p1_numcatbk" colspan="2">'.$catbk_P12.'</td>
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
						
							
					}
					$jsonx[] = $arr_x__json;
			
			
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
	$strcatbk = substr($newStr ,0, 3); // ตัดเอา PBK	 (สร สท0300)
	//echo $strcatbk."<pre>";
	$strlen = strlen($newStr);
	$num = $strlen - "3" ; //ลบ 3 เพราะ PBK
	$fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
	
	//echo $fontnum."<pre>";
	//echo "<pre>";
	//echo $strcatbk;
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
							}
 				}
	
$html = '

<html>
<head>
<style>
    @page {
	sheet-size: 210.50mm 295mm; 
	margin: 0.5mm 0mm 0mm 13mm;
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
body{font-size:16px;} 
 
.tb_box{
	width:79mm;
	display:flex;	
	margin:0mm;
	padding:0mm;}		
tr{
	display:flex;	
	}	

.tdp1{
	
	display:flex;
	width:79.4mm;
	height:34mm;
	margin:0mm;
	padding:0.2mm;
	}
.tb_sub_p1{
	
	display:flex;
	width:79.4mm;
	height:32mm;
	margin:2.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p3{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p5{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5.5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p7{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:4mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p9{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}
.tb_sub_p11{
	
	display:flex;
	width:79.4mm;
	height:30mm;
	margin:5mm 0.6mm 0.6mm 0mm;	
	background-color:white;	
	}				
.p1_namebud{
	margin:0mm;
	padding:0mm;	
	height:8.7mm;
	text-align: center;		
	}	
.p1_catbk{
	
	margin:0mm;
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:10mm;
	}
.p1_numcatbk{
	
	margin:0mm;
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}	
.p1_barcode{	
	
	text-align: center;}	
.p1_notfont{
	
	margin:0mm;
	padding:0mm;
	width:17mm;
	}
.p1_yearbk{
	
	font-size:19px;	
	padding:0mm 0mm 0mm 4mm;
	width:27mm;}
.p1_numbarcode{	
	height:6mm;
	text-align: center;	}	
.p1_byauthor{
	font-size:19px;
	padding:0mm 0mm 0mm 4mm;
	}
.p1_namebk{	
	text-align:center;
	width:40mm;
	display:block;
	height:6mm;
	
	}
.Pnamebook{
	color:red;
	width:40mm;
	height:8.5mm;
    overflow: hidden;
   text-overflow: ellipsis;
   -o-text-overflow: ellipsis;
   white-space: nowrap;
   max-width:40mm;
}			
.barcode {
	border:0mm;
    padding: 0mm;
    margin: 0mm;
    vertical-align: top;
    color: #000044;
}
.barcodecell {
	width:40mm;
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
											<td class="p1_namebk">'.$new_text_memo_p1.'</td>
										  </tr>
						</table>
				</td>
				<td class="tdp1">
					<table class="tb_sub_p1">
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
											<td class="p1_namebk">'.$new_text_memo_p2.'</td>
										  </tr>
						</table>		
				
				
				</td>
				</tr>
				
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p3">
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
											<td class="p1_namebk">'.$new_text_memo_p3.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p3">
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
											<td class="p1_namebk">'.$new_text_memo_p4.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p5">
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
											<td class="p1_namebk">'.$new_text_memo_p5.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p5">
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
											<td class="p1_namebk">'.$new_text_memo_p6.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p7">
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
											<td class="p1_namebk">'.$new_text_memo_p7.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p7">
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
											<td class="p1_namebk">'.$new_text_memo_p8.'</td>
										  </tr>
						</table>		
				
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p9">
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
											<td class="p1_namebk">'.$new_text_memo_p9.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p9">
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
											<td class="p1_namebk">'.$new_text_memo_p10.'</td>
										  </tr>
						</table>		
				</td>
			</tr>
			<tr>
				<td class="tdp1">
					<table class="tb_sub_p11">
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
											<td class="p1_namebk">'.$new_text_memo_p11.'</td>
										  </tr>
						</table>		
				</td>
				<td class="tdp1">
					<table class="tb_sub_p11">
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
											<td class="p1_namebk">'.$new_text_memo_p12.'</td>
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


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	
    
    
	
	
	
	
	
	
	
	
	
    
    