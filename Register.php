<?php

$account_file = 'account.txt';

$servername = "localhost";
$username = "adminUsername";
$password = "adminPassword";
$dbname = "register_login_php";

$conn = new mysqli($servername, $username, $password, $dbname);

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

        // Prepare account data to be written to the file
        $account_data = [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'mobile' => htmlspecialchars($mobile),
            'password' => htmlspecialchars($password),
            'gender' => htmlspecialchars($gender)
        ];

/*

        // Convert account data to JSON format and write to the file
        $file = fopen($account_file, 'w');
        fwrite($file, json_encode($account_data));
        fclose($file);*/


        $sql = "INSERT INTO users (name, email, mobile, password, gender) VALUES ('$name', '$email', '$mobile', '$password', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>Successfully registered! Go to Log In <a href='LoginPage.php'>here</a>.</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();


} else {
    echo "No form data submitted!";
}


?>