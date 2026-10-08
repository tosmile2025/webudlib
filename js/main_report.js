// ---------------------------function  default----------------------------------
var monthNames = [
	"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
	"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
	"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var weekdaySlice = [
	"อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"	
];
$(document).ready(function(){	
    document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
	var time = '';	
     CalendarThai_status();        
     Func_Check_Login();    
 });
 $(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})

 function myClickTab(dis){
     if(dis.id == 'index'){
        //  console.log('test');
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
     }else if (dis.id == 'recutbooks') {
		location.href = "../assets/recutBooks.php";
	} else {
		stop;
	}
     // location.href = "index.php";
 }	
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

function CalendarThai_status(){	
	var w = new Date();		
	var Week = weekdaySlice[w.getDay()];		
	var year = w.getFullYear() + 543;
	var month = monthNames[w.getMonth()];		
	var numOfDay = w.getDate();
	// console.log(numOfDay);
	var txt = "วัน"+Week +'&nbsp'+'ที่' +'&nbsp;'  + numOfDay + '&nbsp;' + month + '&nbsp;' + year;
	document.getElementById('lb-dayupdate').innerHTML = txt;
}

 // ------------------------ฟังก์ชั่น Tab page ลงทะเทียน / สำเนา-----------
 document.getElementById("btn_menu_one").click();
 function myTabClick_regisebooks(elm, dis, status){
	 console.log(elm);
     var btn_tab = document.querySelectorAll('.btn-tab');  
	 		localStorage.setItem('str', status);
     if(status == 'e1'){	
		showbookslist();	
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		})        
     }else if(status == 'e2'){	
		func_show_two();	
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		}) 
     }else if(status == 'e3'){
		sch_inportbooks();
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		})        
         
     }else if(status == 'e4'){
		func_cashier();
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		})        
         
     }else if(status == 'e5'){
		showHitbooks();
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		})        
         
     }else if(status == 'e6'){
		var inputSch='';
		show_Noinportbooks(inputSch);
		btn_tab.forEach((item)=>{
			if(item == dis){
				// console.log(item.classList);
				item.classList.replace('btn-danger', 'btn-facebook');
			}else{
				item.classList.replace('btn-facebook', 'btn-danger');
			}
		})        
         
     }else if(status == "e7"){
		show_dataList_Catbooks();
	 }else if(status == "e10"){
		// console.log("ยังไม่ได้ทำ");
		AlertPopupInput() ;
		
	 }else if(status == "e8"){
		Renewbooks();
	 }
     var tabcontent = document.getElementsByClassName('popcontent-regisebk');
     for(var i =0; i < tabcontent.length; i++){
         tabcontent[i].style.display='none';
         
     }
     document.getElementById(elm).style.display='block';     
 }
//  ---------------------alert2 input   บอปอัพใส่หมาวดหนังสือรายงานหนังสือที่คัดออกจากระบบ
function AlertPopupInput() {
	Swal.fire({
  title: "ใส่อักษรตัวแรกของเลขบาร์โค้ด",
  input: "text",
  inputAttributes: {
    autocapitalize: "off"
  },
  showCancelButton: true,
  confirmButtonText: "ออกรายงาน",
  showLoaderOnConfirm: true,
  preConfirm: async (item) => {
    try {
   if(item == ""){
	// console.log('null');
		Swal.showValidationMessage(`
        Request failed: กรุณาใส่ตัวอักษรตัวเลขของเลขบาร์โค้ด
      `);
   }else{
	// console.log('s');	
	func_CutbooksOut(item);
   }   
    } catch (error) {
      Swal.showValidationMessage(`
        Request failed: ${error}
      `);
    }
  },
  allowOutsideClick: () => !Swal.isLoading()
})
} 

 function func_CutbooksOut(item) {
	// console.log('run program');
	// console.log();
	
	const xml = new XMLHttpRequest();
	const myData = new FormData();
	myData.append('data',item);
	xml.open("POST", "../phpsv/export_cutbookExcell.php");
	xml.send(myData);
	xml.onreadystatechange =()=>{
		if(xml.status == 200 && xml.readyState == 4){
			// console.log(xml.responseText);
			
			const txtData = JSON.parse(xml.responseText);
			if (txtData[0].status == false) {
                    // console.log("ok");
                  alertPopup("Not found", "ไม่พบข้อมูล");

                } else {
                    window.open(txtData[0].path, '_blank');
                }
		}
	}
	

	
 }
 function alertPopup(txt, txt2) {

Swal.fire({
  icon:txt,
  title: "Oops...",
  text: txt2,
//   footer: '<a href="#">Why do I have this issue?</a>'
});
 }
 /*--------------------------------------------------------Function หน้า รายงานหนังสือ-----ฟังก์ชั่นปอบอัพโหลดข้อมูล---*/ 		
 $(document).on('click', '.btn-config-one', function(){
	popup_config_one();
 })
 $(document).on('click', '.btn-config-sven', function(){
	popup_config_sven();
 })
 $(document).on('click', '.btn-config-renbk', function(){
	popupalert_two();
 })
 $(document).on('click', '.close-btnalert', function(){
	var pop = document.getElementById('myModal-alert');
	var pop_sven = document.getElementById('myModal-sven');
	var poptwo = document.getElementById('myModal-two');
	document.getElementsByClassName('box-display')[0].style.display='none';
	poptwo.style.display='none';
	pop.style.display='none';
	pop_sven.style.display='none';
 })
 $(document).on('click', '.btn-enter-one', function(){
	ShowListBook_report();
 })
 $(document).on('click', '.btn-enter-sven', function(){
	ShowListCAT_report();
 })
 $(document).on('click', '.btn-export-one', function(){
	//exportPDF_report();
	func_export_excelOne('xlsx', 'รายงานหมวดหมู่หนังสือ');
	})
