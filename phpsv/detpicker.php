<?php 


include('../connectdata/cnectDB.php');
date_default_timezone_set("Asia/Bangkok");	
	$datNow = date("Y-m-d");
//
//$day7 = "7"; // แทนค่า จำนวนวันที่ยืม
//$chk_1 = "FI";	//รับค่า ajx แทนค่าหนังสือที่   (ยืมได้ 7 วัน) - (ยืมได้กี่วัน 3 วัน) - (เด้งป๊อบอัพให้ยืมได้และกำหนดวันคืน) - 
//$class = "8";
///  เช็ค คุณสมบัติผู้ยืม ยืมได้กี่วัน  // กับหนังสือสามารถยืมได้กี่วัน
// $_POST['iptValIDBook']= "211791";
// $_POST['iptValIDU']= '123';
// $_POST['iptClass']= 7;
// $_POST['clickYes'] = '1';
// $_POST['strpage'] = 1;
if(isset($_POST['iptValIDBook']))
			{
				$strpage		= $_POST['strpage'];
				$iptValIDBook	= $_POST['iptValIDBook'];
				$iptValIDU		= $_POST['iptValIDU'];
				$iptClass		= $_POST['iptClass'];
				$bookLimit  = $_POST['clickYes'];
							
				// echo $strpage."//". $iptValIDBook ."//". $iptValIDU."//". $iptClass."//". $bookLimit;
					checkMyLimitbook($iptValIDU, $iptValIDBook, $iptClass, $bookLimit, $strpage);
				
				
			/*	$iptValIDBook 	=  "100020";
				$iptValIDU		=  "02125";
				$iptClass		= "8";*/
/// ฟังก์ชั่นเริ่มต้อน รับค่าจาก ajax			
/*echo $iptClass;
echo $iptValIDBooks;*/
//echo $bookLimit;
			}
			
			
	/// ฟังก์ชั่นเริ่มต้อน รับค่าจาก ajax
			
