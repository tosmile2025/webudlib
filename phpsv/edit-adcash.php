<?php
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");
$datNow = date("Y-m-d");
// $_POST['idbk'] = "1234";
if (isset($_POST['iduser'])) {
    $iduser = $_POST['iduser'];   
    $cash_sum = $_POST['bath'];
    $slc = 'select * from cash_fines_tb where idu_cash = "' . $iduser . '" and Active_cash =1';
    $result = $con->query($slc);   
    if ($result->num_rows > 0) {
        // echo "มีค่า";
        $arr = $result->fetch_assoc();
        $id_cashTB = $arr['id_cash'];
        $Total = $arr['cash_total'];
        $cash_use = $arr['cash_use'];
        $cashSum_tb = $arr['cash_sum'];
        $sumtoTal = $cashSum_tb + $cash_sum ;
        update($con, $iduser, $datNow, $Total, $cash_use, $sumtoTal, $id_cashTB);
    } else {
        // echo "ไม่มีค่า";
        inserTdata($con, $iduser, $datNow, $cash_sum);
    }
}
function inserTdata($con, $iduser, $datNow, $cash_sum)
{
    $Total = 1;
    $cash_use =1;
    $str = '("' . $iduser . '","' . $Total . '","' . $cash_use . '","' . $cash_sum . '","' . $datNow . '","1")';
    $insert_tbcast = mysqli_query($con, "insert into cash_fines_tb(idu_cash,cash_total,cash_use,cash_sum,date_cash,Active_cash)
                values$str");
    if (!$insert_tbcast) {
        echo "error";
    } else {
        echo "sucess";
    }
}
function update($con, $iduser, $datNow, $Total, $cash_use, $sumtoTal, $id_cashTB)
{
    $update_cashbath = "update cash_fines_tb set cash_sum = '" . $sumtoTal . "',
    cash_total = '" . $Total . "',
    cash_use = '" . $cash_use . "'
    where id_cash = '" . $id_cashTB . "' ";
    if ($con->query($update_cashbath) === true) {
        echo "sucessfully";
        echo "2";
    } else {
        echo "errorupdate";
    }
}
