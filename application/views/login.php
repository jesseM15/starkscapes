<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <div id="content" class="container-fluid">
        <h3>User Login</h3>
        <?php echo validation_errors('<div class="text-danger text-center">','</div>'); ?>
        <?= form_open(base_url('user/login')) ?>
            <div class="form-group">
                <input class="form-control" type="email" name="login_email" placeholder="Email" />
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="login_password" placeholder="Password" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        <?= form_close("\n") ?>
        <br />
        <div class="register">
            <a href="<?= base_url('user/register') ?>">Register</a>
        </div>
    </div>
