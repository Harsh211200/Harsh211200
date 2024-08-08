<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from visible field
    $username = $_POST['username'];
    
    // Retrieve data from hidden field
    $secret_key = $_POST['secret_key'];
    
    // Process the data...
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Secret Key: " . htmlspecialchars($secret_key);
}
?>
