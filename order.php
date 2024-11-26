<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="order.css">
    <title>Food & Orders</title>
</head>
<div class="d-flex content">
    <div id="sidebar" class="sidebar-color">
        <div class="sidebar-heading">
            <img src="Images/Logo.jpg" alt="Bootstrap" class="logo me-3">The Good Shots
        </div>
        <div class="list-group list-group-flush mt-2">
            <a href="dashboard.php" class="list-group-item">
                <i class="fa-solid fa-mug-hot me-3"></i></i>Espresso Base Coffee
            </a>
            <a href="adduser.php" class="list-group-item">
                <i class="fas fa-project-diagram me-3"></i>Best Selling Coffee Drinks
            </a>
            <a href="addproduct.php" class="list-group-item">
                <i class="fas fa-chart-line me-3"></i>Fruit Tea
            </a>
            <a href="#" class="list-group-item">
                <i class="fas fa-shopping-cart me-3"></i>Mocktails
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-money-bill me-3"></i>Smoothies
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-boxes-packing me-3"></i>Frappe
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <i class="fa-solid fa-truck me-3"></i>Croffle
            </a>
            <a href="#" class="list-group-item">
                <i class="fa-solid fa-flag me-3"></i>Fries
            </a>
            <a href="#" class="list-group-item">
                <i class="fa-solid fa-flag me-3"></i>Cakes
            </a>
            <a href="#" class="list-group-item">
                <i class="fa-solid fa-flag me-3"></i>Sandwhich
            </a>
            <a href="#" class="list-group-item">
                <i class="fa-solid fa-flag me-3"></i>Rice Meal
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="btn-back"><i class="fa-solid fa-arrow-left m-3"></i></a>
                <h2 class="fs-3 m-1">Food and Orders</h2>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
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

        <div class="container-fluid">
            <div class="order-container">
                <header>
                    <div class="name-text">
                        <span class="label-name" id="espresso-based-coffee">Espresso Based Coffee</span>
                    </div>
                </header>
                <div class="content">
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                    <div class="coffee-card me-3">
                        <div class="quantity">
                            <div class="details">
                                <h3 class="coffee-name">Americano</h3>
                                <span class="coffee-price">P100</span>
                            </div>
                            <img src="images/Americano.png" alt="Americano" />
                            <div class="addtocart">Add to Cart</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="receipt">
                <div class="top-cart">
                    <h3 class="cart-name">Cart</h3>
                </div>
                <div class="order-list">
                    <span class="order-name m-2">Order List</span>
                    <span class = "order-number">Order: #001</span>
                </div>
                <div class="total-price">
                    <div class="form-check">
                        <button class="btn-discount">Add Discount</button>
                    </div>
                    <div class="total-amount">
                        Total:
                    </div>
                </div>
                <button class="btn-order">Check Out</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value, 10);
        quantityInput.value = currentQuantity + 1;
    }

    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value, 10);
        if (currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    document.getElementById('quantity').addEventListener('input', function () {
        const value = parseInt(this.value, 10);
        if (isNaN(value) || value < 1) {
            this.value = 1;
        }
    });
</script>

</html>