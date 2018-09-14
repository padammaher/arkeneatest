          <div class="">
           
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
                        <h4>Edit Sensor Inventory</h4>						
                        <div class="clearfix"></div>
                    </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Add_sensor_inventory">
<?php // echo "<pre>";
//print_r($sensor_inventory_list_data);
foreach ($sensor_inventory_list_data as $sensor_inventory_data) { ?>

               <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor_Number</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="sensornum" value="<?php echo set_value('sensornum',$sensor_inventory_data['sensor_no']);?>" class="form-control" placeholder="SN001" required="required">
              </div>
              </div>             
              	
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor_Type</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  
                  <select class="form-control" name="sensortype" required="required">                      
                    <option value="">Select Type</option>                   
<?php foreach ($sensor_type as $sensor_type_data) { 
    if($sensor_type_data['id'] == $sensor_inventory_data['sensor_type_tbl_id']) { ?>
                    <option value="<?php echo $sensor_type_data['id'];?>" <?php echo set_value('sensortype')== $sensor_type_data['id']? 'selected':'';?> selected><?php echo $sensor_type_data['name'];?></option>
    <?php } else { ?>                    
                    <option value="<?php echo $sensor_type_data['id'];?>" <?php echo set_value('sensortype')== $sensor_type_data['id']? 'selected':'';?> ><?php echo $sensor_type_data['name'];?></option>
<?php } } ?>
                </select>                               
                </div>
              </div> 
						
							
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Make</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="make" value="<?php echo set_value('make',$sensor_inventory_data['make']);?>" class="form-control" placeholder="Seimens" required="required">
              </div>
              </div>

            <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Model</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="model" value="<?php echo set_value('model',$sensor_inventory_data['model']);?>" class="form-control" placeholder="T001A" required="required">
                  </div>
            </div>
            <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" name="description" value="<?php echo set_value('description',$sensor_inventory_data['description']);?>" class="form-control" placeholder="Oil Temperature" required="required">
                  </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="Parameter" id="Parameter" required="required">
                    <option value="">Select Type</option>                   
                    <!--<option value="<?php echo $parameter_list_data['id'];?>" <?php echo set_value('Parameter')== $parameter_list_data['id']? 'selected':'';?>><?php echo $parameter_list_data['name'];?></option>-->
<?php foreach ($parameter_list as $parameter_list_data) { 
                    if($parameter_list_data['id'] == $sensor_inventory_data['parameter_tbl_id']){ ?>
                    <option value="<?php echo $parameter_list_data['id'];?>" <?php echo set_value('Parameter')== $parameter_list_data['id']? 'selected':'';?> selected><?php echo $parameter_list_data['name'];?></option>
                    <?php } else { ?>
  <option value="<?php echo $parameter_list_data['id'];?>" <?php echo set_value('Parameter')== $parameter_list_data['id']? 'selected':'';?> ><?php echo $parameter_list_data['name'];?></option>                       
<?php } } ?>
                </select>             
                </div>
              </div>             <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="UOM" id="UOM" required="required">
                    <option value="<?php if(!empty(set_value('UOM'))) {echo set_value('UOM');} else {echo $sensor_inventory_data['uom_type_tbl_id'];} ?>"><?php if(!empty(set_value('selectuom'))){ echo set_value('selectuom');} else { echo $sensor_inventory_data['uom_type_tbl_name'];}?></option>                   
                </select>             
                </div>
              <input type="hidden" name="selectuom" id="selectuom">
                     
              </div> 
              
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                      <label><?php $isactive=set_value('isactive'); ?>                          
                          
                              <input type="checkbox" name="isactive" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "1"? 'checked': ''; } else {echo ($sensor_inventory_data['isactive'])=="1"?'checked':''; }?>> Active
                            </label>
                    </div>
              </div>    
              
        <div class="ln_solid"></div>
        <div class="item form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                   <input type="hidden" name="add_sen_inv_form_action" value="update <?php echo $sensor_inventory_data['id'];?>">
                  <button type="submit" name="updatte_sen_int_button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default">Cancel</button>

              </div>
        </div>
<?php } ?>
      </form>					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
 