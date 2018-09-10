<body>
    <!--main content section start-->
    <section id="main-content" class="sidebar_shift">
        <section class="wrapper" style="display:inline-block; width:100%; padding:0px 15px 0px 15px;">
            <div class="col-sm-12" style="margin-bottom: 5px;padding-left: 0px;padding-right: 0px;">                 
                <button class="btn btn-default pull-right" data-toggle="modal" data-target="#add_assets_main_category"  data-dash-id="FROMDASHBOARD"> <i class="fa fa-plus-circle">&nbsp;</i>Add Assets Main Category</button>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-bg all-padding-15 assetmngthld">
                        <h4 class="col-sm-12"> 
                            <a class="pull-right" href="<?php echo base_url(); ?>assetsmanagement/assets_main_category"><i class="fa fa-list-ol"></i> Main Cat list view</a>
                        </h4>
                        
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12 five-three">
                                    <div class="row">
                                          <?php if ($main_category_count != NULL){ ?>
                                        <?php foreach ($main_category_count as $categoty) { ?>
                                            <div class="col-20">
                                                <div class="assets">
                                                    <div class="numcount">
                                                        <span><?php echo ($categoty['countdata']); ?></span>
                                                    </div>
                                                    <img src="../<?php echo $categoty['assets_img'] ?>" alt="<?php echo $categoty['ast_main_cat_name'] ?>"/>
                                                    <h3><?php echo $categoty['ast_main_cat_name'] ?></h3>
                                                    <a href="<?php echo base_url(); ?>assetsmanagement/asst_sub_cat_dashboard/<?php echo $categoty['id']; ?>">More Info</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                           <?php }else{ ?>
                                <div class="midtext">
                                 <h1> <b><?php echo 'Nothing to Show.'; } ?></b></h1>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
<?php
$this->load->view('Assests_Main_Category/Main_category_add');
$this->load->view('Assets_Sub_Category/assets_sub_category_add');
?>
<script>
    $('#add_assets_main_category').on('show.bs.modal', function (e) {
        var dashId = $(e.relatedTarget).data('dash-id');
        $(e.currentTarget).find('input[name="ast_main_cat_dashbrd"]').val(dashId);
    });
</script>