<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_metadata_name" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-metadata"><i class="fa fa-database" aria-hidden="true"></i>&nbsp;Metadata</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Site&nbsp;Name</span>
			<h1 class="text-center"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Site&nbsp;Name</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the name of your site.  This text will appear in the browser tab.</p>
			</div>
			<div class="container col-sm-6 center">
				<form id="name-form" method="post" action="<?= base_url() ?>admin_metadata/name">
					<div class="form-group">
						<label for="name">Name</label>
						<input id="name" class="form-control" name="name" placeholder="Site Name" value="<?= $site_name ?>" />
					</div>

				<div class="form-group text-center">
					<input class="btn btn-default btn-lg" type="submit" value="Save" />
				</div>

				</form>
				<div class="clearfix"></div>
				<?php if (!empty($_SESSION['message'])) : ?>
				<div class="container-fluid">
					<div class="message alert alert-success text-center">
					<?= $_SESSION['message'] ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if (!empty($_SESSION['error'])) : ?>
				<div class="container-fluid">
					<div class="message alert alert-danger text-center">
					<?= $_SESSION['error'] ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>

	</section>
