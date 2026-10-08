<?php 

	include('../connectdata/cnectDB.php');
	

/*	$id = "02125";
	$idbk =  "211791";*/
	
$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2);      // returns "c", "d", and "e"
$output = array_slice($input, -2, 1);  // returns "d"
$output = array_slice($input, 0, 3);   // returns "a", "b", and "c"

// note the differences in the array keys
/*print_r(array_slice($input, 2, -1));*/
print_r(array_slice($input, 2, -1, true));

	
	/*$arr_box = array(
		"0"=> array("idu"=>"02125","idbk"=>"211791","cl"=>"8","re"=>"1"),
		"1"=> array("idu"=>"02125","idbk"=>"211794","cl"=>"8","re"=>"1")	
		
				);
	$idutxt = "02125";
	$class = "8";
	$strenew = "1";*/
	/*print_r($_POST);*/
	$idbk= $_POST['iptValIDBook'];
	if(count($idbk)>0)
				{
					
	for($i = 0; $i < count($idbk); $i++)
		{
							
		$set['idbk'] = $idbk[$i];
		$set['idu'] = $_POST['iptValIDU'];
		$set['Class'] = $_POST['iptClass'];
		$set['stRenew'] = $_POST['statusRenew'];
		$arr[] = $set;
		}
	/*echo print_r($arr);*/
	
	foreach($arr as $land => $data)
    	  {
		
		
			

				$sqli_show = mysqli_query($con, 'select * from exportbook_tb 
												
												where IDuser_exbook = "'.$data['idu'].'" and ID_ex_barcodebook = "'.$data['idbk'].'" and Active_book = 1
												');
						while($result = mysqli_fetch_array($sqli_show))
								{
									$data_arr['idu'] = $result['IDuser_exbook'];
									$data_arr['idbk'] = $result['ID_ex_barcodebook'];
									$data_arr['dn'] = $result['Day_end'];
									$data_arr['cd'] = $result['Count_day'];
								$set_arrbox[] = $data_arr;
									}
									
								
									
		  }
	
	
	/*echo json_encode($set_arrbox);	*/
	
	
	
	
	
	
	
				}




















?>






























