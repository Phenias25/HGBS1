
<?php

include('connect.php');


session_start();


if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
else{
  header('location: login.php');
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <!-- <link rel="icon" href="assets/images/favicon.png" type="image/x-icon"> -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon"> -->
    <title>Admin | Dashboard</title>
    <!-- Google font-->
<?php include('externalTopResources.php') ?>
  </head>
  <body> 
    <div class="loader-wrapper"> 
      <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
      </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <div class="page-header row">
        <div class="header-logo-wrapper col-auto">
          <div class="logo-wrapper"><a href="index.php"><img class="img-fluid for-light" src="assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="assets/images/logo/logo_light.png" alt=""></a></div>
        </div>
        <div class="col-4 col-xl-4 page-title">
          <h4 class="f-w-700">Default dashboard</h4>
          <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
              <li class="breadcrumb-item"><a href="index.php"> <i data-feather="home"> </i></a></li>
              <li class="breadcrumb-item f-w-400">Dashboard</li>
              <li class="breadcrumb-item f-w-400 active">Default</li>
            </ol>
          </nav>
        </div>
        <!-- Page Header Start-->
  <?php  ?>
        <!-- Page Header Ends                              -->
      </div>
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php include('sidebar.php') ?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid dashboard-3">
            <div class="row"> 
              <div class="col-xl-4 col-sm-6"> 
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top daily-revenue-card">
                      <h4>Total Updates</h4>
                      <!-- <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-sort-desc"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div> -->
                    </div>
                  </div>
           
                  <div class="card-body p-4 total-sells">
                    <div class="d-flex align-items-center gap-3"> 
                      <div class="flex-shrink-0 p-4" ><i style="color:white;font-size:25px;" class="fa fa-newspaper-o" aria-hidden="true"></i></div>
                      <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2"> 
                          <h2><?php
                          $sql = mysqli_query($conn,"SELECT  count(updates_id) as 'noUpdates' from updates;");

                        if(mysqli_num_rows($sql)==0){
                          echo "0";
                        }
                        else{
                          $count = mysqli_fetch_array($sql);
                          $count = $count['noUpdates'];
                          echo $count;
                  
                        }

                          ?></h2>
                          <div class="d-flex total-icon">
                            <p class="mb-0 up-arrow bg-light-success"><i class="fa fa-arrow-up text-success"></i></p><span class="f-w-500 font-success">+ 20.08% </span>
                          </div>
                        </div>
                        <p class="text-truncate">This month</p>
                      </div>
                    </div>
                    <!-- <div id="admissionRatio"></div> -->
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6"> 
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <div class="header-top daily-revenue-card">
                      <h4>Views</h4>
                      <!-- <div class="dropdown icon-dropdown">
                        <button class="btn dropdown-toggle" id="userdropdown2" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-sort-desc"></i></button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown2"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
                      </div> -->
                    </div>
                  </div>
                  <div class="card-body p-4 total-sells-2">
                    <div class="d-flex align-items-center gap-3"> 
                      <div class="flex-shrink-0 p-4"><i class="fa fa-eye" style="color:white;font-size:25px;" aria-hidden="true"></i></div>
                      <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2"> 
                          <h2><?php
                          $sql = mysqli_query($conn," SELECT  * from updates where month(current_date());");
                          $views = mysqli_fetch_array($sql);
                    

                        if($views){

                          echo $views['view'];
                        }
                        else{
                      
                          echo "0";
                  
                        }

                          ?></h2>
                          <div class="d-flex total-icon">
                            <p class="mb-0 up-arrow bg-light-danger"><i class="fa fa-arrow-down text-danger"></i></p><span class="f-w-500 font-danger">- 10.02%</span>
                          </div>
                        </div>
                        <p class="text-truncate">This Month</p>
                      </div>
                    </div>
                    <!-- <div id="order-value"></div> -->
                  </div>
                </div>
              </div>
              
           
           
            
             
         
              
           
            
            </div>   <!-- row  -->    
       
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                <p class="mb-0 f-w-600">Copyright <span class="year-update"> </span> © Mofi theme by pixelstrap  </p>
                <p class="mb-0 f-w-600">Hand crafted & made with
                  <svg class="footer-icon">
                    <use href="assets/svg/icon-sprite.svg#footer-heart"> </use>
                  </svg>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/sidebar-pin.js"></script>
    <script src="assets/js/slick/slick.min.js"></script>
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/header-slick.js"></script>
    <script src="assets/js/chart/morris-chart/raphael.js"></script>
    <script src="assets/js/chart/morris-chart/morris.js"> </script>
    <script src="assets/js/chart/morris-chart/prettify.min.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/chart/apex-chart/moment.min.js"></script>
    <script src="assets/js/chart/echart/pie-chart/facePrint.js"></script>
    <script src="assets/js/chart/echart/pie-chart/testHelper.js"></script>
    <script src="assets/js/chart/echart/pie-chart/custom-transition-texture.js"></script>
    <script src="assets/js/chart/echart/data/symbols.js"></script>
    <script src="assets/js/slick/slick.min.js"></script>
    <script src="assets/js/slick/slick-theme.js"></script>
    <script src="assets/js/vector-map/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-au-mill.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-in-mill.js"></script>
    <script src="assets/js/vector-map/map/jquery-jvectormap-asia-mill.js"></script>
    <!-- calendar js-->
    <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/datatables/datatable.custom.js"></script>
    <script src="assets/js/datatable/datatables/datatable.custom1.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="assets/js/rating/jquery.barrating.js"></script>
    <script src="assets/js/rating/rating-script.js"></script>
    <script src="assets/js/owlcarousel/owl.carousel.js"></script>
    <script src="assets/js/vector-map/map-vector.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/dashboard/dashboard_3.js"></script>
    <script src="assets/js/ecommerce.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/script1.js"></script>
    <script src="assets/js/theme-customizer/customizer.js"></script>
    <!-- Plugin used-->
  </body>
</html>