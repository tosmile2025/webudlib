// ---------------------------function  default----------------------------------
$(document).ready(function(){
	
	
document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
    $('.close_popAdbarCodeAuto').click(function(){
        var boxpopAddbarcodeAuto = document.getElementById('boxModal_popAdbarCodeAuto');
        boxpopAddbarcodeAuto.style.display ='none';        	
            $('.ipt_adAutoBarcode').val("");
                var elelb = document.getElementById('text_codeAdnew');
                //console.log(elelb);
                if(elelb != null){
                elelb.remove();
                
                }
            }) 
			CalendarThai_status();        
            Func_Check_Login();
            modulesearch_nameuser();
			Func_show_statustotal();	
});	

const ipt_email = document.getElementById('email_rguser');
const formemail = document.getElementById('from-email');
const txttest = document.getElementById('txt-test');
ipt_email.addEventListener('keyup', (event)=>{
	// console.log(event.target.value);
	
if(event.isTrusted  == true){
	const string =  event.target.value;		
	var pattern_eng = /^[a-zA-Z\s @ ."_"]+$/; 
	// console.log(pattern_eng);
	if(string.match(pattern_eng)){
		// console.log('math');
		event.stopPropagation();
		formemail.classList.remove('was-validated');
	}else{
		// console.log('no math');
		formemail.classList.add('was-validated');   
	}
}

})

function Func_Check_Login(){
	//console.log("chk login");
	var idn = localStorage.getItem("idxname");
	//$('#box_head_name_lb').html(data[2])
if(idn != null){	
	$.ajax({
				url:"../phpsv/check_status_page.php",
				method:"POST",
				data:{iduser:idn},
				dataType:"json",
				success: function(data){
					//console.log(data);
					if(data[0] == 1){
						$('#box_head_name_lb').html(data[1]+'&nbsp;'+data[2]);
						$('#box_head_name_lb').attr('id-data', data[3]);
						}else{
							//console.log("test");
							//ให้ปิดหน้าเว็บ
							window.location.href="../lo-gin.php";	
							
							}
					}
				
				
				
				})
				
		}else{
				window.location.href="../lo-gin.php";	
				
			}
		
	}
function Func_LogoutUser(){				
				var iduser = $('#box_head_name_lb').attr("id-data");
				//console.log(iduser);	
					$.ajax({
					url:"../phpsv/logoutuser.php",
					method:"POST",
					data:{iduser:iduser},
					dataType:"json",
					success: function(data){
						//console.log(data);
						if(data[0]==2){
							localStorage.removeItem("idxname");
							window.location.href="../lo-gin.php";						
							}else{
								popupError("error Logout User");
								
								}
						}
					})		
	}
