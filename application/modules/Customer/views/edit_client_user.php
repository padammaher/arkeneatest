<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Edit Client User
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/update_client_detail">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="srno" type="text"  class="form-control" value="<?php echo $client_details[0]->srno; ?>" >
                <input name="id" type="hidden"  class="form-control"  value="<?php echo $client_details[0]->id; ?>" >
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="client_name" type="text" class="form-control" placeholder="Saschin Naidoo" required="required"  value="<?php echo $client_details[0]->client_name; ?>" >
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required="required" name="client_location"  >
                    <option>Select Customer Location
                    </option>
                    <option>Manson
                    </option>
                    <option>QQQQ one
                    </option>
                    <option>AAAA two
                    </option>
                    <option>SSSS three
                    </option>
                    <option>ZZZZ four
                    </option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="client_username" type="text" class="form-control" placeholder="SN@bdv.co.za etc" required="required"  value="<?php echo $client_details[0]->client_username; ?>" >
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="password" type="password" class="form-control" value="Password@123" required="required"  value="<?php echo $client_details[0]->password; ?>" >
                </div>
              </div>						  
              <div class="ln_solid">
              </div>
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
