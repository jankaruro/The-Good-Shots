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
    $productname = $_POST['product_name']; // Ensure this matches the form input name
    $price = $_POST['price'];
    $category = $_POST['category'];
  
    if($_FILES["image"]["error"] == 4){
      echo "<script>alert('Image Does Not Exist');</script>";
    } else {
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo "<script>alert('Invalid Image Extension');</script>";
      } else if($fileSize > 1000000){
        echo "<script>alert('Image Size Is Too Large');</script>";
      } else {
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        $uploadFolder = 'img/';
        if (!is_dir($uploadFolder)) {
          mkdir($uploadFolder, 0777, true);
        }
  
        if (move_uploaded_file($tmpName, $uploadFolder . $newImageName)) {
          $stmt = $conn->prepare("INSERT INTO product (product_name, image, price, category) VALUES (:productname, :image, :price, :category)");
          $stmt->bindParam(':productname', $productname);
          $stmt->bindParam(':image', $newImageName);
          $stmt->bindParam(':price', $price);
          $stmt->bindParam(':category', $category);
          $stmt->execute();
  
          echo "<script>alert('Successfully Added'); document.location.href = 'addproduct.php';</script>";
        } else {
          echo "<script>alert('Failed to upload image');</script>";
        }
      }
    }
}

// View product
if (isset($_POST['click_view_product_btn'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode([
            'success' => true,
            'html' => '
        <h6>ID: ' . htmlspecialchars($row['id']) . '</h6>
        <h6>Product: ' . htmlspecialchars($row['product_name']) . '</h6>
        <h6>Price: ' . htmlspecialchars($row['price']) . '</h6>
        <h6>Category: ' . htmlspecialchars($row['category']) . '</h6>
        <h6>Image: <img src="' . htmlspecialchars($row['image']) . '" style="max-width: 100px;"></h6>
    '
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No records found']);
    }
}
// Edit product
if (isset($_POST['click_edit_product_btn'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $arrayresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($arrayresult);
    } else {
        echo json_encode(['message' => 'No records found']);
    }
}

// Update product
if (isset($_POST['update_product'])) {
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
        $query = "UPDATE products SET product_name = :product_name, price = :price, category = :category";
        if ($newFileName) {
            $query .= ", image = :image";
        }
        $query .= " WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        if ($newFileName) {
            $stmt->bindParam(':image', $newFileName);
        }
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Product updated successfully.";
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
    // Update the product in the database
    try {
        $query = "UPDATE products SET product_name = :product_name, price = :price, category = :category";
        if ($newFileName) {
            $query .= ", image = :image";
        }
        $query .= " WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        if ($newFileName) {
            $stmt->bindParam(':image', $newFileName);
        }
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Product updated successfully.";
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}

// Delete product
if (isset($_POST['click_delete_product_btn'])) {
    try {
        $stmt = $conn->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            $_SESSION['status'] = "Deleted successfully";
            header('Location: addproduct.php');
            exit();
        } else {
            $_SESSION['status'] = "Delete failed";
            header('Location: addproduct.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['status'] = "Database Error: " . $e->getMessage();
        header('Location: addproduct.php');
        exit();
    }
}



//////////////////////////////////////////////////////////////////////////////////





// Assuming the database connection is already included and initialized





