// ----------------------------------- func  show list bookhit  and pagination li----------//
$(document).ready(function(){

    func_likebooks();
})
$(document).on('click', '#clk-bookhit', function(){
    // console.log("test");
    func_likebooks();
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
        document.getElementById('sch-ipt-bk').focus();
    })
    const mout= document.getElementById('ul-navitems-type');
    mout.addEventListener('mouseleave', ()=>{
        optionMenu.classList.remove('active');
       document.getElementById('sch-ipt-bk').focus();
    })
    const inputsch = document.getElementById('sch-ipt-bk');
    inputsch.addEventListener('click', ()=>{
        optionMenu.classList.remove('active');
    })
    
})
// ----------------------------------- func  show list bookhit table list----------//
 function func_likebooks(){
    //console.log("test-Click");
    var html = '';
    var data = "1";
    var numR = Math.random();
    $.ajax({
        url:'../php-process/rp-bookslike.php',
        type:'POST',                    
        data:{'t':data},
        dataType:"json",
        success: function(txt){
        // console.log(txt);
        for(var i =0; i < txt.length; i++){
           // console.log(txt[i].countnum);
            html += '  <tr id="'+txt[i].BARCODE+'">';
            html += '  <td>';
            html += '    <div class="d-flex px-2 py-1">';
            html += '      <div>';  
          if(txt[i].strjpg == 1){
                 html += '<img src="../COVERIMAGES/'+txt[i].IDLIKBOOK+'.'+'jpg?v='+numR+'" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
              }else{
                //console.log(txt[i].barcode);
            html += '<img src="../fileimage/no-image-icon-15.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">';
          }           
           
            html += '      </div>';
            html += '      <div class="d-flex flex-column justify-content-center">'
            html += '       <h6 class="mb-0 text-sm txt-p">'+txt[i].NAME_BOOK+'&nbsp;ฉบับ:&nbsp;'+txt[i].Key_M+'</h6>';
            html += '       <p class="text-xs text-secondary mb-0">ผู้แต่ง:'+txt[i].byname+'&nbsp;แปล:&nbsp;'+txt[i].Key_O+'</p>';
            html += '      </div>';
            html += '    </div>';
            html += '  </td>';
            html += '  <td>';
            html += '    <p class="text-xs font-weight-bold mb-0">'+txt[i].BARCODE+'</p>';
            html += '    <p class="text-xs text-secondary mb-0"></p>';
            html += '  </td>';                        
            html += '  <td class="align-middle text-center">';
            html += '    <span class="text-secondary text-xs font-weight-bold">'+txt[i].Catbook_store+':'+txt[i].BYNUM+'</span>';
            html += '  </td>';
            html += ' <td class="align-middle text-center">';
            html += '   <div class="d-flex align-items-center justify-content-center">';
            html += '    <span class="me-2 text-xs font-weight-bold">'+txt[i].countnum+'</span>';
            html += '     <div>';
            html += '      <div class="progress">';
            html += '         <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" style="width: '+txt[i].countnum+'%;"></div>';
            html += '       </div>';
            html += '      </div>';
            html += '    </div>';
            html += '  </td>';           
            html += '  <td class="align-middle text-center text-sm">'; 
            if(txt[i].Active_book == 1){
               // console.log(txt[i].str_bookex);
            html += '    <span class="badge badge-sm bg-gradient-danger">use</span>';               
            }else{
            html += '    <span class="badge badge-sm bg-gradient-success">ready</span>';       
            }  
            html += '  </td>';            
            html += ' </tr>';
        }
        $('.tb-cls-fix').html(html);
            var numrow  = txt.length;
            if(numrow !=""){
            //    console.log(numrow);
                func_showTableList(numrow);
            }           
            }       
        })
}
// ----------------------------------- func  Search center page main---------//
function Func_center_Search(e){
    if(e.key === 'Enter' || e.keyCode === 13){ 
            var t =  document.getElementById('sch-ipt-bk').value;
        if(t != ''){
            const typechk = document.getElementById('sbtn-txt').getAttribute('data-type');
            // console.log(typechk);
          Func_showTableList_search(typechk, t);
        }
    }
}
// ----------------------------------- func  Search input page bookhit open page Search main--------//
function func_Show_sch(chk, txt){  
    // console.log(txt);  
    sessionStorage.setItem("sch", txt);
    sessionStorage.setItem("chk", chk);
    document.getElementById('sch-ipt-bk').value="";   
    window.open("../file-page/sear-ch.php", "_blank");    
    // console.log(txt);
}
// ----------------------------------- func  check var  session and input key search -//
function Func_showTableList_search(typechk, t){ 
    sessionStorage.setItem("sch", t);
    sessionStorage.setItem("chk", typechk);
    document.getElementById('sch-ipt-bk').value="";   
    window.open("../file-page/sear-ch.php");    
    // console.log(t);
}
function nodataAjax(){
    var html='';
    html += '  <tr class="tr-nodata-list">';
    html += '  <td colspan="4"><div> DATA NOT FONT</td></div></tr>';
    $('.tb-list-books-sch').html(html); 
}
// ----------------------------------- func  pagination page bookhit path 1
function func_showTableList(numrow){
	// console.log(numrow);
	var page = 2;
    ulTag = document.getElementById("pagination");
	//console.log(ulTag);
	var tablex ='#invoice-tb-hed';
	var pageNum =0;	
	//console.log(tablex);			
			//console.log(table);
		
				//console.log(num);
				/*$('#maxRows').on('change', function(){*/
					//console.log(table)
					$('#pagination').html('');
						var trnum =0;
						var maxRows = parseInt(6);// จำนวนแถวที่ต้องการแสดง
						var totalRows = $(tablex+' tbody tr').length; // จำนวน แถว						//console.log(maxRows);		
						// console.log(totalRows);			
					$(tablex+' tr:gt(0)').each(function(){
                        trnum++
						//console.log(trnum);
						if(trnum > maxRows){
							$(this).hide();
							}
						if(trnum <= maxRows){
							$(this).show()
							}
                    });				
								
						//$('.pagination li:first-child').addClass('active');
						$(document).on('click', '#pagination li', function(){
							var pageNum = $(this).attr('data-page');
							var page = $(this).attr('data-num');
							//console.log(this);
							//console.log(page);
							pagination_buttom(pageNum, page, totalRows, maxRows, tablex);
							var trIndex =0;							
							//$('.pagination').removeClass('active');
							//$(this).addClass('active');
							//var tb = 'tr:gt(0)';
							//console.log(tb);
						if(pageNum != ""){	
							$(tablex+' tr:gt(0)').each(function(){
								//console.log(pageNum );
                                trIndex++
								//console.log(maxRows*pageNum);
								if(trIndex > (maxRows*pageNum) || trIndex <=((maxRows*pageNum)-maxRows)){
									$(this).hide();
									}else{
										//console.log(this);
										$(this).show();
										}
                            	});
								}
							})
                            pagination_buttom(pageNum, page, totalRows, maxRows, tablex);
						//console.log(liTag);
	}
