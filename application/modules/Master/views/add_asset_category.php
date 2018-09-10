<!--<div class="right_col" role="main">
-->    <div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Asset Category</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addAssetCategory" method="POST">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Category *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="Asset Category Name" name="assetcat_name" required="required" pattern="[A-Za-z]*">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." style="resize: vertical;" name="assetcat_description"></textarea>
                            </div>
                        </div>

                        <!--                        <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                                        <label>
                                                            <input type="checkbox" name="status" class="flat" checked="checked"> Active
                                                        </label>
                                                    </div>
                                                </div>		-->

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                                <a href="<?php echo base_url() ?>assetcategory" class="btn btn-default">Cancel</a>
                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>
</div>
