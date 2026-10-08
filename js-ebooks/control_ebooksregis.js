
$(document).on('change', '#slc_idradiopopup', function(){
    var txt_search;
    ajax_showdataListebooks(txt_search);
})
$(document).on('click', '.btn_upload ', function(){
    click_openbrowserFile();
})
$(document).on('click', '#slc_idradio', function(){   
    func_slctype_ShowbooksAndebooks(); 
    // console.log(document.querySelector("input[id=slc_idradio]:checked").value);
})
$(document).on('click', '.btn_addbyauthor', function(){   
    func_popupshowbyAuthor();
})
$(document).on('click', '.btn_delbyauthor', function(){   
    myFuncClick_btn_delbyauthor();
})
$(document).on('this, click', '.li_byathor', function(){   
    myFuncSelect_delbyauthorpopup(this); 
})
$(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})
$(document).on('click', '.del_byathor ', function(){
   Clcik_delbyauthorpopup();
})
$(document).on('click', '.ad_Addnewbooks ', function(){
    Clcik_AddNewbooks();
 })
 $(document).on('click', '.ad_byathor ', function(){
    Click_ADDNewbyauthor();
 })
 
$(document).on('click', '#slc_idradiopopup', function(){   
    func_slctype_ShowbooksAndebooks_popup(); 
    // console.log(document.querySelector("input[id=slc_idradio]:checked").value);
})
$(document).on('this, click', '.li_listSearchAd', function(){   
    myFuncSelect_nbk(this); 
})
$(document).on('click', '.clickAddpub', function(){   
    ClickAdd_pubhlish(); 
})
$(document).on('click', '.ad_Puphlish', function(){   
    Click_AddNew_byauthor(); 
})
$(document).on('this, click', '.li_puphlish', function(){      
    Click_slclist_pubphlish(this); 
})
$(document).on('click', '.del_Puphlish', function(){   
    ClickBtn_del_pubhlish(); 
})
$(document).on('click', '.btn-adalbum', function(){   
    Click_BtNShowpop_album(); 
})
$(document).on('click', '.del_album', function(){   
    Click_BtnDel_album(); 
})
$(document).on('click', '.ad_album', function(){   
    Click_Btn_ADDalbum(); 
})
$(document).on('click', '.btn-dpartment', function(){   
    Click_Btn_showpopup_dpartment(); 
})
$(document).on('click', '.ad_dpartment', function(){   
    Click_Btn_adddpartment(); 
})
$(document).on('this, click', '#dpatmentid', function(){   
    Click_Btnslc_listdepartment(this); 
})
$(document).on('click', '.del_dpartment', function(){   
    Click_Btn_deldpartment(); 
})
$(document).on('click', '.btn_adhname', function(){   
    Click_showpopup_hname(); 
})
$(document).on('click', '.btn_delhname', function(){   
    Click_Btn_delhname(); 
})
$(document).on('click', '.ad_hname', function(){   
    Click_Btn_ADDnew_hname(); 
})
$(document).on('this, click', '#liid_hname', function(){   
    Click_slc_listhname(this); 
})
$(document).on('click', '.del_hname', function(){   
    Click_Btn_dellisthname(); 
})
$(document).on('click', '.btn-deliptlbum', function(){   
    Click_Btn_delipt_ablum(); 
})
$(document).on('click', '.clickdiptpub', function(){   
    Click_Btn_delipt_pubhlis(); 
})
$(document).on('click', '.btn-diptpartment', function(){   
    Click_Btn_delbtniptdpart(); 
})
$(document).on('click', '.btn-addebarcode', function(){   
    Click_Btn_aDDBCode(); 
})
$(document).on('click', '#ipt-regisebcode', function(){
    Click_BtnEdit_BCode();
})







