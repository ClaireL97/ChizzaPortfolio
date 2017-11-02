<!DOCTYPE html>
<html>
	<head>
		<title> <?= $title ?> </title>
	</head>
	<body>
		<nav>
			<a href="/Homepage/index">Home</a>
			<a href="#">Gallery</a>
			<a href="/About_me/about_me">About Me</a>
			<a href="#">Resume</a>
			<a href="#">Contact</a>
			<?php if (!isset($_SESSION['logged_in'])) { ?>
				<a href="/Login/login">Login</a>
			<?php } else { ?>
				<a href="/Login/logOut">Log Out</a>
			<?php } ?>
		</nav>