<?php
$managedId = '';
$managedId = $this->input->post('asset_user_post_id');
?>			
<?php
$back_action = '';

$back_action = $this->input->post('back_action');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Asset User</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>User_asset_add">

                    <input type="hidden" name="asset_user_form_action" value="add 0">


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">             
                            <select class="form-control" name="assetcode" required="required" <?php echo $managedId == '' ? '' : 'readonly="readonly"'; ?>>
                                <?php
                                if (empty($managedId)) {
                                    ;
                                    ?>                  
                                    <option value="">Select Asset Code</option>
                                <?php } ?>                      

                                <?php
                                if (!empty($managedId)) {
                                    foreach ($asset_code_list as $asset_id_list) {
                                        if ($managedId == $asset_id_list['id']) {
                                            ?>
                                            <option value="<?php echo $asset_id_list['id']; ?>" <?php echo set_value('assetcode', $managedId) == $asset_id_list['id'] ? 'selected' : '' ?> ><?php echo $asset_id_list['code']; ?></option>
                                            <?php
                                        }
                                    }
                                } else {
                                    foreach ($asset_code_list as $asset_id_list_2) {
                                        ?>
                                        <option value="<?php echo $asset_id_list_2['id']; ?>" <?php echo set_value('assetcode') == $asset_id_list_2['id'] ? 'selected' : '' ?> ><?php echo $asset_id_list_2['code']; ?></option>                       
                                        <?php
                                    }
                                }
                                ?>
                            </select>             
                        </div>
                        <?php if (form_error('assetcode')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetcode'); ?></span>
                        <?php }
                        ?>
                    </div> 


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">             
                            <select class="form-control" name="assetuserid" required="required">
                                <option value="">Select User Name</option>
                                <?php
                                foreach ($asset_userid_list as $asset_user_id_list) {
                                    if (!empty($asset_user_id_list['client_name'])) { ?>
                                        <option value="<?php echo $asset_user_id_list['id']; ?>" <?php echo set_value('assetuserid') == $asset_user_id_list['id'] ? 'selected' : $asset_user_id_list['id']; ?>><?php echo $asset_user_id_list['client_name']; ?></option>
                                    <?php }
                                }
                                ?>
                            </select>             
                        </div>
                        <?php if (form_error('assetuserid')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetuserid'); ?></span>
                    <?php }
                    ?>
                    </div> 
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                            <input type="checkbox" name="status" id="status" class="flat"> Active
                        </div>
                    </div>	
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="add_asset_user" class="btn btn-primary">Save</button>
                            <?php if (!empty($back_action)) { ?>
                                <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('User_assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>
                            <?php } ?>      

                        </div>
                    </div>

                </form>					

            </div>
        </div>
    </div>
</div>