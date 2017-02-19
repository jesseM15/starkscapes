<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div id="gallery" class="center">
		<h1><i class="fa fa-camera-retro"></i> Gallery</h1>
		<section id="gallery">
			<div id="galleryContent" class="container text-center">
				
				<div class='row'>
		<?php
		$n = 1;
		foreach ($imageData as $image)
		{
			?>
			<div class='col-md-3 col-sm-6'>
				<img class='imgThumbnail hover-shadow cursor' src='<?php echo $image['filepath']; ?>' style='width:100%' onclick='openModal();currentSlide(<?php echo $n; ?>)'>
			</div>
			<?php
			$n++;
		}
		?>
		</div>

		<div id="myModal" class="modal">
			
			<div class="modal-content">
				
				<?php
				$n = 1;
				$count = count($imageData);
				foreach ($imageData as $image)
				{
					?>
					<div class="mySlides">
						<div class="numbertext"><?php echo $n; ?> / <?php echo $count; ?></div>
						<img src="<?php echo $image['filepath']; ?>" style="width:100%;">
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
					foreach ($imageData as $image)
					{
						?>
						<div class="column">
							<img class="demo cursor" src="<?php echo $image['filepath']; ?>" style="width:100%" onclick="currentSlide(<?php echo $n; ?>)" alt="">
						</div>
						<?php
						$n++;
					}
				}
				?>

			</div>
		</div>

			</div>
		</section>
	</div>
