//-------------------------------------------------------ฟังก์ชั่น login admin  	
function Login_admin(){
    // console.log("test");
    var iduser = document.getElementById("idlogin").value;
    var pwuser = document.getElementById("pwlogin").value;
//   console.log(iduser);	
        $.ajax({
                url:"../phpsv/check_login.php",
                method:"POST",
                data:{iduser:iduser, pwuser:pwuser},
                dataType:"json",
                success: function(data){
                    // console.log(data);
                    if(data[0] == "suc"){
                    // console.log(data[1]);
                    localStorage.setItem("idxname", data[2]);				
                   window.location.href ='../assets/index.php';;					
                    //window.open(dats, '_blank');
                       
                    
                        }else{
                            alert("check User and Passwords")
                            }
                    }
            
});
            
            
}	