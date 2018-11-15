
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
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Add_sensor_inventory">


                        <!--              <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" value="1" required="required">
                                      </div>
                                      </div>-->


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Number *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="sensornum" value="<?php echo set_value('sensornum'); ?>" class="form-control" placeholder="Enter Sensor_Number" required="required" pattern="[A-Za-z0-9\s]*">
                            </div>
                            <?php if (form_error('sensornum')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('sensornum'); ?></span>
                            <?php } ?>
                        </div>

                        <!--               <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="deviceid" value="<?php echo set_value('deviceid'); ?>" class="form-control" placeholder="DI001" required="required">
                                      </div>
                                      </div>-->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             

                                <select class="form-control" name="sensortype" required="required">                      
                                    <option value="">Select Sensor Type</option>                   
                                    <?php foreach ($sensor_type as $sensor_type_data) { ?>
                                        <option value="<?php echo $sensor_type_data['id']; ?>" <?php echo set_value('sensortype') == $sensor_type_data['id'] ? 'selected' : ''; ?> ><?php echo $sensor_type_data['name']; ?></option>

                                    <?php } ?>
                                </select>                               
                            </div>
                            <?php if (form_error('sensortype')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('sensortype'); ?></span>
                            <?php } ?>
                        </div> 


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Make *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="make" value="<?php echo set_value('make'); ?>" class="form-control" placeholder="Enter Make" required="required" pattern="[A-Za-z\s]*">
                            </div>
                            <?php if (form_error('make')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('make'); ?></span>
                            <?php } ?>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Model *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="model" value="<?php echo set_value('model'); ?>" class="form-control" placeholder="Enter Model" required="required" pattern="[A-Za-z\s]*">
                            </div>
                            <?php if (form_error('model')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('model'); ?></span>
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
                                <input type="text" name="description" value="<?php echo set_value('description'); ?>" class="form-control" placeholder="Enter Description"  pattern="[A-Za-z\s]*">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="Parameter" id="Parameter" required="required">
                                    <option value="">Select Parameter </option>                   
                                    <?php
                                    foreach ($parameter_list as $parameter_list_data) {
//                    if($assetcode_list_data['id'] != $dev_asset_data['asset_id']){ 
                                        ?>
                                        <option value="<?php echo $parameter_list_data['id']; ?>" <?php echo set_value('Parameter') == $parameter_list_data['id'] ? 'selected' : ''; ?>><?php echo $parameter_list_data['name']; ?></option>


                                    <?php } ?>
                                </select>             
                            </div>
                            <?php if (form_error('Parameter')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Parameter'); ?></span>
                            <?php } ?>
                        </div>           
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type*</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="UOM" id="UOM" required="required">
                                    <option value="<?php
                                    if (!empty(set_value('UOM'))) {
                                        echo set_value('UOM');
                                    } else {
                                        echo '';
                                    }
                                    ?>"><?php
                                                if (!empty(set_value('selectuom'))) {
                                                    echo set_value('selectuom');
                                                } else {
                                                    echo "Select UOM Type";
                                                }
                                                ?></option>                   
                                </select>             
                            </div>
                            <?php if (form_error('UOM')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('UOM'); ?></span>
                            <?php } ?>
                            <input type="hidden" name="selectuom" id="selectuom">

                        </div> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM*</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="UOM_ID" id="UOM_ID" required="required">
                                  <!-- <option value="<?php // if(!empty(set_value('UOM'))) {echo set_value('UOM');} else {echo '';}     ?>"><?php //if(!empty(set_value('selectuom'))){ echo set_value('selectuom');} else { echo "Select UOM Type";}    ?></option>                    -->
                                </select>             
                            </div>
                        </div> 

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <label><?php $isactive = set_value('isactive'); ?>                          

                                    <input type="checkbox" name="isactive" class="flat" <?php
                                    if (!empty($isactive)) {
                                        echo ($isactive) == "1" ? 'checked' : '';
                                    } else {
                                        echo "checked";
                                    }
                                    ?>> Active
                                </label>
                            </div>
                        </div>    

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="add_sen_inv_form_action" value="add 0">
                                <button type="submit" name="add_sen_int_button" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url('Sensor_inventory_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>
</div>
