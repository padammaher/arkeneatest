
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
  <div id="wrapper">
        {sidebar}
        {header}
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
         <!-- <div class="container-fluid">         -->
        {content}
    <!-- </div> -->
</div>
     
              

                
             
                <!-- End Modal -->
                <footer>      
                    {footer}            
                </footer>             

            </div>  
        </div>    

 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to Logout ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button"  data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary ok" href="<?php echo base_url('logout/employee');?>" id="ok">Logout</a>
          <!-- <button class="btn btn-primary ok" id="ok" type="button"  data-dismiss="modal">Logout</button> -->
        </div>
      </div>
    </div>
  </div>

 <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to change ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button"  data-dismiss="modal">No</button>
          <button class="btn btn-secondary ok" id="ok" type="button"  data-dismiss="modal">Yes</button>
        </div>
      </div>
    </div>
  </div>
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this record ?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
          <button class="btn btn-secondary ok" id="ok" type="button"  data-dismiss="modal">Yes</button>
        </div>
      </div>
    </div>
  </div>

   
    <div class="modal fade" id="profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <!-- <div class="modal-content"> -->
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> -->
        <div class="modal-body">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                                  max-width: 300px;
                                  margin: auto;
                                  text-align: center;
                                  font-family: arial;">
  <img src="<?php echo base_url('/assets/img/user.png');?>" alt="John" style="width:100%">
  
  <h1><?php echo (isset($profiledata['name'])) ? $profiledata['name'] : '';?></h1>
  <p class="title" style="color: grey;font-size: 18px;"><?php echo (isset($profiledata['mobile'])) ? $profiledata['mobile'] : '';?></p>
  <p><?php echo (isset($profiledata['email'])) ? $profiledata['email'] : '';?></p>
  <div style="margin: 24px 0;">
    <a href="#" style="text-decoration: none;
  font-size: 22px;
  color: black;"><i ></i><?php echo (isset($profiledata['customer_address'])) ? $profiledata['customer_address'] : '';?></a> 
  </div>
  <p><button style=" border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  ">Contact</button></p>
</div>

<!-- <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-0">
      <div class="card-body p-0">      
        <div class="row">      
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add Employee!</h1>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> -->
        </div>

       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
          <button class="btn btn-secondary ok" id="ok" type="button"  data-dismiss="modal">Yes</button>
        </div> -->
      <!-- </div> -->
    </div>
  </div>

        <!-- Bootstrap -->
         <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/js/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js');?>"></script>
   
   <script type="text/javascript">  
$(document).ready(function () {
    $('body').on('click', '.logoutModal', function () {
            var id = $(this).attr('id');
            $("#logoutModal").modal();
            $(".ok").click(function () {
                if (id.length !== 0)
                {
                    $.ajax({
                        url: "<?php echo base_url() . 'logout/employee'; ?>",
                        method: "POST",
                        data: {id: id},
                        success: function (data) {
//                            $("#delete_confirmation").modal('hide');
                            location.reload();
                        }
                    });
                }
            });
        });
        });


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
