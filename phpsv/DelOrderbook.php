<?php 
	include('../connectdata/cnectDB.php');
	// $_POST['barcode'] = "212211";
	if(isset($_POST['barcode'])){
		$data = $_POST['barcode'];
		$user = $_POST['iduser'];		
		$sql_slc = mysqli_query($con, 'select * from orderbook_tb where  IDbook_order = "'.$data.'" and IDuser_order = "'.$user.'" and Active_order = 1');
		$result = mysqli_fetch_assoc($sql_slc);
			$num_order = $result['Order_book'] + 1;		  
		//  echo $num_order;
		 if($num_order !=""){		
				$sqlUpdate = mysqli_query($con, 'update orderbook_tb set Active_input = 1 
												where  IDbook_order = "'.$data.'" and Order_book  = "'.$num_order.'" and Active_order = 1');
			if($sqlUpdate){
				func_delOrder($con, $data, $user);
			}
			
		 }else{
			mysqli_close($con);
		 }
	}	
function func_delOrder($con, $data, $user){
	$del_bkstore = mysqli_query($con, 'delete from orderbook_tb
											where IDbook_order = "'.$data.'" and IDuser_order = "'.$user.'" and Active_order = 1');
		if(!$del_bkstore){
			echo "ER";
			mysqli_close($con);
			}else{
				echo "SUC";
				mysqli_close($con);
				}										
		}


?>