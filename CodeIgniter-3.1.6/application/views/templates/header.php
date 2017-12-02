<!DOCTYPE html>
<html>
	<head>
		<title> <?= $title ?> </title>
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/css/lightbox.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/css/minty.css">
	</head>
	<body>

		<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
			<div class="container">
				<a href="/Homepage/index" class="navbar-brand">Rachel Kirkland Illustrations</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link emboss dropdown-toggle" data-toggle="dropdown" href="#" id="galleries">
								Galleries
								<span class="caret"></span>
							</a>
							<div class="dropdown-menu" aria-labelledby="galleries">
							<?php foreach($galleries as $gallery) { ?>

								<a class="dropdown-item" href="/Gallery/gallery/<?=$gallery->id?>"><?=$gallery->title?></a>
							<?php } ?>
							</div>
						</li>
						<?php /*

							//foreach (GalleryModel::getAll() as $gallery) {
								//<?= a href="gallery/$gallery->id"> $gallery->title ?>
							}

						*/ ?>
	
						<li class="nav-item"><a class="nav-link emboss" href="/About_me/about_me">About Me</a></li>
						<li class="nav-item"><a class="nav-link emboss" href="/Affiliate/affiliates">Affiliates</a></li>
						<li class="nav-item"><a class="nav-link emboss" href="/Resume/resume">Resume</a></li>
						<li class="nav-item"><a class="nav-link emboss" href="/Contact/contact">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav ml-auto">
						<?php if (!isset($_SESSION['logged_in'])) { ?>
							<li class="nav-item"><a class="nav-link emboss" href="/Login/login">Login</a></li>
						<?php } else { ?>
							<li class="nav-item dropdown">
								<a class="nav-link emboss dropdown-toggle" data-toggle="dropdown" href="#" id="admin">
									Admin
									<span class="caret"></span>
								</a>
									<div class="dropdown-menu" aria-labelledby="admin">
										<a class="dropdown-item" href="/Art/manage_art">Manage Files</a>
										<a class="dropdown-item" href="/Tag/manageTags">Manage Tags</a>
										<a class="dropdown-item" href="/Gallery/manageGalleries">Manage Galleries</a>
									</div>
								</li>
							<li class="nav-item"><a class="nav-link emboss" href="/Login/logOut">Log Out</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="container">