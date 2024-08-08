<?php
// Set a cookie with name "user" and value “Ali"
setcookie("user", "Ali", time() + 3); // Expires in 1 hour

// Retrieve and display the value of the cookie
if(isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
    echo "Welcome back, $username!";
} else {
    echo "Welcome, guest!";
}

// Update the value of the cookie
if(isset($_COOKIE['user'])) {
    $username = $_COOKIE['user'];
    echo "<br>Your username from cookie: $username";
    
    // Update cookie value
    setcookie("user", "Shahzad", time() + 3); // Update the value to "Jane"
    echo "<br>Your username updated to Shahzad";
}
?>

