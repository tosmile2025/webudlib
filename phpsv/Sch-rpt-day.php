<?php 
	include('../connectdata/cnectDB.php');
	date_default_timezone_set("Asia/Bangkok");	
	// $_POST['statDay'] = '';
	// $_POST['EndDay'] = '';
	if(isset($_POST['statDay'])){
		$strt_date = $_POST['statDay'];
		$end_date = $_POST['EndDay'];
		//echo $strt_date;
	//	echo $end_date;
	if($strt_date == ''){
		func_show($con);
	}else{
		search_data($con, $strt_date, $end_date);
	}
		}
function func_show($con){
	$sql = mysqli_query($con, 'select * from exportbook_tb as d1
	inner join user_tb as d2 on(d1.IDuser_exbook = d2.IDUSERCODE)
	where d1.Active_book = 1 limit 50');

	while($result = mysqli_fetch_array($sql)){
		$arr[] = $result;	
		}
		//echo "<pre>";
		//print_r($arr);
		echo json_encode($arr);
}
function search_data($con, $strt_date, $end_date){
	$sql = mysqli_query($con, 'select* from exportbook_tb as d1
	inner join user_tb as d2 on(d1.IDuser_exbook = d2.IDUSERCODE)
	where d1.Day_start between "'.$strt_date.'"
	and "'.$end_date.'"');

	while($result = mysqli_fetch_array($sql)){
		//echo"<pre>";
		//echo $result['ID_ex_barcodebook'];
		
		$arr[] = $result;				
			//echo "<pre>";							
			//echo $result['FNAME']."|||".$result['ID_ex_barcodebook'] ."||".$result['Day_start'];
			
		}
		//echo "<pre>";
		//print_r($arr);
		echo json_encode($arr);
}
		// group by Day_start
?>	