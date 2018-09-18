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
<div class="page-title">
    <div class="title_left">
        <h4>Asset Management</h4>
    </div>

    <div class="title_right">
        <div class="pull-right">            
            <a href="<?php echo base_url('Assets_location_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Asset Location</a>
            <a href="<?php echo base_url('User_assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Asset User</a>
            <a href="<?php echo base_url('Assets_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>

</div>
<div class="row">    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content" id="assets-list">

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
                        <?php
                        if (isset($assetlist) && !empty($assetlist)) {
                            $i = 1;
                            foreach ($assetlist as $list) {// var_dump($list);  
                                ?>

                                <ul class="flex-container nowrap">

                                    <?php // var_dump($assetlist)   ?>
                                    <li  class="flex-item"><?php echo $i; ?></li>
                                    <li data-toggle="modal" href="#assest_list_modal_<?php echo $list['id']; ?>" class="flex-item"><?php echo $list['code'] ?></li>
                                    <li class="flex-item"><?php echo $list['location'] ?></li>
                                    <li class="flex-item"><?php echo $list['client_name'] ?></li>
                                    

                                    <li class="flex-item" style="    display: -webkit-inline-box;">

                                        <form action="<?php echo base_url(); ?>Assets_edit" method="post" id="Assets_edit<?php echo $i; ?>">
                                            <input type="hidden" value="<?php echo $list['id']; ?>" name="id"/>
                                            <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                            <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                            </a>
                                            <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                            </a> 
                                        </form>
                                        <?php if (!empty($list['assetlocid'])) { ?>  
                                            <form action="<?php echo base_url(); ?>Assets_location_list" method="post" id="asset_location<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $list['assetlocid']; ?>" name="asset_location_post_id"/>
                                                <input type="hidden" name="asset_location_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       


                                                <a class="manage_location" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location">
                                                    <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location"></i> 
                                                </a>   
                                            </form> <?php }else {?>                                               
                                            <a href="<?php echo base_url('Assets_location_add');?>" class="manage_location"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location">
                                                    <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location"></i> 
                                                </a> 
                                            <?php } ?>
                                        <?php if (!empty($list['asset_user_tbl_id'])) { ?>  
                                            <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="asset_user<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $list['asset_user_tbl_id']; ?>" name="asset_user_post_id"/>
                                                <input type="hidden" name="asset_user_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       


                                                <a title="Manage Users" class="manage_user" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                    <i class="fa fa-group text-warning"></i> 
                                                </a>
                                            </form> <?php }else { ?>
                                        <a href="<?php echo base_url('User_asset_add');?>" title="Manage Users" class="manage_user" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                    <i class="fa fa-group text-warning"></i> 
                                                </a>
                                            <?php } ?>
                                        <form action="<?php echo base_url(); ?>asset_parameter_range_list" method="post" id="asset_parameter_range<?php echo $i; ?>">                   
                                            <input type="hidden" value="<?php echo $list['id']; ?>" name="asset_id"/>
                                            <input type="hidden" name="asset_para_range_post" id="asset_para_range_post<?php echo $i; ?>" value="edit" />       
                                            <a title="Manage Parameter" class="asset_para_range" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Parameter">
                                                <i class="fa fa-list-ul text-info"></i> 
                                            </a>
                                        </form>
                                        

                                    </li>

                                </ul>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <ul class="flex-container nowrap">
                                <li class="flex-item">No data found..!</li>
                            </ul>
                        <?php }
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('modal/asset_list_modal')?>
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
            $(".modal").modal();
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
        $(".manage_location").click(function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
            $("#asset_location" + id).submit();
            // }
        });
        $(".asset_para_range").click(function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
            $("#asset_parameter_range" + id).submit();
            // }
        });

    });
</script>