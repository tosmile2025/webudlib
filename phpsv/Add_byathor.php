<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//echo $_POST['val'];
if(isset($_POST['val'])){
	$byname_athor = $_POST['val'];
	$sqli = mysqli_query($con, 'select max(ID_BYATHOR) as maxid from byathor_tb');
	$result = mysqli_fetch_assoc($sqli);
	$maxid = $result['maxid'];
	$b = "B";
	$y = "Y";
	$sum =  $maxid + 1;
	$rename =  $b.$sum.$y;
	MyfuncInsert_data_byathor($con, $rename, $byname_athor);
}
	function MyfuncInsert_data_byathor($con, $rename, $byname_athor){
		$str = '("'.$rename.'","'.$byname_athor.'","L")';
		$mysqli = mysqli_query($con, "insert into byathor_tb(LINKCODE,NAME_BY,status_byathor)
									values$str");
			echo $rename;
		}
		
		
	
?>