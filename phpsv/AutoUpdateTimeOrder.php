
<?php
		include('../connectdata/cnectDB.php');
		date_default_timezone_set("Asia/Bangkok");
	if(isset($_POST['statusOrder']))
		{
			$dat = date("Y-m-d");
			/*$dat = strtotime('2020-11-7');*/
			/*echo $dat;*/
			$sqli = mysqli_query($con, "select * from orderbook_tb where Active_order = 1");
			while($arr = mysqli_fetch_array($sqli))
				{
					$arr_day[] = $arr['order_day'];
					
					}
	$numrow = mysqli_num_rows($sqli);		
if($numrow > 0)
	{
		for($i = 0; $i < count($arr_day); $i++)
		{
			if($arr_day[$i] < $dat)
			{
				
				/*echo $arr_day[$i]."/orderน้อยกว่า/|";*/
				$daySet = $arr_day[$i];
				UpdateActive_orderStatus($con, $daySet);
			//echo $statusOrder;
				
				}else{
					
				/*mysqli_close($con);*/
				
					}
			
			
			
			
			}
		
		//echo count($arr_day);
		
	
	}
}			
	
function UpdateActive_orderStatus($con, $daySet){			
			include('../connectdata/cnectDB.php');
		$sqli = mysqli_query($con, "update orderbook_tb set Active_order = 0
								where Active_order = 1 and order_day = '".$daySet."'");
								
		}

?>