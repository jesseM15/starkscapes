<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
	<script src="/carousel.js"></script>
	<script src="<?= base_url() ?>assets/js/lightbox.js"></script>
	<script src="<?= base_url() ?>assets/js/main.js"></script>
	<link href="<?= base_url() ?>assets/css/lightbox.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome-4.7.0/css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/brand-colors.css"> -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/alternate-brand-colors.css"> -->
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.2.0/quill.snow.css" rel="stylesheet">
	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>

</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1744743855811642";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header>
		<?php if (!empty($marquee)) : ?>
		<div class="marquee">
			<p>
		<?php
		foreach ($marquee as $m)
		{
			echo '<span>' . $m['text'] . '</span>';
		}
		?>
			</p>
		</div>
	<?php endif; ?>
		<div class="navWrap">
		<div class="logo text-center">
			<a href="/home"><img id="navLogo" src="<?= base_url() ?>assets/images/starkscapes.png" alt="StarkScapes logo"></a>
		</div>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="navList nav navbar-nav">
						<li<?= empty($this->uri->segment(1)) || $this->uri->segment(1) == 'home' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>home"><i class="fa fa-home"></i>&nbsp;Home</a></li>
						<li<?= $this->uri->segment(1) == 'services' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>services"><i class="fa fa-wrench"></i>&nbsp;Services</a></li>
						<li<?= $this->uri->segment(1) == 'gallery' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>gallery"><i class="fa fa-camera-retro"></i>&nbsp;Gallery</a></li>
						<li<?= $this->uri->segment(1) == 'contact' ? ' class="active"': '' ?>><a class="navLink" href="<?= base_url() ?>contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
		</div>
	</header>
