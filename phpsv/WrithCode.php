
<?php 
	include('../connectdata/cnectDB.php');
	//include('bar128.php');
	
	/*$code = "211791";
	$val = "211795";
	$n= 5;*/
$arr_position = array(1,6,7,9,10,12); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
if(isset($arr_position))
	{
		$itemID = $arr_position;
		foreach($itemID as $key => $val)
			{
				$position['position'] = $val;
				$arr_item[] = $position['position'];
			}
		$count =  count($arr_item);	
		//$codeStart = $_POST['idbookstart'];
		//$codeEnd = $_POST['idbookend'];
		$codeStart = "211790";
		$codeEnd = "211799";
		//echo $codeEnd;
		$query = mysqli_query($con, 'select * from regis_books_tb as d1
									inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
									where BARCODE between "'.$codeStart.'" and "'.$codeEnd.'" limit '.$count.'');
									
				while($result = mysqli_fetch_array($query))
					{
							$DATA_Code['Bcode'] = $result['BARCODE'];
							$DATA_Code['Nbook'] = $result['NAME_BOOK'];
							$DATA_Code['Cbook'] = $result['CATBOOK'];
							$DATA_Code['Ybook'] = $result['Year_book'];
							$DATA_Code['BYNUM'] = $result['BYNUM'];
							$DATA_Code['bud']   = "ห้องสมุดโรงพยาบาลพุทธชินราช";
				
					//$data['barcode'] =  BarCode($DATA_Code);
				$json[] = $DATA_Code;
				$data_idbook[] = $DATA_Code['Bcode'];
					}
			//print_r($json);
			//print_r($data_idbook);
			
			$arr_position = array(6,7,9,10,12); //ตำแหน่งที่ต้องการให้แสดงผล มีทั้งหมด 9 array
			$arr_data 	= array("F08180","F08181","F08182","F08183","F08184","F08185","F08186","F08187","F08188");//ข้อมูลที่เรียกออกมาเพื่อแสดงผล มีทั้งหมด 10 arrray
	$i = count($arr_position);	
	$t = count($arr_data);	
		//echo $i;
		//print_r($json);	
			//print_r($arr_data);
//echo "จำนวนดาต้าในอเรย์".$i."<br>";

//print_r($arr_item);

foreach($arr_item as $key => $valdata){
  
// print_r($json[$key])."<br>";
//echo $valdata;

	if($valdata == 1)
		{$b1= $json[$key];
			
			$code1 = $b1['Bcode'];
			$idbook1 = $b1['Bcode'];
			$name1 = $b1['Nbook'];
			$Cbook1 = $b1['Cbook'];
			$Ybook1 = $b1['Ybook'];
			$Bybook1 = $b1['BYNUM'];
			$bud1 = $b1['bud'];
			//echo $code6;
			//position1($idbook1 );
			
			}
	else if($valdata == 2)

		{
			$b2= $json[$key];
			
			//$code2 = BarCode($b2['Bcode']);
			$idbook2 = $b2['Bcode'];
			$name2 = $b2['Nbook'];
			$Cbook2 = $b2['Cbook'];
			$Ybook2 = $b2['Ybook'];
			$Bybook2 = $b2['BYNUM'];
			$bud2 = $b2['bud'];
			//echo $code6;
			}
	else if($valdata == 3)
	{
		$b3= $json[$key];
			
			//$code3 = BarCode($b3['Bcode']);
			$idbook3 = $b3['Bcode'];
			$name3 = $b3['Nbook'];
			$Cbook3 = $b3['Cbook'];
			$Ybook3 = $b3['Ybook'];
			$Bybook3 = $b3['BYNUM'];
			$bud3 = $b3['bud'];
			//echo $code6;
			
		}
	else if($valdata == 4)
		{
			$b4= $json[$key];
			
			//$code4 = BarCode($b4['Bcode']);
			$idbook4 = $b4['Bcode'];
			$name4 = $b4['Nbook'];
			$Cbook4 = $b4['Cbook'];
			$Ybook4 = $b4['Ybook'];
			$Bybook4 = $b4['BYNUM'];
			$bud4 = $b4['bud'];
			//echo $code6;
		}
	else if($valdata == 5)
		{
			$b5= $json[$key];
			
			//$code5 = BarCode($b5['Bcode']);
			$idbook5 = $b5['Bcode'];
			$name5 = $b5['Nbook'];
			$Cbook5 = $b5['Cbook'];
			$Ybook5 = $b5['Ybook'];
			$Bybook5 = $b5['BYNUM'];
			$bud5 = $b5['bud'];
			//echo $code6;
			
			}
	else if($valdata == 6)
		{
			$b6= $json[$key];
			
			//$code6 = BarCode($b6['Bcode']);
			$idbook6 = $b6['Bcode'];
			$name6 = $b6['Nbook'];
			$Cbook6 = $b6['Cbook'];
			$Ybook6 = $b6['Ybook'];
			$Bybook6 = $b6['BYNUM'];
			$bud6 = $b6['bud'];
			//echo $code6;
			
			//$a = "ตำแหน่งที่ 6 <br>";
			
			}
	else if($valdata == 7)
	{
			$b7= $json[$key];
			
			//$code7 = BarCode($b7['Bcode']);
			$idbook7 = $b7['Bcode'];
			$name7 = $b7['Nbook'];
			$Cbook7 = $b7['Cbook'];
			$Ybook7 = $b7['Ybook'];
			$Bybook7 = $b7['BYNUM'];
			$bud7 = $b7['bud'];
			//echo $code6;
			
		
		}
	else if($valdata == 8)
	{
		$b8= $json[$key];
			
			//$code8 = BarCode($b8['Bcode']);
			$idbook8 = $b8['Bcode'];
			$name8 = $b8['Nbook'];
			$Cbook8 = $b8['Cbook'];
			$Ybook8 = $b8['Ybook'];
			$Bybook8 = $b8['BYNUM'];
			$bud8 = $b8['bud'];
			//echo $code6;
			
			
			}
	else if($valdata == 9)
		{
		$b9= $json[$key];
			
			//$code9 = BarCode($b9['Bcode']);
			$idbook9 = $b9['Bcode'];
			$name9 = $b9['Nbook'];
			$Cbook9 = $b9['Cbook'];
			$Ybook9 = $b9['Ybook'];
			$Bybook9 = $b9['BYNUM'];
			$bud9 = $b9['bud'];
			//echo $code6;
			
			}
	else if($valdata == 10)
	{
		$b10= $json[$key];
			
			//$code10 = BarCode($b10['Bcode']);
			$idbook10 = $b10['Bcode'];
			$name10 = $b10['Nbook'];
			$Cbook10 = $b10['Cbook'];
			$Ybook10 = $b10['Ybook'];
			$Bybook10 = $b10['BYNUM'];
			$bud10 = $b10['bud'];
			//echo $code6;
			
		}
	else if($valdata == 11)
	{
			$b11= $json[$key];
			
			$code11 = BarCode($b11['Bcode']);
			$idbook11 = $b11['Bcode'];
			$name11 = $b11['Nbook'];
			$Cbook11 = $b11['Cbook'];
			$Ybook11 = $b11['Ybook'];
			$Bybook11 = $b11['BYNUM'];
			$bud11 = $b11['bud'];
			//echo $code6;
			
		}
		else if($valdata == 12)
	{
		$b12= $json[$key];
			
			//$code12 = BarCode($b12['Bcode']);
			$idbook12 = $b12['Bcode'];
			$name12 = $b12['Nbook'];
			$Cbook12 = $b12['Cbook'];
			$Ybook12 = $b12['Ybook'];
			$Bybook12 = $b12['BYNUM'];
			$bud12 = $b12['bud'];
			//echo $code6;
			
		}

 	}
}
			
?>

 <?php 
 
 $html = '
<style>
ิbody {font-family: "THSarabunNew";
	font-size: 9pt;
}
.box_stickerbarcode{
	border:solid 1px #0033FF;/*สีน้ำเงิน*/
	display:block;
	width:620px;
	height:800px;
	padding:5px;}
#boxsticker{
	display:inline-table;
	float:left;
	margin:2px;
	width:280px;
	height:110px;
	border:solid 1px #FF0000;}
.tb_sticker{
	text-align:center;
	width:295px;
	height:100px;
	font-size:12px;
	margin:10px 0px 0px 0px;
	/*border:solid 1px #000000;*/}
.td_no{
	width:10px;}
.td_nofont{
	width:100px;
	/*border:solid 1px #000000;*/}
.td_namelib{
	font-size:12px;

	width:180px;}
.td_namebook_sticker{
	text-align:center;}
.text{
	padding:auto;
	margin:auto;
	font-size:12px;
	white-space: nowrap; 
    width: 120px; 
    overflow: hidden;
	text-overflow: ellipsis;
	text-align:center; }
.td_cat_sticker{
	/*width:100px;*/
	width:5px;}
.div_codesticker{
	margin:0px 0px 0px 40px;
	text-align:center;}
td{
	border:solid 1px #000000;}
.barcode {
	height:5px;
	padding: 1.5mm;
	margin: 0;
	vertical-align: top;
	color: #000000;
}
.barcodecell {
	height:5px;
	text-align: center;
	vertical-align: middle;
	padding: 0;
}
p{font-family:"THSarabunNew";}
.bcode{
	height:5px;}
</style>';
 $html .='  
<div class="box_stickerbarcode">
    	<div id="boxsticker" class="box1">
        <table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook1.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud1.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker"><barcode class="bcode" code="'.$code1.'"></div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook1.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook1.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook1.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name1.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 2---------------------------->
        <div id="boxsticker" class="box2">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook2.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud2.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code2.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook2.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook2.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook2.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name2.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 3---------------------------->
        <div id="boxsticker" class="box3">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook3.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud3.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code3.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook3.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook3.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook3.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name3.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 4---------------------------->
        <div id="boxsticker" class="box4">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook4.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud4.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code4.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook4.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook4.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook4.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name4.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 5---------------------------->
        <div id="boxsticker" class="box5">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook5.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud5.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code5.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook5.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook5.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook5.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name5.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 6---------------------------->
 
        <div id="boxsticker" class="box6">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook6.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud6.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code6.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook6.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook6.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook6.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name6.'</p></td>
        </tr>
        </table>
        </div>
	
        <!-- --------------------------------------------------------------position 7---------------------------->
        <div id="boxsticker" class="box7">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook7.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud7.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code7.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook7.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook7.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook7.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name7.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 8---------------------------->
        <div id="boxsticker" class="box8">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
			<td rowspan="2" class="td_cat_sticker">'.$Cbook8.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud8.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code8.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook8.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook8.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook8.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name8.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 9---------------------------->
        <div id="boxsticker" class="box9">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook9.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud9.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code9.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook9.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook9.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook9.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name9.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 10---------------------------->
        <div id="boxsticker" class="box10">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook10.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud10.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code6.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook10.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook10.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook10.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name10.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 11---------------------------->
        <div id="boxsticker" class="box11">
        	<table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
            <td rowspan="2" class="td_cat_sticker">'.$Cbook11.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud11.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code11.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook11.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook11.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook11.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name11.'</p></td>
        </tr>
        </table>
        </div>
        <!-- --------------------------------------------------------------position 12---------------------------->
        <div id="boxsticker" class="box12">
        <table class="tb_sticker" >
    	<tr class="tr_sticker" >
        	<td class="td_no"></td>
			<td rowspan="2" class="td_cat_sticker">'.$Cbook12.'</td>
            <td class="td_nofont"></td>
            <td class="td_namelib">'.$bud12.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r2_sticker"></td>
            <td class="td_nofont_sticker"></td>
            <td  class="td_barcode_sticker"><div class="div_codesticker">'.$code12.'</div></td>
        </tr>
        <tr>
        	<td class="td_colum1_r3_sticker"></td>
            <td class="td_cat_sub">'.$Bybook12.'</td>
            <td class="td_colum3_r3_sticker"></td>
            <td class="td_code_sticker">'.$idbook12.'</td>
        </tr>
        <tr>
        	<td class="td_colum1_r4_sticker"></td>
            <td class="td_year_sticker">'.$Ybook12.'</td>
            <td class="td_colum2_r4_sticker"></td>
            <td class="td_namebook_sticker"><p class="text">'.$name12.'</p></td>
        </tr>
        </table>
        </div>
    
   </div> ';
  //echo $html;
    
 ?>   

<?php 
include("../mpdf-master/mpdf.php");

$mpdf=new mPDF('','','','',20,15,25,25,10,10); 
$mpdf->WriteHTML($html);
$mpdf->Output(); 

exit;
//echo $html;

?>

 <?php 
 /*	include("../phpsv/ExportPDF-master/vendor/autoload.php");
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
 $mpdf->WriteHTML($html);
$mpdf->Output();
 */
 ?>  
    
    
    
    
    
    
    
    
    