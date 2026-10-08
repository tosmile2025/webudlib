
// $(document).on('change', '#slc_idradiopopup', function(){
//     var txt_search;
//     ajax_showdataListebooks(txt_search);
// })
$(document).on('click', '.click_closeHname', function(){
	// console.log('test');
    document.getElementById('boxModal_popsch_hname').style.display ='none';
    })
    $(document).on('click', '.click_closeHnameMore', function(){
      // console.log('test');
        document.getElementById('boxModal_popnamemore').style.display ='none';
        })
    
$(document).on('click', '.btn-delbyname', function(){	
    // console.log('test-111');
  del_byname();
})
$(document).on('click', '.btn-addbyname', function(){	
    // console.log('test-111');
  open_popupByname();
})
$(document).on('click', '.del_byathor', function(){	
    // console.log('test-111');
  del_byathor();
})
$(document).on('click', '.ad_byathor', function(){	
    // console.log('test-111');
  add_byathor();
})
$(document).on('this, click', '.li_byathor', function(){	
    // console.log('test-111');
  select_lispopbyname(this);
})
$(document).on('click', '.btn-addpub', function(){	
    // console.log('test-111');
  add_publisher();
})
$(document).on('click', '.btn-delpub', function(){	
    // console.log('test-111');
  del_publisher();
})
$(document).on('this, click', '.li_puphlish', function(){	
    // console.log('test-111');
  select_publisher(this);
})
$(document).on('click', '.del_Puphlish', function(){	
  // console.log('test-111');
btnpopup_delpubliser();
})
$(document).on('click', '.ad_Puphlish', function(){	
  // console.log('test-111');
btnpopup_addpubliser();
})
$(document).on('click', '.btn-addalbum', function(){	
  // console.log('test-111');
btnpopup_addAlbum();
})
$(document).on('click', '.del_album', function(){	
  // console.log('test-111');
btnpopup_delAlbum();
})
$(document).on('click', '.ad_album', function(){   
  Click_Btn_ADDalbum(); 
})
$(document).on('click', '.btn-addhname', function(){   
  Click_showpopup_hname(); 
})
$(document).on('this, click', '.li_HeadName', function(){	
  // console.log('test-111');
select_hname(this);
})
$(document).on('click', '.del_hname', function(){   
  btnpopup_delHname(); 
})
$(document).on('click', '.btn-delhname', function(){   
  btn_hname_del(); 
})
$(document).on('click', '.ad_hname', function(){   
  Click_Btn_ADDnew_hname(); 
})
$(document).on('click','.btn-addnmore', function(){
	show_popupNameMore();
})
$(document).on('this, click', '.li_NameMore', function(){	
  // console.log('test-111');
select_NameMore(this);
})
$(document).on('click','.del_nmore', function(){
	del_NameMorepopup();
})
$(document).on('click','.btn-delnmore', function(){
	del_listNamemore();
})
$(document).on('click','.add_nmore', function(){
	add_popupNewNamemore();
})
$(document).on('click', '.btn_upload ', function(){
  click_openbrowserFile();
})
$(document).on('click', '.ad_Addnewbooks ', function(){
  addNewbooks_nosearch();
})
$(document).on('click', '.btn-dis-ANBK ', function(){
  aDDNewCopyRegisbooks();
})

$(document).on('click', '.f-right ', function(){
  var popup = document.getElementById('boxModal_popEditBcode');
  var btneditbcode = document.getElementsByClassName('btn-addebarcode')[0];
  btneditbcode.disabled=true;
  popup.style.display='none';
})

$(document).on('click', '.close-btnpop', function(){
  var btnmenu = document.querySelectorAll('.btn-dis'); 
	var popup = document.getElementById('boxModal_popAdbarCodeAuto');	
  popup.style.display='none';	
  //  show_btn_right();
  // disable_btn_Tab();
  // disAndEnableIput_p3();
  // disable_alliput();
  // console.log('test close x');
  btnmenu.forEach((btnright) =>{						
 		btnright.style.background = '';
    
})	
})	
$(document).on('click', '.btn-addebarcode', function(){
 
  popupAuto_Editbarcode();
})
$(document).on('click', '.btn-yesDel', function(){
  Btn_deleteListbooksAll();
})
$(document).on('this, click', '.treeview', function(){
  myClickTab(this);
})
$(document).on('keyup', '#iptKeybcode', function(e){
  if(e.keyCode == 13){
    var iptbcode = document.getElementById('iptKeybcode').value;
      ajax_AutobarCode(iptbcode);
  }		
})
$(document).on('keyup', '#iptEditBcode', function(e){
  if(e.keyCode == 13){
    var iptEditbcode = document.getElementById('iptEditBcode').value;
      ajax_AutoEditbarCode(iptEditbcode);
  }		
})











   




