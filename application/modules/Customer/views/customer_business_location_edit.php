<!-- <div class="right_col" role="main"> -->
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
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url() ?>Customer/update_business_location">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Location Name
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='location_name' type="text" class="form-control" placeholder="Sandton" required="required" value="<?php echo (isset($business_detail[0]->location_name)) ? $business_detail[0]->location_name : ''; ?>" >
                                <input name="id" type="hidden" class="form-control" placeholder="Enter Business Location" value="<?php echo $business_detail[0]->id; ?>" >

                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='address' type="text" class="form-control" placeholder="Enter Address" required="required" value="<?php echo (isset($business_detail[0]->address)) ? $business_detail[0]->address : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person Name
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='contact_person_name' type="text" class="form-control" placeholder="Enter Contact person name " required="required" value="<?php echo (isset($business_detail[0]->contact_person_name)) ? $business_detail[0]->contact_person_name : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" required="required" name="country" onChange="getState(this.value);">
                                    <option value="">Select Country
                                    </option>
                                    <?php foreach ($country_list as $contries) { ?> 
                                        <option value="<?php echo $contries->id; ?>"<?php echo ($business_detail[0]->country == $contries->id) ? 'selected' : ''; ?>><?php echo $contries->name; ?> </option>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">State / Province
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="state" id="State_id" onChange="getCity(this.value);">
                                    <option value="">Select State
                                    </option>
                                    <?php foreach ($states_list as $stat) { ?> 
                                        <option value="<?php echo $stat->id; ?>"<?php echo ($business_detail[0]->state == $stat->id) ? 'selected' : ''; ?>><?php echo $stat->name; ?> </option>
                                    <?php } ?> 

                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >City
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control"  name="city" id="City_id">
                                    <option value="">Select City 
                                    </option>
                                    <?php foreach ($city_list as $city) { ?> 
                                        <option value="<?php echo $city->id; ?>"<?php echo ($business_detail[0]->city == $city->id) ? 'selected' : ''; ?>><?php echo $city->name; ?> </option>
                                    <?php } ?> 
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='pincode' id="pincode" type="number" class="form-control" placeholder="Enter Pincode Number" required="required" value="<?php echo (isset($business_detail[0]->pincode)) ? $business_detail[0]->pincode : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='telephone' id="phone" type="number" class="form-control" placeholder="Enter Telephone Number" required="required" value="<?php echo (isset($business_detail[0]->telephone)) ? $business_detail[0]->telephone : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No. 
                                <span class="required">*
                                </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='mobile' id="mobile" type="number" class="form-control"  placeholder="Enter Mobile Number " required="required" value="<?php echo (isset($business_detail[0]->mobile)) ? $business_detail[0]->mobile : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID 
                                <span class="required">* </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name='email' id="customer_email" type="email" class="form-control"  placeholder="Enter Email id " required="required" value="<?php echo (isset($business_detail[0]->email)) ? $business_detail[0]->email : ''; ?>">
                                <div id="email_error" style="color:red"></div>  
                            </div>
                        </div>
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span> *</span></label>
                             <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                 <input type="checkbox" name="status" id="status" class="flat" <?php echo (isset($business_detail[0]->isactive)&&$business_detail[0]->isactive==1) ? 'checked': ''; ?>> 
                           </div>
                          </div>
                        <div class="ln_solid">
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" id="customer_businees_location" class="btn btn-primary">Update
                                </button>
                                <a href="<?php echo base_url() ?>ManageBusinessLoacaiton">
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
<!-- </div> -->
<script>
    function getState(val) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Customer/get_state",
            data: {country_id: val},
            success: function (data) {
                $("#State_id").html(data);
            }
        });
    }

    function getCity(val) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Customer/get_city",
            data: {city_id: val},
            success: function (data) {
                $("#City_id").html(data);
            }
        });
    }

    $(document).ready(function () {

        $('#customer_email').focusout(function () {
            $('#customer_email').filter(function () {
                var emil = $('#customer_email').val();
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!emailReg.test(emil)) {
                    $("#email_error").html('Please enter valid email');
                } else {
                    $("#email_error").html("");

                    // alert('Thank you for your valid email');
                }
            })
        });
    });

    $('#mobile').keyup(function () {
        $('span.error-keyup-3').remove();
        var inputVal = $(this).val();
        //characterReg = /^[2-9]\d{2}-\d{3}-\d{4}$/;
        var characterReg = /^([a-zA-Z0-9]{0,10})$/;
        if (!characterReg.test(inputVal)) {
            $("#customer_businees_location").prop("disabled", true);
            $(this).after('<span class="error error-keyup-3" style="color:red">minimun 10 characters.</span>');
        } else if (inputVal.length < 10) {
            $("#customer_businees_location").prop("disabled", true);
            $(this).after('<span class="error error-keyup-3" style="color:red">Maximum 10 characters.</span>');
        }
        if (inputVal.length == 10) {
            $("#customer_businees_location").prop("disabled", false);
        }
    });
    $('#pincode').keypress(function (event) {
        var keycode = event.which;
        if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
            event.preventDefault();
        }
    });
    $('#phone').keypress(function (event) {
        var keycode = event.which;
        if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
            event.preventDefault();
        }
    });
</script>

<style> 
    .required{
        color:greay; 
    }
</style> 
