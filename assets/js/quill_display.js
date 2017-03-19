$(document).ready(function() {
	var quill = new Quill(".quill", {
		modules: { 
			toolbar: false
		},
			readOnly: true,
			theme: "snow"
	});
	var $target = $(".quill");
	var $content = JSON.parse($target[0].innerText);
	quill.setContents($content);
});