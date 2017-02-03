<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<div id="content" id="container-fluid">
		<h3>Register</h3>
		<?php echo validation_errors('<div class="text-danger text-center">','</div>'); ?>
		<?= form_open(base_url('user/register')) ?>
			<div class="form-group">
				<input class="form-control" name="register_email" type="text" placeholder="Email" value="<?php echo set_value('register_email'); ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<input class="form-control" name="register_password" type="password" placeholder="Password" autocomplete="off">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		<?= form_close("\n") ?>
	</div>
