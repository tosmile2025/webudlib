// ---------------------------function  default----------------------------------
$(document).ready(function(){	
   document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
    CalendarThai_status();        
    Func_Check_Login();
	myFuncSearch_namebook();
	myfunc_countEbooks_ready();
});
function myfunc_countEbooks_ready(){
	$.ajax({
		url:"../phpsv-ebooks/count_ebooksready.php",
		method:"POST",
		dataType:"json",
		success:function(data){
			// console.log(data);
			document.getElementById('idcountebookready').innerText = data[0].numone;
			document.getElementById('txt-countno').innerText = data[0].numtwo;				
		}
	})
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
	}else{
		stop;
	}
	// location.href = "index.php";
}	
// ------------------------ฟังก์ชั่น Tab page ลงทะเทียน / สำเนา-----------
document.getElementById("btn-regisebk").click();
function myTabClick_regisebooks(elm, dis, status){// console.log(dis);
	var btnregis = document.getElementById('btn-regisebk');
	var btncopy = document.getElementById('btn-copyregis');
	localStorage.setItem('idpg', status);	
	var chkone = document.getElementsByClassName('chkaudioone');
	var chktwo = document.getElementsByClassName('chkaudiotwo');
		//เปลี่ยนหน้าได้
	// console.log(btnregis.classList.replace('btn-danger', 'btn-facebook'));	
	if(status == 'e1'){
		btnregis.classList.replace('btn-danger', 'btn-facebook');
		btncopy.classList.replace('btn-facebook', 'btn-success');	
		if(chkone[0].checked == false){	
			chkone[0].checked = true;
			func_slctype_ShowbooksAndebooks();
		}else{
			func_slctype_ShowbooksAndebooks();
		}	
	}else if(status == 'e2'){
		// console.log(btncopy.classList[1]);
		btncopy.classList.replace('btn-success', 'btn-facebook');
		btnregis.classList.replace('btn-facebook', 'btn-danger');	
		document.querySelector("input[id=slc_idradio]:checked");
		if(chktwo[0].checked == false){	
			chktwo[0].checked = true;
			func_slctype_ShowbooksAndebooks();
			// console.log('test');
		}	
	}
	var tabcontent = document.getElementsByClassName('popcontent-regisebk');
	for(var i =0; i < tabcontent.length; i++){
		tabcontent[i].style.display='none';
		
	}
	document.getElementById(elm).style.display='block';
		
}
//-------------------------------------------ฟังก์ชั่น tab check box  แสดงรายชื่อหนังสือ ebook หรือ  books
function func_slctype_ShowbooksAndebooks(){
	//  console.log('test');
	var status = document.querySelector("input[id=slc_idradio]:checked");
	var btnedit= document.getElementById('editusericon');
	var btndel = document.getElementById('delebooks');
	var btn_savnbnk = document.getElementsByClassName('check_openbtn');
	var ele = status.classList[0];
	// console.log(btn_savnbnk[0].style.display);
	var vals = '';
	var idLinkbook = '';
	var txt = '';
	var idLinkbook='';	
	if(btn_savnbnk[0].style.display != 'block'){
		if(status.value == 'L1'){
			var tabcontent = document.getElementsByClassName('tab-listsbooks');
			for(var tb = 0; tb < tabcontent.length; tb++){
				tabcontent[tb].style.display ='none';
			}
			btnedit.style.display ='none';
			btndel.style.display='none';
			showloadData_ajaxbook(vals, idLinkbook);
			document.getElementById(ele).style.display='block';
		}else if(status.value == 'E2'){
			var tabcontentebk = document.getElementsByClassName('tab-listsbooks');
			for(var eb = 0; eb < tabcontentebk.length; eb++){
				tabcontentebk[eb].style.display ='none';
			}
			btnedit.style.display ='block';	
			btndel.style.display='block';	
			showloadData_ebooksajax(txt, idLinkbook);
			document.getElementById(ele).style.display='block';
		}
	}	
}
//-------------------------------------------ฟังก์ชั่น tab check box  แสดงรายชื่อหนังสือ ebook หรือ  books หน้า popup
function func_slctype_ShowbooksAndebooks_popup(){
	var status = document.querySelector("input[id=slc_idradiopopup]:checked");	
	var vals = '';
	var idLinkbook = '';
	var txt = '';
	var idLinkbook='';	
	// console.log(status.value);	
	if(status.value == 'L1'){
		ajax_showdataListebooks(txt);		
		
	}else if(status.value == 'E2'){	
		showloadData_ebooksajax_popup(vals, idLinkbook);		
	}
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
                        alert("error Logout User");
                        
                        }
                }
            })		
}
var monthNames = [
	"มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
	"พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
	"กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var weekday = [
	"อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"	
];
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
// -----------------------------------------------end main default--------------
//-------------------------------------------------ฟังก์ชั่น เลือกรูปภาพ อัพโหลด หน้าลงทะเบียนหนังสือ 
function Clcik_AddNewbooks(){
	mYFunc_AllHubClearEnabled_Nocopy();
	var namebooks = document.getElementById('ipt_popSearch_Addnewbooks').value;	
	var btn_sv = document.getElementById('tbnid-savenewebk');	
	document.getElementById('boxModal_popSearch_Addnewbooks').style.display='';
	btn_sv.style.display='block';
	document.getElementById('ipt-nbk').value = namebooks;
		
}
//------------------------------ฟังก์ชั่น  Clear enabled no show btn copy
function mYFunc_AllHubClearEnabled_Nocopy(){
	var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		var img = document.getElementById('pic_ebooks');		
		var Gmd = 'TE';
		document.getElementById('ipt-nbk').removeAttribute('id1');			
		img.src='';
		iptgroup.value=''; iptgroup.removeAttribute('id1');
		iptpublis.value='';iptpublis.removeAttribute('id1');
		iptalbum.value='';iptalbum.removeAttribute('id1');
		//  console.log(ipt);
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
		// subClickUpDataShow(id);
		// clcik_show_album(id);
		// Func_author_detail(id)
		// func_Show_Byauthor(id);
		Func_Enableanddisable_edit();
		// open_btn_copy();
		Func_Select_GMD(Gmd);
}
//------------------------------ฟังก์ชั่น  Clear enabled
function mYFunc_AllHubClearEnabled(){
	var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		var img = document.getElementById('pic_ebooks');
		var Gmd = 'TE';
		document.getElementById('ipt-nbk').removeAttribute('id1');			
		img.src='';
		iptgroup.value=''; iptgroup.removeAttribute('id1');
		iptpublis.value='';iptpublis.removeAttribute('id1');
		iptalbum.value='';iptalbum.removeAttribute('id1');
		//  console.log(ipt);
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
		// subClickUpDataShow(id);
		// clcik_show_album(id);
		// Func_author_detail(id)
		// func_Show_Byauthor(id);
		Func_Enableanddisable_edit();
		open_btn_copy();
		Func_Select_GMD(Gmd);
}
function myFuncSelect_nbk(dis){
	var ele = document.querySelectorAll('.li_listSearchAd');
	var id = dis.getAttribute('id');
	var txt = dis.innerText;	
	for(var i = 0; i<ele.length; i++){
		if(dis == ele[i]){
			ele[i].style.backgroundColor='#d1f9ed';
			localStorage.setItem('delnbk', id);
			localStorage.setItem('nbk', txt);
		}else{
			ele[i].style.backgroundColor ='';
		}
	}
}
function Clcik_delnbk(){
	var id = localStorage.getItem('delnbk');
	var txt = localStorage.getItem('nbk');
	var btnad = document.getElementById('id-addebookregis');
	var btned = document.getElementById('editusericon');	
	var btndl = document.getElementById('delebooks');		
	//  console.log(id);
	var vals ='';
	var idLinkbook = '';
	var popup = document.getElementById('myModal-alert');
	var htxt = 'การลบรายชื่อทะเบียนหนังสือมีผลต่อหนังสือสำเนาอาจหายไปจากระบบ';
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-nbkdel" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	if(id != null){
		document.getElementById('idlgend').innerText='รายการที่ต้องการลบ!!';
		document.getElementById('h5-txtshow').innerHTML= htxt;
		document.getElementById('item_btnshow').innerHTML= btntxt;
		document.getElementById('spnamedel').innerText = txt;
		popup.style.display='block';
		$(document).on('click', '.close-btnalert', function(){
			popup.style.display='';
			btndl.classList.remove('activedel');
			btned.removeAttribute('disabled');
			btnad.removeAttribute('disabled');				
		})
		$(document).on('click', '.btn-nbkdel', function(){	
			 $.ajax({
			  url:"../phpsv-ebooks/delete_Regis.php",
			  method:"POST",
			  data:{idlink:id},
			})
			showloadData_ajaxbook(vals, idLinkbook);	
			btndl.classList.remove('activedel');
			btned.removeAttribute('disabled');
			btnad.removeAttribute('disabled');		
			localStorage.removeItem('id0bx');
			localStorage.removeItem('delnbk');
			localStorage.removeItem('nbk');
			localStorage.removeItem('hname');
			localStorage.removeItem('b00x');
			localStorage.removeItem('delst');
			localStorage.removeItem("pub0x");
			localStorage.removeItem('alx0b');
			localStorage.removeItem('dpat');
			document.getElementById('idlgend').innerText='';
			document.getElementById('item_btnshow').innerHTML= '';
			document.getElementById('h5-txtshow').innerHTML= '';	
			document.getElementById('spnamedel').innerText = '';
			popup.style.display='';	
			func_ClearInputAll();	
		})	
	}
	
}
function func_ClearInputAll(){	
		var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		document.getElementById('ipt-nbk').removeAttribute('id1');
		document.getElementById('pic_ebooks').src='';
		iptgroup.removeAttribute('id1');
		iptpublis.removeAttribute('id1');
		iptalbum.removeAttribute('id1');
	  
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
	
}
function click_openbrowserFile(){
	var input = document.getElementById('upload_file');
	input.click();
	// console.log('test');	
}
function browser_adpicture(dis){	
		// console.log(dis);
		var eleimg = document.getElementById('pic_ebooks');
		// console.log(dis);
		var filepic = dis.files[0];
		if(filepic){
			var reader = new FileReader();
				reader.onload = function(){
					var result = reader.result;					
					eleimg.src = result;					
				}
				reader.readAsDataURL(filepic);
					
		}
		
}
//-------------------------------------------ฟังก์ชั่นแสดงข้อมูลรายชื่อหนังสือด้านขวา
function showloadData_ajaxbook(vals, idLinkbook){
	  //console.log("ทดสอบหลังบันทึก");
	//alert("showloadData_ajaxbook");	
	var slc_radio = document.getElementsByName('slc_radio');	
	for(var di = 0; di < slc_radio.length;di++){		
		if(slc_radio[di].checked == true){
			var chk_redio = slc_radio[di].value;			
		}
	}
	// console.log(chk_redio);
 if(chk_redio == 'L1'){
		var HTMLX ='';	
		var ARR_success =[];
			$.ajax({
					url:"../phpsv-ebooks/showLisSearchbook.php",
					method:"POST",
					data:{data:vals,strradio:chk_redio},
					dataType:"json",
					success: function(result){
					//  console.log(result);
					if(result == null){
							stop;
							}else{
								for(i = 0; i < result.length; i++){
									ARR_success.push(result[i]);
									//console.log(result[1]);										
							if(idLinkbook != null){
								if(idLinkbook == result[i].IDLIKBOOK){
									//alert("showcolor");
									
										HTMLX += '<li onClick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd" id="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
										}else{
											
													HTMLX += '<li onClick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd" id="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
												
										}
								}else{	
								
									HTMLX += '<li onClick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd"  id="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
								
								
								}
								
							}
							
							$('.regis_box_listserch').html(HTMLX); 
						// console.log(HTMLX);
						}
					}
				});
	 }else{
		showloadData_ebooksajax(vals, idLinkbook);
	 }
		
				
					//$('.pic_regisbook').html("");					
				
				
}
//-------------------------------------------ฟังก์ชั่นแสดงข้อมูล รายชื่อหนังสือด้านขวา Ebooks
function showloadData_ebooksajax(txt, idLinkbook){	
 // console.log('showloadData_ebooksajax');
	var HTMLX ='';	
	var ARR_success =[];
			$.ajax({
					url:"../phpsv-ebooks/showLisSearch_Ebook.php",
					method:"POST",
					data:{data:txt},
					dataType:"json",
					success: function(result){
				//  console.log(result);
					if(result == null){
							stop;
							}else{
								for(i = 0; i < result.length; i++){
									ARR_success.push(result[i]);
									//console.log(result[1]);										
							if(idLinkbook != null){
								if(idLinkbook == result[i].IDLIKBOOK){
									//alert("showcolor");
									
										HTMLX += '<li onClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks" id="li_listnbk" id1="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
										}else{
											
													HTMLX += '<li onClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks" id="li_listnbk" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
												
										}
								}else{	
								
									HTMLX += '<li onClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks"  id="li_listnbk" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
								
								
								}
								
							}
							
							$('.box_list_ebooks').html(HTMLX); 
						// console.log(HTMLX);
						}
					}
				});
}
//-------------------------------------------ฟังก์ชั่นแสดงข้อมูล รายชื่อหนัง popup
function showloadData_ebooksajax_popup(txt, idLinkbook){	
	//   console.log('showloadData_ebooksajax_popup');
	var HTMLX ='';		
			$.ajax({
					url:"../phpsv-ebooks/showLisSearch_Ebook.php",
					method:"POST",
					data:{data:txt},
					dataType:"json",
					success: function(result){	
						//  console.log(result);
						if(result == null){
							stop;
							}else{
								for(i = 0; i < result.length; i++){									
									//console.log(result[1]);										
							if(idLinkbook != null){
								if(idLinkbook == result[i].IDLIKBOOK){
									//alert("showcolor");
									
										HTMLX += '<li ondblclick="myFuncClickSelect_ListEbookspop(this)" class="li_listbyautyor" id="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
										}else{											
													HTMLX += '<li ondblclick="myFuncClickSelect_ListEbookspop(this)" class="li_listbyautyor" id="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';												
										}
								}else{								
									HTMLX += '<li ondblclick="myFuncClickSelect_ListEbookspop(this)" class="li_listbyautyor"  id="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';							
								
								}
								
							}
							
							$('.box_modal_iptSearch_Addnewbooks').html(HTMLX); 
						// console.log(HTMLX);
						}
					}
				});
}
// -----------------------------------ฟังก์ชั่น editebooks disabled and Enabled ---------------
function myClickBtnRight(stut){
//  console.log(stut);
	var strpage = localStorage.getItem('idpg');
	var btnad = document.getElementById('id-addebookregis');
	var btned = document.getElementById('editusericon');	
	var btndl = document.getElementById('delebooks');
	var btn_sv = document.getElementById('tbnid-savenewebk');
	var btn_copy = document.getElementById('btn-copy-detail');	

	//  console.log(stut+"/stut");
	//  console.log(btnad);
	if(strpage == 'e1'){
		if(stut == 'ad'){	
			btned.toggleAttribute('disabled');	
			btndl.toggleAttribute("disabled");	
			btnad.classList.toggle('activeadd');		
			show_popupListebooks();
		}else if(stut == 'ed'){					
			btnad.toggleAttribute('disabled');	
			btndl.toggleAttribute("disabled");	
			if(btned.style.background == 'rgb(6, 97, 88)'){
				btned.style.background='';
				func_save_edit_pageOne();
			}else{
				btned.style.background='rgb(6, 97, 88)';
				Func_Enableanddisable_editOne();
			}					
		}else if(stut == 'dl'){							
			btnad.toggleAttribute('disabled');	
			btned.toggleAttribute("disabled");	
			if(btndl.style.background == 'rgb(6, 97, 88)'){
				btned.style.background='';
				
			}
							
		}else if(stut == 'copy'){
			document.getElementById('ipt-nbk').removeAttribute('id1');			
			btn_copy.style.display='none';	
			btn_sv.style.display ='block';
			btnad.classList.remove('activeadd');
			btn_sv.removeAttribute('disabled');			
		}else if(stut == 'sav'){
			btnad.classList.remove('activeadd');				
			// btn_sv.style.display='none';	
			btnad.style.background = '';	
			btnad.removeAttribute('disabled');
			btned.removeAttribute('disabled');
			btndl.removeAttribute('disabled');
			func_btnClickSave();
		}
	}else if(strpage == 'e2'){
		if(stut == 'ad'){	
			var idebk = document.getElementById('ipt-linkebook');
			// console.log(idebk.value);
			if(idebk.value != ''){
				btned.toggleAttribute('disabled');	
				btndl.toggleAttribute("disabled");	
				btnad.style.background = 'rgb(6, 97, 88)';
				btn_sv.style.display='block';		
				func_clearvalue_pageTwo();	
			}else{
				alert('กรุณาเลือกรายชื่อ E-books เมนูขวามือ');
			}
			
		}else if(stut == 'ed'){
			var check_re = myFunc_dbclcikselectlistcopy();
			// console.log(check_re);
			if(check_re === 'ok'){		
				btnad.toggleAttribute('disabled');	
				btndl.toggleAttribute("disabled");				
				if(btned.style.background == 'rgb(6, 97, 88)'){
					btned.style.background='';
					func_saveedit_pageTWO();					
				}else{
					btned.style.background='rgb(6, 97, 88)';
					func_clearvalue_pageTwoEdit();	
				}							
			}else{
				alert('กรุณาเลือกรายการสำเนาที่ต้องการแก้ไข');
			}	
		}else if(stut == 'dl'){	
			var linbk = document.querySelectorAll('#li_listnbk');
			linbk.forEach(list => {				
				if(list.style.backgroundColor== "rgb(209, 249, 237)"){	
					var idlink = list.getAttribute('id1');	
					// console.log('test-dellistmenu');		
					Click_btn_del_ebooksall(idlink);
				}
			})			
		}else if(stut == 'copy'){
			document.getElementById('ipt-nbk').removeAttribute('id1');			
			btn_copy.style.display='none';	
			btn_sv.style.display ='block';
			btnad.classList.remove('activeadd');			
		}else if(stut == 'sav'){				
			// btn_sv.style.display='none';		
			btnad.removeAttribute('disabled');
			btned.removeAttribute('disabled');
			btndl.removeAttribute('disabled');
			btnad.style.background ='';	
			btn_sv.style.display='none';
			func_btnClickSaveAddnewPEBOOK();
		}
	}
	// localStorage.removeItem('id0bx');
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกการแก้ไขข้อมูลรายการสำเนา
function func_saveedit_pageTWO(){
	var txt_arr = [];
	txt_arr.push(document.getElementById('ipt-ebarcode').value);
	txt_arr.push(document.getElementById('ipt-typeebooks').value);
	txt_arr.push(document.getElementById('ipt-ebkmemo').value);
	txt_arr.push(document.getElementById('ipt-sttebk').value)
	// console.log(txt_arr);
$.ajax({
		url:"../phpsv-ebooks/Save_editcopy.php",
		method:"POST",
		data:{txt_arr:txt_arr},
		dataType:"text",
		beforeSend:function(){
		dblebtN_loadprograssBar();
	 	 },
		success:function (data){
			// console.log(data);		
			var progressValue =0;
			var speed =5;
			var progress = setInterval(function(){
			progressValue ++;
			dblebtN_loadprogress(progress, progressValue);
			}, speed);						
		}
	})
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกข้อมูล load process---------------
function dblebtN_loadprograssBar(){
	var popup = document.getElementById('boxModal_popsucessedituser');
	popup.style.display='block';
}
function dblebtN_loadprogress(progress, progressValue){	
	var progressBar = document.querySelector(".cirula-progress");
   var valueContainer = document.getElementById("value-container");  
  //console.log(progressBar); 
   var progressEndValue = 90;
	   
	   valueContainer.textContent = progressValue+"%";
	   //console.log(progressValue);
	  progressBar.style.background = 'conic-gradient(red '+progressValue * 3.2+'deg, orange '+progressValue * 20+'deg)';
		if(progressValue == progressEndValue){
			//console.log(progressValue);
			clearInterval(progress);
			valueContainer.textContent = "";
			valueContainer.innerHTML = '<i id="iconTrue" class="fa fa-check" aria-hidden="true"></i>';
			dblebtN_outslideLoader();				 
			}
}
function dblebtN_outslideLoader(){
   var popup = document.getElementById("boxModal_popsucessedituser"); 
   var valueContainer = document.getElementById("value-container");
   var btn_sv = document.getElementById('tbnid-savenewebk');
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
		   btn_sv.style.display='none';
		   valueContainer.textContent='0%';
			clearInterval(loadders);
			func_disabled_pageTwoEdit();
			del_Localstorage_remove();
			// console.log('test-close');
		   }
	   }
   //progressValue++;
  // valueContainer.textContent = "0%";
  // popup.style.display='';		
					  
}
// -----------------------------------ชุด ฟังก์ชั่น  เdelete  รายการสำเนา
function fucn_delcopyebooks(dis){
	 var bcodedel = dis.getAttribute('id1');
	var popupd = document.getElementById('myModal-alert');
	var btndl = document.getElementById('delebooks');	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDelcopyebook" >danger	</button>';
	document.getElementById('spnamedel').innerText= bcodedel;
	document.getElementById('h5-txtshow').innerText = 'กรุณาตรวจสอบเลขบาร์โค้ดที่ต้องการลบให้ถูกต้อง';
	document.getElementById('item_btnshow').innerHTML=btntxt;	

	$(document).on('click', '.close-btnalert', function(){
		popupd.style.display ='';
		btndl.style.background ='';	
	 })
	 popupd.style.display = 'block';
	$(document).on('click', '.btn-yesDelcopyebook', function(){
		var idLINK = document.getElementById('ipt-linkebook').value;
		btndl.style.background ='';	
		popupd.style.display='';
		$.ajax({
			url:"../phpsv-ebooks/del_copyebooks.php",
			method:"GET",
			data:{bcode:bcodedel},
			dataType:"json",
			beforeSend:function(){
				Noactive_loadprograssBar();
			   },
			success:function (data){			
				localStorage.removeItem('bcded');
				Myfunc_P3COPY(idLINK);
				func_clearvaluecopy();
				var progressValue =0;
				var speed =5;
				var progress = setInterval(function(){
				progressValue ++;
				Noloadprogress(progress, progressValue);
				}, speed);								
			}
		})
	 })
}
// -----------------------------------ชุด ฟังก์ชั่น  เคลียร์ input  ให้เป็ฯค่าว่าง
function func_clearvaluecopy(){	 
		var ipt = document.getElementsByClassName('iptclear');
			//btn.disabled=false;
			for(var i =0; i < ipt.length; i++){
				ipt[i].value='';			
				// console.log(ipt[i]);
			}
}	
// -----------------------------------ชุด ฟังก์ชั่น  ดับเบิลคลิกเลือกเพื่อแสดงสถานะสีของรายการสำเนา
function myFuncSeletListCode(dis){
	var li = document.querySelectorAll('.tr_Litcopybook');
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor='#FF9A78';			
			Clk_showdetail_copyebk(dis.getAttribute('id1'));
		}else{
			li[i].style.backgroundColor='';
		}
	}
}
// -----------------------------------ชุด ฟังก์ชั่น  ตรวจเช็คค่าสถานะของการเลือกรายการสำเนาก่อนแก้ไข รีเทิร์นค่า
function myFunc_dbclcikselectlistcopy(){
var func_return = '';
var li = document.querySelectorAll('.tr_Litcopybook');
	for(var i =0; i < li.length; i++){
		// console.log(li[i].style.backgroundColor);
		if(li[i].style.backgroundColor == 'rgb(255, 154, 120)'){
			func_return = 'ok';
		}
	}
	return func_return;
}
// -----------------------------------ชุด ฟังก์ชั่น  คลิกรายการสำเนาแสดงข้อมูล
function Clk_showdetail_copyebk(idbcode){
	func_clearvaluecopy();	
	console.log(idbcode);
	$.ajax({
		url:"../phpsv-ebooks/Showdetail_copy.php",
		method:"POST",
		data:{idbcode:idbcode},
		dataType:"json",
		success:function(data){
			console.log(data);
			for(var i =0; i< data.length; i++){
				document.getElementById('ipt-ebarcode').value = data[i].barcode;
				document.getElementById('ipt-typeebooks').value = data[i].typeebk;
				document.getElementById('ipt-regisebcode').value = data[i].regiscode;
				document.getElementById('ipt-dateebok').value = data[i].dattime;
				document.getElementById('ipt-ebkmemo').value = data[i].memotxt;
				document.getElementById('ipt-sttebk').value = data[i].statusebk;
			}
			
		}
	})
}
// -----------------------------------ชุด ฟังก์ชั่น  บันการลงทะเบียน  new ebooks
function func_btnClickSaveAddnewPEBOOK(){
	// console.log('test save');
	var arr_txt = [];
	var btn_sv = document.getElementById('tbnid-savenewebk');
	var datainput = document.querySelectorAll('.val_input'); //  รับค่า input ทั้ืงหมด
	for(var i =0; i < datainput.length; i++){
		arr_txt.push(datainput[i].value);		
	}
	//  console.log(arr_txt);
	$.ajax({
		url:"../phpsv-ebooks/Save_addNewebkP2.php",
		method:"POST",
		data:{arr_txt:arr_txt},
		dataType:"json",
		beforeSend:function(){
			savactive_loadprograssBar();
		   },			
		success:function (data){
			//   console.log(data);
			btn_sv.style.display='none';
			var progressValue =0;
			var speed =5;
			var progress = setInterval(function(){
			progressValue ++;
			savloadprogress(progress, progressValue);
		}, speed);			
		}
	})	
	// console.log(arr_txt);
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกข้อมูล load process---------------
function savactive_loadprograssBar(){
	var popup = document.getElementById('boxModal_popsucessedituser');
	popup.style.display='block';
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกข้อมูล load process---การลงทะเบียน new ebooks
function  savloadprogress(progress, progressValue){	
	var progressBar = document.querySelector(".cirula-progress");
   var valueContainer = document.getElementById("value-container");  
  //console.log(progressBar); 
   var progressEndValue = 90;
	   
	   valueContainer.textContent = progressValue+"%";
	   //console.log(progressValue);
	  progressBar.style.background = 'conic-gradient(red '+progressValue * 3.2+'deg, orange '+progressValue * 20+'deg)';
		if(progressValue == progressEndValue){
			//console.log(progressValue);
			clearInterval(progress);
			valueContainer.textContent = "";
			valueContainer.innerHTML = '<i id="iconTrue" class="fa fa-check" aria-hidden="true"></i>';
			savoutslideLoader();				 
			}
}
function savoutslideLoader(){
   var poploader = document.getElementById("boxModal_popsucessedituser"); 
   var valueContainer = document.getElementById("value-container");
   var btn_sv = document.getElementById('tbnid-savenewebk');
   var btn_autocode = document.getElementsByClassName('btn_disabletwo');
   var idlink = document.getElementById('ipt-linkebook').value;
   var loadersValue =0;
   var end = 10;
  var speedss =50;
  var loadders = setInterval(count, speedss)
  
   function count(){
	   loadersValue++;
	  //console.log(loadersValue);
	   if(loadersValue == end){
		   //console.log(loadersValue);				 
		   poploader.style.display='';
		   btn_sv.style.display='none';
		   valueContainer.textContent='0%';
			clearInterval(loadders);
			disable_inputcopy();
			del_Localstorage_remove();
			subClickUpDataShow_ebooks(idlink);
			btn_autocode[0].disabled = true;			
			// console.log('test-close');
		   }
	   }			  
}
// -----------------------------------ชุด ฟังก์ชั่น   disable input หน้ารายการสำเนา
function disable_inputcopy(){
	var iptenble = document.getElementsByClassName('iptclearenable');
	for(var e =0; e < iptenble.length; e++){
		if(iptenble[e].disabled == false){
			iptenble[e].disabled = true;
		}else{
			iptenble[e].disabled = false;
		}
		
	}
}
// -----------------------------------ชุด ฟังก์ชั่น   popup  BTN Click Edit barcode
function Click_BtnEdit_BCode(){
	// console.log('test Click_BtnEdit_BCode');
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');	
	var barCode = document.getElementById('ipt-regisebcode').value;
	var idlink = document.getElementById('ipt-linkebook').value;
	var iptbcode = document.getElementById('iptKeybcode');
	var numBer,numfive,strsub,slice,num,psintsum,sting,substrnum, bcodecut, daytime;
	var toupcase = barCode.toUpperCase();
	strsub =  toupcase.substr(0, 1); //F	
	var w = new Date();
	var year = w.getFullYear();
	var month = w.getMonth()+1;		
	var numOfDay = w.getDate();
	daytime = 	year+"-"+month+"-"+numOfDay;
	$(document).on('click', '.close-btnpop', function(){
	popup.style.display='none';
	})	
	if(toupcase == null){
		iptbcode.value ='';
		popup.style.display='block';		
	}else{
		if(isNaN(toupcase)){
			numfive = 5;			
			slice = toupcase.replace(/\D/g,'');//00099
			num = numfive+slice;
			psintsum = parseInt(num)+1;
			sting = String(psintsum);
			substrnum = sting.replace(/5/g,'');;
			numBer =strsub+substrnum;			
		}else{
			numBer = parseInt(toupcase)+1;//8081
		}
		// console.log(numBer); //00099			
		popup.style.display='block';
		iptbcode.value = numBer;
		iptbcode.focus();
	}
	iptbcode.addEventListener("keypress", (event) => {
		var editcode = document.getElementById('iptKeybcode').value;
		var barCode = document.getElementById('ipt-ebarcode').value;			
		if(event.key === "Enter"){			
	bcodecut = editcode.substr(0, 1);	
	//  console.log(editcode);
	func_slc_type(bcodecut);
 $.ajax({
			url:"../phpsv-ebooks/check_Editbarcode.php",
			method:"GET",
			data:{idcode:editcode,idlink:idlink,barCode:barCode},
			dataType:"json",
			success:function(data){
					//  console.log(data);
				for(var m =0; m < data.length; m++){
					if(data[m].str == 'st1'){
							document.getElementById('txt-alertcode').innerText = data[m].maxid;
							document.getElementById('txt-alertlb').innerText = "เลขบาร์โค้ดซ้ำ กรุณาใช้เลขที่ระบบแนะนำ";
							return;
					}else{
						document.getElementById('ipt-ebarcode').value= editcode;
					}
				}
				document.getElementById('ipt-regisebcode').value = editcode;
				document.getElementById('ipt-dateebok').value= daytime;			
				popup.style.display ='none';								
			}
			
		})
		}
	})
}
// -----------------------------------ชุด ฟังก์ชั่น  add popup autobarcode
function Click_Btn_aDDBCode(){
	
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');	
	var barCode = localStorage.getItem('cdeauto');
	var idlink = document.getElementById('ipt-linkebook').value;
	var iptbcode = document.getElementById('iptKeybcode');
	var numBer,numfive,strsub,slice,num,psintsum,sting,substrnum, bcodecut;
	if(barCode != null){	
	var toupcase = barCode.toUpperCase();
	strsub =  toupcase.substr(0, 1); //F	
	var w = new Date();
	var year = w.getFullYear();
	var month = w.getMonth()+1;		
	var numOfDay = w.getDate();		
	// console.log(month);	
	$(document).on('click', '.close-btnpop', function(){
	popup.style.display='none';
	})	
	if(toupcase == null){
		iptbcode.value ='';
		popup.style.display='block';		
	}else{
		if(isNaN(toupcase)){
			numfive = 5;			
			slice = toupcase.replace(/\D/g,'');//00099
			num = numfive+slice;
			psintsum = parseInt(num)+1;
			sting = String(psintsum);
			substrnum = sting.replace(/5/g,'');;
			numBer =strsub+substrnum;			
		}else{
			numBer = parseInt(toupcase)+1;//8081
		}
		// console.log(numBer); //00099			
		popup.style.display='block';
		iptbcode.value = numBer;
		iptbcode.focus();
	}
	}else{
		popup.style.display='block';		
	}
	
	iptbcode.addEventListener("keypress", (event) => {
		var autocode = document.getElementById('iptKeybcode').value;		
		if(event.key === "Enter"){
			localStorage.setItem('cdeauto', autocode);
	bcodecut = autocode.substr(0, 1);	
	//  console.log(bcodecut);
	func_slc_type(bcodecut);
	 $.ajax({
			url:"../phpsv-ebooks/check_autobarcode.php",
			method:"GET",
			data:{idcode:autocode,idlink:idlink},
			dataType:"json",
			success:function(data){
					// console.log(data);
				for(var m =0; m < data.length; m++){
					if(data[m].str == 'st1'){
							document.getElementById('txt-alertcode').innerText = data[m].maxid;
							document.getElementById('txt-alertlb').innerText = "เลขบาร์โค้ดซ้ำ กรุณาใช้เลขที่ระบบแนะนำ";
							return;
					}else{
						document.getElementById('ipt-ebarcode').value = data[m].maxid;
					}
				}
				document.getElementById('ipt-regisebcode').value = autocode;
				document.getElementById('ipt-dateebok').value= year+"-"+month+"-"+numOfDay;			
				popup.style.display ='none';								
			}
			
		})
		}
	})
}
// -----------------------------------ชุด ฟังก์ชั่น  check barcode to auto ประเภทหนังสือ
function func_slc_type(bcodecut){
	var OPTION = '' ;
	// console.log(bcodecut);
	$.ajax({
		url:"../phpsv-ebooks/show_slc_typecopy.php",
		method:"POST",
		data:{idtype:bcodecut},
		dataType:"json",
		success:function(data){
			//  console.log(data);
			for(var G = 0; G < data.length; G++){
				OPTION += '<option value="'+data[G].TYPEID+'">'+data[G].TYPENAME+'</option>';
			}
			// console.log(OPTION);
			$('#ipt-typeebooks').html(OPTION);
		}})
}
// -----------------------------------ชุด ฟังก์ชั่น   delete all  ebooks
function Click_btn_del_ebooksall(idlink){
	var popup = document.getElementById('myModal-alert');	
	var btndl = document.getElementById('delebooks');	
	//  console.log(idlink);
if(idlink == ''){
	alert('กรุณาเลือกรายการอีบุ้คที่ต้องการลบ');
	// console.log(btndl.style.background);
	btndl.style.background = '';
	}else{
		btndl.style.background = 'rgb(6, 97, 88)';
		popup.style.display='block';
		func_delregisebooksfull(idlink);		
	}

}
function func_clearvalue_pageTwoEdit(){
	// console.log('test-edt');
	var iptenble = document.getElementsByClassName('iptdisableedit');		
		for(var e =0; e < iptenble.length; e++){
			iptenble[e].disabled = false;
		}	
	
}
function func_disabled_pageTwoEdit(){
	// console.log('test-edt');
	var iptenble = document.getElementsByClassName('iptdisableedit');		
		for(var e =0; e < iptenble.length; e++){
			iptenble[e].disabled = true;
		}	
	
}
function func_clearvalue_pageTwo(){
	var iptenble = document.getElementsByClassName('iptclearenable');
	var ipt = document.getElementsByClassName('iptclear');
	var btn = document.getElementsByClassName('btn_disabletwo');
		btn[0].disabled = false;		
		//  console.log(iptgroup);
		//btn.disabled=false;	
		for(var e =0; e < iptenble.length; e++){
			iptenble[e].disabled = false;
		}	
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';			
			// console.log(ipt[i]);
		}				
	
}
// -----------------------------------ชุด ฟังก์ชั่น  delete all  หน้าลงทะเบียนและหน้า coppy
function func_delregisebooksfull(idlink){
	document.getElementById('spnamedel').innerText = idlink;
	document.getElementById('h5-txtshow').innerText = "การลบรายการเลขทะเบียนส่งผลให้ข้อมูลสำเนาถูกลบไปด้วย ควรลบข้อมูลหน้าสำเนาก่อนลบรายการเลขทะเบียน";
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDelregisebk" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	var popup = document.getElementById('myModal-alert');
	var btndl = document.getElementById('delebooks');
	var idLinkbook = '';
	var txt = '';
	document.getElementById('item_btnshow').innerHTML = btntxt;
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
		btndl.style.background = '';
	})
	$(document).on('click', '.btn-yesDelregisebk', function(){
			$.ajax({
				url:"../phpsv-ebooks/del_regisebooksAll.php",
				method:"POST",
				data:{idlink:idlink},
				dataType:"text",
				beforeSend:function(){
					Noactive_loadprograssBar();
				   },
				success:function (call){
					showloadData_ebooksajax(txt, idLinkbook);
					// console.log(call);
					var progressValue =0;
					var speed =5;
					var progress = setInterval(function(){
					progressValue ++;
					Noloadprogress(progress, progressValue);
					}, speed);								
				}
			})			
			popup.style.display='';
			btndl.style.background = '';
		})	
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกข้อมูล load process-NO clear input and disables
function Noactive_loadprograssBar(){
	var popup = document.getElementById('boxModal_popsucessedituser');
	popup.style.display='block';
}
function  Noloadprogress(progress, progressValue){	
	var progressBar = document.querySelector(".cirula-progress");
   var valueContainer = document.getElementById("value-container");  
  //console.log(progressBar); 
   var progressEndValue = 90;
	   
	   valueContainer.textContent = progressValue+"%";
	   //console.log(progressValue);
	  progressBar.style.background = 'conic-gradient(red '+progressValue * 3.2+'deg, orange '+progressValue * 20+'deg)';
		if(progressValue == progressEndValue){
			//console.log(progressValue);
			clearInterval(progress);
			valueContainer.textContent = "";
			valueContainer.innerHTML = '<i id="iconTrue" class="fa fa-check" aria-hidden="true"></i>';
			NooutslideLoader();				 
			}
}
function NooutslideLoader(){
   var popup = document.getElementById("boxModal_popsucessedituser"); 
   var valueContainer = document.getElementById("value-container");
   var btn_sv = document.getElementById('tbnid-savenewebk');
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
		   btn_sv.style.display='none';
		   valueContainer.textContent='0%';
			clearInterval(loadders);			
			del_Localstorage_remove();
			// console.log('test-close');
		   }
	   }
   //progressValue++;
  // valueContainer.textContent = "0%";
  // popup.style.display='';		
					  
}
// -----------------------------------ฟังก์ชั่น  edit and  disabled and Enabled ---------------
function Func_Enableanddisable_editOne(){	
var celem = document.getElementsByClassName('disable-btn');
	//  console.log('test-disable');
	for(var i = 0; i < celem.length; i++){
		//console.log(nelem[i].);
		if(celem[i].disabled == true){
			celem[i].disabled = false;
		}else{			
			celem[i].disabled = true;		
		}
	}
}
// -----------------------------------ฟังก์ชั่น  บันทึกข้อมูล edit text page1 
function func_save_edit_pageOne(){
	var arript= [], arr_byname = [], arr_hname =[];
	var idlink = document.getElementById('ipt-nbk').getAttribute('id1');
	var inputtxt = document.querySelectorAll('.cipt-ebkregis');
	var idphlish = document.getElementById('ipt-publisher').getAttribute('id1');
	var idalbum = document.getElementById('ipt-album').getAttribute('id1');
	var group = document.getElementById('ipt-department').getAttribute('id1');
	var byname = document.querySelectorAll('#tr_idByathor');
	var hname = document.querySelectorAll('#trid_listhname');	
	for(var i =0; i < inputtxt.length; i++){		
	arript.push(inputtxt[i].value);	
	}
	for(var by = 0; by <byname.length;by++ ){
		arr_byname.push(byname[by].getAttribute('id1'));
	}
	for(var hm = 0; hm < hname.length; hm++){
		arr_hname.push(hname[hm].getAttribute('id1'));
	}
	//  console.log(arript);
	if(arript[3] == ""){
		alert("กรุณาเลือก GMD");
		return;
	}else if(arript[8] ==""){
		alert("กรุณากรอกข้อมูล พิมพ์ครั้งที่");
		return;
	}else if(idphlish == ""){
		alert("กรุณากรอกข้อมูล สำนักพิมพ์");
		return;
	}else if(arript[12] == ""){
		alert("กรุณากรอกข้อมูล ประเทศ");
		return;
	}else if(arript[20] == ""){
		alert("กรุณากรอกข้อมูล ISBN");
		return;
	}else{
		func_Save_editpageOne(idlink, arript, arr_byname, arr_hname, idphlish, idalbum, group);		
	}
	
}
// -----------------------------------ฟังก์ชั่น  บันทึกข้อมูล save new ebooks part 2---------------
function func_Save_editpageOne(idlink, arript, arr_byname, arr_hname, idphlish, idalbum, group){
		//console.log(group);
		$.ajax({
			url:"../phpsv-ebooks/Update_editdetailbk.php",
			method:"POST",
			data:{idlink:idlink,arript:arript,arr_byname:arr_byname,arr_hname:arr_hname,idphlish:idphlish,idalbum:idalbum,group:group},
			dataType:"json",
			beforeSend:function(){
				active_loadprograssBar();
			   },			
			success:function (call){
				var idblink = idlink;
				//  console.log(idlink);
				func_SavePicturNewEbooks(idblink);	
				var progressValue =0;
				var speed =5;
				var progress = setInterval(function(){
				progressValue ++;
				loadprogress(progress, progressValue);
			}, speed);			
			}
		})
	
}
// -----------------------------------ฟังก์ชั่น  บันทึกข้อมูล save new ebooks---part 1------------
function func_btnClickSave(){	
	var arript= [], arr_byname = [], arr_hname =[];
	var inputtxt = document.querySelectorAll('.cipt-ebkregis');
	var idphlish = document.getElementById('ipt-publisher').getAttribute('id1');
	var idalbum = document.getElementById('ipt-album').getAttribute('id1');
	var group = document.getElementById('ipt-department').getAttribute('id1');
	var byname = document.querySelectorAll('#tr_idByathor');
	var hname = document.querySelectorAll('.tr_Headname');
	var btn_sv = document.getElementById('tbnid-savenewebk');
	var att_btn_sv = document.createAttribute('disabled');
	for(var i =0; i < inputtxt.length; i++){		
	arript.push(inputtxt[i].value);	
	}
	for(var by = 0; by <byname.length;by++ ){
		arr_byname.push(byname[by].getAttribute('id1'));
	}
	for(var hm = 0; hm < hname.length; hm++){
		arr_hname.push(hname[hm].getAttribute('id1'));
	}
	// console.log(arr_byname);
	if(arript[3] == ""){
		alert("กรุณาเลือก GMD");
		return;
	}else if(arript[8] ==""){
		alert("กรุณากรอกข้อมูล พิมพ์ครั้งที่");
		return;
	}else if(idphlish == ""){
		alert("กรุณากรอกข้อมูล สำนักพิมพ์");
		return;
	}else if(arript[12] == ""){
		alert("กรุณากรอกข้อมูล ประเทศ");
		return;
	}else if(arript[20] == ""){
		alert("กรุณากรอกข้อมูล ISBN");
		return;
	}else{
		func_SaveAddNewEbooks(arript, arr_byname, arr_hname, idphlish, idalbum, group);		
		btn_sv.setAttributeNode(att_btn_sv);
	}
}
// -----------------------------------ฟังก์ชั่น  รับค่าไฟล์รูปภาพและบันทึก
function func_SavePicturNewEbooks(idblink){
	// console.log(call[0].idlbink);
	// console.log('test-func_SavePicturNewEbooks');
	var nameid = idblink;
	   var forData = new FormData();	
	  		 var file = document.getElementById('upload_file').files[0];			 
			 forData.append('file', file);
		  	 forData.append('filename', nameid);
			 //    console.log(file.name);	
					   //ใช้งานได้แล้ว	
					$.ajax({
							   url:"../phpsv-ebooks/InserTAddNewBooks.php",
							   method:"POST",
							   data:forData,
							   dataType:'text',
							   contentType:false,
							   processData:false,							   
							   success: function(res){
								// console.log(res);
								   }			
							})
}			
// -----------------------------------ฟังก์ชั่น  บันทึกข้อมูล save new ebooks part 2---------------
function func_SaveAddNewEbooks(arript, arr_byname, arr_hname, idphlish, idalbum, group){
	// console.log(group);
		$.ajax({
			url:"../phpsv-ebooks/SaveAddNewebook.php",
			method:"POST",
			data:{arript:arript,arr_byname:arr_byname,arr_hname:arr_hname,idphlish:idphlish,idalbum:idalbum,group:group},
			dataType:"json",
			beforeSend:function(){
			 active_loadprograssBar();
			},
			success:function (call){
				//  console.log(call);
				var idlink = call.ercode;
				if(call != ''){
				if(call.ercode == 1){
						alert("inser ByAuthor error");	
						return;	
					}else if(call.ercode == 2){
						alert(" ISBN มีอยู่ในระบบแล้ว");
						return;		
					}else if(call.ercode == 3){
						alert("inser detail error");
						return;		
					}else if(call.ercode == 4){
						alert("Insert_Author error");
						return;	
					}else if(call.ercode == 'al'){
						alert("Insert Albumbooks error");
						return;	
					}else if(call.ercode == 'dp'){
						alert("Insert department error");
						return;	
					}else if(call.ercode == 'hn'){
						alert("Insert Hnameebooks error");
						return;	
					}else {
						// console.log(call.ercode);
						var progressValue =0;
						var speed =5;
						var progress = setInterval(function(){
						progressValue ++;
						loadprogress(progress, progressValue);
					}, speed); 						
						// console.log(idlink);
					func_SavePicturNewEbooks(idlink);
					}
					
				}
			}
			
		})
		
}
function del_Localstorage_remove(){
localStorage.removeItem('id0bx');
localStorage.removeItem('delnbk');
localStorage.removeItem('nbk');
localStorage.removeItem('hname');
localStorage.removeItem('b00x');
localStorage.removeItem('delst');
localStorage.removeItem("pub0x");
localStorage.removeItem('alx0b');
localStorage.removeItem('dpat');
localStorage.removeItem('pub');
localStorage.removeItem('hdel');
localStorage.removeItem('idby');
localStorage.removeItem('b');
}
// -----------------------------------ชุด ฟังก์ชั่น  บันทึกข้อมูล load process---------------
function active_loadprograssBar(){
	var popup = document.getElementById('boxModal_popsucessedituser');
	popup.style.display='block';
}
function  loadprogress(progress, progressValue){	
	var progressBar = document.querySelector(".cirula-progress");
   var valueContainer = document.getElementById("value-container");  
  //console.log(progressBar); 
   var progressEndValue = 90;
	   
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
   var btn_sv = document.getElementById('tbnid-savenewebk');
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
		   btn_sv.style.display='none';
		   valueContainer.textContent='0%';
			clearInterval(loadders);
			Func_Enableanddisable_edit();
			del_Localstorage_remove();
			// console.log('test-close');
		   }
	   }
   //progressValue++;
  // valueContainer.textContent = "0%";
  // popup.style.display='';		
					  
}
// --------------------------------END---ชุด ฟังก์ชั่น  บันทึกข้อมูล load process---------------	
// -----------------------------------ฟังก์ชั่น  edit and  disabled and Enabled ---------------
function Func_Enableanddisable_edit(){
	
	var celem = document.getElementsByClassName('disable-btn');
	//  console.log('test-disable');
	for(var i = 0; i < celem.length; i++){
		//console.log(nelem[i].);
		if(celem[i].disabled == true){
			celem[i].disabled = false;			
		}else{			
			celem[i].disabled = true;
		}
	}
}
// -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อหนังสือด้านขวาและแสดงผล
function myFuncClickSelect_Listnbk(dis){
	// console.log(dis.id);
	var li = document.querySelectorAll('.li_listSearchAd');
	var id = dis.id;
	localStorage.setItem('id0bx', id);
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor = '#d1f9ed';
			func_HubandClearInput(id);
		}else{
			li[i].style.backgroundColor = '';
		}
	}
}
// -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อ E-books ด้านขวาและแสดงผล
function myFuncClickSelect_ListEbooks(dis){
	var strpage = localStorage.getItem('idpg');
	var li = document.querySelectorAll('.li_listSearchebooks');
	var id = dis.getAttribute('id1');
	//  console.log(id);
if(strpage == 'e1'){
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor = '#d1f9ed';
			func_HubandClearInput(id);
		}else{
			li[i].style.backgroundColor = '';
		}
	}
}else if(strpage == 'e2'){
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor = '#d1f9ed';
			func_HubandClearInput_pge(id);
		}else{
			li[i].style.backgroundColor = '';
		}
	}
}
}
// -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อ E-books ด้านขวาและแสดงผล pop
function myFuncClickSelect_ListEbookspop(dis){
	var strpage = localStorage.getItem('idpg');
	var pop = document.getElementById('boxModal_popSearch_Addnewbooks');
	var id = dis.id;
	//  console.log(id);
if(strpage == 'e1'){
			func_HubandClearInputpop(id);
			open_btn_copy();
			Func_Enableanddisable_edit();
			pop.style.display='';	
	}
}
// -----------------------------------ฟังก์ชั่น hup clear input  and show detail data ebooks---------------
function func_HubandClearInputpop(id){		
	var idLINK = id;	
	if(id != null){
		var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		document.getElementById('pic_ebooks').src='';
		iptgroup.removeAttribute('id1');
		iptpublis.removeAttribute('id1');
		iptalbum.removeAttribute('id1');
	  
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
	}
		// เมื่อ   checked odioเลือกรายชื่อ ebooks
		subClickUpDataShow_ebooks(idLINK);
	
}
// -----------------------------------ฟังก์ชั่น hup clear input  and show detail data ebooks---------------
function func_HubandClearInput(id){	
	var status = document.querySelector("input[id=slc_idradio]:checked");	
	//  console.log(id);
	var idLINK = id;	
	if(id != null){
		var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		document.getElementById('pic_ebooks').src='';
		iptgroup.removeAttribute('id1');
		iptpublis.removeAttribute('id1');
		iptalbum.removeAttribute('id1');
	//   console.log(status.value);
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
	}
	if(status.value == 'L1'){
	
		subClickUpDataShow(idLINK);
		 clcik_show_album(idLINK);
		 Func_author_detail(idLINK);
		 func_Show_Byauthor(idLINK);
		//  func_chk_cancelbtn();
	}else{
		// เมื่อ   checked odioเลือกรายชื่อ ebooks
		subClickUpDataShow_ebooks(idLINK);
	}
}
// -----------------------------------ฟังก์ชั่น hup clear input  and show detail data ebooks---------------
function func_HubandClearInput_pge(id){
	var idLINK = id;	
	if(id != null){
		var ipt = document.getElementsByClassName('iptclear');
		//  console.log(iptgroup);
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Litcopybook");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}		
	}
		subClickUpDataShow_ebooks(idLINK);
	
}
// -----------------------------------ฟังก์ชั่น แสดงข้อมูลรายชื่อหนังสือหน้า popup---------------
function show_popupListebooks(){
	// var strradio = localStorage.getItem('rdio');
	var popup = document.getElementById('boxModal_popSearch_Addnewbooks');
	var btnad = document.getElementById('id-addebookregis');
	var btned = document.getElementById('editusericon');	
	var btndl = document.getElementById('delebooks');
		popup.style.display='block';
		var txt_search ='';
	ajax_showdataListebooks(txt_search);
	$(document).on('keyup', '#ipt_popSearch_Addnewbooks', function(e){
		if(e.keyCode == 13){
			var txt_search = document.getElementById('ipt_popSearch_Addnewbooks').value;		
		ajax_showdataListebooks(txt_search);
		}		
	})
	$(document).on('click', '.close_popSearch_Addnewbooks', function(){		
		popup.style.display ='';
		btnad.classList.remove('activeadd');
		btned.removeAttribute('disabled');
		btndl.removeAttribute('disabled');
	})
}
// -----------------------------------ฟังก์ชั่น แสดงข้อมูลรายชื่อหนังสือหน้าหน้า popup-------
function ajax_showdataListebooks(txt_search){	
		var HTMLX ='';
		var slc_radio = document.getElementsByName('slc_radiopopup');	
		for(var di = 0; di < slc_radio.length;di++){		
			if(slc_radio[di].checked == true){
				var chk_redio = slc_radio[di].value;			
			}
		}
		
		 if(chk_redio == "L1"){
				$.ajax({
						url:"../phpsv-ebooks/showLisSearchbook.php",
						method:"POST",
						data:{data:txt_search,strradio:chk_redio},
						dataType:"json",
						success: function(result){	
							// console.log(result);					
							if(result == null){
								stop;
								}else{
									for(i = 0; i < result.length; i++){	
										HTMLX += '<li onDblClick="myFuncClickSelect(this, '+result[i].IDLIKBOOK+')" class="li_listSearchAd" id="'+result[i].IDLIKBOOK+'" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+ 
										'&nbsp;&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
									}
								}
								
								$('.box_modal_iptSearch_Addnewbooks').html(HTMLX);
							
							}
							
					});
		}else{
			// console.log(chk_redio);
			var idLinkbook = '';
			showloadData_ebooksajax_popup(txt_search, idLinkbook);
		}			
	
}
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสี อิลิเม้นท์ที่เลือก
function myFuncClickSelect(t){	
    var popup = document.getElementById("boxModal_popSearch_Addnewbooks");	
	var btnad = document.getElementById('id-addebookregis');
	var att = document.createAttribute('disabled');
	 btnad.setAttributeNode(att);	
    var id = t.getAttribute("id1");
        mYFunc_AllHub(id);
        popup.style.display="";
	
}		
//------------------------------ฟังก์ชั่น  Clear input full
function mYFunc_AllHub(id){
	var ipt = document.getElementsByClassName('cipt-ebkregis');
		var iptalbum = document.getElementById('ipt-album');
		var iptpublis = document.getElementById('ipt-publisher');
		var iptgroup = document.getElementById('ipt-department');
		var img = document.getElementById('pic_ebooks');
		document.getElementById('ipt-nbk').removeAttribute('id1');			
		img.src='';
		iptgroup.value=''; iptgroup.removeAttribute('id1');
		iptpublis.value='';iptpublis.removeAttribute('id1');
		iptalbum.value='';iptalbum.removeAttribute('id1');
		//  console.log(ipt);
		for(var i =0; i < ipt.length; i++){
			ipt[i].value='';
			// console.log(ipt[i]);
		}
		var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
		}
		var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
		}
		subClickUpDataShow(id);
		clcik_show_album(id);
		Func_author_detail(id)
		func_Show_Byauthor(id);
		Func_Enableanddisable_edit();
		open_btn_copy();
}
function open_btn_copy(){
	var btn = document.getElementById('btn-copy-detail');
		btn.style.display='block';
}
//-----------------------------------------------------ฟังก์ชั่นแสดงผู้แต่งหนังสือ หน้าลงทะเบียน	
function func_Show_Byauthor(idLINK){
	var HTMLBY = ""; 
		$.ajax({
				url:"../phpsv-ebooks/ShowDataByauthorl.php",
				method:"POST",
				data:{idLINK:idLINK},
				dataType:"json",
				success: function(txt_by){
					//console.log(txt_by);
				if(txt_by != null){
							for(var i = 0; i < txt_by.length; i++){
								HTMLBY += '<tr class="tr_Byathor" ondblclick="myFuncdbClickDEL(this)" id="tr_idByathor" id1="'+txt_by[i].LINK_athor+'"><td class="td_Byathor" id="'+txt_by[i].LINKCODE+'">'+txt_by[i].NAME_BY+'</td></tr>';
								
								//console.log(HTMLBY);
								}
							
					
						}
					$('.tb_Byathor').html(HTMLBY);
					}
			});
}			
//------------------------------------------------------------------------------------ฟังก์ชั่นแสดงข้อมูลในช่องinput หน้าดีเทล
function subClickUpDataShow(idLINK){
	//console.log(idLINK);
	//alert(ARR_success.length);
	var elemt_nbk = document.getElementById('ipt-nbk');
	var elephlis = document.getElementById('ipt-publisher');
	//console.log(elemt_nbk);
	var nbook, Gmd, Editcopy,
		publisher, yearcopy, libarian, lang_txt, isbn, idphlish, catbook_store, byauthor, BYNUM;
	$.ajax({
						url:"../phpsv-ebooks/ClickShowDetail_regisbk.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(ARR_success){
							//console.log(ARR_success);	
					 for(var tx =0; tx < ARR_success.length; tx++){
				// console.log(ARR_success[tx].BARCODE);
				
							//console.log(ARR_success[tx].NAME_BOOK);
							if(ARR_success[tx].ISBN != null){ //  ถ้ามีเลข isbn ให้แสดงรูปภาพ
							//console.log(ARR_success[tx][2]);
									var isbn = ARR_success[tx].ISBN;
								subCheckFilepic(idLINK);
									}
										//console.log(ARR_success[tx]);
												if(ARR_success[tx].key_E != null){ //ถ้ามีคีย์อีให้แสดง พิมพ์ครั้งที่
													Editcopy = ARR_success[tx].key_E;
													}
													if(ARR_success[tx].pub != null){
														publisher  = ARR_success[tx].pub+'....,'+ARR_success[tx].pub_address;
														}if(ARR_success[tx].Year_book != null){
															yearcopy = ARR_success[tx].Year_book;
															}if(ARR_success[tx].COUNTPAGE != null){
																libarian = ARR_success[tx].COUNTPAGE;
																}if(ARR_success[tx].lang != null){
																	
																	}if(ARR_success[tx].ISBN != null){
																		isbn = ARR_success[tx].ISBN;
																		}
													//alert( ARR_success[tx].pub);
									idphlish = ARR_success[tx].PUBCODE;
									nbook = ARR_success[tx].NAME_BOOK;
									Gmd =ARR_success[tx].GMDCODE;
									lang_txt = ARR_success[tx].lang;
									catbook_store = ARR_success[tx].Catbook_store;
									 byauthor = ARR_success[tx].byauthor;
									 BYNUM = ARR_success[tx].BYNUM;
									
									// alert(lang_txt);
									//console.log(publisher);
								//	console.log(ARR_success[tx].pub_address+'สำนักแต่ง');
							//if(ARR_success[tx].BARCODE == idLinkbook)
				
				 	}
					 var att = document.createAttribute('id1');
					 att.value = idLINK;
					 elemt_nbk.setAttributeNode(att);
				 var attphlis =document.createAttribute('id1');
					 attphlis.value = idphlish;
					 elephlis.setAttributeNode(attphlis);	
					 Func_Select_GMD(Gmd);
					 mYfunc_ShowdataAdcatbook();							
					 $('#ipt-nbk').val(nbook);					
					 $('#ipt-publisher').val(publisher);
					 $('#ipt-year').val(yearcopy);
					 $('#ipt-libarian').val(libarian);
					 $('#ipt-countprint').val(Editcopy);
					 $('#slc-reg').val(lang_txt);				
					 $('#ipt-isbn').val(isbn);					
					 $('.ipt_regisPCOPY_no').val(idLINK);		
					
		 		}
						
		});
						
}
//------------------------------------------------------------------------------------ฟังก์ชั่นแสดงข้อมูลในช่องinput  ebooks
function subClickUpDataShow_ebooks(idLINK){	
	var typekey ='';
	$.ajax({
						url:"../phpsv-ebooks/ClickShowDetail_ebooks.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(ARR){
							// console.log(ARR);
								var attidebkn = document.createAttribute('id1'); 
								var nebk = document.getElementById('ipt-nbk');
								var publis = document.getElementById('ipt-publisher');
								var att_pubhlis = document.createAttribute('id1');
								var album = document.getElementById('ipt-album');
								var att_album = document.createAttribute('id1');
								var depart = document.getElementById('ipt-department');
								var att_depart = document.createAttribute('id1');
								var idblincode = ARR[0].BARCODE;
									nebk.value=ARR[0].NAME_BOOK;
									attidebkn.value = ARR[0].IDLIKBOOK;
									nebk.setAttributeNode(attidebkn);
									document.getElementById('ipt-by').value = ARR[0].KEY_O;	
									document.getElementById('ipt-countprint').value=ARR[0].Numcopy;	
									document.getElementById('ipt-year').value=ARR[0].Year_book;
									att_pubhlis.value= ARR[0].PUBCODE;
									publis.value = ARR[0].Namepublish+",....,"+ARR[0].Locationbup;	
									publis.setAttributeNode(att_pubhlis);		
									document.getElementById('slc-reg').value=ARR[0].lang;
									document.getElementById('ipt-sttebk').value=ARR[0].STWORK;
									album.value=ARR[0].album;
									att_album.value=ARR[0].IDalbum;
									album.setAttributeNode(att_album);
									depart.value=ARR[0].department;
									att_depart.value=ARR[0].idepart;
									depart.setAttributeNode(att_depart);
									document.getElementById('ipt-libarian').value = ARR[0].COUNTPAGE;
									document.getElementById('ipt-isbn').value = ARR[0].ISBN;
									document.getElementById('ipt-linkebook').value=ARR[0].IDLIKBOOK;
									document.getElementById('ipt-ebarcode').value=ARR[0].BARCODE;
									document.getElementById('ipt-regisebcode').value=ARR[0].BARCODE;
									document.getElementById('ipt-dateebok').value=ARR[0].DATE;
									document.getElementById('ipt-ebkmemo').value=ARR[0].KEY_M;
									document.getElementById('ipt-sttebk').value=ARR[0].STWORK;
									document.getElementById('ipt-linkebook').value = ARR[0].IDLIKBOOK;
								Myfunc_P3COPY(ARR[0].IDLIKBOOK);
								Func_Select_GMD(ARR[0].GMDCODE);
								subCheckFilepic(ARR[0].IDLIKBOOK)	
								func_ebooksShow_Byauthor(ARR[0].IDLIKBOOK);
								mYfunc_showdataAdmoreheadname(ARR[0].IDLIKBOOK);
								typekey =  idblincode.substr(0, 1); //F
								func_slc_type(typekey);
		 		}
						
		});
						
}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา (รายการในช่อง สำเนา) 
function Myfunc_P3COPY(idLINK){		
	// console.log(idLINK);
	var HTML = '';
	
		$.ajax({
				url:"../phpsv-ebooks/Showcopybook.php",
				method:"POST",
				data:{idLINK:idLINK},
				dataType:"json",
				success: function(data){
						// console.log(data);				
					if(data != null){
					//clickTomyFunc_detail(data);
						for(var d =0; d<data.length; d++){
							// console.log(data[d].BARCODE);
							var brcode = data[d].BARCODE;
							HTML +='<tr class="tr_Litcopybook" id="tr_click" id1="'+data[d].BARCODE+'" ondblClick="myFuncSeletListCode(this)">';
								HTML +='<td class="td_Litcopybook_bc">'+data[d].BARCODE+'</td>';
								HTML +='<td class="td_Litcopybook_cb">'+data[d].NAME_BOOK+'/'+data[d].Year_book+'</td>';
								HTML +='<td class="td_Litcopybook_cb"><i class="fa fa-trash txt-icondel" onclick="fucn_delcopyebooks(this);" id1="'+data[d].BARCODE+'" aria-hidden="true"></i></td>';
							HTML + '</tr>';
							}
						
						 $('.tb_showbcode').html(HTML);
						}
					}
								
			})
			$('.tb_showbcode').html(HTML);	
	}
