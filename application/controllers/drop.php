    
     <div class="col-sm-6">
                                <div class="input-field">
                                    <?php
                                    echo form_dropdown('department_id', $department, set_value('department_id', $openings['department_id']), 'id="department_id"');
                                    ?>
                                    <?php echo form_label(lang('department_id'), 'department_id'); ?>
                                    <?php echo form_error('department_id'); ?>
                                </div> 
                            </div>



$('select[name="department_id"]').change(function () {
        var department_id = $(this).val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>recruitment/getReportingManager',
            data: {'department_id': department_id},
            success: function (data) {
                $('select[name="reporting_manager"]').html(data.content).trigger('liszt:updated').val(reporting_manager);
                $('#reporting_manager').material_select();
                $('select[name="approver"]').html(data.content).trigger('liszt:updated').val(reporting_manager);
                $('#approver').material_select();
            }
        });

    });

