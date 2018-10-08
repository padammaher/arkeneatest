<?php foreach ($device_asset_list as $list) { ?>     
    <!-- Modal -->
    <div id="device_asset_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Device Asset Details</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered">                      
                        <tbody>

                            <tr>
                                <td width="" class="lft-td">Device Number</td>
                                <td><?php echo $list['number'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">Asset Code</td>
                                <td><?php echo $list['code'] ?></td>
                            </tr>
                            <tr>
                                <td class="lft-td">WEF Date</td>
                                <td><?php echo $list['createdate'] ?></td>
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