<?php
include('php_connect_toAWS.php');
  $connect = connect_sqli();
   $sqli = mysqli_query($connect,"select * from TB_Filed_List");
 while($result = mysqli_fetch_array($sqli)){
    echo "<pre>";
    print_r($result);
   
 }


?>