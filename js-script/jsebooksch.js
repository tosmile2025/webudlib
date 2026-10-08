$(document).ready(function(){
    document.getElementById('schipt-p2-main').focus();
    var typechk = '';
    var t = '';    
    Func_showTableList_search(typechk, t);
})
$(document).on('click', '.slc-type', function(){
    document.getElementById('schipt-p2-main').focus();
})
$(document).on('dblclick', '.tr-list-searchbooks', function(){
    ShowpopupDetailbooks(this);
   // console.log('test-dbclick');
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
// ----------------------------------- func  check var  session and input key search -//
function Func_showTableList_search(typechk, t){ 
    var txt_sch = sessionStorage.getItem("schebook");
    var type = sessionStorage.getItem("chkebook");   
    //  console.log(txt_sch); 
    if(txt_sch != null){
        func_showdataSearch(txt_sch, type)  
        }else{
            if(t != ""){               
                func_show_SearchList(typechk, t);                
            }else{
               // alert('กรุณาใส่คำค้นหา');
                nodataAjax_NoKey();
            }           
        }       
}
function nodataAjax_NoKey(){
    var html='';
    html += '  <tr class="tr-nodata-list">';
    html += '  <td colspan="4"><div> Data not font</td></div></tr>';
    $('.tb-list-books-sch').html(html); 
}
function func_show_SearchList(typechk, t){
    var spinner = '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div> Please Wait..';
    var html = ''; 
    var t = '';  
    $.ajax({
        url:'../php-process/listschebook.php',
        type:'POST',                    
        data:{'schText':t, 'typechk':typechk},
        dataType:'text',
        beforeSend:function(){
          $('#spinner-load').html(spinner);
         },
        success:function(data){
        //  console.log(data);
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
                          html += '<img src="../COVERIMAGES/'+data[i].IDLIKBOOK+'.'+'jpg'+'" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                       }else{
                         
                     html += '<img src="../fileimage/no-image-icon-15.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                   }           
                    html += '      </div>';
                     html += '      <div class="d-flex flex-column justify-content-center">'
                     html += '       <h6 class="mb-0 text-sm">'+data[i].NAME_BOOK+''+data[i].Key_M+'</h6>';                    
                     html += '       <p class="text-xs text-secondary mb-0">ผู้แต่ง:&nbsp;'+data[i].byname+':'+data[i].Key_O+'</p>';
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
                     html += '  <td>';
                     html += '    <p class="text-xs font-weight-bold mb-0">'+data[i].countpage+'</p>';
                     html += '    <p class="text-xs text-secondary mb-0"></p>';
                     html += '  </td>';
                     html += '  <td class="align-middle text-center text-sm">';
                     html += '    <span class="text-secondary text-xs font-weight-bold">'+data[i].yearbook+'</span>';
                     html += '  </td>';  
                     html += ' <td class="align-middle text-center">';
                     html += '   <div class="d-flex align-items-center justify-content-center">';
                     html += '    <span class="me-2 text-xs font-weight-bold">'+data[i].countnum+'%</span>';
                     html += '     <div>';
                     html += '      <div class="progress">';
                     html += '         <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width: '+data[i].countnum+'%;"></div>';
                     html += '       </div>';
                     html += '      </div>';
                     html += '    </div>';
                     html += '  </td>';
                     html += ' </tr>';
                 }
             
                  $('#tb-book-listhit').html(html);
                  $('#spinner-load').text("");  
        }
      
    }
       
        
    })  
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
$(document).on('keypress', '#schipt-p2-main', function(e){
    // console.log(e);
     Func_center_Search(e);
})
// ----------------------------------- func  Search center page main---------//
function Func_center_Search(e){    
    if(e.key === 'Enter' || e.keyCode === 13){
    //
        var txt_sch =  document.getElementById('schipt-p2-main').value;  
        var itemchk = document.getElementById('sbtn-txt');        
        // console.log(itemchk.getAttribute('data-type'));
       func_showdataSearch(txt_sch, itemchk.getAttribute('data-type'));
    }
}
function func_showdataSearch(txt_sch, type){
    var spinner = '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div> Please Wait..';
    var html = '';
    // console.log(type);  
    if(txt_sch !=''){
        $.ajax({
            url:'../php-process/search_ebook.php',
            type:'POST',                    
            data:{'txt_sch':txt_sch, 'type':type},
            dataType:'json',
            beforeSend:function(){
                $('#spinner-load').html(spinner);
            },      
            success:function(data){
                //  console.log(data);
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
                                  html += '<img src="../COVERIMAGES/'+data[i].IDLIKBOOK+'.'+'jpg'+'" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                               }else{
                                 
                             html += '<img src="../fileimage/no-image-icon-15.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
                           }           
                            html += '      </div>';
                             html += '      <div class="d-flex flex-column justify-content-center">'
                             html += '       <h6 class="mb-0 text-sm">'+data[i].NAME_BOOK+'&nbsp;เเปล:&nbsp;'+data[i].Key_O+'</h6>';                    
                             html += '       <p class="text-xs text-secondary mb-0">ผู้แต่ง:&nbsp;'+data[i].byname+':ตีพิมพ์ที่:&nbsp;'+data[i].publish+'</p>';
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
                             html += '  <td>';
                             html += '    <p class="text-xs font-weight-bold mb-0">'+data[i].COUNTPAGE+'</p>';
                             html += '    <p class="text-xs text-secondary mb-0"></p>';
                             html += '  </td>';
                             html += '  <td class="align-middle text-center ">';
                             html += '    <p class="text-xs text-secondary mb-0">'+data[i].Year_book+'</p>';
                             html += '  </td>';                           
                             html += '  <td class="align-middle text-center">';
                             html += '    <p class="text-xs text-secondary mb-0">'+data[i].dpat+'</p>';
                             html += '  </td>';    
                            
                             html += ' </tr>';
                         }
                     
                          $('.tb-list-books-sch').html(html);
                          $('#spinner-load').text("");  
                }
            }
            
        })
    } 
   sessionStorage.removeItem("schebook");
  sessionStorage.removeItem("chkebook");   
}
function nodataAjax(){
    var html='';
    html += '  <tr class="tr-nodata-list">';
    html += '  <td colspan="4"><div> DATA NOT FONT</td></div></tr>';
    $('.tb-list-books-sch').html(html); 
}
// -----------------------------------------------------function  epen windows tab ebooks details
function  ShowpopupDetailbooks(dist){
        //  console.log(dist);   
   var idcode =  dist.getAttribute('id-data');
        localStorage.setItem('clk_chap', idcode);
        window.open("../assets/E-book-chapter.php", "_blank"); 
        func_countClick(idcode);
}
function func_countClick(idcode){
    // console.log(idcode);
    $.ajax({
        url:'../php-process/adcount_read.php',
        type:'POST',                    
        data:{'idcode':idcode},
        dataType:'text',
        success:function(items){
        //    console.log(items);
        }        
    })
}
