// ---------------------------function  default----------------------------------
$(document).ready(function(){	
    document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
     CalendarThai_status();        
     Func_Check_Login();
     myFuncSearch_namebook(); 
	 show_btn_right();	
 });
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
     } else if (dis.id == 'recutbooks') {
		location.href = "../assets/recutBooks.php";
	} else {
		stop;
	}
     // location.href = "index.php";
 }	
 // ------------------------ฟังก์ชั่น Tab page ลงทะเทียน / สำเนา-----------
 document.getElementById("btn-regisebk").click();
 function myTabClick_regisebooks(elm, dis, status){// console.log(dis);
     var btnregis = document.getElementById('btn-regisebk');
     var btncopy = document.getElementById('btn-copyregis');
     var btnbyname = document.getElementById('btn-iptbyname');   
     localStorage.setItem('idpg', status);	
         //เปลี่ยนหน้าได้
     // console.log(btnregis.classList.replace('btn-danger', 'btn-facebook'));	
     if(status == 'e1'){
         btnregis.classList.replace('btn-danger', 'btn-facebook');
         btncopy.classList.replace('btn-facebook', 'btn-danger');
         btnbyname.classList.replace('btn-facebook', 'btn-danger');
     }else if(status == 'e2'){
         // console.log(btncopy.classList[1]);
         btnbyname.classList.replace('btn-danger', 'btn-facebook');
         btncopy.classList.replace('btn-facebook', 'btn-danger');
          btnregis.classList.replace('btn-facebook', 'btn-danger');        
     }else if(status == 'e3'){
        btncopy.classList.replace('btn-danger', 'btn-facebook');
        btnbyname.classList.replace('btn-facebook', 'btn-danger');
        btnregis.classList.replace('btn-facebook', 'btn-danger');   
     }
     var tabcontent = document.getElementsByClassName('popcontent-regisebk');
     for(var i =0; i < tabcontent.length; i++){
         tabcontent[i].style.display='none';
         
     }
     document.getElementById(elm).style.display='block';
     show_btn_Menuright(status);   
 }
 function show_btn_Menuright(status){    
    var ele = document.querySelectorAll('.btn-dis');
  if(status =='e1'){
       ele[0].style.display='block';
       ele[2].style.display='block'; 
    }else if(status == 'e2'){
        ele[0].style.display='none';
        ele[1].style.display='block';
        ele[2].style.display='none';
    }else if(status == 'e3'){
        ele[0].style.display='block'; 
        ele[2].style.display='block';           
    }
 }
