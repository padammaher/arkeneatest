<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Sensor Inventory</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url('Device_inventory_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-cloud"></i> Device Inventory</a>
                <a href="<?php echo base_url('Device_sensor_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-tachometer"></i> Device Sensor</a>
                <a href="<?php echo base_url('Device_assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-inbox"></i> Device Asset</a>   
                <a href="<?php echo base_url('Add_sensor_inventory'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>

                <!--<a href="sensor-inventory-add.html" class="btn btn-sm btn-primary">Add New</a>-->
                <!--<a href="device-inventory-list.html" class="btn btn-sm btn-primary">Device Inventory</a>-->

                <!--<a href="device-assets-list.html" class="btn btn-sm btn-primary">Device Asset</a>-->
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="sensor-inventory-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr.No</th>
                                <th>Sensor_Num</th>
                                <th>Device_Num</th>
                                <th>Sensor_Type</th>                          
                                <th>Location</th>                                                                         
                                <th>Description</th>  
                                <th>Uom</th> 
                                <th>Status</th> 
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>

                            <?php
//                            echo "<pre>"; print_r($sensor_inventory_list);
                            $i = 1;
                            if (!empty($sensor_inventory_list)) {
                                foreach ($sensor_inventory_list as $inventory_list) {
                                    ?>						
                                    <tr>
                                        <?php
                                        $setId_to_modal = $inventory_list['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#sensor_inv_list_modal_" . $setId_to_modal . "'";
                                        ?>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $i; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['sensor_no']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['device_id_number']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['sensor_type_tbl_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['location_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['description']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['uom_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $inventory_list['isactive'] == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td class="action">
                                            <div style="display: -webkit-inline-box;">
                                                <form action="<?php echo base_url(); ?>Sensor_inventory_list" method="post" id="updateasset<?php echo $i; ?>">
                                                    <input type="hidden" value="<?php echo $inventory_list['id']; ?>" name="id"/>
                                                    <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                    <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                        <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                    </a>
                                                </form>&nbsp;

                                                <form action="<?php echo base_url(); ?>Edit_device_sensors" method="post" id="device_sen<?php echo $i; ?>">                                                    
                                                    <input type="hidden" value="<?php echo $inventory_list['device_sensor_mapping_id']; ?>" name="dev_sen_post_id" id="dev_sen_post_id<?php echo $i; ?>" />
                                                    <input type="hidden" name="dev_sen_post" id="dev_sen_post<?php echo $i; ?>" value='edit'/>
                                                    <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Sensor_inventory_list" />       
                                                    <?php if (!empty($inventory_list['device_sensor_mapping_id'])) { ?>   
                                                        <input type="hidden" name="dev_sen_post_add" id="dev_sen_post_add<?php echo $i; ?>" value='<?php echo $inventory_list['id']; ?>'/>  
                                                        <a title="Device Sensor" class="dev_sensor" id="<?php echo $i; ?>" name="<?php echo $inventory_list['id']; ?>">
                                                            <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                        </a>
                                                    <?php } else { ?> 
                                                        <input type="hidden" name="dev_sen_post_add" id="dev_sen_post_add" value='dev_sen_post_add'/>  
                                                        <a  title="Device Sensor" class="dev_sensor_add" name="<?php echo $inventory_list['id']; ?>" id="<?php echo $i; ?>">
                                                            <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                        </a>
                                                    <?php } ?>
                                                </form>&nbsp;

                                                <form action="<?php echo base_url(); ?>Device_assets_edit" method="post" id="dev_asset<?php echo $i; ?>">                                                    
                                                    <input type="hidden" value="<?php echo $inventory_list['device_asset_tbl_id']; ?>" name="dev_asset_id" id="dev_asset_id<?php echo $i; ?>" />
                                                    <input type="hidden" name="dev_asset_post" id="dev_asset_post<?php echo $i; ?>" value='edit'/>
                                                    <input type="hidden" name="back_action" id="back_action<?php echo $i; ?>" value="Sensor_inventory_list" />       
                                                    <?php if (!empty($inventory_list['device_asset_tbl_id'])) { ?>    
                                                        <a title="Device Assets" class="dev_assets" id="<?php echo $i; ?>">
                                                            <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="Manage Device Assets" data-orignal-title="Manage Device Assets"></i> 
                                                        </a>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="dev_asset_post_add" id="dev_asset_post_add" value='dev_asset_post_add'/>  
                                                        <a  title="Device Assets" class="dev_assets_add" name="<?php echo $inventory_list['device_inventory_tbl_id']; ?>"  id="<?php echo $i; ?>">
                                                            <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="Manage Device Assets" data-orignal-title="Manage Device Assets"></i>  
                                                        </a>    
                                                    <?php } ?>

                                                </form> &nbsp; 

                                                <form action="<?php echo base_url(); ?>Sensor_inventory_list" method="post" id="updateasset<?php echo $i; ?>">
                                                    <input type="hidden" value="<?php echo $inventory_list['id']; ?>" name="id"/>
                                                    <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                    <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                        <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                    </a></form>&nbsp;
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td>No data found..!</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>  
                                </tr>
                                <?php
                            }
                            ?>     
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('modal/sensor_invetory_list_modal') ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('body').on('click', '.edit', function () {
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

        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                //                $("#update_param_range" + id).attr('action', update_url);
                $("#updateasset" + id).submit();
            });
        });


        $('body').on('click', '.dev_sensor', function () {
            var id = $(this).attr('id');
            //  $("#post" + id).val('edit');
//            alert(id);
            $("#dev_sen_post_add" + id).val('sen ' + this.name);
            $("#device_sen" + id).submit();
        });

        $('body').on('click', '.dev_assets', function () {
            var id = $(this).attr('id');
            //  $("#post" + id).val('edit');
//            alert(id);
            $("#dev_asset" + id).submit();
        });

        var manage_dev_sen_addLink = "<?php echo base_url('Add_device_sensors'); ?>";
        //        $(".dev_sensor_add").click(function () {
        $('body').on('click', '.dev_sensor_add', function () {
            // var flag = confirm('Are you sure you want to delete this item?');
            // if (flag == true) {
            var id = $(this).attr('id');
//            alert(id);
//                         $("#asset_user_post" + id).val('manageadd');
            //             alert(this.name);   
            $("#dev_sen_post_id" + id).val('sen ' + this.name);
//                         alert($("#dev_sen_post_id"+ id).val());
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
//             alert(this.name);
            $("#dev_asset_id" + id).val(this.name);
            //             alert($("#asset_user_post" + id).val());
            $("#dev_asset" + id).attr('action', manage_dev_asset_addLink);
            $("#dev_asset" + id).submit();
            // }
        });
    });
</script>        