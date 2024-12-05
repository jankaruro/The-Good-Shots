<?php
require_once 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paymentMethod = $_POST['payment_method'];
    $cartData = json_decode($_POST['cart_data'], true);
    $totalAmount = 0;

    // Validate cart data
    if (empty($cartData)) {
        echo "Cart data is empty.";
        exit; // Stop further execution
    }

    // Calculate total amount
    foreach ($cartData as $item) {
        $totalAmount += $item['totalPrice'];
    }

    try {
        // Insert into completed_orders
        $stmt = $conn->prepare("INSERT INTO completed_orders (order_date, payment_method, total_amount, paid) VALUES (NOW(), ?, ?, 'No')");
        $stmt->execute([$paymentMethod, $totalAmount]);
        $orderId = $conn->lastInsertId();

        // Insert into completed_orders_details and deduct ingredients
        foreach ($cartData as $item) {
            // Insert order details
            $stmt = $conn->prepare("INSERT INTO completed_orders_details (order_id, product_id, product_name, quantity, price_total) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$orderId, $item['productId'], $item['name'], $item['quantity'], $item['totalPrice']]);

            // Fetch product ingredients
            $ingredients = getProductIngredients($item['productId']);
            foreach ($ingredients as $ingredient) {
                // Deduct from inventory based on the quantity ordered
                $totalQuantityNeeded = $ingredient['quantity'] * $item['quantity']; // Use the quantity from product_ingredients_detail
                deductFromInventory($ingredient['ingredient_name'], $totalQuantityNeeded);
            }
        }

        // Insert into payments table
        $paymentReference = uniqid(); // Generate a unique payment reference
        $stmt = $conn->prepare("INSERT INTO payments (order_id, payment_method, payment_reference, amount_paid, payment_date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$orderId, $paymentMethod, $paymentReference, $totalAmount]);

        echo "Order placed successfully!";
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
    }
}

// Function to fetch product ingredients
function getProductIngredients($productId) {
    global $conn; // Use the global connection variable
    $stmt = $conn->prepare("SELECT ingredient_name, quantity FROM product_ingredients_detail WHERE product_id = ?");
    $stmt->execute([$productId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to deduct from inventory
// Function to deduct from inventory
function deductFromInventory($ingredientName, $quantity) {
    global $conn; // Use the global connection variable
    // Check current inventory level using product_name instead of ingredient_name
    $stmt = $conn->prepare("SELECT total_measurement FROM inventory WHERE product_name = ?");
    $stmt->execute([$ingredientName]); // Assuming ingredientName corresponds to product_name
    $currentMeasurement = $stmt->fetchColumn();

    if ($currentMeasurement !== false && $currentMeasurement >= $quantity) {
        // Deduct from inventory only if sufficient stock is available
        $stmt = $conn->prepare("UPDATE inventory SET total_measurement = total_measurement - ? WHERE product_name = ?");
        $stmt->execute([$quantity, $ingredientName]);
    } else {
        // Handle insufficient inventory case
        echo "Insufficient inventory for ingredient: " . $ingredientName;
        exit; // Stop further execution
    }
}