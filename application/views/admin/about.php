<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_home_about" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-home"></i>&nbsp;Home</h1>
			<h2>About</h2>
			<div class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<form method="post" action="<?= base_url() ?>admin_home/about">
					<input name="content" type="hidden">
					<div id="quill1">
						<?= (!empty($about['content']) ? $about['content'] : '') ?>
					</div>
					<br />
					<div class="text-center">
						<button class="btn btn-default btn-lg" type="submit">Save</button>
					</div>
				</form>
				<?php if (!empty($_SESSION['message'])) : ?>
				<div class="container-fluid">
					<div class="message alert alert-success text-center">
					<?= $_SESSION['message'] ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
