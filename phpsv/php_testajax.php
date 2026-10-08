<?php 
	$codeLink = "1043119"; //211791
	if(isset($codeLink)){
	 	//echo $_POST['txt'];
		include('../connectdata/cnectDB.php');
		$select = mysqli_query($con, 'select * from athor_main_tb where id_thorEn between "1" and "20" group by blink_athor ORDER BY `id_thorEn` ASC');
		foreach($select as $key => $val){
		$iduser =	$val['blink_athor'];
		$dat[] = $iduser;
		//print_r($iduser);
		
		}
		checkMani_athor_tb($con, $dat);
		
	
}

	function checkMani_athor_tb($con, $dat){
	
	foreach($dat as $key_id => $data)
		{
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$data.'"');
			$numrows =mysqli_num_rows($sqli);
			while($result = mysqli_fetch_array($sqli)){			
				$data_set[] = $result;
				
			}
	}
			echo json_encode($data_set);
			//echo "<pre>";
			

			
			
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