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
                  <input name="client_username" id="client_username"  autocomplete="off" type="text" class="form-control" placeholder="Enter Email id" required="required">
                  <div id="email_error" style="color:red"> </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input name="password" id="client_password" autocomplete="off" type="password" class="form-control" value="Enter Password" required="required">
                  <ul  id="d1" class="list-group">
                    <li class="list-group-item list-group-item-success">Password Conditions</li>
                    <li class="list-group-item" id=d12><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Upper Case Letter</li>
                    <li class="list-group-item" id=d13 ><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Lower Case Letter </li>
                    <li class="list-group-item" id=d14><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Special Char </li>
                    <li class="list-group-item" id=d15><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Number</li>
                    <li class="list-group-item" id=d16><span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Length 8 Char</li>
                  </ul>
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

$(document).ready(function() {

$('#client_username').focusout(function(){
                $('#client_username').filter(function(){
                   var emil=$('#client_username').val();
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !emailReg.test( emil ) ) {
                   $("#email_error").html('Please enter valid email'); 
                } else {
                  $("#email_error").html("");
                 
               // alert('Thank you for your valid email');
                }
                })
            });
});


</script>
<style>
.list-group{
    z-index:10;display:none; 
	position:absolute; 
    color:red;
}
.msg
{
	position:absolute; 
    color:red;
}
</style> 

<script>
$(document).ready(function() {
////////////////////
$('#client_password').keyup(function(){
var str=$('#client_password').val();
var upper_text= new RegExp('[A-Z]');
var lower_text= new RegExp('[a-z]');
var number_check=new RegExp('[0-9]');
var special_char= new RegExp('[!/\'^£$%&*()}{@#~?><>,|=_+¬-\]');

var flag='T';

if(str.match(upper_text)){
$('#d12').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Upper Case Letter ");
$('#d12').css("color", "green");
}else{$('#d12').css("color", "red");
$('#d12').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Upper Case Letter ");
flag='F';}

if(str.match(lower_text)){
$('#d13').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Lower Case Letter ");
$('#d13').css("color", "green");
}else{$('#d13').css("color", "red");
$('#d13').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Lower Case Letter ");
flag='F';}

if(str.match(special_char)){
$('#d14').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Special Char ");
$('#d14').css("color", "green");
}else{
$('#d14').css("color", "red");
$('#d14').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Special Char ");
flag='F';}

if(str.match(number_check)){
$('#d15').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> One Number ");
$('#d15').css("color", "green");
}else{
$('#d15').css("color", "red");
$('#d15').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> One Number ");
flag='F';}


if(str.length>7){
$('#d16').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Length 8 Char ");

$('#d16').css("color", "green");
}else{
$('#d16').css("color", "red");
$('#d16').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Length 8 Char ");

flag='F';}


if(flag=='T'){
$("#d1").fadeOut();
$('#display_box').css("color","green");
$('#display_box').html("<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> "+str);
}else{
$("#d1").show();
$('#display_box').css("color","red");
$('#display_box').html("<span class='glyphicon glyphicon-remove' aria-hidden='true'></span> "+str);
}
});
///////////////////
$('#client_password').blur(function(){
$("#d1").fadeOut();
});
///////////
$('#client_password').focus(function(){
$("#d1").show();
});
////////////

})
</script>

  

  
