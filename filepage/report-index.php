<!DOCTYPE html>
<html lang="en">

<head>
   <title>ลงทะเบียนสมาชิก</title>


   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="../img/favicon-16x16.png" type="image/x-icon">
   <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="../assets/assets/icon/themify-icons/themify-icons.css">
   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="../assets/assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <!-- <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css"> -->

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="../assets/assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Chartlist chart css -->
   <!-- <link rel="stylesheet" href="assets/plugins/chartist/dist/chartist.css" type="text/css" media="all"> -->
   <!-- Weather css -->
   <link href="../assets/assets/css/svg-weather.css" rel="stylesheet">

   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="../assets/assets/css/main.css">
   <link href="../cs-library/css-regis-test.css?v=<?php echo filemtime('../cs-library/css-regis-test.css'); ?>" rel="stylesheet" type="text/css">
   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="../assets/assets/css/responsive.css">

</head>

<body class="sidebar-mini fixed">

   <div class="loader-bg" style="display: none;">
      <div class="loader-bar" style="width: 2114px;">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <a href="index.html" class="logo">
            <!-- <img class="img-fluid able-logo" src="../fileimage/LOGOBUD.png" alt="Theme-logo" style="width: 40px; height: 40px;"> -->
            <span class="sp-txthead">E-library</span>
         </a>
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-togglez">
               <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <ul class="top-nav lft-nav">
               <li>
                  <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <img class="img-fluid able-logo" src="../fileimage/LOGOBUD.png" alt="Theme-logo" style="width: 40px; height: 40px;"><span> ห้องสมุดโรงพยาบาลพุทธชินราช พิษณุโลก</span>
                  </a>
               </li>

            </ul>
            <div class="navbar-custom-menu f-right">
               <ul class="top-nav">
                  <!-- window screen -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle">
                        <span id="lb-dayupdate"></span>
                     </a>
                  </li>
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="fa fa-arrows-alt"></i>
                     </a>
                  </li> <!-- User Menu-->
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <span><img class="img-circle " src="../fileimage/keroro.png" style="width:40px;" alt="User Image"></span>
                        <span><span id="box_head_name_lb" id-data="admin">ขจรศักดิ์&nbsp;โพธิ์สอน</span><i class=" icofont icofont-simple-down"></i></span>

                     </a>
                     <ul class="dropdown-menu settings-menu">
                        <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                        <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#"><i class="icon-envelope-open"></i> My Messages</a></li>
                        <li class="p-0">
                           <div class="dropdown-divider m-0"></div>
                        </li>
                        <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                        <li><a href="login1.html"><i class="icon-logout"></i> Logout</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
               <li class="nav-level">--- เมนูหลัก</li>
               <li class="treeview" id="index">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-clock-o" aria-hidden="true"></i><span>ยืม-คืน</span>
                  </a>
               </li>
               <li class="nav-level">--- บริหารหนังสือ</li>
               <li class="treeview" id="search"><a class="waves-effect waves-dark btn_link_searchbook" href="#!">
                     <i class="fa fa-search" aria-hidden="true"></i><span> ค้นหาหนังสือ</span></a>

               </li>

               <li class="treeview" id="regisbooks">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-pencil-square-o" style="font-size:18px; padding:0px; margin:0px ;" aria-hidden="true"></i>
                     <span>ลงทะเบียนหนังสือ</span><span class="label label-success menu-caption">New</span>
                  </a>
               </li>

               <li class="treeview" id="calendar"><a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-calendar-plus-o" aria-hidden="true"></i><span>ปฎิทิน</span></a>
               </li>

               <li class="treeview" id="barcode">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-qrcode" aria-hidden="true"></i><span>พิมพ์บาร์โค้ด</span>
                  </a>
               </li>


               <li class="nav-level">---บริหารสมาชิก</li>

               <li class="treeview" id="user">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-user-plus" aria-hidden="true"></i><span>ลงทะเบียนสมาชิก</span>
                  </a>
               </li>
               <li class="treeview" id="admin">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-cogs" aria-hidden="true"></i><span>Administrator</span>
                  </a>
               </li>
               <li class="nav-level">--- รายงาน</li>

               <li class="treeview  active" id="report"><a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-newspaper-o"></i><span>รายงานอื่นๆ</span></a>
               </li>
               <li class="nav-level">---บริหาร E-books</li>
               <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>หมวด E-books</span><i class="icon-arrow-down fa fa-chevron-down"></i></a>
                  <ul class="treeview-menu menu-open" style="display: block;">
                     <li class="treeview" id="regisebook">
                        <a class="waves-effect waves-dark" href="#!">
                           <i class="icon-arrow-right fa fa-chevron-right"></i>
                           ลงทะเบียน E-books
                        </a>
                     </li>
                     <li class="treeview" id="uploadfile">
                        <a class="waves-effect waves-dark" href="#!">
                           <i class="icon-arrow-right fa fa-chevron-right"></i>
                           <span>อัพโหลดไฟล์</span>
                           <i class="icon-arrow-down"></i>
                        </a>
                     </li>
                  </ul>
               </li>
            </ul>
         </section>
      </aside>
      <!-- Sidebar chat start -->
      <div id="sidebar" class="p-fixed header-users showChat">
         <div class="had-container">
            <div class="card card_main header-users-main">
               <div class="card-content user-box">
                  <div class="md-group-add-on p-20">
                     <span class="md-add-on">
                        <i class="icofont icofont-search-alt-2 chat-search"></i>
                     </span>
                     <div class="md-input-wrapper">
                        <input type="text" class="md-form-control" name="username" id="search-friends">
                        <label>Search</label>
                     </div>

                  </div>
                  <div class="media friendlist-main">

                     <h6>Friend List</h6>

                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class="showChat_inner">
         <div class="media chat-inner-header">
            <a class="back_chatBox">
               <i class="icofont icofont-rounded-left"></i> Soeng Souy
            </a>
         </div>
         <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
               <img class="media-object img-circle m-t-5" src="../assets/assets/images/avatar-1.png" alt="Generic placeholder image">
               <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
         </div>
         <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
            <div class="media-right photo-table">
               <a href="#!">
                  <img class="media-object img-circle m-t-5" src="../assets/assets/images/avatar-2.png" alt="Generic placeholder image">
                  <div class="live-status bg-success"></div>
               </a>
            </div>
         </div>
         <div class="media chat-reply-box">
            <div class="md-input-wrapper">
               <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
               <label>Share your thoughts</label>
               <span class="highlight"></span>
               <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
                  <i class="icofont icofont-location-arrow f-20 "></i>
               </button>

               <button type="button" class="chat-send waves-effect waves-light">
                  <i class="icofont icofont-location-arrow f-20 "></i>
               </button>
            </div>

         </div>
      </div>
      <!-- Sidebar chat end-->
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>รายงานข้อมูล</h4>
               </div>
            </div>
            <div class="card">
               <div class="card-block">

                  <!-- --------------------------------boddy text input regis ebooks------------- -->
                  <div class="sub-title box-headebooksregis">
                     <div>
                        <i class="fa fa-tasks icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-ข้อมูลอีบุ้ค--</span>
                     </div>
                     <!-- tab_inputbyname -->
                     <div class="box_menu_regisbook">
                        <!--      <button type="button" onclick="myTabClick_regisebooks('tab_menu_one', this, 'e1')" id="btn_menu_one" class="btn btn-danger waves-effect waves-light btn-tab">
                                          <i class="icofont icofont-home "></i><span class="m-l-10">รายงานหนังสือ</span>
                                    </button>
                                    <button type="button" onclick="myTabClick_regisebooks('tab_menu_two', this, 'e2')" id="btn_menu_two" class="btn btn-danger waves-effect waves-light btn-tab">
                                          <i class="icofont icofont-ui-user icon-p1"></i><span class="m-l-10">รายงานผู้ยืม</span>
                                    </button>
                                    <button type="button" onclick="myTabClick_regisebooks('tab_menu_three', this, 'e3')" id="btn_menu_three" class="btn btn-danger waves-effect waves-light btn-tab">
                                    <i class="fa fa-repeat icon-p1" aria-hidden="true"></i><span class="m-l-10">รายงานส่งคืน</span>
                                    </button>
                                    <button type="button" onclick="myTabClick_regisebooks('tab_menu_four', this, 'e4')" id="btn_menu_four" class="btn btn-danger waves-effect waves-light btn-tab">
                                    <i class="fa fa-usd icon-p1" aria-hidden="true"></i><span class="m-l-10">รายงานค่าปรับ</span>
                                    </button>
                                    <button type="button" onclick="myTabClick_regisebooks('tab_menu_five', this, 'e5')" id="btn_menu_five" class="btn btn-danger waves-effect waves-light btn-tab">
                                    <i class="fa fa-heart" aria-hidden="true"></i><span class="m-l-10">หนังสือยอดนิยม</span>
                                    </button>
                                    <button type="button" onclick="myTabClick_regisebooks('tab_menu_six', this, 'e6')" id="btn_menu_six" class="btn btn-danger waves-effect waves-light btn-tab">
                                    <i class="icofont icofont-clock-time" aria-hidden="true"></i><span class="m-l-10">รายงานค้างส่งหนังสือ</span>
                                    </button>        -->
                        <div class="navbar-custom-menu ">
                           <ul class="top-nav">
                              <li class="dropdown">
                                 <a class="txt-color" href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                    <span><i class="fa fa-book" aria-hidden="true"></i></span>
                                    <span><span >เมนูรายงาน</span><i class=" icofont icofont-simple-down"></i></span>
                                 </a>
                                 <ul class="dropdown-menu settings-menu">
                                    <li><a class="txt-color" href="#!" onclick="myTabClick_regisebooks('tab_menu_one', this, 'e1')" id="btn_menu_one">รายงานหนังสือ</a></li>
                                    <li><a class="txt-color" href="#" onclick="myTabClick_regisebooks('tab_menu_two', this, 'e2')" id="btn_menu_two">รายงานผู้ยืม</a></li>
                                    <li><a class="txt-color" href="#" onclick="myTabClick_regisebooks('tab_menu_renbk', this, 'e8')" id="btn_menu_renbk">รายงานรีนิวหนังสือ</a></li>
                                    <li><a class="txt-color" href="#" onclick="myTabClick_regisebooks('tab_menu_three', this, 'e3')" id="btn_menu_three">รายงานส่งคืน</a></li>
                                    <li><a class="txt-color" href="#!" onclick="myTabClick_regisebooks('tab_menu_four', this, 'e4')" id="btn_menu_four">รายงานค่าปรับ</a></li>
                                    <li><a class="txt-color" href="#" onclick="myTabClick_regisebooks('tab_menu_five', this, 'e5')" id="btn_menu_five">หนังสือยอดนิยม</a></li>
                                    <li><a class="txt-color" href="#" onclick="myTabClick_regisebooks('tab_menu_six', this, 'e6')" id="btn_menu_six">รายงานค้างส่งหนังสือ</a></li>
                                    <li><a class="txt-color" href="#!" onclick="myTabClick_regisebooks('tab_menu_sven', this, 'e7')" id="btn_menu_sven">รายงานตามหมวดหมู่</a></li>
                                     <li><a class="txt-color" href="#!" onclick="myTabClick_regisebooks('tab_menu_one', this, 'e10')" id="btn_menu_sven">รายหนังสือคัตออกตามหมวด</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                     </div>

                  </div>
                  <div class="popcontent-regisebk tab-content" id="tab_menu_one">
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานหนังสือทั้งหมด--</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-one" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-one" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-hed">
                                          <thead>
                                             <tr>
                                                <th>บาร์โค้ด</th>
                                                <th>ชื่อเรื่อง</th>
                                                <th>จำนวนหน้า</th>
                                                <th>ปี/พศ</th>
                                                <th>ISBN</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-one">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination" class="pagination">
                              </ul>

                           </div>
                        </div>
                     </div>
                     <!-- ------------------------------page1------------------ -->
                  </div>
                  <div class="popcontent-regisebk" id="tab_menu_two">
                     <!-- ---------------------page2----------------------------------->
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานผู้ยืม--</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <form class="form-inline">
                                       <div class="form-group m-r-15">
                                          <label for="inline2mail" class="m-r-15 form-control-label">Unit:</label>
                                          <input type="text" class="form-control Unit-export" disabled autocomplete="off" style="width: 60px;">
                                       </div>
                                    </form>
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-two" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-two" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-two">
                                          <thead>
                                             <tr>
                                                <th>ID-user</th>
                                                <th>ชื่อ</th>
                                                <th>นามสกุล</th>
                                                <th>BarCode books</th>
                                                <th>วันกำหนดคืน</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-two">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-two text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination-two" class="pagination-two">
                                 <!-- <li class="btn prev page-item-two previous-page-two disable"><span class="page-link-two"><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">1</span></li>
                                        <li class="btn numb page-item-two dots"><span class="page-link-two" href="#">2</span></li>
                                        <li class="btn numb page-item-two"><span class="page-link-two" href="#">3</span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">4</i></a></li>
                                        <li class="btn next page-item-two next-page-two"><sapn class="page-link-two" href="#">next</sapn></li>   -->
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="popcontent-regisebk" id="tab_menu_three">
                     <!-- หน้ารายงานที่ 3 -->
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานการส่งคืน--</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <form class="form-inline">
                                       <div class="form-group m-r-15">
                                          <label for="inline2mail" class="m-r-15 form-control-label">Unit:</label>
                                          <input type="text" class="form-control Unit-inport" disabled autocomplete="off" style="width: 60px;">
                                       </div>
                                    </form>
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-three" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-two" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-three">
                                          <thead>
                                             <tr>
                                                <th>ID-user</th>
                                                <th>ชื่อ - นามสกุล</th>
                                                <th>BarCode books</th>
                                                <th>ฃื่อเรื่อง</th>
                                                <th>วันกำหนดคืน</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-three">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-three text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination-three" class="pagination-three">
                                 <!-- <li class="btn prev page-item-two previous-page-two disable"><span class="page-link-two"><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">1</span></li>
                                        <li class="btn numb page-item-two dots"><span class="page-link-two" href="#">2</span></li>
                                        <li class="btn numb page-item-two"><span class="page-link-two" href="#">3</span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">4</i></a></li>
                                        <li class="btn next page-item-two next-page-two"><sapn class="page-link-two" href="#">next</sapn></li>   -->
                              </ul>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="popcontent-regisebk" id="tab_menu_four">
                     <!-- หน้ารายงานที่ 4 -->
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานค่าปรับ-</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-four" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-two" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-four">
                                          <thead>
                                             <tr>
                                                <th>ID-user</th>
                                                <th>ชื่อ - นามสกุล</th>
                                                <th>วันที่จ่าย</th>
                                                <th>ค่าปรับ</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-four">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-four text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination-four" class="pagination-four">
                                 <!-- <li class="btn prev page-item-two previous-page-two disable"><span class="page-link-two"><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">1</span></li>
                                        <li class="btn numb page-item-two dots"><span class="page-link-two" href="#">2</span></li>
                                        <li class="btn numb page-item-two"><span class="page-link-two" href="#">3</span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">4</i></a></li>
                                        <li class="btn next page-item-two next-page-two"><sapn class="page-link-two" href="#">next</sapn></li>   -->
                              </ul>

                           </div>
                        </div>
                     </div>
                     <!-- --------------------  page 3--------------------- -->
                  </div>
                  <div class="popcontent-regisebk" id="tab_menu_five">
                     <!-- หน้ารายงานที่ 5 -->
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานหนังสือยอดนิยม (โดยกำหนดเป็นเป็นปีงบที่ลงทะเบียน)-</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-five" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-bkhit" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-five">
                                          <thead>
                                             <tr>
                                                <th>ครั้งที่ยืม</th>
                                                <th>บาร์โค้ด</th>
                                                <th>ชื่อเรื่อง</th>
                                                <th>ปี/พ.ศ</th>
                                                <th>ราคา</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-five">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-five text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination-five" class="pagination-five">
                                 <!-- <li class="btn prev page-item-two previous-page-two disable"><span class="page-link-two"><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">1</span></li>
                                        <li class="btn numb page-item-two dots"><span class="page-link-two" href="#">2</span></li>
                                        <li class="btn numb page-item-two"><span class="page-link-two" href="#">3</span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">4</i></a></li>
                                        <li class="btn next page-item-two next-page-two"><sapn class="page-link-two" href="#">next</sapn></li>   -->
                              </ul>

                           </div>
                        </div>
                        <!-- --------------------  page 3--------------------- -->
                     </div>
                  </div>
                  <div class="popcontent-regisebk" id="tab_menu_six">
                     <!-- หน้ารายงานที่ 6 -->
                     <!-- หน้ารายงานที่ 5 -->
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานหนังสือที่ยังไม่คืน-</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <div class="form-inline">
                                       <div class="form-group">
                                          <label for="inline2mail" class="m-r-15 form-control-label">ค้นหา:</label>
                                          <input type="text" class="form-control txt-search-six" placeholder="ค้นหาด้วย(IDUSER, ชื่อหรือนามสกุล)" autocomplete="off">
                                       </div>
                                    </div>
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-six" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-six">
                                          <thead>
                                             <tr>
                                                <th>IDuser</th>
                                                <th>ชื่อ - นามสกุล</th>
                                                <th>Barcode-books</th>
                                                <th>วันกำหนดคืน</th>
                                                <th>ชื่อเรื่อง</th>
                                                <th>ปี/พ.ศ</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-six">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-six text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination-six" class="pagination-six">
                                 <!-- <li class="btn prev page-item-two previous-page-two disable"><span class="page-link-two"><i class="fa fa-angle-left" aria-hidden="true">Prev</i></span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">1</span></li>
                                        <li class="btn numb page-item-two dots"><span class="page-link-two" href="#">2</span></li>
                                        <li class="btn numb page-item-two"><span class="page-link-two" href="#">3</span></li>
                                        <li class="btn numb page-item-two current-page"><span class="page-link-two" href="#">4</i></a></li>
                                        <li class="btn next page-item-two next-page-two"><sapn class="page-link-two" href="#">next</sapn></li>   -->
                              </ul>

                           </div>
                        </div>

                     </div>
                     <!-- --------------------  page 6--------------------- -->
                  </div>
                  <div class="popcontent-regisebk tab-content" id="tab_menu_sven">
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานหมวดหมู่หนังสือ--</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-sven" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-sven" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-sven">
                                          <thead>
                                             <tr>
                                                <th>บาร์โค้ด</th>
                                                <th>ชื่อเรื่อง</th>
                                                <th>หมวดหมู่</th>
                                                <th>ปี/พศ</th>
                                                <th>ราคา</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-sven">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-sven text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination" class="pagination">
                              </ul>

                           </div>
                        </div>
                     </div>
                     <!-- ------------------------------page1------------------ -->
                  </div>
                  <div class="popcontent-regisebk " id="tab_menu_renbk">
                     <div class="row">
                        <div class="col-sm-12">
                           <!-- Basic Table starts -->
                           <div class="card">
                              <div class="sub-title box-headebooksregis">
                                 <div class="card-block">
                                    <i class="fa fa-newspaper-o icon-dfual" aria-hidden="true" style="font-size:20px ;"></i><span class="sp-hed-text">-รายงานการรีนิวหนังสือ--</span>
                                 </div>
                                 <div class="box_menu_regisbook">
                                 <form class="form-inline">
                                       <div class="form-group m-r-15">
                                          <label for="inline2mail" class="m-r-15 form-control-label">Unit:</label>
                                          <input type="text" class="form-control Unit-inport-renew" disabled="" autocomplete="off" style="width: 60px;">
                                       </div>
                                    </form>
                                    <button type="button" class="btn btn-warning btn-icon waves-effect waves-light btn-export-renbk" data-toggle="tooltip" data-placement="top" title="" data-original-title="ดาวน์โหลดไฟล์ excel">
                                       <i class="fa fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-icon waves-effect waves-light btn-config-renbk" data-toggle="tooltip" data-placement="top" title="" data-original-title="ตั้งค่าแสดงข้อมูล">
                                       <i class="fa fa-cogs"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-block width-body">
                                 <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                       <table class="table" id="invoice-tb-renew">
                                          <thead>
                                             <tr>
                                                <th>บาร์โค้ด</th>
                                                <th>ชื่อเรื่อง</th>
                                                <th>หมวดหมู่</th>
                                                <th>ปี/พศ</th>
                                                <th>วันยืม</th>
                                             </tr>
                                          </thead>
                                          <tbody class="tb-list-renew">

                                          </tbody>
                                       </table>
                                       <div class="card datanotfound-renew text-center"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Background Utilities table ends -->
                        </div>
                        <div class="row text-center">
                           <div class="pagination-container">
                              <ul id="pagination" class="pagination">
                              </ul>

                           </div>
                        </div>
                     </div>
                     <!-- ------------------------------page1------------------ -->
                  </div>                 
               </div>

            </div>
            <!--------------------------- Modal content --------------------------------------------->
            <div id="myModal-two" class="modal-alert">
               <div class="modal-content-alert">
                  <span class="close close-btnalert">&times;</span>
                  <i class="fa fa-exclamation-circle" aria-hidden="true" style='font-size:32px; color:red;'></i>
                  <label class="clear-all-txt" id="txt_headname"></label>
                  <hr>
                  <h5 class="h5-txtshow clear-all-txt" id="h5-txtshow"></h5>
                  <fieldset class="fldset">
                     <legend class="lgend" id="idlgend">กำหนดวันที่ต้องการค้นหาs:</legend>
                     <form>
                        <div class="box-display" style="display: none;">
                           <div class="form-group row">
                              <label for="example-search-input" class="col-xs-2 col-form-label form-control-label">ประเภทหนังสือ</label>
                              <div class="col-sm-10">
                                 <select class="slc-GMD slc-type-txt">
                                    <option value="">เลือกภาษา</option>
                                    <option value="ALL">ทั้งหมด</option>
                                    <option value="FI">นวนิยาย</option>
                                    <option value="MU">Music</option>
                                    <option value="PI">Picture</option>
                                    <option value="SO">Sound Recording</option>
                                    <option value="TE">Text</option>
                                    <option value="VI">VDO</option>
                                    <option value="CF">Computer File</option>
                                    <option value="WW">E-Resource</option>
                                    <option value="CD">CD-ROM</option>
                                    <option value="JT">Thai journal</option>
                                    <option value="JE">English journal</option>
                                    <option value="PK">Pocket book</option>
                                    <option value="R">อ้างอิง</option>
                                    <option value="80">ธรรมะ</option>
                                    <option value="EL">Electronic Resource</option>
                                    <option value="CA">Cartographic material</option>
                                    <option value="MZ">นิตยสาร</option>
                                    <option value="GP">สิ่งพิมพ์รัฐบาล</option>
                                    <option value="TH">รายงานการวิจัย</option>
                                    <option value="JO">วารสาร</option>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">วันเริ่มต้น</label>
                           <div class="col-sm-10">                             
                               <div class="input-groupday" style="position: relative;">             
                              <input id="fixday_books" type="text" class="form-control ipt-pop-two-start dateinputstart"  
                                    onclick="Thaicalendar( 'dateinputstart', 'Thaicalendarstart')" autocomplete="off"  >
                                 <div class="datepicker" id="Thaicalendarstart" hidden></div>  
                           </div>
                           
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">วันเริ่มต้น</label>
                           <div class="col-sm-10">
                                     <div class="input-groupday" style="position: relative;">             
                              <input id="fixday_books" type="text" class="form-control ipt-pop-two-end dateinputEnd"  
                                    onclick="Thaicalendar( 'dateinputEnd', 'ThaicalendarEnd')" autocomplete="off"  >
                                 <div class="datepicker" id="ThaicalendarEnd" hidden></div>  
                           </div>
                           </div>
                        </div>

                     </form>
                  </fieldset>
                  <div class="box-btn-alert">
                     <div class="card-block" id="btn-report-pop">

                     </div>
                  </div>
               </div>

            </div>

            <div class="main-friend-list"></div>
            <div class="panel-footer " id="foolterset-css"> </div>             
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="../assets/assets/plugins/Jquery/dist/jquery.min.js"></script>
            <script src="../assets/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
            <script src="../assets/assets/plugins/tether/dist/js/tether.min.js"></script>
            <script src="../assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <!-- custom js -->
            <script type="text/javascript" src="../assets/assets/js/main.min.js?v=<?php echo filemtime('../assets/assets/js/main.min.js'); ?>"></script>
            <script src="../js/main_report.js?v=<?php echo filemtime('../js/main_report.js'); ?>"></script>
            <script src="../js/table2excel.js"></script>
            <script src="../js/xlsx.full.min.js"></script>
            <script>
               var $window = $(window);
               var nav = $('.fixed-button');
               $window.scroll(function() {
                  if ($window.scrollTop() >= 200) {
                     nav.addClass('active');
                  } else {
                     nav.removeClass('active');
                  }
               });
            </script>
