<div class="right_col" role="main">
  <div class="">
    <div class="clearfix">
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h4>Edit Client User
            </h4>						
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
          <form class="form-horizontal form-label-left" method="POST" action="<?php echo base_url()?>Customer/update_client_detail">
              <!-- <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sr. No.
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="srno" type="text"  class="form-control" value="<?php echo $client_details[0]->srno; ?>" >
                
                </div>
              </div> -->
              <input name="id" type="hidden"  class="form-control"  value="<?php echo $client_details[0]->id; ?>" >
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="client_name" type="text" class="form-control" placeholder="Saschin Naidoo" required="required"  value="<?php echo $client_details[0]->client_name; ?>" >
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Customer Location
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" required="required" name="client_location">
                    <option>Select Customer Location
                    </option>
                    <option value="1" <?php echo ($client_details[0]->client_location==1)?'selected':''; ?>>pune </option>
                    <option value="2"  <?php echo ($client_details[0]->client_location==2)?'selected':''; ?>>Mumbai</option> 
                    <option value="3"  <?php echo ($client_details[0]->client_location==2)?'selected':''; ?>>Ahmendnagar</option>
                    <option value="4"  <?php echo ($client_details[0]->client_location==3)?'selected':''; ?>>Beed </option>
                    <option value="5"  <?php echo ($client_details[0]->client_location==4)?'selected':''; ?>>Latur</option>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="client_username" id="client_username" type="text" class="form-control" placeholder="SN@bdv.co.za etc" required="required"  value="<?php echo $client_details[0]->client_username; ?>" >
                <div id="email_error" style="color:red"> </div>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input name="password" type="password" id="client_password" class="form-control" value="Password@123" required="required"  value="<?php echo $client_details[0]->password; ?>" >
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
<script> 
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

  

  
