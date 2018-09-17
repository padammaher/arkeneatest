<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h4>Edit Asset</h4>						
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>Assets_edit" method="POST">
                    <!--                <form class="form-horizontal form-label-left">-->
                    <?php
                    foreach ($Assets_edit_data as $list) {
//                        var_dump($list);
                        ?>


                        <!--DG0001-->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Code</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">  
                                <input type="text" class="form-control" value="<?php echo set_value('Assetcode',$list['code']); ?>" required="required"  id="Assetcode" name="Assetcode" readonly>
                            </div>
                             <?php if (form_error('Assetcode')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assetcode'); ?></span>
                            <?php }
                            ?>
                        </div>



                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="Customerlocation" name="Customerlocation">
                                    <option value="">Select Customer Location</option>
                                    <option value="<?php echo $list['locid']; ?>" selected><?php echo $list['location']; ?></option>
                                    <?php foreach ($location_list as $loc_list) {
                                        if($list['locid'] == $loc_list['id']){ } else {
                                        ?>
                                        <option value="<?php echo $loc_list['id']; ?>"><?php echo $loc_list['location']; ?></option>
                                    <?php } }?>

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
                                <select class="form-control" required="required" id="Assetcategory" name="Assetcategory">
                                    <option value="">Select Category</option>
                                    <option value="<?php echo $list['asset_catid']; ?>" selected><?php echo $list['assetcategoryname']; ?></option>
                                    <?php foreach ($category_list as $category_list) {
                                        if($list['asset_catid'] == $category_list['id']){ } else { ?>
                                        <option value="<?php echo $category_list['id']; ?>"><?php echo $category_list['name']; ?></option>
                                    <?php } } ?>


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
                                <select class="form-control" required="required"  id="Assettype" name="Assettype">
                                    <option value="">Select Type</option>
                                    <option value="<?php echo $list['asset_typeid']; ?>" selected><?php echo $list['assettypename']; ?></option>
                                    <?php foreach ($type_list as $typelistdata) { 
                                         if($list['asset_typeid'] == $typelistdata['id']){ } else { ?>                                     
                                        <option value="<?php echo $typelistdata['id']; ?>"><?php echo $typelistdata['name']; ?></option>
                                    <?php }} ?>
                                </select>
                                </select>
                            </div>
                             <?php if (form_error('Assettype')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assettype'); ?></span>
                            <?php }
                            ?>
                        </div>
                        <!--Fuel: diesel HSD, O/p Voltage 220V AC-->
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Specification</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" value="<?php echo $list['specification'] ?> " required="required" id="assetspecification" name="assetspecification">
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Serial No. *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" value="<?php echo $list['serial_no'] ?>" required="required" id="Assetserialno" name="Assetserialno">
                            </div>
                             <?php if (form_error('Assetserialno')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Assetserialno'); ?></span>
                            <?php }
                            ?>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Make *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" value="<?php echo $list['make'] ?>" id="Make" name="Make">
                            </div>
                            <?php if (form_error('Make')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Make'); ?></span>
                            <?php }
                            ?>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Model No. *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" value="<?php echo $list['model'] ?>" required="required" id="Modelno" name="Modelno">
                            </div>
                             <?php if (form_error('Modelno')) { ?>
                                <span class="mrtp10 text-center englable" style="color:#ff3333; font-size: 15px; "><?php echo form_error('Modelno'); ?></span>
                            <?php }
                            ?>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="2" style="resize: vertical;" required="required" id="Description" name="Description"><?php echo $list['description'] ?> </textarea>
                            </div>
                        </div> 


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Movable / Immovable *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="Movable" name="Movable">

                                    <option value="<?php echo $list['ismovable'] ?>"></option>

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

              <input type="checkbox" name="isactive" class="flat" <?php if(!empty($isactive)) { echo ($isactive)== "on"? 'checked': ''; } else {echo ($list['isactive'])=="1"?'checked':''; }?>> Active
            </label>
           </div>
     </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="post"  value="update">
                                <input type="hidden" name="id"  value="<?php echo $list['id']; ?>">
                                
                                <button type="submit" name="assets_edit_button" class="btn btn-primary">Save</button>
                                <a href="<?php echo base_url('Assets_list'); ?>" type="button" class="btn btn-default">Cancel</a>

                            </div>
                        </div>
                    <?php } ?>
                </form>					

            </div>
        </div>
    </div>
</div>

