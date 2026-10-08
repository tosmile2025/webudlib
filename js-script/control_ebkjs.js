$(document).on('click', '.navItems', function(){
    document.getElementById('sch-ipt-bk').focus();
})
$(document).on('keypress', '#sch-ipt-bk', function(e){
    func_input_schbk(e);
    })
