<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_site_background" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-site"><i class="fa fa-asterisk" aria-hidden="true"></i>&nbsp;Site</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp;Background</span>
			<h1 class="text-center"><i class="fa fa-square-o" aria-hidden="true"></i>&nbsp;Background</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit your background picture.  An <a href="https://www.tinyjpg.com" target="_blank">optimized image</a> with a resolution of at least 2560 X 1440 is recommended.</p>
			</div>
			<div class="container col-sm-9 col-md-6 center">
				<form id="background-form" method="post" action="<?= base_url() ?>admin_site/background" enctype="multipart/form-data">

					<div class="img-container form-group text-center">
						<img class="current-image img-responsive center" src="<?= base_url() . $background['path'] ?>" alt="<?= $background['text'] ?>" />
						<br />
						<input type="hidden" id="selectedImage" name="selectedImage" />
						<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#imagesModal">Change</button>
					</div>

				<div class="form-group text-center">
					<input class="btn btn-default btn-lg" type="submit" value="Save" form="background-form" />
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

		<div class="modal fade" id="imagesModal" tabindex="-1" role="dialog" aria-labelledby="imagesModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title col-xs-10" id="imagesModalLabel">Select Image</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-window-close-o col-xs-2" aria-hidden="true"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<?php foreach ($folderImages as $image) : ?>
							<div class="<?= $image === $background['path'] ? 'selection ' : '' ?>selection-white col-sm-4 col-md-4 col-lg-4">
								<img class="selection-image img-responsive center" src="<?= base_url() . $image ?>" alt="Background Image" />
							</div>
							<?php endforeach; ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<label class="btn btn-lg btn-success" for="file">
							Upload Image
							<input id="file" type="file" name="file" style="display:none;" form="background-form">
						</label>
						<button type="button" class="select-button btn btn-lg btn-default" data-dismiss="modal">Select</button>
					</div>
				</div>
			</div>
		</div>

	</section>
