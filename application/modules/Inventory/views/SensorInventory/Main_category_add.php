<div id="add_assets_main_category" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Main Category</h4>                        
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('assetsmanagement/assets_main_category', array('id' => 'form_add_ast_main_cat_id', 'class' => 'form_add_ast_main_cat_id')); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-field">
                            <?php echo form_label(lang('ast_main_cat_name'), 'ast_main_cat_name'); ?>
                            <?php
                            echo form_input(array(
                                'id' => 'ast_main_cat_name',
                                'name' => 'ast_main_cat_name',
                                'placeholder' => 'Category Name',
                                'data-error' => '.errorMainCatAdd1'
                            ));
                            ?>
                            <?php echo form_error('ast_main_cat_name'); ?>
                        </div> 
                        <div class="errorMainCatAdd1" style="color:red"></div>
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
                                    'data-error' => '.errorTxtaddasst4',
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
                                ));
                                ?>
                            </div>
                            <div class="errorTxtaddasst4"></div>
                        </div>      
                    </div>
<!--     DO NOT DELETE      This id is use to diff between add cate from dash board and add cate from list page.        -->
                    <input type="hidden" name="ast_main_cat_dashbrd" value=""/>
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                    </div>  
                </div>
            </div>
            <?php echo form_close() ?>
        </div>  
    </div>
</div>         




