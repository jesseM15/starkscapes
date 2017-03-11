$(document).ready(function() {

	// Fix the navbar to the top if the user scrolls past the logo
	$(window).scroll(function(){
		if($(window).scrollTop() > (scrollHeight())){
			$('nav').addClass('navbar-fixed-top');
		}
		else{
			$('nav').removeClass('navbar-fixed-top');
		}

		function scrollHeight()
		{
			offset = $('.logo').offset().top;
			height = $('.logo').outerHeight();
			return offset + height;
		}
	});

	// Toggle the 'hidden' field displaying when selected from the service dropdown
	$('#hidden').css('display', 'none');
	$('#service_dropdown').change(function() {
		if (document.getElementById('service_dropdown').value == 'other')
		{
			$('#hidden').show('slow');
		}
		else
		{
			$('#hidden').hide('fast');
		}
	});

	// Toggle the browsersize display when the user presses F2 (keyCode 113)
	var browsersizeEnabled = false;
			window.onkeypress = function(event) {
			   if (event.keyCode == 113) {
			      if (browsersizeEnabled == false)
			      {
			      	browsersizeEnabled = true;
			      }
			      else
			      {
			      	browsersizeEnabled = false;
			      }
			      browsersize();
			   }
			   // alert(event.keyCode);
			}
			
			function browsersize()
			{
				if (browsersizeEnabled)
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
				        'opacity': '0.8',
				        'display': 'block',
				        'display': 'initial'
				    });
				    getDimensions = function(){
				        return $(window).width() + ' (' + $(document).width() + ') x ' + $(window).height() + ' (' + $(document).height() + ')';
				    }
				    $("#"+MEASUREMENTS_ID).text(getDimensions());
				    $(window).on("resize", function(){
				        $("#"+MEASUREMENTS_ID).text(getDimensions());
				    });
				}
				else
				{
					$("#measurements").css({
						'display': 'none'
					});
				}
			}
});