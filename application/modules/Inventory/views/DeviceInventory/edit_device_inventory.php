
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
                <input type="hidden" name="deviceid" class="form-control" value="<?php echo $deviceinventory_data['id'];?>">
<!--              </div>
              </div>-->


              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Device_Num</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicename" class="form-control" value="<?php echo $deviceinventory_data['number'];?>">
              </div>
              </div>


            
              					  
<div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial_No</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="serialnumber" class="form-control" value="<?php echo $deviceinventory_data['serial_no'];?>">
        
      </div>
</div>

      <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Make</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicemake" class="form-control" value="<?php echo $deviceinventory_data['make'];?>">
              </div>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Model</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="devicemodel" class="form-control" value="<?php echo $deviceinventory_data['model'];?>">
              </div>
        </div>

        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="devicedescription" class="form-control" rows="2" placeholder="IOT Device" style="resize: vertical;"><?php echo $deviceinventory_data['description'];?></textarea>
              </div>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_type" class="form-control" value="<?php echo $deviceinventory_data['communication_type'];?>">
              </div>
        </div>
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="gsmnumber" class="form-control" value="<?php echo $deviceinventory_data['gsm_number'];?>">
              </div>
        </div>
                       
        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Status</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_status" class="form-control" value="<?php echo $deviceinventory_data['communication_status'];?>">
              </div>
        </div>

        <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Protocol</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="comm_protocol" class="form-control" value="<?php echo $deviceinventory_data['communication_protocol'];?>">
              </div>
        </div>					

							  					  
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <input type="hidden" name="form_action_type" value="update_action">
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