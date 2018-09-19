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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Device_Num</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="deviceid"  required="required">
                                    <option value="">Select device</option>
                                    <?php foreach ($device_list as $device_id_list) { ?>
                                        <option value="<?php echo $device_id_list['id']; ?>" <?php echo set_value('deviceid') == $device_id_list['id'] ? 'selected' : ''; ?> ><?php echo $device_id_list['number']; ?></option>


                                    <?php } ?>
                                </select>             
                            </div>
                            <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
                            <?php } ?>
                        </div> 



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="assetid" required="required">
                                    <option value="">Select device</option>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Wef Date</label>
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


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="post" id="asset_form_action" value="add" >    
                                    <!--<input type="hidden" name="id" id="id" value="" >-->                                                                    
                                <button type="submit" name="add_dev_asset_button" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url('Device_assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>




</div>