<?php
	
    require_once('../js/mpdf-master/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
   // ob_start(); // ทำการเก็บค่า html นะครับ
   
    ?>
 <?php 
  
 
 
$mpdf = new mPDF('th', 'A4', '0', '');

$html = '

<html>
<head>
<style>
    @page {
	margin: 1mm;
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
   div.noheader {
        page-break-before: right;
        page: noheader;
    }

div.boxrow{
	border:solid 1px #000066;
	margin:0px;
	width:79mm;
	height:34mm;
	}	
div.barcodecell_P1{
	border:solid 1px #000066;
	margin:0px;
	width:79mm;
	height:34mm;}
table{
	width:100%;
	border: 1px solid red;
	}
tr{
	width:79mm;
	height:34mm;
	background-gradient: linear #b7cebd #f5f8f5 0 1 0 0.2; 
	border: 1px solid red
	}	
td.tdp1{
	width:79mm;
	height:34mm;
	background-gradient: linear #b7cebd #f5f8f5 0 1 0 0.2; 
	border: 1px solid red;
	}
td.tdp2{
	width:79mm;
	height:34mm;
	background-gradient: linear #b7cebd #f5f8f5 0 1 0 0.2; 
	border: 1px solid red;
	}			
</style>
</head>

<body>
	
		<table class="tb_box">
			<tr>
				<td class="tdp1">1</td>
				<td class="tdp1">2</td>
			</tr>
			<tr>
				<td class="tdp1">3</td>
				<td class="tdp1">4</td>
			</tr>
			<tr>
				<td class="tdp1">5</td>
				<td class="tdp1">6</td>
			</tr>
			<tr>
				<td class="tdp1">7</td>
				<td class="tdp1">8</td>
			</tr>
			<tr>
				<td class="tdp1">9</td>
				<td class="tdp1">10</td>
			</tr>
			<tr>
				<td class="tdp1">11</td>
				<td class="tdp1">12</td>
			</tr>
		
		</table>
	

</body>
</html>';

/*$Css = file_get_contents('../js/mpdf-master/examples/mpdfstyletables.css');
$mpdf->WriteHTML($Css,1);*/	// The parameter 1 tells that this is css/style only and no body/html/text*/


$mpdf->WriteHTML($html);

$mpdf->Output();
?>
	
	