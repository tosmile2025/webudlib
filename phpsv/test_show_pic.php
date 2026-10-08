<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css-style/boilerplate.css" rel="stylesheet" type="text/css">
<link href="../CSstyle/CStyle.css" rel="stylesheet" type="text/css">
<script src="../js/respond.min.js"></script>
<script src="../js/main_page.js"></script>
<script src="../cssweb/jquery-3.2.1.min.js"></script>
<title>Untitled Document</title>
</head>
<body>
<h2>Select a Date in first TextBox. Then click the Button to see how 3 days is added to this Date and shown in "Follow Date" TextBox.</h2>

<p>Date:
    <input id="txtDate" type="text" />
</p>
<p>
    <input type="button"  class="btn_ipt" value="Fill Follow Date" />
</p>
<p>Follow Date:
    <input id="follow_Date" type="text" />
</p>
	<div class="txt"></div>
</body>

</html>

<!----------------------------------------เหตุการที่จะเกิดเงื่อนไข------------------------------->
<!--						เดือน / วัน / ปี
			1.กำหนดวันหยุด //	 13/10/2020
            2.ระดับผู้ยืม	//  5/9
            3.ประเภทหนังสือ // 5/6/7
            หมายเหตุ หากต้องการให้แสดงเป็น พศ. ให้ getFullYear() + 543  
   ------------------------------------------------------------------------------------------>         

<script>
	$(document).ready(function () {
    $('#txtDate').datepicker();
    $('#follow_Date').datepicker();
});
$(document).on('click', '.btn_ipt', function(){
	var tt = document.getElementById('txtDate').value;
   
	dateFix(tt);
});
function dateFix(tt){		
	var date = new Date(tt);
    var newdate = new Date(date);
	var datFix = '4';				//จำนวนวันที่บวกเพิ่ม
	var datPicker = '10/12/2020';    // เงื่อนไขวันหยุด
/*alert(datFix);*/
/*alert(datPicker);*/
    newdate.setDate(newdate.getDate() + +datFix);
    
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();
    var data_Dat = mm + '/' + dd + '/' + y;
	
    		$.ajax({
					url: "../phpsv/detpicker.php",
					method:"POST",
					data:{txtdate:data_Dat},
					dataType:"text",
					success: function(result)
									{
																			
										
											
													$('.txt').html(result);
											
									
									}
					});
	
		}
	
</script>










