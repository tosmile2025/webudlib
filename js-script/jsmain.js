$(document).ready(function(){
    document.getElementById('schipt-p2-main').focus();
    var typechk = '';
    var t = '';    
    Func_showTableList_search(typechk, t);
})
$(document).on('dblclick', '.tr-list-searchbooks', function(){
    ShowpopupDetailbooks(this);
   // console.log('test-dbclick');
})
$(document).on('keypress', '#schipt-p2-main', function(e){
    Func_center_Search(e);
    })

function func_TabClcik(dis){
    if(dis.id == 'bookhit_id'){
        location.href = "../file-page/books-hit.php";
    }else if(dis.id == 'home_id'){
        location.href = "http://192.168.49.2/budlib"; 
    }else if(dis.id =='Ebook_id'){
        location.href = "../ebook-filepage/ebooks-sch.php";
    }else if(dis.id == 'comment_id'){
        location.href = "https://docs.google.com/forms/d/1rhf_gVITLnIgjJ5kS_Bx1XR9BVE0KzrWsRBrc-enHds";
    }else{
        stop;
    }

}
// ---------------------------function  select menu dropdown-- type Search-------------------------------	
const optionMenu = document.querySelector('.select-menu'),
    selectBtn = optionMenu.querySelector('.select-btn'),
    optionst = optionMenu.querySelectorAll('.option'),
    sBtn_text = optionMenu.querySelector('.sBtn-text');
selectBtn.addEventListener('click', ()=> optionMenu.classList.toggle('active'));

