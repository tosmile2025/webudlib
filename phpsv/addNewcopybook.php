<?php 
include('../connectdata/cnectDB.php');

	if(isset($_POST['arr_txt'])){
       
        $data = $_POST['arr_txt'];
   /* echo "<pre>";
       print_r($data);*/
      $update = mysqli_query($con, "update regis_books_tb set SUPCODE='".$data[10]."',Price_book = '".$data[9]."',CODE_REGIS = '".$data[0]."',
        CATBOOK = '".$data[4]."',byauthor = '".$data[5]."',
        LOANSTATUS = '".$data[1]."',status_text = '".$data[7]."',Dat_regis = '".$data[3]."',COPPYNUM = '".$data[6]."',STWORK = '".$data[11]."',
        department = '".$data[12]."',
        Centimeters= '".$data[13]."'
            where BARCODE = '".$data[0]."'");
      if(!$update){           
        $arrerror['error'] = 'str01rgis'; 
      }else{
        if($data[8] ==""){
          $arrerror['error'] = 'success'; 
          }else{
                $slc = mysqli_query($con, 'select * from athor_main_tb where blink_athor = "'.$data[2].'"');
                $row = mysqli_num_rows($slc);
                if($row > 0){
                  // update
                  $up = mysqli_query($con, "update athor_main_tb set blink_athor ='".$data[0]."'
                                        where blink_athor = '".$data[2]."'");
                }else{
                    
                $escap_namebk = mysqli_real_escape_string($con, $data[8]);
                $str = '("M","'.$data[0].'","'.$escap_namebk.'")';
                $insert_eathor = mysqli_query($con, "insert into athor_main_tb(TYPE,blink_athor,detail_athormain_tb)
                                                values$str");
                if(!$insert_eathor){
                    $arrerror['error'] = 'str02insert'; 
                }else{
                    $arrerror['error'] = 'successfully'; 
                }
                    }

          }
      
      }
     echo json_encode($arrerror);  
    }  		
?>