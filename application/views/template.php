<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="icon" href="images/favicon.ico" type="image/ico" />-->


        <title>ePhytionSee - Home </title>

        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico') ?>" type="image/x-icon" />

        <!-- CORE CSS Bootstrap FRAMEWORK - START -->
        <link href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url('assets/css/nprogress/nprogress.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/css/iCheck/skins/flat/green.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url('assets/css/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- JQVMap -->
        <link href="<?php echo base_url('assets/css/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet" type="text/css"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo base_url('assets/css/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url('assets/css/build/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>




    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <!-- <body class="sidebar-collapse"> -->
    <body class="nav-sm">

        <div class="container body">
            <div class="main_container">
                {header}
                {sidebar}

                <div class="right_col" role="main">
                    <div class="alert alert-success fade in" id="success_msg" style="display: none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success!</strong> <?php
                        if ($this->session->flashdata('success_msg')) {
                            echo $this->session->flashdata('success_msg');
                        }
                        ?>
                    </div>
                    <div class="alert alert-danger fade in" id="error_msg" style="display: none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error !</strong> <?php
                        if ($this->session->flashdata('error_msg')) {
                            echo $this->session->flashdata('error_msg');
                        }
                        ?>
                    </div>
                    <div class="alert alert-warning" id="warning_msg" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Warning!</strong> There was a problem with your network connection.
                    </div>  
                    <div class="alert alert-info fade in" id="note_msg" style="display: none;">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Note!</strong> <?php
                        if ($this->session->flashdata('note_msg')) {
                            echo $this->session->flashdata('note_msg');
                        }
                        ?>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#error_msg").css("display", "none");

<?php if ($this->session->flashdata('error_msg')) { ?>
                                $("#error_msg").css("display", "block");
                                setTimeout(function () {
                                    $('#error_msg').fadeOut('fast');

                                }, 3000);
<?php } ?>

                            $("#success_msg").css("display", "none");

<?php if ($this->session->flashdata('success_msg')) { ?>
                                $("#success_msg").css("display", "block");
                                setTimeout(function () {
                                    $('#success_msg').fadeOut('fast');

                                }, 3000);
<?php } ?>

                            $("#note_msg").css("display", "none");

<?php if ($this->session->flashdata('note_msg')) { ?>
                                $("#note_msg").css("display", "block");
                                setTimeout(function () {
                                    $('#note_msg').fadeOut('fast');

                                }, 3000);
<?php } ?>




                        });
                    </script>
                    <!--<div class="container-fluid">-->
                    {content}
                    <!--</div>-->
                </div>
                <footer>                
                    {footer}            
                </footer>             

            </div>  
        </div>       
        <script src="<?php echo base_url('assets/css/jquery/dist/jquery.min.js'); ?>" type="text/javascript"></script>


        <script src="<?php echo base_url('assets/css/bootstrap/dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/css/fastclick/lib/fastclick.js'); ?>" type="text/javascript"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url('assets/css/nprogress/nprogress.js'); ?>" type="text/javascript"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo base_url('assets/css/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/css/iCheck/icheck.min.js'); ?>" type="text/javascript"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo base_url('assets/css/moment/min/moment.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/css/bootstrap-daterangepicker/daterangepicker.js'); ?>" type="text/javascript"></script>
        <!-- bootstrap-wysiwyg -->
        <script src="<?php echo base_url('assets/css/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/css/jquery.hotkeys/jquery.hotkeys.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/css/google-code-prettify/src/prettify.js'); ?>" type="text/javascript"></script>
        <!-- jQuery Tags Input -->
        <script src="<?php echo base_url('assets/css/jquery.tagsinput/src/jquery.tagsinput.js'); ?>" type="text/javascript"></script>
        <!-- Switchery -->
        <script src="<?php echo base_url('assets/css/switchery/dist/switchery.min.js'); ?>" type="text/javascript"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url('assets/css/select2/dist/js/select2.full.min.js'); ?>" type="text/javascript"></script>
        <!-- Parsley -->
        <script src="<?php echo base_url('assets/css/parsleyjs/dist/parsley.min.js'); ?>" type="text/javascript"></script>
        <!-- Autosize -->
        <script src="<?php echo base_url('assets/css/autosize/dist/autosize.min.js'); ?>" type="text/javascript"></script>
        <!-- jQuery autocomplete -->
        <script src="<?php echo base_url('assets/css/devbridge-autocomplete/dist/jquery.autocomplete.min.js'); ?>" type="text/javascript"></script>
        <!-- starrr -->
        <script src="<?php echo base_url('assets/css/starrr/dist/starrr.js'); ?>" type="text/javascript"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url('assets/css/build/js/custom.js'); ?>" type="text/javascript"></script>
        <!-- validator -->
        <script src="<?php echo base_url('assets/css/validator/validator.js'); ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/css/fastclick/lib/fastclick.js'); ?>" type="text/javascript"></script>
        <!-- NProgress -->
        <script src="<?php echo base_url('assets/css/nprogress/nprogress.js'); ?>" type="text/javascript"></script>


        <!-- CORE JS Jquery Validation - START -->

        <script>
//            $(document).ready(function () {
//                $('.datepicker').datepicker({
//                    format: 'mm/dd/yyyy',
//                    //startDate: '-3d'
//                });
//            });
        </script>
    </body>
</html>
