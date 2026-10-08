<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['iddealer'] = 'M00001';
	if(isset($_POST['iddealer'])){
		
		$data = $_POST['iddealer'];
			$sqli = mysqli_query($con, 'SELECT * FROM `dealerbook_tb` ORDER BY `dealerbook_tb`.`IDKEY_Dealer` ASC');
			while($result = mysqli_fetch_array($sqli)){
				
				$arr[] = $result;
				}
	
	foreach($arr as $key => $val){
		if($data == $val['IDKEY_Dealer']){
			
			$ar[] =  $val;
			
	
			
		}else{
			$as[] = $val;
			
			}
			
			
	}

		if($ar == null){
			echo json_encode($as);
			}else{
			$merge = array_merge($ar,$as);
			echo json_encode($merge);
				}	
				
		
		
		}
?>