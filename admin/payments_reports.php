<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>
<style>
  .search-input {
    background: #ffffff;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 7px 7px 0 0;
    position: relative;
    left: 800px;
    &.active {
      border-bottom: 2px solid $purple;
   }
    input {
      font-size: 18px;
      border: none;
      outline: none;
      padding: 5px;
      width: 400px;
    }
    i {
      color: $purple;
      font-size: 25px;
    }
  }
     /* Responsive styles */
 @media (max-width: 768px) {
      .search-input {
        left: auto;
        right: 10px;
      }

   
    }
  </style>
<body>
<script
      defer
      src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
      integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp"
      crossorigin="anonymous"
    >
>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script></script>
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <?php
        require_once('partials/_topnav.php');
        ?>
        <!-- Header -->
        <div style="background-image: url(assets/img/theme/bg1.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
      <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                       <strong> <div class="card-header border-0" style="font-size: 20px; position: relative; top: 40px;">
                            Payment Reports
                        </div></strong>
                        <div class="table-responsive">
                        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Search...">
            <i class="fa-solid fa-magnifying-glass" style="position: relative; top: -35px; left: 980px; color: #fb6340;"></i></div>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Payment Code</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Order Code</th>
                                        <th scope="col">Amount Paid</th>
                                        <th scope="col">Date Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM  rpos_payments ORDER BY `created_at` DESC ";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($payment = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <th style="color:#fb6340;" scope="row">
                                                <?php echo $payment->pay_code; ?>
                                            </th>
                                            <th scope="row">
                                                <?php echo $payment->pay_method; ?>
                                            </th>
                                            <td >
                                                <?php echo $payment->order_code; ?>
                                            </td>
                                            <td>
                                                $ <?php echo $payment->pay_amt; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d/M/Y g:i', strtotime($payment->created_at)) ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('.table tbody tr');

    searchInput.addEventListener('input', function() {
      const searchTerm = searchInput.value.toLowerCase();

      tableRows.forEach(row => {
        const rowData = row.textContent.toLowerCase();
        if (rowData.includes(searchTerm)) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
</script>
</html>