<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
header('Location: ../login.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Page</title>
</head>
<body>
<h2>Welcome to the Admin Page</h2>
<p>You are logged in as an Admin.</p>
<a href="../logout.php">Logout</a>
</body>
</html>