function TableListShow(){
   const htmlTable = document.getElementsByClassName('ListSell')[0];   
   htmlTable.innerHTML ="";
       const xml = new XMLHttpRequest();      
      xml.open("POST", "phpweb/dbShowtable.php");
      xml.send();
      xml.onreadystatechange = async  function () {
         if (xml.status == 200 && xml.readyState == 4) {
            try {
               const data = JSON.parse(xml.responseText);
               // funcSubTableShow(data);
              createTable(data, htmlTable)
            } catch (error) {

            }

         }
      }
}
  function createTable(data, htmlTable) {             
            
            // วนลูปข้อมูล โดยข้ามไปทีละ 3 รายการต่อ 1 แถว (row)
            for (let i = 0; i < data.length; i += 3) {
                // สร้างแถวใหม่ (tr)
                const row = document.createElement('tr');
                
                // วนลูปเพื่อใส่ข้อมูล 3 คู่ (รหัส, จำนวน) ในแถว
                for (let j = 0; j < 3; j++) {
                    const dataIndex = i + j;
                    
                    if (dataIndex < data.length) {
                        // ข้อมูลมีอยู่
                        const item = data[dataIndex];
                        
                        // คอลัมน์ "รหัส"
                        const codeCell = document.createElement('td');
                        codeCell.textContent = item.code;
                        row.appendChild(codeCell);
                        
                        // คอลัมน์ "จำนวน"
                        const amountCell = document.createElement('td');
                        amountCell.textContent = item.amount;
                        row.appendChild(amountCell);
                    } else {
                        // ข้อมูลหมดแล้ว ให้ใส่ช่องว่าง 2 ช่อง (สำหรับ รหัส และ จำนวน)
                        const emptyCodeCell = document.createElement('td');
                        emptyCodeCell.textContent = '';
                        row.appendChild(emptyCodeCell);

                        const emptyAmountCell = document.createElement('td');
                        emptyAmountCell.textContent = '';
                        row.appendChild(emptyAmountCell);
                    }
                }
                
                // เพิ่มแถวเข้าใน tbody
                htmlTable.appendChild(row);
            }
        }

function  funcSubTableShow(txtData) {
  
   const htmlTable = document.getElementsByClassName('ListSell')[0];   
    htmlTable.innerHTML = "";  
   // console.log(txtData);
   
    if (txtData != null) {
      let amount =0;
        txtData.forEach((item, idx) => {
            const row = document.createElement('tr');
            row.setAttribute('class', "tr-listStore");          
            const values = Object.values(item);
             amount += values.length;
         //  console.log(amount);
          
            // console.log(values);
            for (let col = 0; col < 8; col++) {
                const cell = document.createElement('td');
                // number += values[6];
               // console.log(values);
               if (col == 0) {
                    cell.textContent = values[0];
                } else if (col == 1) {
                    cell.textContent = values[1];
                }
                else if (col == 2) {
                    cell.textContent = values[3];
                }
                else if (col == 3) {
                    cell.textContent = values[4];
                }
                else if (col == 4) {
                    cell.textContent =values[5];
                }
                else if (col == 5) {
                    cell.textContent = values[6];
                }
                else if (col == 6) {
                    cell.textContent = values[9];
                }

                row.appendChild(cell);
            }            
        htmlTable.appendChild(row);
         //   console.log(htmlTable);           
        });   
    } else {
        htmlTable.innerHTML = "";
    }
  
}


