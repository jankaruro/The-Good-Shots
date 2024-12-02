<?php
session_start();    
include('header.php'); ?>

<!--Add-->
<!--Add User-->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUser DataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2" id="addUser DataLabel">Adding New Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
                        <input type="text" class="form-control fw-medium" name="supplier_name" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Contact Number</label>
                        <input type="text" class="form-control fw-medium" name="contact_number" placeholder="Enter Contact Number" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Status</label>
                        <select class="form-control fw-medium" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_supplier" class="btn btn-primary fw-medium">Add Supplier</button>
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
                <h1 class="modal-title fs-2" id="editDataLabel">Edit Supplier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
                        <input type="text" class="form-control fw-medium" name="suppliername" placeholder="Enter Supplier Name" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Contact Number</label>
                        <input type="text" class="form-control fw-medium" name="contactnumber" placeholder="Enter Contact Number" required>
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Status</label>
                        <select class="form-control fw-medium" id="status" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" id="id"> <!-- Hidden field for supplier ID -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn -secondary fw-medium" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="update_supplier" class="btn btn-primary fw-medium">Update</button>
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
                <a href="dashboard.php" class="list-group-item active">
                    <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                </a>
                <a href="adduser.php" class="list-group-item">
                    <i class="fas fa-project-diagram me-3"></i>User Management
                </a>
                <div class="product-dropdown">
                    <a href="addproduct.php" class="list-group-item" id="product-toggle">
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
                    <h2 class="fs-3 m-1">Dashboard</h2>
                </div>

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

    <div class="container-responsive" style="margin-top: 40px; padding: 15px">
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
         <div class="card shadow">
            <div class="card-header">
              <button type="button" class="btn btn-primary float-end fw-medium btn-add" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New Supplier
              </button>
            </div>
            <div class="card-body mt-1">
              <table id="user-management" class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Supplier Name</th>
                      <th scope="col">Contact Number</th>
                      <th scope="col">Status</th>
                      <th scope="col" class = "size-table">Action</th>
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

  <script>
    $(document).ready(function () {

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
      });
</script>
