$(document).ready(function() {
	if ($("#quill1").length) {
		var quill1 = new Quill("#quill1", {
			modules: { 
				toolbar: false
			},
				readOnly: true,
				theme: "snow"
		});
		var $target = $("#quill1");
		var $content = JSON.parse($target[0].innerText);
		quill1.setContents($content);
	}

	if ($("#quill2").length) {
		var quill2 = new Quill("#quill2", {
			modules: { 
				toolbar: false
			},
				readOnly: true,
				theme: "snow"
		});
		var $target = $("#quill2");
		var $content = JSON.parse($target[0].innerText);
		quill2.setContents($content);
	}

	if ($("#quill3").length) {
		var quill3 = new Quill("#quill3", {
			modules: { 
				toolbar: false
			},
				readOnly: true,
				theme: "snow"
		});
		var $target = $("#quill3");
		var $content = JSON.parse($target[0].innerText);
		quill3.setContents($content);
	}
});