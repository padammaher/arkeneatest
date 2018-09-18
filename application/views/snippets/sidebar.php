<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><img src="<?php echo base_url('assets/images/logo.png'); ?>"> <span>ePhytionSee</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url('assets/images/img.jpg'); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $dataHeader['username']; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
 <?php if($this->session->userdata('login_flag'))
 { 
     $login_flag=$this->session->userdata('login_flag'); 
 }?> 
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu <?php if(isset($login_flag)&&$login_flag==0){ echo 'cursor-notallowed'; } ?>">

            <div class="menu_section">
                <h3>Home</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                </ul>
            </div>


            <div class="menu_section">
                <h3>Main Pages</h3>
                <ul class="nav side-menu">                  
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>Customerinfo">Customer Provisioning</a></li>
                            <li> <a class="" href="<?php echo base_url(); ?>Assets_list">Asset Management</a></li>
                            <li><a href="<?php echo base_url('Device_inventory_list'); ?>">Device Inventory</a></li>
                            <li><a href="<?php echo base_url('Sensor_inventory_list'); ?>">Sensor Inventory</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Masters <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url() ?>assetcategory">Asset Category</a></li>
                            <li><a href="<?php echo base_url() ?>assettype">Asset Type</a></li>
                            <li><a href="<?php echo base_url() ?>sensortype">Sensor Type</a></li>
                            <li><a href="<?php echo base_url() ?>parameterlist">Parameter</a></li>
                            <li><a href="<?php echo base_url() ?>uomlist">UOM Type-UOM</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    
                    <li><a><i class="fa fa-bar-chart-o"></i> Stats/Report </a></li>
                    <li><a><i class="fa fa-table"></i> Configuration </a></li>
                    

                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

 <?php 
 $login_flag=$this->session->userdata('login_flag'); 
 if($login_flag == 0 && $login_flag != '') {  ?>
<script type="text/javascript">
    $(document).ready(function() {                
            $("#sidebar-menu a").removeAttr("href");
            $("#sidebar-menu a").css("cursor", "not-allowed");         
            $("#sidebar-menu a").addClass('not-allowed');   
    });
</script>
 <?php } ?> 

