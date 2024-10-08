<?php
session_start();
// Check if user data exists in the session
if (isset($_SESSION['user'])) {
    $name = htmlspecialchars($_SESSION['user']['name']);
    $email = htmlspecialchars($_SESSION['user']['email']);
    $mobile = htmlspecialchars($_SESSION['user']['mobile']);
    $gender = htmlspecialchars($_SESSION['user']['gender']);
} else {
    echo "<h2>No account data found. Please log in first.</h2>";
    exit; // Stop the script here, since there's no user logged in
}
?>

<html>
<body>

<h1>Home Page</h1>

<p><strong>Name:</strong> <?php echo $name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>
<p><strong>Mobile:</strong> <?php echo $mobile; ?></p>
<p><strong>Gender:</strong> <?php echo $gender; ?></p>

</body>
</html>
