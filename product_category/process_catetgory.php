<?php

$connection = mysqli_connect("localhost", "root", "", "tgs_inventory");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$desription = $_POST['desription'];



$insert_query = "INSERT INTO category (name, description) VALUES ('$name', '$desription')";
if (mysqli_query($connection, $insert_query)) {
    echo "Successfully Registered";
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
}