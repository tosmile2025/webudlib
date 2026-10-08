<?php
include('../connectdata/cnectDB.php');
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="ListBooks-BUD.xls"');#ชื่อไฟล์

$_POST['data'] = '';
if(isset($_POST['data'])){
	$body = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo $body;
	//echo "test ajax";
	$html = '';
	$html .= '<table>';
	
	$data = $_POST['data'];
						$mysqli = mysqli_query($con, 'SELECT * FROM `checkoutbook` ORDER BY `checkoutbook`.`id` DESC');
						$coun = mysqli_num_rows($mysqli);
						while($result = mysqli_fetch_array($mysqli)){	
							$jsonarr['str'] = "3"; 						
							$jsonarr['id'] = $result['barcode'];
							$jsonarr['namebook'] = $result['namebook'];
							$jsonarr['year'] = $result['year'];
							$jsonarr['countx'] = $coun;
							$arrx[] = $jsonarr;
							}
							
							$html .='<tr>';
							$html .='<td style="border:solid 1px #000000"></td>';
							$html .='<td style="border:solid 1px #000000">รวมทั้งหมด</td>';
							$html .='<td style="border:solid 1px #000000">'.$arrx['4']['countx'].'</td>';
							$html .='</tr>';	
							foreach($arrx as $val){
							$html .='<tr>';
							$html .='<td style="border:solid 1px #000000">'.$val['id'].'</td>';
							$html .='<td style="border:solid 1px #000000">'.$val['namebook'].'</td>';
							$html .='<td style="border:solid 1px #000000">'.$val['year'].'</td>';								
							$html .='</tr>';
								}
							
		
		$html .='</table>';
		
		echo $html;

	}





?>