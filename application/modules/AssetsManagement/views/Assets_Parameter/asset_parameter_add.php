<div class="">
    <div class="clearfix"></div>
    <?php
    if ($this->session->userdata('paramrange_post')) {
        $post = $this->session->userdata('paramrange_post');
    }
    if (isset($param_range_id)) {
        $edit_id = $param_range_id;
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
                    <h4><?php echo isset($edit_id) ? 'Edit' : 'Add' ?> Asset Parameter Range</h4>           
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if (isset($edit_id) && !empty($edit_id)) { ?>
                        <form class="form-horizontal form-label-left" id="parameter_range_form" action="<?php echo base_url() ?>asset_parameter_update"  method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
                            <!--<input type="hidden" name="formaction" value="<?php echo base_url() ?>asset_parameter_update">-->
                        <?php } else { ?>
                            <form class="form-horizontal form-label-left" id="parameter_range_form" action="<?php echo base_url() ?>asset_parameter_add" method="POST">
                                <!--<input type="hidden" name="formaction" value="<?php echo base_url() ?>asset_parameter_add">-->
                            <?php } ?> <?php
                            if (isset($result[0]['param_id'])) {
                                $param_id = $result[0]['param_id'];
                            } elseif (set_value('parameter')) {
                                $param_id = set_value('parameter');
                            } elseif (isset($post) && !empty($post)) {
                                $param_id = $post['parameter'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter <span>*</span> </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php if (isset($parameter_list) && !empty($parameter_list)) { ?>
                                        <select class="form-control" name="parameter" id="parameter" required>
                                            <option value="">Select Parameter</option>
                                            <?php
                                            foreach ($parameter_list as $param) {
                                                if (isset($param_id) && $param['id'] == $param_id) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                ?>
                                                <option value="<?php echo $param['id']; ?>" <?php echo isset($selected) ? $selected : ''; ?>><?php echo $param['name']; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; ">Please add Parameter, before adding parameter range</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php if (form_error('parameter')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('parameter'); ?></span>
                                <?php }
                                ?>
                            </div>
                            <?php
                            if (isset($result[0]['min_value'])) {
                                $min_value = $result[0]['min_value'];
                            } elseif (set_value('min_value')) {
                                $min_value = set_value('min_value');
                            } elseif (isset($post) && !empty($post)) {
                                $min_value = $post['min_value'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum value  <span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="min_value" id="min_value" class="form-control input-number" placeholder="Enter Minimum value" min="1" value="<?php echo isset($min_value) ? $min_value : ''; ?>" required>
                                </div>
                                <span class="mrtp10 text-center englable" id="min_error" style="color:#ff3333; font-size: 15px; "></span>
                                <?php if (form_error('min_value')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('min_value'); ?></span>
                                <?php }
                                ?>
                            </div>
                            <?php
                            if (isset($result[0]['max_value'])) {
                                $max_value = $result[0]['max_value'];
                            } elseif (set_value('max_value')) {
                                $max_value = set_value('max_value');
                            } elseif (isset($post) && !empty($post)) {
                                $max_value = $post['max_value'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum value  <span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="max_value" id="max_value" class="form-control input-number" placeholder="Enter Maximum value" min="1" value="<?php echo isset($max_value) ? $max_value : ''; ?>" required>
                                </div>
                                <span class="mrtp10 text-center englable" id="max_error" style="color:#ff3333; font-size: 15px; "></span>
                                <?php if (form_error('max_value')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('max_value'); ?></span>
                                <?php }
                                ?>
                            </div>
                            <?php
                            if (isset($result[0]['scaling_factor'])) {
                                $scaling_factor = $result[0]['scaling_factor'];
                            } elseif (set_value('scaling_factor')) {
                                $scaling_factor = set_value('scaling_factor');
                            } elseif (isset($post) && !empty($post)) {
                                $scaling_factor = $post['scaling_factor'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Scaling factor  <span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="scaling_factor" id="scaling_factor" class="form-control input-number" placeholder="Enter Scaling factor" min="1"  value="<?php echo isset($scaling_factor) ? $scaling_factor : ''; ?>" required>
                                </div>
                                <?php if (form_error('scaling_factor')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('scaling_factor'); ?></span>
                                <?php }
                                ?>
                            </div>
                            <?php
                            if (isset($result[0]['uom_id'])) {
                                $uom_id = $result[0]['uom_id'];
                            } elseif (set_value('uom')) {
                                $uom_id = set_value('uom');
                            } elseif (isset($post) && !empty($post)) {
                                $uom_id = $post['uom'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM  <span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="uom" id="uom" required>
                                        <option value="">Select UOM</option>
                                        <?php
                                        if (isset($uom_list) && !empty($uom_list)) {
                                            foreach ($uom_list as $uom) {
                                                if (isset($uom) && $uom['id'] == $uom_id) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                ?>
                                                <option value="<?php echo $uom['id']; ?>" <?php echo isset($selected) ? $selected : ''; ?>><?php echo $uom['name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php if (form_error('uom')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('uom'); ?></span>
                                <?php }
                                ?>
                            </div>	
                            <?php
                            if (isset($result[0]['bits_per_sign'])) {
                                $bits_per_sign = $result[0]['bits_per_sign'];
                            } elseif (set_value('bits_per_sign')) {
                                $bits_per_sign = set_value('bits_per_sign');
                            } elseif (isset($post) && !empty($post)) {
                                $bits_per_sign = $post['bits_per_sign'];
                            }
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bits / sign  <span>*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="bits_per_sign" id="bits_per_sign" class="form-control" placeholder="Enter Bits / sign" pattern="[a-zA-Z0-9\s]+" value="<?php echo isset($bits_per_sign) ? $bits_per_sign : ''; ?>" required>
                                </div>
                                <?php if (form_error('bits_per_sign')) { ?>
                                    <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('bits_per_sign'); ?></span>
                                <?php }
                                ?>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" id="save" >Save</a>
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
        var uom = $("#uom").val();
        if (param.length == 0) {
        } else {
            if (uom.length == 0) {
                var selected_val = "<?php echo isset($uom_id) ? $uom_id : ''; ?>";
//                alert(uom + " " + param);
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
        }
        $("#save").click(function () {
            var param = $("#parameter").val();
            var uom = $("#uom").val();
            var min = $("#min_value").val();
            var max = $("#max_value").val();
            var scaling = $("#scaling_factor").val();
            var bits = $("#bits_per_sign").val();

            if (param.length == 0) {
                $("#parameter").css('border', '1px solid #CE5454');
            }
            if (min.length == 0 || parseInt(min) == 0) {
                $("#min_value").css('border', '1px solid #CE5454');
                if (parseInt(min) == 0) {
                    $("#min_error").html('Minimum value should be greater or equal to 1');
                }
            }
            if (max.length == 0 || parseInt(max) == 0) {
                $("#max_value").css('border', '1px solid #CE5454');
                if (parseInt(max) == 0) {
                    $("#max_error").html('Maximum value should be greater than minimum value');
                }
            }
            if (scaling.length == 0 && scaling == 0) {
                $("#scaling_factor").css('border', '1px solid #CE5454');
            }
            if (uom.length == 0) {
                $("#uom").css('border', '1px solid #CE5454');
            }
            if (bits.length == 0) {
                $("#bits_per_sign").css('border', '1px solid #CE5454');
            }
            if ((param.length !== 0) && (min.length !== 0 && parseInt(min) !== 0) && (max.length !== 0 && parseInt(max) !== 0) && (scaling.length !== 0) && (uom.length !== 0) && (bits.length !== 0) && (parseInt(min) < parseInt(max))) {
                $("#parameter_range_form").submit();
            }
        });
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
        $("#min_value").bind('keyup mouseup', function () {
            var max = $("#max_value").val();
            var min = $("#min_value").val();
            if (max.length !== 0 && min.length !== 0) {
                if (parseInt(min) >= parseInt(max)) {
                    $("#min_value").focus();
                    $("#max_error").html('');
                    $("#min_value").css('border', '1px solid #CE5454');
                    $("#min_error").html('Minimum value should be less than maximum value');
//                    $("#save").attr('disabled', 'disabled');
//                    setTimeout(function () {
//                        $('#min_error').html('');
//                    }, 3000);
                } else {
                    $("#min_error").html('');
                    $("#min_value").css('border', '1px solid #CCD0D7');
                    if (parseInt(max) > parseInt(min)) {
                        $("#max_value").css('border', '1px solid #CCD0D7');
                    }
                }
            }

        });
        $("#max_value").bind('keyup mouseup', function () {
            var min = $("#min_value").val();
            var max = $("#max_value").val();
            if (min.length !== 0 && max.length !== 0) {
                if (parseInt(max) <= parseInt(min)) {
                    $("#max_value").focus();
                    $("#min_error").html('');
                    $("#max_value").css('border', '1px solid #CE5454');
                    $("#max_error").html('Maximum value should be greater than minimum value');
//                    $("#save").attr('disabled', 'disabled');
//                    setTimeout(function () {
//                        $('#max_error').html('');
//                    }, 3000);
                } else {
                    $("#max_error").html('');
                    $("#max_value").css('border', '1px solid #CCD0D7');
                    if (parseInt(min) < parseInt(max)) {
                        $("#min_value").css('border', '1px solid #CCD0D7');
                    }

                }
            }
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