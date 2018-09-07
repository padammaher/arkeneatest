<div class="row">
    <table class="table table-striped">
        <thead class="">
        <thead>
            <tr> 
                <th width="10%">SR.NO.</th>
                <th width="60%">Assets Name</th>
                <th width="30%">Allocation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($all_assts_name_by_usrname as $assets) { //var_dump($assets);
                ?>
                <tr id="deleteRow_<?php echo $assets['id'] ?>">
                    <td><?php echo $i ?></td>
                    <td><?php echo $assets['assets_name'] ?></td>
                    <td><?php echo $assets['createddate'] ?></td>
                    <td><i title="delete" class="fa fa-remove" onclick="delete_assets_allocation(<?php echo $assets['id'] ?>)"></i></td>            
                </tr>
                <?php $i++;
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function delete_assets_allocation(dId) {
        if (confirm('Are you sure?')) {
            $('#deleteRow_' + dId).remove();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/assetsallocation_status/' + dId,
                success: function (data) {
                    showSuccess("Assets De-Allocated Successfully");
                }
            });
            return false;
        }

    }
</script>
