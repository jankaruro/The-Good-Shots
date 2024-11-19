<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "inventory_management");

//add
if(isset($_POST['save_data']))
{
    $itemName = $_POST['itemName'];
    $quantity = $_POST['quantity'];
    $grams = $_POST['grams'];
    $expiryDate = $_POST['expiryDate'];

    $insert_query = "INSERT INTO inventory(item_Name, Quantity, grams_per_unit, Expiry_Date) VALUES ('$itemName', '$quantity', '$grams', '$expiryDate')";
    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run) {
        $_SESSION['status'] = "Data added successfully";
        header('location: inventoryManage.php');
    } else {
        $_SESSION['status'] = "Data add failed";
        header('location: inventoryManage.php');
    }
}

//view
if (isset($_POST['click_view_btn'])) {
    $id = $_POST['inventory_id'];

    $fetch_query = "SELECT * FROM inventory WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['ID'] . '</h6>
        <h6>Item Name: ' . $row['Item_Name'] . '</h6>
        <h6>Quantity: ' . $row['Quantity'] . '</h6>
         <h6>Grams Per Item: ' . $row['grams_per_unit'] . '</h6>
        <h6>Expiry Date: ' . $row['Expiry_Date'] . '</h6>
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

    $fetch_query = "SELECT * FROM inventory WHERE id = '$id'";
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
    $itemName = $_POST['itemName'];
    $quantity = $_POST['quantity'];
    $grams = $_POST['grams'];
    $expiryDate = $_POST['expiryDate'];

    $update_query = "UPDATE inventory SET Item_Name = '$itemName', Quantity = '$quantity', grams_per_unit = '$grams', Expiry_Date = '$expiryDate' WHERE ID = '$id'";
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
