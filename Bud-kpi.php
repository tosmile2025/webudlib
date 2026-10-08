<!DOCTYPE html>
<html lang="en">

<head>
   <title>Budlib</title>


   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="img/favicon-16x16.png" type="image/x-icon">
   <link rel="icon" href="assets/assets/images/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="assets/assets/icon/themify-icons/themify-icons.css">
   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="assets/assets/icon/icofont/css/icofont.css">
   <link rel="stylesheet" type="text/css" href="web-dasboard/assets/plugins/bootstrap/css/bootstrap.min.css">
   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="web-dasboard/Cs-text/style-css.css?v=<?php echo filemtime('web-dasboard/Cs-text/style-css.css'); ?>" rel="stylesheet" type="text/css">
   <!-- Weather css -->
   <link href="assets/assets/css/svg-weather.css" rel="stylesheet">
   <!-- charts gstatic CDN -->
   <script src="https://www.gstatic.com/charts/loader.js"></script>
   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="assets/assets/css/main.css">
   <link href="web-dasboard/Cs-text/Css-main.css?v=<?php echo filemtime('web-dasboard/Cs-text/Css-main.css'); ?>" rel="stylesheet" type="text/css">
   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="assets/assets/css/responsive.css">

   <!-- -----------------firebase--------------------- -->
   <script src="https://www.gstatic.com/firebasejs/10.1.0/firebase-app-compat.js"></script>
   <script src="https://www.gstatic.com/firebasejs/10.1.0/firebase-firestore-compat.js"></script>
</head>

