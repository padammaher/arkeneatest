<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Manage UOM Icon</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>manageIcon" method="POST">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="uom" id="uom" required>
                                    <option value="">Select UOM</option>
                                    <?php
                                    if (isset($uom_icon_data) && !empty($uom_icon_data)) {
                                        foreach ($uom_icon_data as $ut) {
                                            ?>
                                            <option value="<?php echo $ut['id'] ?>"><?php echo $ut['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>	
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Icon Path <span>*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="icon_path" id="icon" class="form-control" placeholder="Icon Path" required>
                            </div>
                        </div>			  
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url() ?>uomlist" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>					
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#uom").change(function () {
            var selected = $(this).val();
            if (selected.length !== 0)
            {
                $.ajax({
                    url: "<?php echo base_url() . 'Master/uommaster/get_iconPath'; ?>",
                    method: "POST",
                    data: {uom_id: selected},
                    dataType: "html",
                    success: function (data) {
                        $("#icon").val($.trim(data));
                    }
                });
            }
        });
    });
</script>