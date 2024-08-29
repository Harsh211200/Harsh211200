<?php
// This file is Login.php
// This is the main login page
// in this we must direct the user to appropriate folder
// based on the login
session_start();
require_once "include/config.php";
require_once "include/utils.php";
require_once "include/auth.php";
?>
<?php
// get_or_default is in utils.php
// See what it does
$student_id = get_or_default($_POST, 'student_id', '');
$password = get_or_default($_POST, 'password', '');
// What does this do?
if($student_id and $password) {
// Use the DB to authenticate a user
// These variables come from config.php
$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
// The question mark in the following statement is called a parameter place holder
// The value will supplied at a later stage
$query = "SELECT studentid, password FROM student WHERE studentid=?";
$stmt = mysqli_prepare($conn, $query);
// here we are supplying the value to the question mark. The value is studentID
// we received from the user. This way we can stop SQL injection attacks.
// This will prepare the entire query for execution.
mysqli_stmt_bind_param($stmt, "s", $student_id);
// If the execution works properly
if(mysqli_stmt_execute($stmt))
{
// Get the results
$result = mysqli_stmt_get_result($stmt);
// Grab the first row
$row = mysqli_fetch_array($result);
// If it exists
if($row) {
// Get the stored password
$db_password = $row['password'];
//Will this check the password as a string?
if($password === $db_password)
{
// compare the user name and direct it appropriately
if ($password == "admin123") {
login($student_id);
header('Location: admin/index.php');
exit;
} else {
login($student_id);
header('Location: user/view.php');
exit;
}
}
}
}
mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<?php
session_start();
require_once "include/auth.php";
?>
<html lang="en">
<!-- Author: Sai Kiran Lakkaraju -->
<head>
<title>Index</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css\SiteStyle.css">
</head>
<body>
<header>
Introduction to Web Information Systems
</header>
<!-- include navigation -->
<?php
include_once "include/nav.php";
?>
<h1>Welcome to the Grades System</h1>
<p>Here you can login to check your grades</p>
<p>Try 555001 / password</p>
<?php
// Exercise: where are is_logged_in() and logged_in_user() declared?
if(is_logged_in()):
$studentId = htmlentities(logged_in_user());
$imagePath = "images/" . $studentId . ".jpg";
?>
<div>
<?php if(file_exists($imagePath)): ?>
<img src="<?php echo $imagePath; ?>" alt="Student Image">
<?php else: ?>
<p>No image found for student.</p>
<?php endif; ?>
<form action="logout.php" method="POST">
Currently logged in as <?php echo $studentId; ?>
<button>Log out</button>
</form>
</div>
<?php else: ?>
<form action="login.php" method="POST">
<ul>
<li>
<label for="student_id">Student ID</label>
<input type="text" size="10" maxlength="10" name="student_id"
id="student_id">
</li>
<li>
<label for="password">Password</label>
<input type="password" size="10" name="password" id="password">
</li>
</ul>
<button>Log in to the Grades system</button>
</form>
<?php endif ?>
<!-- Add footer -->
<?php
include "include/footer.php";
?>
</body>
</html>