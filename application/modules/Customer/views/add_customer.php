<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add Customer Provisioning
                    </h4>						
                    <div class="clearfix">
                    </div>
                </div>
                <div class="x_content">
                    <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url() ?>Customer/add_customer_detail" enctype="multipart/form-data">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Name <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo isset($user_name) ? $user_name : ''; ?>" disabled>
                                <input name="customer_name" type="hidden" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo isset($user_name) ? $user_name : ''; ?>">
                                <input name="user_id" type="hidden" class="form-control static-text" placeholder="Asset Sr. No." value="<?php echo isset($user_id) ? $user_id : ''; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="customer_address" type="text" class="form-control" placeholder="Address" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person Name 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="contact_per_name" type="text" class="form-control" placeholder="Contact Person Name">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="Country" onChange="getState(this.value);" required> 
                                    <?php foreach ($country as $contries) { ?> 
                                        <option value="<?php echo $contries->id; ?>"><?php echo $contries->name; ?> </option>
                                    <?php } ?> 
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">State <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="State" id="State_id" onChange="getCity(this.value);" required>
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>						  
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">City <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="City" id="City_id" required>
                                    <option value="pune">pune </option>
                                    <option value="Mumbai">Mumbai</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pincode <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="Pincode" type="number" class="form-control" placeholder="Pincode" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No. <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="Telephone" type="number" class="form-control" placeholder="Telephone No." required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No. <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="Mobile" type="number" class="form-control" placeholder="Mobile No." required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="Email" type="Email" class="form-control" placeholder="Email ID" required="required">
                            </div>
                        </div>
                        <?php
                        $group_id = $this->session->userdata('group_id');
                        if ($group_id == 1) {
                            ?>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Logo <span>*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="company_logo" type="file" placeholder="" required="required" onchange="readURL(this, 'company');" accept=".png, .jpg, .jpeg,.gif">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 margin-top">
                                    <img src="http://bidvestlocal/assets/images/logo.png" id="company_logo" alt="Company Logo" height="50" width="50">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image <span>*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="profile_logo" type="file" placeholder="" required="required" onchange="readURL(this, 'profile');" accept=".png, .jpg, .jpeg,.gif">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 margin-top">
                                <img src="http://bidvestlocal/assets/images/img.jpg" id="profile_logo" alt="Profile Logo" height="50" width="50">
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

<script type="text/javascript">
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
                    $('#company_logo').attr('src', e.target.result);
                } else {
                    $('#profile_logo').attr('src', e.target.result);
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<style>
    /*    input[type=file]{
            width:90px;
            color:transparent;
        }*/
    .margin-top{
        margin-top: 10px;
    }
</style>
