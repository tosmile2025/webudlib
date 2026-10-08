
$(document).ready(function () {
	localStorage.setItem("str_pg", 1);
	document.getElementById('foolterset-css').innerText = '© 2023, made with  by As St.Head';
	// func_testarry();
	// Func_Check_Login()
})

function func_testarry() {
	const ar_str = Array(1, 3);
	// ar_str.find((element) => element == 1);
	const str_pg = 2;
	// console.log(ar_str.find((element) => element == str_pg));

	if (ar_str.find((element) => element == str_pg)) {
		console.log(element);
	}
	// Expected output: 1
}

function myClickTab(dis) {
	// openChild();
	if (dis.id == 'index') {
		;
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
	} else if (dis.id == 'recutbooks') {
		location.href = "../assets/recutBooks.php";
	} else {
		stop;
	}
	// location.href = "index.php";
}

function myTabClik_table(cityName, elmnt, status) {
	// Hide all elements with class="tabcontent" by default */
	var i, tabcontent, tablinks;
	// console.log(status);
	let arr_data = [];
	arr_data.push({
		state_fix: "TABCLICK",
		status: status
	})

	tabcontent = document.getElementsByClassName("tab_table_content");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	// Remove the background color of all tablinks/buttons
	tablinks = document.getElementsByClassName("menu_tabli");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].style.backgroundColor = "";
	}
	document.getElementById(cityName).style.display = "block";
	// document.getElementById("defaultOpenTable").click();
	if (status == 1) {
		localStorage.setItem("str_pg", status);
		// เมื่อคลิกที่หน้าที่ 1 หน้า ยืม
		$('.txt_barCode').focus();
		//console.log(localStorage.getItem("str_pg"));
	}
	else if (status == 2)// เมื่อคลิกที่หน้า จอง
	{
		document.getElementById("txt_barCode").focus();
		localStorage.setItem("str_pg", status);
		// alert(status);
		/*$('.box_ListOrderbooks').html("");*/
		var iptValIDU = $('.ipt_numbarCode').text();
		var iptValIDBook = 0;
		var ipt_dayorder = 0;
		var ipt_daycount = 0;
		InsertdbOrderbooks(iptValIDBook, iptValIDU, ipt_dayorder, ipt_daycount, status);
		$('.tb_list_cirulation').html("");
		// console.log(localStorage.getItem("str_pg"));
	} else if (status == 3)// gเมื่อคลิกหน้า ค่าปรับ
	{
		document.getElementById("txt_barCode").focus();
		localStorage.setItem("str_pg", status);
		var iptValIDU = $('.ipt_numbarCode').text();

		func_click_show_fines(iptValIDU);
		//console.log(localStorage.getItem("str_pg"));
	} else if (status == 4)//เมื่อคลิกหน้า คืน
	{
		document.getElementById("txt_barCode").focus();
		//console.log("test");
		localStorage.setItem("str_pg", status);
		$('.txt_barCode').focus();
		//	console.log(localStorage.getItem("str_pg"));
	} else {// อยู่หน้าว่าง


	}

}
document.getElementById("defaultOpenTable").click();
// -----------------------------------------------------------ฟังก์ชั่น  keybarcode 
function myFunction(e) {

	if (e.which == 13) {
		/*alert(e.which);*/
		var iptval_bcodeuser = $('.txt_barCode').val();
		//console.log(iptval_bcodeuser.length);
		if (!iptval_bcodeuser.match(/^([a-z0-9])+$/i)) {
			alert("กรุณาเปลี่ยนภาษา");
			$('.txt_barCode').val("");
			func_soundef();
			// return;
		} else {
			if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 1) {
				//alert("ตำราภาษาไทย");							

				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('#ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 2) {
				//alert("ตำราภาษาอังกฤษ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'F') {
				//alert("นิยาย+นวนิยาย");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

				/* alert("นิยาย+นวนิยาย");*/
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '5') {
				//alert("Pk");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '8') {
				//alert("ธรรมะ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'R') {
				//alert("อ้างอิง");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				// alert("หนังสืออ้างอิง (R) ไม่สามารถยืมในระบบได้");
				//myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'G') {
				//alert("สิ่งพิมพ์ รบ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'T') {
				//alert("รายงานวิจัย");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '3') {
				//alert("นิตยสาร");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes);


			}

			else { //-----------ตรวจสอบแล้วเป็นเลขบาร์โค้ดผู้ใช้บริการ--------------
				//console.log("ตรวจสอบแล้วเป็นเลขบาร์โค้ดผู้ใช้บริการ");
				var iptval_bcodeuser = $('.txt_barCode').val();
				var iptValIDU = $('.txt_barCode').val();
				var code = iptValIDU;
				var iptValIDBook = '';
				//check_FinesbookFunction(code, iptValIDBook);
				//alert("test user");	
				// console.log(iptval_bcodeuser);																	
				alert('เลขบาร์โค้ดสมาชิก')
				$('.tb_list_inputbook').html("");
				$('.tb_list_cirulation').html("");
			}/*end ifelseiptval_bcodeuser.length == 6 && iptval_bcodeuser[0]== 1 */
			$('.txt_barCode').val("");
		}

	}


}
const btn_export = document.getElementById('btn-export');
btn_export.addEventListener('click', function () {
	// console.log('test');
	const xml = new XMLHttpRequest();
	var formData = new FormData();
	const daystart = document.getElementById('txt_begin');
	const dayend = document.getElementById('txt_end');
	// console.log(daystart.value);
	if (!daystart.value) {
		// console.log('!daystart');
		showAlert("กรุณาใส่ วันเริ่มต้นค้นหา (Ex: 2025-01-13)");

	} else if (!dayend.value) {
		showAlert("กรุณาใส่ วันสิ้นสุด (Ex: 2025-01-13)");
	} else {
		formData.append("dayBegin", daystart.value);
		formData.append("dayend", dayend.value);
		xml.open("POST", "../phpsv/export_excel.php")
		xml.send(formData);
		xml.onreadystatechange = function () {
			if (xml.status == 200 && xml.readyState == 4) {
				const data = JSON.parse(xml.responseText);				
				// console.log(data[0]);					
				window.location.href = '../excelFile/' + data[0].booktitle + '';
			}
		}

	}
	dayend.value = "";
	daystart.value ="";
})
	

