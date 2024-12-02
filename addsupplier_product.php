<?php
session_start();
include('header.php'); ?>

<!--Add-->
<!--Add User-->
<div class="modal fade" id="addUserData" tabindex="-1" aria-labelledby="viewitemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewitemModalLabel">Add supplier Products</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Product Name</label>
                        <input type="text" class="form-control fw-medium" name="product_name"
                            placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label class="fs-5 mt-1 fw-bolder">Price</label>
                        <input type="number" class="form-control fw-medium" name="price" placeholder="Enter Price"
                            step="0.01">
                    </div>

                    <div class="form-group mb-3">
                        <label for=""><b>Category</b></label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">-- Select Category --</option>
                           
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_product_supplier" class="btn btn-primary fw-medium">Add</button>
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
                <h1 class="modal-title fs-2" id="editDataLabel">Edit Users</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="code.php" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control fw-medium" id="id" name="id">
                    </div>
                    <div class="form-group">
                    <label for=""><b>Supplier</b></label>
                    <select class="form-control" id="supplier" name="supplier" required>

                        
                    </select>
                </div>

                <div class="form-group">
                    <label class="fs-5 mt-1 fw-bolder">Product Name</label>
                    <input type="text" class="form-control fw-medium" name="product_name" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label class="fs-5 mt-1 fw-bolder">Price</label>
                    <input type="number" class="form-control fw-medium" name="price" placeholder="Enter Email">
                </div>

                <div class="form-group mb-3">
                    <label for=""><b>Category</b></label>
                    <select class="form-control" id="categor" name="categor" required>
                        <option value="">-- Select Category --</option>
                        
                    </select>
                </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary fw-medium" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_supplier_product" class="btn btn-primary fw-medium">Update
                Product</button>
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
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
            </a>
            <div class="supplier-dropdown">
                <a href="#" class="list-group-item active" id="supplier-toggle">
                    <i class="fa-solid fa-boxes-packing me-3"></i>Supplier<i
                        class="fa-solid fa-chevron-right toggle-arrow-supplier" id="supplier-arrow"></i>
                </a>
                <div class="submenu" id="supplier-submenu">
                    <a href="addsupplier.php" class="sub-list-item">
                        <p class="txt-name-btn">Add Supplier</p>
                    </a>
                    <a href="addsupplier_product.php" class="sub-list-item active">
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
                <h2 class="fs-3 m-1">Supplier Products</h2>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                            <i class="fa-regular fa-circle me-2"></i>
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

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-lg-20">

                    
                    <div class="card" style = "margin-top: 60px;">
                        <div class="card-header">
                            <h3 class="text-center">Supplier Products</h3>
                            <button type="button" class="btn btn-primary float-end fw-medium" data-bs-toggle="modal"
                                data-bs-target="#addUserData">
                                Add Supplier Products
                            </button>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Supplier</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category</th>
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