<body class="sidebar-mini fixed" onload="myFuncLoadDer()">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top ">
         <a href="#" class="logo">
            <span class="sp-txthead">นโยบายและแผน</span>
         </a>
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-togglez">
               <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
            <ul class="top-nav lft-nav">
               <li>
                  <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <img class="img-fluid able-logo" src="fileimage/LOGOBUD.png" alt="Theme-logo" style="width: 40px; height: 40px;"><span> โรงพยาบาลพุทธชินราช พิษณุโลก</span>
                  </a>
               </li>

            </ul>
            <div class="navbar-custom-menu f-right">
               <ul class="top-nav">
                  <!-- window screen -->
                  <!-- <li class="pc-rheader-submenu">          
                    <a href="#!" class="drop icon-circle">                     
                     <span id="lb-dayupdate">ตัวชี้วัดปีที่</span>                   
                    <select class="select-box slc-Year" id="year-kpi-id" >									
                      </select> 
                      <div class="boxbtn">
                      <button type="button" class="btn btn-success waves-effect waves-light btn-addKPI" data-toggle="tooltip" data-placement="top" title="" data-original-title="เพิ่มข้อมูลชุดใหม่">
      <i class="fa fa-plus " style="font-size: 22px;"></i>
      </button>
                      </div>                     
                    </a>
                 </li> -->
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                        <i class="fa fa-arrows-alt"></i>
                     </a>
                  </li> <!-- User Menu-->
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        <!-- <span><img class="img-circle " src="../fileimage/keroro.png" style="width:40px;" alt="User Image"></span> -->
                        <span><span id="box_head_name_lb"></span>
                           <i class=" icofont icofont-simple-down"></i></span>

                     </a>
                     <ul class="dropdown-menu settings-menu">
                        <li class="btn-login"><a href="#!"><i class="icon-settings"></i>Login</a></li>
                        <!-- <li class=" btn-add"><a href="#"><i class="icon-user"></i>Add Addmin</a></li>  -->
                        <li class=" btn-logout"><a href="#"><i class="icon-logout"></i> Logout</a></li>
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
            <ul class="sidebar-menu add-element">
               <li class="nav-level">--- dashboard -KPK</li>
               <li class="treeview active" onclick="myClickTab('bud')">
                  <a class="waves-effect waves-dark" href="#!">
                     <i class="fa fa-line-chart" aria-hidden="true"></i>
                     <span>BUD - KPI</span>
                  </a>
               </li>
               <!-- <li class="nav-level">--- Dashboard -Plan</li>
               <li class="treeview" onclick="myClickTab('plan')">
                  <a class="waves-effect waves-dark btn_link_searchbook" href="#!">
                     <i class="fa fa-clock-o" aria-hidden="true"></i>
                     <span> BUD - Plan</span></a>

               </li> -->
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
               <img class="media-object img-circle m-t-5" src="assets/assets/images/avatar-1.png" alt="Generic placeholder image">
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
                  <img class="media-object img-circle m-t-5" src="assets/assets/images/avatar-2.png" alt="Generic placeholder image">
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
            <div class="fix-hearder">
               <div class="main-header">
                  <!-- <h4>BUDHOSP KPI Dashboard</h4> -->
               </div>
               <div class="main-header ">
                  <a href="#!" class="drop icon-circle">
                     <span id="lb-dayupdate">ตัวชี้วัดปีที่</span>
                     <select class="select-box slc-Year" id="year-kpi-id">
                        <!-- <optgroup label="Developer">
                                          <option value="AL">Alabama</option>
                                          <option value="WY">Wyoming</option>
                                       </optgroup>
                                       <optgroup label="Designer">
                                          <option value="WY">Peter</option>
                                          <option value="WY">Hanry Die</option>
                                          <option value="WY">John Doe</option>
                                       </optgroup>						 -->
                     </select>
                     <div class="boxbtn">
                        <button type="button" class="btn btn-success waves-effect waves-light btn-addKPI" data-toggle="tooltip" data-placement="top" title="" data-original-title="เพิ่มข้อมูลชุดใหม่">
                           <i class="fa fa-plus " style="font-size: 22px;"></i>
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" data-toggle="tooltip" data-placement="top" title="" data-original-title="ลบข้อมูลตัวชี้วัด">
                           <i class="fa fa-minus" style="font-size: 22px;"></i>
                        </button>
                     </div>
                  </a>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-4 col-md-6">
                  <div class="card dashboard-product">
                     <div class="boxhead-txt">
                        <div class="subboxhead">
                           <span>จำนวน KPI ปี:</span>
                           <span class="txt-danger txt-yearALL"></span>
                        </div>
                        <div class="subboxicon">
                           <i class="fa fa-bar-chart text-warning-color"></i>
                        </div>
                     </div>
                     <div class="boxdata-text">
                        <div class="subboxdatatxt">
                           <span class="txt-numkpi"></span>
                        </div>
                        <div class="subboxdata-txt">
                           <span class="">หน่วย</span>
                        </div>
                     </div>
                  </div>
               </div>            
               <div class="col-lg-4 col-md-6">

                  <div class="card dashboard-product">
                     <div class="boxhead-txt">
                        <div class="subboxhead">
                           <span>ผู้ใช้งานออนไลน์:</span>
                        </div>
                        <div class="subboxicon">
                           <i class="fa fa-users text-success-color"></i>
                        </div>
                     </div>
                     <div class="boxdata-text">
                        <div class="subboxdatatxt">
                           <span class="txt-numkpi-md3"></span>
                        </div>
                        <div class="subboxdata-txt">
                           <span class="">คน</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card dashboard-product">
                     <div class="boxhead-txt">
                        <div class="subboxhead">
                           <span>การนำเข้าข้อมูลปี:</span>
                           <span class="txt-danger txt-yearALL"></span>
                        </div>
                        <div class="subboxicon">
                           <i class="fa fa-pie-chart text-danger-color"></i>
                        </div>
                     </div>
                     <div class="boxdata-text-md4">
                        <div class="subboxdata-txt">
                           <span class="">ผ่าน</span>
                           <span class="txt-numkpi-md4"></span>
                        </div>
                        <div class="subboxdatatxt">
                           <span class="">ไม่ผ่าน</span>
                           <span class="txt-numkpi-md4-nopass"></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- 4-blocks row end -->

            <!-- 1-3-block row start -->
            <div class="row">
               <div class="col-lg-4">
                  <div class="card">
                     <div class="user-block-2">
                        <h3>OverView Bud KPI</h3>
                     </div>
                     <div class="card-header" style="text-align: center;">
                        <!-- <div class="spinner-border" role="status">
                           <span class="visually-hidden">Loading...</span>
                         </div> -->
                        <div class="fix-width">                        
                        <canvas id="myChartone"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <div class="card">
                     <div class="card-header">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <i class="fa fa-cogs text-danger-color">:</i>
                        ยุทธศาสตร์ที่ 1 Service plan & Proxy disease, care system
                     </div>
                     <div class="card-block">
                        <div class="chartBoxs">
                           <canvas id="myChart"></canvas>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-2 col-md-6">
                  <div class="card dashboard-product">
                     <div class="row dispaly-fix">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <div class="txt-lb-hd" data-id="CH1">
                           
                        </div>
                        <div class="item-edit" id="CH1">
                           <i class="fa fa-pencil-square text-danger-color"></i>
                        </div>
                     </div>
                     <h6 class="dashboard-total-products count-user"></h6>
                     <!-- <span class="label label-warning"></span> -->

                     <div class="side-box">
                        <!-- <i class="fa fa-users text-warning-color"></i> -->
                        <i class="fa fa-bar-chart text-warning-color"></i>
                     </div>
                     <div class="card-block">
                        <canvas id="myChart-Primay" class="chart-right"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6">
                  <div class="card dashboard-product">
                     <div class="row dispaly-fix">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <div class="txt-lb-hd" data-id="CH2">
                          
                        </div>
                        <div class="item-edit"  id="CH2">
                           <i class="fa fa-pencil-square text-danger-color"></i>
                        </div>
                     </div>
                     <h6 class="dashboard-total-products count-totalbooks"></h6>
                     <!-- <span class="label label-primary"></span> -->
                     <div class="side-box ">
                        <!-- <i class="fa fa-user text-primary-color"></i> -->
                        <i class="fa fa-database text-primary-color"></i>
                     </div>
                     <div class="card-block">
                        <canvas id="myChart-Two" class="chart-right"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6">
                  <div class="card dashboard-product">
                     <div class="row dispaly-fix">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <div class="txt-lb-hd" data-id="CH3">
                          
                        </div>
                        <div class="item-edit"  id="CH3">
                           <i class="fa fa-pencil-square text-danger-color"></i>
                        </div>
                     </div>
                     <h6 class="dashboard-total-products count-learning"></h6>
                     <!-- <span class="label label-success"></span> -->
                     <div class="side-box">
                        <i class="fa fa-users text-success-color"></i>
                        <!-- <i class="ti-direction-alt text-success-color"></i> -->
                     </div>
                     <div class="card-block">
                        <canvas id="myChart-Three" class="chart-right"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6">
                  <div class="card dashboard-product">
                     <div class="row dispaly-fix">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <div class="txt-lb-hd" data-id="CH4">
                           
                        </div>
                        <div class="item-edit"  id="CH4">
                           <i class="fa fa-pencil-square text-danger-color"></i>
                        </div>
                     </div>

                     <h6 class="dashboard-total-products count-novel"></h6>
                     <!-- <span class="label label-danger"></span> -->
                     <div class="side-box">
                        <i class="fa fa-heartbeat text-danger-color"></i>
                        <!-- <i class="ti-rocket text-danger-color"></i> -->
                     </div>
                     <div class="card-block">
                        <canvas id="myChart-Four" class="chart-right"></canvas>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6">
                  <div class="card dashboard-product">
                     <div class="row dispaly-fix">
                        <!-- <h5 class="card-header-text">รายการ ยืม/คืน/จอง/ค่าปรับ</h5> -->
                        <div class="txt-lb-hd" data-id="CH5">
                           
                        </div>
                        <div class="item-edit"  id="CH5">
                           <i class="fa fa-pencil-square text-danger-color"></i>
                        </div>
                     </div>
                     <h6 class="dashboard-total-products count-novel" id="chartVersion"></h6>
                     <!-- <span class="label label-danger"></span> -->
                     <div class="side-box">
                        <i class="fa fa-leanpub text-danger-color"></i>
                        <!-- <i class="ti-rocket text-danger-color"></i> -->
                     </div>
                     <div class="card-block">
                        <canvas id="myChart-Five" class="chart-right"></canvas>
                     </div>
                  </div>
               </div>
            </div>
            <div class="boxiconmenu">
               <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" data-toggle="tooltip" data-placement="top" title="" data-original-title="เพิ่มข้อมูลชุดใหม่">
                  <i class="fa fa-plus " style="font-size: 22px;"></i>
               </button>
            </div>

            <!-- //////////////////// html menu right------------------------- -->
            <div class="panel-footer " id="foolterset-css">
               By As St.Head
            </div>
            <!-- ------------------------------popup ป๊อบอัพ หน้าล็อคอิน---------------  -->
