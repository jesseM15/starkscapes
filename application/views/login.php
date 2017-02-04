<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div id="user" class="container center">
        <h3>User Login</h3>
        <?php echo validation_errors('<div class="text-danger text-center">','</div>'); ?>
        <?= form_open(base_url('user/login')) ?>
            <div class="form-group">
                <label>Email<input class="form-control" type="email" name="login_email" placeholder="Email" /></label>
            </div>
            <div class="form-group">
                <label>Password<input class="form-control" type="password" name="login_password" placeholder="Password" /></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        <?= form_close("\n") ?>
        <br />
        <div class="register">
            <a href="<?= base_url('user/register') ?>">Register</a>
        </div>
    </div>
