<?php
session_start();
<<<<<<< HEAD
include('headers.php');
include('connection.php'); // Ensure connection is included at the beginning

// Fetch suppliers for the dropdown


=======
include('connection.php');
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1024, initial-scale=1.0" />

<<<<<<< HEAD
<!-- Add User Modal -->
=======
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

    <script src = "https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script src = "js/datatable.js"></script>
    <script src="function/po_database.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>The Good Shots</title>
</head>
<body>
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722


<<<<<<< HEAD
=======
        <div class="form-group">
          <label for="supplier"><b>Supplier</b></label>
          <select class="form-control" id="supplier" name="supplier" required onchange="loadProducts()">
            <option value="">-- Select Supplier --</option>
            <?php
        
            $suppliers = $conn->query("SELECT supplier_name FROM suppliers")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($suppliers as $row) {
              echo '<option value="' . htmlspecialchars($row['supplier_name']) . '">' . htmlspecialchars($row['supplier_name']) . '</option>';
            }
            ?>
          </select>
        </div>
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722

  <!--Add User-->
    <div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="addUserDataLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-2" id="addUser DataLabel">Adding New User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>


          <form action="code.php" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label class="fs-5 mt-1 fw-bolder">First Name</label>
                <input type="text" class="form-control fw-medium" name="first_name" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label class="fs-5 mt-1 fw-bolder">Last Name</label>
                <input type="text" class="form-control fw-medium" name="last_name" placeholder="Enter Last Name">
              </div>
              <div class="form-group">
                <label class="fs-5 mt-1 fw-bolder">Email</label>
                <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label class="fs-5 mt-1 fw-bolder">Password</label>
                <input type="password" class="form-control fw-medium" name="password" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <label class="fs-5 mt-1 fw-bolder">Role</label>
                <select class="form-control fw-medium" id="role" name="role">
                  <option value="user">User </option>
                  <option value="admin">Admin</option>
                  <option value="superadmin">Super Admin</option>
                </select>
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="save_user" class="btn btn-primary fw-medium">Add User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <!---->
  <!--view-->
  <div class="modal fade" id="viewitemModal" tabindex="-1" aria-labelledby="viewitemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewitemModalLabel">View Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="view_item_data">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <!---->
  <!--edit-->
  <div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-2" id="editDataLabel">Edit Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">

<<<<<<< HEAD
            <div class="form-group">
              <input type="text" class="form-control fw-medium" id="id" name="id">
            </div>




            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">First Name</label>
              <input type="text" class="form-control fw-medium" name="firstname" placeholder="Enter First Name">
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Last Name</label>
              <input type="text" class="form-control fw-medium" name="lastname" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Email</label>
              <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Password</label>
              <input type="password" class="form-control fw-medium" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Role</label>
              <select class="form-control fw-medium" id="role" name="role">
                <option value="user">User </option>
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_data" class="btn btn-primary fw-medium">Update Item</button>
=======
<div id="popupForm" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Purchase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <label for="totalPriceInput">Total Amount:</label>
          <input type="text" class="form-control" id="totalPriceInput" readonly>
          <div class="mt-3">
            <button type="button" class="btn btn-primary" onclick="saveTransaction()">Confirm</button>
            <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Cancel</button>
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
          </div>
        </form>
      </div>
    </div>
  </div>
  <!---->

<<<<<<< HEAD
  <div class="d-flex content">
=======
<div class="d-flex content-purchase-order">
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
        <div id="sidebar" class="sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class="logo">The Good Shots
            </div>
            <div class="list-group list-group-flush mt-0">
                <a href="dashboard.php" class="list-group-item">
                    <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                </a>
<<<<<<< HEAD
                <a href="adduser.php" class="list-group-item active">
=======
                <a href="adduser.php" class="list-group-item">
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
                    <i class="fas fa-project-diagram me-3"></i>User Management
                </a>
                <div class="product-dropdown">
                    <a href="#" class="list-group-item" id="product-toggle">
                        <i class="fa-brands fa-product-hunt me-3"></i>Product Management
                    </a>
                </div>
                <a href="inventoryManage.php" class="list-group-item">
                    <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                </a>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                </a>
                <div class="supplier-dropdown">
                    <a href="#" class="list-group-item" id="supplier-toggle">
                        <i class="fa-solid fa-boxes-packing me-3"></i>Supplier<i
                            class="fa-solid fa-chevron-right toggle-arrow-supplier" id="supplier-arrow"></i>
                    </a>
                    <div class="submenu" id="supplier-submenu">
                        <a href="addsupplier.php" class="sub-list-item">
                            <p class="txt-name-btn">Add Supplier</p>
                        </a>
                        <a href="addsupplier_product.php" class="sub-list-item">
                            <p class="txt-name-btn">Suppliers Product</p>
                        </a>
                    </div>
                </div>
                <a href="delivery.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                </a>
                <div class="reports-dropdown">
                    <a href="#" class="list-group-item" id="reports-toggle">
                        <i class="fa-solid fa-calendar-days me-3"></i></i>Reports<i
                            class="fa-solid fa-chevron-right toggle-arrow-reports" id="reports-arrow"></i>
                    </a>
                    <div class="submenu" id="reports-submenu">
                        <a href="discrepancy.php" class="sub-list-item">
                            <p class="txt-name-btn">Discrepancy Report</p>
                        </a>
                        <a href="inventoryReport.php" class="sub-list-item">
                            <p class="txt-name-btn">Inventory Report</p>
                        </a>
                        <a href="salesReport.php" class="sub-list-item">
                            <p class="txt-name-btn">Sales Report</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
                <div class="d-flex align-items-center">
