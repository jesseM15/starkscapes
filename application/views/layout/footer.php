<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<footer>
		<div class="row text-center">
			<div id="hours" class="footerItem col-sm-12 col-md-4">
				<h3>Hours</h3>
				<div class="hours">
					<?php foreach ($businessHours as $hours) : ?>
					<div class="greenText"><?= $hours['category'] ?></div>
					<div><?= $hours['text'] ?></div>
					<?php endforeach ?>
				</div>
			</div>
			<div id="servicesFooter" class="footerItem col-sm-12 col-md-4">
				<h3>StarkScapes, LLC</h3>
				<ul class="serviceList">
					<?php foreach ($businessInfo as $info) : ?>
					<li class="serviceFooter<?= ($info['styled'] == 1 ? ' greenText' : '') ?>"><?= $info['text'] ?></li>
					<?php endforeach; ?>
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
