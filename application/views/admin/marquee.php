<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_site_marquee" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-site"><i class="fa fa-asterisk" aria-hidden="true"></i>&nbsp;Site</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>&nbsp;Marquee</span>
			<h1><i class="fa fa-long-arrow-left" aria-hidden="true"></i>&nbsp;Marquee</h1>
			<div class="container">
				<?= form_open(base_url() . 'admin-site/marquee', 'class="marquee_form"') ?>
					<?php foreach ($marqueeLines as $line) : ?>
					<div class="form-group input-group col-sm-12 col-md-6 col-md-offset-3">
						<input disabled class="form-control disabledInput" name="old-<?= $line['id'] ?>" value='<?= $line["text"] ?>' placeholder="Marquee Line">
						<div class="input-group-btn">
							<button class="edit btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</div>
						<div class="input-group-btn">
							<button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="dynamic"></div>
					<div class="marquee_buttons form-group col-sm-12 text-center">
						<button class="addMarqueeLine btn btn-success btn-lg">Add Marquee Line</button>
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
