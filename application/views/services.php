<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="services" class="center">
	<h1><i class="fa fa-wrench"></i> Services</h1>
	<?php foreach ($services as $service) : ?>
	<section id="<?= (!empty($service['category']) ? format_as_class($service['category']) : 'lawncare') ?>" class="service-section panel">
		<div id="<?= (!empty($service['category']) ? format_as_class($service['category']) : 'lawncare') ?>-panel" class="service-panel">
			<div class="panel-heading text-center">
				<h2><?= (!empty($service['icon']) ? $service['icon'] : '') ?> <?= (!empty($service['category']) ? $service['category'] : '') ?></h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img class="service-image img-responsive center" src="<?= base_url() . $service['image']['path'] ?>" alt="<?= $service['image']['text'] ?>" />
				</div>
				<div class="col-sm-9">
					<div class="services">
						<?php foreach ($service['service'] as $heading => $content) : ?>
						<h3><?= $heading ?></h3>
						<div class="service-message">
							<?= $content ?>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endforeach; ?>
</div>
