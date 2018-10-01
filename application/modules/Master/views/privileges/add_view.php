<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Add '<b><?php echo $user_type[0]->rolename ? $user_type[0]->rolename:'';?></b>' Privileges </h4>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
<?php //echo"<pre>"; print_r($user_privilege_data[0]->addpermission);?>
                <div class="x_content" >
                   <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addPrivileges" method="POST">
                       <input type="hidden" name="id_and_groupid" value="<?php echo $user_type[0]->group_id ? $user_type[0]->group_id:'';?>_<?php echo $user_type[0]->id ? $user_type[0]->id:'';?>">
                       <div class="row">
                        <div class="col-md-4">Menu</div>
                        <div class="col-md-2">Add</div>
                        <div class="col-md-2">Edit</div>
                        <div class="col-md-2">Delete</div>
                        <div class="col-md-2">View</div>
                    </div>
                    <?php //echo "<pre>";print_r($user_type[0]);
                            if (isset($menu) && !empty($menu)) {
                                foreach ($menu as $k => $data) {
                                    ?>
                    <div class="row">
                        <div class="col-md-4"><?php echo $data->menuName ?></div>
                        <div class="col-md-2"><label><input type="checkbox" value="" id="permission_value" name="permission_add_<?php echo $data->id ?>[]"  <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->addpermission =='1'? 'checked':'';?>></label></div>
                        <div class="col-md-2"><label><input type="checkbox" value="" id="permission_value" name="permission_edit_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->editpermission =='1'? 'checked':'';?>></label></div>
                        <div class="col-md-2"><label><input type="checkbox" value="" id="permission_value" name="permission_delete_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->deletepermission =='1'? 'checked':'';?>></label></div>
                        <div class="col-md-2"><label><input type="checkbox" value="" id="permission_value" name="permission_view_<?php echo $data->id ?>[]" <?php if(isset($user_privilege_data[$k]))echo $user_privilege_data[$k]->viewpermission =='1'? 'checked':'';?>></label></div>

                    </div>
                            <?php } } ?>
                      <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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