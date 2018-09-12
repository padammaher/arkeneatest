<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Edit Customer Business Location
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/update_business_location">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Location Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='location_name' type="text" class="form-control" placeholder="Sandton" required="required" value="<?php echo $business_detail[0]->location_name;?>" >
                  <input name="id" type="hidden" class="form-control" placeholder="Sandton" value="<?php echo $business_detail[0]->id; ?>" >
              
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name='address' type="text" class="form-control" placeholder="West Road North Morningside, Sandton" required="required" value="<?php echo $business_detail[0]->address;?>">
               </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name='contact_person_name' type="text" class="form-control" placeholder="Mark Tayler" required="required" value="<?php echo $business_detail[0]->contact_person_name;?>">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">State / Province
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="state" id="State_id" onChange="getCity(this.value);">
                    <option value="">Select
                    </option>
                   
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >City
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control"  name="city" id="City_id">
                    <option value="">Select
                    </option>
                    
                  </select>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name='pincode' type="number" class="form-control" placeholder="10001" required="required" value="<?php echo $business_detail[0]->pincode;?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name='telephone' type="number" class="form-control" placeholder="27 11 326 5900" required="required" value="<?php echo $business_detail[0]->telephone;?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No. 
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name='mobile' type="number" class="form-control"  placeholder="27 82 480 7309" required="required" value="<?php echo $business_detail[0]->mobile;?>">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID 
                  <span class="required">*
                  </span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name='email' id="customer_email" type="email" class="form-control"  placeholder="CL1@bdv.co.za" required="required" value="<?php echo $business_detail[0]->email;?>">
                <div id="email_error" style="color:red"></div>  
                </div>
              </div>
              <div class="ln_solid">
              </div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Save
                  </button>
                  <a href="<?php echo base_url()?>Customer/customer_business_location_list">
                  <button type="button" class="btn btn-default">Cancel
                  </button>
                  </a>
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

$(document).ready(function() {

$('#customer_email').focusout(function(){
                $('#customer_email').filter(function(){
                   var emil=$('#customer_email').val();
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !emailReg.test( emil ) ) {
                   $("#email_error").html('Please enter valid email'); 
                } else {
                  $("#email_error").html("");
                 
               // alert('Thank you for your valid email');
                }
                })
            });
});
</script>