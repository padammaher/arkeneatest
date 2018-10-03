<?php
$back_action = '';
$back_action = $this->input->post('back_action');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Edit Device Assets</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Device_assets_edit">
<?php  foreach ($Edit_device_asset_data as $dev_asset_data) {   ?>
                    

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="deviceid" id="deviceid"  required="required" readonly>                                                  
                                    <option value="<?php echo $dev_asset_data['device_inventory_id']; ?>" selected><?php echo $dev_asset_data['number']; ?></option>

                                </select>             
                            </div>
                            <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
    <?php } ?>
                        </div> 

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="assetid" id="assetid" required="required">
                                    <option 
                            value="<?php if(isset($dev_asset_data['asset_id'])){ echo $dev_asset_data['asset_id']; }
                                    else {echo ""; } ?>">
                                    <?php if(isset($dev_asset_data['asset_id'])){ echo $dev_asset_data['code']; }
                                    else { echo "Select device";} ?>   
                                    </option>

                                    <?php foreach ($assetcode_list as $assetcode_list_data) {
//                    if($assetcode_list_data['id'] == $dev_asset_data['asset_id']){ 
                                        ?>
                                        <option value="<?php echo $assetcode_list_data['id']; ?>" <?php echo set_value('assetid', $dev_asset_data['asset_id']) == $assetcode_list_data['id'] ? 'selected' : ''; ?> ><?php echo $assetcode_list_data['code']; ?></option>          
        <?php // }else {  ?>



                            <?php } ?>
                                </select>             
                            </div>
                            <?php if (form_error('assetid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetid'); ?></span>
    <?php } ?>
                        </div> 

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Wef Date</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="xdisplay_inputx item form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" name="wef_date" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" required="required" value="<?php echo set_value('wef_date', date("m/d/Y", strtotime($dev_asset_data['createdate']))); ?>">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                </div>

                            </div>
                            <?php if (form_error('wef_date')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('wef_date'); ?></span>
    <?php } ?>
                        </div>                         
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <input type="checkbox" name="status" id="status" class="flat"  <?php echo ($dev_asset_data['isactive']==1)?'Checked':''; ?>> Active
                            </div>
                        </div>	
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="post" id="asset_form_action" value="update" >    
                                <input type="hidden" name="id" id="id" value="<?php echo $dev_asset_data['id']; ?>" >        
                                <button type="submit" class="btn btn-primary" name="edit_dev_asset_button" id="edit_dev_asset_button" >Update</button>
                                <?php if (!empty($back_action)) { ?>
                                    <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                    <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('Device_assets_list'); ?>" type="button" class="btn btn-default">Cancel</a> 
                        <?php } ?>        
                            </div>
                        </div>
<?php } ?>
                </form>					

            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {




        $("#deviceid").change(function ()
        {
//       alert(this.value);
            var objdata = '';
            var i = 0;
            var options;
            $("#assetid").empty();
            var options = '<option value="">Select Type</option>';
            $.ajax({
                url: '<?php echo base_url(); ?>Inventory/Load_Locationwise_assetids',
                type: 'post',
                dataType: 'text',
                data: {deviceid: this.value},
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
