<?php 
session_start();
include('inventory_management/header.php'); ?>

<!--Add-->
<div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addDataLabel">Insert Inventory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="code.php" method ="POST">
        <div class="modal-body">
        <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control fw-medium" id="itemID" name="id"> 
                </div>
                <div class="form-group mb-3">
    <label for=""><b>Supplier</b></label>
    <select class="form-control" id="supplier" name="supplier" required>
        <option value="">-- Select Supplier --</option>
        <?php
        // Connect to the database
        include('inventory_management/connection.php');

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

<div class="form-group mb-3">
    <label for=""><b>Product</b></label>
    <select class="form-control" id="product" name="product" required>
        <option value="">-- Select Product --</option>
    </select>
</div>

<!-- Include jQuery for AJAX functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // When the supplier is selected
        $('#supplier').change(function() {
            var supplier = $(this).val(); // Get the selected supplier

            // If a supplier is selected
            if(supplier) {
                $.ajax({
                    type: 'POST',
                    url: 'get_products.php', // The PHP file that will handle the AJAX request
                    data: { supplier: supplier },
                    success: function(response) {
                        // Populate the product dropdown with the response (product options)
                        $('#product').html(response);
                    }
                });
            } else {
                // If no supplier is selected, clear the product dropdown
                $('#product').html('<option value="">-- Select Product --</option>');
            }
        });
    });
</script>

                <div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Quantity Size</label>
                  <input type="number" class="form-control fw-medium" id="quantity" name="quantity" placeholder="Enter Quantity"> 
                </div>
                <div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Quantity Measure</label>
                  <input type="number" class="form-control fw-medium" id="quantity_measure" name="quantity_measure" placeholder="Enter Quantity Measure"> 
                </div>
                <div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Grams Per Item</label>
                  <input type="number" class="form-control fw-medium" id="grams" name="grams" placeholder="Enter Grams per Item"> 
                </div>
                <div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Expiry Date</label>
                  <input type="date" class="form-control fw-medium" id="expiry" name="expiryDate" placeholder="Enter Expiry Date"> 
                </div><div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Item Name</label>
                  <input type="text" class="form-control fw-medium" id="itemName" name="itemName" placeholder="Enter Item Name"> 
                </div>
                <div class="form-group">
                  <label class="fs-5 mt-1 fw-bolder">Item Name</label>
                  <input type="text" class="form-control fw-medium" id="itemName" name="itemName" placeholder="Enter Item Name"> 
                </div>

              </div>
              
      </div>
      <div class="modal-footer">
        <button e="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
        <button type="submit" name = "save_data" class="btn btn-primary fw-medium">Add Item</button>
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
        <div id="sidebar" class = "sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class = "logo">The Good Shots 
            </div>
                <div class="list-group list-group-flush mt-0">
                    <a href="dashboard.php" class="list-group-item">
                        <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                    </a>
                    <a href="adduser.php" class="list-group-item">
                        <i class="fas fa-project-diagram me-3"></i>User Management
                    </a>
                    <a href="addproduct.php" class="list-group-item">
                        <i class="fas fa-chart-line me-3"></i>Product Management
                    </a> 
                    <a href="inventoryManage.php" class="list-group-item active">
                        <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                    </a>
                    <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                    </a>
                    <a href="addsupplier.php" class="list-group-item">
                    <i class="fa-solid fa-boxes-packing me-3"></i>Supplier
                    </a>
                    <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                    </a>
                    <a href="#" class="list-group-item btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-flag me-3"></i>Reports 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Weekly</a></li>
                        <li><a class="dropdown-item" href="#">Monthly</a></li>
                        <li><a class="dropdown-item" href="#">Yearly</a></li>
                    </ul>
                </div>     
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-3 dashboard-nav">
                <div class="d-flex align-items-center">
                    <h2 class="fs-3 m-1">Inventory Management</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <a class="nav-link fw-bold fs-5 cashier-link" href="order.php" style="color: black;">
                            <i class="fa-solid fa-cash-register"></i>
                            Food & Orders
                        </a>
                        <a class="nav-link fw-bold fs-5 notification-link" href="#" style="color: black;">
                            <i class="fa-solid fa-bell"></i>
                            Notification
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold fs-5 admin-link" href="#" style="color: black;" id="navbarDropdown"
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
      <div class="card">
        <div class="card-header">
          <h3 class = "text-center">Inventory Management</h3>
          <button type="button" class="btn btn-info float-end fw-medium" data-bs-toggle="modal" data-bs-target="#addData">
          Add Inventory
          </button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">ID #</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">Quantity Package</th>
                      <th scope="col">Quantity Measure</th>
                      <th scope="col">Unit</th>
                      <th scope="col-lg-20">Expiry Date</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                      $fetch_query = "SELECT * FROM inventory ";
                      $fetch_query_run = mysqli_query($connection, $fetch_query);

                      if(mysqli_num_rows($fetch_query_run)> 0)
                      {
                        while($row = mysqli_fetch_array($fetch_query_run))
                        {
                          
                          ?>
                            <tr>
                              <td class="inventory_id"><?php echo $row ['ID']; ?></td>
                              <td><?php echo $row ['Item_Name']; ?></td>
                              <td><?php echo $row ['Quantity']; ?></td>
                              <td><?php echo $row ['grams_per_unit']; ?></td>
                              <td><?php echo $row ['Expiry_Date']; ?></td>
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


<?php include('inventory_management/footer.php'); ?>
<?php include('inventory_management/viewdata.js'); ?>
<?php include('inventory_management/editdata.js'); ?>
<?php include('inventory_management/remove.js'); ?>