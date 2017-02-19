<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="services" class="center">
	<h1><i class="fa fa-wrench"></i> Services</h1>
	<section id="lawncare" class="service-section">
		<div class="row">
			<div class="col-sm-3">
				<img class="service-image img-responsive" src="<?= $services['lawncare-image'] ?>" alt="<?= $services['lawncare-image-alt'] ?>" />
			</div>
			<div class="col-sm-9">
				<h2><i class="fa fa-sun-o"></i> Lawncare</h2>
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
	</section>

	<section id="landscaping" class="service-section">
		<div class="row">
			<div class="col-sm-3">
				<img class="service-image img-responsive" src="<?= $services['landscaping-image'] ?>" alt="<?= $services['landscaping-image-alt'] ?>" />
			</div>
			<div class="col-sm-9">
				<h2><i class="fa fa-leaf"></i> Landscaping</h2>
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
	</section>

	<section id="snow-removal" class="service-section">
		<div class="row">
			<div class="col-sm-3">
				<img class="service-image img-responsive" src="<?= $services['snow-removal-image'] ?>" alt="<?= $services['snow-removal-image-alt'] ?>" />
			</div>
			<div class="col-sm-9">
				<h2><i class="fa fa-snowflake-o"></i> Snow Removal &amp; Ice Management</h2>
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
	</section>
</div>