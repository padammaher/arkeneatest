<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Mindworx</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
      
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png') ?>" type="image/x-icon" />    <!-- Favicon -->

        <!-- CORE CSS Bootstrap FRAMEWORK - START -->

        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/sb-admin.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- DataTables -->
        <link href="<?php echo base_url() ?>assets/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url() ?>assets/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url() ?>assets/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url() ?>assets/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>


        <!-- CORE JS Jquery FRAMEWORK - START -->        
        <script src="<?php echo base_url('assets/jquery/jquery-3.0.0.js'); ?>" type="text/javascript"></script> 
        <script src="<?php echo base_url('assets/jquery/jquery-ui-1.12.js'); ?>" type="text/javascript"></script>
        <!--<script src="<?php // echo base_url('assets/js/jquery-ui.js');                  ?>" type="text/javascript"></script>--> 
        <script src="<?php echo base_url('assets/jquery/jquery.form.js'); ?>"></script>

        <link href="<?php echo base_url('assets/datepicker/css/datepicker.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>



        <!-- CORE JS Bootstrap FRAMEWORK - START -->        
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script> 


    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <!-- <body class="sidebar-collapse"> -->
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                {header}
                {sidebar}

            </nav>
            <div id="page-wrapper">

                <div class="container-fluid">
                    {content}
                </div>
            </div>
            <div class="col-md-12 footer"> 
                {footer}
            </div>
        </div>

        <script src="<?php echo base_url() ?>assets/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>


        <!-- CORE JS Jquery Validation - START -->
        <script src="<?php echo base_url('assets/validation/jquery.validate.min.js'); ?>" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/validation/additional-methods.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/validation/jquery.custom_validate.js'); ?>"></script>

        <!--time picker --> 
        <script src="<?php // echo base_url('assets/timepicker/js/timepicker.min.js');  ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/datepicker/js/datepicker.js') ?>" type="text/javascript"></script>
        <!--time picker --> 
        <script>
            $(document).ready(function () {
                $('.datepicker').datepicker({
                    format: 'mm/dd/yyyy',
                    //startDate: '-3d'
                });
            });
        </script>
    </body>
</html>
