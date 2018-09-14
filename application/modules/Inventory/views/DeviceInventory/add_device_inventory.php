<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
   <div class="x_title">
                                <h4>Add Device Inventory</h4>						
                                <div class="clearfix"></div>
                        </div>
  <div class="x_content">
      <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Device_inventory_add">


<!--               <div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" class="form-control static-text" placeholder="Asset Sr. No." value="John Doe" disabled>
</div>
</div>-->

                                  <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Number</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" name="devicename" class="form-control" placeholder="Device Number" value="<?php echo set_value('devicename'); ?>" required="required">
                                        </div>
                                  </div><!--
                                        -->
                                        <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Serial Number</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="serialnumber" class="form-control" value="<?php echo set_value('serialnumber'); ?>" placeholder="Serial Number">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Make</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="devicemake" class="form-control" value="<?php echo set_value('devicemake'); ?>" placeholder="Device Make" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Device Model</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="devicemodel" class="form-control" value="<?php echo set_value('devicemodel'); ?>" placeholder="Device Model" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <textarea class="form-control" name="devicedescription" rows="2" placeholder="Description.." style="resize: vertical;" required="required"><?php echo set_value('devicedescription'); ?></textarea>
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Type</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="comm_type" class="form-control" placeholder="Communication Type" value="<?php echo set_value('comm_type'); ?>" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">GSM Number</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="gsmnumber" class="form-control" placeholder="GSM Number" value="<?php echo set_value('gsmnumber'); ?>" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Status</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="comm_status" class="form-control" placeholder="Communication Status" value="<?php echo set_value('comm_status'); ?>" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication History</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="comm_history" class="form-control" placeholder="Communication History" value="<?php echo set_value('comm_history'); ?>" required="required">
                                                </div>
                                          </div>
                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Communication Protocol</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="text" name="comm_protocol" class="form-control" placeholder="Communication Protocol" value="<?php echo set_value('comm_protocol'); ?>" required="required">
                                                </div>
                                          </div>					

                                          <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                                  <label><?php $isactive=set_value('device_status'); ?>                          
                          
                                                    <input type="checkbox" name="device_status" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "on"? 'checked': ''; } else { }?>> Active
                                                        </label>
                                                </div>
                                          </div>						  

                                  <div class="ln_solid"></div>
                                  <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <input type="submit" name="post" value="add" class="btn btn-primary" />
                                                <!--Save</button>-->
                                         <a href="<?php echo base_url('Device_inventory_list');?>" type="button" class="btn btn-default">Cancel</a>

                                        </div>
                                  </div>

                                </form>					

  </div>
</div>
</div>
</div>