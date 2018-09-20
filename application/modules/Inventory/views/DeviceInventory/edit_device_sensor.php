<?php $managed_dev_sen_Id='';$managed_dev_sen_Id_readonly='';
if($this->input->post('dev_sen_post_add')){ 
    $managed_dev_sen_Id=explode(" ",$this->input->post('dev_sen_post_add'));
    $managed_dev_sen_Id_readonly=$managed_dev_sen_Id[0];
    
}?>	
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
      <?php foreach ($Edit_device_sensors_data as $Edit_device_sensors_data) { 
//          print_r($Edit_device_sensors_data); ?>




                    <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">             
                    <select class="form-control" name="deviceid" required="required" <?php echo $managed_dev_sen_Id_readonly == 'dev'? 'readonly="readonly"' : '';?>>                                                  
                   
<?php  if($managed_dev_sen_Id_readonly=="sen") {?>                                     
 <option value="">Select device</option>
<?php } ?>                                    
<?php if($managed_dev_sen_Id_readonly=="dev"){
foreach ($device_list as $device_id_list) { 
if($managed_dev_sen_Id[1] == $device_id_list['id']){ ?>
<option value="<?php echo $device_id_list['id'];?>" <?php echo set_value('deviceid',$managed_dev_sen_Id[1])==$device_id_list['id']? 'selected':'' ?> ><?php echo $device_id_list['number'];?></option>
<?php } } }
elseif($managed_dev_sen_Id_readonly=="sen"){ 
        foreach ($device_list as $device_list_2) { ?>

            <option value="<?php echo $device_list_2['id']; ?>" <?php echo set_value('deviceid',$Edit_device_sensors_data['device_id']) == $device_list_2['id'] ? 'selected' : ''; ?> >  <?php echo $device_list_2['number']; ?></option>

        <?php } }
else {   ?>
     <option value="">Select device</option>       
    <option value="<?php echo $Edit_device_sensors_data['device_id']; ?>" <?php echo set_value('deviceid',$Edit_device_sensors_data['device_id']) == $Edit_device_sensors_data['device_id'] ? 'selected' : ''; ?> ><?php echo $Edit_device_sensors_data['number']; ?></option>
<?php  } ?>
                    </select>             
                    </div>
                      <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
                            <?php } ?>
                    </div> 

                      
                      
                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor ID *</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">             
<select class="form-control" name="sensorid" <?php echo $managed_dev_sen_Id_readonly == 'sen'? 'readonly="readonly"' : '';?>>
  <?php  if($managed_dev_sen_Id_readonly=="dev") {?>                                     
                <option value="">Select Sensor</option>
        <?php } ?>   
        <?php if($managed_dev_sen_Id_readonly=="sen"){
        foreach ($sensorid_list as $sensorid_list_data) { 
        if($managed_dev_sen_Id[1] == $sensorid_list_data['id']){ ?>
        <option value="<?php echo $sensorid_list_data['id'];?>" <?php echo set_value('sensorid',$managed_dev_sen_Id[1])==$sensorid_list_data['id']? 'selected':'' ?> ><?php echo $sensorid_list_data['sensor_no'];?></option>
        <?php } } } elseif($managed_dev_sen_Id_readonly=="dev"){ 
        foreach ($sensorid_list as $sensorid_list_data_2) { ?>

            <option value="<?php echo $sensorid_list_data_2['id']; ?>" <?php echo set_value('sensorid',$Edit_device_sensors_data['sensor_inventory_tbl_id']) == $sensorid_list_data_2['id'] ? 'selected' : ''; ?> >  <?php echo $sensorid_list_data_2['sensor_no']; ?></option>

        <?php } } else { ?>
<option value="">Select Sensor</option>             
<?php     foreach ($sensorid_list as $sensorid_list_data) { 
if ( $sensorid_list_data['id'] == $Edit_device_sensors_data['sensor_id']) { ?>
<option value="<?php echo $sensorid_list_data['id'];?>" <?php echo (set_value('sensorid')== $sensorid_list_data['id'])? 'selected':'selected';?> ><?php echo $sensorid_list_data['sensor_no'];?></option>
<?php }else { ?> 

<option value="<?php echo $sensorid_list_data['id'];?>" ><?php echo $sensorid_list_data['sensor_no'];?></option>
        <?php } } } ?>
</select>             
</div>
  <?php if (form_error('sensorid')) { ?>
                  
    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('sensorid'); ?></span>
        <?php } ?>
</div> 

                  <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                  <label><?php $isactive=set_value('isactive'); ?> 
                  <input type="checkbox" name="isactive" class="flat" <?php echo isset($isactive) == "on"? 'checked': ($sensorid_list_data['isactive'])=="1"?'checked':''; ?>> Active
                  </label>

                  <label>                         

             
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

