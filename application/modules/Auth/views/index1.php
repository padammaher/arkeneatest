<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Ephysionsee Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" value="John Doe" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" value="12345678" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                   <img src="images/elogo.png">
                  <p>Copyright 2018 - ePhytionSee | All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                   <img src="images/elogo.png">
                  <p>Copyright 2018 - ePhytionSee | All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>



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