//------------------------------------------------------------------ฟังก์ชั่น ตรวจสอบมีรูปภาพหนังสือหากมีให้โชว์ในหน้าดีเทล	 
function subCheckFilepic(IDLIKBOOK){
    //console.log(isbn)
    var img = document.getElementById("pic_ebooks");
                    $.ajax({
                            url:"../phpsv-ebooks/checkpicture.php",
                            method:"POST",
                            data:{data:IDLIKBOOK},
                            dataType:"json",
                            success: function (result){
                        //console.log(result);
                            // console.log(result.stut);
                                if(result == null){
                                    stop;
                                    }else{
                                        if(result.stut == 1){											
                                                
                                                 img.src= '..'+/COVERIMAGES/+''+result.idlink+'.jpg';
                                                 //console.log(img);
                                                 
                                                    //$('.pic_regisbook').html('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+result.isbnbook+'.jpg">');
                                                }else{
                                                     img.src= '..'+/fileimage/+'ebooksimg.jpg';
                                                    }
                                        }
                                //console.log(d)
                                }
                            
                            
                            
                            });
                            
                                //$('.pic_regisbook').html('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+pathpic+'.jpg">')
                            //console.log('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+pathpic+'.jpg">')
        
 }
//------------------------------------------------------------------ฟังก์ชั่น แสดงตัวเลือก GMD------	
function Func_Select_GMD(Gmd){
	//   console.log(Gmd+"//");
	var OPTION = '';
	$.ajax({
						url:"../phpsv-ebooks/ShowSelect_GMD.php",
						method:"POST",
						data:{GMD:Gmd},
						dataType:"json",
						success: function (result){
							// console.log(result);
							for(var G = 0; G < result.length; G++){
									OPTION += '<option value="'+result[G].KEY_GMD+'">'+result[G].NAME_GMD+'</option>';
								}
								$('#ipt-Gmd').html(OPTION);
							// console.log(OPTION);
							}						
						
			})
}
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงอัลบั้ม ชุดหนังสือ
function clcik_show_album(idLINK ){
	// console.log(idLINK);
	var album = document.getElementById('ipt-album');
	var HTMLX='';
	var HTMLID='';
		$.ajax({
						url:"../phpsv-ebooks/showAlbum.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(data_txt){
							if(data_txt != null){
								
								for(var it =0; it<data_txt.length; it++){
									
									HTMLX += data_txt[it].album_name;
									HTMLID = data_txt[it].id_album;
									}
									$('#ipt-album').val(HTMLX);
									//console.log(HTMLX);
									var attalbum =document.createAttribute('id1');
										attalbum.value = HTMLID;
										album.setAttributeNode(attalbum);
								
								}
						
								
							}
						
						
						})
				
}
//--------------------------------------------function  หน้าลงทะเบียนหนังสือ --------------------------------------------
function myFuncSearch_namebook(){
	
	var vals = document.getElementById('idipt_sch_gsuser').value;
	var idLinkbook ='';
	showloadData_ajaxbook(vals, idLinkbook);	
	$(document).on("keyup", '#idipt_sch_gsuser', function(e){
		if(e.keyCode == 13){
			//console.log(e.target.value);
			var vals = document.getElementById('idipt_sch_gsuser').value;
			showloadData_ajaxbook(vals, idLinkbook);
			}
		})
	$('#idipt_sch_gsuser').val("");
	
}
//------------------------------------------------------------------ฟังก์ชั่น แสดง ผู้รับผิดชอบหน้าลงทะเบียน	 
function Func_author_detail(idLINK){
	//$('.ipt_nameregisathor').val(athor);
	var html_author ='';
	$.ajax({
						url:"../phpsv-ebooks/show_author.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(data_txt){
							if(data_txt != null){
								
								for(var i = 0; i<data_txt.length;i++){
									if(data_txt[i].KEY_O == "O" ){
										
										html_author +=  data_txt[i].detail;
										
										}
									
									
									}
								$('.ipt_nameregisathor').val(html_author);
								//console.log(html_author);
								}
							
							}
						
						
						})
}
//-----------------------------------------------------ฟังก์ชั่นแสดงผู้แต่งหนังสือ หน้าลงทะเบียน  ebooks	
function func_ebooksShow_Byauthor(idLINK){
	//  console.log('func_ebooksShow_Byauthor');
	var HTMLBY = ""; 
		$.ajax({
				url:"../phpsv-ebooks/ShowDataByauthorl_ebk.php",
				method:"POST",
				data:{idLINK:idLINK},
				dataType:"json",
				success: function(txt_by){
					// console.log(txt_by);
				if(txt_by != null){
							for(var i = 0; i < txt_by.length; i++){								
								HTMLBY += '<tr class="tr_Byathor" ondblclick="myFuncdbClickDEL(this)" id="tr_idByathor" id1="'+txt_by[i].LINKCODE+'"><td class="td_Byathor">'+txt_by[i].NAME_BY+'</td></tr>';				
								//console.log(HTMLBY);
								}
							
					
						}
					$('.tb_Byathor').html(HTMLBY);
					}
			});
}
//-----------------------------------------------------ฟังก์ชั่น เมื่อเลือกหน้าลงรายการ ให้แสดงดีเทลข้อมูลด้านซ้าย
function mYfunc_ShowdataAdcatbook(){
    var idlinks = $('#ipt-nbk').attr('id1');
    var HTMLS = '';

    //    console.log(idlinks);
    if(idlinks != null){
        $.ajax({
                url:"../phpsv-ebooks/Show_headname.php",
                method:"POST",
                data:{idlinks:idlinks},
                dataType:"json",
                success: function(headbook){
                //    console.log(headbook);
                    if(headbook != null){
                    for(var b =0; b < headbook.length; b++){
                        HTMLS +='<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id="trid_listhname" id1="'+headbook[b].id_album+'">';
						HTMLS += '<td class="td_Headname">'+headbook[b].album_name+'</td></tr>';                        
                        }
                    
                    $('.tb_HeadName').html(HTMLS);
                    }
                }
                })
        }
    
}
//-----------------------------------------------------ฟังก์ชั่น แสดงรายการช่องหัวเรื่องเพิ่มเติม  ebooks
function mYfunc_showdataAdmoreheadname(idlinks){
	//console.log(idlinks);
	var HTMLX = '';	
		$.ajax({
					url:"../phpsv-ebooks/Show_headnamemore.php",
					method:"POST",
					data:{idlinks:idlinks},
					dataType:"json",
					success: function(more){
						//console.log(more);
						if(more != null){
							
						for(var m =0; m < more.length; m++){
							HTMLX += '<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id="trid_listhname" id1="'+more[m].LINK_ALBUMID+'">';
							HTMLX +='<td class="td_more" >'+more[m].album_name+'</td>';
							HTMLX += '</tr>';
							}
						
						$('.tb_HeadName').html(HTMLX);
						}else{
							
							$('.tb_HeadName').html("");
							}
					}
					
					})
	
}
function func_popupshowbyAuthor(){
	var boxpopSearch_byathor = document.getElementById('boxModal_popSearch_byathor');
		boxpopSearch_byathor.style.display ="block";
	var data = "";
	SearchAjax_byathor(data);
	$(document).on('click', '.close_popSearch_byathor',  function(){
		boxpopSearch_byathor.style.display="none";
		})
	$(document).on('keyup', '.ipt_popSearch_byathor', function(){
		var data = $(this).val();
		
	SearchAjax_byathor(data);
	})
}
//-------------------------------------------------ฟังก์ชั่น แสดงข้อมูลใน popup search by athor------	
function SearchAjax_byathor(data){
	//console.log(data);
		var HTML_athor ="";
			$.ajax({
					url:"../phpsv-ebooks/Search_byathor.php",
					method:"POST",
					data:{data:data},
					dataType:"json",
					success: function(result){
					
						if(result != null){
							for(var i = 0; i < result.length; i++){
									HTML_athor += '<li ondblclick="myFuncClickAthor(this)"  id="'+result[i].LINKCODE+'" id1="'+result[i].NAME_BY
									+'" class="li_byathor">'+result[i].NAME_BY+'</li>';									
								}
							}
						//alert(dataathor.length);
						//console.log(HTML_athor);
					$('.boxmodal_list_user_byathor').html(HTML_athor);	
						}
						
				})
				
}
//-------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสีและลบรายชื่อผู้แต่งในหน้า popup รายชื่อผู้แต่ง
function myFuncSelect_delbyauthorpopup(dis){	
	var iddel = dis.getAttribute('id');
	var ele = document.querySelectorAll('.li_byathor');
	localStorage.setItem('b00x', iddel);
	for(var t =0; t < ele.length; t++){
		if(dis == ele[t]){		
			ele[t].style.backgroundColor = '#FF9A78';
		}else{
			ele[t].style.backgroundColor = '';
		}
	}

}
//-------------------------------------------ฟังก์ชั่นคลิกลบราชื่อผู้แต่งใน popup  และ ajax/php
function Clcik_delbyauthorpopup(){
	var id  = localStorage.getItem('b00x');
	// console.log(id);
	var data = '';
	var popup = document.getElementById('myModal-alert');
	var hedtxtalert = 'คำเตือน!!!';
	var htxt = 'การลบรายชื่อผู้แต่งมีผลต่อทะเบียนหนังสืออื่นๆ ที่ใช้ชื่อผู้แต่งเดียวกัน';
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDel" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	if(id != null){
		document.getElementById('idlgend').innerText = hedtxtalert;
		document.getElementById('spnamedel').innerHTML= htxt;
		document.getElementById('item_btnshow').innerHTML= btntxt;
		popup.style.display='block';
		$(document).on('click', '.close-btnalert', function(){
			popup.style.display='';			
		})
		$(document).on('click', '.btn-yesDel', function(){
			// console.log(id);
			$.ajax({
				url:'../phpsv-ebooks/Del_byathor.php',
				method:'GET',
				data:{id:id},			
			})
			localStorage.removeItem('b00x');
			SearchAjax_byathor(data);
			document.getElementById('spnamedel').innerHTML= '';
			document.getElementById('item_btnshow').innerHTML= '';
			document.getElementById('idlgend').innerText = '';
			popup.style.display='';	

		})	
	}
}
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสีของผู้แต่ง อิลิเม้นท์ที่เลือก
function myFuncClickAthor(x){  
	var HTML = '';
    var id = x.getAttribute('id');
    var txt = x.getAttribute('id1');
	HTML = '<tr id="tr_idByathor" ondblclick="myFuncdbClickDEL(this)" id1="'+id+'"><td>"'+txt+'"</td></tr>'; 
	// console.log(HTML);
	$('.tb_Byathor').append(HTML);	
}

