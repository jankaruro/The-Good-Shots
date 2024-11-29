<?php
include('connection.php');

$query = "SELECT last_number FROM transactions ORDER BY created_at DESC LIMIT 1"; // Adjust your query accordingly
$result = $conn->query($query);
$lastNumber = $result ? $result->fetchColumn() : 'PORD0000'; // Default value if no records found

header('Content-Type: application/json');
echo json_encode(['last_number' => $lastNumber]);{
    "last_number": "PORD0001"
}
?>