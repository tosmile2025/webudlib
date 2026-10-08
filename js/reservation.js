
const firebaseConfig = {
    apiKey: "AIzaSyBvDHJi8R_7Z-yctN-573N6R-BleGH4o-w",
    authDomain: "user-online-ee72e.firebaseapp.com",
    projectId: "user-online-ee72e",
    storageBucket: "user-online-ee72e.appspot.com",
    messagingSenderId: "853616933099",
    appId: "1:853616933099:web:029b48c0eccc81d8a426ae",
    measurementId: "G-5RNWSFG6CE"
};
firebase.initializeApp(firebaseConfig);
const db = firebase.firestore();

db.collection('storelib').orderBy('amount').onSnapshot(snapshot => {
    console.log("RealTime");
    rEaltime();
    let changes = snapshot.docChanges();
    changes.forEach(change => {
        //    console.log(change);
        if (change.type === 'added') {
            // console.log(change.doc.data());
            //   arr.push(change.doc);
            //  console.log(arr.data().ID_IP);
            rEaltime();
        } else if (change.type === 'removed') {
            // var dataTxt = change.doc;
            // console.log(change.doc.data().amount);
        }
        else if (change.type === "modified") {
            // var dataTxt = change.doc;
            // console.log(change.doc.data().amount);
            rEaltime();
        }
    })

})
const btnSubInsertpic = document.getElementById('box-by-design');
btnSubInsertpic.addEventListener('click', () => {
    const xml = new XMLHttpRequest();
    xml.open("POST", "phpweb/insertPictureMysql.php");
    xml.send();
    xml.onreadystatechange = function () {
        if (xml.status == 200 && xml.readyState == 4) {
            try {
                console.log(xml.responseText);

            } catch (error) {

            }

        }
    }
})
function rEaltime() {
    const labelAll = document.querySelectorAll('#labelAmount');
    const xml = new XMLHttpRequest();
    xml.open("POST", "phpweb/dbShowtable.php");
    xml.send();
    xml.onreadystatechange = function () {
        if (xml.status == 200 && xml.readyState == 4) {
            try {
                // console.log("RealTime");

                const data = JSON.parse(xml.responseText);
                // console.log(data);
             
                func_showreloadfirebase(labelAll, data);
            } catch (error) {

            }

        }
    }


}
window.onload =()=>{
   func_showShopping();    
}
function func_showShopping() {
    // console.log('sss');
    const iduser = sessionStorage.getItem('iduser'); 
    const labelamount = document.getElementById('item-count-badge');    
    const xml = new XMLHttpRequest();
    const myFormData = new FormData();
    myFormData.append('iduser', iduser);   
    xml.open("POST", "phpweb/ShowAmount.php");
    xml.send(myFormData);
    xml.onreadystatechange = function () {
        if (xml.status == 200 && xml.readyState == 4) {
            try {
                // console.log("RealTime");
                // console.log(xml.responseText);
                const data = JSON.parse(xml.responseText);
                // console.log(data[0].status);
                if(data[0].status == 0){
                  labelamount.innerText=data[0].status;                     
                }else{
                    labelamount.innerText=data[0].status; 
                }            
            } catch (error) {
                console.log(error);
                

            }

        }
    }
}
function func_showreloadfirebase(labelAll, data) {
    // 1. แปลง array1 ให้เป็น Map/Object เพื่อให้ค้นหาค่า amount ได้อย่างรวดเร็ว (ประสิทธิภาพดีกว่าการวนลูปซ้ำๆ)
    // console.log(data);

    const amountMap = data.reduce((acc, item) => {
        acc[item.code] = item.amount;
        return acc;
    }, {});

    // 3. วนลูปเพื่อดึงค่าจาก amountMap และนำไปแสดงผลใน Label
    labelAll.forEach(label => {
        // ดึงค่า 'dta' attribute จาก Label
        const dataCode = label.getAttribute('data-info');
        // ค้นหาค่า amount จาก amountMap โดยใช้ dataCode เป็น Key
        const amountValue = amountMap[dataCode];

        // ตรวจสอบว่ามีข้อมูล amountValue อยู่หรือไม่ก่อนแสดงผล
        if (amountValue !== undefined) {
            // แสดงผลค่า amount ใน Label
            label.textContent = amountValue;
        } else {
            // กรณีที่ไม่พบข้อมูลใน array1 เช่น dta="A3"
            label.textContent = 'N/A'; // หรือแสดงผลเป็นค่าอื่นตามต้องการ
        }
    });
}

