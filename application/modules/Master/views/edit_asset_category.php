<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>
    <?php
    if ($this->session->userdata('assetcate_post')) {
        $post = $this->session->userdata('assetcate_post');
    }
    if (isset($ast_cat_id)) {
        $edit_id = $ast_cat_id;
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
                    <h4>Edit Asset Category</h4>					
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateAssetCategory" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
                        <?php
                        if (isset($result[0]['name'])) {
                            $asset_cat = $result[0]['name'];
                        } elseif (set_value('asset_category')) {
                            $asset_cat = set_value('asset_category');
                        } elseif (isset($post) && !empty($post)) {
                            $asset_cat = $post['asset_category'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Category *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="asset_category" value="<?php echo isset($asset_cat) ? $asset_cat : ""; ?>" required="required" pattern="[A-Za-z\s]*">
                            </div>
                            <?php if (form_error('asset_category')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_category'); ?></span>
                            <?php }
                            ?>
                        </div>

                        <?php
                        if (isset($result[0]['description'])) {
                            $asset_desc = $result[0]['description'];
                        } elseif (set_value('asset_description')) {
                            $asset_desc = set_value('asset_description');
                        } elseif (isset($post) && !empty($post)) {
                            $asset_desc = $post['asset_description'];
                        }
                        ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." name="asset_description" style="resize: vertical;"><?php echo isset($asset_desc) ? $asset_desc : ""; ?></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editsubmit" value="1">
                                <input type="submit" class="btn btn-primary" name="edit" value="Save">
                                <a href="<?php echo base_url() ?>assetcategory" class="btn btn-default">Cancel</a>
                                <!--<button type="button" class="btn btn-default">Cancel</button>-->

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>
</div>

