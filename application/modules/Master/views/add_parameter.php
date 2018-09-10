<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Parameter</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>addParameter" method="POST">

                        <!--                            <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control" placeholder="1">
                                                        </div>
                                                    </div>-->

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter Name *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="Parameter Name" name="param_name" required="required" pattern="[A-Za-z\s]*">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="uom_type" required="required">
                                    <option value="">Select UOM Type</option>
                                    <?php
                                    if (isset($uom_types) && !empty($uom_types)) {
                                        foreach ($uom_types as $ut) {
                                            ?>
                                            <option value="<?php echo $ut['id'] ?>"><?php echo $ut['name']; ?></option>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 17px; "> Please add an UOM Type, before adding parameter</span>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>														
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" placeholder="Description.." style="resize: vertical;" name="param_description" ></textarea>
                            </div>
                        </div>

                        <!--                        <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                                        <label>
                                                            <input type="checkbox" class="flat" name="status" checked="checked"> Active
                                                        </label>
                                                    </div>
                                                </div>						  -->

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url() ?>parameterlist" class="btn btn-default">Cancel</a>
                                <!--<button type="button" class="btn btn-default">Cancel</button>-->
                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>




</div>
<!--</div>-->