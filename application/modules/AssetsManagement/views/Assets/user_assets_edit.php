			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Edit User Asset : EPHY00589</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                   <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>User_asset_edit">
<?php
//print_r($asset_user_list_data);
foreach ($asset_user_list_data as $asset_user_data) { ?>     

                        <input type="hidden" name="asset_user_form_action" value="update <?php echo $asset_user_data['id'];?>">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text"  class="form-control" placeholder="1">
              </div>
              </div>

                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="assetcode" required="required">
                    <option value="">Select Asset Code</option>
                    <option value="<?php echo $asset_user_data['asset_tbl_id'];?>" selected><?php echo $asset_user_data['code'];?></option>
<?php foreach ($asset_code_list as $asset_id_list) { 
                if($asset_id_list['id'] != $asset_user_data['asset_tbl_id']) {    ?>
                <option value="<?php echo $asset_id_list['id'];?>"><?php echo $asset_id_list['code'];?></option>
                <?php } ?>
                       
<?php } ?>
                </select>             
                </div>
              </div> 
                        
    
                <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="assetuserid" required="required">
                    <option value="">Select User Name</option>
                    <option value="<?php echo $asset_user_data['branch_user_tbl_id'];?>" selected><?php echo $asset_user_data['client_name'];?></option>
<?php foreach ($asset_userid_list as $asset_user_id_list) { 
                    if($asset_user_id_list['id'] != $asset_user_data['branch_user_tbl_id']) { ?>
                                <option value="<?php echo $asset_user_id_list['id'];?>"><?php echo $asset_user_id_list['client_name'];?></option>

                       
<?php } } ?>
                </select>             
                </div>
              </div> 
                                               
						  
						  <div class="ln_solid"></div>
						  <div class="item form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" name="add_asset_user" class="btn btn-primary">Save</button>
							  <a href="<?php echo base_url('User_assets_list');?>" type="button" class="btn btn-default">Cancel</a>
							  
                                                          
							</div>
						  </div>

						</form>					
<?php } ?>					
                  </div>
                </div>
              </div>
            </div>