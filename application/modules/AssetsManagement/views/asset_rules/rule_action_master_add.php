<div class="">
  <div class="clearfix">
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h4>Add Rule & Action Master
          </h4>
          <div class="clearfix">
          </div>
        </div>
        <div class="x_content">
          <form class="form-horizontal form-label-left" name="add_asset" id="add_asset" method="post" action="<?php echo base_url();?>Add_Asset_Rule">
            <input name="asset_rule_id" id="asset_rule_id" type="hidden" class="form-control" placeholder="19" value="<?php echo (isset($asset_detail[0]->id))?$asset_detail[0]->id:''; ?>">
             
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule Name
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="rule_name" id="rule_name" required type="text" class="form-control" placeholder="Enter Parameter Rule Name" value="<?php echo (isset($asset_detail[0]->rule_name))?$asset_detail[0]->rule_name:''; ?>" >
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule Desc
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" required name="rule_des" id="rule_des" style="resize: vertical;" placeholder="Enter Paramter Rule Description." ><?php echo (isset($asset_detail[0]->rule_des))?$asset_detail[0]->rule_des:''; ?></textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="parameter_id" id="parameter_id" type="hidden" class="form-control" placeholder="Oil Pressure" value="<?php echo (isset($param_id))?$param_id:''; ?>">
                <input name="" id="parameter" type="text" class="form-control" placeholder="Parameter" value="<?php echo (isset($parameter_name))?$parameter_name:''; ?>" readonly>
           
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
             
                <select class="form-control" name="uom" id="uom" >
                <option value=''>Select UOM</option>
                  <?php foreach($uom_data as $um){ ?> 
                   <option value="<?php echo $um['id'];?>"><?php echo $um['name'];?> </option>
                   <?php } ?> 
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Green Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="green_value" required id="green_value" onfocusout="compare_rule_value();" type="text" class="form-control" placeholder="Enter Green Value" value="<?php echo (isset($asset_detail[0]->green_value))?$asset_detail[0]->green_value:''; ?>">
              </div>
              <div id="green_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Orange Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="orange_value" required  onfocusout="compare_rule_value();" id="orange_value" type="text" class="form-control" placeholder="Enter Orange Value" value="<?php echo (isset($asset_detail[0]->orange_value))?$asset_detail[0]->orange_value:''; ?>">
              </div>
              <div id="orange_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Red Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="red_value" required onfocusout="compare_rule_value();" id="red_value" type="text" class="form-control" placeholder="Enter Red Value" value="<?php echo (isset($asset_detail[0]->red_value))?$asset_detail[0]->red_value:''; ?>">
              </div>
              <div id="red_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Wef Date
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="xdisplay_inputx item form-group has-feedback">
                  <input type="text" required name="wef_date" class="form-control has-feedback-left" id="single_cal1" placeholder="Enter date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" value="<?php echo (isset($asset_detail[0]->wef_date))?$asset_detail[0]->wef_date:''; ?>">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true">
                  </span>
                  <span id="inputSuccess2Status" class="sr-only">(success)
                  </span>
                </div>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                <label class="">
                  <div class="icheckbox_flat-green checked" style="position: relative;">
                    <input name="rule_status" id="rule_status" type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                    </ins>
                  </div> Active
                </label>
              </div>
            </div>
            <div class="ln_solid">
            </div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Save
                </button>
                <a href="<?php echo base_url()?>Asset_Rule_list">
                <button type="button" class="btn btn-default">Cancel
                </button>
              </a>
              </div>
            </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<script> 
function compare_rule_value() {
  var green_value = document.getElementById("green_value").value;
  var orange_value = document.getElementById("orange_value").value;
  var red_value = document.getElementById("red_value").value;

      if(green_value&&orange_value&&red_value){

          if(parseInt(green_value)>=parseInt(orange_value)){
            $('#orange_error').html('please add value greter than green value '); 
          }else{  $('#orange_error').html("");   }
          if(parseInt(orange_value)>=parseInt(red_value )){
            $('#red_error').html('please add value greter than orange value '); 
          }else{
            $('#red_error').html(''); 
          }

      }else if(green_value&&orange_value){
          if(parseInt(green_value)>=parseInt(orange_value)){
            $('#orange_error').html('please add value greter than green value '); 
          }else{   $('#orange_error').html("");  }
      }else if(red_value){
        $('#red_error').html('please add green value,orange value then add red value ');
      }
  }
   


</script>
