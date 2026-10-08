<?php 
	include('../connectdata/cnectDB.php');	
	//header("Content-Type: application/vnd.ms-excel");
	//header('Content-Disposition: attachment; filename="ListBooks-BUD.xls"');#ชื่อไฟล์
	$_POST['data'] ='';
		if(isset($_POST['data'])){
			$data = $_POST['data'];
			
		reportbook($con);
				
		//insert_catbook($con);					
					
			}
			
			
function insert_catbook($con){
	$sqli = mysqli_query($con, 'select * from checkoutbook as d1 inner join regis_books_tb as d2 
											on(d1.barcode = d2.BARCODE)');
	while($result = mysqli_fetch_array($sqli)){
		$arcode[] = $result;
		
		}
		//echo "<pre>";
		//print_r($arcode);
		foreach($arcode as $value){
			//echo "<pre>";
			//echo $value['CATBOOK']."-".$value['barcode'];
			$updat_album = mysqli_query($con, "update checkoutbook set catbook = '".$value['CATBOOK']."'
												where barcode = '".$value['barcode']."'");
			echo "<pre>";
			echo $value['barcode'];									
												
		}
	
	
	}		
		
function reportbook($con){
	$n = 0;
	$body = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo $body;
	//echo "test ajax";
	$html = '';
	$html .= '<table>';	
	//$a= array("301523","200123","100456");
	$sqli = mysqli_query($con, 'select * from checkoutbook  where dt = DATE(NOW()) order by year asc ');
	//$sqli = mysqli_query($con, 'select * from checkoutbook where dt between TIMESTAMP("0000-00-00 10:50:00") and TIMESTAMP("2022-02-07 11:50:00")order by barcode asc');
			while($result = mysqli_fetch_array($sqli)){				
				$a[] = $result;
				$count[] = $result['barcode'];
				}
				$num =  count($count);				
				//print_r($a);
			
			foreach($a as $key => $value){				
			
				//echo $value['barcode'][0];
			if($value['barcode'][0] == "7"){
						
							$n += count($value['barcode'][0]);
							$replace_name = preg_replace('/[^\PCn^\PCs]/u', '', $value['namebook']);
							$html .='<tr>';
							$html .='<td style="border:solid 1px #000000">'.$value['barcode'].'</td>';
							$html .='<td style="border:solid 1px #000000">'.$replace_name.'</td>';
							$html .='<td style="border:solid 1px #000000">'.$value['catbook'].'</td>';
							$html .='<td style="border:solid 1px #000000">'.$value['year'].'</td>';
							$html .='<td style="border:solid 1px #000000">'.$value['dt'].'</td>';								
							$html .='</tr>';
					}			
				
				}
				$html .='<tr>';
							$html .='<td style="border:solid 1px #000000"></td>';
							$html .='<td style="border:solid 1px #000000">รวมทั้งหมด</td>';
							$html .='<td style="border:solid 1px #000000"></td>';
							$html .='<td style="border:solid 1px #000000">'.$n.'</td>';
							$html .='</tr>';		
				
				$html .='</table>';
		echo $html;
		//echo $n;

	
	}			
?>