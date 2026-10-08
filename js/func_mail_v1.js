// ---------------------------------------------แท็บเมนู ยืม คืน จอง ค่าปรับ---------------------
// ---------------------------------------------แท็บเมนู ยืม คืน จอง ค่าปรับ---------------------
var childwin;
const childname = "popup";
function openChild() {
	// var w = 300;
	// var h = 300;
	// var left = (window.screen.width/1)-(w/2);
	// var top = (window.screen.height/1)-(h/2);
	// var win = window.open("http://192.168.49.2/budlib/assets/user-index.php", "_blank", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h);
	// win.moveTo(left, top);
	//   sendMessage_keyInputUser(arr_data);
	childwin = window.open('http://192.168.49.2/budlib/assets/user-index.php', childname);
	// childwin =window.open('http://localhost:3000/budlib/assets/user-index.php', childname);
}
function sendMessage_keyInputUser(data) {
	// console.log('test--send postmsg');
	var channel = new BroadcastChannel("foo");
	let msg = JSON.stringify(data);
	channel.postMessage(msg);
}
$(document).ready(function () {
	localStorage.setItem("str_pg", 1);
	document.getElementById('foolterset-css').innerText = '© 2023, made with  by As St.Head';
	// func_testarry();
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
	sendMessage_keyInputUser(arr_data);
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
		/*alert(status);*/
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
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);

			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 2) {
				//alert("ตำราภาษาอังกฤษ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'F') {
				//alert("นิยาย+นวนิยาย");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
				/* alert("นิยาย+นวนิยาย");*/
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '5') {
				//alert("Pk");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '8') {
				//alert("ธรรมะ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'R') {
				//alert("อ้างอิง");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				alert("หนังสืออ้างอิง (R) ไม่สามารถยืมในระบบได้");
				//myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);;
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'G') {
				//alert("สิ่งพิมพ์ รบ");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == 'T') {
				//alert("รายงานวิจัย");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);
			}
			else if (iptval_bcodeuser.length == 6 && iptval_bcodeuser[0] == '3') {
				//alert("นิตยสาร");
				var iptValIDBook = $('.txt_barCode').val();
				var iptValIDU = $('.ipt_numbarCode').text();
				var iptClass = $('.ipt_ClassPo').val();
				var clickYes = 0;
				func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes);

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
				sendDATA_Bcode(iptval_bcodeuser);
				$('.tb_list_inputbook').html("");
				$('.tb_list_cirulation').html("");
			}/*end ifelseiptval_bcodeuser.length == 6 && iptval_bcodeuser[0]== 1 */
			$('.txt_barCode').val("");
		}

	}


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
function clickeopentab() {
	window.open("../file-page/books-hit.php");
}
///-----------------------------------------------------------------popup เงื่อนไขถามว่าต้องการให้ยืมมากกว่า 5 รายการหรือไม่-----------------------------------------------

