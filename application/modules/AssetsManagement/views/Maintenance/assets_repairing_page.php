
<?php echo form_open_multipart('assetsmanagement/assets_repairing', array('id' => 'form_audit_id', 'class' => 'form_audit_id')); ?>
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
                    <table id="reparing-list1" class="table">
                        <thead>
                            <tr> 
                                <th>Id</th>
                                <th>Name Assets</th>
                                <th >Total No of Assets</th>
                                <th>In Used Assets </th>
                                <th>Reparing</th>
                              
                            </tr>
                        </thead> 
                        <?php $k = 1 ?>
                        <?php foreach ($assets_reaparing as $list) { //var_dump($list); ?>
                            <tr>
                                <td><?php echo $k ?></td>
                                <td> <?php echo $list['ast_sub_cat_name'] ?></td>
                                <td class="total"> 
                                    <?php echo $list['cnt'] ?>

                                </td>
                                <td><input id="reparingtxt" type="text" name="text2[]" required="" value="0"></td>
                                    <td id="diff"> </td>
<!--                                   <td> <a data-toggle="modal" href="#edit_asstes<?php// echo $list['subassetsid'] ?>"><i class="fa fa-pencil" style="color:gray" title="Edit"></i></a></td>-->
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
//$this->load->view('Maintenance/assets_listdisplay'); //Sushma
?>

        <script>
            $(document).ready(function () {
                //var table = $('#audit-list').DataTable();
             

                $("input").change(function () {
                    // get the current row
                    var currentRow = $(this).closest("tr");

                    //  alert(currentRow.find('td').eq(0).text());
                    currentRow.find('td').eq(0).text()
                    var col1 = currentRow.find(".total").html();  // get current row 2nd table cell TD value

                    var col2 = currentRow.find("input:text").val();
                    var data1 = col1 - col2;
                    //currentRow.find("#sum").text(data1);
                    var diff_fig = data1;
                    currentRow.find("#diff").html('<input type="hidden" value="' + diff_fig + '" id="diffrence_value1" name="diffrence_value1[]">' + diff_fig);
                });
            });
        </script>
<script>

    $(document).ready(function () {
        // $("#ast_allo_sub_cat_id").hide();
        $("#ast_allo_main_cat_id").change(function () {
            var main_cat_val = $("select#ast_allo_main_cat_id option:selected").val();
            sub_cat(main_cat_val);
        });

        function sub_cat(main_cat_val)
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>assetsmanagement/getsubcat',
                data: {'main_cat_name': main_cat_val},
                success: function (data) {
                    //alert(ast_sub_cat_id);
                    // $('select[name="ast_allo_sub_cat_id"]').show();
                    $('select[name="ast_allo_sub_cat_id"]').html(data.content).trigger('liszt:updated').val();
                    $("#ast_allo_sub_cat_id").val($("#ast_allo_sub_cat_id option:first").val());
                    $('#ast_allo_sub_cat_id').material_select();

                }
            });
        }
    });
</script>


