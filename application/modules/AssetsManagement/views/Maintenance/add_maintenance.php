
<?php foreach ($maintenance_asst as $user) { ?>
    <?php //var_dump($user); die;?>
    <div id="add-room<?php echo $user['id'] ?>" class="modal fade" role="dialog">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit :<?php echo $user['assets_name'] ?></h4>                        
                </div>
                  
                <div class="modal-body">
                    <?php echo form_open_multipart('assetsmanagement/assets_maintenance/' . $user['id'], array('id' => 'form_add_doc_id', 'class' => 'form_add_doc_id')); ?>
                    <div class="row">
                   
                        <div class="">
                            <div class="col-sm-12">
                                <div class="input-field" style="width:30%">
                                     <?php var_dump($user);?>
                                    <?php echo form_label(lang('Servicedate'), 'Servicedate', array('for' => 'Servicedate')); ?>
                                    <?php
                                    echo form_input(array(
                                        'id' => 'servicedate',
                                        'name' => 'servicedate',
                                        'placeholder' => 'Select Date',
                                        'data-format' => 'yyyy-mm-dd',
                                        'class' => 'servicedate',
                                        'data-error' => '.errorTxtGoal3',
                                        'value'=>$user['servicedate']
                                    ));
                                    ?>

                                    <div class="errorTxtCl1"></div>
                                    <?php echo form_error('room_title'); ?>
                                </div> 
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-6">
                                <div class="input-field" style="width:60%">
                                    <?php echo form_label(lang('Nextservicedate'), 'Nextservicedate', array('for' => 'Nextservicedate')); ?>
                                    <?php
                                    echo form_input(array(
                                        'id' => 'nextservicedate',
                                        'name' => 'nextservicedate',
                                        'placeholder' => 'Select Date',
                                        'data-format' => 'yyyy-mm-dd',
                                        'class' => 'nextservicedate',
                                        'data-error' => '.errorTxtGoal3',
                                         'value'=>$user['nextservicedate']
                                    ));
                                    ?>

                                    <div class="errorTxtCl2"></div>
                                    <?php echo form_error('location'); ?>
                                </div> 
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-warning2 btn-sm">Submit</button>
                            </div>

                        </div>
                    </div>
               <?php   //echo  form_close();?>
                </div>                                        
            </div>  
            </form>
        </div>
    </div>
<?php } ?>
<script type="text/javascript">
    /* Date picker validation Fucntions */
    $(document).ready(function () {
        $(".servicedate").click(function () {
            $('.servicedate').pickadate({
                selectYears: true,
                selectMonths: true,
                min: new Date(),
                
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
                selectMonths: true,
                min: new Date(),
                
            });
        });
    });
</script>