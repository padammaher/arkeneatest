<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Asset-User Management</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">

                <a href="<?php echo base_url('Assets_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa fa-arrow-left"></i> Asset Management</a>
                <a href="<?php echo base_url('Assets_location_list'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-map-marker"></i> Asset Location</a>
                <?php
                if (isset($permission) && !empty($permission)) {
                    if ($permission[0]->addpermission == 1) {
                        ?>
                        <a href="<?php echo base_url('User_asset_add'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>                 
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
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Asset Code</th>
                                <th>User Name</th>
                                <th>Status</th>   
                                <th>Actions</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1; //var_dump($asset_user_list);
                            if (!empty($asset_user_list)) { 
                                foreach ($asset_user_list as $k => $asset_user_list_data) {
                                    ?> 
                                    <tr>
                                        <?php
                                        $setId_to_modal = $asset_user_list_data['id'];
                                        $modal_idand_class = "data-toggle='modal' href='#user_assest_list_modal_" . $setId_to_modal . "'";
                                        ?>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $k + 1 ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $asset_user_list_data['code']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo $asset_user_list_data['client_name']; ?></td>
                                        <td <?php echo $modal_idand_class; ?> class="flex-item"><?php echo ($asset_user_list_data['isactive']==1)?'Active':'In-active'; ?></td>
                                        <td>
                                            <form action="<?php echo base_url(); ?>User_asset_edit" method="post" id="Assets_edit<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $asset_user_list_data['id']; ?>" name="asset_user_post_id"/>
                                                <input type="hidden" name="asset_user_post" id="post<?php echo $i; ?>"/>
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
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <td colspan="4">No data found..!</td>                                                                           
                                <?php } ?>					
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $this->load->view('modal/user_asset_list_modal'); ?>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('body').on('click', '.edit', function () {
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

    });
</script>