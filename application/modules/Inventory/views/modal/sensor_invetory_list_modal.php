<?php $srno = 1;
foreach ($sensor_inventory_list as $list) { ?>     
    <!-- Modal -->
    <div id="sensor_inv_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sensor Inventory Details</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered">                      
                        <tbody>

    <!--                        <tr>
       <td width="" class="lft-td">Sr No.</td>
       <td><?php echo $srno; ?></td>
     </tr>-->
                            <tr>
                                <td class="lft-td">Sensor Number</td>
                                <td><?php echo $list['sensor_no'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Sensor Type</td>
                                <td><?php echo $list['sensor_type_tbl_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Make</td>
                                <td><?php echo $list['make'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Model</td>
                                <td><?php echo $list['model'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Description</td>
                                <td><?php echo $list['description'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Parameter</td>
                                <td><?php echo $list['name'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Customer Location</td>
                                <td><?php echo (isset($list['location_name'])) ? $list['location_name'] : ''; ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">UOM Type</td>
                                <td><?php echo $list['uom_type_tbl_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">UOM</td>
                                <td><?php echo $list['uom_name'] ?></td>
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

    <!-- Model end  -->
<?php } ?>