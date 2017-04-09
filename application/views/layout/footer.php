<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<footer>
		<div class="row text-center">
			<div id="hours" class="footerItem col-sm-12 col-md-4">
				<h3>Hours</h3>
				<?php
				$hours = array(
					'Monday - Friday' => '9:00 AM - 7:00 PM',
					'Saturday' 			 => '9:00 AM - 5:00 PM',
					'Sunday'			 => 'Appointment Only',
					'Winter Hours'		 => '24/7'
					);
				?>
				<div class="hours">
					<?php foreach ($hours as $category => $value) : ?>
					<div class="greenText"><?= $category ?></div>
					<div><?= $value ?></div>
					<?php endforeach ?>
				</div>
			</div>
			<div id="servicesFooter" class="footerItem col-sm-12 col-md-4">
				<h3>StarkScapes, LLC</h3>
				<ul class="serviceList">
					<li class="serviceFooter">Lawncare landscaping and snow removal</li>
					<li class="serviceFooter">Commercial and Residential</li>
					<li class="serviceFooter">Licensed and Insured</li>
					<li class="serviceFooter greenText" style="font-weight: bold;">FREE ESTIMATES</li>
					<li class="serviceFooter"><a href="tel:3302656058">330-265-6058</a></li>
				</ul>
			</div>
			<div id="socialMedia" class="footerItem col-sm-12 col-md-4">
				<h3>Social Media</h3>
				<div class="follow_us">
					<span>StarkScapes, LLC on </span><a href="https://www.facebook.com/starkscapes"><img class="fb_image" src="<?= base_url() ?>assets/images/facebook.png" alt="facebook logo"></a><br><br>
					<div class="fb-like" data-href="https://www.starkscapes.com" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div id="sitemap">
			<div class="text-center">
				<a href="<?= base_url() ?>home">Home</a>
				 | 
				<a href="<?= base_url() ?>services">Services</a>
				 | 
				<a href="<?= base_url() ?>gallery">Gallery</a>
				 | 
				<a href="<?= base_url() ?>contact">Contact</a>
			</div>
			</div>
			<div id="copyright">
				<div class="text-center">
					Copyright &#169; <?php echo date("Y"); ?> StarkScapes, LLC
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
