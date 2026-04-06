<?php
include('connect.php');
session_start();
if(!isset($_SESSION['email'])){
  header('location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mofi admin is super flexible, powerful, clean & modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Mofi admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Manage Posts | Mofi - Premium Admin Template By Pixelstrap</title>
    <!-- Google font-->
    <?php include('externalTopResources.php') ?>
    <style>
      .post-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        margin-bottom: 24px;
        overflow: hidden;
      }
      .post-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        transform: translateY(-2px);
      }
      .post-img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
      }
      .post-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
      }
      .post-card:hover .post-img {
        transform: scale(1.05);
      }
      .post-img-placeholder {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 14px;
      }
      .post-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
      .badge-tailoring {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
      }
      .badge-supply {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
      }
      .post-meta-info {
        display: flex;
        gap: 20px;
        margin-top: 12px;
        flex-wrap: wrap;
      }
      .meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #6c757d;
        font-size: 13px;
      }
      .meta-item i {
        font-size: 14px;
      }
      .post-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 12px;
        line-height: 1.4;
      }
      .post-content-preview {
        color: #555;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 16px;
      }
      .post-content-full {
        color: #444;
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 16px;
        padding: 16px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #5964e6;
      }
      .post-actions {
        display: flex;
        gap: 10px;
        margin-top: 16px;
        padding-top: 16px;
        border-top: 1px solid #eee;
      }
      .btn-edit {
        background: linear-gradient(135deg, #5964e6 0%, #4343e8 100%);
        border: none;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      .btn-edit:hover {
        background: linear-gradient(135deg, #4343e8 0%, #3232d8 100%);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(89, 100, 230, 0.4);
      }
      .btn-delete {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
        border: none;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      .btn-delete:hover {
        background: linear-gradient(135deg, #ee5a5a 0%, #dd4949 100%);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
      }
      .stats-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
        padding: 20px;
        color: white;
        margin-bottom: 24px;
      }
      .stats-card h3 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
      }
      .stats-card p {
        margin: 0;
        opacity: 0.9;
        font-size: 14px;
      }
      .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
      }
      .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
      }
      .no-posts {
        text-align: center;
        padding: 60px 20px;
        background: #f8f9fa;
        border-radius: 12px;
      }
      .no-posts i {
        font-size: 48px;
        color: #ccc;
        margin-bottom: 16px;
      }
      .no-posts h4 {
        color: #666;
        margin-bottom: 8px;
      }
      .no-posts p {
        color: #999;
      }
      .view-count {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
      }
      .post-id-badge {
        background: #e3f2fd;
        color: #1565c0;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
      }
    </style>
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
          <h4 class="f-w-700">Manage Posts</h4>
          <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
              <li class="breadcrumb-item"><a href="index.php"> <i data-feather="home"> </i></a></li>
              <li class="breadcrumb-item f-w-400">Posts</li>
              <li class="breadcrumb-item f-w-400 active">Manage Posts</li>
            </ol>
          </nav>
        </div>
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
              <!-- Stats Cards -->
              <?php
              $totalPosts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM updates"));
              $totalViews = 0;
              $viewsResult = mysqli_query($conn, "SELECT SUM(view) as totalViews FROM updates");
              if($viewsResult && $row = mysqli_fetch_assoc($viewsResult)){
                $totalViews = $row['totalViews'] ?: 0;
              }
              ?>
              <div class="col-xl-3 col-sm-6">
                <div class="stats-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h3><?php echo $totalPosts; ?></h3>
                      <p>Total Posts</p>
                    </div>
                    <div style="opacity: 0.8;">
                      <i class="fa fa-newspaper-o" style="font-size: 40px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h3><?php echo $totalViews; ?></h3>
                      <p>Total Views</p>
                    </div>
                    <div style="opacity: 0.8;">
                      <i class="fa fa-eye" style="font-size: 40px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <?php
                      $tailoringCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM updates WHERE category LIKE '%AL%'"));
                      ?>
                      <h3><?php echo $tailoringCount; ?></h3>
                      <p>Tailoring Posts</p>
                    </div>
                    <div style="opacity: 0.8;">
                      <i class="fa fa-cut" style="font-size: 40px;"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <?php
                      $supplyCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM updates WHERE category LIKE '%WY%'"));
                      ?>
                      <h3><?php echo $supplyCount; ?></h3>
                      <p>Supply Posts</p>
                    </div>
                    <div style="opacity: 0.8;">
                      <i class="fa fa-truck" style="font-size: 40px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Section Header -->
            <div class="section-header">
              <h2 class="section-title">All Posts</h2>
              <a href="add-post.php" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Add New Post
              </a>
            </div>
            
            <!-- Posts List -->
            <div class="row">
              <?php
              $result = mysqli_query($conn, "SELECT * FROM updates ORDER BY date DESC");
              if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $categoryClass = (strpos($row['category'], 'AL') !== false) ? 'badge-tailoring' : 'badge-supply';
                  $categoryText = (strpos($row['category'], 'AL') !== false) ? 'Tailoring' : 'Supply';
                  if(strpos($row['category'], 'AL') !== false && strpos($row['category'], 'WY') !== false) {
                    $categoryText = 'Tailoring & Supply';
                  }
                  ?>
                  <div class="col-xl-6 col-lg-12">
                    <div class="card post-card">
                      <div class="card-body p-4">
                        <div class="row">
                          <div class="col-md-5 mb-3 mb-md-0">
                            <div class="post-img-wrapper">
                              <?php if(!empty($row['img'])) { ?>
                                <img src="assets/images/updatesImg/<?php echo htmlspecialchars($row['img']); ?>" class="post-img" alt="Post Image">
                              <?php } else { ?>
                                <div class="post-img-placeholder">
                                  <div class="text-center">
                                    <i class="fa fa-image mb-2" style="font-size: 32px;"></i>
                                    <p class="mb-0">No Image</p>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                              <span class="post-id-badge">#<?php echo $row['updates_id']; ?></span>
                              <span class="post-badge <?php echo $categoryClass; ?>"><?php echo $categoryText; ?></span>
                            </div>
                            
                            <h5 class="post-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                            
                            <div class="post-content-preview">
                              <?php 
                              $plainContent = strip_tags($row['content']);
                              echo htmlspecialchars($plainContent); 
                              ?>
                            </div>
                            
                            <div class="post-meta-info">
                              <div class="meta-item">
                                <i class="fa fa-calendar"></i>
                                <span><?php echo date('M d, Y', strtotime($row['date'])); ?></span>
                              </div>
                              <div class="meta-item">
                                <i class="fa fa-clock-o"></i>
                                <span><?php echo date('h:i A', strtotime($row['date'])); ?></span>
                              </div>
                              <div class="view-count">
                                <i class="fa fa-eye"></i>
                                <span><?php echo $row['view']; ?> views</span>
                              </div>
                            </div>
                            
                            <div class="post-actions">
                              <a href="add-post.php?edit=<?php echo $row['updates_id']; ?>" class="btn btn-edit">
                                <i class="fa fa-edit me-1"></i>Edit
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              } else {
                ?>
                <div class="col-12">
                  <div class="no-posts">
                    <i class="fa fa-newspaper-o"></i>
                    <h4>No Posts Found</h4>
                    <p>Start by adding your first post to see it here.</p>
                    <a href="add-post.php" class="btn btn-primary mt-3">
                      <i class="fa fa-plus me-2"></i>Add First Post
                    </a>
                  </div>
                </div>
                <?php
              }
              ?>
            </div>
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
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="assets/js/script.js"></script>
    <script src="assets/js/script1.js"></script>
    <!-- Plugin used-->
  </body>
</html>
