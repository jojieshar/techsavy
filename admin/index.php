<?php
session_start();
include('config/config.php');

// Login
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = sha1(md5($_POST['admin_password'])); // double encrypt to increase security
  $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id FROM rpos_admin WHERE (admin_email = ? AND admin_password = ?)");
  $stmt->bind_param('ss', $admin_email, $admin_password);
  $stmt->execute();
  $stmt->bind_result($admin_email, $admin_password, $admin_id);
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id;
  
  if ($rs) {
    header("location:dashboard.php");
  } else {
    $err = "Incorrect Authentication Credentials";
  }
}

require_once('partials/_head.php');
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TechSavy</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
     <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/main.png">
 <!-- Font Awesome -->
 <script src="https://kit.fontawesome.com/3a364cef47.js" crossorigin="anonymous"></script>
 <script
      defer
      src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
      integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp"
      crossorigin="anonymous"
    ></script>
  </head>
<body class="bg-dark">
  <div class="main-content">
  <div class="header"> <!-- Change the class to bg-gradient-orange -->
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-orange" style="position: relative; top: 40px;">Tech Savy POS</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt--8 pb-5" style="position: relative;top: 100px;">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    </div>
                    <input class="form-control" required name="admin_email" placeholder="Email" type="email">
                  </div>
                </div>
              <!-- Replace the existing password input field with this modified version -->
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <input class="form-control" required name="admin_password" id="admin_password" placeholder="Password" type="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i id="passwordToggleIcon" class="fa-regular fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Remember Me</span>
                  </label>
                </div>
                <div class="text-center">
                <button type="submit" name="login" class="btn btn-warning my-4 btn-block">Log In</button>

                </div>
              </form>
              <div class="text-center">
              <small class="text-muted" >Forgot your password? <a href="reset_password.php"  style="color: #fb6340;text-decoration: underline;">Reset</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->

  <!-- Argon Scripts -->
  <?php require_once('partials/_scripts.php'); ?>
<!-- Add this script tag within the <head> section of your HTML -->
<!-- Add this script tag within the <head> section of your HTML -->
<script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("admin_password");
    var eyeIcon = document.getElementById("passwordToggleIcon");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    } else {
      passwordInput.type = "password";
      eyeIcon.classList.remove("fa-eye-slash");
      eyeIcon.classList.add("fa-eye");
    }
  }
</script>


<footer class="py-5">
  <div class="container"  style="position: relative;top: 120px; left: 400px;">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          &copy;  - <?php echo date('Y'); ?> - Developed By TechSavy
        </div>
      </div>
</div>
  </div>
</footer>
</body>
</html>
