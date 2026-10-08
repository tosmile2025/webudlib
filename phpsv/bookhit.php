<?php 
include('../connectdata/cnectDB.php');
$type =  $_POST['txt_type'];
// $_POST['txt_start'] = "2022-1-1";   
// $_POST['txt_end'] = "2023-10-9";
$startday = $_POST['txt_start'] ;
$endday	= $_POST['txt_end'];
if($_POST['txt_start'] == ""){	
	showDataNoValue($con);
}else{
	//sele_data($con);
	txt_SearchData($con, $startday, $endday, $type);
}
function showDataNoValue($con){
	// echo "test";
		$sqli = mysqli_query($con, 'select *, count(ID_ex_barcodebook) as count_name from exportbook_tb as d1
		inner join regis_books_tb as d2 on (d1.ID_ex_barcodebook = d2.BARCODE)
		inner join book_store_tb as d3 on (d2.IDLIKBOOK = d3.IDLIKBOOK)								
		group by ID_ex_barcodebook having count_name > 0 order by count_name desc' );
		while($result = mysqli_fetch_array($sqli)){				
		//echo $result['count_name']."//".$result['BARCODE']."//".$result['NAME_BOOK']."<pre>";				
		$arr['count']	  = $result['count_name'];
		$arr['barcode']	   = $result['BARCODE'];
		$arr['NAME_BOOK']	  = $result['NAME_BOOK'];
		$arr['year']	  = $result['Year_book'];
		$arr['Price_book']	  = $result['Price_book'];
		$arr_json[] = $arr;				
		}		
		echo json_encode($arr_json);
	}
function SearchData($con, $startday, $endday){
	echo $startday;
	echo "<pre>";
	echo $endday;
	$sqli = mysqli_query($con, 'select * from book_store_tb as d1
								inner join regis_books_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
								where d2.Dat_regis between "2022-8-1" and "2023-10-09" ');
								// where d1.Day_start between "'.$strt_date.'"
	while($result = mysqli_fetch_array($sqli)){				
	//echo $result['count_name']."//".$result['BARCODE']."//".$result['NAME_BOOK']."<pre>";				
	
	$arr['Barcode']	   = $result['BARCODE'];
	$arr['Namebook']	  = $result['NAME_BOOK'];
	$arr['Year_book']	  = $result['Year_book'];
	$arr['Dat_regis']	  = $result['Dat_regis'];											
	$arr_json[] = $arr;				
	}	
	echo "<pre>";	
	print_r($arr_json);
	
	// echo json_encode($arr_json);
}
function txt_SearchData($con, $startday, $endday, $type){
	//echo $startday."//".$endday;
	$sql = mysqli_query($con, 'select * from regis_books_tb as d1
	inner join book_store_tb as d2 on(d1.IDLIKBOOK = d2.IDLIKBOOK)
	where d1.Dat_regis between "'.$startday.'" and "'.$endday.'"');
	while($result = mysqli_fetch_array($sql)){
		if($result['GMDCODE'] == $type){
					$ar_txt['count']	=  "0";
					$ar_txt['NAME_BOOK']	  = $result['NAME_BOOK'];
					$ar_txt['GMDCODE']	  = $result['GMDCODE'];
					$ar_txt['IDLIKBOOK']	  = $result['IDLIKBOOK'];
					$ar_txt['barcode']	   = $result['BARCODE'];
					$ar_txt['year']	   = $result['Year_book'];
					$ar_txt['Price_book']	  = $result['Price_book'];
					$ar_txt['Dat_regis']	   = $result['Dat_regis'];
					$ar_txt['day']	  =  "";									
					$arr_txt[] = $ar_txt;			
		}
	}

	$export = mysqli_query($con, 'select *, count(ID_ex_barcodebook) as count_name from exportbook_tb as d1
	inner join regis_books_tb as d2 on (d1.ID_ex_barcodebook = d2.BARCODE)
	inner join book_store_tb as d3 on (d2.IDLIKBOOK = d3.IDLIKBOOK)	
	 where Day_start between "'.$startday.'" and "'.$endday.'" group by ID_ex_barcodebook having count_name > 0 order by count_name desc' );
								// where d1.Day_start between "'.$strt_date.'"
	while($txt = mysqli_fetch_array($export)){				
	//echo $result['count_name']."//".$result['BARCODE']."//".$result['NAME_BOOK']."<pre>";	
			if($txt['GMDCODE'] == $type){
					$arr['count']	  = $txt['count_name'];
					$arr['NAME_BOOK']	  = $txt['NAME_BOOK'];
					$arr['GMDCODE']	  = $txt['GMDCODE'];
					$arr['IDLIKBOOK']	  = $txt['IDLIKBOOK'];
					$arr['barcode']	   = $txt['ID_ex_barcodebook'];
					$arr['year']	   = $txt['Year_book'];
					$arr['Price_book']	  = $txt['Price_book'];
					$arr['Dat_regis']	   = $txt['Dat_regis'];
					$arr['day']	  = $txt['Day_start'];											
					$arr_json[] = $arr;			
			}
	}
	func_if($con, $arr_json, $arr_txt, $type);
	/*echo "<pre>";
	print_r($arr_json);*/
}
function func_if($con, $arr_json, $arr_txt, $type){
	/*echo "<pre>";
	print_r($arr_txt);	*/
	$ar_sum = [];
		for($i = 0; $i < count($arr_txt); $i++){// จำนวนยืมมากกว่า 0
			$ar_sum[] = $arr_txt[$i];
				for($k =0; $k < count($arr_json); $k++){
					//echo "<pre>";
				// echo $arr_txt[$i]['BARCODE']."หนังสือลงทะเบียน";
					// echo $arr_json[$k]['barcode']."หนังสือยืม";
					if($arr_txt[$i]['barcode'] == $arr_json[$k]['barcode']){	
					 $ar_sum[$i] = $arr_json[$k];
					}
				}
		
			}
	
		
		// array_multisort($ar_sum, 2)	;

		usort($ar_sum, function($a, $b) {
			return $b['count'] - $a['count'];
		  });

		 
		  /*echo "<pre>";
		  print_r( $ar_sum );*/


		
	/*echo "<pre>";
	 print_r($txt_array);	*/
	 echo json_encode($ar_sum);
	
}





function sele_data($con){
	$export = mysqli_query($con, 'select * from regis_books_tb_sq');
	while($result = mysqli_fetch_array($export)){
		$arr[] = $result;
	}
	updatDay($con, $arr);
}

function updatDay($con, $arr){
	// print_r($arr);
	$all ='';
	foreach($arr as $val){
		
		//$orgDate= $val['Dat_regis'];//"26-1-2022";      //รูปแบบการเก็บค่าข้อมูลวันเกิด	
		$txt = $val['Dat_regis'];
		list($day, $month, $year) = explode("-", $txt);
		 $d = $day;
		 $y = $year;
		 $m = $month;
		$dayFix = $y."-".$m."-".$d;
	
		

	$mysqli = mysqli_query($con, "update regis_books_tb set Dat_regis = '".$dayFix."'
														where IDKEY_REGIS = '".$val['IDKEY_REGIS']."'");
		if(!$mysqli){
			echo "error".$val['IDKEY_REGIS'];
		}
	}
	echo $dayFix;
	/*$orgDate = "17-07-2012";  
    $newDate = date("Y-m-d", strtotime($orgDate));  
    echo "New date format is: ".$newDate. " (YYYY-MM-DD)";  */
	/*$date=date_create('2014-10-20');
    date_time_set($date,12,20,55);
    echo date_format($date,'Y-m-d H:i:s');*/
	
}
?>