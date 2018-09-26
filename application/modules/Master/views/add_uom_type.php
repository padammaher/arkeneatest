<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add UOM Type</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addUomTypeList" method="POST">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="UOM Type" name="uom_type" required="required" value="<?php echo @$post['uom_type']; ?>" pattern="[a-zA-Z\s]*">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <label>
                                    <input type="checkbox" name="status" class="flat" checked="checked"> Active
                                </label>
                            </div>
                        </div>	
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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
<!--<script type="text/javascript">
    $(document).ready(function () {
        var jsonData = [];
        $.ajax({
            url: "<?php echo base_url(); ?>Master/uommaster/get_uom",
            type: 'post',
            dataType: 'json',
            success: function (res) {
                jsonData = res;

                var ms1 = $('#uom_id').tagSuggest({
                    data: jsonData,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'uom_id',
                });

            }
        });

    });
</script>-->