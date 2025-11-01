<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Update Profile
if (isset($_POST['ChangeProfile'])) {
  $admin_id = $_SESSION['admin_id'];
  $admin_name = $_POST['admin_name'];
  $admin_email = $_POST['admin_email'];
  $Qry = "UPDATE rpos_admin SET admin_name =?, admin_email =? WHERE admin_id =?";
  $postStmt = $mysqli->prepare($Qry);
  //bind paramaters
  $rc = $postStmt->bind_param('sss', $admin_name, $admin_email, $admin_id);
  $postStmt->execute();
  //declare a varible which will be passed to alert function
  if ($postStmt) {
    $success = "Account Updated" && header("refresh:1; url=dashboard.php");
  } else {
    $err = "Please Try Again Or Try Later";
  }
}
if (isset($_POST['changePassword'])) {

  //Change Password
  $error = 0;
  if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
    $old_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['old_password']))));
  } else {
    $error = 1;
    $err = "Old Password Cannot Be Empty";
  }
  if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
    $new_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['new_password']))));
  } else {
    $error = 1;
    $err = "New Password Cannot Be Empty";
  }
  if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
    $confirm_password = mysqli_real_escape_string($mysqli, trim(sha1(md5($_POST['confirm_password']))));
  } else {
    $error = 1;
    $err = "Confirmation Password Cannot Be Empty";
  }

  if (!$error) {
    $admin_id = $_SESSION['admin_id'];
    $sql = "SELECT * FROM rpos_admin   WHERE admin_id = '$admin_id'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);
      if ($old_password != $row['admin_password']) {
        $err =  "Please Enter Correct Old Password";
      } elseif ($new_password != $confirm_password) {
        $err = "Confirmation Password Does Not Match";
      } else {

        $new_password  = sha1(md5($_POST['new_password']));
        //Insert Captured information to a database table
        $query = "UPDATE rpos_admin SET  admin_password =? WHERE admin_id =?";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc = $stmt->bind_param('ss', $new_password, $admin_id);
        $stmt->execute();

        //declare a varible which will be passed to alert function
        if ($stmt) {
          $success = "Password Changed" && header("refresh:1; url=dashboard.php");
        } else {
          $err = "Please Try Again Or Try Later";
        }
      }
    }
  }
}
require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    $admin_id = $_SESSION['admin_id'];
    //$login_id = $_SESSION['login_id'];
    $ret = "SELECT * FROM  rpos_admin  WHERE admin_id = '$admin_id'";
    $stmt = $mysqli->prepare($ret);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($admin = $res->fetch_object()) {
    ?>
   <!-- Profile header -->
   <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-color: #313866;">

    <!-- Header container -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 col-md-10 mx-auto text-center">
          <h1 class="display-2 text-white">Hello <?php echo $admin->admin_name; ?></h1>
          <p class="text-white mt-0 mb-5">Personalize your profile and update your password as needed.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content container -->
  <div class="container-fluid mt--8">
    <div class="row">
      <!-- Profile card -->
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 mx-auto">
        <div class="card card-profile shadow">
          <!-- Profile picture -->
          <div class="card-profile-image text-center mt-4">
            <a href="#">
              <img src="assets/img/theme/userpic.png" class="rounded-circle img-fluid">
            </a>
          </div>
          <!-- Profile details -->
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <!-- Profile stats if needed -->
          </div>
          <br>
          <br>
          <br>
          <div class="card-body pt-0 pt-md-4">
            <div class="text-center">
              <h3><?php echo $admin->admin_name; ?></h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i><?php echo $admin->admin_email; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit profile and change password sections -->
      <div class="col-xl-8 order-xl-1 mx-auto">
        <!-- Edit profile section -->
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit Profile</h3>
              </div>
              <div class="col-4 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Profile form -->
            <form method="post">
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="input-username">User Name</label>
                      <input type="text" name="admin_name" value="<?php echo $admin->admin_name; ?>" id="input-username" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="input-email">Email address</label>
                      <input type="email" id="input-email" value="<?php echo $admin->admin_email; ?>" name="admin_email" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" name="ChangeProfile" class="btn text-white" value="" style="background-color: #fb6340;">Save Changes</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Change password section -->
        <div class="card bg-secondary shadow mt-4">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Change Password</h3>
              </div>
              <div class="col-4 text-right">
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Change password form -->
            <form method="post">
              <h6 class="heading-small text-muted mb-4">Change Password</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="input-old-password">Old Password</label>
                      <input type="password" name="old_password" id="input-old-password" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="input-new-password">New Password</label>
                      <input type="password" name="new_password" id="input-new-password" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="input-confirm-password">Confirm New Password</label>
                      <input type="password" name="confirm_password" id="input-confirm-password" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" name="changePassword" class="btn text-white" value="" style="background-color: #fb6340;">Change Password</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
    }
      ?>
      </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
</body>

</html>