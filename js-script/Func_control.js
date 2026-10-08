  
$(document).on('click', '.clk-show', function(){
//console.log("test");
func_export_excel_bookhit();		
})
$(document).on('this, click', '#lb-chktype-main', function(){
    func_input_checkType(this);
})
$(document).on('this, click', '#lb-chk-type', function(){
    func_click_slc(this);
})
$(document).ready(function(){ 
    var typechk = '';
    var t = '';       
    Func_showTableList_search(typechk, t);
})
$(document).on('keypress', '#sch-ipt-bk', function(e){
    Func_center_Search(e);
    })

