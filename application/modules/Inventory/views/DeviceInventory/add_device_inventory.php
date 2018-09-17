<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
   <div class="x_title">
                                <h4>Add Device Inventory</h4>						
                                <div class="clearfix"></div>
                        </div>
  <div class="x_content">
      <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_inventory_add">



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
                  <input type="text" name="serialnumber" class="form-control" value="<?php echo set_value('serialnumber'); ?>" placeholder="Serial Number" pattern="[A-Za-z0-9\s]*" title="enter characters / numbers only">
                </div>
                          <?php if (form_error('serialnumber')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('serialnumber'); ?></span>
                            <?php } ?>
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
          <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" name="devicedescription" rows="2" placeholder="Description.." style="resize: vertical;" required="required"><?php echo set_value('devicedescription'); ?></textarea>
                </div>
          </div>
         <!--  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type *</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_type" class="form-control" placeholder="Communication Type" value="<?php echo set_value('comm_type'); ?>" required="required">
                </div>
          </div> -->

                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type *</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="comm_type" id="comm_type" required="required">
                    <option value="">Select Type</option>
                    <option value="GSM">GSM</option>

                </select>             
                </div>
                 <?php if (form_error('comm_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('comm_type'); ?></span>
                            <?php } ?>
              </div> 

          <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="gsmnumber" id="gsmnumber" class="form-control" placeholder="GSM Number" value="<?php echo set_value('gsmnumber'); ?>"  pattern="[0-9\s]*" title="enter numbers only">
                </div>
                 <?php if (form_error('gsmnumber')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('gsmnumber'); ?></span>
                            <?php } ?>
          </div>
         <!--  <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_status" class="form-control" placeholder="Communication Status" value="<?php echo set_value('comm_status'); ?>" required="required" pattern="[A-Za-zs]*" title="enter characters only">
                </div>
          </div>
          <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication History</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_history" class="form-control" placeholder="Communication History" value="<?php echo set_value('comm_history'); ?>" required="required" pattern="[A-Za-zs]*" title="enter characters only">
                </div>
          </div> -->
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
                                                    <input type="text" class="form-control has-feedback-left" name="stockdate" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" required="required">
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
                        
                        <option value="Hours" <?php echo (set_value('service_after'))=='Hours'? 'selected':'';?>>Hours</option>
                        <option value="Day" <?php echo (set_value('service_after'))=='Day'? 'selected':'';?>>Day</option>
                        <option value="Month" <?php echo (set_value('service_after'))=='Month'? 'selected':'';?>>Month</option>
                        <option value="Year" <?php echo (set_value('service_after'))=='Year'? 'selected':'';?>>Year</option>
                          
                          
                        </select>
                        </div>
                         <?php if (form_error('oem_ser_interval_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('oem_ser_interval_type'); ?></span>
                            <?php } ?>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" name="oem_ser_interval_type_count" value="<?php echo set_value('oem_ser_interval_type_count');?>" placeholder="2500" required="required">
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
                          
                          <option value="Day" <?php echo (set_value('service_after'))=='Day'? 'selected':'';?> >Day</option>
                          <option value="Hours" <?php echo (set_value('service_after'))=='Hours'? 'selected':'';?>>Hours</option>
                          <option value="Month" <?php echo (set_value('service_after'))=='Month'? 'selected':'';?>>Month</option>
                          <option value="Year" <?php echo (set_value('service_after'))=='Year'? 'selected':'';?>>Year</option>
                          
                          
                        </select>
                        </div>
                          <?php if (form_error('service_after')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_after'); ?></span>
                            <?php } ?>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" name="service_type_count" value="<?php echo set_value('service_type_count');?>" placeholder="12" required="required">
                                            </div>
                                 <?php if (form_error('service_type_count')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_type_count'); ?></span>
                            <?php } ?>
                                        </div>

          <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                  <label><?php $isactive=set_value('device_status'); ?>                          

                    <input type="checkbox" name="device_status" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "on"? 'checked': ''; } else { }?>> Active
                        </label>
                </div>
          </div>						  

  <div class="ln_solid"></div>
  <div class="item form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" name="post" value="add" class="btn btn-primary" />
                <!--Save</button>-->
         <a href="<?php echo base_url('Device_inventory_list');?>" type="button" class="btn btn-default">Cancel</a>

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
           // $("#gsmnumber").attr('required');
           if($("#comm_type").val() != ""){
           alert($("#comm_type").val());
            $("#gsmnumber").attr('required','');
         }
         else
         {
        $("#gsmnumber").removeAttr('required');
         }
        });
    
    

     $("#devicename").change(function ()
            {
      // alert(this.value);
               
                var options;
                // $("#UOM").empty();
//                var options = '<option value="">Select Type</option>';
                $.ajax({
                    url: '<?php echo base_url(); ?>Inventory/Check_devicenum_is_exist',
                    type: 'post',
                    dataType: 'text',
                    data: {devicenum: this.value},
                    success: function (res) {
                        if(res >=1)
                        {
                            //alert("already");
                            $("#devicename").css('border','1px solid #CE5454');
//                                border: 1px solid #CE5454;
                            $(".deivcenumexist").text('Device num already exist..!');
                        }
                        else
                        {
                            //alert("Not already");
                            $(".deivcenumexist").text('');
                        }
                        // var obj = $.parseJSON(res);

                        // for (i = 0; i < obj.length; i++) {
                        //     options += '<option value="' + obj[i]['id'] + '">' + obj[i]['name'] + '</option>';
                        // }
                        // $("#UOM").html(options);
//                         alert(res);
                    }
                });
            });
});
</script>    