// JavaScript Document

$(document).ready(function(){
  $("#ipt_sch_gsuser").on("keyup", function() {
	 // console.log("test");
    var value = $(this).val().toLowerCase();
    $("#tb_tbodyLisCheckbk tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function(){
  $("#ipt_sch_bookhit").on("keyup", function() {
	// console.log("test");
    var value = $(this).val().toLowerCase();
    $("#tb_tbodyListuser_bookhit tr").filter(function() {
	//console.log(value);
	 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	//console.log(this);
    });
  });
});
$(document).ready(function() {
   showOpen();
   //unlockLimitbook(iptValIDBook, unLimit);
	});
$(document).on('click', '.btn-set', function(){
	OpenPopu_modalset();
	
	})
$(document).on('click', '#btn-set-fines', function(){
	OpenPopu_modalsetfines();
	
	})	
$(document).on('click', '.btn-set-user', function(){
	OpenPopu_modalset_user();
	})	
$(document).on('click', '.bt_Cleck', function(){
	ShowListBook_report();
	
	})
$(document).on('click', '#btn-expexcell', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice"));
	})	
$(document).on('click', '#sch_begindate', function(){
	var time ='';
	Func_popupdeadline(time);
	//console.log("test");
	})
$(document).on('click', '#sch_enddate', function(){
	var time ='';
	Func_popupend(time);
	})	
	
$(document).on('click', '#bt_Cleck_user', function(){
	sendAjax_schData();
	
	})

$(document).on('click', '#btn-expexcell-user', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoiceuser"));
	})
$(document).on('click', '#btn-expexcell-return', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice_return"));
	})
$(document).on('click', '#btn-expexcell-fines', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice_fines"));
	})					
$(document).on('click', '#btn-search-return', function(){
	OpenPopu_ModalBoxSet();
	
	})
$(document).on('click', '#bt-rpt-report', function(){
	Send_ajaxDataSearch_rePort();
	
	})
$(document).on('click', '#bt-rpt-fines', function(){
	Send_ajaxDataSearch_rpt_fines();
	
	})		
	
$(document).on('click', '#btn-expexcell-chkbook', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoicecnkbook"));
	})	

$(document).on('click', '#btn-expexcell-bookhit', function(){
	//exportPDF_report();
	var TBexcel =  new Table2Excel();
		//console.log(TBexcel);
		TBexcel.export(document.querySelectorAll("#invoice_bookhit"));
	})	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	