<?php
include('connection.php');

if (isset($_GET['supplier'])) {
    $supplier_name = $_GET['supplier'];

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT product_name FROM supplier_products WHERE supplier = :supplier_name");
        $stmt->bindParam(':supplier_name', $supplier_name, PDO::PARAM_STR);
        
        // Execute the statement
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if there are any results and output them as options
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<option value='" . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['product_name'], ENT_QUOTES, 'UTF-8') . "</option>";
            }
        } else {
            echo "<option value=''>No products found</option>";
        }
    } catch (PDOException $e) {
        // Handle errors
        echo "<option value=''>Error fetching products</option>";
        error_log("Error: " . $e->getMessage());
    }

    // Close the database connection
    $conn = null;
} else {
    echo "<option value=''>Supplier not specified</option>";
}
?>
