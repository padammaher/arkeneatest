<!--<div class="right_col" role="main">-->
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Add UOM</h4>						
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal form-label-left" id="Uom_add" id="Uom_add" action="<?php echo base_url() ?>addUomList" method="POST">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM Type *</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" required="required" id="uom_type" name="uom_type">
                                        <option value="">Select Uom Type
                                        </option>
                                         <?php   foreach($uom_type_list as $um){ ?> 
                                        <option value="<?php echo $um['id'];?>"><?php echo (isset($um['name']))?$um['name']:''; ?></option>
                                      <?php   } ?> 
                                    </select> 
<!--                                    <input type="text" class="form-control" placeholder="UOM Type" name="uom_type" required="required" value="<?php echo @$post['uom_type']; ?>" pattern="[a-zA-Z\s]*">-->
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="tags">
                                    <input type="text" class="form-control" placeholder="UOM" value="" data-role="tagsinput" >
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
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
<script type="text/javascript">
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
<!--<script type="text/javascript">
    $(document).ready(function () {
        var jsonData = [];
        $.ajax({
            url: "<?php echo base_url(); ?>Master/uommaster/get_uom",
            type: 'post',
            dataType: 'json',
            success: function (res) {
                jsonData = res;

                var ms1 = $('#uom_id').tagSuggest({
                    data: jsonData,
                    sortOrder: 'name',
                    maxDropHeight: 200,
                    name: 'uom_id',
                });

            }
        });

    });
</script>-->

<style>
    #tags{
<<<<<<< HEAD
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
=======
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
>>>>>>> 53b54693fbcf9d1679229e4265fb11901d2c625b
</style>