document.getElementById("defaultOpenregis").click();
//-------------------------------------------------------ฟังก์ชั่น เช็คล็อคอิน user 
// ---------------------------function  default----------------------------------
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
// ---------------------------function  default----------------------------------	
/*-----------------------------ฟังก์ชั่น แทปเมนูลงทะเบียนหนังสือ------------------------------------------------------------------------*/
function myTabClik_regisbook(cityName, elmnt, color, status) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    var BT_EDIT = document.getElementById("icon_btn_editregis");
    var BT_ADD = document.getElementById("icon_btn_addNewbook");
    var BT_del = document.getElementById("icon_btn_delAddNewbook");
    var idLINK = ''; 
    myFuncSearch_namebook();
    if(BT_EDIT.style.color == '' && BT_ADD.style.color == ''){
            tabcontent = document.getElementsByClassName("box_tab_menuregisbook");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
          
            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("menu_tabregis");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].style.backgroundColor = "";
            }          
            // Show the specific tab content
            document.getElementById(cityName).style.display = "block";
                  /*alert(color);*/
            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
          //document.getElementById("defaultOpenregis").click();
          if(status == 1){
              document.getElementById("icon_btn_addNewbook").disabled =false;
              localStorage.setItem("status", "1");
              EnableAndDisable_BTNADDBOOK();
              //localStorage.clear("status"); ///การลบค่าตัวแปรที่สร้างไว้ใน localstorage
              //Myfunc_Disabled_input();
              }else if(status == 2){
                  document.getElementById("icon_btn_addNewbook").disabled =true;
                  localStorage.setItem("status", "2");
                  mYfunc_ShowdataAdcatbook();
                  EnableAndDisable_BTNADDBOOK();
                  }else if(status == 3){							
                      document.getElementById("icon_btn_addNewbook").disabled =false;
                      localStorage.setItem("status", "3");					
                      Myfunc_P3COPY(idLINK);
                      EnableAndDisable_BTNADDBOOK();
                      
                      }
        }
       
}
function myFunc_DeleteRecodPcopy(){ 
	var NumPage = localStorage.getItem("status");
	var bCode =   localStorage.getItem("bbcodetxt");
	var idlink = $('.ipt_regisPCOPY_no').val();
		var popdel = document.getElementById('boxModal_popDeletePcopy');
	   //console.log(idlinkthis);
   if(NumPage == 3){
		   if(bCode != null){
			   $('.lb_DeletePcopy').text(bCode);	
			   popdel.style.display='block';
		   }
		   
	   }else if(NumPage == 1){//สำหรับลบข้อมูลหน้าลงทะเบียน
			   Myfunc_delete_detail_bkstore(idlink);
			   }
   $(document).ready(function() {
	  $('.bt_DeletePcopy').click(function(){
			 //console.log(bCode);
		   $.ajax({
				   url:"../phpsv/delete_registb.php",
				   method:"POST",
				   data:{bCode:bCode},
				   dataType:"text",
				   success: function(data){
					   //alert(data);
					   //console.log(data);
					   }
			   })
				Clear_Html_pageCopyDeletebook();
		  popdel.style.display='none';
		  })
		  
		  $('.close_popDeletePcopy').click(function(){
			  popdel.style.display='none';
			  })
	   localStorage.removeItem("bbcodetxt");	   
	
   }); 
 }
 //-------------------------------------------------ฟังก์ชั่น เคลียร์ input หน้าสำเหนา หลังลบข้อมูล
function Clear_Html_pageCopyDeletebook(){
	var elment = document.getElementsByName("name_iptinsertlist");
	
			for(var et =0; et<elment.length;et++){
				//console.log(elment[et].getAttribute("class"));
				var notele = elment[et].getAttribute("class");			
				if(notele == 'ipt_regisPCOPY_byauthor' || notele == 'ipt_regisPCOPY_cat' || notele == 'ipt_regisPCOPY_no'){ 
					
					elment[et].value;
					}else{
						elment[et].value ="";
						$('#tr_click').remove();
						}
				//elment[et].value ="";
				}
		
}
//--------------------------------------------ฟังก์ชั่นเซิฟการเพิ่มหนังสือเข้าระบบ หน้า สำเนา 	 
function func_AddToSaveDATA_pcopy(){
	var arr_send = [];
	var copy = $('.ipt_regisCOPY').val();
	var typebk = $('.sel_regisPCOPY_cat option:selected').val();
 	var deal = $('.sel_regisPCOPY_dealer option:selected').val();
	//console.log(typebk);
		if(copy == ''){
			alert("กรุณากรอกข้อมูล สำเนา");
			return;
			}
			if(typebk == ''){
				alert("กรุณาเลือก ประเภทหนังสือ");
				return;
				}
				if(deal == ''){
					alert("กรุณาเลือก ตัวแทนจำหน่าย");
					return;
					}
	var arr_data = document.getElementsByName("name_iptinsertlist");
	
	for(var a = 0; a<arr_data.length; a++){
		var elemt = arr_data[a].getAttribute("class");
		
		if(elemt == 'ipt_namecatbook' || elemt == 'ipt_code_byauthor' || elemt == 'bt_discheck_adcat'){
			
			}else{
			
			//console.log(elemt);	
			//console.log(arr_data[a].value);
			arr_send.push(arr_data[a].value);
			}
			
		}

		//console.log(arr_send);
		
		$.ajax({
				url:"../phpsv/AddToSvDataPcopy.php",
				method:"POST",
				data:{data:arr_send},
				dataType:"text",
				success: function(sql){
					//alert(sql);
					console.log(sql);					
					}
			
			
			})
			//console.log(arr_send);
			 myFuncshowdetail_right(arr_send);
		Close_off_buttonSave();
	}
function Close_off_buttonSave(){
	//alert("ทดสอบเมื่อบันทึกข้อมูลเสร็จให้ปิดไอคอนเสิร์ฟ");
	var NumPage = localStorage.getItem("status");
	mYFunc_enabled_Addnew_Regisboos(NumPage);
}
function myFuncshowdetail_right(arr_send){	
		
	//console.log(arr_send);
	var id = arr_send[0];
	
	//console.log(id);
	var btns =   document.querySelectorAll(".li_listSearchAd");
	//btns.getAttribute("id1")
	//console.log(btns.attributes[3].value);
		for(var i = 0; i < btns.length; i++) {
			//console.log(btns[i].attributes[3].value);				
			if(btns[i].attributes[3].value == id){
				btns[i].style.backgroundColor = '#D1F9ED';
					mYFunc_AllHub(id);
					 }else{
						btns[i].style.backgroundColor = '';
					}
			}
			
}			
//---------------------------------------ฟังก์ชั่น  barcode auto page copy  
function mYFunc_ClickAddBarCodeAuto(){
	//console.log("mYFunc_ClickAddBarCodeAuto");
	//$( ".bt_adAutoBarcode" ).focus();
	var code = $('.ipt_adAutoBarcode').val();	
	//console.log(code);
	var HTML = '';
if(code == ''){
	alert("Pless Insert DATA");
	
				}else{
				//console.log(code);
				localStorage.setItem("bCode_at", code)	
			$.ajax({
					url:"../phpsv/AdAutoBCode.php",
					method:"POST",
					data:{code:code},
					dataType:"json",
					success: function(data){
						//console.log(data);
						for(var i =0; i < data.length; i++){
							if(data[i].status == 1){// มีค่าบาร์โค้ดซ้ำ
								//console.log(data[i]);
								HTML = '<label id="text_codeAdnew" class="text_code">บาร์โค้ดซ้ำ/ล่าสุดในหมวด:&nbsp;'+data[i].maxid+'</label>';	
								}else{
									//console.log('ไม่มีค่าซ้ำ');
									ShowData_INput_pcopty(data[i].BarCOde);
									}
							}
							$('.box_text_showadAutoBarcode').html(HTML);
						
						}
				
				})
				
			}
	
	}
