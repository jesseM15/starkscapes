<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<section id="contactPage">
		<div id="contactPageContent" class="container">
			<div class="text-center col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<h1><i class="fa fa-envelope-o"></i> Contact us</h1>
				<p class="contactWell well">
					<?= $contactMessage['message'] ?>
				</p>
				<?php if (!empty($success)) : ?>
				<h2 class="contactSuccess"><?= $success ?></h2>
				<?php unset($success); ?>
				<?php else : ?>
				<?= form_open(base_url() . '#contact') ?>
					<div class="form-group col-sm-6">
						<label for="fname" class="">First Name&nbsp;<i class="fa fa-star" aria-hidden="true"></i></label>
						<?= form_error('fname') ?>
						<input id="fname" class="form-control" name="fname" value="<?= set_value('fname', '') ?>" placeholder="First Name">
					</div>
					<div class="form-group col-sm-6">
						<label for="lname" class="">Last Name&nbsp;<i class="fa fa-star" aria-hidden="true"></i></label>
						<?= form_error('lname') ?>
						<input id="lname" class="form-control" name="lname" value="<?= set_value('lname', '') ?>" placeholder="Last Name">
					</div>
					<div class="form-group col-sm-6">
						<label for="phone">Phone&nbsp;<i class="fa fa-star" aria-hidden="true"></i></label>
						<?= form_error('phone') ?>
						<input id="phone" class="form-control" name="phone" value="<?= set_value('phone', '') ?>" placeholder="###-###-####">
					</div>
					<div class="form-group col-sm-6">
						<label for="email" class="">Email</label>
						<?= form_error('email') ?>
						<input id="email" class="form-control" name="email" value="<?= set_value('email', '') ?>" placeholder="Email">
					</div>
					<div class="form-group col-sm-12">
						<label for="address">Address</label>
						<?= form_error('address') ?>
						<input id="address" class="form-control" name="address" value="<?= set_value('address', '') ?>" placeholder="Address">
					</div>
					<div class="form-group col-sm-12">
						<label for="service_dropdown">How can we help you?</label>
						<?= form_error('service_dropdown') ?>
						<?= form_dropdown('service_dropdown', $service_dropdown, set_value('service_dropdown', 'lawncare'), 'id="service_dropdown" class="form-control text-center"') ?>
					</div>
					<div id="hidden" class="form-group col-sm-12">
						<label for="other">Other</label>
						<?= form_error('other') ?>
						<input id="other" class="form-control" name="other" value="<?= set_value('other', '') ?>" placeholder="Other">
					</div>
					<div class="form-group col-sm-12">
						<label for="message">Message&nbsp;<i class="fa fa-star" aria-hidden="true"></i></label>
						<?= form_error('message') ?>
						<textarea id="message" class="form-control" name="message" rows="3"><?= set_value('message', '') ?></textarea>
					</div>
					<div class="form-group col-sm-12">
						<input type="submit" id="submit" class="btn btn-default btn-lg" name="submit" value="Send">
					</div>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</section>