// ----------------------------------- func  pagination page bookhit path 2	
function pagination_buttom(pageNum, page, totalRows, maxRows, tablex){
    var liTag = '';    
    page.toString();
    // console.log(page);
    var activeLi;
    var totalPages = pagenum;
    var beforePages = page - 1;
    var afterPages =   +page+ +1;
    //console.log(beforePages);
    //console.log(afterPages);
if(totalRows > maxRows){
        var pagenum = Math.ceil(totalRows/maxRows);
    //console.log(pagenum);
    if(page > 1){
        //console.log(page);
        var pagesum = page -1;
        //console.log(pagesum);
        liTag += '<li class="btn prev" data-page="" data-num="'+pagesum +'"><span><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>';
        }
        if(page > 2){
                liTag += '<li class="numb" data-page="1" data-num="1" ><span>1</span></li>';
                if(page > 3){
                    liTag += '<li class="dots"><span>...</span></li>';
                    }
            }
        if(page == pagenum){
            beforePages = beforePages -2;
            }else if(page == pagenum - 1){
                beforePages = beforePages -1;
                }
        if(page == 1){
            afterPages  = +afterPages + +2;
            }else if(page == 2){
                afterPages  = +afterPages+  +1;
                }		
        for(var i=beforePages; i <=afterPages;i++){						
                if(i> pagenum){
                    continue;
                    }
                    if(i == 0){
                        i = +i+ +1;
                        }
                    if(page == i){
                        pageNum = page;
                        activeLi = "active";
                            if(pageNum != ""){	
                            var trIndex =0;		
                                $(tablex+' tr:gt(0)').each(function(){
                                    //console.log(pageNum );
                                    trIndex++
                                    //console.log(maxRows*pageNum);
                                    if(trIndex > (maxRows*pageNum) || trIndex <=((maxRows*pageNum)-maxRows)){
                                        $(this).hide();
                                        }else{
                                            //console.log(this);
                                            $(this).show();
                                            }
                                    });
                                    }
                        }else{
                            activeLi = "";
                            }
                        //	console.log(i);
            //$('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show();
            liTag += '<li class="numb '+activeLi+'" data-page="'+i+'" data-num="'+i+'")"><span>'+i+'</span></li>';
            }
        if(page < pagenum - 1){
            //console.log(pagenum);				
            if(page < pagenum -2){
                liTag += '<li class="dots"><span>...</span></li>';
                }
                
                liTag += '<li class="numb" data-num="'+pagenum+'" data-page="'+pagenum+'"><span>'+pagenum+'</span></li>';
            }	
            
            if(page < pagenum){
                    var pagesumn = +page+ +1 ;
                    //console.log(pagesumn);									
                    liTag += '<li class="btn next"data-page="" data-num="'+pagesumn+'"><span>Next<i class="fa fa-angle-right" aria-hidden="true"></i></span></li>';
                    }
}
                    ulTag.innerHTML = liTag;
                    // console.log(ulTag);
}

