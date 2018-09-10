<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Device Inventory</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">

                <a href="<?php echo base_url('Device_inventory_add'); ?>" class="btn btn-sm btn-primary">Add New</a>
                <a href="<?php echo base_url('Sensor_inventory_list'); ?>" class="btn btn-sm btn-primary">Device Sensor</a>
                <a href="<?php echo base_url('Device_assets_list'); ?>" class="btn btn-sm btn-primary">Device Asset</a>
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

                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Device_Num</li>
                                <li class="flex-item">Asset ID</li>


                                <li class="flex-item">Serial_No</li>
                                <li class="flex-item">Make</li>
                                <li class="flex-item">Model</li>

                                <li class="flex-item">Description</li>

                                <li class="flex-item">GSM Number</li>


                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row clearfix">
<?php
$srno = 1;
foreach ($Device_inventory_list_data as $InventoryListRowData) {
    ?>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <ul class="flex-container nowrap">

                                                <li class="flex-item"><?php echo $srno++; ?></li>
                                                <li class="flex-item"><?php echo $InventoryListRowData['number']; ?></li>
                                                <li class="flex-item"><?php echo $InventoryListRowData['serial_no']; ?></li>

                                                <li class="flex-item"><?php echo $InventoryListRowData['serial_no']; ?></li>


                                                <li class="flex-item"><?php echo $InventoryListRowData['make']; ?></li>
                                                <li class="flex-item"><?php echo $InventoryListRowData['model']; ?></li>


                                                <li class="flex-item"><?php echo $InventoryListRowData['description']; ?></li>

                                                <li class="flex-item"><?php echo $InventoryListRowData['communication_type']; ?></li>

                                                <li class="flex-item">
 <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_inventory_edit">   
     <input type="hidden" name="dev_inv_id" id="dev_inv_id" value="<?php echo $InventoryListRowData['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="edit_inventory_button" id="edit_inventory_button" >
         <i class="fa fa-pencil success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
     </button> </form>           
<form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_inventory_list">                                                       
<input type="hidden" name="dev_inv_id" id="dev_inv_id" value="delete <?php echo $InventoryListRowData['id']; ?>" >    
     <button type="submit" class="btn btn-primary" name="delete_inventory_button" id="edit_inventory_button" >
         <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
     </button>                                                    

                                                    <a href="device-sensors-edit.html" >
                                                        <i class="fa fa-dashboard text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Manage Device Sensor"></i> 
                                                </a> 
                                                <a href="device-assets-edit.html" title="Manage Users">
                                                    <i class="fa fa-gears text-warning" data-toggle="tooltip" data-placement="top" title="" data-orignal-title="Manage Device Assets"></i> 
                                            </a>
 </form>                                                    
                                        </li>
</ul>
                        </div>
<?php }       ?></div>
                </div>
            </div>
        </div>


    </div>