function func_onClickReservation() {    
   const btn = document.getElementById("btn-ClickOpen");
   btn.onclick = () => { 
      const popup = document.getElementById('boxModal_popSearch_resu');
      const input = popup.querySelectorAll('input');
      const btn =  popup.querySelector('button');
      const xml = new XMLHttpRequest();
      const myFormData = new FormData();
      // console.log(input);
      btn.addEventListener('click', ()=>{
         let textCheck = func_CheckInput(popup, input);
         // console.log(textCheck);
         if (textCheck != "false") {
            // console.log(input[2]); //2,3            
            input.forEach((item) =>{
               myFormData.append('arrData[]', item.value);
            })
            xml.open("POST", "phpweb/addUserrsv.php");
            xml.send(myFormData);
            xml.onreadystatechange = async() => {
                if (xml.status == 200 && xml.readyState == 4) {
                    try {
                     //  console.log(xml.responseText); 
                     const data = JSON.parse(xml.responseText);
                     // console.log(data); 
                        // console.log(JSON.parse(xml.responseText)); 
                        if (data[0].err == "Duplicat") {                          
                          popupError("เคยจองแล้ว");                         
                        } else if(data[0].err == true) {
                             popupSuccessTxt("บันทึก");
                           //   console.log(input[1].value);                             
                             sessionStorage.setItem('iduser', input[1].value);
                             sessionStorage.setItem('nameuser', input[2].value);
                             setTimeout(()=>{
                              window.location.href = "reservation.html";
                             },1600);
                             
                        }else{
                            popupError("ไม่สามารถเข้าระบบได้");
                        }
                    } catch (error) {
                        console.log(error);                       
                    }
                }
            }
        }
         
      })
      popup.querySelector('span').onclick=()=>{
          popup.style.display="none";
      }
      popup.style.display="block";
   }
   
}

// ------------------------func_check input value = null --------------------------------------------
function func_CheckInput(popup, input) {
    // console.log(pop.querySelectorAll('.ipt-regisShop')[1].value);  
    const small = popup.querySelectorAll('small');
   //  console.log(small);
    
    const stt = [];
    input.forEach((item, indx) => {
        if (item.value == "") {
            // console.log(small[indx]);            
            small[indx].style.opacity = 1;
            stt.push('st', 1);
        }else{
         small[indx].style.opacity = 0;
        }

    })
    // console.log(stt);
    if (stt.length > 0) {
        return "false";
    } else {
        return "true";
    }

}


