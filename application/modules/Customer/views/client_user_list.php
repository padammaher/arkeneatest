<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!--<div class="right_col" role="main">-->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Client User List
            </h4>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>Customerinfo" class="btn btn-sm btn-primary"><i class="fa fa-users"></i> Customer Provisioning
                </a>
                <a href="<?php echo base_url() ?>ManageBusinessLoacaiton" class="btn btn-sm btn-primary"> <i class="fa fa-map-marker"></i> Customer Business Location
                </a>
                <a href="<?php echo base_url() ?>AddClient" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr.No</th>
                                <th>Name</th>
                                <th>Customer Location</th>
                                <th>User Name</th>                          
                                <th>Status</th>                          
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // print_r($this->session->all_userdata());
                            $i = 1;
                            if ($client_details) {
                                foreach ($client_details as $clientinfo) {
                                    ?> 
                                    <tr>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $i; ?></td>

                                        <td class="flex-item<?php echo $i; ?>"><?php echo $clientinfo->first_name." ".$clientinfo->last_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $clientinfo->location_name; ?></td>

                                        <td class="flex-item<?php echo $i; ?>"><?php echo $clientinfo->username; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $clientinfo->active == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td class="flex-item">
                                            <form action="<?php echo base_url(); ?>update_client" method="post" id="update_client<?php echo $i; ?>"> 
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    </i>
                                                    <input type="hidden" value="<?php echo $clientinfo->id; ?>" name="client_id"/>
                                                    <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                </a>
                                                <a  class="delete" id="<?php echo $i; ?>">
                                                <!-- <a href="<?php echo base_url() ?>Customer/delete_client_user?client_id=<?php echo $clientinfo->id; ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');"> -->
                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                    </i> 
                                                </a> 
                                            </form> 
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            } else {
                                ?>
                            <td colspan="6">No data found..!</td>   
<?php } ?> 
                        </tbody>
                    </table>
                    <?php
                    if ($client_details) {
                        $i = 1;
                        foreach ($client_details as $clientinfo) {
                            ?>
                            <div id="detailsModal<?php echo $i; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    Modal content
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Details
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">                      
                                                <tbody>
                                                    <tr>
                                                        <td width="" class="lft-td">Sr. No.
                                                        </td>
                                                        <td><?php echo $i; ?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Name
                                                        </td>
                                                        <td><?php echo $clientinfo->first_name; ?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Customer Location
                                                        </td>
                                                        <td><?php echo $clientinfo->location_name; ?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">User Name
                                                        </td>
                                                        <td><?php echo $clientinfo->username; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <script>
                                $(".flex-item<?php echo $i; ?>").click(function (e) {
                                    if (!$(e.target).hasClass('fa')) {
                                        $('#detailsModal<?php echo $i; ?>').modal('show');
                                    }
                                });
                            </script>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                    <!-- <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="flex-container nowrap">
                          <li class="flex-item">2
                          </li>
                          <li class="flex-item">Pankaj Shelke
                          </li>
                          <li class="flex-item">Durban
                          </li>
                          <li class="flex-item">PS@bdv.co.za
                          </li>
                          <li class="flex-item">
                            <a href="client-user-edit.html" title="Edit">  
                              <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                              </i>
                            </a>
                            <a href="#" title="Delete">
                              <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                              </i> 
                            </a> 
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row clearfix">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="flex-container nowrap">
                          <li class="flex-item">3
                          </li>
                          <li class="flex-item">Paresh Kamat
                          </li>
                          <li class="flex-item">Riviona
                          </li>
                          <li class="flex-item">PK@bdv.co.za
                          </li>
                          <li class="flex-item">
                            <a href="client-user-edit.html" title="Edit">  
                              <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                              </i>
                            </a>
                            <a href="#" title="Delete">
                              <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                              </i> 
                            </a> 
                          </li>
                        </ul>
                      </div>
                    </div>	 -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->


<!--------------------Modal ------------>

<script>
    $(document).ready(function () {
        $("#aftersavemessage").delay(500).fadeOut("slow");
    });


</script>
<script>
    setTimeout(function () {
        $('#infoMessage').fadeOut('fast');
    }, 3000);
</script> 


<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#update_client" + id).submit();
        });

        $('body').on('click', '.delete', function () {
            var id = $(this).attr('id');
            $("#delete_confirmation").modal('show');
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#update_client" + id).submit();
            });
        });
    });
</script>