<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_home_about" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-home"><i class="fa fa-home"></i>&nbsp;Home</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbsp;About</span>
			<h1 class="text-center"><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbsp;About</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the About section.</p>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-10 center">
				<form method="post" action="<?= base_url() ?>admin_home/about">
					<textarea name="content" id="ckeditor" rows="5"><?= (!empty($about['content']) ? $about['content'] : '') ?></textarea>
					<script>
						// Replace the <textarea id="ckeditor"> with a CKEditor instance
						CKEDITOR.replace('ckeditor', { 
							customConfig: 'custom/ckeditor_config.js'
						});
					</script>
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