function unlockLimitbook(iptValIDBook, unLimit) {
	// console.log('test');

	var boxpopunlimitbook = document.getElementById('boxModal_unlimitbook');
	boxpopunlimitbook.style.display = "block";
	$('.txtshocode').text(iptValIDBook);

	$(document).on('click', '.close_unlimitbook', function () {
		boxpopunlimitbook.style.display = "none";

	})
	$(document).on('click', '.btn_no', function () {
		boxpopunlimitbook.style.display = "none";
	})

}
//--------------------------------------------------------ฟังก์ชั่น เมื่อกด yes เพื่อยืมหนังสือมากกว่า 5 รายการ -----------------------------------
function myContinueBook() {
	var boxpopunlimitbook = document.getElementById('boxModal_unlimitbook');
	boxpopunlimitbook.style.display = "none";

	var iptValIDBook = $('.txtshocode').text();
	var clickYes = $('.btn_yes').attr('id');
	var iptValIDU = $('#ipt_numbarCode').text();
	var iptClass = $('.ipt_ClassPo').val();
	//alert(iptValIDBook);
	myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);
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
/*--------------------------------ฟังก์ชั่น โมเดลบ๊อปอัพค้นหารายชื่อสมาชิก  -popup search user Funciton-----------------------------------------------------------------------*/
function clk_popSearch() {
	var boxpopSearch = document.getElementById('boxModal_popSearch');
	boxpopSearch.style.display = "block";

	$(document).on('click', '.close_popSearch', function () {
		boxpopSearch.style.display = "none";
	})
	$(document).on('keyup', '.ipt_popSearch', function () {
		var d = $(this).val();
		// console.log(d);
		var html = '';
		$.ajax({
			url: "../phpsv/SearchUser.php",
			method: "POST",
			data: { d: d },
			dataType: "json",
			success: function (data) {

				if (data == null) {
					stop;
				} else {
					if (data.length > 0) {
						// console.log(data);
						for (var count = 0; count < data.length; count++) {
							html += '<tr class="Boxlistus" data-id="' + data[count].IDUSERCODE + '">';
							html += '<td>' + data[count].IDUSERCODE + '</td>';
							html += '<td>' + data[count].FNAME + '</td>';
							html += '<td>' + data[count].LNAME + '</td>';
							html += '<td>' + data[count].POSITION + '</td>';
							html += '</tr>';
						}
						$('.boxmodal_list_user').html(html);
					}
					else {
						html = '<tr><td>NO Data Found</td></tr>';
					}
					$('.boxmodal_list_user').html(html);
				}
			}

		});


	});
	$('.ipt_popSearch').val("");

}
$(document).on('click', '.Boxlistus', function () {
	var boxpopSearch = document.getElementById('boxModal_popSearch');
	$('.tb_list_inputbook').html("");
	$('.tb_list_cirulation').html("");
	var iptval_bcodeuser = $(this).data('id');
	boxpopSearch.style.display = "none";
	sendDATA_Bcode_SearchUser(iptval_bcodeuser);
	OpenTable();
})
/*---------------------------------------------------ฟังก์ชั่น ส่งดาต้า เอเจ็กไปphp barcode แสดงข้อมูลหน้ายืมหนังสือ--------------------------*/
function sendDATA_Bcode_SearchUser(iptval_bcodeuser) {
	var iduser = $('.ipt_numbarCode').val();
	var pic = 'who.jpg';
	var numR = Math.random();
	var ele = document.getElementById('icon-alertred-order');
	const arr = [];
	//console.log(iptval_bcodeuser);
	//console.log("ทดสอบ");
	// console.log("sendDATA_Bcode_SearchUser");
	$('.ipt_limitItem').val("");
	$.ajax({

		url: "../phpsv/showdetail_user.php",
		method: "POST",
		data: { iptval_bcodeuser: iptval_bcodeuser },
		dataType: "json",
		success: function (data) {
			// console.log(data);
			var iduser = data.IDUSERCODE;
			if (data.strOrder == 1) {
				ele.style.display = 'inline-block';
				ele.innerText = data.countorDer;
			} else {
				ele.style.display = 'none';
				ele.innerText = "";
			}
			//$('.box_cir_pic').html('<img class="img_box" src="'+'..'+/imageuser/+''+data.IMAGEFILE+'">');
			$('.ipt_numbarCode').text(data.IDUSERCODE);
			$('.ipt_Fname').text(data.FNAME);
			$('.ipt_Lname').text(data.LNAME);
			$('.ipt_position').text(data.POSITION);
			$('.ipt_ClassPo').val(data.CLASSPOSITION);
			$('.lb-memotxt-p1js').text(data.rangtxt);
			//console.log(data.IMAGEFILE);
			if (data.IMAGEFILE != "") {
				//console.log(pic);
				$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /imageuser/ + '' + data.IMAGEFILE + '?v=' + numR + '">');
			} else {
				//console.log(pic);
				$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /fileimage/ + '' + pic + '">');
			}
			data['state_fix'] = "SHUSER";
			arr.push(data);
			sendMessage_keyInputUser(arr)
			func_click_show_fines(iduser);
			//console.log(data.CLASSPOSITION);
		}

	});
	/*	$('.txt_barCode').val("");*/


	OpenTable();
}
//----------------------------------------------------ฟังก์ชั่นเมนูปริ้น รายงานการยืมทรัพยากรณ์ห้องสมุด--------------------------------------------------------------//		
function PrintListbook() {
	//window.print(data);
	//console.log("test");
	var iptValIDU, name, lname, position, mass, countrenew, product;
	iptValIDU = $('.ipt_numbarCode').text();
	name = $('.ipt_Fname').text();
	lname = $('.ipt_Lname').text();
	position = $('.ipt_position').text();
	mass = $('.ipt_limitItem').text();
	countrenew = $('.ipt_footer_countrenew').val();
	product = $('.ipt_footer_product').val();
	// alert(position);
	// console.log(iptValIDU+name+position+mass+countrenew+product);
	if (iptValIDU.length == 0) {
		alert("กรุณาใส่โค้ดผู้ใช้บริการ");
	} else {
		$.ajax({
			url: "../phpsv/Print_List_exbook.php",
			method: "POST",
			data: { iptValIDU: iptValIDU, name: name, lname: lname, position: position, mass: mass, countrenew: countrenew, product: product },
			dataType: "text",
			success: function (data) {
				//console.log(data);
				window.open(data, '_blank');

			}
		})

	}

}
//----------------------------------------------------------ฟังก์ชั่น popup ค้นหาประวัติการยืมหนังสือ---------------------------------------------------------------------------		
function SearchResumeBooks() {
	var boxpopSearch_resume = document.getElementById('boxModal_popSearch_resu');
	boxpopSearch_resume.style.display = "block";
	var iptValIDU = $('.ipt_numbarCode').text();
	var iptSearch = '';
	/*alert(iptValIDU);
	alert(iptSearch);*/
	senAjaxSearchresumebook(iptValIDU, iptSearch);
	$('.close_popSearch_resu').click(function () {
		iptSearch = $('.ipt_popSearch_resu').val("")
		boxpopSearch_resume.style.display = "none";

	})

	$('.ipt_popSearch_resu').keyup(function () {
		var iptValIDU = $('.ipt_numbarCode').text();
		var iptSearch = $(this).val()
		senAjaxSearchresumebook(iptValIDU, iptSearch);

	});
}
function _forMatDat(endd, start) {
	//  console.log(endd+"|"+start);
	if (endd != 0) {
		const date = new Date(endd);
		const dayEnd = date.toLocaleDateString('en-GB');
		endd = dayEnd;
	} else {
		endd = "";
		// var dayEnd = '';
	}
	if (start != 0) {
		const dataStart = new Date(start);
		const dStart = dataStart.toLocaleDateString('en-GB');
		start = dStart;
	} else {
		start = "";
	}
	// console.log(endd);		
	return { endd, start }

}
// -------------------------------------ฟังก์ชั่น ajax ค้นหาประวัติการยืมหนังสือ----------
function senAjaxSearchresumebook(iptValIDU, iptSearch) {
	$.ajax({
		url: "../phpsv/Search_resumebook.php",
		method: "POST",
		data: { iptValIDU: iptValIDU, iptSearch: iptSearch },
		dataType: "json",
		success: function (data) {
			var htmlList = '';
			/*alert(data.length);*/
			// console.log(data);
			if (data != null) {
				for (i = 0; i < data.length; i++) {

					htmlList += '<tr>';
					htmlList += '<td>' + data[i].ID_ex_barcodebook + '</td>';
					htmlList += '<td>' + data[i].NAME_BOOK + '</td>';
					htmlList += '<td>' + _forMatDat(data[i].Day_end, 0).endd + '</td>';
					htmlList += '</tr>';

				}

			}

			$('.td-list-seachresu').html(htmlList);

		}
	})
}
// var div = getElementsByClassName();
///-----------------------------------------------------------------popupสำหรับกำหนดวันคืนหนังสือเอง link fixday-------------------
function myFixDay() {
	//console.log("test");		
	var tbHTML = '';
	var arr_book = [];
	/* var rows = document.getElementsByTagName(*/
	var rows = document.querySelectorAll(".tr_List"),
		/*rows = table.getElementsByClassName('tr_List'),*/
		i, j, cells, bookID, day, dayEnd;
	//console.log(rows);
	for (i = 0, j = rows.length; i < j; ++i) {
		cells = rows[i].getElementsByTagName('td');
		day = rows[i].getElementsByClassName('tbdn');

		/*arr_book.push(cells[1].innerHTML);*/
		bookID = cells[1].innerHTML;
		dayEnd = cells[3].getElementsByTagName('span')[0].innerText;
		/*alert(arr_book);*/
		//  console.log(cells[3].getElementsByTagName('span')[0].innerText);
		tbHTML += '<tr>';
		tbHTML += '<td>';
		tbHTML += '<div class="checkbox-fade fade-in-danger">';
		tbHTML += '<label>';
		tbHTML += '<input type="checkbox" name="checkbox_lists" id="' + dayEnd + '" id1="' + bookID + '" class="chkboxfix">';
		tbHTML += '<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span><span class="sp_fixdate">' + bookID + '</span><span>' + dayEnd + '</span>';
		tbHTML += '</label>';
		tbHTML += '</div>';
		tbHTML += '<td>';
		tbHTML += '</tr>';
		$('.tbboxlistfixday').html(tbHTML);
		// console.log(tbHTML);				
	}
	// console.log(bookID);
	if (bookID != null) {
		/*alert(data_arr.length);*/
		var boxpopFixday = document.getElementById('boxModal_fixday');
		boxpopFixday.style.display = "block";

		$(document).on('click', '.close_fixday', function () {
			boxpopFixday.style.display = "none";
		})
		$(document).on('click', '.btn_nofixday', function () {
			boxpopFixday.style.display = "none";

		})

	}

}
//  var re = "18/7/2024";
//  _dayFormat_Reset(re);
function _dayFormat_Reset(re) {
	//  console.log(Date.parse('12-7-2024'));
	// var todayDate = new Date('12-7-2024').toISOString().slice(0, 10);
	// console.log(todayDate);
	// var now = new Date(re);
	// var dateString = moment(now).format('DD-MM-YYYYYYYY-MM-DD');
	// console.log(dateString);
	//  const nn =  new Date(re).toISOString().slice(0, 10).split('-').reverse().join('/');//new Date(Date.now()).toLocaleString()

	// const str = re.replace("/", );	
	const myArray = re.split("/");
	var dd = myArray[0];
	const mm = myArray[1] - 1;
	const y = myArray[2];
	//  console.log(dd,mm,y);
	const nDate = new Date(y, mm, dd)
	const date = new Date(Date.UTC(y, mm, dd));
	// Results below assume UTC timezone - your results may vary
	var todayDate = new Date(date).toISOString().slice(0, 10);
	// console.log(todayDate);
	return todayDate;
	// Specify default date formatting for language (locale)
	// console.log(new Intl.DateTimeFormat('en-US').format(date));
	// console.log(nDate);
	// return nDate;
	// วันที่ แบบไทย
	/*const date = new Date('12/07/2024');
	const result = date.toLocaleDateString('th-TH', {
	  year: 'numeric',
	  month: 'long',
	  day: 'numeric',
	  weekday: 'long',
	})*/
	// แบบ  us en	 
	// const str = new Date(re).toLocaleString('en-US', { timeZone: 'Asia/Jakarta' });
	// console.log(str);
}
//-----------------------------------------------------คำสั่งส่งไฟล์ไปที่ ajax เพื่อกำหนดวันคืนหนังสือ---link fixday---------------------------------------------------------------------
function clk_sendAjaxFixAay() {
	var arr_day = [];
	var arr_idbook = [];
	$('.chkboxfix:checked').each(function (i) {



		arr_day[i] = _dayFormat_Reset($(this).attr('id'));
		arr_idbook[i] = $(this).attr('id1');
		//  console.log($(this).attr('id'));

		// console.log(arr_day[i]);
	})
	var fixdate = $('.fixdayfull').attr('data-id');
	var iptValIDU = $('.ipt_numbarCode').text();
	var arrDayset = arr_day;
	var arrIdbook = arr_idbook
	//  console.log(fixdate+'//'+arrDayset+"//"+arrIdbook);		
	fixDaysenAjax(fixdate, arrDayset, arrIdbook, iptValIDU);
}
//-----------------------------------------------------------คำสั่ง ajax  ส่งไฟล์ไป php เพื่อกำหนดวันคืนเอง---link fixday-----------------------------------------											
function fixDaysenAjax(fixdate, arrDayset, arrIdbook, iptValIDU) {
	var boxpopFixday = document.getElementById('boxModal_fixday');

	// console.log(fixdate);
	// console.log(arrDayset);
	// console.log(arrIdbook);
	// console.log(iptValIDU);
	if (fixdate == '') {
		alert('key data');
	} else if (arrIdbook == '') {
		alert('Select books');
	} else {
		$.ajax({
			url: "../phpsv/fixdate.php",
			method: "POST",
			data: { fixdate: fixdate, arrDayset: arrDayset, arrIdbook: arrIdbook },
			dataType: "text",
			success: function (data) {
				//   console.log(data);
				var iptValIDBook = 0, iptClass = 0;
				OpenShowlistbook(iptValIDBook, iptValIDU, iptClass);
				openShowListFiness(iptValIDU);
			}
		})
		boxpopFixday.style.display = "none";
	}
}
/*-------------------------------บอปอัพหน้าต่างกำนหดวันคืนหนังสือ--------------------------------------------------*/
function popup_dateFix_sendbook() {
	var popup = document.getElementById("boxModal_popCalanfixday");
	var idbook = document.getElementById("tbHTML_List_select");
	var attr_main = document.getElementById("fixday_books");
	popup.style.display = "block";
	idbook.style.display = "none";
	$('.close_popCalanfixday').click(function () {
		func_resetDay();
		//console.log(time);
		popup.style.display = "none";
		idbook.style.display = "block";
	})
	$(document).on('this, dblclick', '#Enddaypop', function () {
		var day = this.getAttribute("id1");
		// console.log(day);
		var iddayInput = this.getAttribute("id-data");
		document.getElementById("fixday_books").value = day;
		var newAtt = document.createAttribute('data-id');
		newAtt.value = iddayInput;
		attr_main.setAttributeNode(newAtt);
		//console.log(iddayInput);
		popup.style.display = 'none';
		idbook.style.display = "block";

	})

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
//---------------------------------function reNewBooks -----------------------------------------------------------------				
function mYfunReNewBooks() {
	var itembook = [];
	/*var iptValIDU_arr = [];
	var iptClass_arr = [];
	var statusRenew_arr = [];*/
	/*alert(iduser);
	alert(statusRenew);*/
	// console.log("renew");
	$('.tbcheckbox:checked').each(function (i) {
		itembook[i] = $(this).attr('id');
		//   console.log(itembook[i]);
		iptValIDU_arr = $('.ipt_numbarCode').text();
		iptClass_arr = $('.ipt_ClassPo').val();
		statusRenew_arr = $('.mb_icon_renew').attr('id');
		/*alert(itembook[i]) */

	});
	if (itembook.length === 0) {
		alert(" Plz select checkbox");
	} else {
		/*alert(itembook);*/
		var iptValIDBook = itembook;
		var iptValIDU = iptValIDU_arr;
		var iptClass = iptClass_arr;
		var statusRenew = statusRenew_arr;
		/*console.log(iptValIDBook);
		console.log(iptValIDU);
		console.log(iptClass);
		console.log(statusRenew);*/
		senDataAjaxRenewbook(iptValIDBook, iptValIDU, iptClass, statusRenew);
	}
}
function senDataAjaxRenewbook(iptValIDBook, iptValIDU, iptClass, statusRenew) {
	/*alert(iptValIDBook);
	alert(iptValIDU);
	alert(statusRenew);*/
	//	console.log(iptValIDBook);
	$.ajax({
		url: "../phpsv/reNew_chkoverday.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass, statusRenew: statusRenew },
		dataType: "text",
		success: function (data) {
			//console.log(data.length);
			//console.log(data);

			if (data != null) {
				//console.log("test order");
				if (data == "2") {
					alert("error myfunction_Cash!!");
				}


			}				//console.log("test est");

		}
	})
	$.ajax({
		url: "../phpsv/reNewBoook.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass, statusRenew: statusRenew },
		dataType: "json",
		success: function (callback) {
			//console.log(callback);
			if (callback != null) {
				for (var i = 0; i < callback.length; i++) {
					//console.log(data[i].str);

					if (callback[i].str == 1) {
						alert(callback[i].orderdtail);

					}


				}

			}
			openShowListFiness(iptValIDU);
			OpenShowlistbook(iptValIDBook, iptValIDU, iptClass);
		}

	})

}
/*----------------------ฟังก์ชั่น close table list ให้ตารางรายการยืมแสดงเป็นค่าว่าง หรือ ไม่แสดงผลอะไร---------------------------------------------------------------*/
function closeTblistnamebook() {
	var old = "";
	$(".tb_list_cirulation").html(old);
	$('#tb_list_fines').html(old);
}
/*--------------------------------------------ฟังก์ชั่น ยกเลิกการแสดงข้อมูล ผู้ยืมหนังสือ หน้าต่างยืม------------------------------------------------*/
function calcel_Showdetail() {
	let data = [{ state_fix: "CANCEL" }]
	$('.ipt_numbarCode').text("");
	$('.ipt_Fname').text("");
	$('.ipt_Lname').text("");
	$('.ipt_position').text("");
	$('.ipt_ClassPo').text("");
	$('.lb-memotxt-p1js').text("");
	$('.img_box').attr('src', "../fileimage/images-personal-icon.png");
	document.getElementById('id-text-lb-p1-msg').style.display = "none";
	$('.txt_barCode').val("");
	$('.ipt_footer_countrenew').val("");
	$('.ipt_footer_product').val("");
	$('.tbHTML_List_select').html("");
	$('.boxmodal_list_user_resu').html("");
	$('.box_ListOrderbooks').html("");
	$('.tb_list_cirulation').html("");
	$('.ipt_porderbook').val("");
	$('.ipt_dayorder').val("");
	$('.ipt_footer_fines').val("");
	$('.ipt_footer_cash').val("");
	$('.tb_list_inputbook').html("");
	document.getElementById('icon-alertred-order').style.display = 'none';
	sendMessage_keyInputUser(data);
	/*OpenTableNO();*/

}
/*-------------------------ฟังก์ชั่น เมื่อคลิก btn เรียกแสดงรายการที่ยืมหนังสือ-----------------------------------------------*/
function OpenListbook() {
	var iptValIDU = $('.ipt_numbarCode').text();
	/*alert(iptValIDU);*/
	var d = 0;
	var t = 0;
	var iptValIDBook = d;
	var iptClass = t;
	// console.log(iptValIDU);
	if (iptValIDU != '') {
		OpenShowlistbook(iptValIDBook, iptValIDU, iptClass);
		showProduct(iptValIDBook, iptValIDU, iptClass);
		OpenTable();
	}

}
//--------------------------------------------------------------------ฟังขั่นแสดงรายการยืมBook----------------------------------	 	
function OpenShowlistbook(iptValIDBook, iptValIDU, iptClass) {


	/*alert(iptValIDBook);*/
	var FIHTML = '';
	/*var dstart = new Date(data[t].Day_start).toLocaleString('en', {
		month: 'numeric',
		day: 'numeric',
		year: 'numeric',
	  });*/
	let arr_all = [];
	// console.log(ds[2]);		
	$.ajax({
		url: "../phpsv/adlistbook.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass },
		dataType: "json",
		success: function (data) {
			/*alert(data);*/
			// console.log(data);										
			if (data == null) {
				stop;
			} else if (data.length > 0) {
				for (var t = 0; t < data.length; t++) {
					//   console.log(txt);		
					// var txt = data[t].Day_end;													
					FIHTML += '<tr class="tr_exbooks tr_List" id="' + data[t].ID_ex_barcodebook + '">';
					FIHTML += '<td class="tbcheck_fines">';
					FIHTML += '<div class="checkbox-fade fade-in-danger">';
					FIHTML += '<label>';
					FIHTML += '<input type="checkbox" value="" name="checkbox_fines" id="' + data[t].ID_ex_barcodebook + '" class="tbcheckbox">';
					FIHTML += '<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span>';
					FIHTML += '</label></div>';
					FIHTML += '</td';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines"></td>';
					FIHTML += '<td id="tblist_fines" class="tbbar_fines">' + data[t].ID_ex_barcodebook + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + data[t].CATBOOK + '|' + data[t].BYNUM + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines" ><span class="label bg-danger" style="font-size: 16px;">' + _forMatDat(data[t].Day_end, 0).endd + '</span></td>';
					FIHTML += '<td id="tblist_fines" class="tbdc_fines">' + _forMatDat(0, data[t].Day_start).start + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">' + data[t].NAME_BOOK + '</td>';
					FIHTML += '</tr>';
				}
				data.forEach(item => {
					item['state_fix'] = "OPENLIST";
					// console.log(item);
					arr_all.push(item);
				})
				sendMessage_keyInputUser(arr_all);
			}
			$('.tb_list_cirulation').html(FIHTML);
			Func_show_statustotal();
		}
	})

}
/*-------------------------ฟังก์ชั่น ORder showlistdata booksเมื่อคลิกแสดงรายการจองหนังสือ-------------------------------------------------*/
function InsertdbOrderbooks(iptValIDBook, iptValIDU, ipt_dayorder, ipt_daycount, status) {
	/*alert(status);*/
	// console.log(ipt_dayorder);
	var orHTML = '';
	$.ajax({
		url: "../phpsv/Inser_dataOrderbook.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, ipt_dayorder: ipt_dayorder, ipt_daycount: ipt_daycount, status: status },
		dataType: "json",
		success: function (data) {
			//  console.log(data);													
			// console.log(data);
			if (data == null) {
				stop;
			} else if (data.length > 0) {
				for (var i = 0; i < data.length; i++) {
					orHTML += '<tr class="tr_LisOrderbook tr_cuzer" id="tr_LisOrderbook" id-data="' + data[i].IDbook_order + '">';
					orHTML += '<td class="td_headbarorder_num tr_cuzer">' + data[i].Order_book + '</td>';
					orHTML += '<td class="td_headbarorder_code tr_cuzer">' + data[i].IDbook_order + '</td>';
					orHTML += '<td class="td_headbarorder_day tr_cuzer"><span class="label bg-danger" style="font-size: 16px;">' + _forMatDat(data[i].order_day, 0).endd + '</span></td>';
					orHTML += '<td class="td_headbarorder_name tr_cuzer">' + data[i].NAME_BOOK + '</td>';
					if (data[i].strorder == 1) {
						orHTML += '<td class="td_headbarorder_code tr_cuzer"><label class="label bg-success">ready</label></td>';
					} else {
						orHTML += '<td class="td_headbarorder_code tr_cuzer"><label class="label bg-danger">Wait</label></td>';
					}
					orHTML += '</tr>';
				}
			}
			$('.box_ListOrderbooks').html(orHTML);
		}

	})
	var popOrderbook = document.getElementById('boxModal_porderbook');
	NoValues();
	popOrderbook.style.display = "none";
}
/*-------------------------ฟังก์ชั่น ดับเบิลคลิก ลบรายการจองหนังสือ-- กำลังแก้ไข-------*/
function MyFunc_DbClickSLCorderDel(x) {
	//console.log(x);
	var id = x.getAttribute("id-data");
	var iduser = document.getElementById('ipt_numbarCode').innerText;
	//console.log(iduser);

	var popup = document.getElementById("boxModal_popCleck");
	document.getElementById("lb_headCleck").innerText = "ลบหนังสือที่จองเลขที่:" + id;
	popup.style.display = "block";

	if (id != null) {
		$(document).on('click', '.bt_Cleck', function () {
			func_delListOrder(id, iduser);
		})
		$(document).on('click', '.close_popCleck', function () {
			popup.style.display = 'none';

		});

	}

}
function func_delListOrder(id, iduser) {
	//console.log(iduser);
	$.ajax({
		url: "../phpsv/DelOrderbook.php",
		method: "POST",
		data: { barcode: id, iduser: iduser },
		dataType: "text",
		success: function (data) {
			//	console.log(data);
			var orHTML = '';
			//console.log(data)
			if (data == "ER") {
				alert("Erroe:: Delete File -->func_delListOrder");
			} else if (data == "SUC") {
				var del_ele = document.querySelectorAll("#tr_LisOrderbook");
				//console.log(del_ele);
				del_ele.forEach(function (i, s) {
					var ele_id = i.getAttribute("id-data");
					if (ele_id === id) {
						//console.log(i);
						i.remove();
					}

				})

			}
			//	$('.box_ListOrderbooks').html(orHTML);

		}
	})
	var popup = document.getElementById("boxModal_popCleck");
	popup.style.display = "none";
}
//--------------------------------------------------ฟังก์ชั่นแสดงรายการทรัพยากรณ์ที่จอง----------------	
function SenAjaxOrder_sub(iptValIDBook, iptValIDU) {
	//alert(iptValIDBook);	
	var popOrderbook = document.getElementById('boxModal_porderbook');
	$.ajax({
		url: "../phpsv/checkOrderBooks.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU },
		dataType: "json",
		success: function (data) {
			//console.log(data);				
			if (data != "") {
				$('.ipt_porderbook').val(iptValIDBook);
				$('.ipt_dayorder').val(data[1]);
				$('.ipt_pordercount').val(data[0]);
				//$('.btn_enterOrder').focus();
				var popOrderbook = document.getElementById('boxModal_porderbook');
				popOrderbook.style.display = "block";
				$(document).on('click', '.close_porderbook', function () {
					popOrderbook.style.display = "none";
				})
				//popOrderbook.add		
			} else {
				//alert("ไม่สามารถจองได้ หนังสืออยู่บนชั้น");														
				var popup = document.getElementById("boxModal_popShowOrderelse");
				popup.style.display = "block";
				document.getElementById("btn-yespop").focus();
				$(document).on('click', '#btn-yespop', function () {
					popup.style.display = "none";
					func_adOrder_fix(iptValIDBook);
				})
				$(document).on('click', '.btn-nopop', function () {
					//console.log("test-click");														
					popup.style.display = "none";
					stop;
				});

			}
		}

	})
	//NoValues();
	// apiFetchLIstExportBooks(iptValIDU);								
}
// ------------------------------------------------ ฟังกฺชั่นแสดงข้อมูลวันที่จอง-----
function func_adOrder_fix(iptValIDBook) {
	var popOrderbook = document.getElementById('boxModal_porderbook');
	popOrderbook.style.display = "block";
	var d = new Date();
	var thenDay = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + (d.getDate() + 7);
	//console.log(thenDay);	
	$('.ipt_porderbook').val(iptValIDBook);
	$('.ipt_dayorder').val(thenDay);
	$('.ipt_pordercount').val("1");
	//$('.btn_enterOrder').focus();	
	//console.log(iptValIDBook+"||"+thenDay);	
	$(document).on('click', '.close_porderbook', function () {
		popOrderbook.style.display = "none";
	})
}
//--------------------------------------------------ฟังก์ชั่นinsertจองหนังสือ----
function click_adorDerInsert() {

	// console.log("stest ");
	var iptValIDU = $('.ipt_numbarCode').text();
	var iptValIDBook = $('.ipt_porderbook').val();
	var ipt_dayorder = $('.ipt_dayorder').val();
	var ipt_daycount = $('.ipt_pordercount').val();
	/*alert(ipt_daycount);*/
	var status = 1;
	//console.log(ipt_dayorder);
	InsertdbOrderbooks(iptValIDBook, iptValIDU, ipt_dayorder, ipt_daycount, status);
}
/*---------------------------------------------------ฟังก์ชั่น ตรวจวันหมดอายุสมาชิก-------------------------*/
function func_Check_ExpireUser_inputbook(iptValIDBook, iptValIDU, iptClass, clickYes) {
	var strPage = localStorage.getItem("str_pg");
	//  console.log('func_Check_ExpireUser_inputbook');
	if (strPage != 4) {
		if (iptValIDU != "") {
			// console.log('test-else-v1');
			$.ajax({
				url: "../phpsv/check_dateuser.php",
				method: "POST",
				data: { iduser: iptValIDU },
				dataType: "json",
				success: function (data) {
					//console.log(data);
					if (data[0].status == "F") {
						//alert("กรุณาต่ออายุสมาชิก")
						func_alertshow();
					} else if (data[0].status == "T") {
						// console.log("ไม่ต้องต่ออายุ");
						myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);
					} else {
						//console.log("ไม่เจอเลขสมาชิก");
						alert("Not Fount");
					}
				}
			})
		} else {
			// console.log('test-else');
			myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);

		}
	} else {
		//  console.log('test-else-v2');
		myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes);
	}
}
// <!-------------------------ฟังก์ชั่นรับค่าและมาแสดงในตารางด้านล่าง  รับข้อมูลจาก myFunction(e)------------------->
function myDataTableList(iptValIDBook, iptValIDU, iptClass, clickYes) {
	// console.log('myDataTableList' + iptValIDBook);
	// console.log(iptValIDBook+"barcode");
	// console.log(clickYes+"รหัสคลิก");
	// console.log(iptClass+"ระดับตำแหน่ง");
	// console.log(iptValIDU+"username");						
	var strPage = localStorage.getItem("str_pg");
	// console.log(strPage+"รหัสเพจ");
	if (strPage === "2") {
		//console.log(strPage);
		SenAjaxOrder_sub(iptValIDBook, iptValIDU);
	} else if (strPage != "2") {
		//	console.log("myDataTableList");										
		$.ajax({
			url: "../phpsv/detpicker.php",
			method: "POST",
			data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass, clickYes: clickYes, strpage: strPage },
			dataType: "text",
			success: function (data) {
				//  console.log(data);
				//alert(data);
				if (data == 1)//เช็คว่าหนังสือมีอยู่ในคลังหนังสือหรือไม่ หรือ บาร์โค้ดไม่ถูกต้อง
				{ alert("ไม่พบหนังสือหรือไม่มีเลขบาร์โค้ดนี้อยู่ในคลังหนังสือ"); }
				else if (data == 2)// เช็คว่าหนังสือถูกยืมแล้วหรือยัง
				{
					var storage = localStorage.getItem("str_pg");
					//console.log(storage);
					if (storage == 4) {
						// alert("คืน 4");//OpenTable_sent();																
						MyfunctionINputBooks(iptValIDBook, iptValIDU);
					} else {
						//alert("หนังสือถูกยืมแล้วด้วยคนเดียวกันกับไอดี");//OpenTable_sent();
						MyfunctionINputBooks(iptValIDBook, iptValIDU);
					}
				}
				else if (data == 5)//เช็คว่าใครยืมหนังสือ
				{
					//  alert("หนังสือถูกยืม");
					//----------------ไปที่คำสั่งคืนหนังสือ---
					$('.tb_list_inputbook').html("");
					MyfunctionINputBooks(iptValIDBook, iptValIDU);

				}
				else if (data == 3)//เช็คจำนวนการยืมว่ายืมครบหรือยัง
				{
					if (clickYes == 0) //if(clickYes.length == 0) รอตอบรับคำยืนยันให้ทำงานยื่มต่อได้ status = 1
					{
						//alert('data3');
						var unLimit,
							unLimit = 3;
						unlockLimitbook(iptValIDBook, unLimit);
					} else {
						// alert('data3/1');
						showAdListbook(iptValIDBook, iptValIDU, iptClass);
						showProduct(iptValIDBook, iptValIDU, iptClass);
						OpenTable();
						//$('.tb_list_inputbook').html("");
						$('.tb_list_cirulation').html("");

					}

				}
				else if (data == 4)// เช็คหนังสือถูกจองแล้วหรือยัง
				{
					alert("หนังสือถูกจอง");
					MyfunctionINputBooks(iptValIDBook, iptValIDU);
				}
				else if (data == 99) { alert("ไม่พบบาร์โค้ดผู้ยืมหนังสือ ไม่สารมารถยืมได้"); }
				else if (data == 35) {
					alert("กรุณาเลือกแถบเมนูยืมหนังสือ");
				} else if (data == "NO") {
					alert("กรุณาตรวจสอบ GMD  หากมีค่า 'R','JT','JE','JO' ไม่สามารถยืนได้");
				} else {
					//ยืม
					// alert('ท้ายสุด');
					showAdListbook(iptValIDBook, iptValIDU, iptClass);
					showProduct(iptValIDBook, iptValIDU, iptClass);
					OpenTable();
					//$('.tb_list_inputbook').html("");
					$('.tb_list_cirulation').html("");
				
				}

			}

		})
	}
	

}



