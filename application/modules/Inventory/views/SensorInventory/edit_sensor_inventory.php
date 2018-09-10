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
                  <input type="text" name="sensorid" class="form-control" value="<?php echo $Edit_device_sensors_data['sensor_id'];?>">
                </div>
                </div>
							  					  
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <input type="hidden" name="sensor_form_action" id="sensor_form_action" value="update <?php echo $Edit_device_sensors_data['id']; ?>" >    
								
                                                            <button type="submit" class="btn btn-primary" name="update_dev_sen_button" id="edit_inventory_button" >Update</button>
							 <a href="<?php echo base_url('Sensor_inventory_list');?>" type="button" class="btn btn-default">Cancel</a> 
							</div>
						  </div>
<?php } ?>
						</form>					
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
 
          </div>

