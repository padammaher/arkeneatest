<div id="view_assets" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Allocated Assets</h4>                        
            </div>
            <div class="modal-body">         
                <div id="assets_box">
                    <?php $this->load->view('Assets_Allocation/alot_ast_page') ?>
                </div>
            </div>
        </div>  
    </div>
</div>  
<script>

    function expend_assets(usrid) {

        allocated_devices(usrid);
    }

    function allocated_devices(usrid)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>assetsmanagement/alctd_devices_by_user',
            data: {'usr_id': usrid},
            success: function (data) {
                // alert(data);
                var parsed = $.parseJSON(data);
                $('#assets_box').html(parsed.page);
            }
        });
    }
</script>
