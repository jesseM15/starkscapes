<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="dashboard" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1 class="text-center"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dashboard</h1>
			<div class="center col-xs-12 col-sm-9">
				<p class="well">
					Welcome, <?= $name ?>!  This is the dashboard.  It will take you to the various sections of your site.  The Site section contains things that appear on every page.  The Metadata section contains things that don't directly appear on the site.  The other sections correspond to their respective pages on the public site.
				</p>
			</div>
			<div class="section-nav container-fluid text-center">
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site"><div class="section-nav-div"><i class="fa fa-asterisk" aria-hidden="true"></i><br />Site</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-home"><div class="section-nav-div"><i class="fa fa-home" aria-hidden="true"></i><br />Home</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-services"><div class="section-nav-div"><i class="fa fa-wrench"></i><br />Services</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-gallery"><div class="section-nav-div"><i class="fa fa-camera-retro" aria-hidden="true"></i><br />Gallery</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-contact"><div class="section-nav-div"><i class="fa fa-envelope-o" aria-hidden="true"></i><br />Contact</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-metadata"><div class="section-nav-div"><i class="fa fa-database" aria-hidden="true"></i><br />Metadata</div></a>
				</div>
			</div>
		</div>
	</section>
