<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Sensor Inventory</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url('Add_sensor_inventory'); ?>" class="btn btn-sm btn-primary">Add New</a>
                <a href="<?php echo base_url('Device_inventory_list'); ?>" class="btn btn-sm btn-primary">Device Inventory</a>
                <a href="<?php echo base_url('Device_assets_list'); ?>" class="btn btn-sm btn-primary">Device Asset</a>   
                <!--<a href="sensor-inventory-add.html" class="btn btn-sm btn-primary">Add New</a>-->
                <!--<a href="device-inventory-list.html" class="btn btn-sm btn-primary">Device Inventory</a>-->
                <!--<a href="device-sensors-list.html" class="btn btn-sm btn-primary">Device Sensor</a>-->
                <!--<a href="device-assets-list.html" class="btn btn-sm btn-primary">Device Asset</a>-->
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
                                <li class="flex-item">Sr No.</li>
                                <li class="flex-item">Sensor_Number</li>
                                <!--<li class="flex-item">Device ID</li>-->
                                <li class="flex-item">Sensor_Type</li>


                                <li class="flex-item">Description</li>


                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    $i = 1;
                    if (!empty($sensor_inventory_list)) {
                        foreach ($sensor_inventory_list as $inventory_list) {
                            ?>						
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">

                                        <li class="flex-item"><?php echo $i; ?></li>
                                        <li class="flex-item"><?php echo $inventory_list['sensor_no']; ?></li>                  
                                        <li class="flex-item"><?php echo $inventory_list['sensor_type_tbl_name']; ?></li>
                                        <li class="flex-item"><?php echo $inventory_list['description']; ?></li>
                                        <li class="flex-item">

                                            <form action="<?php echo base_url(); ?>Sensor_inventory_list" method="post" id="updateasset<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $inventory_list['id']; ?>" name="id"/>
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                </a></form>
                                            <?php if (!empty($inventory_list['device_sensor_mapping_id'])) { ?>
                                                <form action="<?php echo base_url(); ?>Edit_device_sensors" method="post" id="device_sen<?php echo $i; ?>">                                                    

                                                    <input type="hidden" value="<?php echo $inventory_list['device_sensor_mapping_id']; ?>" name="dev_sen_post_id"/>
                                                    <input type="hidden" name="dev_sen_post" id="dev_sen_post<?php echo $i; ?>" value='edit'/>
                                                    <a title="Device Sensor" class="dev_sensor" id="<?php echo $i; ?>" name="<?php echo $inventory_list['device_sensor_mapping_id']; ?>">
                                                        <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                    </a></form><?php } ?>
                                            <?php if (!empty($inventory_list['device_asset_tbl_id'])) { ?>
                                                <form action="<?php echo base_url(); ?>Device_assets_edit" method="post" id="dev_asset<?php echo $i; ?>">                                                    
                                                    <input type="hidden" value="<?php echo $inventory_list['device_asset_tbl_id']; ?>" name="dev_asset_id"/>
                                                    <input type="hidden" name="dev_asset_post" id="dev_asset_post<?php echo $i; ?>" value='edit'/>
                                                    <a title="Device Assets" class="dev_assets" id="<?php echo $i; ?>">
                                                        <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="Manage Device Assets" data-orignal-title="Manage Device Assets"></i> 
                                                    </a>
                                                </form>                                                    
                                            <?php } ?>

                                            </form>   

                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="flex-container nowrap">
                                    <li class="flex-item">No data found..!</li>                    

                                </ul>
                            </div>
                        </div>
                        <?php
                    }
                    ?>                      

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
            $("#updateasset" + id).submit();
        });

//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#post" + id).val('delete');
//                $("#updateasset" + id).submit();
//            }
//        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#updateasset" + id).submit();
            });
        });

        $(".dev_sensor").click(function () {
            var id = $(this).attr('id');
            //  $("#post" + id).val('edit');
//            alert(id);
            $("#device_sen" + id).submit();
        });

        $(".dev_assets").click(function () {
            var id = $(this).attr('id');
            //  $("#post" + id).val('edit');
//            alert(id);
            $("#dev_asset" + id).submit();
        });

    });
</script>        