const monthNames = [
    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
const weekday = [
    "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"
];

const weekdaySlice = [
    "อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."
];
// -----------------------------------------ฟังก์ชั่น Calendar รับค่า class div และ class input-----------------------------
function Thaicalendar(detipt, divid) {
    // console.log(id);
    const htmlMain = document.getElementById(divid);
    const mainDiv = document.createElement('div')
    const detHead = document.createElement('div')
    const div = document.createElement('div')
    const btnPrv = document.createElement('button');
    const btnnext = document.createElement('button');
    const select = document.createElement('select');
    const input = document.createElement('input');
    detHead.setAttribute('class', "datepicker-header");
    Object.assign(input, {
        type: 'number',
        className: 'year-input',
        min: '1900',
        max: '2100'
    });
    document.body.appendChild(input);
    btnPrv.setAttribute('class', "prev");
    btnPrv.innerText = "Prev";
    btnnext.setAttribute('class', "next");
    btnnext.innerText = "Next";
    select.setAttribute('class', "month-input");
    monthNames.forEach((month) => {
        // console.log(item);
        const option = document.createElement('option');
        option.innerText = month;
        select.append(option);
    })
    div.append(select, input);
    detHead.append(btnPrv, div, btnnext);
    // console.log(detHead);
    // <!-- .days -->
    const divDay = document.createElement('div');
    const divdates = document.createElement('div');
    const divdatFooter = document.createElement('div');
    const btncel = document.createElement('button');
    const btnapy = document.createElement('button');
	btnapy.type="button";
    divdates.setAttribute('class', "dates");
    divDay.setAttribute("class", 'days');
    divdatFooter.setAttribute('class', "datepicker-footer");
    btncel.setAttribute('class', "cancel");
    btnapy.setAttribute('class', "apply");
    btncel.innerText = "Cancel";
    btnapy.innerText = "Apply";
    weekdaySlice.forEach((day) => {
        const span = document.createElement("span");
        span.innerText = day;
        divDay.append(span);
    })
    divdatFooter.append(btncel, btnapy);
    mainDiv.append(detHead, divDay, divdates, divdatFooter);
    //    console.log(mainDiv);
    htmlMain.innerHTML = mainDiv.innerHTML
    //    console.log(mainDiv);
    func_ScriptControlCalendar(detipt, divid);
}
function func_ScriptControlCalendar(detipt, divid) {
    // console.log(divid);
    const datepicker = document.querySelector(`#${divid}`);
    const dateInput = document.querySelector(`.${detipt}`);
    const yearInput = datepicker.querySelector(".year-input");
    const monthInput = datepicker.querySelector(".month-input");
    const cancelBtn = datepicker.querySelector(".cancel");
    const applyBtn = datepicker.querySelector(".apply");
    const nextBtn = datepicker.querySelector(".next");
    const prevBtn = datepicker.querySelector(".prev");
    const dates = datepicker.querySelector(".dates");

    let selectedDate = new Date();
    let year = selectedDate.getFullYear();
    let month = selectedDate.getMonth();
    // console.log(divcls);
    // console.log(mainDiv.hidden =false);

    // show datepicker
    // dateInput.addEventListener("click", () => {
    //     mainDiv.hidden = false;
    //      displayDates();
    // });
    // hide datepicker
    cancelBtn.addEventListener("click", () => {
        datepicker.hidden = true;
    });
    // close datepicker on outside click
    document.addEventListener("click", (e) => {
        const datepickerContainer = datepicker.parentNode;
        //   console.log(datepickerContainer.contains(e.target));        
        if (!datepickerContainer.contains(e.target)) {
            datepicker.hidden = true;
        }
    });

    // handle apply button click event
    applyBtn.addEventListener("click", () => {
        // set the selected date to date input
        dateInput.value = selectedDate.toLocaleDateString("en-GB", {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        }).replaceAll("/", "-");

        // hide datepicker
        datepicker.hidden = true;
    });

    // handle next month nav
    nextBtn.addEventListener("click", () => {
        if (month === 11) year++;
        month = (month + 1) % 12;
        displayDates();
    });
    // handle prev month nav
    prevBtn.addEventListener("click", () => {
        // console.log(month);
        if (month === 0) year--;
        month = (month - 1 + 12) % 12;
        displayDates();
    });
    // handle month input change event
    monthInput.addEventListener("change", () => {
        month = monthInput.selectedIndex;
        displayDates();
    });


    // handle year input change event
    yearInput.addEventListener("change", () => {
        const newYear = parseInt(yearInput.value, 10) || new Date().getFullYear();
        year = Math.min(2100, Math.max(1900, newYear));
        yearInput.value = year;
		
		
        displayDates();
    });
    const updateYearMonth = () => {
        monthInput.selectedIndex = month;
        yearInput.value = year;
		
		
    };
    const handleDateClick = (e) => {
        const button = e.target;

        // remove the 'selected' class from other buttons
        const selected = dates.querySelector(".selected");
        selected && selected.classList.remove("selected");

        // add the 'selected' class to current button
        button.classList.add("selected");

        // set the selected date
        selectedDate = new Date(year, month, parseInt(button.textContent));
         dateInput.value = selectedDate.toLocaleDateString("en-GB", {
            year: "numeric",
            month: "2-digit",
            day: "2-digit",
        }).replaceAll("/", "-");

        // hide datepicker
        datepicker.hidden = true;
		
    };

    // render the dates in the calendar interface
    const displayDates = () => {
        // update year & month whenever the dates are updated
        updateYearMonth();
        // console.log(dates);

        // clear the dates
        dates.innerHTML = "";

        //* display the last week of previous month

        // get the last date of previous month
        const lastOfPrevMonth = new Date(year, month, 0);

        for (let i = 0; i <= lastOfPrevMonth.getDay(); i++) {
            // if the last day is Saturday don't show the leading dates
            if (lastOfPrevMonth.getDay() === 6) break;

            const text = lastOfPrevMonth.getDate() - lastOfPrevMonth.getDay() + i;
            const button = createButton(text, true);
					
            dates.appendChild(button);
        }

        //* display the current month

        // get the last date of the month
        const lastOfMonth = new Date(year, month + 1, 0);

        for (let i = 1; i <= lastOfMonth.getDate(); i++) {
            const button = createButton(i, false);
            button.addEventListener("click", handleDateClick);
            dates.appendChild(button);
        }

        //* display the first week of next month

        const firstOfNextMonth = new Date(year, month + 1, 1);

        for (let i = firstOfNextMonth.getDay(); i < 7; i++) {
            // if the first day starts on Sunday don't show the trailing dates
            if (firstOfNextMonth.getDay() === 0) break;

            const text = firstOfNextMonth.getDate() - firstOfNextMonth.getDay() + i;
            const button = createButton(text, true);
            dates.appendChild(button);
        }
    };

    const createButton = (text, isDisabled = false) => {
        const button = document.createElement("button");
        button.textContent = text;
        button.disabled = isDisabled;
        if (!isDisabled) {
            const buttonDate = new Date(year, month, text).toDateString();
            const today = buttonDate === new Date().toDateString();
            const selected = buttonDate === selectedDate.toDateString();

            button.classList.toggle("today", today);
            button.classList.toggle("selected", selected);
        }
        return button;
    };
    datepicker.hidden = false;
    // console.log(datepicker);
    //displayDates();
    // console.log(cancelBtn);
    displayDates();

}



//-------ฟังก์ชั่น สำหรับแสดงรายชื่อสมาชิกหน้าลงทะเบียนสมช ด้านขวา
function showListTB_userregis(txt){
	// console.log(txt);
    var HTMLX ='';
    $.ajax({
            url:"../phpsv/SearchUser.php",
            method:"POST",
            data:{d:txt},
            dataType:"json",
            success: function(data)
            {
                //console.log(data);
                if(data != null){
                    for(var i =0; i<data.length; i++){
                        HTMLX +='<li class="lilistnameuserrg" id="'+data[i].IDUSERCODE+'">'+data[i].FNAME+'&nbsp;&nbsp;'+data[i].LNAME+'&nbsp;&nbsp;'+data[i].POSITION+'</li>';
                        }
                    }
                    $('.ul_listusernamerg').html(HTMLX);
                }
        })
    

}
//-------ฟังก์ชั่น สำหรับรับค่าจากช่้องค้นหาหน้าลวทะเบียนสมาชิก
function modulesearch_nameuser(){
    var txt ='';
    txt = $(".ipt_sch_gsuser").val();
    showListTB_userregis(txt);
    $(document).on("keyup", '.ipt_sch_gsuser', function(e){
        if(e.keyCode == 13){
            txt = $(".ipt_sch_gsuser").val();
            //console.log(txt);
            showListTB_userregis(txt);
            }
        
        })	
}

///-------ฟังก์ชั่น สำหรับแสดงแถบสีรายการที่เลือก 
function Myfunc_showdetailuserregis(dis){
	var li = document.querySelectorAll(".lilistnameuserrg");
	//console.log('test-click');
	//console.log(li); 
		for(var i =0; i < li.length; i++){
			if(li[i] == dis){
				li[i].style.backgroundColor='red';
				//console.log(li[i].getAttribute("id"));
				var idli = li[i].getAttribute("id");
				Myfunc_detailuserregisLeft(idli);
				localStorage.setItem("useriddel", idli);
				}else{
					li[i].style.backgroundColor='';}
			
			}
	}

function _forMatDat(endd) {
	// console.log(endd+"|"+endd);
	if (endd != 0) {
		const date = new Date(endd);
		const dayEnd = date.toLocaleDateString("es-CL");
		endd = dayEnd;
	} else {
		endd = "";
		// var dayEnd = '';
	}
	// console.log(endd);		
	 return { endd }

}
	  

	//-------ฟังก์ชั่น สำหรับแสดงข้อมูลสมาชิกด้านซ้ายทังหมด
function Myfunc_detailuserregisLeft(idli){
	var img = document.getElementById("pic_user");
	var pic = '';
	var numR = Math.random();
	var path = '..'+/imageuser/+'';
		$.ajax({
				url:"../phpsv/SerachIDuser.php",
				method:"POST",
				data:{d:idli},
				dataType:"json",
				success: function(data)
				{					
				//console.log(data);
				func_changCss(data);
				func_slc_detailuserrg(data);
				if(data != null){
					for(var d=0; d<data.length; d++){
						$('#code_rguser').val(data[d].IDUSERCODE);
						$('#Fname_rguser').val(data[d].FNAME);
						$('#Lname_rguser').val(data[d].LNAME);
						$('#datebegin_rguser').val(_forMatDat(data[d].MEMBSTART).endd);
						$('#dateline_rguser').val(_forMatDat(data[d].MEMBerEND).endd );
						$('#memo_rguser').val(data[d].POSITION);
						$('#item_rguser').val(data[d].FICBOOK);
						$('#address_rguser').val(data[d].ADDRESS);
						$('#tel_rguser').val(data[d].TEL);
						$('#email_rguser').val(data[d].EMAIL);
						$('#code_stdent').val(data[d].Code_student);
						pic = data[d].IMAGEFILE;
						 if(pic != ''){
							 img.src= '..'+/imageuser/+''+data[d].IMAGEFILE+'?v='+numR+'';							
							 }else{
								 img.src='../imageuser/personal.jpg';								   
								 }
						}
					
					}
			}
		})
	}

//-------ฟังก์ชั่น สำหรับการปรับคลาส css หน้าลงทะเบียนสมาชิก
function func_changCss(){
	
	labalItem = document.querySelectorAll("#lbrguser");
	
	for(var i =0; i < labalItem.length; i++){
			labalItem[i].classList.add("Activelbrguser");
		}
	}
//-------ฟังก์ชั่น สำหรับแสดงตำแหน่งสมาชิก
function func_slc_detailuserrg(data){
	// console.log(data);
	if(data != ''){
		var slc_el = document.getElementById("slc_position");
		var elesex = document.getElementById("slc_Sexuser");
		var type = document.getElementById("slc_typeuser");
		if(data != null){
			slc_el.selectedIndex = data[0].RangClass;				
		}else{
			slc_el.selectedIndex = 0;
			}
		if(data != null){
			elesex.value = data[0].SEX;
			//console.log( data[0].SEX);
			}else{
				elesex.value ="";
				}
		if(data != null){
			type.value = data[0].INTEXT;
			}else{
				type.value = "";
				}
	}	

}
//-------------------------------------------------ฟังก์ชั่น เลือกรูปภาพ อัพโหลด หน้าลงทะเบียนสมาชิก
function Activepictuer_user(){
	//console.log("test");
		var defaultBtn = document.querySelector("#default-btnRGuser");
		defaultBtn.click(func_IputFilePictureUser(defaultBtn));

}
function func_IputFilePictureUser(defaultBtn){				
	defaultBtn.addEventListener("change", function(){
				var file = defaultBtn.files[0];				
				var previewImg = document.querySelector("#pic_user");
	
				var [file] = defaultBtn.files;
			if(file){
				previewImg.src = URL.createObjectURL(file);
				previewImg.style.width ='150px';
			}
		
			});
	}

////------------------------------------------ฟังก์ชั่น สำหรับแอดบาร์โค้ดuser
function Mypopup_adcodeUserregis(){
	//console.log('test-add user');
	//console.log('test');
	var popup = document.getElementById("boxModal_popadbarcode");
		popup.style.display= 'block';
	
	$('#codeuser').keypress(function(event){
		var key = (event.keyCode ? event.keyCode : event.which);
		var btns = document.getElementById("editusericon");
		var btnaduser = document.getElementById('adduserrg');
		var btndel = document.getElementById('deluserrg');
			btns.style.display='none';
			btnaduser.style.display='none';
			btndel.style.display='none';
		if(key == 13){
			var input = document.getElementById("codeuser");
			var txt = input.value;
			//console.log(data);
		if(txt != ''){	
				$.ajax({
				url:"../phpsv/Check_IDuser.php",
				method:"POST",
				data:{txt:txt},
				dataType:"text",
				success: function(data)
				{
					// console.log(data);
					if(data >= 1){
						//ไอดีซ้ำ
						$('.lb_headadfail').html("บาร์โค้ดมีผู้ใช้งาน");
						}else{
							// ไอดีไม่ซ้ำ
								//console.log(txt);							
								func_changCss();
								func_ClearInputRGuser();
								$('#code_rguser').val(txt);
								input.value = '';
								popup.style.display='none';
								Func_EnabledInputelement();
								
							
							}
					}
				});
			}
			}
			
		})
		$(document).ready(function() {
            $('.close_popadbarcode').click(function(){
				//console.log("test");
				popup.style.display ='none';
				})
        });
	
	}
////------------------------------------------ฟังก์ชั่น สำหรับ เคลียร์ข้อมูลหน้าลงทะเบียน user
function func_ClearInputRGuser(){
	var data = '';
	var dd = new Date();
	var input = document.getElementsByClassName("nameuser");
	//<img  id="pic_user" src="../imageuser/NOPHOTO.jpg">
	var imgele = document.getElementById("pic_user");
		imgele.src="../imageuser/NOPHOTO.jpg";
	for(var et =0; et<input.length;et++){
				input[et].value ="";
				}
	func_slc_detailuserrg(data);	
	document.getElementById("datebegin_rguser").value = _forMatDat(dd).endd;			
	}
////------------------------------------------ฟังก์ชั่น สำหรับแก้ไขข้อมูลสมาชิก				
function func_editUserRG(){	
	Func_EnabledInputelementEditUser();
}	
function func_popupeditcodeuser(){
var popup = document.getElementById('boxModal_popeditusercode');
popup.style.display="block";
$(document).on('click', '.close_popAdbarCodeAuto', function(){
	popup.style.display="none";
	})
}
function func_edit_iduser(){
var popup = document.getElementById('boxModal_popeditusercode');	
var idnew = document.getElementById('ipt_iduseredit').value;
var  idold = document.getElementById('code_rguser').value;
var HTML ='';
//console.log(idnew);
if(idnew == ''){
	popupError("กรุณาคีย์ข้อมูลรหัสสมาชิกใหม่");
	}else if(idold == ""){
		popupError("กรุณาเลือกสมาชิกด้านขวามือที่จะแก้ไขข้อมูล");
		}else{
	
	$.ajax({
			url:"../phpsv/edit_iduser.php",
			method:"POST",
			dataType:"text",
			data:{idnew:idnew,idold:idold},
			success: function(data){
				//console.log(data);
				if(data == "NOT"){
					HTML = '<label id="text_codeAdnew" class="text_code">เลขรหัสมีในระบบอยู่แล้ว:&nbsp;'+idnew+'</label>';
					$('.box_text_showadAutoBarcode').html(HTML);
					}else{
						//console.log(data);
						var idli =  data;
						Myfunc_detailuserregisLeft(idli);
						popup.style.display="none";
						}
				
				}			
			})
		}
	
}		
//------------------------------------------ฟังก์ชั่น สำหรับ Enabled input editUser  หน้าลงทะเบียนสมาชิก
function Func_EnabledInputelementEditUser(){
	// console.log('test-enabled');
var id = document.getElementById('code_rguser').value;
var eleIpt = document.getElementsByClassName("cls-iptedituser");
var Fname_rguser = document.getElementById("Fname_rguser");
var btns = document.getElementById("editusericon");
var btnaduser = document.getElementById('adduserrg');
var btndel = document.getElementById('deluserrg');
	//console.log('test-Func_EnabledInputelementEditUser');
	//console.log(eleIpt);
	if(id != ''){  
		btns.classList.toggle("activeedit");           
		for(var et =0; et<eleIpt.length;et++){
			//console.log(eleIpt[et].disabled);
			if(eleIpt[et].disabled == true){
				eleIpt[et].disabled = false;
				//console.log(btns[et][0]);
				//console.log('click edit btn');
				btnaduser.disabled = true;
				btndel.disabled =true;
				}else{					
					eleIpt[et].disabled = true;	
					// func_SaveEditUser();
					btnaduser.disabled = false;
					btndel.disabled =false;
					}
			}
			
			if(Fname_rguser.disabled == true){
				func_SaveEditUser();
				}
	}
			
}
function clickeopentab(){
	window.open("../file-page/books-hit.php");
}
////------------------------------------------ฟังก์ชั่น สำหรับ ส่งค่าบันทึก สมาชิกลงที่แก้ไขข้อมูล หน้าลงทะเบียนสมาชิก
function func_SaveEditUser(){	
		var data = document.getElementsByClassName("nameuser");
		// console.log(data);
		if(data[1].value != ''){
			//console.log(data[1].value);
		var arr =[];
		var new_email = [];
		var img =  document.getElementById("pic_user");
		//console.log(x);
		 var filetxt = $('#default-btnRGuser').val();
		
		  if(filetxt != ''){
			// console.log("font");
			 //console.log(filetxt);
			// SaveNewAdPicturUser();//ปิดไว้
			arr.push(1);				 
			 }else{
				arr.push(2);
				 }
			for(var i =0; i< data.length; i++){
				// console.log(i);				
				if(i == 14){
					// console.log(i);					
				arr.push(data[i].value.replace(/ |/g, ''));						
				}else{
				
						
					arr.push(data[i].value);
				
					 
				}
				//  arr.push(data[i].value);
				}
		// arr[15].replace(/ |/g, '');
			// console.log(arr);

		$.ajax({
					url:"../phpsv/SaveEditUser.php",
					method:"POST",
					data:{arr_data:arr},
					dataType:"text",
					beforeSend:function(){
						active_loadprograssBar();
					},					
					success:function(call)
						 {		
							var progressValue =0;
							var speed =10;
							var progress = setInterval(function(){
								progressValue ++;
								loadprogress(progress, progressValue);
							}, speed);
								
					 }
				})
					 
		}

}

// --------------------- popup  sucess edituser------------------------
function active_loadprograssBar(){
	var popup = document.getElementById("boxModal_popsucessedituser");
	popup.style.display="block";
	 
}
function  loadprogress(progress, progressValue){	
	 var progressBar = document.querySelector(".cirula-progress");
	var valueContainer = document.getElementById("value-container");
   //console.log(progressBar); 
	var progressEndValue = 100;
		
		valueContainer.textContent = progressValue+"%";
		//console.log(progressValue);
	   progressBar.style.background = 'conic-gradient(red '+progressValue * 3.2+'deg, orange '+progressValue * 20+'deg)';
		 if(progressValue == progressEndValue){
			 //console.log(progressValue);
			 clearInterval(progress);
			 valueContainer.textContent = "";
			 valueContainer.innerHTML = '<i id="iconTrue" class="fa fa-check" aria-hidden="true"></i>';
			 outslideLoader();				 
			 }
}
function outslideLoader(){
	var popup = document.getElementById("boxModal_popsucessedituser"); 
	var valueContainer = document.getElementById("value-container");
	var loadersValue =0;
	var end = 10;
   var speedss =50;
   var loadders = setInterval(count, speedss)
   
	function count(){
		loadersValue++;
	   //console.log(loadersValue);
		if(loadersValue == end){
			//console.log(loadersValue);				 
			popup.style.display='';
			valueContainer.textContent='0%';
			 clearInterval(loadders);
			}
		}
	//progressValue++;
   // valueContainer.textContent = "0%";
   // popup.style.display='';		
					   
	}		
function Func_OpenTabBrowser(){
var winopen = window.open("../file-page/books-hit.php", "_blank", "resizable=yes,top=100,left=500,width=800,height=600");
winopen = function(){
		popupError(winopen);
	}
}
//--------------------------------------------------------------function page canlendar---- หน้าเพจปฎิทิน-------วันที่ ต่อ 1---------------------------------------------------

//------------------------------------------ฟังก์ชั่น สำหรับ ปฎิทินไทย
function CalendarThai(date)
{
	var w = new Date();		
	var Week = weekday[w.getDay()];		
	var year = date.getFullYear() + 543;
	var month = monthNames[date.getMonth()];		
	var numOfDay = date.getDate();

	return "วันที่ปัจจุบัน"+ "&nbsp;" +Week +'&nbsp'+'ที่' +'&nbsp;'  + numOfDay + '&nbsp;' + month + '&nbsp;' + year;
	
}
//------------------------------------------ฟังก์ชั่น สำหรับ ปฎิทินไทย หน้ายืมคืน status
function CalendarThai_status(){	
	var w = new Date();		
	var Week = weekday[w.getDay()];		
	var year = w.getFullYear() + 543;
	var month = monthNames[w.getMonth()];		
	var numOfDay = w.getDate();
	// console.log(numOfDay);
	var txt = "วัน"+Week +'&nbsp'+'ที่' +'&nbsp;'  + numOfDay + '&nbsp;' + month + '&nbsp;' + year;
	document.getElementById('lb-dayupdate').innerHTML = txt;
}
var time = new Date();
//console.log(det);	
var daypop = new Date();
//-------ฟังก์ชั่น สำหรับการปรับคลาส css หน้าลงทะเบียนสมาชิก
function func_changCss(){
	
	labalItem = document.querySelectorAll("#lbrguser");
	
	for(var i =0; i < labalItem.length; i++){
			labalItem[i].classList.add("Activelbrguser");
		}
	}
/*-------------------------------ฟังก์ชั่นคำนวนวันที่ปฎิทิน หน้าต่างวันหมดอายุสมาชิก----------------------------------------------*/	
function Func_popudayfix(time){
	//console.log("test");
			
	var det = time;
	//console.log(det);
		if(det == ''){
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
		var datend = new Date(det.getFullYear(), det.getMonth() +1, 0).getDate();
		//console.log(datend);
		var prevDate = new Date(det.getFullYear(), det.getMonth(), 0).getDate();
		var today = new Date();
		var dday = new Date();
		var cells ='';
		var LiHTML ='';
		var arr_push = [];
		var arr_d = [];
		var arr_day = [];
		for(var dx = 1; dx <= datend; dx++){
			arr_d.push(dx);
			}
		for(var x = day; x > 0; x--){
			cells += "<div  class='prev_datepop'>" + (prevDate - x +1) +"</div>";
			//console.log(cells);
			}	
		for(var i = 0; i< arr_d.length; i++){
				if(arr_d[i] == today.getDate() && det.getMonth() == today.getMonth()){				
					cells += "<div  class='todaypop' id-data ="+det.getFullYear()+'-'+[det.getMonth()+1]+'-'+arr_d[i]+" id1="+arr_d[i]+'-'+ [det.getMonth()+1]+'-'+ det.getFullYear()+" id='Enddaypop' >" + arr_d[i] + "</div>";
					}else{
						//console.log(det.getFullYear());
						cells += "<div id-data ="+det.getFullYear()+'-'+[det.getMonth()+1]+'-'+arr_d[i]+" id1="+arr_d[i]+'-'+ [det.getMonth()+1]+'-'+ det.getFullYear()+" id='Enddaypop'>"+arr_d[i]+"</div>";
						//console.log(cells);
						}
			}
			// console.log('test-day');
			var monthtxt = monthNames[det.getMonth()]+'&nbsp;'+det.getFullYear();
			//console.log(monthtxt);
			document.getElementsByClassName("dayspop_fixday")[0].innerHTML = cells;
			// console.log(daypop);
			document.getElementById("date_strpop_fixday").innerHTML = CalendarThai(daypop);
			//console.log(cells);
			document.getElementById("monthpop_fixday").innerHTML =monthtxt;		
			 popup_dateFix_sendbook();			
}
/*-------------------------------บอปอัพหน้าต่างกำนหดวันคืนหนังสือ--------------------------------------------------*/	
function popup_dateFix_sendbook(){
	var popup = document.getElementById("id-popup-calandar");
		popup.style.display = 'block';
	var idbook = document.getElementById("tbHTML_List_select");
	var attr_main = document.getElementById("dateline_rguser");	
	//console.log(attr_main);			
		$(document).on('this, dblclick', '#Enddaypop', function(){	
		var day = this.getAttribute("id1");
		//  console.log(day);
		var iddayInput = this.getAttribute("id-data");	
		// console.log(iddayInput);	
		document.getElementById("dateline_rguser").value = day;
		var newAtt =document.createAttribute('data-id');
							newAtt.value = iddayInput;
							attr_main.setAttributeNode(newAtt);			
		//console.log(iddayInput);
		popup.style.display='none';
			
		})
}
////------------------------------------------ฟังก์ชั่น สำหรับ แสดงข้อมูลปฎิทินเดือนถัดไป				
function moveDatepopdayfix(para){ 
	if(para ==  'prev'){
		time.setMonth(time.getMonth() - 1);
		}else if(para == 'next'){
			time.setMonth(time.getMonth()+1 );			
			//console.log(time);
			//var today = dt.setMonth(dt.getMonth() + 1);
		}
		//console.log(time);
		Func_popudayfix(time);
}
//------------------------------------------ฟังก์ชั่น สำหรับ Enabled  input  หน้าลงทะเบียนสมาชิก
function Func_EnabledInputelement(){
	var eleIpt = document.getElementsByClassName("cls-iptedituser");
	var hiele = document.getElementById("boxsub_righticon");
	
			for(var et =0; et<eleIpt.length;et++){
				//console.log(eleIpt[et].disabled);
				if(eleIpt[et].disabled == true){
					eleIpt[et].disabled = false;
					hiele.style.display = "block";					
					}else{
						eleIpt[et].disabled = true;
						hiele.style.display = "";							
						}
				}
}
//------------------------------------------ฟังก์ชั่น สำหรับ บันทึกข้อมูลสมาชิกใหม่
function Func_SaveNewUserRegis(){
	//console.log("test");
		//SaveNewAdPicturUser();
		var arr =[];
		var input = document.getElementsByClassName("nameuser");
		var btns = document.getElementById("editusericon");
		var btnaduser = document.getElementById('adduserrg');
		var btndel = document.getElementById('deluserrg');			
		 //var filetxt = $('#default-btnRGuser').val();
		 var filetxt = $('#default-btnRGuser')[0].files[0];
		// console.log(filetxt);
		if(filetxt!= null){
			//console.log(filetxt);
			var filepic = '1';
			arr.push(filepic);
			//console.log(filepic);
			SaveNewAdPicturUser();			 
			 }else{				
				 var filepic = '2';
				 arr.push(filepic);
				 // console.log(filepic);
				 }
			for(var i =0; i < input.length; i++){
			arr.push(input[i].value);
				//console.log(input[i].value);
				}
				// console.log(arr);
				$.ajax({
					url:"../phpsv/SaveDbNewuser.php",
						method:"POST",
						data:{arr_data:arr},
						dataType:"text",
					// success: function(res){
					// 		console.log(res);
							
					// 		}			
					})
					btns.style.display='block';
					btnaduser.style.display='block';
					btndel.style.display='block';		
			Func_EnabledInputelement();
}
////------------------------------------------ฟังก์ชั่น สำหรับ บันทึกข้อมูลรูปภาพสมาชิกใหม่	
function SaveNewAdPicturUser(){
	// console.log("test-picture");
	var forData = new FormData();
	var name =  $('#code_rguser').val();
	//var name ='00000';
		var file = $('#default-btnRGuser')[0].files[0];
		// console.log(file);
		var filetxt = $('#default-btnRGuser').val();		
	if(filetxt != ''){	
					forData.append('file', file);		
					forData.append('filename', name);
					//console.log(file);
				$.ajax({
							url:"../phpsv/SavenewpicUser.php",
							method:"POST",
							data:forData,
							contentType:false,
							processData:false,
							success: function(res){
								//alert(res);
								}			
						 })
		}
		
}
////------------------------------------------ฟังก์ชั่น สำหรับลบข้อมูลสมาชิกใหม่			 
function Func_Delete_userid(){
	var id = localStorage.getItem("useriddel");
	if(id !=  null){
		//console.log(id);
		var name = document.getElementById("Fname_rguser").value;	
		document.getElementById("lb_headCleck").textContent='ยันยันการลบข้อมูลสมาชิก: '+name+'';		
		var popup = document.getElementById("boxModal_popCleck");	
		popup.style.display="block";
		
		$(document).on('click', '.bt_Cleck', function(){
			func_delAjaxUser(id);
			})
		$(document).on('click', '.close_popCleck', function() {
			popup.style.display ='none';
			localStorage.removeItem("useriddel"); 
		});
	}
}
function func_delAjaxUser(id){	
	var txt ='';
		//console.log(id);
		$.ajax({
				url:"../phpsv/Deluser.php",
				method:"POST",
				dataType:"text",
				data:{iduser:id},
				success: function(res){
					//console.log(res);
					localStorage.removeItem("useriddel"); 
					}			
				})
						 showListTB_userregis(txt);
						 func_ClearInputRGuser();
						localStorage.removeItem("useriddel"); 
	var popup = document.getElementById("boxModal_popCleck");	
	popup.style.display="none";	
			
}
function myClickTab(dis){
	if(dis.id == 'index'){
		console.log('test');
		location.href = "../assets/index.php";
	}else if(dis.id == 'search'){
		location.href = "../file-page/books-hit.php";
	}else if(dis.id == 'regisbooks'){
		location.href = "../assets/regisbooks.php";
	}else if(dis.id == 'calendar'){
		location.href = "../assets/calendar.php";
	}else if(dis.id == 'barcode'){
		location.href = "../assets/barcode.php";
	}else if(dis.id == 'user'){
		location.href = "../assets/user-regis.php";
	}else if(dis.id == 'admin'){
		location.href = "#!";
	}else if(dis.id == 'report'){
		location.href = "../filepage/report-index.php";
	}else if (dis.id == 'regisebook'){
		location.href = "../assets/ebooks-regis.php";
	}else if(dis.id == 'uploadfile'){
		location.href = "../assets/ebookupload.php";
	} else if (dis.id == 'recutbooks') {
		location.href = "../assets/recutBooks.php";
	} else {
		stop;
	}
	// location.href = "index.php";
}
function Func_show_statustotal(){
	$.ajax({
	   url:"../phpsv/showstatusallbooks.php",
	   method:"POST",
	   dataType:"json",
	   success:function(data){
				   // console.log(data);		
		   $('.count-user').text(data[0].totaluser);
		   $('.count-totalbooks').text(data[0].numask);

	   }
	})

}


						

