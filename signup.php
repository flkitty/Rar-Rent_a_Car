<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation flags
    $errors = [];

    // Validate first and last name
    if (!preg_match("/^[A-Za-z]+$/", $fname)) {
        $errors[] = "First name must contain only letters.";
    }
    if (!preg_match("/^[A-Za-z]+$/", $lname)) {
        $errors[] = "Last name must contain only letters.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password strength
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long, include uppercase, lowercase, a number, and a special character.";
    }

    // Validate password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If there are errors, show them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        // Hash password and save user data (Example)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        echo "<p style='color: green;'>Sign-up successful! Your data is being saved.</p>";

        // Save to database or perform further processing
        // Example: saveUserToDatabase($fname, $lname, $email, $hashed_password);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HonkAndSmile - Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home.php">
</head>
<body>
    <div class="navbar">
        <!--<a href="#hero-image"><img src="Rcarlogo.png" height = 60 width = 30/></a>-->
        <!--<a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height = 60/></a>-->
        <!--<a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height="60" style="margin-right: 20px;" /></a>-->
        <a href="#hero-image"><img src="Rcarlogo.png" alt="Logo" height="60" style="margin-right: 20px;" /></a>
    </div>
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form id="signup-form" action="process-signup.php" method="post" onsubmit="return validateForm()">
            <div class="input-group">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" placeholder="Enter your first name" required>
                <small id="fname-error" class="error-message"></small>
            </div>
            <div class="input-group">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Enter your last name" required>
                <small id="lname-error" class="error-message"></small>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <small id="email-error" class="error-message"></small>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
                <small id="password-error" class="error-message"></small>
            </div>
            <div class="input-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
                <small id="confirm-password-error" class="error-message"></small>
            </div>
            <button type="submit" class="btn">Sign Up</button>
            <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
        </form>
        <button type="button" class="btn-secondary" onclick="window.location.href='termsandconditions.php';">
            View Terms and Conditions
        </button>
    </div>

    <script>
        // Function to validate the form
        function validateForm() {
            let isValid = true;

            // Get form fields
            const fname = document.getElementById('fname');
            const lname = document.getElementById('lname');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');

            // Get error fields
            const fnameError = document.getElementById('fname-error');
            const lnameError = document.getElementById('lname-error');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            const confirmPasswordError = document.getElementById('confirm-password-error');

            // Clear previous error messages
            fnameError.textContent = '';
            lnameError.textContent = '';
            emailError.textContent = '';
            passwordError.textContent = '';
            confirmPasswordError.textContent = '';

            // Validate first name and last name (only letters)
            const nameRegex = /^[A-Za-z]+$/;
            if (!nameRegex.test(fname.value)) {
                fnameError.textContent = 'First name must contain only letters.';
                isValid = false;
            }
            if (!nameRegex.test(lname.value)) {
                lnameError.textContent = 'Last name must contain only letters.';
                isValid = false;
            }

            // Validate email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                emailError.textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            // Validate password strength
            const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password.value)) {
                passwordError.textContent = 'Password must be at least 8 characters long, include uppercase, lowercase, a number, and a special character.';
                isValid = false;
            }

            // Confirm password match
            if (password.value !== confirmPassword.value) {
                confirmPasswordError.textContent = 'Passwords do not match.';
                isValid = false;
            }

            return isValid; // Prevent form submission if validation fails
        }
    </script>
</body>
</html>
