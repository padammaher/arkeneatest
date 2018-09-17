<!--<div class="right_col" role="main">-->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>UOM List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>addUomList" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="uom-type-list">

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="flex-container flex-container-head nowrap">
                                <li class="flex-item">Sr. No.</li>
                                <li class="flex-item">UOM Type</li>
                                <li class="flex-item">UOM</li>
                                <li class="flex-item">Actions</li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    if (isset($uom_type_list) && !empty($uom_type_list)) {
                        $i = 1;
                        foreach ($uom_type_list as $r) {
                            ?>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <ul class="flex-container nowrap">
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $i; ?></li>
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['name']; ?></li>
                                        <li class="flex-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['uomname']; ?></li>
                                        <li class="flex-item">
                                            <form action="<?php echo base_url(); ?>updateUomList" method="post" id="updateuomtype<?php echo $i; ?>">
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
<div id="detailsModal" class="modal fade" role="dialog"></div>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit").click(function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updateuomtype" + id).submit();
        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $(".modal").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#updateuomtype" + id).submit();
            });
        });
        $(".flex-item").click(function (e) {
            if (!$(e.target).hasClass('fa')) {
                var id = $(this).attr('data-value');
                $.ajax({
                    url: "<?php echo base_url() . 'Master/uommaster/uom_details'; ?>",
                    method: "POST",
                    data: {uom_id: id},
                    dataType: "html",
                    success: function (data) {
                        $("#detailsModal").html(data);
                        $('#detailsModal').modal('show');
                    }
                });
            }
        });
    });
</script>