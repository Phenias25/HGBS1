<?php 
session_start();
include('connect.php');

// Handle logout
if(isset($_GET['logout']) && $_GET['logout'] == 1){
    session_destroy();
    header('Location: login.php');
    exit;
}

// Redirect if already logged in
if(isset($_SESSION['email'])){
    header('Location: index.php');
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
    <title>Login | HGBSLTD</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css">
  </head>
  <body>
   
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" action="" method="POST">
                  <h4>Sign in to account</h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" name="email" placeholder="Test@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" required="" name="password" placeholder="********">
                      <div class="show-hide"><span class="show"><i class="fa fa-eye" id="togglePassword" style="cursor:pointer"></i></span></div>
                    </div>
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input type="checkbox" id="checkbox1">
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit" name="login">Sign in</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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
      <!-- Sidebar jquery-->
      <script src="assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="assets/js/script.js"></script>
      <script src="assets/js/script1.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
      <script>
        // Show/hide password functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.querySelector('input[name="password"]');
        if (togglePassword && passwordInput) {
          togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
          });
        }
      </script>
      
      <?php 
      if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = md5(trim($_POST['password']));
        
        $query = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $_SESSION['email'] = $row['email'];
                ?>
                <script>
                  const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                  });
                  Toast.fire({
                    icon: "success",
                    title: "Signed In successfully"
                  });
                  setTimeout(() => {
                    window.location.href = "index.php";
                  }, 3000);
                </script>
                <?php
            } else {
                ?>
                <script>
                  Swal.fire({
                    title: 'Error!',
                    text: 'Invalid username or password',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                  });
                </script>
                <?php
            }
        } else {
            ?>
            <script>
              Swal.fire({
                title: 'Error!',
                text: 'Database error: <?php echo mysqli_error($conn); ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
              });
            </script>
            <?php
        }
      }
      ?>
      <!-- Plugin used-->
    </div>
  </body>
</html>
