<?php
session_start();
include('header.php'); ?>

<style>
  .body{
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden; 
}
.sidebar-heading {
    position: sticky; 
    top: 0;
    background-color: #efe5dc;
    color: black;
    font-size: 18px;
    font-weight: 700;
    height: 80px;
    border-bottom: 2px solid black;
    text-transform: uppercase;
    z-index: 10;
}
.sidebar-color {
    background-color: #efe5dc;
    height: 100vh;
    width: 290px;
    position: fixed;
    top: 0;
    left: 0;
    border-right: 1px solid rgb(197, 197, 197);
    z-index: 1000;
    overflow-y: auto;
}
.logo{
    height: 60px;
    width: 60px;
    border-radius: 50%;
    margin: 10px;
}
.list-group-item{
    font-weight: 600;
    font-size: 17px;
    height: 50px;
    background-color: #efe5dc;
    color: black;
}

.dropdown-menu {
    width: 100%;
    max-width: 290px; 
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 8px;
}
.dropdown-item {
    background-color: transparent;
    font-weight: 500;  
    font-size: 17px;
    height: 50px;
    padding: 12px 20px;
    transition: background-color 0.3s, color 0.3s;
}
.list-group-item:hover{
    background-color: #d8cba8;
    color: #fff;
}
.list-group-item.active {
    background-color: #d8cba8;
    color: #ffffff;
    border-left: 5px solid;
    font-weight: bold;
    transition: all 0.3s ease;
    border-color: rgb(128, 127, 127);
}
.supplier-dropdown{
    position: relative;
    display: inline-block;
    background-color: #f1f1f1;
}
.reports-dropdown{
    position: relative;
    display: inline-block;
    background-color: #f1f1f1;
}
.product-dropdown{
    position: relative;
    display: inline-block;
    background-color: #f1f1f1;
}
#product-toggle{
    display: flex;
    align-items: center;
}
#supplier-toggle {
    display: flex;
    align-items: center;
}
#reports-toggle{
    display: flex;
    align-items: center;
}
.toggle-arrow-product {
    transition: transform 0.3s ease;
    margin-left: 30px;
    font-size: 12px;
}
.toggle-arrow-supplier{
    transition: transform 0.3s ease;
    margin-left: 130px;
    font-size: 12px;
}
.toggle-arrow-reports{
    transition: transform 0.3s ease;
    margin-left: 140px;
    font-size: 12px;
}
.txt-name-btn{
    margin: 10px;
}
#supplier-submenu{
    display: block;
}
.submenu{
    display: none;
    padding-left: 10px;
}
.submenu.active {
    display: block;
}
.
.sub-list-item.active {
        background-color: #d8cba8;
        color: white;
        font-weight: bold;
        border-left: 4px solid rgb(128, 127, 127);
}
.sub-list-item {
    text-decoration: none;
    color: #333;
    display: block;
    font-weight: 500;
    border-radius: 4px;
    height: 50px;
    padding: 5px 0;
    padding-right: 5px;
    margin-left: 30px;
}
.sub-list-item:hover{
    background-color: #d8cba8;
    color: white;
}
.cashier-link:hover{
    background-color: #d8cba8;
    border-radius: 20px;

} .notification-link:hover{
    background-color: #d8cba8;
    border-radius: 20px;
} .admin-link:hover{
    background-color: #d8cba8;
    border-radius: 20px;
}
.bg-color{
    background-color: #f6f8ee;
}
.dashboard-nav {
    position: fixed;
    width: calc(100% - 390px);
    height: 64px;
    top: 0;
    left: 335px;
    background-color: white !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    border-radius: 5px;
    display: flex;
    align-items: center;
    z-index: 1000;
}
.topnavbar-icons{
    height: 24px;
    width: 24px;
    margin-right: 5px;
    margin-bottom: 5px;
}
.user-icons{
    height: 22px;
    width: 22px;
    margin-right: 5px;
    margin-bottom: 5px;
}
.content{
    display: flex;
    height: 100vh;
}
.border-bottom-green {
    box-shadow: 1px 2px 3px 2px rgba(0, 0, 0, 0.3);
    border-bottom: 2px solid blue;
    background-color: #e9ecef;
    height: 150px;
    width: 355px;
    cursor: pointer;
}
.border-bottom-blue {
    box-shadow: 1px 2px 3px 2px rgba(0, 0, 0, 0.3);
    border-bottom: 2px solid yellow;
    background-color: #e9ecef;
    height: 150px;
    width: 360px;
    cursor: pointer;
}
.border-bottom-yellow {
    box-shadow: 1px 2px 3px 2px rgba(0, 0, 0, 0.3);
    border-bottom: 2px solid green;
    background-color: #e9ecef;
    height: 150px;
    width: 355px;
    cursor: pointer;
}
.border-bottom-violet {
    box-shadow: 1px 2px 3px 2px rgba(0, 0, 0, 0.3);
    border-bottom: 2px solid orange;
    background-color: #e9ecef;
    height: 150px;
    width: 355px;
    cursor: pointer;
}
.body-level{
    height: 500px;
}
.list-product-item{
    height: 100px;
    padding: 20px;
    font-weight: 400;
}
.list-product-item:hover {
    background-color:#d8cba8;
    color: #ffffff;
    cursor: pointer; 
    transition: all 0.3s ease; 
}
#page-content-wrapper {
    margin-left: 290px;
    padding: 30px;
    width: calc(100% - 290px);
    background-color: #fffdf2;
    overflow-y: auto;
    height: 100vh;
    box-sizing: border-box;
    position: fixed;
    scrollbar-width: thin;
    scrollbar-color: #888 #f1f1f1;
}
#page-content-wrapper::-webkit-scrollbar-track {
    background: wheat;
    border-radius: 10px;
}
.tbl-action{
    width: 350px;
}
.btn-excel {
    height: 40px;
    width: 100px;
    background-color: darkgreen;
    border-radius: 5px;
    color: white;
    font-size: 18px;
    font-weight: 500;   
    border: 1px solid gray;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.btn-excel:hover{
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}
.btn-inventory{
    width: 300px;
}
.edit_data{
    background-color: rgb(219, 180, 106);
    width: 100px;
}
.delete_data{
    width: 120px;
    height: 38px;
}
</style>

<!--Add-->
<!--Add User-->
<div class="modal fade" id="addUserData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
            <input type="text" class="form-control fw-medium" name="supplier_name" placeholder="Enter Supplier Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Address</label>
            <input type="text" class="form-control fw-medium" name="address" placeholder="Enter Supplier Address">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
            <input type="text" class="form-control fw-medium" name="contact_person" placeholder="Enter Contact Person">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Status</label>
            <select class="form-control fw-medium" id="status" name="status">
              <option value="active">Active </option>
              <option value="inactive">Inactive</option>

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add_supplier" class="btn btn-primary fw-medium">Add User</button>
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
        <h1 class="modal-title fs-2" id="editDataLabel">Edit Inventory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">

          <div class="form-group">
            <input type="hidden" class="form-control fw-medium" id="id" name="id">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
            <input type="text" class="form-control fw-medium" name="suppliername" placeholder="Enter First Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Address</label>
            <input type="text" class="form-control fw-medium" name="address" placeholder="Enter Last Name">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
            <input type="text" class="form-control fw-medium" name="contactperson" placeholder="Enter Contact Person">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Email</label>
            <input type="email" class="form-control fw-medium" name="email" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label class="fs-5 mt-1 fw-bolder">Status</label>
            <select class="form-control fw-medium" id="status" name="status">
              <option value="active">Active </option>
              <option value="inactive">Inactive</option>

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
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
                    <a href="#" class="list-group-item active" id="supplier-toggle">
                        <i class="fa-solid fa-boxes-packing me-3"></i>Supplier<i
                            class="fa-solid fa-chevron-down toggle-arrow-supplier" id="supplier-arrow"></i>
                    </a>
                    <div class="submenu" id="supplier-submenu">
                        <a href="addsupplier.php" class="sub-list-item active">
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
                    <h2 class="fs-3 m-1">Add Supplier</h2>
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
         <div class="card shadow" style="width: 95.5rem">
            <div class="card-header">
              <button type="button" class="btn btn-primary float-end fw-medium btn-add" data-bs-toggle="modal"
                data-bs-target="#addUserData">
                Add New User
              </button>
            </div>
            <div class="card-body mt-1">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Product</th>
                    <th scope="col">Package Quantity</th>
                    <th scope="col">Measurement Per Package</th>
                    <th scope="col">Total_measurement</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Expiration Date</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                
                </tbody>
              </table>
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
  <?php include('footer.php'); ?>
  <?php include('function/viewdata.js'); ?>
  <?php include('function/editdata.js'); ?>
  <?php include('function/remove.js'); ?>