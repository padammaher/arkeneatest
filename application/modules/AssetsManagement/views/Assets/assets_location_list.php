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
                  
                  <div class="x_content" id="assets-location-list">
                    
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
<?php $i=1;  if(!empty($asset_location_list)) { foreach ($asset_location_list as $asset_loc_list) { ?>
						
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul class="flex-container nowrap">
								  <li class="flex-item"><?php echo $i;?></li>
								  <li class="flex-item"><?php echo $asset_loc_list['code'];?></li>
                  <li class="flex-item"><?php echo $asset_loc_list['location'];?></li>
                 
                    <li class="flex-item"><?php echo $asset_loc_list['address'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['latitude'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['longitude'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['contact_no'];?></li>
                    <li class="flex-item"><?php echo $asset_loc_list['contact_email'];?></li>
                    <li class="flex-item">				

   <form action="<?php echo base_url(); ?>Assets_location_list" method="post" id="Assets_location_list<?php echo $i; ?>">
                <input type="hidden" value="<?php echo $asset_loc_list['id']; ?>" name="asset_location_post_id"/>
                <input type="hidden" name="asset_location_post" id="post<?php echo $i; ?>"/>
                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                </a>
                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                </a> 
            </form> 
            <?php if(!empty($asset_loc_list['asset_user_tbl_id'])) { ?>  
                <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="asset_user<?php echo $i; ?>">
                <input type="hidden" value="<?php echo $asset_loc_list['asset_user_tbl_id']; ?>" name="asset_user_post_id"/>
                <input type="hidden" name="asset_user_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       
                                      

                    <a  title="Manage Users" class="manage_user" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                        <i class="fa fa-group text-warning"></i> 
                    </a>
            </form>  <?php } ?>                 
									</li>
								</ul>
							</div>
            </div>
<?php $i++; } } else { ?>
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
          <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
//            alert(id);
            $("#Assets_location_list" + id).submit();
        });
        
//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#post" + id).val('delete');
//                $("#Assets_location_list" + id).submit();
//            }
//        });
        
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#Assets_location_list" + id).submit();
            });
        }); 
        
        
                $(".manage_user").click(function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
                var id = $(this).attr('id');
                // $("#post" + id).val('delete');
                $("#asset_user" + id).submit();
            // }
        });

    });
</script>