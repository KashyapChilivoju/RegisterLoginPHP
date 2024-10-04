<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data using $_POST superglobal
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : 'Not Specified';

    // Displaying the submitted data
    echo "<h2>Form Data Received:</h2>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mobile: " . $mobile . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Gender: " . $gender . "<br>";
} else {
    echo "No form data submitted!";
}
?>
