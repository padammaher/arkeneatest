<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Edit Sensor Type</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateSensorType" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $sensortype_id; ?>">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="sensor_type" value="<?php echo $result[0]['name']; ?>" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." name="sensor_description" style="resize: vertical;"><?php echo $result[0]['description']; ?></textarea>
                            </div>
                        </div>														

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editsubmit" value="1">
                                <input type="submit" class="btn btn-primary" name="edit" value="Save">
                                <a href="<?php echo base_url() ?>sensortype" class="btn btn-default">Cancel</a>

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>




</div>
<!--</div>-->