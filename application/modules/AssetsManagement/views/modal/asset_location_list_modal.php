<?php  foreach ($asset_location_list as $list) {  ?>     
<!-- Modal -->
              <div id="assest_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Asset Location Details</h4>
                    </div>
                    <div class="modal-body">

                      <table class="table table-bordered">                      
                      <tbody>
                       
                        <tr>
                          <td width="" class="lft-td">Asset Code</td>
                          <td><?php echo $list['code'] ?></td>
                        </tr>
                        <tr>
                                        <td class="lft-td">Asset Location</td>
                                        <td><?php echo $list['location'] ?></td>
                                    </tr>
                                    <tr>
                                         <td class="lft-td">Address</td>
                                        <td><?php echo $list['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Latitude</td>
                                        <td><?php echo $list['latitude'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Longitude</td>
                                        <td><?php echo $list['longitude'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Contact Persons</td>
                                        <td><?php echo $list['contact_person'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Contact Number</td>
                                        <td><?php echo $list['contact_no'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Contact Email</td>
                                        <td><?php echo $list['contact_email'] ?></td>
                                    </tr>                                   
									
							
                      </tbody>
                    </table>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>  

              <!-- Model end  -->
<?php } ?>