
<style>
tr{
	border:solid 1px #000000;}
td{
	width:100px;
	height:35px;
	border:solid 1px #000000;}
</style>
<table border="1">
<?php 
	$codeLink = "1043119"; //211791
	if(isset($codeLink)){
	 	//echo $_POST['txt'];
		include('../connectdata/cnectDB.php');
		$select = mysqli_query($con, 'select * from athor_main_tb where id_thorEn between "1" and "20" group by blink_athor ORDER BY `id_thorEn` ASC');
		foreach($select as $key => $val){
		
		$dat[] = $val['blink_athor'];
		//print_r($iduser);
		
		}
		checkMani_athor_tb($con, $dat);
		
	
}

function checkMani_athor_tb($con, $dat){
	$arr_main = array('O','C','D','E','M','T');	
	foreach($dat as $key_id => $data)
		{
			$sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$data.'"');
			$numrows =mysqli_num_rows($sqli);
			while($result = mysqli_fetch_array($sqli)){			
				$data_set[] = $result;
				
			}
		}	
			/*echo "<pre>";
			print_r($data_set);
			echo "<pre>";*/
			$html = '';
					for($row = 0; $row < count($data_set); $row++){
						
						 echo "<tr>";
						 
						 for($col = 0; $col < count($arr_main); $col++){
							 if($arr_main[$col] == $data_set[$row]['TYPE']){
							 		$html .= "<td>".$data_set[$row]['blink_athor']."|".$data_set[$row]['TYPE']."|'".$data_set[$row]['detail_athormain_tb']."'</td>";
									
							 	}else{
									echo "<td>".$arr_main[$col]."</td>";
									
									}
							 }
							 echo "<tr>";
						}

			
			
	}
 ?>