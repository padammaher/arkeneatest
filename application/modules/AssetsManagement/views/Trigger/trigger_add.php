<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4><?php
                        if (!empty($trigger_edit_list)) {
                            echo "Edit Trigger";
                        } else {
                            echo "Add Trigger";
                        }
                        ?></h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <?php
// print_r($threshold_array); 
                    $trigger_edit_data = array('trigger_name' => '', 'trigger_threshold_id' => '', 'email' => '', 'sms_contact_no' => '', 'id' => '', 'trigger_message' => '');
                    foreach ($trigger_edit_list as $trigger_edit_data) {
                        
                    }
                    ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>trigger_add" method="POST">
                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alarm Trigger Name <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php // print_r($this->input->post());   ?>
                                <input type="text" name="trigger_name" value="<?php echo set_value('trigger_name', $trigger_edit_data['trigger_name']); ?>" class="form-control" placeholder="Enter Alarm Trigger Name" required="required">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Trigger Threshold <span> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="trigger_threshold" class="form-control" required>  
                                    <option value="">Select Type</option>
                                    <?php
                                    if (isset($threshold_array) && !empty($threshold_array)) {
                                        if (!in_array('Green', $threshold_array)) {
                                            ?>
                                            <option value="Green" <?php echo (set_value('trigger_threshold')) == 'Green' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Green' ? 'selected' : ''; ?>>Green</option>
                                            <?php
                                        }
                                        if (!in_array('Red', $threshold_array)) {
                                            ?>
                                            <option value="Red" <?php echo (set_value('trigger_threshold')) == 'Red' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Red' ? 'selected' : ''; ?>>Red</option>
                                            <?php
                                        }
                                        if (!in_array('Orange', $threshold_array)) {
                                            ?>
                                            <option value="Orange" <?php echo (set_value('trigger_threshold')) == 'Orange' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Orange' ? 'selected' : ''; ?>>Orange</option>
                                            <?php
                                        }
                                        if (!empty($trigger_edit_data['trigger_threshold_id'])) {
                                            ?>  
                                            <option value="<?php echo $trigger_edit_data['trigger_threshold_id']; ?>" <?php echo (set_value('trigger_threshold')) == $trigger_edit_data['trigger_threshold_id'] ? 'selected' : 'selected'; ?> ><?php echo $trigger_edit_data['trigger_threshold_id']; ?></option>   
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="Green" <?php echo (set_value('trigger_threshold')) == 'Green' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Green' ? 'selected' : ''; ?>>Green</option>
                                        <option value="Red" <?php echo (set_value('trigger_threshold')) == 'Red' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Red' ? 'selected' : ''; ?>>Red</option>
                                        <option value="Orange" <?php echo (set_value('trigger_threshold')) == 'Orange' ? 'selected' : ($trigger_edit_data['trigger_threshold_id']) == 'Orange' ? 'selected' : ''; ?>>Orange</option>
                                    <?php } ?></select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><input type="checkbox"  onclick="undisable(this);" name="check_email" id="<?php
                                if (!empty($trigger_edit_data['email'])) {
                                    echo $trigger_edit_data['email'];
                                } else {
                                    echo $header_desc[0]['client_username'];
                                }
                                ?>" <?php echo (set_value('check_email')) == 'on' ? 'checked' : ''; ?> > Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php ?> 
                                <?php
                                $emailfielddata = '';
                                if (!empty($trigger_edit_data['email'])) {
                                    $emailfielddata = $trigger_edit_data['email'];
                                } else {
                                    $emailfielddata = $header_desc[0]['client_username'];
                                }
                                ?>
                                <input type="text" name="email" id="email" value="<?php echo set_value('email', $emailfielddata) == $emailfielddata ? $emailfielddata : $trigger_edit_data['email']; ?>" class="form-control" placeholder="Enter Email" <?php
                                if (!empty(set_value('check_email'))) {
                                    echo (set_value('check_email')) == 'on' ? '' : 'readonly';
                                } else {
                                    echo 'readonly';
                                }
                                ?> >
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><input type="checkbox"  onclick="undisable1(this)" name="check_contact" id="<?php echo isset($trigger_edit_data['sms_contact_no']) ? $trigger_edit_data['sms_contact_no'] : ''; ?>" <?php echo (set_value('check_contact')) == 'on' ? 'checked' : ''; ?>> SMS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contactno" value="<?php echo set_value('contactno', $trigger_edit_data['sms_contact_no']); ?>" class="form-control" id="contactno" onkeyup="if (/\D/g.test(this.value))
                                            this.value = this.value.replace(/\D/g, '')" maxlength="11" minlength="10" title="enter valid number" placeholder="Enter Mobile Number" <?php
                                       if (!empty(set_value('check_contact'))) {
                                           echo (set_value('check_contact')) == 'on' ? '' : 'readonly';
                                       } else {
                                           echo 'readonly';
                                       }
                                       ?>>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Message <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php // print_r($this->input->post());   ?>
                                <input type="text" name="trigger_message" value="<?php echo set_value('trigger_message', $trigger_edit_data['trigger_message']); ?>" class="form-control" placeholder="Enter Message here" required="required">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?php if (!empty($trigger_edit_list)) { ?>
                                    <input type="hidden" name="trigger_form_action"  value="update" />
                                    <input type="hidden" value="<?php echo $trigger_edit_data['id']; ?>" name="trigger_post_id"/>
                                <?php } else { ?>                                
                                    <input type="hidden" name="trigger_form_action"  value="add" />
                                <?php } ?>    
                                <button type="submit" id="trigger_button" class="btn btn-primary"><?php
                                    if (!empty($trigger_edit_list)) {
                                        echo "Update";
                                    } else {
                                        echo "Save";
                                    }
                                    ?></button>
                                <a href="<?php echo base_url('trigger_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                            </div>
                        </div>
                    </form>					
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>-->
<script type="text/javascript">
    function undisable(vall) {
//                                    alert(vall.id);
        if (vall.checked == true) {
            $("#email").attr("readonly", false);

        }
        else if (vall.checked == false)
        {
            $("#email").attr("readonly", true);
            $("#email").val(vall.id);
            $("#trigger_button").prop("disabled", false);
            $('span.error-keyup-3').remove();
        }
    }

    function undisable1(vall) {
//    document.getElementById("contactno").disabled = false;
        if (vall.checked == true) {
            $("#contactno").attr("readonly", false);
        }
        else if (vall.checked == false)
        {
            $("#contactno").attr("readonly", true);
            $("#contactno").val(vall.id);
            // $("#trigger_button").prop("disabled", false);
        }
    }

    $(document).ready(function () {
        $("#contactno").keypress(function (e) {
            $('span.error-keyup-3').remove();
            var inputVal = $(this).val();
            if (inputVal.trim() == "") {
                $("#trigger_button").prop("disabled", false);
            }
            // if($('input[type="check_contact"]').checked==true)
            if ($('input[name="check_contact"]').is(":checked") == true) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
                    return false;
                } else if (inputVal.length < 9) {
                    $("#trigger_button").prop("disabled", true);
                    $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
                }
                if (inputVal.length > 9) {
                    $("#trigger_button").prop("disabled", false);
                }
            } else if ($('input[name="check_contact"]').is(":checked") == false) {
                $("#trigger_button").prop("disabled", false);
                // alert("unchecked");
            }
        });


        $("#email").change(function (e) {
            $('span.error-keyup-3').remove();
            var emailAddress = $(this).val();

            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(emailAddress)) {
                $(this).after('<span class="error error-keyup-3" style="color:red">Enter valid email id</span>');
                $("#trigger_button").prop("disabled", true);
            } else {
                $("#trigger_button").prop("disabled", false);
            }

        });
    });
</script>