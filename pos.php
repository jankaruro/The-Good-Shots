<?php session_start();include('connection.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="pos.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <title>Food & Orders</title>
</head>

<body>
    <div class="d-flex content">
        <div id="sidebar" class="sidebar-color">
            <div class="sidebar-heading">
                <img src="Images/Logo.jpg" alt="Bootstrap" class="logo me-3">The Good Shots
            </div>
            <div class="list-group list-group-flush">
                <a href="#espresso-coffee" class="list-group-item"> <img src="icons/coffee-svgrepo-com.svg" alt=""
                        class="icons me-3">Espresso Base Coffee</a>
                <a href="#fruit-tea" class="list-group-item"><img src="icons/fruit-juice-orange-svgrepo-com.svg" alt=""
                        class="icons me-3">Fruit Tea</a>
                <a href="#mocktails" class="list-group-item"><img src="icons/cocktails-cocktail-svgrepo-com.svg" alt=""
                        class="icons me-3">Mocktails</a>
                <a href="#smoothies" class="list-group-item"><img src="icons/juice-svgrepo-com (1).svg" alt=""
                        class="icons me-3">Smoothies</a>
                <a href="#frappe" class="list-group-item"><img src="icons/frappe-svgrepo-com (1).svg" alt=""
                        class="icons me-3">Frappe</a>
                <a href="#croffle" class="list-group-item"><img src="icons/waffle-svgrepo-com.svg" alt=""
                        class="icons me-3">Croffle</a>
                <a href="#fries" class="list-group-item"><img src="icons/french-fries-svgrepo-com.svg" alt=""
                        class="icons me-3">Fries</a>
                <a href="#cakes" class="list-group-item"><img src="icons/cake-4-svgrepo-com.svg" alt=""
                        class="icons me-3">Cakes</a>
                <a href="#sandwich" class="list-group-item"> <img src="icons/sandwich-svgrepo-com (1).svg" alt=""
                        class="icons me-3">Sandwich</a>
                <a href="#rice" class="list-group-item"><img src="icons/rice-svgrepo-com (1).svg" alt=""
                        class="icons me-3">Rice Meal</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 dashboard-nav">
                <div class="d-flex align-items-center">
                    <a href="index.php" class="btn-back me-4"><img src="icons/back-svgrepo-com.svg" alt=""
                            class="back-icon"></a>
                    <h2 class="fs-3 m-1">Food and Orders</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link" href="#"
                                style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="icons/ecommerce-shop-transaction-svgrepo-com.svg" alt=""
                                    class="topnavbar-icons">Transaction
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">History</a></li>
                                <li><a class="dropdown-item" href="#">Void Transaction</a></li>
                            </ul>
                        </li>
                        <a class="nav-link fw-bold notification-link me-2" href="#"
                            style="color: black; font-weight: 200; font-size: 17px;">
                            <img src="icons/notifications-alert-svgrepo-com.svg" alt=""
                                class="topnavbar-icons">Notifications
                        </a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-bold notification-link" href="#"
                                style="color: black; font-weight: 200; font-size: 17px;" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

            <div class="container-responsive mt-5 ms-2" id="container">
                <div class="row justify-content-center">
                    <div class="container-order">
                        <div class="order-header">
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="best-seller">Best Seller Coffee Drinks</span>
                                </div>
                            </header>
                        </div>
                        <div class="order-card">
                            <?php
                            require_once 'connection.php';

                            $sql = "SELECT * FROM product WHERE category = 'Espresso'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch()) { ?>
                                    <div class="coffee-card">
                                        <div class="quantity">
                                            <div class="details">
                                                <h3 class="coffee-name">
                                                    <?php echo htmlspecialchars($row['product_name']); ?>
                                                </h3>
                                                <span
                                                    class="coffee-price">P<?php echo htmlspecialchars($row['price']); ?></span>
                                            </div>
                                            <img src="<?php echo htmlspecialchars($row['image']); ?>"
                                                alt="<?php echo htmlspecialchars($row['product_name']); ?>" />
                                            <div class="addtocart"
                                                onclick="addToCart('<?php echo htmlspecialchars($row['product_name']); ?>', <?php echo htmlspecialchars($row['price']); ?>, <?php echo htmlspecialchars($row['product_id']); ?>)">
                                                Add to Cart
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } else {
                                echo "No espresso products found";
                            }
                            ?>
                        </div>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="espresso-coffee">Espresso Based Coffee</span>
                                </div>
                            </header>

                        
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="fruit-tea">Fruit Tea</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="mocktails">Mocktails</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="smoothies">Smoothies</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="frappe">Frappe</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="croffle">Croffle</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="fries">Fries</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="cakes">Cakes</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="sandwich">Sandwich</span>
                                </div>
                            </header>
                            <header>
                                <div class="name-text">
                                    <span class="label-name" id="rice">Rice Meal</span>
                                </div>
                            </header>
                        <div class="receipt receipt-fluid">
                            <div class="top-cart">
                                <h3 class="cart-name">Cart</h3>
                            </div>
                            <h3 class="order-name">Order Items</h3>
                            <div class="order-list">
                                <table class="table table-striped table-bordered table-hover" id="cart">
                                    <thead>
                                        <tr id="tbl_head">
                                            <th style="width: 10rem">Item Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-body">

                                    </tbody>
                                </table>
                            </div>
                            <div class="total-price">
                                <div class="total-amount">
                                    Total: <span id="total-amount">0.00</span>
                                </div>
                            </div>
                            <button type="button" class="btn-order" data-bs-toggle="modal"
                                data-bs-target="#checkoutModal" id="checkoutButton">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="checkoutForm" method="POST" action="submit_order.php">
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentMethod" name="payment_method" required>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Online Payment</option>
                            </select>
                        </div>
                        <input type="hidden" name="cart_data" id="cart_data">
                        <div class="total-amount"> Total: <span id="final-total">0.00</span> </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="confirmOrder"  data-bs-toggle="modal"
                            data-bs-target="#confirmOrderModal" class="confirmOrder">Confirm Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmOrderModal" tabindex="-1" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmOrderModalLabel">Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="checkoutForm" method="POST" action="submit_order.php">
                        <div class="mb-3">
                           <header class = "receipt-header">
                            <h3>The Good Shots</h3>
                            <p>3 Atis St. Admiral Talon Tres, Las Piñas, Philippines</p>
                           </header>

                            <p>Employee: SuperAdmin</p>
                            <p>POS: </p>
                            
                            <p>Customer: </p>
                            <p>---------------------------------------</p>

                            <p>---------------------------------------</p>
                            <h4>Total</h4>

                            <p>---------------------------------------</p>
                            <?php
                                date_default_timezone_set('Asia/Manila');
                                echo "Date and Time: " . date("Y-m-d h:i:s A");
                                ?>
                        </div>
                        <input type="hidden" name="cart_data" id="cart_data">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Print</button>
                            <button type="button" id="confirmOrderButton" class="confirmOrder">Download PDF</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
    document.getElementById('confirmOrderButton').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;

        const doc = new jsPDF();

        const modalContent = document.querySelector('#confirmOrderModal .modal-body').innerHTML;

        const tempElement = document.createElement('div');
        tempElement.innerHTML = modalContent;

        const textContent = tempElement.innerText || tempElement.textContent;

        doc.text(textContent, 10, 10);

        doc.save('Receipt.pdf');
    });
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let cart = [];
        let totalAmount = 0;
        let isSubmitting = false;

        function addToCart(productName, price, productId) {
            const existingProduct = cart.find(item => item.name === productName);
            if (existingProduct) {
                existingProduct.quantity++;
                existingProduct.totalPrice += price;
            } else {
                cart.push({ name: productName, price: price, quantity: 1, totalPrice: price, productId: productId });
            }
            updateCart();
        }

        function updateCart() {
            const cartBody = document.getElementById('cart-body');
            cartBody.innerHTML = '';
            totalAmount = 0;

            cart.forEach(item => {
                totalAmount += item.totalPrice;
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>P${item.totalPrice.toFixed(2)}</td>
                        <td><button class="btn-removeCart" onclick="removeFromCart('${item.name}')"><img src="icons/delete-svgrepo-com.svg" alt="" class="icons"></button></td>
                    `;
                cartBody.appendChild(row);
            });

            document.getElementById('total-amount').innerText = totalAmount.toFixed(2);
            document.getElementById('cart_data').value = JSON.stringify(cart);
        }

        function removeFromCart(productName) {
            cart = cart.filter(item => item.name !== productName);
            updateCart();
        }

        document.getElementById('checkoutForm').addEventListener('submit', function (event) {
            event.preventDefault();

            if (isSubmitting) return;
            isSubmitting = true;

            const formData = new FormData(this);
            const cartData = JSON.stringify(cart);
            formData.append('cart_data', cartData);

            document.getElementById('confirmOrderButton').disabled = true;

            fetch('submit_order.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.text();
                })
                .then(data => {
                    alert(data);

                })
                .catch(error => {
                    alert('There was a problem with your order: ' + error.message);
                })
                .finally(() => {
                    isSubmitting = false;
                    document.getElementById('confirmOrderButton').disabled = false;
                });
        });
    </script>
    </div>
</body>

</html>