<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['startDay'] = '2021-1-1';
	//$_POST['EndDay'] = '2022-1-30';
	if(isset($_POST['statDay'])){
		$strt_date = $_POST['statDay'];
		$end_date = $_POST['EndDay'];
		//echo $strt_date;
		//echo $end_date;
		if($strt_date ==''){
			noData($con, $strt_date, $end_date);
		}else{
		Seach_Data($con, $strt_date, $end_date);
		}
			
		}
function noData($con, $strt_date, $end_date){
	$sql = mysqli_query($con, 'select* from importbook_tb as d1
				 inner join regis_books_tb as d2 on(d1.IDbook_import = d2.BARCODE)
				 inner join book_store_tb as d3 on(d2.IDLIKBOOK = d3.IDLIKBOOK)
				 inner join user_tb as d4 on(d1.IDuser_import = d4.IDUSERCODE) order by d1.IDbook_import desc limit 50');
				//	and "'.$end_date.'" group by d1.IDuser_import');		
				//echo $num = mysqli_num_rows($sql);
					while($result = mysqli_fetch_array($sql)){
						//echo"<pre>";
						//echo $result['ID_ex_barcodebook'];								
							//echo "<pre>";							
							//echo $result['FNAME']."|||".$result['IDbook_import'] ."||".$result['Day_sendbook'];
							$arr['iduser'] = $result['IDuser_import'];
							$arr['FNAME'] = $result['FNAME'];
							$arr['LNAME'] = $result['LNAME'];
							$arr['IDbook_import'] = $result['BARCODE'];
							$arr['NAME_BOOK'] = $result['NAME_BOOK'];
							$arr['rebook'] = $result['Day_sendbook'];
							$json_arr[] = $arr;
							}
					
						//echo "<pre>";
						//print_r($json_arr);
						echo json_encode($json_arr);
}
function Seach_Data($con, $strt_date, $end_date){
	$sql = mysqli_query($con, 'select* from importbook_tb as d1
				 inner join regis_books_tb as d2 on(d1.IDbook_import = d2.BARCODE)
				 inner join book_store_tb as d3 on(d2.IDLIKBOOK = d3.IDLIKBOOK)
				 inner join user_tb as d4 on(d1.IDuser_import = d4.IDUSERCODE)
				 where d1.Day_sendbook between "'.$strt_date.'"
						and "'.$end_date.'"');
				//	and "'.$end_date.'" group by d1.IDuser_import');		
				//echo $num = mysqli_num_rows($sql);
					while($result = mysqli_fetch_array($sql)){
						//echo"<pre>";
						//echo $result['ID_ex_barcodebook'];								
							//echo "<pre>";							
							//echo $result['FNAME']."|||".$result['IDbook_import'] ."||".$result['Day_sendbook'];
							$arr['iduser'] = $result['IDuser_import'];
							$arr['FNAME'] = $result['FNAME'];
							$arr['LNAME'] = $result['LNAME'];
							$arr['IDbook_import'] = $result['BARCODE'];
							$arr['NAME_BOOK'] = $result['NAME_BOOK'];
							$arr['rebook'] = $result['Day_sendbook'];
							$json_arr[] = $arr;
							}
					
						//echo "<pre>";
						//print_r($json_arr);
						echo json_encode($json_arr);
}
?>	