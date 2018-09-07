<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Edit Customer Provisioning
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/update_cutomer_info">
             <?php foreach($user_detail as $user){ ?> 
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control static-text" placeholder="Customer Name" value="<?php echo $user->customer_name; ?>" disabled>
                <input name="customer_name" type="hidden" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo $user->customer_name; ?>">
                <input name="user_id" type="hidden" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo $user->user_id; ?>">
                  </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="customer_address" type="text" class="form-control" placeholder="Address" value="<?php echo $user->customer_address; ?>">
               </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <input name="contact_per_name" type="text" class="form-control" placeholder="Contact Person Name" value="<?php echo $user->contact_per_name; ?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="Telephone" type="text" class="form-control" placeholder="Telephone No." required="required" value="<?php echo $user->Telephone; ?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="Mobile" type="text" class="form-control" placeholder="Mobile No." required="required" value="<?php echo $user->Mobile; ?>">
               </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="Email" type="Email" class="form-control" placeholder="Email ID" required="required" value="<?php echo $user->Email; ?>">
                </div>
              </div>
              <div class="ln_solid">
              </div>
             <?php } ?> 
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Save
                  </button>
                  <button type="button" class="btn btn-default">Cancel
                  </button>
                </div>
              </div>
              
            </form>	
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
