<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="order.css">
    <title>Food & Orders</title>
</head>

<body>
  


   <!-- Checkout Modal -->
<!-- Checkout Modal -->
<div id="checkoutModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Purchase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="totalPriceInput" class="form-label">Total Amount:</label>
            <input type="text" class="form-control" id="totalPriceInput" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="applyDiscount('PWD')">PWD Discount</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#discountModal">Senior Discount</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Discount -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="discountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="discountModalLabel">Apply Discount</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Please choose a discount option:</p>
        <button class="btn btn-primary" onclick="applyDiscount('PWD')">PWD Discount</button>
        <button class="btn btn-primary" onclick="applyDiscount('SENIOR')">Senior Discount</button>
        <p class="text-danger mt-3" id="discountError" style="display:none;">Invalid credentials!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <div class="d-flex content">
        <div id="sidebar" class="sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class="logo me-3">The Good Shots
            </div>
            <div class="list-group list-group-flush mt-2">
                <a href="#espresso-coffee" class="list-group-item">
                    <img src="icons/coffee-svgrepo-com.svg" alt="" class="icons me-3">Espresso Base Coffee
                </a>
                <a href="#fruit-tea" class="list-group-item">
                    <img src="icons/fruit-juice-orange-svgrepo-com.svg" alt="" class="icons me-3">Fruit Tea
                </a>
                <a href="#mocktails" class="list-group-item">
                    <img src="icons/cocktails-cocktail-svgrepo-com.svg" alt="" class="icons me-3">Mocktails
                </a>
                <a href="#smoothies" class="list-group-item">
                    <img src="icons/juice-svgrepo-com (1).svg" alt="" class="icons me-3">Smoothies
                </a>
                <a href="#frappe" class="list-group-item">
                    <img src="icons/frappe-svgrepo-com (1).svg" alt="" class="icons me-3">Frappe
                </a>
                <a href="#croffle" class="list-group-item">
                    <img src="icons/waffle-svgrepo-com.svg" alt="" class="icons me-3">Croffle
                </a>
                <a href="#fries" class="list-group-item">
                    <img src="icons/french-fries-svgrepo-com.svg" alt="" class="icons me-3">Fries
                </a>
                <a href="#cakes" class="list-group-item">
                    <img src="icons/cake-4-svgrep-com.svg" alt="" class="icons me-3">Cakes
                </a>
                <a href="#sandwich" class="list-group-item">
                    <img src="icons/sandwich-svgrepo-com (1).svg" alt="" class="icons me-3">Sandwich
                </a>
                <a href="#rice" class="list-group-item">
                    <img src="icons/rice-svgrepo-com (1).svg" alt="" class="icons me-3">Rice Meal
                </a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mt-2 dashboard-nav">
                <div class="d-flex align-items-center">
                    <a href="dashboard.php" class="btn-back me-4"><img src="icons/back-svgrepo-com.svg" alt="" class="back-icon"></a>
                    <h2 class="fs-3 m-1">Food and Orders</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link" href="#" style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="icons/ecommerce-shop-transaction-svgrepo-com.svg" alt="" class="topnavbar-icons">Transaction
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">History</a></li>
                                <li><a class="dropdown-item" href="#">Void Transaction</a></li>
                            </ul>
                        </li>
                        <a class="nav-link fw-bold notification-link me-2" href="#" style="color: black; font-weight: 200; font-size: 17px;">
                            <img src="icons/notifications-alert-svgrepo-com.svg" alt="" class="topnavbar-icons">Notifications
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link" href="#" style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="icons/profile-round-1342-svgrepo-com.svg" alt="" class="user-icons">Admin
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

            
    <?php
    require_once 'connection.php';
    $categories = ['Espresso', 'Fruit Tea', 'Mocktails', 'Smoothies', 'Frappe', 'Croffle', 'Fries', 'Cakes', 'Sandwich', 'Rice Meal'];

    foreach ($categories as $category) {
        
        $sql = "SELECT * FROM products WHERE category = :category";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['category' => $category]);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

     
        if ($stmt->rowCount() > 0) {
            echo "<header><div class='name-text'><span class='label-name' id='" . strtolower(str_replace(' ', '-', $category)) . "'>$category</span></div></header>";
            echo "<div class='content flex'><div class='product-list'>";

          
            while ($row = $stmt->fetch()) {
                echo "<div class='coffee-card flex me-3'>
                        <div class='quantity'>
                            <div class='details'>
                                <h3 class='coffee-name'>{$row['product_name']}</h3>
                                <span class='coffee-price'>P{$row['price']}</span>
                            </div>
                            
                            <div onclick='addord.call(this)' class='addtocart'>Add to Cart</div>
                        </div>
                    </div>";
            }
            echo "</div></div>";
        } else {
           
            echo "<p>No $category products found</p>";
        }
    }
    ?>
