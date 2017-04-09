<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_services_service" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-envelope-o"></i>&nbsp;Contact</h1>
			<h2>Message</h2>
			<div class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
				<form id="message-form" method="post" action="<?= base_url() ?>admin_contact/message">
					<div class="form-group col-sm-12 col-md-6 col-md-offset-3">
						<label for="message">Message</label>
						<textarea class="form-control" name="message" placeholder="Message" rows="5"><?= $contactMessage['message'] ?></textarea>
					</div>

				<br /><br />

				<div class="form-group col-sm-12 text-center">
					<input class="btn btn-default btn-lg" type="submit" value="Save" />
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

	</section>
