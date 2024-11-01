<?php
session_start();
$loggedIn = false;
include 'header.php';
// Check if user data exists in the session
if (isset($_SESSION['user'])) {
    $name = htmlspecialchars($_SESSION['user']['name']);
    $email = htmlspecialchars($_SESSION['user']['email']);
    $mobile = htmlspecialchars($_SESSION['user']['mobile']);
    $gender = htmlspecialchars($_SESSION['user']['gender']);
    $loggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .user-info {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .user-info p {
            margin: 0;
            font-size: 1.1rem;
        }
        .logout-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-light">

<h1 class="text-center mb-4">Home Page</h1>

<?php if ($loggedIn): ?>
    <div class="user-info">
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Mobile:</strong> <?php echo $mobile; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    </div>

    <!-- Logout button -->
    <form method="post" action="logout.php" class="text-center logout-btn">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

<?php else: ?>
    <div class="text-center">
        <a href="LoginPage.php" class="btn btn-primary mx-2">Log In</a>
        <a href="RegisterPage.php" class="btn btn-secondary mx-2">Register</a>
    </div>
<?php endif; ?>

</body>
</html>
