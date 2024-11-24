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

<body>
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
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-1 dashboard-nav">
                <a href="dashboard.php" class="btn-back"><i class="fa-solid fa-arrow-left m-3"></i></a>
                <div class="d-flex align-items-center top-nav">
                    <h2 class="fs-3 m-2 ms-4 me-5" style="color: white">Food and Drinks</h2>
                    <div class="search-bar">
                        <input type="text" class="search-input" placeholder="Search...">
                        <button class="search-button">Search</button>
                    </div>
                </div>
            </nav>
            <header>
                <div class="name-text">
                    <span class="label-name" id="espresso-based-coffee">Espresso Based Coffee</span>
                </div>
            </header>
            <div class="coffee-card">
                <img src="images/Americano.png" alt="Americano" />
                <div class="quantity-container">
                <div class="details">
                    <h3 class = "coffee-name">Americano <span class = "coffee-price">P100</span></h3>
                    <p>An Americano coffee is a beverage made by diluting a shot of espresso with hot water, resulting
                        in a smoother, milder flavor compared to straight espresso.</p>
                </div>
                <div class="quantity-container">
                <button class="decrease" onclick="decreaseQuantity()">-</button>
                <input type="number" id="quantity" value="1" min="1" />
                <button class="increase" onclick="increaseQuantity()">+</button>
                </div>
            </div>

        </div>
        <div class="receipt">
            <div class="business-function">
                <header class="receipt-nav">
                    <i class="fa-regular fa-circle-user me-3 mt-3"></i>Admin
                </header>
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

// Optional: Validate manual input
document.getElementById('quantity').addEventListener('input', function () {
  const value = parseInt(this.value, 10);
  if (isNaN(value) || value < 1) {
    this.value = 1;
  }
});
</script>
</html>