function show_btn_right(){
	var ele = document.querySelectorAll('.btn-dis');
	
	var eleatt = document.getElementsByClassName('btn-facebook')[0];
		if(ele != ''){
			if(eleatt.id == 'btn-regisebk'){
				ele[0].style.display='block';
				ele[1].style.display='block';
				ele[2].style.display='block';
			}else if(eleatt.id == 'btn-iptbyname'){
				ele[0].style.display='none';
				ele[1].style.display='block';
				ele[2].style.display='none';
			}else if(eleatt.id == 'btn-copyregis'){
				ele[0].style.display='block';
				ele[1].style.display='block';
				ele[2].style.display='block';
			}
		}
}
//  ----------------- func btn menu right ----------------------------------------
function myClickBtnRight(dis, data){
    var storage = localStorage.getItem('idpg');    
    var btnmenu = document.querySelectorAll('.btn-dis'); 
	var ipt = document.getElementsByClassName('show-all');
	var li = document.querySelectorAll('.tr_Litcopybook');
	var iptP2 = document.querySelectorAll('.dis-all-2');
	// console.log(data+'data-type');	
	// console.log(dis+'dis');
    if(storage == 'e1'){
        if(data == 'ad'){
            btnmenu.forEach((itembtn) =>{
				
            if(dis == itembtn){				
				// itembtn.style.background = 'rgb(6, 97, 88)';					
            }else{				
				// itembtn.style.display='none';
			}           
         })
         dis.addEventListener('click', func_popuplistbooks(dis));      
       	disable_btn_Tab();
        }else if(data == 'sav'){
			func_savNewrecordBook();
		}
		if(data == 'ed'){
			if(ipt[0].value != ''){
				
					if(dis.style.background == ''){	
						dis.style.background = 'rgb(6, 97, 88)';
						disable_btn_Tab();
						func_open_btnAndEnable();
					btnmenu.forEach((btnright) =>{
						if(btnright != dis){
							btnright.style.display ='none';
						}
					})				
					}else{
						//  console.log(' save edit');	
						dis.style.background = '';
						// editor
						// console.log('test-edit-btn-pg1');
						 func_savEditRecord();
						disable_btn_Tab();
						func_BTN_disbled();   
					}
				   
				}
			}else if(data == 'dl'){
				var ulli = document.querySelectorAll('.li_listSearchAd_right');
				ulli.forEach((li_right)=>{
					if(li_right.style.background =='rgb(209, 249, 237)'){
						// console.log('test-del');
						func_popupAlertDel_regisbk(li_right.getAttribute('id1'));
					}
				})
				
			}
            
    }else if(storage == 'e2'){
		var txtidlink = document.getElementById('txt-id-link').value;
		if(txtidlink != ''){
				
			if(dis.style.background == ''){	
				// console.log(dis.style.background);			
				dis.style.background = 'rgb(6, 97, 88)';
				disable_btn_Tab();
				func_EnableIputBTN_2();			
				btnmenu.forEach((btnright) =>{
				if(btnright != dis){
					btnright.style.display ='none';
				}
			})				
			}else{
				var iptall = document.querySelectorAll('.savedit-2');
				// console.log(iptall[0].value);
				if(iptall[0].value == ''){
					popupDuplicate('กรุณาคีย์หมวดหมู่หนังสือ');
					return false;
				}else if(iptall[1].value == ''){
					popupDuplicate('กรุณาคีย์เลขผู้แต่ง');
					return false;
				}else{
					// console.log('test-edit-btn-pg2');
					saveEdit_2();
					//  console.log(' save edit');	
					dis.style.background = '';
					// editor				
				}
			}		   
		}		
    }else if(storage == 'e3'){
		var idlink_txt = document.getElementById('ipt-linkebook').value;
		
		if(data == 'ad'){
			// console.log(iptP2[0].value+"//"+iptP2[1].value);
			if(iptP2[0].value !='' && iptP2[1].value !=''){ /// ตรวจสอบเลขผู้แต่งก่อนเปิดปอบอัพ
				if(idlink_txt != ''){
					//  console.log('test-xxx');
						dis.style.background = 'rgb(6, 97, 88)';
						// func_ClearIput_p3();
						 popupAuto_barcode();
						btnmenu.forEach((btnright) =>{
						if(btnright != dis){
							btnright.style.display ='none';
						}					
					})	
			}
			}else{
				popupDuplicate("กรุณากรอกเลขผู้แต่งและหมวดหนังสือในหน้า 'ลงรายการ' ก่อนเพิ่มรายการ");
			}			
        }else if(data == 'ed'){	
			// console.log(dis.getAttribute('data-type')+'txt');	
			li.forEach((item)=>{
				if(item.style.background == 'rgb(209, 249, 237)'){
					if(dis.getAttribute('data-type') == 'on'){
						// console.log(dis.getAttribute('data-type'));
						if(iptP2[0].value !='' && iptP2[1].value !=''){
							func_p3_editor();
							dis.style.background = 'rgb(6, 97, 88)';
							// console.log('edit');
							dis.setAttribute("data-type", "off");
							btnmenu.forEach((btnright) =>{	
								if(btnright != dis){
									btnright.style.display ='none';
								}
							})
						}		
												
					}else{
						//  console.log('test-edit-btn-pg3');
						save_editor_p3()	
						dis.style.background = '';					
						dis.setAttribute("data-type", "on");
						// console.log('save');
						btnmenu.forEach((btnright) =>{	
							if(btnright != dis){
								btnright.style.display ='block';
							}
						})				
					}
				}
			})
						
		}else if(data == 'dl'){
			li.forEach((li)=>{
				if(li.style.background =='rgb(209, 249, 237)'){
					// console.log('test-del');
					func_popupAlertDel(li.getAttribute('id1'));
				}
			})
			
		}else if(data == 'sav'){
			// console.log('test-save-new-btnsav');
			dis.style.background = '';		
			save_newcopybooks();
		}
            
    }
}
//-------------------------------------------- ฟังก์ชั่นตรวจสอบหน้าก่อนเลือกระบบ delete  list
function Btn_deleteListbooksAll(){
	// console.log('test-delregis');
	var storage = localStorage.getItem('idpg'); 
	if(storage == 'e3'){
		// ลบหน้า copy
		del_pageCopyList();
	}else if(storage == 'e1'){

		del_regisbooks();// ลบหน้า regisbooks
	}   
}
function del_regisbooks(){
	const idlink = document.getElementById('h5-txtshow');
	var pop = document.getElementById('myModal-alert');		
	var txt = document.querySelectorAll('.clear-all');
	// console.log(idlink.innerText);
	var vals='';
	var idLinkbook = '';
	$.ajax({
	  url:"../phpsv/delete_Regis.php",
	  method:"POST",
	  data:{idlink:idlink.innerText},
	  dataType:"text",
	  beforeSend:function(){
		active_loadprograssBar();
	txt.forEach((item)=>{
		item.value='';
	})	
	},
	  success: function(data){
				// console.log(data);
				var progressValue =0;
				var speed =5;
				var progress = setInterval(function(){
				progressValue ++;
				loadprogress(progress, progressValue);	
				idlink.innerText='';
				showloadData_ajaxbook(vals, idLinkbook);
				pop.style.display='none';
			}, speed)	
		  }
	})
	pop.style.display='none';
}
//--------------------------------------------send ajax delete page copy
function del_pageCopyList(){
	var pop = document.getElementById('myModal-alert');	
	const barcode = document.getElementById('h5-txtshow');
	var txt = document.querySelectorAll('.clear-all-txt');

	var idLINK= document.getElementById('ipt-linkebook').value;
	$.ajax({
		url:"../phpsv/delete_registb.php",
		method:"POST",
		data:{bCode:barcode.innerText},
		dataType:"text",
		beforeSend:function(){
			active_loadprograssBar();
		txt.forEach((item)=>{
			item.innerText='';
		})	
		},	
		success: function(data){			
			// console.log(data);
			var progressValue =0;
					var speed =5;
					var progress = setInterval(function(){
					progressValue ++;
					loadprogress(progress, progressValue);	
					Myfunc_P3COPY(idLINK);											
					disable_alliput();
					show_btn_right();						
					barcode.innerText='';
					pop.style.display='none';
								
				}, speed)
			}
	})
		

}
//--------------------------------------------popup show barcode after delete
function func_popupAlertDel(bcode){
	var pop = document.getElementById('myModal-alert');	
	var hedtxtalert = 'คำเตือน!!!';
	var htxt = 'กรุณาตรวจสอบก่อนทำการลบรายการ';
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDel" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
		pop.style.display='block';
		document.getElementById('idlgend').innerText = hedtxtalert;
		document.getElementById('spnamedel').innerHTML= htxt;
		document.getElementById('item_btnshow').innerHTML= btntxt;
		document.getElementById('h5-txtshow').innerText=bcode;
}
//--------------------------------------------popup show Linkbooks after delete
function func_popupAlertDel_regisbk(bcode){
	var pop = document.getElementById('myModal-alert');	
	var tb =  document.querySelectorAll('.tr_Litcopybook');
	var htxt ='';
	console.log(tb.length);
	var hedtxtalert = 'คำเตือน!!!';
	var htxt = '';
	var btntxt = '';
		pop.style.display='block';
		
			htxt = 'กรุณาตรวจสอบเลขทะเบียนรายการและหน้าสำเนารายการก่อนทำการลบ!!!!';
			btntxt = '<button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-yesDel" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
		
		document.getElementById('idlgend').innerText = hedtxtalert;
		document.getElementById('spnamedel').innerHTML= htxt;
		document.getElementById('item_btnshow').innerHTML= btntxt;
		document.getElementById('h5-txtshow').innerText=bcode;
}
$(document).on('click', '.close-btnalert', function(){
	var pop = document.getElementById('myModal-alert');	
	pop.style.display='none';
	// console.log('test-close');
})
function ajax_AutoEditbarCode(iptEditbcode){
		const date = new Date();
		let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
		var popup = document.getElementById('boxModal_popEditBcode');
		var newbcode = document.getElementById('ipt-ebarcode-p2').value;
		bcodecut = iptEditbcode.substr(0, 1);
	$.ajax({
		url:"../phpsv/Auto_editbarcode.php",
		method:"GET",
		data:{idcode:iptEditbcode,newbcode:newbcode},
		dataType:"json",
		success:function(data){
				// console.log(data);					
			for(var m =0; m < data.length; m++){
				if(data[m].str == 'st1'){
						document.getElementById('txt-alertEditcode').innerText = data[m].maxid;
						document.getElementById('txt-alertEditlb').innerText = "เลขบาร์โค้ดซ้ำ กรุณาใช้เลขที่ระบบแนะนำ";
						return;
				}else{					
					document.getElementById('ipt-ebarcode').value = data[m].maxid;
					popup.style.display ='none';
					func_showbtn_saveAdd();
					func_nondisplay_btnRight();	
				}
			}
			// refresh table ลงทะเบียน
			// func_showbynumAndnumcat();
			localStorage.setItem('cdeauto', iptEditbcode);
			func_slc_type(bcodecut);
			func_showbynumAndnumcat();	
			document.getElementById('ipt-dateebok').value= day+'-'+month+'-'+year;			
			popup.style.display ='none';			
			disable_btn_Tab();
			
		}
		
	})
}
//----------------------------------------------- popup Auto editor barcode 
function popupAuto_Editbarcode(){	
	//  console.log('test-popup');
	var popup = document.getElementById('boxModal_popEditBcode');	
	var barCode = localStorage.getItem('cdeauto');	
	var iptbcode = document.getElementById('iptEditBcode');	
	var numBer,numfive,strsub,slice,num,psintsum,sting,substrnum, bcodecut;
	if(barCode != null){	
	var toupcase = barCode.toUpperCase();
	strsub =  toupcase.substr(0, 1); //F
	// console.log(month);	

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
}
function disable_btn_Tab(){ 
	//  console.log('test-disabled');
    var ele = document.querySelectorAll('.btn-tab');   
    ele.forEach((item)=>{
			
		//  console.log(item.disabled);
    if(item.disabled == true){
			//  console.log('remove');
            item.removeAttribute('disabled');            
        }else if(item.disabled == false){
			// console.log('create');
            var att = document.createAttribute('disabled');
            item.setAttributeNode(att);
        }
       
    })
}
//----------------------------------------------- save edit copy
function save_editor_p3(){
	//  console.log('test-save-edit');
	var arript = new Array();
	var btn_edit = document.getElementsByClassName('btn_disabletwo')[0];
	var att = document.createAttribute('disabled');
	var arr_ipt = document.querySelectorAll('.show-all-p3');
	arr_ipt.forEach((item)=>{
		arript.push(item.value);
	})
	//   console.log(arript);
	btn_edit.setAttributeNode(att);	
	disAndEnableIput_p3();	
	$.ajax({
		url:"../phpsv/Save_edit_pcopy.php",
		method:"POST",
		data:{jdata:arript},
		cache: false,
		dataType:"text",
		beforeSend:function(){
			active_loadprograssBar();
		},		
		success: function(val){
	//  console.log(val);
					var progressValue =0;
					var speed =5;
					var progress = setInterval(function(){
					progressValue ++;
					loadprogress(progress, progressValue);												
					disable_alliput();
					
					show_btn_right();					
				}, speed);
			}
	
	})
	 disable_btn_Tab();
}

function func_p3_editor(){
	var btn_edit = document.getElementsByClassName('btn_disabletwo')[0];
	btn_edit.removeAttribute('disabled');
	disAndEnableIput_p3();
	 disable_btn_Tab();
}
//----------------------------------------------- select listh table  
function myFuncSeletListCode(dis){
	var stut = 'ok';
	var li = document.querySelectorAll('.tr_Litcopybook');
	var btn_right = document.querySelectorAll('.btn-dis')
	btn_right.forEach((btnr)=>{
		// console.log(btnr.style.background);
		if(btnr.style.background=='rgb(6, 97, 88)'){
			stut = 'no';
		}
	})
	if(stut != 'no'){
		li.forEach((item)=>{
			// console.log(item.style.background);
			if(item == dis){
				item.style.background ='#d1f9ed'; //rgb(209, 249, 237)
				show_detailCopy(item.getAttribute('id1'));
			}else{
				item.style.background ='';
			}
		})
	}	
}
//----------------------------------------------- select  and show detail copy page3
function show_detailCopy(barcode){
	var iput = document.querySelectorAll('.show-all-p3');
	// console.log(iput);
	$.ajax({
		url:"../phpsv/Showcopybkdtail.php",
		method:"POST",
		data:{bcode:barcode},
		dataType:"json",
		success: function(data){
		//  console.log(data);
			iput[0].value = data[0].BARCODE;
			iput[1].value = data[0].LOANSTATUS;
			iput[2].value = data[0].CODE_REGIS;
			iput[3].value = data[0].dat_regis;
			iput[4].value = data[0].CATBOOK;
			iput[5].value = data[0].byauthor;
			iput[6].value = data[0].COPPYNUM;
			iput[7].value = data[0].status_text;
			iput[8].value = data[0].txt_memo;
			iput[9].value = data[0].Price;
			iput[10].value = data[0].SUPCODE;
			iput[11].value = data[0].STWORK;
			if(data[0].department == null){				
			}else if(data[0].department == "0") {				
			}else{
				iput[12].value = data[0].department;
			}
			if( data[0].Centimeters != null){			
				iput[13].value = data[0].Centimeters;
			}else{
				iput[13].value = "";
			}
			
		// console.log( data[0].Centimeters+'กลุ่มงาน'+data[0].department);		
			
			
		}})
}
//----------------------------------------------- save new copybooks  ajax
function save_newcopybooks(){
	// console.log('test');
	var btn_save = document.getElementById('sav_btnid');
	var inputs = document.querySelectorAll('.show-all-p3');
	var idlbink = document.getElementById('ipt-linkebook').value;
	var btnright = document.querySelectorAll('.btn-dis');
	var btnedit = document.getElementById('edit_btnid');
	var btnedit_code = document.getElementsByClassName('btn-addebarcode')[0];
	var arrtxt = new Array();
	// console.log(inputs);
	inputs.forEach((item)=>{
		arrtxt.push(item.value);
	})
	//   console.log(arrtxt);
	if(arrtxt[1] == ''){
		popupDuplicate('กรุณาเลือกประเภทหนังสือ');
		return;
	}else if(arrtxt[4] == ''){
		popupDuplicate('หมวดหมู่?????');
		return;
	}else if(arrtxt[5] == ''){
		popupDuplicate('เลขผู้แต่ง:????');
		return;
	}else if(arrtxt[9] == ''){
		popupDuplicate('ราคา:???');
		return;
	}else if(arrtxt[10] == ''){
		popupDuplicate('ผู้จำหน่าย:???');
		return;
	}
	
$.ajax({
		url:"../phpsv/addNewcopybook.php",
		method:"POST",
		data:{'arr_txt':arrtxt},
		dataType:"text",
		beforeSend:function(){
			active_loadprograssBar();
		},												
		success: function(data){
			// console.log(data);
		var progressValue =0;
							var speed =5;
							var progress = setInterval(function(){
							progressValue ++;
							loadprogress(progress, progressValue);	
							Myfunc_P3COPY(idlbink);							
							disable_alliput();
							show_btn_right();
							btnedit.setAttribute('data-type' , 'on');
							btn_save.style.display='none';
							btnedit_code.disabled=true;
							
							func_ClearIput_p3();										
			}, speed);		
			// console.log(data);
		}
	})
	btnright.forEach((item)=>{
		item.style.background='';
	})
	disable_btn_Tab();
}
function ajax_AutobarCode(iptbcode){
	var idlink = document.getElementById('ipt-linkebook').value;
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');	
	var w = new Date();
	var year = w.getFullYear();
	var month = w.getMonth()+1;		
	var numOfDay = w.getDate();
	bcodecut = iptbcode.substr(0, 1);
	// console.log(idlink);
	if(idlink !=""){
		$.ajax({
			url:"../phpsv/AdAutoBCode.php",
			method:"POST",
			data:{idcode:iptbcode,idlink:idlink},
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
						popup.style.display ='none';
						func_showbtn_saveAdd();
						func_nondisplay_btnRight();	
					}
				}
				// refresh table ลงทะเบียน
				// func_showbynumAndnumcat();
				localStorage.setItem('cdeauto', iptbcode);
				func_slc_type(bcodecut);
				func_showbynumAndnumcat();
				Myfunc_P3COPY(idlink); 
				document.getElementById('txt-alertcode').innerText = "";
				document.getElementById('ipt-ebarcode-p2').value = iptbcode;
				document.getElementById('ipt-dateebok').value= year+"-"+month+"-"+numOfDay;			
				popup.style.display ='none';
			 disable_btn_Tab();
			 disAndEnableIput_p3();
			}
			
		})
	}else{
		popupError('ไม่พบเลขทะเบียน กรุณารีเซตโปรแกรมแล้วทำการเพิ่มข้อมูลใหม่อีกครั้ง');
	}
	
}
//----------------------------------------------- popup Auto barcode books
function popupAuto_barcode(){	
	// console.log('test-popup');
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');	
	var barCode = localStorage.getItem('cdeauto');
	var iptbcode = document.getElementById('iptKeybcode');
	var numBer,numfive,strsub,slice,num,psintsum,sting,substrnum, bcodecut;
	// console.log(barCode);
	if(barCode != null){	
	var toupcase = barCode.toUpperCase();
	strsub =  toupcase.substr(0, 1); //F		
//  console.log(iptbcode.value);
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
	
}
function func_nondisplay_btnRight(){
	var ele = document.querySelectorAll('.btn-dis');
	ele.forEach((item)=>{
		item.style.display='none';
	})
}
function func_showbtn_saveAdd(){	
 var btn_savnew = document.getElementById('sav_btnid');
  if(btn_savnew.style.display=='block'){
	//  console.log('show display');
	btn_savnew.style.display='none';
  }else if(btn_savnew.style.display=='none'){
	//  console.log('none display');
	btn_savnew.style.display='block'
  }
}
// -----------------------------------ชุด ฟังก์ชั่น  check barcode to auto ประเภทหนังสือ
function func_slc_type(bcodecut){
	// console.log(bcodecut);
	var slc_ele =document.getElementById('slc-typebooks-p3');
	let optionNames = Array.from(document.getElementById('slc-typebooks-p3').options).map(option => option.value)
	optionNames.forEach((item)=>{
		if(bcodecut == item){
			// console.log(item);
			slc_ele.value =item;
		}
	})
}
//-----------------------------------------------check  เช็ค ผู้แต่งกับ หมวดหนังสือว่าคีย์แล้วหรือยัง
function func_showbynumAndnumcat(){
	var ele = document.querySelectorAll('.show-all');
	var iput_p3 = document.querySelectorAll('.show-all-p3');
	// console.log(ele[11].value);
	const bynum = ele[12].value;
	const catnum = ele[11].value;
	if(bynum != '' && catnum !=''){
		iput_p3[4].value =catnum;
		iput_p3[5].value= bynum;
		iput_p3[7].value= "C";
	}else{
		iput_p3[7].value= "A";
	}
	iput_p3[6].value="0";
	iput_p3[11].value="0";
}
//-----------------------------------------------สำหรับ  disabled all input and btn 
function disable_alliput(){
	// console.log('test-disabled');
	var ele = document.querySelectorAll('.dis-all-p3');
		ele.forEach((div)=>{
			var att = document.createAttribute('disabled');
			div.setAttributeNode(att);
		// console.log('false');
		})
}
function disAndEnableIput_p3(){
	// console.log('test-disabled');
	var ele = document.querySelectorAll('.dis-all-p3');
	var iput = document.querySelectorAll('.show-all-p3');
	// console.log(iput);
	if(iput[6].disabled == true){
		// console.log('true');
		ele.forEach((item)=>{
			item.removeAttribute('disabled');
		})		
	}else{
		ele.forEach((div)=>{
			var att = document.createAttribute('disabled');
			div.setAttributeNode(att);
		// console.log('false');
		})
		
	}
}
function func_ClearIput_p3(){
	var iput = document.querySelectorAll('.show-all-p3');
	iput.forEach((item)=>{
		item.value='';
	})
}
//  ----------------- func  save edit page 2----- part 1---------------------------------
function saveEdit_2(){
	var ipt = document.querySelectorAll('.savedit-2');
	var idlink = document.getElementsByClassName('ipt-idlink')[0].value;	
	var Hname = document.querySelectorAll('.tr_Headname');
	var Nmore = document.querySelectorAll('.tr_Namemore');
	var arript = new Array();
	var arrhname = new Array();
	var arrnmore = new Array();
	ipt.forEach((iput)=>{
		arript.push(iput.value);
	})
	Hname.forEach((tdhname)=>{
		arrhname.push(tdhname.getAttribute('id1'));
	})
	Nmore.forEach((tdNmore)=>{
		arrnmore.push(tdNmore.getAttribute('id1'));
	});	
	console.log(arript);
	send_ajaxsavEdit_2(idlink, arript, arrhname, arrnmore);
}
function  send_ajaxsavEdit_2(idlink, arript, arrhname, arrnmore){
	console.log(arript);
	$.ajax({
		url:"../phpsv/update_inserList.php",
		method:"POST",
		data:{idlink:idlink,arript:arript,arrhname:arrhname,arrnmore:arrnmore},
		beforeSend:function(){
			active_loadprograssBar();
		},													
		success: function(call){
			//  console.log(call);
			disable_btn_Tab();
			func_BTNINPUT_disbled_2();
			var progressValue =0;
							var speed =5;
							var progress = setInterval(function(){
							progressValue ++;
							loadprogress(progress, progressValue);										
			}, speed);		
				
		}
	})
}
function func_BTNINPUT_disbled_2(){
	var ele = document.querySelectorAll('.dis-all-2');
	ele.forEach((item)=>{
		var att = document.createAttribute('disabled');
		item.setAttributeNode(att);
	})


}
function func_EnableIputBTN_2(){
	var ipt = document.querySelectorAll('.dis-all-2');
	ipt.forEach((item)=>{
		item.removeAttribute('disabled');
	})
}
function addNewbooks_nosearch(){
	func_ClearInputAll();	
	var namebook = document.getElementById('ipt_popSearch_Addnewbooks');
	var ipt = document.querySelectorAll('.show-all');
	ipt[0].value =namebook.value;
}
//  ----------------- func  save edit page 1----- part 1---------------------------------
function  func_savEditRecord(){
	var iptall = document.querySelectorAll('.ipt-save');
	var byathor = document.querySelectorAll('.tr_Byathor');
	var pub_album = document.querySelectorAll('.ipt-atbsave');
	var idlink = document.getElementsByClassName('ipt-idlink')[0].value;	
	var arr_iptall= new Array();
	var arr_by = new Array();
	iptall.forEach((item)=>{
		 arr_iptall.push(item.value);
	})
	byathor.forEach((by)=>{
		arr_by.push(by.getAttribute('id1'));
	})
	pub_album.forEach((att)=>{
		arr_iptall.push(att.getAttribute('id1'));
	})
	if(arr_iptall[1] == ""){
		popupError('กรุณาเลือก GMD');
		return false;
	}else if(arr_iptall[3] == ""){
		popupError("กรุณากรอกข้อมูล พิมพ์ครั้งที่");
		return false;
	}else if(arr_iptall[4] == ""){
		popupError("กรุณากรอกข้อมูล ปีที่พิมพ์");
		return false;
	}else if(arr_iptall[5] == ""){
		popupError("กรุณากรอกข้อมูล ภาษา");
		return false;
	}else if(arr_iptall[6] == ""){
		popupError("กรุณากรอกข้อมูล บรรณาลักษณ์");
		return false;
	}else{		
		// console.log(arr_iptall);
	 sent_ajaxSaveEditregis(arr_iptall, arr_by, idlink);	
		
	}
}
function sent_ajaxSaveEditregis(arr_iptall, arr_by, idlink){	
		func_SavePicturNewEbooks(idlink);		
			$.ajax({
					url:"../phpsv/Update_editdetailbk.php",
					method:"POST",
					data:{idlink:idlink,arr_input:arr_iptall,arr_byathor:arr_by},					
					beforeSend:function(){
						active_loadprograssBar();
						  },															
					success: function(call){
						// console.log(call);
							var progressValue =0;
							var speed =5;
							var progress = setInterval(function(){
							progressValue ++;
							loadprogress(progress, progressValue);										
						}, speed);		
					}
				})
	show_btn_right();		
}
//  ----------------- func browser file----------patr 1-----------------------------
function click_openbrowserFile(){
//  console.log('test');	
	var input = document.getElementById('upload_file');
	input.click();
	
}

//  ----------------- func browser file------ part 2--------------------------------
function browser_adpicture(dis){	
		//  console.log(dis);
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

//  ----------------- func  check null input and save new record books---------------------------------------
function func_savNewrecordBook(){
	var iptall = document.querySelectorAll('.ipt-save');
	var byathor = document.querySelectorAll('.tr_Byathor');
	var pub_album = document.querySelectorAll('.ipt-atbsave');
	var btnmenu = document.querySelectorAll('.btn-dis');
	var btnsav = document.getElementsByClassName('tbn-savenewebk')[0];	
	var arr_iptall= new Array();
	var arr_by = new Array();
	iptall.forEach((item)=>{
		 arr_iptall.push(item.value);
	})
	byathor.forEach((by)=>{
		arr_by.push(by.getAttribute('id1'));
	})
	pub_album.forEach((att)=>{
		arr_iptall.push(att.getAttribute('id1'));
	})
	if(arr_iptall[1] == ""){
		popupError('กรุณาเลือก GMD');
		return ;
	}else if(arr_iptall[3] == ""){
		popupError("กรุณากรอกข้อมูล พิมพ์ครั้งที่");
		return;
	}else if(arr_iptall[4] == ""){
		popupError("กรุณากรอกข้อมูล ปีที่พิมพ์");
		return;
	}else if(arr_iptall[5] == ""){
		popupError("กรุณากรอกข้อมูล ภาษา");
		return ;
	}else if(arr_iptall[6] == ""){
		popupError("กรุณากรอกข้อมูล บรรณาลักษณ์");
		return ;
	}else{
		btnmenu.forEach((item)=>{
			item.style.background = '';
			item.style.display='none';			
		})
		// console.log(arr_iptall);
		btnsav.style.display='none';
		myFunc_Save_ADDNewbook_ajaxDetail(arr_iptall, arr_by);
		
	}
}
//----------------------------path 2---------------------ฟังก์ชั่น เซิฟการเพิ่มหนังสือเข้าระบบ ลงทะเบียนหนังสือใหม่ 	
function myFunc_Save_ADDNewbook_ajaxDetail(arr_iptall, arr_by){
	//console.log(author);
	var vals='', idLinkbook ='';
			$.ajax({
					url:"../phpsv/AddNewBook_detail.php",
					method:"POST",
					data:{arr_input:arr_iptall,arr_byathor:arr_by},
					dataType:"json",
					beforeSend:function(){
						active_loadprograssBar();
						  },																
					success: function(call){
						// console.log(call);
						var idlink = call.sucess;
						if(call != ''){
								if(idlink != ''){
										disable_btn_Tab();
										show_btn_right();
										func_BTN_disbled();
										func_SavePicturNewEbooks(idlink);
										showloadData_ajaxbook(vals, idLinkbook);
										var progressValue =0;
										var speed =5;
										var progress = setInterval(function(){
										progressValue ++;
										loadprogress(progress, progressValue);										
										}, speed);
								}
						}
					}
				})
}

//  ----------------- func btn menu right ----------------------------------------
function func_SavePicturNewEbooks(idlink){
		//  console.log(idlink);
		// console.log('test-func_SavePicturNewEbooks');
		var nameid = idlink;
		   var forData = new FormData();	
				   var file = document.getElementById('upload_file').files[0];			 
				 forData.append('file', file);
				   forData.append('filename', nameid);				 
						$.ajax({
								   url:"../phpsv-ebooks/InserTAddNewBooks.php",
								   method:"POST",
								   data:forData,
								   dataType:'text',
								   contentType:false,
								   processData:false,							 		   
								  
								})
	
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
}
function func_popuplistbooks(dis){
	var popup = document.getElementById('boxModal_popSearch_Addnewbooks');
   const idLinkbook = '';
   popup.style.display='block';	
	document.getElementById('exit-popup').onclick = function() {
		popup.style.display='none';
		dis.style.background='';
		disable_btn_Tab();
		show_btn_right();
	};    
   var txt_search ='';
   showPopuplistbooks_ajaxbook(txt_search);
   $(document).on('keyup', '#ipt_popSearch_Addnewbooks', function(e){
       if(e.keyCode == 13){
           var txt_search = document.getElementById('ipt_popSearch_Addnewbooks').value;		
           showPopuplistbooks_ajaxbook(txt_search, idLinkbook);
       }		
   })
}
 //-------------------------------------------ฟังก์ชั่นแสดงข้อมูลรายชื่อหนังสือ popup
 function showPopuplistbooks_ajaxbook(vals, idLinkbook){	
	//alert("showloadData_ajaxbook");
		var HTMLX ='';
		var idtxt ='';
		var ARR_success =[];
				$.ajax({
						url:"../phpsv/showLisSearchbook.php",
						method:"POST",
						data:{data:vals},
						dataType:"json",
						success: function(result){
						// console.log(result);
						if(result == null){
								stop;
								}else{
									for(i = 0; i < result.length; i++){
										ARR_success.push(result[i]);
										//console.log(result[1]);										
								if(idLinkbook != null){
									if(idLinkbook == result[i].IDLIKBOOK){
										//alert("showcolor");
										
											HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd" id1="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
											}else{
												
														HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
													
											}
									}else{	
									
										HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk(this)" class="li_listSearchAd" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
									
									
									}
									
								}
								
								$('.box_modal_iptSearch_Addnewbooks').html(HTMLX); 
							//console.log(HTMLX);
							}
						}
					});
				
} 
 //--------------------------------------------function  หน้าลงทะเบียนหนังสือ --------------------------------------------
function myFuncSearch_namebook(){
	
	var vals = document.getElementById('idipt_schregisbk').value;
	var idLinkbook ='';
	showloadData_ajaxbook(vals, idLinkbook);	
	$(document).on("keyup", '#idipt_schregisbk', function(e){
		if(e.keyCode == 13){
			//console.log(e.target.value);
			var vals = document.getElementById('idipt_schregisbk').value;
			showloadData_ajaxbook(vals, idLinkbook);
			}
		})
	$('#idipt_schregisbk').val("");
	
}
 //-------------------------------------------ฟังก์ชั่นแสดงข้อมูลผู้แต่งในตารางด้านขวาหน้าต่างลงทะเบียน 
function showloadData_ajaxbook(vals, idLinkbook){
	// console.log(vals);
	//alert("showloadData_ajaxbook");
		var HTMLX ='';
		var idtxt ='';
		var ARR_success =[];
				$.ajax({
						url:"../phpsv/showLisSearchbook.php",
						method:"POST",
						data:{data:vals},
						dataType:"json",
						success: function(result){
						//console.log(result);
						if(result == null){
								stop;
								}else{
									for(i = 0; i < result.length; i++){
										ARR_success.push(result[i]);
										//console.log(result[1]);										
								if(idLinkbook != null){
									if(idLinkbook == result[i].IDLIKBOOK){
										//alert("showcolor");
										
											HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk_right(this)" class="li_listSearchAd_right" id1="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
											}else{
												
														HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk_right(this)" class="li_listSearchAd_right" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
													
											}
									}else{	
									
										HTMLX += '<li ondblclick="myFuncClickSelect_Listnbk_right(this)" class="li_listSearchAd_right" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
									
									
									}
									
								}
								
								$('.regis_box_listserch').html(HTMLX); 
							//console.log(HTMLX);
							}
						}
					});
				
					$('.pic_regisbook').html("");					
				
				
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
                             window.location.href="../assets/lo-gin.php";	
                             
                             }
                     }
                 
                 
                 
                 })
                 
         }else{
                 window.location.href="../assets/lo-gin.php";	
                 
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
                     window.location.href="../assets/lo-gin.php";						
                     }else{
                         popupError("error Logout User");
                         
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

 // -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อหนังสือ popup
 function myFuncClickSelect_Listnbk(dis){
     // console.log(dis.id);
	document.getElementById('add_btnid').style.display='none';
	document.getElementsByClassName('btn-dis-ANBK')[0].style.display='block';
	              
	 var li = document.querySelectorAll('.li_listSearchAd');            
             li.forEach((item) =>{
				if(item == dis){
					item.style.background = '#d1f9ed';

					func_clear_clickright(dis.getAttribute('id1'));
					// func_showdetail_p1(dis.getAttribute('id1'));
					disable_btn_Tab();  
					document.getElementById('boxModal_popSearch_Addnewbooks').style.display='none';    
				}else{
					item.style.background='';
				}
             })
	 
 }
  // -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อหนังสือด้านขวาและแสดงผล
  function myFuncClickSelect_Listnbk_right(dis){
	var stut = 'ok';
    var li = document.querySelectorAll('.li_listSearchAd_right'); 
	var btn_right = document.querySelectorAll('.btn-dis')
	btn_right.forEach((btnr)=>{
		// console.log(btnr.style.background);
		if(btnr.style.background=='rgb(6, 97, 88)'){
			stut = 'no';
		}
	})
	if(stut != 'no'){
		li.forEach((item) =>{
			if(item == dis){
				item.style.background= '#d1f9ed';
				var idlink = item.getAttribute('id1');
				func_clear_clickright(idlink)
			}else{
				item.style.background= ''; 
			}
		})           
  
	}  
}
function func_clear_clickright(idlink){
	var iput = document.querySelectorAll('.show-all');
	var iput_copy = document.querySelectorAll('.show-all-copy');
	var table = document.querySelectorAll('.tb-clear');
	var img = document.getElementById('pic_ebooks');
		img. src="../fileimage/nopicture.jpg";
	 document.getElementsByClassName('ipt-publisher')[0].removeAttribute('id1');
	 document.getElementsByClassName('ipt-albumset')[0].removeAttribute('id1');
	iput.forEach((item)=>{
		item.value='';
	})
	iput_copy.forEach((ele)=>{
		ele.value ='';
	})
	table.forEach((tb)=>{
		tb.innerHTML='';
	})
	subClickUpDataShow(idlink);
	clcik_show_album(idlink);
	func_Show_Byauthor(idlink);
}
// ------------------------- คลิกที่ปุ่มก๊อปปี้รายการ
function aDDNewCopyRegisbooks(){
	var ele = document.querySelectorAll('.btn-nonall');	
	document.getElementById("sav_btnid").style.display="block";
	ele.forEach((item)=>{
		item.style.display='none'
	})	
	func_open_btnAndEnable();
	disable_btn_Tab();
} 
function func_ClearInputAll(idlink){
	var iput = document.querySelectorAll('.show-all');
	var iput_copy = document.querySelectorAll('.show-all-copy');
	var table = document.querySelectorAll('.tb-clear');
	var img = document.getElementById('pic_ebooks');
	 document.getElementsByClassName('ipt-publisher')[0].removeAttribute('id1');
	 document.getElementsByClassName('ipt-albumset')[0].removeAttribute('id1');
	 img. src="../fileimage/nopicture.jpg";
	iput.forEach((item)=>{
		item.value='';
	})
	iput_copy.forEach((ele)=>{
		ele.value ='';
	})
	table.forEach((tb)=>{
		tb.innerHTML='';
	})
	func_showdetail_p1(idlink);
}
// ------------------------ dbclick select listbooks  and show detail books tab 1--------------
function func_showdetail_p1(idlink){
    // console.log(idlink);
    document.getElementById('boxModal_popSearch_Addnewbooks').style.display='none';
	const btn_dis = document.querySelectorAll('.btn-dis');
	 btn_dis.forEach((item)=>{
		item.style.display='none';
	 })    
    document.getElementById('sav_btnid').style.display='block'; 
    // open button And Enabled all  and show detail books 
  	subClickUpDataShow(idlink);
	clcik_show_album(idlink);
	func_Show_Byauthor(idlink);
    func_open_btnAndEnable();
}
//------------------------------------------------------------------------------------ฟังก์ชั่นแสดงข้อมูลในช่องinput หน้าดีเทล
function subClickUpDataShow(idLINK){
	//console.log(idLINK);
	//alert(ARR_success.length);
    const showall = document.querySelectorAll('.show-all');
    var attbup = document.createAttribute('id1');   
	$.ajax({
						url:"../phpsv/ClickShowDetail_regisbk.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function (data){ 
						// console.log(data);
                            subCheckFilepic(data[0].IDLIKBOOK);
                           showall[0].value= data[0].NAME_BOOK; //namebook 
                           showall[1].value= data[0].GMDCODE; //GMD 
                           showall[2].value= data[0].key_O; //ผู้รับชอบ
                           showall[3].value= data[0].key_E; //พิมครั้งที่
                           showall[4].value= data[0].Year_book; //ปีที่
                           showall[5].value= data[0].lang; //ภาษา
                           showall[6].value= data[0].pub+',...,'+data[0].pub_address; //สถานที่พิม
                           attbup.value = data[0].PUBCODE; //สถานที่พิม
                           showall[6].setAttributeNode(attbup); 
                           showall[8].value= data[0].COUNTPAGE; //บรรณาลัก]  
                           showall[9].value= data[0].ISBN; //isbn 
                           showall[10].value= data[0].IDLIKBOOK; //idlink  หน้า 2
                           showall[12].value= data[0].BYNUM; //เลขผู้แต่ง  
                           showall[11].value= data[0].Catbook_store; // หมวดหนังสือ
                           showall[13].value= data[0].IDLIKBOOK; // เลขทะเบียนหน้า3                           
						   mYfunc_ShowdataAdcatbook(data[0].IDLIKBOOK);   
						   Myfunc_P3COPY(data[0].IDLIKBOOK);                                           
                        }						
		});
						
}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา (รายการในช่อง สำเนา)   show table noshow detail 
function Myfunc_P3COPY(idLINK){		
	// console.log(idLINK);
	var HTML = '';
	
		$.ajax({
				url:"../phpsv/Showcopybook.php",
				method:"POST",
				data:{idLINK:idLINK},
				dataType:"json",
				success: function(data){
				//  console.log(data);
					if(data != null){
					//  clickTomyFunc_detail(data);
						for(var d =0; d<data.length; d++){
							//console.log(data[d].BARCODE);
							var brcode = data[d].BARCODE;
							HTML +='<tr class="tr_Litcopybook" id1="'+data[d].BARCODE+'" onClick="myFuncSeletListCode(this)">';
								HTML +='<td class="td_Litcopybook_bc">'+data[d].BARCODE+'</td>';
								HTML +='<td class="td_Litcopybook_cb">'+data[d].CATBOOK+'/'+data[d].byauthor+'</td>';
							HTML + '</tr>';
							}
						
						$('.tb_ListCopy').html(HTML);
						}else{
							$('.tb_ListCopy').html(HTML);
						}
					}
								
			})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา  part 1
function clickTomyFunc_detail(data){
	var CODE,idlink;
	var iput = document.querySelectorAll('.show-all-copy');
	idlink = data[0].IDLIKBOOK;
	CODE = data[0].BARCODE;
	iput[0].value = CODE;
	iput[1].value = data[0].LOANSTATUS;
	iput[2].value = data[0].CODE_REGIS;
	iput[3].value = data[0].Dat_regis;
	iput[4].value = data[0].CATBOOK;
	iput[5].value = data[0].byauthor;
	iput[6].value = data[0].COPPYNUM;
	iput[7].value = data[0].status_text;
	iput[9].value = data[0].Price_book;
	iput[10].value = data[0].SUPCODE;
	iput[11].value = data[0].STWORK;
	detail_memopart3(idlink, CODE);
}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา หมายเหตุ  part 3
function detail_memopart3(idlink, CODE){
	//console.log(dealer);
	//console.log(CODE);
	var MemoText ='';
		$.ajax({
					url:"../phpsv/ShowMemotext.php",
					method:"POST",
					data:{idlink:idlink,CODE:CODE},
					dataType:"json",
					success: function(Memo){
						if(Memo != null){ //12
							for(var txt = 0; txt < Memo.length; txt++ ){
								
								MemoText = Memo[txt].detail_athormain_tb;
								}
						}
						$('.txt-memo').val(MemoText);	
					}
				})
	
	}
//-----------------------------------------------------ฟังก์ชั่น เมื่อเลือกหน้าลงรายการ ให้แสดงดีเทลข้อมูลหัวเรื่อง
function mYfunc_ShowdataAdcatbook(IDLIKBOOK){  
    var HTMLS = '';

        //console.log(idlinks);   
        $.ajax({
                url:"../phpsv/Show_headname.php",
                method:"POST",
                data:{idlinks:IDLIKBOOK},
                dataType:"json",
                success: function(headbook){
                // console.log(headbook);
                    if(headbook != null){
                    for(var b =0; b < headbook.length; b++){
                        HTMLS +='<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id1="'+headbook[b].SUB_ID+'"><td class="td_more">'+headbook[b].album_name
                                +'</td></tr>';								
                        }
                    
                    $('.tb_HeadName').html(HTMLS);
                    }
                }
                })
     
        mYfunc_showdataAdmoreheadname(IDLIKBOOK);
}
//-----------------------------------------------------ฟังก์ชั่น แสดงรายการช่องหัวเรื่องเพิ่มเติม 
function mYfunc_showdataAdmoreheadname(idlinks){
	//console.log(idlinks);
	var HTMLX = '';
	var HTMLM = '';
		$.ajax({
					url:"../phpsv/Show_headnamemore.php",
					method:"POST",
					data:{idlinks:idlinks},
					dataType:"json",
					success: function(more){
						//console.log(more);
						if(more != null){
							
						for(var m =0; m < more.length; m++){							
							HTMLX +='<tr class="tr_Namemore" ondblclick="myClick_Namemore(this)" id1="'+more[m].SUB_ID+'"><td class="td_more">'+more[m].album_name
									+'</td>';
							}
						
						$('.tb_NameMore').html(HTMLX);
						}else{
							
							$('.tb_NameMore').html("");
							}
					}
					
					})
	
}
//------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงอัลบั้ม ชุดหนังสือ
function clcik_show_album(idLINK){
	// console.log(idLINK);
	var album = document.getElementsByClassName('ipt-albumset')[0];
	// console.log(album);
	var HTMLX='';
	var HTMLID='';
		$.ajax({
						url:"../phpsv-ebooks/showAlbum.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(data_txt){
							// console.log(data_txt);
							if(data_txt != null){
								
								for(var it =0; it<data_txt.length; it++){
									
									HTMLX += data_txt[it].album_name;
									HTMLID = data_txt[it].id_album;
									}
									album.value =HTMLX;
									//console.log(HTMLX);
									var attalbum =document.createAttribute('id1');
										attalbum.value = HTMLID;
										album.setAttributeNode(attalbum);
								}
							}
						})
}
//-----------------------------------------------------ฟังก์ชั่นแสดงผู้แต่งหนังสือ หน้าลงทะเบียน	
function func_Show_Byauthor(idLINK){
	var HTMLBY = ""; 
		$.ajax({
				url:"../phpsv/ShowDataByauthorl.php",
				method:"POST",
				data:{idLINK:idLINK},
				dataType:"json",
				success: function(txt_by){
					// console.log(txt_by);
				if(txt_by != null){
							for(var i = 0; i < txt_by.length; i++){
								HTMLBY += '<tr class="tr_Byathor" id1="'+txt_by[i].LINKCODE+'" ondblclick="myFuncdbClickByname(this)"><td class="td_Byathor">'+txt_by[i].NAME_BY+'</td></tr>';
								//console.log(HTMLBY);
								}
                        }
					$('.tbody-list-byname').html(HTMLBY);
				}
			});
}
//-----------------------------------------------------ฟังก์ชั่น ดับเบิลคลิกเลือกรายการผู้แต่ง
function myFuncdbClickByname(dis){
    var qry_td = document.querySelectorAll('.tr_Byathor');
    qry_td.forEach((item)=>{
         if(item == dis){
           item.style.background ='#d1f9ed';        
         }else{
            item.style.background='';
         }
    })
}
//-----------------------------------------------------ฟังก์ชั่นคลิก ลบรายชื่อผู้แต่งหน้า ลงทะเบียน
function del_byname(){
	var idlink = document.getElementsByClassName('ipt-idlink')[0].value;	
    var qry_td = document.querySelectorAll('.tr_Byathor');
    qry_td.forEach((item)=>{      
       if(item.style.background =='rgb(209, 249, 237)'){
		if(idlink != ''){
			var idby = item.getAttribute('id1');
			myFunction_del_Byathor(idlink, idby);
			item.remove();
		}else{
			item.remove();
		}        
       }
    })
}
//--------------------------------------------------ฟังก์ชั่นคลิกที่ปุ่มเพื่อลบ ผู้แต่งในหน้าลงรายการ
function myFunction_del_Byathor(idlink, idby){
	if(idby != null){
		$.ajax({
				url:"../phpsv/delete_byauthor.php",
				method:"POST",
				data:{idbyauthor:idby,idlinks:idlink},
				dataType:"text",
				success: function(data){
					popupSuccess('ลบรายการสำเร็จ');
					}
			})
	}
}	
//-----------------------------------------------------ฟังก์ชั่นแสดง popup เพื่อเพิมรายชื่อผู้แต่ง	
function open_popupByname(){
    var popup = document.getElementById('boxModal_popSearch_byathor');
    popup.style.display='block';  
	var data = "";
	SearchAjax_byathor(data);
	$(document).on('click', '.close_popSearch_byathor',  function(){
		popup.style.display="none";
		})
	$(document).on('keyup', '.ipt_popSearch_byathor', function(){
		var data = $(this).val();		
	SearchAjax_byathor(data);
})
}
//-------------------------------------------------ฟังก์ชั่น เพิ่มผู้แต่ง popup-----
function add_byathor(){
    const txt_sch = document.getElementById('ipt_popSearch_byathor');
    const txtValue = txt_sch.value;
	var HTML ='';
	if(txtValue != ''){
		//console.log(val);
		$.ajax({
				url:"../phpsv/Add_byathor.php",
				method:"POST",
				data:{val:txtValue},
				dataType:"text",
				success: function(result){
					// HTML += '<tr class="tr_Byathor"><td class="td_Byathor" id="'+result+'">'+Byathor_name+'</td></tr>';
                    HTML += '<tr class="tr_Byathor" id1="'+result+'" ondblclick="myFuncdbClickByname(this)"><td class="td_Byathor">'+txtValue+'</td></tr>';
					//console.log(HTML);
					$('.tbody-list-byname').append(HTML);
					}
			
			})
			
			txt_sch.value='';
		    var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_byathor');
	        boxpopSearch_Puphlish.style.display="none";
			
		}
		
	
}