// func_showTable()
function func_showTable(txt_data) {
	// console.log('show');
	// const json = [{ "0": "1020462", "IDLIKBOOK": "1020462", "1": "TE", "GMDCODE": "TE", "2": "\u0e1f\u0e38\u0e14\u0e1f\u0e34\u0e14\u0e1f\u0e2d\u0e44\u0e1f\u0e15\u0e32\u0e21\u0e2a\u0e44\u0e15\u0e25\u0e4c\u0e2d\u0e40\u0e21\u0e23\u0e34\u0e01\u0e31\u0e19", "NAME_BOOK": "\u0e1f\u0e38\u0e14\u0e1f\u0e34\u0e14\u0e1f\u0e2d\u0e44\u0e1f\u0e15\u0e32\u0e21\u0e2a\u0e44\u0e15\u0e25\u0e4c\u0e2d\u0e40\u0e21\u0e23\u0e34\u0e01\u0e31\u0e19", "3": "9789743891786", "ISBN": "9789743891786", "4": "P00924", "PUBCODE": "P00924", "5": "2545", "Year_book": "2545", "6": "191 \u0e19.", "COUNTPAGE": "191 \u0e19.", "7": "\u0e2a958\u0e1f", "BYNUM": "\u0e2a958\u0e1f", "8": "", "COL 9": "", "9": "", "COL 10": "", "10": "0", "COL 11": "", "11": "3\/8\/2006", "YEAR": "3\/8\/2006", "12": "", "COL 13": "", "13": "", "COL 14": "", "14": "", "COL 15": "", "15": "", "COL 16": "", "16": "", "COL 17": "", "17": "TH", "lang": "TH", "18": "", "COL 19": "", "19": "", "COL 20": "", "20": "0", "COL 21": "0", "21": "0", "COL 22": "0", "22": "", "COL 23": "", "23": "", "COL 24": "", "24": "W 18", "Catbook_store": "W 18", "25": "0", "COL 26": "0", "26": "", "COL 27": "", "27": "", "COL 28": "", "28": "26077", "IDKEY_REGIS": "26077", "29": "1020462", "30": "106720", "BARCODE": "106720", "31": "C00001", "SUPCODE": "C00001", "32": "", "COL 5": "", "33": "175.00", "Price_book": "175.00", "34": "106720", "CODE_REGIS": "106720", "35": "W 18", "CATBOOK": "W 18", "36": "", "37": "\u0e2a958\u0e1f", "byauthor": "\u0e2a958\u0e1f", "38": "1", "LOANSTATUS": "1", "39": "C", "status_text": "C", "40": "0000-00-00", "Dat_regis": "0000-00-00", "41": "S", "type_mg": "S", "42": "49", "string": "49", "43": "1", "COPPYNUM": "1", "44": "0", "STWORK": "0", "45": null, "department": null, "46": null, "Centimeters": null, "err": "suc-02" }]
	// const ar = JSON.parse(json.responseText)
	// console.log(json);
	const tbody = document.getElementById('tb_list_cirulation');
	const divcount = document.getElementsByClassName('count-outbooks')[0];
	txt_data.forEach((item) => {
		// var tr = document.createElement("tr");
		// tr.className = 'tr_exbooks tr_List';
		var td = `
		  	<tr class ="tr_exbooks" id="`+ item.BARCODE + `">
			<td class="tbcheck_fines">
			<div class="checkbox-fade fade-in-danger">
			<label>
			<input type="checkbox" value="" name="checkbox_fines" class="tbcheckbox">
			<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span>
			</label></div>
			</td>
			<td  >`+ item.BARCODE + `</td>
				<td  >`+ item.CATBOOK + `||` + item.BYNUM + `</td>
				<td >`+ item.NAME_BOOK + `</td>
				<td >`+ item.Year_book + `</td>				
		</tr>
		`
		// console.log(tr);		
		// tr.append(td);
	const number = 	new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.countbooks);
		// console.log(item.countbooks);	
		divcount.innerText = number;	
		tbody.insertAdjacentHTML("afterend", td);
		func_fixTabColor_exbooks(item.BARCODE);
	})
}

