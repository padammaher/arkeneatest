<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

          <!-- <title><?php echo isset($dataHeader['title']) ? $dataHeader['title'] : ''; ?></title> -->

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/css/all.css');?>" rel="stylesheet" type="text/css">
  <!-- <link href="<?php echo base_url('assets/css/googleapisfont.css');?>" rel="stylesheet" type="text/css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

        <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->

</head>

<body id="page-top">
  <div class="alert alert-success" id="success_msg" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Success!</strong> <?php
                                if ($this->session->flashdata('success_msg')) {
                                    echo $this->session->flashdata('success_msg');
                                }
                                ?>
                            </div>
                            <div class="alert alert-danger " id="error_msg" style="display: none;">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Error !</strong> <?php
                                if ($this->session->flashdata('error_msg')) {
                                    echo $this->session->flashdata('error_msg');
                                }
                                ?>
                            </div>
  <!-- <div id="wrapper"> -->
        {content}


        <!-- CORE JS Jquery Validation - START -->

              <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/js/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>
<script type="text/javascript">
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

    </body>
</html>
