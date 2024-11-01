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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Log In</h2>

                    <!-- Display errors if any -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error): ?>
                                <p class="mb-0"><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="LoginPage.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </form>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="RegisterPage.php">Register here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>