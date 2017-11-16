  <!-- user login Modal start -->
<div id="userLoginModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Login to subscribe!</h4>
      </div>
      <div class="modal-body">
        <p style="padding: 5px;margin-bottom: 2px;" id="showMessage" class="alert"> </p>
       
        <form id="loginUser" name="loginUser" >
        <div class="alert alert-danger print-error-msg" style="display:none">
        	<ul></ul>
    	</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="main_category_id" name="main_category_id" value="">
     
        <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email">
        <span id="emailError"></span>
        </div>
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
          <span id="passwordError"></span>
        </div>
        <div class="checkbox">
          <label><input type="checkbox"> Remember me</label>
        </div>
         <div class="form-group">
           <a href="#userRegisterModel" style="margin-top:5px;" class="btn btn-default btn-submit-reg sign-up-subscription" data-toggle="modal" data-dismiss="modal">Sign up for Subscription </a>
   
        </div>
        <button type="submit" class="btn btn-default btn-submit-reg">Submit</button> 
        </form> 
      </div>
    <!--  <div class="modal-footer">
        <button type="submit" class="btn btn-default btn-submit-reg" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
  <!-- user login Modal End -->
  
    <!-- user register Modal start -->
  <div id="userRegisterModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Register to subscribe!</h4>
      </div>
      <div class="modal-body">
        <p style="padding: 5px;margin-bottom: 2px;" id="showMessage" class="alert"> </p>
        
        <div class="alert alert-danger print-error-msg" style="display:none">
        	<ul></ul>
    	</div>
    	
        <form id="userRegister" name="userRegister" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="sub_category_id" name="sub_category_id" value="">
         <input type="hidden" id="main_category_id" name="main_category_id" value="">
        
		<div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control" name="username" id="username">
        <span id="usernameError"></span>
        </div>
		
        <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="email" id="email">
        <span id="emailError"></span>
        </div>
        
        	<div class="form-group">
        <label for="email">Profile Image:</label>
        <input type="file" class="form-control" name="profile_image" id="profile_image">
        <span id="profile_imageError"></span>
        </div>
        
        <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
        <span id="passwordError"></span>
        </div>
        
        <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password">       
        </div> 
        
        <div class="form-group text-center">
          <button type="submit" class="btn btn-default btn-submit-reg">Register</button>   <a href="#userLoginModel" style="margin-top:;" class=" btn btn-default btn-submit-reg" data-toggle="modal" data-dismiss="modal">Back to login</a>
        </div>
        
       
        </form> 
      </div>
     <!-- <div class="modal-footer">
        <button type="submit" class="btn btn-default btn-submit-reg" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>
    <!-- user register Modal End -->