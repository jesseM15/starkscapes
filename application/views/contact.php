<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div id="contact" class="center">
		<section id="contact">
			<div id="contactContent" class="container text-center">
				<h1><i class="fa fa-envelope-o"></i> Contact us</h1>
				<p class="contactWell well col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
					<?= $contactMessage ?>
				</p>
				<?php if (!empty($success)) : ?>
				<h2 class="contactSuccess col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4"><?= $success ?></h2>
				<?php unset($success); ?>
				<?php else : ?>
				<?= form_open(base_url() . 'contact') ?>
					<div class="form-group col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<label for="email" class="">Email</label>
						<?= form_error('email') ?>
						<input id="email" class="form-control" name="email" value="<?= set_value('email', '') ?>" placeholder="Email">
					</div>
					<div class="form-group col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<label for="phone">Phone</label>
						<?= form_error('phone') ?>
						<input id="phone" class="form-control" name="phone" value="<?= set_value('phone', '') ?>" placeholder="###-###-####">
					</div>
					<div class="form-group col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<label for="subject">Subject</label>
						<?= form_error('subject') ?>
						<input id="subject" class="form-control" name="subject" value="<?= set_value('subject', '') ?>" placeholder="Subject">
					</div>
					<div class="form-group col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
						<label for="message">Message</label>
						<?= form_error('message') ?>
						<textarea id="message" class="form-control" name="message" rows="3"><?= set_value('message', '') ?></textarea>
					</div>
					<div class="form-group col-sm-12">
						<input type="submit" id="submit" class="btn btn-default btn-lg" name="submit" value="Send">
					</div>
				</form>
				<?php endif; ?>
			</div>
		</section>
	</div>
