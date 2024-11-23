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
//////////////////////////////////////////////////////////////////////////////////////////////////////

//insert supplier_products
if (isset($_POST['add_product_supplier'])) {
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    

    // Check if email already exists
    $check_product_name_query = "SELECT * FROM supplier_products WHERE product_name='$product_name'";
    $check_product_name_result = mysqli_query($connection, $check_product_name_query);

    if (mysqli_num_rows($check_product_name_result) > 0) {
        $_SESSION['status'] = "Product already exists!";
        header("Location: addsupplier_product.php"); // Redirect back to the page
        exit();
    } else {
        $insert_query = "INSERT INTO supplier_products (supplier, product_name,price,category) VALUES ('$supplier', '$product_name', '$price', '$category')";
        if (mysqli_query($connection, $insert_query)) {
            $_SESSION['status'] = "Supplier Product added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($connection);
        }
        header("Location: addsupplier_product.php"); // Redirect back to the page
        exit();
    }
}
//view supplier_products
if (isset($_POST['click_view_supplier_product_btn'])) {
    $id = $_POST['supplier_product_id'];

    $fetch_query = "SELECT * FROM supplier_products WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['id'] . '</h6>
        <h6>Supplier: ' . $row['supplier'] . '</h6>
        <h6>Product Name: ' . $row['product_name'] . '</h6>
        <h6>Proce: ' . $row['price'] . '</h6>
        <h6>Category: ' . $row['category'] . '</h6>
         
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit supplier_products
if (isset($_POST['click_edit_supplier_products_btn'])) {
    $id = $_POST['supplier_product_id'];
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

// Update supplier_products
if (isset($_POST['update_supplier_product'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Prepare the update query
    $update_query = "UPDATE supplier_products SET supplier = '$supplier', product_name = '$product_name', price = '$price', category = '$category' WHERE id = '$id'";
    
    // Execute the update query
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: addsupplier_product.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: addsupplier_product.php');
        exit();
    }
}

//delete supplier_products
if (isset($_POST['click_delete_supplier_product_btn'])) {
    $id = $_POST['supplier_product_id'];
    $delete_query = "DELETE FROM supplier_products WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        echo "Category deleted successfully";
    } else {

        echo "Category deletion failed";
    }

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//insert inventory
if (isset($_POST['add_inventory'])) {
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $package_quantity = $_POST['package_quantity'];
    $measurement_per_package = $_POST['measurement_per_package'];
    $total_measurement = $_POST['total_measurement'];
    $category = $_POST['category'];
    $unit = $_POST['unit'];
    $Expiry_Date = $_POST['Expiry_Date'];

    

    // Check if email already exists
    $check_product_name_query = "SELECT * FROM inventory WHERE product_name='$product_name'";
    $check_product_name_result = mysqli_query($connection, $check_product_name_query);

    if (mysqli_num_rows($check_product_name_result) > 0) {
        $_SESSION['status'] = "Product already exists!";
        header("Location: addsupplier_product.php"); // Redirect back to the page
        exit();
    } else {
        $insert_query = "INSERT INTO supplier_products (supplier, product_name,package_quantity,measurement_per_package,
        total_measurement,category,unit,Expiry_Date) VALUES ('$supplier', '$product_name', '$package_quantity'
                                                                        ,'$measurement_per_package','$total_measurement','$category','$unit','$Expiry_Date')";
        if (mysqli_query($connection, $insert_query)) {
            $_SESSION['status'] = "Supplier Product added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . mysqli_error($connection);
        }
        header("Location: inventoryManage.php"); // Redirect back to the page
        exit();
    }
}
//view inventory
if (isset($_POST['click_view_inventory_btn'])) {
    $id = $_POST['inventory_id'];

    $fetch_query = "SELECT * FROM inventory WHERE id = '$id'";
    $fetch_query_run = mysqli_query($connection, $fetch_query);


    if (mysqli_num_rows($fetch_query_run) > 0) {

        while ($row = mysqli_fetch_array($fetch_query_run)) {
            echo '
        <h6>ID: ' . $row['id'] . '</h6>
        <h6>Supplier: ' . $row['supplier'] . '</h6>
        <h6>Product Name: ' . $row['product_name'] . '</h6>
        <h6>Packagge Quantity: ' . $row['package_quantity'] . '</h6>
        <h6>Mesurement Per Package: ' . $row['measurement_per_package'] . '</h6>
        <h6>Total Measurement: ' . $row['total_measurement'] . '</h6>
        <h6>Category: ' . $row['category'] . '</h6>
        <h6>Unit: ' . $row['unit'] . '</h6>
        <h6>Expiration Date: ' . $row['Expiry_Date'] . '</h6>
         
        ';

        }
    } else {
        echo '<h4>no records found</h4>';

    }
}

//edit inventory
if (isset($_POST['click_edit_incentory_btn'])) {
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

// Update inventory
if (isset($_POST['update_supplier_product'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $package_quantity = $_POST['package_quantity'];
    $measurement_per_package = $_POST['measurement_per_package'];
    $total_measurement = $_POST['total_measurement'];
    $category = $_POST['category'];
    $unit = $_POST['unit'];
    $Expiry_Date = $_POST['Expiry_Date'];


    // Prepare the update query
    $update_query = "UPDATE inventory SET supplier = '$supplier', product_name = '$product_name', package_quantity = '$package_quantity'
    , measurement_per_package = '$measurement_per_package' , total_measurement = '$total_measurement'
     , category = '$category'
      , unit = '$unit'
       , Expiry_Date = '$Expiry_Date' WHERE id = '$id'";
    
    // Execute the update query
    $update_query_run = mysqli_query($connection, $update_query);

    if ($update_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: inventoryManage.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: inventoryManage.php');
        exit();
    }
}

//delete inventory
if (isset($_POST['click_delete_inventory_btn'])) {
    $id = $_POST['inventory_id'];
    $delete_query = "DELETE FROM inventory WHERE id='$id'";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Data updated successfully";
        header('location: inventoryManage.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . mysqli_error($connection);
        header('location: inventoryManage.php');
        exit();
    }

}
?>

