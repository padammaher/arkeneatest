<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>Add UOM</h4>						
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addUomList" method="POST">

                            <!--                            <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text" class="form-control" placeholder="1">
                                                            </div>
                                                        </div>-->

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="UOM Type" name="uom_type" required="required">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php if (isset($uom_list) && count($uom_list) > 0) { ?>
                                        <select class="form-control" name="uom_id">
                                            <option value="">Select UOM</option>
                                            <?php
                                            foreach ($uom_list as $ul) {
                                                ?>
                                                <option value="<?php echo $ul['id'] ?>"><?php echo $ul['name']; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    <?php } else {
                                        ?>
                                        <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "> Please add an UOM, before adding UOM Type</span>
                                    <?php }
                                    ?>
                                </div>
                                <!--                                    <div class="col-md-6 col-sm-6 col-xs-12" id="divdrpdwn">
                                                                        <input type="text" class="form-control" placeholder="UOM" id="uom_id" name="uom_id" required="required" multiple="true">
                                                                        <span class="text-danger" style="display:none;color:#FB3A3A;font-weight:bold" id="fse_type_error">Please select uom</span>
                                                                    </div>-->

                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <!--<button type="button" class="btn btn-default">Cancel</button>-->
                                    <a href="<?php echo base_url() ?>uomlist" class="btn btn-default">Cancel</a>
                                </div>
                            </div>

                        </form>					

                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
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