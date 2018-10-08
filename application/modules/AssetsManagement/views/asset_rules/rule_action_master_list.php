<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="clearfix">
                </div>
                <div class="x_content">
                    <div class="col-md-12 readonlyinfo">
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Code : 
                            <span><?php echo (isset($parameter_detail[0]['code'])) ? $parameter_detail[0]['code'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Customer Location : 
                            <span><?php echo (isset($parameter_detail[0]['location'])) ? $parameter_detail[0]['location'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Specification : 
                            <span><?php echo (isset($parameter_detail[0]['specification'])) ? $parameter_detail[0]['specification'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter : 
                            <span><?php echo (isset($parameter_detail[0]['param_name'])) ? $parameter_detail[0]['param_name'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Minimum value : 
                            <span><?php echo (isset($parameter_detail[0]['min_value'])) ? $parameter_detail[0]['min_value'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Maximum value : 
                            <span><?php echo (isset($parameter_detail[0]['max_value'])) ? $parameter_detail[0]['max_value'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Scaling factor : 
                            <span><?php echo (isset($parameter_detail[0]['scaling_factor'])) ? $parameter_detail[0]['scaling_factor'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">UOM : 
                            <span><?php echo (isset($parameter_detail[0]['uom_name'])) ? $parameter_detail[0]['uom_name'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Bits/ sign : 
                            <span><?php echo (isset($parameter_detail[0]['bits_per_sign'])) ? $parameter_detail[0]['bits_per_sign'] : ''; ?> 
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">
                        </div>
                    </div>				 
                </div>
                <div class="page-title">
                    <div class="title_left">
                        <h4>Rule & Action Master List - 
                            <span>Parameter : 
                                <span><?php echo (isset($parameter_detail[0]['param_name'])) ? $parameter_detail[0]['param_name'] : ''; ?>
                                </span>
                            </span> 
                        </h4>
                    </div>
                    <div class="title_right">
                        <div class="pull-right">
                            <a href="<?php echo base_url() . 'Assets_list'; ?>" class="btn btn-sm btn-primary"> 
                                <i class="fa fa-arrow-left">
                                </i> Asset Management
                            </a>
                            <a href="<?php echo base_url() . "asset_parameter_range_list"; ?>" class="btn btn-sm btn-primary"> 
                                <i class="fa fa-arrow-left">
                                </i> Asset Parameter Range List
                            </a>
                            <?php
                            if (isset($permission) && !empty($permission)) {
                                if ($permission[0]->addpermission == 1) {
                                    ?>
                                    <a href="<?php echo base_url(); ?>Asset_Rule" class="btn btn-sm btn-primary"> 
                                        <i class="fa fa-plus">
                                        </i> Add Rule
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="x_content" id="rule-action-master">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr>
                                <th>Rule No</th>
                                <th>Rule Name</th>
                                <th>Parameter</th>
                                <th>Green Value</th>
                                <th>Orange Value</th>                          
                                <th>Red Value</th>                          
                                <th>Wef Date</th>                          
                                <th>Trigger Count</th>
                                <th>Status</th>
                                <?php
                                if (isset($permission) && !empty($permission)) {
                                    if ($permission[0]->editpermission == 1 || $permission[0]->deletepermission == 1) {
                                        ?>
                                        <th>Actions</th>      
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!--                        <div class="row clearfix">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                                            <ul class="flex-container flex-container-head nowrap">
                                                                <li class="flex-item">Rule No 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Rule Name 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Parameter 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Green Value 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Orange Value 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Red Value 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Wef Date 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Trigger Count 
                                                                    <i class="fa fa-fw fa-sort">
                                                                    </i>
                                                                </li>
                                                                <li class="flex-item">Actions
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>-->
                            <?php
                            if ($asset_list) {
                                $i = 1;
                                foreach ($asset_list as $key => $asset_rule) {
                                    ?> 
                                    <tr>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $i; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['rule_name'])) ? $asset_rule['rule_name'] : ''; ?> </td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['pararameter_name'])) ? $asset_rule['pararameter_name'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['green_value'])) ? $asset_rule['green_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['orange_value'])) ? $asset_rule['orange_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['red_value'])) ? $asset_rule['red_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['wef_date'])) ? $asset_rule['wef_date'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['triger_count'])) ? $asset_rule['triger_count'] : ''; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo (isset($asset_rule['rule_status'])) ? ($asset_rule['rule_status'] == 1) ? 'Active' : 'In-active' : ''; ?></td>
                                        <?php
                                        if (isset($permission) && !empty($permission)) {
                                            if ($permission[0]->editpermission == 1 || $permission[0]->deletepermission == 1) {
                                                ?>
                                                <td class="flex-item">
                                                    <form name="edit_asset_rule" id="edit_asset_rule<?php echo $i; ?>" method="post" action="<?php echo base_url(); ?>Asset_Rule">
                                                        <?php
                                                        if (isset($permission) && !empty($permission)) {
                                                            if ($permission[0]->editpermission == 1) {
                                                                ?>
                                                                <a  class="edit_asset" id="<?php echo $i; ?>">    
                                                                    <input type="hidden" name="asset_rule_id" id="asset_rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i> 
                                                                </a>  
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </form> 
                                                    <form name="triggerlistewrwer" id="triggerlist<?php echo $i; ?>" method="post" action="<?php echo base_url(); ?>trigger_list">
                                                        <a class="trigger_data" id="<?php echo $i; ?>">
                                                            <input type="hidden" name="rule_id" id="rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                            <i class="fa fa-podcast" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Trigger"></i> 
                                                        </a>
                                                    </form> 
                                                    <form name="delete_asset_rule" id="delete_asset_rule<?php echo $i; ?>"  method="post" action="<?php echo base_url(); ?>Delete_Rule">
                                                        <?php
                                                        if (isset($permission) && !empty($permission)) {
                                                            if ($permission[0]->deletepermission == 1) {
                                                                ?>
                                                                <a  class="delete_asset" id="<?php echo $i; ?>">
                                                                    <input type="hidden" name="asset_rule_id" id="asset_rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" ata-original-title="Delete"></i>
                                                                </a>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </form> 
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <!--                                <div class="row clearfix">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <ul class="flex-container flex-item_row nowrap opendialog<?php echo $i; ?>">
                                                                                <li class="flex-item"><?php echo $i; ?> 
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['rule_name'])) ? $asset_rule['rule_name'] : ''; ?> 
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['pararameter_name'])) ? $asset_rule['pararameter_name'] : ''; ?> 
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['green_value'])) ? $asset_rule['green_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?>
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['orange_value'])) ? $asset_rule['orange_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?>
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['red_value'])) ? $asset_rule['red_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? '  ' . $asset_rule['uom_name'] : ''; ?>
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['wef_date'])) ? $asset_rule['wef_date'] : ''; ?>
                                                                                </li>
                                                                                <li class="flex-item"><?php echo (isset($asset_rule['triger_count'])) ? $asset_rule['triger_count'] : ''; ?>
                                                                                </li>
                                                                                <li class="flex-item">
                                                                                    <form name="edit_asset_rule" id="edit_asset_rule<?php echo $i; ?>" method="post" action="<?php echo base_url(); ?>Asset_Rule">
                                                                                        <a  class="edit_asset" id="<?php echo $i; ?>">    
                                                                                            <input type="hidden" name="asset_rule_id" id="asset_rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                                                            <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i> 
                                                                                        </a>  
                                                                                    </form> 
                                                                                    <form name="triggerlistewrwer" id="triggerlist<?php echo $i; ?>" method="post" action="<?php echo base_url(); ?>trigger_list">
                                                                                        <a class="trigger_data" id="<?php echo $i; ?>">
                                                                                            <input type="hidden" name="rule_id" id="rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                                                            <i class="fa fa-podcast" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Trigger"></i> 
                                                                                        </a>
                                                                                    </form> 
                                                                                    <form name="delete_asset_rule" id="delete_asset_rule<?php echo $i; ?>"  method="post" action="<?php echo base_url(); ?>Delete_Rule">
                                                                                        <a  class="delete_asset" id="<?php echo $i; ?>">
                                                                                            <input type="hidden" name="asset_rule_id" id="asset_rule_id" value="<?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?>">
                                                                                            <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" ata-original-title="Delete"></i>
                                                                                        </a>
                                                                                    </form> 
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>-->






                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                            <td colspan="9">No data found..!</td> 
                        <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($asset_list) {
                        $i = 1;
                        foreach ($asset_list as $key => $asset_rule) {
                            ?> 
                            <!-- -----------------------modal //////////////////////////////-->
                            <div id="detailsModal<?php echo $i; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Asset Rules Details</h4>
                                        </div>
                                        <div class="modal-body">

                                            <table class="table table-bordered">                      
                                                <tbody>
<!--                                                    <tr>
                                                        <td width="" class="lft-td">Rule No.</td>
                                                        <td><?php echo ($asset_rule['id']) ? $asset_rule['id'] : ''; ?> </td>
                                                    </tr>-->
                                                    <tr>
                                                        <td width="" class="lft-td">Rule Name</td>
                                                        <td><?php echo (isset($asset_rule['rule_name'])) ? $asset_rule['rule_name'] : ''; ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Rule Description</td>
                                                        <td><?php echo (isset($asset_rule['rule_des'])) ? $asset_rule['rule_des'] : ''; ?> .</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Parameter</td>
                                                        <td><?php echo (isset($asset_rule['parameter'])) ? $asset_rule['parameter'] : ''; ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td width="" class="lft-td">Green Value</td>
                                                        <td><?php echo (isset($asset_rule['green_value'])) ? $asset_rule['green_value'] : ''; ?> <?php echo (isset($asset_rule['uom_name'])) ? $asset_rule['uom_name'] : ''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Orange Value</td>
                                                        <td><?php echo (isset($asset_rule['orange_value'])) ? $asset_rule['orange_value'] : ''; ?> <?php echo (isset($asset_rule['uom_name'])) ? $asset_rule['uom_name'] : ''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Red Value</td>
                                                        <td><?php echo (isset($asset_rule['red_value'])) ? $asset_rule['red_value'] : ''; ?><?php echo (isset($asset_rule['uom_name'])) ? $asset_rule['uom_name'] : ''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Wef Date</td>
                                                        <td><?php echo (isset($asset_rule['wef_date'])) ? $asset_rule['wef_date'] : ''; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="" class="lft-td">Trigger Count</td>
                                                        <td><?php echo (isset($asset_rule['triger_count'])) ? $asset_rule['triger_count'] : ''; ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <script>
                                $(".flex-item<?php echo $i; ?>").click(function (e) {
                                    if (!$(e.target).hasClass('fa')) {
                                        $('#detailsModal<?php echo $i; ?>').modal('show');
                                    }
                                });

                                $(".flex-container-head .flex-item").click(function () {
                                    $('#detailsModal<?php echo $i; ?>').modal('hide');
                                });
                            </script>
                            <!-- ///////////////////End Modal //////////////////////////////-->
                            <?php
                        $i++;
                            
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
    <script type="text/javascript">
                        $(document).ready(function () {
                            $(".edit_asset").click(function () {
                                var id = $(this).attr('id');
                                $("#post" + id).val('edit');
                                $("#edit_asset_rule" + id).submit();
                            });
                            $(".delete_asset").click(function () {
                                var id = $(this).attr('id');

                                $("#delete_confirmation").modal('show');
                                $(".ok").click(function () {
                                    // $("#post" + id).val('delete');
                                    $("#delete_asset_rule" + id).submit();
                                });
                            });

                            $(".trigger_data").click(function () {
                                var id = $(this).attr('id');
                                $("#post" + id).val('edit');
                                $("#triggerlist" + id).submit();
                            });

                        });
    </script>

    <style>
        .flex-item form {
            float:left; 

        }

    </style>