<?php echo form_open('assetsmanagement/emp_asst_allocation', array('id' => 'form_emp_ast_allocation', 'class' => 'form_emp_ast_allocation')); ?>
<div id="assets_allocation" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Asset Allocation</h4>                        
            </div>
            <div class="modal-body">
                <?php
                $subcatid = $this->uri->segment(3);
                if ($subcatid === NULL) {
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-field">
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'ast_allo_main_cat_id',
                                    'name' => 'ast_allo_main_cat_id',
                                    'class' => 'browser-default',
                                    'placeholder' => 'Tems',
                                        // 'data-error' => '.errorasstallocation1',
                                        ), $main_category_dropdown);
                                ?>
    <?php echo form_error('ast_allo_main_cat_id'); ?>
                            </div> 
                            <!----<div class="errorasstallocation1" style="color:red"></div>--->
                        </div>

                        <div class="col-sm-6">
                            <div class="input-field">
                                <label for="remark" class="active">Sub Assets</label>               
                                <?php echo form_label(lang(), 'ast_allo_sub_cat_id'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'ast_allo_sub_cat_id',
                                    'name' => 'ast_allo_sub_cat_id',
                                    'class' => 'browser-default',
                                        // 'data-error' => '.errorasstallocation2',
                                        ), $sub_category_dropdown);
                                ?>
                            </div> 
                            <div class="errorasstallocation2" style="color:red"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-6">
                            <div class="input-field">
                                <label for="remark" class="active">Assets Name</label>               
                                <?php echo form_label(lang(), 'assets_name'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'assets_name',
                                    'name' => 'assets_name',
                                    'class' => 'browser-default',
                                        //'data-error' => '.errorasstallocation3'
                                        ), $assets_dropdown);
                                ?>
                            </div>
                        </div>
                        <!--- <div class="errorasstallocation3" style="color:red"></div>--->
                        <div class="col-sm-6" id="per_devices" name="per_devices"></div>

                        <!--  <div class="col-sm-12" id="per_devices" name="per_devices"></div>-->


                        <div class="col-sm-6">
                            <div class="input-field">
                                <label for="remark" class="active">User Name</label>               
                                <?php echo form_label(lang(), 'user_id'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'user_id',
                                    'name' => 'user_id',
                                    'class' => 'browser-default',
                                    'data-error' => '.errorasstallocation4',
                                        ), $user_name);
                                ?>
                            </div> 
                            <div class="errorasstallocation4" style="color:red"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                        </div>  
                    </div>
<?php } else { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="remark" class="active">Assets Main Category Name</label>
                            <div class="input-field" style="margin-top: 0rem;">
                                <!--                                <label for="remark" class="active">Assets Main Category Name</label>       -->
                                <input type="text" name="ast_maincatname" id="maincatid" value="" readonly="true"/>
                                <input type="hidden" name="ast_main_cat_id" id="ast_main_cat_id" value=""/>

    <?php echo form_error('ast_allo_main_cat_id'); ?>
                            </div> 
                            <!----<div class="errorasstallocation1" style="color:red"></div>--->
                        </div>

                        <div class="col-sm-6">
                            <label for="remark" class="active">Sub Assets</label>
                            <div class="input-field" style="margin-top: 0rem;">
                                <!--                                <label for="remark" class="active">Sub Assets</label>               -->
    <?php echo form_label(lang(), 'ast_allo_sub_cat_id'); ?>
                                <input type="text" name="ast_subcatname" id="ast_subcatname" value="" readonly="true"/>
                                <input type="hidden" name="ast_sub_cat_id" id="ast_sub_cat_id" value=""/>
                            </div> 
                            <div class="errorasstallocation2" style="color:red"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-6">
                            <div class="input-field">
                                <label for="remark" class="active">Assets Name</label>               
                                <?php echo form_label(lang(), 'assets_name'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'assets_name',
                                    'name' => 'assets_name',
                                    'class' => 'browser-default',
                                        //'data-error' => '.errorasstallocation3'
                                        ), $assets_dropdown);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-field">
                                <label for="remark" class="active">User Name</label>               
                                <?php echo form_label(lang(), 'user_id'); ?>
                                <?php
                                echo form_dropdown(array(
                                    'id' => 'user_id',
                                    'name' => 'user_id',
                                    'class' => 'browser-default',
                                    'data-error' => '.errorasstallocation4',
                                        ), $user_name);
                                ?>
                            </div> 
                            <div class="errorasstallocation4" style="color:red"></div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                        </div>  
                    </div>


<?php } ?>
            </div>                                     
        </div>  
    </div>
</div>
<?php form_close() ?>

<script>

    $(document).ready(function () {
        // $('select[name="ast_allo_sub_cat_id"]').hide();
        $("#ast_allo_main_cat_id").change(function () {
            var main_cat_val = $("select#ast_allo_main_cat_id option:selected").val();
            sub_cat(main_cat_val);
        });

        function sub_cat(main_cat_val)
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/getsubcat',
                data: {'main_cat_name': main_cat_val},
                success: function (data) {
                    // $('select[name="ast_allo_sub_cat_id"]').show();
                    $('select[name="ast_allo_sub_cat_id"]').html(data.content).trigger('liszt:updated').val();
                    $("#ast_allo_sub_cat_id").val($("#ast_allo_sub_cat_id option:first").val());
                    $('#ast_allo_sub_cat_id').material_select();

                }
            });
        }
    });
</script>



<script>
    $(document).ready(function () {
        $("#ast_allo_sub_cat_id").change(function () {
            var sub_cat_val = $("select#ast_allo_sub_cat_id option:selected").val();
            asst_name(sub_cat_val);
        });

        function asst_name(assets_name_val)
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/get_asst_name',
                data: {'sub_cat_name': assets_name_val},
                success: function (data) {
                    $('select[name="assets_name"]').html(data.content).trigger('liszt:updated').val();
                    $("#assets_name").val($("#assets_name option:first").val());
                    $('#assets_name').material_select();

                }

            });
        }

    });
</script>



     <script>

  $("#assets_allocation1").click(function () {
    var sub_cat_val = $("#subcatid").val();
      asst_name(sub_cat_val);
    });
    
          function asst_name(assets_name_val)
        { 
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/get_asst_name',
                data: {'sub_cat_name': assets_name_val},
                success: function (data) {
                    $('select[name="assets_name"]').html(data.content).trigger('liszt:updated').val();
                    $("#assets_name").val($("#assets_name option:first").val());
                    $('#assets_name').material_select();

                }

            });
        }
    

</script>