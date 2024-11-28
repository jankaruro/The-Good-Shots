<?php
include('connection.php');

$data = json_decode(file_get_contents('php://input'), true);

$product_name = $data['product_name'];
$unit_price = $data['unit_price'];
$total_amount = $data['total_amount'];

try {
    $stmt = $conn->prepare("INSERT INTO temporary_po (product_name, unit_price, total_amount) VALUES (?, ?, ?)");
    $stmt->execute([$product_name, $unit_price, $total_amount]);
    echo "Product added to temporary table.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
