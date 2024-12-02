
<?php
session_start();

if (isset($_SESSION['user'])) {
    $userRole = $_SESSION['user']['role'];

    if ($userRole == 'user') {
        header('location: dashboard_user.php');
    } elseif ($userRole == 'admin') {
        header('location: dashboard_admin.php');
    } elseif ($userRole == 'superadmin') {
        header('location: dashboard.php');
    } else {
        header('location: dashboard.php');
    }
    exit();
}

$error_message = '';

if ($_POST) {
    include('connection.php');

    $username = $_POST['userid'];
    $password = $_POST['userpass'];

    $query = 'SELECT * FROM tbl_users WHERE tbl_users.acc_id = :username AND tbl_users.user_pass = :password LIMIT 1';
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $result = $statement->execute();

    if ($statement->rowCount() > 0) {
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $user = $statement->fetchAll()[0];
        $_SESSION['user'] = $user;

        $userRole = $user['role'];
        if ($userRole == 'user') {
        header('location: dashboard_user.php');
	    } elseif ($userRole == 'admin') {
	        header('location: dashboard_admin.php');
	    } elseif ($userRole == 'superadmin') {
	        header('location: dashboard.php');
	    } else {
	        header('location: dashboard.php');
	    }

        exit();
    } else {
        $error_message = 'Incorrect user ID or password.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | The Good Shot Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <?php if (!empty($error_message)) { ?>
        <div id="errorMessage" class="alert alert-danger">
            <strong>ERROR:</strong> <?= htmlspecialchars($error_message) ?>
        </div>
    <?php } ?>
    <div class="container">
        <div class="left-container">
            <img src="images/Logo.jpg" alt="" class="login-logo">
        </div>
        <div class="right-container">
            <header>
                <p class="login-name">Login</p>
            </header>
            <form action="login.php" method="POST">
                <div>
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" required>
                </div>

                <div class="password-container">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    <i class="fas fa-eye show-password-icon" id="togglePassword"></i>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Login</butto>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.querySelector('input[name="password"]');
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>