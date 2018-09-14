<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Edit Asset Location</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" id="Add_Task" name="Add_Task"   method="POST" action="<?php echo base_url(); ?>Assets_location_list">
                    <?php foreach ($asset_location_list as $asset_location_data) { ?>
                        <!--//print_r($asset_location_data);-->


                        <input type="hidden" name="asset_loc_form_action" id="asset_loc_form_action" value="update <?php echo $asset_location_data['id']; ?>">				

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="1" >
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">             
                                <select class="form-control" name="assetcode" required readonly>
                                    <!--<option value="">Select Asset Code</option>-->
                                    <option value="<?php echo $asset_location_data['asset_tbl_id']; ?>" selected><?php echo $asset_location_data['code']; ?></option>
                                  
                                </select>     

                            </div>
                        </div>  

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Location <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_location" class="form-control" value="<?php echo $asset_location_data['location']; ?>" placeholder="Sandton" required="required">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="asset_address" class="form-control" rows="2" style="resize: vertical;" placeholder="Far East Bank, Sandton, 2014" required="required"><?php echo $asset_location_data['address']; ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_lat"  id="asset_lat"  class="form-control" value="<?php echo $asset_location_data['latitude']; ?>" placeholder="-26.107567" required="required" onchange="CheckDecimallatitude(Add_Task.asset_lat)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_long" id="asset_long" class="form-control" value="<?php echo $asset_location_data['longitude']; ?>" placeholder="28.056702" required="required" onchange="CheckDecimalLongitude(Add_Task.asset_long)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_contactperson" id="asset_contactperson" class="form-control" value="<?php echo $asset_location_data['contact_person']; ?>" placeholder="Joy" required="required" onchange="Checkcontactperson(Add_Task.asset_contactperson)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No. <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_contactno" id="asset_contactno" class="form-control" value="<?php echo $asset_location_data['contact_no']; ?>" placeholder="27 11 326 5900" required="required" onchange="Checkcontactno(Add_Task.asset_contactno)">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="asset_contactemail" id="asset_contactemail" class="form-control" value="<?php echo $asset_location_data['contact_email']; ?>" placeholder="joy@bdv.co.za"  required="required" onchange="CheckEmailvalidation(Add_Task.asset_contactemail)">
                            </div>

                        </div>              

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" value="<?php echo $asset_location_data['id']; ?>" name="asset_location_post_id"/>
                            <input type="hidden" name="asset_location_post" id="asset_user_post" value="update"/>       
                                <button type="submit" name="asset_loc_edit_button" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url('Assets_location_list'); ?>" type="button" class="btn btn-default">Cancel</a>



                            </div>
                        </div>
                    <?php } ?>

                </form>					

            </div>
        </div>
    </div>
</div><script type="text/javascript">
    function CheckDecimallatitude(inputtxt)
    {
        var decimal = /^[-,+,0-9,A-Z,a-z]+\.?[0-9,A-Z,a-z]*$/;
        if (decimal.test(inputtxt.value) == false)
        {
            alert('Enter only Number');
            document.getElementById("asset_lat").value = '';
            return false;
        }

        return true;

    }

</script>


<script type="text/javascript">
    function CheckDecimalLongitude(inputtxt)
    {
        var decimal = /^[-,+,0-9,A-Z,a-z]+\.?[0-9,A-Z,a-z]*$/;
        if (decimal.test(inputtxt.value) == false)
        {
            alert('Enter only Number');
            document.getElementById("asset_long").value = '';
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function Checkcontactperson(inputtxt)
    {
        var decimal = /^[0-9a-zA-Z]+$/;
        if (decimal.test(inputtxt.value) == false)
        {
            alert('Enter Alpha numeric Number');
            document.getElementById("asset_contactperson").value = '';
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function Checkcontactno(inputtxt)
    {
        var decimal = /^[0-9]+$/;
        if (decimal.test(inputtxt.value) == false)
        {
            alert('Enter only Number');
            document.getElementById("asset_contactno").value = '';
            return false;
        }

        return true;

    }

</script>

<script type="text/javascript">
    function CheckEmailvalidation(inputtxt) {
        // var x = document.forms["myForm"]["email"].value;
        var x = inputtxt.value;
        // alert(x);
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Not a valid e-mail address");
            document.getElementById('asset_contactemail').value = '';
            return false;
        }
    }
</script>