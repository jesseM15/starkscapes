<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_services_service" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Phone&nbsp;Number</span>
			<h1 class="text-center"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Phone&nbsp;Number</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
					<p class="well">Here you can enter your phone number so that it can appear as a link in other sections of the site.  This is done by entering #PHONE into the input.  The marquee, business info, and contact message can make use of this feature.  Enter your phone number with only numbers (No dashes, spaces, etc.)</p>
				</div>
			<div class="container col-sm-6 center">
				<form id="phone-form" method="post" action="<?= base_url() ?>admin_contact/phone">
					<div class="form-group">
						<label for="message">Phone&nbsp;Number</label>
						<input class="form-control" name="phone" value="<?= $phone['phone'] ?>" placeholder="Phone Number" />
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
