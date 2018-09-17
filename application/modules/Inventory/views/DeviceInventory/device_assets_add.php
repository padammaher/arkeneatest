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
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_assets_add">
						
         
              
              
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Device ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="deviceid"  required="required">
                    <option value="">Select device</option>
<?php foreach ($device_list as $device_id_list) { ?>
                    <option value="<?php echo $device_id_list['id'];?>" <?php echo set_value('deviceid')== $device_id_list['id']? 'selected':'';?> ><?php echo $device_id_list['number'];?></option>

                       
<?php } ?>
                </select>             
                </div>
                <?php if (form_error('deviceid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('deviceid'); ?></span>
                            <?php } ?>
              </div> 
                        
                        
                        
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset ID</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="assetid" required="required">
                    <option value="">Select device</option>
<?php foreach ($assetcode_list as $assetcode_list_data) { ?>
                                <option value="<?php echo $assetcode_list_data['id'];?>" <?php echo (set_value('assetid')== $assetcode_list_data['id']) ? 'selected':'';?> ><?php echo $assetcode_list_data['code'];?></option>

                       
<?php } ?>
                </select>             
                </div>
                 <?php if (form_error('assetid')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetid'); ?></span>
                            <?php } ?>
              </div> 
                 					  
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <input type="hidden" name="post" id="asset_form_action" value="add" >    
                        <!--<input type="hidden" name="id" id="id" value="" >-->                                                                    
		 <button type="submit" name="add_dev_asset_button" class="btn btn-primary">Save</button>
		 <a href="<?php echo base_url('Device_assets_list');?>" type="button" class="btn btn-default">Cancel</a>
							  
							</div>
						  </div>

						</form>					
					
                  </div>
                </div>
              </div>
            </div>
			
			
			
 
          </div>