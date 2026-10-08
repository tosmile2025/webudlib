<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$_POST['val'] = "";
if(isset($_POST['val'])){
	$byname_athor = $_POST['val'];
	$location = $_POST['loca'];
	$sqli = mysqli_query($con, 'select max(ID_puphlish) as maxid from lpublish_tb');
	$result = mysqli_fetch_assoc($sqli);
	$maxid = $result['maxid'];
	$b = "A";
	$y = "T";
	$sum =  $maxid + 1;
	$rename =  $b.$sum.$y;
	MyfuncInsert_data_byathor($con, $rename, $byname_athor, $location);
}
	function MyfuncInsert_data_byathor($con, $rename, $byname_athor, $location){
		$date = date("d/m/Y");
		$str = '("'.$rename.'","'.$byname_athor.'","'.$location.'","'.$date.'")';
		$mysqli = mysqli_query($con, "insert into lpublish_tb(PUBID_tb,PUBNAME,PUBADRESS,Date_update)
									values$str");
			$data['id'] = $rename;						
			$data['name'] = $byname_athor;
			$data['location'] = $location;
			$set[] = $data;
			
			echo json_encode($set);
			//echo $date;
		}
		
		
	
?>