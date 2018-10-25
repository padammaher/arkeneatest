
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
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='location_name' type="text" class="form-control" value="<?php echo set_value('location_name');?>" placeholder="Enter location name" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='address' type="text" class="form-control" placeholder="Enter address" value="<?php echo set_value('address');?>" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person Name
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='contact_person_name' type="text" class="form-control" placeholder="Enter Contact person name" value="<?php echo set_value('contact_person_name');?>" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" required="required" name="country" onChange="getState(this.value);">
                    <option value="">Select Country
                    </option>
                    <?php foreach($country as $contries){ ?> 
                   <option value="<?php echo $contries->id;?>" <?php echo (set_value('country') == $contries->id) ? 'selected':'';?> ><?php echo $contries->name;?> </option>
                   <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" name="state">State / Province
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="state" id="State_id" onChange="getCity(this.value);">
                    <option value="" <?php echo set_value('state')?'selected':'';?> >Select State
                    </option> 
                   
                  </select>
                </div>
              </div>  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">City
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control"  name="city" id="City_id">
                    <option value="" <?php echo set_value('city')?'selected':'';?>>Select City
                    </option>
                    
                  </select>
                </div>
              </div>
              
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode
                <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <!-- <input name='pincode' id="pincode" type="number" class="form-control" placeholder="Enter Pincode Number" required="required"> -->
                  <input name="pincode" id="pincode" type="text" class="form-control" placeholder="Enter pincode" value="<?php echo set_value('pincode');?>" pattern="[0-9]+" maxlength="4" required="required" title="Only 4 digits are allowed">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='telephone' id="phone" type="number" value="<?php echo set_value('telephone');?>" class="form-control" placeholder="Enter Telephone Number " required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No. 
                <span class="required">*</span>
                 </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='mobile' id="mobile" type="text" class="form-control" maxlength="11" minlength="10" value="<?php echo set_value('mobile');?>"  placeholder="Enter Mobile Number " required="required">
                </div>
              </div> 
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID 
                <span class="required">*</span>
                  </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name='email' id="customer_email" type="email" class="form-control" value="<?php echo set_value('email');?>"  placeholder="Enter Email id" required="required">
                 <div id="email_error" style="color:red"></div>      
                </div>
              </div>
               <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span> </span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                    <?php echo $isactive=set_value('status');
                    $active='';
                      if(!empty($isactive))
                          { $isactive=="on" ? 'checked':'';}
                     else { $isactive='checked';} ?>

                      <input type="checkbox" name="status" id="status" class="flat" <?php echo $isactive;?>> 
                </div>
               </div>
              <div class="ln_solid">
              </div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" id="customer_businees_location" class="btn btn-primary">Save
                  </button>
                  <a href="<?php echo base_url()?>ManageBusinessLoacaiton">
                  <button type="button" class="btn btn-default">Cancel
                  </button></a>
                </div>
              </div>
            </form>					
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
<style>
/* .required:before{
  content:"*";
  font-weight:bold;
  color:red; 
} */
.required{
  color:geray; 
}
</style>
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
                   $( "#customer_businees_location" ).prop( "disabled", true );
                } else {
                  $("#email_error").html("");
                 $( "#customer_businees_location" ).prop( "disabled", false );
               // alert('Thank you for your valid email');
                }
                })
            });
});

// $(document).ready(function () {  
//   $("#mobile").keypress(function (e) {
//     $('span.error-keyup-3').remove();
//     var inputVal = $(this).val();
//      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
//       $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
//                return false;
//     }else if(inputVal.length<10){
//       $( "#customer_businees_location" ).prop( "disabled", true );
//       $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
//     }
//     if(inputVal.length==10){
//       $( "#customer_businees_location" ).prop( "disabled", false );
//     }
//    });
// });
 $(document).ready(function () {
        $("#mobile").keypress(function (e) {
            $('span.error-keyup-3').remove();
            var inputVal = $(this).val();
            if(inputVal.trim()==""){$("#customer_businees_location").prop("disabled", false);}
            // if($('input[type="check_contact"]').checked==true)
             
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
                return false;
            } else if (inputVal.length < 10) {
                $("#customer_businees_location").prop("disabled", true);
                $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
            }
            if (inputVal.length > 9) {
                $("#customer_businees_location").prop("disabled", false);
            } 
          
        });
        });
// $('#pincode').keypress(function (event) {
//     var keycode = event.which;
//     if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
//         event.preventDefault();
//     }
// });

 $('#pincode').keypress(function (e) {
//        var pinVal = $(this).val();
//        $('span.error-keyup-pin').remove();
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
        }
//        else if (pinVal.length > 3) {
//            $("#customer_info_submit").prop("disabled", true);
//            $(this).after('<span class="error error-keyup-pin" style="color:red">Maximum 4 number are allowed.</span>');
//        }
//        if (pinVal.length <= 3) {
//            $("#customer_info_submit").prop("disabled", false);
//        }
    });
$('#phone').keypress(function (event) {
    var keycode = event.which;
    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
        event.preventDefault();
    }
});
</script>
