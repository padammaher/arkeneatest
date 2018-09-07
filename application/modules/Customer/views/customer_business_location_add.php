<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Add Customer Business Location
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/add_business_location">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Location Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='location_name' type="text" class="form-control" placeholder="Sandton" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='address' type="text" class="form-control" placeholder="West Road North Morningside, Sandton" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='contact_person_name' type="text" class="form-control" placeholder="Mark Tayler" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" required="required" name="country" onChange="getState(this.value);">
                    <option value="">Select
                    </option>
                    <?php foreach($country as $contries){ ?> 
                   <option value="<?php echo $contries->id;?>"><?php echo $contries->name;?> </option>
                   <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" name="state">State / Province
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  id="State_id" onChange="getCity(this.value);">
                    <option value="">Select
                    </option>
                   
                  </select>
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">City
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  name="city" id="City_id">
                    <option value="">Select
                    </option>
                    
                  </select>
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='pincode' type="text" class="form-control" placeholder="10001" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='telephone' type="text" class="form-control" placeholder="27 11 326 5900" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No. 
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='mobile' type="number" class="form-control"  placeholder="27 82 480 7309" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID 
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='email' type="email" class="form-control"  placeholder="CL1@bdv.co.za" required="required">
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
<script>
function getState(val) {
  $.ajax({
	type: "POST",
	url: "<?php echo base_url()?>Customer/get_state",
	data:{country_id:val},
	success: function(data){
  	$("#State_id").html(data);
	}
	});
}

function getCity(val) {
  $.ajax({
	type: "POST",
	url: "<?php echo base_url()?>Customer/get_city",
	data:{city_id:val},
	success: function(data){
  	$("#City_id").html(data);
	}
	});
}
</script>