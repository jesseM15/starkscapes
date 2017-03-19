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
	var quill = new Quill(".quill", {
		modules: { 
			toolbar: toolbarOptions
		},
		placeholder: "Enter text here",
		theme: "snow"
	});

	// Parse the contents of the editor
	var $target = $(".quill");
	if (typeof $target[0] !== 'undefined')
	{
		var $content = JSON.parse($target[0].innerText);
		quill.setContents($content);
	}

	// Handle form submission
	var form = document.querySelector("form");
	form.onsubmit = function() {
		// Populate hidden form on submit
		var about = document.querySelector("input[name=about]");
		about.value = JSON.stringify(quill.getContents());

		console.log("Submitted", $(form).serialize(), $(form).serializeArray());
		if (form.submit())
		{
			return true;
		}
		return false;
	};

});
