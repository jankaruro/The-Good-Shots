<?php
session_start();
include('header.php'); ?>

<!--Add User-->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="addUserDataLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addUser DataLabel">Adding New Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>



      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label for="supplier"><b>Supplier</b></label>
            <select class="form-control" id="supplier" name="supplier" required onchange="loadOptions('supplier')">
              <option value="">-- Select Supplier --</option>
              <?php
              include('connection.php');
              $stmt = $conn->prepare("SELECT supplier_name FROM suppliers");
              $stmt->execute();
              $result = $stmt->fetchAll();

              if (count($result) > 0) {
                foreach ($result as $row) {
                  echo "<option value='" . $row['supplier_name'] . "'>" . $row['supplier_name'] . "</option>";
                }
              } else {
                echo "<option value=''>No suppliers found</option>";
              }
              $conn = null;
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="product"><b>Product</b></label>
            <select class="form-control" id="product" name="product" required>
              <option value="">-- Select Product --</option>
            </select>
          </div>

          <script>
            function loadOptions(type) {
              if (type === 'supplier') {
                var supplier = document.getElementById('supplier').value;

                if (supplier) {
                  var xhr = new XMLHttpRequest();
                  xhr.open('GET', 'get_products.php?supplier=' + encodeURIComponent(supplier), true);
                  xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                      document.getElementById('product').innerHTML = xhr.responseText;
                    }
                  };
                  xhr.send();
                } else {
                  document.getElementById('product').innerHTML = "<option value=''>-- Select Product --</option>";
                }
              }
            }
          </script>





          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Package Quantity</label>
            <input type="number" class="form-control fw-medium" name="package_quantity" placeholder="Enter quantity"
              step="0.01">
          </div>


          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Measurement per Pack</label>
            <input type="number" class="form-control fw-medium" name="measurement_per_package"
              placeholder="Enter Measurement" step="0.01">
          </div>


          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Total Measurement</label>
            <input type="number" class="form-control fw-medium" name="total_measurement" placeholder="Enter Total"
              step="0.01">
          </div>



          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Unit</label>
            <select class="form-control fw-medium" id="unit" name="unit">
              <option value="milliliter">milliliter </option>
              <option value="grams">grams</option>
            </select>
          </div>



          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Expiration Date</label>
            <input type="date" class="form-control fw-medium" name="Expiry_Date" placeholder="Enter Expiry Date">
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
          <label for="supplier"><b>Supplier</b></label>
          <select class="form-control" id="supplier" name="supplier" required>
            <option value="">-- Select Supplier --</option>
            <?php
            // Connect to the database
            include('connection.php');

            // Retrieve suppliers from the database
            $stmt = $conn->prepare("SELECT supplier_name FROM suppliers");
            $stmt->execute();
            $result = $stmt->fetchAll();

            // Check if there are any suppliers
            if (count($result) > 0) {
              // Output the suppliers
              foreach ($result as $row) {
                echo "<option value='" . $row['supplier_name'] . "'>" . $row['supplier_name'] . "</option>";
              }
            } else {
              echo "<option value=''>No suppliers found</option>";
            }

            // Close the database connection
            $conn = null;
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="product"><b>Product</b></label>
          <select class="form-control" id="product" name="product" required>
            <option value="">-- Select Product --</option>
            <!-- Products will be loaded here dynamically -->
          </select>
        </div>

        <div class="form-group">
          <label for="product"><b>Category</b></label>
          <select class="form-control" id="category" name="category" required>
            <option value="">-- Select Product --</option>
            <!-- Products will be loaded here dynamically -->
          </select>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          $(document).ready(function () {
            $('#supplier').change(function () {
              var supplier = $(this).val();
              if (supplier) {
                $.ajax({
                  url: 'get_products.php',
                  type: 'POST',
                  data: { supplier: supplier },
                  success: function (data) {
                    $('#product').html(data);
                  }
                });
              } else {
                $('#product').html('<option value="">-- Select Product --</option>');

              }
            });

            $('#product').change(function () {
              var productId = $(this).val();
              if (productId) {
                $.ajax({
                  url: 'get_products.php',
                  type: 'POST',
                  data: { product_id: productId },
                  success: function (data) {
                    $('#category').html(data);
                  }
                });
              } else {
                $('#category').html('<option value="">-- Select Category --</option>');
              }
            });
          });
        </script>
        <div class="form-group">
          <label class="fs-5 mt-1 fw-bolder">Package Quantity</label>
          <input type="email" class="form-control fw-medium" name="package_quantity" placeholder="Enter Email">
        </div>


        <div class="form-group">
          <label class="fs-5 mt-1 fw-bolder">Measurement per Pack</label>
          <input type="password" class="form-control fw-medium" name="measurement_per_package"
            placeholder="Enter Password">
        </div>
        <div class="form-group">
          <label class="fs-5 mt-1 fw-bolder">Total Measurement</label>
          <input type="number" class="form-control fw-medium" name="total_measurement" placeholder="Enter Price"
            step="0.01">
        </div>

        <div class="form-group">
          <label class="fs-5 mt-1 fw-bolder">Unit</label>
          <select class="form-control fw-medium" id="unit" name="unit">
            <option value="milliliter">milliliter </option>
            <option value="grams">grams</option>
          </select>
        </div>

        <div class="form-group">
          <label class="fs-5 mt-1 fw-bolder">Expiration Date</label>
          <input type="date" class="form-control fw-medium" name="Expiry_Date" placeholder="Enter Expiry Date">
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
      <button type="submit" name="add_inventory" class="btn btn-primary fw-medium">Add User</button>
    </div>
    </form>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
    <button type="submit" name="update_data" class="btn btn-primary fw-medium">Update Item</button>
  </div>
  </form>
