<?php 
	include('../connectdata/cnectDB.php');
		//$codeLink = "1043119"; //211791
		$codeLink = "1024610"; // 503254
		//$codeLink = "0001946";
		//$codeLink = "0001955";
		funcTB_athorlink($codeLink, $con);
		
function funcTB_athorlink($codeLink, $con){
	
	$sqli = mysqli_query($con, 'select * from athor_cat_tb where LINK = "'.$codeLink.'"');
	$num = mysqli_num_rows($sqli);
	$row = mysqli_fetch_assoc($sqli);
	
	if($num == 0 ){
		funcAthor_main($codeLink, $con);
		}else {
			funcBy_athor($codeLink, $con, $row);
				funcAthor_main($codeLink, $con);
			}
	}
function funcAthor_main($codeLink, $con){
	$array = array();
	$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$codeLink.'"');
	while($arr = mysqli_fetch_array($sqli)){
		// echo $arr['detail_athormain_tb']."<br>";
		$setarr[] = '"'.$arr['detail_athormain_tb'].'"';
		$keyarr[] = '"'.$arr['TYPE'].'"';
		
		//echo $arr['detail_athormain_tb'];
		//$key = array_combine($keyarr,$setarr);
		
		}
		//print_r($key);
		//$colors = array("red","green","blue","yellow");
		//print_r($setarr);
		foreach ($setarr as $key =>$value){
		//print $key . " : ".$value ."<br>\n";
		if($key == '1')
		{
			$name_athor =  $value;
			echo $name_athor;
			
			}
		if($key == '3'){
			
			$print = $value;
			echo $print;
			}
		}
	
		//print_r($setarr);
		sendAjaxDetailregis();
	}
function funcBy_athor($codeLink, $con, $row){
	//echo $row['LINK_athor'];
	$sqli = mysqli_query($con, 'select * from byathor_tb where LINKCODE = "'.$row['LINK_athor'].'"');
	while($result = mysqli_fetch_array($sqli)){
		echo $result['NAME_BY'];
		
		}
		
		sendAjaxDetailregis();
	}

function sendAjaxDetailregis(){
	
	
	}

?>