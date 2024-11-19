<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the form
$company_name = $_POST['company     name'];
$province = $_POST['province'];
$city = $_POST['city'];
$phonenumber = $_POST['password'];


// Insert data into the 'users' table
$insert_query = "INSERT INTO supplier (companyname, province, city, phonenumber) VALUES ('$company_name', '$province', '$city', '$phonenumber')";
if (mysqli_query($connection, $insert_query)) {
    echo "Successfully Registered";
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
}