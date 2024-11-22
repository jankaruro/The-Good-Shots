<?php include('supplier/addsupplier_header.php'); ?>

<!--Add-->
<div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2" id="addDataLabel">Insert Inventory</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control fw-medium" id="itemID" name="id">
                        </div>
                       

                     
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
                            <input type="text" class="form-control fw-medium" id="suppliername"
                                name="suppliername" placeholder="Enter Supplier Name">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Address</label>
                            <input type="text" class="form-control fw-medium" id="add" name="add"
                                placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
                            <input type="text" class="form-control fw-medium" id="person" name="person"
                                placeholder="Enter Contact Person">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Email</label>
                            <input type="text" class="form-control fw-medium" id="emai" name="emai"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                        <label for=""><b>Status</b></label>
                        <select class="form-control" id="status" name="status">
                            <option value="">-- Select Status --</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button e="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addsupp" class="btn btn-primary fw-medium">Add Item</button>
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
                            <label class="fs-5 mt-1 fw-bolder">Supplier Name</label>
                            <input type="text" class="form-control fw-medium" id="suppliername"
                                name="suppliername" placeholder="Enter Supplier Name">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Address</label>
                            <input type="text" class="form-control fw-medium" id="add" name="add"
                                placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Contact Person</label>
                            <input type="text" class="form-control fw-medium" id="person" name="person"
                                placeholder="Enter Contact Person">
                        </div>
                        <div class="form-group">
                            <label class="fs-5 mt-1 fw-bolder">Email</label>
                            <input type="text" class="form-control fw-medium" id="emai" name="emai"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                        <label for=""><b>Status</b></label>
                        <select class="form-control" id="status" name="status">
                            <option value="">-- Select Status --</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
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
                    <i class="fa-solid fa-money-bill me-3"></i>Product Management
                </a>
                <div class="submenu" id="product-submenu">
                    <a href="" class="sub-list-item">
                        <p class="txt-name-btn">Add Product</p>
                    </a>
                    <a href="" class="sub-list-item">
                        <p class="txt-name-btn">Add Category</p>
                    </a>
                </div>
            </div>
            <a href="inventoryManage.php" class="list-group-item active">
                <i class="fas fa-shopping-cart me-3"></i>Inventory Management
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
            </a>
            <div class="supplier-dropdown">
                <a href="#" class="list-group-item" id="supplier-toggle">
                    <i class="fa-solid fa-money-bill me-3"></i>Supplier
                </a>
                <div class="submenu" id="supplier-submenu">
                    <a href="addsupplier.php" class="sub-list-item">
                        <p class="txt-name-btn">Add Supplier</p>
                    </a>
                    <a href="" class="sub-list-item">
                        <p class="txt-name-btn">Suppliers Product</p>
                    </a>
                </div>
            </div>
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-truck me-3"></i>Delivery
            </a>
            <div class="reports-dropdown">
                <a href="#" class="list-group-item" id="reports-toggle">
                    <i class="fa-solid fa-money-bill me-3"></i>Reports
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
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-3 dashboard-nav">
            <div class="d-flex align-items-center">
                <h2 class="fs-3 m-1">Dashboard</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle fw-bold fs-5 admin-link" href="#" style="color: black;"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <h3 class="text-center">Inventory Management</h3>
                            <button type="button" class="btn btn-info float-end fw-medium" data-bs-toggle="modal"
                                data-bs-target="#addData">
                                Add Inventory
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID #</th>
                                        <th scope="col">Supplier Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact Person</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

                                    $fetch_query = "SELECT * FROM suppliers ";
                                    $fetch_query_run = mysqli_query($connection, $fetch_query);

                                    if (mysqli_num_rows($fetch_query_run) > 0) {
                                        while ($row = mysqli_fetch_array($fetch_query_run)) {

                                            ?>
                                            <tr>
                                                <td class="inventory_id"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['supplier_name']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['contact_person']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td class="btn-inventory">
                                                    <a href="" class="btn btn-success btn-base edit_data">Edit Data</a>
                                                    <a href="" class="btn btn-danger btn-base delete_data">Delete Data</a>
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




        <?php include('supplier/addsupplier_footer.php'); ?>
        <?php include('supplier/viewsupplier.js'); ?>
        <?php include('supplier/editsupplier.js'); ?>
        <?php include('supplier/deletesupplier.js'); ?>