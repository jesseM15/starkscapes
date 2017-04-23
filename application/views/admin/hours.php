<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<section id="admin_site_hours" class="admin-section">
		<div class="admin_wrap container-fluid">
			<a class="breadcrumb" href="<?= base_url() ?>admin-site"><i class="fa fa-asterisk" aria-hidden="true"></i>&nbsp;Site</a>
			&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
			<span class="breadcrumb-end"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Hours</span>
			<h1 class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Hours</h1>
			<br />
			<div class="center col-xs-12 col-sm-9">
				<p class="well">Here you can edit your business hours.  The Hours Category will appear in green text.</p>
			</div>
			<div class="container col-sm-12 col-md-6 center">
				<?= form_open(base_url() . 'admin-site/hours', 'class="hours_form form-horizontal"') ?>
					<?php foreach ($businessHours as $hours) : ?>
					<div class="form-group">
						<div class="input-group">
							<input disabled class="form-control disabledInput" name="oldCategory-<?= $hours['id'] ?>" value='<?= $hours["category"] ?>' placeholder="Hours Category">
							<span class="input-group-addon">-</span>
							<input disabled class="form-control disabledInput" name="old-<?= $hours['id'] ?>" value='<?= $hours["text"] ?>' placeholder="Hours">
							<div class="input-group-btn">
								<button class="editHours btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
							<div class="input-group-btn">
								<button class="delete btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="dynamic"></div>
					<div class="hours_buttons form-group text-center">
						<button class="addHours btn btn-success btn-lg">Add Hours</button>
						<br /><br />
						<input type="submit" id="submitData" class="btn btn-default btn-lg" name="submit" value="Save" />
					</div>
				</form>
			</div>
			<?php if (!empty($_SESSION['message'])) : ?>
			<div class="container-fluid">
				<div class="message alert alert-success text-center">
				<?= $_SESSION['message'] ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
