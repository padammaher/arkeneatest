<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Edit UOM </h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal form-label-left" action="<?php echo base_url() ?>updateUomList" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $uom_type_id; ?>">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!--<input type="text" class="form-control"  name="uom_type" value="<?php echo $result[0]['name']; ?>" required="required" pattern="[A-Za-z\s]*">-->
                                <select class="form-control" name="uom_type" required="required" style="pointer-events: none;cursor: not-allowed;">
                                    <option value="">Select UOM Type</option>
                                    <?php
                                    if (isset($uom_list) && !empty($uom_list)) {
                                        foreach ($uom_list as $ul) {
                                            ?>
                                            <option value="<?php echo $ul['id'] ?>" <?php echo $ul['id'] == $result[0]['id'] ? "selected" : '' ?>><?php echo $ul['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<!--                                <input type="text" class="form-control" value="<?php echo $result[0]['uomname'] ?>" name="uom_name" required="required">-->
                                <div id="tags">

                                    <?php if (isset($result[0]['uomlist'])) {
                                        foreach ($result[0]['uomlist'] as $uml) {
                                            ?>
                                            <span class="tag"><input type="hidden" class="form-control" placeholder="UOM" name="uom_name[]" value="<?php echo $uml['name']; ?>"><?php echo $uml['name']; ?></span>
    <?php }
} ?> 
                                    <input type="text" class="form-control" placeholder="UOM" value="" data-role="tagsinput" >
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="editsubmit" value="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <!--<button type="button" class="btn btn-default">Cancel</button>-->
                                <a href="<?php echo base_url() ?>uomlist" class="btn btn-default">Cancel</a>

                            </div>
                        </div>

                    </form>					

                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<script>
    $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

    $(function () {

        $('#tags input').on('focusout', function () {
            var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters list
            if (txt)
                $(this).before('<span class="tag"><input type="hidden" class="form-control" placeholder="UOM" name="uom_name[]" value="' + txt + '">' + txt + '</span>');
            this.value = "";
            this.focus();
        }).on('keyup', function (e) {
            // comma|enter (add more keyCodes delimited with | pipe)
            if (/(188|13)/.test(e.which))
                $(this).focusout();
        });

        $('#tags').on('click', '.tag', function () {
            if (confirm("Really delete this tag?"))
                $(this).remove();
        });

    });
</script>
<style>
    #tags{
        float:left;
        border:1px solid #ccc;
        padding:4px;
        font-family:Arial;
    }
    #tags span.tag{
        cursor:pointer;
        display:block;
        float:left;
        color:#555;
        background:#add;
        padding:5px 10px;
        padding-right:30px;
        margin:4px;
    }
    #tags span.tag:hover{
        opacity:0.7;
    }
    #tags span.tag:after{
        position:absolute;
        content:"�";
        border:1px solid;
        border-radius:10px;
        padding:0 4px;
        margin:3px 0 10px 7px;
        font-size:10px;
    }
    #tags input{
        background:#eee;
        border:0;
        margin:4px;
        padding:7px;
        width:auto;
    }
</style>