//------------------------------------------------------------ฟังก์ชั่นสำหรับคืนหนังสือ หน้าเพจคืนหนังสือ --แก้ไขเป็น ฟังก์ชั่นเช็ควันหมดอายุสมาชิก---------------------------------
function MyfunctionINputBooks(iptValIDBook, iptValIDU) {
	var str_pg = localStorage.getItem("str_pg");
	//   console.log('MyfunctionINputBooks'+str_pg);	
	// alert(iptValIDBook);
	// alert(iptValIDU);
	//OpenTable_sent();
	// console.log(find);

	const ar_str = ["1", "3"];
	const find = ar_str.includes(str_pg);
	if (find === false) {
		// console.log(find);
		$.ajax({
			url: "../phpsv/chk_Orderbook.php",
			method: "POST",
			data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU },
			dataType: "json",
			success: function (data) {
				// console.log(data[0]);
				if (data[0] == 0) { // ไม่มีคนจองหนังสือต่อ
					// alert("ไม่มีจอง");								
					check_FinesbookFunction(iptValIDBook);
				} else {
					// alert("มีจอง");									
					check_FinesbookFunction(iptValIDBook);
				}
			}

		});
	}
	// console.log(iptValIDBook+ 'MyfunctionINputBooks');
	
}
// ----------------------------------------------------ฟังก์ชั่นตรวจเช็คและบันทึกค่าปรับหลังทำการคืนหนังสือ-------------------------------------
function check_FinesbookFunction(iptValIDBook) {
	//  console.log(iptValIDBook);
	$.ajax({
		url: "../phpsv/inser_fines.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook },
		success: function (data) {
			// console.log(data);					
			Func_insert_tablelist(iptValIDBook);
		}

	})

}
// -------------------------------------ฟังก์ชั่นแสดงรายการคืน
function Func_insert_tablelist(iptValIDBook) {
	// console.log('Func_insert_tablelist');
	// console.log(iptValIDBook);
	var strPage = localStorage.getItem("str_pg");
	// console.log("test input");
	//$('.tb_list_inputbook').html("");
	var code, name, lname, position, path_pic, rankclass, txtposition, HTML = '';
	var pic = 'who.jpg';
	var numR = Math.random();
	if (strPage == 4) {
		$.ajax({
			url: "../phpsv/inputbook.php",
			method: "POST",
			data: { iptValIDBook: iptValIDBook },
			dataType: "json",
			success: function (data) {
				// console.log(data);

				for (var i = 0; i < data.length; i++) {
					const dataEnd = new Date(data[i].dend);
					const dayEnd = dataEnd.getDate() + '/' + (dataEnd.getMonth() + 1) + '/' + dataEnd.getFullYear();
					const dataStart = new Date(data[i].dstary);
					const dStart = dataStart.getDate() + '/' + (dataStart.getMonth() + 1) + '/' + dataStart.getFullYear();
					code = '' + data[i].idu + '';
					name = '' + data[i].Fname + '';
					lname = '' + data[i].Lname + '';
					position = '' + data[i].position + '';
					path_pic = '' + data[i].pathpic + '';
					rankclass = data[i].rankclass;

					HTML += '<tr class="tr_inputbk" id="' + data[i].idbk + '">';
					HTML += '<td id="td_inputbk" class="td_inputbkno">#</td>';
					HTML += '<td id="td_inputbk" class="td_inputbkcode">' + data[i].idbk + '</td>';
					HTML += '<td id="td_inputbk" class="td_inputbkcat">' + data[i].cat + '|' + data[i].bynum + '</td>';
					HTML += '<td id="td_inputbk" class="td_inputbkdayend"><span class="label bg-danger" style="font-size: 16px;">' + _forMatDat(data[i].dend, 0).endd + '</span></td>';
					HTML += '<td id="td_inputbk" class="td_inputbkdaystart">' + _forMatDat(0, data[i].dstary).start + '</td>';
					HTML += '<td id="td_inputbk" class="td_inputbkname">' + data[i].namebook + '</td>';
					HTML += '</tr>';

				}

				$('.ipt_numbarCode').text(code);
				$('.ipt_Fname').text(name);
				$('.ipt_Lname').text(lname);
				$('.ipt_ClassPo').val(rankclass);
				// console.log(rankclass);
				if (rankclass == 0) {
					txtposition = "ไม่พบตำแหน่งข้อมูลผู้ใช้บริการ";
				} else if (rankclass == 1) {
					txtposition = "พยาบาล";
				} else if (rankclass == 2) {
					txtposition = "ผู้ช่วยเหลือคนไข้";
				} else if (rankclass == 3) {
					txtposition = "นิสิตแพทย์";
				} else if (rankclass == 4) {
					txtposition = "นักศึกษาฝึกงาน";
				} else if (rankclass == 5) {
					txtposition = "เจ้าหน้าที่ รพ";
				} else if (rankclass == 6) {
					txtposition = "เภสัช";
				} else if (rankclass == 7) {
					txtposition = "บุคคลภายนอก";
				} else if (rankclass == 8) {
					txtposition = "อาจารย์แพทย";
				} else if (rankclass == 9) {
					txtposition = "แพทย์้";
				} else {
					txtposition = "ไม่มีข้อมูลตรวจเช็คตำแหน่งสมาชิก";
				}
				$('.ipt_position').text(txtposition);
				$('.lb-memotxt-p1js').text(position);
				$('.tb_list_inputbook').append(HTML);
				func_strcolor_Row(iptValIDBook);
				if (path_pic != "") {
					$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /imageuser/ + '' + path_pic + '?v=' + numR + '">');
				} else {
					$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /fileimage/ + '' + pic + '">');
				}
				var iptValIDU = code;				
				data[0]['state_fix'] = "RETURNBK";
				$('.tb_list_cirulation').html("");
				FunC_ShowpopOrder_after_inputbk(iptValIDBook);
				openShowListFiness(iptValIDU);
				// console.log(iptValIDU);
				sendMessage_keyInputUser(data);				
			}


		});
	
		
		//	OpenTable_sent();

	} else {
		alert("กรุณาเลือกแถบเมนูคืนหนังสือ");
		FunC_ShowpopOrder_after_inputbk(iptValIDBook);
	}

}
// -------------------------------------ฟังก์ชั่นแสดงแทบสีแถวคืนหนังสือ	
function func_strcolor_Row(iptValIDBook) {
	// console.log('func_strcolor_Row');

	var idROWs = iptValIDBook;

	//console.log(id);
	var btns = document.querySelectorAll(".tr_inputbk");
	//btns.getAttribute("id1")
	//console.log(btns.attributes[3].value);
	for (var i = 0; i < btns.length; i++) {
		//console.log(btns[i].getAttribute("id"));				
		if (btns[i].getAttribute("id") == idROWs) {
			btns[i].style.backgroundColor = '#FFB8A0';
			btns[i].style.color = 'white';
			//mYFunc_AllHub(id);
			Func_show_statustotal();
		} else {
			btns[i].style.backgroundColor = '';
			btns[i].style.color = '#777777';
		}
	}

}
// -------------------------------------ฟังก์ชั่นป๊อบอัพแจ้งเตื่อนผู้จองหนังสือหากมีการคืนหนังสือ	
function FunC_ShowpopOrder_after_inputbk(iptValIDBook) {
	// console.log('FunC_ShowpopOrder_after_inputbk');
	var popup = document.getElementById("boxModal_popShowOrder");
	$.ajax({
		url: "../phpsv/chk_Orderbook.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook },
		dataType: "json",
		success: function (data) {
			//console.log(data);
			if (data[0] == 1) { // ==0 ไม่มีจอง
				popup.style.display = "block";//มีจอง
				$('#msg_order').html('&nbsp;ลำดับที่:&nbsp;' + data[5] + '&nbsp;' + data[3] + '&nbsp;' + data[4]);
				$(document).on('click', '.close_popShowOrder', function () {
					popup.style.display = 'none';
					localStorage.removeItem("useriddel");
					stop;
				});
			} else {
				stop;
			}

		}

	});
}
//console.log(data[0]);						
//popup.style.display ="block";

