
<?php 
	include('../connectdata/cnectDB.php');
	//  $_POST['idbookstart'] = "315243";
	//  $_POST['idbookend'] = "315243";
	// $n= 6;
	//  $_POST['itemID'] = array(1); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
if(isset($_POST['itemID']))
	{
		//$itemID = $arr_position;
		$itemID = $_POST['itemID'];
		$typePlatform = $_POST['ChkTypeform'];
		foreach($itemID as $key => $val)
			{
				$position['position'] = $val;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//echo $count;
		$codeStart = $_POST['idbookstart'];
		$codeEnd = $_POST['idbookend'];
		//$codeStart = "211791";
		//$codeEnd ="211798";
		//echo $codeEnd;
		$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE between "'.$codeStart.'" and "'.$codeEnd.'" limit '.$count.'');
									
				while($result = mysqli_fetch_array($query))
					{
							$DATA_Code['Bcode'] = $result['BARCODE'];
							$DATA_Code['Nbook'] = $result['NAME_BOOK'];
							$DATA_Code['Cbook'] = $result['CATBOOK'];
							$DATA_Code['catstroe'] = $result['Catbook_store'];
							$DATA_Code['Ybook'] = $result['Year_book'];
							$DATA_Code['BYNUM'] = $result['BYNUM'];
							$DATA_Code['Centimeters'] = $result['Centimeters'];
							$DATA_Code['bud']   = "ห้องสมุดโรงพยาบาลพุทธชินราช";
							$DATA_Code['dpart'] =   $result['department'];
				
					//$data['barcode'] =  BarCode($DATA_Code);
				$json[] = $DATA_Code;
				$data_idbook[] = $DATA_Code['Bcode'];
					}
			//  echo "<pre>";
			//  print_r($json);
			// echo "<pre>";
			// print_r($data_idbook);
		
		$strlen = mb_strlen( $codeStart, "UTF-8");
		// echo $strlen;
		for($i =0; $i <$strlen; $i++){
			// echo "<pre>";
			// echo $codeStart[$i];
			$arr_IDBK[] = $codeStart[$i];
		}
		//  echo "<pre>";
		// print_r($arr_IDBK);
		if($arr_IDBK[0] === "F"){
			// นวนิยาย			
			$bgin = 0;
			$last = 1;
			PBKCOlor_TYPE($arr_item, $json, $bgin,$last, $arr_IDBK);
		}else if ($arr_IDBK[0] === "5"){
			// pbk	
			if($typePlatform == 10){
				$bgin = 3;
				$last = 8;	
				PBKCOlor_TYPE_tent($arr_item, $json, $bgin,$last, $arr_IDBK);	
				}else{
				$bgin = 3;
				$last = 8;		
				PBKCOlor_TYPE($arr_item, $json, $bgin,$last, $arr_IDBK);
				
				}			
		}else{
			$bgin = "";
			$last = "";
			PBKCOlor_TYPE($arr_item, $json, $bgin,$last, $arr_IDBK);
	}


}
function PBKCOlor_TYPE_tent($arr_item, $json, $bgin,$last, $arr_IDBK){
	
	foreach($arr_item as $key => $valdata){
		$b1= $json[$key];	
	// print_r($json[$key])."<br>";
	// echo $valdata;
				// print_r($json) ;
				// $strcatbk = substr($b1['catstroe'] ,0, 3); // ตัดเอา PBK	 (สร สท0300)
				// echo $b1['Centimeters'];
				// $strlen = strlen($newStr);
				// $num = $strlen - "3" ; //ลบ 3 เพราะ PBK
				// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
			
				// $fontnum = mb_substr($newStr,3,10, "UTF-8");	
				
			if($arr_IDBK[0] === "5"){
				$strcatbktttt = mb_substr($b1['catstroe'] ,$bgin,$last, "UTF-8");
				$ColorType = setColorLabel_pbkcentimate($b1['Centimeters']);
			}else{
				$ColorType[0] = "";
				$ColorType[1] = "";;
			}				
				//  echo "<pre>";
				//  echo $strcatbktttt;						
				//$code1 = BarCode($b1['Bcode']);
				$text['key'] = $valdata;
				$text['Code'] = $b1['Bcode'];
				$text['Nbook']= $b1['Nbook'];
				$text['Cbook'] = $b1['Cbook'];
				$text['Ybook'] = $b1['Ybook'];
				$text['BYNUM'] = $b1['BYNUM'];
				$text['Bud'] = $b1['bud'];
				$text['dpart'] = $b1['dpart'];
				$text['Color_r1'] = $ColorType[0];
				$text['Color_r2'] = $ColorType[0];
				
				$arr_text[] = $text;		
	
	
			 }
			//  echo "<pre>";
			// print_r($arr_text);
		 echo json_encode($arr_text);

}	
function PBKCOlor_TYPE($arr_item, $json, $bgin,$last, $arr_IDBK){
	
	foreach($arr_item as $key => $valdata){
		$b1= $json[$key];	
	// print_r($json[$key])."<br>";
	// echo $valdata;
				// print_r($json) ;
				// $strcatbk = substr($b1['catstroe'] ,0, 3); // ตัดเอา PBK	 (สร สท0300)
				// echo $strcatbk."<pre>";
				// $strlen = strlen($newStr);
				// $num = $strlen - "3" ; //ลบ 3 เพราะ PBK
				// $fontnum = substr($newStr,-$num, $strlen); //ตัดเอาตัวเลข 612.14*/
			
				// $fontnum = mb_substr($newStr,3,10, "UTF-8");	
				
			if($arr_IDBK[0] === "5"){
				$strcatbktttt = mb_substr($b1['catstroe'] ,$bgin,$last, "UTF-8");
				$ColorType = setColorLabel_pbk($strcatbktttt);
			}else if($arr_IDBK[0] === "F"){
				$strcatbktttt = mb_substr($b1['BYNUM'] ,$bgin,$last, "UTF-8");
				$ColorType = 	setColorLabel($strcatbktttt);
			}else{
				$ColorType[0] = "";
				$ColorType[1] = "";;
			}				
				//  echo "<pre>";
				//  echo $strcatbktttt;						
				//$code1 = BarCode($b1['Bcode']);
				$text['key'] = $valdata;
				$text['Code'] = $b1['Bcode'];
				$text['Nbook']= $b1['Nbook'];
				$text['Cbook'] = $b1['Cbook'];
				$text['Ybook'] = $b1['Ybook'];
				$text['BYNUM'] = $b1['BYNUM'];
				$text['Bud'] = $b1['bud'];
				$text['dpart'] = $b1['dpart'];
				$text['Color_r1'] = $ColorType[0];
				$text['Color_r2'] = $ColorType[1];
				
				$arr_text[] = $text;		
	
	
			 }
			// echo "<pre>";
			// print_r($arr_text);
			echo json_encode($arr_text);

		}
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
$arType3_Color =  array("ฟ","ช","ซ","ด","ท","ธ","ผ","ฝ","ภ","ย","ล","ศ","ห","ฬ","อ","ฮ"); //,1-->2

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

function setColorLabel_pbk($v){ 
	
	$chk = array("1" => array("a" => "000", "b" =>"099.999", "r" => "product2"),
	"2" => array("a" => "100", "b" => "199.999", "r" => "product3"),
	
	"3" => array("a" => "200", "b" => "299.999", "r" => "product4"),
	
	"4" => array("a" => "300", "b" => "399.999", "r" => "product5"),
	
	"5" => array("a" => "400", "b" => "499.999", "r" => "product6"),
	
	"6" => array("a" => "500", "b" => "599.999", "r" => "product7"),
	"7" => array("a" => "600", "b" => "699.999", "r" => "product8"),
	"8" => array("a" => "700", "b" => "799.999", "r" => "product9"),
	"9" => array("a" => "800", "b" => "899.999", "r" => "product10"),
	"10" => array("a" => "900", "b" => "999.999", "r" => "product10"),
	);
	// $val = "032.3";
	// echo "<pre>";
	// echo $val;
	//เหลือง
	//แดง
	//เขียว
	//เทา
	//ฟ้า
	//ชมพู
	//น้ำตาล 9e7015
	//น้ำเงิน
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





?>
    
    
    
    
    
    
    
    
    
    