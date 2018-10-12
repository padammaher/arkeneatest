<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Device Inventory</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Device_inventory_add">



                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicename" id="devicename" class="form-control" placeholder="Device Number" value="<?php echo set_value('devicename'); ?>" required="required"  pattern="[A-Za-z0-9\s]*" title="enter characters / numbers only">
                        </div>
                        <?php if (form_error('devicename')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicename'); ?></span>
                        <?php } ?>
                        <span class="mrtp10 text-center englable deivcenumexist" style="color:#ff3333; font-size: 15px; "></span>                     
                    </div><!--
                    -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial Number *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="serialnumber" id="serialnumber" class="form-control" value="<?php echo set_value('serialnumber'); ?>" placeholder="Serial Number" pattern="[A-Za-z0-9\s]*" title="enter characters / numbers only">
                        </div>
                        <?php if (form_error('serialnumber')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('serialnumber'); ?></span>
                        <?php } ?>
                        <span class="mrtp10 text-center englable serialnumexist" style="color:#ff3333; font-size: 15px; "></span>                     
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Make *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicemake" class="form-control" value="<?php echo set_value('devicemake'); ?>" placeholder="Device Make" required="required" pattern="[A-Za-z0-9\s]*" title="enter characters / numbers only">
                        </div>
                        <?php if (form_error('devicemake')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicemake'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Model *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicemodel" class="form-control" value="<?php echo set_value('devicemodel'); ?>" placeholder="Device Model" required="required" pattern="[A-Za-z0-9\s]*" title="enter characters / numbers only">
                        </div>
                        <?php if (form_error('devicemodel')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicemodel'); ?></span>
                        <?php } ?>
                    </div>
                    <!--user wise location-->        
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Customerlocation" name="Customerlocation" required>
                                <option value="">Select Location</option>
                                <?php foreach ($location_list as $loc_list) { ?>
                                    <option value="<?php echo $loc_list['id']; ?>" <?php echo (set_value('Customerlocation')) == $loc_list['id'] ? 'selected' : ''; ?> ><?php echo $loc_list['location_name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <?php if (form_error('Customerlocation')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Customerlocation'); ?></span>
                        <?php }
                        ?>
                    </div>
                    <!--user wise location-->               
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="devicedescription" rows="2" placeholder="Description.." style="resize: vertical;" required="required"><?php echo set_value('devicedescription'); ?></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">             
                            <?php $setvalue=set_value('comm_type') ? set_value('comm_type') : '';
                                  $setvalue= $setvalue !=''? 'selected' :'';
                                  ?>
                            <select class="form-control" name="comm_type" id="comm_type" required="required">

                                <option value="" >Select Type</option>                                
                                <option value="GSM" <?php echo set_value('comm_type') == "GSM" ? $setvalue :'';?> >GSM</option>
                                <option value="LORA" <?php echo set_value('comm_type') == "LORA" ? $setvalue :'';?> >LORA</option>
                                <option value="SIGFOX" <?php echo set_value('comm_type') == "SIGFOX" ? $setvalue :'';?> >SIGFOX</option>
                            </select>             
                        </div>
                        <?php if (form_error('comm_type')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('comm_type'); ?></span>
                        <?php } ?>
                    </div> 

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="gsmnumber" id="gsmnumber" class="form-control" placeholder="GSM Number" value="<?php echo set_value('gsmnumber'); ?>"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="11" minlength="10"  pattern="[0-9\s]*" maxlength="11" minlength="10" title="enter numbers only">
                        </div>
                        <?php if (form_error('gsmnumber')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('gsmnumber'); ?></span>
                        <?php } ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Protocol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="comm_protocol" class="form-control" placeholder="Communication Protocol" value="<?php echo set_value('comm_protocol'); ?>" required="required" pattern="[A-Za-zs]*" title="enter characters only">
                        </div>
                        <?php if (form_error('comm_protocol')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('comm_protocol'); ?></span>
                        <?php } ?>
                    </div>					

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Date</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <div class="xdisplay_inputx item form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="stockdate" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" required="required" value="<?php echo set_value('stockdate'); ?>">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                            </div>

                        </div>
                        <?php if (form_error('stockdate')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('stockdate'); ?></span>
                        <?php } ?>
                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">OEM Service Interval</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <select class="form-control" name="oem_ser_interval_type" required="required">

                                    <option value="Hours" <?php echo (set_value('service_after')) == 'Hours' ? 'selected' : ''; ?>>Hours</option>
                                    <option value="Day" <?php echo (set_value('service_after')) == 'Day' ? 'selected' : ''; ?>>Day</option>
                                    <option value="Month" <?php echo (set_value('service_after')) == 'Month' ? 'selected' : ''; ?>>Month</option>
                                    <option value="Year" <?php echo (set_value('service_after')) == 'Year' ? 'selected' : ''; ?>>Year</option>


                                </select>
                            </div>
                            <?php if (form_error('oem_ser_interval_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('oem_ser_interval_type'); ?></span>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" id="oem_ser_interval_type_count" name="oem_ser_interval_type_count" value="<?php echo set_value('oem_ser_interval_type_count'); ?>" placeholder="" required="required">
                        </div>
                        <?php if (form_error('oem_ser_interval_type_count')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('oem_ser_interval_type_count'); ?></span>
                        <?php } ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Service After</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <select class="form-control" name="service_after" required="required">

                                    <option value="Day" <?php echo (set_value('service_after')) == 'Day' ? 'selected' : ''; ?> >Day</option>
                                    <option value="Hours" <?php echo (set_value('service_after')) == 'Hours' ? 'selected' : ''; ?>>Hours</option>
                                    <option value="Month" <?php echo (set_value('service_after')) == 'Month' ? 'selected' : ''; ?>>Month</option>
                                    <option value="Year" <?php echo (set_value('service_after')) == 'Year' ? 'selected' : ''; ?>>Year</option>


                                </select>
                            </div>
                            <?php if (form_error('service_after')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_after'); ?></span>
                            <?php } ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" id="service_type_count" name="service_type_count" value="<?php echo set_value('service_type_count'); ?>" placeholder="" required="required">
                        </div>
                        <?php if (form_error('service_type_count')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_type_count'); ?></span>
                        <?php } ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                            <label><?php $isactive = set_value('device_status'); ?>                          

                                <input type="checkbox" name="device_status" class="flat" <?php
                                if (!empty($isactive)) {
                                    echo ($isactive) == "on" ? 'checked' : '';
                                } else {
                                    echo'checked';
                                }
                                ?>> Active
                            </label>
                        </div>
                    </div>						  

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" name="post" id="postbutton" value="Save" class="btn btn-primary" />
                            <!--Save</button>-->
                            <a href="<?php echo base_url('Device_inventory_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                        </div>
                    </div>

                </form>					

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#comm_type").change(function () {
            if ($("#comm_type").val() != "" && $("#comm_type").val() == "GSM") {
                $("#gsmnumber").attr('required', 'required');
            }
            else
            {
                $("#gsmnumber").removeAttr('required');
            }
        });



        $("#devicename").change(function ()
        {

            var options;
            $.ajax({
                url: '<?php echo base_url(); ?>Inventory/Check_devicenum_is_exist',
                type: 'post',
                dataType: 'text',
                data: {devicenum: this.value},
                success: function (res) {
                    if (res >= 1)
                    {
                        $("#devicename").css('border', '1px solid #CE5454');
                        $(".deivcenumexist").text('Device number already exist..!');
//                            $("#postbutton").disabled=true;
                        document.getElementById("postbutton").disabled = true;
                    }
                    else
                    {
                        $(".deivcenumexist").text('');
//                            alert($(".serialnumexist").text());
                        if ($(".serialnumexist").text() == "") {
                            document.getElementById("postbutton").disabled = false;
                        }
                    }

                }
            });
        });

        $("#serialnumber").change(function ()
        {

            var options;
            $.ajax({
                url: '<?php echo base_url(); ?>Inventory/Check_serialnum_is_exist',
                type: 'post',
                dataType: 'text',
                data: {serialnum: this.value},
                success: function (res) {
                    if (res >= 1)
                    {
                        $("#serialnumber").css('border', '1px solid #CE5454');
                        $(".serialnumexist").text('Serial number already exist..!');
//                            $("#postbutton").disabled=true;
                        document.getElementById("postbutton").disabled = true;
                    }
                    else
                    {
                        $(".serialnumexist").text('');
                        if ($(".deivcenumexist").text() == "") {
                            document.getElementById("postbutton").disabled = false;
                        }
//                             document.getElementById("postbutton").disabled = false;
                    }

                }
            });
        });
    });

    
      $(document).ready(function () {
        $("#gsmnumber").keypress(function (e) {
            $('span.error-keyup-3').remove();
            var inputVal = $(this).val();
           
           if(inputVal.trim()==""){ $('span.error-keyup-3').remove(); }else{
               if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
                return false;
            } else if (inputVal.length < 9) {
                // $("#trigger_button").prop("disabled", true);
                // $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
            }
            if (inputVal.length == 9) {
                // $("#trigger_button").prop("disabled", false);
            } 
            }
        });
        });

    $('#service_type_count').keypress(function (event) {
        var keycode = event.which;
        if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
            event.preventDefault();
        }
    });
    $('#oem_ser_interval_type_count').keypress(function (event) {
        var keycode = event.which;
        if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
            event.preventDefault();
        }
    });


</script>    