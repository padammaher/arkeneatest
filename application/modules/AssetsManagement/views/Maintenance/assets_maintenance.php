<?php  foreach ($maintenance_asst as $list) { //var_dump($list); ?>
<?php echo form_open('assetsmanagement/assets_maintenance/'. $list['maid'], array('id' => 'form_assets_maintenance_id')); ?>
 <div class="modal fade" id="assets_maintenance-<?php echo $list['maid'] ?>" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Maintenance of :- <?php echo $list['assets_name'] ?> </h4>                        
            </div>
          <div class="modal-body">

                    <div class="row">
                        <?php //var_dump($list); ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-field"  style="margin-left: 1rem;">
                                    <label for="remark" class="active"><b style="color:#5F5F5F;">Assets Main Category Name</b></label>  
                                    <?php
                                    echo form_input(array(
                                        'id' => 'ast_main_cat_id',
                                        'name' => 'ast_main_cat_id',
                                        'placeholder' => 'Select Date',
                                        'data-error' => '.errorTxtGoal3',
                                        'value' => $list['ast_main_cat_id'],
                                        'style' => "display: none"
                                    ));
                                    ?>
                                    <div style="height:10px;"></div>
                                    <p><?php echo $list['ast_main_cat_name'] ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-field">

                                    <label for="remark" class="active"><b style="color:#575656;">Assets Sub Category Name</b></label> 
                                    <?php
                                    echo form_input(array(
                                        'id' => 'ast_sub_cat_id',
                                        'name' => 'ast_sub_cat_id',
                                        'placeholder' => 'Select Date',
                                        'data-error' => '.errorTxtGoal3',
                                        'value' => $list['ast_sub_cat_id'],
                                        'style' => "display: none"
                                    ));
                                    ?>
                                    <div style="height:10px;"></div>
                                    <?php echo $list['ast_sub_cat_name'] ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-field">
                                    <label for="remark" class="active"><b style="color:#575656;">Assets Name</b></label> 
                                    <?php
                                    echo form_input(array(
                                        'id' => 'maid',
                                        'name' => 'maid',
                                        'placeholder' => 'Select Date',
                                        'data-error' => '.errorTxtGoal3',
                                        'value' => $list['maid'],
                                        'style' => "display: none"
                                    ));
                                    ?>
                                    <div style="height:10px;"></div>
                                    <?php echo $list['assets_name'] ?>
                                </div>
                                <input type="hidden" name="hid"  value="<?php echo $list['id']; ?>"/>
                            </div>
                            
                             <div class="col-sm-4">
                                  <div class="input-field"  style="margin-left: 1rem;">
                                    <label for="remark" class="active"><b style="color:#575656;">Last Service</b></label> 
                                    
                                    <div style="height:10px;"></div>
                                    <?php echo $list['cnt'] ?>
                                </div>
                                <input type="hidden" name="hid"  value="<?php echo $list['id']; ?>"/>
                            </div>
                        </div>
                            <div class="">
                        <div class="col-sm-6">
                                <div class="input-field">
                                    <?php echo form_label(lang('servicedate'), 'servicedate', array('for' => 'servicedate')); ?>
                                    <?php
                                    $Pid = "compareDate(" . $list['maid'] . ")";
                                    echo form_input(array(
                                        // 'id' => 'servicedate',
                                        'id' => 'servicedate' . $list['maid'],
                                        'name' => 'servicedate',
                                        'placeholder' => 'Select Date',
                                        'data-format' => 'yyyy-mm-dd',
                                        'class' => 'servicedate',
                                        'data-error' => '.errorcalender1',
                                        'value' => $list['servicedate'],
                                        'onchange' => $Pid
                                    ));
                                    ?>
                                    <div class="errorcalender1"  class="error"></div>
                                    <?php echo form_error('servicedate'); ?>
                                </div> 
                            </div>
                         <div class="col-sm-6">
                                <div class="input-field">
                                    <?php echo form_label(lang('nextservicedate'), 'nextservicedate', array('for' => 'nextservicedate')); ?>
                                    <?php
                                    $Pid = "compareDate(" . $list['maid'] . ")";
                                    echo form_input(array(
                                        'id' => 'nextservicedate' . $list['maid'],
                                        'name' => 'nextservicedate',
                                        'placeholder' => 'Select Date',
                                        'data-format' => 'yyyy-mm-dd',
                                        'class' => 'nextservicedate',
                                        'data-error' => '.errorcalender2',
                                        'value' => $list['nextservicedate'],
                                        'onchange' => $Pid
                                    ));
                                    ?>
                                    <div class="errorcalender2"></div>
                                    <?php echo form_error('nextservicedate'); ?>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                        </div>
                    </div>
                       

                        

                    </div>
                </div>
            </div>                                     
        </div>  
            </form>
    </div>
    </div>
    <?php //echo form_close(); ?>
<?php } ?>

<script type="text/javascript">
    /* Date picker validation Fucntions */
    $(document).ready(function () {
        $(".servicedate").click(function () {
            $('.servicedate').pickadate({
                selectYears: true,
                selectMonths: true
            });
        });
    });
</script>

<script type="text/javascript">
    /* Date picker validation Fucntions */
    $(document).ready(function () {
        $(".nextservicedate").click(function () {
            $('.nextservicedate').pickadate({
                selectYears: true,
                selectMonths: true
            });
        });
    });
</script>


<script>
    function compareDate(txtid) {
        var a = document.getElementById('servicedate' + txtid).value;
        var b = document.getElementById('nextservicedate' + txtid).value;
        //  alert(a);
        if (a >= b) {
            ///  alert("Next Service Date Not Less than Current Service Date");
            document.getElementById('nextservicedate' + txtid).value = "";
            // document.write('Next Service Date Not Less than Current Service Date');
        }
        else {
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>