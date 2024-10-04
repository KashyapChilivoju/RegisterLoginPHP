<?php

$account_file = 'account.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an account already exists in the session
    if (file_exists($account_file) && filesize($account_file) > 0) {
        echo "<h2>An account is already active. Only one account can be created. Please log in <a href='LoginPage.php'>here</a>.</h2>";
    } else {
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

        // Convert account data to JSON format and write to the file
        $file = fopen($account_file, 'w');
        fwrite($file, json_encode($account_data));
        fclose($file);

        echo "<h2>Successfully registered! Go to Log In <a href='LoginPage.php'>here</a>.</h2>";
    }
} else {
    echo "No form data submitted!";
}
