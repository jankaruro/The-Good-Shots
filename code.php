<?php

session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

//insert add user
if (isset($_POST['save_user'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION['status'] = "Email already exists!";
        header("Location: adduser.php"); // Redirect back to the page
        exit();
    } else {
        // Insert new user
        $insert_query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$first_name', '$last_name', '$email', '$password', '$role')";
        if (mysqli_query($connection, $insert_query)) {
            $_SESSION['status'] = "User  added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($connection);
        }
        header("Location: adduser.php"); // Redirect back to the page
        exit();
    }
}
//view add user
if (isset($_POST['click_view_btn'])) {
    $id = $_POST['user_id'];

    $fetch_query = "SELECT * FROM users WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['id'] . '</h6>
        <h6>First Name: ' . $row['first_name'] . '</h6>
        <h6>Last Name: ' . $row['last_name'] . '</h6>
         <h6>Email: ' . $row['email'] . '</h6>
        <h6>Role    : ' . $row['role'] . '</h6>
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit adduser
if (isset($_POST['click_edit_btn'])) {
    $id = $_POST['user_id'];
    $arrayresult = [];

    $fetch_query = "SELECT * FROM users WHERE id = '$id'";
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

// Update adduser
if (isset($_POST['update_data'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $first_name = $_POST['firstname']; // Ensure you use the correct variable names
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Prepare the update query
    $update_query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password', role = '$role' WHERE id = '$id'";
    
    // Execute the update query
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: adduser.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: adduser.php');
        exit();
    }
}

//delete adduser
if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['user_id'];
    $delete_query = "DELETE FROM users WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "data deleted successfully";
    } else {

        echo "data deletion failed";
    }

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//insert addsupplier
if (isset($_POST['add_supplier'])) {
    $supplier_name = $_POST['supplier_name'];
    $address = $_POST['address'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Check if email already exists
    $check_supplier_name_query = "SELECT * FROM suppliers WHERE supplier_name='$supplier_name'";
    $check_supplier_name_result = mysqli_query($connection, $check_supplier_name_query);

    if (mysqli_num_rows($check_supplier_name_result) > 0) {
        $_SESSION['status'] = "Supplier already exists!";
        header("Location: addsupplier.php"); // Redirect back to the page
        exit();
    } else {
        // Insert new user
        $insert_query = "INSERT INTO suppliers (supplier_name, address, contact_person, email, status) VALUES ('$supplier_name', '$address', '$contact_person', '$email', '$status')";
        if (mysqli_query($connection, $insert_query)) {
            $_SESSION['status'] = "Supplier  added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($connection);
        }
        header("Location: addsupplier.php"); // Redirect back to the page
        exit();
    }
}
//view addsupplier
if (isset($_POST['click_view_supp_btn'])) {
    $id = $_POST['supplier_id'];

    $fetch_query = "SELECT * FROM suppliers WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
            <h6>ID: ' . $row['id'] . '</h6>
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

//edit adduaddsupplierser
if (isset($_POST['click_edit_supp_btn'])) {
    $id = $_POST['supplier_id'];
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

// Update addsupplier
if (isset($_POST['update_supplier'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $supplier_name = $_POST['suppliername']; // Ensure you use the correct variable names
    $address = $_POST['address'];
    $contact_person = $_POST['contactperson'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Prepare the update query
    $update_query = "UPDATE suppliers SET supplier_name = '$supplier_name', address = '$address', contact_person = '$contact_person', email = '$email', status = '$status' WHERE id = '$id'";
    
    // Execute the update query
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: addsupplier.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: addsupplier.php');
        exit();
    }
}

//delete addsupplier
if (isset($_POST['click_delete_supp_btn'])) {
    $id = $_POST['supplier_id'];
    $delete_query = "DELETE FROM suppliers WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "data deleted successfully";
    } else {

        echo "data deletion failed";
    }

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//insert category
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    

    // Check if email already exists
    $check_name_query = "SELECT * FROM category WHERE name='$name'";
    $check_name_result = mysqli_query($connection, $check_name_query);

    if (mysqli_num_rows($check_name_result) > 0) {
        $_SESSION['status'] = "Category already exists!";
        header("Location: addcategory.php"); // Redirect back to the page
        exit();
    } else {
        $insert_query = "INSERT INTO category (name, description) VALUES ('$name', '$description')";
        if (mysqli_query($connection, $insert_query)) {
            $_SESSION['status'] = "Category added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($connection);
        }
        header("Location: addcategory.php"); // Redirect back to the page
        exit();
    }
}
//view category
if (isset($_POST['click_view_category_btn'])) {
    $id = $_POST['category_id'];

    $fetch_query = "SELECT * FROM category WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['id'] . '</h6>
        <h6>Category Name: ' . $row['name'] . '</h6>
        <h6>Description: ' . $row['description'] . '</h6>
         
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit category
if (isset($_POST['click_edit_category_btn'])) {
    $id = $_POST['category_id'];
    $arrayresult = [];

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

// Update category
if (isset($_POST['update_category'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $name = $_POST['name']; // Ensure you use the correct variable names
    $description = $_POST['description'];

    // Prepare the update query
    $update_query = "UPDATE category SET name = '$name', description = '$description' WHERE id = '$id'";
    
    // Execute the update query
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: addcategory.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: addcategory.php');
        exit();
    }
}

//delete category
if (isset($_POST['click_delete_btn'])) {
    $id = $_POST['category_id'];
    $delete_query = "DELETE FROM category WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "Category deleted successfully";
    } else {

        echo "Category deletion failed";
    }

}

?>

