<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <?php if($this->session->flashdata('message')){ ?> 
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <div  class="alert alert-danger fade in" role="alert" id="infoMessage" ><?php echo ($this->session->flashdata('message'))?$this->session->flashdata('message'):'';?></div>
           <?php } ?>
          <div class="x_title">
            <h4>Add Client User
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          
          <div class="x_content">
          <form id="add_client" class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/add_client_detail">
              <!-- <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="srno" type="text"  class="form-control" value="1" >
                </div>
              </div> -->
              <input type="hidden" name="admin_user_id" id="admin_user_id" value="<?php echo $user_id; ?>"> 
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="client_name" type="text" class="form-control" placeholder="Enter Name" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" required="required" name="country_id">
                    <option>Select Customer Location </option>
                      <?php foreach($country as $contries){ ?> 
                      <option value="<?php echo  $contries->location_name;?>"><?php echo $contries->location_name;?> </option>
                      <?php } ?> 
                   </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="client_username"  autocomplete="off" type="text" class="form-control" placeholder="Enter Email id" required="required">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="password" autocomplete="off" type="password" class="form-control" value="Enter Password" required="required">
                </div>
              </div>						  
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12 control-label" style="text-align:left;">
                  <label>
                    <input name="status" type="checkbox" class="flat" value="1" checked="checked"> Active
                  </label>
                </div>
              </div>
              <div class="ln_solid">
              </div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Save
                  </button>
                  <a href="<?php echo base_url()?>Customer/client_user_list">
                  <button type="button" class="btn btn-default">Cancel
                  </button> </a>
                </div>
              </div>
            </form>					
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
setTimeout(function() {
    $('#infoMessage').fadeOut('fast');
}, 7000);
  document.getElementById("add_client").reset();
</script>