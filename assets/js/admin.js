$(document).ready(function(){

	// (All) - Fade alerts out after alloted time
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 3000);

	// Site > Logo,
	// Site > Background,
	// Home > Carousel,
	// Services > (Any),
	// Gallery > (Any) -
	// Remove all existing selection borders and add one around the clicked image
	$(document).on("click", ".selection-image", function(event) {
		event.preventDefault();
		$(this).parent().siblings().removeClass("selection");
		$(this).parent().addClass("selection");
	});

	// Home > Service Areas, Gallery - Enable the input and disable the edit button
	$(document).on("click", ".edit", function(event) {
		event.preventDefault();
		$(this).parent().prev().removeAttr('disabled');
		$(this).prop('disabled', true);
		console.log('Input editing enabled');
	});

	// Home > Service Areas, Gallery - Delete the input
	$(document).on("click", ".delete", function(event) {
		event.preventDefault();
		$(this).parent().parent().remove();
		console.log('Input deleted');
	});

	// Home > Service Areas - Add a new form group for service area input
	$(document).on("click", ".addServiceArea", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			`<div class="form-group input-group">
				<input class="form-control" name="new[]" value="" placeholder="Area" />
				<div class="input-group-btn">
					<button disabled class="edit btn btn-default" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				</div>
				<div class="input-group-btn">
					<button class="delete btn btn-default" data-toggle="tooltip" title="Delete">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>`
		);
		console.log('Service area added');
	});

	// Site > Logo, Site > Background, Services > (Any) - When a file is selected to upload, write file metadata to the console and run readURL
	$(document).on("change", "#file", function(event) {
		var files = event.originalEvent.target.files;
		for (var i=0, len=files.length; i<len; i++){
			console.log("File selected for upload:");
			console.log("Name: " + files[i].name + "\nType: " + files[i].type + "\nSize: " + files[i].size + "\n");
		}
		readURL(this);
	});

	// Site > Logo, Site > Background, Services > (Any) - Close the modal, read the input file metadata, and set the current image
	function readURL(input) {
		if (input.files && input.files[0]) {
			$('.modal').modal('toggle');
			var reader = new FileReader();
			reader.onload = function (e) {
				$('.current-image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	// Site > Logo, Services > (Any) - Set the service image with the selected existing file
	$(document).on("click", ".select-button", function(event) {
		event.preventDefault();
		$(".current-image").attr("src", $(".selection").children().prop("src"));
		$('#selectedImage').attr('value', $(".selection").children().prop("src"));
	});

	// Gallery > (Any), Home > Carousel - Set upload file and submit form
	$(document).on("change", "#image-file", function(event) {
		event.preventDefault();
		document.getElementById("image-form").submit();
	});

	// Gallery > (Any), Home > Carousel - Add the selected existing file and submit form
	$(document).on("click", ".image-select-button", function(event) {
		event.preventDefault();
		$('#selectedImage').attr('value', $(".selection").children().prop("src"));
		document.getElementById("image-form").submit();
	});

	// Gallery > (Any), Home > Carousel - Move image up in rank
	$(document).on("click", ".imgUp", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var request = $.ajax({
			url: "/admin-" + data[0] + "/ajaxPost",
			data: {'owner' : data[0], 'category' : data[1], 'id' : data[2], 'rank' : data[3], 'button' : 'up'},
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
			console.log("Request failed:\n", status);
		});
	});

	// Gallery > (Any), Home > Carousel - Move image down in rank
	$(document).on("click", ".imgDown", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var request = $.ajax({
			url: "/admin-" + data[0] + "/ajaxPost",
			data: {'owner' : data[0], 'category' : data[1], 'id' : data[2], 'rank' : data[3], 'button' : 'down'},
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
			console.log("Request failed:\n", status);
		});
	});

	// Gallery > (Any), Home > Carousel - Delete image
	$(document).on("click", ".imgDelete", function(event) {
		event.preventDefault();
		var data = $(this).parent().prop("class").split(" ");
		data = data[data.length - 1];
		data = data.split("_");
		var page = $(this).prop("class").split(" ");
		page = page[page.length - 1];
		console.log(page);
		var request = $.ajax({
			url: "/admin-" + data[0] + "/ajaxPost",
			data: {'owner' : data[0], 'category' : data[1], 'id' : data[2], 'page' : page, 'button' : 'delete'},
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
			console.log("Request failed:\n", status);
		});
	});

	// Gallery > (Any) - Delete category
	$(document).on("click", ".categoryDelete", function(event) {
		event.preventDefault();
		if (confirm("Are you sure you want to remove this category?  The images will still be available but the category will be removed.") == true) {
			var id = $(this).prop("id");
			var request = $.ajax({
				url: "/admin-gallery/ajaxPost",
				data: {'id' : id, 'button' : 'deleteCategory'},
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
				console.log("Request failed:\n", status);
			});
		}
	});

	// Site > Marquee - Add a new form group for marquee line input
	$(document).on("click", ".addMarqueeLine", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			`<div class="form-group input-group">
				<input class="form-control" name="new[]" value="" placeholder="Marquee Line" />
				<div class="input-group-btn">
					<button disabled class="edit btn btn-default" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				</div>
				<div class="input-group-btn">
					<button class="delete btn btn-default" data-toggle="tooltip" title="Delete">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>`
		);
		console.log('Marquee Line added');
	});

	// Site > Business Info - Add a new form group for business info input
	$(document).on("click", ".addBusinessInfo", function(event) {
		event.preventDefault();
		var random = Math.random();
		$(".dynamic").append(
			`<div class="form-group input-group">
				<input class="form-control" name="new-` + random + `" value="" placeholder="Info" />
				<div class="input-group-addon">
					<label for="newCheckbox-` + random + `" style="margin:0;">Green
						<input type="hidden" name="newCheckbox-` + random + `" value="0" />
						<input type="checkbox" id="newCheckbox-` + random + `" class="checkbox-inline" name="newCheckbox-` + random + `" value="0" />
					</label>
				</div>
				<div class="input-group-btn">
					<button disabled class="editBusinessInfo btn btn-default" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				</div>
				<div class="input-group-btn">
					<button class="delete btn btn-default" data-toggle="tooltip" title="Delete">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>`
		);
		console.log('Business info added');
	});

	$(document).on("click", ".checkbox-inline", function() {
		if ($(this).attr("value") == 0)
		{
			$(this).attr("value", 1);
		}
		else
		{
			$(this).attr("value", 0);
		}
	});

	// Site > Business Info - Enable the inputs and disable the edit button
	$(document).on("click", ".editBusinessInfo", function(event) {
		event.preventDefault();
		$(this).parent().prev().prev().removeAttr('disabled');
		$(this).parent().prev().children().children().removeAttr('disabled');
		$(this).prop('disabled', true);
		console.log('Input editing enabled');
	});

	// Site > Hours - Add a new form group for hours input
	$(document).on("click", ".addHours", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			`<div class="form-group">
				<div class="input-group">
					<input class="form-control" name="newCategory[]" value='' placeholder="Hours Category">
					<span class="input-group-addon">-</span>
					<input class="form-control" name="new[]" value='' placeholder="Hours">
					<div class="input-group-btn">
						<button disabled class="editHours btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
					</div>
					<div class="input-group-btn">
						<button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>`
		);
		console.log('Hours added');
	});

	// Site > Hours - Enable the inputs and disable the edit button
	$(document).on("click", ".editHours", function(event) {
		event.preventDefault();
		$(this).parent().prev().removeAttr('disabled');
		$(this).parent().prev().prev().prev().removeAttr('disabled');
		$(this).prop('disabled', true);
		console.log('Input editing enabled');
	});

	// (All) - Enable all inputs before form submission
	$(document).on("click", "#submitData", function(event) {
		var inputs=document.getElementsByClassName('disabledInput');
		for(i=0;i<inputs.length;i++) {
			inputs[i].disabled=false;
		}
		console.log('Data submitted');
	});

	// (All) - Set checkbox and hidden input value when checkbox is toggled
	$('input[type="checkbox"]').change(function(){
		this.value = (Number(this.checked));
		this.prev().value = (Number(this.checked));
	});

	// Metadata > Description - Count the characters used.
	$(document).on("keyup", "#description", function() {
		getCharacterCount();
	});

	// Metadata > Keywords - Add a new form group for keyword input
	$(document).on("click", ".addKeyword", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			`<div class="form-group input-group">
				<input class="form-control" name="new[]" value="" placeholder="Keyword" />
				<div class="input-group-btn">
					<button disabled class="edit btn btn-default" data-toggle="tooltip" title="Edit">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
				</div>
				<div class="input-group-btn">
					<button class="delete btn btn-default" data-toggle="tooltip" title="Delete">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</div>
			</div>`
		);
		console.log('Keyword added');
	});

});

function getCharacterCount()
	{
		var count = $("#description").val().length;
		$("#count").html(count);
		if (count < 139)
		{
			$("#count").css("color", "#0C0");
		}
		else if (count >=140 && count < 150)
		{
			$("#count").css("color", "#FB0");
		}
		else
		{
			$("#count").css("color", "#C00");
		}
		// if (count < 136 || count >= 176)
		// {
		// 	$("#count").css("color", "#C00");
		// }
		// else if (count >= 136 && count < 146 || count >= 166 && count < 176)
		// {
		// 	$("#count").css("color", "#FB0");
		// }
		// else
		// {
		// 	$("#count").css("color", "#0C0");
		// }
	}