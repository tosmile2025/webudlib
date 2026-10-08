// ---------------------------function  default----------------------------------
$(document).ready(function(){
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
            modulesearch_nameuser();
});	
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
//-------ฟังก์ชั่น สำหรับแสดงรายชื่อสมาชิกหน้าลงทะเบียนสมช ด้านขวา
function showListTB_userregis(txt){
    var HTMLX ='';
    $.ajax({
            url:"../phpsv/SearchUser.php",
            method:"POST",
            data:{d:txt},
            dataType:"json",
            success: function(data)
            {
                //console.log(data);
                if(data != null){
                    for(var i =0; i<data.length; i++){
                        HTMLX +='<li class="lilistnameuserrg" id="'+data[i].IDUSERCODE+'">'+data[i].FNAME+'&nbsp;&nbsp;'+data[i].LNAME+'&nbsp;&nbsp;'+data[i].POSITION+'</li>';
                        }
                    }
                    $('.ul_listusernamerg').html(HTMLX);
                }
        })
    

}
////-------ฟังก์ชั่น สำหรับรับค่าจากช่้องค้นหาหน้าลวทะเบียนสมาชิก
function modulesearch_nameuser(){
    var txt ='';
    txt = $(".ipt_sch_gsuser").val();
    showListTB_userregis(txt);
    $(document).on("keyup", '.ipt_sch_gsuser', function(e){
        if(e.keyCode == 13){
            txt = $(".ipt_sch_gsuser").val();
            //console.log(txt);
            showListTB_userregis(txt);
            }
        
        })	
}