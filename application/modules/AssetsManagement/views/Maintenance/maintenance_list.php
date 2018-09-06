
<?php // echo form_open('assetsmanagement/assets_maintenance', array('id' => 'form_assets_maintenance_id'));                  ?>
<?php //echo form_open('assetsmanagement/assets_maintenance', array('id' => 'form_assets_maintenance_id'));                 ?>

<div class="white-bg all-padding-15 ">
    <div class="col-sm-12">
        <div class="leave-heading">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;Maintenance Assets
                <div class="pull-right">
                </div>
            </h4>

        </div>
        <div class="col-md-12">
            <table id="asst-maintenanace-list" class="table">
                <thead>
                    <tr> 
                        <th>Id</th>
                        <th>Category Type</th>
                        <th >Assets Name</th>
                        <th>Remaining Days For Service </th>
                        <th>Service Date</th>
                        <th>Next Service Date</th>
<!--                        <th>Next Service Date</th>-->
                        <th></th>
                    </tr>
                </thead> 
                <?php $k = 1 ?>
                <?php foreach ($maintenance_asst as $list) { //var_dump($list); ?>

                    <tr>
                        <?php $currentdate = date("Y-m-d") ?>
                        <?php $nextservicedate = ($list['nextservicedate']); ?>
                        <td><?php echo $k ?></td>
                        <td> <?php echo $list['ast_sub_cat_name'] ?></td>
                        <td> 
                            <?php $yesterdaydate = date('Y-m-d', strtotime(' - 1 days')); ?>

                            <?php $date = date('Y-m-d', strtotime(' + 2 days')); ?>
                            <?php if ($currentdate === $nextservicedate) { ?>

                                <p style="color:orange;"> <?php echo $list['assets_name']; ?></p>     

                            <?php } else if ($date === $nextservicedate) { ?>
                                <p style="color:green;"> <?php echo $list['assets_name']; ?></p>
                            <?php } else if ($yesterdaydate === $nextservicedate) { ?>
                                <p style="color:red;"> <?php echo $list['assets_name']; ?></p>

                            <?php } else { ?>
                                <?php echo $list['assets_name']; ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?php $date = date('Y-m-d', strtotime(' + 2 days')); ?>
                            <?php $yesterdaydate = date('Y-m-d', strtotime(' - 1 days')); ?>
                            <?php if ($currentdate === $nextservicedate) { ?>
                                <p style="color:orange;"><?php
                                    $date1 = date_create($list['nextservicedate']);
                                    $date2 = date_create($currentdate);
                                    $diff = date_diff($date1, $date2);
                                    echo 'Days - ' . $diff->format("%a");
                                    ?></p>
                            <?php } else if ($date == $nextservicedate) { ?>
                                <p style="color:green;"><?php
                                    $date1 = date_create($list['nextservicedate']);
                                    $date2 = date_create($currentdate);
                                    $diff = date_diff($date1, $date2);
                                    echo 'Days - ' . $diff->format("%a");
                                    ?></p>
                            <?php } else if ($yesterdaydate == $nextservicedate) { ?>
                                <p style="color:red;"><?php
                                    $date1 = date_create($list['nextservicedate']);
                                    $date2 = date_create($yesterdaydate);
                                    $diff = date_diff($date1, $date2);
                                    echo 'Days - ' . $diff->format("%a");
                                    ?></p>
                            <?php } else { ?>
                                <?php
                                $date1 = date_create($list['nextservicedate']);
                                $date2 = date_create($currentdate);
                                $diff = date_diff($date1, $date2);
                                echo 'Days - ' . $diff->format("%a");
                                ?>          
                            <?php } ?>



                        </td>
                        <td style="width:15%">    <?php
                            echo date('d-M-Y', strtotime($list['servicedate']));
                            ?></td>
                        <td style="width:15%">     <?php
                            echo date('d-M-Y', strtotime($list['nextservicedate']));
                            ?>

                        </td>

                        <td>
                            <a data-toggle="modal" href="#assets_maintenance-<?php echo $list['maid'] ?>"><i class="fa fa-pencil" style="color:gray" title="Edit"></i></a>
                        </td>


                    </tr>
                    <?php $k++ ?>
                <?php } ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
$this->load->view('Maintenance/assets_maintenance');
?>






<script type="text/javascript">
    /* Date picker validation Fucntions */
    $(document).ready(function () {
        $(".servicedate").click(function () {
            $('.servicedate').pickadate({
                selectYears: true,
                selectMonths: true,
                min: new Date(),
            });
        });
        $(".nextservicedate").click(function () {
            $('.nextservicedate').pickadate({
                selectYears: true,
                selectMonths: true,
                min: new Date(),
            });
        });
    });
</script>
