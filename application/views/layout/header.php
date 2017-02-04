<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title><?= $page_title ?></title>
	<meta charset="utf-8">
	<meta name="description" content="Write a description for the website here.">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--bootstrap and jquery-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="/carousel.js"></script>
	<!-- <link href="<?= base_url() ?>assets/css/lightbox.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<div class="navbar-brand">
						<a href="/home"><img id="navLogo" src="<?= base_url() ?>assets/images/starkscapes.png" alt="starkscapes logo"></a>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="navList nav navbar-nav navbar-right">
						<li><a class="navLink" href="/home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a class="navLink" href="/about"><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
						<li><a class="navLink" href="/gallery"><span class="glyphicon glyphicon-th"></span> Gallery</a></li>
						<li><a class="navLink" href="/contact"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
