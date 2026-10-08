<?php  
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");
//$testidu = '02125';
//$_POST['code'] = "02125";
$nowday = date('Y-m-d');
if(isset($_POST['iduser']))
{
		$iduser = $_POST['iduser'];		
		$nowday = date('Y-m-d');
				$sqli_chkretday = mysqli_query($con, 'select * from exportbook_tb
									where datediff(Day_end, "'.$nowday.'") < 0
									and IDuser_exbook = "'.$iduser.'"
									and Active_book = 1');
					$numRet = mysqli_num_rows($sqli_chkretday);
				
		
		if($numRet > 0){
			echo "1";			
			}else{
				$sqlifines = mysqli_query($con, 'select * from fines_tb where iduser_fines = "'.$iduser.'" and Active_fines = 1');
				$numrowfines = mysqli_num_rows($sqlifines);
				if($numrowfines >0){
					echo "1";
					}else{
						echo "2";
						}
				}
				
		
	//-------------------------------------------------------------------------------	
}

	
 ?>
 

