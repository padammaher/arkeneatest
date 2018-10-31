<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon" />
         <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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
                       <?php echo form_open('auth/reset_password/' . $code,array('id'=>'change_password_form'));?>
                        <h1>Change Password</h1>
                        <div class="errorfornewpawword" id="errorfornewpawword"> </div>
                         <div class="lgnErorr1"></div>
                        <div>
                            <label style="color: white; font-style: normal;" for="new"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
                            
                           
                        </div>
                         
                          <div class="errorfornewconfirmpawword" id="errornewcomparefield"> </div>
                            <div class="lgnErorr2"></div>
                        <div> <label style="color: white; font-style: normal;" for="new_password">
                         <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> </label><br />
		    <?php echo form_input($new_password_confirm);?>
                        
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

<style> 
    .error{
        color: red; 
    }
    </style>
<script type="text/javascript">
 $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
}, "add atleast one upper,lower,special character, one number");


    $("#change_password_form").validate({
    rules: {
        new: {
            required: true,
            minlength: 8,
            maxlength: 18,
            pwcheck:true,
        },
        new_confirm: {
            required: true,
            minlength: 8,
            maxlength: 18,
            equalTo: "#new"
        }
    },
    messages: {
        new: {
            required: "Password should not be blank",
            minlength: "Enter minimum 2 character",
            maxlength: "Enter maximum 50 character",
        },
         new_confirm: {
            required: "New Password should not be blank",
            minlength: "Enter minimum 2 character",
            maxlength: "Enter maximum 50 character",
            equalTo:"Password Does Not Match"
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