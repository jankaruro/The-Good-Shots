<?php
// Start session
session_start();
include('connection.php');

// Handle login
if (isset($_POST['login'])) {
    // Login form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error_message = '';
    // Prepare the SQL query to fetch the user
    $sql = "SELECT id, first_name, last_name, email, password, role FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password using password_verify()
        if (password_verify($password, $user['password'])) {
            // Password is correct, store session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect to dashboard or home page
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password!";
        }
    } else {
        $error_message = "Invalid email or password!";
    }
}
?>
