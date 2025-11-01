<?php
$admin_id = $_SESSION['admin_id'];
//$login_id = $_SESSION['login_id'];
$ret = "SELECT * FROM  rpos_admin  WHERE admin_id = '$admin_id'";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
while ($admin = $res->fetch_object()) {

?>
   <script
      defer
      src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
      integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp"
      crossorigin="anonymous"
    ></script>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidenav-main" style="background-color: #272829;">
    <div class="container-fluid" >
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <!-- <a class="navbar-brand pt-0" href="dashboard.php">
      </a> -->
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="assets/img/theme/userpic.png">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="change_profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.php">
                <img src="assets/img/brand/repos.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <h2 style="color: #fb6340; font-weight:bold;">Tech Savy</h2>
      <h3 style="color: #A8A196;">Point of Sale System</h3>
        <!-- Navigation -->
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link text-white" href="dashboard.php">
              <i class="fa-solid fa-house" style= "color: #ffffff;"></i>&nbsp Dashboard
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link text-white"  href="hrm.php">
              <i class="fas fa-user-tie " style= "color: #ffffff;"></i>&nbsp Staff
            </a>
          </li> --> 
           <li class="nav-item">
            <a class="nav-link text-white" href="customes.php">
              <i class="fas fa-users " style= "color: #ffffff;"></i>&nbsp Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="products.php">
             <i class="fa-solid fa-rectangle-list" style= "color: #ffffff;"></i>&nbsp Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="orders.php">
              <i class="fa-solid fa-cart-arrow-down" style= "color: #ffffff;"></i>&nbsp Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="payments.php">
              <i class="fa-solid fa-credit-card"style= "color: #ffffff;"></i>&nbsp Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="receipts.php">
            <i class="fa-solid fa-receipt" style= "color: #ffffff;"></i>&nbsp Receipts
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reports</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link text-white" href="orders_reports.php">
              <i class="fas fa-shopping-basket" style= "color: #ffffff;"></i>&nbsp Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="payments_reports.php">
            <i class="fa-solid fa-cash-register"style= "color: #ffffff;"></i>&nbsp Payments
            </a>
          </li>
        </ul>
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link text-white" href="logout.php">
            <i class="fa-solid fa-right-from-bracket"style= "color: #ffffff;"></i>&nbsp Log Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php } ?>