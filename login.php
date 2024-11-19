
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | The Good Shot Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="login.css">

</head>
<body>
<?php if(!empty($error_message)) {?>
		<div id="errorMessage">
			<strong>ERROR:<strong></p><?=$error_message?></p>
		</div>
<?php }?>
    <div class="container">
        <div class="left-container">
            <img src="images/Logo.jpg" alt="" class = "login-logo">
        </div>
        <div class="right-container">
            <header>
                <p class="login-name">Login</p>
            </header>
                <div>
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username">
                </div>
                <div class="password-container">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password">
                    <i class="fas fa-eye show-password-icon" id="togglePassword"></i>
                </div>
                <div>
                    <label>
                        <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>> Remember Me
                    </label>
                </div>
                <div>
                    <input class="btn btn-login" type="submit" value="Submit">
                </div>
            </div>
    </div>

</body>
<script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    </script>
</html>