</body>

</html>

<div id="myModal-alert" class="modal-alert">

   <!-- Modal content -->
   <div class="modal-content-alert">
      <span class="close close-btnalert">&times;</span>
      <i class="fa fa-exclamation-circle" aria-hidden="true" style='font-size:32px; color:red;'></i>
      <label class="clear-all-txt" id="txt_headname"></label>
      <hr>
      <h5 class="h5-txtshow clear-all-txt" id="h5-txtshow"></h5>
      <fieldset class="fldset">
         <legend class="lgend" id="idlgend">รายการที่ต้องการค้นหา:</legend>
         <form>
            <div class="form-group row">
               <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ปี/พ.ศ</label>
               <div class="col-sm-10">
                  <input class="form-control ipt-pop-one" type="text" id="example-text-input">                      
               </div>
            </div>
            <div class="form-group row">
               <label for="example-search-input" class="col-xs-2 col-form-label form-control-label">ประเภทหนังสือ</label>
               <div class="col-sm-10">
                  <select class="slc-GMD ipt-pop-one">
                     <option value="">เลือกภาษา</option>
                     <option value="ALL">ทั้งหมด</option>
                     <option value="FI">นวนิยาย</option>
                     <option value="MU">Music</option>
                     <option value="PI">Picture</option>
                     <option value="SO">Sound Recording</option>
                     <option value="TE">Text</option>
                     <option value="VI">VDO</option>
                     <option value="CF">Computer File</option>
                     <option value="WW">E-Resource</option>
                     <option value="CD">CD-ROM</option>
                     <option value="JT">Thai journal</option>
                     <option value="JE">English journal</option>
                     <option value="PK">Pocket book</option>
                     <option value="R">อ้างอิง</option>
                     <option value="80">ธรรมะ</option>
                     <option value="EL">Electronic Resource</option>
                     <option value="CA">Cartographic material</option>
                     <option value="MZ">นิตยสาร</option>
                     <option value="GP">สิ่งพิมพ์รัฐบาล</option>
                     <option value="TH">รายงานการวิจัย</option>
                     <option value="JO">วารสาร</option>
                  </select>
               </div>
            </div>

         </form>
      </fieldset>
      <div class="box-btn-alert">
         <div class="card-block item_btnshow clear-all-txt" id="item_btnshow">
         </div>
      </div>
   </div>

