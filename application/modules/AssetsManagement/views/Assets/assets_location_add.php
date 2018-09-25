<?php $managedLocationId='';  $managedLocationId=$this->input->post('asset_location_post_id');?>			
<?php $back_action='';
 $back_action=$this->input->post('back_action');
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
                            <select class="form-control" name="assetcode" required="required" <?php echo $managedLocationId == ''?'':'readonly="readonly"';?> >
<?php  if(empty($managedLocationId)) {;?>                  
                  <option value="">Select Asset Code</option>
<?php } ?>   
<?php if(!empty($managedLocationId)){
foreach ($asset_code_list as $asset_id_list) { 
if($managedLocationId == $asset_id_list['id']){    ?>
<option value="<?php echo $asset_id_list['id'];?>" <?php echo set_value('assetcode',$managedLocationId)==$asset_id_list['id']? 'selected':'' ?> ><?php echo $asset_id_list['code'];?></option>
<?php } } } else {                 
 foreach ($asset_code_list as $asset_id_list_2) { ?>
    <option value="<?php echo $asset_id_list_2['id']; ?>" <?php echo set_value('assetcode')?'selected':'';?> ><?php echo $asset_id_list_2['code']; ?></option>
<?php } } ?>
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

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="asset_loc_add_button" class="btn btn-primary">Save</button>
                            <?php if(!empty($back_action)) {?>
                             <input type="hidden" name="back_action" value="<?php echo set_value('back_action',$back_action);?>" >
                                <a href="<?php echo base_url($back_action); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php }else {?>
                            <a href="<?php echo base_url('Assets_location_list'); ?>" type="button" class="btn btn-default">Cancel</a>
                                <?php }?>


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
    
    
    
</script>