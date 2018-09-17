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
            <h4>Parameter List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>addParameter" class="btn btn-sm btn-primary">Add New</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="parameter-list">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">Parameter Name</li>
                                <li class="flex-item">UOM_Type</li>
                                <li class="flex-item">Description</li>
                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (isset($parameter_list) && !empty($parameter_list)) {
                        $i = 1;
                        foreach ($parameter_list as $r) {
                            ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">
                                        <li class="flex-item"><?php echo $i; ?></li>
                                        <li class="flex-item"><?php echo $r['name']; ?></li>
                                        <li class="flex-item"><?php echo $r['uomtype_name'] ? $r['uomtype_name'] : ""; ?></li>
                                        <li class="flex-item"><?php echo $r['description'] ? $r['description'] : ""; ?></li>
        <!--                                        <li class="flex-item"><?php echo $r['isactive'] == 1 ? 'Active' : 'Deactive'; ?></li>-->
                                        <li class="flex-item">
                                            <form action="<?php echo base_url(); ?>updateParameter" method="post" id="updateparam<?php echo $i; ?>">
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
                    } else {
                        ?>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="flex-container nowrap">
                                    <li class="flex-item">No data found..!</li>                    

                                </ul>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->

<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updateparam" + id).submit();
        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#updateparam" + id).submit();
            });
        });
    });
</script>