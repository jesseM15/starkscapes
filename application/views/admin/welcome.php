<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="welcome" class="admin-section">
		<div class="welcome_wrap container-fluid">
			<h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Welcome</h1>
			<div class="container center col-xs-12 col-sm-6 col-md-6 col-lg-2">
				<div id="info">
					<p>
						ID: <?= $id ?><br />
						Username: <?= $email ?><br />
						Role: <?= $role ?><br />
					</p>
					<a class="logout" href="<?= base_url() ?>user/logout">Log Out</a>
				</div>
			</div>
		</div>
	</section>
