<?php 
	include('../connectdata/cnectDB.php');	
if(isset($_POST['iptValIDBook']))
{
				$countnum = $_POST['ipt_daycount'];
				$iptValIDBOOKS = $_POST['iptValIDBook'];
				$iptValIDUS = $_POST['iptValIDU'];
				$ipt_dayorder = $_POST['ipt_dayorder'];
	if($_POST['status']== 1)
		{
				//echo $_POST['status'];
				/*echo $countnum;*/
				/*echo $countnum = 1;*/
				/*updateDay($iptValIDBOOKS, $iptValIDUS);*/
				/*chkexbook($iptValIDUS, $iptValIDBOOKS);*/
				inSertSQL($ipt_dayorder, $iptValIDBOOKS, $iptValIDUS, $countnum, $con);
				//echo"test-if";
				}else{
					//echo"else";
						ShowDataList_Orderbooks($iptValIDUS, $con);
		
					}
}

function inSertSQL($ipt_dayorder, $iptValIDBOOKS, $iptValIDUS, $countnum, $con){
	/*echo $ipt_dayorder."//";
	echo $iptValIDBOOKS."//";
	echo $iptValIDUS."//";
	echo $countnum;*/	
	$str ='("'.$iptValIDUS.'","'.$iptValIDBOOKS.'","'.$countnum.'",1,"'.$ipt_dayorder.'")';
	// echo"<pre>";
	// print_r($str);
	$mysqli = mysqli_query($con, "insert into orderbook_tb(IDuser_order,IDbook_order,Order_book,Active_order,order_day)values$str");
	if(!$mysqli)
		{
			echo"error";
			mysqli_close($con);										
			}else{			
			ShowDataList_Orderbooks($iptValIDUS, $con);										
		}
									
	}	
function ShowDataList_Orderbooks($iptValIDUS, $con){
				/*$test = "test";
				echo json_encode($test);*/
	
		$sqli_show = mysqli_query($con, 'select * from book_store_tb as d1 
															inner join regis_books_tb as d2 on (d1.IDLIKBOOK = d2.IDLIKBOOK)
															inner join orderbook_tb as d3 on (d2.BARCODE = d3.IDbook_order) 
															where IDuser_order = "'.$iptValIDUS.'" and Active_order = 1
															');
									while($result = mysqli_fetch_array($sqli_show))
											{
												// $data[] = $result;
												if($result['Active_input'] == 1){
														$output['Active_input'] = $result['Active_input'];
														$output['IDuser_order'] = $result['IDuser_order'];
														$output['IDbook_order'] = $result['IDbook_order'];
														$output['Order_book'] = $result['Order_book'];
														$output['order_day'] = $result['order_day'];
														$output['NAME_BOOK'] = $result['NAME_BOOK'];
														$output['strorder'] = "1";	
														$data[] = $output;																										
													}else{
														$output['Active_input'] = $result['Active_input'];
														$output['IDuser_order'] = $result['IDuser_order'];
														$output['IDbook_order'] = $result['IDbook_order'];
														$output['Order_book'] = $result['Order_book'];
														$output['order_day'] = $result['order_day'];
														$output['NAME_BOOK'] = $result['NAME_BOOK'];
														$output['strorder'] = "0";	
														$data[] = $output;			
													}
												}
												//echo"<pre>";
												//print_r($data);
											 echo json_encode($data);
	
	}	
?>