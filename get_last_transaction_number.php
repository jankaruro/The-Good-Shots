<?php
header('Content-Type: application/json');
include('connection.php');

try {
    $query = "SELECT MAX(po_number) AS last_number FROM purchase_orders";
    $stmt = $conn->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $lastNumber = $result['last_number'] ?? 'PORD0000'; // Default to 'PORD0000' if no records exist
    echo json_encode(['last_number' => $lastNumber]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>