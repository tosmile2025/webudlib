<?php 
	include('../connectdata/cnectDB.php');
	//  $_POST['iptval_bcodeuser'] = "02125";
	if(isset($_POST['iptval_bcodeuser'])){
		// echo "test";
		/*$test = "2197";*/
		$output = array();
		$query = $connect->prepare(
									"select* from user_tb 
									where IDUSERCODE = '".$_POST['iptval_bcodeuser']."'"
									);
		$query->execute();
		$result = $query->fetchAll();
		foreach($result as $row){
				
				
							$output["IMAGEFILE"] = $row["IMAGEFILE"];
							$output["strOrder"] = "0";
							$output["countorDer"] = "";						
								$output["IDUSERCODE"] = $row["IDUSERCODE"];
								$output["FNAME"]	= $row["FNAME"];
								$output["LNAME"]	= $row["LNAME"];
								$output["POSITION"]	= $row["POSITION"];
								$output["CLASSPOSITION"] = $row["RangClass"];								
								if($output["CLASSPOSITION"] == 1){
									$output["rangtxt"] = "พยาบาล";
									}else if($output["CLASSPOSITION"] == 2){
										$output["rangtxt"] = "ผู้ช่วยเหลือคนไข้";
										}else if($output["CLASSPOSITION"] == 3){
										$output["rangtxt"] = "นิสิตแพทย์";
										}else if($output["CLASSPOSITION"] == 4){
										$output["rangtxt"] = "นักศึกษาฝึกงาน";
										}else if($output["CLASSPOSITION"] == 5){
										$output["rangtxt"] = "เจ้าหน้าที่ รพ";
										}else if($output["CLASSPOSITION"] == 6){
										$output["rangtxt"] = "เภสัช";
										}else if($output["CLASSPOSITION"] == 7){
										$output["rangtxt"] = "แพทย์";
										}else if($output["CLASSPOSITION"] == 8){										 
										$output["rangtxt"] = "อาจารย์แพทย์";
										}else{
											$output["rangtxt"] = "ไม่พบข้อมูลตำแหน่ง";
											}
								

			}
			
		func_updateOrderbk($con, $output);

		}
function func_updateOrderbk($con, $output){
	$numbercount = 0;
	$slc = mysqli_query($con, 'select * from orderbook_tb
							where IDuser_order = "'.$output['IDUSERCODE'].'" and Active_input = 1');
	$numrow = mysqli_num_rows($slc);
		if($numrow > 0){
			while($result = mysqli_fetch_array($slc)){
				$orderfix = mysqli_query($con, 'select * from orderbook_tb 
							where IDbook_order = "'.$result['IDbook_order'].'" and Active_input = 1
							and Order_book = (select min(Order_book) as minorder from orderbook_tb 
							where IDbook_order = "'.$result['IDbook_order'].'" and Active_input = 1)');
					$number = mysqli_num_rows($orderfix);
					$numbercount += 0 + $number;
				}
				// echo $numbercount;
				
			}else{
					echo json_encode($output);
			}
			if($number > 0){
				$output['strOrder']=1;	
				$output["countorDer"] = $numbercount;
				
				/*echo "<pre>";
				print_r($output);*/
				echo json_encode($output);	
			}
}

?>