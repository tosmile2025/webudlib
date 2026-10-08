<?php
	include('../connectdata/cnectDB.php');
	
	//$_POST['iptValIDBook'] = "211791";
	//$_POST['iptValIDU'] = "02125";
	if(isset($_POST['iptValIDBook'])){
		$idBook = $_POST['iptValIDBook'];
			//echo "test";
			$sqli_order = mysqli_query($con, 'select * from orderbook_tb as d1
								inner join user_tb as d2 on(d1.IDuser_order = d2.IDUSERCODE)
								where Order_book = (select min(Order_book) from orderbook_tb
									where IDbook_order = "'.$idBook.'" and Active_order = 1) 
									and d1.IDbook_order = "'.$idBook.'" 
									and d1.Active_order = 1');
			$result = mysqli_fetch_assoc($sqli_order);
			$idnumorder = $result['IDorder_tb'];
			$idbooks = $result['IDbook_order'];
			$iduser = $result['IDuser_order'];
			$Fname = $result['FNAME'];
			$Lname = $result['LNAME'];
			$NumBer = $result['Order_book'];
			
			if($idbooks != ""){//เช็คหนังสือก่อนคืนว่ามีใครจองไว้หรือไม่
				
				//มีคนจอง				
				 func_updateOrder($con, $str,$idbooks,$iduser,$Fname,$Lname,$NumBer, $idnumorder);				 
				}else{
					$str = "0";
					$arr_str = array($str,$idbooks,$iduser,$Fname,$Lname,$NumBer);
					echo json_encode($arr_str);		
					}
		}
		function func_updateOrder($con, $str,$idbooks,$iduser,$Fname,$Lname,$NumBer, $idnumorder){		
		
				$updatOrder = mysqli_query($con, "update orderbook_tb set Active_input = 1 
									where IDorder_tb = '".$idnumorder."' and Active_order = 1");		
			if(!$updatOrder){
				echo "error UPdate Order Tb";
			}else{
				$str = "1";
				$arr_str = array($str,$idbooks,$iduser,$Fname,$Lname,$NumBer);
				echo json_encode($arr_str);		
			}
		}
	
?>