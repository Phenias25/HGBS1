<?php 
session_start();
include('connect.php');

// Check if user is logged in
if(!isset($_SESSION['email'])){
    header('Location: login.php');
    exit;
}

// Handle form submission
$message = '';
$message_type = '';

if(isset($_POST['add_user'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    // Validation
    if(empty($name) || empty($email) || empty($password)){
        $message = 'All fields are required';
        $message_type = 'error';
    } elseif($password !== $confirm_password){
        $message = 'Passwords do not match';
        $message_type = 'error';
    } elseif(strlen($password) < 6){
        $message = 'Password must be at least 6 characters';
        $message_type = 'error';
    } else {
        // Check if email already exists
        $check_query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0){
            $message = 'Email already exists';
            $message_type = 'error';
        } else {
            // Insert new user
            $hashed_password = md5($password);
            $insert_query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
            
            if(mysqli_stmt_execute($stmt)){
                $message = 'User added successfully';
                $message_type = 'success';
            } else {
                $message = 'Error adding user: ' . mysqli_error($conn);
                $message_type = 'error';
            }
        }
    }
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
    <title>Add User | Mofi - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
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
              <div><a class="logo" href="index.php"><img class="img-fluid for-light" src="assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" action="" method="POST">
                  <h4>Add New User</h4>
                  <p>Create a new user account</p>
                  
                  <?php if($message): ?>
                  <div class="alert alert-<?php echo $message_type; ?>">
                    <?php echo $message; ?>
                  </div>
                  <?php endif; ?>
                  
                  <div class="form-group">
                    <label class="col-form-label">Full Name</label>
                    <input class="form-control" type="text" required="" name="name" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" required="" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" required="" name="password" placeholder="Enter password">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                    <input class="form-control" type="password" required="" name="confirm_password" placeholder="Confirm password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit" name="add_user">Add User</button>
                    </div>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="index.php" class="btn btn-secondary">Back to Dashboard</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
    
    <?php if($message && $message_type == 'success'): ?>
    <script>
      Swal.fire({
        title: 'Success!',
        text: '<?php echo $message; ?>',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if(result.isConfirmed){
          window.location.href = 'index.php';
        }
      });
    </script>
    <?php endif; ?>
  </body>
</html>
