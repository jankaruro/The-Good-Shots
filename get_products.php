<?php
// Check if supplier is set
if(isset($_POST['supplier'])) {
    $supplier = $_POST['supplier'];

    // Connect to the database
    include('inventory_management/connection.php');

    // Retrieve products based on the selected supplier
    $stmt = $conn->prepare("SELECT product_name FROM supplier_products WHERE supplier_name = ?");
    $stmt->execute([$supplier]);
    $result = $stmt->fetchAll();

    // Check if there are any products
    if (count($result) > 0) {
        // Output the products as options
        foreach ($result as $row) {
            echo "<option value='" . $row['product_name'] . "'>" . $row['product_name'] . "</option>";
        }
    } else {
        echo "<option value=''>No products found</option>";
    }

    // Close the database connection
    $conn = null;
}
?>