</div>
<div id="myModal-sven" class="modal-alert">

   <!-- Modal content -->
   <div class="modal-content-alert">
      <span class="close close-btnalert">&times;</span>
      <i class="fa fa-exclamation-circle" aria-hidden="true" style='font-size:32px; color:red;'></i>
      <label class="clear-all-txt" id="txt_headname"></label>
      <hr>
      <h5 class="h5-txtshow clear-all-txt" id="h5-txtshow"></h5>
      <fieldset class="fldset">
         <legend class="lgend" id="idlgend">รายการที่ต้องการค้นหา:</legend>
         <form>
            <div class="form-group row">
               <label for="h-email" class="col-md-4 col-form-label form-control-label">หมวดเริ่มต้น:</label>
               <div class="col-md-4">
                  <input type="text" class="form-control txt-ipt-sven">
               </div>
            </div>
            <div class="form-group row">
               <label for="h-email" class="col-md-4 col-form-label form-control-label">หมวดท้ายสุด:</label>
               <div class="col-md-4">
                  <input type="text" class="form-control txt-ipt-sven">
               </div>
            </div>           
            <div class="form-group row">
               <label for="h-email" class="col-md-4 col-form-label form-control-label">ปี/พ.ศ:</label>
               <div class="col-md-4">                 
                        <div class="input-groupday" style="position: relative;">             
                              <input  type="text" class="form-control txt-ipt-sven " >
                                 
                           </div>
               </div>
            </div>
            <label for="h-email" class="col-md-8 col-form-label form-control-label">
               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
               ปี/พ.ศ.  ไม่จำเป็นต้องกำหนดหากไม่ต้องการ
            </label>
         </form>
      </fieldset>
      <div class="box-btn-alert">
         <div class="card-block item_btnshow clear-all-txt" id="item_btnsven">
         </div>
      </div>
   </div>

</div>