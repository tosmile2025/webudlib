 <?php    
    include('../connectdata/cnectDB.php');
	//$_POST['ad_data'] = "ขจรศักดิ์ โพธิ์สอน";
// $_POST['ad_data'] = "khajonsuk";
if(isset($_POST['ad_data'])){
	$album_name = $_POST['ad_data'];
	$sqli = mysqli_query($con, 'select max(ID_sub_album) as maxid from sub_album_tb');
	$result = mysqli_fetch_assoc($sqli);
	$maxid = $result['maxid'];
	$b = "T";
	$renameID =  $b.$maxid;
	MyfuncInsert_data_byathor($con, $renameID, $album_name);
}
	function MyfuncInsert_data_byathor($con, $renameID, $album_name){
		$date = date("d/m/Y");
		$str = '("'.$renameID.'","'.$album_name.'","T","'.$date.'")';
		$mysqli = mysqli_query($con, "insert into sub_album_tb(id_album,album_name,SUBTYPE,DATE)
									values$str");			
			$data['id'] = $renameID;						
			$data['name'] = $album_name;
			$set[] = $data;
		// echo "<pre>";
		// 	print_r($set);
			
			 echo json_encode($set);
			//echo $date;
		}
		
?>