function func_swiperHeader() {
   
   var swiper = new Swiper(".mySwiper", {      
      cssMode: true,
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      pagination: {
         el: ".swiper-pagination",
      },

      mousewheel: true,
      keyboard: true,


   });
   // console.log('ss');
   //     autoplay: {
   //     delay: 5000, // 3 seconds
   //     disableOnInteraction: false,
   //   },
 
   const btnShowbudlib = document.getElementById('btnShowbudlib');
   btnShowbudlib.addEventListener('click', ()=>{
      const popDiv = document.getElementById('boxModal_showSwiperBudlib');
      const xml = new XMLHttpRequest();
      xml.open("POST", "phpweb/slidePic1.php");
      xml.send();
      xml.onreadystatechange = ()=>{
         if (xml.status == 200 && xml.readyState == 4) {
            try {
               Func_OwlCarousel();
               const data = JSON.parse(xml.response);
               // console.log(data);
               const mainDiv = document.getElementById('showSwiper');
                  data.forEach((item) => {    
                  const childEle = document.createElement('div');
                     const eleimg = document.createElement('img');
                     childEle.setAttribute('class', "owl-items");
                     eleimg.setAttribute('class', "img-fluid");
                     eleimg.src = `img/newBudlib/${item.name}`;
                     childEle.append(eleimg);
                     // console.log(childEle);
                     mainDiv.appendChild(childEle);

                  })
                   popDiv.style.display = "block";
            } catch (error) {
               console.log(error);               
            }
         } 
      }
       document.addEventListener("click", (e) => {
         // console.log(e.target.id);         
         if (e.target.id == "boxModal_showSwiperBudlib") {
            popDiv.style.display = "none";
          window.location.reload();
         } else if(e.target.id == "div1"){
                  popDiv.style.display = "none";
          window.location.reload();
         }
      });
     

   })
   const btnShowpic = document.getElementById('btnShowpic');
   btnShowpic.addEventListener('click', () => {
      // console.log('ssstest');

      const popupDiv = document.getElementById('boxModal_contianer');
      const xml = new XMLHttpRequest();
     
      xml.open("POST", "phpweb/slidePic.php");
      xml.send();
      xml.onreadystatechange = function () {
         if (xml.status == 200 && xml.readyState == 4) {
            try {
               const data = JSON.parse(xml.responseText);
               // console.log(xml.responseText);
               func_showForlooppic(data, popupDiv)
            } catch (error) {

            }

         }
      }
      document.addEventListener("click", (e) => {
         if (e.target.id == "boxModal_contianer") {
            popupDiv.style.display = "none";
          window.location.reload();
         }
      });
   })
}
window.onload = adjustElementHeight;
// window.onresize = adjustElementHeight; 
window.addEventListener('resize', adjustElementHeight);
function adjustElementHeight() {
   const windowHeight = window.innerHeight;
   //  const winwidth = window.innerWidth;
   //  console.log(windowHeight);

   const element = document.getElementById('mainSwiper');
   if (element) {
      element.style.height = windowHeight + 'px';
   }
}
function Func_OwlCarousel() {
   $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        // ตัวเลือกที่สำคัญ   
        items: 1,       // กำหนดให้แสดงรูปภาพ 1 รูปต่อครั้ง
        loop: true,     // วนลูปเมื่อถึงรูปสุดท้าย
        nav: true,      // แสดงลูกศรซ้าย/ขวา (Navigation buttons)
        slideBy: 1,     // เลื่อนสไลด์ไปทีละ 1 รูปเมื่อคลิก nav
        // ตัวเลือกอื่นๆ ที่เป็นประโยชน์ (ไม่บังคับ)
        margin: 10,     // ระยะห่างระหว่างไอเท็ม
        dots: false,    // ไม่แสดงจุดด้านล่าง (ตามต้องการ)
        navText: ['<i class="fa fa-arrow-circle-left text-white" aria-hidden="true"></i>', '<i class="fa fa-arrow-circle-right text-white" aria-hidden="true"></i>'] // หากต้องการกำหนดข้อความลูกศรเอง
      });
         // console.log('dssss');
    });
}
function func_showForlooppic(data, popupDiv) {
Func_OwlCarousel();
   // console.log('sss');  
   // <div class="owl-items"> Your Content </div>
   const mainDiv = document.getElementById('subdivswiper');
   data.forEach((item) => {    
     const childEle = document.createElement('div');
      const eleimg = document.createElement('img');
      childEle.setAttribute('class', "owl-items");
      eleimg.setAttribute('class', "img-fluid");
      eleimg.src = `imgActivitylib/${item.name}`;
      childEle.append(eleimg);
      // console.log(childEle);
      mainDiv.appendChild(childEle);

   })
    popupDiv.style.display = "block";
}

function setTimeOut_OnloadPage() {
   // console.log('ttspiner');

   setTimeout(function () {
      // console.log($('#spinner'));

      if ($('#spinner').length > 0) {
         $('#spinner').removeClass('show');
      }
   }, 1);
}
function Hothitbooks(txt_json) {
   // console.log(txt_json);
   const Byname = document.getElementsByClassName('byName-bk-b1');
   // const status = document.getElementById('star-b1');
   const titleNmae = document.getElementsByClassName('title-nb-b1');
   const barcode = document.getElementsByClassName('barcode_txt');
   const img = document.querySelectorAll('.img-bookhots');
   // const random = Math.round(Math.random() * 400);
   // console.log(titleNmae[3]);

   for (let i = 0; i < txt_json.length; i++) {
      const sum = i + 3;
      //   console.log(txt_json[i]);
      if (txt_json[i]) {
         Byname[sum].innerText = txt_json[i].byname
         titleNmae[sum].innerText = txt_json[i].NAME_BOOK + " ตีพิมพ์:" + txt_json[i].Year_book;
         titleNmae[sum].setAttribute('data-barcode', txt_json[i].BARCODE);
         barcode[sum].innerText = txt_json[i].BARCODE;
         img[sum].src = txt_json[i].path_File;
         //   console.log(txt_json[i].COUNT);
         // console.log(key);      
         if (i == 0) {
            const boxtrow = 1;
            create_elementSmall(txt_json[i], boxtrow);
         } else if (i == 1) {
            const boxtrow = 2;
            create_elementSmall(txt_json[i], boxtrow);
         } else if (i == 2) {
            const boxtrow = 3;
            create_elementSmall(txt_json[i], boxtrow);
         } else if (i == 3) {
            const boxtrow = 4;
            create_elementSmall(txt_json[i], boxtrow);
         }
      }
   }






}


