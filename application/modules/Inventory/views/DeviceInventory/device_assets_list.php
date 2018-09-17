<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Device-Asset List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url('Device_assets_add'); ?>" class="btn btn-sm btn-primary">Add New</a>
                <a href="<?php echo base_url('Device_inventory_list'); ?>" class="btn btn-sm btn-primary">Device Inventory</a>
                <a href="<?php echo base_url('Sensor_inventory_list'); ?>" class="btn btn-sm btn-primary">Device Sensor</a>
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
                                <li class="flex-item">Device_Num</li>
                                <li class="flex-item">Asset ID</li>
                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    $i = 1;
                    if (!empty($device_asset_list)) {
                        foreach ($device_asset_list as $device_asset_list_data) {
                            ?>						
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="flex-container nowrap">
                                    <li class="flex-item"><?php echo $device_asset_list_data['number']; ?></li>
                                    <li class="flex-item"><?php echo $device_asset_list_data['code']; ?></li>
                                    <li class="flex-item">

                                        <form action="<?php echo base_url(); ?>Device_assets_edit" method="post" id="dervice_asset<?php echo $i; ?>">
                                            <input type="hidden" value="<?php echo $device_asset_list_data['id']; ?>" name="id"/>
                                            <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
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
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container nowrap">
                                <li class="flex-item">No data found..!</li>


                            </ul>
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

        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#dervice_asset" + id).submit();
            });
        });
    });
</script>