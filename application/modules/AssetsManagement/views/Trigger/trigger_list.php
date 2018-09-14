<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="clearfix"></div>
                <div class="x_content" id="trigger-list">
                    <div class="col-md-12 readonlyinfo">
                        
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Code : <span><?php echo isset($header_desc[0]['code']) ? $header_desc[0]['code'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Customer Location : <span><?php echo isset($header_desc[0]['location']) ? $header_desc[0]['location'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Specification : <span><?php echo isset($header_desc[0]['specification']) ? $header_desc[0]['specification'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Name : <span><?php echo isset($header_desc[0]['rule_name']) ? $header_desc[0]['rule_name'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Description : <span><?php echo isset($header_desc[0]['rule_des']) ? $header_desc[0]['rule_des'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter : <span><?php echo isset($header_desc[0]['parameter_name']) ? $header_desc[0]['parameter_name'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Green Value : <span><?php echo isset($header_desc[0]['green_value']) ? $header_desc[0]['green_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Orange Value : <span><?php echo isset($header_desc[0]['orange_value']) ? $header_desc[0]['orange_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Red Value : <span><?php echo isset($header_desc[0]['red_value']) ? $header_desc[0]['red_value'] : ''; ?></span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Wef Date : <span><?php echo isset($header_desc[0]['wef_date']) ? $header_desc[0]['wef_date'] : ''; ?></span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Trigger Count : <span><?php echo isset($header_desc[0]['trigger_threshold_id_count']) ? $header_desc[0]['trigger_threshold_id_count'] : ''; ?></span></div>
                    </div>				 
                </div>

                <div class="page-title">
                    <div class="title_left">
                        <h4>Trigger List -<span>Rule Name : <span><?php echo isset($header_desc[0]['rule_name']) ? $header_desc[0]['rule_name'] : ''; ?></span></span> <span>Parameter : <span><?php echo isset($header_desc[0]['parameter_name']) ? $header_desc[0]['parameter_name'] : ''; ?></span></span> </h4>
                    </div>

                    <div class="title_right">
                        <div class="pull-right">
                            <a href="<?php echo base_url('Assets_list');?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Asset Management</a>
                            <a href="<?php echo base_url('asset_parameter_range_list');?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Asset Parameter Range List</a>
                            <a href="<?php echo base_url('AssetsManagement/asset_rule_list');?>" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Rule & Action Master List</a>
                            <a class="btn btn-sm btn-primary trigger_add"> <i class="fa fa-plus"></i> Add Trigger</a>
                        </div>
                    </div>
                </div>

                <div class="x_content" id="trigger-list">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Alarm Trigger Name <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Trigger Threshold <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Email <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">SMS <i class="fa fa-fw fa-sort"></i></li>
                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
<?php $i=1;
if (!empty($trigger_list)){ foreach ($trigger_list as $trigger_list_data) { ?>
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-item_row nowrap">
                                <li class="flex-item"><?php echo $i;?></li>
                                <li class="flex-item"><?php echo ($trigger_list_data['trigger_name'])== ''? '<i class="fa fa-times" aria-hidden="true"></i>':$trigger_list_data['trigger_name']; ?></li>
                                <li class="flex-item"><?php echo ($trigger_list_data['trigger_threshold_id'])== ''? '<i class="fa fa-times" aria-hidden="true"></i>':$trigger_list_data['trigger_threshold_id']; ?></li>
                                <li class="flex-item"><?php echo ($trigger_list_data['email'])== ''? '<i class="fa fa-times" aria-hidden="true"></i>':$trigger_list_data['email'];?> </li>
                                <li class="flex-item"><?php echo ($trigger_list_data['sms_contact_no'])== ''? '<i class="fa fa-times" aria-hidden="true"></i>':$trigger_list_data['sms_contact_no'];?></li>
                                <li class="flex-item">
                                    
            <form action="<?php echo base_url(); ?>trigger_add" method="post" id="trigger_form<?php echo $i; ?>">
                <input type="hidden" id="triggerid<?php echo $i; ?>" value="<?php echo $trigger_list_data['id']; ?>" name="trigger_post_id"/>
                <input type="hidden" name="trigger_form_action" id="trigger_form_action<?php echo $i; ?>"/>
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
<?php $i++; } }else{ ?>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-item_row nowrap">
                                
                                <li class="flex-item">data not found..!</li>
                                
                                
                            </ul>
                        </div>
                    </div>
<?php } ?>
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
    var update_url = "<?php echo base_url() . 'trigger_form'; ?>";
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#trigger_form_action" + id).val('edit');
//            alert(id);
            $("#trigger_form" + id).submit();
        });
        
//                $(".delete").click(function () {
//            var flag = confirm('Are you sure you want to delete this item?');
//            if (flag == true) {
//                var id = $(this).attr('id');
//                $("#trigger_form_action" + id).val('delete');
//                $("#trigger_form" + id).submit();
//            }
//        });
        
         $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#trigger_form_action" + id).val('delete');
//                $("#update_param_range" + id).attr('action', update_url);
                $("#trigger_form" + id).submit();
            });
        });
        
        
         $(".trigger_add").click(function () {
           
                var id = 1;
                $("#trigger_form_action"+id).val('addNew');
                $("#triggerid"+id).val('');
//                alert($("#triggerid"+id).val());
                $("#trigger_form" + id).submit();
           
        }); 
      });
        
</script>        