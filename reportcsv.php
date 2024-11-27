<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tgs_inventory"; 

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, first_name, last_name, email, role FROM users"; 
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"users_data.csv\"");
    header("Pragma: no-cache");
    header("Expires: 0");

  
    $output = fopen("php://output", "w");

    
    $columns = array('ID', 'First Name', 'Last Name', 'Email', 'Role');
    fputcsv($output, $columns);

   
    while ($row = $result->fetch_assoc()) {
    
        $formatted_row = array(
            $row['id'],
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['role']
        );
        fputcsv($output, $formatted_row);
    }


    fclose($output);
} else {
    echo "No data found.";
}

$conn->close();
exit;
?>
