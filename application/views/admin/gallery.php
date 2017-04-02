<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_gallery" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-camera-retro"></i>&nbsp;Gallery</h1>
			<p class="well">Here you can edit the Gallery page.  You can add and edit categories of pictures.</p>
			<?php foreach($categories as $category) : ?>
			<a href="<?= base_url() . 'admin-gallery/category/' . $category['url_segment'] . '/1' ?>"><?= $category['title'] ?></a>
			<br />
			<?php endforeach; ?>
		</div>
	</section>