</div>

                <div class="receipt receipt-fluid">
                    <div class="top-cart">
                        <h3 class="cart-name">Cart</h3>
                    </div>
                    <h3 class="order-name">Order Items</h3>
                    <div class="order-list"></div>
                    <div class="total-price">
                        <div class="form-check">
                            <button class="btn-discount" data-bs-toggle="modal" data-bs-target="#discountModal">Add Discount</button>
                        </div>
                        <div class="total-amount">
                            Subtotal: <span id="totalAmount">P0.00</span>
                        </div>
                    </div>
                    <button class="btn-order" data-bs-toggle="modal" data-bs-target="#checkoutModal" onclick="updateTotalPrice()">Check Out</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const orderList = document.querySelector(".order-list");
    const totalAmountElement = document.getElementById("totalAmount");
    let isDiscountApplied = false;

    function addord() {
        const coffeeCard = this.closest(".coffee-card");
        const coffeeName = coffeeCard.querySelector(".coffee-name").innerText;
        const coffeePrice = coffeeCard.querySelector(".coffee-price").innerText;
        const priceValue = parseFloat(coffeePrice.replace(/[^\d.-]/g, ''));

        const orderItem = document.createElement("div");
        orderItem.classList.add("order-item");

        orderItem.innerHTML = `
            <span class="me-3 name-item">${coffeeName}</span>
            <span class="me-2 price-item">P${priceValue.toFixed(2)}</span>
            <input type="number" class="quantity-input" value="1" min="1" />
            <img src="icons/trash-alt-svgrepo-com.svg" alt="trash" class="remove remove-item" />
        `;

        const quantityInput = orderItem.querySelector(".quantity-input");
        quantityInput.addEventListener("input", updateTotalPrice);

        const removeButton = orderItem.querySelector(".remove-item");
        removeButton.addEventListener("click", function () {
            orderItem.remove();
            updateTotalPrice();
        });

        orderList.appendChild(orderItem);
        updateTotalPrice();
    }

    function updateTotalPrice() {
        let total = 0;

        document.querySelectorAll(".order-item").forEach((item) => {
            const priceElement = item.querySelector(".price-item").innerText;
            const quantityInput = item.querySelector(".quantity-input");
            const price = parseFloat(priceElement.replace(/[^\d.-]/g, ''));
            const quantity = parseInt(quantityInput.value, 10);

            total += price * quantity;
        });

        if (isDiscountApplied) {
            total *= 0.8; // Apply 20% discount
        }

        totalAmountElement.innerText = `P${total.toFixed(2)}`;
        document.getElementById("totalPriceInput").value = `P${total.toFixed(2)}`; // Update the checkout modal
    }

    function handleCashPayment() {
        const totalAmount = parseFloat(totalAmountElement.innerText.replace(/[^\d.-]/g, ''));
        const amountReceived = prompt("Enter amount received:");

        if (amountReceived) {
            const change = parseFloat(amountReceived) - totalAmount;
            if (change < 0) {
                alert("Insufficient amount received.");
            } else {
                alert(`Change: P${change.toFixed(2)}`);
                saveOrderToDatabase("Cash", totalAmount);
            }
        }
    }

    function handleGcashPayment() {
        const confirmation = confirm("Do you want to proceed with GCash payment?");
        if (confirmation) {
            saveOrderToDatabase("GCash", parseFloat(totalAmountElement.innerText.replace(/[^\d.-]/g, '')));
        }
    }

    function saveOrderToDatabase(paymentMethod, totalAmount) {
        const orderItems = [];
        document.querySelectorAll(".order-item").forEach(item => {
            const nameItem = item.querySelector(".name-item").innerText;
            const priceItem = parseFloat(item.querySelector(".price-item").innerText.replace(/[^\d.-]/g, ''));
            const quantity = parseInt(item.querySelector(".quantity-input").value);
            orderItems.push({ name: nameItem, price: priceItem, quantity: quantity });
        });

 
        fetch('save_order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                paymentMethod: paymentMethod,
                totalAmount: totalAmount,
                items: orderItems
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Order saved successfully!");
                orderList.innerHTML = '';
                updateTotalPrice();
            } else {
                alert("Failed to save order.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while saving the order.");
        });
    }

    function applyDiscount(type) {
        const credentials = prompt(`Enter ${type} credentials:`);

        if (credentials === "validCredential") {
            isDiscountApplied = true;
            updateTotalPrice();
            alert(`${type} discount applied successfully!`);
            const discountModal = bootstrap.Modal.getInstance(document.getElementById("discountModal"));
            discountModal.hide();
        } else {
            document.getElementById("discountError").style.display = "block";
        }
    }

    function saveTransaction() {
        const totalAmount = parseFloat(totalAmountElement.innerText.replace(/[^\d.-]/g, ''));
        alert(`Transaction saved with total amount: P${totalAmount.toFixed(2)}`);
        const checkoutModal = bootstrap.Modal.getInstance(document.getElementById("checkoutModal"));
        checkoutModal.hide();
    }
</script>

</html>