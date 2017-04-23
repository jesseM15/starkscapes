<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_metadata" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1 class="text-center"><i class="fa fa-database" aria-hidden="true"></i>&nbsp;Metadata</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit things that help search engine optimization or do not directly appear on the site.  You can edit the Keywords, Description, and Site Name.</p>
			</div>
			<div class="section-nav container-fluid text-center">
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-metadata/keywords"><div class="section-nav-div"><i class="fa fa-key" aria-hidden="true"></i><br />Keywords</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-metadata/description"><div class="section-nav-div"><i class="fa fa-file-text" aria-hidden="true"></i><br />Description</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-metadata/name"><div class="section-nav-div"><i class="fa fa-address-card-o" aria-hidden="true"></i><br />Site Name</div></a>
				</div>
			</div>
		</div>
	</section>
