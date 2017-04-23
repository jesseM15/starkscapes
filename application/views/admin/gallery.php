<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_gallery" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1 class="text-center"><i class="fa fa-camera-retro"></i>&nbsp;Gallery</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the Gallery page.  You can add and edit categories of pictures.</p>
			</div>
			<div class="container col-sm-12 col-md-6 center">
				<?= form_open(base_url() . 'admin-gallery', 'class="gallery_form"') ?>
					<?php foreach($categories as $category) : ?>
					<div class="form-group input-group">
						<input disabled class="form-control disabledInput" name="old-<?= $category['id'] ?>" value="<?= $category["title"] ?>" placeholder="Category">
						<div class="input-group-btn">
							<button class="edit btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
						<div class="input-group-btn">
							<button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</div>
						<div class="input-group-btn">
							<button class="goto btn btn-default" data-link="<?= base_url() . 'admin-gallery/category/' . $category['url_segment'] ?>" data-toggle="tooltip" title="Go to <?= $category["title"] ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="dynamic"></div>
					<div class="category_buttons form-group text-center">
						<button class="addCategory btn btn-success btn-lg">Add Category</button>
						<br /><br />
						<input type="submit" id="submitData" class="btn btn-default btn-lg" name="submit" value="Save" />
					</div>
				</form>
			</div>
			<?php if (!empty($_SESSION['message'])) : ?>
			<div class="container-fluid">
				<div class="message alert alert-success text-center">
				<?= $_SESSION['message'] ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>