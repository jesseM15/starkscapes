$(document).ready(function() {

	// Fade the appropriate services out
	if (window.location.href.includes("#lawn-care"))
	{
		$("#landscaping").fadeTo("slow", 0.5);
		$("#snow-removal").fadeTo("slow", 0.5);
	}
	if (window.location.href.includes("#landscaping"))
	{
		$("#lawn-care").fadeTo("slow", 0.5);
		$("#snow-removal").fadeTo("slow", 0.5);
	}
	if (window.location.href.includes("#snow-removal"))
	{
		$("#lawn-care").fadeTo("slow", 0.5);
		$("#landscaping").fadeTo("slow", 0.5);
	}

	// Fade the services in on scroll
	$(window).scroll(function() {  
		$("#lawn-care").fadeTo("slow", 1);
		$("#landscaping").fadeTo("slow", 1);
		$("#snow-removal").fadeTo("slow", 1);
	});

	// Fix the navbar to the top if the user scrolls past the logo
	$(window).scroll(function() {
		if (scrollHeight())
		{
			if($(window).scrollTop() > (scrollHeight())){
				$('nav').addClass('navbar-fixed-top');
			}
			else{
				$('nav').removeClass('navbar-fixed-top');
			}
		}

		function scrollHeight()
		{
			if ($('.logo').length)
			{
				offset = $('.logo').offset().top;
				height = $('.logo').outerHeight();
				return offset + height;
			}
			return false;
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

// DOES NOT WORK FOR ARRAYS, REFERENCE ONLY!!!
// function post(path, params, method) {
// 	method = method || "post"; // Set method to post by default if not specified.

// 	// The rest of this code assumes you are not using a library.
// 	// It can be made less wordy if you use one.
// 	var form = document.createElement("form");
// 	form.setAttribute("method", method);
// 	form.setAttribute("action", path);

// 	for(var key in params) {
// 		if(params.hasOwnProperty(key)) {
// 			var hiddenField = document.createElement("input");
// 			hiddenField.setAttribute("type", "hidden");
// 			hiddenField.setAttribute("name", key);
// 			hiddenField.setAttribute("value", params[key]);

// 			form.appendChild(hiddenField);
// 		}
// 	}

// 	document.body.appendChild(form);
// 	form.submit();
// }