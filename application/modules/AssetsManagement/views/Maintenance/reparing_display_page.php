
<?php //echo form_open_multipart('assetsmanagement/reparing_display/' . $user['id'], array('id' => 'form_add_doc_id', 'class' => 'form_add_doc_id')); ?>
<div class="white-bg all-padding-15 ">
    <div class="col-sm-12">
        <div class="leave-heading">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;Assets Reparing
                <div class="pull-right">
                </div>
            </h4>

        </div>
        <div class="col-md-12">
            <div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                <div class="table-responsive">

                    <table id="reparing-listdata1" class="table">

                        <thead>
                            <tr> 
                                <th>Id</th>
                                <th>Name Assets</th>
                                <th >Total No of Assets</th>
                                <th>In Used Assets </th>
                                <th>Reparing</th>
                                <th>Assets Name</th>
                                <th>Commets</th>

<!--                        <th>Next Service Date</th>-->
                                <th></th>
                            </tr>
                        </thead> 
                        <?php $k = 1 ?>
                        <?php foreach ($assets_reaparingdetail as $list) { //var_dump($list); ?>
                            <tr>

                                <td><?php echo $k ?></td>
                                <td> <?php echo $list['ast_sub_cat_name'] ?></td>
                                <td class="total"> 
                                  <?php echo $list['totall_no_assets'];?>

                                </td>
                                <td>
                                    <?php echo $list['in_used'];?>
                                  
                                </td>
                                <td>  <?php echo $list['repairing'];?> </td>
                                <td> <?php echo $list['assets_name'];?> </td>
                                  <td> <?php echo $list['repairing_commets'];?> </td>
                                  <td> <a data-toggle="modal" href="#edit_asstes<?php echo $list['id'] ?>"><i class="fa fa-pencil" style="color:gray" title="Edit"></i></a></td>

                            </tr>
                            <?php $k++ ?>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
               <div class="col-sm-12 text-right"> <input type="submit" value="Sumit"/> </div>
            </div>
             
        </div>
    </div>
</div>

<?php   
$this->load->view('Maintenance/assets_listdisplay'); //Sushma
?>
