<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1024, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>Dashboard</title>
</head>

<body>
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
                    <a href="#" class="list-group-item" id="product-toggle">
                        <i class="fa-brands fa-product-hunt me-3"></i></i>Product Management<i class="fa-solid fa-chevron-right toggle-arrow-product" id="product-arrow"></i>
                    </a>
                    <div class="submenu" id="product-submenu">
                        <a href="addproduct.php" class="sub-list-item"><p class = "txt-name-btn">Add Product</p></a>
                        <a href="addcategory.php" class="sub-list-item"><p class = "txt-name-btn">Add Category</p></a>
                    </div>
                </div>
                <a href="inventoryManage.php" class="list-group-item">
                    <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                </a>
                <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                </a>
                <div class="supplier-dropdown">
                    <a href="#" class="list-group-item" id="supplier-toggle">
                    <i class="fa-solid fa-boxes-packing me-3"></i>Supplier<i class="fa-solid fa-chevron-right toggle-arrow-supplier" id="supplier-arrow"></i>
                    </a>
                    <div class="submenu" id="supplier-submenu">
                        <a href="addsupplier.php" class="sub-list-item"><p class = "txt-name-btn">Add Supplier</p></a>
                        <a href="addsupplier_product.php" class="sub-list-item"><p class = "txt-name-btn">Suppliers Product</p></a>
                    </div>
                </div>
                <a href="delivery.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                </a>
                <div class="reports-dropdown">
                    <a href="#" class="list-group-item" id="reports-toggle">
                    <i class="fa-solid fa-calendar-days me-3"></i></i>Reports<i class="fa-solid fa-chevron-right toggle-arrow-reports" id="reports-arrow"></i>
                    </a>
                    <div class="submenu" id="reports-submenu">
                        <a href="discrepancy.php" class="sub-list-item"><p class = "txt-name-btn">Discrepancy Report</p></a>
                        <a href="inventoryReport.php" class="sub-list-item"><p class = "txt-name-btn">Inventory Report</p></a>
                        <a href="salesReport.php" class="sub-list-item"><p class = "txt-name-btn">Sales Report</p></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
                <div class="d-flex align-items-center">
                    <h2 class="fs-3 m-1">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <a class="nav-link fw-bold cashier-link" href="order.php" style="color: black; font-weight: 200; font-size: 17px;">
                            <i class="fa-solid fa-cash-register me-2"></i>
                            Food & Orders
                        </a>
                        <a class="nav-link fw-bold notification-link" href="#" style="color: black; font-weight: 200; font-size: 17px;">
                            <i class="fa-solid fa-bell me-2"></i>
                            Notification
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold admin-link" href="#" style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-circle-user me-2" style = "font-size: 25px"></i>
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

            <div class="container-fluid px-4 mt-5">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                    <div class="p-3 bg-color d-flex justify-content-around align-items-center rounded border-bottom-yellow">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-4">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <div class="p-3 bg-color d-flex justify-content-around align-items-center rounded border-bottom-green">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-4">Sales</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <div class="p-3 bg-color d-flex justify-content-around align-items-center rounded border-bottom-violet">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-4">Inventory</p>
                        </div>
                        <i class="fas fa-warehouse fs-1 p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-color d-flex justify-content-around align-items-center rounded border-bottom-blue">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-4">Increase</p>
                        </div>
                        <i class="fas fa-chart-line fs-1 p-3"></i>
                    </div>
                </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">CHARTS</h3>
                    <div class="col">
                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mt-2 shadow">
                                            <div class="card-header">
                                                Inventory Level
                                            </div>
                                            <div class="card-body body-level">
                                                <div class="row">
                                                    <div class="col-md-6 me-5">
                                                        <div class="chart-container pie-chart">
                                                            <canvas id="doughnut_chart"></canvas>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p class="stock-name" style="margin-top: 50px; font-weight: 500; font-size: 24px; text-align: center">Low Stock Item</p>
                                                        <ul class="list-group shadow" style = "margin-top: 40px; height: 200px; overflow-y: auto;  scrollbar-width: thin; scrollbar-color: #edc4b3 #f1f1f1; background-color: white;">
                                                            <li class="list-product-item">Product 1</li>
                                                            <li class="list-product-item">Product 2</li>
                                                            <li class="list-product-item">Product 3</li>
                                                            <li class="list-product-item">Product 4</li>
                                                            <li class="list-product-item">Product 5</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-5 shadow">
                                            <div class="card-header">
                                                Top Selling Product
                                            </div>
                                            <div class="card-body body-level">
                                                <div class="row">
                                                    <div class="col-md-6 me-5">
                                                        <p class="stock-name" style="margin-top: 50px; font-weight: 500; font-size: 24px; text-align: center">Top 3</p>
                                                        <ul class="list-group shadow" style = "margin-top: 40px; height: 200px; overflow-y: auto;  scrollbar-width: thin; scrollbar-color: #d69f7e #f1f1f1; background-color: ">
                                                            <li class="list-product-item">Product 1</li>
                                                            <li class="list-product-item">Product 2</li>
                                                            <li class="list-product-item">Product 3</li>
                                                            <li class="list-product-item">Product 4</li>
                                                            <li class="list-product-item">Product 5</li>
                                                        </ul>
                                                    </div>
                                                        <div class="chart-container pie-chart">
                                                            <canvas id="pie-chart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-5 mb-4 shadow">

                                        <h2 class="text-center">SALES ORDER SUMMARY (IN USD)</h2>
                                        <p class="text-center">This Month</p>
                                        <div class="chart-container body-level">
                                            <canvas id="salesChart"></canvas>
                                        </div>
                                        <div class="total-sales">
                                            <h5>Total Sales</h5>
                                            <p>DIRECT SALES: $55,229.28</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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