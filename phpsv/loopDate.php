
<?php 
	include('../connectdata/cnectDB.php');
	if(isset( $_POST['loopDate']))
	{
			$txtdat = $_POST['loopDate'];
			$sqli_picker = mysqli_query($con,"select * from datpicker_tb limit 5");
			
			$result = mysqli_num_rows($sqli_picker);
			while($arr = mysqli_fetch_array($sqli_picker))
				{
					$arr_row[] = $arr['datpicker'];
					
					
				}
				
				if(in_array($txtdat, $arr_row))
					{
						
						
						echo "2";
						
						}else{
							echo "0";
							
							}
		}
?>