</div>
</div>
</div>
<!---->
<div class="d-flex content">
  <div id="sidebar" class="sidebar-color">
    <div class="sidebar-heading">
      <img src="Images/Logo.jpg" alt="Bootstrap" class="logo">The Good Shots
    </div>
    <div class="list-group list-group-flush mt-0">
      <a href="dashboard.php" class="list-group-item ">
        <i class="fas fa-tachometer-alt me-3"></i>Dashboard
      </a>
      <a href="adduser.php" class="list-group-item">
        <i class="fas fa-project-diagram me-3"></i>User Management
      </a>
      <div class="product-dropdown">
        <a href="#" class="list-group-item" id="product-toggle">
          <i class="fa-brands fa-product-hunt me-3"></i></i>Product Management<i
            class="fa-solid fa-chevron-right toggle-arrow-product" id="product-arrow"></i>
        </a>
        <div class="submenu" id="product-submenu">
          <a href="addproduct.php" class="sub-list-item">
            <p class="txt-name-btn">Add Product</p>
          </a>
          <a href="addcategory.php" class="sub-list-item">
            <p class="txt-name-btn">Add Category</p>
          </a>
        </div>
      </div>
      <a href="inventoryManage.php" class="list-group-item active">
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
      <a href="purchase_order.php" class="list-group-item">
        <i class="fa-solid fa-truck me-3"></i>Delivery
      </a>
      <div class="reports-dropdown">
        <a href="#" class="list-group-item" id="reports-toggle">
          <i class="fa-solid fa-calendar-days me-3"></i></i>Reports<i
            class="fa-solid fa-chevron-right toggle-arrow-reports" id="reports-arrow"></i>
        </a>
        <div class="submenu" id="reports-submenu">
          <a href="" class="sub-list-item">
            <p class="txt-name-btn">Weekly</p>
          </a>
          <a href="" class="sub-list-item">
            <p class="txt-name-btn">Monthly</p>
          </a>
          <a href="" class="sub-list-item">
            <p class="txt-name-btn">Yearly</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
      <div class="d-flex align-items-center">
        <h2 class="fs-3 m-1">Inventory Management</h2>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
          <a class="nav-link fw-bold cashier-link" href="order.php"
            style="color: black; font-weight: 200; font-size: 17px;">
            <i class="fa-solid fa-cash-register me-2"></i>
            Food & Orders
          </a>
          <a class="nav-link fw-bold notification-link" href="#"
            style="color: black; font-weight: 200; font-size: 17px;">
            <i class="fa-solid fa-bell me-2"></i>
            Notification
          </a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold admin-link" href="#"
              style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-circle-user me-2" style = "font-size: 25px"></i>
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


    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-20">

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
          <div class="card">
            <div class="card-header">
              <h3 class="text-center">Inventory Management</h3>
              <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New User
              </button>

            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Product</th>
                    <th scope="col">Package Quantity</th>
                    <th scope="col">Measurement Per Package</th>
                    <th scope="col">Total_measurement</th>
                    <th scope="col">Category</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                  $fetch_query = "SELECT * FROM inventory ";
                  $fetch_query_run = mysqli_query($connection, $fetch_query);

                  if (mysqli_num_rows($fetch_query_run) > 0) {
                    while ($row = mysqli_fetch_array($fetch_query_run)) {

                      ?>
                      <tr>
                        <td class="inventory_id"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['supplier']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['package_quantity']; ?></td>
                        <td><?php echo $row['measurement_per_package']; ?></td>
                        <td><?php echo $row['total_measurement']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['unit']; ?></td>
                        <td><?php echo $row['Expiry_Date']; ?></td>
                        <td>
                          <a href="#" class="btn btn-info btn-base view_inventory">View Data</a>
                          <a href="#" class="btn btn-success btn-base edit_inventory">Edit Data</a>
                          <a href="" class="btn btn-danger btn-base delete_inventory">Delete Data</a>
                        </td>
                      </tr>
                      <?php

                    }
                  } else {
                    ?>
                    <tr colspan="5"> No Record Found </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php include('footer.php'); ?>
    <?php include('function/viewdata.js'); ?>
    <?php include('function/editdata.js'); ?>
    <?php include('function/remove.js'); ?>