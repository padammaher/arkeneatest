<div class="row tile_count asset-stats">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-map-marker"></i> Total Customer Location</span>
        <div class="count"><?php echo $assetlistinfo[0]['customerlocationcount'] ? $assetlistinfo[0]['customerlocationcount'] : 0; ?></div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-users"></i> Total Active Assets</span>
        <div class="count"><?php echo $assetlistinfo['assetcount'] ? $assetlistinfo['assetcount'] : 0; ?></div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-gears"></i> Total Active Devices</span>
        <div class="count green"><?php echo $assetlistinfo['devicecount'] ? $assetlistinfo['devicecount'] : 0; ?></div>

    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-magnet"></i> Total Active Sensor</span>
        <div class="count"><?php echo $assetlistinfo['sensorcount'] ? $assetlistinfo['sensorcount'] : 0; ?></div>

    </div>
</div>
<?php
if (isset($permission) && !empty($permission)) {
    foreach ($permission as $key => $value) {
        if ($value->menuName == 'Asset Management') {
            $asset_index = $key;
        } elseif ($value->menuName == 'Asset Location') {
            $location_index = $key;
        } elseif ($value->menuName == 'Asset User') {
            $user_index = $key;
        } elseif ($value->menuName == 'Asset Parameter Range') {
            $parameter_index = $key;
        }
    }
}
?>
<div class="page-title">
    <div class="title_left">
        <h4>Asset Management</h4>
    </div>

    <div class="title_right">
        <div class="pull-right"> 
            <?php
            if (isset($location_index)) {
                if ($permission[$location_index]->viewpermission == 1) {
                    ?>
                    <a href="<?php echo base_url('Assets_location_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Asset Location</a>
                    <?php
                }else {?>   <a class="btn btn-sm btn-primary not-allowed"><i class="fa fa-map-marker"></i> Asset Location</a> <?php }
            }
            ?>
            <?php
            if (isset($user_index)) {
                if ($permission[$user_index]->viewpermission == 1) {
                    ?>
                    <a href="<?php echo base_url('User_assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Asset User</a>
                    <?php
                }
            }
            ?>
            <?php
            if (isset($asset_index)) {
                if ($permission[$asset_index]->addpermission == 1) {
                    ?>
                    <a href="<?php echo base_url('Assets_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</div>
<div class="row">    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content" >
                <table id="datatable" class="table table-striped table-bordered item-table" >
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Asset Code</th>
                            <th>Customer Location</th>
                            <th>User Name</th>
                            <th>Parameter Count</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <?php
                            if (isset($location_index) || isset($asset_index) || isset($user_index) || isset($parameter_index)) {
                                if ($permission[$asset_index]->editpermission == 1 || $permission[$asset_index]->deletepermission == 1 || $permission[$location_index]->editpermission == 1 || $permission[$location_index]->addpermission == 1 || $permission[$user_index]->editpermission == 1 || $permission[$user_index]->addpermission == 1 || $permission[$parameter_index]->viewpermission == 1) {
                                    echo "<th>Actions</th>";
                                }
                            }
                            ?>
                            <!--<th>Actions</th>-->                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
//var_dump($assetlist);  
                        $i = 1;
                        if (isset($assetlist) && !empty($assetlist)) {
                            foreach ($assetlist as $list) {
                                ?>   
                                <tr>
                                    <?php
                                    $setId_to_modal = $list['id'];
                                    $modal_idand_class = "data-toggle='modal' href='#assest_list_modal_" . $setId_to_modal . "'";
                                    ?>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $i; ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['code'] ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['location'] ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['client_name'] ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo count($list['parametercount']) ?></td>                              
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['startdate'] ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['enddate'] ?></td>
                                    <td <?php echo $modal_idand_class; ?> ><?php echo $list['isactive'] == '1' ? "Active" : "In-active"; ?></td>
                                    <?php
                                    if (isset($location_index) || isset($asset_index) || isset($user_index) || isset($parameter_index)) {
                                        if ($permission[$asset_index]->editpermission == 1 || $permission[$asset_index]->deletepermission == 1 || $permission[$location_index]->editpermission == 1 || $permission[$location_index]->addpermission == 1 || $permission[$user_index]->editpermission == 1 || $permission[$user_index]->addpermission == 1 || $permission[$parameter_index]->viewpermission == 1) {
                                            ?>
                                            <td>
                                                <div style="display: -webkit-inline-box;">
                                                    <form action="<?php echo base_url(); ?>Assets_edit" method="post" id="Assets_edit<?php echo $i; ?>">
                                                        <input type="hidden" value="<?php echo $list['id']; ?>" name="id"/>
                                                        <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                        <?php
                                                        if (isset($asset_index)) {
                                                            if ($permission[$asset_index]->editpermission == 1) {
                                                                ?>
                                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                                </a>
                                                                <?php
                                                            } else { ?>  <i class="fa fa-pencil blue not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                        }
                                                        ?>
                <!--                                            <a title="Delete" class="delete" id="<?php echo $i; ?>">
                <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                </a> -->
                                                    </form>&nbsp;

                                                    <form action="<?php echo base_url(); ?>Assets_location_list" method="post" id="asset_location<?php echo $i; ?>">
                                                        <input type="hidden" value="<?php echo $list['assetlocid']; ?>" name="asset_location_post_id" id="asset_location_post_id<?php echo $i; ?>" />
                                                        <input type="hidden" name="asset_location_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       
                                                        <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Assets_list" />       
                                                        <?php if (!empty($list['assetlocid'])) { ?>  
                                                            <?php
                                                            if (isset($location_index)) {
                                                                if ($permission[$location_index]->editpermission == 1) {
                                                                    ?>
                                                                    <a class="manage_location" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location">
                                                                        <i class="fa fa-map-marker text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location"></i> 
                                                                    </a>   
                                                                    <?php
                                                                }else { ?>  <i class="fa fa-map-marker text-success not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                            } 
                                                            ?>
                                                        <?php } else { ?>   
                                                            <?php
                                                            if (isset($location_index)) {
                                                                if ($permission[$location_index]->addpermission == 1) {
                                                                    ?>
                                                                    <input type="hidden" name="manage_location_add" id="manage_location_add" value="manage_location_add" /> 
                                                                    <a class="manage_location_add"  data-toggle="tooltip" data-placement="top" title="" name="<?php echo $list['id']; ?>" id="<?php echo $i; ?>" data-original-title="Manage Asset Location">
                                                                        <i class="fa fa-map-marker text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Asset Location"></i> 

                                                                    </a> 
                                                                    <?php
                                                                }else { ?>  <i class="fa fa-map-marker text-success not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php } 
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                    </form>  &nbsp;  

                                                    <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="asset_user<?php echo $i; ?>">
                                                        <input type="hidden" value="<?php echo $list['asset_user_tbl_id']; ?>" id="asset_user_post_id<?php echo $i; ?>" name="asset_user_post_id"/>
                                                        <input type="hidden" name="asset_user_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       
                                                        <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Assets_list" />       
                                                        <?php if (!empty($list['asset_user_tbl_id'])) { ?>  
                                                            <?php
                                                            if (isset($user_index)) {
                                                                if ($permission[$user_index]->editpermission == 1) {
                                                                    ?>
                                                                    <a title="Manage Users" class="manage_user" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                                        <i class="fa fa-group text-warning"></i> 
                                                                    </a>
                                                                    <?php
                                                                } else { ?>  <i class="fa fa-group text-warning not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                            }
                                                            ?>
                                                        <?php } else { ?>
                                                            <?php
                                                            if (isset($user_index)) {
                                                                if ($permission[$user_index]->addpermission == 1) {
                                                                    ?>
                                                                    <input type="hidden" name="manage_asset_add" id="manage_asset_add" value="manage_asset_add" />        
                                                                    <a  title="Manage Users" class="manage_user_add" name="<?php echo $list['id']; ?>" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                                        <i class="fa fa-group text-warning"></i> 
                                                                    </a>
                                                                    <?php
                                                                } else { ?>  <i class="fa fa-group text-warning not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                            }
                                                            ?>
                                                        <?php } ?>
                                                    </form> &nbsp;
                                                    <?php
                                                    if (isset($parameter_index)) {
                                                        if ($permission[$parameter_index]->viewpermission == 1) {
                                                            ?>
                                                            <form action="<?php echo base_url(); ?>asset_parameter_range_list" method="post" id="asset_parameter_range<?php echo $i; ?>">                   
                                                                <input type="hidden" value="<?php echo $list['id']; ?>" name="asset_id"/>
                                                                <input type="hidden" name="asset_para_range_post" id="asset_para_range_post<?php echo $i; ?>" value="edit" />       

                                                                <a title="Manage Parameter" class="asset_para_range" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Parameter">
                                                                    <i class="fa fa-list-ul text-info"></i> 
                                                                </a>
                                                            </form>&nbsp;
                                                            <?php
                                                        } else { ?>  <i class="fa fa-map-marker text-success not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                    }
                                                    ?>
                                                    <form action="<?php echo base_url(); ?>Assets_edit" method="post" id="Assets_edit<?php echo $i; ?>">
                                                        <input type="hidden" value="<?php echo $list['id']; ?>" name="id"/>
                                                        <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                        <?php
                                                        if (isset($asset_index)) {
                                                            if ($permission[$asset_index]->deletepermission == 1) {
                                                                ?>
                                                                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                                </a> 
                                                                <?php
                                                            } else { ?>  <i class="fa fa-map-marker text-success not-allowed" data-toggle="tooltip" data-placement="top" title="" data-original-title="Access Denied !" disabled></i> <?php }
                                                        }
                                                        ?>
                                                    </form>&nbsp;   
                                                </div>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tr>          
                                <?php
                                $i++;
                            }
                        } else {
                            ?>     
                        <td colspan="7">No data found..!</td>           
                    <?php } ?>                  
                    </tbody>
                </table>
            </div>
        </div>    

    </div>
</div>
<?php $this->load->view('modal/asset_list_modal') ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.edit', function () {
            //        $(".edit").click(function () {
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

        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                //                $("#update_param_range" + id).attr('action', update_url);
                $("#Assets_edit" + id).submit();
            });
        });


        $('body').on('click', '.manage_user', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
            $("#asset_user" + id).submit();
            // }
        });

        $('body').on('click', '.manage_location', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
            $("#asset_location" + id).submit();
            // }
        });

        $('body').on('click', '.asset_para_range', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
            $("#asset_parameter_range" + id).submit();
            // }
        });

        var manage_user_addLink = "<?php echo base_url('User_asset_add'); ?>";

        $('body').on('click', '.manage_user_add', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            $("#asset_user_post" + id).val('manageadd');

            $("#asset_user_post_id" + id).val(this.name);
            //             alert($("#asset_user_post_id" + id).val());
            $("#asset_user" + id).attr('action', manage_user_addLink);
            $("#asset_user" + id).submit();
            // }
        });


        //        manage_location_add
        var manage_location_addLink = "<?php echo base_url('Assets_location_add'); ?>";

        $('body').on('click', '.manage_location_add', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            //             $("#asset_user_post" + id).val('manageadd');

            $("#asset_location_post_id" + id).val(this.name);
            //             alert($("#asset_user_post" + id).val());
            $("#asset_location" + id).attr('action', manage_location_addLink);
            $("#asset_location" + id).submit();
            // }
        });
    });
</script>