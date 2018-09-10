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
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>Home</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url(); ?>Auth/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                </ul>
            </div>


            <div class="menu_section">
                <h3>Main Pages</h3>
                <ul class="nav side-menu">                  
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url(); ?>Customer/customer_info">Customer Provisioning</a></li>
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
                    <li><a><i class="fa fa-bell"></i> Notification </a></li>
                    <li><a><i class="fa fa-envelope"></i> Email </a></li>
                    <li><a><i class="fa fa-bar-chart-o"></i> Stats/Report </a></li>
                    <li><a><i class="fa fa-table"></i> Configuration </a></li>
                    <li><a href="login.html"><i class="fa fa-power-off"></i> Logout </a></li>

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



