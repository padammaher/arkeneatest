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

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Asset Category</li>
                                <li class="flex-item">Description</li>
                                <!--<li class="flex-item">Status</li>-->
                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (isset($asset_categories) && !empty($asset_categories)) {
                        $i = 1;
                        foreach ($asset_categories as $r) {
                            ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $i; ?></li>
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['name']; ?></li>
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['description'] ? $r['description'] : ""; ?></li>
                                        <!--<li class="flex-item"><?php echo $r['isactive'] == 1 ? 'Active' : 'Deactive'; ?></li>-->
                                        <li class="flex-item">
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

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    } else {
                        ?>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="flex-container nowrap">
                                    <li class="flex-item" style="text-align: center;">No data found..!</li>                    
                                </ul>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<div id="detailsModal" class="modal fade" role="dialog"></div>
<?php // echo $this->load->view('master/modal/assetcategory'); ?>

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updateasset" + id).submit();
        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $("#delete_confirmation").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#updateasset" + id).submit();
            });
        });
        $(".flex-item").click(function (e) {
            if (!$(e.target).hasClass('fa')) {
                var id = $(this).attr('data-value');
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
        });
    });
</script>
<!-- /page content -->