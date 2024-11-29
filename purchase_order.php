<?php
session_start();
include('header.php');
include('connection.php'); // Ensure connection is included at the beginning

// Fetch suppliers for the dropdown
$query = "SELECT po.po_number, 
                 po.created_at, 
                 po.qty_received, 
                 pod.quantity AS total_quantity, 
                 pod.product_name, 
                 pod.unit_price, 
                 pod.amount,
                 pod.supplier_name,
                 pod.status  
          FROM purchase_orders po
          LEFT JOIN purchase_order_details pod ON po.po_number = pod.po_id";

$query_run = $conn->query($query);
?>
<script src="function/po_database.js"> </script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="po_database.js"></script> <!-- Include your JavaScript file -->

<!-- Purchase Order Modal -->
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

        <!-- Supplier Selection -->
        <div class="form-group">
          <label for="supplier"><b>Supplier</b></label>
          <select class="form-control" id="supplier" name="supplier" required onchange="loadProducts()">
            <option value="">-- Select Supplier --</option>
            <?php
            // Sample PHP code to fetch suppliers
            // Replace with your actual database connection and query
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

<!-- Confirmation Modal -->
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
      <a href="inventoryManage.php" class="list-group-item">
        <i class="fas fa-shopping-cart me-3"></i>Inventory Management
      </a>
      <a href="purchase_order.php" class="list-group-item active">
        <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
      </a>
      <a href="addsupplier.php" class="list-group-item">
        <i class="fa-solid fa-boxes-packing me-3"></i>Supplier
      </a>
      <a href="delivery.php" class="list-group-item">
        <i class="fa-solid fa-truck me-3"></i>Delivery
      </a>
    </div>
  </div>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
      <div class="d-flex align-items-center">
        <h2 class="fs-3 m-1">Purchase Order</h2>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
          <a class="nav-link fw-bold cashier-link" href="order.php" style="color: black; font-weight: 200; font-size: 17px;">
            <i class="fa-solid fa-cash-register me-2"></i>Food & Orders
          </a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-bold admin-link" href="#" style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-circle-user me-2" style="font-size: 25px"></i>Admin
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
              },  3000);
            </script>
            <?php unset($_SESSION['status']); ?>
          <?php endif; ?>

          <div class="card">
            <div class="card-header">
              <h3 class="text-center">Purchase Order</h3>
              <button type="button" class="btn btn-primary float-end fw-medium" data-toggle="modal" data-target="#purchaseOrderModal">
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
                  <th scope="col">PO Date</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="tbl-action">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($query_run && $query_run->rowCount() > 0) {
                  foreach ($query_run as $row) {
                    $status = isset($row['status']) ? $row['status'] : 'pending'; // Default to 'pending'
                    $disableEdit = $status === 'complete' ? 'disabled' : '';
                    $rowColorClass = '';

                    switch ($status) {
                      case 'complete':
                        $rowColorClass = 'table-success';
                        break;
                      case 'incomplete':
                        $rowColorClass = 'table-incomplete';
                        break;
                      case 'pending':
                        $rowColorClass = 'table-pending';
                        break;
                      default:
                        $rowColorClass = '';
                    }
                    ?>
                    <tr class="<?php echo htmlspecialchars($rowColorClass); ?>">
                      <td><?php echo htmlspecialchars($row['po_number']); ?></td>
                      <td><?php echo htmlspecialchars($row['total_quantity']); ?></td>
                      <td><?php echo htmlspecialchars($row['qty_received']); ?></td>
                      <td><?php echo htmlspecialchars($row['supplier_name']); ?></td>
                      <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($row['created_at']))); ?></td>
                      <td><?php echo htmlspecialchars($status); ?></td>
                      <td>
                        <button class="btn btn-info btn-sm view_data" data-bs-toggle="modal" data-bs-target="#viewModal" data-id="<?php echo htmlspecialchars($row['po_number']); ?>">View</button>
                        <button class="btn btn-success btn-sm edit_data" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo htmlspecialchars($row['po_number']); ?>" <?php echo $disableEdit; ?>>Edit</button>
                        <button class="btn btn-danger btn-sm delete_data" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo htmlspecialchars($row['po_number']); ?>">Delete</button>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  echo "<tr><td colspan='7'>No Records Found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
<?php include('function/viewdata.js'); ?>
<?php include('function/editdata.js'); ?>
<?php include('function/remove.js'); ?>