<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4><?php echo isset($param_range_id) ? 'Edit' : 'Add' ?> Asset Parameter Range</h4>           
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="parameter" id="parameter" required>
                                    <option value="">Select Parameter</option>
                                    <?php
                                    if (isset($parameter_list) && !empty($parameter_list)) {
                                        foreach ($parameter_list as $param) {
                                            ?>
                                            <option value="<?php echo $param['id']; ?>"><?php echo $param['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 17px; ">Please add Parameter, before adding parameter range</span>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum value</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="min_value" class="form-control input-number" placeholder="0"  required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum value</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="max_value" class="form-control input-number" placeholder="15" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Scaling factor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" name="scaling_factor" class="form-control input-number" placeholder="1" required>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="uom" id="uom" required>
                                    <option value="">Select UOM</option>
                                </select>
                            </div>
                        </div>	

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bits/ sign</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="bits_per_sign" class="form-control" placeholder="16" pattern="[a-zA-Z0-9]+" required>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" >Save</button>
                                <a href="<?php echo base_url() ?>asset_parameter_range_list" class="btn btn-default">Cancel</a>

                            </div>
                        </div>
                    </form>         
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var param = $("#parameter").val();

        if (param.length == 0) {
        } else {
            var selected_val =<?php echo set_value('uom') ? set_value('uom') : ''; ?>
            $.ajax({
                url: "<?php echo base_url() . 'AssetsManagement/parameter_uom'; ?>",
                method: "POST",
                data: {param_id: param, uom_id: selected_val},
                dataType: "html",
                success: function (data) {
                    $("#uom").html(data);
                }
            });
        }
        $("#parameter").change(function () {
            var param_id = $(this).val();
            $.ajax({
                url: "<?php echo base_url() . 'AssetsManagement/parameter_uom'; ?>",
                method: "POST",
                data: {param_id: param_id},
                dataType: "html",
                success: function (data) {
                    $("#uom").html(data);
                }
            });
        });
    });
</script>
<style type="text/css">
    .input-number::-webkit-inner-spin-button, 
    .input-number::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>