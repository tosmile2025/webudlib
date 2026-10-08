<?php
include('../connectdata/cnectDB.php');
include_once("xlsxwriter.class.php");
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
// $_POST['dayBegin'] = "2025-01-11";
// $_POST['dayend'] = "2025-01-14";

if(isset($_POST['dayBegin'])){
    $daybegin =   $_POST['dayBegin'];
    $dayend =   $_POST['dayend'];
  /*   $a['st'] =  $daybegin;
      $a['end'] =  $dayend;
      $ay[] = $a;   */
      // echo json_encode($ay);
     Function_export_($con, $daybegin, $dayend);
    }
    function  Function_export_($con, $daybegin, $dayend){
        
        date_default_timezone_set("Asia/Bangkok");
    
        $date_begin=date_create($daybegin);
        $date_end=date_create($dayend);
        
        $settime_begin = date_format($date_begin, "Y-m-d 00:i:s");
        $settime_end = date_format($date_end, "Y-m-d 23:00:00");
        // echo  $settime_end;
       
        // date ('Y-m-d H:i:s', $datNow);
        $user = mysqli_query($con, 'select * from checkoutbook where dt  between "'.$settime_begin.'" and "'.$settime_end.'"');
        $row = mysqli_num_rows($user);
       
    // print_r($settime_end);
        if($row >0){      
             
                    // echo $output;
                    $header = array(
                        'IDLINK'=>'string',//text
                        'BARCODE'=>'string',//text
                        'Book titles'=>'string',
                        'CAT'=>'string',
                        'YEAR'=>'string',
                        // 'DATETIME'=>'string',//custom
                        // 'c7-date'=>'date',
                        // 'c8-date'=>'YYYY-MM-DD',
                      );
                    $writer = new XLSXWriter();

                    $writer->writeSheetHeader('Sheet1', $header);
                      // print_r($writer);   
                    foreach($user as $row){
                       $writer->writeSheetRow('Sheet1', $row);
                        // echo "<pre>";
                    //  print_r($row['barcode'][0]);
                    // ค้นหาแบบแยกหมวด
                    //  if($row['barcode'][0] == "G"){
                    //    $writer->writeSheetRow('Sheet1', $row);
                    //  }
                    }
                   
                       
                     $random = rand(10,100);   
                     $filename =  '../excelFile/'.$daybegin."-".$dayend."-".$random.".xlsx";
                     $nameFile = $daybegin."-".$dayend."-".$random.".xlsx";
                    //  echo  $nameFile;
                    $writer->writeToFile($filename);
                   $aryName['booktitle'] =   $nameFile;                  
                   $json[]= $aryName;
                   echo json_encode($json); 
        }
    }



?>