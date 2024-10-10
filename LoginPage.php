<?php
include 'header.php';
?>

<html>
<body>

<form action="Login.php" method="POST">
    <h1>Log In Page</h1>
    E-mail: <input type="text" name="email">
    Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Log In">
    <p>Don't have an account? <a href="RegisterPage.php">Register here</a>.</p>
</form>

</body>
</html>