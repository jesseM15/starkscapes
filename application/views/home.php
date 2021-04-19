<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <div id="home" class="center">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<?php
				for ($n = 1; $n<count($carouselImages);$n++)
				{
					?>
					<li data-target="#myCarousel" data-slide-to="<?= $n ?>"></li>
					<?php
				}
				?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php $activeDisplayed = false; ?>
				<?php foreach ($carouselImages as $carouselImage) : ?>
				<div class="item<?= ($activeDisplayed == false ? ' active' : '') ?>">
					<img class="img-responsive carouselImage" src="<?= $carouselImage['path'] ?>" alt="<?= $carouselImage['text'] ?>">
				</div>
				<?php $activeDisplayed = true; ?>
				<?php endforeach ?>
			</div>
		</div>

		<section id="about" class="container">
			<div class="row">
				<div class="content">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<?= (!empty($about['content']) ? $about['content'] : '') ?>
					</div>
				</div>
			</div>
		</section>

		<div id="servicesOverview" class="container-fluid text-center">
			<div class="container">
			<?php foreach ($services as $service) : ?>
			<div class="col-sm-4">
				<a class="services-overview-anchor" href="<?= base_url() ?>services/#<?= (!empty($service['text']) ? format_as_class($service['text']) : 'lawncare') ?>"><div class="services-overview-div" style="background:url(<?= $service['path'] ?>) no-repeat;background-size:100%;"><span><?= (!empty($service['icon']) ? $service['icon'] : '') ?><br /><?= $service['text'] ?></span></div></a>
			</div>
			<?php endforeach; ?>
			</div>
		</div>

		<section id="contact">
			<div id="contactContent" class="container">
				<div class="text-center col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<h2><i class="fa fa-envelope-o"></i> Contact us</h2>
					<p class="contactWell well">
						<?= $contactMessage['message'] ?>
					</p>
					<?php if (!empty($success)) : ?>
					<h3 class="contactSuccess"><?= $success ?></h3>
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
							<input type="hidden" name="name" value="" />
							<input type="submit" id="submit" class="btn btn-default btn-lg" name="submit" value="Send">
						</div>
					</form>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="map">
			<div class="row">
				<div class="col-sm-4 col-md-6">
					<div id="county" class="text-center">
						<h2>Serving the Stark County Area</h2>
						<ul class="counties text-left">
							<?php foreach ($serviceAreas as $area) : ?>
							<li><?= $area['area'] ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-8 col-md-6 text-center">
					<iframe id="gmap" src="https://www.google.com/maps/embed/v1/place?key=<?= GOOGLE_MAPS ?>&q=Stark+County,OH">
					</iframe>
				</div>
			</div>
		</section>
	</div>
	