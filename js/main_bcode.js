// ---------------------------function  default----------------------------------
$(document).ready(function () {
	$('.close_popAdbarCodeAuto').click(function () {
		var boxpopAddbarcodeAuto = document.getElementById('boxModal_popAdbarCodeAuto');
		boxpopAddbarcodeAuto.style.display = 'none';
		$('.ipt_adAutoBarcode').val("");
		var elelb = document.getElementById('text_codeAdnew');
		//console.log(elelb);
		if (elelb != null) {
			elelb.remove();

		}
	})
	Func_Check_Login();
});
function clickeopentab() {
	window.open("../file-page/books-hit.php");
}
function Func_Check_Login() {
	//console.log("chk login");
	var idn = localStorage.getItem("idxname");
	//$('#box_head_name_lb').html(data[2])
	if (idn != null) {
		$.ajax({
			url: "../phpsv/check_status_page.php",
			method: "POST",
			data: { iduser: idn },
			dataType: "json",
			success: function (data) {
				//console.log(data);
				if (data[0] == 1) {
					$('#box_head_name_lb').html(data[1] + '&nbsp;' + data[2]);
					$('#box_head_name_lb').attr('id-data', data[3]);
				} else {
					//console.log("test");
					//ให้ปิดหน้าเว็บ
					window.location.href = "../lo-gin.php";

				}
			}



		})

	} else {
		window.location.href = "../lo-gin.php";

	}

}
function Func_LogoutUser() {
	var iduser = $('#box_head_name_lb').attr("id-data");
	//console.log(iduser);	
	$.ajax({
		url: "../phpsv/logoutuser.php",
		method: "POST",
		data: { iduser: iduser },
		dataType: "json",
		success: function (data) {
			//console.log(data);
			if (data[0] == 2) {
				localStorage.removeItem("idxname");
				window.location.href = "../lo-gin.php";
			} else {
				popupError("error Logout User");

			}
		}
	})
}
$(document).on('this, click', '.treeview', function () {
	myClickTab(this);
})
function myClickTab(dis) {
	if (dis.id == 'index') {
		console.log('test');
		location.href = "../assets/index.php";
	} else if (dis.id == 'search') {
		location.href = "../file-page/books-hit.php";
	} else if (dis.id == 'regisbooks') {
		location.href = "../assets/regisbooks.php";
	} else if (dis.id == 'calendar') {
		location.href = "../assets/calendar.php";
	} else if (dis.id == 'barcode') {
		location.href = "../assets/barcode.php";
	} else if (dis.id == 'user') {
		location.href = "../assets/user-regis.php";
	} else if (dis.id == 'admin') {
		location.href = "#!";
	} else if (dis.id == 'report') {
		location.href = "../filepage/report-index.php";
	} else if (dis.id == 'regisebook') {
		location.href = "../assets/ebooks-regis.php";
	} else if (dis.id == 'uploadfile') {
		location.href = "../assets/ebookupload.php";
	} else {
		stop;
	}
	// location.href = "index.php";
}

// ---------------------------function  select menu dropdown---------------------------------	
const optionMenu = document.querySelector('.select-menu'),
	selectBtn = optionMenu.querySelector('.select-btn'),
	options = optionMenu.querySelectorAll('.option'),
	sBtn_text = optionMenu.querySelector('.sBtn-text');
selectBtn.addEventListener('click', () => optionMenu.classList.toggle('active'));

options.forEach(option => {
	option.addEventListener("click", () => {
		var att = document.createAttribute('data-type');
		let selectedOption = option.querySelector('.option-text');
		var id = selectedOption.getAttribute('id-data');
		let txt = selectedOption.innerText;
		att.value = id;
		// console.log(att);
		sBtn_text.setAttributeNode(att);
		sBtn_text.innerText = txt;
		//    console.log(selectedOption);		
		optionMenu.classList.remove('active');
	})

})
// ---------------------------function BTN select all-------------------------------	
$(document).on('click', '.btn_slt_position', function () {

	ifelse_check_all_select_btnAdposition();
})
$(document).on('click', '.btnsend', function () {
	myFunc_Print_To_Barcode();
})
$(document).on('click', '.btn_ad_position', function () {
	AjaxSendTo_php_AdPosition_sticker();

})

