<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Device Inventory</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url(); ?>Device_inventory_add">

                    <!--               <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control static-text" placeholder="Asset Sr. No." value="John Doe" disabled>
                    </div>
                    </div>-->

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicename" class="form-control" placeholder="Device Number" required="required">
                        </div>
                    </div><!--
                    -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial Number *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="serialnumber" class="form-control" placeholder="Serial Number" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Make *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicemake" class="form-control" placeholder="Device Make" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Model *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="devicemodel" class="form-control" placeholder="Device Model" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="devicedescription" rows="2" placeholder="Description.." style="resize: vertical;"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="comm_type" class="form-control" placeholder="Communication Type" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="gsmnumber" class="form-control" placeholder="GSM Number">
                        </div>
                    </div>
                    <!--                    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Status</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="comm_status" class="form-control" placeholder="Communication Status" required="required">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication History</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="comm_history" class="form-control" placeholder="Communication History" required="required">
                                            </div>
                                        </div>-->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Protocol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="comm_protocol" class="form-control" placeholder="Communication Protocol" required="required">
                        </div>
                    </div>					

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                            <label>
                                <input type="checkbox" name="device_status" class="flat" checked="checked"> Active
                            </label>
                        </div>
                    </div>						  

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="submit" name="add_deviceinventory_button" class="btn btn-primary" />
                            <!--Save</button>-->
                            <a href="<?php echo base_url('Device_inventory_list'); ?>" type="button" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>					
            </div>
        </div>
    </div>
</div>