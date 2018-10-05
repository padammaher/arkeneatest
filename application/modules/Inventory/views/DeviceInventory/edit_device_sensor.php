<?php
$managed_dev_sen_Id = '';
$managed_dev_sen_Id_readonly = '';
if ($this->input->post('dev_sen_post_add')) {
    $managed_dev_sen_Id = explode(" ", $this->input->post('dev_sen_post_add'));
    $managed_dev_sen_Id_readonly = $managed_dev_sen_Id[0];
}
//print_r($managed_dev_sen_Id);
?>
<?php
$back_action = '';
$back_action = $this->input->post('back_action');
?>

<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<div class="">    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Edit Device Sensor</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Edit_device_sensors">
                        <?php
                        $temp_device_ids = '';
                        $temp_sensor_ids = '';
                        foreach ($Edit_device_sensors_data as $Edit_device_sensors_data) {
                            $temp_device_ids = $Edit_device_sensors_data['device_id'];
                            $temp_sensor_ids[] = $Edit_device_sensors_data['sensor_inventory_tbl_id'];
                            $number=$Edit_device_sensors_data['number'];
                            $sensor_id = $Edit_device_sensors_data['sensor_id'];
                            $sensor_no=$Edit_device_sensors_data['sensor_no'];
                        }
//                        print_r($temp_sensor_ids);
                        //                        echo count($temp_sensor_ids);
