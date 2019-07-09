<?php
$managedLocationId = '';
$managedLocationId = $this->input->post('asset_location_post_id');
?>			
<?php
$back_action = '';
$back_action = $this->input->post('back_action');
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Asset Location</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left"  id="Add_Task" name="Add_Task" method="POST" action="<?php echo base_url(); ?>Assets_location_add">


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">             
                            <select class="form-control" name="assetcode" required="required" <?php echo $managedLocationId == '' ? '' : 'readonly="readonly"'; ?> >
                                <?php
                                if (empty($managedLocationId)) {
                                    ;
                                    ?>                  
                                    <option value="">Select Asset Code</option>
                                <?php } ?>   
                                <?php
                                if (!empty($managedLocationId)) {
                                    foreach ($asset_code_list as $asset_id_list) {
                                        if ($managedLocationId == $asset_id_list['id']) {
                                            ?>
                                            <option value="<?php echo $asset_id_list['id']; ?>" <?php echo set_value('assetcode', $managedLocationId) == $asset_id_list['id'] ? 'selected' : '' ?> ><?php echo $asset_id_list['code']; ?></option>
                                            <?php
                                        }
                                    }
                                } else {
                                    foreach ($asset_code_list as $asset_id_list_2) {
                                        ?>
                                        <option value="<?php echo $asset_id_list_2['id']; ?>" <?php echo set_value('assetcode') ? 'selected' : ''; ?> ><?php echo $asset_id_list_2['code']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>             
                        </div>
                        <?php if (form_error('assetcode')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('assetcode'); ?></span>
                        <?php } ?>
                    </div>  

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Location <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="asset_location" class="form-control" placeholder="Enter Asset Location" required="required"  value="<?php echo set_value('asset_location'); ?>" >
                        </div>
                        <?php if (form_error('asset_location')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_location'); ?></span>
                        <?php } ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="asset_address" class="form-control" rows="2" style="resize: vertical;" placeholder="Enter Address" required="required"><?php echo set_value('asset_address'); ?></textarea>
                        </div>
                        <?php if (form_error('asset_address')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_address'); ?></span>
                        <?php } ?>
                    </div>
                    <!--                    name="asset_lat"-->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Latitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="asset_lat" id="asset_lat" value="<?php echo set_value('asset_lat'); ?>"   class="form-control" placeholder="Enter Latitude"  value="<?php echo set_value('asset_lat'); ?>"  onchange="CheckDecimallatitude(Add_Task.asset_lat)">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Longitude</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="asset_long" id="asset_long" value="<?php echo set_value('asset_long'); ?>"    class="form-control" placeholder="Enter Longitude" onchange="CheckDecimalLongitude(Add_Task.asset_long)">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Person *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="asset_contactperson" value="<?php echo set_value('asset_contactperson'); ?>" id="asset_contactperson" class="form-control" placeholder="Enter Contact Person" required="required"  onchange="" >
                        </div>
                        <?php if (form_error('asset_contactperson')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactperson'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No. <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" name="asset_contactno" value="<?php echo set_value('asset_contactno'); ?>"   id="asset_contactno" class="form-control" minlength="10" maxlength="11" placeholder="Enter Contact No" required="required" onchange="Checkcontactno(Add_Task.asset_contactno)">
                        </div>
                        <?php if (form_error('asset_contactno')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactno'); ?></span>
                        <?php } ?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Email <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<!--                            <input type="text" name="asset_contactemail" class="form-control" placeholder="joy@bdv.co.za" data-validate-length-range="6" data-validate-words="2" required="required"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">-->
                            <!-- <input type="text" name="asset_contactemail" id="asset_contactemail" value="<?php echo set_value('asset_contactemail'); ?>" class="form-control" placeholder="joy@bdv.co.za" pattern="[^@\s]+@[^@\s]+" title="in-valid"  required="required" > -->
                            <!-- <input type="text" class="form-control" placeholder="joy@bdv.co.za" pattern="" required /> -->
                            <input type="text" name="asset_contactemail" id="asset_contactemail" value="<?php echo set_value('asset_contactemail'); ?>" class="form-control" placeholder="Enter Contact Email" required="required">

                        </div>
                        <?php if (form_error('asset_contactemail')) { ?>
                            <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('asset_contactemail'); ?></span>
                        <?php } ?>
                    </div> 
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                            <input type="checkbox" name="status" id="status" class="flat" checked> Active
                        </div>
                    </div>		

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="asset_loc_add_button" id="asset_loc_add_button" class="btn btn-primary">Save</button>
                            <?php if (!empty($back_action)) { ?>
                                <input type="hidden" name="back_action" value="<?php echo set_value('back_action', $back_action); ?>" >
                                <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('Assets_location_list'); ?>" type="button" class="btn btn-default">Cancel</a>
                            <?php } ?>


                        </div>
                    </div>

                </form>					

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    function CheckDecimallatitude(inputtxt)
    {
        var decimal = /^[-,+,0-9,A-Z,a-z]+\.?[0-9,A-Z,a-z]*$/;
        if (decimal.test(inputtxt.value) == false)
        {
            // alert('Enter only Number');
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
            // alert('Enter only Number');
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
            // alert('Enter Alpha numeric Number');
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
            // alert('Enter only Number');
            // $("#asset_contactno").attr('')
            $("#asset_contactno").attr('required', 'true');
            // document.getElementById("asset_contactno").required = true;
            document.getElementById("asset_contactno").required = true;
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
            // alert("Not a valid e-mail address");
            // document.getElementById('asset_contactemail').;
            document.getElementById('asset_contactemail').value = '';
            return false;
        }
    }


    $(document).ready(function () {
        $("#asset_contactno").keypress(function (e) {
            $('span.error-keyup-3').remove();
            var inputVal = $(this).val();

            if (inputVal.trim() == "") {
                $('span.error-keyup-3').remove();
            } else {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $(this).after('<span class="error error-keyup-3" style="color:red">Special Character Not Allow.</span>');
                    return false;
                } else if (inputVal.length < 10) {
                    // $("#trigger_button").prop("disabled", true);
                    // $(this).after('<span class="error error-keyup-3" style="color:red">Enter minimum 10 number.</span>');
                }
                if (inputVal.length > 9) {
                    // $("#trigger_button").prop("disabled", false);
                }
            }
        });

        $("#asset_contactemail").change(function (e) {
            $('span.error-keyup-3').remove();
            var emailAddress = $(this).val();

            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(emailAddress)) {
                $(this).after('<span class="error error-keyup-3" style="color:red">Enter valid email id</span>');
                $("#asset_loc_add_button").prop("disabled", true);
            } else {
                $("#asset_loc_add_button").prop("disabled", false);
            }

        });
    });
</script>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close" id="close_map">&times;</span>
            <h2>Select Address to get Latitude and Longitude</h2>
        </div>
        <div class="modal-body">
            <div id="floating-panel">
                <input id="address" type="textbox" class="addBar" value="">
                <input id="submit" type="button" class="addBar" value="Get Address">
            </div>

            <div id="map"></div>
        </div>

    </div>

</div>
<style>

    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
        width: 100%;
        top: -6px;
    }
    .modal-body
    {
        padding: 0px;
    }

    #floating-panel {
        position: absolute;


        z-index: 5;
        background-color: #fff;


        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        /*padding-left: 10px;*/
        width: 350px;
        background: none;
        padding-top: 5px;
        left:35%;
    }
    .addBar
    {
        height: 28px;padding: 0px 6px;line-height: 10px;
    }
