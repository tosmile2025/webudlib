
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    <!-- Nucleo Icons -->
    <link href="../css/nucleo-icons.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../css/material-dashboard.css?v=3.0.4" rel="stylesheet" /> 
    <link  href="../css/css-search.css?v=<?php echo filemtime('../css/css-search.css'); ?>"  rel="stylesheet" type="text/css">
<!--<link  href="../css/css-search.css"  rel="stylesheet" type="text/css">-->
    <title>Search books</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../resized/favicon-16x16.png">
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-headers">
          <i class="fas fa-times p-3  cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" onclick=" maxScreen()" aria-hidden="true" id="iconSidenav"></i>
         
            <img src="../fileimage/LOGOBUD.png" class="navbar-brand-img h-100" alt="main_logos">
            <span class="ms-1 font-weight-bold text-white">BUD-LIB</span></span>
          
        </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item" id="bookhit_id"  onclick="func_TabClcik(this);">
          <a class="nav-link text-white   active bg-gradient-primary" href="#!">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class=" fa fa-thumbs-up material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">หนังสือยอดนิยม/ค้นหา</span>
          </a>
        </li>
        <li class="nav-item" id="home_id"  onclick="func_TabClcik(this);">
          <a class="nav-link text-white " href="#!">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-home material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">เว็บไซต์ห้องสมุด</span>
          </a>
        </li>
        <!-- <li class="nav-item" id="Ebook_id"  onclick="func_TabClcik(this);">
          <a class="nav-link text-white" href="#!">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-book material-icons opacity-10"></i> 
            </div>
            <span class="nav-link-text ms-1">E-books(อยู่ระหว่างปรับปรุง)</span>
          </a>
        </li> -->
        <li class="nav-item" id="comment_id"  onclick="func_TabClcik(this);">
          <a class="nav-link text-white " href="#!">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">แบบลงความคิดเห็น</span>
          </a>
        </li>
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <!-- <a class="btn bg-gradient-primary mt-4 w-100" href="#!" type="button"></a> -->
         <i class="fa fa-heart"></i> made with by
         <a href="#!" class="font-weight-bold" target="_blank">AS ST.H</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Books Search</h6>
        </nav>        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">         
          </div>
          <ul class="navbar-nav  justify-content-end">        
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="#!">Online User</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="bigboxebook align-items-center">      
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type Search..enter</label>
              <input type="text" class="form-control" id="schipt-p2-main">
            </div>
          </div>
          
          <div id="container" class="container-nav-ebooks">    
              <ul class="navItems">
              <li>
                    <div class="select-menu">
                          <div class="select-btn">
                              <span class="sBtn-text" id="sbtn-txt" data-type="Nm">ชื่อเรื่อง</span>
                              <!-- <span class="sBtn-text" id="sbtn-txt" data-type="1"> เลือกการค้นหา</span> -->
                              <i class="fa fa-chevron-down icon-dropdown" aria-hidden="true"></i>
                          </div>
                          <ul class="options" id="ul-navitems-type">
                              <li class="option">
                              <i class="fa fa-info-circle icon-dropdown" aria-hidden="true"></i>
                              <span class="option-text" id-data="Hm">หัวเรื่อง</span>                  
                              </li>
                              <li class="option">
                              <i class="fa fa-info-circle icon-dropdown" aria-hidden="true"></i>
                              <span class="option-text" id-data="Nm">ชื่อเรื่อง</span>                  
                              </li>
                              <li class="option">
                              <i class="fa fa-info-circle icon-dropdown" aria-hidden="true"></i>
                              <span class="option-text" id-data="By">ผู้แต่ง/แปล</span>
                              </li>
                              <li class="option">
                              <i class="fa fa-info-circle icon-dropdown" aria-hidden="true"></i>
                              <span class="option-text" id-data="Bc">บาร์โค้ด</span>
                              </li>
                              <li class="option">
                              <i class="fa fa-info-circle icon-dropdown" aria-hidden="true"></i>
                              <span class="option-text" id-data="Isbn">ISBN</span>
                              </li>                               
                          </ul>
                        </div>
              </li>       
            </ul>        
          </div>
    </div>    
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2x">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3"> รายการค้นหาหนังสือ </h6> <div id="spinner-load"></div>                 
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0 col-md-10">                
                <table id="invoice-tb-list-searchbk" class="table align-items-center mb-0 scrolldown">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxsz font-weight-bolder opacity-20">ชื่อเรื่อง</th>
                        <th class="text-uppercase text-secondary text-xxsz font-weight-bolder opacity-20 ps-2">บาร์โค้ด</th>                        
                        <th class="text-center text-uppercase text-secondary text-xxsz font-weight-bolder opacity-20">หมวดหมู่/ผู้แต่ง</th> 
                        <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">ผู้แต่ง</th>                                             -->
                        <th class="text-center text-uppercase text-secondary text-xxsz font-weight-bolder opacity-20">ปี/พ.ศ</th>                        
                      </tr>
                    </thead>
                    <tbody id="txt" class="tb-list-books-sch">           
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <!-- <div class="box-pagi"> 
                <dir class="pagination-container">
                  <ul id="pagination" class="pagination"></ul>
                </dir>
              </div> -->
            </div>
          </div>
        </div>
        <footer class="footer py-4  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>
                  made with <i class="fa fa-heart" aria-hidden="true"></i> by
                  <a href="#" class="font-weight-bold" target="_blank">Creative As Ps.n3</a>                  
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank"></a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
  </main>
  <div class="fixed-plugin">
    <!-- <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a> -->
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link  fixed-plugin-close-button bg-gradient-primary">
            <i class="material-icons ">EXIT</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.5"></script>
  <script src="../js-script/jquery-3.2.1.min.js"></script> 
  <script src="../js-script/jsmain.js?v=<?php echo filemtime('../js-script/jsmain.js'); ?>"></script>