//                        echo "<pre>";
//                                      print_r($Edit_device_sensors_data); 
                        
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">   
                                
                                <select class="form-control" name="deviceid" id="deviceid" required="required" <?php
                                if (!empty($managed_dev_sen_Id_readonly)) {
                                    echo $managed_dev_sen_Id_readonly == 'dev' ? 'readonly="readonly"' : '';
                                } else {
                                    echo 'readonly="readonly"';
                                }
                                ?>>                                                  

                                    <?php if ($managed_dev_sen_Id_readonly != "sen") { ?>                                     

                                    <?php } ?>   

                                    <?php if ($managed_dev_sen_Id_readonly == "dev") { ?>

                                        <option value="<?php echo isset($temp_device_ids) ? $temp_device_ids:''; ?>"><?php echo isset($number)? $number : 'Select device Number';?></option> <?php
                                        foreach ($device_list as $device_id_list) {
                                            if ($managed_dev_sen_Id[1] == $device_id_list['id']) {
                                                ?>
                                                <option value="<?php echo $device_id_list['id']; ?>" <?php echo set_value('deviceid', $managed_dev_sen_Id[1]) == $device_id_list['id'] ? 'selected' : '' ?> ><?php echo $device_id_list['number']; ?></option>
                                                <?php
                                            }
                                            
                                        }
                                    } elseif ($managed_dev_sen_Id_readonly == "sen") {
                                        ?>
                                        <option value="<?php echo isset($temp_device_ids) ? $temp_device_ids:''; ?>"><?php echo isset($number)? $number : 'Select device Number';?></option>
                                    
                                         <?php foreach ($device_list as $device_list_2) { ?>
                                            <option value="<?php echo $device_list_2['id']; ?>" <?php echo set_value('deviceid', $temp_device_ids) == $device_list_2['id'] ? 'selected' : ''; ?> >  <?php echo $device_list_2['number']; ?></option>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="">Select device</option>       
                                        <option value="<?php echo $temp_device_ids; ?>" <?php echo set_value('deviceid', $temp_device_ids) == $temp_device_ids ? 'selected' : ''; ?> ><?php echo $Edit_device_sensors_data['number']; ?></option>
                                    <?php } ?>
                                </select>             
                            </div>
                            <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
                            <?php } ?>
                        </div> 



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Number *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">        
                                <select class="form-control locationMultiple" name="sensorid[]" id="sensorid" <?php echo $managed_dev_sen_Id_readonly == 'sen' ? 'readonly="readonly"' : 'multiple="multiple"'; ?> >
                                    <?php if ($managed_dev_sen_Id_readonly != "dev") { ?>                                     
                                        <!--<option value="">Select Sensor</option>-->
                                    <?php } ?>  

                                    <?php if ($managed_dev_sen_Id_readonly == "sen") { ?>

                                        <!--<option value="<?php echo isset($sensor_id)? $sensor_id:'';?>" <?php echo isset($sensor_id)? 'selected':'';?>><?php echo isset($sensor_no)? $sensor_no:'Select Sensor';?></option>-->  
                                        <?php
                                        foreach ($sensorid_list as $sensorid_list_data) {
                                            if ($managed_dev_sen_Id[1] == $sensorid_list_data['id']) {
                                                ?>
                                                <option value="<?php echo $sensorid_list_data['id']; ?>" <?php echo set_value('sensorid[]', $managed_dev_sen_Id[1]) == $sensorid_list_data['id'] ? 'selected' : '' ?> ><?php echo $sensorid_list_data['sensor_no']; ?></option>

                                                <?php
                                            }
                                        }
                                    } elseif ($managed_dev_sen_Id_readonly == "dev") {
                                        ?>

                                        <!--<option value="<?php echo isset($sensor_id)? $sensor_id:'';?>" <?php echo isset($sensor_id)? 'selected':'';?>><?php echo isset($sensor_no)? $sensor_no:'Select Sensor';?></option>-->  
                                        <?php // foreach ($sensorid_list as $sensorid_list_data_2) {
//                                        if($sensor_id != $sensorid_list_data_2['id']) { ?>
                                            <!--<option value="<?php echo $sensorid_list_data_2['id']; ?>" <?php echo set_value('sensorid[]', $temp_sensor_ids) == $sensorid_list_data_2['id'] ? 'selected' : ''; ?> >  <?php echo $sensorid_list_data_2['sensor_no']; ?></option>-->

                                            <?php
//                                    } } 
                                    
                                     $i = 0;
                                        foreach ($sensorid_list as $key => $sensorid_list_data_2) {
                                            if ($sensorid_list_data_2['id'] == $temp_sensor_ids[$i] && count($temp_sensor_ids) > $i) {
                                                ?>
                                                <option value="<?php echo $sensorid_list_data_2['id']; ?>" <?php echo set_value('sensorid[]', $temp_sensor_ids[$i]) == $sensorid_list_data_2['id'] ? 'selected' : ''; ?>  ><?php echo $sensorid_list_data_2['sensor_no']; ?></option>
                                                <?php
                                                $i++;
                                            } else if (!in_array($sensorid_list_data_2['id'], $temp_sensor_ids)) {
                                                ?> 
                                                <option value="<?php echo $sensorid_list_data_2['id']; ?>" ><?php echo $sensorid_list_data_2['sensor_no']; ?></option>
                                                <?php
                                            }
                                        }
                                        
                                        
                                    } else {
                                        ?>
                                        <?php
                                        $i = 0;
                                        foreach ($sensorid_list as $key => $sensorid_list_data) {
                                            if ($sensorid_list_data['id'] == $temp_sensor_ids[$i] && count($temp_sensor_ids) > $i) {
                                                ?>
                                                <option value="<?php echo $sensorid_list_data['id']; ?>" <?php echo set_value('sensorid[]', $temp_sensor_ids[$i]) == $sensorid_list_data['id'] ? 'selected' : ''; ?>  ><?php echo $sensorid_list_data['sensor_no']; ?></option>
                                                <?php
                                                $i++;
                                            } else if (!in_array($sensorid_list_data['id'], $temp_sensor_ids)) {
                                                ?> 
                                                <option value="<?php echo $sensorid_list_data['id']; ?>" ><?php echo $sensorid_list_data['sensor_no']; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>             
                                <?php ?>


                            </div>
                            <?php if (form_error('sensorid')) { ?>

                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('sensorid'); ?></span>
                            <?php } ?>
                        </div> 


                        <!--</div>-->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                
                                <label><?php 
                                    $isactive = set_value('isactive');
                                    
                                    ?> 
                                    <input type="checkbox" name="isactive" checked class="flat" <?php echo $isactive == "on" ? 'checked' : (isset($Edit_device_sensors_data['isactive'])) == "1" ? 'checked' : ''; ?>> Active
                                </label>

                                <label>                         


                            </div>
                        </div>                         


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" value="<?php echo isset($Edit_device_sensors_data['id']) ? $Edit_device_sensors_data['id'] :''; ?>" name="id"/>
                                <input type="hidden" name="post" id="post" value="update"/>
                                <!--<input type="hidden" name="sensor_form_action" id="sensor_form_action" value="update <?php echo $Edit_device_sensors_data['id']; ?>" >    

                                <!---->                                    <button type="submit" class="btn btn-primary" name="update_dev_sen_button" id="edit_inventory_button" >Update</button>

                                <?php if (!empty($back_action)) { ?>
                                    <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                    <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('Device_sensor_list'); ?>" type="button" class="btn btn-default">Cancel</a> 
                                <?php } ?>
                            </div>
                        </div>
                        <?php ?>
                    </form>					

                </div>
            </div>
        </div>
    </div>




</div>

<script type="text/javascript">


    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".locationMultiple").select2({
        width: null
    })
</script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
<?php if ($managed_dev_sen_Id_readonly == 'dev') { ?>

        $(document).ready(function () {
            $("#deviceid").change(function ()
            {
                //       alert(this.value);
                var objdata = '';
                var i = 0;
                var options;
                $("#sensorid").empty();
                var options = '<option value="">Select Type</option>';
                $.ajax({
                    url: '<?php echo base_url(); ?>Inventory/Load_Locationwise_sensor',
                    type: 'post',
                    dataType: 'text',
                    data: {deviceid: this.value},
                    success: function (res) {
                        var obj = $.parseJSON(res);

                        for (i = 0; i < obj.length; i++) {
                            //                            alert(obj[i]['sensor_inventory_id']);
                            options += '<option value="' + obj[i]['sensor_inventory_id'] + '">' + obj[i]['sensor_no'] + '</option>';
                        }
                        $("#sensorid").html(options);
                    }
                });
            });
        });
<?php } ?>


    $(document).ready(function () {
        var jsonData = [];
        var deviceid = "<?php echo $Edit_device_sensors_data['device_id'] ?>";
//                alert(deviceid);
        $.ajax({
            url: "<?php echo base_url(); ?>Inventory/getsensor_data",
            type: 'post',
            data: {device_id: deviceid, status: 'edit'},
            dataType: 'json',
            success: function (res) {
                jsonData = res;
                var ms1 = $('#sensorid_id').tagSuggest({
                    data: jsonData,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'fse_type_id',
                });
            }
        });
    });


</script>