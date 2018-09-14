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
          <form class="form-horizontal form-label-left" name="add_asset" id="add_asset" method="post" action="<?php echo base_url();?>AssetsManagement/add_asset_rule_detail">
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule No.
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="rule_no" id="rule_no" type="text" class="form-control static-text" placeholder="01" value="<?php echo (isset($asset_detail[0]->rule_no))?$asset_detail[0]->rule_no:''; ?>" >
              </div>
            </div>
            <input name="asset_rule_id" id="asset_rule_id" type="hidden" class="form-control" placeholder="19" value="<?php echo (isset($asset_detail[0]->id))?$asset_detail[0]->id:''; ?>">
             
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule Name
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="rule_name" id="rule_name" type="text" class="form-control" placeholder="Oil Pressure" value="<?php echo (isset($asset_detail[0]->rule_name))?$asset_detail[0]->rule_name:''; ?>" >
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Rule Desc
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" name="rule_des" id="rule_des" rows="2" style="resize: vertical;" placeholder="Extreme Oil Pressure etc." ><?php echo (isset($asset_detail[0]->rule_des))?$asset_detail[0]->rule_des:''; ?> 
                </textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Parameter
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="parameter" id="parameter" type="text" class="form-control" placeholder="Oil Pressure" value="<?php echo (isset($asset_detail[0]->parameter))?$asset_detail[0]->parameter:''; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">UOM
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="uom" id="uom">
                  <option value="20">Pa
                  </option>
                  <option value="10">bar
                  </option>
                  <option value="10">Pa
                  </option>
                  <option value="20">kPa
                  </option>
                  <option value="20">psi
                  </option>
                  <option value="20">MPa
                  </option>
                </select>
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Green Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="green_value" id="green_value" onfocusout="compare_rule_value();" type="text" class="form-control" placeholder="11" value="<?php echo (isset($asset_detail[0]->green_value))?$asset_detail[0]->green_value:''; ?>">
              </div>
              <div id="green_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Orange Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="orange_value" onfocusout="compare_rule_value();" id="orange_value" type="text" class="form-control" placeholder="20" value="<?php echo (isset($asset_detail[0]->orange_value))?$asset_detail[0]->orange_value:''; ?>">
              </div>
              <div id="orange_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Red Value
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="red_value"  onfocusout="compare_rule_value();" id="red_value" type="text" class="form-control" placeholder="19" value="<?php echo (isset($asset_detail[0]->red_value))?$asset_detail[0]->red_value:''; ?>">
              </div>
              <div id="red_error" style="color:red;"></div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Wef Date
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="xdisplay_inputx item form-group has-feedback">
                  <input type="text" name="wef_date" class="form-control has-feedback-left" id="single_cal1" placeholder="Wef Date" aria-describedby="inputSuccess2Status" data-inputmask="'mask': '99/99/9999'" value="<?php echo (isset($asset_detail[0]->wef_date))?$asset_detail[0]->wef_date:''; ?>">
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
                <button type="button" class="btn btn-default">Cancel
                </button>
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
