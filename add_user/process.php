<?php
// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

// Insert data into the 'users' table
$insert_query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";
if (mysqli_query($connection, $insert_query)) {
    echo "Successfully Registered";
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
}