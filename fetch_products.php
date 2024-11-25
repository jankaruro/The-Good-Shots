<?php
include('connection.php');

// Check if the 'supplier' parameter is set in the GET request
if (isset($_GET['supplier'])) {
    // Sanitize the supplier name to prevent SQL injection
    $supplier_name = htmlspecialchars($_GET['supplier'], ENT_QUOTES, 'UTF-8');

    try {
        // Prepare the SQL statement to fetch products for the specified supplier
        $stmt = $conn->prepare("SELECT product_name, price FROM supplier_products WHERE supplier = :supplier_name");
        $stmt->bindParam(':supplier_name', $supplier_name, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Fetch all results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are any results and output them as options
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<option value='" . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . "' data-price='" . htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . "</option>";
            }
        } else {
            echo "<option value=''>No products found for this supplier</option>";
        }
    } catch (PDOException $e) {
        // Handle errors
        echo "<option value=''>Error fetching products</option>";
        error_log("Database error: " . $e->getMessage()); // Log the error message for debugging
    }

    // Close the database connection
    $conn = null;
} else {
    echo "<option value=''>Please select a supplier first</option>";
}
?>