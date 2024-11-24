<?php
session_start();
include('header.php'); ?>
<!--Add User-->
<div class="modal fade" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
<!------>

<!--Add User-->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="addUser DataLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable custom-modal">
    <div class="modal-content custom-modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="addUser DataLabel">Creating Purchase Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
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
              <!-- Add product options here -->
            </select>
            <div id="loadingIndicator" style="display:none;">Loading products...</div>
          </div>


          <div class="form-group">
            <label for="quantity"><b>Quantity</b></label>
            <input type="number" class="form-control" id="quantity" name="quantity" required min="1">
          </div>

          <button type="button" class="btn btn-primary" id="confirm_btn" onclick="addProduct()">Add Product</button>

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
              <!-- Rows for added products go here -->
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
            <button type="button" id="continue-btn" class="btn btn-primary" onclick="showPopup()">Continue</button>

          </div>

          <!-- Popup Confirmation Form -->
          <div class="form-group mt-3" id="popupForm" style="display:none;">
            <div class="form-container border p-3 rounded">
              <span class="close" id="closeForm" onclick="hidePopup()">&times;</span>
              <h2>Confirm Purchase?</h2>
              <label for="totalAmount">Total Amount:</label>
              <input type="text" class="form-control mb-3" id="totalPriceInput" readonly>
              <button type="button" class="btn btn-primary" id="confirmPurchase">Confirm</button>
              <button type="button" class="btn btn-secondary" id="popupCancel" onclick="hidePopup()">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .custom-modal {
    max-width: 1000px;
    /* Adjust the width as needed */
    width: 100%;
    /* Ensure it takes the full width of the max-width */
  }
</style>

<script>
  let totalAmount = 0; // Initialize totalAmount outside the function

  function addProduct() {
    const supplierSelect = document.getElementById("supplier");
    const productSelect = document.getElementById("product");
    const quantityInput = document.getElementById("quantity");

    // Check if a supplier and a product are selected
    if (supplierSelect.value === "" || productSelect.value === "") {
      alert("Please select both a supplier and a product before adding.");
      return; // Stop the function if supplier or product is not selected
    }

    const selectedProduct = productSelect.options[productSelect.selectedIndex];
    const productName = selectedProduct.text;
    const unitPrice = parseFloat(selectedProduct.getAttribute("data-price")); // Assuming you set data-price attribute in options
    const quantity = parseInt(quantityInput.value);
    const amount = unitPrice * quantity;

    // Check if quantity is valid
    if (productName && quantity > 0) {
      const tableBody = document.querySelector("#display tbody");
      const existingRow = Array.from(tableBody.rows).find(row => row.cells[0].innerText === productName);

      if (existingRow) {
        const existingQuantity = parseInt(existingRow.cells[2].innerText);
        const newQuantity = existingQuantity + quantity;
        const newAmount = unitPrice * newQuantity;

        existingRow.cells[2].innerText = newQuantity;
        existingRow.cells[3].innerText = newAmount.toFixed(2);
      } else {
        const newRow = tableBody.insertRow();
        newRow.innerHTML = `
              <td>${productName}</td>
              <td>${unitPrice.toFixed(2)}</td>
              <td>${quantity}</td>
              <td>${amount.toFixed(2)}</td>
              <td><button type="button" class="btn btn-danger" onclick="removeProduct(this)">Remove</button></td>
            `;
      }

      totalAmount += amount;
      document.getElementById("total_price").innerText = totalAmount.toFixed(2);

      // Disable supplier selection after the first product is added
      if (tableBody.rows.length === 1) {
        supplierSelect.disabled = true;
      }

      // Clear quantity input and reset product selection
      quantityInput.value = '';
      productSelect.selectedIndex = 0;
    } else {
      alert("Please enter a valid quantity.");
    }
  }

  function resetModal() {
    // Reset supplier selection
    const supplierSelect = document.getElementById("supplier");
    supplierSelect.selectedIndex = 0;  // Reset supplier selection
    supplierSelect.disabled = false;  // Re-enable supplier dropdown if disabled

    // Clear and reset the product dropdown
    const productSelect = document.getElementById("product");
    productSelect.innerHTML = '<option value="">-- Select Product --</option>';  // Clear options

    // Clear quantity input
    const quantityInput = document.getElementById("quantity");
    quantityInput.value = '';  // Clear quantity input

    // Reset total price display
    const totalPriceDisplay = document.getElementById("total_price");
    totalPriceDisplay.innerText = '0.00';  // Reset total price display

    // Clear the product table
    const tableBody = document.querySelector("#display tbody");
    while (tableBody.rows.length > 0) {
      tableBody.deleteRow(0);  // Remove all rows
    }

    // Reset totalAmount variable
    totalAmount = 0;  // Reset total amount variable

    // Hide popup form if it's open
    hidePopup();  // Hide the popup if it was open
  }



  function removeProduct(button) {
    const row = button.parentNode.parentNode;
    const amount = parseFloat(row.cells[3].innerText);
    totalAmount -= amount;
    document.getElementById("total_price").innerText = totalAmount.toFixed(2);
    row.remove();
  }

  function hidePopup() {
    document.getElementById('popupForm').style.display = 'none';
  }

  function showPopup() {
    document.getElementById('totalPriceInput').value = totalAmount.toFixed(2);
    document.getElementById('popupForm').style.display = 'block';
  }

  function loadProducts() {
    const supplier = document.getElementById("supplier").value;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_products.php?supplier=" + supplier, true);
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("product").innerHTML = this.responseText;
      }
    };
    xhr.send();
  }
  function loadProducts() {
    const supplier = document.getElementById("supplier").value;

    // Show loading indicator immediately
    document.getElementById("loadingIndicator").style.display = "block";

    fetch("fetch_products.php?supplier=" + supplier)
      .then(response => response.text())
      .then(data => {
        // Wait for 3 seconds before hiding the loading indicator and showing the products
        setTimeout(() => {
          document.getElementById("loadingIndicator").style.display = "none"; // Hide the loading indicator
          document.getElementById("product").innerHTML = data; // Load products into dropdown
        }, 3000); // 3000ms = 3 seconds
      })
      .catch(error => {
        console.error('Error fetching products:', error);
        document.getElementById("loadingIndicator").style.display = "none"; // Hide loading indicator on error
      });
  }


</script>

<?php
include('connection.php');

if (isset($_GET['supplier'])) {
  $supplier = $_GET['supplier'];
  try {
    $stmt = $conn->prepare("SELECT product_name, price FROM suppliers_products WHERE supplier = ?");
    $stmt->execute([$supplier]);
    $products = $stmt->fetchAll();

    foreach ($products as $row) {
      echo "<option value='" . htmlspecialchars($row['product_name']) . "' data-price='" . htmlspecialchars($row['price']) . "'>" . htmlspecialchars($row['product_name']) . "</option>";
    }
  } catch (PDOException $e) {
    echo "<option value=''>Error fetching products</option>";
  }
}
$conn = null;
?>


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
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>


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