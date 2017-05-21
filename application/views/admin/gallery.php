<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_gallery" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1 class="text-center"><i class="fa fa-camera-retro"></i>&nbsp;Gallery</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the Gallery page.  You can add new categories of pictures.  The gallery will load much faster if you <a href="https://www.tinyjpg.com" target="_blank">optimize your images</a>.</p>
			</div>
			<div class="section-nav container-fluid text-center">
			<?php foreach($categories as $category) : ?>
				<div class="col-sm-4">
					<a href="<?= base_url() . 'admin-gallery/category/' . $category['url_segment'] ?>"><div class="section-nav-div"><i class="fa fa-picture-o" aria-hidden="true"></i><br /><?= $category['title'] ?></div></a>
				</div>
			<?php endforeach; ?>
				<div class="col-sm-12">
					<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#categoryModal">Add Category</button>
				</div>
			</div>
			<?php if (!empty($_SESSION['message'])) : ?>
			<div class="container-fluid">
				<div class="message alert alert-success text-center">
				<?= $_SESSION['message'] ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title col-xs-10" id="categoryModalLabel">Enter a Category Title</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="fa fa-window-close-o col-xs-2" aria-hidden="true"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<form id="category-form" method="post" action="<?= base_url() ?>admin_gallery">
								<div class="form-group col-sm-9 center">
									<label for="categoryTitle">Category Title</label>
									<input id="categoryTitle" name="title" class="form-control" value="" placeholder="Title" />
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-lg btn-default" data-dismiss="modal">Cancel</button>
						<input type="submit" name="submit" class="btn btn-lg btn-default" value="Save" form="category-form" />
					</div>
				</div>
			</div>
		</div>

	</section>