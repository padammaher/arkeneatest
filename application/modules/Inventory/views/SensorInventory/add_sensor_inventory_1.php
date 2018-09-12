          <div class="">
           
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Add Device Sensor</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Add_device_sensors">
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="srno" class="form-control" placeholder="1">
              </div>
              </div>
                        
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="deviceid" required="required">
                    <option value="">Select device</option>
<?php foreach ($device_list as $device_id_list) { ?>
                                <option value="<?php echo $device_id_list['id'];?>"><?php echo $device_id_list['number'];?></option>

                       
<?php } ?>
                </select>             
                </div>
              </div> 
                        
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="sensorid" required="required">
                    <option value="">Select device</option>
                  
<?php foreach ($sensorid_list as $sensorid_list_data) { ?>
                                <option value="<?php echo $sensorid_list_data['id'];?>"><?php echo $sensorid_list_data['sensor_no'];?></option>
               
<?php }  ?>
                </select>             
                </div>
              </div>                         
                        
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                      <label>
                              <input type="checkbox" name="device_sen_status" class="flat" checked="checked"> Active
                            </label>
                    </div>
              </div>                        
                        
                <div class="ln_solid"></div>
                <div class="item form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" name="add_sensor_int_button" class="btn btn-primary">Save</button>
                         <a href="<?php echo base_url('Sensor_inventory_list');?>" type="button" class="btn btn-default">Cancel</a>

                      </div>
                </div>

						</form>					
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
 
          </div>