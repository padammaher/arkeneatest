<?php
$managed_dev_sen_Id = '';
$managed_dev_sen_Id_readonly = '';
if ($this->input->post('dev_sen_post_id')) {
    $managed_dev_sen_Id = explode(" ", $this->input->post('dev_sen_post_id'));
    $managed_dev_sen_Id_readonly = $managed_dev_sen_Id[0];
}
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

<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Device Sensor
                    </h4>						
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Add_device_sensors">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number *
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="deviceid" id="deviceid" required="required" 
                                        <?php echo $managed_dev_sen_Id_readonly == 'dev' ? 'readonly="readonly"' : ''; ?> >
                                            <?php if ($managed_dev_sen_Id_readonly != "dev") { ?>                                     
                                        <!--<option value="">Select Device Number</option>-->
                                    <?php } ?>         
                                    <?php if ($managed_dev_sen_Id_readonly == "dev") { ?>
                                        <option value="">Select Device Number
                                        </option> 
                                        <?php
                                        foreach ($device_list as $device_id_list) {
                                            if ($managed_dev_sen_Id[1] == $device_id_list['id']) {
                                                ?>
                                                <option id="<?php echo $device_id_list['customer_location_id']; ?>" value="<?php echo $device_id_list['id']; ?>" 
                                                        <?php echo set_value('deviceid', $managed_dev_sen_Id[1]) == $device_id_list['id'] ? 'selected' : '' ?> >
                                                            <?php echo $device_id_list['number']; ?>
                                                </option>
                                            <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <option value="">Select Device Number
                                        </option> 
                                                <?php foreach ($device_list as $device_id_list_2) { ?>
                                            <option id="<?php echo $device_id_list_2['customer_location_id']; ?>" value="<?php echo $device_id_list_2['id']; ?>" 
                                            <?php echo set_value('deviceid') == $device_id_list_2['id'] ? 'selected' : ''; ?> >
                                            <?php echo $device_id_list_2['number']; ?>
                                            </option>
    <?php }
}
?>
                                </select>             
                            </div>
                            <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; ">
    <?php echo form_error('deviceid'); ?>
                                </span>
<?php } ?>
                        </div> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Number *
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control locationMultiple" name="sensorid[]" id="sensorid"  
                                    <?php echo $managed_dev_sen_Id_readonly == 'sen' ? 'readonly="readonly"' : 'multiple="multiple"'; ?>  >
                                    <?php if ($managed_dev_sen_Id_readonly != "sen") { ?>                                     
                                        <!--<option value="">Select Sensor Number</option>-->
                                    <?php } ?>   
                                    <?php if ($managed_dev_sen_Id_readonly == "sen") { ?>
                                        <option value="">Select Sensor Number
                                        </option> 
                                        <?php
                                        foreach ($sensorid_list as $sensorid_list_data) {
                                            if ($managed_dev_sen_Id[1] == $sensorid_list_data['id']) {
                                                ?>
                                                <option value="<?php echo $sensorid_list_data['id']; ?>" 
                                                <?php echo set_value('sensorid[]', $managed_dev_sen_Id[1]) == $sensorid_list_data['id'] ? 'selected' : '' ?> >
                                                <?php echo $sensorid_list_data['sensor_no']; ?>
                                                </option>
                                            <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <?php foreach ($sensorid_list as $sensorid_list_data_2) { ?>
                                            <option value="<?php echo $sensorid_list_data_2['id']; ?>" 
        <?php echo set_value('sensorid[]') == $sensorid_list_data_2['id'] ? 'selected' : ''; ?> >  
        <?php echo $sensorid_list_data_2['sensor_no']; ?>
                                            </option>
    <?php }
}
?>
                                </select>        
                            </div>
<?php if (form_error('sensorid[]')) { ?>
                            
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; ">
    <?php echo form_error('sensorid[]'); ?>
                                </span>
                                    <?php } ?>
                        </div>                         
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <label>
                                    <?php $isactive = set_value('device_sen_status'); ?>
                                    <input type="checkbox" name="device_sen_status" class="flat" 
                                           <?php
                                           if (!empty($isactive)) {
                                               echo ($isactive) == "on" ? 'checked' : '';
                                           } else {
                                               echo 'checked';
                                           }
                                           ?>> Active
                                </label>
                                <label>  
                            </div>
                        </div> 


                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="locationMultiple form-control" multiple="multiple">
                          <option value="1d4h7g">Abondance (74360)</option>
                          <option value="lf9k9d">Alby-Sur-Cheran (74540)</option>  
                        </select>              -->
                        <!--</div>-->              
                        <div class="ln_solid">
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="add_sensor_int_button" class="btn btn-primary">Save
                                </button>
                                <?php if (!empty($back_action)) { ?>
                                    <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                    <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel
                                    </a>
<?php } else { ?>
                                    <a href="<?php echo base_url('Device_sensor_list'); ?>" type="button" class="btn btn-default">Cancel
                                    </a>
<?php } ?>
                            </div>
                        </div>
                    </form>					
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>-->
<!--<script src="//code.jquery.com/jquery-1.10.2.js">-->
<!--</script>-->
<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">-->
<!--</script>-->
<script type="text/javascript">

    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".locationMultiple").select2({
        width: null
    })

    $(document).ready(function () {
<?php if ($managed_dev_sen_Id_readonly != 'sen') { ?>
            $("#deviceid").change(function () {
            var objdata = '';
            var i = 0;
            var options;
            $("#sensorid").empty();
            $(".select2-selection__rendered").empty();
//            var options = '<option value="">Select Type</option>';
            $.ajax({
                url: '<?php echo base_url(); ?>Inventory/Load_Locationwise_sensor',
                type: 'post',
                dataType: 'text',
                data: {
                    deviceid: this.value}
                ,
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
<?php } ?>
        $("#UOM").change(function ()
        {
            //        alert(this.value);
            if (this.value != "") {
                var e = document.getElementById("UOM");
                var strUser = e.options[e.selectedIndex].text;
                $("#selectuom").val(strUser);
            }
            else
            {
                $("#selectuom").val('');
            }
        });
    
    });
</script>
<script type="text/javascript">
//  $(document).ready(function () {
//       var jsonData = [];
//       $("#deviceid").change(function () {
//    $.ajax({
//      url: "<?php echo base_url(); ?>Inventory/getsensor_data",
//      type: 'post',
//      data:{device_id:this.value,status:''},
//      dataType: 'json',
//      success: function (res) {
//        jsonData = res;
//        alert('jsonData'+jsonData);        
//    if(jsonData != '0'){
//                $('#sensorid_id').tagSuggest({
//                  data: jsonData,
//                  sortOrder: 'name',
//                  maxDropHeight: 200,
//                  name: 'fse_type_id',          
//                });
//            }
//            else
//            {}
//      }
//    });
//  });
//  });
</script>
