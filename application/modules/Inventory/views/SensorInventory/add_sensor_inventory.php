          <div class="">
           
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Add Sensor Inventory</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Add_sensor_inventory">
						  

<!--              <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="1" required="required">
              </div>
              </div>-->


               <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor_Number</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="sensornum" value="<?php echo set_value('sensornum');?>" class="form-control" placeholder="SN001" required="required">
              </div>
              </div>

<!--               <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="deviceid" value="<?php echo set_value('deviceid');?>" class="form-control" placeholder="DI001" required="required">
              </div>
              </div>-->
              	
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor_Type</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  
                  <select class="form-control" name="sensortype" required="required">                      
                    <option value="">Select Type</option>                   
<?php foreach ($sensor_type as $sensor_type_data) { ?>
                                <option value="<?php echo $sensor_type_data['id'];?>" <?php echo set_value('sensortype')== $sensor_type_data['id']? 'selected':'';?> ><?php echo $sensor_type_data['name'];?></option>

<?php } ?>
                </select>                               
                </div>
              </div> 
						
							
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Make</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="make" value="<?php echo set_value('make');?>" class="form-control" placeholder="Seimens" required="required">
              </div>
              </div>

            <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="model" value="<?php echo set_value('model');?>" class="form-control" placeholder="T001A" required="required">
                  </div>
            </div>
            <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="description" value="<?php echo set_value('description');?>" class="form-control" placeholder="Oil Temperature" required="required">
                  </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="Parameter" id="Parameter" required="required">
                    <option value="">Select Type</option>                   
<?php foreach ($parameter_list as $parameter_list_data) { 
//                    if($assetcode_list_data['id'] != $dev_asset_data['asset_id']){ ?>
                                <option value="<?php echo $parameter_list_data['id'];?>" <?php echo set_value('Parameter')== $parameter_list_data['id']? 'selected':'';?>><?php echo $parameter_list_data['name'];?></option>

                       
<?php } ?>
                </select>             
                </div>
              </div>             <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="UOM" id="UOM" required="required">
                    <option value="<?php if(!empty(set_value('UOM'))) {echo set_value('UOM');} else {echo '';} ?>"><?php if(!empty(set_value('selectuom'))){ echo set_value('selectuom');} else { echo "Select Type";}?></option>                   
                </select>             
                </div>
              <input type="hidden" name="selectuom" id="selectuom">
                     
              </div> 
              
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                      <label><?php $isactive=set_value('isactive'); ?>                          
                          
                              <input type="checkbox" name="isactive" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "1"? 'checked':''; } else {echo "checked"; }?>> Active
                            </label>
                    </div>
              </div>    
              
        <div class="ln_solid"></div>
        <div class="item form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                   <input type="hidden" name="add_sen_inv_form_action" value="add 0">
                  <button type="submit" name="add_sen_int_button" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('Sensor_inventory_list');?>" type="button" class="btn btn-default">Cancel</a>

              </div>
        </div>

      </form>					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
 