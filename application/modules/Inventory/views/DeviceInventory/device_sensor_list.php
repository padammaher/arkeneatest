          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Device-Sensor List</h4>
              </div>

              <div class="title_right">
                <div class="pull-right">
                 <a href="<?php echo base_url('Add_device_sensors');?>" class="btn btn-sm btn-primary">Add New</a>
                  <a href="<?php echo base_url('Device_inventory_list');?>" class="btn btn-sm btn-primary">Device Inventory</a>
                   <a href="<?php echo base_url('Device_assets_list');?>" class="btn btn-sm btn-primary">Device Asset</a>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
			<div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content" id="sensor-inventory-list">
                    
					<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <ul class="flex-container flex-container-head nowrap">
								        <li class="flex-item">Device ID</li>
                        <li class="flex-item">Sensor ID</li>
                        <li class="flex-item">Actions</li>
								</ul>
                        </div>
                        </div>
<?php $i=1; if(!empty($device_sensors_list)){ foreach ($device_sensors_list as $device_sen_list)  { 
    ?>						
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="flex-container nowrap">
                            <li class="flex-item"><?php echo $device_sen_list['number'];?></li>
                    <li class="flex-item"><?php echo $device_sen_list['sensor_no'];?></li>
                    <li class="flex-item">
                        
             <form action="<?php echo base_url(); ?>Edit_device_sensors" method="post" id="updateasset<?php echo $i; ?>">
                <input type="hidden" value="<?php echo $device_sen_list['id']; ?>" name="id"/>
                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                </a>
                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                </a> 
            </form>                       
                        
<!--<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Edit_device_sensors">   
     <input type="hidden" name="sensor_form_action" id="sensor_form_action" value="edit <?php echo $device_sen_list['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_dev_sen_button" id="edit_inventory_button" >
         <i class="fa fa-pencil success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
     </button> </form>                           
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Sensor_inventory_list">   
     <input type="hidden" name="sensor_form_action" id="sensor_form_action" value="delete <?php echo $device_sen_list['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_dev_sen_button" id="edit_inventory_button" >
         <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
     </button> </form>                                                                      -->
                    </li>
                    </ul>
            </div>
             </div>

<?php $i++; } }else { ?>

						
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul class="flex-container nowrap">
								    <li class="flex-item">No data found..!</li>                    
                    
								</ul>
							</div>
             </div>
                           
 <?php } ?> 
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
            $("#post" + id).val('edit');
//            alert(id);
            $("#updateasset" + id).submit();
        });
        
                $(".delete").click(function () {
            var flag = confirm('Are you sure you want to delete this item?');
            if (flag == true) {
                var id = $(this).attr('id');
                $("#post" + id).val('delete');
                $("#updateasset" + id).submit();
            }
        });
    });
</script>