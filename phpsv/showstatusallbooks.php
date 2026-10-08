<?php
include('../connectdata/cnectDB.php'); 
        $allbooks = mysqli_query($con, 'select (BARCODE) from regis_books_tb');
        // $numrow = mysqli_num_rows($allbooks);
        while($result = mysqli_fetch_assoc($allbooks)){
            $bcode[] =  $result['BARCODE'];
        }
        
     
        if(!$bcode){
          $errorCode = "err0r00001";
          func_error($errorCode);
        }else{
            // $fmatnumrow = number_format($numrow);
           func_usertotal($con, $bcode);
        }

function func_usertotal($con, $bcode){
    $allbooks = mysqli_query($con, 'select (IDUSERCODE) from user_tb');
    $numuser = mysqli_num_rows($allbooks);  
    if(!$numuser){
        $errorCode = "err0r00002";
        func_error($errorCode);
    }else{
        $fmatnumuser = number_format($numuser);
        func_education($con, $bcode, $fmatnumuser);
    }
}
function func_education($con, $bcode, $fmatnumuser){
foreach($bcode as $val){
    
        if($val[0] == "F"){
            $arrF[] = $val;
        }else if($val[0] == "3"){
            $arr3[] =$val;
        }else if($val[0] == "5"){
            $arr5[] =$val;
        }else if($val[0] == "M"){
            $arrM[] =$val;
        }else if($val[0] == "R"){
            $arrR[] =$val;
        }else if($val[0] == "8"){
            $arr8[] =$val;
        }else if($val[0] == "1"){
            $arr1[] = $val;
        }else if($val[0] == "2"){
            $arr2[] = $val;
        }else{
           
        }
    } 
      $sqli = mysqli_query($con, 'select * from exportbook_tb 
                            where Active_book = 1 group by IDuser_exbook');
    $row = mysqli_num_rows($sqli);
    // echo $row;
    $geralbooks =number_format(count($arr5)+count($arr3)+count($arr5)+count($arrR)+count($arr8));
//   print_r($geralbooks);
//    $fmat_genaral = number_format($geralbooksal);   
    $total['numask'] = $row;
    $total['totalbk'] =  number_format(count($bcode)); /// หนังสือทั้งหมด
    $ftotal =  number_format(count($arrF));
    $park =  $ftotal."/".$geralbooks;
    $total['totalFbk'] =   $park; // นิยายและนวนิยายทั้งหมด
    $fmateducThai =   count($arr1); // ตำราไทย
    $fmateducEng =   count($arr2); // ตำราไทย
    $fmatnumuser; /// สมาชิกทั้งหมด
    $total['totaledu'] = number_format($fmateducThai + $fmateducEng);
    $total['totaluser'] = $fmatnumuser;
    // echo  $sum;
    $arrjson[] = $total;
   echo json_encode($arrjson);
} 
function func_error($errorCode ){
    $error[] = $errorCode;
    echo json_encode($error);
}    
?>