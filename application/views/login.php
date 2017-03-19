<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <section id="login">
        <div id="user" class="container text-center">
            <h3>User Login</h3>
            <?php echo validation_errors('<div class="text-danger text-center">','</div>'); ?>
            <?= form_open(base_url('user/login')) ?>
                <div class="form-group col-sm-12">
                    <label for="login_email">Email</label>
                    <input id="login_email" class="form-control" type="email" name="login_email" placeholder="Email" />
                </div>
                <div class="form-group col-sm-12">
                    <label for="login_password">Password</label>
                    <input id="login_password" class="form-control" type="password" name="login_password" placeholder="Password" />
                </div>
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-default btn-lg">Login</button>
                </div>
            <?= form_close("\n") ?>
            <br />
            <div class="register">
                <a href="<?= base_url('user/register') ?>">Register</a>
            </div>
        </div>
    </section>