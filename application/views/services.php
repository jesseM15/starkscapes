<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="services" class="center">
	<h1><i class="fa fa-wrench"></i> Services</h1>
	<?php $n = 1; ?>
	<?php foreach ($services as $service) : ?>
	<section id="<?= (!empty($service['service']) ? format_as_class($service['service']) : 'lawncare') ?>" class="service-section panel">
		<div id="<?= (!empty($service['service']) ? format_as_class($service['service']) : 'lawncare') ?>-panel" class="service-panel">
			<div class="panel-heading text-center">
				<h2><?= (!empty($service['icon']) ? $service['icon'] : '') ?> <?= (!empty($service['service']) ? $service['service'] : '') ?></h2>
			</div>
			<div class="panel-body">
				<div class="col-sm-3">
					<img class="service-image img-responsive center" src="<?= base_url() . $service['image']['path'] ?>" alt="<?= $service['image']['text'] ?>" />
				</div>
				<div class="col-sm-9">
					<div id="quill<?= $n ?>" style="border:none;">
						<?= (!empty($service['content']) ? $service['content'] : '') ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $n++; ?>
	<?php endforeach; ?>
</div>