$(document).on('click', '.btn-export-sven', function(){
		//exportPDF_report();
		//var TBexcel =  new Table2Excel();
			//console.log(TBexcel);
			//TBexcel.export(document.querySelectorAll("#invoice-tb-sven"));
			func_export_excelSven('xlsx', 'รายงานหมวดหมู่หนังสือ');
})
$(document).on('click', '.btn-export-renbk', function(){
	//exportPDF_report();
	//var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		//TBexcel.export(document.querySelectorAll("#invoice-tb-sven"));
		func_export_renew('xlsx', 'รายงานหมวดหมู่หนังสือ');
})
 $(document).on('click', '.btn-enter-two', function(){
	ShowListBook_report();
 })
 $(document).on('click', '.btn-export-two', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice-tb-two"));
})
$(document).on('click', '.btn-export-three', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice-tb-three"));
})
$(document).on('click', '.btn-export-four', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice-tb-four"));
})
$(document).on('click', '.btn-export-five', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice-tb-five"));
})	
$(document).on('click', '.btn-export-six', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice-tb-six"));
})					
$(document).on('click', '.btn-config-two', function(){
	popupalert_two();
 })
 $(document).on('click', '.btn-config-bkhit', function(){
	popupalert_two();
 })		
 $(document).on('click', '.btn-yesthree', function(){
	sch_inportbooks();
 })	
 $(document).on('click', '.btn-yesrenew', function(){
	Search_Renewbooks();
 })	
 $(document).on('click', '.btn-yesfour', function(){
	func_cashier();
 })
 function popup_config_one(){
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-enter-one" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	
	// document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	// console.log('test-tx');
	var pop = document.getElementById('myModal-alert');
	pop.style.display='block';
 }
 function popup_config_sven(){
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-enter-sven" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	
	// document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnsven').innerHTML = btntxt;
	// console.log('test-tx');
	var pop = document.getElementById('myModal-sven');
	pop.style.display='block';
 }
 
 function func_export_renew(fileextension, fileName){
	var dataTB = document.getElementById('invoice-tb-renew');
	var wp= XLSX.utils.table_to_book(dataTB,{sheet:'sheet1'});
	return XLSX.writeFile(wp, fileName+"."+fileextension || ('MySheetName.' + (fileextension || 'xlsx')));
 }
 function func_export_excelSven(fileextension, fileName){
	var dataTB = document.getElementById('invoice-tb-sven');
	var wp= XLSX.utils.table_to_book(dataTB,{sheet:'sheet1'});
	return XLSX.writeFile(wp, fileName+"."+fileextension || ('MySheetName.' + (fileextension || 'xlsx')));
 }
 function Search_Renewbooks(){
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	var popalert = document.getElementById('myModal-two');
	var txtnum = document.getElementsByClassName('Unit-inport-renew')[0];
	//  console.log(txtnum);	
	var statDay = '';
	var EndDay = '';
	var HTML = '';
	var numrow ="";
	if(txt_start.value != ""){	
		// console.log(txt_start.value);
		
		const[dayst, monthst, yearBest]= txt_start.value.split('-');
		const formattDateStart = `${yearBest}-${monthst}-${dayst.padStart(2, '0')}`;
		const[dayEnd, monthEnd,yearBeEnd,]= txt_end.value.split('-');
		const formattDateEnd = `${yearBeEnd}-${monthEnd}-${dayEnd.padStart(2, '0')}`;
		// console.log(formattDateEnd);
		statDay = formattDateStart;
		EndDay = formattDateEnd;
	}	
	$.ajax({
		url:"../phpsv/showReport_renew.php",
		method:"POST",
		data:{statDay :statDay, EndDay:EndDay },				
		dataType:"json",
		success: function(data){
			// console.log(data);
				if(data == null){
					txtnum.value="";		
					}else{
						numrow = data.length;
						data.forEach((item)=>{
							// console.log(item);
							HTML +='<tr>';
							HTML +='<td>'+item.bc+'</td>';
							HTML +='<td>'+item.name+'</td>';
							HTML +='<td>'+item.catbk+'</td>';
							HTML +='<td>'+item.year+'</td>';
							HTML +='<td>'+item.dayrenew+'</td>';
							HTML +='</tr>';
						})
						
					}
					// console.log(numrow);
					popalert.style.display= 'none';
					txtnum.value=numrow;
					txt_start.value = "";
					EndDay = txt_end.value = "";
					document.getElementsByClassName('datanotfound-renew')[0].innerHTML="";	
					document.getElementsByClassName('tb-list-renew')[0].innerHTML=HTML;	
					//func_showTableList_one(numrow);	
			}
		
		})
 }
 function Renewbooks(){
	var txtnum = document.getElementsByClassName('Unit-inport-renew')[0];
	var arrtxt  = "";
	var numrow="";
	var HTML = "";
	$.ajax({
		url:"../phpsv/showReport_renew.php",
		method:"POST",
		data:{arrtxt:arrtxt},				
		dataType:"json",
		success: function(data){
			// console.log(data);
				if(data == null){
								
					}else{
						numrow = data.length;
						data.forEach((item)=>{
							// console.log(item);
							HTML +='<tr>';
							HTML +='<td>'+item.bc+'</td>';
							HTML +='<td>'+item.name+'</td>';
							HTML +='<td>'+item.catbk+'</td>';
							HTML +='<td>'+item.year+'</td>';
							HTML +='<td>'+_forMatDat(item.dayrenew, 0).endd+'</td>';
							HTML +='</tr>';
						})
					}
					var txtnum = document.getElementsByClassName('Unit-inport-renew')[0];
					txtnum.value = numrow;
					document.getElementsByClassName('datanotfound-renew')[0].innerHTML="";	
					document.getElementsByClassName('tb-list-renew')[0].innerHTML=HTML;	
					//func_showTableList_one(numrow);	
			}
		
		})
 }
 function show_dataList_Catbooks(){
	var arrtxt  = "";
	var HTML = "";
	$.ajax({
		url:"../phpsv/showListCat-rpt.php",
		method:"POST",
		data:{arrtxt:arrtxt},				
		dataType:"json",
		success: function(data){
			// console.log(data);
				if(data == null){
								
					}else{
						numrow = data.length;
						data.forEach((item)=>{
							// console.log(item);
							HTML +='<tr>';
							HTML +='<td>'+item.bc+'</td>';
							HTML +='<td>'+item.name+'</td>';
							HTML +='<td>'+item.catbk+'</td>';
							HTML +='<td>'+item.year+'</td>';
							HTML +='<td>'+item.price+'</td>';
							HTML +='</tr>';
						})
					}
					document.getElementsByClassName('datanotfound-sven')[0].innerHTML="";	
					document.getElementsByClassName('tb-list-sven')[0].innerHTML=HTML;	
					//func_showTableList_one(numrow);	
			}
		
		})
 }
 function ShowListCAT_report(){			
	var arr = document.querySelectorAll('.txt-ipt-sven');
	var nodata = '<label class="label label-inverse-warning">Data Not Found</label>';
	var pop = document.getElementById('myModal-sven');
	var HTML ='';
	var numrow = 0;
	var arrtxt = new Array();
	arr.forEach((item)=>{
		arrtxt.push(item.value);
	})
	if(arrtxt[0] == ''){
		popupError('กรุณาใส่เลขหมวดหมู่เริ่มต้น');
		return;
	}
	if(arrtxt[1] == ''){
		popupError('กรุณาใส่เลขหมวดหมู่สุดท้าย');
	return;
	}		//console.log(slc);
	// console.log(arrtxt);
			$.ajax({
				url:"../phpsv/showListCat-rpt.php",
				method:"POST",
				data:{arrtxt:arrtxt},				
				dataType:"json",
				success: function(data){
					 //console.log(data);
						if(data == null){
								document.getElementsByClassName('datanotfound-sven')[0].innerHTML=nodata;						
							}else{
								numrow = data.length;
								data.forEach((item)=>{
									// console.log(item);
									HTML +='<tr>';
									HTML +='<td>'+item.bc+'</td>';
									HTML +='<td>'+item.name+'</td>';
									HTML +='<td>'+item.catbk+'</td>';
									HTML +='<td>'+item.year+'</td>';
									HTML +='<td>'+item.price+'</td>';
									HTML +='</tr>';
								})
							}
							document.getElementsByClassName('datanotfound-sven')[0].innerHTML="";	
							document.getElementsByClassName('tb-list-sven')[0].innerHTML=HTML;	
							//func_showTableList_one(numrow);	
					}
				
				})
				pop.style.display='none';
}
function ShowListBook_report(){			
	var arr = document.querySelectorAll('.ipt-pop-one');
	var nodata = '<label class="label label-inverse-warning">Data Not Found</label>';
	var pop = document.getElementById('myModal-alert');
	var HTML ='';
	var numrow = 0;
	var arrtxt = new Array();
	arr.forEach((item)=>{
		arrtxt.push(item.value);
	})
	if(arrtxt[0] == ''){
		popupError('กรุณาใส่ ปีหรือ พ.ศ');
		return;
	}
	if(arrtxt[1] == ''){
		popupError('กรุณเลือกประเภทหนังสือที่ต้องการค้นหา');
	return;
	}		
	console.log(arrtxt);
	
			$.ajax({
				url:"../phpsv/showLisbook-rpt.php",
				method:"POST",
				data:{arrtxt:arrtxt},				
				dataType:"json",
				success: function(data){
					// console.log(data);
						if(data == null){
								document.getElementsByClassName('datanotfound')[0].innerHTML=nodata;						
							}else{
								numrow = data.length;
								data.forEach((item)=>{
									// console.log(item.bc);
									HTML +='<tr>';
									HTML +='<td>'+item.bc+'</td>';
									HTML +='<td>'+item.name+'</td>';
									HTML +='<td>'+item.cpage+'</td>';
									HTML +='<td>'+item.year+'</td>';
									HTML +='<td>'+item.isbn+'</td>';
									HTML +='</tr>';
								})
							}
							document.getElementsByClassName('datanotfound')[0].innerHTML='';	
							document.getElementsByClassName('tb-list-one')[0].innerHTML=HTML;	
							func_showTableList_one(numrow);	
					}
				
				})
				pop.style.display='none';
}
function showbookslist(){
	var arrtxt = new Array();
	var HTML ='';
	arrtxt.push('show');
	$.ajax({
		url:"../phpsv/showLisbook-rpt.php",
		method:"POST",
		data:{arrtxt:arrtxt},				
		dataType:"json",
		success: function(datax){
			// console.log(datax);
			var numrow = datax.length;
			
						datax.forEach((item)=>{							
							HTML +='<tr>';
							HTML +='<td>'+item.bc+'</td>';
							HTML +='<td>'+item.name+'</td>';
							HTML +='<td>'+item.cpage+'</td>';
							HTML +='<td>'+item.year+'</td>';
							HTML +='<td>'+item.isbn+'</td>';
							HTML +='</tr>';
						})					
					document.getElementsByClassName('tb-list-one')[0].innerHTML=HTML;
					func_showTableList_one(numrow);	
			}
		
		})
		
}
// ----------------------------------- func  pagination page1
function func_showTableList_one(numrow){
	// console.log(numrow);
	var page = 2;
    ulTag = document.getElementById("pagination");
	//console.log(ulTag);
	var tablex ='#invoice-tb-hed';
	var pageNum =0;	
	//console.log(tablex);			
			//console.log(table);
		
				//console.log(num);
				/*$('#maxRows').on('change', function(){*/
					//console.log(table)
					$('#pagination').html('');
						var trnum =0;
						var maxRows = parseInt(9);// จำนวนแถวที่ต้องการแสดง
						var totalRows = numrow; // จำนวน แถว						//console.log(maxRows);		
						// console.log(totalRows);			
					$(tablex+' tr:gt(0)').each(function(){
                        trnum++
						//console.log(trnum);
						if(trnum > maxRows){
							$(this).hide();
							}
						if(trnum <= maxRows){
							$(this).show()
							}
                    });				
								
						//$('.pagination li:first-child').addClass('active');
						$(document).on('click', '#pagination li', function(){
							var pageNum = $(this).attr('data-page');
							var page = $(this).attr('data-num');
							//console.log(this);
							//console.log(page);
							pagination_buttom_one(pageNum, page, totalRows, maxRows, tablex);
							var trIndex =0;							
							//$('.pagination').removeClass('active');
							//$(this).addClass('active');
							//var tb = 'tr:gt(0)';
							//console.log(tb);
						if(pageNum != ""){	
							$(tablex+' tr:gt(0)').each(function(){
								//console.log(pageNum );
                                trIndex++
								//console.log(maxRows*pageNum);
								if(trIndex > (maxRows*pageNum) || trIndex <=((maxRows*pageNum)-maxRows)){
									$(this).hide();
									}else{
										//console.log(this);
										$(this).show();
										}
                            	});
								}
							})
                            pagination_buttom_one(pageNum, page, totalRows, maxRows, tablex);
						//console.log(liTag);
	}
