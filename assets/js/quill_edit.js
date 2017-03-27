$(document).ready(function() {

	// Set up the toolbar
	var toolbarOptions = [
		['bold', 'italic', 'underline'],		// toggled buttons
		[{ 'header': 1 }, { 'header': 2 }, { 'header': [1, 2, 3, 4, 5, 6, false] }],
		
		[{ 'list': 'bullet'}, { 'list': 'ordered' }],
		['link'],
		['blockquote'],
		[{ 'color': [] }],			// dropdown with defaults from theme
		[{ 'align': [] }]
		//[{ 'size': ['small', false, 'large', 'huge'] }]		// custom dropdown
	];

	// Create the editor
	var quill1 = new Quill("#quill1", {
		modules: { 
			toolbar: toolbarOptions
		},
		placeholder: "Enter text here",
		theme: "snow"
	});

	// Parse the contents of the editor
	var $target = $("#quill1");
	if (typeof $target[0] !== 'undefined')
	{
		var $content = JSON.parse($target[0].innerText);
		quill1.setContents($content);
	}

	// Handle form submission
	var form = document.querySelector("form");
	form.onsubmit = function() {
		// Populate hidden form on submit
		var content = document.querySelector("input[name=content]");
		content.value = JSON.stringify(quill1.getContents());

		console.log("Submitted", $(form).serialize(), $(form).serializeArray());
		if (form.submit())
		{
			return true;
		}
		return false;
	};

});
