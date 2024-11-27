<?php
session_start();
include('header.php'); ?>



<!-- Add User Modal -->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="addUserDataLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable custom-modal">
    <div class="modal-content custom-modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addUserDataLabel">Creating Purchase Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="code.php" method="POST" id="purchaseForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="supplier"><b>Supplier</b></label>
            <select class="form-control" id="supplier" name="supplier" required onchange="loadProducts()">
              <option value="">-- Select Supplier --</option>
              <?php
              include('connection.php');
              try {
                $stmt = $conn->prepare("SELECT supplier_name FROM suppliers");
                $stmt->execute();
                $suppliers = $stmt->fetchAll();

                if ($suppliers) {
                  foreach ($suppliers as $supplier) {
                    echo "<option value='" . htmlspecialchars($supplier['supplier_name']) . "'>" . htmlspecialchars($supplier['supplier_name']) . "</option>";
                  }
                } else {
                  echo "<option value=''>No suppliers found</option>";
                }
              } catch (PDOException $e) {
                echo "<option value=''>Error fetching suppliers</option>";
              }
              $conn = null;
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="product"><b>Product</b></label>
            <select class="form-control" id="product" name="product" required>
              <option value="">-- Select Product --</option>
              <!-- Product options will be loaded dynamically based on supplier -->
            </select>
            <div id="loadingIndicator" style="display:none;">Loading products...</div>
          </div>

          <div class="form-group">
            <label for="quantity"><b>Quantity</b></label>
            <input type="number" class="form-control" id="quantity" name="quantity" >
          </div>

          <button type="button" class="btn btn-primary" id="add_prod">Add Product</button>

          <!-- Product Table -->
          <table id="display" class="table table-striped mt-3">
            <thead>
              <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Rows for added products will go here -->
            </tbody>
          </table>

          <!-- Total Table -->
          <table id="total" class="table">
            <tr>
              <td colspan="3" class="text-end">Total:</td>
              <td colspan="2" id="total_price">0.00</td>
            </tr>
          </table>

          <!-- Buttons for Cancel and Continue -->
          <div class="d-flex justify-content-between" id="btn-cancel-continue">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="resetModal()">Cancel</button>
            <button type="submit" name="continue" id="continue" class="btn btn-primary">Add PO</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm Purchase Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="code.php" method="POST" id="confirmationForm"> <!-- This form tag should be closed here -->
        <div class="modal-body">
          <p>Are you sure you want to add this purchase order?</p>
          <p><strong>Total Amount: </strong><span id="confirmationTotalAmount">0.00</span></p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" name="" id="confirmPurchaseOrderBtn">Confirm</button>
        </div>
      </form> <!-- Close the form here -->
    </div>
  </div>
</div>



<script>
let products = []; // To store added products

document.getElementById('add_prod').addEventListener('click', function () {
    const tableBody = document.querySelector('#display tbody');
    const row = document.createElement('tr');
    
    // Get selected product details from the dropdown and input fields
    const productSelect = document.getElementById('product');  // The select element for product
    const selectedProduct = productSelect.options[productSelect.selectedIndex];
    const productName = selectedProduct.text;  // Product name from the select options
    const unitPrice = parseFloat(selectedProduct.getAttribute('data-price')) || 0;  // Get the unit price (use data attribute)
    const quantity = parseInt(document.getElementById('quantity').value) || 1;  // Quantity entered by the user
    
    // Ensure valid inputs before adding
    if (!productName || quantity <= 0) {
        alert("Please select a product and enter a valid quantity.");
        return;
    }

    // Calculate total price for this product
    const totalAmount = unitPrice * quantity;

    // Add the row with input fields for product name, unit price, quantity, total amount, and remove button
   

    // Clear the input fields after adding

});

// Function to remove a product from the table and the products array
function removeProduct(button) {
    const row = button.closest('tr');
    row.remove();  // Simply remove the row from the table
    updateTotalPrice();  // Recalculate the total after removal
}

