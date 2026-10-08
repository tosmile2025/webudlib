<?php
connect_sqli();
function connect_sqli(){
    $host = "mysqlmeetbud.cpqe2w8eq1nx.us-east-1.rds.amazonaws.com";
    $user = "admin";
    $pass = "Guscha0894391723";
    $dbname = "TB_list_export";

    $con = mysqli_connect($host, $user, $pass,  $dbname);
    mysqli_query($con, "SET NAMES 'utf8' ");
    error_reporting(error_reporting() & ~E_NOTICE);
    /*$sqli = mysqli_query($con,"select * from TB_Filed_List");
 while($result = mysqli_fetch_array($sqli)){
    echo "<pre>";
    print_r($result);
   
 }*/
return $con;
}
// connect_sqli_new();
function connect_sqli_new(){
    // Example (MySQLi Object-oriented)
    $host = "mysqlmeetbud.cpqe2w8eq1nx.us-east-1.rds.amazonaws.com";
    $user = "admin";
    $pass = "Guscha0894391723";
    $dbname = "TB_list_export";
    
    $conn = new mysqli($host, $user, $pass, $dbname);
    $conn->set_charset('utf8');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
     
    $sql = "SELECT * FROM TB_Filed_List";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<pre>";
        print_r($row);
      }
}
