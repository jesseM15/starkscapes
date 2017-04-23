<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_home_carousel" class="admin-section">
		<div class="admin_wrap container-fluid">
			<div id="adminhome" class="center">
				<a class="breadcrumb" href="<?= base_url() ?>admin-home"><i class="fa fa-home"></i>&nbsp;Home</a>
				&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
				<span class="breadcrumb-end"><i class="fa fa-repeat" aria-hidden="true"></i>&nbsp;Carousel</span>
				<h1 class="text-center"><i class="fa fa-repeat" aria-hidden="true"></i>&nbsp;Carousel</h1>
				<br />
				<div class="center col-xs-12 col-sm-9">
					<p class="well">Here you can add, remove, and change the order of images in the carousel.</p>
				</div>
				<div id="adminhomeContent" class="text-center">
					
					<div class="row">
			<?php $n = 1; ?>
			<?php foreach ($images as $image) : ?>
				<div id="carousel-images" class="col-sm-6 col-md-3 home_carousel_<?= $image['id'] . '_' . $image['rank'] ?>">
					<i class="imgDelete fa fa-window-close-o hover-shadow cursor pull-right" aria-hidden="true" data-toggle="tooltip" title="Delete from category"></i>
					<i class="imgDown fa fa-arrow-down hover-shadow cursor pull-right" aria-hidden="true" data-toggle="tooltip" title="Move down in ranking"></i>
					<i class="imgUp fa fa-arrow-up hover-shadow cursor pull-right" aria-hidden="true" data-toggle="tooltip" title="Move up in ranking"></i>
					<img class="imgThumbnail hover-shadow cursor" src="<?= base_url() . $image['path'] ?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $n; ?>)" />
				</div>
				<?php $n++; ?>
			<?php endforeach; ?>
					</div>

					<div id="myModal" class="modal">
						
						<div class="modal-content">
							
							<?php
							$n = 1;
							$count = count($images);
							foreach ($images as $image)
							{
								?>
								<div class="mySlides">
									<div class="numbertext"><?php echo $n; ?> / <?php echo $count; ?></div>
									<img src="<?= base_url() . $image['path'] ?>" style="width:100%;">
								</div>
								<?php
								$n++;
							}
							?>
							<a class="closeModal modalButton" onclick="closeModal()"><i class="fa fa-window-close-o" aria-hidden="true"></i></a>
							<a class="prevModal modalButton" onclick="plusSlides(-1)"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
							<a class="nextModal modalButton" onclick="plusSlides(1)"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

							<?php
							if (isset($caption))
							{
								?>
								<div class="caption-container">
									<p id="caption"></p>
								</div>
								<?php
							}
							?>

							<?php
							if (isset($lightbox))
							{
								$n = 1;
								foreach ($images as $image)
								{
									?>
									<div class="column">
										<img class="demo cursor" src="<?= $image['path'] ?>" style="width:100%" onclick="currentSlide(<?php echo $n; ?>)" alt="">
									</div>
									<?php
									$n++;
								}
							}
							?>
						</div>
					</div>
					<br />
					<div class="row">
						<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#imagesModal">Add Image</button>
					</div>
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
							<div class="selection-white col-sm-4 col-md-4 col-lg-4">
								<img class="selection-image img-responsive center" src="<?= base_url() . $image ?>" alt="Carousel Image" />
							</div>
							<?php endforeach; ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<form id="image-form" method="post" action="<?= base_url() ?>admin_home/carousel" enctype="multipart/form-data">
							<label class="upload-button btn btn-lg btn-success" for="image-file">
								Upload Image
								<input id="image-file" type="file" name="file" style="display:none;" form="image-form" onchange="this.form.submit();">
							</label>
							<input type="hidden" id="selectedImage" name="selectedImage" />
							<button type="button" class="image-select-button btn btn-lg btn-default" data-dismiss="modal">Select</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</section>
