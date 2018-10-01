<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Device-Sensor List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">

                <a href="<?php echo base_url('Device_inventory_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-cloud"></i> Device Inventory</a>
                <a href="<?php echo base_url('Device_assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-inbox"></i> Device Asset</a>
                <?php
                if (isset($permission) && !empty($permission)) {
                    if ($permission[0]->addpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('Add_device_sensors'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>                                     
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
                <div class="x_content" >
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Device_Num</th>
                                <th>Sensor Number</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            $i = 1;
                            if (!empty($device_sensors_list)) {
                                foreach ($device_sensors_list as $device_sen_list) {
                                    ?>

                                    <tr >
                                        <?php
                                        $setId_to_modal = $device_sen_list['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#device_sensor_list_modal_" . $setId_to_modal . "'";
                                        ?>                           

                                        <td <?php echo $modal_idand_class; ?>><?php echo $i; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo $device_sen_list['number']; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo $device_sen_list['sensor_no']; ?></td>
                                        <td>

                                            <form action="<?php echo base_url(); ?>Edit_device_sensors" method="post" id="dev_sen<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $device_sen_list['id']; ?>" name="id" id="dev_id<?php echo $i; ?>" />
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <?php
                                                if (isset($permission) && !empty($permission)) {
                                                    if ($permission[0]->editpermission == 1) {
                                                        ?>
                                                        <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                            <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                        </a>&nbsp;&nbsp;&nbsp;
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($permission) && !empty($permission)) {
                                                    if ($permission[0]->deletepermission == 1) {
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

                                    </tr>

        <?php
        $i++;
    }
} else {
    ?>                      

                                <tr>                          
                                    <td colspan="4">data not found..!</td>
                                </tr>

<?php } ?>                      
                        </tbody>
                    </table>
                </div>   </div>
        </div>
    </div>
</div>
<?php $this->load->view('modal/device_sensor_list_modal') ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
//            alert(id);
            $("#dev_sen" + id).submit();
        });

//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#post" + id).val('delete');
//                $("#updateasset" + id).submit();
//            }
//        });
        var actionUrl = "<?php echo base_url('Device_sensor_list'); ?>";

        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
//                alert($("#dev_id" + id).val());
                $("#dev_sen" + id).attr('action', actionUrl);
                $("#dev_sen" + id).submit();
            });
        });
    });
</script>