// ----------------------------------- func  pagination page 1	
function pagination_buttom_one(pageNum, page, totalRows, maxRows, tablex){
    var liTag = '';    
    page.toString();
    // console.log(page);
    var activeLi;
    var totalPages = pagenum;
    var beforePages = page - 1;
    var afterPages =   +page+ +1;
    //console.log(beforePages);
    //console.log(afterPages);
if(totalRows > maxRows){
        var pagenum = Math.ceil(totalRows/maxRows);
    //console.log(pagenum);
    if(page > 1){
        //console.log(page);
        var pagesum = page -1;
        //console.log(pagesum);
        liTag += '<li class="btn prev" data-page="" data-num="'+pagesum +'"><span><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>';
        }
        if(page > 2){
                liTag += '<li class="numb" data-page="1" data-num="1" ><span>1</span></li>';
                if(page > 3){
                    liTag += '<li class="dots"><span>...</span></li>';
                    }
            }
        if(page == pagenum){
            beforePages = beforePages -2;
            }else if(page == pagenum - 1){
                beforePages = beforePages -1;
                }
        if(page == 1){
            afterPages  = +afterPages + +2;
            }else if(page == 2){
                afterPages  = +afterPages+  +1;
                }		
        for(var i=beforePages; i <=afterPages;i++){						
                if(i> pagenum){
                    continue;
                    }
                    if(i == 0){
                        i = +i+ +1;
                        }
                    if(page == i){
                        pageNum = page;
                        activeLi = "active";
                            if(pageNum != ""){	
                            var trIndex =0;		
                                $(tablex+' tr:gt(0)').each(function(){
                                    //console.log(pageNum );
                                    trIndex++
                                    //console.log(maxRows*pageNum);
                                    if(trIndex > (maxRows*pageNum) || trIndex <=((maxRows*pageNum)-maxRows)){
                                        $(this).hide();
                                        }else{
                                            //console.log(this);
                                            $(this).show();
                                            }
                                    });
                                    }
                        }else{
                            activeLi = "";
                            }
                        //	console.log(i);
            //$('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show();
            liTag += '<li class="numb '+activeLi+'" data-page="'+i+'" data-num="'+i+'")"><span>'+i+'</span></li>';
            }
        if(page < pagenum - 1){
            //console.log(pagenum);				
            if(page < pagenum -2){
                liTag += '<li class="dots"><span>...</span></li>';
                }
                
                liTag += '<li class="numb" data-num="'+pagenum+'" data-page="'+pagenum+'"><span>'+pagenum+'</span></li>';
            }	
            
            if(page < pagenum){
                    var pagesumn = +page+ +1 ;
                    //console.log(pagesumn);									
                    liTag += '<li class="btn next"data-page="" data-num="'+pagesumn+'"><span>Next<i class="fa fa-angle-right" aria-hidden="true"></i></span></li>';
                    }
}
                    ulTag.innerHTML = liTag;
                    // console.log(ulTag);
}
function _forMatDat(endd, start){
	//  console.log(endd+"|"+start);
		if(endd != 0){
			const dataEnd = new Date(endd);
			var dayEnd = dataEnd.getDate()+'/'+(dataEnd.getMonth()+1)+'/'+dataEnd.getFullYear();
			endd = dayEnd;
		}else{
			endd = "";	
		// var dayEnd = '';
		}			
		if(start !=0){			
			const dataStart = new Date(start);
			var dStart = dataStart.getDate()+'/'+(dataStart.getMonth()+1)+'/'+dataStart.getFullYear();
		start = dStart;
		}else{
			start = "";
		}
			// console.log(endd);		
			return {endd, start}
		
		
	

}
function func_show_two(){
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	var popalert = document.getElementById('myModal-two');	
	var statDay = '';
	var EndDay = '';
	var HTML = '';
	if(txt_start.value != ""){	
		// console.log(txt_start.value);
		
		const[dayst, monthst, yearBest]= txt_start.value.split('-');
		const formattDateStart = `${yearBest}-${monthst}-${dayst.padStart(2, '0')}`;
		const[dayEnd, monthEnd,yearBeEnd,]= txt_end.value.split('-');
		const formattDateEnd = `${yearBeEnd}-${monthEnd}-${dayEnd.padStart(2, '0')}`;
		// console.log(formattDateEnd);
		statDay = formattDateStart;
		EndDay = formattDateEnd;
	}	
	$.ajax({
		url:"../phpsv/Sch-rpt-day.php",
		method:"POST",
		data:{statDay:statDay, EndDay:EndDay},				
		dataType:"json",
		success: function(datax){
	// console.log(datax);
			
			if(datax == null){
				// nodata
				document.getElementsByClassName('tb-list-two')[0].innerHTML=HTML;	
				document.getElementsByClassName('datanotfound-two')[0].innerHTML= 'Data Not Found';
				document.getElementsByClassName('Unit-export')[0].value = '';	
			}else{
				var num = parseFloat(datax.length);
				var number =  num.toLocaleString();	
				datax.forEach((item)=>{							
					HTML +='<tr>';
					HTML +='<td>'+item.IDuser_exbook+'</td>';
					HTML +='<td>'+item.FNAME+'</td>';
					HTML +='<td>'+item.LNAME+'</td>';
					HTML +='<td>'+item.ID_ex_barcodebook+'</td>';
					HTML +='<td>'+_forMatDat(item.Day_end, 0).endd+'</td>';							
					HTML +='</tr>';
				})
				document.getElementsByClassName('datanotfound-two')[0].innerHTML= '';
				document.getElementsByClassName('Unit-export')[0].value = number;					
			document.getElementsByClassName('tb-list-two')[0].innerHTML=HTML;	
			pagination_two();
			}
		
			}
		
		})
		txt_start.value='';
		txt_end.value='';
		popalert.style.display='none';
		
}
// ----------------------------------- func  pagination page2

