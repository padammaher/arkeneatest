<!-- modal start -->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal500">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create User</h4>
            </div>
            <div class="modal-body">
                <div class="user-modal-slim"> 

                    <div id="infoMessage"><?php echo $message; ?></div>

                    <?php echo form_open_multipart("auth/create_user", array('id' => 'reg_form')); ?>

                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                            <?php echo form_input($first_name); ?>

                        </div>
                        <div class="regErorr1"></div>
                    </div>
                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                            <?php echo form_input($last_name); ?>

                        </div>
                        <div class="regErorr2"></div>
                    </div>

                    <div class="clearfix"></div>



                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_email_label', 'email'); ?> <br />
                            <?php echo form_input($email); ?>

                        </div>
                        <div class="regErorr4"></div>
                    </div>

                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                            <?php echo form_input($phone); ?>

                        </div>
                        <div class="regErorr6"></div>
                    </div>

                    <div class="clearfix"></div>







                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_password_label', 'password'); ?> <br />
                            <?php echo form_input($password); ?>

                        </div>
                        <div class="regErorr7"></div>
                    </div>




                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                            <?php echo form_input($password_confirm); ?>

                        </div>
                        <div class="regErorr8"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('country', 'country'); ?> <br />
                            <?php
                            echo form_dropdown(array(
                                'id' => 'country',
                                'name' => 'country',
                                'class' => 'form-control',
                                'data-error' => '.regErorr12',
                                    ), $country_list);
                            ?>
                        </div>

                        <div class="regErorr12"></div>

                    </div>

                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('birth_date', 'birth_date'); ?> <br />
                            <?php echo form_input($birth_date); ?>

                        </div>
                        <div class="regErorr9"></div>
                    </div>



                    <div class="clearfix"></div>


                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('description', 'description'); ?> <br />
                            <?php
                            echo form_textarea(array(
                                'name' => 'description',
                                'id' => 'description',
                                'class' => 'form-control',
                                'placeholder' => 'About You....',
                                'type' => 'text',
                                'data-error' => '.regErorr13',
                            ));
                            ?>         

                        </div>
                        <div class="regErorr13"></div>
                    </div>


                    <div class="col-sm-6 margin-top-10">
                        <div class="input-field">
                            <?php echo lang('profile_image', 'profile_image'); ?> <br />
                            <?php echo form_input($profile_image); ?>

                        </div>
                        <div class="regErorr9"></div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-sm-12 padding-top-10">

                        <?php //echo form_submit('submit', lang('create_user_submit_btn'));  ?>
                        <button type="submit" class="btn btn-warning btn-sm pull-right">Submit</button>

                    </div>


                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>