<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgs_inventory"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die(json_encode(array('status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  
    if (isset($_FILES["image"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo json_encode(array('status' => 'error', 'message' => 'File is not an image.'));
            exit;
        }
    }

  
    if ($_FILES["image"]["size"] > 5000000) {
        echo json_encode(array('status' => 'error', 'message' => 'Sorry, your file is too large.'));
        exit;
    }

   
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo json_encode(array('status' => 'error', 'message' => 'Sorry, only JPG, JPEG, and PNG files are allowed.'));
        exit;
    }


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert product data into database
        $sql = "INSERT INTO product (productname, image, price, category) VALUES ('$productname', '$image_name', '$price', '$category')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('status' => 'success', 'message' => 'Product added successfully!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error: ' . $conn->error));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Sorry, there was an error uploading your file.'));
    }
}

$conn->close();
?>
