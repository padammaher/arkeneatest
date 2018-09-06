<div id="add_assets_sub_category" class="modal fade" role="dialog" tabindex="-1" style="z-index: 1900;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Sub Category</h4>                        
            </div>
            <div class="modal-body">
                <?php echo form_open('assetsmanagement/assets_sub_category', array('id' => 'form_add_ast_sub_cat_id', 'class' => 'form_add_ast_sub_cat_id')); ?>
                <div class="row">
                    <?php
                    ?>
                    <div class="col-sm-12">
                        <div class="input-field">
                          <?php   $url = $this->uri->segment(3);
                            if ($url === NULL) { ?>
                            <label for="remark" class="active">Main Assets</label>               
                            <?php echo form_label(lang(), 'ast_main_cat_id'); ?>
                            <?php
                           
                                echo form_dropdown(array(
                                    'id' => 'ast_main_cat_id',
                                    'name' => 'ast_main_cat_id',
                                    'class' => 'browser-default',
                                    'data-error' => '.errorSubCatAdd1',
                                        ), $main_category_dropdown);
                            } else {
                                ?>
<!--                                <input type="text" name="ast_main_cat_name" value="" readonly="true"/>-->
                            <input type="hidden" name="ast_main_cat_id" value="" readonly="true"/>
                    <input type="hidden" name="for_redirect" value="" readonly="true"/>
                            <?php } ?>


                            <div class="errorSubCatAdd1"></div>
<?php echo form_error('ast_main_cat_id'); ?>
                        </div> 
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-sm-12">
                        <div class="input-field">

<?php echo form_label(lang('ast_sub_cat_name'), 'ast_sub_cat_name'); ?>
<?php
echo form_input(array(
    'id' => 'ast_sub_cat_name',
    'name' => 'ast_sub_cat_name',
    'placeholder' => 'Sub-category name',
    'data-error' => '.errorSubCatAdd2'
));
?>
                            <div class="errorSubCatAdd2"></div>
                            <?php echo form_error('ast_sub_cat_name'); ?>
                        </div> 
                    </div>
                    
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                    </div>  
                </div>
            </div>                                     
        </div>  
        </form>
    </div>
</div>     