//-----------------------------------------------------------------ฟังก์ชั่นคลิกเรียกรายการยืมของผู้ยืม-----------------------------------------	
function func_fixTabColor_exbooks(iptValIDBook) {
	// console.log(iptValIDBook);
	var btns = document.querySelectorAll(".tr_exbooks");
	//btns.getAttribute("id1")
	// console.log(btns);
	//console.log(btns.attributes[3].value);
	for (var i = 0; i < btns.length; i++) {
		console.log(btns[i].getAttribute("id"));
		if (btns[i].getAttribute("id") == iptValIDBook) {
			btns[i].style.backgroundColor = '#FFB8A0';
			btns[i].style.color = 'white';
			//mYFunc_AllHub(id);
		} else {
			btns[i].style.color = '#777777';
			btns[i].style.backgroundColor = '';
		}
	}


}

// /--------------------------------function   ยิงแสกนหนังสือเก่าออกจากระบบ-----------------
function RecutBooks(iptValIDBook, iptValIDU, iptClass, clickYes) {
	// console.log('test recutbooks');

	const formdata = new FormData();
	const xml = new XMLHttpRequest();
	formdata.append("data", iptValIDBook);
	xml.open("POST", "../phpsv/Recutbooks.php");
	xml.send(formdata);
	xml.onreadystatechange = function () {
		if (xml.status == 200 && xml.readyState == 4) {

			let txt_data = JSON.parse(xml.responseText);
			if (txt_data[0].err == "suc-02") {
				// console.log('OK');
				func_showTable(txt_data);
				func_soundef_text(0);
			} else if (txt_data[0].err == "str-01") {
				// รายการซ้ำ
				// console.log('รายการซ้ำ');
				var txt_alert = "รายการซ้ำ";
				showAlert(txt_alert);
				func_soundef_text(1);
			} else if (txt_data[0].err == "str-02") {
				// console.log('ไม่เจอหนังสือ');
				// ไม่เจอหนังสือ
				var txt_alert = "ไม่เจอหนังสือ";
				showAlert(txt_alert);
				func_soundef_text(2);
			} else if (txt_data[0].err == "str-08") {
				// console.log('delete regisbooks ไม่สำเร็จ');
				// delete regisbooks ไม่สำเร็จ
				var txt_alert = "delete regisbooks ไม่สำเร็จ";
				showAlert(txt_alert);
				func_soundef_text(3);
			} else if (txt_data[0].err == "str-09") {
				// console.log('delete bookstore ไม่สำเร็จ');
				// delete bookstore ไม่สำเร็จ
				var txt_alert = "delete bookstore ไม่สำเร็จ";
				showAlert(txt_alert);
					func_soundef_text(3);
			} else if (txt_data[0].err == "str-13") {
				// console.log('elete regisbooks  ฟังก์ชั้น func_delete_regisbooksAnd_bookstore ไม่สำเร็จ');
				// delete regisbooks  ฟังก์ชั้น func_delete_regisbooksAnd_bookstore ไม่สำเร็จ
				var txt_alert = "elete regisbooks  ฟังก์ชั้น func_delete_regisbooksAnd_bookstore ไม่สำเร็จ";
				showAlert(txt_alert);
			} else if (txt_data[0].err == "str-10") {
				// console.log('insert database error');
				// insert database error
				var txt_alert = "insert database error";
				showAlert(txt_alert);
				func_soundef_text(4);
			}



		}
	}
}
function func_soundef_text(txt) {
	if(txt == 0){
		//สำเร็จ
		var audio = new Audio('../fileimage/successMP.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;
	}else if(txt == 1){
		//	รายการซ้ำ
		var audio = new Audio('../fileimage/dupicate_mp.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;
	}else if(txt == 2){
		//	ไม่เจอหนังสือ
		var audio = new Audio('../fileimage/not_found.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;
	}else if(txt == 3){
		//	ลบรายการไม่สำเร็จ
		var audio = new Audio('../fileimage/delete_false.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;
	}else if(txt == 4){
		//	ไตารางบันทึกข้อมูลมีปัญหา
		var audio = new Audio('../fileimage/errtable_mp.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;
	}
	
	
	
}
function showAlert(txt_alert) {
	const popup = document.getElementById('boxModal_unlimitbook');
	const label = document.getElementById('txt-h3-danger');
	label.innerText = txt_alert;
	popup.style.display = "block";
	setTimeout(() => {
		popup.style.display = "none";
	}, 1300);

}

function func_soundef() {
	var audio = new Audio('../fileimage/siri_changeLeng.mp3');
	// var audioef = new Audio('../fileimage/WindowsCritical.wav');
	audio.play().value = 100;

}
//-------------------------------------------------------ฟังก์ชั่น เช็คล็อคอิน user 
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
					// console.log("test");
					//ให้ปิดหน้าเว็บ
					window.location.href = "../assets/lo-gin.php";

				}
			}



		})

	} else {
		window.location.href = "../assets/lo-gin.php";

	}

}

