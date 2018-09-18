<?php //print_r($user_detail[0]->customer_name); exit(); ?> 
<!-- <div class="right_col" role="main"> -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
      
        <h4>Customer Provisioning
        </h4>
      </div>
      <div class="title_right">
        <div class="pull-right">
          <a href="<?php echo base_url()?>Editcustomerinfo" class="btn btn-sm btn-primary">Edit Customer Information
          </a>
          <!--- <a href="assets-location-list.html" class="btn btn-sm btn-primary">Asset Location</a>
<a href="user-assets-list.html" class="btn btn-sm btn-primary">Asset User</a>--->
        </div>
      </div>
      <!--  <div class="title_right">
<div class="pull-right">
<a href="customer_info_add.html" class="btn btn-sm btn-primary">Add New</a>
</div>
</div> -->
    </div>
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <table class="table table-bordered">                      
                <tbody>
                  <tr>
                    <td width="15%" class="lft-td">Customer Name
                    </td>
                    <td><?php echo $user_detail[0]->company_name; ?> 
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" class="lft-td">Address
                    </td>
                    <td><?php echo $user_detail[0]->customer_address; ?> 
                    </td>
                  </tr>
                  <tr>
                    <td class="lft-td">Contact Person
                    </td>
                    <td><?php echo $user_detail[0]->contact_person; ?> 
                    </td>
                  </tr>
                  <tr>
                    <td class="lft-td">Telephone
                    </td>
                    <td><?php echo $user_detail[0]->phone; ?> 
                    </td>
                  </tr>
                  <tr>
                    <td class="lft-td">Mobile No.
                    </td>
                    <td><?php echo $user_detail[0]->mobile; ?> 
                    </td>
                  </tr>
                  <tr>
                    <td class="lft-td">Email ID
                    </td>
                    <td><?php echo $user_detail[0]->email; ?> 
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="text-center mtop20 col-md-12 col-sm-12">
                <div class="col-md-6 col-sm-6">
                  <a href="<?php echo base_url()?>ManageBusinessLoacaiton" class="btn btn-sm btn-primary btn-block"><i class="fa fa-map-marker"></i> Manage Business Location
                  </a>
                </div>
                <div class="col-md-6 col-sm-6">
                  <a href="<?php echo base_url()?>ManageUsers" class="btn btn-sm btn-success btn-block"> <i class="fa fa-user"></i> Manage Users
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->
<script> 
setTimeout(function() {
    $('#infoMessage').fadeOut('fast');
}, 7000);
</script> 