<!-- page content -->
<!--<div class="right_col" role="main">-->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Asset Category</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>addAssetCategory" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="asset-category-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr.No</th>
                                <th>Asset Category</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($asset_categories) && !empty($asset_categories)) {
                                $i = 1;
                                foreach ($asset_categories as $r) {
                                    ?>
                                    <tr>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $i; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['name']; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['description'] ? $r['description'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['isactive'] == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td class="action">
                                            <form action="<?php echo base_url(); ?>updateAssetCategory" method="post" id="updateasset<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $r['id']; ?>" name="id"/>
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                </a> 
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                            <td colspan="7">No data found..!</td>           
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<div id="detailsModal" class="modal fade" role="dialog"></div>
<?php // echo $this->load->view('master/modal/assetcategory');          ?>

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updateasset" + id).submit();
        });
        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#delete_confirmation").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#updateasset" + id).submit();
            });
        });
        $('body').on('click', '.flx-item', function (e) {
//    $("#datatable td").click(function (e) {
            if (!$(e.target).hasClass('action')) {
                var id = $(this).attr('data-value');
                if (id.length !== 0)
                {
                    $.ajax({
                        url: "<?php echo base_url() . 'Master/assetmaster/asset_category_details'; ?>",
                        method: "POST",
                        data: {category_id: id},
                        dataType: "html",
                        success: function (data) {
                            $("#detailsModal").html(data);
                            $('#detailsModal').modal('show');
                        }
                    });
                }
            }
        });
    });
</script>
<!-- /page content -->