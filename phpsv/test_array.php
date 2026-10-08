<?php 
$array1 = array("a" => "green", "red", "blue", "black", "pink", "yellow", "gray");
$array2 = array("b" => "yellow", "green", "red", "gray");

$ar = array_merge($array1, $array2);

echo "<pre>";
print_r($ar);
$counts = array_count_values($ar);
//$result = [];
//print_r($counts);
foreach ($counts as $number => $count) {
    if($count > 1) {
      // array_push($result, $number);
	  //echo "<pre>";
	 // echo $number;
    }else{
		
		echo "<pre>";
	  	echo $number;
		}
}


//print_r($result);




?>