<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Privileges List</h4>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="privilege-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr.No</th>
                                <th>User Type</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php //echo "<pre>";print_r($user_type);
                            if (isset($user_type) && !empty($user_type)) {
                                foreach ($user_type as $k => $data) {
                                    ?>
                                    <tr>
                                        <td data-value="<?php echo $data->id . "_" . $k + 1; ?>"><?php echo $k + 1; ?></td>
                                        <td data-value="<?php echo $data->id . "_" . $k + 1; ?>"><?php echo $data->rolename; ?></td>
                                        <td data-value="<?php echo $data->id . "_" . $k + 1; ?>"><?php echo $data->roledescription ? $data->roledescription : ""; ?></td>
                                        <td data-value="<?php echo $data->id . "_" . $k + 1; ?>"><?php echo $data->isactive == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td class="action">
                                            <a title="Add Privelege" href="<?php echo base_url() ?>addPrivileges/<?php echo $data->id; ?>" class="edit" id="<?php echo $k + 1; ?>">  
                                                <i class="fa fa-cog blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add"></i>
                                            </a>
                                            <a title="Edit" href="<?php echo base_url() ?>addPrivileges/<?php echo $data->id; ?>" class="edit" id="<?php echo $k + 1; ?>">  
                                                <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                            </a>
                                            <!--<a title="Delete" class="delete" id="<?php echo $k + 1; ?>" name="<?php echo base_url() ?>addPrivileges/<?php echo $data->id; ?>">-->
                                                <!--<i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>--> 
                                            <!--</a>-->
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <td colspan="5">No data found..!</td>       
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
//        $('body').on('click', '.delete', function () {        
//            var id = $(this).attr('id');
//            var action_url = $(this).attr('name');
//            var action = 'delete';
//            alert(action_url+'_'+action);
//            window.location.href(action_url+'_'+action);
//            $("#confirmmodal_Box").modal();
//            $(".ok").click(function () {
                //$("#post" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
//                $("#Assets_edit" + id).submit();
//            });
//        });
    });
</script>