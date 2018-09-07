<div class="white-bg all-padding-15 ">
    <div class="col-sm-12">
        <div class="leave-heading">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;Assets Sub Category Type
                <div class="pull-right">
                </div>
            </h4>
           <div class="col-sm-12" style="margin-bottom: 5px;padding-left: 0px;padding-right: 0px;">
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#add_assets_sub_category"> <i class="fa fa-plus-circle">&nbsp;</i>Add New Sub Category</button>
            </div>
        </div>
        <div class="col-md-12">
            <table id="ast-sub-list" class="table">
                <thead>
                    <tr> 
                        <th width="80%">Category Name</th>
                        <th width="2%">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($list_sub_category as $list) { ?>
                    <tr id="deleteRow_<?php echo $list['id'] ?>">
                        <td> <?php echo $list['ast_sub_cat_name'] ?></td>

                        <?php if ($list['isactive'] == 1) { ?>
                            <td><span class="label label-primary" title="I am already activate!">Active</span></td>
                        <?php } else { ?>
                            <td><span  class="label label-danger" >Inactive</span></td>
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
                    //showSuccess("Record deleted successfully");
                }
            });
            return false;
        }

    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>
<?php
$this->load->view('Assets_Sub_Category/assets_sub_category_add');
$this->load->view('Assets_Sub_Category/assets_sub_category_edit');
?>