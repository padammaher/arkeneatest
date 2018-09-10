			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <div class="x_title">
						<h4>Add Asset Location</h4>						
						<div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url();?>Assets_location_add">
				
           <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" placeholder="1" required="required">
              </div>
              </div>

                 <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
              <div class="col-md-6 col-sm-6 col-xs-12">             
                  <select class="form-control" name="assetcode" required="required">
                    <option value="">Select Asset Code</option>
<?php foreach ($asset_code_list as $asset_id_list) { ?>
                                <option value="<?php echo $asset_id_list['id'];?>"><?php echo $asset_id_list['code'];?></option>

                       
<?php } ?>
                </select>             
                </div>
              </div>  
                        
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Location <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_location" class="form-control" placeholder="Sandton" required="required">
                </div>
                </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="asset_address" class="form-control" rows="2" style="resize: vertical;" placeholder="Far East Bank, Sandton, 2014" required="required"></textarea>
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_lat" class="form-control" placeholder="-26.107567" required="required">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_long" class="form-control" placeholder="28.056702" required="required">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_contactperson" class="form-control" placeholder="Joy" required="required">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No. <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_contactno" class="form-control" placeholder="27 11 326 5900" required="required">
                </div>
                </div>
                <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Email <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" name="asset_contactemail" class="form-control" placeholder="joy@bdv.co.za" data-validate-length-range="6" data-validate-words="2" required="required" >
                </div>

                </div>              
              
              <div class="ln_solid"></div>
              <div class="item form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="asset_loc_add_button" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('Assets_location_list');?>" type="button" class="btn btn-default">Cancel</a>
                
                
                
              </div>
              </div>

						</form>					
					
                  </div>
                </div>
              </div>
            </div>