    <section class="wrapper" style="display:inline-block; width:100%; padding:0px 15px 0px 15px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-bg all-padding-15 assetmngthld">
                    <h4 class="col-sm-12"> 
                        <a class="backto pull-left" href="<?php echo base_url(); ?>assetsmanagement/asst_main_cat_dashboard"><i class="fa fa-mail-reply"></i> Back to main category list </a>
                        <a class="pull-right" href="<?php echo base_url(); ?>assetsmanagement/assets_sub_category"><i class="fa fa-list-ol"></i>  All Sub Cat list view</a>
                    </h4>
                    <div class="col-sm-12" style="margin-bottom: 5px;padding-left: 0px;padding-right: 0px;">
                <button class="btn btn-default pull-right" data-backdrop-limit="1" data-toggle="modal" href="#sub_category_list_view"> <i class="fa fa-list">&nbsp;</i> List View of Sub Category</button>
            </div>
                    <div class="col-sm-12">
                        <div class="row">
                             <?php  $url = $this->uri->segment(3);?>
                             <input type="hidden" name="maincatid" id="maincatid" value="<?php echo $url ?>"/>
                              <?php if ($sub_category != NULL){ ?>
                            <?php foreach ($sub_category as $list) { ?>
                          
                                <div class="col-sm-3">
                                    <a class="subassethold" href="<?php echo base_url(); ?>assetsmanagement/assets_dashboard/<?php echo $list['id'] ?>">
                                        <div class="assets subasset">
                                            <div class="numcount">
                                                <span><?php echo $list['ttlasstcount'] ?></span>
                                            </div>
                                            <h3><?php echo $list['ast_sub_cat_name'] ?></h3>
                                        </div>
                                    </a>
                                </div>
                              
                                <input type="hidden" name="maincatname" id="maincatname" value="<?php echo $list['ast_main_cat_name'] ?>"/>
                               
                            <?php } ?>
                            <?php }else{ ?>
                                <div class="midtext">
                                 <h1> <b><?php echo 'Nothing to Show.'; } ?></b></h1>
                        </div>​
                        </div>​
                    </div>
                </div>    
            </div>
        </div>
    </section>
    <?php
    $this->load->view('Assets_Sub_Category/assets_sub_cat_list_by_main_cat');
    ?>
    <script>
        var main_cat_id = $("#maincatid").val();
        var main_cat_name = $("#maincatname").val();
        var for_redirect = "for_redirect";
        $('#add_assets_sub_category').on('show.bs.modal', function (e) {
            $(e.currentTarget).find('input[name="ast_main_cat_id"]').val(main_cat_id);
            $(e.currentTarget).find('input[name="ast_main_cat_name"]').val(main_cat_name);
            $(e.currentTarget).find('input[name="for_redirect"]').val(for_redirect);
        });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
<?php if (($this->session->flashdata())) { ?>
            showSuccess("<?php echo $this->session->flashdata('msg'); ?>");
<?php } ?>
    });
</script>
