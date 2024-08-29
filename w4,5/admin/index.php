<!DOCTYPE html>
<?php
session_start();
require_once "include/auth.php";
?>
<html lang="en">
<!-- Author: Sai Kiran Lakkaraju -->
<head>
<title>Index-Admin Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css\SiteStyle.css">
</head>
<body>
<header>
Welcome to the Admin Home
</header>
<!-- Add Navigation -->
<?php
include_once "include/nav.php";
?>
<?php
// The user is already logged in as admin so no need to login again
if(is_logged_in()): ?>
<form action="../logout.php" method="POST">
Currently logged in as <?php echo htmlentities(logged_in_user()); ?>
<button>Log out</button>
</form>
<?php endif ?>
<div>
<h2>This is the admin home</h2>
<div>
<h2>Add/Update Student Marks</h2>
<form action="addStudentMark.php" method="post">
<input type="number" name="studentId" placeholder="Student ID" required>
<input type="number" name="courseId" placeholder="Course ID" required>
<input type="number" name="year" placeholder="Year" required>
<input type="number" name="semester" placeholder="Semester" required>
<input type="text" name="gradeCode" placeholder="Grade Code" required>
<input type="submit" value="Add Marks">
</form>
</div>
</div>
<!-- Add footer -->
<?php
include "include/footer.php";
?>
</body>
</html>
create a new file name addStudentMark make sure to check the file type is PHP, If you dont know how
to change the file type copy index.php. paste the code below into the new file you create
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Collect post data
$studentId = $_POST['studentId'];
$courseId = $_POST['courseId'];
$year = $_POST['year'];
$semester = $_POST['semester'];
$gradeCode = $_POST['gradeCode'];
// Include the config.php from the include directory
require 'include/config.php'; // Path to the config file is now correct
// Function to add student marks
function addStudentMarks($studentId, $courseId, $year, $semester, $gradeCode) {
global $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME;
// Create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Prepare and bind
$stmt = $conn->prepare("INSERT INTO achievement (studentid, courseid, year, semester, gradecode)
VALUES (?, ?, ?, ?, ?)");
// Check if prepare was successful
if (!$stmt) {
die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("siiss", $studentId, $courseId, $year, $semester, $gradeCode);
// Execute the statement
if ($stmt->execute()) {
echo "New record created successfully";
} else {
echo "Error: " . $stmt->error;
}
// Close statement and connection
$stmt->close();
$conn->close();
}
// Call function to add marks
addStudentMarks($studentId, $courseId, $year, $semester, $gradeCode);
}
?>