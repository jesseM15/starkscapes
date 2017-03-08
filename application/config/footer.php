	<footer>
		<div class="row text-center">
			<div id="hours" class="footerItem col-sm-12 col-md-4">
				<h3>Hours</h3>
				<table class="center">
					<tr>
						<td class="hoursCol">M -F</td>
						<td class="hoursCol">9:00 AM to 7:00 PM</td>
					</tr>
					<tr>
						<td class="hoursCol">Sat</td>
						<td class="hoursCol">9:00 AM to 5:00 PM</td>
					</tr>
					<tr>
						<td class="hoursCol">Sun</td>
						<td class="hoursCol">Closed</td>
					</tr>
				</table>
			</div>
			<div id="servicesFooter" class="footerItem col-sm-12 col-md-4">
				<h3>StarkScapes, LLC</h3>
				<ul class="serviceList">
					<li class="serviceFooter">Lawncare, landscaping, and snow removal</li>
					<li class="serviceFooter">Commercial and Residential</li>
					<li class="serviceFooter">Licensed and Insured</li>
					<li class="serviceFooter" style="font-weight: bold;">FREE ESTIMATES</li>
					<li class="serviceFooter"><a href="tel:3302656058">330-265-6058</a></li>
				</ul>
			</div>
			<div id="socialMedia" class="footerItem col-sm-12 col-md-4">
				<h3>Social Media</h3>
				<div class='follow_us'>
					<span>StarkScapes, LLC on </span><a href='https://www.facebook.com/starkscapes'><img class='fb_image' src='assets/images/facebook.png' alt='facebook logo'></a><br><br>
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

	<script>
		$(document).ready(function(){
			var enabled = false;
			// var enabled = true;
			if (enabled)
			{
			    var MEASUREMENTS_ID = 'measurements'; // abstracted-out for convenience in renaming
			    $("body").append('<div id="'+MEASUREMENTS_ID+'"></div>');
			    $("#"+MEASUREMENTS_ID).css({
			        'position': 'fixed',
			        'bottom': '0',
			        'right': '0',
			        'background-color': 'black',
			        'color': 'white',
			        'padding': '5px',
			        'font-size': '12px',
			        'font-weight': 'bold',
			        'opacity': '0.8'
			    });
			    getDimensions = function(){
			        return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
			    }
			    $("#"+MEASUREMENTS_ID).text(getDimensions());
			    $(window).on("resize", function(){
			        $("#"+MEASUREMENTS_ID).text(getDimensions());
			    });
			}
		});
	</script>

</body>
</html>
