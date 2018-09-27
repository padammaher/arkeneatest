<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>
    <?php
    if ($this->session->userdata('assettypee_post')) {
        $post = $this->session->userdata('assettypee_post');
    }
    if (isset($ast_type_id)) {
        $edit_id = $ast_type_id;
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
                    <h4>Edit Asset Type</h4>					
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateassettype" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
                        <?php
                        if (isset($result[0]['name'])) {
                            $asset_type = $result[0]['name'];
                        } elseif (set_value('asset_type')) {
                            $asset_type = set_value('asset_type');
                        } elseif (isset($post) && !empty($post)) {
                            $asset_type = $post['asset_type'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="asset_type" value="<?php echo isset($asset_type) ? $asset_type : ""; ?>" required="required" pattern="[A-Za-z\s]*">
                            </div>
                            <?php if (form_error('asset_type')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_type'); ?></span>
                            <?php }
                            ?>
                        </div>
                        <?php
                        if (isset($result[0]['description'])) {
                            $type_desc = $result[0]['description'];
                        } elseif (set_value('type_descriptiona')) {
                            $type_desc = set_value('type_description');
                        } elseif (isset($post) && !empty($post)) {
                            $type_desc = $post['type_description'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." name="type_description" style="resize: vertical;"><?php echo isset($type_desc) ? $type_desc : ""; ?></textarea>
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
                                <a href="<?php echo base_url() ?>assettype" class="btn btn-default">Cancel</a>
                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>




</div>
<!--</div>-->