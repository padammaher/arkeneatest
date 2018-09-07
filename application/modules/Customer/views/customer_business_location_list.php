<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h4>Customer Business Location List
        </h4>
      </div>
      <div class="title_right">
        <div class="pull-right">
          <a href="<?php echo base_url()?>Customer/add_customer_business_location" class="btn btn-sm btn-primary">Add New
          </a>
          <a href="<?php echo base_url()?>Customer/AddCustomer" class="btn btn-sm btn-primary">Customer Provisioning
          </a>
          <a href="<?php echo base_url()?>Customer/client_user_list" class="btn btn-sm btn-primary">User Management
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
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="flex-container flex-container-head nowrap">
                  <li class="flex-item">Sr. No.
                  </li>
                  <li class="flex-item">Location
                  </li>
                  <li class="flex-item">Address
                  </li>
                  <li class="flex-item">Contact Person
                  </li>
                  <li class="flex-item">City
                  </li>
                  <li class="flex-item">State / Province
                  </li>
                  <li class="flex-item">Pincode
                  </li>
                  <li class="flex-item">Country
                  </li>
                  <li class="flex-item">Telephone
                  </li>
                  <li class="flex-item">Mobile No.
                  </li>
                  <li class="flex-item">Email ID
                  </li>
                  <li class="flex-item">Actions
                  </li>
                </ul>
              </div>
            </div>
            <?php foreach($location_detail as $location){ ?> 
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="flex-container nowrap">
                  <li class="flex-item"><?php echo $location->id; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->address; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->location_name; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->contact_person_name; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->city; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->state; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->pincode; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->country; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->telephone; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->mobile; ?>
                  </li>
                  <li class="flex-item"><?php echo $location->email; ?>
                  </li>
                 
                  <li class="flex-item">
                    <a href="<?php echo base_url()?>Customer/edit_business_location?business_id=<?php echo $location->id; ?>" title="Edit">
                      <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                      </i>
                    </a>
                    <a href="<?php echo base_url()?>Customer/delete_business_location?business_id=<?php echo $location->id; ?>" title="Delete">
                      <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                      </i> 
                    </a> 
                  </li>
                </ul>
              </div>
            </div>
            <?php } ?>
            <!-- <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="flex-container nowrap">
                  <li class="flex-item">2
                  </li>
                  <li class="flex-item">Durban
                  </li>
                  <li class="flex-item">169 Maydon Road, Millweed House, Durban 
                  </li>
                  <li class="flex-item">Mr. Rude
                  </li>
                  <li class="flex-item">Durban
                  </li>
                  <li class="flex-item">KwaZulu-Natal
                  </li>
                  <li class="flex-item">10002
                  </li>
                  <li class="flex-item">South Africa
                  </li>
                  <li class="flex-item">27 11 326 5900
                  </li>
                  <li class="flex-item">27 82 480 7309
                  </li>
                  <li class="flex-item">CL2@bdv.co.za
                  </li>
                  <li class="flex-item">
                    <a href="customer-business-location-edit.html" title="Edit">
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
                  <li class="flex-item">Cape Town
                  </li>
                  <li class="flex-item">WoodStock, Cape Town
                  </li>
                  <li class="flex-item">Mr. Dan
                  </li>
                  <li class="flex-item">Cape Town City
                  </li>
                  <li class="flex-item">Western Cape
                  </li>
                  <li class="flex-item">10003
                  </li>
                  <li class="flex-item">South Africa
                  </li>
                  <li class="flex-item">27 11 326 5900
                  </li>
                  <li class="flex-item">27 82 480 7309
                  </li>
                  <li class="flex-item">CL3@bdv.co.za
                  </li>
                  <li class="flex-item">
                    <a href="customer-business-location-edit.html" title="Edit">
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
            </div> -->
            <!-- Modal -->
            <div id="detailsModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
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
                          <td>1
                          </td>
                        </tr>
                        <tr>
                          <td width="" class="lft-td">Location
                          </td>
                          <td>Sandton
                          </td>
                        </tr>
                        <tr>
                          <td width="" class="lft-td">Address
                          </td>
                          <td>West Road North Morningside, Sandton
                          </td>
                        </tr>
                        <tr>
                          <td width="" class="lft-td">Contact Person Name
                          </td>
                          <td>Mark Tayler
                          </td>
                        </tr>
                        <tr>
                          <td width="" class="lft-td">City
                          </td>
                          <td>Sandton
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">State / Province
                          </td>
                          <td>Gauteng
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">Pincode
                          </td>
                          <td>10001
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">Country
                          </td>
                          <td>South Africa
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">Telephone No
                          </td>
                          <td>27 11 326 5900
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">Mobile No
                          </td>
                          <td>27 82 480 7309
                          </td>
                        </tr>
                        <tr>
                          <td class="lft-td">Email ID
                          </td>
                          <td>CL1@bdv.co.za
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
            <!-- Model end  -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
