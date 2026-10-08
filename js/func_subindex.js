// ---------------------------------------------แท็บเมนู ยืม คืน จอง ค่าปรับ---------------------

$(document).ready(function(){
	document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
	funciton_ShowModule();
	func_testPostms();
})
function myTabClik_table(cityName, elmnt, status) {
	// Hide all elements with class="tabcontent" by default */
	var i, tabcontent, tablinks;
  	// console.log(status);
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
	
}
document.getElementById("defaultOpenTable").click();
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
CalendarThai_status();
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
document.getElementById("defaultOpenTable").click();
// -----------------------------------------------------------ฟังก์ชั่น  keybarcode 
const nameF = document.getElementById('nameF');
const nameL = document.getElementById('nameL');
const iduser = document.getElementById('ipt_numbarCode');
const memoTxt = document.getElementById('momotxt-detail');
const smgTxt = document.getElementById('id-text-lb-p1-msg');
const Position = document.getElementById('idPosition');
const imageTxt = document.getElementById('img_txt_Id');
const alertMsg = document.getElementById('id-text-lb-p1-msg');
const cProduct = document.getElementsByClassName('ipt_footer_product')[0];	
// Allow window to listen for a postMessage


function func_testPostms(){
	// console.log('test get messages');
	var channel = new BroadcastChannel("foo");
	channel.onmessage = function(e){
	//   console.log(e.data.length);
		// console.log('test get messages');		
		if(e.data){		
			//  console.log('test-run');
			let ar = JSON.parse(e.data);
		//  console.log(ar.length);
		if(ar.length > 0){
			//  console.log(ar.length);	
		if(ar[0].state_fix === "FKINUSER"){
			//คลิกคีย์ข้อมูลเลขรหัสลูกค้าในช่อง input
			 console.log('คลิกคีย์ข้อมูลเลขรหัสลูกค้าในช่อง input');
			// document.getElementsByClassName('tb_list_cirulation')[0].innerHTML="";
			// document.getElementsByClassName('tb_list_inputbook')[0].innerHTML ="";
			// document.getElementById('tb_list_fines').innerHTML = "";
			func_ShowDetailUserINput(ar);
		 }else if(ar[0].state_fix === "SHUSER"){
			document.getElementsByClassName('tb_list_cirulation')[0].innerHTML="";
			document.getElementsByClassName('tb_list_inputbook')[0].innerHTML ="";
			document.getElementById('tb_list_fines').innerHTML = "";
			// console.log('คีย์ข้อมูลค้นหารายชื่อสมาชิก');
				//คีย์ข้อมูลค้นหารายชื่อสมาชิก
				func_ShowDetailUserINput(ar);
		 }else if(ar[0].state_fix === "OPENLIST"){
			// console.log('คลิกปุ่มโชว์รายการหนังสือที่ย้ืม');
			func_ClickOpenList(ar);
			//คลิกปุ่มโชว์รายการหนังสือที่ย้ืม		
		  }else if(ar[0].state_fix === "SHFINES"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log('เรียกข้อมูลค่าปรับที่ค้าง');
			func_showFines(ar);
		 }else if(ar[0].state_fix === "TABCLICK"){
			// console.log('คลิกเปลี่ยนแท็บยืม-คืน' +ar[0].status);
			if(ar[0].status == 1){
				// document.getElementsByClassName('tb_list_cirulation')[0].innerHTML="";
				document.getElementById("defaultOpenTable").click();
			}else if(ar[0].status == 2){
				// console.log('test status 2');
				document.getElementById("Tab-order").click();
			}else if(ar[0].status == 3){
				document.getElementById("Tab-fines").click();
			}else if(ar[0].status == 4){
				// document.getElementsByClassName('tb_list_inputbook')[0].innerHTML ="";
				document.getElementById("Tab-return").click();
			}else{
				alert('Status tab not found');
			}
		}else if(ar[0].state_fix === "RETURNBK"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log('คีย์ข้อมูลคืนหนังสือ');
			func_reTurnBook(ar);
		 }else if(ar[0].state_fix === "CANCEL"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log('คีย์ข้อมูลคืนหนังสือ');
			func_CanCel();
		 }else if(ar[0].state_fix === "INBK"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log("test INPUT");
			func_showInputbooks(ar);
		 }else if(ar[0].state_fix === "DELFiNES"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log("test INPUT");
			func_ShowDEL_fines();
		 }else if(ar[0].state_fix === "PayMent"){
			//เรียกข้อมูลค่าปรับที่ค้าง
			// console.log("test INPUT");
			Func_payment();
		 }	
		} 
		}
	
	}
}

