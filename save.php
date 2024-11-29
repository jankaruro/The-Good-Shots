<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transactionNumber = $_POST['transactionNumber'];
    $transactionDate = $_POST['transactionDate'];
   // $supplierName = $_POST['supplierName'];
    $totalAmount = $_POST['totalAmount'];
    $products = json_decode($_POST['products'], true);

    try {
        // Ensure the column names are correct
        $stmt = $conn->prepare("INSERT INTO purchase_orders (po_number, created_at,total_amount) VALUES (:transactionNumber, NOW(),  :totalAmount)");
        $stmt->bindParam(':transactionNumber', $transactionNumber);
        //$stmt->bindParam(':supplierName', $supplierName);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->execute();

        $lastId = $conn->lastInsertId();
        foreach ($products as $product) {
            // Make sure 'price' is a valid column in the purchase_order_details table
            $stmt = $conn->prepare("INSERT INTO purchase_order_details (po_id, product_name, unit_price, quantity) VALUES (:po_id, :product_name, :price, :quantity)");
            $stmt->bindParam(':po_id', $lastId);
            $stmt->bindParam(':product_name', $product['name']);
            $stmt->bindParam(':price', $product['price']); // Ensure this column exists
            $stmt->bindParam(':quantity', $product['quantity']);
            $stmt->execute();
        }

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>