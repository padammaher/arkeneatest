         <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Asset-User Management</h4>
              </div>

              <div class="title_right">
                <div class="pull-right">
                 
                 <a href="<?php echo base_url('Assets_list');?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Asset Management</a>
                 <a href="<?php echo base_url('Assets_location_list');?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Asset Location</a>
                 <a href="<?php echo base_url('User_asset_add');?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>                 
                           
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
				
<?php $i=1; if(!empty($asset_user_list)) { foreach ($asset_user_list as $asset_user_list_data) { ?>
<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="flex-container nowrap">
           <li class="flex-item"><?php echo $asset_user_list_data['code']; ?></li>
<li class="flex-item"><?php echo $asset_user_list_data['client_name']; ?></li>


                <li class="flex-item">



                <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="Assets_edit<?php echo $i; ?>">
                <input type="hidden" value="<?php echo $asset_user_list_data['id']; ?>" name="asset_user_post_id"/>
                <input type="hidden" name="asset_user_post" id="post<?php echo $i; ?>"/>
                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                </a>
                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                </a> 
            </form>   
                
                </li>
        </ul>
</div>
</div>
<?php $i++;} } else { ?>


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
            $("#Assets_edit" + id).submit();
        });
        
//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#post" + id).val('delete');
//                $("#Assets_edit" + id).submit();
//            }
//        });
        
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#Assets_edit" + id).submit();
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