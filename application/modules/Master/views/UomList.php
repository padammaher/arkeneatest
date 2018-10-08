<!--<div class="right_col" role="main">-->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>UOM List</h4>
        </div>

        <div class="title_right">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>manageIcon" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Manage Icon</a>
                <a href="<?php echo base_url() ?>addUomList" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content" id="uom-type-list">
                    <table id="datatable" class="table table-striped table-bordered item-table" >
                        <thead>
                            <tr><th>Sr. No</th>
                                <th>UOM</th>
                                <th>UOM Type</th>
                                <th>Status</th>
                                <th>Actions</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($uom_type_list) && !empty($uom_type_list)) {
                                $i = 1;
                                foreach ($uom_type_list as $r) {
//                                    if (isset($r['uomlist'][0]['name'])) {
                                    ?>
                                    <tr>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $i; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['uomnames']; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['name']; ?></td>
                                        <td class="flx-item" data-value="<?php echo $r['id'] . "_" . $i; ?>"><?php echo $r['active'] == 1 ? 'Active' : 'In-active'; ?></td>
                                        <td  class="action">
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
                                        </td>
                                    </tr>
                                    <?php
//                                    } 
                                    $i++;
                                }
                            } else {
                                ?>
                            <td colspan="7">No data found..!</td>       
                        <?php }
                        ?>
                        </tbody>
                    </table>
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
        $('body').on('click', '.edit', function () {
            var id = $(this).attr('id');
            $("#post" + id).val('edit');
            $("#updateuomtype" + id).submit();
        });
        $(".delete").click(function () {
            var id = $(this).attr('id');
            $("#delete_confirmation").modal();
            $(".ok").click(function () {
                $("#post" + id).val('delete');
                $("#updateuomtype" + id).submit();
            });
        });
        $('body').on('click', '.flx-item', function (e) {
            if (!$(e.target).hasClass('action')) {
                var id = $(this).attr('data-value');
                if (id.length !== 0)
                {
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
            }
        });
    });
</script>