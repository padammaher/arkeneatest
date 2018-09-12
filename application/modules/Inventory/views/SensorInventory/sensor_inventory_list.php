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
                  
                  <div class="x_content">
                    
					<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <ul class="flex-container flex-container-head nowrap">
								        <li class="flex-item">Device ID</li>
                        <li class="flex-item">Sensor ID</li>
                        <li class="flex-item">Actions</li>
								</ul>
                        </div>
                        </div>
<?php  if(!empty($sensor_inventory_list)){ foreach ($sensor_inventory_list as $inventory_list)  { 
    ?>						
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="flex-container nowrap">
                            <li class="flex-item"><?php echo $inventory_list['number'];?></li>
                    <li class="flex-item"><?php echo $inventory_list['sensor_id'];?></li>
                    <li class="flex-item">
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Edit_device_sensors">   
     <input type="hidden" name="sensor_form_action" id="sensor_form_action" value="edit <?php echo $inventory_list['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_dev_sen_button" id="edit_inventory_button" >
         <i class="fa fa-pencil success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
     </button> </form>                           
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Sensor_inventory_list">   
     <input type="hidden" name="sensor_form_action" id="sensor_form_action" value="delete <?php echo $inventory_list['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_dev_sen_button" id="edit_inventory_button" >
         <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
     </button> </form>                                                                      
                    </li>
                    </ul>
            </div>
             </div>

<?php } }else { ?>

						
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