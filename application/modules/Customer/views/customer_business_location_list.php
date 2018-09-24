
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Customer Business Location List
            </h4>
        </div>
        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>Customerinfo" class="btn btn-sm btn-primary"> 
                    <i class="fa fa-users">
                    </i> Customer Provisioning
                </a>
                <a href="<?php echo base_url() ?>ManageUsers" class="btn btn-sm btn-primary"> 
                    <i class="fa fa-user">
                    </i> User Management
                </a>
                <a href="<?php echo base_url() ?>Add_Business_Location" class="btn btn-sm btn-primary"> 
                    <i class="fa fa-plus">
                    </i> Add New
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
                                <th>Location</th>
                                <th>Address</th>
                                <th>Contact Person</th>
                                <th>City</th>                          
                                <th>State / Province</th>                          
                                <th>Pincode</th>                          
                                <th>Country</th>                          
                                <th>Telephone</th>                          
                                <th>Mobile No.</th>                          
                                <th>Email ID</th>                          
                                <th>Status</th>                          
                                <th>Actions</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            if ($location_detail) {
                                foreach ($location_detail as $location) {
                                    ?> 
                                    <tr>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $i; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->location_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->address; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->contact_person_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->city_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->state_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->pincode; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->country_name; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->telephone; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->mobile; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->email; ?></td>
                                        <td class="flex-item<?php echo $i; ?>"><?php echo $location->isactive == 0 ? 'Active' : 'Deactive'; ?></td>
                                        <td class="action">
                                            <form action="<?php echo base_url(); ?>update_business" method="post" id="edit_update_business_location<?php echo $i; ?>"> 
                                                <input type="hidden" name="business_id" value="<?php echo $location->id; ?>" id="business_id">  
                                                <a class="edit_location" title="Edit" id="<?php echo $i; ?>">
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    </i>
                                                </a>
                                            </form> 
                                            <form action="<?php echo base_url(); ?>Customer/delete_business_location" method="post" id="delete_update_business_location<?php echo $i; ?>"> 
                                                <a class="delete_location" title="Delete" id="<?php echo $i; ?>">
                                                    <input type="hidden" name="business_id" value="<?php echo $location->id; ?>" id="business_id">  
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
                            <td colspan="13">No data found..!</td>   
                        <?php } ?> 
                        </tbody>
                    </table>
                    <?php
                    $i = 1;
                    if ($location_detail) {
                        foreach ($location_detail as $location) {
                            ?> 
                            <!-- Modal -->
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
                                                        <td width="" class="lft-td">Sr.no.
                                                        </td>
                                                        <td><?php echo $i; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Location
                                                        </td>
                                                        <td><?php echo $location->location_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Address
                                                        </td>
                                                        <td><?php echo $location->address; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">Contact Person Name
                                                        </td>
                                                        <td><?php echo $location->contact_person_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="" class="lft-td">City
                                                        </td>
                                                        <td><?php echo $location->city_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">State / Province
                                                        </td>
                                                        <td><?php echo $location->state_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Pincode
                                                        </td>
                                                        <td><?php echo $location->pincode; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Country
                                                        </td>
                                                        <td><?php echo $location->country_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Telephone No
                                                        </td>
                                                        <td><?php echo $location->telephone; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Mobile No
                                                        </td>
                                                        <td><?php echo $location->mobile; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="lft-td">Email ID
                                                        </td>
                                                        <td><?php echo $location->email; ?>
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
                                $(".flex-item_row .flex-item<?php echo $i; ?> ").click(function (e) {
                                    if (!$(e.target).hasClass('fa')) {
                                        $('#detailsModal<?php echo $i; ?>').modal('show');
                                    }
                                });

                                $(".flex-container-head .flex-item").click(function () {
                                    $('#detailsModal').modal('hide');
                                });
                            </script>
                            <?php
                        }
                    }
                    ?>
                    <!-- Model end  -->

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
                        $(document).ready(function () {
                            $(".edit_location").click(function () {
                                var id = $(this).attr('id');
                                $("#edit_update_business_location" + id).submit();
                            });
                            $(".delete_location").click(function () {
                                var id = $(this).attr('id');
                                $("#delete_confirmation").modal('show');
                                $(".ok").click(function () {
                                    // $("#post" + id).val('delete');
                                    $("#delete_update_business_location" + id).submit();
                                });
                            });
                        });
</script>