<style>
    .item-table form {
    float: none !important;
    margin-right: 5px;
}
</style>
<?php if(isset($parameter_range_info)){ $parameter_count=0; 
    foreach($parameter_range_info as $key)
    {  
        if($key['isactive']==1){
            $parameter_count++;  
        }
          
    }
}
?> 
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
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter Count : <span><?php echo isset($parameter_count) ? $parameter_count : 0; ?></span></div>
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
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Parameter</th>
                                <th>Minimum value</th>
                                <th>Maximum value</th>
                                <th>Scaling factor</th>                          
                                <th>UOM</th>                          
                                <th>Bits/ sign</th>                          
                                <th>Status</th> 
                                <th>Actions</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($parameter_range_info) && !empty($parameter_range_info)) {
                                $i = 1;
                                foreach ($parameter_range_info as $r) {
                                    ?>
                                    <tr>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $i; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['parameter']; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['min_value'] ? $r['min_value'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['max_value'] ? $r['max_value'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['scaling_factor'] ? $r['scaling_factor'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['uom'] ? $r['uom'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['bits_per_sign'] ? $r['bits_per_sign'] : ""; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['isactive'] == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td class="action">
                                            <form action="" method="post" id="update_param_range<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $r['id']; ?>" name="id"/>
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <?php if($r['isactive'] == 1 && $r['isactive'] != "") { ?>
                                                <a title="Edit" class="manage" id="<?php echo $i; ?>">
                                                    <i class="fa fa-dedent" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Rule"></i>
                                                </a>
                                                <?php } else {?>                                                
                                                <a title="Please first active the asset parameter range" class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please first active the asset parameter range"> <i class="fa fa-dedent not-allowed"></i></a>
                                                <?php } ?>
                                                <a title="Delete" class="delete" id="<?php echo $i; ?>" >
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
                                <tr><td>No data found..!</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="detailsModal" class="modal fade" role="dialog"></div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var update_url = "<?php echo base_url() . 'asset_parameter_update'; ?>";
        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#update_param_range" + id).attr('action', update_url);
            $("#update_param_range" + id).submit();
        });
        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#delete_confirmation").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#update_param_range" + id).attr('action', update_url);
                $("#update_param_range" + id).submit();
            });
        });

        $('body').on('click', '.manage', function () {
            var id = $(this).attr('id');
            var url = "<?php echo base_url() . 'AssetsManagement/asset_rule_list'; ?>";
            $("#post" + id).val('edit');
            $("#update_param_range" + id).attr('action', url);
            $("#update_param_range" + id).submit();
        });
        $('body').on('click', '.flx-item', function (e) {
            if (!$(e.target).hasClass('action')) {
                var id = $(this).attr('data-value');
                if (id.length != 0)
                {
                    $.ajax({
                        url: "<?php echo base_url() . 'AssetsManagement/asset_parameter_range_details'; ?>",
                        method: "POST",
                        data: {param_range_id: id},
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