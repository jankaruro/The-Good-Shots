<?php
session_start();
include('header.php'); ?>


  <!--Add User-->
  <div class="modal fade" id="addUserData" tabindex="-1" aria-labelledby="insertdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertdataLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registration-form" method="POST" action="code.php" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for=""><b>Product Name</b></label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for=""><b>Image</b></label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" onchange="previewImage(event)"> <br><br>
                        <div id="imagePreviewContainer">
                            <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; display: none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Price</label>
                        <input type="number" class="form-control fw-medium" id="price" name="price" placeholder="Enter price" step="0.01" required>
                    </div>
                    <div ```php
                    <div class="form-group mb-3">
                        <label for=""><b>Category</b></label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">-- Select Category --</option>
                            <?php
                            include('connection.php');
                            $stmt = $conn->prepare("SELECT name FROM category");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            if (count($result) > 0) {
                                foreach ($result as $row) {
                                    echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                                }
                            } else {
                                echo "<option value=''>No categories found</option>";
                            }
                            $conn = null;
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_product" class="btn btn-primary fw-medium">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
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

            <div class="form-group">
              <input type="text" class="form-control fw-medium" id="id" name="id">
            </div>


            <div class="form-group">
                        <label for="id" class="form-label">Product ID</label>
                        <input type="text" class="form-control fw-medium" id="id" name="id" readonly>
                    </div>

                    <div class="form-group">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control fw-medium" id="product_name" name="product_name" required>
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control fw-medium" id="price" name="price" required>
                    </div>

                    <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control fw-medium" id="category" name="category" required>
                    </div>

                    <div class="form-group">
                        <label for="currentImage" class="form-label">Current Image</label>
                        <div id="currentImageContainer">
                            <img id="currentImage" src="" alt="Current Product Image" style="max-width: 100%; height: auto;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Upload New Image (optional)</label>
                        <input type="file" class="form-control fw-medium" id="image" name="image" accept="image/*">
                    </div>



            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_product" class="btn btn-primary fw-medium">Update Item</button>
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
        <a href="dashboard.php" class="list-group-item">
          <i class="fas fa-tachometer-alt me-3"></i>Dashboard
        </a>
        <a href="adduser.php" class="list-group-item active">
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
          <h2 class="fs-3 m-1">User Management</h2>
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
                <i class="fa-regular fa-circle me-2"></i>
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
          <div class="card">
            <div class="card-header">
              <h3 class="text-center">Product Management</h3>
              <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New User
              </button>

            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                  $fetch_query = "SELECT * FROM products ";
                  $fetch_query_run = mysqli_query($connection, $fetch_query);

                  if (mysqli_num_rows($fetch_query_run) > 0) {
                    while ($row = mysqli_fetch_array($fetch_query_run)) {

                      ?>
                      <tr>
                        <td class="product_id"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
                        </td>
                        <td>
                          <a href="#" class="btn btn-info btn-base view_product">View Data</a>
                          <a href="#" class="btn btn-success btn-base edit_product">Edit Data</a>
                          <a href="" class="btn btn-danger btn-base delete_product">Delete Data</a>
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