function myFuncdbClickDEL(dis){
	//  console.log(dis);
	var ele = dis.getAttribute('id1');
	var all = document.querySelectorAll('#tr_idByathor');
	 localStorage.setItem('idby', ele);	
	for(var cl = 0; cl < all.length; cl++){
		if(all[cl] == dis){
			dis.style.backgroundColor = '#FF9A78';
			localStorage.setItem('delst', ele);		
		}else{
			all[cl].style.backgroundColor = '';			
		}
		
	
	}
}
//-------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสีและลบรายชื่อผู้แต่งในหน้าลงทะเบียน
function myFuncClick_btn_delbyauthor(){
	var id = localStorage.getItem('delst');
	// console.log(id);
	var ele = document.querySelectorAll('#tr_idByathor');

	for(var i = 0; i <  ele.length; i++){
		if(id == ele[i].getAttribute('id1')){
			founcbtn_delbyauthor(id);
			ele[i].remove();
			localStorage.removeItem('delst');
		}
	}
}
function founcbtn_delbyauthor(id){
	var idblink = document.getElementById('ipt-nbk').getAttribute('id1');
	$.ajax({
		url:"../phpsv-ebooks/del_btnbyauthor.php",
		method:"POST",
		data:{idblink:idblink,idby:id},
	})		
}
//---------------------------------------------------------------ฟังก์ชั่น Add  ผู้แต่งเข้าระบบ
function Click_ADDNewbyauthor(){
	var Byathor_name = $('.ipt_popSearch_byathor').val();
	var HTML ='';
	if(Byathor_name != null){
		//console.log(val);
		$.ajax({
				url:"../phpsv-ebooks/Add_byathor.php",
				method:"POST",
				data:{val:Byathor_name},
				dataType:"text",
				success: function(result){					
					HTML += '<tr class="tr_Byathor" ondblclick="myFuncdbClickDEL(this)" id="tr_idByathor" id1="'+result+'"><td class="td_Byathor" >'+Byathor_name+'</td></tr>';
					//console.log(HTML);
					$('.tb_Byathor').append(HTML);
					}
			
			})
			
			
			
		}
		$('.ipt_popSearch_byathor').val("");
		var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_byathor');
	boxpopSearch_Puphlish.style.display="none";
}
function ClickAdd_pubhlish(){
	var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
	boxpopSearch_Puphlish.style.display ="block";
	var data = "";
	 KeyUpADD_puphlish(data);
	$(document).on('click', '.close_popSearch_Puphlish',  function(){
		boxpopSearch_Puphlish.style.display="none";
		})
	$(document).on('keyup', '.ipt_sch_pubhlish', function(){
		var data = $(this).val();
		//console.log(data);
	 KeyUpADD_puphlish(data);
	})
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup ค้นหา และแสดงรายการสำนักพิมพ์
function KeyUpADD_puphlish(data){
	// console.log(data);
	var HTMLX ='';
		$.ajax({
				url:"../phpsv-ebooks/SearCH_Puphlish.php",
				method:"POST",
				data:{data:data},
				dataType:"json",
				success: function(puphlish){
					if(puphlish != null){
						HTMLX += '<ul class="ul_puphlish">';
						for(var i =0; i < puphlish.length; i++){
							
							HTMLX += '<li  class="li_puphlish"  ondblclick="myFuncSLC_pubhlish(this)" id="ipt_pubhlishid" id1="'+puphlish[i].PUBID_tb+'">'+puphlish[i].PUBNAME+';.....,'+puphlish[i].PUBADRESS+'</li>';
							
							
							}
						HTMLX +='</ul>';
						
						}
				
					$('.boxmodal_list_user_Puphlish').html(HTMLX);
					//console.log(HTMLX);
					
					}
			
			})	
}

function myFuncSLC_pubhlish(dis){
	// var btns = document.querySelectorAll('.li_puphlish');
	var popup = document.getElementById('boxModal_popSearch_Puphlish');
	var ipt_pubh = document.getElementById('ipt-publisher');
	var att_id1 = document.createAttribute('id1');	
	var id = dis.getAttribute('id1');
	var txt_pub = dis.innerText;
	// console.log(id);
		ipt_pubh.value = txt_pub;
		att_id1.value= id;
		ipt_pubh.setAttributeNode(att_id1);
		popup.style.display = 'none';

}
function Click_AddNew_byauthor(){
	var ipt_namepubhlish = document.getElementById('idipt_sch_pubhlish');
	var ipt_province = document.getElementById('idipt_sch_province');
	var ipt_pubh = document.getElementById('ipt-publisher');
	var att_id1 =  document.createAttribute('id1');
	var Puphlish_name = ipt_namepubhlish.value;
	var location_name = ipt_province.value;
	if(Puphlish_name == ''){
		alert('กรุณาใส่สำนักพิมพ์');
		return;
	}else if(location_name == ''){
		alert('กรูณากรอกจังหวัดสำนักพิมพ์');
		return;
	}else{
		$.ajax({
			url:"../phpsv-ebooks/Add_Puphlish.php",
			method:"POST",
			data:{val:Puphlish_name, loca:location_name},
			dataType:"json",
			success: function(result){
				console.log(result);
				if(result != null){
					for(var i = 0; i < result.length; i++){
						att_id1.value = result[i].id;
						 ipt_pubh.value = result[i].name+'..........,'+result[i].location;
						 ipt_pubh.setAttributeNode(att_id1);
					}
				}
			} 
		
		})
		ipt_namepubhlish.value = '';
		ipt_province.value = '';
		var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
			boxpopSearch_Puphlish.style.display="none";	
	}
	
	
	
}
function Click_slclist_pubphlish(dis){
	// console.log(dis);
	var ele = document.querySelectorAll('#ipt_pubhlishid');
	var idpub = dis.getAttribute('id1');
	// console.log(idpub);
	for(var i =0; i < ele.length; i++){
		if(dis == ele[i]){
			ele[i].style.backgroundColor='#d1f9ed';
			localStorage.setItem('pub0x', idpub);
		}else{
			ele[i].style.backgroundColor='';
		}
	}
}
function ClickBtn_del_pubhlish(){
	var id = localStorage.getItem("pub0x");
	console.log(id);
	if(id == null){
		alert('กรุณาเลือกรายการสำนักตีพิมพ์ที่ต้องการลบ');
		return;
	}else{
		func_alert_pubphlis(id);
	}
}
function func_alert_pubphlis(id){
	var popup = document.getElementById('myModal-alert');	
	var htxt = 'การลบรายการ "สำนักตีพิมพ์" อาจส่งผลกระทบต่อทะเบียนหนังสืออื่นที่ใช้ข้อมูลสำนักตีพิมพ์เดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelpubphlish data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	popup.style.display='block';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelpubphlish', function(){
		del_pubhlish_ajax(id);	
		popup.style.display='';
	})
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function del_pubhlish_ajax(id){
	var ipt_pubh = document.getElementById('ipt-publisher');
	var data = '';
	// console.log(id);
	if(id != null){
		var data = "";
				$.ajax({
						url:"../phpsv-ebooks/Del_Puphlish.php",
						method:"POST",
						data:{val:id},
						dataType:"text",
					})			
        localStorage.removeItem("pub0x");
		ipt_pubh.removeAttribute('id1');
		ipt_pubh.value = '';		
		KeyUpADD_puphlish(data);
		
	}		
}	
//---------------------------------------------------------------------ฟังก์ชั่น popup search album book  ค้นหาอัลบั้มชุดหนังสือ	
function Click_BtNShowpop_album(){	
	var popup = document.getElementById('boxModal_popSearch_album');
	popup.style.display='block';
	var data = "";
	Myfunc_SearchAlbum(data);
	$(document).on('click', '.close_popSearch_Puphlish',  function(){
		popup.style.display='none';
		})
		$(document).on('keyup', '#idipt_sch_album', function(){
            var data = $(this).val();
        //    console.log(data);
        Myfunc_SearchAlbum(data);
	})	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup search album book List แสดงรายการที่ค้นหา 			
function Myfunc_SearchAlbum(data){
	//console.log(data);		
	var HTMLX ='';
		$.ajax({
				url:"../phpsv-ebooks/SearCH_Album.php",
				method:"POST",
				data:{data:data},
				dataType:"json",
				success: function(album){
					// console.log(album);
					if(album != null){						
						for(var i =0; i < album.length; i++){
							HTMLX += '<li ondblclick="myFuncDBclick_slcalbum(this)"   id="li_idalbum" id1="'+album[i].id_album
									+'" class="li_album">'+album[i].album_name+'</li>';
							}
						}
					$('.boxmodal_list_album').html(HTMLX);
					//console.log(HTMLX);
					}
			})
 $(document).on('this, click', '#li_idalbum', function(){
		var eleLi = document.querySelectorAll('#li_idalbum');
	//  console.log();
		for(var i = 0; i < eleLi.length; i++){
			if(this == eleLi[i]){
				localStorage.setItem('alx0b', this.getAttribute('id1'));
				eleLi[i].style.backgroundColor = '#d1f9ed';
			}else{
				eleLi[i].style.backgroundColor = '';
			}
		}
	})		
}
//------------------------------------------------------------------------------------ฟังก์ชั่น  dubleClick slc album name
function myFuncDBclick_slcalbum(dis){
	var popup = document.getElementById('boxModal_popSearch_album');
		popup.style.display='none';	
	var att = document.createAttribute('id1');
	var ipt = document.getElementById('ipt-album');
	    att.value = dis.getAttribute('id1');
		ipt.setAttributeNode(att);
		 ipt.value = dis.innerText;		
		//  console.log(att);
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete ชื่อชุดหนังสือ
function Click_BtnDel_album(){
	var id1 = localStorage.getItem('alx0b');
	
	if(id1 == null){
		alert('กรุณาคลิกเลือกรายการชื่อชุดหนังสือให้ขึ้นแถบสีก่อน');
		return;
	}else{
		//console.log(id_album);
		func_alert_delalbum(id1);
		
	}				
}
function func_alert_delalbum(id1){	
	var popup = document.getElementById('myModal-alert');	
	var htxt = 'การลบรายการ ชื่อชุดหนังสืออาจส่งผลให้ทะเบียนหนังสืออื่นที่ใช้ชื่อเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelalbum data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	popup.style.display='block';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelalbum', function(){
		console.log('test-xxx');
	del_album_ajax(id1);
		popup.style.display='';
	})
}
function del_album_ajax(id1){	
	var ele = document.getElementById('ipt-album');
	var data = '';
	$.ajax({
		url:"../phpsv-ebooks/Del_Album.php",
		method:"POST",
		data:{val:id1},
		dataType:"text",
		success: function(result){			
			Myfunc_SearchAlbum(data);			
			}
	})
	ele.removeAttribute('id1');
	ele.value = '';
	localStorage.removeItem('alx0b');	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น Add ชื่อชุดหนังสือ 
function Click_Btn_ADDalbum(){
	var popup = document.getElementById('boxModal_popSearch_album');
	var ipt = document.getElementById('idipt_sch_album');
	var ele = document.getElementById('ipt-album');
	var att = document.createAttribute('id1');
	var HTML ='';	
		if(ipt.value  != ''){
			$.ajax({
				url:"../phpsv-ebooks/Add_Album.php",
				method:"POST",
				data:{val:ipt.value},
				dataType:"json",
				success:function(data){
					if(data != null){
						for(var i =0; i < data.length; i++){
							att.value = data[i].id;
							HTML = data[i].name;
						}
						ele.setAttributeNode(att);
						ele.value= HTML;
					}
				}
			})
			ipt.value = '';
			popup.style.display= 'none';
		}	
}
//----------------------------------------------------------------------ฟังก์ชั่น click btn showpopup department group
function Click_Btn_showpopup_dpartment(){
	var popup = document.getElementById('boxModal_popsch_edepartment');
	popup.style.display ='block';
	var data = '';
	Myfunc_Sch_department(data);
	$(document).on('click', '.close_popSearch_Puphlish',  function(){
		popup.style.display='none';
		})
		$(document).on('keyup', '#idipt_sch_dpartment', function(){
            var data = $(this).val();
          console.log(data);
		Myfunc_Sch_department(data);
	})		
}
//----------------------------------------------------------------------ฟังก์ชั่น show  รายชื่อแผนก/กลุ่มใน popup list
function Myfunc_Sch_department(data){
	var HTML = '';
	$.ajax({
		url:"../phpsv-ebooks/Show_department.php",
		method:"POST",
		data:{val:data},
		dataType:"json",
		success:function(result){
			// console.log(result);
			if(result != null){
				for(var i =0; i < result.length; i++){
					HTML += '<li class="li_dpartment li_album" id="dpatmentid" ondblclick="func_dbclick_slcdepartment(this)" id1="'+result[i].code_dpart+'">'+result[i].name_part+'</li>';	
				}
			}
			$('.boxmodal_list_dpartment').html(HTML);			
		}
	
	})
}
//----------------------------------------------------------------------ฟังก์ชั่น dubleclick slc listdepartment
function func_dbclick_slcdepartment(dis){
	// console.log(dis.innerText);
	var popup = document.getElementById('boxModal_popsch_edepartment');
	var ipt = document.getElementById('ipt-department');
	var att =  document.createAttribute('id1');
	 	att.value = dis.getAttribute('id1');
		ipt.setAttributeNode(att);
		ipt.value = dis.innerText;
		popup.style.display ='none';
}
function  Click_Btn_adddpartment(){
	var txt = document.getElementById('idipt_sch_dpartment');
	var ipt  = document.getElementById('ipt-department');
	var att = document.createAttribute('id1');
	var popup = document.getElementById('boxModal_popsch_edepartment');
	
	 console.log(txt.value);
if(txt.value == ''){
	alert('กรุณาคีย์ชื่อ แผนก/กลุ่มงาน ก่อนเพิ่มข้อมูล');
	return;
}else{
	$.ajax({
		url:"../phpsv-ebooks/Add_department.php",
		method:"POST",
		data:{val:txt.value},
		dataType:"json",
		success:function(data){
			// console.log(data);
			if(data != null){
				for(var d =0; d < data.length; d++){
					att.value = data[d].id;
					ipt.value = data[d].name;
				}
				ipt.setAttributeNode(att);
			}
			txt.value = '';
			popup.style.display = '';
		}
	})
	}	

}
function Click_Btnslc_listdepartment(dis){
	var eleLi = document.querySelectorAll('#dpatmentid');
	for(var li = 0; li < eleLi.length; li++){
		if(eleLi[li] == dis){
			eleLi[li].style.backgroundColor ='#d1f9ed';
			localStorage.setItem('dpat', dis.getAttribute('id1'));
		}else{
			eleLi[li].style.backgroundColor ='';
		}
	}

}
function Click_Btn_deldpartment(){
	var id = localStorage.getItem('dpat');
	var data = '';
 //console.log(id);
	if(id == null){
		alert('กรุณาคลิกเลือกรายการแผนก/กลุ่มงานให้ขึ้นแถบสี');
		return;
	}else{
		func_alertdel_dpartment(id);		
	}
	
	
}
function func_alertdel_dpartment(id){	
	var popup = document.getElementById('myModal-alert');
	var htxt = 'การลบรายการ แผนก/กลุ่มงาน อาจส่งผลให้ทะเบียนรายชื่อหนังสืออื่นที่ใช้ข้อมูลเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdeldpart data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	if(id == null){
		alert('กรุณาเลือกรายการที่ต้องการลบ/คลิกให้ขึ้นแถบสี');
	}else{
		popup.style.display='block';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdeldpart', function(){
		del_ajaxdpartment(id);
		popup.style.display='';
	})
 }
}
function del_ajaxdpartment(id){
	var eleTR = document.getElementById('ipt-department');
	var data = '';
	$.ajax({
		url:"../phpsv-ebooks/Del_department.php",
		method:"GET",
		data:{id:id},
		dataType:"text",
		success:function(result){
			eleTR.value='';
			eleTR.removeAttribute('id1');
			localStorage.removeItem('dpat');
			Myfunc_Sch_department(data);
		} 
	})
}
//--------------------------------------------------ฟังก์ชั่นPOPUP Search Headname path 2  ปอบอัพค้นหาหัวเรื่อง		
function Click_showpopup_hname(){
	var popup  = document.getElementById('boxModal_popsch_hname');
	popup.style.display='block';
	var data = "";
	Search_popup_HeadName(data);
	$(document).on('click', '.close_popSearch_Puphlish',  function(){
		popup.style.display='none';
		})
		$(document).on('keyup', '#idipt_sch_hname', function(){
            var data = $(this).val();
        //    console.log(data);
		Search_popup_HeadName(data);
	})	
}
//--------------------------------------------------ฟังก์ชั่นPOPUP Search Headname path 2  ปอบอัพค้นหาหัวเรื่อง		
function Search_popup_HeadName(data){
	var HTML = '';
$.ajax({
			url:"../phpsv-ebooks/ShowListHeadName.php",
			method:"POST",
			data:{data:data},
			dataType:"json",
			success: function(result){
				if(result != null){
					
					for(var m =0; m < result.length; m++){
						
						HTML += '<li ondblclick="myClick_slc_listhname(this)" id="liid_hname" id1="'+result[m].id_album
								+'" class="li_HeadName">'+result[m].album_name+'</li>';
						
						}
					$('.boxmodal_list_hname').html(HTML);
					}
				
				}
		})

}
function myClick_slc_listhname(dis){
	var popup = document.getElementById('boxModal_popsch_hname');
	var att = dis.getAttribute('id1');
	var txt = dis.innerText;
	var HTMLX = '';
	//  console.log(att);
	HTMLX += '<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id="trid_listhname" id1="'+att+'">';
	HTMLX +='<td class="td_more" >'+txt+'</td>';
	$('.tb_HeadName').append(HTMLX);
	popup.style.display='none';	
}
//-----------------------------------------------------ฟังก์ชั่น  dbclick select รายการ  หัวเรื่องใน popup
function dbclick_slc_hname(dis){
	var eleTR = document.querySelectorAll('#trid_listhname');
	// console.log(dis);
	for(var i =0; i < eleTR.length; i++){
		if(dis == eleTR[i]){
			eleTR[i].style.backgroundColor='#d1f9ed';
			localStorage.setItem('hname', dis.getAttribute('id1'));
		}else{
			eleTR[i].style.backgroundColor='';
		}
	}
}
//-----------------------------------------------------ฟังก์ชั่น  click select รายการ  หัวเรื่องในหน้าลงทะเบียน
function Click_Btn_delhname(){
	var id = localStorage.getItem('hname');
	// console.log(id);
	var eleTR = document.querySelectorAll('#trid_listhname');
	for(var i =0; i < eleTR.length; i++){
		if(id == eleTR[i].getAttribute('id1')){
			eleTR[i].remove();
			localStorage.removeItem('hname');
		}
	}
}
//-----------------------------------------------------ฟังก์ชั่น   add new headname more ajax
function Click_Btn_ADDnew_hname(){
	var txt = document.getElementById('idipt_sch_hname');
	var popup = document.getElementById('boxModal_popsch_hname');
	var HTMLX = '';
	// console.log(txt);
	if(txt.value == ''){
		alert('กรุณากรอกชื่อหัวเรื่องที่ต้องการเพิ่มเข้าระบบ');
		return;
	}else{
		//console.log(txt);
		$.ajax({
			url:"../phpsv-ebooks/ADD_HeadNameBooks.php",
			method:"POST",
			data:{ad_data:txt.value},
			dataType:"json",
			success: function(Hnbk){
			//console.log(add);
			if(Hnbk != null){
			for(var i=0; i < Hnbk.length; i++){
				HTMLX += '<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id="trid_listhname" id1="'+Hnbk[i].id+'">';
				HTMLX +='<td class="td_more" >'+Hnbk[i].name+'</td>';
				$('.tb_HeadName').append(HTMLX);
				popup.style.display='none';	
			}	
				}
			
			}
		
		})
	}
}
//-----------------------------------------------------ฟังก์ชั่น   เมื่อคลิก รายการหัวเรื่องเพิ่มเติม จากหน้า popup
function Click_slc_listhname(dis){
	var eleLi = document.querySelectorAll('#liid_hname');
		for(var i =0; i <eleLi.length; i++){
			if(dis == eleLi[i]){
				eleLi[i].style.backgroundColor='#d1f9ed';
				localStorage.setItem('hdel', dis.getAttribute('id1'));
			}else{
				eleLi[i].style.backgroundColor='';
			}
		}
	
}
//-----------------------------------------------------ฟังก์ชั่น   เมื่อคลิก bnt  delete haedname more popup
function Click_Btn_dellisthname(){	
	var id = localStorage.getItem('hdel');
if(id == null){
	alert('กรุณาคลิกเลือกรายชื่อหัวเรื่องเพิ่มที่ต้องการ  delete');
	return;
}else{
		func_alertdelHname(id);	
	}
	
}
function func_alertdelHname(id){
	var elehname = document.querySelectorAll('#trid_listhname');
	var popup = document.getElementById('myModal-alert');
	var htxt = 'การลบรายการหัวเรื่องเพิ่มเติมผลต่อหนังสือที่ใช้หัวเรื่องเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelhane" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	// console.log(elehname);

	for(var i =0; i< elehname.length; i++){	
		if(elehname[i].getAttribute('id1') == id){	
			elehname[i].remove();
		}
	}
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	localStorage.removeItem('hdel');
	popup.style.display='block';
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelhane', function(){
		myFunc_Delete_HeadName(id);
	})
	
}
//-----------------------------------------------------ฟังก์ชั่น delete headnamemore ajax
function myFunc_Delete_HeadName(id){
	var popup = document.getElementById('myModal-alert');
	var data = '';
				$.ajax({
						url:"../phpsv-ebooks/Del_HeadNamebooks.php",
						method:"POST",
						data:{idHName:id},
						dataType:"text",
						success: function(del){
							//console.log(del);						
						localStorage.removeItem('hdel');
						popup.style.display ='none';
						Search_popup_HeadName(data);
							
						}
					})
				
			
			
		
	}
