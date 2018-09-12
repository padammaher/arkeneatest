 <?php //echo form_open('', array('id' => 'form_ast_main_cat_list_id', 'class' => 'form_ast_main_cat_list')); ?>
<div class="white-bg all-padding-15 ">
    <div class="col-sm-12">
        <div class="leave-heading">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;Assets Main Category List
                <div class="pull-right">
                </div>
            </h4>
            <div class="col-sm-12 text-right">
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#add_assets_main_category"> <i class="fa fa-plus-circle">&nbsp;</i>Add Main Category</button>
            </div>
        </div>
        <div class="col-md-12">
            <table id="ast-main-list" class="table">
                <thead>
                    <tr> 
                        <th width="20%">Category Name</th>
                        <th width="60%">Assets Image</th>
                        <th width="2%">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($list_main_category as $list) { ?>
                    <tr id="deleteRow_<?php echo $list['id'] ?>">
                        <td> <?php echo $list['ast_main_cat_name'] ?></td>
                        <td> <?php echo $list['assets_img'] ?></td>

                        <?php if ($list['isactive'] == 1) { ?>
                            <td><span class="label label-primary" title="I am already activate!">Active</span></td>
                        <?php } else { ?>
                            <td><span  class="label label-danger" >Inactive</span></td>
                        <?php } ?>
                        <td> <?php if ($list['isactive'] == 0) { ?>
                        <?php } else { ?>
                            <a data-toggle="modal" href="#edit_category<?php echo $list['id'] ?>"><i class="fa fa-pencil" style="color:gray" title="Edit"></i></a>
                        <?php } ?>
                        <?php if ($list['isactive'] == 1) { ?>
                            <i title="delete" class="fa fa-trash text-ccc" onclick="delete_category(<?php echo $list['id'] ?>)"></i>
                        <?php } else { ?>
                            <i title="Click me to Re-activate" class="fa fa-history" onclick="delete_category(<?php echo $list['id'] ?>)"></i></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php echo form_close() ?>
<script>
    function delete_category(dId) {
        if (confirm('Are you sure?')) {
            $('#deleteRow_' + dId).remove();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/asstes_main_category_status/' + dId,
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
$this->load->view('Assests_Main_Category/Main_category_add');
$this->load->view('Assests_Main_Category/Main_category_edit');
?>







