<?php
session_start();
$config = require 'config.php';
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an account already exists in the session

        // Retrieve the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : 'Not Specified';

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare account data to be written to the file
        $account_data = [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'mobile' => htmlspecialchars($mobile),
            'password' => htmlspecialchars($hashed_password),
            'gender' => htmlspecialchars($gender)
        ];
    // Check if the email already exists in the database
    $check_email_sql = "SELECT email FROM users WHERE email='$email'";
    $check_result = $conn->query($check_email_sql);

    if ($check_result->num_rows > 0) {
        // If the email already exists, show an error message
        echo "<h2>An account with this email already exists. Please log in or use a different email address.</h2>";
        echo "<p>Go to Log In <a href='LoginPage.php'>here</a>.</p>";
    } else {
        // If the email does not exist, insert the new account data
        $sql = "INSERT INTO users (name, email, mobile, password, gender) VALUES ('$name', '$email', '$mobile', '$hashed_password', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Successfully registered! Go to Log In <a href='LoginPage.php'>here</a>.</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

        $conn->close();


} else {
    echo "No form data submitted!";
}


?>