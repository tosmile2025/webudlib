$(document).ready(function(){	
    document.getElementById('foolterset-css').innerText='© 2023, made with  by As St.Head';
     CalendarThai_status();        
     Func_Check_Login();
     myFuncSearch_namebook();  
     myfunc_countEbooks_ready();  
    //  disabled_inputAndbtn()
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
 $(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})
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
function myFuncSearch_namebook(){
	
	var vals = document.getElementById('idipt_sch_gsuser').value;
	var idLinkbook ='';
    showloadData_ebooksajax(vals, idLinkbook);
	$(document).on("keyup", '#idipt_sch_gsuser', function(e){
		if(e.keyCode == 13){
			//console.log(e.target.value);
			var vals = document.getElementById('idipt_sch_gsuser').value;
            showloadData_ebooksajax(vals, idLinkbook);
			}
		})
	$('#idipt_sch_gsuser').val("");
	
}
//-------------------------------------------ฟังก์ชั่นแสดงข้อมูล รายชื่อหนังสือด้านขวา Ebooks
function showloadData_ebooksajax(txt, idLinkbook){	
    // console.log('showloadData_ebooksajax');
       var HTMLX ='';	
       var ARR_success =[];
               $.ajax({
                       url:"../phpsv-ebooks/showcopySearch.php",
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
                                       
                                           HTMLX += '<li ondblClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks" id="'+result[i].BARCODE+'" data-link="'+result[i].IDLIKBOOK+'" style="background-color:#D1F9ED;">'+result[i].BARCODE+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].COUNTPAGE+'/'+result[i].Year_book+'</li>';
                                           }else{
                                               
                                                       HTMLX += '<li ondblClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks" id="'+result[i].BARCODE+'" data-link="'+result[i].IDLIKBOOK+'">'+result[i].BARCODE+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].COUNTPAGE+'/'+result[i].Year_book+'</li>';
                                                   
                                           }
                                   }else{	
                                   
                                       HTMLX += '<li ondblClick="myFuncClickSelect_ListEbooks(this)" class="li_listSearchebooks"  id="'+result[i].BARCODE+'" data-link="'+result[i].IDLIKBOOK+'">'+result[i].BARCODE+'&nbsp;&nbsp;'+result[i].NAME_BOOK+'/'+result[i].COUNTPAGE+'/'+result[i].Year_book+'</li>';
                                   
                                   
                                   }
                                   
                               }
                               
                               $('.box_list_ebooks').html(HTMLX); 
                           // console.log(HTMLX);
                           }
                       }
                   });
}
$(document).on('click', '.btnadfileone', function(){  
		var upfile = document.getElementById('upload_file');     
    upfile.click();
       
})
function uploadFile(dis){
   //console.log('test-ts');		
  // console.log(dis);   
    var iputname = document.getElementById('ipt-ebarcode');        
     var Fileup = dis.files[0];
//   console.log(Fileup);
    var prfloat = Fileup['size'];
    // var sizefix = parseFloat(1024*1024*18);    
  /*  if(Fileup['size'] >= sizefix ){
        alert(' ไฟล์มีขนาดเกินกำหนด 20MB/20,000KB');
    }else{
    if(Fileup){ */
        var sizetxt = func_checksizeFile(prfloat);
        // console.log(sizetxt);       
      iputname.value=Fileup['name'];
      document.getElementById('typefile-id').innerText = Fileup['type'];
      document.getElementById('sizefile-id').innerText = sizetxt;        
   /* }
    } */
}
function func_checksizeFile(bytes){
    var kb, mb, gb, tb;
    kb = 1024;
    mb = kb * 1024;
    gb = mb * 1024;
    tb = gb * 1024;
    if((bytes >=0) && (bytes  < kb)){
        return bytes +'B';
    }else if ((bytes >= kb) && (bytes < mb)){
        return Math.ceil( bytes / kb)+'KB';
    }else if ((bytes >= mb) && (bytes < gb)){
        return Math.ceil(bytes / mb) + ' MB';
    }else if ((bytes >= gb) && (bytes < tb)){
        return Math.ceil(bytes / gb) + ' GB';
    }else if (bytes >= tb) { 
        return Math.ceil(bytes / $tb) + ' TB'; 
    }else {
        return bytes + ' B';
        } 
}
$(document).on('click', '.btnadfiletwo', function(){  
    var upfile = document.getElementById('inputfileTWO');
  
    upfile .click();	
})
function browser_uploadFileTWO(dis){	
// console.log(dis);   
var iputname = document.getElementById('ipt-namefile');        
 var Fileup = dis.files[0];
//    console.log(Fileup);
var prfloat = parseFloat(Fileup['size']/1024);
var numfix = prfloat.toLocaleString('en-US');
var sizefix = parseFloat(1024*1024*20);
// console.log(prfloat);
if(Fileup['size'] >= sizefix ){
    alert(' ไฟล์มีขนาดเกินกำหนด 20MB/20,000KB');
}else{
if(Fileup){       
  iputname.value=Fileup['name'];
  document.getElementById('typefile-idtwo').innerText = Fileup['type'];
  document.getElementById('sizefile-idtwo').innerText = numfix+"KB";        
}
}  
}
var btnclick = document.getElementById('btn-fadein');
btnclick.addEventListener('click', logItem);
function  logItem(){    
    // console.log(htmlclass);
    var btnclick = document.getElementById('btn-fadein'); 
    if(btnclick.classList.replace('fa-plus-circle', 'fa-minus-circle') == false){
        btnclick.classList.replace('fa-minus-circle', 'fa-plus-circle'); 
    }
//    console.log(btnclick.classList.replace('fa-plus-circle', 'fa-minus-circle'));
    var item = document.getElementById('boxUploadFiletwo');
    item.toggleAttribute("hidden");
}
// -----------------------------------ฟังก์ชั่น คลิกเลือกเมนูรายการชื่อ E-books ด้านขวาและแสดงผล
function myFuncClickSelect_ListEbooks(dis){
	
	var li = document.querySelectorAll('.li_listSearchebooks');
	var barcode = dis.id;
    var idlink = dis.getAttribute('data-link');
    var btn_add = document.getElementById('btn_adfile');
	//  console.log(id);
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor = '#d1f9ed';
            btn_add.style.display='block';
			Myfunc_P3COPY(barcode);
            show_picturecopy(idlink);
		}else{
			li[i].style.backgroundColor = '';
		}
	}
}
//-----------------------------------------ฟังก์ชั่น เรียกข้อมูลแสดงหน้า สำเนา (รายการในช่อง สำเนา) 
function Myfunc_P3COPY(barcode){
    var Zero = 0;
    var one = 1;
	var HTML = '', number = 0;	
		$.ajax({
				url:"../phpsv-ebooks/showchapter.php",
				method:"POST",
				data:{barcode:barcode},
				dataType:"json",
				success: function(data){
					// console.log(data);				
					if(data != null){
					//clickTomyFunc_detail(data);
						for(var d =0; d<data.length; d++){
                            // console.log(data[d].BARCODE);							
                          number += Zero + one;
                            // console.log(number);                            
							HTML +='<tr class="tr_Litcopybook" id="tr_click" id1="'+data[d].ID_content+'" data-code="'+barcode+'" ondblClick="myFuncSeletListCode(this)">';
								HTML +='<td class="td_Litcopybook_bc">'+number+'</td>';
								HTML +='<td class="td_Litcopybook_cb">หัวเรื่อง:&nbsp;&nbsp;'+data[d].con_name+'&nbsp;&nbsp;ชื่อไฟล์:&nbsp;&nbsp;'+data[d].file_name+'</td>';
							HTML + '</tr>';
							}					
						 $('.tb_showbcode').html(HTML);
						}
					}
								
			})
            // console.log(barcode);
            document.getElementById('ipt-regisebcode').value=barcode;
			$('.tb_showbcode').html(HTML);	
}
// -----------------------------------ชุด ฟังก์ชั่น  ดับเบิลคลิกเลือกเพื่อแสดงสถานะสีของรายการสำเนา
function myFuncSeletListCode(dis){
	var li = document.querySelectorAll('.tr_Litcopybook');
	for(var i =0; i < li.length; i++){
		if(li[i] == dis){
			li[i].style.backgroundColor='#FF9A78';
			var idcon = li[i].getAttribute('id1');
            fun_showbtnmenu();
            func_showdetailFile(idcon);            
		}else{
			li[i].style.backgroundColor='';
		}
	}
}
function  show_picturecopy(idlink){
    // console.log(idlink);
    var img = document.getElementById("pic_ebooks");
    $.ajax({
            url:"../phpsv-ebooks/checkpicture.php",
            method:"POST",
            data:{data:idlink},
            dataType:"json",
            success: function (result){
        // console.log(result);
            // console.log(result.stut);
                if(result == null){
                    stop;
                    }else{
                      
                        if(result.stut == 1){                         
                           img.src = '..'+/COVERIMAGES/+''+result.idlink+'.jpg'; 
                                }else{
                                     img.src= '..'+/fileimage/+'ebooksimg.jpg';
                                    }
                        }
                //console.log(d)
                }
            
            
            
            });
}
function fun_showbtnmenu(){
 var btnall = document.querySelectorAll('.check_openbtn');
 btnall[1].style.display='none';
 btnall[2].style.display='block';
 btnall[3].style.display='block';
}
function func_btnclickuse(stut){
    if(stut == 'add'){
        func_hidebtnmenu(stut);
    }else if(stut == 'edt'){
        func_changecolorbtn();
    }else if(stut == 'del'){
        func_delChapter();
    }else if (stut == 'sav'){      
      func_savnewcontent();
    }
}
function func_hidebtnmenu(stut){
    // console.log(stut);
    if(stut == 'add'){
        document.getElementById('btn_savfile').style.display = 'block';
        document.getElementById('btn_adfile').style.display = 'none';
        document.getElementById('btn_edfile').style.display = 'none';
        document.getElementById('btn_dlfile').style.display = 'none';
      func_clearinputAndenabled();
    }else if(stut == 'edt'){      
        // var elebtn = document.getElementById('editusericon');         
        document.getElementById('btn_savfile').style.display = 'none';
        document.getElementById('btn_adfile').style.display = 'none';     
        document.getElementById('btn_dlfile').style.display = 'none'; 
        document.getElementById('btn_edfile').style.display = 'none'; 
    }else if(stut == 'del'){
        document.getElementById('btn_savfile').style.display = 'none';
        document.getElementById('btn_adfile').style.display = 'none';
        document.getElementById('btn_edfile').style.display = 'none';
    }
     
        
}
function  func_clearinputAndenabled(){
    var input, btn;
    input = document.querySelectorAll('.iptclear');
    btn = document.querySelectorAll('.iptdisable');
    btn.forEach(function(item){
        item.removeAttribute('disabled');
    })
    for(var i = 0; i < input.length; i++){
        input[i].value = '';        
    }
}
function func_savnewcontent(){
    var btnall = document.querySelectorAll('.check_openbtn');
    var barcode;
    var forData = new FormData();
    var li = document.querySelectorAll('.li_listSearchebooks');
    var file = document.querySelectorAll("input[type=file]");
    var chapter = document.querySelectorAll("#ipt-chapter");    
    li.forEach(function(item){
        // console.log(item.style.backgroundColor);
       if(item.style.backgroundColor == 'rgb(209, 249, 237)'){
       barcode = item.getAttribute('id');      
       }
      stop;
    })
    
    file.forEach(function(data, i){
        //  arr_file.push(data.files[0]); 
        forData.append('file[]', data.files[0]);
        forData.append('chapter[]', chapter[i].value);       
        forData.append('barcode', barcode);               
     //console.log(chapter[i].value);      
        })
            console.log(forData);
    // https://www.freecodecamp.org/news/formdata-explained/
    // console.log('test-save');
        $.ajax({      
            url:"../phpsv-ebooks/savadnewcontent.php",
            method:"POST",
            data:forData,
            dataType:'text',
            contentType:false,
            processData:false,
            beforeSend:function(){
                savactive_loadprograssBar();
               },			
            success:function (data){
            // console.log(data);
                var progressValue =0;
                var speed =5;
                var progress = setInterval(function(){
                progressValue ++;
                savloadprogress(progress, progressValue);
            }, speed);			
            }
        })
        btnall[0].style.display='none';
        btnall[1].style.display='block';
        btnall[2].style.display='none';
        btnall[3].style.display='none';
}
function func_changecolorbtn(){
    var btnsavedit = document.getElementById('btn_edfile');
    var btn = document.querySelectorAll('.iptdisable');
        document.getElementById('btn_savfile').style.display = 'none';
        document.getElementById('btn_adfile').style.display = 'none';     
        document.getElementById('btn_dlfile').style.display = 'none';
    //  console.log(btnsavedit.style.background = 'rgb(6, 97, 88)');
     if(btnsavedit.style.background == 'rgb(6, 97, 88)'){
        // console.log('ไม่มีค่าว่าง');
        btnsavedit.style.background = ''
        func_saveEditbook();
     }else{
        btn.forEach(function(item){
            item.removeAttribute('disabled');
         })
        // console.log('ค่าว่าง');
        btnsavedit.style.background = 'rgb(6, 97, 88)'
     }
}
function func_delChapter(){
   var popup = document.getElementById('myModal-alert');
   var tr = document.querySelectorAll('.tr_Litcopybook');
   var idcon ='';
   popup.style.display = 'block';
   tr.forEach(function(item){
    if(item.style.backgroundColor == 'rgb(255, 154, 120)'){
        var btnyest = ' <button type="button" class="btn btn-flat flat-danger txt-danger waves-effect waves-light  btn-delchapter" data-toggle="tooltip" data-placement="top" title="" data-original-title=".flat-danger">danger	</button>';
       var chapter =  item.getElementsByTagName("td")[0].innerText;
       var txt = item.getElementsByTagName("td")[1].innerText;   
       idcon = item.getAttribute('id1');       
       document.getElementById('spnamedel').innerText = 'Chanpter/content:'+chapter+'__'+txt;
       document.getElementById('txt_headname').innerText = 'ตรวจเช็ครายการที่ต้องการให้แน่ใจก่อนลบ';
       document.getElementById('item_btnshow').innerHTML= btnyest;
    }
   })   
   $(document).on('click', '.btn-delchapter', function(){
//    console.log(idcon);
    popup.style.display='none';
    $.ajax({
            url:"../phpsv-ebooks/delchapter.php",
            method:"POST",
            data:{idcon:idcon},
            dataType:"text",
            beforeSend:function(){
                savactive_loadprograssBar();
               },			
            success:function (data){
            console.log(data);
                var progressValue =0;
                var speed =5;
                var progress = setInterval(function(){
                progressValue ++;
                savloadprogress(progress, progressValue);
            }, speed);			
            }
        })
   })
   dis
}
function func_saveEditbook(){   
    var forData = new FormData();
    var idcon;
    var barcode = document.getElementById('ipt-regisebcode').value;
    var licon = document.querySelectorAll('#tr_click');
    var file = document.querySelectorAll("input[type=file]");
    var chapter = document.querySelectorAll("#ipt-chapter");  
    licon.forEach(function(item){
    //   console.log(item.style.backgroundColor);
     if(item.style.backgroundColor == 'rgb(255, 154, 120)'){
       idcon = item.getAttribute('id1');      
       }
      stop;
    })    
    file.forEach(function(data, i){
        //  arr_file.push(data.files[0]); 
        forData.append('file[]', data.files[0]);
        forData.append('chapter[]', chapter[i].value);       
        forData.append('idcon', idcon);
        forData.append('barcode', barcode);                
     //console.log(chapter[i].value);      
        })
        $.ajax({      
            url:"../phpsv-ebooks/saveEditcon.php",
            method:"POST",
            data:forData,
            dataType:'text',
            contentType:false,
            processData:false,
            beforeSend:function(){
                savactive_loadprograssBar();
               },			
            success:function (data){
            //    console.log(data);
                var progressValue =0;
                var speed =5;
                var progress = setInterval(function(){
                progressValue ++;
                savloadprogress(progress, progressValue);
            }, speed);			
            }
        })

}
function func_showdetailFile(idcon){
    // console.log(idcon);
    $.ajax({
        url:"../phpsv-ebooks/show_detailFile.php",
        method:"POST",
        data:{idcon:idcon},
        dataType:"json",
        success: function(data){
            // console.log(data);
            document.getElementById('typefile-id').innerText= data[0].typefile;
            document.getElementById('sizefile-id').innerText= data[0].sizefile;            
            document.getElementById('ipt-chapter').value= data[0].namecon;
        }
    })
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
   var barcode = document.getElementById('ipt-regisebcode').value;
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
		  
		   valueContainer.textContent='0%';
			clearInterval(loadders);
            disabled_inputAndbtn();
            Myfunc_P3COPY(barcode);			
		   }
	   }			  
}
function disabled_inputAndbtn(){
    var btn = document.querySelectorAll('.iptdisable');
    var att = document.createAttribute('disabled');
    var input = document.getElementById('ipt-chapter');
    btn.forEach(function(item){
      if(item.disabled == false){
         item.disabled = true;
      }
     })
   input.setAttributeNode(att);
     
}