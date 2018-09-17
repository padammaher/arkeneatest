<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="clearfix"></div>
                <div class="x_content">
                    <div class="col-md-12 readonlyinfo">
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Code : <span><?php echo isset($asset_details[0]['code']) ? $asset_details[0]['code'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Customer Location : <span><?php echo isset($asset_details[0]['location']) ? $asset_details[0]['location'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Category : <span><?php echo isset($asset_details[0]['assetcategoryname']) ? $asset_details[0]['assetcategoryname'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Type : <span><?php echo isset($asset_details[0]['assettypename']) ? $asset_details[0]['assettypename'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Specification : <span><?php echo isset($asset_details[0]['specification']) ? $asset_details[0]['specification'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Serial No. : <span><?php echo isset($asset_details[0]['serial_no']) ? $asset_details[0]['serial_no'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Make : <span><?php echo isset($asset_details[0]['make']) ? $asset_details[0]['make'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Model No. : <span><?php echo isset($asset_details[0]['model']) ? $asset_details[0]['model'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Description : <span><?php echo isset($asset_details[0]['description']) ? $asset_details[0]['description'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Movable / Immovable : <span><?php echo isset($asset_details[0]['ismovable']) && $asset_details[0]['ismovable'] == 1 ? 'Movable' : 'Immovable'; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter Count : <span><?php echo isset($parameter_range_info) ? count($parameter_range_info) : 0; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo"></div>
                    </div>				 
                </div>

                <div class="page-title">
                    <div class="title_left">
                        <h4>Asset Parameter Range List</h4>
                    </div>

                    <div class="title_right">
                        <div class="pull-right">
                            <a href="<?php echo base_url() . 'Assets_list'; ?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Asset Management</a>

                            <a href="<?php echo base_url() . 'asset_parameter_add'; ?>" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add Parameter Range</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="x_content" id="assets-parameter-list">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Parameter <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Minimum value <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Maximum value <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Scaling factor <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">UOM <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Bits/ sign <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Actions <i class="fa fa-fw fa-sort"></i></li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (isset($parameter_range_info) && !empty($parameter_range_info)) {
                        $i = 1;
                        foreach ($parameter_range_info as $r) {
                            ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">
                                        <li class="flex-item"><?php echo $i; ?></li>
                                        <li class="flex-item"><?php echo $r['parameter']; ?></li>
                                        <li class="flex-item"><?php echo $r['min_value'] ? $r['min_value'] : ""; ?></li>
                                        <li class="flex-item"><?php echo $r['max_value'] ? $r['max_value'] : ''; ?></li>
                                        <li class="flex-item"><?php echo $r['scaling_factor'] ? $r['scaling_factor'] : ''; ?></li>
                                        <li class="flex-item"><?php echo $r['uom'] ? $r['uom'] : ''; ?></li>
                                        <li class="flex-item"><?php echo $r['bits_per_sign'] ? $r['bits_per_sign'] : ''; ?></li>
                                        <li class="flex-item">
                                            <form action="" method="post" id="update_param_range<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $r['id']; ?>" name="id"/>
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <a title="Delete" class="delete" id="<?php echo $i; ?>" >
                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                </a> 
                                                <a title="Edit" class="manage" id="<?php echo $i; ?>">
                                                    <i class="fa fa-dedent" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Rule"></i>
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
                                <ul class="flex-container flex-item_row nowrap">
                                    <li class="flex-item" style="text-align: center;">No data found..!</li>                    
                                </ul>
                            </div>
                        </div>
                    <?php }
                    ?>

                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var update_url = "<?php echo base_url() . 'asset_parameter_update'; ?>";
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#update_param_range" + id).attr('action', update_url);
            $("#update_param_range" + id).submit();
        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#update_param_range" + id).attr('action', update_url);
                $("#update_param_range" + id).submit();
            });
        });

        $(".manage").click(function () {
            var id = $(this).attr('id');
            var url = "<?php echo base_url() . 'AssetsManagement/asset_rule_list'; ?>";
            $("#post" + id).val('edit');
            $("#update_param_range" + id).attr('action', url);
            $("#update_param_range" + id).submit();
        });
    });
</script>