<div id="boxModal_popLogin" class="modal_box_popAdbarCodeAuto">
   <div class="modal-content_popAdbarCodeAuto">
      <div class="card">
         <div class="card-header">
            <h5 class="card-header-text">Add Administartor</h5>
            <div class="f-right">
               <a href="#" data-toggle="modal" data-target="#validation-helper-Modal"><i class="icofont icofont-code-alt close-btnpop"></i></a>
            </div>
         </div>
         <div class="card-block">
            <div class="form-group has-danger txt-left">
               <label class="form-control-label " for="inputDanger1">User:</label>
               <input type="text" class="form-control txt-admin">
               <label class="form-control-label " for="inputDanger1">Pass:</label>
               <input type="password" class="form-control txt-admin" id="ipt-pass">
               <div class="form-control-feedback" id="txt-alertcode"></div>
               <small class="form-text text-muted" id="txt-alertlb">หากจำรหัสผ่านไม่ได้กรุณาติดต่อ Admin</small>
            </div>
            <div class="form-group">
               <button class="bt_adAutoBarcode" style="vertical-align:middle"><span class="sp_adAutoBarcode">Enter</span></button>

            </div>
         </div>
      </div>
   </div>
</div>
<!-- ------------------------------popup ป๊อบอัพ สำหรับเก็บข้อมูล ----------------  -->
<div id="boxModal_AddDatatxt" class="modal_box_AddDatatxt">
   <div class="modal-content_AddDatatxt">
      <div class="card">
         <div class="card-header">
            <h5 class="card-header-text"">การจัดการข้อมูล:</h5>
                           <h5 class=" card-header-text txt-danger" id="txt-lb-head"></h5>
            <div class="f-right">
               <a href="#" data-toggle="modal" data-target="#validation-helper-Modal"><i class="icofont icofont-code-alt close-addtxt"></i></a>
            </div>
         </div>
         <select class="select-box slc-Year slc-popup" id="typeKPI">
            <option value="tab-TOTAL" data-id="99">สรุปตัวชี้วัด</option>
            <option value="tab-ONE" data-id="0">ตัวชี้วัดที่ 1</option>
            <option value="tab-TWO" data-id="1">ตัวชี้วัดที่ 2</option>
            <option value="tab-THREE" data-id="2">ตัวชี้วัดที่ 3</option>
            <option value="tab-FOUR" data-id="3">ตัวชี้วัดที่ 4</option>
            <option value="tab-FIVE" data-id="4">ตัวชี้วัดที่ 5</option>
            <option value="tab-SIX" data-id="5">ตัวชี้วัดที่ 6</option>
         </select>
         <div class="card-block">
            <div class="form-group">
               <!-- ----------------------- begin page 1------------- -->
               <div class="tab-pg-add" id="tab-TOTAL">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 1 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">สรุปกราฟตัวชีวัด</h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">จำนวนตัวชี้วัด</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-total" type="text" autocomplete="off" placeholder="จำนวนตัวชี้วัดปี">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-total" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-total" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-total" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--------------end-- body text html page 1 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addone" style="display: none;">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editone">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delone">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>


               </div>
               <!-- -----------------end page 1--------- -->
               <!-- ----------------------- begin page 2------------- -->
               <div class="tab-pg-add" id="tab-ONE">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 1 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลสรุปกราฟตัวชีวัดที่: 1 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        <div class="card-block scroll-ele">
                           <form class="form-inline">
                              <label class="form-control-label">1. หน่วยงาน Heart</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">2. หน่วยงาน ER</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">3. หน่วยงาน CA</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">4. หน่วยงาน Newborn</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">5. หน่วยงาน สาขาสูติ</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">6. หน่วยงาน Eyes</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">7. หน่วยงาน ODS-MIS</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">8. หน่วยงาน Paliative-care</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">9. หน่วยงาน Stoke</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">10. หน่วยงาน Sepsis</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">11. หน่วยงาน TB</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">12. หน่วยงาน Otho</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">13. หน่วยงาน COPD</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <form class="form-inline">
                              <label class="form-control-label">14. หน่วยงาน Transplant</label>
                              <div class="boxfix-tb">
                                 <div class="box-list-three">
                                    <input type="number" class="form-txtinput" placeholder="ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="ไม่ผ่าน">
                                    <input type="number" class="form-txtinput" placeholder="รอดำเนินการ">
                                 </div>
                                 <div class="boxiconbtn">
                                    <button type="button" class="btn btn-success waves-effect waves-light btn-adddata" onclick="func_btnone('add', this)">
                                       <i class="fa fa-plus " style="font-size: 22px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light btn-editdata" onclick="func_btnone('edit', this)">
                                       <i class="fa fa-pencil" style="font-size: 20px;"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-deldata" onclick="func_btnone('del', this)">
                                       <i class="fa fa-minus" style="font-size: 22px;"></i>
                                    </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!--------------end-- body text html page 1 ------------->
                  </div>
               </div>
               <!-- -----------------begin page 3---------- -->
               <div class="tab-pg-add" id="tab-TWO">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 3 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลยุทธศาสตร์ที: 2 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>
                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-TWO" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-TWO" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-TWO" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--------------end-- body text html page 3 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addTWO" onclick="func_BtnEvent('txt-ipt-TWO', 'add')">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editTWO" onclick="func_BtnEvent('txt-ipt-TWO', 'edit')">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" onclick="func_BtnEvent('txt-ipt-TWO', 'del')">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>
               </div>
               <!-- -----------------begin page 4---------- -->
               <div class="tab-pg-add" id="tab-THREE">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 3 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลยุทธศาสตร์ที: 3 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>

                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-THree" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-THree" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-THree" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>

                     </div>
                     <!--------------end-- body text html page 3 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addTWO" onclick="func_BtnEvent('txt-ipt-THree', 'add')">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editTWO" onclick="func_BtnEvent('txt-ipt-THree', 'edit')">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" onclick="func_BtnEvent('txt-ipt-THree', 'del')">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>
               </div>
               <div class="tab-pg-add" id="tab-FOUR">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 3 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลยุทธศาสตร์ที: 4 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>

                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Four" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Four" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Four" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>

                     </div>
                     <!--------------end-- body text html page 3 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addTWO" onclick="func_BtnEvent('txt-ipt-Four', 'add')">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editTWO" onclick="func_BtnEvent('txt-ipt-Four', 'edit')">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" onclick="func_BtnEvent('txt-ipt-Four', 'del')">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>
               </div>
               <div class="tab-pg-add" id="tab-FIVE">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 3 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลยุทธศาสตร์ที: 5 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>

                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Five" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Five" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Five" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>

                     </div>
                     <!--------------end-- body text html page 3 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addTWO" onclick="func_BtnEvent('txt-ipt-Five', 'add')">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editTWO" onclick="func_BtnEvent('txt-ipt-Five', 'edit')">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" onclick="func_BtnEvent('txt-ipt-Five', 'del')">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>
               </div>
               <div class="tab-pg-add" id="tab-SIX">
                  <div class="card-header txt-left">
                     <!---------------- body text html page 3 ------------->
                     <div class="card inline-form-style inline-form-1">
                        <div class="card-header">
                           <h5 class="card-header-text txt-success">ข้อมูลยุทธศาสตร์ที: 6 </h5>
                           <div class="f-right">
                              <a href="" data-toggle="modal" data-target="#hidden-labels-Modal"><i class="icofont icofont-code-alt"></i></a>
                           </div>
                        </div>

                        <div class="card-block">
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Six" type="text" autocomplete="off" placeholder="ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">ไม่ผ่าน</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Six" type="text" autocomplete="off" placeholder="ไม่ผ่าน">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="example-text-input" class="col-xs-2 col-form-label form-control-label">รอดำเนินการ</label>
                              <div class="col-sm-10">
                                 <input class="form-control txt-ipt-Six" type="text" autocomplete="off" placeholder="รอดำเนินการ">
                              </div>
                           </div>
                        </div>

                     </div>
                     <!--------------end-- body text html page 3 ------------->
                  </div>
                  <button type="button" class="btn btn-success waves-effect waves-light btn-addTWO" onclick="func_BtnEvent('txt-ipt-Six', 'add')">
                     <i class="fa fa-plus " style="font-size: 22px;"></i>
                  </button>
                  <button type="button" class="btn btn-primary waves-effect waves-light btn-editTWO" onclick="func_BtnEvent('txt-ipt-Six', 'edit')">
                     <i class="fa fa-pencil" style="font-size: 20px;"></i>
                  </button>
                  <button type="button" class="btn btn-danger waves-effect waves-light btn-delTWO" onclick="func_BtnEvent('txt-ipt-Six', 'del')">
                     <i class="fa fa-minus" style="font-size: 22px;"></i>
                  </button>
               </div>
            </div>
         </div>

      </div>

   </div>
