<!--<div class="right_col" role="main">-->
<div class="">
    <?php
//    if ($this->session->flashdata('success_msg')) {
//        echo $this->session->flashdata('success_msg');
//    }
//    if ($this->session->flashdata('error_msg')) {
//        echo $this->session->flashdata('error_msg');
//    }
    ?>
    <div class="page-title">
        <div class="title_left">
            <h4>Sensor Type List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>addSensorType" class="btn btn-sm btn-primary">Add New</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Sensor Type</li>
                                <li class="flex-item">Description</li>

                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (isset($sensor_type_details) && !empty($sensor_type_details)) {
                        $i = 1;
                        foreach ($sensor_type_details as $r) {
                            ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">
                                        <li class="flex-item"><?php echo $i; ?></li>
                                        <li class="flex-item"><?php echo $r['name']; ?></li>
                                        <li class="flex-item"><?php echo $r['description'] ? $r['description'] : ""; ?></li>
                                        <li class="flex-item">
                                            <form action="<?php echo base_url(); ?>updateSensorType" method="post" id="updatesensor<?php echo $i; ?>">
                                                <input type="hidden" value="<?php echo $r['id']; ?>" name="id"/>
                                                <input type="hidden" name="post" id="post<?php echo $i; ?>"/>
                                                <a title="Edit" class="edit" id="<?php echo $i; ?>">  
                                                    <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                                                </a>
                                                <a title="Delete" class="delete" id="<?php echo $i; ?>">
                                                    <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                                                </a> 
                                            </form>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>
<!--</div>-->
<style type="text/css">
    .flex-item:first-child {
        width: 8%;
    }
    .flex-item:nth-child(2) {
        width: 16%;
    }
    .flex-item:nth-child(3) {
        width: 36%;
    }
    .flex-item:nth-child(4) {
        width: 16%;
    }
    .flex-item:nth-child(5) {
        width: 14%;
    }
    .flex-item:nth-child(6) {
        width: 14%;
    }
    .flex-item:nth-child(7) {
        width: 10%;
    }

</style>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updatesensor" + id).submit();
        });
        $(".delete").click(function () {
            var flag = confirm('Are you sure you want to delete this item?');
            if (flag == true) {
                var id = $(this).attr('id');
                $("#post" + id).val('delete');
                $("#updatesensor" + id).submit();
            }
        });
    });
</script>