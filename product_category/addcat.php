<?php

session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");
/*View Data */
if (isset($_POST['click_view_btn'])) {
    $id = $_POST['user_id'];
    /*echo $id;*/

    $fetch_query = "SELECT * FROM category WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['id'] . '</h6>
        <h6>Name: ' . $row['name'] . '</h6>
        <h6>Description:' .$row['description'];' ?></h6>
      
';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}
/*View Data */

/*------------*/

/*Edit Data */
if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['user_id'];
    $arrayresult = [];
    /*echo $id;*/

    $fetch_query = "SELECT * FROM category WHERE id = '$id'";
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
/*Edit Data */


/*------------*/

/*Update Data */

if (isset($_POST['update_data'])) {
    // Get form data
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
   

    $update_query = "UPDATE category SET name = '$name', description = '$description'";
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: index.php');
    } else {
        $_SESSION['status'] = "Data not updated successfully";
        header('location: index.php');

    }

}


/*Update Data */



if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['user_id'];
    $delete_query = "DELETE FROM category WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "data deleted successfully";
    } else {

        echo "data deletion failed";
    }

}






