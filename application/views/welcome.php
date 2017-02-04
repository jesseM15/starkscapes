<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div id="user" class="container center col-xs-12 col-sm-6 col-md-6 col-lg-2">
		<div id="welcome">
			<p>
				ID: <?= $id ?><br />
				Username: <?= $email ?><br />
				Role: <?= $role ?><br />
			</p>
			<a class="logout" href="user/logout">Log Out</a>
		</div>
	</div>
