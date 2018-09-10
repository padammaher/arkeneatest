<div class="white-bg all-padding-15 ">
    <div class="row">
        <div class="col-sm-12">   
            <div class="modal-header">
                <h4 align="center"> <b>Assets Allocation</b></h4>
                <h4 class="modal-title"></h4>                        
            </div>
            <div class="add-candidate-bg"> 
                <div class="pull-right">
                    <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#assets_allocation"><i class="fa fa-plus-circle"></i>Assets Allocation</button>                               
                </div>
            </div>                          
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                <div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                    <div class="table-responsive">

                        <table id="emp-ast-aclocte-list" class="table table-striped dt-responsive display" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th width="30%">User Name</th>
                                    <th >Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assets_list as $emp_aloctd_asst) {//var_dump($emp_aloctd_asst);?>
                                    <tr id="emp_list<?php echo $emp_aloctd_asst['user_id'] ?>">
                                        <td><?php echo $emp_aloctd_asst['userfullname'] ?>&nbsp;&nbsp;<i title="Click me" class="fa fa-expand" data-toggle="modal" data-target="#view_assets" onclick="expend_assets(<?php echo $emp_aloctd_asst['user_id'] ?>)"></i></td>
                                        <td> <?php echo $emp_aloctd_asst['astcount'] ?></td>    
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>

            </div>

        </div>
    </div>
</div>

<?php
$this->load->view('Assets_Allocation/assets_allocation'); //Sushma
$this->load->view('Assets_Allocation/emp_assets_details'); //pradnya
?>

<script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>