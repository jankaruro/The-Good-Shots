<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transactionNumber = $_POST['transactionNumber'];
    $transactionDate = $_POST['transactionDate'];
    $totalAmount = $_POST['totalAmount'];
    $products = json_decode($_POST['products'], true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['success' => false, 'message' => 'Invalid products data']);
        exit();
    }

    try {
        // Insert transaction into purchase_orders table
        $insert_query = "INSERT INTO purchase_orders (po_number, created_at, qty_received, total_amount) 
                         VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->execute([$transactionNumber, $transactionDate, 0, $totalAmount]);

        // Insert products into the purchase_order_details table
        foreach ($products as $product) {
            $product_name = $product['name'];
            $unit_price = $product['price'];
            $quantity = $product['quantity'];
            $amount = $unit_price * $quantity; // Calculate the total amount for this product

            // Insert product details into purchase_order_details
            $insert_product_query = "INSERT INTO purchase_order_details (po_id, product_name, unit_price, quantity, qty_received, amount) 
                                     VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_product = $conn->prepare($insert_product_query);
            $stmt_product->execute([$transactionNumber, $product_name, $unit_price, $quantity, 0, $amount]);
        }

        if ($stmt->rowCount() > 0) {
            $_SESSION['status'] = "Transaction saved successfully!";
            echo json_encode(['success' => true, 'message' => 'Transaction saved successfully with Pending status!']);
        } else {
            $_SESSION['status'] = "Error: " . $stmt->errorInfo()[2];
            echo json_encode(['success' => false, 'message' => 'Error saving transaction.']);
        }
    } catch (PDOException $e) {
        $_SESSION['status'] = "Database error: " . $e->getMessage();
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
    exit();
}
?>