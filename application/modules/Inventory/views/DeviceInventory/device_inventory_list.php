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
            <h4>Device Inventory</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
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
                    if ($permission[$asset_index]->viewpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Device_assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-inbox"></i> Device Asset</a>
                        <?php
                    }
                }
                ?>               
                <?php
                if (isset($device_index)) {
                    if ($permission[$device_index]->addpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Device_inventory_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
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

                <div class="x_content" id="device-inventory-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr.No</th>
                                <th>Device_Num</th>
                                <th>Asset Code</th>
                                <th>Serial_Num</th>
                                <th>Make</th>                          
                                <th>Model</th>                          
                                <th>Location</th>                          
                                <th>Description</th>                          
                                <th>GSM Number</th>                                               
                                <th>Status</th>    
                                <?php
                                if (isset($device_index) || isset($asset_index) || isset($sensor_index)) {
                                    if ($permission[$device_index]->editpermission == 1 || $permission[$device_index]->deletepermission == 1 || $permission[$asset_index]->editpermission == 1 || $permission[$sensor_index]->editpermission == 1) {
                                        echo "<th>Actions</th>";
                                    }
                                }
                                ?>
                                <!--<th>Actions</th>-->                          
                            </tr>
                        </thead>
                        <tbody>

                            <!--<div class="row clearfix">-->
                            <?php
                            if (!empty($Device_inventory_list_data)) {
                                $i = 1;
                                foreach ($Device_inventory_list_data as $InventoryListRowData) {
                                    ?>

                                    <tr>
                                        <?php
                                        $setId_to_modal = $InventoryListRowData['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#device_inv_list_modal_" . $setId_to_modal . "'";
                                        ?>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $i; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['number']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['code']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['serial_no']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['make']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['model']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['location_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['description']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['gsm_number']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $InventoryListRowData['isactive'] == 1 ? 'Active' : 'In-active'; ?></td>
                                        <?php
                                        if (isset($device_index) || isset($asset_index) || isset($sensor_index)) {
                                            if ($permission[$device_index]->editpermission == 1 || $permission[$device_index]->deletepermission == 1 || $permission[$asset_index]->editpermission == 1 || $permission[$sensor_index]->editpermission == 1) {
                                                ?>
                                                <td class="action">
                                                    <div style="display: -webkit-inline-box;">
                                                        <?php
                                                        if (isset($device_index)) {
                                                            if ($permission[$device_index]->editpermission == 1) {
                                                                ?>
                                                                <form action="<?php echo base_url(); ?>Device_inventory_edit" method="post" id="updateasset<?php echo $i; ?>">
                                                                    <input type="hidden" value="<?php echo $InventoryListRowData['id']; ?>" name="id"/>
                                                                    <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                                    <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                                        <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                                    </a>                                                   
                                                                </form>&nbsp;
                                                                <?php
                                                            }
                                                        }
                                                        ?>

                                                        <?php if ($InventoryListRowData['isactive'] == 1) { ?>
                                                            <form action="<?php echo base_url(); ?>Edit_device_sensors" method="post" id="device_sen<?php echo $i; ?>">                                                    
                                                                <input type="hidden" value="<?php echo $InventoryListRowData['dev_sen_id']; ?>" name="dev_sen_post_id" id="dev_sen_post_id<?php echo $i; ?>" />
                                                                <input type="hidden" name="dev_sen_post" id="dev_sen_post<?php echo $i; ?>" value='edit'/>
                                                                <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Device_inventory_list" />       
                                                                <?php if (!empty($InventoryListRowData['dev_sen_id'])) { ?>
                                                                    <?php
                                                                    if (isset($sensor_index)) {
                                                                        if ($permission[$sensor_index]->editpermission == 1) {
                                                                            ?>
                                                                            <input type="hidden" name="dev_sen_post_add" id="dev_sen_post_add<?php echo $i; ?>" value='<?php echo $InventoryListRowData['id']; ?>'/>  
                                                                            <a title="Device Sensor" class="dev_sensor" id="<?php echo $i; ?>" name="<?php echo $InventoryListRowData['id']; ?>">
                                                                                <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } else { ?>
                                                                    <?php
                                                                    if (isset($sensor_index)) {
                                                                        if ($permission[$sensor_index]->addpermission == 1) {
                                                                            ?>        
                                                                            <input type="hidden" name="dev_sen_post_add" id="dev_sen_post_add" value='dev_sen_post_add'/>  
                                                                            <a title="Device Sensor" class="dev_sensor_add" name="<?php echo $InventoryListRowData['id']; ?>" id="<?php echo $i; ?>">
                                                                                <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } ?>

                                                            </form>&nbsp;                                                         


                                                            <form action="<?php echo base_url(); ?>Device_assets_edit" method="post" id="dev_asset<?php echo $i; ?>">                                                    
                                                                <input type="hidden" value="<?php echo $InventoryListRowData['device_asset_id']; ?>" name="dev_asset_id" id="dev_asset_id<?php echo $i; ?>"/>
                                                                <input type="hidden" name="dev_asset_post" id="dev_asset_post<?php echo $i; ?>" value='edit'/>
                                                                <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Device_inventory_list" />       

                                                                <?php if (!empty($InventoryListRowData['device_asset_id'])) { ?>   
                                                                    <?php
                                                                    if (isset($asset_index)) {
                                                                        if ($permission[$asset_index]->editpermission == 1) {
                                                                            ?>
                                                                            <a title="Device Assets" class="dev_assets" id="<?php echo $i; ?>">
                                                                                <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="Manage Device Assets" data-orignal-title="Manage Device Assets"></i> 
                                                                            </a>  
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } else { ?>
                                                                    <?php
                                                                    if (isset($asset_index)) {
                                                                        if ($permission[$asset_index]->addpermission == 1) {
                                                                            ?>
                                                                            <input type="hidden" name="dev_asset_post_add" id="dev_asset_post_add" value='dev_asset_post_add'/>  
                                                                            <a  title="Device Assets" class="dev_assets_add" name="<?php echo $InventoryListRowData['id']; ?>"  id="<?php echo $i; ?>">
                                                                                <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="Manage Device Assets" data-orignal-title="Manage Device Assets"></i> 
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                <?php } ?>
                                                            </form> &nbsp;
                                                        <?php } ?>
                                                        <?php
                                                        if (isset($device_index)) {
                                                            if ($permission[$device_index]->deletepermission == 1) {
                                                                ?>
                                                                <form action="<?php echo base_url(); ?>Device_inventory_edit" method="post" id="updateasset<?php echo $i; ?>">
                                                                    <input type="hidden" value="<?php echo $InventoryListRowData['id']; ?>" name="id"/>
                                                                    <input type="hidden" name="post" id="post<?php echo $i; ?>"/>

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
                            <td colspan="11">No data found..!</td>   
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<?php $this->load->view('modal/device_invetory_list_modal'); ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.edit', function () {
            //        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
//            alert(id);
            $("#updateasset" + id).submit();
        });



        //        $(".delete").click(function () {
        //            var flag = confirm('Are you sure you want to delete this item?'); //            if (flag == true) {
//                var id = $(this).attr('id');
        //                $("#post" + id).val('delete');
        //                $("#updateasset" + id).submit();
//            }
//        });
        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                //                $("#update_param_range" + id).attr('action', update_url);
                $("#updateasset" + id).submit();
            });
        });


        $('body').on('click', '.dev_assets', function () {
            var id = $(this).attr('id');
//            $("#post" + id).val('edit');
            //            alert(id);
            $("#dev_asset" + id).submit();
        });


        $('body').on('click', '.dev_sensor', function () {
            var id = $(this).attr('id'); //            $("#post" + id).val('edit');
//            alert(id);
            $("#dev_sen_post_add" + id).val('dev ' + this.name);
            //            alert($("#dev_sen_post_id" + id).val());
            $("#device_sen" + id).submit();
        });


        var manage_dev_sen_addLink = "<?php echo base_url('Add_device_sensors'); ?>";

        $('body').on('click', '.dev_sensor_add', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
            //             $("#asset_user_post" + id).val('manageadd');

            $("#dev_sen_post_id" + id).val('dev ' + this.name);
            //             alert($("#asset_user_post" + id).val());
            $("#device_sen" + id).attr('action', manage_dev_sen_addLink);
            $("#device_sen" + id).submit();
            // }
        });


        var manage_dev_asset_addLink = "<?php echo base_url('Device_assets_add'); ?>";

        $('body').on('click', '.dev_assets_add', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
//             $("#asset_user_post" + id).val('manageadd');

            $("#dev_asset_id" + id).val(this.name);
//             alert($("#asset_user_post" + id).val());
            $("#dev_asset" + id).attr('action', manage_dev_asset_addLink);
            $("#dev_asset" + id).submit();
            // }
        });
    });



</script>