//--------------------------------------------------------------function page canlendar---- หน้าเพจปฎิทิน-------วันที่ ต่อ 1---------------------------------------------------

var monthNames = [
	"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
	"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
	"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var weekday = [
	"อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"
];
//------------------------------------------ฟังก์ชั่น สำหรับ ปฎิทินไทย
function CalendarThai(date) {
	var w = new Date();
	var Week = weekday[w.getDay()];
	var year = date.getFullYear() + 543;
	var month = monthNames[date.getMonth()];
	var numOfDay = date.getDate();

	return "วันที่ปัจจุบัน" + "&nbsp;" + Week + '&nbsp' + 'ที่' + '&nbsp;' + numOfDay + '&nbsp;' + month + '&nbsp;' + year;

}
//------------------------------------------ฟังก์ชั่น สำหรับ ปฎิทินไทย หน้ายืมคืน status
function CalendarThai_status() {
	var w = new Date();
	var Week = weekday[w.getDay()];
	var year = w.getFullYear() + 543;
	var month = monthNames[w.getMonth()];
	var numOfDay = w.getDate();
	// console.log(numOfDay);
	var txt = "วัน" + Week + '&nbsp' + 'ที่' + '&nbsp;' + numOfDay + '&nbsp;' + month + '&nbsp;' + year;
	document.getElementById('lb-dayupdate').innerHTML = txt;
}
var time = new Date();
//console.log(det);	
var daypop = new Date();
/*-------------------------------ฟังก์ชั่นคำนวนวันที่ปฎิทิน หน้าต่างกำหนดวันคืนหนังสือ-----------------------------------------------*/
function Func_popudayfix(time) {
	//console.log("test");

	var det = time;
	//console.log(det);
	if (det == '') {
		var det = new Date();

	}
	var monthNames = [
		"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
		"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
		"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
	];
	var weekday = [
		"อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"
	];
	det.setDate(1);
	//console.log("test");
	var day = det.getDay();
	//console.log(day);
	var datend = new Date(det.getFullYear(), det.getMonth() + 1, 0).getDate();
	//console.log(datend);
	var prevDate = new Date(det.getFullYear(), det.getMonth(), 0).getDate();
	var today = new Date();
	var dday = new Date();
	var cells = '';
	var LiHTML = '';
	var arr_push = [];
	var arr_d = [];
	var arr_day = [];
	for (var dx = 1; dx <= datend; dx++) {
		arr_d.push(dx);
	}
	for (var x = day; x > 0; x--) {
		cells += "<div  class='prev_datepop'>" + (prevDate - x + 1) + "</div>";
		//console.log(cells);
	}
	for (var i = 0; i < arr_d.length; i++) {
		if (arr_d[i] == today.getDate() && det.getMonth() == today.getMonth()) {
			cells += "<div  class='todaypop' id-data =" + det.getFullYear() + '-' + [det.getMonth() + 1] + '-' + arr_d[i] + " id1=" + arr_d[i] + '-' + [det.getMonth() + 1] + '-' + det.getFullYear() + " id='Enddaypop' >" + arr_d[i] + "</div>";
		} else {
			//console.log(det.getFullYear());
			cells += "<div id-data =" + det.getFullYear() + '-' + [det.getMonth() + 1] + '-' + arr_d[i] + " id1=" + arr_d[i] + '-' + [det.getMonth() + 1] + '-' + det.getFullYear() + " id='Enddaypop'>" + arr_d[i] + "</div>";
			//console.log(cells);
		}
	}
	var monthtxt = monthNames[det.getMonth()] + '&nbsp;' + det.getFullYear();
	//console.log(monthtxt);
	document.getElementsByClassName("dayspop_fixday")[0].innerHTML = cells;
	// console.log(daypop);
	document.getElementById("date_strpop_fixday").innerHTML = CalendarThai(daypop);
	//console.log(cells);
	document.getElementById("monthpop_fixday").innerHTML = monthtxt;
	popup_dateFix_sendbook();
}
////------------------------------------------ฟังก์ชั่น สำหรับ แสดงข้อมูลปฎิทินเดือนถัดไป				
function moveDatepopdayfix(para) {
	if (para == 'prev') {
		time.setMonth(time.getMonth() - 1);
	} else if (para == 'next') {
		time.setMonth(time.getMonth() + 1);
		//console.log(time);
		//var today = dt.setMonth(dt.getMonth() + 1);
	}
	//console.log(time);
	Func_popudayfix(time);
}
//---------------------------------function reset วันที่ในปฏิทิน-------------------------------------
function func_resetDay() {
	var ddday = new Date();
	time.setMonth(ddday.getMonth());
	time.setFullYear(ddday.getFullYear(), ddday.getMonth(), ddday.getDate());
	//console.log(time);
}
/*--------------------------------ฟังก์ชั่น แสดงค่าหนังสือทั้งหมด จำนวนสมาชิกทั้งหมด */
function Func_show_statustotal() {
	// console.log('test-check status ');
	$.ajax({
		url: "../phpsv/showstatusallbooks.php",
		method: "POST",
		dataType: "json",
		success: function (data) {
			//console.log(data[0].totaledu);
			$('.count-totalbooks').text(data[0].numask);
			$('.count-novel').text(data[0].totalFbk);
			$('.count-learning').text(data[0].totaledu);
			$('.count-user').text(data[0].totaluser);

		}
	})

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
				window.location.href = "../assets/lo-gin.php";
			} else {
				alert("error Logout User");

			}
		}



	})
}
