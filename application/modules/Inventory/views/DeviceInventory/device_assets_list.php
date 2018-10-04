<?php
if (isset($permission) && !empty($permission)) {
    foreach ($permission as $key => $value) {
        if ($value->menuName == 'Device Inventory') {
            $device_index = $key;
        } elseif ($value->menuName == 'Device Sensor') {
            $sensor_index = $key;
        } elseif ($value->menuName == 'Device Asset') {
            $asset_index = $key;
        }
    }
}
?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Device-Asset List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <?php
                if (isset($device_index)) {
                    if ($permission[$device_index]->viewpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Device_inventory_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-cloud"></i> Device Inventory</a>
                        <?php
                    }
                }
                ?>
                <?php
                if (isset($sensor_index)) {
                    if ($permission[$sensor_index]->viewpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Device_sensor_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-tachometer"></i> Device Sensor</a>
                        <?php
                    }
                }
                ?>
                <?php
                if (isset($asset_index)) {
                    if ($permission[$asset_index]->addpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Device_assets_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>                                
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

                <div class="x_content">

                    <table id="datatable" class="table table-striped table-bordered item-table">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Device_Num</th>
                                <th>Asset Code</th>
                                <th>Wef Date</th>
                                <th>Status</th>
                                <?php
                                if (isset($asset_index)) {
                                    if ($permission[$asset_index]->editpermission == 1 || $permission[$asset_index]->deletepermission == 1) {
                                        echo "<th>Actions</th>";
                                    }
                                }
                                ?>
                                <!--<th>Action</th>-->                                         
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if (!empty($device_asset_list)) {
                                foreach ($device_asset_list as $device_asset_list_data) {
                                    ?>	

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $device_asset_list_data['number']; ?></td>
                                        <td><?php echo $device_asset_list_data['code']; ?></td>
                                        <td><?php echo $device_asset_list_data['createdate']; ?></td>
                                        <td><?php echo ($device_asset_list_data['isactive'] == 1) ? 'Active' : 'In-active'; ?></td>
                                        <?php
                                        if (isset($asset_index)) {
                                            if ($permission[$asset_index]->editpermission == 1 || $permission[$asset_index]->deletepermission == 1) {
                                                ?>
                                                <td>
                                                    <form action="<?php echo base_url(); ?>Device_assets_edit" method="post" id="dervice_asset<?php echo $i; ?>">
                                                        <input type="hidden" value="<?php echo $device_asset_list_data['id']; ?>" name="id"/>
                                                        <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                        <?php
                                                        if (isset($asset_index)) {
                                                            if ($permission[$asset_index]->editpermission == 1) {
                                                                ?>
                                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        if (isset($asset_index)) {
                                                            if ($permission[$asset_index]->deletepermission == 1) {
                                                                ?>
                                                                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </form>   
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

                                <tr>
                                    <td colspan="5">data not found..!</td>
                                </tr>


                            <?php } ?>                        </tbody>             
                    </table>
                </div>

            </div>
        </div>

    </div>


</div>

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//            $(".edit").click(function () {
        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
//            alert(id);
            $("#dervice_asset" + id).submit();
        });

        //                $(".delete").click(function () {
        //            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#post" + id).val('delete');
//                $("#device_asset" + id).submit();
//            }
//        });


        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#dervice_asset" + id).submit();
            });
        });
    });
</script>