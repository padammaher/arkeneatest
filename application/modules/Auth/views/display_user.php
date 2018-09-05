<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo lang('edit_user_fname_label', 'first_name'); ?><span class="required" aria-required="true">*</span></label>
                    <input type="text" name="first_name" value="<?php echo $user->first_name?>" class="form-control" disabled="disabled">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo lang('edit_user_lname_label', 'last_name'); ?><span class="required" aria-required="true">*</span></label>
                    <input type="text" name="last_name" value="<?php echo $user->last_name?>" class="form-control" disabled="disabled">
                </div>
            </div>

               <div class="col-md-6">
                <div class="form-group">
                    <label><?php echo lang('edit_user_phone_label', 'phone'); ?><span class="required" aria-required="true">*</span></label>
                    <input type="text" name="last_name" value="<?php echo $user->phone?>" class="form-control" disabled="disabled">
                </div>
            </div>

            <div class="col-md-6">

                <!-- /.Start Date -->
                <div class="form-group form-group-bottom">
                    <label>Date of Birth <span class="required" aria-required="true">*</span></label>

                    <div class="input-group">
                        <input type="text" class="form-control" id="datepicker" name="date_of_birth" value="<?php echo date('Y M d', strtotime($user->birth_date)); ?>" data-date-format="yyyy/mm/dd">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>

            </div>
            
                 <div class="col-md-12">

                <!-- /.Start Date -->
                <div class="form-group form-group-bottom">
                    <label>About Me <span class="required" aria-required="true">*</span></label>

                   
                    <textarea type="text" name="last_name" value="" class="form-control" disabled="disabled">
<?php echo $user->description?>
                    </textarea>
                </div>

            </div>
        </div>
    </div>
</div>


<div id="infoMessage"><?php //echo $message; ?></div>

