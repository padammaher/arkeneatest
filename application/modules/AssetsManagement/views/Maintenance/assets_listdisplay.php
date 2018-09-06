
<?php foreach ($assets_reaparingdetail as $list) { ?>
    <?php //var_dump($user)                    ?>
    <div id="edit_asstes<?php echo $list['id'] ?>" class="modal fade" role="dialog">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">assets Repairing<?php //echo $list['subassetsid'] ?></h4>                        
                </div>

                <div class="modal-body">
                    <?php echo form_open_multipart('assetsmanagement/reparing_display/' . $list['id'], array('id' => 'form_add_doc_id', 'class' => 'form_add_doc_id')); ?>
                    <?php //echo form_open_multipart('Masters/conference_details/', array('id' => 'form_add_doc_id', 'class' => 'form_add_doc_id')); ?>
                    <div class="row">

                        <input type="hidden"  id="sub_cat_id" value="<?php echo $list['subassetsid'] ?>" />
                        <div class="">
                            <div class="col-sm-12">
                                <?php echo form_label(lang('asst_name'), 'asst_name', array('for' => 'asst_name')); ?>
                                <div class="input-field">

                                    <?php
                                    $Pid = "modifyText3(".$list['subassetsid'].")";
                                    echo form_dropdown(array(
                                        'id' => 'ast_allo_sub_cat_id',
                                        'name' => 'ast_allo_sub_cat_id',
                                        'class' => 'browser-default',
                                        // 'data-error' => '.errorasstallocation2',
                                        'onclick' => $Pid
                                    ));
                                    ?>

                                    <div class="errorTxtCl1"></div>
                                    <?php echo form_error('asst_name'); ?>
                                </div> 
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-11">
                                <div class="input-field">
                                    <?php echo form_label(lang('Repairing'), 'Repairing', array('for' => 'Repairing')); ?>
                                    <?php
                                    echo form_input(array(
                                        'name' => 'reparingcommet',
                                        'id' => 'reparingcommet',
                                        'placeholder' => 'Enter comments',
                                        'data-error' => '.errorTxtCl2',
                                            // 'value' => $user['location']
                                    ));
                                    ?>

                                    <div class="errorTxtCl2"></div>
                                    <?php echo form_error('Repairing'); ?>
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
    </form>
    </div>


<?php } ?>

<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>

<script TYPE="text/javascript">
    function modifyText3(textid)
    {
        sub_cat(textid);

    }
</script> 


<script>
    function sub_cat(sub_id)
    { //alert(sub_id);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>assetsmanagement/getassetsname',
            data: {'sub_cat_name': sub_id},
            success: function (data) {
                $('select[name="ast_allo_sub_cat_id"]').html(data.content).trigger('liszt:updated').val();
                //  $("#ast_allo_sub_cat_id").val($("#ast_allo_sub_cat_id option:first").val());
                //  $('#ast_allo_sub_cat_id').material_select();

            }
        });
    }

</script>


