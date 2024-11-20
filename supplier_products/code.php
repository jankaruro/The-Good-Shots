<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

//add
if(isset($_POST['save_data']))
{
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
   

    $insert_query = "INSERT INTO supplier_products(supplier, product_name, price) VALUES ('$supplier', '$product_name', '$price')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run) {
        $_SESSION['status'] = "Data added successfully";
        header('location: addsupplier_product.php');
    } else {
        $_SESSION['status'] = "Data add failed";
        header('location: addsupplier_product.php');
    }
}

//view
if (isset($_POST['click_view_btn'])) {
    $id = $_POST['inventory_id'];

    $fetch_query = "SELECT * FROM supplier_products WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['supplier'] . '</h6>
        <h6>Item Name: ' . $row['product_name'] . '</h6>
        <h6>Quantity: ' . $row['price'] . '</h6>
        
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit
if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['inventory_id'];
    $arrayresult = [];

    $fetch_query = "SELECT * FROM supplier_products WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
        
            array_push($arrayresult, $row);
            header('content-type: application/json');
            echo json_encode($arrayresult);

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}
//update
if (isset($_POST['update_data'])){

    $id = $_POST['id'];
    $itemName = $_POST['supplier'];
    $quantity = $_POST['product_name'];
    $grams = $_POST['price'];


    $update_query = "UPDATE supplier_products SET supplier = '$supplier', product_name = '$product_name', price = '$price' WHERE ID = '$id'";
    $update_query_run = mysqli_query($connection, $update_query);

    if($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: inventoryManage.php');
    } else {
        $_SESSION['status'] = "Data update failed";
        header('location: inventoryManage.php');
    }
}

//delete
if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['inventory_id'];
    $delete_query = "DELETE FROM inventory WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "data deleted successfully";
    } else {

        echo "data deletion failed";
    }

}

?>
