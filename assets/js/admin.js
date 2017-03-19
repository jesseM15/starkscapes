$(document).ready(function(){

	$(document).on("click", ".edit", function(event) {
		event.preventDefault();
		$(this).parent().prev().removeAttr('disabled');
		$(this).prop('disabled', true);
		console.log('Service Area editing enabled');
	});
	$(document).on("click", ".delete", function(event) {
		event.preventDefault();
		$(this).parent().parent().remove();
		console.log('Service area deleted');
	});
	$(document).on("click", ".addServiceArea", function(event) {
		event.preventDefault();
		$(".dynamic").append(
			'<div class="form-group input-group col-sm-12 col-md-6 col-md-offset-3"><input class="form-control" name="areas[]" value="" placeholder="Area"><div class="input-group-btn"><button disabled class="edit btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></div><div class="input-group-btn"><button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>'
		);
		console.log('Service area added');
	});
	$(document).on("submit", ".service_areas_form", function() {
		// enables all of the input elements so they will be posted
		var inputs=document.getElementsByName('areas[]');
		for(i=0;i<inputs.length;i++) {
			inputs[i].disabled=false;
		}
		console.log('Service areas submitted');
	});
});
