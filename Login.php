<?php
$account_file = 'account.txt'; // Path to the file where the account data is stored
$error_message = ""; // To store any error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the account file exists and has data
    if (file_exists($account_file) && filesize($account_file) > 0) {
        // Open the file and read the account data
        $file = fopen($account_file, 'r');
        $file_data = fread($file, filesize($account_file));
        fclose($file);

        // Decode the JSON data to an associative array
        $account_data = json_decode($file_data, true);

        // Check for JSON decoding errors
        if ($account_data === null && json_last_error() !== JSON_ERROR_NONE) {
            $error_message = "Error decoding account data.";
        } else {
            // Verify the email and password
            if ($account_data['email'] === $email && $account_data['password'] === $password) {
                // Success! Log the user in and redirect
                echo "<h2>Successfully logged in! Click <a href='HomePage.php'>here</a> to go to Home Page.</h2>";
            } else {
                // Invalid credentials
                echo "Invalid email or password. Please try again.";
            }
        }
    } else {
        // No account found
        echo "No account found. Please register first.";
    }
}