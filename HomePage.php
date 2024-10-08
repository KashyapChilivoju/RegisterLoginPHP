<?php
$account_file = 'account.txt';

// Check if the account file exists and has data
if (file_exists($account_file) && filesize($account_file) > 0) {
    // Open the file and read the account data
    $file = fopen($account_file, 'r');
    $file_data = fread($file, filesize($account_file));
    fclose($file);

    // Decode the JSON data to an associative array
    $account_data = json_decode($file_data, true);

    // Check if decoding was successful and display the account data
    if ($account_data !== null) {
        $name = htmlspecialchars($account_data['name']);
        $email = htmlspecialchars($account_data['email']);
        $mobile = htmlspecialchars($account_data['mobile']);
        $gender = htmlspecialchars($account_data['gender']);
    } else {
        echo "<h2>Error: Could not decode account data.</h2>";
    }
} else {
    echo "<h2>No account data found. Please register first.</h2>";
}
?>

<html>
<body>

<h1>Home Page</h1>

<?php if (isset($account_data)): ?>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Mobile:</strong> <?php echo $mobile; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
<?php endif; ?>

</body>
</html>