//-----------------------------------------------------------ฟังก์ชั่น แสดงรายการที่คีย์ยืมหนังสือ -------------------------//			
function showAdListbook(iptValIDBook, iptValIDU, iptClass) {
	/*alert(iptValIDU);*/
	// console.log('showAdListbook');
	const item = [];
	const arr_all = [];
	$.ajax({
		url: "../phpsv/adlistbook.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass },
		dataType: "json",
		success: function (data) {
			//  console.log(data);
			var FIHTML = '';
			if (data.length > 0) {
				for (var t = 0; t < data.length; t++) {
					// console.log(data[t].Day_end);							
					FIHTML += '<tr class="tr_exbooks tr_List" id="' + data[t].ID_ex_barcodebook + '">';
					FIHTML += '<td class="tbcheck_fines">';
					FIHTML += '<div class="checkbox-fade fade-in-danger">';
					FIHTML += '<label>';
					FIHTML += '<input type="checkbox" value="" name="checkbox_fines" id="' + data[t].ID_ex_barcodebook + '" class="tbcheckbox">';
					FIHTML += '<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span>';
					FIHTML += '</label></div>';
					FIHTML += '</td';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines"></td>';
					FIHTML += '<td id="tblist_fines" class="tbbar_fines">' + data[t].ID_ex_barcodebook + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + data[t].CATBOOK + '|' + data[t].BYNUM + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbdn_fines"><span class="label bg-danger" style="font-size: 16px;">' + _forMatDat(data[t].Day_end, 0).endd + '</span></td>';
					FIHTML += '<td id="tblist_fines" class="tbdc_fines">' + _forMatDat(0, data[t].Day_start).start + '</td>';
					FIHTML += '<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">' + data[t].NAME_BOOK + '</td>';
					FIHTML += '</tr>';

				}
				data.forEach(item => {
					item['state_fix'] = "INBK";
					item['inputCode'] = iptValIDBook;
					// console.log(item);
					arr_all.push(item);
				})
				sendMessage_keyInputUser(arr_all);

			}
			$('.tb_list_cirulation').html(FIHTML);
			Func_show_statustotal();
			//console.log(iptValIDBook);
			func_fixTabColor_exbooks(iptValIDBook);

		}
	})
	//func_fixTabColor_exbooks(iptValIDBook);
}

