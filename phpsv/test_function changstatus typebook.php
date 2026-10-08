<?php

include('../connectdata/cnectDB.php');
	$_POST['data'] = "";
	$status = "2";
	if(isset($_POST['data'])){
		
		//echo $_POST['data'][1];
		$sqli = mysqli_query($con, "select * from regis_books_tb ");
		while($result = mysqli_fetch_array($sqli)){
				if($result['BARCODE'][0] == $status){
					$code[] = $result['BARCODE'];
					
					}
				
		
			}
				FuncMax_array($code);
	}


function FuncMax_array($code){
	//echo "<pre>";
	//print_r($code);
	echo max($code);
	foreach($code as $key =>$vals){
		echo "<pre>";
		echo $vals;
		
		
		}
	}


/*include('../connectdata/cnectDB.php');
	$_POST['data'] = "";
	$status = "8";
	if(isset($_POST['data'])){
		
		//echo $_POST['data'][1];
		$sqli = mysqli_query($con, "select * from regis_books_tb ");
		while($result = mysqli_fetch_array($sqli)){
			
		$barcode[] = $result;
				
		}
		foreach($barcode as $key => $val){
			
			
			if($val['BARCODE'][0] == $status){
				
				if($val['LOANSTATUS'] != $status){
					//echo "<pre>";
					//echo $val['BARCODE'];
					$st = $val['BARCODE'];
					 Myfunc_Where($con, $st);
					
					}
				
				
				
				}
				
			}
	}
function Myfunc_Where($con, $st){
	
		//echo $st;
		$update = mysqli_query($con, "UPDATE regis_books_tb SET LOANSTATUS = '8'  
												WHERE BARCODE = '".$st."'");
	}*/
?>