<?php 
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");	
	$datNow = date("Y-m-d");
	//$_POST['iduser'] = '1122';
	if($_POST['iduser']){
		$iduser = $_POST['iduser'];
		$sqli = mysqli_query($con, 'select * from user_tb where IDUSERCODE = "'.$iduser.'"');
		$li = mysqli_fetch_assoc($sqli);	
		$row = mysqli_num_rows($sqli);	
		//$time = strtotime($li['MEMBerEND']);
		//echo $time;
	if($row >0){	
		if(strtotime($li['MEMBerEND']) < strtotime($datNow)){
			//echo $li['MEMBerEND']."น้อยกว่าเวลาปัจจุบัน";
			$ar['status'] = 'F';
			}else{
				//echo $li['MEMBerEND']."มากกว่าเวลาปัจจุบัน";
				$ar['status'] = 'T';
				}				
			
		
	}else{
		$ar['status'] = 'N';
		
		}
				$json_ar[] = $ar;
				echo json_encode($json_ar);
		
	}
	
	

	
?>

