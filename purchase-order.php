<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1024, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="purchase_order.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="function/po_database.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="function/po_database.js"></script>
    <title>The Good Shots</title>
</head>

<body>
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
                        <i class="fa-brands fa-product-hunt me-3"></i>Product Management
                    </a>
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
              <h3 class="text-center">Purchase Order</h3>
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
session_start(); 
include('connection.php'); 

try {
   
    if (!$conn) {
        throw new Exception("Database connection failed.");
    }

   
    $query = "SELECT purchase_orders.*, purchase_order_details.*
              FROM purchase_orders
              LEFT JOIN purchase_order_details ON purchase_orders.id = purchase_order_details.po_id";
    $stmt = $conn->prepare($query);
    
  
    if (!$stmt->execute()) {
        throw new Exception("Query execution failed: " . implode(", ", $stmt->errorInfo()));
    }

  
    $purchase_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
    echo "<pre>";
    print_r($purchase_orders);
    echo "</pre>";

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#product-toggle").click(function (e) {
                e.preventDefault();
                $("#product-submenu").slideToggle();
                const productArrow = $("#product-arrow");
                if (productArrow.hasClass("fa-chevron-right")) {
                    productArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
                } else {
                    productArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
                }
            });

            $("#supplier-toggle").click(function (e) {
                e.preventDefault();
                $("#supplier-submenu").slideToggle();
                const supplierArrow = $("#supplier-arrow");
                if (supplierArrow.hasClass("fa-chevron-right")) {
                    supplierArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
                } else {
                    supplierArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
                }
            });

            $("#reports-toggle").click(function (e) {
                e.preventDefault();
                $("#reports-submenu").slideToggle();
                const reportsArrow = $("#reports-arrow");
                if (reportsArrow.hasClass("fa-chevron-right")) {
                    reportsArrow.removeClass("fa-chevron-right").addClass("fa-chevron-down");
                } else {
                    reportsArrow.removeClass("fa-chevron-down").addClass("fa-chevron-right");
                }
            });
        });
    </script>
</body>

</html>