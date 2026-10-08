<?php 
		include('../connectdata/cnectDB.php');
		
	//$_POST['idLINK'] = '1043495';	
		if(isset($_POST['idLINK'])){
			
				$sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 
											inner join byathor_tb as d2 on(d1.LINK_athor = d2.LINKCODE)
											where LINK = "'.$_POST['idLINK'].'"');
				foreach($sqli as $data){
					
					$arr_json[] = $data;
					}							
						
				//echo "<pre>";
				//print_r($arr_json);						
			echo json_encode($arr_json);
			}

?>