<div class="">
    <div class="page-title">
         <div class="title_left">
            <h4>Add <?php echo $user_type[0]->rolename ? $user_type[0]->rolename:'';?> Privileges </h4>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="privilege-list">
                    
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addPrivileges" method="POST">
                       <input type="hidden" name="id_and_groupid" value="<?php echo $user_type[0]->group_id ? $user_type[0]->group_id:'';?>_<?php echo $user_type[0]->id ? $user_type[0]->id:'';?>">
                       
                    <table id="" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                
                                
                        <th>Menu</th>
                                <th>Add</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                 <th>View</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            <?php //echo "<pre>";print_r($user_type[0]);
                            if (isset($menu) && !empty($menu)) {
                                foreach ($menu as $k => $data) {
                                    ?>
                   <tr>
                        <td><?php echo $data->menuName ?></td>
                        <td><label><input class="flat" type="checkbox" value="" id="permission_value" name="permission_add_<?php echo $data->id ?>[]"  <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->addpermission =='1'? 'checked':'';?>></label></td>
                        <td><label><input class="flat" type="checkbox" value="" id="permission_value" name="permission_edit_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->editpermission =='1'? 'checked':'';?>></label></td>
                        <td><label><input class="flat" type="checkbox" value="" id="permission_value" name="permission_delete_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->deletepermission =='1'? 'checked':'';?>></label></td>
                        <td><label><input class="flat" type="checkbox" value="" id="permission_value" name="permission_view_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->viewpermission =='1'? 'checked':'';?>></label></td>

                    </tr>
                            <?php } } 
                            
                            else {
                                ?>
                            <td colspan="5">No data found..!</td>       
                        <?php }
                        ?>
                            
                        </tbody>
                    </table>
                              
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                                <a href="<?php echo base_url() ?>privilege" class="btn btn-default">Cancel</a>
                            </div>
                        </div>

                    </form>
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