<!-- modal start -->
<div class="modal fade" id="addgroup" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal500">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create Group</h4>
            </div>
            <div class="modal-body">
                <div class="user-modal-slim"> 

                    <h1><?php echo lang('create_group_heading'); ?></h1>
                    <p><?php echo lang('create_group_subheading'); ?></p>

                    <div id="infoMessage"><?php echo $message; ?></div>

                    <?php echo form_open("auth/create_group"); ?>

                    <p>
                        <?php echo lang('create_group_name_label', 'group_name'); ?> <br />
                        <?php echo form_input($group_name); ?>
                    </p>

                    <p>
                        <?php echo lang('create_group_desc_label', 'description'); ?> <br />
                        <?php echo form_input($description); ?>
                    </p>

                    <p><?php echo form_submit('submit', lang('create_group_submit_btn')); ?></p>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>