         <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Asset-User Management</h4>
              </div>

              <div class="title_right">
                <div class="pull-right">
                    <a href="<?php echo base_url('User_asset_add');?>" class="btn btn-sm btn-primary">Add New</a>
                 <a href="<?php echo base_url('Assets_list');?>" class="btn btn-sm btn-primary">Asset Management</a>
                 <a href="<?php echo base_url('Assets_location_list');?>" class="btn btn-sm btn-primary">Asset Location</a>
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
								
								<li class="flex-item">Asset Code</li>
                 <li class="flex-item">User Name</li>
							
									<li class="flex-item">Actions</li>
								</ul>
                        </div>
                        </div>
				
<?php if(!empty($asset_user_list)) { foreach ($asset_user_list as $asset_user_list_data) { ?>
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="flex-container nowrap">
           <li class="flex-item"><?php echo $asset_user_list_data['code']; ?></li>
<li class="flex-item"><?php echo $asset_user_list_data['client_name']; ?></li>


                <li class="flex-item">
 <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>User_asset_edit">   
     <input type="hidden" name="asset_user_form_action" id="dev_inv_id" value="edit <?php echo $asset_user_list_data['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_asset_user_button" id="edit_inventory_button" >
         <i class="fa fa-pencil success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
     </button> </form> 
 <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>User_asset_edit">   
     <input type="hidden" name="asset_user_form_action" id="dev_inv_id" value="delete <?php echo $asset_user_list_data['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_asset_user_button" id="edit_inventory_button" >
<i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
     </button> </form>  

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