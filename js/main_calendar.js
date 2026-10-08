
$(document).ready(function () {
	document.getElementById('foolterset-css').innerText = '© 2023, made with  by As St.Head';
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
CalendarAll();
function CalendarAll() {
	var calendarEl = document.getElementById('calendarJs');

	var calendar = new FullCalendar.Calendar(calendarEl, {
		initialView: 'dayGridMonth',
		locale: 'th',

		// --- เพิ่มส่วนนี้เพื่อแสดงไอคอนถังขยะในทุก Event ---
		eventContent: function (arg) {
			// สร้างไอคอนถังขยะ	
			let eventId = arg.event.id;

			// ใส่ 'this' เพื่ออ้างอิงไอคอน และ '${eventId}' เพื่อบอกว่าลบงานไหน
			let icon = `<i class="fa fa-trash-o iconCalendar" aria-hidden="true" 
                style="cursor:pointer; font-size: 13px; margin:5px;" 
                onclick="deleteEvent('${eventId}')"></i>`;
			// รวมไอคอนกับชื่อ Event (title)
			let contentHtml = '<div>' + icon + arg.event.title + '</div>';

			return { html: contentHtml };
		},
		// -------------------------------------------
		dayHeaderDidMount: function(arg) {
		// วันที่ (0=อาทิตย์, 1=จันทร์...)
		var day = arg.date.getDay();
		
		if (day === 0) {
				// console.log(arg.el );
			// console.log(arg.el.children[0]);
			// console.log(arg.el.children[0]);			
			arg.el.style.backgroundColor = '#ee6e6e'; // อาทิตย์
		} else if (day === 6) {
			arg.el.style.backgroundColor = '#cc85c2'; // เสาร์
		} else if (day === 1) {
			arg.el.style.backgroundColor = '#f1dc1e'; // จ
		}else if (day === 2) {
			arg.el.style.backgroundColor = '#f397e7'; // อ
		}else if (day === 3) {
			arg.el.style.backgroundColor = '#11cc7e'; // พ
		}else if (day === 4) {
			arg.el.style.backgroundColor = '#e9a40e'; // พฤ
		}else if (day === 5) {
			arg.el.style.backgroundColor = '#17b8ce'; // ศ
		}
		},
		dateClick: (info) => {
			sweetAlert(info);
		},
		
		buttonText: {
			today: 'วันนี้',
			month: 'เดือน',
			week: 'สัปดาห์',
			day: 'วัน',
			list: 'แผนงาน'
		},
		timeZone: 'Asia/Bangkok'
	});



	const xml = new XMLHttpRequest();
	xml.open("POST", "../phpsv/show-DateTime.php");
	xml.send();
	xml.onreadystatechange = () => {
		if (xml.readyState == 4 && xml.status == 200) {
			try {
				const dataSend = JSON.parse(xml.responseText);
				if (dataSend != null) {
					dataSend.forEach(item => {
						// เมื่อสั่ง addEvent ตัว eventContent ด้านบนจะทำงานอัตโนมัติ
						calendar.addEvent({
							id: item.Lk_picker,
							title: item.note_tb,
							start: item.datpicker,
							allDay: true,
							backgroundColor: '#39444e',
							textColor: 'white'
						});
					});
				}
			} catch (error) {
				console.log(error);
			}
		}
	}
	calendar.render();
}
function deleteEvent(eventID) {


	Swal.fire({
		title: "ต้องการลบ?",
		text: "คุณแน่ใจว่าจะลบรายการนี้ใช่ไหม!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#d33",

		confirmButtonText: "ใช่ แน่ใจ!",
		cancelButtonText: "ยกเลิก", // เปลี่ยนจาก Cancel เป็น ยกเลิก 
		cancelButtonColor: "#d33",
	}).then((result) => {
		if (result.isConfirmed) {
			// console.log(eventID);
			const xml = new XMLHttpRequest();
			const myData = new FormData();
			myData.append("id", eventID);
			xml.open("POST", "../phpsv/delete_Fixcanlen.php");
			xml.send(myData);
			xml.onreadystatechange = async () => {
				if (xml.status == 200 && xml.readyState == 4) {
					try {
						// console.log(await xml.response);

						const data = await JSON.parse(xml.responseText);
						// console.log(data.status);
						if (data.status == "error") {
							Swal.fire({
								title: "Deleted!",
								text: "ทำรายการไม่สำเร็จ",
								icon: "error",
								showConfirmButton: false,
  								timer: 1500
							});

						} else {
							Swal.fire({
								title: "success!",
								text: "ทำรายการสำเร็จ",
								icon: "success",
								showConfirmButton: false,
  								timer: 1500
							});
							CalendarAll();
						}
					} catch (error) {
						Swal.fire({
							title: "Deleted!",
							text: "ทำรายการไม่สำเร็จ",
							icon: "error",
							showConfirmButton: false,
  								timer: 1500
						});

					}
				}
			}
		}
	});
}

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
				alert("error Logout User");

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
	} else if (dis.id == 'recutbooks') {
		location.href = "../assets/recutBooks.php";
	} else {
		stop;
	}
	// location.href = "index.php";
}
// ---------------------------function  default----------------------------------	
//--------------------------------------------------------------function page canlendar---- หน้าเพจปฎิทิน-------วันที่ ต่อ 1------------------------
$(document).on('click', '.btn_adcalendar', function () {
	myFuncAdcalendar();
})
$(document).on('this, click', '#textday', function () {
	var numberday = $(this).attr('id1');
	var numbermonth = $(this).attr('id2');
	var numberyear = $(this).attr('id3');
	adcanlendar(numberday, numbermonth, numberyear, this);
});
$(document).on('this, click', '#iconcalenClose', function () {
	Functiondelete_Fixcanlendar(this);
})
var monthNames = [
	"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
	"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
	"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var weekday = [
	"อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"
];
function dateThai(date) {
	var w = new Date();
	// var datnew = new Date().toLocaleString("th-TH", { timeZone: "UTC" });
	// console.log(datnew);

	var Week = weekday[w.getDay()];
	var year = date.getFullYear() + 543;
	var month = monthNames[date.getMonth()];
	var numOfDay = date.getDate();

	return "วันที่ปัจจุบัน" + "&nbsp;" + Week + '&nbsp' + 'ที่' + '&nbsp;' + numOfDay + '&nbsp;' + month + '&nbsp;' + year;

}
function sweetAlert(date) {
	// console.log(date);

	Swal.fire({
		title: "โปรดระบุวันหยัด..!!!",
		html: `วันที่เลือก: <b>${fomatDateThai(date.dateStr)}</b>`, // เพิ่มข้อความบรรทัดใหม่ตรงนี้
		input: "text",
		showCancelButton: true,
		confirmButtonText: "ตกลง",
		cancelButtonText: "ยกเลิก", // เปลี่ยนจาก Cancel เป็น ยกเลิก 
		inputValidator: (value) => {
			if (!value) {
				return "โปรดระบุวันหยุด!";
			} else {
				const xml = new XMLHttpRequest();
				const formData = new FormData();
				xml.open("POST", "../phpsv/addayFixtCalendar.php");
				// console.log(date.dateStr);
				formData.append("text", value);
				formData.append("date", date.dateStr);
				xml.send(formData);
				xml.onreadystatechange = async () => {
					if (xml.status == 200 && xml.readyState == 4) {
						try {
							// console.log(xml.response);
							const dataSend = await JSON.parse(xml.responseText);
							// console.log(dataSend.status);

							if (dataSend.status == "success") {
								CalendarAll();
								return Swal.fire({
									icon: "success",
									title: "Success Ok",
									showConfirmButton: false,
									timer: 1500
								});
							} else {
								return Swal.fire({
									icon: "error",
									title: "error",
									showConfirmButton: false,
									timer: 1500
								});
							}
						} catch (error) {
							return Swal.fire({
								icon: "error",
								title: "error",
								showConfirmButton: false,
								timer: 1500
							});
						}
					}
				}
			}
		}

	});

}


function fomatDateThai(txtDate) {
	const dateObj = new Date(txtDate);
	return thDate = dateObj.toLocaleDateString('th-TH', {
		year: 'numeric',
		month: 'long',
		day: "numeric",
	})


}


function fomatRotateDateThai(thaiDate) {
	// 1. แยกส่วนประกอบของวันที่
	const parts = thaiDate.split(" ");
	const day = parseInt(parts[0]);
	const yearBE = parseInt(parts[2]);

	// 2. แปลง พ.ศ. เป็น ค.ศ. (2569 - 543 = 2026)
	const yearCE = yearBE - 543;

	// 3. สร้าง Object วันที่ (เดือนเมษายนคือ index 3)
	const date = new Date(yearCE, 3, day);

	// 4. บวกเพิ่ม 1 วันเพื่อให้ได้วันที่ 16 ตามที่ต้องการ
	date.setDate(date.getDate() + 1);

	// 5. จัดรูปแบบให้เป็น YYYY-MM-DD
	const result = date.toISOString().split('T')[0];

	return result;

}
