<?php foreach ($list_sub_category as $list) { ?>
    <?php  echo form_open('assetsmanagement/assets_sub_category/' . $list['id'], array('id' => 'form_assets_main_category_id' . $list['id'], 'class' => 'form_assets_main_category_id' . $list['id'])); ?>
    <div id="edit_category-<?php echo $list['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <?php var_dump($list); ?>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Category<?php echo "-" . $list['ast_sub_cat_name'] ?></h4>
                </div>
                <div class="modal-body all-padding-20">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-field">

                                <label for="remark" class="active">Main Assets</label>               
                                <?php echo form_label(lang(), 'ast_main_cat_id'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'ast_main_cat_id',
                                    'name' => 'ast_main_cat_id',
                                    'class' => 'browser-default ',
                                    'data-error' => '.errorcat',
                                        ), $main_category_dropdown, set_value('ast_main_cat_id', $list['ast_main_cat_id']));
                                ?>
                                <div class="errorcat"> </div>
                                <?php echo form_error('ast_main_cat_id'); ?>
                            </div> 
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-12">
                            <div class="input-field">
    <!--                                <input type="hidden" name="hid" value="<?php //echo $list['id']     ?>">-->
                                <?php echo form_label(lang(), 'ast_sub_cat_name'); ?>
                                <?php
                                echo form_input(array(
                                    'name' => 'ast_sub_cat_name',
                                    'id' => 'ast_sub_cat_name',
                                    'placeholder' => 'Enter Category',
                                    'class' => 'browser-default ',
                                    'value' => $list['ast_sub_cat_name'],
                                    'data-error' => '.errorname',
                                ));
                                ?>
                                <div class="errorname"></div>
                                <?php echo form_error('ast_sub_cat_name'); ?>
                            </div> 
                        </div>
                    </div>                                        
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                        </div> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
    </form>
<?php } ?>
<?php form_close(); ?>

