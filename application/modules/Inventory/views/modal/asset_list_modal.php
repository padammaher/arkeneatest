<?php  foreach ($assetlist as $list) {  ?>     
<!-- Modal -->
              <div id="assest_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Asset Details</h4>
                    </div>
                    <div class="modal-body">

                      <table class="table table-bordered">                      
                      <tbody>
                       
                        <tr>
                          <td width="" class="lft-td">Asset Code</td>
                          <td><?php echo $list['code'] ?></td>
                        </tr>
                        <tr>
                                        <td class="lft-td">Customer Location</td>
                                        <td><?php echo $list['location'] ?></td>
                                    </tr>
                                    <tr>
                                         <td class="lft-td">Asset Category</td>
                                        <td><?php echo $list['assetcategoryname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Asset Type</td>
                                        <td><?php echo $list['assettypename'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="lft-td">Asset Specification</td>
                                        <td><?php echo $list['specification'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Asset Serial No.</td>
                                        <td><?php echo $list['serial_no'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Assets Make</td>
                                        <td><?php echo $list['make'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Assets Model</td>
                                        <td><?php echo $list['model'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Description</td>
                                        <td><?php echo $list['description'] ?></td>
                                    </tr>
                                     <tr>
                                        <td class="lft-td">Movable/Immovable</td>
                                        <td><?php echo $list['ismovable'] == 1 ? 'Movable' : 'Immovable' ?></td>
                                    </tr>
									
									<tr>
                                        <td class="lft-td">Parameter Count</td>
                                        <td><?php echo count($list['parametercount']) ?></td>
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