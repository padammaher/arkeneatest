<style>
/*    .php_alert {
    float: left;
    margin: 0 0 0 20px;
    padding: 3px 10px;
    color: #FFF;
    border-radius: 3px 4px 4px 3px;
    background-color: #CE5454;
    min-width: 170px;
    white-space: pre;
    position: relative;
    left: -15px;
    opacity: 1;
    z-index: 1;
    transition: 0.15s ease-out;
    background-color: #CE5454;

}
.php_alert{
    border: 1px solid transparent;
}
.item .php_alert::after {
    content: '';
    display: block;
    height: 0;
    width: 0;
    border-color: transparent #CE5454 transparent transparent;
    border-style: solid;
    border-width: 11px 7px;
    position: absolute;
    left: -13px;
    top: 1px;
}*/
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Add Asset</h4>           
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <!--<form class="form-horizontal form-label-left"  >-->
                <form class="form-horizontal form-label-left"  action="<?php echo base_url(); ?>Assets_add"  method="POST" >
                   

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" required="required" placeholder="Enter Asset Code" id="Assetcode" name="Assetcode" value="<?php echo set_value('Assetcode');?>" pattern="[a-zA-Z0-9]+">
                        </div>
                         <?php if (form_error('Assetcode')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assetcode'); ?></span>
                                <!--<div class="php_alert"><?php echo form_error('Assetcode'); ?></div>-->
                            <?php }?>                      
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Customerlocation" name="Customerlocation" required>
                                <option value="">Select Location</option>
                                <?php foreach ($location_list as $loc_list) { ?>
                                    <option value="<?php echo $loc_list['id']; ?>" <?php echo (set_value('Customerlocation'))== $loc_list['id'] ? 'selected':''; ?> ><?php echo $loc_list['location_name']; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <?php if (form_error('Customerlocation')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Customerlocation'); ?></span>
                            <?php }
                            ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Category *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Assetcategory" name="Assetcategory" required>
                                <option value="">Select Category</option>
                                <?php foreach ($category_list as $category_list) { ?>
                                    <option value="<?php echo $category_list['id']; ?>"  <?php echo (set_value('Assetcategory'))== $category_list['id'] ? 'selected':''; ?>><?php echo $category_list['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <?php if (form_error('Assetcategory')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assetcategory'); ?></span>
                            <?php }
                            ?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Type *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control"  id="Assettype" name="Assettype" required>
                                <option value="">Select Type</option>
                                <?php foreach ($type_list as $typelistdata) { ?>
                                    <option value="<?php echo $typelistdata['id']; ?>" <?php echo (set_value('Assettype'))== $typelistdata['id'] ? 'selected':''; ?>><?php echo $typelistdata['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <?php if (form_error('Assettype')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assettype'); ?></span>
                            <?php }
                            ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Specification</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Enter Asset Specification"  id="assetspecification" name="assetspecification" value="<?php echo set_value('assetspecification');?>">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Serial No. *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Enter Asset Serial No" required="required" id="Assetserialno" name="Assetserialno" pattern="[a-zA-Z0-9]+" value="<?php echo set_value('Assetserialno');?>">
                        </div>
                           <?php if (form_error('Assetserialno')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assetserialno'); ?></span>
                            <?php }
                            ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Make *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Enter Make" required="required" id="Make" name="Make" pattern="[a-zA-Z0-9]+"  value="<?php echo set_value('Make');?>">
                        </div>
                          <?php if (form_error('Make')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Make'); ?></span>
                            <?php }
                            ?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Model No. *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control" placeholder="Enter Model No" required="required" id="Modelno" name="Modelno" pattern="[a-zA-Z0-9]+"  value="<?php echo set_value('Modelno');?>">
                        </div>
                          <?php if (form_error('Modelno')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Modelno'); ?></span>
                            <?php }
                            ?>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" rows="2" style="resize: vertical;" placeholder="Enter Description" id="Description" name="Description"><?php echo set_value('Description');?></textarea>
                        </div>                          
                    </div>  

                    
                    <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="xdisplay_inputx item form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" name="startdate" id="single_cal1" placeholder="Start Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" value="<?php echo set_value('startdate');?>" required="required">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>

                                </div>
                            <?php if (form_error('startdate')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('stockdate'); ?></span>
                            <?php } ?>
                    </div>
                    <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <div class="xdisplay_inputx item form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" name="enddate" id="single_cal3" placeholder="End Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" value="<?php echo set_value('enddate');?>" required="required">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                                    </div>

                                </div>
                            <?php if (form_error('enddate')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('stockdate'); ?></span>
                            <?php } ?>
                    </div> 

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Movable / Immovable *</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="Movable" name="Movable" required>
                                <option value="">Select Type</option>
                                <option value="1">Movable</option>
                                <option value="2">Immovable</option>
                            </select>
                        </div>
                        <?php if (form_error('Movable')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Movable'); ?></span>
                            <?php }
                            ?>
                    </div> 
                    <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                      <label><?php $isactive=set_value('isactive'); ?>                          

                        <input type="checkbox" name="isactive" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "on"? 'checked': ''; } else {echo 'checked'; }?>> Active
                            </label>
                    </div>
              </div> 
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<!--                            <input type="hidden" name="assets_add_submit" value="assets_add_submit">                                   -->
                            <button type="submit" name="assets_add_button" id="assets_add_button" class="btn btn-primary">Save</button>
                            <a href="<?php echo base_url('Assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                        </div>
                    </div>

                </form>         

            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
      
     $("#Assetcodeold").change(function ()
            {
                   
                var options;
                $.ajax({
                    url: '<?php echo base_url(); ?>AssetsManagement/Check_assetcode_is_exist',
                    type: 'post',
                    dataType: 'text',
                    data: {assetcode: this.value},
                    success: function (res) {
                        if(res >=1)
                        {                           
                            $("#Assetcode").css('border','1px solid #CE5454');                          
                            $(".assetcodeexist").text('Asset code already exist..!');
//                            $("#postbutton").disabled=true;
                            document.getElementById("assets_add_button").disabled = true;
                        }
                        else
                        {                          
                            $(".assetcodeexist").text('');
//                            alert($(".serialnumexist").text());
//                            if($(".serialnumexist").text() == ""){
                             document.getElementById("assets_add_button").disabled = false;
//                         }
                        }
                      
                    }
                });
            });
});
</script>