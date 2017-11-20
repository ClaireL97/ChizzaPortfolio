<!DOCTYPE html>
<html>
	<head>
		<title> <?= $title ?> </title>
	</head>
	<body>
		<nav>
			<a href="/Homepage/index">Home</a>
			<a href="#">Gallery</a>
			<?php /*

				//foreach (GalleryModel::getAll() as $gallery) {
					//<?= a href="gallery/$gallery->id"> $gallery->title ?>
				}

			*/ ?>
			<!-- TODO add dropdowns for managing art, tags and gallieries -->
			<!-- TODO add links to existing pages -->
			<!-- TODO hide certain links when not logged in -->
			<a href="/About_me/about_me">About Me</a>
			<a href="/Affiliate/affiliates">Affiliates</a>
			<a href="#">Resume</a>
			<a href="#">Contact</a>
			<?php if (!isset($_SESSION['logged_in'])) { ?>
				<a href="/Login/login">Login</a>
			<?php } else { ?>
				<a href="/Login/logOut">Log Out</a>
			<?php } ?>
		</nav>