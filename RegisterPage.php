<?php
include 'header.php';

$name = $email = $mobile = $password = $gender = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $password = htmlspecialchars(trim($_POST['password']));
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';

    // Validation rules
    if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Invalid name. Only letters and spaces are allowed.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($mobile) || !preg_match("/^\d{10}$/", $mobile)) {
        $errors[] = "Mobile number must be exactly 10 digits.";
    }

    if (empty($password) || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/", $password)) {
        $errors[] = "Password must be at least 6 characters long, contain one uppercase letter, one lowercase letter, and one digit.";
    }

    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    // If no errors, redirect and pass form data to Register.php
    if (empty($errors)) {
        echo "<form id='redirectForm' action='Register.php' method='POST'>
                <input type='hidden' name='name' value='" . htmlspecialchars($name) . "'>
                <input type='hidden' name='email' value='" . htmlspecialchars($email) . "'>
                <input type='hidden' name='mobile' value='" . htmlspecialchars($mobile) . "'>
                <input type='hidden' name='password' value='" . htmlspecialchars($password) . "'>
                <input type='hidden' name='gender' value='" . htmlspecialchars($gender) . "'>
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
    <title>Register Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Register</h2>

                    <!-- Display errors if any -->
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $error): ?>
                                <p class="mb-0"><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="RegisterPage.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo htmlspecialchars($mobile); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="genderMale" value="male" class="form-check-input" <?php if ($gender == 'male') echo "checked"; ?>>
                                <label for="genderMale" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="gender" id="genderFemale" value="female" class="form-check-input" <?php if ($gender == 'female') echo "checked"; ?>>
                                <label for="genderFemale" class="form-check-label">Female</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>

                    <p class="text-center mt-3">
                        Already have an account? <a href="LoginPage.php">Sign in here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>