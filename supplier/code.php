<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

//add
if (isset($_POST['addsupp'])) {
    $supplier_name = mysqli_real_escape_string($connection, $_POST['supplier_name']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $contact_person = mysqli_real_escape_string($connection, $_POST['contact_person']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);

    $insert_query = "INSERT INTO suppliers (supplier_name, address, contact_person, email, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssss", $supplier_name, $address, $contact_person, $email, $status);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['status'] = "Data added successfully";
        header('location: addsupplier.php');
    } else {
        $_SESSION['status'] = "Data add failed: " . mysqli_error($connection);
        header('location: addsupplier.php');
    }

    mysqli_stmt_close($stmt);
}

//view
if (isset($_POST['click_view_btn'])) {
    
   
    $id = $_POST['id'];

    $fetch_query = "SELECT * FROM suppliers WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['ID'] . '</h6>
        <h6>Supplier Name: ' . $row['supplier_name'] . '</h6>
        <h6>Address: ' . $row['address'] . '</h6>
         <h6>Contact Person: ' . $row['contact_person'] . '</h6>
        <h6>Email: ' . $row['email'] . '</h6>
        <h6>Status: ' . $row['status'] . '</h6>
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit
if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['id'];
    $arrayresult = [];

    $fetch_query = "SELECT * FROM suppliers WHERE id = '$id'";
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
    $suppliername = $_POST['supplier_name'];
    $add = $_POST['address'];
    $person = $_POST['contact_person'];
    $emai = $_POST['email'];
    $status = $_POST['status'];

    $update_query = "UPDATE inventory SET supplier_name = '$suppliername', Quantity = '$add', address = '$grams', contact_person = '$person', email = '$emai' , status = '$status'WHERE ID = '$id'";
    $update_query_run = mysqli_query($connection, $update_query);

    if($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: addsupplier.php');
    } else {
        $_SESSION['status'] = "Data update failed";
        header('location: addsupplier.php');
    }
}

//delete
if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['id'];
    $delete_query = "DELETE FROM suppliers WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "data deleted successfully";
    } else {

        echo "data deletion failed";
    }

}

?>
