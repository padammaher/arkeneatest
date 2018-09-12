<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Asset</h4>           
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!--<form class="form-horizontal form-label-left"  >-->
                <form class="form-horizontal form-label-left"  action="<?php echo base_url(); ?>Assets_add"  method="POST" >
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="1" id="SrNo" name="SrNo">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" required="required" placeholder="DG0001" id="Assetcode" name="Assetcode" pattern="[a-zA-Z0-9]+">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Customerlocation" name="Customerlocation" required>
                                <option value="">Select Location</option>
                                <?php foreach ($location_list as $loc_list) { ?>
                                    <option value="<?php echo $loc_list['id']; ?>"><?php echo $loc_list['location']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Category *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Assetcategory" name="Assetcategory" required>
                                <option value="">Select Category</option>
                                <?php foreach ($category_list as $category_list) { ?>
                                    <option value="<?php echo $category_list['id']; ?>"><?php echo $category_list['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Type *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control"  id="Assettype" name="Assettype" required>
                                <option value="">Select Type</option>
                                <?php foreach ($type_list as $typelistdata) { ?>
                                    <option value="<?php echo $typelistdata['id']; ?>"><?php echo $typelistdata['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Specification</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Fuel: diesel HSD, O/p Voltage 220V AC"  id="assetspecification" name="assetspecification">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Serial No. *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="CLR0021212A" required="required" id="Assetserialno" name="Assetserialno" pattern="[a-zA-Z0-9]+">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Make *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Cummins" required="required" id="Make" name="Make" pattern="[a-zA-Z0-9]+">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Model No. *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="CU001A" required="required" id="Modelno" name="Modelno" pattern="[a-zA-Z0-9]+">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="2" style="resize: vertical;" placeholder="Diesel Gen Sets" id="Description" name="Description"></textarea>
                        </div>
                    </div>  

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Movable / Immovable</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Movable" name="Movable" required>
                                <option value="1">Movable</option>
                                <option value="2">Immovable</option>
                            </select>
                        </div>
                    </div> 

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<!--                            <input type="hidden" name="assets_add_submit" value="assets_add_submit">                                   -->
                            <button type="submit" name="assets_add_button" class="btn btn-primary">Save</button>
                            <a href="<?php echo base_url('Assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                        </div>
                    </div>

                </form>         

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>