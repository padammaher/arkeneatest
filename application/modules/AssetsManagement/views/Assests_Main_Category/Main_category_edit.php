<?php foreach ($list_main_category as $list) { ?>
    <?php //var_dump($list_main_category);  ?>
    <?php // echo form_open_multipart('assetsmanagement/assets_main_category/' . $list['id'], array('id' => 'form_edit_ast_main_cat_id' . $list['id'], 'class' => 'form_edit_ast_main_cat_id' . $list['id']));  ?>
    <?php echo form_open_multipart('assetsmanagement/assets_main_category/' . $list['id'], array('id' => 'form_edit_ast_main_cat_id', 'class' => 'form_edit_ast_main_cat_id')); ?>  
    <!-- Modal -->
    <div class="modal fade" id="edit_category<?php echo $list['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Category Title:<?php echo "-" . $list['ast_main_cat_name'] ?></h4>
                </div>
                <div class="modal-body all-padding-20">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-field">

                                <?php echo form_label(lang('ast_main_cat_name'), 'ast_main_cat_name', array('for' => 'ast_main_cat_name')); ?>
                                <?php
                                echo form_input(array(
                                    'name' => 'ast_main_cat_name',
                                    'id' => 'ast_main_cat_name',
                                    'placeholder' => 'Enter Category',
                                    'class' => 'browser-default ',
                                    'value' => $list['ast_main_cat_name'],
                                    'data-error' => '.errorMainCatedit1'
                                ));
                                ?>
                                <div class="errorMainCatedit1"></div>
                                <?php echo form_error('ast_main_cat_name'); ?>
                            </div> 
                        </div>

                        <div class="col-sm-12">
                            <div class="file-field input-field">
                                <div class="btn btn-warning2 btn-sm">Upload Image
                                    <?php
                                    echo form_input(array(
                                        'type' => 'file',
                                        'id' => 'assets_img',
                                        'name' => 'assets_img',
                                        'class' => 'form-control',
                                        'data-error' => '.errorMainCatEdit2',
                                        'placeholder' => 'type (png, jpeg, jpg)',
                                    ));
                                    ?>
                                </div>
                                <div class="file-path-wrapper">
                                    <?php
                                    echo form_input(array(
                                        'id' => 'assets_img',
                                        'name' => 'assets_img',
                                        'class' => 'file-path',
                                        'placeholder' => 'type (png, jpeg, jpg)',
                                        'value' => $list['assets_img'],
                                    ));
                                    ?>
                                </div>
                                <div class="errorMainCatEdit2"></div>
                            </div>      
                        </div>
                    </div>                                        
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="submit" name="main_cat_id" value="<?php echo $list['id'] ?>" class="btn btn-warning2 btn-sm">Submit</button>
                        </div> 
                    </div>
                </div>            
            </div>
        </form>
        </div>
    </div>
<?php }?>