<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title>Ephysionsee Login</title>

    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <?php echo form_open("auth/login", array('id' => 'login_form')); ?> 
                        <h1>Login Form</h1>
                        <div>
                            <?php echo form_input($identity); ?>
                            <div class="lgnErorr1"></div>
                        </div>
                        <div>
                            <?php echo form_input($password); ?>
                            <div class="lgnErorr2"></div>
                        </div>
<!--                        <div class="col-sm-12">
                            <label class="checkbox">
                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> <?php echo lang('login_remember_label', 'remember'); ?>
                            </label>
                        </div>-->
                        <div>
                            <button class="btn btn-default submit" type="submit">LOGIN</button> 
                            <?php echo form_close(); ?>
                            <a class="reset_pass" href="forgot_password"><?php echo lang('login_forgot_password'); ?></a>
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <img src="<?php echo base_url() ?>assets/images/elogo.png">
                                <p>Copyright 2018 - ePhytionSee | All Rights Reserved</p>
                            </div>
                        </div>
                        </form>
                    </section>
                </div>

                <div id="register" class="animate form registration_form">
                    <section class="login_content">
                        <form>
                            <h1>Create Account</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <a class="btn btn-default submit" href="index.html">Submit</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <p class="change_link">Already a member ?
                                    <a href="#signin" class="to_register"> Log in </a>
                                </p>

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <img src="<?php echo base_url() ?>assets/images/elogo.png">
                                    <p>Copyright 2018 - ePhytionSee | All Rights Reserved</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
