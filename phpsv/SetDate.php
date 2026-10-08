<?php
include('../connectdata/cnectDB.php');

// SetDate($con);
// SetDate_END($con);
function SetDate($con){   
       //input string
       $dete_Set ='';
       $result =  $con->query("select * from user_tb");
       while($row = $result->fetch_assoc()){
        $pattern  ="/";
        $replace = "-";
       $repla = str_replace($pattern, $replace, $row['MEMBSTART']);

       $date_crate = date_create($repla);
        $dete_Set = date_format($date_crate, "Y-m-d");
      //  echo "<pre>";
     //  echo "datebegin:".$row['MEMBSTART']."========>".$dete_Set;
      $arr['idTBuser'] = $row['ID_tbUsser'];
        $arr['dateBegin'] = $dete_Set;
       
       func_update($con, $arr);

       }
}
function func_update($con, $arr){
        // echo "<pre>";
        // print_r($arr);
        $update = "update user_tb_update set MEMBSTART = '".$arr['dateBegin']."' where ID_tbUsser = '".$arr['idTBuser']."'";
        if($con->query($update)=== TRUE){
         echo "Record updated successfully"."===".$arr['idTBuser'];
        } else {
          echo "Error updating record: " . $con->error;
        }
}

function SetDate_END($con){   
        //input string
        $dete_Set ='';
        $result =  $con->query("select * from user_tb");
        while($row = $result->fetch_assoc()){
         $pattern  ="/";
         $replace = "-";
        $repla = str_replace($pattern, $replace, $row['MEMBerEND']);
 //      echo "<pre>";
 //       echo $repla;
        $date_crate = date_create($repla);
         $dete_Set = date_format($date_crate, "Y-m-d");
       //  echo "<pre>";
      //  echo "datebegin:".$row['MEMBSTART']."========>".$dete_Set;
       $arr['idTBuser'] = $row['ID_tbUsser'];
         $arr['dateBegin'] = $dete_Set;
        
        func_update_END($con, $arr);
 
        }
 }
 function func_update_END($con, $arr){
         // echo "<pre>";
         // print_r($arr);
         $update = "update user_tb_update set MEMBerEND = '".$arr['dateBegin']."' where ID_tbUsser = '".$arr['idTBuser']."'";
         if($con->query($update)=== TRUE){
          echo "Record updated successfully"."===".$arr['idTBuser'];
         } else {
           echo "Error updating record: " . $con->error;
         }
 }
 




?>