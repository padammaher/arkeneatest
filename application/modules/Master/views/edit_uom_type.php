<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Edit UOM Type</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateUomTypeList" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $uom_type_id; ?>">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control"  name="uom_type" value="<?php echo $result[0]['name']; ?>" required="required" pattern="[A-Za-z\s]*">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editsubmit" value="1">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <!--<button type="button" class="btn btn-default">Cancel</button>-->
                                <a href="<?php echo base_url() ?>uom_type_list" class="btn btn-default">Cancel</a>

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->