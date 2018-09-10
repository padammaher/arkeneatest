
        <div class="col-sm-12" style="margin-bottom: 5px;padding-left: 0px;padding-right: 0px;">
           <button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#add-assets"> <i class="fa fa-plus-circle">&nbsp;</i>Add New Assets</button>
        </div>
        <div class="row">
            <div class="col-sm-12">

<div class="main-bg all-padding-15 ">         
            <h4 class="col-sm-12">Assets List by Category </h4>

            <h4 class="col-sm-12"> 
                        <a class="backto pull-left" onclick="goBack()" ><i class="fa fa-mail-reply"></i>Back to sub category's list</a>
                        <a class="backto pull-right" href="<?php echo base_url(); ?>assetsmanagement/assets" ><i class="fa fa-list-ol"></i> All Assets</a>
                    </h4>
            
            

            <?php  $subcatid = $this->uri->segment(3);if ($all_asst_list != NULL) { ?>
                <table id="list-assets-by-subcat" class="table">
                    <thead>
                        <tr> 
                            <th width="20%">Main Category Name</th>
                            <th width="15%">Sub Category Name</th>
                            <th width="45%">Asset Name</th>
                            <th width="2%">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($all_asst_list as $list) {  ?>
                            <?php //var_dump($list); ?>
                            <tr id="deleteRow_<?php echo $list['mid'] ?>">
                                <td> <?php echo $list['ast_main_cat_name'] ?></td>
                                <td> <?php echo $list['ast_sub_cat_name'] ?></td>
                                <td> <?php echo $list['assets_name'] ?></td>
                                <?php if ($list['isactive'] == 1) { ?>
                                    <td><span class="label label-primary">Active</span></td>
                                <?php } else { ?>
                                    <td><span  class="label label-danger">Inactive</span></td>
                                <?php } ?>
                                <td>
                                    <?php if ($list['isactive'] == 1) { ?>
                                        <i title="delete" class="fa fa-trash text-ccc" onclick="delete_assets(<?php echo $list['mid'] ?>)"></i>
                                        <a data-toggle="modal" href="#assets_maintenance-<?php echo $list['mid'] ?>"><i class="fa fa-wrench" style="color:gray" title="Maintenance"></i></a>   
                                        <a id="assets_allocation1" data-toggle="modal" href="#assets_allocation<?php //echo $list['ast_sub_cat_name'] ?>"><i class="fa fa-share" style="color:gray" title="Allocation"></i></a>

                                    <?php } else { ?>
                                        <i title="Click me to Re-activate" class="fa fa-history" onclick="delete_assets(<?php echo $list['mid'] ?>)"></i></td>
                                <?php } ?>
                            </tr>
                        <input type="hidden" name="maincatname" id="maincatname" value="<?php echo $list['ast_main_cat_name'] ?>"/>
                        <input type="hidden" name="subcatname" id="subcatname" value="<?php echo $list['ast_sub_cat_name'] ?>"/>
                        <input type="hidden" name="maincatid" id="maincatid" value="<?php echo $list['ast_main_cat_id'] ?>"/>
                        <input type="hidden" name="subcatid" id="subcatid" value="<?php echo $list['ast_sub_cat_id'] ?>"/>
                        <input type="hidden" name="assetname" id="assetname" value="<?php echo $list['assets_name'] ?>"/>
                        <input type="hidden" name="assetnameid" id="assetnameid" value="<?php echo $list['mid'] ?>"/>
                    <?php } ?>
                    </tbody>
                </table>   

            <?php } else { ?>
                <input type="hidden" name="maincatname" id="maincatname" value="<?php echo $all_main_cat['ast_main_cat_name'] ?>"/>
                <input type="hidden" name="subcatname" id="subcatname" value="<?php echo $all_main_cat['ast_sub_cat_name'] ?>"/>
                <input type="hidden" name="maincatid" id="maincatid" value="<?php echo $all_main_cat['mcid'] ?>"/>
                <input type="hidden" name="subcatid" id="subcatid" value="<?php echo $all_main_cat['id'] ?>"/>
                <div class="midtext">
                    <h1> <b><?php echo 'Nothing to Show.';
        }
            ?></b></h1>                             
            </div>​
       
</div> 
            </div>
        </div>

<?php
$this->load->view('Assets/assets_add');
//$this->load->view('Assets/assets_edit');
$this->load->view('Maintenance/assets_maintenance');
//$this->load->view('Maintenance/add_maintenance');
$this->load->view('Assets_Allocation/assets_allocation');
?>
<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>
<script>
    var maincatname = $("#maincatname").val();
    var subcatname = $("#subcatname").val();
    var maincatid = $("#maincatid").val();
    var subcatid = $("#subcatid").val();
    var assetname = $("#assetname").val();
    var assetnameid = $("#assetnameid").val();
    var for_redirect = "for_redirect";
    $('#add-assets').on('show.bs.modal', function (e) {
        $(e.currentTarget).find('input[name="ast_subcatname"]').val(subcatname);
        $(e.currentTarget).find('input[name="ast_maincatname"]').val(maincatname);
        $(e.currentTarget).find('input[name="ast_main_cat_id"]').val(maincatid);
        $(e.currentTarget).find('input[name="ast_sub_cat_id"]').val(subcatid);
        $(e.currentTarget).find('input[name="for_redirect"]').val(for_redirect);
    });
    
      $('#assets_allocation').on('show.bs.modal', function (e) {
        $(e.currentTarget).find('input[name="ast_subcatname"]').val(subcatname);
        $(e.currentTarget).find('input[name="ast_maincatname"]').val(maincatname);
        $(e.currentTarget).find('input[name="ast_main_cat_id"]').val(maincatid);
        $(e.currentTarget).find('input[name="ast_sub_cat_id"]').val(subcatid);
        $(e.currentTarget).find('input[name="assets_name"]').val(assetname);
        $(e.currentTarget).find('input[name="ast_name_id"]').val(assetnameid);

    });
</script>
<script>
    function delete_assets(dId) {
        if (confirm('Are you sure?')) {
            $('#deleteRow_' + dId).remove();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/assets_status/' + dId,
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
<script>
    function goBack() {
        window.history.back();
    }
</script>

