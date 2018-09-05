<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4 text">
                    <h1><strong>Mindworx</strong> Conncet</h1>
                </div>
            </div>  

            <div id="infoMessage"><?php echo $message; ?></div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login to Mindworx Connect</h3>
                            <p>Enter your username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">

                        <div class="wrapper ">
                            <?php echo form_open("auth/login", array('id' => 'login_form')); ?>  
                            
                            <div class="col-sm-12">
                                <div class="input-field">
                                    <?php echo form_input($identity); ?>
                                    <div class="lgnErorr1"></div>
                                </div>         
                            </div> 
                            <div class="clearfix"></div>
                            </br>
                            <div class="col-sm-12 margin-top-10">
                                <?php //echo lang('login_password_label', 'password'); ?>    
                                <div class="input-field">
                                    <?php echo form_input($password); ?>
                                    <div class="lgnErorr2"></div>

                                </div>         
                            </div>  

                            <div class="col-sm-12">
                                <label class="checkbox">
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> <?php echo lang('login_remember_label', 'remember'); ?>
                                </label>
                            </div>
                            <!--<button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>-->
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 
                            <div class="col-sm-12">
                                 <label class="checkbox">
                                <div class=""><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></div>
                             </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>





<?php echo form_close(); ?>
<script>
    $(document).ready(function () {
        $(".alert").fadeOut(3000);
    });

</script>
