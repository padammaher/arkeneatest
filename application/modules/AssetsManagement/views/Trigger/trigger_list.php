<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="clearfix"></div>
                <div class="x_content" id="trigger-list">
                    <div class="col-md-12 readonlyinfo">

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Code : <span><?php echo isset($header_desc[0]['code']) ? $header_desc[0]['code'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Customer Location : <span><?php echo isset($header_desc[0]['location']) ? $header_desc[0]['location'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Specification : <span><?php echo isset($header_desc[0]['specification']) ? $header_desc[0]['specification'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Name : <span><?php echo isset($header_desc[0]['rule_name']) ? $header_desc[0]['rule_name'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Description : <span><?php echo isset($header_desc[0]['rule_des']) ? $header_desc[0]['rule_des'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter : <span><?php echo isset($header_desc[0]['parameter_name']) ? $header_desc[0]['parameter_name'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Green Value : <span><?php echo isset($header_desc[0]['green_value']) ? $header_desc[0]['green_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Orange Value : <span><?php echo isset($header_desc[0]['orange_value']) ? $header_desc[0]['orange_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Red Value : <span><?php echo isset($header_desc[0]['red_value']) ? $header_desc[0]['red_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Wef Date : <span><?php echo isset($header_desc[0]['wef_date']) ? $header_desc[0]['wef_date'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Trigger Count : <span><?php echo isset($header_desc[0]['trigger_threshold_id_count']) ? $header_desc[0]['trigger_threshold_id_count'] : ''; ?></span></div>
                    </div>				 
                </div>

                <div class="page-title">
                    <div class="title_left">
                        <h4>Trigger List -<span>Rule Name : <span><?php echo isset($header_desc[0]['rule_name']) ? $header_desc[0]['rule_name'] : ''; ?></span></span> <span>Parameter : <span><?php echo isset($header_desc[0]['parameter_name']) ? $header_desc[0]['parameter_name'] : ''; ?></span></span> </h4>
                    </div>

                    <div class="title_right">
                        <div class="pull-right">
                            <a href="<?php echo base_url('Assets_list'); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Asset Management</a>
                            <a href="<?php echo base_url('asset_parameter_range_list'); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Asset Parameter Range List</a>
                            <a href="<?php echo base_url('AssetsManagement/asset_rule_list'); ?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Rule & Action Master List</a>
                            <?php
                            if (isset($permission) && !empty($permission)) {
                                if ($permission[0]->addpermission == 1) {
                                    ?>
                                    <a class="btn btn-sm btn-primary trigger_add"> <i class="fa fa-plus"></i> Add Trigger</a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="x_content" id="trigger-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Alarm Trigger Name</th>
                                <th>Trigger Threshold</th>
                                <th>Email</th>
                                <th>SMS</th>   
                                <?php
                                if (isset($permission) && !empty($permission)) {
                                    if ($permission[0]->editpermission == 1 || $permission[0]->deletepermission == 1) {
                                        ?>
                                        <th>Actions</th>  
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            if (!empty($trigger_list)) {
                                foreach ($trigger_list as $trigger_list_data) {
                                    ?>
                                    <tr>
                                        <?php
                                        $setId_to_modal = $trigger_list_data['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#trigger_list_modal_" . $setId_to_modal . "'";
                                        ?>
                                        <td <?php echo $modal_idand_class; ?> ><?php echo $i; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo ($trigger_list_data['trigger_name']) == '' ? '<i class="fa fa-times" aria-hidden="true"></i>' : $trigger_list_data['trigger_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo ($trigger_list_data['trigger_threshold_id']) == '' ? '<i class="fa fa-times" aria-hidden="true"></i>' : $trigger_list_data['trigger_threshold_id']; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo ($trigger_list_data['email']) == '' ? '<i class="fa fa-times" aria-hidden="true"></i>' : $trigger_list_data['email']; ?></td>
                                        <td <?php echo $modal_idand_class; ?>><?php echo ($trigger_list_data['sms_contact_no']) == '' ? '<i class="fa fa-times" aria-hidden="true"></i>' : $trigger_list_data['sms_contact_no']; ?></td>
                                        <?php
                                        if (isset($permission) && !empty($permission)) {
                                            if ($permission[0]->editpermission == 1 || $permission[0]->deletepermission == 1) {
                                                ?>
                                                <td class="flex-item">
                                                    <form action="<?php echo base_url(); ?>trigger_add" method="post" id="trigger_form<?php echo $i; ?>">
                                                        <input type="hidden" id="triggerid<?php echo $i; ?>" value="<?php echo $trigger_list_data['id']; ?>" name="trigger_post_id"/>
                                                        <input type="hidden" name="trigger_form_action" id="trigger_form_action<?php echo $i; ?>"/>
                                                        <?php
                                                        if (isset($permission) && !empty($permission)) {
                                                            if ($permission[0]->editpermission == 1) {
                                                                ?>
                                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                                </a>
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
                            <td colspan="6">No data found..!</td> 
                        <?php } ?>
                        </tbody>
                    </table>
                    <form action="<?php echo base_url(); ?>trigger_add" method="post" id="trigger_form0">
                        <input type="hidden" name="trigger_form_action" id="trigger_form_action0"/></form>


                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('modal/trigger_list_modal') ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    var update_url = "<?php echo base_url() . 'trigger_form'; ?>";
    $(document).ready(function () {
        $('body').on('click', '.edit', function () {
//        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#trigger_form_action" + id).val('edit');
//            alert(id);
            $("#trigger_form" + id).submit();
        });

//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#trigger_form_action" + id).val('delete');
//                $("#trigger_form" + id).submit();
//            }
//        });


        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#confirmmodal_Box").modal();
            $(".ok").click(function () {
                $("#trigger_form_action" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#trigger_form" + id).submit();
            });
        });



        $('body').on('click', '.trigger_add', function () {
//             alert("sdsf");
            var id = 0;
            $("#trigger_form_action" + id).val('addNew');
            $("#triggerid" + id).val('');
//                alert($("#triggerid"+id).val());
            $("#trigger_form" + id).submit();

        });
    });

//             $(".flex-item").click(function (e) {
//            if (!$(e.target).hasClass('fa')) {
////                var id = $(this).attr('data-value');
//                $('#detailsModal').modal('show');
//                $.ajax({
//                    url: "<?php echo base_url() . 'Master/assetmaster/asset_type_details'; ?>",
//                    method: "POST",
//                    data: {assettype_id: id},
//                    dataType: "html",
//                    success: function (data) {
//                        $("#detailsModal").html(data);
//                        $('#detailsModal').modal('show');
//                    }
//                });
//            }
//        });
</script>        