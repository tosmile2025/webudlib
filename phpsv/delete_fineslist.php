<?php 
include('../connectdata/cnectDB.php');
if(isset($_POST['iptValIDBook']))
	{
		$idbook = $_POST['iptValIDBook'];
		$rowCount = $_POST['rowCount']; // จำนวนรายการค่าปรับเกินกำหนดทั้งหมด
		$count_val = count($idbook);	// จำนวนที่รายการที่เลือกมาด้วย checkbok 
		foreach($idbook as $key => $data)
			{
				$val['idbk'] =  $data;
				$val['idu'] = $_POST['iptValIDU'];
				$set_data[] = $val;
		
				mysqli_query($con, 'UPDATE exportbook_tb SET Active_fines = 0 WHERE ID_ex_barcodebook = "'.$data.'" AND Active_fines = 1');
			 	mysqli_query($con, 'delete from fines_tb
														where idbk_fines = "'.$data.'" and Active_fines = 1');
														
		
			}
			
			$sqli = mysqli_query($con, 'select max(id_cash) as maxid from cash_fines_tb where idu_cash = "'.$val['idu'].'" and Active_cash = 1');
			$arr = mysqli_fetch_assoc($sqli);
			$idmax = $arr['maxid'];
			
			mysqli_query($con, 'update cash_fines_tb set Active_cash = 0
												where idu_cash = "'.$val['idu'].'" and Active_cash = 1 and Active_cash = 1 and id_cash = "'.$idmax.'" ');
						
					
				if($count_val < $rowCount) //จำนวนรายการที่เลือกมาน้อยกว่า รายการค่าปรับเกินกำหนดทั้งหมด			
				{
					$str = 1;
					echo json_encode($str);
					}else{
						$str = 2;
						echo json_encode($str);
						}
}

?>