function create_elementSmall(item, boxtrow) {
   // console.log(num); 
   const countRat = item.COUNT;
   // console.log(countRat);
   if (countRat >= 45) {
      var countStar = 5;
      __ForAddClass(countRat, countStar, boxtrow);
   } else if (countRat >= 30) {
      var countStar = 4;
      __ForAddClass(countRat, countStar, boxtrow);
   } else if (countRat >= 20) {
      var countStar = 3;
      __ForAddClass(countRat, countStar, boxtrow);
   } else if (countRat >= 5) {
      var countStar = 2;
      __ForAddClass(countRat, countStar, boxtrow);
   } else {
      var countStar = 1;
      __ForAddClass(countRat, countStar, boxtrow);
   }
}
function __ForAddClass(countRat, countStar, boxtrow) {
   //   console.log(boxtrow);

   if (boxtrow == 1) {
      const stars = document.querySelectorAll('.ratings_starsbox1');
      const eleRatting = document.getElementsByClassName('total-read-box1')[0];
      // console.log(stars);   

      for (let ab = 0; ab < countStar; ab++) {
         // console.log(ab);
         // เริ่มจาก 5 + 5
         let tt = 0;
         let sum = tt + ab;
         // console.log(sum);
         stars[sum].classList.add('text-primary');
      }
      // console.log(eleRatting);      
      eleRatting.textContent = "(" + countRat + ")";
   } else if (boxtrow == 2) {
      const stars_b2 = document.querySelectorAll('.ratings_starsbox2');
      const eleRatting_b2 = document.getElementsByClassName('total-read-box2')[1];
      // console.log(stars_b2); 
      for (let ac = 0; ac < countStar; ac++) {
         // console.log(ab);
         // เริ่มจาก 5 + 5
         let tt_b2 = 5;
         let sum_b2 = tt_b2 + ac;
         // console.log(sum);
         stars_b2[sum_b2].classList.add('text-primary');
      }
      eleRatting_b2.innerText = "(" + countRat + ")";
      // console.log(countRat);
      // eleRatting_b2.innerText =  "2222";  
   } else if (boxtrow == 3) {
      const stars_b2 = document.querySelectorAll('.ratings_starsbox3');
      const eleRatting_b2 = document.getElementsByClassName('total-read-box3')[1];
      // console.log(stars_b2);      
      for (let ac = 0; ac < countStar; ac++) {
         // console.log(ab);
         // เริ่มจาก 5 + 5
         let tt_b2 = 5;
         let sum_b2 = tt_b2 + ac;
         // console.log(sum);
         stars_b2[sum_b2].classList.add('text-primary');
      }
      eleRatting_b2.innerText = "(" + countRat + ")";
      // console.log(countRat);
   } else if (boxtrow == 4) {
      const stars_b4 = document.querySelectorAll('.ratings_starsbox4');
      const eleRatting_b4 = document.getElementsByClassName('total-read-box4')[1];
      // console.log(countRat);      
      for (let ac = 0; ac < countStar; ac++) {
         // console.log(ab);
         // เริ่มจาก 5 + 5
         let tt_b2 = 5;
         let sum_b2 = tt_b2 + ac;
         // console.log(sum);
         stars_b4[sum_b2].classList.add('text-primary');
      }
      eleRatting_b4.innerText = "(" + countRat + ")";
      // console.log(countRat);
   }

}

