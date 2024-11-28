<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                <img src="icons/coffee-svgrepo-com.svg" alt="" class = "icons me-3">Espresso Base Coffee
            </a>
            <a href="adduser.php" class="list-group-item">
                <img src="icons/medal-ribbon-star-svgrepo-com.svg" alt="" class = "icons me-3">Best Selling Coffee Drinks
            </a>
            <a href="addproduct.php" class="list-group-item">
                <img src="icons/fruit-juice-orange-svgrepo-com.svg" alt="" class = "icons me-3">Fruit Tea
            </a>
            <a href="#" class="list-group-item">
                <img src="icons/cocktails-cocktail-svgrepo-com.svg" alt="" class = "icons me-3">Mocktails
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <img src="icons/juice-svgrepo-com (1).svg" alt="" class = "icons me-3">Smoothies
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <img src="icons/frappe-svgrepo-com (1).svg" alt="" class = "icons me-3">Frappe
            </a>
            <a href="purchase_order.php" class="list-group-item">
                <img src="icons/croisant-svgrepo-com.svg" alt="" class = "icons me-3">Croffle
            </a>
            <a href="#" class="list-group-item">
                <img src="icons/french-fries-svgrepo-com.svg" alt="" class = "icons me-3">Fries
            </a>
            <a href="#" class="list-group-item">
                <img src="icons/cake-4-svgrepo-com.svg" alt="" class = "icons me-3">Cakes
            </a>
            <a href="#" class="list-group-item">
                <img src="icons/sandwich-svgrepo-com (1).svg" alt="" class = "icons me-3">Sandwhich
            </a>
            <a href="#" class="list-group-item">
                <img src="icons/rice-svgrepo-com (1).svg" alt="" class = "icons me-3">Rice Meal
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="btn-back me-4"><img src="icons/back-svgrepo-com.svg" alt="" class = "back-icon"></a>
                <h2 class="fs-3 m-1">Food and Orders</h2>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                    <a class="nav-link fw-bold notification-link me-3" href="#"
                        style="color: black; font-weight: 200; font-size: 17px;">
                            <img src= "icons/reject-cross-delete-svgrepo-com.svg" alt="" class="topnavbar-icons">
                        Transaction
                    </a>
                    <a class="nav-link fw-bold notification-link me-3" href="#"
                        style="color: black; font-weight: 200; font-size: 17px;">
                            <img src= "icons/notifications-alert-svgrepo-com.svg" alt="" class="topnavbar-icons">
                        Notifications
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold notification-link " href="#"
                            style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src= "icons/profile-round-1342-svgrepo-com.svg" alt="" class="user-icons">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
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