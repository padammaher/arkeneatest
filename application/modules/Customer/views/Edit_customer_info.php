<!-- <div class="right_col" role="main"> -->
<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <?php
                    $login_flag = $this->session->userdata('login_flag');
                    if ($login_flag == 0 && $login_flag != '') {
                        ?>
                        <h4>Add Customer Provisioning</h4>	
                    <?php } else { ?>
                        <h4>Edit Customer Provisioning</h4>	      
                    <?php } ?>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url() ?>UpdateInfo" enctype="multipart/form-data">
                        <?php foreach ($user_detail as $user) { ?> 
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control static-text" placeholder="Customer Name" value="<?php echo (isset($user->first_name)) ? $user->first_name : ''; ?>" disabled>
                                    <input name="user_id" type="hidden" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo $user->id; ?>">
                                </div>
                             </div>
<!--                             <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="company_name" id="company_name" class="form-control static-text" placeholder="Enter Company Name" value="<?php echo (isset($user->company_name)) ? $user->company_name : ''; ?>">
                                </div>
                            </div>-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="customer_address" required="required" type="text" class="form-control" placeholder="Enter Address" value="<?php echo $user->customer_address; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="contact_person" required="required" type="text" class="form-control" placeholder="Enter Contact Person Name" value="<?php echo $user->contact_person; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Country
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="country_id" onChange="getState(this.value);" required>
                                        <option>select country</option> 
                                        <?php foreach ($country as $contries) { ?>                  
                                            <option value="<?php echo $contries->id; ?>"<?php echo ($contries->id == $user->country_id) ? 'selected' : ''; ?> ><?php echo $contries->name; ?> </option>
                                        <?php } ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required>State
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="state_id" id="State_id" onChange="getCity(this.value);">
                                        <option value="">Select State</option>
                                        <?php
                                        if (isset($state)) {
                                            foreach ($state as $stateid) {
                                                ?> 
                                                <option value="<?php echo $stateid->id; ?>" <?php echo ($stateid->id == $user->state_id) ? 'selected' : ''; ?>><?php echo $stateid->name; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>						  
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">City
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="city_id" id="City_id" required>
                                        <option value="">Select City</option>
                                        <?php
                                        if (isset($city)) {
                                            foreach ($city as $cityid) {
                                                ?> 
                                                <option value="<?php echo $cityid->id; ?>" <?php echo ($cityid->id == $user->city_id) ? 'selected' : ''; ?>><?php echo $cityid->name; ?> </option>
                                                <?php
                                            }
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="pincode" id="pincode" type="text" class="form-control" placeholder="Enter pincode" pattern="[0-9\s]+" maxlength="4" required="required" value="<?php echo $user->pincode; ?>" title="Only 4 digits are allowed">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No.
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="phone" id="phone" type="number" class="form-control" placeholder="Enter Telephone No." required="required" value="<?php echo $user->phone; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No.
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="mobile" id="mobile" type="number" class="form-control"  placeholder="Enter Mobile No." required="required" value="<?php echo $user->mobile; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="email"  id="customer_email" type="Email" class="form-control" placeholder="Enter Email ID" required="required" value="<?php echo $user->email; ?>" readonly>
                                    <div id="email_error" style="color:red;"></div>
                                </div>
                            </div>
                            <?php
                            $group_id = $this->session->userdata('group_id');
                            if ($group_id == 1) {
                                ?>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Logo
                                    </label>
                                    <?php
                                    if ($login_flag == 0 && $login_flag != '') {
                                        $display = "style='display:none;'";
                                        $required = "required";
                                    } else {
                                        $display = "";
                                        $required = "";
                                    }
                                    ?>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="company_logo" type="file" placeholder=""  onchange="readURL(this, 'company');" <?php echo isset($required) ? $required : ''; ?>>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 margin-top">
                                        <img src="data:image/gif;base64,<?php echo $user->company_logo; ?>" id="company_logo" alt="Company Logo" height="50" width="50" <?php echo isset($display) ? $display : ''; ?>>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image
                                </label>
                                <?php
                                if ($login_flag == 0 && $login_flag != '') {
                                    $display = "style='display:none;'";
                                    $required = "required";
                                } else {
                                    $display = "";
                                    $required = "";
                                }
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="profile_logo" type="file" placeholder=""  onchange="readURL(this, 'profile');" <?php echo isset($required) ? $required : ''; ?>>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 margin-top">
                                    <img src="data:image/gif;base64,<?php echo $user->profileimg; ?>" id="profile_logo" alt="Profile Logo" height="50" width="50" <?php echo isset($display) ? $display : ''; ?>>
                                </div>
                            </div>
                            <div class="ln_solid">
                            </div>
                        <?php } ?> 
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button id="customer_info_submit" type="submit" class="btn btn-primary">Update
                                </button>
                                <a href="<?php echo base_url() ?>Customerinfo">
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
    function readURL(input, type) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (type == 'company') {
                    $('#company_logo').css('display', 'block');
                    $('#company_logo').attr('src', e.target.result);
                } else {
                    $('#profile_logo').css('display', 'block');
                    $('#profile_logo').attr('src', e.target.result);
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function () {

        $('#customer_email').focusout(function () {
            $('#customer_email').filter(function () {
                var emil = $('#customer_email').val();
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!emailReg.test(emil)) {

                    $("#customer_info_submit").prop("disabled", true);
                    $("#email_error").html('Please enter valid emaildfsdf');
                } else {

                    $("#email_error").html("");
                    $("#customer_info_submit").prop("disabled", false);
                }

            })
        });
    });

// $('#mobile').keypress(function (event) {
//     var keycode = event.which;
//     if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
//         event.preventDefault();
//     }

// });


    $(document).ready(function () {
        $("#mobile").keypress(function (e) {
            $('span.error-keyup-3').remove();
            var inputVal = $(this).val();
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
                return false;
            } else if (inputVal.length < 9) {
                $("#customer_info_submit").prop("disabled", true);
                $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
            }
            if (inputVal.length == 9) {
                $("#customer_info_submit").prop("disabled", false);
            }
        });
    });
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

<style>
    .form-group .control-label:after {
        content:"*";color:greay;
    }
    .margin-top{
        margin-top: 10px;
    }
    /*    input[type=file]{
            width:90px;
            color:transparent;
        }*/
</style>
