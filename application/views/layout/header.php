<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title><?= (!empty($page_title) ? $page_title : '') ?> - <?= (!empty($site_name) ? $site_name : '') ?>: Lawn care Landscaping and Snow removal</title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?= (!empty($keywords) ? $keywords : '') ?>">
	<meta name="description" content="<?= (!empty($description) ? $description : '') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/starkscapes_icon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/starkscapes_icon-32x32.png" sizes="32x32">

	<!--bootstrap and jquery-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/main.js"></script>
	<?php if ($this->uri->segment(1) == 'gallery') : ?>
	<script  src="<?= base_url() ?>assets/js/lightbox.js"></script>
	<link href="<?= base_url() ?>assets/css/lightbox.css" rel="stylesheet" type="text/css">
	<?php endif; ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
	<!-- Include stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

	<!-- <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-99294086-1', 'auto');
		ga('send', 'pageview');
	</script> -->

</head>
<body style="background:url(<?= base_url() . (!empty($background['path']) ? $background['path'] : '') ?>) no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
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
			<a href="/home"><img id="navLogo" src="<?= base_url() . (!empty($logo['path']) ? $logo['path'] : '') ?>" alt="<?= $logo['text'] ?>"></a>
		</div>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="navList nav navbar-nav text-center">
						<li<?= empty($this->uri->segment(1)) || $this->uri->segment(1) == 'home' ? ' class="active"': '' ?>><a class="navLink center" href="<?= base_url() ?>home"><i class="fa fa-home"></i>&nbsp;Home</a></li>
						<li<?= $this->uri->segment(1) == 'services' ? ' class="active"': '' ?>><a class="navLink center" href="<?= base_url() ?>services"><i class="fa fa-wrench"></i>&nbsp;Services</a></li>
						<li<?= $this->uri->segment(1) == 'gallery' ? ' class="active"': '' ?>><a class="navLink center" href="<?= base_url() ?>gallery"><i class="fa fa-camera-retro"></i>&nbsp;Gallery</a></li>
						<li<?= $this->uri->segment(1) == 'contact' ? ' class="active"': '' ?>><a class="navLink center" href="<?= base_url() ?>contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
		</div>
	</header>
