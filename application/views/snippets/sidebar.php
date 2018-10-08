<?php
if ($this->session->userdata('login_flag')) {
    $login_flag = $this->session->userdata('login_flag');
}
?> 
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url(); ?>Dashboard" class="site_title">
                <?php if (isset($dataHeader['group_id']) && $dataHeader['group_id'] != 1) { ?>
                    <img src="data:image/gif;base64,<?php echo $dataHeader['admin_company_logo'][0]['company_logo']; ?>">
                <?php } else { ?>
                    <img src="data:image/gif;base64,<?php echo $dataHeader['company_logo']; ?>"> 
                <?php } ?>
                <span><?php echo $dataHeader['company_name']; ?></span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <?php if (isset($dataHeader['profileimg'])) { ?>
                    <img src="data:image/gif;base64,<?php echo $dataHeader['profileimg']; ?>" alt="..." class="img-circle profile_img">
                <?php } ?>
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $dataHeader['username']; ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu <?php
        if (isset($login_flag) && $login_flag == 0) {
            echo 'cursor-notallowed';
        }
        ?>">

            <!--            <div class="menu_section">
                            <h3>Home</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                            </ul>
                        </div>-->


            <div class="menu_section">
                <h3>Main Pages
                </h3>
                <ul class="nav side-menu">  
                    <?php
                    foreach ($dataHeader['menulist'] as $menu_name) {
                        $main_menu_tab = explode(',', $menu_name['nav_ids']);
                        if ($menu_name['parent'] == 0) {
                            if ($menu_name['menuName'] == 'Dashboard') {
                                ?>
                                <li>
                                    <a href="<?php echo (isset($menu_name['url'])) ? base_url() . $menu_name['url'] : ''; ?>">
                                        <i class="<?php echo $menu_name['iconPath']; ?>"></i><?php echo $menu_name['menuName']; ?> 
                                    </a>
                                </li>
                            <?php } else if ($menu_name['menuName'] == 'Stats/Report' || $menu_name['menuName'] == 'Configuration') { ?>
                                <li>
                                    <a>
                                        <i class="<?php echo $menu_name['iconPath']; ?>"></i><?php echo $menu_name['menuName']; ?>  
                                    </a>
                                </li>
                            <?php } elseif ($menu_name['menuName'] == 'Privilege') {
                                ?>
                                <li>
                                    <a href="<?php echo (isset($menu_name['url'])) ? base_url() . $menu_name['url'] : ''; ?>">
                                        <i class="<?php echo $menu_name['iconPath']; ?>"></i><?php echo $menu_name['menuName']; ?> 
                                    </a>
                                </li>
                            <?php } else {
                                ?>

                                <!--<ul class="nav side-menu">-->
                                <li>
                                    <a 
                                    <?php
                                    if ($menu_name['menuName'] == 'Masters' && $this->session->userdata('group_id') != 1) {
                                        echo 'class="not-allowed"';
                                    }
                                    if (isset($menu_name['url'])) {
                                        echo "href='" . base_url() . $menu_name['url'] . "'";
                                    }
                                    ?>>
                                        <i class="<?php echo $menu_name['iconPath']; ?>">
                                        </i>
                                        <?php echo $menu_name['menuName']; ?> 
                                        <span class="fa fa-chevron-down">
                                        </span>
                                    </a>
                                    <?php if ($menu_name['menuName'] != 'Masters' && $this->session->userdata('group_id') != 1) { ?>
                                        <ul class="nav child_menu">
                                            <?php
                                            foreach ($dataHeader['menulist'] as $sub_menu) {
                                                $nav_ids_value = explode(',', $sub_menu['nav_ids']);
                                                if ($nav_ids_value[1] == $main_menu_tab[1] && $nav_ids_value[2] != '') {
                                                    ?>                              
                                                    <li>
                                                        <a href="<?php echo ($sub_menu['url']) ? base_url() . $sub_menu['url'] : ''; ?>">
                                                            <?php echo $sub_menu['menuName']; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul> 
                                    <?php } elseif ($this->session->userdata('group_id') == 1) {
                                        ?>
                                        <ul class="nav child_menu">
                                            <?php
                                            foreach ($dataHeader['menulist'] as $sub_menu) {
                                                $nav_ids_value = explode(',', $sub_menu['nav_ids']);
                                                if ($nav_ids_value[1] == $main_menu_tab[1] && $nav_ids_value[2] != '') {
                                                    ?>                              
                                                    <li>
                                                        <a href="<?php echo ($sub_menu['url']) ? base_url() . $sub_menu['url'] : ''; ?>">
                                                            <?php echo $sub_menu['menuName']; ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul> 
                                    <?php }
                                    ?>
                                </li>
                                <!--</ul>-->
                                <?php
                            }
                        }
                    }
                    ?>
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
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<?php
$login_flag = $this->session->userdata('login_flag');
if ($login_flag == 0 && $login_flag != '') {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar-menu a").removeAttr("href");
            $("#sidebar-menu a").css("cursor", "not-allowed");
            $("#sidebar-menu a").addClass('not-allowed');
            $(".navbar a").removeAttr("href");
            $(".navbar a").css("cursor", "not-allowed");
            $(".navbar a").addClass('not-allowed');
        });
    </script>
<?php } ?> 

