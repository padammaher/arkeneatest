          <div class="">
           
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Edit Device Sensor</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Edit_device_sensors">
<?php foreach ($Edit_device_sensors_data as $Edit_device_sensors_data) { ?>
											  
						  <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" class="form-control" value="1">
							</div>
						  </div>
							
							
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                                <select class="form-control" name="deviceid" required="required" readonly>                                                  
                                                              <option value="<?php echo $Edit_device_sensors_data['device_inventory_id'];?>" selected><?php echo $Edit_device_sensors_data['number'];?></option>

                                              </select>             
                                              </div>
                                          </div> 
 
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="sensorid" required="required">
                    <option value="">Select device</option>                    
<?php foreach ($sensorid_list as $sensorid_list_data) { 
     if ( $sensorid_list_data['id'] == $Edit_device_sensors_data['sensor_id']) { ?>
<option value="<?php echo $sensorid_list_data['id'];?>" <?php echo (set_value('sensorid')== $sensorid_list_data['id'])? 'selected':'selected';?> ><?php echo $sensorid_list_data['sensor_no'];?></option>
     <?php }else { ?>              
<option value="<?php echo $sensorid_list_data['id'];?>" ><?php echo $sensorid_list_data['sensor_no'];?></option>
<?php } } ?>
                </select>             
                </div>
              </div> 
                        
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                      <label>
                              <input type="checkbox" name="isactive" class="flat" checked="checked"> Active
                            </label>
                    </div>
              </div>                         
							  					  
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <input type="hidden" value="<?php echo $Edit_device_sensors_data['id']; ?>" name="id"/>
                                                 <input type="hidden" name="post" id="post" value="update"/>
                                                            <!--<input type="hidden" name="sensor_form_action" id="sensor_form_action" value="update <?php echo $Edit_device_sensors_data['id']; ?>" >-->    
								
                                                            <button type="submit" class="btn btn-primary" name="update_dev_sen_button" id="edit_inventory_button" >Update</button>
							 <a href="<?php echo base_url('Device_sensor_list');?>" type="button" class="btn btn-default">Cancel</a> 
							</div>
						  </div>
<?php } ?>
						</form>					
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
 
          </div>

