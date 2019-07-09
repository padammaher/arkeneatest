<?php
$managed_dev_asset_Id = '';
$managed_dev_asset_Id = $this->input->post('dev_asset_id');
?>	
<?php
$back_action = '';
$back_action = $this->input->post('back_action');
?>
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Device Assets</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Device_assets_add">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device number <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <?php //echo "<pre>";print_r($device_list);?>
                                <select class="form-control" name="deviceid" id="deviceid"  required="required" <?php echo $managed_dev_asset_Id == '' ? '' : 'readonly="readonly"'; ?>>

                                    <?php
                                    if (empty($managed_dev_asset_Id)) {
                                        ;
                                        ?>                                     
                                        <option value="">Select Device Number</option>
                                    <?php } ?>                                    
                                    <?php
                                    if (!empty($managed_dev_asset_Id)) {
                                        foreach ($device_list as $device_id_list) {
                                            if ($managed_dev_asset_Id == $device_id_list['id']) {
                                                ?>
                                                <option id="<?php echo $device_id_list['customer_location_id']; ?>" value="<?php echo $device_id_list['id']; ?>" <?php echo set_value('deviceid', $managed_dev_asset_Id) == $device_id_list['id'] ? 'selected' : '' ?> ><?php echo $device_id_list['number']; ?></option>
                                                <?php
                                            }
                                        }
                                    } else {
                                        foreach ($device_list as $device_id_list_2) {
                                            ?>
                                            <option id="<?php echo $device_id_list_2['customer_location_id']; ?>" value="<?php echo $device_id_list_2['id']; ?>" <?php echo set_value('deviceid') == $device_id_list_2['id'] ? 'selected' : ''; ?> ><?php echo $device_id_list_2['number']; ?></option>


                                            <?php
                                        }
                                    }
                                    ?>
                                </select>             
                            </div>
                            <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
                            <?php } ?>
                        </div> 
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="assetid" id="assetid" required="required">
                                    <option value="">Select Asset Code</option>
                                    <?php foreach ($assetcode_list as $assetcode_list_data) { ?>
                                        <option value="<?php echo $assetcode_list_data['id']; ?>" <?php echo (set_value('assetid') == $assetcode_list_data['id']) ? 'selected' : ''; ?> ><?php echo $assetcode_list_data['code']; ?></option>


                                    <?php } ?>
                                </select>             
                            </div>
                            <?php if (form_error('assetid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetid'); ?></span>
                            <?php } ?>
                        </div> 

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Wef Date <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="xdisplay_inputx item form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" name="wef_date" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" required="required">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>

                            </div>
                            <?php if (form_error('wef_date')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('wef_date'); ?></span>
                            <?php } ?>
                        </div>   
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <input type="checkbox" name="status" id="status" class="flat" checked> Active
                            </div>
                        </div>	

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="post" id="asset_form_action" value="add" >    
                                    <!--<input type="hidden" name="id" id="id" value="" >-->                                                                    
                                <button type="submit" name="add_dev_asset_button" class="btn btn-primary">Save</button>
                                <?php if (!empty($back_action)) { ?>
                                    <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                    <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('Device_assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>
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
<script type="text/javascript">
    $(document).ready(function () {




        $("#deviceid").change(function ()
        {
//       alert(this.value);
            var objdata = '';
            var location_id = $(this).children(":selected").attr("id");
            var i = 0;
            var options;
            $("#assetid").empty();
            var options = '<option value="">Select Asset Code</option>';
            $.ajax({
                url: '<?php echo base_url(); ?>Inventory/Load_Locationwise_assetids',
                type: 'post',
                dataType: 'text',
                data: {deviceid: this.value, location_id: location_id},
                success: function (res) {
                    var obj = $.parseJSON(res);

                    for (i = 0; i < obj.length; i++) {
//                            alert(obj[i]['sensor_inventory_id']);
                        options += '<option value="' + obj[i]['id'] + '">' + obj[i]['code'] + '</option>';
                    }
                    $("#assetid").html(options);
                }
            });
        });


    });
</script>