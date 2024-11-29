<?php
session_start();
include('connection.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1024, initial-scale=1.0" />

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

<div class="modal fade" id="purchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="purchaseOrderLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="purchaseOrderLabel">Purchase Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Purchase Order Date and Time: <span id="transactionDate"><?php echo date("Y-m-d h:i:sa"); ?></span></p>
        <p>Purchase Order Number: <span id="transactionNumber"></span></p>
        <hr>

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

        <hr>
        <div class="form-group">
          <label for="product"><b>Product:</b></label>
          <select class="form-control" id="product_list" name="product" required>
            <option value="">-- Select Product --</option>
          </select>
        </div>

        <!-- Quantity Input -->
        <div class="form-group">
          <label for="product_qty"><b>Quantity:</b></label>
          <input type="number" id="product_qty" name="product_qty" class="form-control" min="1">
          <button id="btn_add" class="btn btn-primary mt-2" onclick="addProduct()">Add Product</button>
        </div>

        <!-- Product Table -->
        <table id="display" class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Product</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

        <!-- Total Price -->
        <div class="d-flex justify-content-between">
          <strong>Total:</strong>
          <span id="total_price">0.00</span>
        </div>
      </div>

      <!-- Footer Buttons -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="showPopupForm()">Continue</button>
      </div>
    </div>
  </div>
</div>

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
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="d-flex content-purchase-order">
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

          <?php if (isset($_SESSION['status']) && $_SESSION['status'] != ''): ?>
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
            <?php unset($_SESSION['status']); ?>
          <?php endif; ?>

          
          <div class="card">


            <div class="card-header">
              <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                data-bs-target="#purchaseOrderModal">
                Add New Order
              </button>
            </div>
            <table id="myTable" class="table table-striped table-bordered table-secondary">
              <thead>
                <tr>
                  <th scope="col">PO ID</th>
                  <th scope="col">Quantity Ordered</th>
                  <th scope="col">Quantity Received</th>
                  <th scope="col">Supplier</th>
                  <th scope="col">Status</th>
                
                  <th scope="col">PO Date</th>
                  <th scope="col" class = "tbl-action">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
session_start(); // Start the session to manage session variables
include('connection.php'); // Include your database connection file

try {
    // Ensure the connection to the database is established
    if (!$conn) {
        throw new Exception("Database connection failed.");
    }

    // SQL query to select fields from both tables
    $query = "SELECT purchase_orders.*, purchase_order_details.*
              FROM purchase_orders
              LEFT JOIN purchase_order_details ON purchase_orders.id = purchase_order_details.po_id";
    $stmt = $conn->prepare($query);
    
    // Execute the query and check for errors
    if (!$stmt->execute()) {
        throw new Exception("Query execution failed: " . implode(", ", $stmt->errorInfo()));
    }

    // Fetch all results
    $purchase_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging output to inspect the structure of the fetched data
    echo "<pre>";
    print_r($purchase_orders); // This will show the structure of the fetched data
    echo "</pre>";

    // Display status message if set
    if (isset($_SESSION['status'])) {
        echo "<p>" . htmlspecialchars($_SESSION['status']) . "</p>"; // Use htmlspecialchars for security
        unset($_SESSION['status']);
    }

    // Check if there are any purchase orders
    if (count($purchase_orders) > 0) {
        echo '<table>';
        echo '<thead>';
        echo '<tr>
                <th>PO Number</th>
                <th>Total Quantity</th>
                <th>Quantity Received</th>
                <th>Supplier Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>';
        echo '</thead>';
        echo '<tbody>';
        
        foreach ($purchase_orders as $order): ?>
            <tr>
                <td><?php echo htmlspecialchars($order['po_number']); ?></td>
                <td><?php echo isset($order['total_quantity']) ? htmlspecialchars($order['total_quantity']) : 'N/A'; ?></td>
                <td><?php echo isset($order['qty_received']) ? htmlspecialchars($order['qty_received']) : 'N/A'; ?></td>
                <td><?php echo isset($order['supplier_name']) ? htmlspecialchars($order['supplier_name']) : 'N/A'; ?></td>
                <td><?php echo isset($order['status']) ? htmlspecialchars($order['status']) : 'N/A'; ?></td>
                <td><?php echo isset($order['created_at']) ? htmlspecialchars(date('Y-m-d', strtotime($order['created_at']))) : 'N/A'; ?></td>
                <td>
                    <a href="#" class="btn btn-info btn-base view_data">View Data</a>
                    <a href="#" class="btn btn-success btn-base edit_data">Edit Data</a>
                </td>
            </tr>
        <?php endforeach;
        echo '</tbody>';
        echo '</table>';
    } else { ?>
        <tr>
            <td colspan="7">No purchase orders found.</td> <!-- Adjusted colspan to match the number of columns -->
        </tr>
    <?php }
} catch (PDOException $e) {
    echo "Connection failed: " . htmlspecialchars($e->getMessage()); // Use htmlspecialchars for security
} catch (Exception $e) {
    echo "Error: " . htmlspecialchars($e->getMessage()); // Catch general exceptions
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