function pocketsBooks(txt_json) {

   txt_json.forEach((item, key) => {
      // console.log(item);
      var divbox = document.createElement("div");
      const random = Math.round(Math.random() * 400);
      var documentFragment = document.createRange().createContextualFragment(`
         <div class="course-item m-3 text-center boxlabel-d1 rounded-5">
         <img class="img-fluid md-2 mt-3" id="txt-novel-pkb" src="COVERIMAGES/`+ item.IDLIKBOOK + `.jpg?v=` + random + `" alt="" style="height:150px;">
         </div>
         <div class="p-4 bg-light m-2 rounded-5">
         <div class="d-flex justify-content-between mb-2 rounded-5">
         <small class="m-0"><i class="fa fa-barcode text-primary mr-2"></i><span class="m-1" id="txt-codenovel-pkb">`+ item.BARCODE + `</span></small>
         <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><span class="m-1" id="txt-daynovel-pkb">`+ item.YEAR + `</span></small></div>
         <a class="h6 m-0 text-decoration-none lb-txt-novel" data-toggle="tooltip" id="btn_schBarcode" data-barcode="`+ item.BARCODE + `" data-placement="top" title="click to detail"  href="#!">` + item.NAME_BOOK + `</a>
         </div>
      `)
      divbox.className = 'col-lg-3 col-md-3 m-4 shadow-lg  bg-body rounded-5';
      divbox.appendChild(documentFragment);
      document.getElementsByClassName('list-box-pockets')[0].append(divbox);

   })
}
function medTextbooksEN(txt_json) {
   // console.log(txt_json);
   const random = Math.round(Math.random() * 400);
   txt_json.forEach(item => {
      var divbox = document.createElement("div");
      var documentFragment = document.createRange().createContextualFragment(`
        
         <div class="course-item bg-light">
         <div class="position-relative overflow-hidden text-center ">
        <img class="img-fluid  mt-3" src="COVERIMAGES/`+ item.IDLIKBOOK + `.jpg?v=` + random + `" alt="" style="height:237px;">
        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">BarCode</a>
            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">`+ item.BARCODE + `</a>
        </div>
         </div>
      <div class="text-center p-4 pb-0">                           
       <a class="h6 m-0 text-decoration-none lb-txt-novel" data-toggle="tooltip" id="btn_schBarcode" data-barcode="`+ item.BARCODE + `"  data-placement="top" title="click to detail"  href="#!">` + item.NAME_BOOK + `</a>
      </div>
      <div class="d-flex border-top">       
        <small class="flex-shrink-0 text-center border-end py-2 p-2"><i class="fa fa-clock text-primary me-2"></i>`+ item.YEAR + `</small>
        <small class="flex-fill text-left py-2"><i class="fa fa-user text-primary me-2"></i>`+ item.byname + `</small>
         </div>
      </div>
     
      `)
      divbox.className = 'col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s';
      divbox.appendChild(documentFragment);
      document.getElementsByClassName('list-Med-textbooks')[0].append(divbox);
      //   console.log(divbox);



   })

}

