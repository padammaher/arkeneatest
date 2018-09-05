
<div class="row margin-bottom-10">
    <div class="col-sm-8">
        <h3><?php echo lang('dashboard_heading'); ?></h3>
    </div>


</div>
<section class="content">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <!--<img src="<?php ?>" class="img-responsive" alt="">-->
                    <?php if (isset($user->profileimg) && $user->profileimg != '') { ?>
                        <img class="img-responsive img-circle center-img media-object margin-top-0" src="<?php echo base_url() . 'assets/uploads/users' . $user->profileimg; ?>">  
                    <?php } else { ?>
                        <img class="media-object margin-top-0 center-img" src="<?php echo base_url() ?>assets/images/client.png">                             
                    <?php } ?>

                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <div class="emp-heading">
                            <h4 class="media-heading text-bold text-primary-main margin-bottom-0"><?php echo $user->first_name ?>  

                                <span><?php if ($user->active == '1') { ?>
                                        <i class="fa fa-circle text-success font-size-6" title="Active"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-circle text-warning font-size-6" title="In-Active"></i>
                                    <?php } ?>
                                </span>
                            </h4>
                        </div>

                    </div>
                </div>

                <div class="emp-office-bg"> 
                    <!--email id here-->
                    <div class="emp-icon-left"> 
                        <i class="fa fa-envelope" title="Official Email"></i>
                    </div>
                    <div class="emp-content-right"> 
                        <a href="mailto: <?php echo $user->email; ?>"><?php echo $user->email; ?></a>
                    </div>
                    
                      <!--location  here-->
                                <div class="emp-icon-left"> 
                                    <i class="fa fa-globe " title="Location"></i>
                                </div>
                                <div class="emp-content-right"> 
                                    <?php 
                                    //if($user->country_id !=0)
                                    echo $country_list[$user->country_id]; ?>
                                </div>
                      <!--Birthdate  here-->
                                <div class="emp-icon-left"> 
                                    <i class="fa fa-birthday-cake " title="Location"></i>
                                </div>
                                <div class="emp-content-right"> 
                                    <?php echo date('Y M d', strtotime($user->birth_date)); ?>
                                </div>
                                
                </div>
                <!-- END MENU -->
            </div>
        </div>

        <div class="col-md-9">
            <!-- View massage -->
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border bg-primary-dark">
                    <h3 class="box-title">Personal Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Content Start-->
                    <!-- form start -->
                    <?php $this->load->view('display_user'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="infoMessage"><?php echo $message; ?></div>



<?php
$this->load->view('modal/show_user')?>