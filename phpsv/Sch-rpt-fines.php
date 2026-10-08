<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['startDay'] = "2022-04-20";	
	//$_POST['EndDay'] = "2022-04-21";
	date_default_timezone_set("Asia/Bangkok");
	// echo date_default_timezone_get();
	if(isset($_POST['statDay'])){
	
		$strt_date = $_POST['statDay'];
		$end_date = $_POST['EndDay'];
	//	echo $strt_date;
		//echo $end_date;

		if($strt_date == ''){
			Nodata($con);
		}else{
			Seach_data($con, $strt_date, $end_date);
		}
			
}
		
function Nodata($con){
	$dat = date("Y-m-1");
	$now = date("Y-m-d");
	// echo $dat."//".$now;
	$sql = mysqli_query($con, 'select* from cash_fines_tb as d1
					inner join user_tb as d2 on(d1.idu_cash = d2.IDUSERCODE)
					where d1.date_cash between "'.$dat.'"
					and "'.$now.'"');			
					while($result = mysqli_fetch_array($sql)){
						$arr[] = $result;
						}					
				echo json_encode($arr);
}
function Seach_data($con, $strt_date, $end_date){
	$sql = mysqli_query($con, 'select* from cash_fines_tb as d1
					inner join user_tb as d2 on(d1.idu_cash = d2.IDUSERCODE)
					where d1.date_cash between "'.$strt_date.'"
					and "'.$end_date.'"');
			
					while($result = mysqli_fetch_array($sql)){
					
						$arr[] = $result;	
						}
				echo json_encode($arr);
		
}
?>