<<<<<<< HEAD
                    <h2 class="fs-3 m-1">Purchase order</h2>
                </div>
=======
                    <h2 class="fs-3 m-1">Purchase Order</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <a class="nav-link fw-bold cashier-link me-2" href="order.php"
                            style="color: black; font-weight: 200; font-size: 17px; border-radius: 20px; width: 120px; text-align: center;">
                            <i class="fa-solid fa-cash-register me-2"></i>
                            Orders
                        </a>
                        <a class="nav-link fw-bold notification-link me-3" href="#"
                            style="color: black; font-weight: 200; font-size: 17px; border-radius: 20px;">
                            <img src="icons/notifications-alert-svgrepo-com.svg" alt="" class="topnavbar-icons">
                            Notifications
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link " href="#"
                                style="color: black; font-weight: 200; font-size: 18px; border-radius: 20px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="icons/profile-round-1342-svgrepo-com.svg" alt="" class="user-icons">
                                Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
    <div class="container-responsive" style="margin-top: 40px; padding: 25px">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-20">
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <a class="nav-link fw-bold cashier-link me-3" href="order.php"
                            style="color: black; font-weight: 200; font-size: 17px; border-radius: 20px; width: 120px; text-align: center;">
                            <i class="fa-solid fa-cash-register me-2"></i>
                            Orders
                        </a>
                        <a class="nav-link fw-bold notification-link me-3" href="#"
                            style="color: black; font-weight: 200; font-size: 17px; border-radius: 20px;">
                            <img src="icons/notifications-alert-svgrepo-com.svg" alt="" class="topnavbar-icons">
                            Notifications
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link " href="#"
                                style="color: black; font-weight: 200; font-size: 18px; border-radius: 20px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="icons/profile-round-1342-svgrepo-com.svg" alt="" class="user-icons">
                                Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-responsive" style="margin-top: 60px; padding-left: 15px;">
        <div class="col-sm-12">

          <?php
          if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['status']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
              const alert = document.querySelector('.alert');
              setTimeout(() => {
                alert.style.display = 'none';
              }, 3000);
            </script>
            <?php
            unset($_SESSION['status']);
          }

          ?>
           <div class="card shadow" style="width: 95.5rem">
            <div class="card-header">
<<<<<<< HEAD
              <button type="button" class="btn btn-primary float-end fw-medium btn-add" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New User
=======
              <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                data-bs-target="#purchaseOrderModal">
                Add New Order
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
              </button>
            </div>
            <div class="card-body mt-1">
              <table id="example" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col" class = "tbl-action">Action</th>
                  </tr>
                </thead>
                  <tbody>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                  $fetch_query = "SELECT * FROM users";
                  $fetch_query_run = mysqli_query($connection, $fetch_query);

                  if (mysqli_num_rows($fetch_query_run) > 0) {
                    while ($row = mysqli_fetch_array($fetch_query_run)) {
                      ?>
                      <tr>
                        <td class="user_id"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td>
                          <a href="#" class="btn btn-info btn-base view_data">View Data</a>
                          <a href="#" class="btn btn-success btn-base edit_data">Edit Data</a>
                          <a href="" class="btn btn-danger btn-base delete_data">Delete Data</a>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    echo "<tr><td colspan='6'></td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
<<<<<<< HEAD

    <?php include('footer.php'); ?>
    <?php include('function/viewdata.js'); ?>
    <?php include('function/editdata.js'); ?>
    <?php include('function/remove.js'); ?>

   









    
=======
  </div>
</div>
  

<?php include('footer.php'); ?>
<?php include('function/viewdata.js'); ?>
<?php include('function/editdata.js'); ?>
<?php include('function/remove.js'); ?>
>>>>>>> 68b333eff3e524c1cfeb6252da4f79753b02b722
