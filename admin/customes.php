<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();

if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $adn = "DELETE FROM rpos_products WHERE prod_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('i', $id); 
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Deleted";
    header("refresh:1; url=products.php");
  } else {
    $err = "Try Again Later";
  }
}

require_once('partials/_head.php');

$ret = "SELECT * FROM rpos_products ";
$stmt = $mysqli->prepare($ret);
$stmt->execute();
$res = $stmt->get_result();
$items = [];
while ($prod = $res->fetch_object()) {
  $items[] = $prod;
}
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
  .pagination {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
  position: relative;
  left: 380px;
}

.pagination button {
  background-color: #ffffff;
  color: #333;
  border: 1px solid #ccc;
  padding: 5px 10px;
  cursor: pointer;
}

.pagination button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

#currentPage {
  margin: 0 15px;
  font-weight: bold;
}
 /* Responsive styles */
 @media (max-width: 768px) {
      .search-input {
        left: auto;
        right: 10px;
      }

      .pagination {
        left: auto;
        right: 10px;
      }
    }


  </style>
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
    ?>
    <!-- Header -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v6.1.1/js/all.js"
      integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp"
      crossorigin="anonymous"
    ></script>
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
            <div class="card-header border-0">
              <a href="add_customer.php" class="btn" style="border: 2px solid #fb6340; color:#fb6340; ">
              <i class="fa-solid fa-plus" style="color: #fb6340"></i>
                Add New Customer
              </a>
            </div>
            <div class="table-responsive">
            <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Search...">
            <i class="fa-solid fa-magnifying-glass" style="position: relative; top: -35px; left: 980px; color: #fb6340;"></i></div>

              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Full Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ret = "SELECT * FROM  rpos_customers  ORDER BY `rpos_customers`.`created_at` DESC ";
                  $stmt = $mysqli->prepare($ret);
                  $stmt->execute();
                  $res = $stmt->get_result();
                  while ($cust = $res->fetch_object()) {
                  ?>
                    <tr>
                      <td><?php echo $cust->customer_name; ?></td>
                      <td><?php echo $cust->customer_phoneno; ?></td>
                      <td><?php echo $cust->customer_email; ?></td>
                
                      <td>
                        <a href="update_customer.php?update=<?php echo $cust->customer_id; ?>">
                          <button class="btn btn-sm text-white"  style="background-color: #fb6340;">
                            <i class="fas fa-user-edit"></i>
                            Update
                          </button>
                        </a>
                        <a href="customes.php?delete=<?php echo $cust->customer_id; ?>">
                          <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                            Delete
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="pagination" id="item-list">
      <button id="prevPageBtn">&lt; Previous</button>
      <span id="currentPage">Page 1</span>
      <button id="nextPageBtn">Next &gt;</button>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  const itemList = document.querySelector('.table tbody');
  const prevPageBtn = document.getElementById('prevPageBtn');
  const nextPageBtn = document.getElementById('nextPageBtn');
  const currentPageElem = document.getElementById('currentPage');

  const itemsPerPage = 10;
  let currentPage = 1;
  let totalItems = <?php echo count($items); ?>;
  let totalPages = Math.ceil(totalItems / itemsPerPage);

  function updatePaginationButtons() {
    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === totalPages;
  }

  function updateItemList() {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

    for (let i = 0; i < totalItems; i++) {
      if (i >= startIndex && i < endIndex) {
        items[i].style.display = 'table-row';
      } else {
        items[i].style.display = 'none';
      }
    }

    currentPageElem.textContent = `Page ${currentPage}`;
    updatePaginationButtons();
  }

  prevPageBtn.addEventListener('click', function() {
    if (currentPage > 1) {
      currentPage--;
      updateItemList();
    }
  });

  nextPageBtn.addEventListener('click', function() {
    if (currentPage < totalPages) {
      currentPage++;
      updateItemList();
    }
  });

  // Initial setup
  const items = document.querySelectorAll('.table tbody tr');
  updateItemList();
});

</script>

</html>