</div>
<!-- ------------------------------popup ป๊อบอัพ สำหรับ เพิ่ม ไตรมาส kpi----------------  -->
<div id="boxModal_popAddkpi" class="modal_box_popAdbarCodeAuto">
   <div class="modal-content_popAdbarCodeAuto">
      <div class="card">
         <div class="card-header">
            <h5 class="card-header-text">เพิ่มข้อมูล</h5>
            <div class="f-right">
               <a href="#" data-toggle="modal" data-target="#validation-helper-Modal"><i class="icofont icofont-code-alt close-btnadd"></i></a>
            </div>
         </div>
         <hr>
         <div class="card-block">
            <div class="form-group has-danger txt-left">
               <label class="form-control-label " for="inputDanger1">ปีที่:</label>
               <input type="number" class="form-control txt-add-kpi">
               <label class="form-control-label " for="inputDanger1">ไตรมาสที่:</label>
               <input type="text" class="form-control txt-add-kpi" id="ipt-input">
               <hr>
               <small class="form-text text-muted" id="txt-alertlb">เพิ่มไตรมาสสำหรับจัดเก็บตัวชี้วัดของแต่ละไตรมาส</small>
            </div>
            <div class="form-group">
               <button class="bt_add-kpi" style="vertical-align:middle"><span class="sp_adAutoBarcode">Enter</span></button>

            </div>
         </div>
      </div>
   </div>
