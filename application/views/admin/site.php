<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_site" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-asterisk" aria-hidden="true"></i>&nbsp;Site</h1>
			<p class="well">Here you can edit things that appear on every page.  You can edit the Marquee, Logo, Hours, Business Info, and Background.</p>
			<div class="section-nav container-fluid text-center">
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site/marquee"><div class="section-nav-div"><i class="fa fa-long-arrow-left" aria-hidden="true"></i><br />Marquee</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site/logo"><div class="section-nav-div"><i class="fa fa-certificate" aria-hidden="true"></i><br />Logo</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site/hours"><div class="section-nav-div"><i class="fa fa-clock-o" aria-hidden="true"></i><br />Hours</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site/business"><div class="section-nav-div"><i class="fa fa-info" aria-hidden="true"></i><br />Business Info</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-site/background"><div class="section-nav-div"><i class="fa fa-square-o" aria-hidden="true"></i><br />Background</div></a>
				</div>
			</div>
		</div>
	</section>
