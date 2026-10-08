<?php 
include('../connectdata/cnectDB.php');
/*$text = "02125";
$idbk = "211791";*/
if(isset($_POST['iptValIDBook']))
	{
	$idbook = $_POST['iptValIDBook'];
	$select = mysqli_query($con, 'select * from exportbook_tb
												where ID_ex_barcodebook = "'.$idbook.'"
												and Active_book = 1 ');
	$result = mysqli_fetch_assoc($select);
	$idu = $result['IDuser_exbook'];
	$Dstart = $result['Day_start'];
	$Dend = $result['Day_end'];
		//echo $idbook;
	$mysqli = mysqli_query($con, "update exportbook_tb set Active_book = 0, Active_fines = 0
											where ID_ex_barcodebook = '".$idbook."'
												and Active_book = 1 ");
	INsertDataSQL_Importbook($idbook, $idu, $Dstart, $Dend);
	}



function INsertDataSQL_Importbook($idbook, $idu, $Dstart, $Dend)
	{
		include('../connectdata/cnectDB.php');
		$insert = mysqli_query($con, "INSERT INTO importbook_tb(IDuser_import, IDbook_import, DayStart, DayEnd, Day_sendbook) 
								VALUES ('".$idu."','".$idbook."','".$Dstart."','".$Dend."','".date("Y-m-d")."')");
		if(!$insert)
			{
				echo "NO Success";
				}else{
					//echo $idbook;
					ShowDataList_importbook($idbook, $idu, $Dstart, $Dend);
					
					}
		}



function ShowDataList_importbook($idbook, $idu, $Dstart, $Dend)
	{
		include('../connectdata/cnectDB.php');
		$query_show = mysqli_query($con, 'select * from user_tb as d1
									inner join importbook_tb as d2 on (d1.IDUSERCODE = d2.IDuser_import)
									inner join regis_books_tb as d3 on (d2.IDbook_import = d3.BARCODE )
									inner join book_store_tb as d4 on (d3.IDLIKBOOK = d4.IDLIKBOOK)
									where IDuser_import = "'.$idu.'" and IDbook_import = "'.$idbook.'" and Day_sendbook = "'.date("Y-m-d").'" and IDimport_book = (select max(IDimport_book) from importbook_tb
									where IDuser_import = "'.$idu.'" and IDbook_import = "'.$idbook.'" and Day_sendbook = "'.date("Y-m-d").'")');
											
											
				while($arr_feld = mysqli_fetch_array($query_show))
					{
						
						$array['Fname'] 				= $arr_feld['FNAME'];
						$array['Lname']				= $arr_feld['LNAME'];
						$array['pathpic']			  =$arr_feld['IMAGEFILE'];
 						$array['position'] 			 = $arr_feld['POSITION'];
						$array['idu']				  = $arr_feld['IDUSERCODE'];
						$array['idbk']				 = $arr_feld['IDbook_import'];
						$array['cat']				  = $arr_feld['CATBOOK'];
						$array['bynum']				 = $arr_feld['BYNUM'];
						$array['dstary']			   = $arr_feld['DayStart'];
						$array['dend']			 	 = $arr_feld['DayEnd'];
						$array['namebook']			 = $arr_feld['NAME_BOOK'];
						$array['rankclass']			 = $arr_feld['RangClass'];
						$arr_data[] = $array;
						//print_r($arr_data);
						}								
		 echo json_encode($arr_data);
		
		}		
		
?>























