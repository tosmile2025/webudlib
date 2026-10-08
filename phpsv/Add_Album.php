	
 <?php    
    include('../connectdata/cnectDB.php');
//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$_POST['val'] = "55555";
if(isset($_POST['val'])){
	$album_name = $_POST['val'];
	$sqli = mysqli_query($con, 'select max(ID_sub_album) as maxid from sub_album_tb');
	$result = mysqli_fetch_assoc($sqli);
	$maxid = $result['maxid'];
	$b = "AL";
	$renameID =  $b.$maxid;
	MyfuncInsert_data_byathor($con, $renameID, $album_name);
}
	function MyfuncInsert_data_byathor($con, $renameID, $album_name){
		$date = date("d/m/Y");
		$str = '("'.$renameID.'","'.$album_name.'","L","Y","R","'.$date.'","N")';
		$mysqli = mysqli_query($con, "insert into sub_album_tb(id_album,album_name,SOURCE,USED,SUBTYPE,DATE,GENERATE)
									values$str");
			
			$data['id'] = $renameID;						
			$data['name'] = $album_name;
			$set[] = $data;
			
			echo json_encode($set);
			//echo $date;
		}
		
?>