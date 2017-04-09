<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>StarkScapes - <?= $page_title ?></title>
	<meta charset="utf-8">
	<meta name="description" content="Write a description for the website here.">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--bootstrap and jquery-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- <script src="/carousel.js"></script> -->
	<script src="<?= base_url() ?>assets/js/lightbox.js"></script>
	<script src="<?= base_url() ?>assets/js/main.js"></script>
	<script src="<?= base_url() ?>assets/js/admin.js"></script>
	<!-- Include the Quill library -->
	<script src="//cdn.quilljs.com/1.2.2/quill.min.js"></script>
	<script src="<?= base_url() ?>assets/js/quill_edit.js"></script>
	<link href="<?= base_url() ?>assets/css/lightbox.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/admin_style.css">

</head>
<body>
	<header>
		<div class="navWrap">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="navList nav navbar-nav navbar-left">
							<li<?= empty($this->uri->segment(1)) || $this->uri->segment(1) == 'welcome' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>welcome"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Welcome</a></li>
						</ul>
						<ul class="navList nav navbar-nav">
							<li<?= empty($this->uri->segment(1)) || $this->uri->segment(1) == 'admin-home' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>admin-home"><i class="fa fa-home"></i>&nbsp;Home</a></li>
							<li<?= $this->uri->segment(1) == 'admin-services' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>admin-services"><i class="fa fa-wrench"></i>&nbsp;Services</a></li>
							<li<?= $this->uri->segment(1) == 'admin-gallery' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>admin-gallery"><i class="fa fa-camera-retro"></i>&nbsp;Gallery</a></li>
							<li<?= $this->uri->segment(1) == 'admin-contact' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>admin-contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a></li>
						</ul>
						<ul class="navList nav navbar-nav navbar-right">
							<li><a class="navLink" href="<?= base_url() ?>"><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;Visit&nbsp;Site</a></li>
							<li><a class="navLink" href="<?= base_url() ?>user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
