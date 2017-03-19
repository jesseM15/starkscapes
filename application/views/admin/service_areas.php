<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_home_service_areas" class="admin-section">
		<div class="admin_home_service_areas_wrap container-fluid">
			<h1><i class="fa fa-home"></i>&nbsp;Home</h1>
			<h2>Service Areas</h2>
			<div class="container">
				<?= form_open(base_url() . 'admin-home/areas', 'class="service_areas_form"') ?>
					<?php foreach ($serviceAreas as $area) : ?>
					<div class="form-group input-group col-sm-12 col-md-6 col-md-offset-3">
						<input disabled class="form-control" name="areas[]" value="<?= $area["area"] ?>" placeholder="Area">
						<div class="input-group-btn">
							<button class="edit btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
						<div class="input-group-btn">
							<button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="dynamic"></div>
					<div class="service_area_buttons form-group col-sm-12 text-center">
						<button class="addServiceArea btn btn-success btn-lg">Add Service Area</button>
						<br /><br />
						<input type="submit" id="submit" class="btn btn-default btn-lg" name="submit" value="Save">
					</div>
				</form>
			</div>
		</div>
	</section>
