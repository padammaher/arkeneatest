			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Edit Device Assets</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                   <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_assets_edit">
<?php foreach ($Edit_device_asset_data as $dev_asset_data) { ?>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
<div class="col-md-6 col-sm-6 col-xs-12">             
<select class="form-control" name="deviceid"  required="required" readonly>                                                  
            <option value="<?php echo $dev_asset_data['device_inventory_id'];?>" selected><?php echo $dev_asset_data['number'];?></option>

</select>             
</div>
</div> 

                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="assetid" required="required">
                    <option value="">Select device</option>
                    <option value="<?php echo $dev_asset_data['asset_id']; ?>" selected><?php echo $dev_asset_data['code']; ?></option>
<?php foreach ($assetcode_list as $assetcode_list_data) { 
                    if($assetcode_list_data['id'] == $dev_asset_data['asset_id']){ ?>
                    <option value="<?php echo $assetcode_list_data['id'];?>" <?php echo set_value('assetid')== $assetcode_list_data['id']? 'selected':'';?> selected><?php echo $assetcode_list_data['code'];?></option>          
                    <?php }else { ?>
                    <option value="<?php echo $assetcode_list_data['id'];?>"><?php echo $assetcode_list_data['code'];?></option>
                    
                       
<?php } } ?>
                </select>             
                </div>
              </div> 

							  					  
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                            <input type="hidden" name="post" id="asset_form_action" value="update" >    
                                                            <input type="hidden" name="id" id="id" value="<?php echo $dev_asset_data['id']; ?>" >        
                                                            <button type="submit" class="btn btn-primary" name="edit_dev_asset_button" id="edit_dev_asset_button" >Update</button>
							 <a href="<?php echo base_url('Device_assets_list');?>" type="button" class="btn btn-default">Cancel</a> 
							</div>
						  </div>
<?php } ?>
						</form>					
					
                  </div>
                </div>
              </div>
            </div>
					 