function Func_payment(){
	document.getElementById("tb_list_fines").innerHTML ="";
	// alertMsg.innerText = htmlparser;
	alertMsg.style.display ='none';
}





/*--------------------------------ฟังก์ชั่น แสดงค่าหนังสือทั้งหมด จำนวนสมาชิกทั้งหมด */
async function funciton_ShowModule(){
	// console.log("test-show async");
	let response = await new Promise(resolve => {
		var xml = new XMLHttpRequest();
		xml.open("POST", "../phpsv/showstatusallbooks.php", true);
		xml.onreadystatechange = function(){		
			if(xml.readyState === 4 && xml.status === 200){
			var data = JSON.parse(xml.responseText);
				// console.log(data[0].numask);
				document.getElementsByClassName("count-totalbooks")[0].innerText = data[0].numask;
				document.getElementsByClassName("count-novel")[0].innerText = data[0].totalFbk;
				document.getElementsByClassName("count-learning")[0].innerText = data[0].totaledu;
				document.getElementsByClassName("count-user")[0].innerText = data[0].totaluser;
			}
	}
		xml.onerror = function () {
		  resolve(undefined);
		  console.error("** An error occurred during the XMLHttpRequest");
		};
		xml.send();
	 }) 

/*console.log('test-sendxml');
	var xml = new XMLHttpRequest();
	xml.open("POST", "../phpsv/showstatusallbooks.php");
	xml.send();
	xml.onreadystatechange = function(){		
		if(xml.readyState === 4 && xml.status === 200){
		var data = JSON.parse(xml.responseText);
			console.log(data);
		}
}*/
/*let response = await new Promise(resolve => {
	var xhr = new XMLHttpRequest();
	xhr.open("GET", url, true);
	xhr.onload = function(e) {
	  resolve(xhr.response);
	};
	xhr.onerror = function () {
	  resolve(undefined);
	  console.error("** An error occurred during the XMLHttpRequest");
	};
	xhr.send();
 }) */
 /*(async () => {
	let response = await new Promise(resolve => {
	   var xhr = new XMLHttpRequest();
	   xhr.open("GET", url, true);
	   xhr.onload = function(e) {
		 resolve(xhr.response);
	   };
	   xhr.onerror = function () {
		 resolve(undefined);
		 console.error("** An error occurred during the XMLHttpRequest");
	   };
	   xhr.send();
	}) 
	doTheThing(response)
 })()*/
}
function func_ShowDEL_fines(){
	document.getElementById("tb_list_fines").innerHTML ="";
	alertMsg.innerText = htmlparser;
	alertMsg.style.display ='none';
}
function func_CanCel(){
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
	document.getElementById('icon-alertred-order').style.display ='none';
}
function func_ClickOpenList(ar){
	// console.log(ar.length);	
	var tb = document.getElementsByClassName('tb_list_cirulation')[0];
	var FIHTML = '';	
	// const tr = document.createElement("tr");
/*for(let j =0; j < ar.length; j++){
	for(let i =0; i < 5; i++){
		const td = document.createElement('td');
		const cellText = document.createTextNode(`cell in row ${i}, column ${j}`);
		tr.setAttribute('class', 'tr_exbooks tr_List')
		td.appendChild(cellText);
		tr.appendChild(td);
	}

}
 tb.appendChild(tr);	*/
 ar.forEach((item) =>{
	// console.log(item.BARCODE);	
	FIHTML +='<tr class="tr_exbooks tr_List" id='+item.ID_ex_barcodebook+' style="height: 50px;">';	
		FIHTML +='<td id="tblist_fines" class="tbbar_fines">'+item.ID_ex_barcodebook+'</td>';
		FIHTML +='<td id="tblist_fines" class="tbdn_fines">'+item.CATBOOK+'|'+item.BYNUM+'</td>';
		FIHTML +='<td id="tblist_fines" class="tbdn_fines" ><span class="label bg-danger" style="font-size: 16px;">'+_forMatDat(item.Day_end, 0).endd +'</span></td>';
		FIHTML +='<td id="tblist_fines" class="tbdc_fines">'+_forMatDat(0, item.Day_start).start+'</td>';
		FIHTML +='<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">'+item.NAME_BOOK+'</td>';														
		FIHTML +='</tr>';
 })
//  console.log(FIHTML);
 tb.innerHTML = FIHTML;
cProduct.value = ar.length;
}
function _forMatDat(endd, start){
	 
	if(endd != 0){
		const date = new Date(endd);
		 const dayEnd =  date.toLocaleDateString('en-GB');
		endd = dayEnd;			
	}else{
		endd = "";	
	// var dayEnd = '';
	}			
	if(start !=0){			
		const dataStart = new Date(start);
		const dStart =  dataStart.toLocaleDateString('en-GB');			
	start = dStart;
	}else{
		start = "";
	}
	// console.log(endd+"|"+start);
		// console.log(endd);		
		 return {endd, start}
		
		
	

}
function func_showInputbooks(ar){
	var tb = document.getElementsByClassName('tb_list_cirulation')[0];
	var FIHTML = '';
	var barcode ;
	ar.forEach((item) =>{
		// console.log(item.BARCODE);	
			barcode = item.inputCode;
			FIHTML +='<tr class="tr_exbooks tr_List" id='+item.ID_ex_barcodebook+'>';	
			FIHTML +='<td id="tblist_fines" class="tbbar_fines">'+item.ID_ex_barcodebook+'</td>';
			FIHTML +='<td id="tblist_fines" class="tbdn_fines">'+item.CATBOOK+'|'+item.BYNUM+'</td>';
			FIHTML +='<td id="tblist_fines" class="tbdn_fines" ><span class="label bg-danger" style="font-size: 16px;">'+_forMatDat(item.Day_end, 0).endd+'</span></td>';
			FIHTML +='<td id="tblist_fines" class="tbdc_fines">'+_forMatDat(0, item.Day_start).start+'</td>';
			FIHTML +='<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">'+item.NAME_BOOK+'</td>';														
			FIHTML +='</tr>';
	 })
	//  console.log(FIHTML);
	
	 tb.innerHTML = FIHTML;
	cProduct.value = ar.length;	
	func_strcolorINPUT_Row(barcode)
}
function func_showFines(ar){
	// console.log('alert-show fines');
	// console.log(ar);
	var data = ar;
					var FIHTML = '';
					var HTMLSUM = 0;
					var htmlparser ='';
					var sum = 0, total =0;
				if(data == null)
				{
					stop;
					}else{
					
					for(i = 0; i < data.length; i++)
							{
								//alert(data[i].cash_book);
								if(data[i].str == 1)// มีค่าปรับและมีัเงินค้างขำระ
								{
									
											FIHTML +='<tr id="'+data[i].idbk+'" ondblclick="Func_editFines(this)">';												
												FIHTML +='<td id="tblist_fines" class="tbbar_fines">'+data[i].idbk+'</td>';
												FIHTML +='<td id="tblist_fines" class="tbdn_fines"><span class="label bg-danger" style="font-size: 16px;">'+_forMatDat(data[i].nstart, 0).endd+'</span></td>';
												FIHTML +='<td id="tblist_fines" class="tbdn_fines">'+_forMatDat(0, data[i].dayinport).start+'</td>';
												FIHTML +='<td id="tblist_fines" class="tbdc_fines">'+data[i].cday+'</td>';
												FIHTML +='<td id="tblist_fines" class="tbfb_fines">'+data[i].cash_book+'</td>';
												FIHTML +='<td id="tblist_fines" class="tbfin_name td-list-p1-nbk">'+data[i].namebook+'</td>';														
											FIHTML +='</tr>';
										
										sum += parseFloat(data[i].cash_book);
										
									HTMLSUM =  parseFloat(data[i].cash_sum);										
									//alert(data[i].cash_sum);
									//alert(HTMLSUM);
									// console.log(data[i].str);		
								}
								else if(data[i].str == 2)//ไม่มีค่าปรับแต่มีเงินค้างชำระ
								{
									HTMLSUM = ''+data[i].cash_sum+'';
									
								}
								
							}						
						}
							//alert(HTMLSUM);
							sum += parseFloat(HTMLSUM);
							if(sum == 0 )
								{	
									document.getElementById('id-text-lb-p1-msg').style.display='none';	
									stop;
									}else{																	
										htmlparser = 'มีค่าปรับค้างชำระจำนวน'+sum +'บาท';
										alertMsg.innerText = htmlparser;
										alertMsg.style.display ='block';
										
										}
								$('.ipt_footer_fines').val(HTMLSUM);
								$('.ipt_footer_cash').val(sum);
										//  console.log(FIHTML);
							$('#tb_list_fines').html(FIHTML);

}
function func_ShowDetailUserINput(ar){	
	const tb = document.getElementsByClassName('tb_list_cirulation')[0];
	var numR = Math.random();
	cProduct.value = "";
	nameF.innerText = "";
	nameL.innerText = "";
	iduser.innerText = "";
	smgTxt.innerText = "";
	Position.innerText = "";
	alertMsg.innerText ="";
	nameF.innerText = ar[0].FNAME;
	nameL.innerText = ar[0].LNAME;
	iduser.innerText = ar[0].IDUSERCODE;
	memoTxt.innerText = ar[0].POSITION;
	Position.innerText = ar[0].rangtxt;
	if(ar[0].IMAGEFILE){
		imageTxt.src = "../imageuser/"+ar[0].IMAGEFILE+'?v='+numR;
	}else{
		imageTxt.src = "../fileimage/images-personal-icon.png";
	}
	tb.innerHTML ="";	
}
function func_reTurnBook(ar){	
	// ar.sort((a, b) => b - a);
	// console.log(ar);
	var numR = Math.random();
	let data = ar;
	var code, name, lname, position, path_pic, rankclass, txtposition, barcode,  HTML = '';
	for(var i = 0; i < data.length; i++)
												{
													code = ''+data[i].idu+'';
													name = ''+data[i].Fname+'';
													lname = ''+data[i].Lname+'';
													position = ''+data[i].position+'';
													path_pic = ''+data[i].pathpic+'';
													rankclass = data[i].rankclass;													
													barcode = data[i].idbk;
													batth = data[i].bath;
														HTML += '<tr class="tr_inputbk"  id="'+data[i].idbk+'" style="height: 50px;";>'
															HTML += '<td id="td_inputbk" class="td_inputbkno">#</td>';
															HTML += '<td id="td_inputbk" class="td_inputbkcode">'+data[i].idbk+'</td>';
															HTML += '<td id="td_inputbk" class="td_inputbkcat">'+data[i].cat+'|'+data[i].bynum+'</td>';
															HTML += '<td id="td_inputbk" class="td_inputbkdayend"><span class="label bg-danger" style="font-size: 16px;">'+_forMatDat(data[i].dend, 0).endd+'</span></td>';
															HTML += '<td id="td_inputbk" class="td_inputbkdaystart">'+_forMatDat(0, data[i].dstary).start+'</td>';
															HTML += '<td id="td_inputbk" class="td_inputbkname">'+data[i].namebook+'</td>';
														HTML += '</tr>';
																									
												}
															$('.ipt_numbarCode').text(code);
															$('.ipt_Fname').text(name);
															$('.ipt_Lname').text(lname);															
															$('.ipt_ClassPo').val(rankclass);
															// console.log(rankclass);
															if(rankclass == 0){
																txtposition = "ไม่พบตำแหน่งข้อมูลผู้ใช้บริการ";
																}else if(rankclass == 1){
																	txtposition = "พยาบาล";
																	}else if(rankclass == 2){
																		txtposition = "ผู้ช่วยเหลือคนไข้";
																		}else if(rankclass == 3){
																			txtposition = "นิสิตแพทย์";
																			}else if(rankclass == 4){
																				txtposition = "นักศึกษาฝึกงาน";
																				}else if(rankclass == 5){
																					txtposition = "เจ้าหน้าที่ รพ";
																					}else if(rankclass == 6){
																						txtposition = "เภสัช";
																					}else if(rankclass == 7){
																						txtposition = "บุคคลภายนอก";																			
																				}else if(rankclass == 8){
																				txtposition = "อาจารย์แพทย";																			
																			}else if(rankclass == 9){
																			txtposition = "แพทย์้";																			
																		}else{
																			txtposition = "ไม่มีข้อมูลตรวจเช็คตำแหน่งสมาชิก";
																			}															
															$('.ipt_position').text(txtposition);
															$('.lb-memotxt-p1js').text(position);
															$('.tb_list_inputbook').append(HTML);
															// console.log(batth);
															 document.getElementById('id-text-lb-p1-msg').innerText ="";
															 func_strcolor_Row(barcode);
															if(path_pic != ""){	
																	imageTxt.src = "../imageuser/"+path_pic+'?v='+numR;
																	}else{
																		imageTxt.src = "../fileimage/images-personal-icon.png";
																		}																
													var iptValIDU = code;
													//console.log(iptValIDU);													
															$('.tb_list_cirulation').html("");
													
}
// -------------------------------------ฟังก์ชั่นแสดงแทบสีแถวคืนหนังสือ	
function func_strcolor_Row(barcode){
	// console.log('func_strcolor_Row');	
	var idROWs = barcode;
		//console.log(id);
	// ---------------------------------------------------------------------------------------
	const tb = document.getElementsByClassName('tb_list_cirulation')[0];
	var tbody = document.querySelector('.tb_list_inputbook'),
		bRows = [...tbody.rows];
	// console.log(bRows);
		bRows.sort((a, b) =>{
			let x = a.getElementsByTagName('td')[0].innerHTML.toLowerCase(),
			y = b.getElementsByTagName('td')[5].innerHTML.toLowerCase();	
			return -1;		
		})

		bRows.map ((bRow)=>{
			// console.log(bRows.innerHTML);
			tbody.appendChild(bRow);
		})

	var btns =   document.querySelectorAll(".tr_inputbk");
	//btns.getAttribute("id1")
	//console.log(btns.attributes[3].value);
		for(var i = 0; i < btns.length; i++) {
			//console.log(btns[i].getAttribute("id"));				
			if(btns[i].getAttribute("id") == idROWs){
				btns[i].style.backgroundColor = '#FFB8A0',
				btns[i].style.color = 'white',
				btns[i].style.height = "50px";					
					 }else{
						btns[i].style.backgroundColor = '';
						btns[i].style.color = '#777777';
					}
			}

}
function func_strcolorINPUT_Row(barcode){
	// console.log('func_strcolor_Row');	
	var idROWs = barcode;
		//console.log(id);
	// ---------------------------------------------------------------------------------------

	var btns =   document.querySelectorAll(".tr_exbooks");
	//btns.getAttribute("id1")
	// console.log(btns);
		for(var i = 0; i < btns.length; i++) {
			// console.log(btns[i].getAttribute("id"));				
			if(btns[i].getAttribute("id") == idROWs){
				btns[i].style.backgroundColor = '#FFB8A0',
				btns[i].style.color = 'white',
				btns[i].style.height = "50px";					
					 }else{
						btns[i].style.backgroundColor = '';
						btns[i].style.color = '#777777';
						btns[i].style.height = "50px";	
					}
			}

}
