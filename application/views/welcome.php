<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div id="user" class="container center col-xs-12 col-sm-6 col-md-6 col-lg-2">
		<div id="welcome">
			<p>
				ID: <?= $id ?><br />
				Username: <?= $email ?><br />
				Role: <?= $role ?><br />
			</p>
			<a class="logout" href="<?= base_url() ?>user/logout">Log Out</a>
		</div>
	</div>

	<div style="background:#fff;">
	<?= form_open(base_url() . 'welcome/getContent') ?>
		<div id="editorWrap" style="margin: 20px 0;">
			<!-- Create the editor container -->
			<div id="editor">
				<p>Enter text here</p>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="hidden" id="content" class="content" name="content" />
			<button id="submit" class="btn btn-default btn-lg" name="submit" onclick="getQuillContent(this.form)">Submit</button>
		</div>
	</form>
	</div>

	<script>
		var quill = new Quill("#editor", {
			modules: { toolbar: true },
			placeholder: "Enter text here",
			theme: "snow"
		});

		var test = <?= (!empty($about['content']) ? json_encode($about['content']) : '') ?>;

		quill.setContents([
			{ insert: test },
			{ insert: '\n' }
		]);

		$(document).ready(function() {

		});

		function getQuillContent(form) {
			var content = quill.container.firstChild.innerHTML;
			document.getElementById("content").value = content;

			// Check each field has a value
			if (content.value == '') {
				alert('You must provide all the requested details. Please try again');
				return false;
			}

			form.submit();
		}
	</script>