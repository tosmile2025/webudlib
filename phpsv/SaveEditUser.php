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
if(isset($_POST['arr_data'])){
		$str = $_POST['arr_data'];		
		if($str[0] == 1){		
				$namepic = $str[2]."."."jpg";				
				inserIF($con, $str, $namepic);
		
			}else{
					insertELSE($con, $str);
				}
}
function insertELSE($con, $str){
	$date_crate = date_create($str[6]);
            $dete_Set = date_format($date_crate, "Y-m-d");	
			$date_creat_start = date_create($str[5]);	
			$dete_Set_start = date_format($date_creat_start, "Y-m-d");	
		$mysqli = mysqli_query($con,"update user_tb set IDUSERCODE = '".$str[2]."',
									 FNAME = '".$str[3]."',LNAME = '".$str[4]."',
									 SEX = '".$str[9]."',Code_student = '".$str[7]."',RangClass = '".$str[8]."',
									 FICBOOK = '".$str[11]."',POSITION = '".$str[12]."',
									 INTEXT = '".$str[10]."',ADDRESS ='".$str[13]."',
									 TEL ='".$str[14]."',EMAIL ='".$str[15]."',
									 MEMBerEND = '".$dete_Set."',MEMBSTART = '".$dete_Set_start."'
									 where IDUSERCODE = '".$str[2]."'");
									 
		
		//echo $_POST['val'];
		
}
				
function inserIF($con, $str, $namepic){	
	$date_crate = date_create($str[6]);
	$dete_Set = date_format($date_crate, "Y-m-d");	
	$date_creat_start = date_create($str[5]);	
	$dete_Set_start = date_format($date_creat_start, "Y-m-d");	
		$mysqli = mysqli_query($con,"update user_tb set IDUSERCODE = '".$str[2]."',
									 FNAME = '".$str[3]."',LNAME = '".$str[4]."',
									 SEX = '".$str[9]."',Code_student = '".$str[7]."',RangClass = '".$str[8]."',
									 FICBOOK = '".$str[11]."',POSITION = '".$str[12]."',
									 INTEXT = '".$str[10]."',ADDRESS ='".$str[13]."',
									 TEL ='".$str[14]."',EMAIL ='".$str[15]."',
									 MEMBerEND = '".$dete_Set."',IMAGEFILE='".$namepic."',MEMBSTART = '".$dete_Set_start."'
									 where IDUSERCODE = '".$str[2]."'");
		
		
		}
	
	/*$update = mysqli_query($con, "update book_store_tb set BYNUM = '".$numbybook."',
										Catbook_store = '".$bycatbook."'
										where IDLIKBOOK = '".$idlink."'");*/
?>