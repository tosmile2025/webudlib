<?php 
include('../connectdata/cnectDB.php');
//$_GET['idcode'] = '509999';
//$_GET['idlink'] = 'E50000020';
if($_POST['idcode']){
    $data = $_POST['idcode'];    
    $idlink = $_POST['idlink'];   
// echo $data;  
func_checkcode($con, $data, $idlink);   
}
function func_checkcode($con, $data, $idlink){
    // echo "tesdt";
    $mysqli = mysqli_query($con, 'select (BARCODE) from regis_books_tb
    where BARCODE = "'.$data.'"');   
    $rows = mysqli_num_rows($mysqli);
    // echo $rows;
    if($rows > 0 ){
        //return ค่าซ้ำให้หาค่าสูงสุดของเลขบารฺ์โค้ด;
        $cutstr = substr($data ,0,1); // F
        //  echo $cutstr;
         $sqli_max = mysqli_query($con, 'select max(BARCODE) as maxid from regis_books_tb 
                                         where BARCODE like "'.$cutstr.'%"');
         $result = mysqli_fetch_assoc($sqli_max);        //  echo $result['maxid']."tt";      
        $numstr = substr($result['maxid'], 1);
        $numad = "5".$numstr;
        $Zero_xx = (int)$numad+1;
        $cutnum  = substr($Zero_xx, 1);
        $sum = $cutstr.$cutnum;      
        $status['str'] = 'st1';
        $status['maxid'] = $sum;
        $status['idlink'] = $idlink;
        $arrjson[] = $status;
   echo json_encode($arrjson);	
    }else{
            //เลขบาร์โค้ดยังไม่เคยลงทะเบียน ครั้งแรกของเลขนี้
            $strVal = '("'.$idlink.'","'.$data.'")';
            $mysqli = mysqli_query($con, "insert into regis_books_tb(IDLIKBOOK,BARCODE)
                                        values$strVal");
            if(!$mysqli){
                mysqli_close($con);
            }else{
                $status['str'] = 'st3';
                $status['maxid'] = $data;
                $status['idlink'] = $idlink;
                $arrjson[] = $status;
             echo json_encode($arrjson);
                
            }
        }
}


?>