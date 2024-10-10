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

<html>
<body>

<form action="RegisterPage.php" method="POST">
    <h1>Register Page</h1>

    <!-- Display errors if any -->
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Retain the entered values -->
    Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>
    E-mail: <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
    Mobile: <input type="number" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>"><br><br>
    Password: <input type="password" name="password"><br><br>

    Gender:
    <input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo "checked"; ?>> Male
    <input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo "checked"; ?>> Female<br><br>

    <input type="submit" value="Register!">
    <p>Already have an account? <a href="LoginPage.php">Sign in here</a>.</p>
</form>

</body>
</html>
