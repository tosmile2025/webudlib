<?php 
include('../connectdata/cnectDB.php');
$_POST['orderday'] = "2022-04-13";
if(isset($_POST['orderday'])){
	$thenDay = $_POST['orderday'];
	//$Lday = "2022-04-03";
	//echo $data;	
	
	check_dayfix($con, $thenDay);
	}




function check_dayfix($con, $thenDay)
{
		$sqli_picker = mysqli_query($con, 'select * from datpicker_tb 
															where datpicker = "'.$arg1.'"');
						$result_num = mysqli_num_rows($sqli_picker);	
	//return $result_num;
	if($result_num >0){
		
		$Lday = date ("Y-m-d", strtotime("+1 day", strtotime($arg1)));
		return $Lday;
		}
	
	
}


// call function


echo "\$fnc1 : $fnc1 <br>";










?>










































