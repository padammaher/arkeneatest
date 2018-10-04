<?php
if (isset($permission) && !empty($permission)) {
    foreach ($permission as $key => $value) {
        if ($value->menuName == 'Asset Management') {
            $asset_index = $key;
        } elseif ($value->menuName == 'Asset Location') {
            $location_index = $key;
        } elseif ($value->menuName == 'Asset User') {
            $user_index = $key;
        }
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Asset Location List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right"> 
                <?php
                if (isset($asset_index)) {
                    if ($permission[$asset_index]->viewpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Asset Management</a>
                        <?php
                    }
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
                if (isset($location_index)) {
                    if ($permission[$location_index]->addpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Assets_location_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>                
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="assets-location-list">

                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Asset Code</th>
                                <th>Location</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>   
                                <th>Contact Email</th>   
                                <th>Status</th>   
                                <?php
                                if (isset($location_index) || isset($user_index)) {
                                    if ($permission[$location_index]->editpermission == 1 || $permission[$location_index]->deletepermission == 1 || $permission[$user_index]->editpermission == 1 || $permission[$user_index]->addpermission == 1) {
                                        echo "<th>Actions</th>";
                                    }
                                }
                                ?>
                                <!--<th>Actions</th>-->   
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1; //var_dump($asset_location_list);
                            if (!empty($asset_location_list)) {
                                foreach ($asset_location_list as $asset_loc_list) {
                                    ?>


                                    <tr>                                       
                                        <?php
                                        $setId_to_modal = $asset_loc_list['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#assest_list_modal_" . $setId_to_modal . "'";
                                        ?>
                                        <td class="flex-item"><?php echo $i; ?></td>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['code']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['location']; ?></td>


                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['latitude']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['longitude']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['contact_person']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['contact_no']; ?></td>                                        
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $asset_loc_list['contact_email']; ?></td>
                                        <td><?php echo $asset_loc_list['isactive'] == '1' ? "Active" : "In-active"; ?></td>
                                        <?php
                                        if (isset($location_index) || isset($user_index)) {
                                            if ($permission[$location_index]->editpermission == 1 || $permission[$location_index]->deletepermission == 1 || $permission[$user_index]->editpermission == 1 || $permission[$user_index]->addpermission == 1) {
                                                ?>
                                                <td>             
                                                    <div style="display: -webkit-inline-box;">
                                                        <?php
                                                        if (isset($location_index)) {
                                                            if ($permission[$location_index]->editpermission == 1) {
                                                                ?>
                                                                <form action="<?php echo base_url(); ?>Assets_location_list" method="post" id="Assets_location_list<?php echo $i; ?>">
                                                                    <input type="hidden" value="<?php echo $asset_loc_list['id']; ?>" name="asset_location_post_id"/>
                                                                    <input type="hidden" name="asset_location_post" id="post<?php echo $i; ?>"/>

                                                                    <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                                        <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                                    </a>
                                                                </form> &nbsp;
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="asset_user<?php echo $i; ?>">
                                                            <input type="hidden" value="<?php echo $asset_loc_list['asset_user_tbl_id']; ?>" id="asset_user_post_id<?php echo $i; ?>" name="asset_user_post_id"/>
                                                            <input type="hidden" name="asset_user_post" id="asset_user_post<?php echo $i; ?>" value="edit" />       
                                                            <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Assets_location_list" />       
                                                            <?php if (!empty($asset_loc_list['asset_user_tbl_id'])) { ?>  
                                                                <?php
                                                                if (isset($user_index)) {
                                                                    if ($permission[$user_index]->editpermission == 1) {
                                                                        ?>
                                                                        <a title="Manage Users" class="manage_user" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                                            <i class="fa fa-group text-warning"></i> 
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            <?php } else { ?>
                                                                <?php
                                                                if (isset($user_index)) {
                                                                    if ($permission[$user_index]->addpermission == 1) {
                                                                        ?>
                                                                        <input type="hidden" name="manage_asset_add" id="manage_asset_add" value="manage_asset_add" />                                                       
                                                                        <a  title="Manage Users" class="manage_user_add" name="<?php echo $asset_loc_list['asset_tbl_id']; ?>" id="<?php echo $i; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Users">
                                                                            <i class="fa fa-group text-warning"></i> 
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        </form>  &nbsp;
                                                        <?php
                                                        if (isset($location_index)) {
                                                            if ($permission[$location_index]->deletepermission == 1) {
                                                                ?>
                                                                <form action="<?php echo base_url(); ?>Assets_location_list" method="post" id="Assets_location_list<?php echo $i; ?>">
                                                                    <input type="hidden" value="<?php echo $asset_loc_list['id']; ?>" name="asset_location_post_id"/>
                                                                    <input type="hidden" name="asset_location_post" id="post<?php echo $i; ?>"/>

                                                                    <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                                        <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                                    </a> 
                                                                </form> 
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                <tr><td colspan="9">No data found..!</td></tr>
                            <?php } ?>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>


</div>
<?php $this->load->view('modal/asset_location_list_modal') ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '.edit', function () {
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

            $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
                $(".ok").click(function () {
                $("#post" + id).val('delete');
                //                $("#update_param_range" + id).attr('action', update_url);
        $("#Assets_location_list" + id).submit();
            });
        });
 

            $('body').on('click', '.manage_user', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            // $("#post" + id).val('delete');
        $("#asset_user" + id).submit();
            // }
        });         var manage_user_addLink = "<?php echo base_url('User_asset_add'); ?>";

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
    });
</script>