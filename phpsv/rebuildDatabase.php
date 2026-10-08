	
	<?php
	include('../connectdata/cnectDB.php');
		$codeLink = "1043119"; //211791
		
if(isset($_POST['data'])){
	 	echo $_POST['data'];
		include('../connectdata/cnectDB.php');
		$select = mysqli_query($con, 'select * from athor_main_tb where id_thorEn between "1" and "20" group by blink_athor ORDER BY `id_thorEn` ASC');
		foreach($select as $key => $val){
		$iduser =	$val['blink_athor'];
		$dat[] = $iduser;
		//print_r($iduser);
		checkMani_athor_tb($con, $iduser);
		}
		
	
}

	function checkMani_athor_tb($con, $iduser){
	
	
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$iduser.'"');
			$numrows =mysqli_num_rows($sqli);
			while($result = mysqli_fetch_array($sqli)){
				$data_type['id'] = $result['blink_athor'];
				$data_type['id_tb'] = $result['id_thorEn'];
				$data_type['type'] = $result['TYPE'];
				$data_type['txt'] = $result['detail_athormain_tb'];
				//$data_set[] = $data_type;
				
				
			}
			
			//echo "<pre>";
			//echo json_encode($data_type);

			
			
			/*foreach($data_set as $key => $value){
				if($value['type']== "O"){
					$data_arr['key_O'] = $value;
					}else if($value['type'] == "C"){
						$data_arr['key_C'] = $value;
						}else if($value['type'] == "D"){
							$data_arr['key_D'] = $value;
							}else if($value['type'] == "E"){
								$data_arr['key_E'] = $value;
								}else if($value['type'] == "T"){
									$data_arr['key_T'] = $value;
									}
				
				}
				$json[] = $data_arr;*/
		//echo json_encode($json);
		//echo "<pre>";
		//echo print_r($json);
	}
	

?>