//-----------------------------------------------------------คำสั่งเช็คบล็อค ปริ้นสติ๊กเกอร์บาร์โค้ด------------------------------------	
function myfunchecktrue_AdSticker() {
	/*alert("mark all select");*/
	var items = document.getElementsByName('check_box');

	for (var i = 0; i < items.length; i++) {

		items[i].checked = true;

	}

}
function myUncheckboxfalse_AdSticker() {
	/*alert("UNselect");*/
	var items = document.getElementsByName('check_box');
	for (var i = 0; i < items.length; i++) {
		if (items[i].type == 'checkbox') {
			items[i].checked = false;
		}
	}

}
function ifelse_check_all_select_btnAdposition() {
	var btnVal = document.getElementById('btn_select_Adposition');
	/*alert(btnVal.innerHTML);*/
	if (btnVal.innerHTML === "All") {

		btnVal.innerHTML = "NO";
		myfunchecktrue_AdSticker();
	} else {
		btnVal.innerHTML = "All";
		myUncheckboxfalse_AdSticker();
	}

}
function mYFunc_ClearPositionstic() {
	var tbAll = document.querySelectorAll('.bcodesvg');
	var x = "";
	var i, j, cells;
	//console.log(tbAll);
	var table = document.querySelectorAll('#tr_id_position');
	var tdbud = document.querySelectorAll('.td_bud');
	//console.log(table.length);
	for (i = 0, j = table.length; i < j; i++) {
		//console.log(table[i]);
		cells = table[i].getElementsByTagName('td');
		cells[1].innerHTML = x;
		cells[2].innerHTML = x;
		// 4 ชื่อห้องสมุด
		// 3 barcode error
		//2 ชื่อหนังสือ
		// 1 collum ทั้หงมดด้านหน้า
	}
	for (var t = 0; t < tbAll.length; t++) {
		tbAll[t].innerHTML = x;
	}
	for (var d = 0; d < tdbud.length; d++) {
		tdbud[d].innerHTML = x;
	}
}
//------------------------------------------------------------------------------------ฟังก์ชั่นส่งค่าไป php เพื่อทำบาร์โค้ด
function AjaxSendTo_php_AdPosition_sticker() {
	//mYFunc_ClearPositionstic();
	var itemID = [];
	var ChkTypeform = document.getElementById("sbtn-txt").getAttributeNode('data-type').value;
	//  console.log(ChkTypeform);
	$('.check_boxadstker:checked').each(function (i) {
		itemID[i] = $(this).attr('id');
		//alert(itemID[i]);
		idbookstart = $('#ipt_adrejisbarcode').val();
		idbookend = $('#ipt_adrejisbarcode_end').val();
		// console.log(idbookend);
	});
	if (itemID.length === 0) {
		popupError("Plase Select Position Sticker");
	} else {
		if (idbookstart == '') {
			popupError("Plase key Start ID BOOKS");
		} else if (idbookend == '') {
			popupError("Plase key End ID BOOKS");
		} else if (ChkTypeform == '') {
			popupError("Plase Select platform");
		} else {

			var items = document.getElementsByName('check_box');
			for (var i = 0; i < items.length; i++) {
				if (items[i].type == 'checkbox') {
					items[i].checked = false;
				}
			}
			//localStorage.setItem("itemIDs", JSON.stringify(itemID));
			localStorage.setItem("idbkstarts", idbookstart);
			localStorage.setItem("idbkends", idbookend);
			//  console.log(ChkTypeform);				
			$.ajax({
				url: "../phpsv/setPositionstickerBarcode.php",
				method: "POST",
				data: { itemID: itemID, idbookstart: idbookstart, idbookend: idbookend, ChkTypeform:ChkTypeform},
				dataType: "json",
				success: function (data) {
					// console.log(data);
					
					//alert("test");
					/*//alert(data.length);*/
					//   console.log(data);
					//console.log(localStorage.setItem("idbkend", idbookend));	
					//alert("ทดสอบ1 /r/nทดสอบสอง");
					var br = "<br>";
					if (data.length > 0) {
						for (var i = 0; i < data.length; i++) {
							// console.log(data[i].key);
							if (data[i].key == 1) {	
								var svg = '<svg class="bcodesvg" id="barcodea"></svg>';	
								// console.log(svg);
														
								var idcode = data[i].Code;
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								var div = '<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R1-rows" style="font-size:14px;" aria-hidden="true"></i>';
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk1').setAttributeNode(ele);
								document.getElementById('bcode_fix1').innerHTML = svg;
								$('.divboxsticker-p1').html(div);
								$('#R1-rows').attr("ad-position", 1);
								$("#barcodea").attr("id-data", "R1-rows");
								$('#td_bud1').text(data[i].Bud);
								$('#td_cat1').text(data[i].Cbook);
								$('#td_bybk1').text(data[i].BYNUM);								
								$('#td_yb1').text(data[i].Ybook);
								document.getElementById('td_col_r1p1').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p1').style.backgroundColor = data[i].Color_r2;																
								$('#td_name1').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk1').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk1').innerText= data[i].Code;
								}	
								//console.log(data[i].Nbook);
								JsBarcode("#barcodea", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});

							}
							else if (data[i].key == 2) {
								var svg = '<svg class="bcodesvg" id="barcodeb"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p2').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R2-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk2').setAttributeNode(ele);
								document.getElementById('bcode_fix2').innerHTML = svg;
								$('#R2-rows').attr("ad-position", 2);
								$("#barcodeb").attr("id-data", "R2-rows");
								$('#td_bud2').text(data[i].Bud);
								$('#td_cat2').text(data[i].Cbook);
								$('#td_bybk2').text(data[i].BYNUM);								
								$('#td_yb2').text(data[i].Ybook);
								document.getElementById('td_col_r1p2').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p2').style.backgroundColor = data[i].Color_r2;
								$('#td_name2').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk2').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk2').innerText= data[i].Code;
								}	
								JsBarcode("#barcodeb", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 3) {
								var svg = '<svg class="bcodesvg" id="barcodec"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p3').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R3-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk3').setAttributeNode(ele);
								document.getElementById('bcode_fix3').innerHTML = svg;
								$('#R3-rows').attr("ad-position", "3");
								$("#barcodec").attr("id-data", "R3-rows");
								$('#td_bud3').text(data[i].Bud);
								$('#td_cat3').text(data[i].Cbook);
								$('#td_bybk3').text(data[i].BYNUM);								
								$('#td_yb3').text(data[i].Ybook);
								document.getElementById('td_col_r1p3').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p3').style.backgroundColor = data[i].Color_r2;
								$('#td_name3').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk3').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk3').innerText= data[i].Code;
								}	
								JsBarcode("#barcodec", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 4) {
								var svg = '<svg class="bcodesvg" id="barcoded"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p4').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R4-rows"" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk4').setAttributeNode(ele);
								document.getElementById('bcode_fix4').innerHTML = svg;
								$('#R4-rows').attr("ad-position", "4");
								$("#barcoded").attr("id-data", "R4-rows");
								$('#td_bud4').text(data[i].Bud);
								$('#td_cat4').text(data[i].Cbook);
								$('#td_bybk4').text(data[i].BYNUM);							
								$('#td_yb4').text(data[i].Ybook);
								document.getElementById('td_col_r1p4').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p4').style.backgroundColor = data[i].Color_r2;
								$('#td_name4').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk4').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk4').innerText= data[i].Code;
								}
								JsBarcode("#barcoded", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 5) {
								var svg = '<svg class="bcodesvg" id="barcodee"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p5').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R5-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk5').setAttributeNode(ele);
								document.getElementById('bcode_fix5').innerHTML = svg;
								$('#R5-rows').attr("ad-position", "5");
								$("#barcodee").attr("id-data", "R5-rows");
								$('#td_bud5').text(data[i].Bud);
								$('#td_cat5').text(data[i].Cbook);
								$('#td_bybk5').text(data[i].BYNUM);								
								$('#td_yb5').text(data[i].Ybook);
								document.getElementById('td_col_r1p5').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p5').style.backgroundColor = data[i].Color_r2;
								$('#td_name5').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk5').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk5').innerText= data[i].Code;
								}	
								JsBarcode("#barcodee", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 6) {
								var svg = '<svg class="bcodesvg" id="barcodef"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p6').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R6-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk6').setAttributeNode(ele);
								document.getElementById('bcode_fix6').innerHTML = svg;
								$('#R6-rows').attr("ad-position", "6");
								$("#barcodef").attr("id-data", "R6-rows");
								$('#td_bud6').text(data[i].Bud);
								$('#td_cat6').text(data[i].Cbook);
								$('#td_bybk6').text(data[i].BYNUM);							
								$('#td_yb6').text(data[i].Ybook);
								document.getElementById('td_col_r1p6').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p6').style.backgroundColor = data[i].Color_r2;
								$('#td_name6').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk6').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk6').innerText= data[i].Code;
								}		
								JsBarcode("#barcodef", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 7) {
								var svg = '<svg class="bcodesvg" id="barcodeg"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p7').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R7-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk7').setAttributeNode(ele);
								document.getElementById('bcode_fix7').innerHTML = svg;
								$('#R7-rows').attr("ad-position", "7");
								$("#barcodeg").attr("id-data", "R7-rows");
								$('#td_bud7').text(data[i].Bud);
								$('#td_cat7').text(data[i].Cbook);
								$('#td_bybk7').text(data[i].BYNUM);								
								$('#td_yb7').text(data[i].Ybook);
								document.getElementById('td_col_r1p7').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p7').style.backgroundColor = data[i].Color_r2;
								$('#td_name7').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk7').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk7').innerText= data[i].Code;
								}		
								JsBarcode("#barcodeg", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 8) {
								var svg = '<svg class="bcodesvg" id="barcodeh"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p8').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R8-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk8').setAttributeNode(ele);
								document.getElementById('bcode_fix8').innerHTML = svg;
								$('#R8-rows').attr("ad-position", "8");
								$("#barcodeh").attr("id-data", "R8-rows");
								$('#td_bud8').text(data[i].Bud);
								$('#td_cat8').text(data[i].Cbook);
								$('#td_bybk8').text(data[i].BYNUM);							
								$('#td_yb8').text(data[i].Ybook);
								document.getElementById('td_col_r1p8').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p8').style.backgroundColor = data[i].Color_r2;
								$('#td_name8').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk8').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk8').innerText= data[i].Code;
								}		
								JsBarcode("#barcodeh", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 9) {
								var svg = '<svg class="bcodesvg" id="barcodei"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p9').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R9-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk9').setAttributeNode(ele);
								document.getElementById('bcode_fix9').innerHTML = svg;
								$('#R9-rows').attr("ad-position", "9");
								$("#barcodei").attr("id-data", "R9-rows");
								$('#td_bud9').text(data[i].Bud);
								$('#td_cat9').text(data[i].Cbook);
								$('#td_bybk9').text(data[i].BYNUM);							
								$('#td_yb9').text(data[i].Ybook);
								document.getElementById('td_col_r1p9').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p9').style.backgroundColor = data[i].Color_r2;
								$('#td_name9').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk9').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk9').innerText= data[i].Code;
								}		
								JsBarcode("#barcodei", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 10) {
								var svg = '<svg class="bcodesvg" id="barcodej"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p10').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R10-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk10').setAttributeNode(ele);
								document.getElementById('bcode_fix10').innerHTML = svg;
								$('#R10-rows').attr("ad-position", "10");
								$("#barcodej").attr("id-data", "R10-rows");
								$('#td_bud10').text(data[i].Bud);
								$('#td_cat10').text(data[i].Cbook);
								$('#td_bybk10').text(data[i].BYNUM);								
								$('#td_yb10').text(data[i].Ybook);
								document.getElementById('td_col_r1p10').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p10').style.backgroundColor = data[i].Color_r2;
								$('#td_name10').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk10').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk10').innerText= data[i].Code;
								}	
								JsBarcode("#barcodej", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 11) {
								var svg = '<svg class="bcodesvg" id="barcodek"></svg>';	
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';								
								$('.divboxsticker-p11').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R11-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk11').setAttributeNode(ele);
								document.getElementById('bcode_fix11').innerHTML = svg;
								$('#R11-rows').attr("ad-position", "11");
								$("#barcodek").attr("id-data", "R11-rows");
								$('#td_bud11').text(data[i].Bud);
								$('#td_cat11').text(data[i].Cbook);
								$('#td_bybk11').text(data[i].BYNUM);							
								$('#td_yb11').text(data[i].Ybook);
								document.getElementById('td_col_r1p11').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p11').style.backgroundColor = data[i].Color_r2;
								$('#td_name11').html(span);
								// console.log(data[i].dpart);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk11').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk11').innerText= data[i].Code;
								}								
								JsBarcode("#barcodek", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 12) {
								var svg = '<svg class="bcodesvg" id="barcodel"></svg>';		
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p12').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R12-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk12').setAttributeNode(ele);
								document.getElementById('bcode_fix12').innerHTML = svg;
								$('#R12-rows').attr("ad-position", "12");
								$("#barcodel").attr("id-data", "R12-rows");
								$('#td_bud12').text(data[i].Bud);
								$('#td_cat12').text(data[i].Cbook);
								$('#td_bybk12').text(data[i].BYNUM);								
								$('#td_yb12').text(data[i].Ybook);
								document.getElementById('td_col_r1p12').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p12').style.backgroundColor = data[i].Color_r2;
								$('#td_name12').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk12').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk12').innerText= data[i].Code;
								}	
								JsBarcode("#barcodel", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 13) {
								var svg = '<svg class="bcodesvg" id="barcodem"></svg>';		
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								$('.divboxsticker-p13').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R13-rows" style="font-size:14px;" aria-hidden="true"></i>');
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk13').setAttributeNode(ele);
								document.getElementById('bcode_fix13').innerHTML = svg;
								$('#R13-rows').attr("ad-position", "13");
								$("#barcoden").attr("id-data", "R13-rows");
								$('#td_bud13').text(data[i].Bud);
								$('#td_cat13').text(data[i].Cbook);
								$('#td_bybk13').text(data[i].BYNUM);							
								$('#td_yb13').text(data[i].Ybook);
								document.getElementById('td_col_r1p13').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p13').style.backgroundColor = data[i].Color_r2;
								$('#td_name13').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk13').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk13').innerText= data[i].Code;
								}	
								JsBarcode("#barcodem", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}
							else if (data[i].key == 14) {
								var svg = '<svg class="bcodesvg" id="barcodeln"></svg>';		
								var span = '<p id="namebk_stick">' + data[i].Nbook + '</p>';
								const ele = document.createAttribute('data-code');
								ele.value = data[i].Code;								
								document.getElementById('td_idbk14').setAttributeNode(ele);
								document.getElementById('bcode_fix14').innerHTML = svg;
								$('.divboxsticker-p14').html('<i id="close_boxsticker" onclick="Close_sticker(this)" class="fa fa-times" dataid="R14-rows" style="font-size:14px;" aria-hidden="true"></i>');
								$('#R14-rows').attr("ad-position", "14");
								$("#barcoden").attr("id-data", "R14-rows");
								$('#td_bud14').text(data[i].Bud);
								$('#td_cat14').text(data[i].Cbook);
								$('#td_bybk14').text(data[i].BYNUM);							
								$('#td_yb14').text(data[i].Ybook);
								document.getElementById('td_col_r1p14').style.backgroundColor = data[i].Color_r1;
								document.getElementById('td_col_r2p14').style.backgroundColor = data[i].Color_r2;
								$('#td_name14').html(span);
								if(data[i].dpart != null){								
									document.getElementById('td_idbk14').innerText= data[i].Code+"("+data[i].dpart+")";
								}else{
									document.getElementById('td_idbk14').innerText= data[i].Code;
								}	
								JsBarcode("#barcodeln", '' + data[i].Code + '', {
									width: 2,
									height: 20,
									displayValue: false
								});
							}



						}



					}


				}



			})
		}
	}

}
function Close_sticker(dis) {
	//console.log(dis.getAttribute("dataid"));
	var id = dis.getAttribute("dataid");
	//console.log(id);
	var form = document.getElementById(id);
	var svg = document.getElementsByTagName("svg");
	//console.log(svg);
	//var spans = form.getElementsByTagName('span');
	form.setAttribute("ad-position", "");
	//console.log(form);	
	var txt = form.getElementsByTagName("td");

	for (var sv = 0; sv < svg.length; sv++) {
		//console.log(svg[sv].getAttribute("id-data"));
		var idsvg = svg[sv].getAttribute("id-data");
		//console.log(idsvg);
		if (idsvg == id) {
			//console.log(svg[sv]);
			svg[sv].innerHTML = "";
		}
	}
	//var svg = $('.bcodesvg').attr("id-data");
	//console.log(txt[13].innerText);
	for (var t = 0; t < txt.length; t++) {
		//console.log(txt[t].innerText="");
		//txt[t].innerText="";
		//console.log(txt[t].id);
		if (txt[t].className == "td_barcode") {

		} else {
			txt[t].innerText = "";
			txt[t].style.backgroundColor="";	 	
			
		}
	}
	dis.remove();
}
function myFunc_Print_To_Barcode() {
	var count_item = [];
	var code_arr = [];
	var table = document.getElementsByClassName("tb-postic");
	//console.log(table);
	for (var ct = 0; ct < table.length; ct++) {
		//console.log(table[ct].getAttribute("ad-position"));
		if (table[ct].getAttribute("ad-position") != "") {
			count_item.push(table[ct].getAttribute("ad-position"));
			//console.log(table[ct].getAttribute("ad-position"));
		}
	}
	// console.log("myFunc_Print_To_Barcode");
	// console.log(count_item);
	//var Count_item = localStorage.getItem("itemIDs");
	//var numitem = JSON.parse(Count_item);
	var numitem = count_item; //  เลขตำแหน่ง position ที่รับค่ามา
	var divcode = document.getElementsByClassName("ipt_bcode"); //  เลขบาร์โค้ด
	var IDbook_Start = localStorage.getItem("idbkstarts");
	var IDbook_Last = localStorage.getItem("idbkends");
	var stut_platform = document.getElementById("sbtn-txt").getAttributeNode('data-type').value; //รูปแบบ แพลตฟอร์ม
//  console.log(divcode.length);
	for (var tx = 0; tx < divcode.length; tx++) {
		if (divcode[tx].innerText != "") {
			code_arr.push(divcode[tx].getAttribute('data-code'));
			// console.log(divcode[tx].getAttribute('data-code'));
		}


	}
// console.log(numitem);
	/*console.log(IDbook_Start);
	console.log(IDbook_Last);*/
	// console.log(code_arr);
	$.ajax({
		url: "../phpsv/color_label_No035.php",
		method: "POST",
		data: { numitem: numitem, code_arr: code_arr, stutplat: stut_platform },
		dataType: "text",
		success: function (dats) {
			//alert(dat);
		 console.log(dats);
			//window.open(dats);
			window.open(dats, '_blank');
			//window.location.href = dats;

		}


	})


}
function printDiv(box_print_pdf) {
	//alert("test");
	var printContents = document.getElementById(box_print_pdf).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;

}

