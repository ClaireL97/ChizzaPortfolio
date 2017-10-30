<!DOCTYPE html>
<html>
	<head>
		<title> <?= $title ?> </title>
	</head>
	<body>
		<nav>
			<a href="/Homepage/index">Home</a>
			<a href="#">Gallery</a>
			<a href="#">About Me</a>
			<a href="#">Resume</a>
			<a href="#">Contact</a>
			<? // if user is not logged in ?>
			<a href="/Login/login">Login</a>
			<? // else ?>
			<a href="/Login/logOut">Log Out</a>
		</nav>