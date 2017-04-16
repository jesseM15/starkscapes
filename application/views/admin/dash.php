<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="dash" class="admin-section">
		<div class="admin_wrap container-fluid">
			<h1><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;Dash</h1>
			<div class="center col-xs-12 col-sm-6">
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
