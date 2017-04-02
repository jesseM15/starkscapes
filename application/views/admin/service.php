<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_services_service" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-wrench"></i>&nbsp;Services</h1>
			<h2><?= $service['icon'] . "&nbsp;" . $service['service'] ?></h2>
			<div class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<form id="service-form" method="post" action="<?= base_url() ?>admin_services/service/<?= format_as_class($service['service']) ?>" enctype="multipart/form-data">
					<div class="form-group col-sm-12 col-md-6 col-md-offset-3">
						<label for="category">Name</label>
						<input class="form-control" name="category" value="<?= $service['service'] ?>" placeholder="Name">
					</div>

					<div class="img-container form-group col-sm-12 col-md-6 col-md-offset-3 text-center">
						<img class="service-image img-responsive center" src="<?= base_url() . $service['image']['path'] ?>" alt="<?= $service['image']['text'] ?>" />
						<input type="hidden" id="selectedImage" name="selectedImage" />
						<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#imagesModal">Change</button>
					</div>

					

					<div class="clearfix"></div>
					<input name="content" type="hidden">
					<div id="quill1">
						<?= (!empty($service['content']) ? $service['content'] : '') ?>
					</div>

				<br /><br />

				<div class="form-group col-sm-12 text-center">
					<input class="btn btn-default btn-lg" type="submit" value="Save" form="service-form" />
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
							<div class="<?= $image === $service['image']['path'] ? 'selection ' : '' ?>selection-white col-sm-4 col-md-4 col-lg-4">
								<img class="selection-image img-responsive center" src="<?= base_url() . $image ?>" alt="Service Image" />
							</div>
							<?php endforeach; ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<label class="btn btn-lg btn-success" for="services-file">
							Upload Image
							<input id="services-file" type="file" name="file" style="display:none;" form="service-form">
						</label>
						<button type="button" class="service-select-button btn btn-lg btn-default" data-dismiss="modal">Select</button>
					</div>
				</div>
			</div>
		</div>

	</section>