function medTextbooks_Thai(txt_json) {
   // console.log(txt_json);
   const random = Math.round(Math.random() * 400);
   txt_json.forEach(item => {
      var divbox = document.createElement("div");
      var documentFragment = document.createRange().createContextualFragment(`
      
       <div class="course-item bg-light">
       <div class="position-relative overflow-hidden text-center ">
      <img class="img-fluid  mt-3" src="COVERIMAGES/`+ item.IDLIKBOOK + `.jpg?v=` + random + `" alt="" style="height:237px;">
      <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
          <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">BarCode</a>
          <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">`+ item.BARCODE + `</a>
      </div>
       </div>
    <div class="text-center p-4 pb-0">                           
         <a class="h6 m-0 text-decoration-none lb-txt-novel" data-barcode="`+ item.BARCODE + `"   data-toggle="tooltip" data-placement="top" title="click to detail"  href="#!">` + item.NAME_BOOK + `</a>
    </div>
    <div class="d-flex border-top">       
      <small class="flex-shrink-0 text-center border-end py-2 p-2"><i class="fa fa-clock text-primary me-2"></i>`+ item.YEAR + `</small>
      <small class="flex-fill text-left py-2" data-trigger="focus" ><i class="fa fa-user text-primary me-2"></i>`+ item.byname + `</small>
       </div>
    </div>
   
    `)
      divbox.className = 'col-lg-4 col-md-6 ss wow fadeInUp" data-wow-delay="0.1s';
      divbox.appendChild(documentFragment);
      document.getElementsByClassName('list-MedThai-textbooks')[0].append(divbox);
      //   console.log(divbox);



   })
}
function myNovalThai(txt_json) {
   txt_json.forEach((item) => {
      // console.log(item);
      var divbox = document.createElement("div");
      const random = Math.round(Math.random() * 400);
      var documentFragment = document.createRange().createContextualFragment(`
         <div class="course-item m-3 text-center boxlabel-d1 rounded-5">
         <img class="img-fluid md-2 mt-3" id="txt-novel-pkb" src="COVERIMAGES/`+ item.IDLIKBOOK + `.jpg?v=` + random + `" alt="" style="height:150px;">
         </div>
         <div class="p-4 bg-light m-2 rounded-5">
         <div class="d-flex justify-content-between mb-2 rounded-5">
         <small class="m-0"><i class="fa fa-barcode text-primary mr-2"></i><span class="m-1" >`+ item.BARCODE + `</span></small>
         <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><span class="m-1" >`+ item.YEAR + `</span></small></div>
         <a class="h6 m-0 text-decoration-none lb-txt-novel" data-barcode="`+ item.BARCODE + `"  data-toggle="tooltip" data-placement="top" title="click to detail"   href="#!">` + item.NAME_BOOK + `</a>
         </div>
      `)
      divbox.className = 'col-lg-3 col-md-3 m-4 shadow-lg  bg-body rounded-5';
      divbox.appendChild(documentFragment);
      document.getElementsByClassName('list-NovalThai')[0].append(divbox);

   })
}
// -----------------------------------XMLHttpRequest-------------------------------------------
function xml_httpPocketbooks() {
   const xml = new XMLHttpRequest();
   var formData = new FormData();
   formData.append("data", "5");
   xml.open("POST", "phpweb/show_pocketbk.php");
   xml.send(formData);
   xml.onreadystatechange = function () {
      if (xml.readyState == 4 && xml.status == 200) {
         try {
            let txt_json = JSON.parse(xml.responseText);
            if (txt_json) {
               pocketsBooks(txt_json);
            }
            // console.log(txt_json);            
         } catch (e) {
            console.warn('there was an error in the json. could on parse');
         }
      } else {
         //  console.warn('did on receive 200 ok ');
      }

   }
}

// -----------------------------------XMLHttpRequest-------------------------------------------
function xml_httpTextbooksEng() {
   const xml = new XMLHttpRequest();
   var formData = new FormData();
   formData.append("data", "2");
   xml.open("POST", "phpweb/show_tophead.php");
   xml.send(formData);
   xml.onreadystatechange = function () {
      if (xml.readyState == 4 && xml.status == 200) {
         try {
            let txt_json = JSON.parse(xml.responseText);
            if (txt_json) {
               medTextbooksEN(txt_json);
               // console.log(txt_json);  
            }
         } catch (e) {
            console.warn('there was an error in the json. could on parse');
         }
      } else {
         //  console.warn('did on receive 200 ok ');
      }

   }
}