function getPageList(totalPages, page, maxlength){
	function range(start, end){
		return Array.from(Array(end - start + 1), (_, i) => i + start);
	}
	var sideWidth = maxlength < 9 ? 1 : 2;
	var leftWidth = (maxlength - sideWidth * 2 - 3) >> 1;
	var rightWidth = (maxlength - sideWidth * 2 - 3) >> 1;
	if(totalPages <= maxlength){
		return range(1, totalPages);
	}
	if(page <= maxlength - sideWidth - 1 - rightWidth){
		return range(1, maxlength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages ));
	}
	if(page >= totalPages - sideWidth -1 - rightWidth ){
		return range(1, sideWidth).concat(0, range(totalPages - sideWidth -1 - rightWidth - leftWidth, totalPages));
	}
	return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
}
function pagination_two(){
	var numberOfItems = $(".tb-list-two tr").length;
	var limitPerPage = 7;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	// console.log(totalPages);
	var paginationSize = 7;
	var currentPage;
	function showPage(whichPage){
		if(whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".tb-list-two tr").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage).show();
		$(".pagination-two li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("numb page-item").addClass(item ? "current-page" : "dots")
			.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link-two")
			.attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page")
		 });
		 $('.previous-page').toggleClass("disable", currentPage === 1);
		 $('.next-page').toggleClass("disable", currentPage ===  totalPages);
		 return true;
	}
	$(".pagination-two").append(
		$("<li>").addClass("page-item").addClass("btn prev previous-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Prev')),
		$("<li>").addClass("page-item").addClass("btn next next-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Next'))
	);
	$(".tb-list-two tr").show();
	showPage(1);
	$(document).on("click", ".pagination-two li.current-page:not(.avcive)", function(){
		return showPage(+$(this).text());
	})
	$(".next-page").on("click", function(){
		return showPage(currentPage + 1);
	})
	$(".previous-page").on("click", function(){
		return showPage(currentPage - 1);
	})
	
};
// -----------------------------------------------------------------------------------page 2---------------------
function popupalert_two(){
	
	var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDel">Clcik</button>';     		
	var str = localStorage.getItem('str');
	var pop = document.getElementById('myModal-two');
	
	// console.log(btn);
	if(str == 'e2'){		
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yestwo">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;		
	}else if(str =='e3'){
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesthree">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;		
	}else if(str =='e4'){
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesfour">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;	
	}else if(str =='e5'){
		document.getElementsByClassName('box-display')[0].style.display='block';
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesbookhit">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;	
	}else if(str =='e6'){
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yessix">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;	
	}else if(str == "e8"){
		var btntt =  '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesrenew">Clcik</button>'; 
		document.getElementById('btn-report-pop').innerHTML=btntt;	
	}  
	pop.style.display='block';
	
}

 $(document).on('click', '.btn-yestwo', function(){
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	if(txt_start.value == ''){
		popupError(' กรุณาใส่วันเริ่มต้นการค้นหา');
	return;
	} if(txt_end.value == ''){
		popupError('กรุณาใส่วันสิ้นสุดการค้นหา');
		return;
	}else{	
		
		document.getElementsByClassName('tb-list-two')[0].innerHTML="";	
		func_show_two();
	}
 })
 $(document).on('click', '.btn-yesbookhit', function(){
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	if(txt_start.value == ''){
		popupError(' กรุณาใส่วันเริ่มต้นการค้นหา');
	return;
	} if(txt_end.value == ''){
		popupError('กรุณาใส่วันสิ้นสุดการค้นหา');
		return;
	}else{
		document.getElementsByClassName('box-display')[0].style.display='none';
		document.getElementsByClassName('tb-list-two')[0].innerHTML="";
		document.getElementById('myModal-two').style.display="none";
		showHitbooks();
	}
 })

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

/* end calandar */
// ------------------------------------------------page 3---------------
function sch_inportbooks(){
	//  console.log('test')
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	var popalert = document.getElementById('myModal-two');
	// console.log(popalert.style);	
	var statDay = '';
	var EndDay = '';
	var HTML = '';
	if(txt_start.value != ""){	
		// console.log(txt_start.value);
		
		const[dayst, monthst, yearBest]= txt_start.value.split('-');
		const formattDateStart = `${yearBest}-${monthst}-${dayst.padStart(2, '0')}`;
		const[dayEnd, monthEnd,yearBeEnd,]= txt_end.value.split('-');
		const formattDateEnd = `${yearBeEnd}-${monthEnd}-${dayEnd.padStart(2, '0')}`;
		// console.log(formattDateEnd);
		statDay = formattDateStart;
		EndDay = formattDateEnd;
	}	
	$.ajax({
		url:"../phpsv/Sch-rpt-inportbk.php",
		method:"POST",
		data:{statDay:statDay, EndDay:EndDay},			
		dataType:"json",
		success: function(datax){
	//  console.log(datax);
			
			if(datax == null){
				// nodata
				document.getElementsByClassName('tb-list-three')[0].innerHTML=HTML;	
				document.getElementsByClassName('Unit-inport')[0].value='';	
				document.getElementsByClassName('datanotfound-three')[0].innerHTML= 'Data Not Found';
			}else{	
				var num = parseFloat(datax.length);
			var number =  num.toLocaleString();			
				datax.forEach((item)=>{							
					HTML +='<tr>';
					HTML +='<td>'+item.iduser+'</td>';
					HTML +='<td>'+item.FNAME +'&nbsp;&nbsp;'+ item.LNAME+'</td>';
					 HTML +='<td>'+item.IDbook_import+'</td>';
					HTML +='<td>'+item.NAME_BOOK+'</td>';
					HTML +='<td>'+_forMatDat(item.rebook, 0).endd+'</td>';							
					HTML +='</tr>';
				})	
				document.getElementsByClassName('datanotfound-three')[0].innerHTML= '';	
				document.getElementsByClassName('Unit-inport')[0].value= number;				
			document.getElementsByClassName('tb-list-three')[0].innerHTML=HTML;	
			pagination_three();
			}
		
			}
		
		})
		txt_start.value='';
		txt_end.value='';
		popalert.style.display='none';	
}
// ----------------------------------------pagination--------page 3---------------
function pagination_three(){
	var numberOfItems = $(".tb-list-three tr").length;
	var limitPerPage = 7;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	// console.log(totalPages);
	var paginationSize = 7;
	var currentPage;
	function showPage(whichPage){
		if(whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".tb-list-three tr").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage).show();
		$(".pagination-three li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("numb page-item").addClass(item ? "current-page" : "dots")
			.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link-two")
			.attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page")
		 });
		 $('.previous-page').toggleClass("disable", currentPage === 1);
		 $('.next-page').toggleClass("disable", currentPage ===  totalPages);
		 return true;
	}
	$(".pagination-three").append(
		$("<li>").addClass("page-item").addClass("btn prev previous-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Prev')),
		$("<li>").addClass("page-item").addClass("btn next next-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Next'))
	);
	$(".tb-list-three tr").show();
	showPage(1);
	$(document).on("click", ".pagination-three li.current-page:not(.avcive)", function(){
		return showPage(+$(this).text());
	})
	$(".next-page").on("click", function(){
		return showPage(currentPage + 1);
	})
	$(".previous-page").on("click", function(){
		return showPage(currentPage - 1);
	})
	
};
// ------------------------------------------------page 4---------------
function func_cashier(){
	//  console.log('test')
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	var popalert = document.getElementById('myModal-two');
	// console.log(popalert.style);	
	var statDay = '';
	var EndDay = '';
	var HTML = '';
	if(txt_start.value != ""){	
		// console.log(txt_start.value);
		
		const[dayst, monthst, yearBest]= txt_start.value.split('-');
		const formattDateStart = `${yearBest}-${monthst}-${dayst.padStart(2, '0')}`;
		const[dayEnd, monthEnd,yearBeEnd,]= txt_end.value.split('-');
		const formattDateEnd = `${yearBeEnd}-${monthEnd}-${dayEnd.padStart(2, '0')}`;
		// console.log(formattDateEnd);
		statDay = formattDateStart;
		EndDay = formattDateEnd;
	}
	$.ajax({
		url:"../phpsv/Sch-rpt-fines.php",
		method:"POST",
		data:{statDay:statDay, EndDay:EndDay},			
		dataType:"json",
		success: function(datax){
	//  console.log(datax);
			if(datax == null){
				// nodata
				document.getElementsByClassName('tb-list-four')[0].innerHTML=HTML;	
				document.getElementsByClassName('datanotfound-four')[0].innerHTML= 'Data Not Found';
			}else{				
				datax.forEach((item)=>{							
					HTML +='<tr>';
					HTML +='<td>'+item.IDUSERCODE+'</td>';
					HTML +='<td>'+item.FNAME +'&nbsp;&nbsp;'+ item.LNAME+'</td>';
					 HTML +='<td>'+_forMatDat(item.date_cash, 0).endd+'</td>';
					HTML +='<td>'+item.cash_use+'</td>';												
					HTML +='</tr>';
				})	
			document.getElementsByClassName('datanotfound-four')[0].innerHTML= '';				
			document.getElementsByClassName('tb-list-four')[0].innerHTML=HTML;	
			pagination_four();
			}
		
			}
		
		})
		txt_start.value='';
		txt_end.value='';
		popalert.style.display='none';	
}
// ----------------------------------------pagination--------page 4---------------
function pagination_four(){
	var numberOfItems = $(".tb-list-three tr").length;
	var limitPerPage = 9;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	//  console.log(totalPages);
	var paginationSize = 7;
	var currentPage;
	function showPage(whichPage){
		if(whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".tb-list-four tr").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage).show();
		$(".pagination-four li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("numb page-item").addClass(item ? "current-page" : "dots")
			.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link-two")
			.attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page")
		 });
		 $('.previous-page').toggleClass("disable", currentPage === 1);
		 $('.next-page').toggleClass("disable", currentPage ===  totalPages);
		 return true;
	}
	$(".pagination-four").append(
		$("<li>").addClass("page-item").addClass("btn prev previous-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Prev')),
		$("<li>").addClass("page-item").addClass("btn next next-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Next'))
	);
	$(".tb-list-four tr").show();
	showPage(1);
	$(document).on("click", ".pagination-four li.current-page:not(.avcive)", function(){
		return showPage(+$(this).text());
	})
	$(".next-page").on("click", function(){
		return showPage(currentPage + 1);
	})
	$(".previous-page").on("click", function(){
		return showPage(currentPage - 1);
	})
	
};
// ------------------------------------------------page 5---------------
function showHitbooks(){
	
	var txt_start = document.getElementsByClassName('ipt-pop-two-start')[0];
	var txt_end = document.getElementsByClassName('ipt-pop-two-end')[0];
	var HTML ='';	
	let txt_type = document.getElementsByClassName('slc-type-txt')[0];
	let typeid = txt_type.value;
	let ele = document.getElementsByClassName('tb-list-five')[0];
	var statDay ="";
	var EndDay ="";
	ele.innerHTML ="";	
	// console.log(txt_start.value);
	if(txt_start.value != ""){	
		// console.log(txt_start.value);
		
		const[dayst, monthst, yearBest]= txt_start.value.split('-');
		const formattDateStart = `${yearBest}-${monthst}-${dayst.padStart(2, '0')}`;
		const[dayEnd, monthEnd,yearBeEnd,]= txt_end.value.split('-');
		const formattDateEnd = `${yearBeEnd}-${monthEnd}-${dayEnd.padStart(2, '0')}`;
		// console.log(formattDateEnd);
		statDay = formattDateStart;
		EndDay = formattDateEnd;
	}
	$.ajax({
		url:"../phpsv/bookhit.php",
		method:"POST",
		data:{txt_start:statDay, txt_end:EndDay, txt_type:typeid},
		dataType:"json",
		success: function(datax){
	//  console.log(datax);
			if(datax == null){
				// nodata
				document.getElementsByClassName('tb-list-five')[0].innerHTML=HTML;	
				document.getElementsByClassName('datanotfound-five')[0].innerHTML= 'Data Not Found';
			}else{				
				datax.forEach((item)=>{							
					HTML +='<tr>';
					HTML +='<td>'+item.count+'</td>';
					HTML +='<td>'+item.barcode+'</td>';					
					HTML +='<td>'+item.NAME_BOOK+'</td>';
					HTML +='<td>'+item.year+'</td>';
					HTML +='<td>'+item.Price_book+'</td>';												
					HTML +='</tr>';
				})
				txt_start.value="";
				txt_end.value="";
				document.getElementsByClassName('datanotfound-five')[0].innerHTML= '';					
				ele.innerHTML =HTML;	
			pagination_five();
			}
		
			}
		
		})
		
}
function pagination_five(){
	var numberOfItems = $(".tb-list-five tr").length;
	var limitPerPage = 7;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	//  console.log(totalPages);
	var paginationSize = 7;
	var currentPage;
	function showPage(whichPage){
		if(whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".tb-list-five tr").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage).show();
		$(".pagination-five li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("numb page-item").addClass(item ? "current-page" : "dots")
			.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link-two")
			.attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page")
		 });
		 $('.previous-page').toggleClass("disable", currentPage === 1);
		 $('.next-page').toggleClass("disable", currentPage ===  totalPages);
		 return true;
	}
	$(".pagination-five").append(
		$("<li>").addClass("page-item").addClass("btn prev previous-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Prev')),
		$("<li>").addClass("page-item").addClass("btn next next-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Next'))
	);
	$(".tb-list-five tr").show();
	showPage(1);
	$(document).on("click", ".pagination-five li.current-page:not(.avcive)", function(){
		return showPage(+$(this).text());
	})
	$(".next-page").on("click", function(){
		return showPage(currentPage + 1);
	})
	$(".previous-page").on("click", function(){
		return showPage(currentPage - 1);
	})
	
};
// ------------------------------------------------page 6---------------
 $(".txt-search-six").on("keyup", function(e) {	
		if(e.keyCode == 13){
		 var inputSch = (this.value);
			// ajax_AutobarCode(iptbcode);
			show_Noinportbooks(inputSch);
		}		
	  	
 });
function show_Noinportbooks(inputSch){
	//  console.log('test')	
	var txtScheach ='';
	var HTML = '';
	if(inputSch != ''){
		txtScheach = inputSch;
	}	
	// console.log(txtScheach);
	$.ajax({
		url:"../phpsv/showNotinportbk.php",
		method:"POST",
		data:{txtScheach:txtScheach},			
		dataType:"json",
		success: function(datax){
	//  console.log(datax);
			if(datax == null){
				// nodata
				document.getElementsByClassName('tb-list-six')[0].innerHTML=HTML;	
				document.getElementsByClassName('datanotfound-six')[0].innerHTML= 'Data Not Found';
			}else{				
				datax.forEach((item)=>{							
					HTML +='<tr>';
					HTML +='<td>'+item.IDuser+'</td>';
					HTML +='<td>'+item.Fname +'&nbsp;&nbsp;'+ item.Lname+'</td>';
					 HTML +='<td>'+item.Barcode+'</td>';
					 HTML +='<td>'+_forMatDat(item.Lastinport, 0).endd+'</td>';
					HTML +='<td>'+item.Namebook+'</td>';
					HTML +='<td>'+item.Year_book+'</td>';												
					HTML +='</tr>';
				})
				document.getElementsByClassName('datanotfound-six')[0].innerHTML= '';					
			document.getElementsByClassName('tb-list-six')[0].innerHTML=HTML;	
			 pagination_six();
			}
		
			}
		
		})
		inputSch.value='';
}
function pagination_six(){
	var numberOfItems = $(".tb-list-six tr").length;
	var limitPerPage = 9;
	var totalPages = Math.ceil(numberOfItems / limitPerPage);
	//  console.log(totalPages);
	var paginationSize = 7;
	var currentPage;
	function showPage(whichPage){
		if(whichPage < 1 || whichPage > totalPages) return false;
		currentPage = whichPage;
		$(".tb-list-six tr").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage).show();
		$(".pagination-six li").slice(1, -1).remove();
		getPageList(totalPages, currentPage, paginationSize).forEach(item => {
			$("<li>").addClass("numb page-item").addClass(item ? "current-page" : "dots")
			.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link-two")
			.attr({href: "javascript:void(0)"}).text(item || "...")).insertBefore(".next-page")
		 });
		 $('.previous-page').toggleClass("disable", currentPage === 1);
		 $('.next-page').toggleClass("disable", currentPage ===  totalPages);
		 return true;
	}
	$(".pagination-six").append(
		$("<li>").addClass("page-item").addClass("btn prev previous-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Prev')),
		$("<li>").addClass("page-item").addClass("btn next next-page").append($("<a>").addClass("page-link-two").attr({href: "javascript:void(0)"}).text('Next'))
	);
	$(".tb-list-six tr").show();
	showPage(1);
	$(document).on("click", ".pagination-six li.current-page:not(.avcive)", function(){
		return showPage(+$(this).text());
	})
	$(".next-page").on("click", function(){
		return showPage(currentPage + 1);
	})
	$(".previous-page").on("click", function(){
		return showPage(currentPage - 1);
	})
	
};
	
function popupError(txt) {
	Swal.fire({
		position: "top",
		icon: "error",
		title: txt,
		showConfirmButton: false,
		timer: 1500
	});
}