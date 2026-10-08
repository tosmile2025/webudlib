<?php
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");	
$datNow = date("Y-m-d");
if(isset($_POST['idbk'])){
    $idbk = $_POST['idbk'];
    $numday = $_POST['numday'];
    $bath = $_POST['bath'];
    $iduser = $_POST['iduser'];

    $insert_fdb = mysqli_query($con, "update fines_tb set countday = '".$numday ."',
                                cash_book = '".$bath."'
                                where iduser_fines = '".$iduser."' and idbk_fines ='".$idbk."' and Active_fines = 1");
    if(!$insert_fdb){
        echo "error";
    }else{
        echo "sucess";
    }
}
?>
