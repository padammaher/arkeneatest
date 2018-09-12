          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Asset Location List</h4>
              </div>

              <div class="title_right">
                <div class="pull-right">
                  
                 <a href="<?php echo base_url('Assets_location_add');?>" class="btn btn-sm btn-primary">Add New</a>
                 <a href="<?php echo base_url('Assets_list');?>" class="btn btn-sm btn-primary">Asset Management</a>
                  <a href="<?php echo base_url('User_assets_list');?>" class="btn btn-sm btn-primary">Asset User</a>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    
					<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <ul class="flex-container flex-container-head nowrap">
								   <li class="flex-item">Sr. No.</li>
                  <li class="flex-item">Asset ID</li>
								  <li class="flex-item">Location</li>

               
								 
								  <li class="flex-item">Latitude</li>
								   <li class="flex-item">Longitude</li>

                  

									<li class="flex-item">Contact Person</li>
									<li class="flex-item">Contact Number</li>
									<li class="flex-item">Contact Email</li>
									<li class="flex-item">Actions</li>
								</ul>
                        </div>
                        </div>
<?php if(!empty($asset_location_list)) { foreach ($asset_location_list as $asset_loc_list) { ?>
						
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul class="flex-container nowrap">
								  <li class="flex-item">1</li>
								  <li class="flex-item"><?php echo $asset_loc_list['code'];?></li>
                  <li class="flex-item"><?php echo $asset_loc_list['location'];?></li>
                 
                    <li class="flex-item"><?php echo $asset_loc_list['address'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['latitude'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['longitude'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['contact_no'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['contact_email'];?></li>
                    <li class="flex-item">				
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Assets_location_list">                        
    <input type="hidden" name="asset_loc_form_action" id="asset_loc_form_action" value="edit <?php echo $asset_loc_list['id'];?>">
    <button type="submit" name="edit_asset_location_button">         
                      <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
    </button>                  
</form>  
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Assets_location_list">                        
    <input type="hidden" name="asset_loc_form_action" id="asset_loc_form_action" value="delete <?php echo $asset_loc_list['id'];?>">
    <button type="submit" name="delete_asset_location_button"> 
                       <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
    </button>                  
</form>             
                     
                          <a href="<?php echo base_url('User_assets_list'); ?>" title="Manage Users" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                        <i class="fa fa-group text-warning"></i> 
                                    </a>
									</li>
								</ul>
							</div>
            </div>
<?php } } else { ?>
                        <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="flex-container nowrap">
                  <li class="flex-item">No data found..!</li>
                 
                </ul>
              </div>
            </div>
<?php } ?>


					
					
                  </div>
                </div>
              </div>
            </div>
			

          </div>