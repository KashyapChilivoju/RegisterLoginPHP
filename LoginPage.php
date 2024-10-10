<?php
include 'header.php';

$email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation rules
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If no errors, proceed to Login.php
    if (empty($errors)) {
        // Use a hidden form and submit it to Login.php using POST
        echo "<form id='redirectForm' action='Login.php' method='POST'>
                <input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>
                <input type='hidden' name='password' value='" . htmlspecialchars($password) . "'>
              </form>
              <script type='text/javascript'>
                document.getElementById('redirectForm').submit();
              </script>";
        exit();
    }
}
?>

<html>
<body>

<form action="LoginPage.php" method="POST">
    <h1>Log In Page</h1>

    <!-- Display errors if any -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Retain the entered values -->
    E-mail: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
    Password: <input type="password" name="password"><br><br>

    <input type="submit" value="Log In">
    <p>Don't have an account? <a href="RegisterPage.php">Register here</a>.</p>
</form>

</body>
</html>
