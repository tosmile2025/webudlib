<?php
// include('../connectdata/cnectDB.php');
    $sqldata = ['circulation_book_1'];
    $user ="root";
    $pass = "lD98H7zREMObdo51";
    $host = "localhost";
    date_default_timezone_set("Asia/Bangkok");	
    if(!file_exists("c:/backupdatabase")){
        mkdir("c:/backupdatabase");
    }
    foreach($sqldata as $sqldata){
        if(!file_exists(("c:/backupdatabase/$sqldata"))){
            mkdir("c:/backupdatabase/$sqldata");
        }
        $filename = $sqldata."_".date("d-m-Y")."@".date("g_ia").uniqid("_", false);
        $folder = "c:/backupdatabase/$sqldata/".$filename.".sql";
        exec("c:/xampp/mysql/bin/mysqldump --user={$user} --password={$pass} --host={$host} {$sqldata} --result-file={$folder}", $output);
    }
    Print_r($output);
 ?>   