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

<html>
<body>

<h1>Home Page</h1>

<?php if ($loggedIn): ?>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Mobile:</strong> <?php echo $mobile; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>

    <!-- Logout button -->
    <form method="post" action="logout.php">
        <input type="submit" value="Logout">
    </form>

<?php else: ?>

    <a href="LoginPage.php">Log In</a> |
    <a href="RegisterPage.php">Register</a>

<?php endif; ?>

</body>
</html>
