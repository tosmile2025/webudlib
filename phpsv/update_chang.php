<?php 

include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");	
$str = '1';
if(isset($str)){
	$sqli = mysqli_query($con, 'select * from user_tb');
	while($result = mysqli_fetch_array($sqli)){
			$iduser['idu'] = $result['IDUSERCODE'];
			$iduser['dayend'] = $result['MEMBerEND'];
			$iduser['daystr'] = $result['MEMBSTART'];
			$arr[] = $iduser;
		}

func_update($con, $arr);
	

}

function func_update($con, $arr){
		foreach($arr as $data){
				//echo $data['idu'];
				$arr_day['idu'] = $data['idu'];				
			 	$dum = $data['dayend'];
				$old = '/';
				$new = '-';
				$dum_replace = str_replace($old,$new,$dum);
				$arr_day['dend'] = $dum_replace;
				//echo "<pre>";
				//echo $dum_replace;			
				//echo $data['daystr'];
				$main = $data['daystr'];
				$string = '/';
				$newstr = '-';
				$dum_replace_str = str_replace($string,$newstr,$main);
				$arr_day['dstart'] = $dum_replace_str;
			
				$json_ar[] = $arr_day;			
			}
	func_check_sql($con, $json_ar);
	}
function func_check_sql($con, $json_ar){
	date_default_timezone_set("Asia/Bangkok");
	/*echo"<pre>";
	print_r($json_ar);*/
	foreach($json_ar as $val){
		
		$update_ftb = mysqli_query($con, "update user_tb set MEMBerEND = '".$val['dend']."',
										MEMBSTART = '".$val['dstart']."'
										where IDUSERCODE = '".$val['idu']."'");
		if(!$update_ftb){
			echo "error".$update_ftb."||";
			}								
		
		}
		
	
	}
?>

























































