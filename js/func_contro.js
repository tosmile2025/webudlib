// JavaScript Document
/*$(document).ready(function() {
	myFuncSearch_namebook();
});*/
$(document).ready(function(){
    $('.close_popAdbarCodeAuto').click(function(){
        var boxpopAddbarcodeAuto = document.getElementById('boxModal_popAdbarCodeAuto');
        boxpopAddbarcodeAuto.style.display ='none';        	
            $('.ipt_adAutoBarcode').val("");
                var elelb = document.getElementById('text_codeAdnew');
                //console.log(elelb);
                if(elelb != null){0
                elelb.remove();                
                }
            })
            Func_Check_Login();
            document.getElementById("txt_barCode").focus();     
});
$(document).on('click', '#dropbtn_swit', function(){	
Func_LogoutUser();
})
$(document).on('this, dblclick', '#tr_LisOrderbook', function(){
 MyFunc_DbClickSLCorderDel(this);
})			
 
$(document).on('click', '.btn_print', function(){
PrintListbook();
})  	 
$(document).on('click', '.btn_payment', function(){
Clkpayment();
})
$(document).on('click', '.btn_cash', function(){
EnterPayment();
})	
$(document).on('click', '.btn_print_fines', function(){
Print_statement();
})  	   	   	   	 
$(document).ready(function() {
Func_show_statustotal();
CalendarThai_status();
// AutoRunCheckTimeOrderBooks();
})
$(document).on('click', '.btn_ckAll_list', function(){

ifelse_allSelect_list();
})

$(document).on('keyup', '#ipt_cash', function(e){
clcikAdTo_CashBath(e);
})			
$(document).on("keypress", ".txt_barCode", function(e){
myFunction(e);
});
$(document).on('click', '.mb_icon_opendata', function(){
OpenListbook();
}) 

$(document).on('click', '.iconCancelDB', function(){
calcel_Showdetail();
closeTblistnamebook();
})
$(document).on('click', '.mb_icon_search', function(){
clk_popSearch();
})
$(document).on('click', '.mb_icon_renew', function(){
mYfunReNewBooks();
})
$(document).on('click', '.btn_delete', function(){
Delete_listbookFines();
})
$(document).on('click', '#btn_enterOrder', function(){
click_adorDerInsert();
})
// <!--	------------------------------------------ฟังก์ชั่น ปุ่มกำหนดวันคืน-------------------------------------------------->			
$(document).on('click', '.btn_changday', function(){
myFixDay();
})        
// <!------------------------------------------------------------------------->
$(document).on('click', '.btn_yesfixday', function(){
clk_sendAjaxFixAay();
})
// <!------------------------------------------ฟังก์ชั่นเลือกทั้งหมด ในการกำหนดวันคืน-------------------------------------------->					
        /*$('.clkallselect').change(function(){
            $(".chkboxfix:checkbox").prop("checked", $(this).prop("checked"));
            
            })*/
$(document).on('change', '.clkallselect', function(){
$(".chkboxfix:checkbox").prop("checked", $(this).prop("checked"));
})	
$(document).on('click', '.btn_cirula', function(){
SearchResumeBooks();
})
$(document).on('click', '.btn_ckAll_fines', function(){
	
	ifelse_allSelect_fines();
})
$(document).on('click', '.iptfixday', function(){
	var time = '';
	Func_popudayfix(time);
})
$(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})
$(document).on('click', '.btn_yes', function(){	
   				
    myContinueBook();
})



		