// -----------------------------------XMLHttpRequest-------------------------------------------
function xml_httpTextbooks_THAI() {
   const xml = new XMLHttpRequest();
   var formData = new FormData();
   formData.append("data", "1");
   xml.open("POST", "phpweb/show_tophead.php");
   xml.send(formData);
   xml.onreadystatechange = function () {
      if (xml.readyState == 4 && xml.status == 200) {
         try {
            let txt_json = JSON.parse(xml.responseText);
            if (txt_json) {
               medTextbooks_Thai(txt_json);
               // console.log(txt_json);   
            }
         } catch (e) {
            console.warn('there was an error in the json. could on parse');
         }
      } else {
         //  console.warn('did on receive 200 ok ');
      }

   }
}
// -----------------------------------XMLHttpRequest-------------------------------------------
function xml_httpNoVelBook() {
   const xml = new XMLHttpRequest();
   var formData = new FormData();
   formData.append("data", "F");
   xml.open("POST", "phpweb/show_novel.php");
   xml.send(formData);
   xml.onreadystatechange = function () {
      if (xml.readyState == 4 && xml.status == 200) {
         try {
            let txt_json = JSON.parse(xml.responseText);
            myNovalThai(txt_json);
            // console.log(txt_json);            
         } catch (e) {
            console.warn('there was an error in the json. could on parse');
         }
      } else {
         //  console.warn('did on receive 200 ok ');
      }

   }
}
// -----------------------------------XMLHttpRequest-------------------------------------------
function xml_Tophitbooks() {
   // console.log('test');  
   const xml = new XMLHttpRequest();
   var formData = new FormData();
   formData.append("data", "T");
   xml.open("POST", "phpweb/topLikebooks.php");
   xml.send(formData);
   xml.onreadystatechange = function () {
      // console.log(xml);     
      // console.log(xml.status);   
      if (xml.readyState == 4 && xml.status == 200) {
         try {
            let txt_json = JSON.parse(xml.responseText);
            // Hothitbooks(txt_json);
            // console.log(txt_json);  
            setTimeOut(txt_json);
         } catch (e) {
            console.warn('there was an error in the json. could on parse');
         }
      } else {
         //  console.warn('did on receive 200 ok ');
      }

   }
}

function setTimeOut(txt_json) {
   const msg = document.getElementById('box-by-design')
   if (msg.value != "")
      setTimeout(function () {
         const spint = document.getElementById('spinner');
         if (!spint.classList.remove('show')) {
            Hothitbooks(txt_json);
            xml_httpPocketbooks();
            xml_httpTextbooksEng();
            xml_httpTextbooks_THAI();
            xml_httpNoVelBook();
            delayFunction();
         }
      }, 1000);
}
var monthNames = [
   "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
   "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
   "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
];
var weekday = [
   "อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤ", "ศุกร์", "เสาร์"
];
function dateThai(date) {
   var w = new Date(date);
   var Week = weekday[w.getDay()];
   var year = date.getFullYear() + 543;
   var month = monthNames[date.getMonth()];
   var numOfDay = date.getDate();
   return "วัน" + "&nbsp;" + Week + '&nbsp' + 'ที่' + '&nbsp;' + numOfDay + '&nbsp;' + month + '&nbsp;' + year;
}


function eVentSearchInput(txtInput) {
   txtInput.addEventListener('keydown', function (event) {
      if (event.key === "Enter") {
         event.preventDefault();
         // console.log('test');
         Func_showTableList_search();
         // document.getElementById('btn-clicksearch').onclick();
      }

   })

}

function Func_showTableList_search() {
   var txtInput = document.getElementById("txt-input-search");
   // console.log(txtInput.value);   
   const typechk = "Nm";
   var primary_key = "@6^&*(User-active page!@#&&&^$stonehead@$#";
   if (txtInput.value != "") {
      sessionStorage.setItem("sch", txtInput.value);
      sessionStorage.setItem("chk", typechk);
      document.getElementById("txt-input-search").value = "";
      window.open("file-page/sear-ch.php?primary_key=" + primary_key);
   } else {
      alert('Please key book titlee');
   }

}

