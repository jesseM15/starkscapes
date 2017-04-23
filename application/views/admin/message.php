<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_contact_message" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-comment-o" aria-hidden="true"></i>&nbsp;Message</span>
			<h1 class="text-center"><i class="fa fa-comment-o" aria-hidden="true"></i>&nbsp;Message</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the message that appears above the contact form.  Note you can make your phone number appear as a link by entering #PHONE.</p>
			</div>
			<div class="container col-sm-6 center">
				<form id="message-form" method="post" action="<?= base_url() ?>admin_contact/message">
					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control" name="message" placeholder="Message" rows="5"><?= $contactMessage['message'] ?></textarea>
					</div>

				<div class="form-group text-center">
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
