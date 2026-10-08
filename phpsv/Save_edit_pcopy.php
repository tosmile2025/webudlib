<?php 
	include('../connectdata/cnectDB.php');
	/*
	arr_data[0] = barocode//เลขทะเบียน
	arr_data[1] =LOANSTATUS
	arr_data[2] = blink_athor
	arr_data[3] = Dat_regis
	arr_data[4] = CATBOOK
	arr_data[5] = byauthor
	arr_data[6] = COPPYNUM
	arr_data[7] = status_text
	arr_data[8] = detail_athormain_tb
	arr_data[9] = Price_book
	arr_data[10] = SUPCODE
	arr_data[11] = สถานะหนังสือ-
	arr_data[12] = กลุ่มงาน
	arr_data[13] = ขนาด size หนังสือเด็ก
	*/


//echo"<pre>";
//print_r($_POST['jdata']);
if(isset($_POST['jdata'])!= null){	
			$val = $_POST['jdata'];
				$date = date("d-m-Y");	
						$update = mysqli_query($con, "update regis_books_tb set BARCODE = '".$val[0]."',											
											SUPCODE = '".$val[10]."',
											Price_book = '".$val[9]."',
											CODE_REGIS = '".$val[0]."', 
											CATBOOK = '".$val[4]."',
											byauthor = '".$val[5]."',
											LOANSTATUS = '".$val[1]."',
											status_text = '".$val[7]."',
											Dat_regis	 = '".$val[3]."',
											COPPYNUM	 = '".$val[6]."',
											STWORK	 = '".$val[11]."',
											department = '".$val[12]."',
											Centimeters = '".$val[13]."'
											where BARCODE = '".$val[0]."'");					
			func_update_subcode($con, $val);	
			// echo"<pre>";
// print_r($_POST['jdata']);	
	}
function func_update_subcode($con, $val){
	//echo $val[0]."//";
	//echo $val[9]."//";
	 $select = mysqli_query($con, 'SELECT * FROM athor_main_tb WHERE blink_athor = "'.$val[2].'" AND TYPE = "M"');
	 $num = mysqli_num_rows($select);
	 	// echo $num;	 
	 	if($num >0 ){
			//echo"มากกว่า 0";
			$sqlidel = mysqli_query($con, 'delete from athor_main_tb
									where blink_athor ="'.$val[2].'" ');
			if($sqlidel){
				if($val[8] != ''){
					$str ='("M","'.$val[2].'","'.$val[8].'")';				
						$mysqli = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)values$str");
				}

			}
			}else{
				$str ='("M","'.$val[2].'","'.$val[8].'")';				
						$mysqli = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)values$str");
			//echo $str;
			}
	}

?>
















