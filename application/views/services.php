<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="services" class="center">
	<h1><i class="fa fa-wrench"></i> Services</h1>
	<section id="lawncare" class="service-section panel">
		<div id="lawncare-panel" class="service-panel">
			<div class="panel-heading text-center">
				<h2><i class="fa fa-sun-o"></i> Lawncare</h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img class="service-image img-responsive" src="<?= $services['lawncare-image'] ?>" alt="<?= $services['lawncare-image-alt'] ?>" />
				</div>
				<div class="col-sm-9">
					<div class="services">
						<?php foreach ($services['lawncare'] as $service => $message) : ?>
						<h3><?= $service ?></h3>
						<div class="service-message">
							<?= $message ?>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="landscaping" class="service-section panel">
		<div id="landscaping-panel" class="service-panel">
			<div class="panel-heading text-center">
				<h2><i class="fa fa-leaf"></i> Landscaping</h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img class="service-image img-responsive" src="<?= $services['landscaping-image'] ?>" alt="<?= $services['landscaping-image-alt'] ?>" />
				</div>
				<div class="col-sm-9">
					<div class="services">
						<?php foreach ($services['landscaping'] as $service => $message) : ?>
						<h3><?= $service ?></h3>
						<div class="service-message">
							<?= $message ?>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="snow-removal" class="service-section panel">
		<div id="snow-removal-panel" class="service-panel">
			<div class="panel-heading text-center">
				<h2><i class="fa fa-snowflake-o"></i> Snow Removal &amp; Ice Management</h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img class="service-image img-responsive" src="<?= $services['snow-removal-image'] ?>" alt="<?= $services['snow-removal-image-alt'] ?>" />
				</div>
				<div class="col-sm-9">
					<div class="services">
						<?php foreach ($services['snow-removal'] as $service => $message) : ?>
						<h3><?= $service ?></h3>
						<div class="service-message">
							<?= $message ?>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
$(document).ready(function(){
	window.onscroll = function (e) {  
		$("#lawncare").fadeTo("slow", 1);
		$("#landscaping").fadeTo("slow", 1);
		$("#snow-removal").fadeTo("slow", 1);
	} 
	if (window.location.href.includes("#lawncare"))
	{
		$("#landscaping").fadeTo("slow", 0.5);
		$("#snow-removal").fadeTo("slow", 0.5);
	}
	if (window.location.href.includes("#landscaping"))
	{
		$("#lawncare").fadeTo("slow", 0.5);
		$("#snow-removal").fadeTo("slow", 0.5);
	}
	if (window.location.href.includes("#snow-removal"))
	{
		$("#lawncare").fadeTo("slow", 0.5);
		$("#landscaping").fadeTo("slow", 0.5);
	}
});
</script>
