<?php 
	include('../connectdata/cnectDB.php');
//echo $_POST['data_arr'];

$date = date("Y-m-d");
//echo $date;
		$sqliselect = mysqli_query($con, 'select * from datpicker_tb where datpicker >= '.$date.'');
		while($result = mysqli_fetch_array($sqliselect)){
			$day['dayfix'] = $result['datpicker'];
			$day['dat'] = $result['dayfix'];
			$day['month'] = $result['month'];
			$day['year'] = $result['Year_calen'];
			//$day['datpicker'] = $result['datpicker'];
			//$day['note'] = $result['note_tb'];
			//$dat = $result['datpicker'];
			//echo $dat;
			$set[] = $day;
			
			}
			if($set == "")
				{
					}else{
						echo json_encode($set);
					}
			
?>