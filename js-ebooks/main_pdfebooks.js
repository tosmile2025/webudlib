$(document).ready(function(){
// console.log(window.screen.height);
var idbook = localStorage.getItem('clk_chap');
    if(idbook != null){     
        func_showdetail_ebooks(idbook); 
    }
    // console.log('testtt');
})
$(window).resize(function() {
    var myhight = window.innerHeight; 
   if(myhight <= 900){   
    // console.log(myWidth);
    var div = document.querySelectorAll('.box-detail-books');
    var ele = document.getElementsByClassName('.h-detail')[0];
        div[0].classList.add('activeSize');
        div[1].classList.add('activeSize');
        ele.style.display='block';
      
   }else{
    var div = document.querySelectorAll('.box-detail-books');
   div[0].classList.remove('activeSize');
   div[1].classList.remove('activeSize');
   
}
 }).resize();
$(document).on('click', '.btn-click-menu', function(){
    var resize = window.innerWidth;
    // console.log(resize);
    var menu = document.getElementById('hidden-menuebooks');
    var btn = document.getElementById('sidebar-section');
    var txt = document.getElementById('id-box-text-rotet');
    // console.log(txt);
  if(resize > 766){
    if(menu.clientWidth == 230){     
       btn.classList.add('activeebooks');
       txt.style.display ="flex";
    }else{
        btn.classList.remove('activeebooks');
        txt.style.display ="none";
    }
  }else{
    stop;
  }
})
function func_showdetail_ebooks(idbook){
// console.log(idbook+'test');
    var ele = document.querySelectorAll('#txt-detail-ebooks');
//    console.log(ele);
    var img = document.getElementById('pic-ebooks-id');
    var HTML = '';
    var spinner = '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div> Please Wait..'; 
    $.ajax({
        url:'../phpsv-ebooks/show-detail-ebook.php',
        type:'POST',                    
        data:{'idbook':idbook},
        dataType:'json',      
        success:function(data){
    //    console.log(data);          
            document.getElementById('id-txt-div-rotet').innerText = data[0].NAME_BOOK;
            ele[0].innerText= data[0].BARCODE;
            ele[1].innerText= data[0].byname+'แปล:'+data[0].Key_O;
            ele[2].innerText= data[0].publish;
            ele[3].innerText= data[0].ISBN;
            ele[4].innerText= data[0].count_read;
            ele[5].innerText= data[0].NAME_BOOK;
            if(data[0].strjpg == 1){
                img.src = '../COVERIMAGES/'+data[0].filejpg+'';               
            }
        }    
    })
    $.ajax({
        url:'../phpsv-ebooks/show-detailchapter.php',
        type:'POST',                    
        data:{bcode:idbook},
        dataType:'json',  
        success:function(txt){
            txt.forEach((items) =>{
            //    console.log(items);
                 HTML += ' <li><p class="li-listchap" ondblclick="func_pdf(this);" data-id="'+items.ID_content+'" >'+items.con_name+'</p></li>';
            })
          
        //    console.log(txt);          
        //    lilistchapter
        //    <li><p> Lorem ipsum dolor sit ametdfsfsdf</p></li>
        document.getElementById('lilistchapter').innerHTML = HTML;
        }     
    
    })
    localStorage.removeItem('clk_chap');
}
function func_pdf(dis){
    var li = document.querySelectorAll('.li-listchap');
    // console.log(dis);
    li.forEach((ele) =>{
        if(ele == dis){
            ele.style.color = "#f52929";
          var idcon =   dis.getAttribute('data-id');
            func_showPDFFiles(idcon);
        }else{
            ele.style.color = "rgb(57,68,78, 0.8)";
        }
     
        // 
       
          
       
    })
}
function func_showPDFFiles(idcon){
    // console.log(idcon);  
    var popup = document.getElementById('myModal-alert');
   var pdfhtml = ''; 
   $.ajax({
        url:'../phpsv-ebooks/show-pdrfile.php',
        type:'POST',                    
        data:{'idcon':idcon},
        dataType:'json',
        beforeSend:function(){
           popup.style.display='block';
        },
        success:function(data){
            // console.log(data);         
            popup.style.display='none'; 
            //  console.log(data);           
            pdfhtml +='<object id="pdf-fileshow" data="../file-chapters/'+data[0].barcode+'/'+data[0].file_name+'" type="application/pdf" width="100%" height="900">';
            pdfhtml +='<p>Unable to display PDF file. <a id="a_filePDFtxt" href="../file-chapters/'+data[0].barcode+'/'+data[0].file_name+'">Download</a> instead.</p>';
          document.getElementById('show-pdf-element').innerHTML = pdfhtml;     
        
        }
    
    })
}