function func_swiperHeader() {
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    slideList();
}
function slideList() {
    // const eleList = document.getElementById('swiperList');
    const xml = new XMLHttpRequest();

    xml.open("POST", "phpweb/slidereservation.php");
    xml.send();
    xml.onreadystatechange = function () {
        if (xml.status == 200 && xml.readyState == 4) {
            try {
                const data = JSON.parse(xml.responseText);
                // console.log(xml.responseText);
                func_showForlooppic(data)
            } catch (error) {

            }

        }
    }
}

function func_showForlooppic(data) {
    //    console.log(data);  
    const id = sessionStorage.getItem('iduser');
    const name = sessionStorage.getItem('nameuser');
    const mainDiv = document.getElementById('swiperList');
    const label = document.getElementById('idname');

    label.innerText = name;
    label.setAttribute('data-info', id);
    //    console.log(name);
    let HTML = '';
    data.forEach((item) => {
        // console.log(item);
        HTML += ` <div class="swiper-slide mainsubpicture">
                        <img class="img-fluid" src="img/bg_20.jpg" alt="" >
                        <div class="position-absolute top-0   d-flex align-items-center divmodule">
                            <div class="row g-12 justify-content-center">                              
                                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="course-item bg-light shadow-lg p-1 mb-1 bg-white rounde"
                                        style="border-radius: 30px ;">
                                        <div class="position-relative overflow-hidden" style="border-radius: 30px ;">
                                            <img class="img-fluid " src="img/reservation/${item.name}" alt="">
                                            <div
                                                class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                                <small class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end text-white"
                                                    style="border-radius: 30px;">ห้องสมุด
                                                </small>

                                            </div>
                                        </div>
                                        <div class="d-flex border-top">
                                          
                                            <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-clock text-primary me-2"></i> รอกำหนดการ</small>                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 wow fadeInUp divhiden" data-wow-delay="0.1s"
                                    style="text-align: left;">                                   
                                    <button  class="btn btn-danger animated  text-white btn-css" data-user=${item.name}" data-info="${splitAlpha(item.name)}" >รหัสครุภัณฑ์: ${splitAlpha(item.name)}</button> 
                                       <label class="btn btn-danger animated  text-white btn-css">คงเหลือ: <span  id="labelAmount" data-info="${splitAlpha(item.name)}" ></span></label>                             
                                    <p class=" text-white mb-1 pb-2 p-text">
                                        1.ดูจำนวนคงเหลือของครุภัณฑ์</p>
                                     <p class=" text-white mb-1 pb-2 p-text">
                                        2.ใส่ตัวเลขที่ต้องการ</p>
                                    <p class=" text-white mb-1 pb-2 p-text">
                                        3.หากท่านไม่ต้องการจองรายการครุภัณฑ์อื่นอีกให้กดปุ่ม เสร็จสิ้น</p>
                                        <p class=" text-white mb-1 pb-2 p-text">
                                        3.หากท่านต้องการจองรายการ ครุภัณฑ์อื่นอีกให้กดปุ่มจอง แล้วเลือกลูกศรเลื่่อนไปหน้าถัดไป</p>                                   
                                    <p class=" text-primary mb-1 pb-2 p-text">หมายเหตุ:
                                       ระบบจะคัดกรองลำดับ - หลังของผู้จอง
                                    </p>
                                        <div class="col-lg-8 col-md-6 wow fadeInUp bg-light p-3 border rounded-3 mb-2" data-wow-delay="0.1s">
                                        <div class="input-group col-lg-4 col-md-2  mb-3">
                                        <span class="input-group-text btn-warning" id="basic-addon1">จำนวน</span>
                                        <input type="number"  class="form-control inputAmount" placeholder="คีย์จำนวนที่ต้องการ" aria-label="Username" aria-describedby="basic-addon1">
                                        </div> 
                                        
                                        </div>
                                     <button id="btnAdAmount"  class="btn btn-warning animated  text-white btn-css" >เพิ่มใส่รถเข็น(จอง)</button>
                                      
                                      <div class="m-5"></div>
                                        <div class="col-lg-4 col-md-6  text-center wow fadeInUp bg-light p-3 border rounded-3 mb-2" data-wow-delay="0.1s">
                                      
                                        <button onclick="upDateSucess(${id})" id="btnsuccess"  class="btn btn-danger animated  text-white btn-css" >เสร็จสิ้น</button> 
                                        
                                        
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
    })

    // console.log(childEle);
    mainDiv.innerHTML = HTML;
    // upDateSatus(id);

    func_ClickAddAmount(id);
}
function splitAlpha(text) {
    // const parts = text.split('.');
    let newName = text.slice(0, text.indexOf('-'));
    // console.log(newName);
    // parts.pop();    
    return newName
}
function upDateSucess(id) {
    Swal.fire({
        title: "ตรวจสอบให้แน่ใจ",
        text: "เมื่อคุณกด Yes..! จะไม่สามารถจองครุภัณฑ์เพิ่มได้อีก",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes..!"
    }).then((result) => {
        if (result.isConfirmed) {
            upDateSatus(id);

        }
    });

}
function func_ClickAddAmount(id) {
    const btnAll = document.querySelectorAll('#btnAdAmount');
    btnAll.forEach((itembtn) => {

        itembtn.addEventListener('click', () => {


            //  console.log(itembtn.parentElement.children[0].getAttribute('data-info'));
            // console.log(itembtn.parentElement.children[7].children[0].children[1].value);
            const idProduct = itembtn.parentElement.children[0].getAttribute('data-info');
            const Amount = itembtn.parentElement.children[7].children[0].children[1].value;
            const iduser = id;
            let = numtotal = 0;
            // console.log(`${Amount} id:${iduser}`);            
            const myFormData = new FormData();
            const xml = new XMLHttpRequest();
            myFormData.append('DataArr[]', iduser);
            myFormData.append('DataArr[]', idProduct);
            myFormData.append('DataArr[]', Amount);
            // console.log(iduser);

            if (iduser == null) {
                popupError("กรุณาไปลงทะเบียนหน้าแรก");
            } else {
                if (Amount != "") {
                    //  console.log('ssss');
                    xml.open("POST", "phpweb/addReservation.php");
                    xml.send(myFormData);
                    // console.log(idProduct);   
                    xml.onreadystatechange = function () {
                        if (xml.status == 200 && xml.readyState == 4) {
                            try {
                                //    console.log(idProduct);   
                                const data = JSON.parse(xml.responseText);
                                // console.log(xml.responseText);
                                if (data[0].err == "amount") {
                                    // จำนวนครุภัณฑ์ไม่พอ

                                    if (data[0].total < 0) {
                                        // console.log(data[0].amount);                                    
                                        numtotal = data[0].amount;
                                        popupError(`จำนวนคงเหลือ:${numtotal} ไม่พอกับความต้องการ`);
                                    } else {
                                        numtotal = data[0].total;
                                        popupError(`จำนวนคงเหลือ ${numtotal}`);
                                    }
                                } else if (data[0].err == "update") {
                                    numtotal = data[0].total;
                                    itembtn.parentElement.children[7].children[0].children[1].value = "";
                                    popupSuccessTxt(`บันทึกสำเร็จ จำนวนคงเหลือ ${numtotal}`);
                                    upFirebase(Amount, idProduct, numtotal);
                                     func_showShopping(); 

                                }

                            } catch (error) {

                            }

                        }
                    }

                } else {
                    popupError("ใส่จำนวนที่ต้องการ");
                }
            }

        })

    })
}
function upFirebase(Amount, idProduct) {
    db.collection('storelib').add({
        amount: Amount,
        code: idProduct,
    }).then(() => {
        // ข้อมูลถูกบันทึกสำเร็จ

    })
        .catch((error) => {
            // เกิดข้อผิดพลาด
            console.error("เกิดข้อผิดพลาดในการเพิ่มข้อมูล: ", error);
        });
}
function upDateSatus(id) {
    // console.log(id);
    const xml = new XMLHttpRequest();
    const myFormData = new FormData();
    myFormData.append("iduser", id);
    if (id == null) {
        popupError("ที่หน้าแรกและลงทะเบียน");
    } else {
        xml.open("POST", "phpweb/Updateres.php");
        xml.send(myFormData);
        xml.onreadystatechange = function () {
            if (xml.status == 200 && xml.readyState == 4) {
                try {
                    const data = JSON.parse(xml.responseText);
                    if (data[0].err == true) {
                        //  console.log(xml.responseText);
                        popupSuccessTxt("บันทึกสำเร็จ รอเเจ้งเวียนในระบบ E-office");
                        setTimeout(() => {
                            reloadPage();
                            // console.log('sss');                    
                        }, 2200);
                    }
                } catch (error) {
                    console.log(error);

                    popupError("ไม่สามารถบันทึกได้ โทร.21401 ทันที");
                }

            }
        }
    }

}

function reloadPage(params) {
    sessionStorage.removeItem('iduser');
    sessionStorage.removeItem('nameuser');
    window.location.href = "index.html";
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




















$(document).ready(function () {

    // const loader = document.getElementById('spinner');
    let statusPage = document.getElementById("status");
    const str_page = statusPage.getAttributeNode("data-page").value;
    if (str_page == "reservation") {
        //  console.log('page index');    
        setTimeOut_OnloadPage();
        func_swiperHeader();
    }
});
// ------------------ onload--page--1-------