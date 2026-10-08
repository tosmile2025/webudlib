<?php 
	include('../connectdata/cnectDB.php');
	// $_POST['bcode'] = '508955';
	
	// $_POST['bcode'] = 'F09075';
	//$_POST['idlink'] = '0000136';
	if(isset($_POST['bcode'])){
		
		$data = $_POST['bcode'];
			
			$sqli = mysqli_query($con, 'select * from regis_books_tb 
										where BARCODE = "'.$data.'"');
			while($result = mysqli_fetch_array($sqli)){
				$arr['idlink'] = $result['IDLIKBOOK'];
				$arr['BARCODE'] = $result['BARCODE'];
				$arr['SUPCODE'] = $result['SUPCODE'];
				$arr['CODE_REGIS'] = $result['CODE_REGIS'];
				$arr['Price'] = $result['Price_book'];
				$arr['CATBOOK'] = $result['CATBOOK'];
				$arr['byauthor'] = $result['byauthor'];
				$arr['LOANSTATUS'] = $result['LOANSTATUS'];
				$arr['status_text'] = $result['status_text'];
				$arr['dat_regis'] = $result['Dat_regis'];
				$arr['COPPYNUM'] = $result['COPPYNUM'];
				$arr['STWORK'] = $result['STWORK'];
				$arr['department'] = $result['department'];
				$arr['Centimeters'] = $result['Centimeters'];
				$arr['Key_M'] = '';
				$arr['txt_memo'] = '';
				$array[] = $arr;				
				}
	
		//echo json_encode($arr);
		text_detail($con, $array);
		}
function  text_detail($con, $array){
	//echo $array[0]['BARCODE'];
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$array[0]['BARCODE'].'" and TYPE = "M"');
			$row = mysqli_num_rows($sqli);
			if($row > 0){
				while($result = mysqli_fetch_array($sqli)){
				
					$array[0]['Key_M'] = $result['TYPE'];
					$array[0]['txt_memo'] = $result['detail_athormain_tb'];
					
					}
					$json = $array;
			}else{
				$json = $array;
			}
			// echo "<pre>";
			// print_r($json);
			 echo json_encode($json);
				
	}	

		
		
		
	
	
		
		
?>