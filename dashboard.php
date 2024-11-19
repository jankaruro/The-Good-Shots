<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard.css" />
    <title>Dashboard</title>
</head>

<body>
    <div class="d-flex content">
        <div id="sidebar" class = "sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class = "logo">The Good Shots 
            </div>
                <div class="list-group list-group-flush mt-0">
                    <a href="dashboard.php" class="list-group-item active">
                        <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                    </a>
                    <a href="adduser.php" class="list-group-item">
                        <i class="fas fa-project-diagram me-3"></i>User Management
                    </a>
                    <a href="addproduct.php" class="list-group-item">
                        <i class="fas fa-chart-line me-3"></i>Product Management
                    </a> 
                    <a href="inventoryManage.php" class="list-group-item">
                        <i class="fas fa-shopping-cart me-3"></i>Inventory Management
                    </a>
                    <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-money-bill me-3"></i>Purchase Order
                    </a>
                    <a href="addsupplier.php" class="list-group-item">
                    <i class="fa-solid fa-boxes-packing me-3"></i>Supplier
                    </a>
                    <a href="purchase_order.php" class="list-group-item">
                    <i class="fa-solid fa-truck me-3"></i>Delivery
                    </a>
                    <a href="#" class="list-group-item btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-flag me-3"></i>Reports 
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Weekly</a></li>
                        <li><a class="dropdown-item" href="#">Monthly</a></li>
                        <li><a class="dropdown-item" href="#">Yearly</a></li>
                    </ul>
                </div>     
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-3 dashboard-nav">
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
                    <a class="nav-link fw-bold fs-5 cashier-link" href="order.php" style="color: black;">
                            <i class="fa-solid fa-cash-register"></i>
                            Food & Orders
                        </a>
                        <a class="nav-link fw-bold fs-5 notification-link" href="#" style="color: black;">
                            <i class="fa-solid fa-bell"></i>
                            Notification
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold fs-5 admin-link" href="#" style="color: black;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                    <div class="p-3 bg-color shadow-sm d-flex justify-content-around align-items-center rounded border-bottom-yellow">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-4">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <div class="p-3 bg-color shadow-sm d-flex justify-content-around align-items-center rounded border-bottom-green">
                            <div>
                                <h3 class="fs-2"></h3>
                                <p class="fs-4">Sales</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                    <div class="p-3 bg-color shadow-sm d-flex justify-content-around align-items-center rounded border-bottom-violet">
                        <div>
                            <h3 class="fs-2"></h3>
                            <p class="fs-4">Inventory</p>
                        </div>
                        <i class="fas fa-warehouse fs-1 p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-color shadow-sm d-flex justify-content-around align-items-center rounded border-bottom-blue">
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
                                        <div class="card mt-4">
                                            <div class="card-header">
                                                Inventory Level
                                            </div>
                                            <div class="card-body body-level">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="chart-container pie-chart">
                                                            <canvas id="doughnut_chart"></canvas>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">Product 1</li>
                                                            <li class="list-group-item">Product 2</li>
                                                            <li class="list-group-item">Product 3</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-4">
                                        <div class="card-header"> Top Selling Items</div>
                                        <div class="card-body body-level">
                                            <div class="chart-container pie-chart">
                                                <canvas id="pie_chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-4 mb-4">

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
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
        
    </script>
</body>

</html>