//-------------------------------------------------ฟังก์ชั่น -----------sho data จำนวนครั้งต่อหนังสือ กับ ทรัพยากรณ์ทียืม----------------------------------		
function showProduct(iptValIDBook, iptValIDU, iptClass) {
	$.ajax({
		url: "../phpsv/showProduct.php",
		method: "POST",
		data: { iptValIDBook: iptValIDBook, iptValIDU: iptValIDU, iptClass: iptClass },
		dataType: "json",
		success: function (data) {
			var ipt = '';
			var countDay, countBooks;
			countDay = data[0];
			countBooks = data[1];
			$('.ipt_footer_countrenew').val(countDay);
			$('.ipt_footer_product').val(countBooks);
		}

	})
}
//-----------------------------------------------------------------ฟังก์ชั่นคลิกเรียกรายการยืมของผู้ยืม-----------------------------------------	
function func_fixTabColor_exbooks(iptValIDBook) {
	//console.log(iptValIDBook);
	var btns = document.querySelectorAll(".tr_exbooks");
	//btns.getAttribute("id1")
	// console.log(btns);
	//console.log(btns.attributes[3].value);
	for (var i = 0; i < btns.length; i++) {
		//console.log(btns[i].getAttribute("id"));				
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
/*---------------------------------------------------ฟังก์ชั่น แสดงป๊อปอัพ หมดอายุสมาชิก-----------------------*/
function func_alertshow() {
	//console.log('test');
	var popup = document.getElementById('boxModal_popExpireUser');
	popup.style.display = "block";
	var bt = document.getElementById('bt_popExpireUser');
	bt.focus();
	bt.addEventListener('click', function () {
		popup.style.display = "none";
		document.getElementById('txt_barCode').focus();
	})
	$(document).on('click', '.close_popShowOrder', function () {
		popup.style.display = 'none';
	})
}
/*---------------------------------------------------ฟังก์ชั่น ส่งดาต้า เอเจ็กไปphp barcode แสดงข้อมูลหน้ายืมหนังสือ--------------------------*/
function sendDATA_Bcode(iptval_bcodeuser) {
	var iduser = $('.ipt_numbarCode').val();
	var pic = 'who.jpg';
	// console.log("ฟังก์ชั่นผู้ยืมทำงาน");	
	var ele = document.getElementById('icon-alertred-order');
	const arr = [];
	var numR = Math.random();
	/*	$.ajax({		
			method: "GET",
			url: "../assets/page.php",
			data: { name: "John", surname: "Boston" }		
		})
		.done(function( html ) {
			// $( "#lb-dayupdate" ).html( html );
		  });*/
	if (iduser == "") {

		//console.log(iptval_bcodeuser);		
		var iptval_bcodeuser = $.ajax({
			url: "../phpsv/showdetail_user.php",
			method: "POST",
			data: { iptval_bcodeuser: iptval_bcodeuser },
			dataType: "json",
			success: function (data) {
				if (data != "") {
					// console.log(data.countorDer);
					if (data.strOrder == 1) {
						// show alert  orderbooks
						// console.log(ele.className);
						ele.style.display = 'inline-block';
						ele.innerText = data.countorDer;
					} else {
						ele.style.display = 'none';
						ele.innerText = "";
					}
					//console.log(data);
					var iduser = data.IDUSERCODE;
					//$('.box_cir_pic').html('<img class="img_box" src="'+'..'+/imageuser/+''+data.IMAGEFILE+'">');
					$('.ipt_numbarCode').text(data.IDUSERCODE);
					$('.ipt_Fname').text(data.FNAME);
					$('.ipt_Lname').text(data.LNAME);

					$('.ipt_position').text(data.rangtxt);
					$('.ipt_ClassPo').val(data.CLASSPOSITION);
					$('.lb-memotxt-p1js').text(data.POSITION);
					if (data.IMAGEFILE != "") {
						$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /imageuser/ + '' + data.IMAGEFILE + '?v=' + numR + '">');
					} else {
						$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /fileimage/ + '' + pic + '">');
					}
					OpenTable();
					func_click_show_fines(iduser);
					//console.log(data.CLASSPOSITION);
				} else {
					alert("Not Fount");

				}
				data['state_fix'] = 'FKINUSER';
				arr.push(data);
				//    console.log(arr);
				sendMessage_keyInputUser(arr);
			}
		});

		document.getElementById('txt_barCode').focus();
		// console.log(" if");

	} else {
		if (iduser != iptval_bcodeuser) {
			var iptval_bcodeuser = $.ajax({
				url: "../phpsv/showdetail_user.php",
				method: "POST",
				data: { iptval_bcodeuser: iptval_bcodeuser },
				dataType: "json",
				success: function (data) {
					//console.log(data.IMAGEFILE.length);
					var iduser = data.IDUSERCODE;
					if (data != "") {
						if (data.strOrder == 1) {
							// show alert  orderbooks
							// console.log(ele.className);
							ele.style.display = 'inline-block';
							ele.innerText = data.countorDer;
						} else {
							ele.style.display = 'none';
							ele.innerText = "";
						}
						//$('.box_cir_pic').html('<img class="img_box" src="'+'..'+/imageuser/+''+data.IMAGEFILE+'">');
						$('.ipt_numbarCode').text(data.IDUSERCODE);
						$('.ipt_Fname').text(data.FNAME);
						$('.ipt_Lname').text(data.LNAME);

						$('.ipt_position').text(data.rangtxt);
						$('.ipt_ClassPo').val(data.CLASSPOSITION);
						$('.lb-memotxt-p1js').text(data.POSITION);
						if (data.IMAGEFILE != "") {
							$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /imageuser/ + '' + data.IMAGEFILE + '?v=' + numR + '">');
						} else {
							$('.box_cir_pic').html('<img class="img_box img-fluid" src="' + '..' + /fileimage/ + '' + pic + '">');
						}
						OpenTable();
						func_click_show_fines(iduser);
						//console.log(data.CLASSPOSITION);
					} else {
						alert("Not Fount");
					}
					data['state_fix'] = 'FKINUSER';
					arr.push(data);
					//  console.log(arr);
					sendMessage_keyInputUser(arr);
				}

			});
			// console.log(" else");

			document.getElementById('txt_barCode').focus();




		}
	}


}
function OpenTable() {
	localStorage.setItem("str_pg", 1);
	document.getElementById("defaultOpenTable").click();
	$('.box_ListOrderbooks').html("");
	$('.tbHTML_List_select').html("");
	$('.boxmodal_list_user_resu').html("");
	$('.box_ListOrderbooks').html("");
}
//----------------------------------- เมื่อคลิกเเทปค่าปรับ-----------------------------------------
function func_click_show_fines(iptValIDU) {
	// console.log('func_click_show_fines');
	$.ajax({
		url: "../phpsv/inser_fines_clk.php",
		method: "POST",
		data: { iptValIDU: iptValIDU },
		success: function (data) {
			// console.log(data);
			openShowListFiness(iptValIDU);
			//console.log(iptValIDU+"func_click");
		}

	});
	//openShowListFiness(iptValIDU);	
}
//---------------------ฟังก์ชั่นแสดงรายการค่าปรั้บ-----------------------------------------------		
function openShowListFiness(iptValIDU) {
	const arr_all = [];
	const item = [];
	//  console.log(iptValIDU);
	//  console.log("openShowListFiness");
	$.ajax({
		url: "../phpsv/fines_.php",
		method: "POST",
		data: { iptValIDU: iptValIDU },
		dataType: "json",
		success: function (data) {
			//alert(data);
			// console.log(data);
			var FIHTML = '';
			var HTMLSUM = 0;
			var htmlparser = '';
			var sum = 0, total = 0;
			if (data == null) {
				stop;
			} else {

				for (i = 0; i < data.length; i++) {
					//alert(data[i].cash_book);
					if (data[i].str == 1)// มีค่าปรับและมีัเงินค้างขำระ
					{
						FIHTML += '<tr id="' + data[i].idbk + '" ondblclick="Func_editFines(this)">';
						FIHTML += '<td class="tbcheck_fines">';
						FIHTML += '<div class="checkbox-fade fade-in-danger">';
						FIHTML += '<label>';
						FIHTML += '<input type="checkbox" value="" name="checkbox_fines" id="' + data[i].idbk + '" class="tbcheckbox_fines">';
						FIHTML += '<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span>';
						FIHTML += '</label></div>';
						FIHTML += '</td';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines"></td>';
						FIHTML += '<td id="tblist_fines" class="tbbar_fines">' + data[i].idbk + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + _forMatDat(data[i].nstart, 0).endd + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + _forMatDat(0, data[i].dayinport).start + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdc_fines">' + data[i].cday + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbfb_fines">' + data[i].cash_book + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">' + data[i].namebook + '</td>';
						FIHTML += '</tr>';

						sum += parseFloat(data[i].cash_book);

						HTMLSUM = parseFloat(data[i].cash_sum);
						//alert(data[i].cash_sum);
						//alert(HTMLSUM);
						// console.log(data[i].str);		
					}
					else if (data[i].str == 2)//ไม่มีค่าปรับแต่มีเงินค้างชำระ
					{
						HTMLSUM = '' + data[i].cash_sum + '';

					}

				}
				data.forEach(item => {
					item['state_fix'] = "SHFINES";
					//  console.log(item);
					arr_all.push(item);
				})
				// console.log(arr_all);
				// arr_all['finess'] = HTMLSUM;

				sendMessage_keyInputUser(arr_all);
			}
			//alert(HTMLSUM);
			sum += parseFloat(HTMLSUM);
			if (sum == 0) {
				document.getElementById('id-text-lb-p1-msg').style.display = 'none';
				stop;
			} else {
				document.getElementById('id-text-lb-p1-msg').style.display = 'block';
				htmlparser = 'มีค่าปรับค้างชำระจำนวน' + sum + 'บาท';

			}
			//  console.log(FIHTML);
			$('#tb_list_fines').html(FIHTML);
			//alert(ChHTML.length);
			$('.ipt_footer_fines').val(HTMLSUM);
			$('.ipt_footer_cash').val(sum);
			$('.ipt_limitItem').text(htmlparser);
			//  item.push({
			// 	state_fix: 'SHFINES',
			// 	cashBath: htmlparser
			// })
			// item.forEach(txt =>{
			// 	ar_all.push(txt);
			// 	})
			// 	sendMessage_keyInputUser(ar_all);
		}


	})

}
//---------------------ฟังก์ชั่น  button select all chang text-labelbutton page1/3 ค่าปรับ----------------------------------------------	
function ifelse_allSelect_fines() {
	var btnVal = document.getElementById('btnSelectAll');
	/*alert(btnVal.innerHTML);*/
	if (btnVal.innerHTML === "All") {
		btnVal.innerHTML = "NO";
		myfunchecktrue_fines();
	} else {
		btnVal.innerHTML = "All";
		myUncheckboxfalse_fines();
	}

}
//---------------------ฟังก์ชั่น  button select all select  หน้าต่าง ยืม----------------------------------------------	
function ifelse_allSelect_list() {
	var btnVal = document.getElementById('btnSelectNO');
	// console.log(btnVal.innerHTML);
	if (btnVal.innerHTML === "All select books") {
		btnVal.innerHTML = "NO select books";
		myfunchecktrue_list();
	} else {
		btnVal.innerHTML = "All select books";
		myUncheckboxfalse_list();
	}

}
//---------------------ฟังก์ชั่น  button select all check box page ปอบอัพหน้ากำหนดวันคืนหนังสือ---------------------------------------------
function myfunchecktrue_list() {
	/*alert("mark all select");*/
	var items = document.getElementsByName('checkbox_lists');

	for (var i = 0; i < items.length; i++) {
		items[i].checked = true;

	}
}
function myUncheckboxfalse_list() {
	/*alert("UNselect");*/
	var items = document.getElementsByName('checkbox_lists');
	for (var i = 0; i < items.length; i++) {
		if (items[i].type == 'checkbox') {
			items[i].checked = false;
		}
	}

}
//-
//---------------------ฟังก์ชั่น  button select all check box page1/3 ค่าปรับ----------------------------------------------
function myfunchecktrue_fines() {
	/*alert("mark all select");*/
	var items = document.getElementsByName('checkbox_fines');

	for (var i = 0; i < items.length; i++) {
		items[i].checked = true;

	}
}
function myUncheckboxfalse_fines() {
	/*alert("UNselect");*/
	var items = document.getElementsByName('checkbox_fines');
	for (var i = 0; i < items.length; i++) {
		if (items[i].type == 'checkbox') {
			items[i].checked = false;
		}
	}

}
//--------------------------------------------function alert(แจ้งเตือนมีค่าปรับหนังสือ)--------------------------------------------	
function Clkpayment() {
	var iptValIDU = $('.ipt_numbarCode').text();
	/*alert(iptValIDU.length);*/
	// console.log(iptValIDU);
	var total_cash = 0;
	if (iptValIDU.length == 0) {
		stop;
	} else {
		var popupPayment = document.getElementById('boxModal_cash');
		popupPayment.style.display = "block";
		$('#ipt_cash').focus();
		var val_cash = document.getElementById('ipt_footer_cash').value;
		//document.getElementById('ipt_cash_fines').value(val_cash);
		$('.ipt_cash_fines').val(val_cash);
		//alert(val_cash);
		$('#ipt_cash').val(val_cash);
		// console.log(val_cash);
		document.getElementById("ipt_cash_fines_sub").value = val_cash;
		document.getElementById("ipt_cash_fines_pass").value = "0";
		$('.close_cash').click(function () {
			NoValues();
			popupPayment.style.display = "none";

		})

	}

}
//--------------------------------------------ฟังก์ทำให้ค่า div  ที่กำหนดเป็นค่าว่าง----------------------------------------------------------
function NoValues() {
	$(document).ready(function () {
		/*    
	   alert("test");*/
		$('.ipt_porderbook').val("");
		$('.ipt_dayorder').val("");
		$('.ipt_pordercount').val("");
	});
}
//-----------------------------------------------------------------------------------ฟังก์ชั่น เมื่อ ใส่จำนวนเงินที่ต้องการชำระค่าปรับและ enter-----------------------------	
function clcikAdTo_CashBath(e) {
	// console.log("enterfunction");
	if (e.which == 13) {

		/*alert(e.which);*/
		var iptval_bcodeuser = $('#ipt_cash').val();
		// console.log(iptval_bcodeuser);

		if (!iptval_bcodeuser.match(/^([a-z0-9])+$/i)) {
			alert("กรูณาเปลี่ยนคีย์ภาษา อังกฤษ A ^- Z/0-9");
			$('#ipt_cash').val("");

		} else {
			opatator_cashpopup();
		}
	}

}
//--------------------------------------------------------------------------------------ฟังก์ชั่น คำนวนค่าปรับเมื่อมีการดีย์ข้อมูลใน input enter-----------------------------------------------	
function opatator_cashpopup() {
	/*$('#ipt_cash_fines_sub').val("");*/
	var sum = 0;
	var txt_bath = parseFloat($('#ipt_cash').val());
	var txt_cash = parseFloat($('.ipt_cash_fines').val());
	// console.log(txt_bath);
	sum = parseFloat(txt_cash - txt_bath);
	document.getElementById("ipt_cash_fines_sub").value = txt_bath;
	document.getElementById("ipt_cash_fines_pass").value = sum;
	$('.btn_cash').focus();
	//alert(iptValIDU);		
	$('#ipt_cash').val("");


}
//--------------------------------------------------ฟังก์ชั่น เมื่อ Enter ให้ทำการอัพเดทฐานข้อมูลในการชำระเงินค่าปรับ--------------------------------------------------------	
function EnterPayment() // เมื่อคลิกเมาส์
{
	// console.log("ฟังก์ชั่น updatedb");
	var iptValIDU = $('.ipt_numbarCode').text();
	var bath = $('.ipt_cash_fines_sub').val();
	var cashBath = $('#ipt_footer_fines').val();
	var toTalCash = $('#ipt_footer_cash').val();
	let arr_data = [];
	// console.log('test');
	// console.log(iptValIDU);
	$.ajax({
		url: "../phpsv/upDateCashBath.php",
		method: "POST",
		data: { iptValIDU: iptValIDU, bath: bath, cashBath: cashBath, toTalCash: toTalCash },
		dataType: "text",
		success: function (data) {
			// console.log(data);
			if (data == 1)//ค่าปรับมี ค้างชำระมี
			{
				alert("ระบบทำการจัดเก็บค่าปรับ" + bath + 'บาท สำเร็จ');
				$('.ipt_footer_fines').val("");
				$('.ipt_footer_cash').val("");
				$('.ipt_limitItem').text("");
				$('#tb_list_fines').html("");
				arr_data.push({
					state_fix: "PayMent",
				})
				sendMessage_keyInputUser(arr_data);
			}
			else //ค่าปรับมี ค้างชำระไม่มี
			{
				alert("ชำระค่าปรับสำเร็จ");
				$('#tb_list_fines').html("");
				var iptValIDU = $('.ipt_numbarCode').text();
				openShowListFiness(iptValIDU);
				arr_data.push({
					state_fix: "PayMent",
				})
				sendMessage_keyInputUser(arr_data);
			}


		}

	});
	$('#ipt_cash_fines_sub').val("");
	$('#ipt_cash_fines_pass').val("");
	var popupPayment = document.getElementById('boxModal_cash');
	popupPayment.style.display = "none";

}
//------------------------------------------function select delete book finet  ฟังก์ชั่น เช็คบล็อคลบรายการยืมที่เกินกำหนดส่งคืน---------------------
function Delete_listbookFines() {
	var checkitem = [];
	$('.tbcheckbox_fines:checked').each(function (i) {
		checkitem[i] = $(this).attr('id');
		// console.log(checkitem);
		iptValIDU_arr = $('.ipt_numbarCode').text();


	});

	if (checkitem.length == 0) {
		alert("Plass Select Checkbox... ");

	} else {
		var rowCount = '';
		rows = document.querySelectorAll(".tbbar_fines");
		//alert(rows.length);
		rowCount = rows.length;
		//alert(rowCount);
		sendAjax_deleteFines(checkitem, iptValIDU_arr, rowCount);
		// console.log(rowCount);		
	}

}
//-------------------------------------------------------------------------คำสั่งฟังก์ชั่นลบรายการเกินกำหนด ส่งค่าไปยัง php--------------------
function sendAjax_deleteFines(checkitem, iptValIDU_arr, rowCount) {
	//alert(checkitem);
	//alert(iptValIDU);
	var iptValIDU = '';
	let arr_data = [];
	$.ajax({
		url: "../phpsv/delete_fineslist.php",
		method: "POST",
		data: { iptValIDBook: checkitem, iptValIDU: iptValIDU_arr, rowCount: rowCount },
		dataType: "text",
		success: function (data) {
			//console.log(data);
			// alert(data);
			if (data == 1) {
				iptValIDU = $('.ipt_numbarCode').text();
				openShowListFiness(iptValIDU);

			} else if (data == 2) {
				arr_data.push({
					state_fix: "DELFiNES",
				})
				$('.ipt_footer_fines').val("");
				$('.ipt_footer_cash').val("");
				$('.ipt_limitItem').text("");
				$('#tb_list_fines').html("");
				alert("ลบรายการค่าปรับสำเร็จ");
				sendMessage_keyInputUser(arr_data);

			}
		}

	})

}
//---------------------ฟังก์ชั่นแสดงรายการค่าปรั้บ-----------------------------------------------		
function openShowListFiness(iptValIDU) {
	const arr_all = [];
	const item = [];
	const ary_input = [];
	// const aditem = [];
	//alert(iptValIDU);
	// console.log("openShowListFiness-two");
	$.ajax({
		url: "../phpsv/fines_.php",
		method: "POST",
		data: { iptValIDU: iptValIDU },
		dataType: "json",
		success: function (data) {
			//alert(data);
			//console.log(data);
			var FIHTML = '';
			var HTMLSUM = 0;
			var htmlparser = '';
			var sum = 0, total = 0;
			if (data == null) {
				stop;
			} else {

				for (i = 0; i < data.length; i++) {
					//alert(data[i].cash_book);
					if (data[i].str == 1)// มีค่าปรับและมีัเงินค้างขำระ
					{
						const dataEnd = new Date(data[i].nstart);
						const dayEnd = dataEnd.getDate() + '/' + (dataEnd.getMonth() + 1) + '/' + dataEnd.getFullYear();
						const dataStart = new Date(data[i].dayinport);
						const dStart = dataStart.getDate() + '/' + (dataStart.getMonth() + 1) + '/' + dataStart.getFullYear();
						FIHTML += '<tr id="' + data[i].idbk + '" ondblclick="Func_editFines(this)">';
						FIHTML += '<td class="tbcheck_fines">';
						FIHTML += '<div class="checkbox-fade fade-in-danger">';
						FIHTML += '<label>';
						FIHTML += '<input type="checkbox" value="" name="checkbox_fines" id="' + data[i].idbk + '" class="tbcheckbox_fines">';
						FIHTML += '<span class="cr"><i class="cr-icon fa fa-check txt-danger"></i></span>';
						FIHTML += '</label></div>';
						FIHTML += '</td';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines"></td>';
						FIHTML += '<td id="tblist_fines" class="tbbar_fines">' + data[i].idbk + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + _forMatDat(data[i].nstart, 0).endd + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdn_fines">' + _forMatDat(0, data[i].dayinport).start + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbdc_fines">' + data[i].cday + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbfb_fines">' + data[i].cash_book + '</td>';
						FIHTML += '<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">' + data[i].namebook + '</td>';
						FIHTML += '</tr>';

						sum += parseFloat(data[i].cash_book);

						HTMLSUM = parseFloat(data[i].cash_sum);
						//alert(data[i].cash_sum);
						//alert(HTMLSUM);
						// console.log(data[i].str);		
					}
					else if (data[i].str == 2)//ไม่มีค่าปรับแต่มีเงินค้างชำระ
					{
						HTMLSUM = '' + data[i].cash_sum + '';

					}

				}
				data.forEach(item => {
					item['state_fix'] = "SHFINES";
					//  console.log(item);
					arr_all.push(item);
				})

			}
			//alert(HTMLSUM);
			sum += parseFloat(HTMLSUM);
			if (sum == 0) {
				document.getElementById('id-text-lb-p1-msg').style.display = 'none';
				stop;
			} else {
				document.getElementById('id-text-lb-p1-msg').style.display = 'block';
				htmlparser = 'มีค่าปรับค้างชำระจำนวน' + sum + 'บาท';

			}
			//  console.log(sum);
			//  arr_all.forEach( aditem=>{
			// 	aditem['bath'] = sum;
			// 	ary_input.push(aditem);
			//  })
			//  console.log(ary_input);
			sendMessage_keyInputUser(arr_all);
			$('#tb_list_fines').html(FIHTML);
			//alert(ChHTML.length);
			$('.ipt_footer_fines').val(HTMLSUM);
			$('.ipt_footer_cash').val(sum);
			$('.ipt_limitItem').text(htmlparser);
			/* item.push({
				state_fix: 'SHFINES',
				cashBath: htmlparser
			})
			item.forEach(txt =>{
				ar_all.push(txt);
				})
				sendMessage_keyInputUser(ar_all);*/
		}
	})

}
//---------------------------------------------------------เมื่อคลิกปุ่มปริ้น-ฟังก์ชั่นปริ้น สเตจเมนท์ค่าปรับ----------
function Print_statement() {
	var idu, name, lname, position;
	idu = $('.ipt_numbarCode').text();
	name = $('.ipt_Fname').text();
	lname = $('.ipt_Lname').text();
	position = $('.ipt_position').text();
	//alert(position);
	// console.log(idu+name+lname+position);
	$.ajax({
		url: "../phpsv/Print_paypal_cash.php",
		method: "POST",
		data: { idu: idu, name: name, lname: lname, position: position },
		dataType: "text",
		success: function (data) {

			//alert(data);
			window.open(data);

		}
	});


}
//---------------------------------------------------------เมื่อคลิกปุ่มปริ้น-ฟังก์ชั่นแก้ไขค่าปรับ โขว์ปอบอัพ---------
const btn_editCash = document.getElementsByClassName('btn-edit-cash')[0].onclick = Show_popup_editcash;
function Show_popup_editcash() {
	var popup = document.getElementById('boxModal_addcash');
	var iptValIDU = document.getElementById('ipt_numbarCode').innerText;
	var iptcash = document.getElementById('ipt-dayfixEdit');

	var sum = 0;

	if (iptValIDU.length > 0) {
		popup.style.display = 'block';
	}
	$(document).on('click', '.close_cash', function () {

		iptcash.value = "";
		popup.style.display = 'none';
	})
	// console.log(iptcash);
	// iptcash.addEventListener('keyup', (data)=>{
	// 	sum =  parseFloat(data.target.value)*5;
	// 	//  console.log(sum);
	// 	iptbat.value = sum;
	// })
	// document.getElementById('btn-addcash-enter').onclick = function(){		
	//  insert_editcash();
	// 	iptbat.value = "";		 
	// }
}
//---------------------------------------------------------เมื่อคลิกปุ่มปริ้น บันทึกการแก้ไช insert data sql------
function insert_editcash() {
	var popup = document.getElementById('boxModal_addcash');
	var cash_bath = document.getElementById('ipt-dayfixEdit').value;
	var iptValIDU = document.getElementById('ipt_numbarCode').innerText;
	// console.log(idbk+countday+bath+iptValIDU);
	if (cash_bath == '') {
		alert('กรอกจำนวนเงิน');
		return false;
	}
	$.ajax({
		url: "../phpsv/edit-adcash.php",
		method: "POST",
		data: { bath: cash_bath, iduser: iptValIDU },
		dataType: "text",
		success: function (data) {

			//  console.log(data);
			openShowListFiness(iptValIDU);
		}
	})
	popup.style.display = 'none';
	document.getElementById('ipt-edit-cash').value = "";
	// document.getElementById('ipt-BathFix').value = "";
	document.getElementById('ipt-dayfixEdit').value = "";
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

function Func_editFines(dis) {
	const popup = document.getElementById('boxModal_Editorcash');
	let iduser = document.getElementById('ipt_numbarCode').innerText;
	var txtLB = document.getElementsByClassName('lb_hd_Text')[0];
	var iptcash = document.getElementById('ipt-editcash-day');
	var iptbat = document.getElementById('ipt-editcash-bath');
	var idbk = dis.getAttribute("id");
	// console.log(idbk);
	var sum = 0;
	txtLB.innerText = idbk;
	popup.style.display = "block";
	//   console.log(iptcash);
	var close = document.getElementById('close_btnpop');
	close.addEventListener('click', () => {
		popup.style.display = "none";
		txtLB.innerText = "";
		iptcash.value = "";
		iptbat.value = "";
	})
	iptcash.addEventListener('keyup', (data) => {
		// console.log("sum"+data);	
		sum = parseFloat(data.target.value) * 5;
		// console.log(sum);
		iptbat.value = sum;
	})
	document.getElementById('btn-editcash-enter').onclick = function () {
		txtLB.innerText = "";
		Update_FinesDB(idbk, popup, iduser);
	}
}
function Update_FinesDB(idbk, popup, iduser) {
	var iptcash = document.getElementById('ipt-editcash-day');
	var iptbat = document.getElementById('ipt-editcash-bath');
	var countday, bath;
	countday = iptcash.value;
	bath = iptbat.value;
	// console.log(countday+bath+idbk+iduser);
	if (iptcash.value.length == 0) {
		alert("กรุณาใส่จำนวนวัน");
		return false;
	}
	if (iptbat.value.length == 0) {
		alert("กรุณาตรวจสอบค่าปรับ");
	}
	$.ajax({
		url: "../phpsv/edit_bathFines.php",
		method: "POST",
		data: { idbk: idbk, numday: countday, bath: bath, iduser: iduser },
		dataType: "text",
		success: function (data) {

			//  console.log(data);
			openShowListFiness(iduser);
		}
	})
	iptcash.value = "";
	iptbat.value = "";
	popup.style.display = 'none';

}
