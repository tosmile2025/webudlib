<?php



/*$x = date("Y-m-d",strtotime("+ 1 day"));
$y = date("Y-m-d",strtotime("+ 30 day"));*/
/*$d = 3;
$w = 3;*/
$_POST['data'] = '123454';
if($_POST['data']){
	$val = $_POST['data'];
	$arr = upDate($val);	
	echo $arr;
	return;
	}

function Add($d, $w)
					{
						
						$st = $d+$w;
						//$d = $x+$y;
						//echo "ค่า x  ภายในฟังก์ชั่น";
						//echo $y;
							
						return  $st;
												
						}
function upDate($val){			
					
		$d = "10";
		$w = "5";
		$aa = Add($d, $w);
		 return $aa;
	}
//upDate();	
 ?>