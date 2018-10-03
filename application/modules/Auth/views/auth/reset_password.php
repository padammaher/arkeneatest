<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon" />
        

        <title>Change Password</title>

    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                  
                <div class="animate form login_form">
                  <div class="alert alert-danger fade in" id="error_msg" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong></strong> <?php
                                if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                }
                                ?>
                </div>      
                    <section class="login_content">
                       <?php echo form_open('auth/reset_password/' . $code);?>
                        <h1>Change Password</h1>
                        <div>
                           <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
                            <div class="lgnErorr1"></div>
                        </div>
                        <div>
                         <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
                            <div class="lgnErorr2"></div>
                        </div>
                        <div>
                            <?php echo form_input($user_id);?>
                            <?php echo form_hidden($csrf); ?>
                           <?php echo form_submit('submit', lang('reset_password_submit_btn'));?>
                           
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
