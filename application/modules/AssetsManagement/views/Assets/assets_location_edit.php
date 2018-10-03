<?php
$back_action = '';
$back_action = $this->input->post('back_action');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Edit Asset Location</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" id="Add_Task" name="Add_Task"   method="POST" action="<?php echo base_url(); ?>Assets_location_list">
<?php foreach ($asset_location_list as $asset_location_data) { ?>



                        <input type="hidden" name="asset_loc_form_action" id="asset_loc_form_action" value="update <?php echo $asset_location_data['id']; ?>">				



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="assetcode" required readonly>
                                    <!--<option value="">Select Asset Code</option>-->
                                    <option value="<?php echo $asset_location_data['asset_tbl_id']; ?>" selected><?php echo $asset_location_data['code']; ?></option>

                                </select>     

                            </div>
                            <?php if (form_error('assetcode')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetcode'); ?></span>
    <?php } ?>
                        </div>  

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Location <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_location" class="form-control" value="<?php echo set_value('asset_location', $asset_location_data['location']); ?>" placeholder="Enter Asset Location" required="required">
                            </div>
                            <?php if (form_error('asset_location')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_location'); ?></span>
    <?php } ?>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="asset_address" class="form-control" rows="2" style="resize: vertical;" placeholder="Enter Address" required="required"><?php echo set_value('asset_address', $asset_location_data['address']); ?></textarea>
                            </div>
                            <?php if (form_error('asset_address')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_address'); ?></span>
    <?php } ?>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_lat"  id="asset_lat"  class="form-control" value="<?php echo set_value('asset_lat', $asset_location_data['latitude']); ?>" placeholder="Enter Latitude" required="required" onchange="CheckDecimallatitude(Add_Task.asset_lat)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_long" id="asset_long" class="form-control" value="<?php echo set_value('asset_long', $asset_location_data['longitude']); ?>" placeholder="Enter Longitude" required="required" onchange="CheckDecimalLongitude(Add_Task.asset_long)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_contactperson" id="asset_contactperson" class="form-control" value="<?php echo set_value('asset_contactperson', $asset_location_data['contact_person']); ?>" placeholder="Joy" required="required" onchange="">

                            </div>
                            <?php if (form_error('asset_contactperson')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactperson'); ?></span>
    <?php } ?>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No. <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- <input type="text" name="asset_contactno" id="asset_contactno" class="form-control" value="<?php echo $asset_location_data['contact_no']; ?>" placeholder="27 11 326 5900" required="required" onchange="Checkcontactno(Add_Task.asset_contactno)"> -->
                                <input type="tel" name="asset_contactno" value="<?php echo set_value('asset_contactno', $asset_location_data['contact_no']); ?>"   id="asset_contactno" class="form-control" minlength="10" maxlength="11" placeholder="Enter Contact No" required="required" onchange="Checkcontactno(Add_Task.asset_contactno)">
                            </div>
                            <?php if (form_error('asset_contactno')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactno'); ?></span>
    <?php } ?>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- <input type="text" name="asset_contactemail" id="asset_contactemail" class="form-control" value="<?php echo $asset_location_data['contact_email']; ?>" placeholder="joy@bdv.co.za"  required="required" onchange="CheckEmailvalidation(Add_Task.asset_contactemail)"> -->

                                <input type="email" name="asset_contactemail" id="asset_contactemail" value="<?php echo set_value('asset_contactemail', $asset_location_data['contact_email']); ?>" class="form-control" placeholder="Enter Contact Email"  required="required">
                            </div>
                            <?php if (form_error('asset_contactemail')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactemail'); ?></span>
    <?php } ?>
                        </div>  
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <?php 
                                if (isset($asset_location_data['isactive']) && $asset_location_data['isactive'] == 1) {
                                    $checked = "checked";
                                } else {
                                    $checked = "";
                                }
                                ?>
                                <input type="checkbox" name="status" id="status" class="flat" <?php echo isset($checked) ? $checked : ''; ?>> Active
                            </div>
                        </div>	

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" value="<?php echo $asset_location_data['id']; ?>" name="asset_location_post_id"/>
                                <input type="hidden" name="asset_location_post" id="asset_user_post" value="update"/>       
                                <button type="submit" name="asset_loc_edit_button" class="btn btn-primary">Update</button>
    <?php if (!empty($back_action)) { ?>
                                    <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                    <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('Assets_location_list'); ?>" type="button" class="btn btn-default">Cancel</a>
    <?php } ?>


                            </div>
                        </div>
<?php } ?>

                </form>					

            </div>
        </div>
    </div>
</div><script type="text/javascript">
  < script type = "text/javascript">
              function CheckDecimallatitude(inputtxt)
              {
                  var decimal = /^[-,+,0-9,A-Z,a-z]+\.?[0-9,A-Z,a-z]*$/;
                  if (decimal.test(inputtxt.value) == false)
                  {
                      // alert('Enter only Number');
                      document.getElementById("asset_lat").value = '';
                      return false;
                  }

                  return true;

              }

</script>


<script type="text/javascript">
    function CheckDecimalLongitude(inputtxt)
    {
        var decimal = /^[-,+,0-9,A-Z,a-z]+\.?[0-9,A-Z,a-z]*$/;
        if (decimal.test(inputtxt.value) == false)
        {
            // alert('Enter only Number');
            document.getElementById("asset_long").value = '';
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function Checkcontactperson(inputtxt)
    {
        var decimal = /^[0-9a-zA-Z]+$/;
        if (decimal.test(inputtxt.value) == false)
        {
            // alert('Enter Alpha numeric Number');
            document.getElementById("asset_contactperson").value = '';
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function Checkcontactno(inputtxt)
    {
        var decimal = /^[0-9]+$/;
        if (decimal.test(inputtxt.value) == false)
        {
            // alert('Enter only Number');
            // $("#asset_contactno").attr('')
            $("#asset_contactno").attr('required', 'true');
            // document.getElementById("asset_contactno").required = true;
            document.getElementById("asset_contactno").required = true;
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function CheckEmailvalidation(inputtxt) {
        // var x = document.forms["myForm"]["email"].value;
        var x = inputtxt.value;
        // alert(x);
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            // alert("Not a valid e-mail address");
            // document.getElementById('asset_contactemail').;
            document.getElementById('asset_contactemail').value = '';
            return false;
        }
    }
</script>