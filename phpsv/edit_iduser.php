<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['val'] = "ขจรศักดิ์ โพธิ์สอน";
	//$str = $_POST['arr_data'];
	//echo $str[1];
	/*0: 2
	1: ""
	2: "1234"
	3: "khajonsuk"
	4: "ppp\t\t\t\t\t\t"
	5: "16/6/2022"
	6: "22/6/2022"
	7: "445555"
	8: "9"
	9: "F"
	10: "D"
	11: "5"
	12: "หมายเหตุ"
	13: "ที่อยู่"
	14: "0932930941\t\t\t\t"
	15: "st@gmail.com"*/
if(isset($_POST['idold'])){
	$idnew = $_POST['idnew'];
	$idold = $_POST['idold'];
	updateIDuser($con, $idnew,$idold);
		
}
function updateIDuser($con, $idnew,$idold){
	$path = "../COVERIMAGES/".$idold.".jpg";
	$path_New = "../COVERIMAGES/".$idnew.".jpg";	
	if(file_exists($path)){
		rename($path, $path_New);
		}
	 $slc = mysqli_query($con, 'select * from user_tb where IDUSERCODE = "'.$idnew.'"');	 
	 $row = mysqli_num_rows($slc);
	 if($row >0){
		 echo "NOT";
		 }else{
			 $mysqli = mysqli_query($con,"update user_tb set IDUSERCODE = '".$idnew ."' where IDUSERCODE = '".$idold."'"); 
			 	echo $idnew;
			 }
}

?>