<?php

session_start();
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

//insert add user
if (isset($_POST['save_user'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
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
        $insert_query = "INSERT INTO users (first_name, last_name, email,username, password, role) VALUES ('$first_name', '$last_name', '$email','$username', '$password', '$role')";
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

if (isset($_POST['add_supplier'])) {
    $supplier_name = htmlspecialchars($_POST['supplier_name']);
    $contact_number = htmlspecialchars($_POST['contact_number']);
    $status = htmlspecialchars($_POST['status']);

    // Check if supplier already exists
    $stmt = $connection->prepare("SELECT * FROM suppliers WHERE supplier_name = ?");
    $stmt->bind_param("s", $supplier_name);
    $stmt->execute();
    $check_supplier_name_result = $stmt->get_result();

    if ($check_supplier_name_result->num_rows > 0) {
        $_SESSION['status'] = "Supplier already exists!";
        header("Location: addsupplier.php");
        exit();
    } else {
        // Insert new supplier
        $insert_stmt = $connection->prepare("INSERT INTO suppliers (supplier_name, contact_number, status) VALUES (?, ?, ?)");
        $insert_stmt->bind_param("sss", $supplier_name, $contact_number, $status);
        
        if ($insert_stmt->execute()) {
            $_SESSION['status'] = "Supplier added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . $insert_stmt->error;
        }
        header("Location: addsupplier.php");
        exit();
    }
}


// View Supplier
if (isset($_POST['click_view_supp_btn'])) {
    $id = $_POST['supplier_id'];

    $fetch_query = $connection->prepare("SELECT * FROM suppliers WHERE id = ?");
    $fetch_query->bind_param("i", $id);
    $fetch_query->execute();
    $fetch_query_run = $fetch_query->get_result();

    if ($fetch_query_run->num_rows > 0) {
        while ($row = $fetch_query_run->fetch_assoc()) {
            echo '
            <h6>ID: ' . $row['id'] . '</h6>
            <h6>Supplier Name: ' . $row['supplier_name'] . '</h6>
            <h6>Contact Number: ' . $row['contact_number'] . '</h6>
            <h6>Status: ' . $row['status'] . '</h6>
            ';
        }
    } else {
        echo '<h4>No records found</h4>';
    }
}

// Edit Supplier
if (isset($_POST['click_edit_supp_btn'])) {
    $id = $_POST['supplier_id'];
    $arrayresult = [];

    $fetch_query = $connection->prepare("SELECT * FROM suppliers WHERE id = ?");
    $fetch_query->bind_param("i", $id);
    $fetch_query->execute();
    $fetch_query_run = $fetch_query->get_result();

    if ($fetch_query_run->num_rows > 0) {
        while ($row = $fetch_query_run->fetch_assoc()) {
            array_push($arrayresult, $row);
        }
        header('Content-Type: application/json');
        echo json_encode($arrayresult);
    } else {
        echo '<h4>No records found</h4>';
    }
}

// Update Supplier
if (isset($_POST['update_supplier'])) {
    $id = $_POST['id'];
    $supplier_name = $_POST['suppliername'];
    $contact_number = $_POST['contactnumber'];
    $status = $_POST['status'];

    // Prepare the update query
    $update_query = $connection->prepare("UPDATE suppliers SET supplier_name = ?, contact_number = ?, status = ? WHERE id = ?");
    $update_query->bind_param("sssi", $supplier_name, $contact_number, $status, $id);

    // Execute the update query
    if ($update_query->execute()) {
        $_SESSION['status'] = "Data updated successfully";
        header('Location: addsupplier.php');
        exit();
    } else {
        $_SESSION['status'] = "Data update failed: " . $update_query->error;
        header('Location: addsupplier.php');
        exit();
    }
}

// Delete Supplier
if (isset($_POST['click_delete_supp_btn'])) {
    $id = $_POST['supplier_id'];
    $delete_query = $connection->prepare("DELETE FROM suppliers WHERE id = ?");
    $delete_query->bind_param("i", $id);
    if ($delete_query->execute()) {
        echo "Data deleted successfully";
    } else {
        echo "Data deletion failed: " . $delete_query->error;
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
if (isset($_POST['add_supp_product'])) {
    // Retrieve form data
    $supplier = $_POST['supplier'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity']; // Assuming you're adding this field
    $unit = $_POST['unit']; // Assuming you're adding this field
    $reorder_level = $_POST['reorder_level']; // Assuming you're adding this field

    // Connect to the database
    include('connection.php');

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO supplier_products (supplier, product_name, price, quantity, unit, reorder_level) VALUES (:supplier, :product_name, :price, :quantity, :unit, :reorder_level)");

    // Bind parameters
    $stmt->bindParam(':supplier', $supplier);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':unit', $unit);
    $stmt->bindParam(':reorder_level', $reorder_level);

    // Execute the statement
    try {
        $stmt->execute();
        $_SESSION['status'] = "Product added successfully!";
    } catch (PDOException $e) {
        $_SESSION['status'] = "Error: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;

    // Redirect back to the form page
    header("Location: addsupplier_product.php"); // Change this to your form page
    exit();
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
    $product = $_POST['product_name']; // Change this to match form field name
    $package_quantity = $_POST['package_quantity'];
    $measurement_per_package = $_POST['measurement_per_package'];
    $total_measurement = $_POST['total_measurement'];
    $unit = $_POST['unit'];
    $Expiry_Date = $_POST['Expiry_Date'];

    // Check if product already exists
    $check_product_name_query = "SELECT * FROM inventory WHERE product_name = ?";
    $stmt = $connection->prepare($check_product_name_query);
    $stmt->bind_param("s", $product);
    $stmt->execute();
    $check_product_result = $stmt->get_result();

    if ($check_product_result->num_rows > 0) {
        $_SESSION['status'] = "Item already exists!";
        header("Location: inventoryManage.php");
        exit();
    } else {
        $insert_query = "INSERT INTO inventory (supplier, product_name, package_quantity, measurement_per_package, total_measurement, unit, Expiry_Date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insert_query);
        $stmt->bind_param("ssissss", $supplier, $product, $package_quantity, $measurement_per_package, $total_measurement, $unit, $Expiry_Date);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Supplier Product added successfully!";
        } else {
            $_SESSION['status'] = "Error: " . $stmt->error;
        }
        header("Location: inventoryManage.php");
        exit();
    }
}




//view inventory
if (isset($_POST['click_view_inventory_btn'])) {
    $id = $_POST['inventory_id'];

    $fetch_query = "SELECT * FROM inventory WHERE id = ?";
    $stmt = $connection->prepare($fetch_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $fetch_query_run = $stmt->get_result();

    if ($fetch_query_run->num_rows > 0) {
        while ($row = $fetch_query_run->fetch_assoc()) {
            echo '
            <h6>ID: ' . htmlspecialchars($row['id']) . '</h6>
            <h6>Supplier: ' . htmlspecialchars($row['supplier']) . '</h6>
            <h6>Product Name: ' . htmlspecialchars($row['product_name']) . '</h6>
            <h6>Package Quantity: ' . htmlspecialchars($row['package_quantity']) . '</h6>
            <h6>Measurement Per Package: ' . htmlspecialchars($row['measurement_per_package']) . '</h6>
            <h6>Total Measurement: ' . htmlspecialchars($row['total_measurement']) . '</h6>
            <h6>Unit: ' . htmlspecialchars($row['unit']) . '</h6>
            <h6>Expiration Date: ' . htmlspecialchars($row['Expiry_Date']) . '</h6>
            ';
        }
    } else {
        echo '<h4>No records found</h4>';
    }
}
//edit inventory
if (isset($_POST['inventory'])) {
    $supplier = $_POST['supplier'];
    $stmt = $connection->prepare("SELECT product_name FROM products WHERE supplier_name = :supplier");
    $stmt->bindParam(':supplier', $supplier);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $productOptions = '';
    if (count($products) > 0) {
        foreach ($products as $product) {
            $productOptions .= "<option value='" . htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') . "</option>";
        }
    } else {
        $productOptions = "<option value=''>No products found</option>";
    }

    echo $productOptions;
}



// Update inventory
if (isset($_POST['update_inventory'])) {
    $id = $_POST['id']; // Ensure you retrieve the user ID
    $supplier = $_POST['supplier'];
    $product = $_POST['product_name'];
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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



// Insert product
if (isset($_POST['add_product'])) {
    // Debugging output
    echo "Form submitted. Processing...<br>";

    $product_name = htmlspecialchars($_POST['productname']);
    $price = floatval($_POST['price']);
    $category = htmlspecialchars($_POST['category']);

    // Debugging output
    echo "Product Name: $product_name, Price: $price, Category: $category<br>";

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "images/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $newFileName = uniqid() . '_' . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $newFileName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $_SESSION['status'] = "Error uploading file.";
            header('Location: addproduct.php');
            exit();
        }
    } else {
        $_SESSION['status'] = "Please upload an image.";
        header('Location: addproduct.php');
        exit();
    }

    // Prepare the SQL statement to insert into the product_ingredients table
    $stmt = $connection->prepare("INSERT INTO product (product_name, image, price, category) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    // Bind parameters
    $stmt->bind_param("ssds", $product_name, $targetFilePath, $price, $category);

    if ($stmt->execute()) {
        $product_id = $stmt->insert_id;

        // Handle the ingredients
        if (isset($_POST['ingredient_name']) && is_array($_POST['ingredient_name'])) {
            $ingredientNames = $_POST['ingredient_name'];
            $quantities = $_POST['quantity'];
            $units = $_POST['unit'];

            // Prepare the SQL statement for inserting into product_ingredients_detail
            $ingredientStmt = $connection->prepare("INSERT INTO product_ingredients_detail (product_id, ingredient_name, quantity, unit) VALUES (?, ?, ?, ?)");
            if ($ingredientStmt === false) {
                error_log("Prepare failed for ingredients: " . htmlspecialchars($connection->error));
                $_SESSION['status'] = "Error preparing ingredients statement.";
                header('Location: addproduct.php');
                exit();
            }

            // Loop through each ingredient and insert it into the database
            foreach ($ingredientNames as $index => $ingredientName) {
                $ingredientName = htmlspecialchars($ingredientName);
                $quantity = floatval($quantities[$index]);
                $unit = htmlspecialchars($units[$index]);

                $ingredientStmt->bind_param("isds", $product_id, $ingredientName, $quantity, $unit);
                if (!$ingredientStmt->execute()) {
                    error_log("Insert failed for product_ingredients_detail: " . $ingredientStmt->error);
                    $_SESSION['status'] = "Error inserting ingredient: " . $ingredientStmt->error;
                }
            } 
            // Close the ingredient statement
            $ingredientStmt->close();
        }
    } else {
        error_log("Insert failed: " . $stmt->error);
        $_SESSION['status'] = "Error: " . $stmt->error;
    }

    // Close the product statement
    $stmt->close();

    // Redirect back to the add product page
    header('Location: addproduct.php');
    exit();
}

// View product
if (isset($_POST['click_view_product_btn'])) {
    $id = $_POST['product_id']; // Make sure to get the product ID from the request
    $stmt = $connection->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'html' => '
        <h6>ID: ' . htmlspecialchars($row['product_id']) . '</h6>
        <h6>Product: ' . htmlspecialchars($row['product_name']) . '</h6>
        <h6>Price: ' . htmlspecialchars($row['price']) . '</h6>
        <h6>Category: ' . htmlspecialchars($row['category']) . '</h6>
        <h6>Image: <img src="' . htmlspecialchars($row['image_url']) . '" style="max-width: 100px;"></h6>
    '
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No records found']);
    }
}

// Edit product
if (isset($_POST['click ```php
_edit_product_btn'])) {
    $id = $_POST['product_id']; // Make sure to get the product ID from the request
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['message' => 'No records found']);
    }
}

// Update product
if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = htmlspecialchars($_POST['productname']);
    $price = floatval($_POST['price']);
    $category = htmlspecialchars($_POST['category']);
    $newFileName = null;

    // Check if a new file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);

        if (in_array($fileType, $allowedTypes)) {
            $targetDir = "uploads/";
            $newFileName = uniqid() . '_' . basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $newFileName;

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                echo "Error uploading file.";
                exit();
            }
        } else {
            echo "Invalid file type. Please upload an image.";
            exit();
        }
    }

    // Update the product in the database
    try {
        $query = "UPDATE products SET product_name = ?, price = ?, category = ?";
        if ($newFileName) {
            $query .= ", image_url = ?";
        }
        $query .= " WHERE product_id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param('sdssi', $product_name, $price, $category, $newFileName, $product_id);
        $stmt->execute();

        // Update ingredients if provided
        if (isset($_POST['ingredient_name']) && is_array($_POST['ingredient_name'])) {
            foreach ($_POST['ingredient_name'] as $index => $ingredient_name) {
                $quantity = floatval($_POST['quantity'][$index]);
                $unit = htmlspecialchars($_POST['unit'][$index]);

                // Prepare the SQL statement to insert into the ingredients table
                $ingredient_stmt = $conn->prepare("INSERT INTO ingredients (ingredient_name, product_id, quantity, unit) VALUES (?, ?, ?, ?)");
                if ($ingredient_stmt === false) {
                    die('Prepare failed: ' . htmlspecialchars($conn->error));
                }

                // Bind parameters
                $ingredient_stmt->bind_param("siis", $ingredient_name, $product_id, $quantity, $unit);
                $ingredient_stmt->execute();
                $ingredient_stmt->close();
            }
        }

        echo "Product updated successfully.";
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}

if (isset($_POST['click_delete_product_btn'])) {
    $id = $_POST['productid']; // Make sure to get the product ID from the request
    try {
        $stmt = $conn->prepare("DELETE FROM product WHERE product_id = ?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            // Return a JSON response
            echo json_encode(['success' => true]);
            exit();
        } else {
            // Return a JSON response for failure
            echo json_encode(['success' => false, 'message' => 'Delete failed']);
            exit();
        }
    } catch (PDOException $e) {
        // Return a JSON response for database error
        echo json_encode(['success' => false, 'message' => 'Database Error: ' . $e->getMessage()]);
        exit();
    }
}


//////////////////////////////////////////////////////////////////////////////////





// Assuming the database connection is already included and initialized





