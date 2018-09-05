<div class="row margin-bottom-10">
    <div class="col-sm-8">
        <h3><?php echo lang('index_groups_th'); ?></h3>
    </div>

    <div class="col-sm-4 padding-top-10 text-right">
        <button class="btn btn-info btn-sm" data-toggle="modal" href="#addgroup">
            <i class="fa fa-plus-circle"></i> <?php echo lang('index_create_group_link') ?></button>
    </div>
</div>




<div id="infoMessage"><?php echo $message; ?></div>

<table id="FlagsExport" class="table table-bordered table-striped dt-responsive display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>                   
            <th>Action</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th>Name</th>
            <th>Description</th>                      
            <th>Action</th>
        </tr>
    </tfoot>

    <tbody>
        <?php
        foreach ($groups1 as $user):
            //var_dump($user);
            ?>
            <tr>
                <td><a data-toggle="modal" href="#viewCandidateDetails_<?php echo $user['name'] ?>"><?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($user['description'], ENT_QUOTES, 'UTF-8'); ?></td>		
                <td><?php echo anchor("auth/edit_group/" . $user['id'], 'Edit'); ?></td>
            </tr>
<?php endforeach; ?>
    </tbody>
</table>

<!--<p><?php echo anchor('auth/create_user', lang('index_create_user_link')) ?> | <?php echo anchor('auth/create_group', lang('index_create_group_link')) ?></p>-->
<?php $this->load->view('modal/create_group') ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#FlagsExport').DataTable({
            "pageLength": 50,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>

<!--<link type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">-->
<link type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css" rel="stylesheet">
<!--<script type="text/javascript" src="jquery-1.12.0.min.js"></script>-->

<!--<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<!--<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<!--<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>-->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>


<?php
$this->load->view('modal/show_user')?>