<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="icon" href="images/favicon.ico" type="image/ico" />-->


        <title><?php echo isset($dataHeader['title']) ? $dataHeader['title'] : ''; ?></title>

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

        <!---- data tables css--> 
        <link href="<?php echo base_url('assets/css/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
        <link href=".<?php echo base_url('assets/css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'); ?>" rel="stylesheet">
        <!----end data tables css-->

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url('assets/css/build/css/custom.css'); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/css/build/css/column.css'); ?>" rel="stylesheet" type="text/css"/>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



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
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                        </div>
                    </div>

                    <!--<div class="container-fluid">-->
                    {content}
                    <!--</div>-->
                </div>
                <!--- Confirmation Modal --->
                <div class="modal confirmmodal fade bs-example-modal-sm" id="confirmmodal_Box" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                Confirmation<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h4></h4>
                                <p>Do you want to delete this item ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary ok">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="delete_confirmation" class="modal confirmmodal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                Confirmation<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h4></h4>
                                <p>Are you sure you want to delete this item ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary ok">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="logout_confirmation"  class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                Confirmation<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h4></h4>
                                <p>Are you sure you want to Logout ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary ok">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                <footer>      
                    {footer}            
                </footer>             

            </div>  
        </div>       
         <script src="<?php echo base_url(); ?>assets/css/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/css/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/css/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url(); ?>assets/css/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url(); ?>assets/css/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>assets/css/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/css/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url(); ?>assets/css/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/css/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url(); ?>assets/css/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url(); ?>assets/css/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/css/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/css/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- ECharts -->
   <script src="<?php echo base_url(); ?>assets/css/echarts/dist/echarts.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/echarts/map/js/world.js"></script>
    
    
        <script src="<?php echo base_url(); ?>assets/css/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/pdfmake/build/vfs_fonts.js"></script>
    
       <!-- jQuery Sparklines -->
    <script src="<?php echo base_url(); ?>assets/css/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    
       <!-- jQuery Knob -->
    <script src="<?php echo base_url(); ?>assets/css/jquery-knob/dist/jquery.knob.min.js"></script>
    
     <!-- Switchery -->
    <script src="<?php echo base_url(); ?>assets/css/switchery/dist/switchery.min.js"></script>
        <!----data tables js-->

        <!-- form validatin -->

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <!-- CORE JS Jquery Validation - START -->
  <script src="<?php echo base_url(); ?>assets/css/build/js/custom.js"></script>
        <script>
            //            $(document).ready(function () {
            //                $('.datepicker').datepicker({
            //                    format: 'mm/dd/yyyy',
            //                    //startDate: '-3d'
            //                });
            //            });
        </script>
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


            $("#Parameter").change(function ()
            {
//       alert(this.value);
                var objdata = '';
                var i = 0;
                var options;
                $("#UOM").empty();
                $("#UOM_ID").empty();
                var options = '<option value="">Select UOM Type</option>';
                $.ajax({
                    url: '<?php echo base_url(); ?>Inventory/load_uomtype_by_parameter',
                    type: 'post',
                    dataType: 'text',
                    data: {parameterid: this.value},
                    success: function (res) {
                        var obj = $.parseJSON(res);
                        for (i = 0; i < obj.length; i++) {
                            options += '<option value="' + obj[i]['id'] + '">' + obj[i]['name'] + '</option>';
                        }
                        $("#UOM").html(options);
                    }
                });
            });

            $("#UOM").change(function ()
            {
                if (this.value != "") {
                    var e = document.getElementById("UOM");
                    var strUser = e.options[e.selectedIndex].text;
                    $("#selectuom").val(strUser);
                }
                else
                {
                    $("#selectuom").val('');
                }
            });
            
           
            $("#UOM").change(function ()
            {
                 var objdata = '';
                var i = 0;
                var options;
                 $("#UOM_ID").empty();
                var options = '<option value="">Select UOM</option>';
                $.ajax({
                    url: '<?php echo base_url(); ?>Inventory/load_uom_by_Uom_type',
                    type: 'post',
                    dataType: 'text',
                    data: {uom_Type_id: this.value},
                    success: function (res) {
                        var obj = $.parseJSON(res);
                        for (i = 0; i < obj.length; i++) {
                            options += '<option value="' + obj[i]['id'] + '">' + obj[i]['name'] + '</option>';
                        }
                        $("#UOM_ID").html(options);
                    }
                });
              //  $("#UOM").empty();
                
            });


        </script>
           <script src="<?php echo base_url(); ?>assets/js/jcarousellite_1.0.1c4.js" type="text/javascript"></script>
        
          <!-- <script src="<?php echo base_url(); ?>assets/js/jcarousellite_1.0.1.pack.js" type="text/javascript"></script> -->
            <!-- <script src="<?php echo base_url(); ?>assets/js/jquery-latest.pack.js" type="text/javascript"></script> -->
        <script type="text/javascript">
$(function() {
$(".newsticker-jcarousellite").jCarouselLite({
vertical: true,
hoverPause:true,
visible: 5,
auto:500,
speed:1000
});
});




</script>
    </body>
</html>
