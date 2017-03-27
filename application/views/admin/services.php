<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_services" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-wrench"></i>&nbsp;Services</h1>
			<p class="well">Here you can edit the Services page.  You can edit each of the 3 service sections.</p>
			<?php foreach ($services as $service) : ?>
			<a href="admin-services/service/<?= format_as_class($service['service']) ?>"><?= $service['service'] ?></a>
			<br />
			<?php endforeach; ?>
		</div>
	</section>