</body>

</html>
<!--------------------------------------------------------------------popup ป๊อบอัพ สำหรับ แสดงรายละเอียดหนังสือหน้าค้นหาหนังสือ--------------------------------->
    
<div id="boxModal_showschbooks" class="modal_box_showschbooks">
    					<div class="modal-content_showschbooks">
                          <label  class="lb_headCleck" id="lb_headCleck"><i class="fa fa-address-book-o" ></i>&nbsp;สถานะหนังสือ</label>
                          <div class="statusbook">มีหนังสือ</div>
        					<span class="close_showschbooks">&times;</span>
            				<div class="box_showschbooks">
                            	<div class="box_text_showschbooks">
                             			<div class="wrapper-schbooks">
                                     		<div class="input-schbooks">
                                            	<input type="text" class="nameuser" id="memo_rguser" disabled autocomplete="off" required>
                                         		<label id="lbrguser">ชื่อเรื่อง:</label>
                                         	</div>
                                        </div>
                                        <div class="wrapper-schprint">
                                     		<div class="input-schprint">
                                            <input type="text" class="schprint" id="memo_rguser" disabled autocomplete="off" required>
                                         		<label id="lbschprint">พิมครั้งที่:</label>
                                            <input type="text" class="schcountbk" id="pagesch" disabled autocomplete="off" required>
                                         		<label id="lbschcountbk">บรรณาลักษณ์:</label>
                                         	</div>
                                        </div>
                                        <div class="wrapper-schbooks">
                                     		<div class="input-schbooks">
                                            	<input type="text" class="plishsch" id="memo_rguser" disabled autocomplete="off" required>
                                         		<label id="lbrguser">สำนักพิมพ์:</label>
                                         	</div>
                                        </div>
                                        <div class="wrapper-schbooks">
                                     		<div class="input-schbooks">
                                            	<input type="text" class="ISBNsch" id="ISBNsch" disabled autocomplete="off" required>
                                         		<label id="lbrguser">ISBN:</label>
                                         	</div>
                                            <div id="boxpic_books" class="boxpic_books"></div>
                                        </div>
                                        
                                </div>
                                 <div class="boxsub_showschbooks">
                                 	<table class="tb_usebook">
                                    	<tr>
                                        	<td>บาร์โค้ด</td>
                                            <td>สถานะ</td>
                                            <td>กำหนดส่ง</td>
                                           <td>ชื่อ-นามสกุล</td>
                                        </tr>
                                        
                                    </table>
                                    <table class="tbTwo_usebooks">
                                    	
                                    </table>
                                 </div>
                            </div>
                          
                           
    				</div>
          		</div>                                             
                           
