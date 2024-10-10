<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: HomePage.php"); // Redirect to home page after logout
exit();
?>
