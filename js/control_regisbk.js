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
            Func_Check_Login();
});
$(document).on('click', '.btnlogoutuser', function(){	
	Func_LogoutUser();
})
$(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})

// ----------------------End-----function  default----------------------------------	
// --------------------------------เมื่อคลิกเพิ่มรายงานหนังสือใหม่--------------------------
$(document).on('this, dblclick', '.td_Headname', function(){
	MyFunc_dbClickDel_Hname(this);
})
$(document).on('this, dblclick', '.li_HeadName', function(){
	MyFunc_doubleClickSelectHeadName(this);
})
$(document).on('click', '#icon_btn_addNewbook', function(){
	
	var NumPage = localStorage.getItem("status");
	
	if(NumPage == 1){
		//หน้าลงทะเบียน
		//console.log(NumPage);
		//alert("add New หน้าลงทะเบียน");
	//Myfunc_Enabled_input_regisbooks();
		mYFunc_enabled_Addnew_Regisboos(NumPage);
	}else if(NumPage == 2){
		//alert("add New ลงรายการ");
		//console.log(NumPage);
	//Myfunc_Enabled_input_adcatbook();
	}else if(NumPage == 3){
		//alert("add New สำเนา");
		//console.log(NumPage);
		//Myfunc_Enabled_input_Pagecopy();
		mYFunc_enabled_Addnew_Regisboos(NumPage);
		}
	
})
$(document).on('click', '#iconAdd_Byathor', function(){
	clk_popSearch_byathor();
})
$(document).on('click', '#btn-copy-detail', function(){
	var NumPage = localStorage.getItem("status");
	
	if(NumPage == 1){
		//หน้าลงทะเบียน
		//console.log(NumPage);
	Myfunc_Enabled_input_regis_copydetail();
	}else if(NumPage == 2){
		//หน้าลงรายการ
		//console.log(NumPage);
	Myfunc_Enabled_input_regis_copydetail();
	}else if(NumPage == 3){
		//หน้าสำเนา
		//console.log(NumPage);
		Myfunc_Enabled_input_regis_copydetail();
		}
})
$(document).on('click', '.ad_Addnewbooks', function(){
        Click_ADDNewBooks_regis();
})
$(document).on('this, dblclick', '.li_byathor', function(){
    MyFunc_doubleClickSelectAdtext(this);
})
$(document).on('click','#iconAdd_puphlish', function(){
    Myfunc_POPUPpuphlish();
})
$(document).on('click','#del_byathor', function(){
    myFunc_Delete_byathor();
})
$(document).on('click','#del_AlbumNamemore', function(){
    myFunc_Delete_album_namemore();
})
$(document).on('click','#del_Album', function(){
	myFunc_Delete_Album();
})
$(document).on('click','#del_HeadName', function(){
    myFunc_Delete_HeadName();
})
$(document).on('click','.btnsend', function(){
    myFunc_Print_To_Barcode();
})     
$(document).on('click','#del_Puphlish', function(){
    myFunc_Delete_Puphlish();
})
$(document).on('click','.ad_byathor', function(){
    myFunctio_popupnAdbyathor();
})
$(document).on('click','.ad_Puphlish', function(){
    myFunction_add_Puphlish();
})
$(document).on('click','.ad_HeadName', function(){
    myFunction_add_HeadNamebooks();
})
$(document).on('click','.ad_AlbumNamemore', function(){
    myFunction_add_AlbumNamemore();
})
$(document).on('this, dblclick', '.li_puphlish', function(){
    MyFunc_doubleClickSelectAdd_puphlish(this);
})
$(document).on('click','#iconAdd_albumbook', function(){
    Myfunc_POPUPAlbum();
})
$(document).on('this, dblclick', '.li_album', function(){
    MyFunc_doubleClickSelectAdd_Album(this);
})
$(document).on('this, click', '.ad_Album', function(){
	myFunction_add_Album();
})
$(document).on('click','.tbn_adregis_book', function(){
	myFunc_Save_AddNewbook();
})
$(document).on('click','#custom-btn', function(){		
	defaultBtnActive();
})
$(document).on('click', '#icon_btn_editregis', function(){
	var NumPage = localStorage.getItem("status");
	
	if(NumPage == 1){
		//หน้าลงทะเบียน
		//console.log(NumPage);
	Myfunc_Enabled_input_regisbooks();
	}else if(NumPage == 2){
		//หน้าลงรายการ
		//console.log(NumPage);
	Myfunc_Enabled_input_adcatbook();
	}else if(NumPage == 3){
		//หน้าสำเนา
		//console.log(NumPage);
		Myfunc_Enabled_input_Pagecopy();
		}
})
$(document).on('this, dblclick', '.td_Byathor', function(){
		MyFunc_dbClickDel_Byathor(this);
})
$(document).on('click','#icondel_Byathor', function(){
	myFunction_del_Byathor();
})
$(document).on('click','#iconAdd_Headname', function(){
	Myfunc_POPUPHeadName();
})
$(document).on('click','#icondel_Headname', function(){
	myFunction_del_Headname();
})
$(document).on('click','#iconAdd_namemore', function(){
	Myfunc_POPUPAd_albummore();
})
$(document).on('click','#icondel_namemore', function(){
	myFunction_del_Albummore();
})
$(document).on('this, dblclick', '.li_albumNameMore', function(){
	MyFunc_doubleClickSelectalbummore(this);
})
$(document).on('this, dblclick', '.td_more', function(){
	MyFunc_ClickDel_Morenbk(this);
})
$(document).on('click','.btnClicktochkbacode', function(){
	myFunc_ADD_NewBarcodeAuto();
})
$(document).on('click','#bt_adAutoBarcode', function(){
	mYFunc_ClickAddBarCodeAuto();
})
$(document).on('click','#btn_addNew_copy', function(){
	func_AddToSaveDATA_pcopy();
})
$(document).on('click','#icon_btn_delAddNewbook', function(){
	myFunc_DeleteRecodPcopy();
})	