//-------------------------------------------------ฟังก์ชั่น แสดงข้อมูลใน popup search by athor------	
function SearchAjax_byathor(data){
	// console.log(data);
		var HTML_athor ="";
			$.ajax({
					url:"../phpsv/Search_byathor.php",
					method:"POST",
					data:{data:data},
					dataType:"json",
					success: function(result){
					// console.log(result);
						if(result != null){
							for(var i = 0; i < result.length; i++){
									HTML_athor += '<li ondblclick="myFuncClickPop_byname(this)"  id1="'+result[i].LINKCODE+'" class="li_byathor">'+result[i].NAME_BY+'</li>';									
								}
							}
						//alert(dataathor.length);
						//console.log(HTML_athor);
					$('.boxmodal_list_user_byathor').html(HTML_athor);	
						}
						
				})			
}
//-----------------------------------------------------ฟังก์ชั่น dbl เลือกรายชื่อผู้แต่งหน้า popup
function myFuncClickPop_byname(dis){
    var popup = document.getElementById('boxModal_popSearch_byathor');
    popup.style.display='none'; 
    var idbyname = dis.getAttribute('id1');
    var txt = dis.innerText;  
    var HTML = '';
    HTML += '<tr class="tr_Byathor" id1="'+idbyname+'" ondblclick="myFuncdbClickByname(this)"><td class="td_Byathor">'+txt+'</td></tr>';
    //console.log(HTML);
    $('.tbody-list-byname').append(HTML);
}
//-----------------------------------------------------ฟังก์ชั่นคลิก เลือกรายชื่อผู้แต่งหน้า popup and delete
function select_lispopbyname(dis){
    // console.log(dis);
    var liele = document.querySelectorAll('.li_byathor');
    liele.forEach((item) =>{
        if(item == dis){
            item.style.background='rgb(209, 249, 237)';
        }else{
            item.style.background='';
        }
    })


}
//-----------------------------------------------------ฟังก์ชั่นคลิก เลือกลบรายชื่อผู้แต่งหน้า popup
function del_byathor(){
    var qry_li = document.querySelectorAll('.li_byathor');
    qry_li.forEach((item) => {
        if( item.style.background== 'rgb(209, 249, 237)'){         
            myFunc_Delete_byathor(item.getAttribute('id1'));
        }else{
            item.style.background='';
        }
    })
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function myFunc_Delete_byathor(idbyname){
	var data = '';	
				$.ajax({
						url:"../phpsv/Del_byathor.php",
						method:"POST",
						data:{val:idbyname},
						dataType:"text",
                        success:function(txt){
                            SearchAjax_byathor(data);
                        }
                        
					})				           
			
			$('.ipt_popSearch_byathor').val("");
		
}
//------------------------------------------------------------------ฟังก์ชั่น ตรวจสอบมีรูปภาพหนังสือหากมีให้โชว์ในหน้าดีเทล	 
function subCheckFilepic(IDLIKBOOK){
//    console.log(IDLIKBOOK)
var numR = Math.random();
    var img = document.getElementById("pic_ebooks");
                    $.ajax({
                            url:"../phpsv/checkpicture.php",
                            method:"POST",
                            data:{data:IDLIKBOOK},
                            dataType:"json",
                            success: function (result){   
								// console.log(result);                     
                                if(result == null){
                                    stop;
                                    }else{
                                        if(result.stut == 1){											
                                                
                                                 img.src= '..'+/COVERIMAGES/+''+result.idlink+'.jpg?v='+numR+'';
                                                 //console.log(img);
                                                 
                                                    //$('.pic_regisbook').html('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+result.isbnbook+'.jpg">');
                                                }
                                        }                             
                                }
                            
                            });
                            
        
 }
//------------------------------ Enabled btn all tab 1-----
function func_open_btnAndEnable(){    
    const allinput = document.querySelectorAll('.dis-all');
    allinput.forEach((item) =>{
        item.removeAttribute('disabled');
    })
}
//------------------------------ disabled all  btn all tab 1-----
function func_BTN_disbled(){    
    const allinput = document.querySelectorAll('.dis-all');	
    allinput.forEach((item) =>{
		const off = document.createAttribute('disabled');
        item.setAttributeNode(off);
    })
}
//--------------------------- show pubhlish popup
function add_publisher(){
    var popup = document.getElementById('boxModal_popSearch_Puphlish');
    popup.style.display='block';
    var data = "";
	 KeyUpADD_puphlish(data);
	 document.getElementsByClassName('close_popSearch_Puphlish')[0].onclick = function(){
		popup.style.display="none";
		// console.log('test-click');
	 };
	
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
							
							HTMLX += '<li  class="li_puphlish"  ondblclick="myFuncSLC_pubhlish(this)" id1="'+puphlish[i].PUBID_tb+'">'+puphlish[i].PUBNAME+';.....,'+puphlish[i].PUBADRESS+'</li>';
							
							
							}
						HTMLX +='</ul>';
						
						}
				
					$('.boxmodal_list_user_Puphlish').html(HTMLX);
					//console.log(HTMLX);
					
					}
			
			})	
}
//-------------------------------------------------------------ฟังก์ชั่น  dubleclick select list popup publisher
function myFuncSLC_pubhlish(dis){
	// var btns = document.querySelectorAll('.li_puphlish');
	var popup = document.getElementById('boxModal_popSearch_Puphlish');
	var ipt_pubh = document.getElementsByClassName('ipt-publisher');
	var att_id1 = document.createAttribute('id1');	
	var id = dis.getAttribute('id1');
	var txt_pub = dis.innerText;
	//  console.log(id);
		ipt_pubh[0].value = txt_pub;
		att_id1.value= id;
		ipt_pubh[0].setAttributeNode(att_id1);
		popup.style.display = 'none';

}
//-------------------------------------------------------------ฟังก์ชั่น  delect element publisher  หน้าลงทะเบียน
function del_publisher(){
    var ipt_pubh = document.getElementsByClassName('ipt-publisher');
     ipt_pubh[0].value=''
     ipt_pubh[0].removeAttribute('id1');
}
//-------------------------------------------------------------ฟังก์ชั่น  click select list publisher
function select_publisher(dis){
    var ele = document.querySelectorAll('.li_puphlish');
    ele.forEach((item)=>{
        if(item == dis){
            item.style.background='rgb(209, 249, 237)';
        }else{
            item.style.background='';
        }
    })
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function btnpopup_delpubliser(){
    var ele = document.querySelectorAll('.li_puphlish');
    var idpub,txt;
    ele.forEach((item)=>{
        if(item.style.background== 'rgb(209, 249, 237)'){
            txt = item.innerText;
            idpub = item.getAttribute('id1');
            func_alert_pubphlis(idpub, txt);
        }
    })
}
function func_alert_pubphlis(idpub, txt){
	var popup = document.getElementById('myModal-alert');
    var txthead = document.getElementById('txt_headname');	
	var htxt = 'การลบรายการ "สำนักตีพิมพ์" อาจส่งผลกระทบต่อทะเบียนหนังสืออื่นที่ใช้ข้อมูลสำนักตีพิมพ์เดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelpubphlish" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	txthead.innerText=txt;
    popup.style.display='block';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelpubphlish', function(){
		del_pubhlish_ajax(idpub);	
		popup.style.display='';
	})
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function del_pubhlish_ajax(idpub){
		var data = "";
				$.ajax({
						url:"../phpsv-ebooks/Del_Puphlish.php",
						method:"POST",
						data:{val:idpub},
						dataType:"text",
                        success:function(){
                            KeyUpADD_puphlish(data);	      
                        }
					})	
}	
//----------------------------------------------------------------ฟังก์ชั่น Addสำนักพิมพ์ใหม่เข้าระบบ
function btnpopup_addpubliser(){
    const pub = document.getElementById('idipt_sch_pubhlish');
    const location = document.getElementById('idipt_sch_province');
    var elepub = document.getElementsByClassName('ipt-publisher')[0];
	var HTML ='';
	var HTMLID = '';	
	if(pub.value == ""){
        popupError('!!!!..กรุณาใส่ชื่อสนักพิมพ์');
        return false;
	
	}
    if(location.value ==''){
        return;
    }
	
				$.ajax({
					url:"../phpsv/Add_Puphlish.php",
					method:"POST",
					data:{val:pub.value, loca:location.value},
					dataType:"json",
					success: function(result){
						//console.log(HTML);
						if(result != null){
							
							for(var ix =0; ix <result.length; ix++){
								
								HTMLID = result[ix].id;
								HTML = result[ix].name+'....,'+result[ix].location;
								//console.log(HTMLID);
								//console.log(HTML);
								}
                                elepub.value=HTML;
								var att = document.createAttribute('id1');
									att.value = HTMLID;
                                    elepub.setAttributeNode(att);
							}
						}
					})
					$('.ipt_sch_pubhlish').val("");
			        $('.ipt_sch_province').val("");		
					var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
						boxpopSearch_Puphlish.style.display="none";	
}
//----------------------------------------------------------------ฟังก์ชั่น แสดง popup album	
function btnpopup_addAlbum(){	
	var popup = document.getElementById('boxModal_popSearch_album');
	popup.style.display='block';
	var data = "";
	Myfunc_SearchAlbum(data);
	document.getElementsByClassName('close_popSearch_Puphlish')[0].onclick = function(){
		popup.style.display="none";
		// console.log('test-click');
	 };
		$(document).on('keyup', '#idipt_sch_album', function(){
            var data = $(this).val();
        //    console.log(data);
        Myfunc_SearchAlbum(data);
	})	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup search album and selecet list album
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
							HTMLX += '<li ondblclick="myFuncDBclick_slcalbum(this)"  id1="'+album[i].id_album
									+'" class="li_album">'+album[i].album_name+'</li>';
							}
						}
					$('.boxmodal_list_album').html(HTMLX);
					//console.log(HTMLX);
					}
			})
 $(document).on('this, click', '.li_album', function(){
		var eleLi = document.querySelectorAll('.li_album');
        eleLi.forEach((item)=>{
            if(item == this){
                item.style.background='rgb(209, 249, 237)';
            }else{
                item.style.background='';
            }
        })		
})
}
function myFuncDBclick_slcalbum(dis){
    var popup = document.getElementById('boxModal_popSearch_album');
    var ele = document.getElementsByClassName('ipt-albumset')[0];
    var att = document.createAttribute('id1');
    att.value = dis.getAttribute('id1');
    ele.value = dis.innerText;
    ele.setAttributeNode(att);
    popup.style.display='none';

}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete album
function btnpopup_delAlbum(){	
    var ele = document.querySelectorAll('.li_album');
    var txthead = document.getElementById('txt_headname');
	var popup = document.getElementById('myModal-alert');
    var idalbum, txthtml;	
	var htxt = 'การลบรายการ ชื่อชุดหนังสืออาจส่งผลให้ทะเบียนหนังสืออื่นที่ใช้ชื่อเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelalbum data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
    ele.forEach((item)=>{
        // console.log(item.style.background);
       if(item.style.background == 'rgb(209, 249, 237)'){
             idalbum = item.getAttribute('id1');
            txthtml = item.innerText;
          
        }        
    })
    txthead.innerText = txthtml;
    popup.style.display='block';
    $(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelalbum', function(){
		// console.log('test-xxx');
	    del_album_ajax(idalbum);
		popup.style.display='';
	})
}
function del_album_ajax(idalbum){
	var data = '';
    // console.log(idalbum);
	$.ajax({
		url:"../phpsv-ebooks/Del_Album.php",
		method:"POST",
		data:{val:idalbum},
		dataType:"text",
		success: function(result){			
			Myfunc_SearchAlbum(data);			
			}
	})	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น Add ชื่อชุดหนังสือ 
function Click_Btn_ADDalbum(){
	var popup = document.getElementById('boxModal_popSearch_album');
	var ipt = document.getElementById('idipt_sch_album');
	var ele = document.getElementsByClassName('ipt-albumset')[0];
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
//--------------------------------------------------ฟังก์ชั่นPOPUP Search Headname path 2  ปอบอัพค้นหาหัวเรื่อง		
function Click_showpopup_hname(){
	var popup  = document.getElementById('boxModal_popsch_hname');
	popup.style.display='block';
	var data = "";
	Search_popup_HeadName(data);
	document.getElementsByClassName('close_popSearch_Puphlish')[0].onclick = function(){
		popup.style.display="none";
		// console.log('test-click');
	 };
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
						
						HTML += '<li ondblclick="myClick_slc_listhname(this)" id1="'+result[m].id_album
								+'" class="li_HeadName">'+result[m].album_name+'</li>';
						
						}
					$('.boxmodal_list_hname').html(HTML);
					}
				
				}
		})

}
//--------------------------------------------------ฟังก์ชั่น selesct list headname
function select_hname(dis){
    var li = document.querySelectorAll('.li_HeadName');
    li.forEach((item)=>{
        if(item == dis){
            item.style.background='rgb(209, 249, 237)';
        }else{
            item.style.background='';
        }
    })
}
//--------------------------------------------------ฟังก์ชั่น bntpopup delete headname
function btnpopup_delHname(){
    var li = document.querySelectorAll('.li_HeadName');
    li.forEach((item)=>{
        if(item.style.background == 'rgb(209, 249, 237)'){
          var idhname = item.getAttribute('id1');
          var txthname = item.innerText;
          func_alertdelHname(idhname, txthname)
        }
    })
}
function func_alertdelHname(idhname, txthname){	
	var popup = document.getElementById('myModal-alert');
	var htxt = 'การลบรายการหัวเรื่องเพิ่มเติมผลต่อหนังสือที่ใช้หัวเรื่องเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelhane" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	document.getElementById('txt_headname').innerText = txthname;
	popup.style.display='block';
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelhane', function(){
		myFunc_Delete_HeadName(idhname);
	})	
}
//-----------------------------------------------------ฟังก์ชั่น delete headnamemore ajax
function myFunc_Delete_HeadName(idhname){
	var popup = document.getElementById('myModal-alert');
	var data = '';
				$.ajax({
						url:"../phpsv-ebooks/Del_HeadNamebooks.php",
						method:"POST",
						data:{idHName:idhname},
						dataType:"text",
						success: function(del){						
						popup.style.display ='none';
						Search_popup_HeadName(data);							
						}
					})
}
//-----------------------------------------------------ฟังก์ชั่น ดับเบิลคลิกเพื่อเลือกรายการ
function myClick_slc_listhname(dis){
	var popup = document.getElementById('boxModal_popsch_hname');
	var att = dis.getAttribute('id1');
	var txt = dis.innerText;
	var HTMLX = '';
	//  console.log(att);
	HTMLX += '<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id1="'+att+'">';
	HTMLX +='<td class="td_more" >'+txt+'</td>';
	$('.tb_HeadName').append(HTMLX);
	popup.style.display='none';	
}
function dbclick_slc_hname(dis){
    var ele = document.querySelectorAll('.tr_Headname');
    ele.forEach((item)=>{
        if(item == dis){
            item.style.background ='rgb(209, 249, 237)';
        }else{
            item.style.background =''; 
        }
    })
    
}
//--------------------------------------------------ฟังก์ชั่นคลิกที่ปุ่มเพื่อลบ รายการในหัวเรื่อง
function btn_hname_del(){
    var ele = document.querySelectorAll('.tr_Headname');
    ele.forEach((item)=>{
        if(item.style.background =='rgb(209, 249, 237)'){
			sendDelAjax_Hname(item.getAttribute('id1'));
          item.remove();
        }
    })
}
function sendDelAjax_Hname(idhname){
	var idlink = document.getElementsByClassName('ipt-idlink')[0].value; 
	// console.log(idhname);
	$.ajax({
		url:"../phpsv/del_HeadName.php",
		method:"POST",
		data:{idcode:idhname,idlinks:idlink},
		success: function(result){
			popupError(result);
			}
	
	})
}
//-----------------------------------------------------ฟังก์ชั่น   add new headname more ajax
function Click_Btn_ADDnew_hname(){
	var txt = document.getElementById('idipt_sch_hname');
	var popup = document.getElementById('boxModal_popsch_hname');
	var HTMLX = '';
	// console.log(txt);
	if(txt.value == ''){
		popupError('กรุณากรอกชื่อหัวเรื่องที่ต้องการเพิ่มเข้าระบบ');
		return false;
	}
		//console.log(txt);
		$.ajax({
			url:"../phpsv-ebooks/ADD_HeadNameBooks.php",
			method:"POST",
			data:{ad_data:txt.value},
			dataType:"json",
			success: function(Hnbk){
			 console.log(Hnbk);
			if(Hnbk != null){
			for(var i=0; i < Hnbk.length; i++){
				HTMLX += '<tr class="tr_Headname" ondblclick="dbclick_slc_hname(this)" id1="'+Hnbk[i].id+'">';
				HTMLX +='<td class="td_more" >'+Hnbk[i].name+'</td>';				
			}
            $('.tb_HeadName').append(HTMLX);
				popup.style.display='none';	
            txt.value='';	
				}
			
			}
		
		})
	
}
function show_popupNameMore(){
    var popup = document.getElementById('boxModal_popnamemore');
    popup.style.display ='block';
    var data = "";
	Search_popup_albumNamemore(data);
	document.getElementsByClassName('close_popSearch_Puphlish')[0].onclick = function(){
		popup.style.display="none";
		// console.log('test-click');
	 };
		$(document).on('keyup', '#idipt_sch_nmore', function(){
            var data = $(this).val();
        //    console.log(data);
		 Search_popup_albumNamemore(data);
	})	
}
//-------------------------------------------------------------------ฟังก์ชั่น แสดงรายการหัวเรื่องเพิ่มเติม
function Search_popup_albumNamemore(data){
	//console.log(data);
	var HTML = '';
	$.ajax({
				url:"../phpsv/ShowListNamebookmore.php",
				method:"POST",
				data:{data:data},
				dataType:"json",
				success: function(result){
                    // console.log(result);
					if(result != null){						
						for(var m =0; m < result.length; m++){
							HTML += '<li ondblclick="myClick_slc_Nmore(this)" id1="'+result[m].id_album
								+'" class="li_NameMore">'+result[m].album_name+'</li>';	
							}
						$('.boxmodal_list_nmore').html(HTML);
						}
					
					}
			})
	
}
function select_NameMore(dis){
    var li = document.querySelectorAll('.li_NameMore');
    li.forEach((item)=>{
        if(item == dis){
            item.style.background='rgb(209, 249, 237)';
        }else{
            item.style.background='';
        }
    })
}
function del_NameMorepopup(){
    var li = document.querySelectorAll('.li_NameMore');
    li.forEach((item)=>{
        if(item.style.background =='rgb(209, 249, 237)'){
            var idmore = item.getAttribute('id1');
            var txtmore = item.innerText;
            popupAlert_delnmore(idmore, txtmore);
        }
    })
}
function popupAlert_delnmore(idmore, txtmore){
    var popup = document.getElementById('myModal-alert');
	var htxt = 'การลบรายการหัวเรื่องเพิ่มเติมผลต่อหนังสือที่ใช้หัวเรื่องเดียวกัน';	
	var btntxt = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-alertdelhane" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
	document.getElementById('spnamedel').innerHTML =htxt;
	document.getElementById('item_btnshow').innerHTML = btntxt;
	document.getElementById('txt_headname').innerText = txtmore;
	popup.style.display='block';
	$(document).on('click', '.close-btnalert', function(){
		popup.style.display='';
	})
	$(document).on('click', '.btn-alertdelhane', function(){
		myFunc_Delete_album_namemore(idmore);
        popup.style.display='';
	})	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup delete  ชื่อเรื่องเพิ่มเติม
function myFunc_Delete_album_namemore(idmore){
	var data = '';

				$.ajax({
						url:"../phpsv/Del_album_namemore.php",
						method:"POST",
						data:{idalbum:idmore},
						dataType:"text",
						success: function(del){
							//console.log(del);
						Search_popup_albumNamemore(data);
							
							}
					})
}
function myClick_slc_Nmore(dis){
 var HTMLX ='';
 var popup = document.getElementById('boxModal_popnamemore');  
 var idmore, txtmore;
    idmore = dis.getAttribute('id1');
    txtmore = dis.innerText;
    HTMLX += '<tr class="tr_Namemore" ondblclick="myClick_Namemore(this)" id1="'+idmore+'">';
	HTMLX +='<td class="td_more" >'+txtmore+'</td>';
    popup.style.display ='none';
    $('.tb_NameMore').append(HTMLX);
}
function myClick_Namemore(dis){
    var li = document.querySelectorAll('.tr_Namemore');
    li.forEach((item)=>{
        if(item == dis){
            item.style.background='rgb(209, 249, 237)';
        }else{
            item.style.background='';  
        }
    })
}
//-------------------------------------------------ฟังก์ชั่น ลบ ชื่อเรื่องเพิ่มเติม
function del_listNamemore(){
    var li = document.querySelectorAll('.tr_Namemore');
    li.forEach((item)=>{
        if(item.style.background == 'rgb(209, 249, 237)'){
			func_sendAjx_delnmore(item.getAttribute('id1'));
           item.remove();
        }
    })
}
function func_sendAjx_delnmore(idNmore){
	var idlink = document.getElementsByClassName('ipt-idlink')[0].value; 
	$.ajax({
		url:"../phpsv/del_Sub_Albummore.php",
		method:"POST",
		data:{idlinksnum:idNmore,idlinks:idlink},
		dataType:"text",
		success: function(det){
		popupError(det);
			}
	
	})
}
function add_popupNewNamemore(){
    var iput = document.getElementById('idipt_sch_nmore');
    var popup = document.getElementById('boxModal_popnamemore'); 
    var txtmore = iput.value; 
    if(iput.value==''){
       popupError('กรุณาคีย์ข้อมูลที่ต้องการ');
        return false;
     }
    var HTML =''; 
   $.ajax({
        url:"../phpsv/ADD_album_namemore.php",
        method:"POST",
        data:{ad_data:txtmore},
        dataType:"json",
        success: function(txt){
    //    console.log(txt);
       if(txt != null){            
        for(var ix =0; ix <txt.length; ix++){               
                HTML += '<tr class="tr_Namemore" ondblclick="myClick_Namemore(this)" id1="'+txt[ix].id+'">';
                HTML +='<td class="td_more" >'+txt[ix].name+'</td>';                
            }
            $('.tb_NameMore').append(HTML);            
         iput.value='';   
        popup.style.display='none';
        }
         
        }
    
    })
}

