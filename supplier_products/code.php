<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

// Add
if (isset($_POST['save_data'])) {
    $supplier = $_POST['supplier'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];

    $insert_query = "INSERT INTO supplier_products (supplier, product_name, price) VALUES ('$supplier', '$productName', '$price')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if ($insert_query_run) {
        $_SESSION['status'] = "Data added successfully";
        header('Location: addsupplier_product.php');
    } else {
        $_SESSION['status'] = "Data add failed";
        header('Location: addsupplier_product.php');
    }
}

// View
if (isset($_POST['click_view_btn'])) {
    $id = $_POST['inventory_id'];

    $fetch_query = "SELECT * FROM inventory WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);

    if (mysqli_num_rows($fetch_query_run) > 0) {
        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
                <h6>ID: ' . $row['ID'] . '</h6>
                <h6>Supplier: ' . $row['supplier'] . '</h6>
                <h6>Product Name: ' . $row['product_name'] . '</h6>
                <h6>Price: ' . $row['price'] . '</h6>
            ';
        }
    } else {
        echo '<h4>No records found</h4>';
    }
}

// Edit
if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['inventory_id'];
    $arrayresult = [];

    $fetch_query = "SELECT * FROM inventory WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);

    if (mysqli_num_rows($fetch_query_run) > 0) {
        while ($row = mysqli_fetch_array($fetch_query_run)) {
            array_push($arrayresult, $row);
            header('Content-Type: application/json');
            echo json_encode($arrayresult);
        }
    } else {
        echo '<h4>No records found</h4>';
    }
}

// Update
if (isset($_POST['update_data'])) {
    $id = $_POST['id'];
    $supplier = $_POST['supplier'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];

    $update_query = "UPDATE inventory SET supplier = '$supplier', product_name = '$productName', price = '$price' WHERE ID = '$id'";
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('Location: inventoryManage.php');
    } else {
        $_SESSION['status'] = "Data update failed";
        header('Location: inventoryManage.php');
    }
}

// Delete
if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['inventory_id'];
    $delete_query = "DELETE FROM inventory WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "Data deleted successfully";
    } else {
        echo "Data deletion failed";
    }
}

?>