function Click_Btn_delipt_ablum(){
	var idblink = document.getElementById('ipt-nbk').getAttribute('id1');
	var idalbum = document.getElementById('ipt-album');
	var	id = idalbum.getAttribute('id1');
		console.log(id);		
	$.ajax({
		url:"../phpsv-ebooks/del_btnalbum.php",
		method:"POST",
		data:{idblink:idblink,idalbum:id},
	})
	idalbum.removeAttribute('id1');
	idalbum.value='';	
}
function Click_Btn_delipt_pubhlis(){
	var idblink = document.getElementById('ipt-nbk').getAttribute('id1');
	var idpuphis = document.getElementById('ipt-publisher');	
	$.ajax({
		url:"../phpsv-ebooks/del_btnpubhlish.php",
		method:"POST",
		data:{idblink:idblink},
	})
	idpuphis.removeAttribute('id1');
	idpuphis.value='';
}
function Click_Btn_delbtniptdpart(){
	var idblink = document.getElementById('ipt-nbk').getAttribute('id1');
	var iddpart = document.getElementById('ipt-department');
	var id = iddpart.getAttribute('id1');	
	$.ajax({
		url:"../phpsv-ebooks/del_btndpart.php",
		method:"POST",
		data:{idblink:idblink,id:id},
	})
	iddpart.removeAttribute('id1');
	iddpart.value='';
}

