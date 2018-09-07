<div id="sub_category_list_view" class="modal fade" role="dialog"tabindex="-1"  style="z-index: 1600;" >
       <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Assets Sub Category Type </h4>
                <button class="btn btn-default pull-right" data-toggle="modal" href="#add_assets_sub_category"> <i class="fa fa-plus-circle">&nbsp;</i>Add New Sub Category</button>
            </div>
            <div class="modal-body">

            <table id="ast-sub-list-by-maincategory" class="table">
                <thead>
                    <tr> 
                        <th width="60%">Category Name</th>
                        <th width="20%">Status</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <?php foreach ($sub_category_list as $list) { ?>
                    <tr id="deleteRow_<?php echo $list['id'] ?>">
                        <td> <?php echo $list['ast_sub_cat_name'] ?></td>

                        <?php if ($list['isactive'] == 1) { ?>
                            <td><span class="label label-primary">Active</span></td>
                        <?php } else { ?>
                            <td><span  class="label label-danger">Inactive</span></td>
                        <?php } ?>
                          <td> 
                            <?php if ($list['isactive'] == 1) { ?>
                              <a data-toggle="modal" href="#edit_category-<?php echo $list['id'] ?>"><i class="fa fa-pencil" style="color:gray" title="Edit"></i></a>
                            <i title="delete" class="fa fa-trash text-ccc" onclick="delete_sub_category(<?php echo $list['id'] ?>)"></i>
                            <?php } else { ?>
                                <i title="Click me to Re-activate" class="fa fa-history" onclick="delete_sub_category(<?php echo $list['id'] ?>)"></i></td>
                        <?php } ?>

                    </tr>
                <?php } ?>
                </tbody>
            </table>
        
    </div>
</div>
</div>
</div>

<?php
$this->load->view('Assets_Sub_Category/assets_sub_category_add');
$this->load->view('Assets_Sub_Category/assets_sub_category_edit');
?>
<script>
    function delete_sub_category(dId) {
        if (confirm('Are you sure?')) {
            $('#deleteRow_' + dId).remove();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/assets_sub_category_status/' + dId,
                success: function (data) {
                    var parsed = $.parseJSON(data);
                    showSuccess(parsed.content);
                }
            });
            return false;
        }

    }
</script>
