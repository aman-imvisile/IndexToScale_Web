  <!-- user login Modal start -->
<div id="headeruserLoginModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <p style="padding: 5px;margin-bottom: 2px;" id="showMessage" class="alert"> </p>
       
        <form id="headerloginUser" name="loginUser" >
        <div class="alert alert-danger print-error-msg" style="display:none">
        	<ul></ul>
    	</div>
        <input type="hidden" id="header_token" name="header_token" value="<?php echo e(csrf_token()); ?>">
        
     
        <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="headeremail" id="headeremail">
        <span id="emailError"></span>
        </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="headerpassword" id="headerpassword">
          <span id="passwordError"></span>
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
         <div class="form-group text-center">
            <button type="submit" class="btn btn-default btn-submit-reg">Submit</button>   <a href="#headeruserRegisterModel" style="" class=" btn btn-default btn-submit-reg" data-toggle="modal" data-dismiss="modal">Sign up </a>
   
        </div>
     
        </form> 
      </div>
      <!--<div class="modal-footer">
        <button type="submit" class="btn btn-default btn-submit-reg" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
  <!-- user login Modal End -->
  
    <!-- user register Modal start -->
  <div id="headeruserRegisterModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <p style="padding: 5px;margin-bottom: 2px;" id="showMessage" class="alert"> </p>
        
        <div class="alert alert-danger print-error-msg" style="display:none">
        	<ul></ul>
    	</div>
    	
        <form id="headeruserRegister" name="userRegister" >
        <input type="hidden" id="header_token"  name="_token" value="<?php echo e(csrf_token()); ?>">
              
		<div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control" name="username" id="headerusername">
        <span id="usernameError"></span>
        </div>
		
        <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="headeremail">
        <span id="emailError"></span>
        </div>
        
        	<div class="form-group">
        <label for="email">Profile Image:</label>
        <input type="file" class="form-control" name="profile_image" id="headerprofile_image">
        <span id="profile_imageError"></span>
        </div>
        
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="password" id="headerpassword">
        <span id="passwordError"></span>
        </div>
        
        <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" name="confirm_password" id="headerconfirm_password">       
        </div> 
        
        <div class="form-group text-center">
           <button type="submit" class="btn btn-default btn-submit-reg">Register</button>  <a href="#headeruserLoginModel" class=" btn btn-default btn-submit-reg" data-toggle="modal" data-dismiss="modal">Back to login</a>
        </div>
        
        
        </form> 
      </div>
      <!--<div class="modal-footer">
        <button type="submit" class="btn btn-default btn-submit-reg" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>

  
  <!--- sign in section-->
  <section class="filter_right sign-in"  style="display:none">
    
	   <div class="signin-block">
            <div class="col-sm-12 signin-block-content">
                
                <form>
                    <h5>Sign in</h5>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-sm-10">
                           <button type="button" class="btn btn-secondary btn-lg btn-block custom-btn">Enter</button>
                        </div>
                    </div>  
                   <p> <a href="#">Forget email?</a></p><br><br><br>
                    <p> <a href="#">Sign up</a></p><br><br>
                    <div class="form-group row">
                        <div class="col-sm-7">
                           <select class="form-control custom-select" id="">
                               <option>English(United Kingdom)</option>
                               <option>a</option>
                               <option>b</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <ul class="sign-in-menu">
                                <li><a href="#">Help</a></li>                       
                                <li><a href="#">Privacy</a></li> 
                                <li><a href="#">Terms</a></li>     
                            </ul>
                        </div>
                    </div>  
                </form>
           </div>
        </div>   
  </section>
  
<!--sign in end------->
<!-- user register Modal End -->
<script type="text/javascript">
  $("#user-login").on('click',function(){
	if($('.filter_right').is(":visible"))
  		{ 
	     $('.filter_right').css('display','none');
	     }
	     else {
	     $('.filter_right').css('display','block');
	     }
 });
 
 
 //user Login

$('#headerloginUser').on('submit',function(e){
  e.preventDefault();
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
 var Formdata = {email:$("#headeremail").val(),password:$("#headerpassword").val(),_token:$("#header_token").val()};

    $.ajax({
        url: "<?php echo e(url('frontend/user/login')); ?>",
        data: Formdata, 
        type: 'POST',
        success: function(data){
        	
          var loginObj=jQuery.parseJSON(JSON.stringify(data));
          if(loginObj.success==true){
          	   // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000); 
             window.location.reload();
          
          } else {
				  // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000);
				printErrorMsg(loginObj.validator);
		}
	}
       
    });
    
  });

//user register
$('#headeruserRegister').on('submit',function(e){
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
    e.preventDefault();


    $.ajax({
        url: "<?php echo e(url('frontend/user/register')); ?>",
        data: new FormData($("#headeruserRegister")[0]), 
        dataType:'json',
      	async:false,
      	type:'post',
      	processData: false,
      	contentType: false,
        success: function(data){

          var reggisterObj= jQuery.parseJSON(JSON.stringify(data)); 
          if(reggisterObj.success==true){
             // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000); 
			window.location.reload();
		   } else {
		   // Hide it after 2 seconds
	 		setTimeout(function(){
    		$.LoadingOverlay("hide");
	 		}, 1000); 
			printErrorMsg(reggisterObj.validator);
		
		}

        }
    });
    });
    ///error message function
    function printErrorMsg (msg) {

	$(".print-error-msg").find("ul").html('');

	$(".print-error-msg").css('display','block');

	$.each( msg, function( key, value ) {

		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');

	});

  }
 </script>  
    
    