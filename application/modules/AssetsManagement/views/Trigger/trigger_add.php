<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Trigger</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
<?php // print_r($threshold_array); 
$trigger_edit_data=array('trigger_name'=>'','trigger_threshold_id'=>'','email'=>'','sms_contact_no'=>'','id'=>'');
foreach ($trigger_edit_list as $trigger_edit_data) {
 }  ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>trigger_add" method="POST">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alarm Trigger Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php // print_r($this->input->post()); ?>
                                <input type="text" name="trigger_name" value="<?php echo set_value('trigger_name',$trigger_edit_data['trigger_name']);?>" class="form-control" placeholder="Extreme Oil Pressure" required="required">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Trigger Threshold</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="trigger_threshold" class="form-control" required>  
                                    <option value="">Select Type</option>
                                    <?php if(isset($threshold_array) && !empty($threshold_array)){
                                            if(!in_array('Green',$threshold_array)){ ?>
                                                <option value="Green" <?php echo (set_value('trigger_threshold'))=='Green' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Green' ?'selected':'';  ?>>Green</option>
                                           <?php }
                                            if(!in_array('Red',$threshold_array)){ ?>
                                                <option value="Red" <?php echo (set_value('trigger_threshold'))=='Red' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Red' ?'selected':'';  ?>>Red</option>
                                            <?php }
                                            if(!in_array('Orange',$threshold_array)){ ?>
                                                <option value="Orange" <?php echo (set_value('trigger_threshold'))=='Orange' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Orange' ?'selected':'';  ?>>Orange</option>
                                           <?php }
                                           if (!empty($trigger_edit_data['trigger_threshold_id'])) { ?>  
                            <option value="<?php echo $trigger_edit_data['trigger_threshold_id'];?>" <?php echo (set_value('trigger_threshold'))== $trigger_edit_data['trigger_threshold_id'] ?'selected':'selected';  ?> ><?php echo $trigger_edit_data['trigger_threshold_id'];?></option>   
                                        <?php }
                                        }else {  ?>
                                    <option value="Green" <?php echo (set_value('trigger_threshold'))=='Green' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Green' ?'selected':'';  ?>>Green</option>
                                    <option value="Red" <?php echo (set_value('trigger_threshold'))=='Red' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Red' ?'selected':'';  ?>>Red</option>
                                    <option value="Orange" <?php echo (set_value('trigger_threshold'))=='Orange' ?'selected':($trigger_edit_data['trigger_threshold_id'])=='Orange' ?'selected':'';  ?>>Orange</option>
                                        <?php } ?></select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><input type="checkbox"  onclick="undisable(this);" name="check_email" id="<?php echo isset($trigger_edit_data['email']) ? $trigger_edit_data['email']: $header_desc[0]['client_username']; ?>" <?php echo (set_value('check_email'))== 'on'? 'checked':''; ?> > Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php ?>
                                <input type="text" name="email" id="email" value="<?php echo isset($header_desc[0]['client_username']) ? $header_desc[0]['client_username'] : set_value('email',$trigger_edit_data['email']); ?>" class="form-control" placeholder="abc@xyz.com" <?php if(!empty(set_value('check_email'))){ echo (set_value('check_email'))== 'on'? '':'readonly';} else{ echo 'readonly';} ?> >
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><input type="checkbox"  onclick="undisable1(this)" name="check_contact" id="<?php echo isset($trigger_edit_data['sms_contact_no']) ? $trigger_edit_data['sms_contact_no']: ''; ?>" <?php echo (set_value('check_contact'))== 'on'? 'checked':''; ?>> SMS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contactno" value="<?php echo set_value('contactno',$trigger_edit_data['sms_contact_no']);?>" class="form-control" id="contactno" placeholder="9823230011" <?php if(!empty(set_value('check_contact'))){ echo (set_value('check_contact'))== 'on'? '':'readonly';} else{ echo 'readonly';} ?>>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php if(!empty($trigger_edit_list)) { ?>
                                <input type="hidden" name="trigger_form_action"  value="update" />
                                <input type="hidden" value="<?php echo $trigger_edit_data['id']; ?>" name="trigger_post_id"/>
                            <?php } else {?>                                
                                <input type="hidden" name="trigger_form_action"  value="add" />
                            <?php } ?>    
                                <button type="submit" class="btn btn-primary">Save</button>
                                 <a href="<?php echo base_url('trigger_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                            </div>
                        </div>
                    </form>					
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
function undisable(vall) {
    if(vall.checked == true){
    $("#email").attr("readonly", false);
    
    }
    else if(vall.checked == false)
    {
        $("#email").attr("readonly", true);
        $("#email").val(vall.id);
    }
}

function undisable1(vall) {
//    document.getElementById("contactno").disabled = false;
    if(vall.checked == true){
    $("#contactno").attr("readonly", false);
    }
    else if(vall.checked == false)
    {
        $("#contactno").attr("readonly", true);
        $("#contactno").val(vall.id);
    }
}
</script>