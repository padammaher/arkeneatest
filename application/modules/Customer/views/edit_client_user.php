<!-- <div class="right_col" role="main"> -->
<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4> <?php echo (isset($client_details[0]->id)) ? 'Edit Client User' : 'Add Client User'; ?>
                    </h4>						
                    <div class="clearfix">
                    </div>
=======
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4> <?php echo (isset($client_details[0]->id))?'Edit Client User':'Add Client User'; ?>
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>update_client">
              <!-- <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="srno" type="text"  class="form-control" value="<?php echo (isset($client_details[0]->srno))?$client_details[0]->srno:''; ?>" >
                
                </div>
              </div> -->
              <input name="id" type="hidden"  class="form-control"  value="<?php echo (isset($client_details[0]->id))?$client_details[0]->id:''; ?>" >
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span> *</span>
                </label>
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="client_name" type="text" class="form-control" placeholder="Enter Name" required="required"  value="<?php echo (isset($client_details[0]->first_name))?$client_details[0]->first_name:''; ?>" >
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location
                <span> *</span>
                </label>                
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required="required" name="client_location">
                    <option value="">Select Customer Location
                    </option>
                     <?php  foreach($client_location as $Location){ ?> 
                    <option value="<?php echo $Location->location_name;?>"<?php if(isset($client_details[0]->customer_address)){ echo ($Location->location_name==$client_details[0]->customer_address)?'selected':''; } ?>><?php echo (isset($Location->location_name))?$Location->location_name:''; ?></option>
                  <?php   } ?> 
                </select>
>>>>>>> 02c2fd6fb483ce5efa21cd24d217534423cca075
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url() ?>update_client">
                        <!-- <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="srno" type="text"  class="form-control" value="<?php echo (isset($client_details[0]->srno)) ? $client_details[0]->srno : ''; ?>" >
                          
                          </div>
                        </div> -->
                        <input name="id" type="hidden"  class="form-control"  value="<?php echo (isset($client_details[0]->id)) ? $client_details[0]->id : ''; ?>" >
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span> *</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="client_name" type="text" class="form-control" placeholder="Enter Name" required="required"  value="<?php echo (isset($client_details[0]->first_name)) ? $client_details[0]->first_name : ''; ?>" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location
                                <span> *</span>
                            </label>                
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" required="required" name="client_location">
                                    <option>Select Customer Location
                                    </option>
                                    <?php foreach ($client_location as $Location) { ?> 
                                        <option value="<?php echo $Location->location_name; ?>"<?php
                                        if (isset($client_details[0]->customer_address)) {
                                            echo ($Location->location_name == $client_details[0]->customer_address) ? 'selected' : '';
                                        }
                                        ?>><?php echo (isset($Location->location_name)) ? $Location->location_name : ''; ?></option>
                                            <?php } ?> 
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name
                                <span> *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="client_username" id="client_username" type="text" class="form-control" placeholder="Enter Email" required="required"  value="<?php echo (isset($client_details[0]->email)) ? $client_details[0]->email : ''; ?>" >
                                <div id="email_error" style="color:red"> </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                                <span > *</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="password" type="text" id="client_password" class="form-control" placeholder="Enter Password" required="required"  value="<?php echo (isset($client_details[0]->password)) ? $client_details[0]->password : ''; ?>" >
                                <div id="errorpassword"> </div>
                            </div>

                        </div>	
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span> *</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                                <?php
                                if (isset($client_details[0]->active) && $client_details[0]->active == 1) {
                                    $checked = "checked";
                                } else {
                                    $checked = "";
                                }
                                ?>
                                <input type="checkbox" name="status" id="status" class="flat" <?php echo isset($checked) ? $checked : ''; ?>> Active
                            </div>
                        </div>					  
                        <div class="ln_solid">
                        </div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary"><?php echo (isset($client_details[0]->id)) ? 'Update' : 'Save'; ?>
                                </button>
                                <a href="<?php echo base_url() ?>ManageUsers">
                                    <button type="button" class="btn btn-default">Cancel
                                    </button> </a>
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
    $(document).ready(function () {

        $('#client_username').focusout(function () {
            $('#client_username').filter(function () {
                var emil = $('#client_username').val();
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
</script> 
<style>
    .list-group{
        z-index:10;display:none; 
        position:absolute; 
        color:red;
    }
    .msg
    {
        position:absolute; 
        color:red;
    }
    /* .form-group .control-label:after {
      content:"*";color:red;
    } */
</style> 

<script>
    $(document).ready(function () {
////////////////////
        $('#client_password').focusout(function () {
            var str = $('#client_password').val();
            var upper_text = new RegExp('[A-Z]');
            var lower_text = new RegExp('[a-z]');
            var number_check = new RegExp('[0-9]');
            var special_char = new RegExp('[!/\'^£$%&*()}{@#~?><>,|=_+¬-\]');

            var flag = 'T';

            if (str.match(upper_text) && str.match(lower_text) && str.match(special_char) && str.match(number_check) && str.length > 7) {
                $('#errorpassword').html("");
//$('#errorpassword').css("color", "green");
            } else {
                $('#d12').css("color", "red");
                $('#errorpassword').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> add atleast one upper,lower,special character, one number, and minimum 8 character length");
                $('#errorpassword').css("color", "red");
            }
        });
    });
</script>




