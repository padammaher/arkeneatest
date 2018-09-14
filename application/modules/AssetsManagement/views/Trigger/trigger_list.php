<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="clearfix"></div>
                <div class="x_content" id="trigger-list">
                    <div class="col-md-12 readonlyinfo">
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Code : <span>DG0001</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Customer Location : <span>Sandton</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Asset Specification : <span>Fuel: diesel HSD</span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Name : <span>Oil pressure</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Rule Description : <span>Extreame Oil Pressure</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Parameter : <span>Pressure</span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Green Value : <span>11 bar</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Orange Value : <span>20 kPa</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Red Value : <span>19 Pa</span></div>
                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Wef Date : <span>09/07/2018</span></div>

                        <div class="col-md-3 col-sm-4 col-xs-12 rdinfo">Trigger Count : <span>2</span></div>
                    </div>				 
                </div>

                <div class="page-title">
                    <div class="title_left">
                        <h4>Trigger List -<span>Rule Name : <span>Oil Pressure</span></span> <span>Parameter : <span>Pressure</span></span> </h4>
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
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#trigger_form_action" + id).val('edit');
//            alert(id);
            $("#trigger_form" + id).submit();
        });
        
                $(".delete").click(function () {
            var flag = confirm('Are you sure you want to delete this item?');
            if (flag == true) {
                var id = $(this).attr('id');
                $("#trigger_form_action" + id).val('delete');
                $("#trigger_form" + id).submit();
            }
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