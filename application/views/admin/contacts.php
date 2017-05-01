<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_contact_contacts" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-contact"><i class="fa fa-envelope-o"></i>&nbsp;Contact</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Contacts</span>
			<h1 class="text-center"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Contacts</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can view the people who have filled out the contact form.</p>
			</div>
		<?php foreach ($contacts as $contact) : ?>
			<div class="contact container col-md-12 center">
				<div class="timestamp-service col-sm-6 col-sm-push-6">
					<?= date("m-d-Y h:i A", strtotime($contact['time_stamp'])) ?>
					<br />
					<?php
					if ($contact['service'] === 'other')
					{
						echo '<span class="service-other">' . $contact['other'] . '</span>';
					}
					else
					{
						echo '<span class="service-other">' . $contact['service'] . '</span>';
					}
					?>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
					<span class="name"><?= $contact['first_name'] . ' ' . $contact['last_name'] ?></span>
					<br />
					<?= $contact['phone'] ?>
				</div>
				<div class="col-sm-12">
					<?= $contact['email'] ?>
				</div>
				<div class="col-sm-12">
					<?= $contact['address'] ?>
				</div>
				<div class="col-sm-12 contacts-message">
					<?= $contact['message'] ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

	</section>
