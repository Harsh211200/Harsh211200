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
		if(is_logged_in()): ?>
			<form action="logout.php" method="POST">
				Currently logged in as <?php echo htmlentities(logged_in_user()); ?>
				<button>Log out</button>
			</form>
		<?php else: ?>
		<form action="login.php" method="POST">
			<ul>
			<li>
				<label for="student_id">Student ID</label>
				<input type="text" size="10" maxlength="10" name="student_id" id="student_id">
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




