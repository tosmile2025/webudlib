
 <?php 
include('../connectdata/cnectDB.php');

//$_POST['iptValIDU'] = "02125";
	if(isset($_POST['iptValIDU']))
			/*$text = "02125";*/
			{
			$htMl = '';
				//echo $_POST['iptValIDU'];
				$sqli = mysqli_query($con, "
											SELECT * FROM user_tb AS d1 INNER JOIN exportbook_tb AS d2 ON(d1.IDUSERCODE = d2.IDuser_exbook) 
																		INNER JOIN regis_books_tb AS d3 ON(d2.ID_ex_barcodebook = d3.BARCODE) 
																		INNER JOIN book_store_tb AS d4 ON(d3.IDLIKBOOK = d4.IDLIKBOOK)
															
																		WHERE IDUSERCODE = '".$_POST['iptValIDU']."' AND Active_book = 1
								
																		");
		}
	

 $htMl .='<div id="paper_print" class="boxsubboxPrint">
 		<div class="boxbody">
		 <div class="boxprint">
		 <div class="boxHeadprint">
		     <table class="tb_head_print">
			 	<tr class="tr_head_print">
					<td class="td_h_print_pic"><img class="img_LOGO" src="../fileimage/LOGOBUD.jpg" /></td>
					<td class="td_h_print_name">ห้องสมุด โรงพยาบาลพุทธชินราช พิษณุโลก</td>
					<td class="td_h_print_lbcode">BarCode:</td>
					<td class="td_h_print_iptcode">'.$_POST['iptValIDU'].'</td>
				</tr>
			 </table>
         	</div>
           
  			<div class="boxdetail_report">
            	<div class="boxdetailprint">
              		<table class="tb_detail_print">
						<tr class="tr_detail_print">
							<td class="td_detail_pLp_tname">ชื่อ:</td>
							<td class="td_detail_pLp_name">'.$_POST['name'].'</td>
							<td class="td_detail_pLp_tser">นามสกุล:</td>
							<td class="td_detail_pLp_sername">'.$_POST['lname'].'</td>						
						</tr>
					</table>
					<table class="tb_detail2">
						<tr class="tr_detail_print_position">
							<td class="td_txt_position">ตำแหน่ง</td>
							<td class="td_ipt_position">'.$_POST['position'].'</td>
							<td class="td_txt_novalue"></td>
							<td class="td_txt_product">จำนวนทรัพยากร</td>
							<td class="td_ipt_product">'.$_POST['product'].'</td>
						</tr>
					</table>
					<table class="tb_detail3">
						<tr class="tr_detail_print_comment">
							<td class="td_txt_comment">comment</td>
							<td class="td_ipt_comment">'.$_POST['mass'].'</td>
							<td class="td_txt_novalue2"></td>
							<td class="td_txt_renew">RenewBook</td>
							<td class="td_ipt_renew">'.$_POST['countrenew'].'</td>
						</tr>
					</table>
                </div>
            </div>
 
 		<div class="boxListPrintShow">
             <table id="tbpr" class="tbPrintReportHead">
            	<tr id="tbpr" class="trPrintReport">
                	<td id="tbpr" class="tdPrintReport_bar">บาร์โค้ด</td> 
                    <td id="tbpr" class="tdPrintReport_cat">หมวดหมู่</td>  
                    <td id="tbpr" class="tdPrintReport_endday">วันกำหนดคืน</td> 
                    <td id="tbpr" class="tdPrintReport_statday">วันที่ยืม</td> 
                    <td id="tbpr" class="tdPrintReport_name">ชื่อเรื่อง</td>  
                                     
                </tr>
              </table>
              
               <table id="tbpr" class="tbPrintReport">';
                while($result = mysqli_fetch_array($sqli))
						{
							$arr_data = $result;
						
					
          $htMl .= '<tr id="tbpr" class="trPrintReport">
                	<td id="tbpr" class="tdPrintReport_bar">'.$arr_data['ID_ex_barcodebook'].'</td> 
                    <td id="tbpr" class="tdPrintReport_cat">'.$arr_data['CATBOOK'].".".$arr_data['BYNUM'].'</td>  
                    <td id="tbpr" class="tdPrintReport_endday">'.$arr_data['Day_end'].'</td> 
                    <td id="tbpr" class="tdPrintReport_statday">'.$arr_data['Day_start'].'</td></td> 
                    <td id="tbpr" class="tdPrintReport_name">'.$arr_data['NAME_BOOK'].'</td></td>  
                                     
                </tr>';
                } 
           $htMl .= '</table>  </div> </div> </div></div>';
		   
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
/*$path = "../PDFFILE/'".$sum."'";*/
$css = file_get_contents('../Cs-text/css-pdf.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($htMl);
$set_path = "../PDFFILE/".$sum.".pdf";
$mpdf->Output($set_path);

echo $set_path;  
		   
	 ?>