optionst.forEach(option =>{
    option.addEventListener("click", ( )=>{
		var att = document.createAttribute('data-type');
        let selectedOption = option.querySelector('.option-text');
		var id =  selectedOption.getAttribute('id-data');
		let txt = selectedOption.innerText;
		att.value = id;		
	//  console.log(txt);
		sBtn_text.setAttributeNode(att);
        sBtn_text.innerText = txt;		
    //    console.log(selectedOption);		
        optionMenu.classList.remove('active');
        document.getElementById('schipt-p2-main').focus();
    })
    const mout= document.getElementById('ul-navitems-type');
    mout.addEventListener('mouseleave', ()=>{
        optionMenu.classList.remove('active');
       document.getElementById('schipt-p2-main').focus();
    })
    const inputsch = document.getElementById('schipt-p2-main');
    inputsch.addEventListener('click', ()=>{
        optionMenu.classList.remove('active');
    })
    
})
// ----------------------------------- func  check var  session and input key search -//
function Func_showTableList_search(typechk, t){ 

    var txtsch = sessionStorage.getItem("sch");
    var type = sessionStorage.getItem("chk");
    if(txtsch != null){
        if(txtsch != ''){
            func_show_RedyTBList(txtsch, type);     
            }
        }else{               // alert('กรุณาใส่คำค้นหา');
                nodataAjax();
            } 
}
function nodataAjax(){
    var html='';
    html += '  <tr class="tr-nodata-list">';
    html += '  <td colspan="4"><div> DATA NOT FONT</td></div></tr>';
    $('.tb-list-books-sch').html(html); 
}
// ------------------------------------------ฟังก์ชั่น เมื่อค้นหาจากหน้าหนังสือยอดนิยมแล้วมาเด้งที่หน้าค้นหาหลัก
function func_show_RedyTBList(txtsch, type){
// console.log('test'+type);
    var spinner = '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div> Please Wait..';
    var html = '';
    var numR = Math.random();
    $.ajax({
        url:'../php-process/search-books.php',
        type:'POST',                    
        data:{'txt_sch':txtsch,'type':type},
        dataType:'json',
        beforeSend:function(){
            $('#spinner-load').html(spinner);  
        },
        success:function(data){
            // console.log(data);
            if(data[0].no == "NODATA"){
                nodataAjax();
                $('#spinner-load').text(""); 
              }else{  
                for(var i =0; i < data.length; i++){
                    //    console.log(txt[i].countnum);
                       html += '  <tr class="tr-list-searchbooks" id-data="'+data[i].BARCODE+'">';
                         html += '  <td>';
                         html += '    <div class="d-flex px-2 py-1">';
                         html += '      <div>';  
                       if(data[i].strjpg == 1){
                              html += '<img src="../COVERIMAGES/'+data[i].IDLIKBOOK+'.'+'jpg?v='+numR+''+'" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                           }else{
                             
                         html += '<img src="../fileimage/no-image-icon-15.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                       }           
                        html += '      </div>';
                         html += '      <div class="d-flex flex-column justify-content-center">'
                         html += '       <h6 class="mb-0 text-sm txt-p">'+data[i].NAME_BOOK+'&nbsp;หมายเหตุ:&nbsp;'+data[i].Key_M+'</h6>';                    
                         html += '       <p class="text-xs text-secondary mb-0 txt-p">ผู้แต่ง:&nbsp;'+data[i].byname+':&nbsp;แปล:&nbsp;'+data[i].Key_O+'</p>';
                         html +=        '<div class="ytp-progress-tooltip" style="" aria-hidden="true" data-placement="top">';
                         html +=        '<div class="ytp-progress-tooltip-timestamp-container">';
                         html +=        '<div class="ytp-progress-tooltip-timestamp">Double click to detail</div>';
                         html +=        '</div>';
                         html +=        '<div class="ytp-progress-tooltip-arrow"></div>';
                        html +=         '</div>';
                        //  html +=        '<span class="tooltiptext">Tooltip</span>';
                         html += '      </div>';                    
                         html += '    </div>';
                         html += '  </td>';
                         html += '  <td>';
                         html += '    <p class="text-xs font-weight-bold mb-0">'+data[i].BARCODE+'</p>';
                         html += '    <p class="text-xs text-secondary mb-0"></p>';
                         html += '  </td>';                        
                         html += '  <td class="align-middle text-center">';
                         html += '    <span class="text-secondary text-xs font-weight-bold">'+data[i].Catbook_store+':'+data[i].BYNUM+'</span>';
                         html += '  </td>';                    
                         html += '  <td class="align-middle text-center text-sm">';
                         html += '    <span class="text-secondary text-xs font-weight-bold">'+data[i].Year_book+'</span>';
                         html += '  </td>';            
                         html += ' </tr>';
                     }
             
                  $('.tb-list-books-sch').html(html);
                  $('#spinner-load').text("");  
                }
        }
       
        
    })
    sessionStorage.removeItem("sch");
    sessionStorage.removeItem("chk"); 
}
// -----------------------------------------------------function  popup detail books and export books
function  ShowpopupDetailbooks(dist){
    //  console.log(dist);
   var HTML ='';
   var txt =  dist.getAttribute('id-data');
   var boxmodal = document.getElementById('boxModal_showschbooks');
   var numR = Math.random();
   boxmodal.style.display = "block";
//  console.log(txt);
    $.ajax({
        url:'../php-process/show-dt-books.php',
        type:'POST',
        data:{'idbook':txt},
        dataType:'json',
        success:function(data){
            // console.log(data);
                        $('.nameuser').val(data[0].NAME_BOOK);
						$('.schprint').val(data[0].Key_E);
						$('.schcountbk').val(data[0].COUNTPAGE);
						$('.plishsch').val(data[0].publish);
						$('.ISBNsch').val(data[0].ISBN);
          
        }
    })
    $(document).on('click', '.close_showschbooks', function(){
        boxmodal.style.display = "none";
        //localStorage.removeItem("aRRay");
        
        })
        $.ajax({
            url:"../php-process/Checkorderbk-new.php",
            method:"POST",
            data:{'bcode':txt},
            dataType:"json",
            success: function(recall){
        // console.log(recall);
            if(recall != null){
                if(recall.str == "NO"){
                    STR = 'มีหนังสือ';
                    $(".statusbook").html(STR);
                    $(".statusbook").css("background-color", "#20B2AA");
                    if(recall.str_pic == "P" ){
                        //var test = '<img class="img_box" src="'+'..'+/COVERIMAGES/+''+recall.pic+'.jpg'+'">';
                        //console.log(test);                      
                         $('#boxpic_books').html('<img class="img_books" src="../COVERIMAGES/'+recall.pic+'.'+'jpg?v='+numR+''+'">');
                        }else{
                              $('#boxpic_books').html('<img class="img_books" src="'+'..'+/fileimage/+'no-image-icon-15.png'+'">');
                            }
                    
                    }else{
                            STR = 'หนังสือถูกยืม/จอง';
                            $(".statusbook").html(STR);
                            $(".statusbook").css("background-color", "#CD5C5C");
                            for(var t = 0; t < recall.length; t++){								
                            //console.log(recall[t].LNAME);	
                            if(recall[t].bcexbook != null){
                                HTML += '<tr>';
                                HTML += '<td>'+recall[t].bcexbook+'</td>';
                                HTML += '<td>ยืม</td>';
                                HTML += '<td>'+recall[t].Dend+'</td>';
                                HTML += '<td>'+recall[t].FNAME+'&nbsp;'+recall[t].LNAME+'</td>';
                                HTML += '</tr>';
                                if(recall[t].str_pic == "P"){
                                    $('#boxpic_books').html('<img class="img_books" src="../COVERIMAGES/'+recall[t].IDLIKBOOK+'.'+'jpg?v='+numR+''+'">');
                                    }else{
                                         $('#boxpic_books').html('<img class="img_books" src="'+'..'+/fileimage/+'no-image-icon-15.png'+'">');
                                        }
                                
                                }else if(recall[t].idorderbk != null){
                                    HTML += '<tr>';
                                    HTML += '<td>'+recall[t].idorderbk+'</td>';
                                    HTML += '<td>จอง '+recall[t].number+'</td>';
                                    HTML += '<td>'+recall[t].order_day+'</td>';
                                    HTML += '<td>'+recall[t].FNAME+'&nbsp;'+recall[t].LNAME+'</td>';
                                    HTML += '</tr>';
                                    if(recall[t].str_pic == "P"){
                                        $('#boxpic_books').html('<img class="img_books" src="../COVERIMAGES/'+recall[t].IDLIKBOOK+'.'+'jpg?v='+numR+''+'">');
                                        }else{
                                         $('#boxpic_books').html('<img class="img_books" src="'+'..'+/fileimage/+'no-image-icon-15.png'+'">');
                                        }																				
                                }		
                    
                            }
                        
                        }
                        
                }
                $('.statusbook').html(STR);	
                $('.tbTwo_usebooks').html(HTML);		
            }
        })


}
function Func_center_Search(e){
    if(e.key === 'Enter' || e.keyCode === 13){ 
            var txtsch =  document.getElementById('schipt-p2-main').value;
        if(txtsch != ''){
            const type = document.getElementById('sbtn-txt').getAttribute('data-type');
            //  console.log(typechk);
            func_show_RedyTBList(txtsch, type)
        }
    }
}