// Function to update the total price of all products in the table
function updateTotalPrice() {
    const rows = document.querySelectorAll('#display tbody tr');
    let total = 0;

    rows.forEach(row => {
        const totalAmount = parseFloat(row.querySelector('.product-total').textContent) || 0;
        total += totalAmount;
    });

    // Update the total price displayed at the bottom
    document.getElementById('total_price').textContent = total.toFixed(2);
}


// Event listener to track changes in the table (inputs for unit price and quantity)
document.querySelector('#display tbody').addEventListener('input', function (event) {
    if (event.target.matches('input[name="unit_price"], input[name="quantity"]')) {
        const row = event.target.closest('tr');
        updateProductTotal(row);
    }
});

// Event listener for submitting the form
document.getElementById('purchaseForm').addEventListener('submit', function (event) {
    event.preventDefault(); 

    const supplier = document.getElementById('supplier').value;
    if (products.length === 0) {
        alert("Please add at least one product.");
        return;
    }

    const data = {
        products: products,
        total_amount: parseFloat(document.getElementById('total_price').textContent),
        supplier: supplier
    };

    fetch('code.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(responseData => {
        if (responseData.success) {
            alert("Purchase Order added successfully!");
            products = [];
            document.querySelector('#display tbody').innerHTML = '';
            document.getElementById('total_price').textContent = '0.00';
        } else {
            alert("Error: " + responseData.message);
        }
    })
    .catch(error => {
        alert("Error: " + error.message);
    });
});

// Load products based on supplier
function loadProducts() {
    const supplier = document.getElementById("supplier").value;
    document.getElementById("loadingIndicator").style.display = "block";
    
    fetch("fetch_products.php?supplier=" + supplier)
        .then(response => response.text())
        .then(data => {
            setTimeout(() => {
                document.getElementById("loadingIndicator").style.display = "none";
                document.getElementById("product").innerHTML = data;
            }, 1000);
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            document.getElementById("loadingIndicator").style.display = "none";
        });
}

// Attach loadProducts to supplier change event
document.getElementById("supplier").addEventListener("change", loadProducts);

</script>








<?php
include('connection.php');
if (isset($_GET['supplier'])) {
  $supplier = $_GET['supplier'];
  try {
    // Fetch products based on the supplier
    $stmt = $conn->prepare("SELECT id, product_name, price FROM supplier_products WHERE supplier = ?");
    $stmt->execute([$supplier]);
    $products = $stmt->fetchAll();

    if ($products) {
      foreach ($products as $product) {
        echo "<option value='" . htmlspecialchars($product['id']) . "' data-price='" . htmlspecialchars($product['price']) . "'>" . htmlspecialchars($product['product_name']) . "</option>";
      }
    } else {
      echo "<option value=''>No products found</option>";
    }
  } catch (PDOException $e) {
    echo "<option value=''>Error fetching products</option>";
  }
}
?>



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
      <a href="purchase_order.php" class="list-group-item active">
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
        <h2 class="fs-3 m-1">Purchase Order</h2>
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
              <i class="fa-regular fa-circle-user me-2" style="font-size: 25px"></i>
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
              <h3 class="text-center">Purchase Order</h3>
              <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New User
              </button>

            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">PO ID</th>
                    <th scope="col">Quantity Ordered</th>
                    <th scope="col">Quantity Received</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ordered By</th>
                    <th scope="col">PO Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($purchase_orders)): ?>
                    <?php foreach ($purchase_orders as $order): ?>
                      <tr>
                        <td><?php echo htmlspecialchars($order['po_id']); ?></td>
                        <td><?php echo htmlspecialchars($order['quantity_ordered']); ?></td>
                        <td><?php echo htmlspecialchars($order['quantity_received']); ?></td>
                        <td><?php echo htmlspecialchars($order['supplier_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_by']); ?></td>
                        <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($order['po_date']))); ?></td>
                        <td>
                          <!-- You can add action buttons here, e.g., Edit/Delete -->
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="8">No purchase orders found.</td>
                    </tr>
                  <?php endif; ?>
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