function func_XML_announce() {

   //---------------exsample------------------------------
   /* const blogs = [
       {
         "id": 1,
         "title": "Business Systems Development Analyst",
         "views": 940,
       },
       {
         "id": 2,
         "title": "VP Quality Control",
         "views": 971,
       },
       {
         "id": 3,
         "title": "Statistician III",
         "views": 535,
       },
       {
         "id": 4,
         "title": "Recruiting Manager",
         "views": 771,
       },
       {
         "id": 5,
         "title": "Programmer Analyst I",
         "views": 501,
       }
     ];
     blogs.sort((a, b) => a.title.toLowerCase().localeCompare(b.title.toLowerCase()));
 
 console.log(blogs);*/



   const xml = new XMLHttpRequest();
   const formDat = new FormData();
   xml.open("POST", "phpweb/braner_slide.php");
   xml.send();
   xml.onreadystatechange = function () {
      if (xml.status == 200 && xml.readyState == 4) {
         const data = JSON.parse(xml.responseText);
         data.sort((a, b) => a.dayfix.toLowerCase().localeCompare(b.dayfix.toLowerCase()));
         // console.log(data);

         if (data != null) {
            data.forEach(item => {
               //   console.log(item);

               const element = document.querySelectorAll('#txt-public');
               var d = new Date(item.datpicker);
               var txtday = dateThai(d)
               // console.log(element);

               var documentFragment = document.createRange().createContextualFragment(`
                  <p class="fs-5 text-white mb-4 "><i class="fa fa-bullhorn  p-2" aria-hidden="true"></i> 
                  ห้องสมุดปิดให้บริการ  <span class="text-info">`+ txtday + `&nbsp;วัน&nbsp;` + item.note_tb + `</span>
                  </p>`);

               element[1].appendChild(documentFragment);

            })
         } else {

            const element = document.querySelectorAll('#txt-public');
            var documentFragment = document.createRange().createContextualFragment(`
               <p class="fs-5 text-white mb-4 "><i class="fa fa-bullhorn  p-2" aria-hidden="true"></i> 
              ยังไม่มีการแจ้งประกาศ
               </p>`);

            element[1].appendChild(documentFragment);
         }

      }
   }
}
function delayFunction() {
   setTimeout(function () {
      func_clickTxtbooks();
   }, 3000);
}
function func_clickTxtbooks() {
   // btn_schBarcode
   // lb-txt-novel
   var primary_key = "@6^&*(User-active page!@#&&&^$stonehead@$#";
   var ele = document.querySelectorAll('.lb-txt-novel');


   ele.forEach((item) => {
      // console.log(item);
      item.addEventListener('click', (e) => {
         e.preventDefault();
         var barcode = e.target.getAttributeNode('data-barcode').value;
         // console.log(barcode);         

         sessionStorage.setItem("sch", barcode);
         sessionStorage.setItem("chk", "Bc");
         localStorage.setItem("clk_chap", barcode);
         window.open("file-page/sear-ch.php?primary_key=" + primary_key);
      })
   })

}





























































function popupSuccessTxt(txt) {
    Swal.fire({
        position: "top",
        icon: "success",
        title: txt,
        showConfirmButton: false,
        timer: 1500
    });
}
function popupError(txt) {
    Swal.fire({
        position: "top",
        icon: "error",
        title: txt,
        showConfirmButton: false,
        timer: 1500
    });
}

function sumFunc(accumulator, a) {
   // console.log(accumulator);
   
   return accumulator + a;
}
$(document).ready(function () {
   // by As St.Head
   const str = document.querySelectorAll('#box-by-design');
   // console.log(str);
   
   const enc = new TextEncoder('utf-8');
   const u8s = enc.encode(str[0].innerHTML);
   //  console.log(str[0].innerHTML);   
   const arrynumber = new Array();
   u8s.forEach(item => {
      arrynumber.push(item);
   })
   const sum = u8s.reduce(sumFunc, 0);
   // console.log(sum);
   var statusPage = document.getElementById("status");
   // const spinner = document.getElementById('spinner');
   // console.log(txtInput);
   const str_page = statusPage.getAttributeNode("data-page").value;
   // console.log(str_page);   
   if (sum === 865) {
      if (str_page == "index") {
         var txtInput = document.getElementById("txt-input-search");
         //  console.log('page index');
         eVentSearchInput(txtInput);
         func_swiperHeader();
         func_onClickReservation();
         // func_XML_announce();
         setTimeOut_OnloadPage();
         // TableListShow();
      } else if (str_page == "courses") {
         // console.log('page  newbooks');
         xml_Tophitbooks();
      } else {
         setTimeOut_OnloadPage();
      }
   }


});
// ------------------ onload--page--1-------