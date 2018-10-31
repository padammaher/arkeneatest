<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon" />


        <title>Ephysionsee Login</title>

    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">

                <div class="animate form login_form">
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success fade in" id="sucess_msg" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success_message'); ?>
                        </div>   
                    <?php } ?> 
                     <?php if ($this->session->flashdata('error_message')) { ?>
                        <div class="alert alert-danger fade in" id="error_msg" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>failed!</strong> <?php echo $this->session->flashdata('error_message'); ?>
                        </div>   
                    <?php } ?> 
                     <?php if ($message) { ?>
                        <div class="alert alert-danger fade in" id="server_msg" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>failed!</strong> <?php echo $message; ?>
                        </div>   
                    <?php } ?> 
                       
                    <section class="login_content">
                        <?php echo form_open("auth/login", array('id' => 'login_form')); ?> 
                        <h1>Login Form</h1>
                        <div>
                            <?php echo form_input($identity); ?>
                            <div class="lgnErorr1">
                                <?php if (form_error('identity')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('identity'); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div>
                            <?php echo form_input($password); ?>
                            <div class="lgnErorr2">
                                <?php if (form_error('password')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('password'); ?></span>
                                <?php } ?>
                            </div>
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
<!--                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>-->

                            <div class="clearfix"></div>
                            <br />

                            <div>
                               <!--- <img src="<?php echo base_url() ?>assets/images/elogo.png">--->
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
    <script src="<?php echo base_url('assets/css/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php if ($this->session->flashdata('error_message')) { ?>
                $("#error_msg").css("display", "block");
                setTimeout(function () {
                    $('#error_msg').fadeOut('fast');

                }, 3000);
              <?php } ?>
               <?php if ($this->session->flashdata('success_message')) { ?>
                $("#sucess_msg").css("display", "block");
                setTimeout(function () {
                    $('#sucess_msg').fadeOut('fast');

                }, 3000);
              <?php } ?>
                  <?php if ($message) { ?>
                $("#server_msg").css("display", "block");
                setTimeout(function () {
                    $('#server_msg').fadeOut('fast');

                }, 3000);
              <?php } ?>
                  
        });
        
        $("#login_form").validate({
            rules: {
                identity: {
                    required: true,
                    email:true, 
                },
                password: {
                    required: true
                }
            },
             messages: {
                    identity: {
                        required: "Please enter valid email address",
                        email: "Please enter valid email address",
                       
                    },
                     password: {
                        required: "Please enter a password",                       
                    }
                },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
        
        
        
        
    </script>
    <style>
        .error{
            color: red;
        }
    </style>
    
</html>
