<?php
include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");


// $_POST['data'] = '106720';
try {
    if (isset($_POST['data'])) {
        $idbooks = $_POST['data'];
        func_checkTable($idbooks, $con);
    }
} catch (\Throwable $th) {
    // echo "error kvy";
}
function func_checkTable($idbooks, $con)
{

    $user = mysqli_query($con, 'select * from checkoutbook where barcode = "' . $idbooks . '"');
    $reuslt = mysqli_num_rows($user);
    if ($reuslt > 0) {
        //  รายการซ้ำ
        // echo "รายการซ้ำ".$reuslt;
        $err['err'] = 'str-01';
        $json[0] = $err;
        echo json_encode($json);
    } else {
        func_checkAnddeletbooks($idbooks, $con);
    }
}


function  func_checkAnddeletbooks($idbooks, $con)
{

    $user = mysqli_query($con, 'select * from book_store_tb as d1 
                                inner join regis_books_tb as d2 on(d1.IDLIKBOOK= d2.IDLIKBOOK) where d2.BARCODE = "' . $idbooks . '"');
    while ($result = mysqli_fetch_array($user)) {
        $array[] = $result;
    }
    // echo "<pre>";
    // print_r($array);
    if (isset($array)) {
        // echo "มี";
        // $err['suc'] = 'str-02';
        // func_insert($idbooks, $con, $array, $err);
        check_books($idbooks, $con, $array);
    } else {
        $err['err'] = 'str-02';
        $json[0] = $err;
        echo json_encode($json);
    }
}


function check_books($idbooks, $con, $array)
{
    $user = mysqli_query($con, 'select * from book_store_tb as d1 
    inner join regis_books_tb as d2 on(d1.IDLIKBOOK= d2.IDLIKBOOK) where d2.IDLIKBOOK = "' .$array[0]['IDLIKBOOK'] . '"');

    $number = mysqli_num_rows($user);
    if ($number > 1) {
        // ลบไฟล์  regis_books
        // echo $number;
        func_delete_regisbooks($idbooks, $con, $array, $number);
    } else if ($number == 1) {
        // echo $number;
        //ลบข้อมูล  books store and regisbooks
        func_delete_regisbooksAnd_bookstore($idbooks, $con, $array, $number);
    }
}
/// ฟังก์ชั่นลบข้อมูล rigis_books
function  func_delete_regisbooks($idbooks, $con, $array, $number)
{
    $sqli = mysqli_query($con, 'delete from regis_books_tb
									where BARCODE ="' . $idbooks . '" ');
    if ($sqli) {
        func_insert($idbooks, $con, $array);
        // successfully      
    } else {
        //---error delete
        $err['err'] = 'str-08';
        $json[0] = $err;
        echo json_encode($json);
    }
}
///-------------ลบข้อมูลทั้ง 2  ตาราง regis and bookstore
function  func_delete_regisbooksAnd_bookstore($idbooks, $con, $array, $number)
{
    $sqli = mysqli_query($con, 'delete from regis_books_tb
    where BARCODE ="' . $idbooks . '" ');
    if ($sqli) {
        $books = mysqli_query($con, 'delete from book_store_tb
            where IDLIKBOOK ="' . $array[0]['IDLIKBOOK'] . '" ');

        if($books){
            /// successfully
            func_insert($idbooks, $con, $array);
            
        }else{
           //----error delete books
           $err['err'] = 'str-09';
           $json[0] = $err;
           echo json_encode($json);
            }
    } else {
        //---error delete
        $err['err'] = 'str-13';
        $json[0] = $err;
        echo json_encode($json);
    }
}
function   func_insert($idbooks, $con, $array)
{
    $datNow = date("Y-m-d H:i:s");
    // echo $datNow;
    // echo $array[0]['NAME_BOOK'];
    $str = '("' . $array[0]['BARCODE'] . '","' . $array[0]['NAME_BOOK'] . '","' . $array[0]['Catbook_store'] . '","' . $array[0]['Year_book'] . '","' . $datNow . '")';
    $mysqli = mysqli_query($con, "insert into checkoutbook(barcode,namebook,catbook,year,dt) values$str");
  
    if ($mysqli) {
        $count = mysqli_query($con, 'select * from checkoutbook');
        // echo "record add successfully";
        $numrow = mysqli_num_rows($count);
         $array[0]['err'] = 'suc-02';
         $array[0]['countbooks'] = $numrow;
         echo json_encode($array);
    } else {
        // insert error sql
        $err['err'] = 'str-10';
        $json[0] = $err;
        echo json_encode($json);
    }
    mysqli_close($con);
    //  print_r($err);

}
