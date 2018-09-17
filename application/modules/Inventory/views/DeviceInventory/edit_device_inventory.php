
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Edit Device Inventory</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left"  method="POST" action="<?php echo base_url();?>Device_inventory_edit">
<?php

foreach ($Edit_deviceinventory_data as $deviceinventory_data) {
	?> 					  
<!--              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
              <div class="col-md-6 col-sm-6 col-xs-12">-->
                <input type="hidden" name="deviceid" class="form-control" value="<?php echo set_value('deviceid',$deviceinventory_data['id']);?>">
<!--              </div>
              </div>-->


              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Device_Num *</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicename" class="form-control" value="<?php echo set_value('devicename',$deviceinventory_data['number']);?>">
              </div>
          <?php if (form_error('devicename')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicename'); ?></span>
          <?php } ?>
              </div>


            
              					  
<div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial_No *</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="serialnumber" class="form-control" value="<?php echo set_value('serialnumber',$deviceinventory_data['serial_no']);?>">
        
      </div>
               <?php if (form_error('serialnumber')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('serialnumber'); ?></span>
          <?php } ?>
</div>

      <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Make *</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicemake" class="form-control" value="<?php echo set_value('devicemake',$deviceinventory_data['make']);?>">
              </div>
                   <?php if (form_error('devicemake')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicemake'); ?></span>
          <?php } ?>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Model *</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicemodel" class="form-control" value="<?php echo set_value('devicemodel',$deviceinventory_data['model']);?>">
              </div>
                  <?php if (form_error('devicemodel')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('devicemodel'); ?></span>
          <?php } ?>
        </div>

        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="devicedescription" class="form-control" rows="2" placeholder="IOT Device" style="resize: vertical;"><?php echo set_value('devicedescription',$deviceinventory_data['description']);?></textarea>
              </div>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type *</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_type" id="comm_type" class="form-control" value="<?php echo set_value('deviceid',$deviceinventory_data['communication_type']);?>">
              </div>
                <?php if (form_error('comm_type')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('comm_type'); ?></span>
          <?php } ?>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="gsmnumber" id="gsmnumber"  class="form-control" value="<?php echo set_value('gsmnumber',$deviceinventory_data['gsm_number']);?>">
              </div>
               <?php if (form_error('gsmnumber')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('gsmnumber'); ?></span>
          <?php } ?>
        </div>
                       
      <!--   <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Status</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_status" class="form-control" value="<?php echo set_value('comm_status',$deviceinventory_data['communication_status']);?>">
              </div>
        </div> -->

        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Protocol</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_protocol" class="form-control" value="<?php echo set_value('comm_protocol',$deviceinventory_data['communication_protocol']);?>">
              </div>
               <?php if (form_error('comm_protocol')) { ?>
              <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('comm_protocol'); ?></span>
          <?php } ?> 
        </div>					

  <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock Date</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <div class="xdisplay_inputx item form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left" name="stockdate" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" value="<?php echo set_value('stockdate',date("m/d/Y",strtotime($deviceinventory_data['stock_date'])));?>" required="required">
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
                        
                        <option value="Hours" <?php echo (set_value('oem_ser_interval_type',$deviceinventory_data['oem_ser_interval_type'])=='Hours')? 'selected':'';?>>Hours</option>
                        <option value="Day" <?php echo (set_value('oem_ser_interval_type',$deviceinventory_data['oem_ser_interval_type'])=='Day')? 'selected':'';?>>Day</option>
                        <option value="Month" <?php echo (set_value('oem_ser_interval_type',$deviceinventory_data['oem_ser_interval_type'])=='Month')? 'selected':'';?>>Month</option>
                        <option value="Year" <?php echo (set_value('oem_ser_interval_type',$deviceinventory_data['oem_ser_interval_type'])=='Year')? 'selected':'';?>>Year</option>
                          
                          
                        </select>
                        </div>
                         <?php if (form_error('oem_ser_interval_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('oem_ser_interval_type'); ?></span>
                            <?php } ?>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" name="oem_ser_interval_type_count" value="<?php echo set_value('oem_ser_interval_type_count',$deviceinventory_data['oem_ser_interval_number']);?>" placeholder="2500" required="required">
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
                          
                          <option value="Day" <?php echo (set_value('service_after',$deviceinventory_data['service_after_type'])=='Day')? 'selected':'';?> >Day</option>
                          <option value="Hours" <?php echo (set_value('service_after',$deviceinventory_data['service_after_type'])=='Hours')? 'selected':'';?>>Hours</option>
                          <option value="Month" <?php echo (set_value('service_after',$deviceinventory_data['service_after_type'])=='Month')? 'selected':'';?>>Month</option>
                          <option value="Year" <?php echo (set_value('service_after',$deviceinventory_data['service_after_type'])=='Year')? 'selected':'';?>>Year</option>
                          
                          
                        </select>
                        </div>
                          <?php if (form_error('service_after')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_after'); ?></span>
                            <?php } ?>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="text" class="form-control" name="service_type_count" value="<?php echo set_value('service_type_count',$deviceinventory_data['service_after_number']);?>" placeholder="12" required="required">
                                            </div>
                                 <?php if (form_error('service_type_count')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('service_type_count'); ?></span>
                            <?php } ?>
                </div>

    <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
           <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                <label><?php $isactive=set_value('isactive'); ?>                          

              <input type="checkbox" name="isactive" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "on"? 'checked': ''; } else {echo ($deviceinventory_data['isactive'])=="1"?'checked':''; }?>> Active
            </label>
           </div>
     </div>
					  					  
		               

            <div class="ln_solid"></div>
            <div class="item form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       <input type="hidden" value="<?php echo $deviceinventory_data['id']; ?>" name="id"/>
                        <input type="hidden" name="post" id="post" value="update" />
                      <!--<input type="hidden" name="form_action_type" value="update_action">-->
                      <button type="submit" name="update_dev_inv_button" id="update_dev_inv_button" class="btn btn-primary">Save</button>
                    <a href="<?php echo base_url('Device_inventory_list');?>" type="button" class="btn btn-default">Cancel</a>

                  </div>
            </div>

    </form>	
<?php } ?>
					
                  </div>
                </div>
              </div>
            </div>