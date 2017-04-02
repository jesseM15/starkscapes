$(document).ready(function(){

	// (All) - Fade alerts out after alloted time
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 3000);

	// Home > Service Areas - Enable the input and disable the edit button
	$(document).on("click", ".edit", function(event) {
		event.preventDefault();
		$(this).parent().prev().removeAttr('disabled');
		$(this).prop('disabled', true);
		console.log('Service Area editing enabled');
	});

	// Home > Service Areas - Delete the input
	$(document).on("click", ".delete", function(event) {
		event.preventDefault();
		$(this).parent().parent().remove();
		console.log('Service area deleted');
	});

	// Home > Service Areas - Add a new form group for service area input
	$(document).on("click", ".addServiceArea", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			'<div class="form-group input-group col-sm-12 col-md-6 col-md-offset-3"><input class="form-control" name="areas[]" value="" placeholder="Area"><div class="input-group-btn"><button disabled class="edit btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></div><div class="input-group-btn"><button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>'
		);
		console.log('Service area added');
	});

	// Home > Service Areas - Enable all inputs before form submission
	$(document).on("click", "#submitServiceAreas", function(event) {
		event.preventDefault();
		var inputs=document.getElementsByName('areas[]');
		for(i=0;i<inputs.length;i++) {
			inputs[i].disabled=false;
		}
		console.log('Service areas submitted');
	});

	// Services > (Any) - When a file is selected to upload, write file metadata to the console and run readURL
	$(document).on("change", "#services-file", function(event) {
		var files = event.originalEvent.target.files;
		for (var i=0, len=files.length; i<len; i++){
			console.log("File selected for upload:");
			console.log("Name: " + files[i].name + "\nType: " + files[i].type + "\nSize: " + files[i].size + "\n");
		}
		readURL(this);
	});

	// Services > (Any) - Remove all existing selection borders and add one around the clicked image
	$(document).on("click", ".selection-image", function(event) {
		event.preventDefault();
		$(this).parent().siblings().removeClass("selection");
		$(this).parent().addClass("selection");
	});

	// Services > (Any) - Close the modal, read the input file metadata, and set the service image
	function readURL(input) {
		if (input.files && input.files[0]) {
			$('.modal').modal('toggle');
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.service-image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	// Services > (Any) - Set the service image with the selected existing file
	$(document).on("click", ".service-select-button", function(event) {
		event.preventDefault();
		$(".service-image").attr("src", $(".selection").children().prop("src"));
		$('#selectedImage').attr('value', $(".selection").children().prop("src"));
	});

	// Gallery > (Any) - Set upload file and submit form
	$(document).on("change", "#gallery-file", function(event) {
		event.preventDefault();
		document.getElementById("gallery-form").submit();
	});

	// Gallery > (Any) - Add the selected existing file and submit form
	$(document).on("click", ".gallery-select-button", function(event) {
		event.preventDefault();
		$('#selectedImage').attr('value', $(".selection").children().prop("src"));
		document.getElementById("gallery-form").submit();
	});

	// Gallery > (Any) - Move image up in rank
	$(document).on("click", ".imgUp", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var request = $.ajax({
			url: "/admin-gallery/ajaxPost",
			data: {'category' : data[0], 'id' : data[1], 'rank' : data[2], 'button' : 'up'},
			dataType: "json",
			method: "POST"
		});
		request.done(function(response) {
			console.log("Request Successful:\n", response);
			if (response.result === "Success")
			{
				$("." + response.firstselect).find("img").prop("src", response.firstsrc);
				$("." + response.firstselect).removeClass(response.firstselect).addClass(response.firstclass);
				$("." + response.secondselect).find("img").prop("src", response.secondsrc);
				$("." + response.secondselect).removeClass(response.secondselect).addClass(response.secondclass);
			}
		});
		request.fail(function( jqXHR, status ) {
			console.log( "Request failed:\n", status );
		});
	});

	// Gallery > (Any) - Move image down in rank
	$(document).on("click", ".imgDown", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var request = $.ajax({
			url: "/admin-gallery/ajaxPost",
			data: {'category' : data[0], 'id' : data[1], 'rank' : data[2], 'button' : 'down'},
			dataType: "json",
			method: "POST"
		});
		request.done(function(response) {
			console.log("Request Successful:\n", response);
			if (response.result === "Success")
			{
				$("." + response.firstselect).find("img").prop("src", response.firstsrc);
				$("." + response.firstselect).removeClass(response.firstselect).addClass(response.firstclass);
				$("." + response.secondselect).find("img").prop("src", response.secondsrc);
				$("." + response.secondselect).removeClass(response.secondselect).addClass(response.secondclass);
			}
		});
		request.fail(function( jqXHR, status ) {
			console.log( "Request failed:\n", status );
		});
	});

	// Gallery > (Any) - Delete image
	$(document).on("click", ".imgDelete", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var page = $(this).prop("class").split(" ");
		page = page[page.length - 1];
		console.log(page);
		var request = $.ajax({
			url: "/admin-gallery/ajaxPost",
			data: {'category' : data[0], 'id' : data[1], 'page' : page, 'button' : 'delete'},
			dataType: "json",
			method: "POST"
		});
		request.done(function(response) {
			console.log("Request Successful:\n", response);
			if (response.result === "Success")
			{
				window.location.replace(response.redirect);
			}
		});
		request.fail(function( jqXHR, status ) {
			console.log( "Request failed:\n", status );
		});
	});

});