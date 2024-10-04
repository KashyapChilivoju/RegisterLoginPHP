<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an account already exists in the session
    if (isset($_SESSION['account'])) {
        echo "<h2>An account is already active. Only one account can be created. Please log in <a href='LoginPage.php'>here</a>.</h2>";
    } else {
        // Retrieve the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : 'Not Specified';

        // Store the account details in the session
        $_SESSION['account'] = [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => $password,
            'gender' => $gender
        ];
        echo "<h2>Successfully registered! Go to Log In <a href='LoginPage.php'>here</a>.</h2>";
    }
} else {
    echo "No form data submitted!";
}
