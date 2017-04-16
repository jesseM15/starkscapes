<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_home" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-home"></i>&nbsp;Home</h1>
			<p class="well">Here you can edit the Home page.  You can edit the Carousel, the About section, and the Service Areas section.</p>
			<div class="section-nav container-fluid text-center">
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-home/carousel"><div class="section-nav-div"><i class="fa fa-repeat" aria-hidden="true"></i><br />Carousel</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-home/about"><div class="section-nav-div"><i class="fa fa-question-circle-o" aria-hidden="true"></i><br />About</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-home/areas"><div class="section-nav-div"><i class="fa fa-map-pin" aria-hidden="true"></i><br />Service Areas</div></a>
				</div>
			</div>
		</div>
	</section>