function checkMyLimitbook($iptValIDU, $iptValIDBook, $iptClass, $bookLimit, $strpage){
	//echo $iptValIDBook;
	/*echo $bookLimit;*/
	/*echo $iptClass;*/
	/*$iptValIDBook 	= $iptValIDBook ;
	$iptValIDU		= $iptValIDU;
	$iptClass		= $iptClass;*/	
		include('../connectdata/cnectDB.php');
						
							//หาค่า ลิมิตเกินจำนวน
		$data = 'SELECT * FROM exportbook_tb ';
		$data2 = 'WHERE IDuser_exbook= "'.$iptValIDU.'" AND Active_book = 1';
		$chk_line = 'WHERE ID_ex_barcodebook = "'.$iptValIDBook.'" AND Active_book = 1';
		$chk_line_idu = 'WHERE ID_ex_barcodebook = "'.$iptValIDBook.'" AND IDuser_exbook = "'.$iptValIDU.'" AND Active_book = 1';
		$data_real = $data.$data2;
		
		$datacheck = $data.$chk_line;
		$chk_exbook = $data.$chk_line_idu;
		$query_chk = mysqli_query($con,$chk_exbook);
		$arr_rowchkbook = mysqli_num_rows($query_chk);//หาค่าผู้ยืมหนังสือมีไอดีตรงกันหรือไม่
		 $query_line = mysqli_query($con,$data_real);
		
		 $query_checkbook = mysqli_query($con,$datacheck);
													
									$result = mysqli_fetch_assoc($query_line);// หาค่า ไอดีผู้ที่ยืม ว่าเกินจำนวนที่ให้ยืมหรือไม่
									$result_row = mysqli_num_rows($query_line);// จำนวน คอลั้มที่เจอ
									
									/*echo $result_row;*/
									$chk_idbook = mysqli_num_rows($query_checkbook);
									$name = mysqli_fetch_array($query_checkbook);
									$nameuser = $name['IDuser_exbook'];
		
		$data_2 = mysqli_query($con, 'SELECT * FROM orderbook_tb
													WHERE IDbook_order= "'.$iptValIDBook.'" AND Active_order = 1' );
		$data_3 = mysqli_query($con, 'SELECT * FROM orderbook_tb
													WHERE IDbook_order= "'.$iptValIDBook.'" AND Active_order = 1
															AND IDuser_order = "'.$iptValIDU.'"' );
															
									$chk_act = mysqli_num_rows($data_3);
									
									$query = mysqli_num_rows($data_2);// หาค่าว่าหนังสือถูกจองหรือไม่
									//echo $query."//";
		$sqli_chk_book = mysqli_query($con, 'select BARCODE from regis_books_tb 
											where BARCODE = "'.$iptValIDBook.'"');
									$chk_data_row = mysqli_num_rows($sqli_chk_book);
				/*echo $bookLimit;*/
		
				if($chk_data_row == 0)//เช็คว่ามีหนังสือจริง หรือรหัสเลขบาร์โค้ดไม่ถูกต้อง
				{
						/*echo "ไม่พบหนังสือ/เลขบาร์โค้ดไม่ถูกต้อง";*/
						echo "1";
									
								}else{
										if($chk_idbook == 1)// เช็คว่าหนังสือมีคนยืมหรือยัง
											{
												/*echo "หนังสือถูกยืมไปแล้ว//หรือมีคนยืม";*/
												if($arr_rowchkbook == 1)//เช็คว่าไอดีผู้ยืมมีในตารางยืมหรือไม่
													{
														echo "2";//ไอดีผู้ยืม กับในตารางยืมตรงกันหรือไม่เพื่อรันหน้าต่างคืน
														}else{
															echo "5";
															}
												
											}
											else
												{
													if($result_row >= 5)//เช็คจำนวนไม่เกิน 5 เล่ม
														{
															/*echo "จำนวนหนังสือครบ 5 เล่ม";*/ /// ต้องวนกลับไปถามว่าต้องการทำต่อหรือไม่
															echo "3";
															if($bookLimit == 0) //เงื่อนไขถ้าต้องการจะยืมหนังสือต่อหรือไม่หลังครบจำนวน 5 รายการ
																{
																	mysqli_close($con);
																	}else{
																		echo"test";
																		if($strpage == 1){
																				$sum_num = $result_row;
																				chk_Type($iptValIDU, $iptValIDBook, $iptClass, $sum_num);
																			}else{
																				echo "35";
																				}
																		
																		}//if($statbook == 0) //เงื่อนไขถ้าต้องการจะยืมหนังสือต่อหรือไม่หลังครบจำนวน 5 รายการ
															
															}else
																{						
																	$sum_num = $result_row;
																
																	if($query >= '1' )//เช็คหนังสือถูกจองหรือยัง เงื่อนไขถ้า ไอดีหนังสือและ ค่าactive=1 แสดงว่าหนังสือมีคนจองให้ตรจสอบเงื่อนไขต่อไป
																		{
																			//echo "หนังสือถูกจองไม่สามารถยืม หรือ ต่อได้";
																									
																			if($chk_act == 1)//ตรวจสอบว่า ไอดีผู้ยืม กับ ไอดีหนังสือ และค่าactive=1 หรือไม่ ถ้าตรงทั้ง 3 เงื่อนไขให้สามารถยืมได้
																				{
																					if($strpage == 1){
																							chk_Type($iptValIDU, $iptValIDBook, $iptClass, $sum_num);
																							// updatActiveOrder($iptValIDU, $iptValIDBook);
																						}else{																							
																								echo "35";	
																						}
																					}else{
																						
																						//echo "4";//ไม่ตรงทั้ง 3 เงือนไขให้แสดงว่าหนังสือมีคนจอง	
																						Func_chkdateOrder($con, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);																	
																						}
																			
																			}else{
																					if($iptValIDU == '') // เช็คค่าว่างไอดีผู้ยืม หากว่างไม่ให้ยืมหนังสือ
																									{
																										echo "99";
																												}else{																													
																														//echo "เข้าเงื่อนไขทุกอย่าง";	
																										if($strpage == 1){						
																											chk_Type($iptValIDU, $iptValIDBook, $iptClass, $sum_num);
																										}else{
																											echo "35";
																											}
																										}// if($iptValIDU == '') // เช็คค่าว่างไอดีผู้ยืม หากว่างไม่ให้ยืมหนังสือ			
																				}//else ($query == 1)
																}// else  if($result['Limit_book']== 5)
																
												}// else if($chk_idbook == 1) //เช็คหนังสือถูกยืม หรือ มีการยืมซำ้รายการเดิม
								} //if($chk_data_row == 0)//เช็คว่ามีหนังสือจริง หรือรหัสเลขบาร์โค้ดไม่ถูกต้อง
		
}
function Func_chkdateOrder($con, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
	$datOrder = mysqli_query($con, 'select * from orderbook_tb
											where IDbook_order= "'.$iptValIDBook.'" and Active_order = 1');
	while($result = mysqli_fetch_array($datOrder)){
		
		//echo $result['IDuser_order']."//".$result['order_day']."<pre>";
		$aday = strtotime(date("Y-m-d"))."<pre>";
		
		//echo $aday;
		$Lday = strtotime($result['order_day']);
		
		if($Lday >= $aday){// ถ้าวันที่ผู้จองในฐานข้อมูล มากกว่าวันปัจจุบัน(มีคนยืมหนังสือ)ให้ แสดง echo 4
			//echo $result['IDuser_order']."//".$result['order_day']."<pre>";
			$stut = "4";
			}else{
				//อัพเดตวันที่ผู้จองในฐานข้อมูล ที่น้อยกว่าวันปัจจุบัน(มีคนยืมหนังสือ)
				
						$update = mysqli_query($con, "update orderbook_tb set Active_order = 0 
						where IDuser_order = '".$result['IDuser_order']."' and IDbook_order = '".$result['IDbook_order']."' and Active_order = 1");
				}
		//echo $Lday."<pre>";; IDbook_order
		}
		echo $stut;
	}
/*------------------------------------------------------------------------------------------คำสั่งหาวันที่คืนล่วงหน้า ใช้งานได้---------------------------------------------------------------------*/
function chk_Type($iptValIDU, $iptValIDBook, $iptClass, $sum_num){
	include('../connectdata/cnectDB.php');
	/*echo $iptValIDBook;
	echo $iptValIDU;
	echo $iptClass;*/
	$iptValIDU = $iptValIDU; //$_POST['iptValIDU'];
	$class = $iptClass; //$_POST['iptClass'];
	$sqli = mysqli_query($con, "select * from book_store_tb as d1 inner join  regis_books_tb as d2 on 
											(d1.IDLIKBOOK = d2.IDLIKBOOK) where BARCODE = '".$iptValIDBook."'");
	$result = mysqli_fetch_assoc($sqli);
	$GMD =  $result['GMDCODE'];
			$set_day7 = array('FI','CD','PK','80','GP','VI','TH');
			$set_dayNO = array('R','JT','JE','JO'); //ยืมไม่ได้และต้องเด้งปอบอัพให้ยืมได้และกำหนดวันคืน
			//$day7 = "7"; // แทนค่า จำนวนวันที่ยืม
			$chk_1 = $GMD ;  //"FI";	//รับค่า ajx แทนค่าหนังสือที่   (ยืมได้ 7 วัน) - (ยืมได้กี่วัน 3 วัน) - (เด้งป๊อบอัพให้ยืมได้และกำหนดวันคืน) - 
			
			if(in_array($chk_1,$set_day7) && $class <= "8")  //ยืมได้ 7 วัน
					{
						//echo "ประเภทสื่อ FI','CD','PK','80','GP','VI','TH ทุกคนยืมได้ 7 วัน///";
						$datDay = "7";						
						/*echo "เท่ากับ F ยืมได้ 7 วัน";*/
						$datDay = "7";
						upDate($datDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
						}
						else if($chk_1 == "TE" && $class <= "7")
						{
							//echo "ประเภทสื่อ TE ระดับต่ำ <=7 ยืมได้ 7 วัน";
							$datDay = "7";
							upDate($datDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
						}
						else if($chk_1== "TE" && $class == "8")
						{
							/*echo "ประเภทสื่อ textbook TE ตำแหน่งอาจารย์หมอได้ 14 วัน";*/
							$datDay = "14";	
							upDate($datDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
						}
						else if($chk_1== "MZ" && $class <= "8")
						{
							//echo "ประเภทสื่อ MZ ทุกคนยืมได้ 3 วัน";
							$datDay = "3";
							upDate($datDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
						}
						else if(in_array($chk_1,$set_dayNO)) //ยืมไม่ได้และต้องเด้งปอบอัพให้ยืมได้และกำหนดวันคืน               /// เงื่อนไขที่ต้องทำ  2
						{
							//echo "ประเภทสื่อ elseif setdayNO และ ปอปอัพถามว่าให้ยืมหรือไม่ให้พร้อมกำหนดวันคืนเอง";
							echo "NO";
							$not_fix = "NO";
						}
			
			///else if if($_POST['class_Position']<= 7)
	//}//if(isset($_POST['IDUSERCODE']))

	}
/// --------------------------------ฟังก์ชั่น ตรวจเช็ตวันหยุดที่กำหนดในตาราง--------------------------------------------------------------------
function chk_DateTime($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){		
		include('../connectdata/cnectDB.php');
		/*echo $Lday;
		echo $thenDay;*/
		// echo $iptValIDU;		
		$sqli = mysqli_query($con,"select * from datpicker_tb where datpicker = '".$Lday."'");
		$result_row = mysqli_num_rows($sqli);
		//echo $result_row;
		if($result_row == 0)
			{
				/*echo $sum_num."ไม่มีค่า อินเซิร์ดข้อมูลได้";*/  
				chkUpdate_orderTwo($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num); 
				                                                                         /// เงือนไขการ insert ข้อมูล
				}else // else $result_row == 0
					{
						$sqli_picker = mysqli_query($con,"select * from datpicker_tb 
															where datpicker between '".$Lday."' and '".$thenDay."'");
						$result_num = mysqli_num_rows($sqli_picker);
							while($arr = mysqli_fetch_array($sqli_picker))
									{
										$arr_picker[] = $arr['datpicker'];
									}
									/*print_r($arr_picker);*/
							foreach($arr_picker as $valdata)
									{
										while (strtotime($Lday) <= strtotime($valdata)) 
											{										
												$Lday = date ("Y-m-d", strtotime("+1 day", strtotime($Lday)));
												/*print_r($Lday);*/
												$set_arr[] = $Lday;
												
												/*print_r($arr_picker);*/
												}
									}
										/*print_r($set_arr);*/
										/*print_r($arr_picker);*/
										$full_arr = array_merge($set_arr,$arr_picker);
										/*print_r($full_arr);
										if($coUnt = count($full_arr))
											{
												echo $coUnt;
												}
										*/
       								 $output_array = array();
									/*print_r($full_arr);*/
       						 foreach (array_count_values($full_arr)as $key => $value)
							 		 {
									/*print_r($key);*/
									/*print_r($value);*/
										if($value==1)
											{
												array_push($output_array, $key);
										}
									}
			/*print_r($output_array);*/ 
			$detLine_Day = $output_array[0];
			/*echo "มีค่าเท่ากับ ให้บวกวันเพิ่มเป็น==>";
			echo $detLine_Day;*/
			chkUpdate_order($Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num); 
			
		}// end else if $result_row == 0 
	/*echo $detLine_Day; *//// แสดงค่าวันที่ ที่คำนวนเงื่อนไขวันหยุดที่กำหนดในตาราง datpicker
		

	}// funtion
function chkUpdate_order($Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
		include('../connectdata/cnectDB.php');
				$sqli_order = mysqli_query($con, 'select * from orderbook_tb as d1
				inner join user_tb as d2 on(d1.IDuser_order = d2.IDUSERCODE)
				where Order_book = (select min(Order_book) from orderbook_tb
					where IDbook_order = "'.$iptValIDBook.'" and Active_order = 1) 
					and d1.IDbook_order = "'.$iptValIDBook.'" 
					and d1.Active_order = 1');
		$result = mysqli_fetch_array($sqli_order);
		$iduser_tb = $result['IDuser_order'];
		$idorder_tb = $result['IDorder_tb'];
		// echo $iptValIDU;
		if($iduser_tb == $iptValIDU){
			//  ไอดีตรงกันยืมได้
			fun_updateorder_active_one($con, $idorder_tb, $Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
		}else{
			//ค่าว่าง
			Insert_tb_exportbook($Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
		}


	}
function fun_updateorder_active_one($con, $idorder_tb, $Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
	$updatOrder = mysqli_query($con, "update orderbook_tb set Active_order = 0, Active_input = 0 
									where IDorder_tb = '".$idorder_tb."'");
	if(!$updatOrder){
		echo "error  fun_updateorder_active";
	}else{
		Insert_tb_exportbook($Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
	}
}
	//--------------------------------------------ฟังก์ชั่น บวกวันเพิ่ม---------------------------------------------------------------------------------------
function upDate($datDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
		/*$datDay = "5";*/
		date_default_timezone_set("Asia/Bangkok");	
		$datNow = date("Y-m-d");
		//echo $datDay."||";
		$date = date_create($datNow);
					date_modify($date, '+ '.$datDay.' day');
					$Lday =  date_format($date, 'Y-m-d');
		//$Lday = date("Y-m-d",strtotime("+ ".$datDay." day"));
		$thenDay = date("Y-m-d",strtotime("+ 30 day"));
		
		//echo $Lday;
		chk_DateTime($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
		
		return;
	}	
	/*upDate($datDay);*/
	
function chkUpdate_orderTwo($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
		include('../connectdata/cnectDB.php');
				$sqli_order = mysqli_query($con, 'select * from orderbook_tb as d1
				inner join user_tb as d2 on(d1.IDuser_order = d2.IDUSERCODE)
				where Order_book = (select min(Order_book) from orderbook_tb
					where IDbook_order = "'.$iptValIDBook.'" and Active_order = 1) 
					and d1.IDbook_order = "'.$iptValIDBook.'" 
					and d1.Active_order = 1');
		$result = mysqli_fetch_array($sqli_order);
		$iduser_tb = $result['IDuser_order'];
		$idorder_tb = $result['IDorder_tb'];
		// echo $iptValIDU;
		if($iduser_tb == $iptValIDU){
			//  ไอดีตรงกันยืมได้
			fun_updateorder_activeTwo($con, $idorder_tb, $Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
		}else{
			//ค่าว่าง
			Insert_tb_exportbookTwo($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
		}


	}
function fun_updateorder_activeTwo($con, $idorder_tb, $Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num){
	$updatOrder = mysqli_query($con, "update orderbook_tb set Active_order = 0, Active_input = 0 
									where IDorder_tb = '".$idorder_tb."'");
	if(!$updatOrder){
		echo "error  fun_updateorder_active";
	}else{
		Insert_tb_exportbookTwo($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num);
	}
}
/*------------------------------------------ฟังก์ชั่น---insert ข้อมูลผ่านไม่ผ่านการบวกเพิ่มวันหยุดแล้ว-------------------------------------------------------*/	
function Insert_tb_exportbookTwo($Lday, $thenDay, $iptValIDU, $iptValIDBook, $iptClass, $sum_num)
						{
							//print_r($Lday);
							include('../connectdata/cnectDB.php');
							date_default_timezone_set("Asia/Bangkok");
							$nowDay = date("Y-m-d");
							$str = '("'.$iptValIDU.'","'.$iptValIDBook.'","'.$nowDay.'","'.$sum_num.'","'.$Lday.'","1","0")';
							$sqliInsert = mysqli_query($con,"insert into exportbook_tb
							
										(IDuser_exbook,ID_ex_barcodebook,Day_start,Limit_book,Day_end,Active_book,Active_fines)
										values$str");
							
							/*$result = mysqli_query($con,$sqliInsert) or die ("Error in query: $sqliInsert " . mysqli_error());*/
							if($sqliInsert)
									{
										echo "insert successfullyx";
										}else{
												/*echo $Lday."<br>";
												echo $thenDay."<br>";
												echo $detLine_Day."<br>";
												echo $iptValIDU."<br>";
												echo $iptValIDBook."<br>";
												echo $iptClass."<br>";
												echo $sum_num."<br>";*/
												echo "error Insert_tb_exportbookTwo ";
											
											}
								mysqli_close($con);
							}
		/*----------------------------------------------------insert ฟังก์ชั่น---insert ข้อมูลผ่านการบวกเพิ่มวันหยุดแล้ว--------------------------------------------------------*/					
function Insert_tb_exportbook($Lday, $thenDay, $detLine_Day, $iptValIDU, $iptValIDBook, $iptClass, $sum_num)
						{
							include('../connectdata/cnectDB.php');
							date_default_timezone_set("Asia/Bangkok");
							$nowDay = date("Y-m-d");
							$str = '("'.$iptValIDU.'","'.$iptValIDBook.'","'.$nowDay.'","'.$sum_num.'","'.$detLine_Day.'","1","0")';
							$sqliInsert = mysqli_query($con,"insert into exportbook_tb
							
										(IDuser_exbook,ID_ex_barcodebook,Day_start,Limit_book,Day_end,Active_book,Active_fines)
										values$str");								
							/*$result = mysqli_query($con,$sqliInsert) or die ("Error in query: $sqliInsert " . mysqli_error());*/
							if($sqliInsert)
									{
										echo "insert successfullys";
										}else{
												/*echo $Lday."<br>";
												echo $thenDay."<br>";
												echo $detLine_Day."<br>";
												echo $iptValIDU."<br>";
												echo $iptValIDBook."<br>";
												echo $iptClass."<br>";
												echo $sum_num."<br>";*/
												echo "error insert database Insert_tb_exportbook";
											
											}
								mysqli_close($con);
							}
	
	
// function updatActiveOrder($iptValIDU, $iptValIDBook){
// 	include('../connectdata/cnectDB.php');
// 	 $sqli = mysqli_query($con, "update orderbook_tb set Active_order = 0 where IDuser_order = '".$iptValIDU."'
// 	 							and IDbook_order = '".$iptValIDBook."' and Active_order = 1");
// 	}
	
	/*postText($iptValIDBook, $classPosition);*/
/*-------------------------------------------------------------ทดสอบคำสั่ง----------------------------*/
/*$set_day7 = array('TE','CD','PK','FI','80','GP','VI','TH');
$set_dayNO = array('R','JT','JE','JO');


$chk_1 = "FI";
if($chk_1 == "FI")
{
	echo "เท่ากับ FI";
	}
	else if(in_array($chk_1,$set_day7))
	{
		echo "เท่ากับ in_array(chk_1,set_day7";
	}
	else if(in_array($chk_1,$set_dayNO))
	{
		echo "เท่ากับ elseif setdayNO";
	}
*/


?>