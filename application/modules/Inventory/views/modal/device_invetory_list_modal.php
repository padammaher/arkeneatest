<?php  $srno=1; foreach ($Device_inventory_list_data as $list) {  ?>     
<!-- Modal -->
              <div id="device_inv_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Details</h4>
                    </div>
                    <div class="modal-body">

                      <table class="table table-bordered">                      
                      <tbody>
                       
                        <tr>
                          <td width="" class="lft-td">Sr No.</td>
                          <td><?php echo $srno;?></td>
                        </tr>
                        <tr>
                                        <td class="lft-td">Device_Num</td>
                                        <td><?php echo $list['number'] ?></td>
                                    </tr>
                                    <tr>
                                         <td class="lft-td">Serial_No</td>
                                        <td><?php echo $list['serial_no'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Make</td>
                                        <td><?php echo $list['make'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Model</td>
                                        <td><?php echo $list['model'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Description</td>
                                        <td><?php echo $list['description'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Communication Type</td>
                                        <td><?php echo $list['communication_type'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">GSM Number</td>
                                        <td><?php echo $list['gsm_number'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Communication Status</td>
                                        <td><?php echo $list['communication_status'] ?></td>
                                    </tr>                              
                                    <tr>
                                        <td class="lft-td">Communication Protocol</td>
                                        <td><?php echo $list['communication_protocol'] ?></td>
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