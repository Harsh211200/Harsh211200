<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'shopping') {
header('Location: ../login.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Shopping Page</title>
</head>
<body>
<h2>Welcome to the Shopping Page</h2>
<p>You are logged in as a Shopper.</p>
<a href="../logout.php">Logout</a>
</body>
</html>