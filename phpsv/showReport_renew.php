<?php 
	include('../connectdata/cnectDB.php');
	//$_POST['key'] = 'R';
	$_POST['txt'] ="";
	if(isset($_POST['txt'])){
		$a = $_POST['statDay'];
		$b = $_POST['EndDay'];       
	//echo $k;
	 // echo $val;
    //  echo $a;
    //  echo $b;
		 if($a == ''){
                shows($con);
           } else if($a != '' and  $b != ''){
                        //echo "test TE";
                Search_Data($con, $a, $b);
          } 
		}
function shows($con){
			$mysqli = mysqli_query($con, 'select * from tb_countrenewbk as d1
                                          inner join regis_books_tb as d2 on(d1.IDBK_re = d2.BARCODE)
										  inner join book_store_tb as d3 on(d2.IDLIKBOOK = d3.IDLIKBOOK) 
                                          order by d1.IDrenew desc limit 50');								 
			while($result = mysqli_fetch_array($mysqli)){
                            $arr['codename'] = $result['userID_re'];		
							$arr['bc'] = $result['BARCODE'];
							$arr['name'] = $result['NAME_BOOK'];												
							$arr['catbk'] = $result['Catbook_store'];
							$arr['year'] = $result['Year_book'];                                                 
                            $arr['dayrenew'] = date("Y-m-d", strtotime($result['Day_re'])); 
							$json[] = $arr;
				}            
				echo json_encode($json);
	}   
function Search_Data($con, $a, $b){
    //  echo $a."//".$b;
          $mysqli = mysqli_query($con, "select * from tb_countrenewbk as d1
          inner join regis_books_tb as d2 on(d1.IDBK_re = d2.BARCODE)
          inner join book_store_tb as d3 on(d2.IDLIKBOOK = d3.IDLIKBOOK)                     
                    where date_format(Day_re, '%Y-%m-%d') between   '".$a."' and  '".$b."'");
			$numrow = mysqli_num_rows($mysqli);	
							 
			while($result = mysqli_fetch_array($mysqli)){            
						    $arr['codename'] = $result['userID_re'];		
							$arr['bc'] = $result['BARCODE'];
							$arr['name'] = $result['NAME_BOOK'];												
							$arr['catbk'] = $result['Catbook_store'];
							$arr['year'] = $result['Year_book'];
                            $arr['dayrenew'] = $result['Day_re'];
						    $arr['num'] = $numrow;
						$json[] = $arr;
				}
			// echo "<pre>";
			// print_r($json);
			 echo json_encode($json);
	}	
	
	
?>
