<?php
include 'header.php';
?>

<html>
<body>

<form action="Register.php" method="POST">
    <h1>Register Page</h1>
    Name: <input type="text" name="name">
    E-mail: <input type="text" name="email">
    Mobile: <input type="number" name="mobile">
    Password: <input type="password" name="password"><br><br>
    Gender:
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female<br><br>
    <input type="submit" value="Register!">
    <p>Already have an account? <a href="LoginPage.php">Sign in here</a>.</p>
</form>

</body>
</html>


