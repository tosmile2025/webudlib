<?php 

	$cars = array (
			  array("Volvo",22,18),
			  array("BMW",15,13),
			  array("Saab",5,2),
			  array("Land Rover",17,15)
			);
//echo "<pre>";
//print_r($cars);
	

?>

<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report-PDF all books</title>
<style>
@page {
	sheet-size: 160.50mm 220mm; 
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
body{font-size:16px;} 
.hedtable{
	width:100%;
	max-height:600px;	
	
	/*box-shadow:0 10px 50px 0px rgba(0,0,0,0.5);*/}
.hedtable{
	text-align:left;
	border-collapse:collapse;}
.hedtable thead th,
.hedtable tbody td{
	padding:10px;
	border:none;
	font-weight:200;}
.hedtable thead th{
	background:#454ac4;
	/*background:#008080;*/
	color:#fff;
	font-size:16px;
	position: sticky;
	top:-1px;}
.hedtable tbody td{
	border-bottom: 1px solid rgba(0,0,0,0.1);
	}
.hedtable thead th:nth-child(1),
.hedtable tbody th:nth-child(1){
	width:70px;
	text-align:center;}	

.hedtable tbody tr:nth-child(odd){
	background:rgba(0,0,0,0.02);}
	
	
.tb-head{
	width:100%;
	height:100px;}
.cell-head{
	font-size:18px;
	font-weight:600;
	text-align:center;}
.cell-lbdate{
	text-align:right;}
.cell-date{
	text-align:left;
	border-bottom: 1px solid rgba(0,0,0,0.1);}	
.cell-lbbook{
	text-align:right;}
.cell-num{
	text-align:left;
	border-bottom: 1px solid rgba(0,0,0,0.1);}	
.box-liner{
	height:20px;}					
</style>
</head>
<body>
<table class="tb-head">
  <tr>
    <td class="cell-head" width="100%" colspan="3">รายงานรายงาน</td>
  </tr>
  <tr>
    <td class="cell-td" width="78%"></td>
    <td class="cell-lbdate" width="12%">วันที่</td>
    <td class="cell-date" width="10%"></td>
  </tr>
  <tr>
    <td></td>
    <td class="cell-lbbook">จำนวนรายการหนังสือทั้งหมด</td>
    <td class="cell-num"></td>
  </tr>
  <tr>
    <td class="box-liner" colspan="3"></td>   
  </tr>
</table>
<table class="hedtable">
      <thead>
            <tr>
               <th>บาร์โค้ด</th>
               <th>ชื่อเรื่อง</th>
               <th>จำนวนหน้า</th>
               <th>ปี/พศ</th>
               <th>ราคา</th>
               <th>ISBN</th>
               </tr>
               </thead>
              	 <tbody class="tb_tbody">
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>
                    <tr>
                    	<td>F80800</td>
                        <td>เพื่อง่ายต่อการอ่านและสบายตา และตรวจสอบภาษาไทยให้ถูกต้อง</td>
                        <td>9854น</td>
                        <td>2022</td>
                        <td>10,000</td>
                        <td>1234567891234</td>
                    </tr>         		         		         		         		         		         		         		
  </tbody>
    </table>
   
</body>
</html>

















































































































