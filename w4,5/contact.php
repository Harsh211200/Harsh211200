<!DOCTYPE html>
<?php
session_start();
require_once "include/auth.php";
?>
<html lang="en">
<!-- Author: Sai Kiran Lakkaraju -->

<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css\SiteStyle.css">
</head>
<body>
	<header>
		  Introduction to Web Information Systems
	</header>
	<!-- Add Navigation -->
	<?php 
		include_once "include/nav.php"; 
	?>
	<div>
		 <h2>Create a contact me page</h2>
		 <p> 
			Create a table in the database called mesages.
			Store - name, email address, phone number and the message in that table.
			Create a form that can read above mentioned detials. 
			when the submit button is clicked data must be posted to the table.
		 </p>
	</div>
	<!-- Add footer -->
	<?php 
		include "include/footer.php"; 
	?>
</body>
</html>





