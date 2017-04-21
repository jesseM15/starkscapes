<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_metadata_name" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-metadata"><i class="fa fa-database" aria-hidden="true"></i>&nbsp;Metadata</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Description</span>
			<h1><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Description</h1>
			<div class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<form id="description-form" method="post" action="<?= base_url() ?>admin_metadata/description">
					<div class="form-group col-sm-12 col-md-6 col-md-offset-3">
						<label for="description">Description</label>
						<textarea id="description" class="form-control" name="description" placeholder="Description" rows="5"><?= $description ?></textarea>
						<br />
						<div class="text-center">
							Character Count: <span id="count"></span>
						</div>
					</div>

				<br /><br />

				<div class="form-group col-sm-12 text-center">
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

<script>
	// Count the characters on page load
	getCharacterCount();
</script>