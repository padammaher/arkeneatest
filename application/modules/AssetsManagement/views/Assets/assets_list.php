<div class="page-title">
    <div class="title_left">
        <h4>Asset Management</h4>
    </div>

    <div class="title_right">
        <div class="pull-right">
            <a href="<?php echo base_url('Assets_add'); ?>" class="btn btn-sm btn-primary">Add New</a>
            <a href="<?php echo base_url('Assets_location_list'); ?>" class="btn btn-sm btn-primary">Asset Location</a>
            <a href="<?php echo base_url('User_assets_list'); ?>" class="btn btn-sm btn-primary">Asset User</a>
        </div>
    </div>

</div>
<div class="clearfix"></div>


<div class="row tile_count asset-stats">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-map-marker"></i> Total Customer Location</span>
        <div class="count">36</div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Active Assets</span>
        <div class="count">190</div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-gears"></i> Total Active Devices</span>
        <div class="count green">210</div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-magnet"></i> Total Active Sensor</span>
        <div class="count">200</div>

    </div>


</div>
<div class="row">    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="flex-container flex-container-head nowrap">
                            <li class="flex-item">Sr. No.</li>
                            <li class="flex-item">Asset Code</li>

                            <li class="flex-item">Customer Location</li>
                            <li class="flex-item">User Name</li>

                            <li class="flex-item">Actions</li>
                        </ul>
                    </div>
                </div>
 
       
                <div class="row clearfix">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php foreach ($assetlist as $list) { //var_dump($list); ?>
                          
                            <ul class="flex-container nowrap">

                                <?php //var_dump($assetlist) ?>
                                <li class="flex-item"><?php echo $list['id'] ?></li>
                                <li class="flex-item"><?php echo $list['code'] ?></li>
                                <li class="flex-item"><?php echo $list['location'] ?></li>
                                <li class="flex-item"><?php echo $list['first_name'] ?></li>
                              
                        
                                <li class="flex-item">
                                    <form class="form-horizontal form-label-left"  action="<?php echo base_url(); ?>Assets_edit"  method="POST" >
                                    <input type="hidden" name="edit_asset_list_id" value="edit <?php echo $list['id'] ?>" >
                                    <button type="submit" class="fa fa-primary" name="edit_asset_list_button">
                                        <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                    </button>
                                    </form> 
                                    <form class="form-horizontal form-label-left"  action="<?php echo base_url(); ?>Assets_edit"  method="POST" >
                                       <input type="hidden" name="edit_asset_list_id" value="delete <?php echo $list['id'] ?>" >
                                        
                                    
                                       <button type="submit" class="fa fa-primary" name="delete_asset_list_button">
                                       <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                    </button>
                                    </form>     
                                <?php if(!empty($list['locid'])) { ?>    
                                <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Assets_location_list">                        
                                <input type="hidden" name="asset_loc_form_action" id="asset_loc_form_action" value="edit <?php echo $list['locid'];?>">
                                <button type="submit" name="edit_asset_location_button"> 
                                        <i class="fa fa-map-marker text-success"></i> 
                                </button>                  
                                    </form>
                                <?php } ?>    
                                    <a href="<?php echo base_url('User_assets_list'); ?>" title="Manage Users" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                        <i class="fa fa-group text-warning"></i> 
                                    </a>
                                       
                                </li>

                            </ul>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>