<?php 
include('../connectdata/cnectDB.php');
//  $_POST['txtScheach'] = '1234';
if(isset($_POST['txtScheach'])){
	
	$txtScheach = $_POST['txtScheach'];


	if($txtScheach == ''){
		Nodata($con);
	}else{
		Seach_data($con, $txtScheach);
	}
		
}
function 	Nodata($con){
				$sqli = mysqli_query($con, 'select * from user_tb as d1
				inner join exportbook_tb as d2 on(d1.IDUSERCODE = d2.IDuser_exbook)
				inner join regis_books_tb as d3 on(d2.ID_ex_barcodebook = d3.BARCODE)
				inner join book_store_tb as d4 on (d3.IDLIKBOOK = d4.IDLIKBOOK)
				where d2.Active_book = 1 order by d1.IDUSERCODE desc limit 50');
				while($result = mysqli_fetch_array($sqli)){
				$arr['IDuser'] 		= $result['IDUSERCODE'];
				$arr['Fname']		 = $result['FNAME'];
				$arr['Lname']		 = $result['LNAME'];
				$arr['Barcode']	   = $result['BARCODE'];
				$arr['Namebook']	  = $result['NAME_BOOK'];
				$arr['Year_book']	  = $result['Year_book'];
				$arr['Lastinport']	= $result['Day_end'];
				$arr_json[] = $arr;
				}					

				/*echo "<pre>";
				print_r($arr_json);*/
				echo json_encode($arr_json);

}
function Seach_data($con, $txtScheach){
	//   echo $txtScheach;
					$sqli = mysqli_query($con, 'select * from user_tb as d1
					inner join exportbook_tb as d2 on(d1.IDUSERCODE = d2.IDuser_exbook)
					inner join regis_books_tb as d3 on(d2.ID_ex_barcodebook = d3.BARCODE)
					inner join book_store_tb as d4 on (d3.IDLIKBOOK = d4.IDLIKBOOK)
					where d1.IDUSERCODE regexp "'.$txtScheach.'" or d1.FNAME regexp "'.$txtScheach.'"
					or d1.LNAME regexp "'.$txtScheach.'"');
							
				while($result = mysqli_fetch_array($sqli)){
					if($result['Active_book'] = 1){
						$arr['IDuser'] 		= $result['IDUSERCODE'];
						$arr['Fname']		 = $result['FNAME'];
						$arr['Lname']		 = $result['LNAME'];
						$arr['Barcode']	   = $result['BARCODE'];
						$arr['Namebook']	  = $result['NAME_BOOK'];
						$arr['Year_book']	  = $result['Year_book'];
						$arr['Lastinport']	= $result['Day_end'];
						$arr_json[] = $arr;
					}
				
				}	
				// echo "<pre>";
				//  print_r($arr_json);
				 echo json_encode($arr_json);
			// 	$search_path = array_search_id('211792', $arr_json, array('$'));
 			// print($search_path);
			}
	

// PHP program to carry out multidimensional array search
  
  
// Function to recursively search for a given value
function array_search_id($search_value, $array, $id_path) {
	// print_r($id_path);
    if(is_array($array) && count($array) > 0) {
          
        foreach($array as $key => $value) {
		
            $temp_path = $id_path;
              
            // Adding current key to search path
            array_push($temp_path, $key);			
            // Check if this value is an array
            // with atleast one element
            if(is_array($value) && count($value) > 0) {	
						
                $res_path = array_search_id(
                        $search_value, $value, $temp_path);
						
                if ($res_path != null) {
                    return $res_path;
                }
            }
            else if($value == $search_value) {
				/*echo "<pre>";
				 print_r($array);	*/
               return show($array);
            }
        }
    }
      
    return null;
}
 function show($array){
	echo "<pre>";
	print_r($array);	
 } 

?>