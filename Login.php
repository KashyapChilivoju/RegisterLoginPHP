<?php
session_start();
$config = require 'config.php';
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query to fetch user by email
    $sql = "SELECT name, email, password, mobile, gender FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, fetch the user data
        $user = $result->fetch_assoc();

        // Verify the password
//        if (password_verify($password, $user['password'])) {
          if($password == $user['password']){
            // Success! Store user data in session and redirect to HomePage.php
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['email'],
                'mobile' => $user['mobile'],
                'gender' => $user['gender']
            ];
              echo '<pre>';
              print_r($_SESSION['user']);
              echo '</pre>';
            echo "<h2>Successfully logged in! Click <a href='HomePage.php'>here</a> to go to Home Page.</h2>";
        } else {
            // Invalid password
            echo "Invalid password. Please try again.";
        }
    } else {
        // No user found with this email
        echo "No account found with this email. Please try again.";
    }

} else {
    echo "No form data submitted!";
}

// Close the connection
$conn->close();

