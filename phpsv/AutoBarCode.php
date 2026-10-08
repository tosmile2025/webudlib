<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//echo $_POST['val'];
	$_POST['data'] = "";
	if(isset($_POST['data'])){
		
		$sqli = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '2' limit 5");
		while($result = mysqli_fetch_array($sqli)){
			
			$type_2[] = $result;
			
			}
		
	myfunc_type1($con, $type_2);
	//echo "<pre>";
		//print_r($type_3);		
		}
	
function myfunc_type1($con, $type_2){
	
	$sqli_1 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '1' limit 5");
	
	while($result_1 = mysqli_fetch_array($sqli_1)){
		$type_1[] = $result_1;
		
		}
		myfunc_type3($con, $type_2, $type_1);
		//echo "<pre>";
		//print_r($type_3);
	}

function myfunc_type3($con, $type_2, $type_1){
	
	$sqli_3 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '3' limit 5 ");
	
	while($result_3 = mysqli_fetch_array($sqli_3)){
		$type_3[] = $result_3;
	
		}
		//echo "<pre>";
		//print_r($type_3);
		myfunc_typeR($con, $type_2, $type_1, $type_3);
	}

function myfunc_typeR($con, $type_2, $type_1, $type_3){
	
	$sqli_R = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'R' limit 5 ");
	
	while($result_R = mysqli_fetch_array($sqli_R)){
		$type_R[] = $result_R;
	
		}
		//echo "<pre>";
		//print_r($type_R);
		myfunc_type4($con, $type_2, $type_1, $type_3, $type_R);
	}
function myfunc_type4($con, $type_2, $type_1, $type_3, $type_R){
	
	$sqli_4 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '4' limit 5 ");
	
	while($result_4 = mysqli_fetch_array($sqli_4)){
		$type_4[] = $result_4;
	
		}
		//echo "<pre>";
		//print_r($type_4);
		myfunc_typeC($con, $type_2, $type_1, $type_3, $type_R, $type_4);
	}
function myfunc_typeC($con, $type_2, $type_1, $type_3, $type_R, $type_4){
	
	$sqli_C = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'C' limit 5 ");
	
	while($result_C = mysqli_fetch_array($sqli_C)){
		$type_C[] = $result_C;
	
		}
		//echo "<pre>";
	//	print_r($type_C);
		myfunc_typeM($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C);
	}
function myfunc_typeM($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C){
	
	$sqli_M = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'M' limit 5 ");
	
	while($result_M = mysqli_fetch_array($sqli_M)){
		$type_M[] = $result_M;
	
		}
		//echo "<pre>";
	//print_r($type_M);
	myfunc_typeN($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M);	
	}
function myfunc_typeN($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M){
	
	$sqli_N = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'N' limit 5 ");
	
	while($result_N = mysqli_fetch_array($sqli_N)){
		$type_N[] = $result_N;
	
		}
		//echo "<pre>";
	//print_r($type_N);
		myfunc_type7($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N);
	}

function myfunc_type7($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N){
	
	$sqli_7 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '7' limit 5 ");
	
	while($result_7 = mysqli_fetch_array($sqli_7)){
		$type_7[] = $result_7;
	
		}
	//echo "<pre>";
	//print_r($type_7);
	myfunc_type5($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7);	
	}

function myfunc_type5($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7){
	
	$sqli_5 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '5' limit 5 ");
	
	while($result_5 = mysqli_fetch_array($sqli_5)){
		$type_5[] = $result_5;
	
		}
	//echo "<pre>";
	//print_r($type_5);
	myfunc_typeF($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5);
		
	}
function myfunc_typeF($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5){
	
	$sqli_F = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'F' limit 5 ");
	
	while($result_F = mysqli_fetch_array($sqli_F)){
		$type_F[] = $result_F;
	
		}
	//echo "<pre>";
	//print_r($type_F);
	myfunc_typeT($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F);	
	}
function myfunc_typeT($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F){
	
	$sqli_T = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'T' limit 5 ");
	
	while($result_T = mysqli_fetch_array($sqli_T)){
		$type_T[] = $result_T;
	
		}
	//echo "<pre>";
	//print_r($type_T);
	myfunc_typeV($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T);	
	}
function myfunc_typeV($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T){
	
	$sqli_V = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'V' limit 5 ");
	
	while($result_V = mysqli_fetch_array($sqli_V)){
		$type_V[] = $result_V;
	
		}
	//echo "<pre>";
	//print_r($type_V);
	myfunc_type8($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V);	
	}
function myfunc_type8($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V){
	
	$sqli_8 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '8' limit 5 ");
	
	while($result_8 = mysqli_fetch_array($sqli_8)){
		$type_8[] = $result_8;
	
		}
	//echo "<pre>";
	//print_r($type_8);
	myfunc_type6($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8);	
	}
	
function myfunc_type6($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8){
	
	$sqli_6 = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = '6' limit 5 ");
	
	while($result_6 = mysqli_fetch_array($sqli_6)){
		$type_6[] = $result_6;
	
		}
	//echo "<pre>";
	//print_r($type_6);
 myfunc_typeK($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8, $type_6);
	}
function myfunc_typeK($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8, $type_6){
	
	$sqli_K = mysqli_query($con, "select * from regis_books_tb where LOANSTATUS = 'K' limit 5 ");
	
	while($result_K = mysqli_fetch_array($sqli_K)){
		$type_K[] = $result_K;
	
		}
	//echo "<pre>";
	//print_r($type_K);
MySum($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8, $type_6, $type_K);	
}



function MySum($con, $type_2, $type_1, $type_3, $type_R, $type_4, $type_C, $type_M, $type_N, $type_7, $type_5, $type_F, $type_T, $type_V, $type_8, $type_6, $type_K){
	
	$array = array();
	array_push($array,$type_2);
	array_push($array,$type_1);
	array_push($array,$type_3);
	array_push($array,$type_R);
	array_push($array,$type_4);
	array_push($array,$type_C);
	array_push($array,$type_M);
	array_push($array,$type_N);
	array_push($array,$type_7);
	array_push($array,$type_5);
	array_push($array,$type_F);
	array_push($array,$type_T);
	array_push($array,$type_V);
	array_push($array,$type_8);
	array_push($array,$type_6);
	array_push($array,$type_K);
	
	echo "<pre>";
	print_r($array);
	foreach($array as $key => $val){
		foreach($val as $data){
			echo "<pre>";
			echo $data['BARCODE'].":::".$data['LOANSTATUS'];
			
			}

		}
	
	
	}
?>	




















