<?php
include('../connectdata/cnectDB.php');
// echo json_encode($arr);
//  $data['data'] = '1122';  
//  $_POST['data'] = '1122'; 

if(isset($_POST['data'])){
  $data =  $_POST['data'] ;
}

try {

    $sqli = mysqli_query($con, 'select * from exportbook_tb as d1
                                inner join regis_books_tb as d2 on (d1.ID_ex_barcodebook = d2.BARCODE)
                                inner join book_store_tb as d3 on (d2.IDLIKBOOK = d3.IDLIKBOOK)
                                inner join user_tb as d4 on(d1.IDuser_exbook = d4.IDUSERCODE)
                                where ID_ex_barcodebook = "' .$data. '" and Active_book = 1 ');

    /* $sqli = mysqli_query($con, 'select * from regis_books_tb as d2 
   inner join book_store_tb as d3 on (d2.IDLIKBOOK = d3.IDLIKBOOK) order by d3.IDLIKBOOK desc  limit 100' );*/
    $sqliOr = mysqli_query($con, 'select * from orderbook_tb where IDuser_order = "' .$data. '" and Active_order =1');
    $row = mysqli_num_rows($sqliOr);
    //  echo $row;
    while ($result = mysqli_fetch_array($sqli)) {

      //echo $check_atv['ID_ex_barcodebook'];
      //if(file_exists($_SERVER["DOCUMENT_ROOT"]."/bud_library/COVERIMAGES/".$filetxt."")){ การหาไฟล์์ข้ามroot

      //echo"<pre>";
      //print_r($result);
      $path_isbn = $result['IDLIKBOOK'];
      $path = "../COVERIMAGES/" . $path_isbn . ".jpg";
      $arr['UserId'] = $result['IDuser_exbook'];
      $arr['IDLIKBOOK'] = $result['IDLIKBOOK'];
      $arr['BARCODE'] = $result['BARCODE'];
      $arr['NAME_BOOK'] = $result['NAME_BOOK'];
      $arr['Day_end'] = $result['Day_end'];
      $arr['email'] = $result['EMAIL'];
      $arr['order'] = $row;
      $arr['byname'] = "";
      $arr['publish_tb'] = "";
      $arr['Key_O'] = "";
      $arr['Key_M'] = "";
      $arr['Key_E'] = "";



      $jsonxt[] = $arr;
    }
    //   print_r($jsonxt); 
    if ($jsonxt) {
      //  echo json_encode($jsonxt);
      LisveSearch_arr($con, $jsonxt);
    } else {
      if ($row) {
        // echo "มี";
        echo json_encode(array(
          "status" => "Notfound",
          "order" => $row,
          "UserId" => $idUser['IDUSERCODE']
        ));
      } else {
        // echo "ไม่มี";
        echo json_encode(array(
          "status" => "Notfound",
          "order" => $row
        ));
      }
    }

} catch (Exception  $con) {
  die();
}
function LisveSearch_arr($con, $jsonxt)
{
  //echo json_encode($arr_row);
  //echo $arr_row[4][0];	
  foreach ($jsonxt as $key => $val) {
    /*echo"<pre>";
      print_r($val);
      echo "</pre>";*/
    $sqli = mysqli_query($con, 'select * from athor_cat_tb as d1 
                      inner join byathor_tb as d2 on(d1.LINK_athor = d2.LINKCODE)
                      where d1.LINK = "' . $val['IDLIKBOOK'] . '"');

    $row = mysqli_fetch_assoc($sqli);
    if ($val['IDLIKBOOK'] == $row['LINK']) {

      //echo"<pre>";
      //echo "ไม่ว่าง";
      //echo $row['NAME_BY'].$val['BARCODE'];
      $val['byname'] = $row['NAME_BY'];
      $arr_by[] = $val;
    } else {
      $val['byname'] = "";
      $arr_by[] = $val;
      // echo 'ว่าง';
    }
  }
  // echo"<pre>";
  // print_r($arr_by);
  ShowLivSearch_all_sub($con, $arr_by);
}
function ShowLivSearch_all_sub($con, $arr_by)
{
  /*echo "<pre>";
    print_r($arr_by);*/
  foreach ($arr_by as $idpub => $value_pub) {
    /*echo "<pre>";
                    echo  $value_pub['BARCODE'];*/
    $sqli_pub = mysqli_query($con, 'SELECT * FROM lpublish_tb
                                            WHERE PUBID_tb = "' . $value_pub['PUBCODE'] . '"');
    /*echo"<pre>";
                    echo $value['IDLIKBOOK'];*/
    $data_pub = mysqli_fetch_assoc($sqli_pub);
    //echo $data_pub['PUBNAME'];
    if ($data_pub != "") {
      $value_pub['publish'] = $data_pub['PUBNAME'] . "," . $data_pub['PUBADRESS'];
      $arr_by_pub[] = $value_pub;
    } else {
      $arr_by_pub[] = $value_pub;
      //echo "ว่าง";
    }
  }
  /*echo "<pre>";
    print_r($arr_by_pub);*/

  foreach ($arr_by_pub as $idkey => $value) {
    /*echo "<pre>";
                    echo  $value['BARCODE'];*/
    $sqli = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "' . $value['IDLIKBOOK'] . '" and TYPE = "O"');
    $result = mysqli_fetch_assoc($sqli);
    /*echo"<pre>";
                    echo $value['IDLIKBOOK'];*/

    if ($result != "") {
      $value['Key_O'] = $result['detail_athormain_tb'];
      $arr_by_main[] = $value;
    } else {
      $arr_by_main[] = $value;
      //echo "ว่าง";
    }
  }

  foreach ($arr_by_main as $txttype) {
    //echo $txttype['BARCODE'];
    $sqli_M = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "' . $txttype['BARCODE'] . '"');
    $data = mysqli_fetch_assoc($sqli_M);
    //echo "<pre>";
    //	print_r($data);
    if ($data != "") {
      //echo "test";
      $txttype['Key_M'] = $data['detail_athormain_tb'];
      $arr_by_main_M[] = $txttype;
    } else {
      $arr_by_main_M[] = $txttype;
      //echo "ว่าง";
    }
  }
  foreach ($arr_by_main_M as $txt_E) {
    //echo $txttype['BARCODE'];
    $sqli_E = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "' . $txttype['IDLIKBOOK'] . '" and TYPE = "E"');
    $data_E = mysqli_fetch_assoc($sqli_E);
    //echo "<pre>";
    //	print_r($data);
    if ($data_E != "") {
      //echo "test";
      $txt_E['Key_E'] = $data_E['detail_athormain_tb'];
      $arr_by_main_E[] = $txt_E;
    } else {
      $arr_by_main_E[] = $txt_E;
      //echo "ว่าง";
    }
  }
  // echo"<pre>";
  // print_r($arr_by_main_E);	
  echo   json_encode($arr_by_main_E);
}
