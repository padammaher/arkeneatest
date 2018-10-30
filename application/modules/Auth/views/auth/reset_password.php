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
                            <label style="color: white; font-style: normal;" for="new"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
                            <div id="errorpassword"> </div>
                            <div class="lgnErorr1"></div>
                        </div>
                        <div> <label style="color: white; font-style: normal;" for="new_password">
                         <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> </label><br />
		    <?php echo form_input($new_password_confirm);?>
                         <div id="errorpasswordmatch"> </div>
                            <div class="lgnErorr2"></div>
                        </div>
                        <div>
                            <?php echo form_input($user_id);?>
                            <?php echo form_hidden($csrf); ?>
                            
                            
                            <button id="resset_password" class="btn btn-default submit" type="submit">Submit</button> 
                           
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                               <!--- <img src="<?php echo base_url() ?>assets/images/elogo.png">-->
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
<script>
 $(document).ready(function () {
        $('#new').focusout(function () {
            var str = $('#new').val();
            var upper_text = new RegExp('[A-Z]');
            var lower_text = new RegExp('[a-z]');
            var number_check = new RegExp('[0-9]');
            var special_char = new RegExp('[!/\'^£$%&*()}{@#~?><>,|=_+¬-\]');

            var flag = 'T';

            if (str.match(upper_text) && str.match(lower_text) && str.match(special_char) && str.match(number_check) && str.length > 7) {
                $('#errorpassword').html("");
                $("#resset_password").prop("disabled", false);
            } else {
                $('#d12').css("color", "red");
                $('#errorpassword').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> add atleast one upper,lower,special character, one number, and minimum 8 character length");
                $('#errorpassword').css("color", "red");

                $("#resset_password").prop("disabled", true);
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#resset_password").click(function () {
            var password = $("#new").val();
            var confirmPassword = $("#new_confirm").val();
            if (password != confirmPassword) {
                $('#errorpasswordmatch').css("color", "red");
                 $('#errorpasswordmatch').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'>Password Not Match</span> ");
                return false;
            }
             $('#errorpasswordmatch').html("");
            return true;
        });
    });
</script>