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
	<!-- Add Navigation -->
	<?php 
		include_once "include/nav.php"; 
	?>
	<div>
		 <h2>Brief subject Description</h2>
		 <p> This subject requires students in a team to design and 
		 develop a complex web information system using appropriate 
		 technologies such as HTML5, CSS3, Java Script, php, MySQL 
		 and/or MS Access. It covers the process of developing a 
		 web-based information system, including object modelling, 
		 user-interface design, database design and programming. 
		 Students will critically analyse and evaluate various 
		 web-based systems and tools, comparing their approach 
		 with other standard software development methodologies 
		 such that they become aware of the issues involved in 
		 developing web Information systems. </p>
	</div>
	<!-- Add footer -->
	<?php 
		include "include/footer.php"; 
	?>
</body>
</html>





