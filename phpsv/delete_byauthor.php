<?php 
include('../connectdata/cnectDB.php');

	 if(isset($_POST['idbyauthor'])){
			$idlinks = $_POST['idlinks'];
				/*echo $idlinks;
				echo $_POST['idbyauthor'];*/
						//ให้ลบข้อมูลออกจากฐานข้อมูล
								$sqli = mysqli_query($con, "delete from athor_cat_tb
								where LINK = '".$idlinks."' and LINK_athor ='".$_POST['idbyauthor']."'");
							}

 ?>