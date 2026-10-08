<?php
include('../connectdata/cnectDB.php');

// $_POST['iptValIDU'] = "1234";
//$cashBath = "20";
if (isset($_POST['iptValIDU'])) {
	$userid = $_POST['iptValIDU'];
	$cashBath  = $_POST['bath'];
	$sum_total_cash = "0";
	$bath = "0";
	$finas = $_POST['cashBath'];
	$toTalCash = $_POST['toTalCash'];
	$sqli_fines = mysqli_query($con, 'select * from fines_tb
											where iduser_fines = "' . $userid . '" and Active_fines = 1');
	$result_fines = mysqli_num_rows($sqli_fines);
	while ($arr_result = mysqli_fetch_array($sqli_fines)) {
		$sum_total_cash = $sum_total_cash + $arr_result['cash_book'];
	}
	//echo $sum_total_cash;
	$sqli_cash = mysqli_query($con, 'select * from cash_fines_tb
											where idu_cash = "' . $userid . '" and id_cash = (select max(id_cash) from cash_fines_tb 
																			where idu_cash = "' . $userid . '" and Active_cash =1) and Active_cash = 1');
	$query_cash = mysqli_fetch_assoc($sqli_cash);
	$result_cash = mysqli_num_rows($sqli_cash);
	$total_cash =  $query_cash['cash_sum'];
	$id_cash = $query_cash['id_cash'];
	//$result_fines = "0"; // ค่า่ปรับ
	//$result_cash = "1"; // ค้างชำระ
	// echo "1234";
	if (empty($total_cash)) {
		$bath = $sum_total_cash;
	} else {

		$bath = $total_cash + $sum_total_cash;
	}
	//echo $bath;
	if ($result_fines > 0 && $result_cash > 0) //ค่าปรับมี ค้างชำระมี
	{
		//  echo"ค่าปรับมี ค้างชำระมีี";
		cash_finesbook($userid, $cashBath, $bath, $finas, $toTalCash);
	} else if ($result_fines > 0 && $result_cash <= 0) // ค่าปรับมี ค้างชำระไม่มี
	{
		//  echo"ค่าปรับมี ค้างชำระไม่มี ifcheck_fines($userid, $cashBath, $bath).//";
		ifcheck_fines($userid, $cashBath, $bath);
	} else if ($result_fines <= 0 && $result_cash > 0) // ค่าปรับไม่มี ค้างชำระมี
	{
		//  echo"ค่าปรับไม่มี ค้างชำระมี";
		ifcheck_cash($userid, $cashBath, $total_cash, $id_cash);
	}
}

function cash_finesbook($userid, $cashBath, $bath, $finas, $toTalCash) // กรณีจ่ายค่าปรับครบ
{

	if ($cashBath >= $bath) {
		//echo $userid;
		//echo "จ่ายค่าปรับครบจำนวน";
		$str = "1";
		UpdateAndinsert_Cashbook($userid, $cashBath, $str, $bath, $finas, $toTalCash);
	} else { // จ่ายค่าปรับไม่ครบ
		//echo "จ่ายค่าปรับไม่ครบ";
		$str = "2";
		UpdateAndinsert_Cashbook($userid, $cashBath, $str, $bath, $finas, $toTalCash);
	}
}

function UpdateAndinsert_Cashbook($userid, $cashBath, $str, $bath, $finas, $toTalCash) //ค่าปรับมี ค้างชำระมี
{
	include('../connectdata/cnectDB.php');
	$date = date("Y-m-d");
	//echo $userid;



	if ($str == 1) //กรณีจ่ายค่าปรับครบ
	{
		$str = '("' . $userid . '","' . $bath . '","' . $cashBath . '","0","' . $date . '","0")';
		$insert_tbcast = mysqli_query($con, "insert into cash_fines_tb(idu_cash,cash_total,cash_use,cash_sum,date_cash,Active_cash)
												values$str");
		if (!$insert_tbcast) {
			echo "error insert";
		} else {
			$update_exbook = mysqli_query($con, 'update exportbook_tb set Active_fines = 0 
													where IDuser_exbook = "' . $userid . '" and Active_book = 1');
			$update_tbfines = mysqli_query($con, 'update fines_tb set Active_fines = 0
													where iduser_fines = "' . $userid . '" and Active_fines = 1');
			$update_tbcash = mysqli_query($con, 'update cash_fines_tb set Active_cash = 0 
														where idu_cash = "' . $userid . '" and Active_cash = 1');
			if (!$update_tbcash) {
				echo "errorupdate";
			} else {
				echo "1";
			}
		}
	} else { //กรณีจ่ายไม่ครบ
		// echo "ทดสอบ 2";
		$sumCash = 0;
		$sumCash = $bath - $cashBath;
		$update_exbook = mysqli_query($con, 'update exportbook_tb set Active_fines = 0 
												where IDuser_exbook = "' . $userid . '" and Active_book = 1');

		if (!$update_exbook) {
			// echo "errorupdate";
		} else {
			$sqli_cash = 'select * from cash_fines_tb where idu_cash ="' . $userid . '" and Active_cash = 1';
			$row = $con->query($sqli_cash);
			// $num  = $row->num_rows;
			// echo "++".$num."++";
			if ($row->num_rows > 0) {
				$update_tbfines = mysqli_query($con, 'update fines_tb set Active_fines = 0
													where iduser_fines = "' . $userid . '" and Active_fines = 1');
				if (!$update_tbfines) {
					echo "updateerror";
				} else {
					$update_cashbath = "update cash_fines_tb set cash_sum = '" . $sumCash . "',
							cash_use = '" . $cashBath . "'
							where idu_cash = '" . $userid . "' and Active_cash = 1";
					if ($con->query($update_cashbath) === true) {
						echo "sucessfully";
						echo "1";
					} else {
						echo "errorupdate";
					}
				}
			} else {
				// insert
				$str = '("' . $userid . '","' . $bath . '","' . $cashBath . '","' . $sumCash . '","' . $date . '","1")';
				$insert_tbcast = mysqli_query($con, "insert into cash_fines_tb(idu_cash,cash_total,cash_use,cash_sum,date_cash,Active_cash)
												values$str");
			}
			// echo "2";
		}
	}


	//$results = mysqli_query($con,$update_tbfines) or die ("Error in query: $update_tbfines" . mysqli_error());

}
function ifcheck_fines($userid, $cashBath, $bath)
{
	//echo"test";
	if ($cashBath >= $bath) //กรณีจ่ายค่าปรับครบ
	{
		$str = "1";
		//echo "1";	
		updateCashBook($userid, $cashBath, $bath, $str);
	} else //กรณีจ่ายค่าปรับน้อยกว่า
	{
		$str = "2";
		//echo "2";
		updateCashBook($userid, $cashBath, $bath, $str);
	}
}
function updateCashBook($userid, $cashBath, $bath, $str) // กรณีค่าปรับมี แต่ ค้างชำระไม่มี
{
	include('../connectdata/cnectDB.php');
	$date = date("Y-m-d");

	if ($str == 1) {
		$sum = 0;
		$sum = $bath - $cashBath;
		$str = '("' . $userid . '","' . $bath . '","' . $cashBath . '","' . $sum . '","' . $date . '","0")';
		$insert_tbcast = mysqli_query($con, "insert into cash_fines_tb(idu_cash,cash_total,cash_use,cash_sum,date_cash,Active_cash)
												values$str");
		if (!$insert_tbcast) {
			echo "error insert";
		} else {
			$update_exbook = mysqli_query($con, 'UPDATE exportbook_tb SET Active_fines = 0 WHERE IDuser_exbook = "' . $userid . '" AND Active_fines = 1');
			$update_tbfines = mysqli_query($con, 'update fines_tb set Active_fines = 0
												where iduser_fines = "' . $userid . '" and Active_fines = 1');
			if (!$update_tbfines) {
				echo "eror update";
			} else {
				echo "1";
			}
		}
	} else {
		$sum = 0;
		$sum = $bath - $cashBath;
		$str = '("' . $userid . '","' . $bath . '","' . $cashBath . '","' . $sum . '","' . $date . '","1")';
		$insert_tbcast = mysqli_query($con, "insert into cash_fines_tb(idu_cash,cash_total,cash_use,cash_sum,date_cash,Active_cash)
												values$str");
		if (!$insert_tbcast) {
			echo "error insert2 ";
		} else {
			$update_exbook = mysqli_query($con, 'UPDATE exportbook_tb SET Active_fines = 0 WHERE IDuser_exbook = "' . $userid . '" AND Active_fines = 1');
			$update_tbfines = mysqli_query($con, 'update fines_tb set Active_fines = 0
												   where iduser_fines = "' . $userid . '" and Active_fines = 1');
			if (!$update_tbfines) {
				echo "eror update2";
			} else {
				echo "2";
			}
		}
	}
}
function ifcheck_cash($userid, $cashBath, $total_cash, $id_cash) //กรณีไม่มค่าปรับ แต่มีค้างชำระ
{

	if ($cashBath >= $total_cash) {
		//echo $userid;
		// echo "จ่ายค่าปรับครบจำนวน";
		$str = "1";
		UpdateAndinsert_Cashbookstate($userid, $cashBath, $total_cash, $str, $id_cash);
	} else { // จ่ายค่าปรับไม่ครบ
		// echo "จ่ายค่าปรับไม่ครบ";
		$str = "2";
		UpdateAndinsert_Cashbookstate($userid, $cashBath, $total_cash, $str, $id_cash);
	}
}

function UpdateAndinsert_Cashbookstate($userid, $cashBath, $total_cash, $str, $id_cash)
{

	include('../connectdata/cnectDB.php');
	$date = date("Y-m-d");

	if ($str == 1) //จ่ายค่าปรับครบ
	{

		$sum = 0;
		$sum = $total_cash - $cashBath;

		$update_tbcash = mysqli_query($con, 'update cash_fines_tb set Active_cash = 0 
					where idu_cash = "' . $userid . '" and Active_cash = 1');
		if (!$update_tbcash) {
			echo "errorupdate";
		} else {
			echo "1";
		}
		//echo $userid;

	} else { //จ่ายค่าปรับไม่ครบ
		//echo "จ่ายไม่ครบ";
		$sum = 0;
		$sum = $total_cash - $cashBath;
		$update_cashbath = "update cash_fines_tb set cash_sum = '" . $sum . "',
							cash_total = '" . $total_cash . "',
							cash_use = '" . $cashBath . "'
							where id_cash = '" . $id_cash . "' ";
		if ($con->query($update_cashbath) === true) {
			echo "sucessfully";
			echo "2";
		} else {
			echo "errorupdate";
		}
	}
}
