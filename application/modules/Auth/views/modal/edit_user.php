<!-- modal start -->
<?php
foreach ($users as $result):
    // var_dump($result->groups);
    ?>
    <div class="modal fade" id="edituser_<?php echo $result->id ?>" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal500">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Create User</h4>
                </div>
                <div class="modal-body">
                    <div class="user-modal-slim"> 

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open_multipart("auth/edit_user", array('id' => 'reg_form')); ?>
                        <div class="row">
                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'first_name',
                                        'name' => 'first_name',
                                        'placeholder' => 'Requisition Code',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr1',
                                        'value' => set_value('first_name', $result->first_name),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr1"></div>
                            </div>

                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'last_name',
                                        'name' => 'last_name',
                                        'placeholder' => 'Requisition Code',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr2',
                                        'value' => set_value('last_name', $result->last_name),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr2"></div>
                            </div>
                            <div class="clearfix"> </div>
                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_email_label', 'email'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'email',
                                        'name' => 'email',
                                        'placeholder' => 'Email',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr3',
                                        'disabled' => 'disabled',
                                        'value' => set_value('company', $result->email),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr3"></div>
                            </div>     
                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'phone',
                                        'name' => 'phone',
                                        'placeholder' => 'Requisition Code',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr4',
                                        'value' => set_value('first_name', $result->phone),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr4"></div>
                            </div>
                            <div class="clearfix"> </div>



                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'password',
                                        'name' => 'password',
                                        'placeholder' => 'Password',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr5',
                                            //'value' => set_value('password', $result->password),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr5"></div>
                            </div>     
                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'id' => 'password_confirm',
                                        'name' => 'password_confirm',
                                        'placeholder' => 'Confirm Password',
                                        'class' => 'browser-default form-control',
                                        'data-error' => '.regErorr6',
                                            //'value' => set_value('password_confirm', $result->password),
                                    ));
                                    ?>

                                </div>
                                <div class="regErorr6"></div>
                            </div>
                            <div class="clearfix"> </div>

                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('country', 'country'); ?> <br />
                                    <?php
                                    echo form_dropdown(array(
                                        'id' => 'country',
                                        'name' => 'country'), $country_list, set_value('country_id', $result->country_id), array('class' => 'browser-default form-control ',
                                        'data-error' => '.errorTxtOff9'
                                            )
                                    );
                                    ?>
                                </div>

                                <div class="regErorr12"></div>

                            </div>

                            <div class="col-sm-6 margin-top-10">
                                <div class="input-field">
                                    <?php echo lang('birth_date', 'birth_date'); ?> <br />
                                    <?php
                                    echo form_input(array(
                                        'name' => 'birth_date',
                                        'id' => 'birth_date',
                                        'data-format' => 'yyyy-mm-dd',
                                        'class' => 'datepicker form-control',
                                        'placeholder' => 'Birth Date',
                                        'value' => set_value('birth_date', $result->birth_date),
                                        'data-error' => '.errorTxtOff15'
                                    ));
                                    ?>

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
                                        'value' => set_value('description', $result->description),
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

                            <div class="clearfix"></div>

                            <div class="col-sm-12 padding-top-10">

                                <?php if ($this->ion_auth->is_admin()): ?>

                                    <h5><?php echo lang('edit_user_groups_heading'); ?></h5>
                                    <?php
                                    $currentGroups = array();
                                    $currentGroups = $result->groups;
                                    //var_dump($groupsa);
                                    foreach ($groups as $group):
                                        ?>
                                        <label class="checkbox">
                                            <?php
                                            $gID = $group['id'];
                                            $checked = null;
                                            $item = null;
                                            foreach ($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                    $checked = ' checked="checked"';
                                                    break;
                                                }
                                            }
                                            ?>
                                            <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>"<?php echo $checked; ?> class=""> 

                                            <?php echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?> <br>
                                        </label>
                                    <?php endforeach ?>

                                <?php endif ?>
                            </div>
                            <?php echo form_hidden('id', $result->id); ?>
                            <?php echo form_hidden($csrf); ?>

                            <div class="col-sm-12 padding-top-10">

                                <?php //echo form_submit('submit', lang('create_user_submit_btn')); ?>
                                <button type="submit" class="btn btn-warning btn-sm pull-right">Submit</button>

                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

