<?php
include('../connectdata/cnectDB.php');
// echo json_encode($arr);
//  $data['data'] = '1122';  
//  $_POST['data'] = '1122'; 

if(isset($_POST['data'])){
    $data =  $_POST['data'] ;
    $sqli = mysqli_query($con, 'select * from user_tb where IDUSERCODE = "' .$data. '"');  
    if($sqli){
        $result = mysqli_fetch_assoc($sqli);       
        $email[] =  $result['EMAIL'];      
        // echo $email;
        echo json_encode($email);
    }
  
}
?>