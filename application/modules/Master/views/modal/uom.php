<?php if (isset($result) && !empty($result)) { ?>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">UOM Details</h4>
            </div>
            <div class="modal-body">

                <table class="table table-bordered">                      
                    <tbody>
<!--                        <tr>
                            <td width="" class="lft-td">Sr. No.</td>
                            <td><?php echo $sr_no; ?></td>
                        </tr>-->
                        <tr>
                            <td width="" class="lft-td">UOM Type</td>
                            <td><?php echo $result[0]['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">UOM</td>
                            <td><?php echo $result[0]['uomnames']; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
<?php } ?>