function ShowData_INput_pcopty(brcode){
	$('.ipt_regisPCOPY_barcode, .ipt_regisPCOPY_numcode').val(brcode);
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');
										popup.style.display ='none';	
}
//------------------------------------------------------------------ฟังก์ชั่นดับเบิลคลิก เพื่อเลือกรายการที่จะลบ
function  MyFunc_ClickDel_Morenbk(d){
	var btns =   document.querySelectorAll(".td_more");
	//console.log(btns);
	//console.log(btns);
	var id = d.attributes[3].value;
	//console.log(id);
	//console.log(id);
	for (var i = 0; i < btns.length; i++) {
	if(btns[i] == d){
		btns[i].style.backgroundColor = 'red';
		localStorage.setItem("idalbumtxt", id);
		
			}else{
					btns[i].style.backgroundColor = '';
					//localStorage.removeItem("idalbumtxt");
								 //var ttd = btns[i].attributes[1].value;
					  }
	}
	
}
//-----------------------------------------------------ฟังก์ชั่น อัพเดทการแก้ไขข้อมูล  หัวเรื่อง , หัวข้อหัวเรื่ิงเพิ่มเติม หน้าลงรายการ 
function upDateData_pageinsertList(){
	var idlink, catbk, numbyauthor, numby, hname, nmore;
	var arr_idhname =[];
	var arr_idnmore =[];
	idlink = $('.ipt_nameregisname').attr('id1');
	catbk = $('.ipt_namecatbook').val();
	numby =  $('.ipt_code_byauthor').val();
	hname = document.querySelectorAll('.td_Headname');
	nmore = document.querySelectorAll('.td_more');
	//console.log(catbk);
	//console.log(numby);
	for(var txt =0; txt < hname.length; txt++){
		//console.log(hname[txt].attributes[2].value);
		arr_idhname.push(hname[txt].attributes[2].value);
		}
		//console.log(arr_idhname);
	for(var i = 0; i < nmore.length; i++){
		
		//console.log(nmore[i].attributes[3].value);
			arr_idnmore.push(nmore[i].attributes[3].value);
		}	
	//console.log(arr_idnmore);
			$.ajax({
					url:"../phpsv/update_inserList.php",
					method:"POST",
					data:{idlink:idlink,catbk:catbk,numby:numby, arr_idhname:arr_idhname,arr_idnmore:arr_idnmore},
					dataType:"text",
					success: function(data){
						
							//console.log(data);
						
						
						}
				
				})
	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup delete  ชื่อเรื่องเพิ่มเติม
function myFunc_Delete_album_namemore(){
	var checkitem = [];
	var data = '';
	$('.tbcheckbox_albumAlbumNamemore:checked').each(function(i) {
               var id_album_namemore = checkitem[i] = $(this).attr('id');
				//console.log(id_album_namemore);
				//console.log(id_byathor);
				$.ajax({
						url:"../phpsv/Del_album_namemore.php",
						method:"POST",
						data:{idalbum:id_album_namemore},
						dataType:"text",
						success: function(del){
							//console.log(del);
						Search_popup_albumNamemore(data);
							
							}
					})
				
            });
			
		
	}
//-------------------------------------------------------ฟังก์ชั่น แรกของหน้า สำเนา----------------------------------------
//------------------------------------------------------------------ฟังก์ชั่น disabled and enabled หน้าสำเนา สำหรับการแก้ไขข้อมูล	 
function Myfunc_Enabled_input_Pagecopy(){
	var idlink = document.getElementById('ipt_idregisPCOPY_no').value;
	var BT_EDIT = document.getElementById("icon_btn_editregis");
	//console.log(BT_EDIT);
	var check = document.getElementsByName("name_iptinsertlist");
	//var icon_disble = document.getElementById('iconAdd_byathor');
	//var icon_dis = document.querySelectorAll('#icon_adcat');
	var slc_copy = document.querySelectorAll('#slc_pcopy');
	var page_status = localStorage.getItem("status");
	//console.log(slc_copy);
	 if(page_status ==3)// ให้เมนูทุกอย่างทำงานเมื่อ status page = 3 
 		{
			console.log(idlink);
			if(idlink !=''){
				if(BT_EDIT.style.color== ""){
					BT_EDIT.style.color='red';
					}else{
						BT_EDIT.style.color= '';
						func_SaveEditpageCopy();
						}
				
				//console.log(slc_copy.length);
				/*for(var bt = 0; bt < slc_copy.length; bt++){
					if(slc_copy[bt].disabled == false){
						slc_copy[bt].disabled = true;
						}else{
							slc_copy[bt].disabled = false;
							}
					
					}*/
					
					
						for(var i =0; i < check.length; i++){
						
								if(check[i].disabled  == false){
									check[i].disabled = true;
									
									//console.log(check[i].disabled = true);
									}else{
										check[i].disabled = false;
										//console.log(check[i]);
										//console.log("true");
										}
							}
			}else{
				stop;
			}

		}
	
	}
//-----------------------------------------ฟังก์ชั่น บันทึกการแก้ไขข้อมูล หน้าสำเนาทั้งหมด 
function func_SaveEditpageCopy(){
	
	var arr_data = [];
	
	arr_data[0] = $('.ipt_regisPCOPY_no').val(); //เลขทะเบียน
	arr_data[1] = $('.ipt_regisPCOPY_barcode').val();//เลขบาร์โค้ด
	arr_data[2] = $('.ipt_regisPCOPY_cat').val();//เลขหมวดหมู่
	arr_data[3] = $('.ipt_regisPCOPY_byauthor').val();//เลขผุ้แต่ง
	arr_data[4] = $('.ipt_regisPCOPY_numcode').val();//เลขทะเบียน/บาร์โค๊ด
	arr_data[5] = $('.ipt_regisCOPY').val();//เลขสำเนาจำนวนก้อปปี้หนังสือ
	arr_data[6] = $('.sel_regisPCOPY_cat option:selected').val();//ประเภทนังสือ
	arr_data[7] = $('.sel_regisPCOPY_status option:selected').val();//สถานะหนังสือ
	arr_data[8] = $('.ipt_regisdat').val();//วันที่ลงทะเบียน
	arr_data[9] = $('.ipt_regismemo').val();//หมายเหตุ ฉบับ 1 v.1 v.2
	arr_data[10] = $('.sel_regisPCOPY_dealer').val();//ตัวแทนจำหน่าย
	arr_data[11] = $('.ipt_regisbath').val();//ราคา
	arr_data[12] = $('.sel_regisPCOPY_out option:selected').val();//สถานะการใช้งาน*/
	
	console.log(arr_data);
	
		$.ajax({
				url:"../phpsv/Save_edit_pcopy.php",
				method:"POST",
				data:{jdata:arr_data},
				cache: false,
				dataType:"text",
				success: function(val){
				//console.log(val);
					
					}
			
			})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา (รายการในช่อง สำเนา) 
function Myfunc_P3COPY(idLINK){		
		//console.log(idLINK);
		var HTML = '';
		var HTMLNUM = '';
			$.ajax({
					url:"../phpsv/Showcopybook.php",
					method:"POST",
					data:{idLINK:idLINK},
					dataType:"json",
					success: function(data){
						
						if(data != null){
						clickTomyFunc_detail(data);
							for(var d =0; d<data.length; d++){
								//console.log(data[d].BARCODE);
								var brcode = data[d].BARCODE;
								HTML +='<tr class="tr_Litcopybook" id="tr_click" id2="'+data[d].BARCODE+'" onClick="myFuncSeletListCode(this, '+data[d].IDLIKBOOK+')">';
									HTML +='<td class="td_Litcopybook_bc">'+data[d].BARCODE+'</td>';
									HTML +='<td class="td_Litcopybook_cb">'+data[d].CATBOOK+'/'+data[d].byauthor+'</td>';
								HTML + '</tr>';
								}
							
							$('.tb_Listcodebooke').html(HTML);
							}
						}
									
				})
		
		}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา  part 1		
function StatusWork_book(STWORK){
	//console.log(STWORK);
	var arr = [0,1,2];
		for(var ar = 0; ar < arr.length; ar++){
			
			if(STWORK[ar] == 0){
				
				$('.sel_regisPCOPY_out').html(
				'<option value="0">- ใช้งาน -</option>'+
				'<option value="1">- ไม่สามารถใช้งาน -</option>'+
				'<option value="2">- อยู่ระหว่างซ่อม -</option>');
				
				}else if(STWORK[ar] == 1){
					$('.sel_regisPCOPY_out').html(
					'<option value="1">- ไม่สามารถใช้งาน -</option>'+
					'<option value="0">- ใช้งาน -</option>'+
					'<option value="2">- อยู่ระหว่างซ่อม -</option>');
					
					}else if(STWORK[ar] == 2){
					$('.sel_regisPCOPY_out').html(
					'<option value="2">- อยู่ระหว่างซ่อม -</option>'+
					'<option value="0">- ใช้งาน -</option>'+
					'<option value="2">- ไม่สามารถใช้งาน -</option>');
					
					}
		
			}
	}	
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา  part 1
function clickTomyFunc_detail(data){
		var CODE, COPY, CATBK, BYAUTHOR, NOREGIS, DAT, STWORK, Price, dealer, idlink, TYPEID;
		var Option= '';
		for(var x = 0; x < data.length; x++){
			CODE = data[x].BARCODE;
			COPY = data[x].COPPYNUM;
			CATBK = data[x].CATBOOK;
			BYAUTHOR = data[x].byauthor;
			NOREGIS = data[x].CODE_REGIS;
			DAT = data[x].Dat_regis;
			STWORK = data[x].STWORK;
			Price = data[x].Price_book;
			dealer = data[x].SUPCODE;
			idlink = data[x].IDLIKBOOK;
			TYPE_ID = data[x].LOANSTATUS;
		}
		
			//console.log(Option);
			$('.ipt_regisPCOPY_barcode').val(CODE);
			$('.ipt_regisPCOPY_cat').val(CATBK);
			$('.ipt_regisPCOPY_byauthor').val(BYAUTHOR);
			$('.ipt_regisPCOPY_numcode').val(NOREGIS);
			$('.ipt_regisCOPY').val(COPY);
			$('.ipt_regisdat').val(DAT);
			$('.ipt_regisbath').val(Price);
		//console.log(arr[0]);
	clickTomyFunc_detail_dealerBookpart2(dealer);
	clickTomyFunc_detail_memopart3(data, idlink, CODE);
	StatusWork_book(STWORK);
	clickTomyFunc_detail_typebook4(data, TYPE_ID);
	clickTomyFunc_detail_status5(idlink);		
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา ตัวแทนจำหน่าย  part 2			
function clickTomyFunc_detail_dealerBookpart2(dealer){
	//console.log(dealer);
	var Dealbook ='';
		$.ajax({
					url:"../phpsv/ShowDealerBook.php",
					method:"POST",
					data:{iddealer:dealer},
					dataType:"json",
					success: function(txt){
						//console.log(txt);
						if(txt != null){ //12
							//console.log(txt.length);
							for(var dx = 0; dx < txt.length; dx++){
									
									Dealbook += '<option value="'+txt[dx].IDKEY_Dealer+'">- '+txt[dx].NAME_DEALER+'-</option>';
								}
						}
							//console.log(Dealbook);
							$('.sel_regisPCOPY_dealer').html(Dealbook);					
						}
						
				})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา หมายเหตุ  part 3
function clickTomyFunc_detail_memopart3(data, idlink, CODE){
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
						$('.ipt_regismemo').val(MemoText);	
					}
				})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา ประเภทหนังสือ   part 4
function clickTomyFunc_detail_typebook4(data, TYPE_ID){
	//console.log(TYPE_ID);
	var textType ='';
		$.ajax({
					url:"../phpsv/ShowTextType.php",
					method:"POST",
					data:{barcode:TYPE_ID},
					dataType:"json",
					success: function(Typebk){
						if(Typebk != null){ //12
						
						for(var t = 0; t < Typebk.length; t++){
								
									textType += '<option value="'+Typebk[t].TYPEID+'">- '+Typebk[t].TYPENAME+'-</option>';
							}
						}
						//console.log(textType);
						$('.sel_regisPCOPY_cat').html(textType);	
					}
				})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา สถานะหนังสือ  part 5
function clickTomyFunc_detail_status5(idlink){
	//console.log(idlink);
	var id_key = '';
		$.ajax({
					url:"../phpsv/ShowStatusbook.php",
					method:"POST",
					data:{idlink:idlink},
					dataType:"json",
					success: function(status){
						//console.log(status);
						if(status != null){ //2
							//console.log(status);
							
							for(var key = 0 ; key < status.length; key++){
								
									id_key = status[key].status_key;
								
								}
									click_ToFunc_statusSelect(idlink, id_key);
						
							
						}
						//$('.ipt_regismemo').val(MemoText);	*/
					}
				})
	
	}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา สถานะหนังสือ  part 5	/1
function click_ToFunc_statusSelect(idlink, id_key){
	//console.log(id_key);
	var HTML='';
		$.ajax({
					url:"../phpsv/ShowStatusSelect.php",
					method:"POST",
					data:{id_key:id_key},
					dataType:"json",
					success: function(st){
						if(st != null){
							for(var k =0; k < st.length; k++){
								
									//console.log(st[k].KEY_TYPE);
									HTML += '<option value="'+st[k].KEY_TYPE+'">- '+st[k].NAME_KEY+'-</option>';									
								
								
								}
							
							}
							$('.sel_regisPCOPY_status').html(HTML);
						
						}
					})
	
	}					
//-----------------------------------------ฟังก์ชั่น เมื่อคลิกรายการในช่องสำเนาให้แสดงแถบสีที่คลิก-------------- 
function myFuncSeletListCode(ele, idlink){
	//console.log(bar);
	var btns =   document.querySelectorAll("#tr_click");
			var id = ele.attributes[2].value;
			for (var i = 0; i < btns.length; i++) {
			if(btns[i] == ele){				
				btns[i].style.backgroundColor = 'red';
				localStorage.setItem("bbcodetxt", id);
				Click_to_ShowdataDetail(ele, id, idlink);
					}else{
							btns[i].style.backgroundColor = '';
							//localStorage.removeItem("idalbumtxt");
									 	//var ttd = btns[i].attributes[1].value;
							  }
			}
		//console.log(localStorage.getItem('bbcodetxt'));
	
	}
//-----------------------------------------ฟังก์ชั่น รับค่าจากคลิกแสดงแถบสี ให้แสดงผลหน้าดีเทลที่กำหนด-------------
function Click_to_ShowdataDetail(ele, barcode, idlink){
	//console.log(barcode);
	var barcode, catbook, bynum,  memotext, dealer, price, STWORK, copy,
		status_txt, day;
		$.ajax({
				url:"../phpsv/Showcopybkdtail.php",
				method:"POST",
				data:{bcode:barcode,idlink:idlink},
				dataType:"json",
				success: function(data){
					if(data != null){
					//console.log(data);
						for(var dc =0; dc < data.length; dc++){
							
							barcode = data[dc].BARCODE;
							catbook = data[dc].CATBOOK;
							bynum 	= data[dc].byauthor;
							memotext = data[dc].TYPETEXT;
							dealer = data[dc].SUPCODE;
							price = data[dc].Price;
							day = data[dc].dat_regis;
							copy = data[dc].COPPYNUM;
							STWORK = data[dc].STWORK;
							status_txt = data[dc].status_text;
							}
						
						
						}
						//console.log(barcode);
						$('.ipt_regisPCOPY_barcode').val(barcode);
						$('.ipt_regisPCOPY_cat').val(catbook);
						$('.ipt_regisPCOPY_byauthor').val(bynum);
						$('.ipt_regisPCOPY_numcode').val(barcode);
						$('.ipt_regismemo').val(memotext);
						$('.ipt_regisCOPY').val(copy);
						$('.ipt_regisdat').val(day);
						$('.ipt_regisbath').val(price);
					clickTomyFunc_detail_dealerBookpart2(dealer);
					StatusWork_book(STWORK);
					MyFunc_status_Activebook(status_txt);
					}
			})
	
	
	}
//-----------------------------------------ฟังก์ชั่น รับค่าจากคลิกแสดงแถบสี ให้แสดงผลหน้าสำเนา สถานะหนังสือ 
function MyFunc_status_Activebook(status_txt){
	//console.log("test1");
	var HTML = '';
	$.ajax({
					url:"../phpsv/ShowActivebook.php",
					method:"POST",
					data:{status_txt:status_txt},
					dataType:"json",
					success: function(strtxt){
						//console.log(strtxt);
						if(strtxt != null){
							for(var str =0; str < strtxt.length; str++){
								if(status_txt == strtxt[str].KEY_TYPE){
									//console.log(st[k].KEY_TYPE);
									HTML = '<option value="'+strtxt[str].KEY_TYPE+'">- '+strtxt[str].NAME_KEY+'-</option>';									
									}else{
										HTML += '<option value="'+strtxt[str].KEY_TYPE+'">- '+strtxt[str].NAME_KEY+'-</option>';
										}
								
								}
							
							}
							//console.log(HTML);
							$('.sel_regisPCOPY_status').html(HTML);
						
						}
					})
	
	}
//-------------------------------------------------------ฟังก์ชั่น popup ADD  ชื่อเรื่องเพิ่มเมื่อดับเบิ้ลคลิกที่รายชื่อเรื่องเพิมเติม
function MyFunc_doubleClickSelectalbummore(xt){
	var boxpopSearch_more = document.getElementById('boxModal_popSearch_AlbumNamemore');
	//console.log(xt);
	var HTML, HTMLID;
	var HTML_sml = '';
	if(xt!= null){
		 HTML = xt.attributes[2].value;
		 HTMLID = xt.attributes[1].value;
		 //console.log(HTMLID);
		 
		 HTML_sml +='<tr class="tr_more"><td class="td_more" id-data="" id2="" id="'+HTMLID+'">'+HTML
									+'</td><tr>';
		 
								 
			$('.tb_moreHeadname').append(HTML_sml);
				
		}
		boxpopSearch_more.style.display = "none";
}
//---------------------------------------------------------------Popupฟังก์ชั่นคลิกเลือกให้แสดงแถบสีในรายการ หัวเรื่อง
function myFuncClickSeletListHeadName(d){
	var btns =   document.querySelectorAll(".li_HeadName");
	//console.log(d);
	//console.log(d.attributes[1].value);
	var id = d.attributes[1].value;
	//console.log(d.attributes[1].value.length);
	var items = document.getElementsByName('checkbox_HeadName');
	
	//console.log(id);
	for (var i = 0; i < btns.length; i++) {
	if(btns[i] == d){
		btns[i].style.backgroundColor = 'red';
			items[i].checked=true;
			}else{
								
					items[i].checked=false;
					btns[i].style.backgroundColor = '';
								 //var ttd = btns[i].attributes[1].value;
					  }
	}

}
//------------------------------------------------------ฟังก์ชั่นดับเบิลคลิก เพื่อเลือกรายการ  หัวเรื่องที่จะลบ
function  MyFunc_dbClickDel_Hname(dt){
	var btns =   document.querySelectorAll(".td_Headname");
	//console.log(dt);
	//console.log(btns);
	var id = dt.attributes[2].value;
	//console.log(id);
	//console.log(id);
	for (var i = 0; i < btns.length; i++) {
	if(btns[i] == dt){
		btns[i].style.backgroundColor = 'red';
		localStorage.setItem("idHname", id);
		
			}else{
					btns[i].style.backgroundColor = '';
					//localStorage.removeItem("idalbumtxt");
								 //var ttd = btns[i].attributes[1].value;
					  }
	}
	
}
//----------------------------------------------ฟังก์ชั่น ดับเบิลคลิกเลือกรายการจากบอปอัพหัวเรื่อง มาแสดงในดีเทลด้านซ้าย หัวเรื่อง 		
function MyFunc_doubleClickSelectHeadName(h){
	var boxpopSearch_HeadName = document.getElementById('boxModal_popSearch_HeadName');
	//console.log(xt);
	var HTML, HTMLID;
	var HTML_sml = '';
	if(h!= null){
		 HTML = h.attributes[2].value;
		 HTMLID = h.attributes[1].value;
		 //console.log(HTMLID);
		 // console.log(HTML);
		 
		 HTML_sml +='<tr class="tr_Headname"><td class="td_Headname" id-data ="" id="'+HTMLID+'">'+HTML
									+'</td><tr>';
		 
								 
			$('.tb_HeadName').append(HTML_sml);
				
		}
		boxpopSearch_HeadName.style.display = "none";
	
	
}
//----------------------------------------------ฟังก์ชั่น popup ADD  หัวเรื่องเข้าระบบและเพิ่มในหน้าลงรายการ บอปอัพ
function myFunction_add_HeadNamebooks(){
	var ipt_ad = $('.ipt_popSearch_HeadName').val();
	var HTML = '';
	$.ajax({
						url:"../phpsv/ADD_HeadNameBooks.php",
						method:"POST",
						data:{ad_data:ipt_ad},
						dataType:"json",
						success: function(Hnbk){
						//console.log(add);
						if(Hnbk != null){
							
							for(var ix =0; ix <Hnbk.length; ix++){
								HTML +='<tr class="tr_Headname"><td class="td_Headname" id1="'+Hnbk[ix].LINK_ALBUM+'" id="'+Hnbk[ix].id+'">'+Hnbk[ix].name
									+'</td></tr>';
								
								}
								//console.log(HTML);
							$('.tb_HeadName').html(HTML);
								
							}
						
						}
					
					})
					
	$('.ipt_popSearch_HeadName').val("");
	}
//--------------------------------------------------ฟังก์ชั่นคลิกที่ปุ่มเพื่อลบ รายการเพ่ิมเติม  ชุดหัวเรื่องเพิ่มเติม
function myFunction_del_Albummore(){
	var idlinksnum = localStorage.getItem("idalbumtxt");
	var idlinks = $('.ipt_nameregisname').attr('id1');
	//console.log(idlinks);
	if(idlinksnum != null){
	//localStorage.removeItem("idalbumtxt");
				//url:"../phpsv/del_Albummore.php",
			var myobj = document.getElementById(idlinksnum);
			//console.log(myobj);
			
			$.ajax({
					url:"../phpsv/del_Sub_Albummore.php",
					method:"POST",
					data:{idlinksnum:idlinksnum,idlinks:idlinks},
					dataType:"text",
					success: function(det){
						
						
					 alert(det);
						
						}
				
				})
			
		//console.log(idlinksnum);
		myobj.remove();
		localStorage.removeItem("idalbumtxt");
	}

	
}
//-----------------------------------------ad albumNameMore---------ฟังก์ชั่นคลิกที่ปุ่ม เพื่อเพิ่ม รายการ ชื่อเรื่องเพิ่มเติม
function Myfunc_POPUPAd_albummore(){
	var boxpopSearch_AlbumNameMore = document.getElementById('boxModal_popSearch_AlbumNamemore');
	var data = '';
	Search_popup_albumNamemore(data);
	boxpopSearch_AlbumNameMore.style.display="block";
	$(document).on('click', '.close_popSearch_AlbumNamemore',  function(){
		boxpopSearch_AlbumNameMore.style.display="none";
		 $('.ipt_popSearch_AlbumNamemore').val("");
		})
		$(document).on('keyup', '.ipt_popSearch_AlbumNamemore', function(){
				var data = $('.ipt_popSearch_AlbumNamemore').val();
				//console.log(data);
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
					if(result != null){
						
						for(var m =0; m < result.length; m++){
							
							HTML += '<li onClick="myFuncClickSeletList(this)"   id="'+result[m].id_album+'" id1="'+result[m].album_name
									+'" class="li_albumNameMore"><input name="checkbox_albumNameMore" type="checkbox" id="'
									+result[m].id_album+'" id1="text" class="tbcheckbox_albumAlbumNamemore">'+result[m].id_album+":"+result[m].album_name+'</li>';
							
							}
						$('.boxmodal_list_user_AlbumNamemore').html(HTML);
						}
					
					}
			})
	
}
//---------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงแถบสีในรายการชื่อเรื่องเพิมเติม
function myFuncClickSeletList(d){
	var btns =   document.querySelectorAll(".li_albumNameMore");
	//console.log(d);
	//console.log(d.attributes[1].value);
	var id = d.attributes[1].value;
	//console.log(d.attributes[1].value.length);
	var items = document.getElementsByName('checkbox_albumNameMore');
	
	//console.log(id);
	for (var i = 0; i < btns.length; i++) {
	if(btns[i] == d){
		btns[i].style.backgroundColor = 'red';
			items[i].checked=true;
			}else{
								
					items[i].checked=false;
					btns[i].style.backgroundColor = '';
								 //var ttd = btns[i].attributes[1].value;
					  }
	}

}
//--------------------------------------------------ฟังก์ชั่นคลิกที่ปุ่มเพื่อลบ รายการในหัวเรื่อง
function myFunction_del_Headname(){
	var idcode = localStorage.getItem("idHname");
	var idlinks = $('.ipt_nameregisname').attr('id1');
	if(idcode != null){
		
				$.ajax({
						url:"../phpsv/del_HeadName.php",
						method:"POST",
						data:{idcode:idcode,idlinks:idlinks},
						dataType:"",
						success: function(result){
							
							alert(result);
							}
					
					})
	//localStorage.removeItem("idHname");
				//url:"../phpsv/del_HeadName.php?",
			var myobj = document.getElementById(idcode);
		//console.log(idlinksnum);
		myobj.remove();
	}
	
}
//--------------------------------------------------ฟังก์ชั่นPOPUP Search Headname path 1  ปอบอัพค้นหาหัวเรื่อง
function Myfunc_POPUPHeadName(){
	var boxpopSearch_HeadName = document.getElementById('boxModal_popSearch_HeadName');
	var data = '';
	Search_popup_HeadName(data);
	boxpopSearch_HeadName.style.display="block";
	$(document).on('click', '.close_popSearch_HeadName',  function(){
		boxpopSearch_HeadName.style.display="none";
		 $('.ipt_popSearch_HeadName').val("");
		})
		$(document).on('keyup', '.ipt_popSearch_HeadName', function(){
				var data = $('.ipt_popSearch_HeadName').val();
				//console.log(data);
			Search_popup_HeadName(data);
		})
	
	
	
	}
//--------------------------------------------------ฟังก์ชั่นPOPUP Search Headname path 2  ปอบอัพค้นหาหัวเรื่อง		
function Search_popup_HeadName(data){
	var HTML = '';
$.ajax({
			url:"../phpsv/ShowListHeadName.php",
			method:"POST",
			data:{data:data},
			dataType:"json",
			success: function(result){
				if(result != null){
					
					for(var m =0; m < result.length; m++){
						
						HTML += '<li onClick="myFuncClickSeletListHeadName(this)"   id="'+result[m].id_album+'" id1="'+result[m].album_name
								+'" class="li_HeadName"><input name="checkbox_HeadName" type="checkbox" id="'
								+result[m].id_album+'" id1="text" class="tbcheckbox_HeadName">'+result[m].id_album+":"+result[m].album_name+'</li>';
						
						}
					$('.boxmodal_list_user_HeadName').html(HTML);
					}
				
				}
		})


}
//---------------------------------------------------------------Popupฟังก์ชั่นคลิกเลือกให้แสดงแถบสีในรายการ หัวเรื่อง
function myFuncClickSeletListHeadName(d){
		var btns =   document.querySelectorAll(".li_HeadName");
		//console.log(d);
		//console.log(d.attributes[1].value);
		var id = d.attributes[1].value;
		//console.log(d.attributes[1].value.length);
		var items = document.getElementsByName('checkbox_HeadName');
		
		//console.log(id);
		for (var i = 0; i < btns.length; i++) {
		if(btns[i] == d){
			btns[i].style.backgroundColor = 'red';
				items[i].checked=true;
				}else{
									
						items[i].checked=false;
						btns[i].style.backgroundColor = '';
									 //var ttd = btns[i].attributes[1].value;
						  }
		}
	
}
//--------------------------------------------------------------------ฟังก์ชั่น popup ICON delete  หัวเรื่อง  S
function myFunc_Delete_HeadName(){
var checkitem = [];
var data = '';
$('.tbcheckbox_HeadName:checked').each(function(i) {
		   var id_HeadName = checkitem[i] = $(this).attr('id');
			//console.log(id_HeadName);
			//console.log(id_byathor);
			$.ajax({
					url:"../phpsv/Del_HeadNamebooks.php",
					method:"POST",
					data:{idHName:id_HeadName},
					dataType:"text",
					success: function(del){
						//console.log(del);
					Search_popup_HeadName(data);
						
						}
				})
			
		});
		
	
}
//--------------------------------------------------ฟังก์ชั่นคลิกที่ปุ่มเพื่อลบ ผู้แต่งในหน้าลงรายการ
function myFunction_del_Byathor(){
	var idByathor = localStorage.getItem("idByathor");
	var idlinks = $('.ipt_nameregisname').attr('id1');
	if(idByathor != null){
	localStorage.removeItem("idByathor");
	//alert(idlinks);
				//url:"../phpsv/del_Albummore.php",
			var myobj = document.getElementById(idByathor);
		//console.log(idlinksnum);
		$.ajax({
				url:"../phpsv/delete_byauthor.php",
				method:"POST",
				data:{idbyauthor:idByathor,idlinks:idlinks},
				dataType:"text",
				success: function(data){
					alert(data);
					
					}
			
			})
		
		myobj.remove();
	}
	
}		
//-------------------------------------------------ฟังก์ชั่นบันทึกการแก้ไข รายละเอียดของหนังสือ------	
function MyFunc_updateSave_editdetailbook_REGISBOOK(){
	sessionStorage.setItem("str-chkpic", "CHK");
	var att = document.getElementsByClassName('ipt_nameregisname')[0];
	var idlink, namebook, gmd, athor, byathor, count_copy, idphlish, puphlish, year, idalbum, namealbum, lib, isbn, langtxt;
	var arr_byathor = [];
	idlink = $('.ipt_nameregisname').attr('id1');
	name = $('.ipt_nameregisname').val();
	gmd = $('.selecttorGMD option:selected').val();
	athor = $('.ipt_nameregisathor').val();
	byathor = document.querySelectorAll('.td_Byathor');
	//console.log(byathor);
	for(var txt =0; txt < byathor.length; txt++){
		//console.log(byathor[txt].attributes[1].value);
		arr_byathor.push(byathor[txt].attributes[1].value);
		}
		//console.log(arr_byathor);
	count_copy =  $('.ipt_nameregisyearcoppy').val(); 
	puphlish	=  $('.ipt_nameregispuphlish').val();
	idphlish =  $('.ipt_nameregispuphlish').attr('id1');
	year = $('.ipt_nameregisyear').val();	
	langtxt = $(".selecttorlang option:selected").val();
	idalbum_edit =   $('.ipt_nameregisalbum').attr('id5');
	//console.log(idalbum_edit);
	lib =   $('.ipt_nameregislib').val();
	isbn =   $('.ipt_nameregisisbn').val();
	//alert(idalbum_edit);
	//console.log(idalbum);
	SendAjax_update_Editdetailbook(idlink, name, gmd, athor, arr_byathor, count_copy, puphlish, idphlish, year, langtxt, idalbum_edit, lib, isbn);
	
	}
function SendAjax_update_Editdetailbook(idlink, name, gmd, athor, arr_byathor, count_copy, puphlish, idphlish, year, langtxt, idalbum_edit, lib, isbn){
	//console.log(name);
		
	if(idlink != null){
	var vals = '';
	var idLinkbook = '';
		//console.log(gmd);
		$.ajax({
				url:"../phpsv/Update_editdetailbk.php",
				method:"POST",
				data:{idlk:idlink,nbk:name,gmd:gmd,athor:athor,arr_byathor:arr_byathor,
						count_copy:count_copy,phlish:puphlish,idphli:idphlish,
						year:year,langtxt:langtxt,idalbum_edit:idalbum_edit,lib:lib,isbn:isbn},
				dataType:"text",
				success: function(data){
					//alert(data);
					//console.log(data);
					showloadData_ajaxbook(vals, idLinkbook);
					}
			
			})
		var ChangerPic = sessionStorage.getItem("str-chkpic");	
		if(ChangerPic == "CHK"){
			//console.log("test CHK");
			var forData = new FormData();
			var file = $('#default-btn')[0].files[0];
			var strpic = ChangerPic;
			forData.append('file', file);
			forData.append('filename', isbn);
			forData.append('str', strpic);
			//console.log(file.name);
			
			if(isbn.length == 0 ){			
					alert("กรุณากรอก ISBN");
						//console.log(isbn.length);	
						return;			
						}else{
							// console.log("ใช้งานได้แล้ว");		
							 $.ajax({
									url:"../phpsv/InserTAddNewBooks.php",
									method:"POST",
									data:forData,
									contentType:false,
									processData:false,
									success: function(res){
										//console.log(res);
										sessionStorage.removeItem("str-chkpic");
										}			
								 })
			
						}
			
			
			}	
	
			
			
	
		}
		
		//$('.ipt_nameregisalbum').attr("id5");
		// document.getElementsByTagName("H1")[0].removeAttribute("class"); 
		 Delete_att();
	}	
///---------------------------------------------------------------------------------------------------------------------	ฟังชั่นลบ แอนทิบิวต์
function Delete_att(){	
	document.getElementById('albumtxt').removeAttribute("id5");
	document.getElementById('albumtxt').removeAttribute("id1");
	}
//------------------------------------------------------------------ฟังก์ชั่น disabled and enabled หน้าลงรายการ สำหรับการแก้ไขข้อมูล
function Myfunc_Enabled_input_adcatbook(){
	var txtchk = document.getElementById('ipt_idregisPCOPY_no').value;
	var BT_EDIT = document.getElementById("icon_btn_editregis");
	//console.log(BT_EDIT);
	var ipt_barcode = document.getElementsByClassName("ipt_regisPCOPY_barcode");
	var check = document.getElementsByName("name_iptinsertlist");
	var check_input = document.getElementsByName("name_iptinsertcat");
	//var icon_disble = document.getElementById('iconAdd_byathor');
	var icon_dis = document.querySelectorAll('#icon_adcat');
	var icon_btAD = document.querySelectorAll('.bt_discheck_adcat');
	var page_status = localStorage.getItem("status");
 if(page_status == 2)// ให้เมนูทุกอย่างทำงานเมื่อ status page = 2 
 		{
			if(txtchk != ''){
				if(BT_EDIT.style.color== ""){
					BT_EDIT.style.color='red';				
					}else{
						BT_EDIT.style.color= '';
						upDateData_pageinsertList();
						}
				
				for(var t =0; t< icon_dis.length; t++){	
					//check.disabled = false;
				if(icon_dis[t].style.display == "none"){
					//console.log(icon_dis[t].style.display);
					icon_dis[t].style.display = "inline-table";
					}else{
						//console.log(icon_dis[t].style.display);
						icon_dis[t].style.display = "none";
						}	
				}
				
				
				for(var bt = 0; bt < icon_btAD.length; bt++){
					if(icon_btAD[bt].disabled == false){
						icon_btAD[bt].disabled = true;
						}else{
							icon_btAD[bt].disabled = false;
							}
					
					}
					
					
						for(var i =0; i < check.length; i++){
						
								if(check[i].disabled  == false){
									check[i].disabled = true;
									//console.log(check[i].disabled = true);
									
									}else{
										check[i].disabled = false;
										//console.log(check[i].disabled = false);
										//console.log("true");
										}
							}
							for(var ip = 0; ip < check_input.length; ip++){
								if(check_input[ip].disabled  == false){
									check_input[ip].disabled = true;
									//console.log(check[i].disabled = true);
									
									}else{
										check_input[ip].disabled = false;
										//console.log(check[i].disabled = false);
										//console.log("true");
										}
								
								}
			}else{
				stop;
			}

		}
		
	}
function clickeopentab(){
		window.open("../file-page/books-hit.php");
}
//---------------------------------------ฟังก์ชั่น  barcode auto page copy  
function myFunc_ADD_NewBarcodeAuto(){
	var chk_IDlink = $('.ipt_regisPCOPY_no').val();
	var numcat = document.getElementById('id_namecatbook').value;
	var bynum = document.getElementById("id_byauthor").value;
	
	if(chk_IDlink.length <=0){
			alert("กรุณาเลือกหนังสือจากรายการหนังสือ");
			return;
		}else{
			var barCode = localStorage.getItem("bCode_at");							
					var boxpopAddbarcodeAuto = document.getElementById('boxModal_popAdbarCodeAuto');
					boxpopAddbarcodeAuto.style.display ='block';
					//console.log(barCode);
					//console.log(barCode);
					
					var sum, numBer;
					if(barCode != null){
						
						if(isNaN(barCode)){
										//console.log("อักขร");
										//console.log(code);
										var Zero = 0;
										var strsub =  barCode.substr(0, 1); //F
										var myString = barCode.replace(/\D/g,'');//08080
										//console.log(myString);
										var intnum = parseInt(myString)+1;//8081
										var tostr = String(intnum);
										//console.log(tostr);
										
									if(tostr.length < 5){
											var xsum = Zero+tostr;
											numBer  = strsub+xsum;
											//console.log(xsum);
											//console.log("test น้อยกว่า 5");
											}else{
												//console.log("test เท่ากัีบ 5");
												numBer = strsub+tostr;
												}
										
										}else{ //211791
											console.log("test  else isNan");
												var numBer = parseInt(barCode)+1;//8081
											}
											//console.log(numBer);
					$('.ipt_adAutoBarcode').val(numBer);
					}
				 
					
					if(bynum != null){
						var id_key = "C";
							var idlink = "";
							//console.log(numcat);
							$('.ipt_regisPCOPY_cat').val(numcat);
							$('.ipt_regisPCOPY_byauthor').val(bynum);
							//click_ToFunc_statusSelect(idlink, id_key);
						}
					
					
					 document.getElementById("bt_adAutoBarcode").focus();
					$('.ipt_adAutoBarcode').change(function(){
						 document.getElementById("bt_adAutoBarcode").focus();
						
						})
						
			}
		
	
}
//-------------------------------------------------ฟังก์ชั่น ปิดเปิดสำหรับการแก้ไขข้อมูลหน้าลงทะเบียน detail regis books
function Myfunc_Enabled_input_regisbooks(){
	var BT_EDIT = document.getElementById("icon_btn_editregis");
	//console.log(BT_EDIT);
	var idlink = document.getElementById('ipt_idregisPCOPY_no').value;
	var phibup = document.getElementsByClassName("ipt_nameregispuphlish");
	//console.log(phibup);	
	var check = document.getElementsByName("nameregis");
	//var icon_disble = document.getElementById('iconAdd_byathor');
	var icon_dis = document.querySelectorAll('#icon_byathor');
	var icon_btAD = document.querySelectorAll('.bt_disble_check');
	var page_status = localStorage.getItem("status");
	var bTn_iptpic = document.getElementById("custom-btn");
	//console.log(page_status);
	if(page_status == 1)// ให้เมนูทุกอย่างทำงานเมื่อ status page = 1 
		{
			if(idlink != ''){
					if(BT_EDIT.style.color== ""){
						BT_EDIT.style.color='green';
						}else{
							BT_EDIT.style.color= '';
							MyFunc_updateSave_editdetailbook_REGISBOOK();
							}
					
					for(var t =0; t< icon_dis.length; t++){	
						//check.disabled = false;
					if(icon_dis[t].style.display == "none"){
						//console.log(icon_dis[t].style.display);
						icon_dis[t].style.display = "inline-table";
						}else{
							//console.log(icon_dis[t].style.display);
							icon_dis[t].style.display = "none";
							}	
					}
					
					
					for(var bt = 0; bt < icon_btAD.length; bt++){
						if(icon_btAD[bt].disabled == false){
							icon_btAD[bt].disabled = true;
							}else{
								icon_btAD[bt].disabled = false;
								}
						
						}
						
						
							for(var i =0; i < check.length; i++){
							
									if(check[i].disabled  == false){
										check[i].disabled = true;
										//console.log(check[i].disabled = true);
										}else{
											check[i].disabled = false;
											//console.log(check[i].disabled = false);
											//console.log("true");
											}
								}
								if(bTn_iptpic.disabled == false){						
									bTn_iptpic.disabled = true;
									}else{
										bTn_iptpic.disabled = false;
										}
				}else{
					stop;
			}	
					
		}
		document.getElementById("ipt_nameregispuphlish").disabled = true;
		document.getElementById("albumtxt").disabled = true;
	}
//-------------------------------------------------ฟังก์ชั่น เลือกรูปภาพ อัพโหลด หน้าลงทะเบียนหนังสือ 
function defaultBtnActive(){
	var defaultBtn = document.querySelector("#default-btn");
	defaultBtn.click(func_IputFilePicturebooks(defaultBtn));

}
function func_IputFilePicturebooks(defaultBtn){
		sessionStorage.setItem("str-chkpic", "CHK");
		var wrapper  = document.querySelector(".content_boxpic");
		var customBtn = document.querySelector("#custom-btn");
		var cancelBtn = document.querySelector("#cancel-btn");
		var img = document.querySelector("#img-picturenewbooks");
		defaultBtn.addEventListener("change", function(){
			var file = defaultBtn.files[0];
				//console.log(file);
				if(file){
						var reader = new FileReader();
							reader.onload = function(){
						var result =reader.result;
							img.src = result;
							img.style.width="120px";
							wrapper.classList.add("active");
						}
						cancelBtn.addEventListener("click", function(){
								img.src = "";
						})
					reader.readAsDataURL(file);
					}
		});
}
//------------------------------------------------------------------------------------ฟังก์ชั่น Addสำนักพิมพ์ใหม่เข้าระบบ
function myFunction_add_Puphlish(){
	var Puphlish_name = $('.ipt_popSearch_Puphlish').val();
	var location_name = $('.box_phlish_location').val();	
	var HTML ='';
	var HTMLID = '';
	var elemt = document.getElementsByClassName("ipt_nameregispuphlish")[0];
	
	if(Puphlish_name == ""){
		document.getElementById('ipt_popSearch_Puphlish').className ='action_phlish';
	}else{
		if(location_name == ""){
			document.getElementById('box_phlish_location').className ='action_phlish';
			}else{
				//console.log(location_name);
				$.ajax({
					url:"../phpsv/Add_Puphlish.php",
					method:"POST",
					data:{val:Puphlish_name, loca:location_name},
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
								 
						
							$('.ipt_nameregispuphlish').val(HTML);
								var att = document.createAttribute('id1');
									att.value = HTMLID;
									 elemt.setAttributeNode(att);
							
							}
						
						
						}
				
					})
					$('.ipt_popSearch_Puphlish').val("");
					$('.box_phlish_location').val("");	
					var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
						boxpopSearch_Puphlish.style.display="none";	
				
				}
		
		
		}
	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function myFunc_Delete_byathor(){
	var checkitem = [];
	var data = '';
	$('.tbcheckbox_byathor:checked').each(function(i) {
               var id_byathor = checkitem[i] = $(this).attr('id');
				//console.log(checkitem[i]);
				//console.log(id_byathor);
				$.ajax({
						url:"../phpsv/Del_byathor.php",
						method:"POST",
						data:{val:id_byathor},
						dataType:"text",
					})
				
            });
			SearchAjax_byathor(data);
			$('.ipt_popSearch_byathor').val("");
		
}
//----------------------------------------path 1---------ฟังก์ชั่นเซิฟการเพิ่มหนังสือเข้าระบบ ลงทะเบียนหนังสือ 
function myFunc_Save_AddNewbook(){
	var BT_EDIT = document.getElementById("icon_btn_addNewbook");	
	var Btn_copy = document.getElementById("btn-copy-detail");	
	var arr_byathor =[];
	var arr_input = [];
	var namebk, GMD, author, byauthor, copy, Publis, year, lang, album, page, isbn, PubText;	
	//---ajax php database book_store ----------------------	 
	 // var fileup = new FormData();
	 //console.log(fileDATA);	 
	  namebk = $(".ipt_nameregisname").val();
	  GMD = $(".selecttorGMD").val();
	  Publis = $(".ipt_nameregispuphlish").attr("id1");
	  PubText = $(".ipt_nameregispuphlish").val();
	  year = $(".ipt_nameregisyear").val();
	  lang = $(".selecttorlang").val();
	  page = $(".ipt_nameregislib").val();
	  isbn = $(".ipt_nameregisisbn").val();
	  
	arr_input= [namebk, GMD, Publis, year, lang, page, isbn];
	//---END ajax php database book_store-------------------------- 
	  byauthor = document.querySelectorAll(".td_Byathor");
	   author = $('.ipt_nameregisathor').val();
	   copy = $(".ipt_nameregisyearcoppy").val();
	   album = $(".ipt_nameregisalbum").attr("id5");
	// console.log(byauthor.attributes);
	 for(var txt =0; txt < byauthor.length; txt++){
		//console.log(byauthor[txt].attributes[1].value);
		arr_byathor.push(byauthor[txt].attributes[1].value);
		}
		//console.log(arr_input);
		if(GMD == ""){
			alert("กรุณาเลือก GMD");
			}else if(copy ==""){
				alert("กรุณากรอกข้อมูล พิมพ์ครั้งที่");
				}else if(PubText == ""){
					alert("กรุณากรอกข้อมูล สำนักพิมพ์");
					}else if(year == ""){
						alert("กรุณากรอกข้อมูล ปีที่พิมพ์");
						}else if(lang ==""){
							alert("กรุณากรอกข้อมูล ประเทศ");
							}else if(isbn == ""){
									alert("กรุณากรอกข้อมูล ISBN");
									
									}else if(isbn != ''){
										var func =  func_checkLength(isbn);
											 if(func.length > 13){
													alert("จำนวนอักษรมากว่า13 ตัว จำนวนที่มี:"+func.length);	
													//console.log(func.length);	
													return;
													}else if(func.length <13){
														alert("จำนวนอักษรน้อยกว่า 13 ตัว จำนวนที่มี:"+func.length);
														//console.log(func.length);
														return;	
														}else{
															Btn_copy.style.color='';
															BT_EDIT.style.color= '';
														//console.log(isbn);
														//console.log(" successfully");
														myFunc_Save_ADDPictureNewbook_ajax(isbn, namebk);//รอเปิดใช้งาน
														myFunc_Save_ADDNewbook_ajaxDetail(arr_input, arr_byathor, author, album, copy);
														}
										}
		
}
//-------------------------------------------------------------ฟังก์ชั่นดับเบิลคลิกเพื่อเลือกผู้แต่งที่จะลบ	
function MyFunc_dbClickDel_Byathor(b){
	var btns =   document.querySelectorAll(".td_Byathor");
			//console.log(btns);
			//console.log(btns);
			var id = b.attributes[1].value;
			//console.log(id);
			//console.log(id);
			for (var i = 0; i < btns.length; i++) {
			if(btns[i] == b){
				btns[i].style.backgroundColor = 'red';
				localStorage.setItem("idByathor", id);
				
					}else{
							btns[i].style.backgroundColor = '';
							//localStorage.removeItem("idalbumtxt");
									 	//var ttd = btns[i].attributes[1].value;
							  }
			}
	
	}
function func_checkLength(isbn){
	 var str = isbn.replace(/\s/g, '');
	return str;		
}
//------------------------------------------ฟังก์ชั่นการลบข้อมูลหน้า ลงทะเบียนและหน้าลงรายการ	
function Myfunc_delete_detail_bkstore(idlink){
	var idlink = $('.ipt_regisPCOPY_no').val();
	var vals ='';
	var idLinkbook = '';
	if(idlink != ''){
			$('.lb_DeletePRegis').text(idlink);
			var popupdel = document.getElementById("boxModal_popDeletePRegis");
				popupdel.style.display="block";
			}
			$(document).ready(function() {
				var popupdel = document.getElementById("boxModal_popDeletePRegis");
              $('.bt_DeletePRegis').click(function(){
				  
				 // alert("Click.del");
				  $.ajax({
					  	url:"../phpsv/delete_Regis.php",
						method:"POST",
						data:{idlink:idlink},
						dataType:"json",
						success: function(data){
													
							 showloadData_ajaxbook(vals, idLinkbook);
							}
					  })
				   popupdel.style.display='none';				   
				  }) 			    
            });
			$(document).ready(function() {
				 $('.close_popDeletePRegis').click(function(){
					var popupdel = document.getElementById("boxModal_popDeletePRegis");
					   popupdel.style.display='none';
					   })
			});		
}	
//----------------------------path 2---------------------ฟังก์ชั่น เซิฟการเพิ่มหนังสือเข้าระบบ ลงทะเบียนหนังสือ 	
function myFunc_Save_ADDNewbook_ajaxDetail(arr_input, arr_byathor, author, album, copy){
	//console.log(author);
			$.ajax({
					url:"../phpsv/AddNewBook_detail.php",
					method:"POST",
					data:{arr_input:arr_input,arr_byathor:arr_byathor,author:author,album:album,copy:copy},
					dataType:"json",
					success: function(data){
						//console.log(data);
						
						if(data.ercode == 2 ){
							alert("ISBN มีอยู่ในระบบแล้ว");
							return;
							}else if(data.ercode == 3){
								alert("inser detail error");
								return;
								}else if(data.ercode == 4){
								alert("Insert_Author error");
								return;
								}else if(data.ercode == 5){
								alert("Insert_copy error");
								return;
								}else if(data.ercode == 6){
								alert("Insert_Albumbooks error");
								return;
								}
								if(data.idLink != null){
								var idLinkbook = data.idLink;
								var vals = '';
								showloadData_ajaxbook(vals, idLinkbook);
								}
								//alert("test");
								oPen_Enable_input();
								var BTN_ADD = document.getElementById("btn_addbooks");
								var Btn_copy = document.getElementById("btn-copy-detail");
								Btn_copy.style.display = "none";
								BTN_ADD.style.display = "none";	
						
						}
						
				
				})
		
				
		
}
function myFunc_Save_ADDPictureNewbook_ajax(isbn, namebk){
	//console.log(isbn);
	   var forData = new FormData();
			   var file = $('#default-btn')[0].files[0];
			   //console.log(file);
			   forData.append('file', file);
			   forData.append('filename', isbn);
			   //console.log(forData);
	   if(namebk.length == 0){
		   alert("กรุณากรอกชื่อหนังสือที่ต้องการ" + namebk);
		   //console.log(namebk.length);
		   }else if(isbn.length == 0 ){			
			   alert("กรุณากรอก ISBN" + isbn);
				   //console.log(isbn.length);				
				   }else{
					   //ใช้งานได้แล้ว		
						$.ajax({
							   url:"../phpsv/InserTAddNewBooks.php",
							   method:"POST",
							   data:forData,
							   contentType:false,
							   processData:false,
							   success: function(res){
								   //console.log(res);
								   }			
							})
	   
				   }
		   
}			
//-------------------------------------------------------ฟังก์ชั่น popup ADD  ชื่อเรื่องเพิ่มเติมในหน้า บิปอัพ
function myFunction_add_AlbumNamemore(){
	var ipt_ad = $('.ipt_popSearch_AlbumNamemore').val();
	var HTML = '';
	$.ajax({
						url:"../phpsv/ADD_album_namemore.php",
						method:"POST",
						data:{ad_data:ipt_ad},
						dataType:"json",
						success: function(add){
						console.log(add);
						if(add != null){
							
							for(var ix =0; ix <add.length; ix++){
								HTML +='<tr class="tr_more"><td class="td_more" id="'+add[ix].id+'">'+add[ix].name
									+'</td><tr>';
								
								}
							$('.tb_moreHeadname').html(HTML);
								
							}
						
						}
					
					})
					
	$('.ipt_popSearch_AlbumNamemore').val("");
	}
//------------------------------------------------------------------------------------ฟังก์ชั่น Add ชื่อชุดหนังสือ 
function myFunction_add_Album(){
	//alert("test myFunction_add_Album");
	
	var Ablum_name = $('#ipt_popSearch_Album').val();
	var HTML ='';
	var HTMLID = '';
	var elemt = document.getElementsByClassName("ipt_nameregisalbum")[0];
	if(Ablum_name == ""){
		document.getElementById('ipt_popSearch_Album').className ='action_Album';
	}else{
		//alert(Ablum_name);
				$.ajax({
					url:"../phpsv/Add_Album.php",
					method:"POST",
					data:{val:Ablum_name},
					dataType:"json",
					success: function(result){
						//console.log(HTML);
						//alert(result);
						if(result != null){
							
							for(var ix =0; ix <result.length; ix++){
								HTML = result[ix].name;
								HTMLID = result[ix].id;
								//console.log(HTMLID);
								//console.log(HTML);
								}
							$('.ipt_nameregisalbum').val(HTML);
								var att = document.createAttribute('id5');
									att.value = HTMLID;
									 elemt.setAttributeNode(att);
									// console.log(elemt);
							}
						
						
						}
				
					})
					$('.ipt_popSearch_Puphlish').val("");
					var boxpopSearch_Album = document.getElementById('boxModal_popSearch_Album');
						boxpopSearch_Album.style.display="none";
				
		}
	
	}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete ชื่อชุดหนังสือ
function myFunc_Delete_Album(){	
	var data = '';

              var id_album = localStorage.getItem("idAlbum");
				//console.log(id_album);
				$.ajax({
						url:"../phpsv/Del_Album.php",
						method:"POST",
						data:{val:id_album},
						dataType:"text",
						success: function(result){
							data = result;
							Myfunc_SearchAlbum(data);
							
							}
					})
				
          
			
			$('.ipt_popSearch_Album').val("");
		localStorage.removeItem("idAlbum");
		$('.ipt_nameregisalbum').val("");
	}
//---------------------------------------------------------------ฟังก์ชั่น Add  ผู้แต่งเข้าระบบ
function myFunctio_popupnAdbyathor(){
	var Byathor_name = $('.ipt_popSearch_byathor').val();
	var HTML ='';
	if(Byathor_name != null){
		//console.log(val);
		$.ajax({
				url:"../phpsv/Add_byathor.php",
				method:"POST",
				data:{val:Byathor_name},
				dataType:"text",
				success: function(result){
					HTML += '<tr class="tr_Byathor"><td class="td_Byathor" id="'+result+'">'+Byathor_name+'</td></tr>';
					//console.log(HTML);
					$('.tb_Byathor').append(HTML);
					}
			
			})
			
			
			
		}
		$('.ipt_popSearch_byathor').val("");
		var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_byathor');
	boxpopSearch_Puphlish.style.display="none";
	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น delete  ผู้แต่งเข้าระบบ
function myFunc_Delete_Puphlish(){
	
	var id = sessionStorage.getItem("delPl");
	//console.log(id);
	var data = "";;
				$.ajax({
						url:"../phpsv/Del_Puphlish.php",
						method:"POST",
						data:{val:id},
						dataType:"text",
					})			
          	sessionStorage.removeItem("delPl");		
			$('.ipt_popSearch_Puphlish').val("");
			$('.box_phlish_location').val("");	
			KeyUpADD_puphlish(data);	
}
//------------------------------------------------------------------------------------ฟังก์ชั่นดับเบิลคลิกเพื่อเลือกชุดของหนังสือ
function MyFunc_doubleClickSelectAdd_Album(xt){
	var boxpopSearch_Album = document.getElementById('boxModal_popSearch_Album');
	var elemt = document.getElementsByClassName("ipt_nameregisalbum")[0];
	//console.log(xt);
	var HTML, HTMLID;
	if(xt!= null){
		 HTML = xt.attributes[2].value;
		 HTMLID = xt.attributes[1].value;
			
			$('.ipt_nameregisalbum').val(HTML);
				var att = document.createAttribute('id5');
				 att.value = HTMLID;
				 elemt.setAttributeNode(att);
			
			//console.log(elemt);
			boxpopSearch_Album.style.display="none";
		}
}
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงแถบสีในรายการชุดหนังสือ
function myFuncClickADDAlbum(d){
    var btns =   document.querySelectorAll(".li_album");
    //console.log(btns);
    //console.log(d.attributes[1].value);
    var id = d.attributes[1].value;
    //console.log(d.attributes[1].value.length);
    //console.log(id);
    localStorage.setItem("idAlbum", id);
    for (var i = 0; i < btns.length; i++) {
    if(btns[i] == d){
        btns[i].style.backgroundColor = 'red';				
            }else{
                    btns[i].style.backgroundColor = '';
                                 //var ttd = btns[i].attributes[1].value;
                      }
    }

//console.log(idalbum);
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup search album book List แสดงรายการที่ค้นหา 			
function Myfunc_SearchAlbum(data){
	//console.log(data);
		
					var HTMLX ='';
		$.ajax({
				url:"../phpsv/SearCH_Album.php",
				method:"POST",
				data:{data:data},
				dataType:"json",
				success: function(album){
					if(album != null){
						
						for(var i =0; i < album.length; i++){
							
							HTMLX += '<li onClick="myFuncClickADDAlbum(this)"   id="'+album[i].id_album+'" id1="'+album[i].album_name
									+'" class="li_album">'+album[i].album_name+'</li>';
							
							
							}
					
						
						}
				
					$('.boxmodal_list_user_Album').html(HTMLX);
					//console.log(HTMLX);
					
					}
			
			})
}	
//------------------------------------------------------------------------------------ฟังก์ชั่น popup search album book  ค้นหาอัลบั้มชุดหนังสือ					
function Myfunc_POPUPAlbum(){
    var boxpopSearch_Album = document.getElementById('boxModal_popSearch_Album');
        boxpopSearch_Album.style.display ="block";
    var data = "";
        Myfunc_SearchAlbum(data);
        $(document).on('click', '.close_popSearch_Album',  function(){
            boxpopSearch_Album.style.display="none";
            })
        $(document).on('keyup', '.ipt_popSearch_Album', function(){
            var data = $(this).val();
            //console.log(data);
        Myfunc_SearchAlbum(data);
})	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup ค้นหา  สำนักพิมพ์	
function Myfunc_POPUPpuphlish(){
	var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
	boxpopSearch_Puphlish.style.display ="block";
	var data = "";
	KeyUpADD_puphlish(data);
	$(document).on('keyup', '.ipt_popSearch_Puphlish', function(){
		var data = $(this).val();
		//console.log(data);
	KeyUpADD_puphlish(data);
	})
	
	//console.log(data);	
}
//------------------------------------------------------------------------------------ฟังก์ชั่น popup ค้นหา และแสดงรายการสำนักพิมพ์
function KeyUpADD_puphlish(data){
	var HTMLX ='';
		$.ajax({
				url:"../phpsv/SearCH_Puphlish.php",
				method:"POST",
				data:{data:data},
				dataType:"json",
				success: function(puphlish){
					if(puphlish != null){
						HTMLX += '<ul class="ul_puphlish">';
						for(var i =0; i < puphlish.length; i++){
							
							HTMLX += '<li  id="'+puphlish[i].PUBID_tb+'" class="li_puphlish" onClick="myFuncDel(this)";>'+puphlish[i].PUBNAME+'.....,'+puphlish[i].PUBADRESS+'</li>';
							
							
							}
						HTMLX +='</ul>';
						
						}
				
					$('.boxmodal_list_user_Puphlish').html(HTMLX);
					//console.log(HTMLX);
					
					}
			
			})	
	}
function myFuncDel(d){	
        var btns =   document.querySelectorAll(".li_puphlish");
                //console.log(d);
                //console.log(d.attributes[1].value);
                var id = d.getAttribute("id");			
                //console.log(id);
                for (var i = 0; i < btns.length; i++) {
                if(btns[i] == d){
                    btns[i].style.backgroundColor = 'red';
                    sessionStorage.setItem("delPl", id);
                        }else{
                                            
                                
                                btns[i].style.backgroundColor = '';
                                             //var ttd = btns[i].attributes[1].value;
                                  }
                }
}
//------------------------------------------------------------------------------------ฟังก์ชั่นดับเบิลคลิกเพื่อเลือกสำนักพิมพ์
function MyFunc_doubleClickSelectAdd_puphlish(t){
	var boxpopSearch_Puphlish = document.getElementById('boxModal_popSearch_Puphlish');
	var elemt = document.getElementsByClassName("ipt_nameregispuphlish")[0];
	//console.log(t);
	var HTML, HTMLID;
	if(t!= null){
		
			//console.log(t.getAttribute("id"));
			HTMLID = t.getAttribute("id");
			HTML = t.innerText;
			//console.log(t.innerText);						 
			$('.ipt_nameregispuphlish').val(HTML);
				var att = document.createAttribute('id1');
				 att.value = HTMLID;
				 elemt.setAttributeNode(att);
			//$('.ipt_nameregispuphlish').attr("id").value(HTMLID);
			//console.log(elemt);
			boxpopSearch_Puphlish.style.display="none";
		}
}    
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสีของผู้แต่ง อิลิเม้นท์ที่เลือก
function myFuncClickAthor(x){
    var btns =   document.querySelectorAll(".li_byathor");
    //console.log(x);
    //console.log(x.attributes[1].value);
    var id = x.attributes[1].value;
    //console.log(x.attributes[1].value.length);
    var items = document.getElementsByName('checkbox_byathor');
    
    //console.log(id);
    for (var i = 0; i < btns.length; i++) {
    if(btns[i] == x){
        btns[i].style.backgroundColor = 'red';
            items[i].checked=true;
            }else{
                                
                    items[i].checked=false;
                    btns[i].style.backgroundColor = '';
                                 //var ttd = btns[i].attributes[1].value;
                      }
    }

}
//------------------------------------------------------------------------------------ฟังก์ชั่นดับเบิลคลิกเพื่อเลือกผู้แต่ง
function MyFunc_doubleClickSelectAdtext(t){
	var boxpopSearch_byathor = document.getElementById('boxModal_popSearch_byathor');
	//console.log(t.attributes[2].value);
	var HTMLBY ='';
	if(t!= null){
	 HTMLBY += '<tr class="tr_Byathor"><td class="td_Byathor" id="'+t.attributes[1].value+'">'+t.attributes[2].value
	 			+'</td></tr>';
		}
	$('.tb_Byathor').append(HTMLBY);
	boxpopSearch_byathor.style.display="none";	
}
//-------------------------------------------------ฟังก์ชั่น แสดงข้อมูลใน popup search by athor------	
function SearchAjax_byathor(data){
	//console.log(data);
		var HTML_athor ="";
			$.ajax({
					url:"../phpsv/Search_byathor.php",
					method:"POST",
					data:{data:data},
					dataType:"json",
					success: function(result){
					
						if(result != null){
							for(var i = 0; i < result.length; i++){
									HTML_athor += '<li onClick="myFuncClickAthor(this)"  id="'+result[i].LINKCODE+'" id1="'+result[i].NAME_BY
									+'" class="li_byathor"><input name="checkbox_byathor" type="checkbox" id="'
									+result[i].LINKCODE+'" id1="text" class="tbcheckbox_byathor">'+result[i].NAME_BY+'</li>';									
								}
							}
						//alert(dataathor.length);
						//console.log(HTML_athor);
					$('.boxmodal_list_user_byathor').html(HTML_athor);	
						}
						
				})
				
}
//-------------------------------------------------ฟังก์ชั่น เมื่อคลิกปุ่มบวกในหน้าบอปอัพ แสดงค่า Select option อื่นๆ หน้าลงทะเบียน		
function Show_Select_page_Regis(){
    var OPTION = '<option value="">NOT FOUNT</option>';
    var HTML_OP ='<option value="">Select Leng</option>';
    var Nal = ['TH','EN'];
        $.ajax({
                    url:"../phpsv/showSelectTYPE.php",
                    method:"POST",
                    dataType:"json",
                    success: function(result){
                        for(var ar = 0; ar < result.length; ar++){
                        
                            OPTION += '<option value="'+result[ar].KEY_GMD+'">'+result[ar].NAME_GMD+'</option>';
                            }
                            $('.selecttorGMD').html(OPTION);
                        
                        }
        })
    
     for(var lg =0; lg < Nal.length; lg++){
         HTML_OP +='<option value="'+Nal[lg]+'">'+Nal[lg]+'</option>';
         }
    $('.selecttorlang').html(HTML_OP);

}	
//-------------------------------------------------ฟังก์ชั่น เมื่อคลิกปุ่มบวกในหน้าบอปอัพ เพิ่มหนังสือเข้าระบบ หน้าลงทะเบียน		
function Click_ADDNewBooks_regis(){
	//alert("test 25413");
	var nameBooks = $('.ipt_popSearch_Addnewbooks').val();
	$('.ipt_nameregisname').val(nameBooks);
	var boxpopSearch_Addnewbooks = document.getElementById('boxModal_popSearch_Addnewbooks');	
		boxpopSearch_Addnewbooks.style.display="none";	
		show_BTN_Save_regisbooks();	
	oPen_Enable_input();
	Show_Select_page_Regis();
}
function show_BTN_Save_regisbooks(){
	
    var btn_saveRGbook = document.getElementById("btn_addbooks");		
    //console.log(Btn_copy.style.display);
    if(btn_saveRGbook.style.display == "none"){
        btn_saveRGbook.style.display = "block";			
        }else{
            btn_saveRGbook.style.display = "none";				
            }	

}
function hiden_BTN_Save_regisbooks(){
    var btn_saveRGbook = document.getElementById("btn_addbooks");
    //console.log(btn_saveRGbook.style.display);
    if(btn_saveRGbook.style.display == "block"){
        btn_saveRGbook.style.display = "none";
        }else{
            btn_saveRGbook.style.display = "black";
            }
}
/*--------------------------------------------- ฟังชั้นสำหรับก๊อปปี้ข้อมูลหนังสือเก่า*/		
function Myfunc_Enabled_input_regis_copydetail(){
	
	//console.log(BT_EDIT);
	var Btn_copy = document.getElementById("btn-copy-detail");
	var check = document.getElementsByName("nameregis");
	//var icon_disble = document.getElementById('iconAdd_byathor');
	var icon_dis = document.querySelectorAll('#icon_byathor');
	var icon_btAD = document.querySelectorAll('.bt_disble_check');
	var page_status = localStorage.getItem("status");
	var bTn_iptpic = document.getElementById("custom-btn");
	//console.log(page_status);
	if(page_status == 1)// ให้เมนูทุกอย่างทำงานเมื่อ status page = 1 
		{
			
			if(Btn_copy.style.color== ""){
				Btn_copy.style.color='red';
				 show_BTN_Save_regisbooks();
				}else{
					Btn_copy.style.color= '';					
					}
			
			
			for(var t =0; t< icon_dis.length; t++){	
				//check.disabled = false;
			if(icon_dis[t].style.display == "none"){
				//console.log(icon_dis[t].style.display);
				icon_dis[t].style.display = "inline-table";
				}else{
					//console.log(icon_dis[t].style.display);
					icon_dis[t].style.display = "none";
					}	
			}
			
			
			for(var bt = 0; bt < icon_btAD.length; bt++){
				if(icon_btAD[bt].disabled == false){
					icon_btAD[bt].disabled = true;
					}else{
						icon_btAD[bt].disabled = false;
						}
				
				}
				
				
					for(var i =0; i < check.length; i++){
					
							if(check[i].disabled  == false){
								check[i].disabled = true;
								//console.log(check[i].disabled = true);
								}else{
									check[i].disabled = false;
									//console.log(check[i].disabled = false);
									//console.log("true");
									}
						}
						if(bTn_iptpic.disabled == false){						
							bTn_iptpic.disabled = true;
							}else{
								bTn_iptpic.disabled = false;
								}	
					
		}
		
}
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงสี อิลิเม้นท์ที่เลือก
function myFuncClickSelect(t){	
    var popup = document.getElementById("boxModal_popSearch_Addnewbooks");		
    var id = t.getAttribute("id1");
        mYFunc_AllHub(id);
        popup.style.display="";
    var Btn_copy = document.getElementById("btn-copy-detail");
    Btn_copy.style.display=""; 
}
//-------------------------------------------------ฟังก์ชั่น ปิดเปิดสำหรับการเพิ่มหนังสือใหม่เข้าระบบ ลงทะเบียนหนังสือ 
function mYFunc_enabled_Addnew_Regisboos(NumPage){
    var BT_EDIT = document.getElementById("icon_btn_addNewbook");			
        var BTADD_COPY = document.getElementById("btn_addNew_copy");
        var STWORK = '0';
        //console.log(BTN_ADD.style.display="block");
                
        //alert(NumPage);
        if(NumPage == 1){
            //หน้าลงทะเบียน
            //console.log(BT_EDIT.style.color);			
                if(BT_EDIT.style.color== ""){
                    BT_EDIT.style.color='green';							
                    
                    Clear_innerHTML_PRegisbook();
                    }else{
                        hiden_BTN_Save_regisbooks();
                        BT_EDIT.style.color= '';							
                        oPen_Enable_input();                      
                        }

                }else if(NumPage == 3){
                            if(BT_EDIT.style.color== ""){
								var txtchk = document.getElementById('ipt_idregisPCOPY_no').value;
								console.log(txtchk);
								if(txtchk != ''){
									BT_EDIT.style.color='red';
									BTADD_COPY.style.display="block";
									Clear_Html_pageCopyAddNewNbook();
									EnableAndDisable_inputPageCopy();
									show_Type_tb();
									Show_dealerbook_tb();
									show_status_books();
                                 	StatusWork_book(STWORK);	
								}else{
									stop;
								}
                                
                            }else{
                                        BT_EDIT.style.color= '';
                                        BTADD_COPY.style.display="none";
                                        EnableAndDisable_inputPageCopy();
                                    }
                            }

}
//-------------------------------------------------ฟังก์ชั่น แสดงสถานะหนังสือ catalogued หลังคลิกเพิ่มหนังสือใหม่		
function show_status_books(){
    var check = $('.ipt_namecatbook').val();
    //console.log(check);
    var HTML_stt = '';
    if(check.length <= 0){
                    var type = "A";
                    }else{
                        var type = "C";
                        }
    $.ajax({
            url:"../phpsv/show_statusbooks.php",
            method:"POST",
            data:{type:type},
            dataType:"json",
            success: function(data){
            //console.log(check.length);
                        for(var st = 0; st < data.length; st++){
                            
                                    HTML_stt  += '<option value="'+data[st].KEY_TYPE+'">- '+data[st].NAME_KEY+'-</option>';
                                    
                            
                            }
                            $('.sel_regisPCOPY_status').html(HTML_stt);	
                }
                
            
        
        })
}
//-------------------------------------------------ฟังก์ชั่น แสดงตัวแทนจำหน่ายหนังสือ หลังคลิกเพิ่มหนังสือใหม่	
function Show_dealerbook_tb(){
    var Dealbook = '';
    $.ajax({
            url:"../phpsv/show_dealerbook.php",
            method:"POST",
            dataType:"json",
            success: function(deal){
                //console.log(data);
                    Dealbook += '<option value="">-SELECT DEALER-</option>';
                    for(var dx = 0; dx<deal.length; dx++){
                    Dealbook += '<option value="'+deal[dx].IDKEY_Dealer+'">- '+deal[dx].NAME_DEALER+'-</option>';
                    }
                        $('.sel_regisPCOPY_dealer').html(Dealbook);	
                }
                
            
        
        })
                        
}
//-------------------------------------------------ฟังก์ชั่น แสดงประเภทหนังสือ หลังคลิกเพิ่มหนังสือใหม่	
function show_Type_tb(){
	var dat = new Date();	
	var day = dat.getDate();
	var month = dat.getMonth()+1;
	var year =  dat.getFullYear() +543;
	var dayFull = day+"-"+month+"-"+year;	
	//console.log(dayFull);
	var HTMLX = '';
	
		$.ajax({
				url:"../phpsv/show_type_tb.php",
				method:"POST",
				dataType:"json",
				success: function(data){
					//console.log(data);
						HTMLX += '<option value="">-SELECT TYPE-</option>';
						for(var t = 0; t<data.length; t++){
						HTMLX += '<option value="'+data[t].TYPEID+'">- '+data[t].TYPENAME+'-</option>';
						}
						$('.sel_regisPCOPY_cat').html(HTMLX);
						$('.ipt_regisdat').val(dayFull);
					}
					
				
			
			})
	//$('.sel_regisPCOPY_cat').html(HTMLX);
}
//-------------------------------------------------ฟังก์ชั่น เปิดปิด input  หน้าสำเนา หลังคลิกเพิ่มหนังสือใหม่		
function EnableAndDisable_inputPageCopy(){ 
	var check = document.getElementsByName("name_iptinsertlist");	
	for(var i =0; i < check.length; i++){
					
							if(check[i].disabled  == false){
								check[i].disabled = true;
								//console.log(check[i].disabled = true);
								
								}else{
									check[i].disabled = false;
									//console.log(check[i].disabled = false);
									//console.log("true");
									}
						}
	document.getElementById("ipt-bcode").disabled = true;
}
//-------------------------------------------------ฟังก์ชั่น เคลียร์ input หน้าสำเหนา หลังคลิกเพิ่มหนังสือใหม่		
function Clear_Html_pageCopyAddNewNbook(){
	var elment = document.getElementsByName("name_iptinsertlist");	
			for(var et =0; et<elment.length;et++){
				//console.log(elment[et].getAttribute("class"));
				var notele = elment[et].getAttribute("class");
				//console.log(notele);
				if(notele == 'ipt_regisPCOPY_byauthor' || notele == 'ipt_regisPCOPY_cat' || notele == 'ipt_regisPCOPY_no'){ 
					//console.log(notele);
					elment[et].value;
					}else{
						elment[et].value ="";
						// console.log('notele');
						}
				//elment[et].value ="";
				}
			/*var tr_Litcopybook = document.getElementsByClassName("tr_Litcopybook");	
			while(tr_Litcopybook.length>0){
				tr_Litcopybook[0].parentNode.removeChild(tr_Litcopybook[0]);
				} */
}
//-------------------------------------------------ฟังก์ชั่น เมื่อคลิกปุ่มบวกในหน้าบอปอัพ เพิ่มหนังสือเข้าระบบให้เปิดใช้งาน input ทั้งหมด หน้าลงทะเบียน	
function oPen_Enable_input(){
	var check = document.getElementsByName("nameregis");
	//console.log(opens);
	//var icon_disble = document.getElementById('iconAdd_byathor');
	var icon_dis = document.querySelectorAll('#icon_byathor');
	var icon_btAD = document.querySelectorAll('.bt_disble_check');
	var page_status = localStorage.getItem("status");
	//console.log(page_status);
	var bTn_iptpic = document.getElementById("custom-btn");
	if(page_status == 1)// ให้เมนูทุกอย่างทำงานเมื่อ status page = 1 
		{
			
			for(var bt = 0; bt < icon_btAD.length; bt++){
				if(icon_btAD[bt].disabled == false){
					icon_btAD[bt].disabled = true;
					}else{
						icon_btAD[bt].disabled = false;
						}
				
				}
				
				
					for(var i =0; i < check.length; i++){
					
							if(check[i].disabled  == false){
								check[i].disabled = true;
								//console.log(check[i].disabled = true);
								}else{
									check[i].disabled = false;
									//console.log(check[i].disabled = false);
									//console.log("true");
									}
						}
					if(bTn_iptpic.disabled == false){						
							bTn_iptpic.disabled = true;
							}else{
								bTn_iptpic.disabled = false;
								}	
		}
	
	
}
// ----------------------------------------- บันทึกรายการใหม่-----
function hiden_BTN_Save_regisbooks(){
    var btn_saveRGbook = document.getElementById("btn_addbooks");
    //console.log(btn_saveRGbook.style.display);
    if(btn_saveRGbook.style.display == "block"){
        btn_saveRGbook.style.display = "none";
        }else{
            btn_saveRGbook.style.display = "black";
            }
}	
//-------------------------------------------------ฟังก์ชั่น เคลียร์ค่าในอิลิเม้นท์ต่างๆให้เป็นค่าว่าง หน้าลงทะเบียน		
function Clear_innerHTML_PRegisbook(){
	
	//name="nameregis"
	//var text = '';
	  var x = document.getElementsByName("nameregis");
  		for(i =0; i < x.length; i++){
		var dd =	x[i].value = "";
			//console.log(dd);
			}
			var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
			}
			var elment = document.getElementsByName("name_iptinsertlist");
			for(var et =0; et<elment.length;et++){
				elment[et].value ="";
				}
			var hedName =  document.getElementsByClassName("td_Headname");	
			while(hedName.length>0){
				hedName[0].parentNode.removeChild(hedName[0]);				
				}
			var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
				}
			var tr_namemore = document.getElementsByClassName("tr_more");	
			while(tr_namemore.length>0){
				tr_namemore[0].parentNode.removeChild(tr_namemore[0]);
				}
			var imge = document.getElementById("img-picturenewbooks");	
				imge.src="";	
			//document.getElementsByClassName("ipt_nameregisname").removeAttribute("id1");
			$('.ipt_nameregisname').removeAttr("id1");
			$('.ipt_nameregisalbum').removeAttr("id1");
	Show_popupListBookName_addNew();	
}
//-------------------------------------------------ฟังก์ชั่น แสดงหน้าป๊อปอัพรายการหนังสือ เมื่อคลิกปุ่มแอดหนังสือใหม่ หน้าลงทะเบียน
function Show_popupListBookName_addNew(){
	//console.log("test showListPopupAddNewbook");
	var boxpopSearch_Addnewbooks = document.getElementById('boxModal_popSearch_Addnewbooks');	
	var data = '';
		boxpopSearch_Addnewbooks.style.display="block";
		showListPopupAddNewbook(data);
	
		$(document).on('keyup', '.ipt_popSearch_Addnewbooks', function(){
				var data_search = $('.ipt_popSearch_Addnewbooks').val();
				//console.log(data);
			showListPopupAddNewbook(data_search);
		})		
			$(document).on('click', '.close_popSearch_Addnewbooks',  function(){
			func_chk_cancelbtn();
			//console.log("test");	
			boxpopSearch_Addnewbooks.style.display="none";
			 $('.ipt_popSearch_Addnewbooks').val("");
		})
}
//-------------------------------------------------ฟังก์ชั่น แสดงรายการหนังสือในหน้าปอบอัพ เพิ่มหนังสื่อใหม่เข้าระบบ หน้าลงทะเบียน	func
function showListPopupAddNewbook(data_search){
	var HTML = '';
 //console.log(data);
	var HTMLX ='';
		var ARR_success =[];
				$.ajax({
						url:"../phpsv/showLisSearchbook.php",
						method:"POST",
						data:{data:data_search},
						dataType:"json",
						success: function(result){
							//console.log(result);
							//alert(result.length);
							if(result == null){
								stop;
								}else{
									for(i = 0; i < result.length; i++){
										//console.log(result[i].BARCODE)
										ARR_success.push(result[i]);
									
										HTMLX += '<li onDblClick="myFuncClickSelect(this, '+result[i].IDLIKBOOK+')" class="li_listSearchAd" id="'+result[i].IDLIKBOOK+'" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+ 
										'&nbsp;&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
									}
								}
								
								$('.box_modal_iptSearch_Addnewbooks').html(HTMLX);
							//console.log(HTMLX);
							}
							
					});
					
					$('.pic_regisbook').html("");
					$(document).on('click', '.li_listSearchAd', function(){
						var idbook = $(this).attr('id');
						var idLINK = $(this).attr('id1');
						//subshowDataAthorBook(idbrlkbook);
						//console.log(idLinkbook);
						//subClickUpDataShow(idbook, idLINK);
						clcik_show_album(idLINK);
						Func_author_detail(idLINK);
				})
	
}			
//-------------------------------------------------ฟังก์ชั่นฮับ 
function mYFunc_AllHub(id){
	var idLINK = id;
	//console.log(idLINK);
	if(id != null){
		  var x = document.getElementsByName("nameregis");
  		for(i =0; i < x.length; i++){
		var dd =	x[i].value = "";
			//console.log(dd);
			}
			var elm =  document.getElementsByClassName("tr_Byathor");
		while(elm.length > 0){
			elm[0].parentNode.removeChild(elm[0]);
			
			}
			var elment = document.getElementsByName("name_iptinsertlist");
			for(var et =0; et<elment.length;et++){
				elment[et].value ="";
				}
			var hedName =  document.getElementsByClassName("td_Headname");	
			while(hedName.length>0){
				hedName[0].parentNode.removeChild(hedName[0]);				
				}
			var Tr_hedName =  document.getElementsByClassName("tr_Headname");	
			while(Tr_hedName.length>0){
				Tr_hedName[0].parentNode.removeChild(Tr_hedName[0]);				
				}
			var tr_namemore = document.getElementsByClassName("tr_more");	
			while(tr_namemore.length>0){
				tr_namemore[0].parentNode.removeChild(tr_namemore[0]);
				}
			var tr_copy = document.getElementsByClassName("tr_Litcopybook");
			//console.log(tr_copy);
			while(tr_copy.length>0){
				tr_copy[0].parentNode.removeChild(tr_copy[0]);
				}	
			var imge = document.getElementById("img-picturenewbooks");	
				imge.src="";	
			//document.getElementsByClassName("ipt_nameregisname").removeAttribute("id1");
			$('.ipt_nameregisname').removeAttr("id1");
			$('.ipt_nameregisalbum').removeAttr("id1");
			$('.ipt_namecatbook').val("");		
			$('.ipt_code_byauthor').val("");
		
		}
		subClickUpDataShow(idLINK);
		clcik_show_album(idLINK);
		Func_author_detail(idLINK);
		func_Show_Byauthor(idLINK);
		func_chk_cancelbtn();
	
}
function func_chk_cancelbtn(){
	var BT_EDIT = document.getElementById("icon_btn_addNewbook");
			var BTN_ADD = document.getElementById("icon_btn_addNewbook");
			//console.log(BTN_ADD.style.color);
			
					if(BTN_ADD.style.color == "green" ){
						
							BTN_ADD.style.color="";
						hiden_BTN_Save_regisbooks();
					
			}
}
//------------------------------------------------------------------ฟังก์ชั่น ตรวจสอบมีรูปภาพหนังสือหากมีให้โชว์ในหน้าดีเทล	 
function subCheckFilepic(isbn){
    //console.log(isbn)
    var img = document.getElementById("img-picturenewbooks");
                    $.ajax({
                            url:"../phpsv/checkpicture.php",
                            method:"POST",
                            data:{data:isbn},
                            dataType:"json",
                            success: function (result){
                        //console.log(result);
                            // console.log(result.stut);
                                if(result == null){
                                    stop;
                                    }else{
                                        if(result.stut == 1){											
                                                
                                                 img.src= '..'+/COVERIMAGES/+''+result.isbnbook+'.jpg';
                                                 //console.log(img);
                                                 
                                                    //$('.pic_regisbook').html('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+result.isbnbook+'.jpg">');
                                                }else{
                                                     img.src= '';
                                                    }
                                        }
                                //console.log(d)
                                }
                            
                            
                            
                            });
                            
                                //$('.pic_regisbook').html('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+pathpic+'.jpg">')
                            //console.log('<img class="img_boxbook" src="'+'..'+/COVERIMAGES/+''+pathpic+'.jpg">')
        
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
					//console.log(txt_by);
				if(txt_by != null){
							for(var i = 0; i < txt_by.length; i++){
								HTMLBY += '<tr class="tr_Byathor"><td class="td_Byathor" id="'+txt_by[i].LINKCODE+'">'+txt_by[i].NAME_BY+'</td></tr>';
								
								//console.log(HTMLBY);
								}
							
					
						}
					$('.tb_Byathor').html(HTMLBY);
					}
			});
}		
//------------------------------------------------------------------ฟังก์ชั่น แสดง ผู้รับผิดชอบหน้าลงทะเบียน	 
function Func_author_detail(idLINK){
        //$('.ipt_nameregisathor').val(athor);
        var html_author ='';
        $.ajax({
                            url:"../phpsv/show_author.php",
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
//------------------------------------------------------------------------------------ฟังก์ชั่นคลิกเลือกให้แสดงอัลบั้ม ชุดหนังสือ
function clcik_show_album(idLINK ){
	//console.log(idLINK);
	var album = document.getElementsByClassName('ipt_nameregisalbum')[0];
	var HTMLX='';
	var HTMLID='';
		$.ajax({
						url:"../phpsv/showAlbum.php",
						method:"POST",
						data:{data:idLINK},
						dataType:"json",
						success: function(data_txt){
							if(data_txt != null){
								
								for(var it =0; it<data_txt.length; it++){
									
									HTMLX += data_txt[it].album_name;
									HTMLID = data_txt[it].id_album;
									}
									
								
								}
							$('.ipt_nameregisalbum').val(HTMLX);
							//console.log(HTMLX);
							var attalbum =document.createAttribute('id1');
								attalbum.value = HTMLID;
								album.setAttributeNode(attalbum);
								
							}
						
						
						})
				
	}		
//------------------------------------------------------------------------------------ฟังก์ชั่นแสดงข้อมูลในช่องinput หน้าดีเทล
function subClickUpDataShow(idLINK){
	//console.log(idLINK);
	//alert(ARR_success.length);
	var elemt = document.getElementsByClassName('ipt_nameregisname')[0];
	var elephlis = document.getElementsByClassName('ipt_nameregispuphlish')[0];
	//console.log(elemt);
	var nbook, Gmd, athor, byathor, Editcopy,
		publisher, yearcopy, libarian, lang_txt, isbn, idphlish, catbook_store, byauthor, BYNUM;
	$.ajax({
						url:"../phpsv/ClickShowDetail_regisbk.php",
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
									subCheckFilepic(isbn);
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
        Func_Select_GMD(Gmd);
		// console.log(Gmd);
		Func_select_Lang(lang_txt);
		var att = document.createAttribute('id1');
			att.value = idLINK;
			elemt.setAttributeNode(att);
		var attphlis =document.createAttribute('id1');
			attphlis.value = idphlish;
			elephlis.setAttributeNode(attphlis);
		$('.ipt_nameregisname').val(nbook);
		$('.ipt_namecatbook').val(catbook_store);
		$('.ipt_nameregispuphlish').val(publisher);
		$('.ipt_nameregisyear').val(yearcopy);
		$('.ipt_nameregislib').val(libarian);
		$('.ipt_nameregisyearcoppy').val(Editcopy);
		$('#selec_lang_regis1').text(lang_txt);
		$('.ipt_nameregisisbn').val(isbn);	
		$('.ipt_code_byauthor').val(BYNUM);
		$('.ipt_regisPCOPY_no').val(idLINK);	
		mYfunc_ShowdataAdcatbook();
		Myfunc_P3COPY(idLINK);
	
		 		}
						
		});
						
}
//------------------------------------------------------------------ฟังก์ชั่น แสดงตัวเลือก GMD------	
function Func_Select_GMD(Gmd){
	//console.log(Gmd);
	var OPTION = '';
	$.ajax({
						url:"../phpsv/ShowSelect_GMD.php",
						method:"POST",
						data:{GMD:Gmd},
						dataType:"json",
						success: function (result){
							//console.log(result.length);
							for(var G = 0; G < result.length; G++){
								
										
										OPTION += '<option value="'+result[G].KEY_GMD+'">'+result[G].NAME_GMD+'</option>';
								
								$('.selecttorGMD').html(OPTION);
								}
							//console.log(OPTION);
							
							}						
						
						})
	
	
}
function Func_select_Lang(lang_txt){
	var arr_slc = ['TH','EN'];
	//console.log(arr_slc);
	//console.log(lang_txt);
	var HTML_OPTH;
	var HTML_OPEN;
	var Html_txt;
	var arrHTML = [];
	if(lang_txt == ''){
		//console.log(lang_txt.length);
		Html_txt += '<option value="NO">NO</option>';
		Html_txt += '<option value="EN">EN</option>';
		Html_txt += '<option value="TH">TH</option>';
		}else{
	for(var L = 0; L< arr_slc.length; L++){
		
		if(lang_txt == arr_slc[L]){
			//console.log(arr_slc[L]);
			HTML_OPTH = arr_slc[L]; 
			}else{
				HTML_OPEN = arr_slc[L];
				}
		
		}
		arrHTML.push(HTML_OPTH);
		arrHTML.push(HTML_OPEN);
		for(var txt =0; txt < arrHTML.length; txt++){
			Html_txt += '<option value="'+arrHTML[txt]+'">'+arrHTML[txt]+'</option>';
			}
	}
	$('.selecttorlang').html(Html_txt);
}			
//--------------------------------------------function  หน้าลงทะเบียนหนังสือ --------------------------------------------
function myFuncSearch_namebook(){
	var vals = document.getElementById('ipt_Search_regis').value;
	var idLinkbook ='';
	showloadData_ajaxbook(vals, idLinkbook);
	$(document).on("keyup", '.ipt_Search_regis', function(e){
		if(e.keyCode == 13){
			//console.log(e.target.value);
			var vals = document.getElementById('ipt_Search_regis').value;
			showloadData_ajaxbook(vals, idLinkbook);
			}
		})
	$('.ipt_Search_regis').val("");
	
}
//-------------------------------------------ฟังก์ชั่นแสดงข้อมูลผู้แต่งในตารางด้านขวาหน้าต่างลงทะเบียน 
function showloadData_ajaxbook(vals, idLinkbook){
	//console.log("ทดสอบหลังบันทึก");
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
										
											HTMLX += '<li onClick="myFuncClickSelect_right(this)" class="li_listSearchAd" id="" id1="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].Year_book+'</li>';
											}else{
												
														HTMLX += '<li onClick="myFuncClickSelect_right(this)" class="li_listSearchAd" id="" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
													
											}
									}else{	
									
										HTMLX += '<li onClick="myFuncClickSelect_right(this)" class="li_listSearchAd" id="" id1="'+result[i].IDLIKBOOK+'">'+result[i].IDLIKBOOK+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].byname+'/'+result[i].Key_O+'/'+result[i].Year_book+'</li>';
									
									
									}
									
								}
								
								$('.show_namebookregis').html(HTMLX); 
							//console.log(HTMLX);
							}
						}
					});
				
					$('.pic_regisbook').html("");					
				
				
}
//-------------------------------------------ฟังก์ชั่นเมื่อดับเบิ้ลคลิกเลือก รายชื่อหนังสือในเมนูรายชื่ด้านขวา
function myFuncClickSelect_right(t){	
    var popup = document.getElementById("boxModal_popSearch_Addnewbooks");
    
    var id = t.getAttribute("id1");
        
        popup.style.display="";
    //console.log(id);
    var btns =   document.querySelectorAll(".li_listSearchAd");
    //console.log(t);
        for(var i = 0; i < btns.length; i++) {
            if(btns[i] == t){
                btns[i].style.backgroundColor = '#D1F9ED';
            //console.log(btns[i].style.backgroundColor = 'red');
                    mYFunc_AllHub(id);
                     }else{
                        btns[i].style.backgroundColor = '';
                    }
            }
            
}
//-----------------------------ฟังก์ชั่น ปิดเปิด ปุ่มสำหรับเปิดอินพุตสำหรับลงรายการ ----------
function EnableAndDisable_BTNADDBOOK(){ 
	var sttPage = localStorage.getItem("status");
	var Btn_add =  document.getElementById("btnID_newregis");
	
	if(sttPage == 1){		
		Btn_add.style.display="";		
		}else if(sttPage == 2){
			Btn_add.style.display="none";			
			}else if(sttPage == 3){			
				Btn_add.style.display="";
				}
}
//-----------------------------------------------------ฟังก์ชั่น เมื่อเลือกหน้าลงรายการ ให้แสดงดีเทลข้อมูลด้านซ้าย
function mYfunc_ShowdataAdcatbook(){
    var idlinks = $('.ipt_nameregisname').attr('id1');
    var HTMLS = '';

        //console.log(idlinks);
    if(idlinks != null){
        $.ajax({
                url:"../phpsv/Show_headname.php",
                method:"POST",
                data:{idlinks:idlinks},
                dataType:"json",
                success: function(headbook){
                    //console.log(headbook.length);
                    if(headbook != null){
                    for(var b =0; b < headbook.length; b++){
                        HTMLS +='<tr class="tr_Headname"><td class="td_Headname" id1="'+headbook[b].LINK_ALBUM+'" id="'+headbook[b].SUB_ID+'">'+headbook[b].album_name
                                +'</td></tr>';
                        }
                    
                    $('.tb_HeadName').html(HTMLS);
                    }
                }
                })
        }
        mYfunc_showdataAdmoreheadname(idlinks);
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา (รายการในช่อง สำเนา) 
function Myfunc_P3COPY(idLINK){		
    //console.log(idLINK);
    var HTML = '';
    var HTMLNUM = '';
        $.ajax({
                url:"../phpsv/Showcopybook.php",
                method:"POST",
                data:{idLINK:idLINK},
                dataType:"json",
                success: function(data){
                    
                    if(data != null){
                    clickTomyFunc_detail(data);
                        for(var d =0; d<data.length; d++){
                            //console.log(data[d].BARCODE);
                            var brcode = data[d].BARCODE;
                            HTML +='<tr class="tr_Litcopybook" id="tr_click" id2="'+data[d].BARCODE+'" onClick="myFuncSeletListCode(this, '+data[d].IDLIKBOOK+')">';
                                HTML +='<td class="td_Litcopybook_bc">'+data[d].BARCODE+'</td>';
                                HTML +='<td class="td_Litcopybook_cb">'+data[d].CATBOOK+'/'+data[d].byauthor+'</td>';
                            HTML + '</tr>';
                            }
                        
                        $('.tb_Listcodebooke').html(HTML);
                        }
                    }
                                
            })
    
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
							HTMLX += '<tr class="tr_more">';
							HTMLX +='<td class="td_more" id="'+more[m].SUB_ID+'" id2="'+more[m].ID_album+'" id3="'+more[m].SUB_ID+'">'+more[m].album_name
									+'</td>';
									HTMLX += '</tr>';
							}
						
						$('.tb_moreHeadname').html(HTMLX);
						}else{
							
							$('.tb_moreHeadname').html("");
							}
					}
					
					})
	
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา  part 1
function clickTomyFunc_detail(data){
    var CODE, COPY, CATBK, BYAUTHOR, NOREGIS, DAT, STWORK, Price, dealer, idlink, TYPEID;
    var Option= '';
    for(var x = 0; x < data.length; x++){
        CODE = data[x].BARCODE;
        COPY = data[x].COPPYNUM;
        CATBK = data[x].CATBOOK;
        BYAUTHOR = data[x].byauthor;
        NOREGIS = data[x].CODE_REGIS;
        DAT = data[x].Dat_regis;
        STWORK = data[x].STWORK;
        Price = data[x].Price_book;
        dealer = data[x].SUPCODE;
        idlink = data[x].IDLIKBOOK;
        TYPE_ID = data[x].LOANSTATUS;
    }
    
        //console.log(Option);
        $('.ipt_regisPCOPY_barcode').val(CODE);
        $('.ipt_regisPCOPY_cat').val(CATBK);
        $('.ipt_regisPCOPY_byauthor').val(BYAUTHOR);
        $('.ipt_regisPCOPY_numcode').val(NOREGIS);
        $('.ipt_regisCOPY').val(COPY);
        $('.ipt_regisdat').val(DAT);
        $('.ipt_regisbath').val(Price);
    //console.log(arr[0]);
clickTomyFunc_detail_dealerBookpart2(dealer);
clickTomyFunc_detail_memopart3(data, idlink, CODE);
StatusWork_book(STWORK);
clickTomyFunc_detail_typebook4(data, TYPE_ID);
clickTomyFunc_detail_status5(idlink);		
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา ตัวแทนจำหน่าย  part 2			
function clickTomyFunc_detail_dealerBookpart2(dealer){
	//console.log(dealer);
	var Dealbook ='';
		$.ajax({
					url:"../phpsv/ShowDealerBook.php",
					method:"POST",
					data:{iddealer:dealer},
					dataType:"json",
					success: function(txt){
						//console.log(txt);
						if(txt != null){ //12
							//console.log(txt.length);
							for(var dx = 0; dx < txt.length; dx++){
									
									Dealbook += '<option value="'+txt[dx].IDKEY_Dealer+'">- '+txt[dx].NAME_DEALER+'-</option>';
								}
						}
							//console.log(Dealbook);
							$('.sel_regisPCOPY_dealer').html(Dealbook);					
						}
						
				})
	
	}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา หมายเหตุ  part 3
function clickTomyFunc_detail_memopart3(data, idlink, CODE){
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
						$('.ipt_regismemo').val(MemoText);	
					}
				})
	
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา  part 1		
function StatusWork_book(STWORK){
	//console.log(STWORK);
	var arr = [0,1,2];
		for(var ar = 0; ar < arr.length; ar++){
			
			if(STWORK[ar] == 0){
				
				$('.sel_regisPCOPY_out').html(
				'<option value="0">- ใช้งาน -</option>'+
				'<option value="1">- ไม่สามารถใช้งาน -</option>'+
				'<option value="2">- อยู่ระหว่างซ่อม -</option>');
				
				}else if(STWORK[ar] == 1){
					$('.sel_regisPCOPY_out').html(
					'<option value="1">- ไม่สามารถใช้งาน -</option>'+
					'<option value="0">- ใช้งาน -</option>'+
					'<option value="2">- อยู่ระหว่างซ่อม -</option>');
					
					}else if(STWORK[ar] == 2){
					$('.sel_regisPCOPY_out').html(
					'<option value="2">- อยู่ระหว่างซ่อม -</option>'+
					'<option value="0">- ใช้งาน -</option>'+
					'<option value="2">- ไม่สามารถใช้งาน -</option>');
					
					}
		
			}
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา ประเภทหนังสือ   part 4
function clickTomyFunc_detail_typebook4(data, TYPE_ID){
	//console.log(TYPE_ID);
	var textType ='';
		$.ajax({
					url:"../phpsv/ShowTextType.php",
					method:"POST",
					data:{barcode:TYPE_ID},
					dataType:"json",
					success: function(Typebk){
						if(Typebk != null){ //12
						
						for(var t = 0; t < Typebk.length; t++){
								
									textType += '<option value="'+Typebk[t].TYPEID+'">- '+Typebk[t].TYPENAME+'-</option>';
							}
						}
						//console.log(textType);
						$('.sel_regisPCOPY_cat').html(textType);	
					}
				})
	
}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา สถานะหนังสือ  part 5
function clickTomyFunc_detail_status5(idlink){
	//console.log(idlink);
	var id_key = '';
		$.ajax({
					url:"../phpsv/ShowStatusbook.php",
					method:"POST",
					data:{idlink:idlink},
					dataType:"json",
					success: function(status){
						//console.log(status);
						if(status != null){ //2
							//console.log(status);
							
							for(var key = 0 ; key < status.length; key++){
								
									id_key = status[key].status_key;
								
								}
									click_ToFunc_statusSelect(idlink, id_key);
						
							
						}
						//$('.ipt_regismemo').val(MemoText);	*/
					}
				})
	
	}
////-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้าสำเนา สถานะหนังสือ  part 5	/1
function click_ToFunc_statusSelect(idlink, id_key){
	//console.log(id_key);
	var HTML='';
		$.ajax({
					url:"../phpsv/ShowStatusSelect.php",
					method:"POST",
					data:{id_key:id_key},
					dataType:"json",
					success: function(st){
						if(st != null){
							for(var k =0; k < st.length; k++){
								
									//console.log(st[k].KEY_TYPE);
									HTML += '<option value="'+st[k].KEY_TYPE+'">- '+st[k].NAME_KEY+'-</option>';									
								
								
								}
							
							}
							$('.sel_regisPCOPY_status').html(HTML);
						
						}
					})
	
	}
//-------------------------------------------------ฟังก์ชั่น popup Search by athor------
function clk_popSearch_byathor(){
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