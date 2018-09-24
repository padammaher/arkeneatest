<?php  foreach ($asset_user_list as $list) {  ?>     
<!-- Modal -->
              <div id="user_assest_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
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
                          <td width="" class="lft-td">Asset Code</td>
                          <td><?php echo $list['code'] ?></td>
                        </tr>
                        <tr>
                                        <td class="lft-td">User Name</td>
                                        <td><?php echo $list['client_name'] ?></td>
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