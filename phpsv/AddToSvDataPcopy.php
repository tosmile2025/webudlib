<?php
	include('../connectdata/cnectDB.php');
	
	//$data = $_POST['data'];
	//echo $data[1];	
	//echo "test";
	  /*0: "1044447"
		1: "F08998"
		2: ""
		3: "น"
		4: "ข1233"
		5: "F08998"
		6: "1"
		7: "F"
		8: "C"
		9: "24-4-2565"
		10: "ทดสอบ"
		11: "B00001"
		12: "193"
		13: "0"*/
	
	if(isset($_POST['data'])){
		$data = $_POST['data'];
		$memo_txt = $data[10];
		$linkcode = $data[1];
		$arr_str = '("'.$data[0].'","'.$data[1].'","'.$data[11].'","'.$data[12].'",
					"'.$data[5].'","'.$data[3].'","'.$data[4].'","'.$data[7].'",
					"'.$data[8].'","'.$data[9].'","'.$data[6].'","'.$data[13].'")';
		
		$insert = "insert into regis_books_tb(IDLIKBOOK,BARCODE,SUPCODE,Price_book,CODE_REGIS,CATBOOK,byauthor,LOANSTATUS,status_text,Dat_regis,COPPYNUM,STWORK)
								values$arr_str";
		$result = mysqli_query($con,$insert) or die ("Error in query: $insert " . mysqli_error());
		 //echo $result;
		myFunctionInsertMEMO($con, $memo_txt, $linkcode);
		}
	function myFunctionInsertMEMO($con, $memo_txt, $linkcode){
		
		if($memo_txt == ''){
			mysqli_close($con);
			}else{
					$str = '("M","'.$linkcode.'","'.$memo_txt.'")';
					$sqli = "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)
							values$str";
					$result = mysqli_query($con,$sqli) or die ("Error in query: $sqli " . mysqli_error());
					//echo $result;
			}
		} 	

 ?>