<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_services" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-wrench"></i>&nbsp;Services</h1>
			<p class="well">Here you can edit the Services page.  You can edit each of the 3 service sections.</p>
			<div class="section-nav container-fluid text-center">
				<?php foreach ($services as $service) : ?>
				<div class="section-icon col-sm-4">
					<a href="<?= base_url() ?>admin-services/service/<?= format_as_class($service['service']) ?>"><div class="section-nav-div"><?= $service['icon'] ?><br /><?= $service['service'] ?></div></a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
