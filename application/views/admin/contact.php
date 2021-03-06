<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_contact" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1 class="text-center"><i class="fa fa-envelope-o"></i>&nbsp;Contact</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit the Contact page.  You can edit the contact form message and your contact number.</p>
			</div>
			<div class="section-nav container-fluid text-center">
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-contact/message"><div class="section-nav-div"><i class="fa fa-comment-o" aria-hidden="true"></i><br />Message</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-contact/phone"><div class="section-nav-div"><i class="fa fa-phone" aria-hidden="true"></i><br />Phone&nbsp;Number</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-contact/email"><div class="section-nav-div"><i class="fa fa-reply" aria-hidden="true"></i><br />Email</div></a>
				</div>
				<div class="col-sm-4">
					<a href="<?= base_url() ?>admin-contact/contacts"><div class="section-nav-div"><i class="fa fa-users" aria-hidden="true"></i><br />Contacts</div></a>
				</div>
			</div>
		</div>
	</section>
