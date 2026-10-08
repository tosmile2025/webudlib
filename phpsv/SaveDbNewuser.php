<?php 
	include('../connectdata/cnectDB.php');
	
$data = $_POST['arr_data'];
	//echo $data[1];
	/*0: "2"
	1: ""
	2: "1650700034938"
	3: "khajosun"
	4: "phosin"
	5: "16/6/2022"
	6: "30/6/2022"
	7: "999999999"
	8: "9"
	9: "F"
	10: "D"
	11: "5"
	12: "หมายเหตุ"
	13: "ที่อยู่"
	14: "เบอร์โทร"
	15: "อีเมลล์"*/
	if($data != ''){
		// print_r($data);
	if($data[0] == 2){
		$namepic = '';
		}else{
			$namepic = $data[2]."."."jpg";
			//echo $namepic;
			}
			$date_crate = date_create($data[6]);
            $dete_Set = date_format($date_crate, "Y-m-d");	
			$date_creat_start = date_create($data[5]);	
			$dete_Set_start = date_format($date_creat_start, "Y-m-d");	
			$value = "('$data[2]','$data[3]','$data[4]','$data[9]','$data[7]','$data[8]','$data[11]',
			'$data[12]','$data[10]','$data[13]','$data[14]','$data[15]','$dete_Set','$namepic','$dete_Set_start')";
		}
	$insert = "insert into user_tb(IDUSERCODE,FNAME,LNAME,SEX,Code_student,
									RangClass,FICBOOK,POSITION,INTEXT,ADDRESS,TEL,EMAIL,
									MEMBerEND,IMAGEFILE,MEMBSTART)values$value";
	$result = mysqli_query($con,$insert) or die ("Error in query: $insert " . mysqli_error($con));
									
?>