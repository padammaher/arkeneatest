<?php if (isset($result) && !empty($result)) { ?>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">                      
                    <tbody>
                        <tr>
                            <td width="" class="lft-td">Sr. No.</td>
                            <td><?php echo $sr_no; ?></td>
                        </tr>
                        <tr>
                            <td width="" class="lft-td">Parameter</td>
                            <td><?php echo $result[0]['parameter']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">Minimum value</td>
                            <td><?php echo $result[0]['min_value']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">Maximum value</td>
                            <td><?php echo $result[0]['max_value']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">Scaling factor</td>
                            <td><?php echo $result[0]['scaling_factor']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">UOM</td>
                            <td><?php echo $result[0]['uom']; ?></td>
                        </tr>
                        <tr>
                            <td class="lft-td">Bits/ sign</td>
                            <td><?php echo $result[0]['bits_per_sign']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <?php
}?>