</div>

<!-- -popup alert ป๊อบอัพ แสดงเตือนก่อน ตกลง--------- -->
<div id="boxModal_popupAlertAll" class="modal_box_popAlertALL">
   <div class="modal-content_popAlertALL">
      <div class="card-header">
         <h5 class="card-header-text">กรุณาตรวจสอบข้อมูล</h5>
         <div class="f-right">
            <a href="#" data-toggle="modal" data-target="#validation-helper-Modal"><i class="icofont icofont-code-alt close-btnadd"></i></a>
         </div>
      </div>
      <hr>
      <div class="card-block">
         <div class="form-group has-danger">
            <h5 class="card-header-text lb-h5"></h5>
            <hr>
            <label class="form-control-label txt-lb-all" for="inputDanger1"></label>
            <hr>
         </div>
         <div class="card-header btn-all">

         </div>
      </div>

   </div>
</div>
<!-- ------------------------------popup ป๊อบอัพ สำหรับ เแก้ไขรายชื่อ kpi---------------  -->
<div id="boxModal_popEditkpi" class="modal_box_popAdbarCodeAuto">
   <div class="modal-content_popAdbarCodeAuto">
      <div class="card">
         <div class="card-header">
            <h5 class="card-header-text">แก้ไขชื่อโมดูล:</h5>
            <h5 class="card-header-text lb-head-txt"></h5>
            <div class="f-right">
               <a href="#" data-toggle="modal" data-target="#validation-helper-Modal"><i class="icofont icofont-code-alt close-btnadd-edit"></i></a>
            </div>
         </div>
         <hr>
         <div class="card-block">
            <div class="form-group has-danger txt-left">
               <label class="form-control-label " for="inputDanger1">ชื่อยุทธศาสตร์:</label>
               <input type="text" class="form-control  ipt_lbChanal">              
              
            </div>
            <div class="form-group">
               <button class="bt_editlb" style="vertical-align:middle"><span class="sp_adAutoBarcode">Enter</span></button>

            </div>
         </div>
      </div>
   </div>
</div>
            <!-- Required Jqurey -->
            <script src="assets/assets/plugins/Jquery/dist/jquery.min.js"></script>
            <script src="assets/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
            <script src="assets/assets/plugins/tether/dist/js/tether.min.js"></script>
            <!-- Required Fremwork -->
            <script src="web-dasboard/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <!-- custom js -->
            <script type="text/javascript" src="web-dasboard/assets/js/main.min.js?v=<?php echo filemtime('web-dasboard/assets/js/main.min.js'); ?>"></script>
            <!-- ///////--------------CDN chart right KPI -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>          
            <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
            <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
            <script src="web-dasboard/js/jsscript-intranet.js?=<?php echo filemtime('web-dasboard/js/jsscript-intranet.js'); ?>"></script>
            <script>
               var $window = $(window);
             var nav = $('.fixed-button');
               window.addEventListener("resize", updateSize);
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
