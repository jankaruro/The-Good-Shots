<?php 
session_start();
include('supplier_products/header.php'); ?>

<!--Add-->
<div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addDataLabel">Insert Inventory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for=""><b>Supplier</b></label>
            <select class="form-control" id="supplier" name="supplier" required>
              <option value="">-- Select Supplier --</option>
              <?php
              include('inventory_management/connection.php'); // Ensure connection is included
              $stmt = $conn->prepare("SELECT supplier_name FROM suppliers");
              $stmt->execute();
              $result = $stmt->fetchAll();

              foreach ($result as $row) {
                  echo "<option value='" . htmlspecialchars($row['supplier_name'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['supplier_name'], ENT_QUOTES, 'UTF-8') . "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Product Name</label>
            <input type="text" class="form-control fw-medium" id="product_name" name="product_name" placeholder="Enter Product Name" required>
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Price</label>
            <input type="number" class="form-control fw-medium" id="price" name="price" placeholder="Enter Price" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="save_data" class="btn btn-primary fw-medium">Add Item</button>
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
<div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="editDataLabel">Edit Inventory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="code.php" method ="POST">
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control fw-medium" id = "itemID" name = "id"> 
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Item Name</label>
              <input type="text" class="form-control fw-medium" id = "itemName" name = "itemName" placeholder = "Enter Item Name"> 
            </div>
            <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Quantity </label>
              <input type="number" class="form-control fw-medium" id = "quantity" name = "quantity" placeholder = "Enter Quantity"> 
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Grams Per Item</label>
              <input type="number" class="form-control fw-medium" id = "grams" name = "grams" placeholder = "Enter Grams per item"> 
            </div>
            <div class="form-group">
              <label class="fs-5 mt-1 fw-bolder">Expiry Date</label>
              <input type="date" class="form-control fw-medium" id = "expiry" name = "expiryDate" placeholder = "Enter Expiry Date"> 
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
        <button type="submit" name = "update_data" class="btn btn-primary fw-medium">Update Item</button>
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
                <a href="adduser.php" class="list-group-item">
                    <i class="fas fa-project-diagram me-3"></i>User Management
                </a>
                <div class="product-dropdown">
                    <a href="#" class="list-group-item" id="product-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Product Management<i class="fa-solid fa-chevron-right toggle-arrow-product" id="product-arrow"></i>
                    </a>
                    <div class="submenu" id="product-submenu">
                        <a href="addproduct.php" class="sub-list-item"><p class = "txt-name-btn">Add Product</p></a>
                        <a href="addcategory.php" class="sub-list-item"><p class = "txt-name-btn">Add Category</p></a>
                    </div>
                </div>
                <a href="inventoryManage.php" class="list-group-item">
                    <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                </a>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                </a>
                <div class="supplier-dropdown">
                    <a href="#" class="list-group-item active" id="supplier-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Supplier<i class="fa-solid fa-chevron-right toggle-arrow" id="supplier-arrow"></i>
                    </a>
                    <div class="supplier-submenu" id="supplier-submenu">
                        <a href="addsupplier.php" class="sub-list-item"><p class = "txt-name-btn">Add Supplier</p></a>
                        <a href="addsupplier_product.php" class="sub-list-item active"><p class = "txt-name-btn">Suppliers Product</p></a>
                    </div>
                </div>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                </a>
                <div class="reports-dropdown">
                    <a href="#" class="list-group-item" id="reports-toggle">
                        <i class="fa-solid fa-money-bill me-3"></i>Reports<i class="fa-solid fa-chevron-right toggle-arrow" id="reports-arrow"></i>
                    </a>
                    <div class="submenu" id="reports-submenu">
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Weekly</p></a>
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Monthly</p></a>
                        <a href="" class="sub-list-item"><p class = "txt-name-btn">Yearly</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
                <div class="d-flex align-items-center">
                    <h2 class="fs-3 m-1">Add Supplier</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <a class="nav-link fw-bold fs-5 cashier-link" href="order.php" style="color: #343a40; font-weight: 500; font-size: 12px;">
                            <i class="fa-solid fa-cash-register"></i>
                            Food & Orders
                        </a>
                        <a class="nav-link fw-bold fs-5 notification-link" href="#" style="color: #343a40; font-weight: 500; font-size: 12px;">
                            <i class="fa-solid fa-bell"></i>
                            Notification
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold fs-5 admin-link" href="#" style="color: #343a40; font-weight: 500; font-size: 12px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-circle"></i>
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
<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-sm-12">

    <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] != '')
      {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php  echo $_SESSION['status'];?>
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
      <div class="card mt-5">
        <div class="card-header">
          <h3 class = "text-center">Suppliers Product </h3>
          <button type="button" class="btn btn-info float-end fw-medium" data-bs-toggle="modal" data-bs-target="#addData">
          Add Supp Prod
          </button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">ID #</th>
                      <th scope="col">Supplier</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Price</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                      $fetch_query = "SELECT * FROM supplier_products";
                      $fetch_query_run = mysqli_query($connection, $fetch_query);

                      if(mysqli_num_rows($fetch_query_run)> 0)
                      {
                        while($row = mysqli_fetch_array($fetch_query_run))
                        {
                          
                          ?>
                            <tr>
                              <td class="inventory_id"><?php echo $row ['ID']; ?></td>
                              <td><?php echo $row ['supplier']; ?></td>
                              <td><?php echo $row ['product_name']; ?></td>
                              <td><?php echo $row ['price']; ?></td>
                                  <td class = "btn-inventory">
                                    <a href="" class="btn btn-success btn-base edit_data">Edit Data</a>
                                    <a href="" class="btn btn-danger btn-base delete_data">Delete Data</a>
                                  </td>
                            </tr>
                          <?php

                        }
                      }
                      else{
                      ?>
                      <tr colspan = "5"> No Record Found </tr>
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

<?php include('supplier_products/footer.php'); ?>
<?php include('supplier_products/viewdata.js'); ?>
<?php include('supplier_products/editdata.js'); ?>
<?php include('supplier_products/remove.js'); ?>