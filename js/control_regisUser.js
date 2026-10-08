$(document).on('this, click', '.lilistnameuserrg', function(){
   // console.log('click test');
	Myfunc_showdetailuserregis(this);	
	})
$(document).on('click', '#adduserrg', function(){
        Mypopup_adcodeUserregis();
})
$(document).on('click', '#deluserrg', function(){
   // console.log('test-click del');
	Func_Delete_userid();
	})
$(document).on('click', '.editusericon', function(){
         // console.log('test-click edit');
      func_editUserRG();
 })
 $(document).on('click', '.iptfixday', function(){
	var time = '';
	Func_popudayfix(time);
})
$(document).on('click', '#bt-edite-codeuser', function(){
	func_popupeditcodeuser();
})
$(document).on('click', '#boxsub_righticon', function(){
	Func_SaveNewUserRegis();
	})
$(document).on('click','#bt_iduseredit', function(){
		func_edit_iduser();
})
$(document).on('click','#custom-btnRGuser', function(){		
	Activepictuer_user();
})
$(document).on('this, click', '.treeview', function(){
	myClickTab(this);
})

	