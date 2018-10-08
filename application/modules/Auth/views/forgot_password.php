<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon" />


        <title>Ephysionsee Forgot Password</title>

    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">

                <div class="animate form login_form">
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success fade in" id="error_msg" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success_message'); ?>
                        </div>   
                    <?php } ?> 
                    <?php if ($this->session->flashdata('error_message')) { ?>
                        <div class="alert alert-danger fade in" id="error_msg" style="display: none;">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Error !</strong> <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?> 
                    <section class="login_content">
                        <br>
                        <?php echo form_open("auth/forgot_password"); ?>
                        <h1>Forgot Password</h1>
                        <div>
                            <label for="Email" style="color:white; font-family:courier; text-align: left;">Email </label>
                            <?php echo form_input($identity); ?>
                            <div class="lgnErorr1"></div>
                        </div>
                        <div>
                            <?php // echo form_input($password);     ?>
                            <div class="lgnErorr2"></div>
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Submit</button> 
                            <?php echo form_close(); ?>
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">
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
 <script src="<?php echo base_url('assets/css/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("#error_msg").css("display", "none");
        <?php if ($this->session->flashdata('error_message')) { ?>
                         $("#error_msg").css("display", "block");
                        setTimeout(function () {
                            $('#error_msg').fadeOut('fast');

                        }, 3000);
        <?php } ?>
        });
    </script>
