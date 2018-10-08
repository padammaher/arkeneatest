<?php  foreach ($trigger_list as $list) {  ?>     
<!-- Modal -->
              <div id="trigger_list_modal_<?php echo $list['id'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Trigger  Details</h4>
                    </div>
                    <div class="modal-body">

                      <table class="table table-bordered">                      
                      <tbody>
                       
                        <tr>
                          <td width="" class="lft-td">Alarm Trigger Name</td>
                          <td><?php echo $list['trigger_name']=='' ?'<i class="fa fa-times" aria-hidden="true"></i>':$list['trigger_name']; ?></td>
                        </tr>
                        <tr>
                        <td class="lft-td">Trigger Threshold</td>
                        <td><?php echo $list['trigger_threshold_id']=='' ?'<i class="fa fa-times" aria-hidden="true"></i>':$list['trigger_threshold_id']; ?></td>
                        </tr>
                        <tr>
                        <td class="lft-td">Email</td>
                        <td><?php echo $list['email']=='' ?'<i class="fa fa-times" aria-hidden="true"></i>':$list['email'] ?></td>
                        </tr>
                        
                        <tr>
                        <td class="lft-td">SMS</td>
                        <td><?php echo $list['sms_contact_no']=='' ?'<i class="fa fa-times" aria-hidden="true"></i>': $list['sms_contact_no'] ?></td>
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