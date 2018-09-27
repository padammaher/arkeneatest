<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>
    <?php
    if ($this->session->userdata('sensore_post')) {
        $post = $this->session->userdata('sensore_post');
    }
    if (isset($sensortype_id)) {
        $edit_id = $sensortype_id;
    } elseif (set_value('edit_id')) {
        $edit_id = set_value('edit_id');
    } elseif (isset($post) && !empty($post)) {
        $edit_id = $post['edit_id'];
    }
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Edit Sensor Type</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateSensorType" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
                        <?php
                        if (isset($result[0]['name'])) {
                            $sensor_type = $result[0]['name'];
                        } elseif (set_value('sensor_type')) {
                            $sensor_type = set_value('sensor_type');
                        } elseif (isset($post) && !empty($post)) {
                            $sensor_type = $post['sensor_type'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="sensor_type" value="<?php echo isset($sensor_type) ? $sensor_type : ""; ?>" required="required" pattern="[A-Za-z\s]*">
                            </div>
                            <?php if (form_error('sensor_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('sensor_type'); ?></span>
                            <?php }
                            ?>
                        </div>
                        <?php
                        if (isset($result[0]['description'])) {
                            $sens_desc = $result[0]['description'];
                        } elseif (set_value('sensor_description')) {
                            $sens_desc = set_value('sensor_description');
                        } elseif (isset($post) && !empty($post)) {
                            $sens_desc = $post['sensor_description'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sensor Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." name="sensor_description" style="resize: vertical;"><?php echo isset($sens_desc) ? $sens_desc : ""; ?></textarea>
                            </div>
                        </div>	
                        <?php
                        if (isset($result[0]['isactive']) && $result[0]['isactive'] == 1) {
                            $checked = "checked";
                        } elseif (set_value('status')) {
                            $checked = "checked";
                        } elseif (isset($post['status']) && !empty($post['status'])) {
                            $checked = "checked";
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <label>
                                    <input type="checkbox" name="status" class="flat" <?php echo isset($checked) ? $checked : ''; ?>> Active
                                </label>
                            </div>
                        </div>	

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editsubmit" value="1">
                                <input type="submit" class="btn btn-primary" name="edit" value="Update">
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