 <?php 
include('../connectdata/cnectDB.php');
/*$idu = "1234";
$name = "khajonsuk";
$naml = "pppp";
$posi = "ธุรการ";
$mas = "ทดสอบ";
$item = 5;
$data_ex = "30-11-2020";
$data_End = "30-11-2020";
$_POST['idu'] = '1234';*/
	if(isset($_POST['idu']))
			
			{
			$sum = 0;
			$sum_TOTAL = 0;
				
			$query = mysqli_query($con, 'select * from cash_fines_tb
											where idu_cash = "'.$_POST['idu'].'" 
											and id_cash = (select max(id_cash) from cash_fines_tb
											where idu_cash = "'.$_POST['idu'].'")');	
			
			while($arr_cas = mysqli_fetch_array($query))
				{
					$cashBath = $arr_cas['cash_sum'];
					$cashTotal = $arr_cas['cash_total'];
					$cash_use = $arr_cas['cash_use'];
					}
					//$sum_TOTAL = $cashBath + $cashTotal;
			$book_query = mysqli_query($con, 'select * from fines_tb
											where iduser_fines = "'.$_POST['idu'].'" 
											and fines_dayin = "'.date("Y-m-d").'"');
					$row = mysqli_num_rows($book_query);
				while($arr = mysqli_fetch_array($book_query))
				{
					
					$detlineDay = $arr['fines_dayend'];
					$dayStart = $arr['day_start'];
					}							
											
		//echo $sum;
	
$htMl = '<div id="paper_print" class="boxsubboxPrint">
 		<div class="boxbody">
		 <div class="boxprint">
		 <div class="boxHeadprint">
		     <table class="tb_head_print">
			 	<tr class="tr_head_print">
					<td class="td_h_print_pic"><img class="img_LOGO" src="../fileimage/LOGOBUD.jpg" /></td>
					<td class="td_h_print_name">ห้องสมุด โรงพยาบาลพุทธชินราช พิษณุโลก</td>
					<td class="td_h_print_lbcode">BarCode:</td>
					<td class="td_h_print_iptcode">'.$_POST['idu'].'</td>
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
							<td class="td_ipt_product">'.$row.'</td>
						</tr>
					</table>
					<table class="tb_detail3">
						<tr class="tr_detail_print_comment">
							<td class="td_txt_startday">วันที่ยืม</td>
							<td class="td_ipt_startday">'.$dayStart.'</td>
							<td class="td_txt_novalue2"></td>
							<td class="td_txt_dayend">วันกำหนดคืน</td>
							<td class="td_ipt_dayend">'.$detlineDay.'</td>
						</tr>
					</table>
                </div>
            </div>
 
 		<div class="print_statement">
			
			 <table class="tb_cash_tb">
             	<tr class="tr_cash_tb">
                	<td class="lb_noval"></td>
                	<td class="lb_cashname">จำนวนเงินค้างชำระ</td>
                    <td class="itp_cashbath">'.$cashBath.'</td>
					<td class="lb_BaTH">บาท</td>
                    <td class="lb_totalcash">ค่าปรับ</td>
                    <td class="itp_totalcash">'.$cashTotal.'</td>
					<td class="lb_BaTH">บาท</td>
                    <td class="lb_paypal">จำนวนเงินที่ชำระ</td>
                    <td class="ipt_paypal">'.$cash_use.'</td>
					<td class="lb_BaTH">บาท</td>
                </tr>
             </table>
			
               
           </div> </div> </div></div>';

	}
//echo $htMl;
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
$sum = $date.$_POST['idu'].$rand;
$path = "../PDFFILE/'".$sum."'";
$css = file_get_contents('../Cs-text/css-pdf.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($htMl);
$set_path = "../PDFFILE/PDF_PAYPAL_CASCH/".$sum.".pdf";
$mpdf->Output($set_path);
echo $set_path;
	//echo $htMl;
 
	 ?>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