</style>


<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: {lat: -31.20340495091738, lng: 24.547855854034424}
        });
        //-31.20340495091738, 24.547855854034424
        var geocoder = new google.maps.Geocoder();
        document.getElementById('submit').addEventListener('click', function () {
            geocodeAddress(geocoder, map);
        });
        //Add listener
        google.maps.event.addListener(map, "click", function (event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            $('#asset_lat').val(latitude);
            $('#asset_long').val(longitude);
            $('#myModal').css('display', 'none');
        }); //end addListener

    }

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeubS8KjHiTu2TI7I5X_4IjGZCI0zeKGY&callback=initMap">
</script>
<style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 50px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        /*padding: 2px 16px;*/
        background-color: #172d44;
        color: white;
        font-size: 14px;
    }
    .modal-header h2 {
        margin: 0px !important;
        padding: 5px !important;
        font-size: 14px;
    }
    .modal-body {padding: 0px; height: 400px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: #5cb85c;
        color: white;
    }
</style>
<script>
// Get the modal
    var modal = document.getElementById('myModal');
// Get the button that opens the modal
    var btn = document.getElementById("asset_lat");
    var btn1 = document.getElementById("asset_long");
// Get the <span> element that closes the modal

    var spanId = document.getElementById("close_map");
// When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
        google.maps.event.trigger(map, "resize");
    }
    btn1.onclick = function () {
        modal.style.display = "block";
        google.maps.event.trigger(map, "resize");
    }

// When the user clicks on <span> (x), close the modal
    spanId.onclick = function () {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>