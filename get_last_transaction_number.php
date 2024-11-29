<?php
session_start();
include('connection.php'); // Ensure connection is included at the beginning

// Fetch the last transaction number
$query = "SELECT po_number FROM purchase_orders ORDER BY created_at DESC LIMIT 1"; // Adjust column name as needed
$result = $conn->query($query);

if ($result) {
    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['last_number' => $row['po_number']]); // Adjust to the correct column name
    } else {
        echo json_encode(['last_number' => 'PORD0000']); // Fallback if no records found
    }
} else {
    // Log the error if the query fails
    echo json_encode(['error' => $conn->errorInfo()]);
}
?>