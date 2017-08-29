<?php $__env->startSection('title', 'Subcategories'); ?>
<?php $__env->startSection('content'); ?>
<section class="section1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 recent">
        <div class="pull-left">
          <p> <i class="fa fa-th" aria-hidden="true"></i> Recently Used <i class="fa fa-caret-down" aria-hidden="true"></i> </p>
        </div>
        <div class="pull-right">
          <p>6/6</p>
        </div>
      </div>
            <div class="clearfix"></div>
      <div class="col-sm-12">
        <div class="category_list">
          <ul>
            <li> <a href="<?php echo e(url('/')); ?>" class="cat_link"> <img src="<?php echo e($MainCategory->main_category_image); ?>" class="img-responsive">
              <div class="catlist_text">
                <h2><?php echo e($MainCategory->main_category_name); ?></h2>
              </div>
              <div class="property_back"> <span class="icon-arrow_back"></span> </div>
              </a> </li>
       
           <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
           <?php if(count($SubCategories)): ?>
            <?php $__currentLoopData = $SubCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="cat-img">                
            <a class="cat_link" href="<?php echo e(url('property/list/'.$category->main_category_id.'/'.$category->id)); ?>"> <img src="<?php echo e($category->category_image); ?>" class="img-responsive">            
             <div class="hex_img" style="top: -5px;">
                <div  class="hb-md-margin"><span class="hb hb-md hb-custom hb-flickr"><img src="<?php echo e(URL::asset('public/frontend/images/family.png')); ?>" class="family_img"></span></div>
              </div>
              <div class="catlist_text">
                <h2><?php echo e($category->category_name); ?></h2>
              </div>
              <?php if($category->id==$subscriptionMaxCount->id): ?> 
               <div class="cls-pop-text popular_text"> Popular </div>
              <?php endif; ?>
              </a>              
              <div class="switch1">
                <input id="cmn-toggle-5" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                <label class="subcription-data">               
                <?php if(isset($category->subscription_status_type) && !empty ($category->subscription_status_type) && $category->subscription_status_type==1): ?>
                <span main-cat-id="<?php echo e($category->main_category_id); ?>" id="<?php echo e($category->id); ?>" class="subscribe-number"><?php echo e($category->total_subscriptions_counts); ?></span>
                <span main-cat-id="<?php echo e($category->main_category_id); ?>" id="<?php echo e($category->id); ?>" class="subscribe-unsbscribe subscribe-check">demo</span>                
                <?php else: ?>               
                <span main-cat-id="<?php echo e($category->main_category_id); ?>" id="<?php echo e($category->id); ?>" class="subscription-count"><?php echo e($category->total_subscriptions_counts); ?></span>
                <span main-cat-id="<?php echo e($category->main_category_id); ?>" id="<?php echo e($category->id); ?>" class="subscribe-unsbscribe subscribe">Subscribe</span>
                </span> 
                <?php endif; ?>             
                </label>             
              </div>               
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php else: ?>
             <li>
              <h2>No record found!</h2>
             </li>
             <?php endif; ?> 
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="bottom-left">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <div class="hex_ques" style="top:;">
           <div class="hb-md-margin"><span class="hb1 hb-md1 hb-custom1 ">+</span></div>
       </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
       <div class="hex_help" style="top:;">
           <div class="hb-md-margin"><span class="hb1 hb-md1 hb-custom1 ">?</span></div>
       </div>
      </div>
    </div>
  </div>

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
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
           <a href="#userRegisterModel" class="sign-up-subscription" data-toggle="modal" data-dismiss="modal">Sign up for Subscription </a>
   
        </div>
        <button type="submit" class="btn btn-default">Submit</button> 
        </form> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
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
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
        
        <div class="form-group">
           <a href="#userLoginModel" class="sign-up-subscription" data-toggle="modal" data-dismiss="modal">Back to login</a>
        </div>
        
        <button type="submit" class="btn btn-default">Register</button> 
        </form> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- user register Modal End -->

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$(document).ready(function(){
//For subscribe the main category
 $(document).on('click','.subscribe-unsbscribe',function(){
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
    var th= $(this); 
   var sub_category_id= th.attr('id');
   var main_category_id= th.attr('main-cat-id');  
    var _token= $("#_token").val();
    $.ajax({
            type: "POST",
            url: "<?php echo e(url('property/subscribe/subcategory')); ?>",
            data: {sub_category_id: sub_category_id,main_category_id:main_category_id,_token:_token},
            success: function(response) 
            {
              var obj = jQuery.parseJSON(JSON.stringify(response));   
           
                if(obj.success==true)
                {
					
                  if(th.hasClass('subscribe'))
                  {
                    th.removeClass('subscribe').addClass('subscribe-check').html('demo');
                    th.prev('span').removeClass('subscription-count').addClass('subscribe-number').html(obj.subscription_count.total_subscriptions_counts);
                  }  else if(th.hasClass('subscribe-check'))
                  {
                    th.removeClass('subscribe-check').addClass('subscribe').html('Subscribe');
                    th.prev('span').removeClass('subscribe-number').addClass('subscription-count').html(obj.subscription_count.total_subscriptions_counts);
                  }
                   // Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000);   
                }
                 else 
                {
                   // Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000);                 
                  $("#sub_category_id").val(sub_category_id);  
                  $("#main_category_id").val(main_category_id);               
                  $("#userLoginModel").modal();
                }                  
              
            }
           
          });
 
    });

//user Login


$('#loginUser').on('submit',function(e){
  e.preventDefault();
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
 var Formdata = {email:$("#email").val(),password:$("#password").val(),_token:$("#_token").val()};

    $.ajax({
        url: "<?php echo e(url('frontend/user/login')); ?>",
        data: Formdata, 
        type: 'POST',
        success: function(data){        	
          var loginObj=jQuery.parseJSON(JSON.stringify(data));
          if(loginObj.success==true)
          {          
          var sub_category_id= $("#sub_category_id").val();    
           var main_category_id= $("#main_category_id").val();         
          var _token= $("#_token").val();
          
          $.ajax({
            type: "POST",
            url: "<?php echo e(url('property/subscribe/subcategory')); ?>",
            data: {sub_category_id: sub_category_id,main_category_id:main_category_id, _token:_token},
            success: function(response) 
            {

              var obj = jQuery.parseJSON(JSON.stringify(response));   
           
                if(obj.success==true)
                {
				   // Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000); 	
                  $('#userLoginModel').modal('toggle');
                  window.location.reload();

                } 
                  else                
                {
                    // Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000); 


                }                  
              
            }
           
          });
		} else {
		// Hide it after 2 seconds
	 		  setTimeout(function(){
    		  $.LoadingOverlay("hide");
	 			}, 1000); 
			
				printErrorMsg(loginObj.validator);
		}
	}
       
    });
    
});

    //user register

$('#userRegister').on('submit',function(e){
  e.preventDefault();

  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
    $.ajax({
        url: "<?php echo e(url('frontend/user/register')); ?>",
        data: new FormData($("#userRegister")[0]), 
        dataType:'json',
      	async:false,
      	type:'post',
      	processData: false,
      	contentType: false,
        success: function(data){
          var sub_category_id= $("#sub_category_id").val();  
          var main_category_id= $("#main_category_id").val();         
          var _token= $("#_token").val();
          var reggisterObj= jQuery.parseJSON(JSON.stringify(data)); 
          if(reggisterObj.success==true){
             // Hide it after 2 seconds
	 		  setTimeout(function(){
    		  $.LoadingOverlay("hide");
	 			}, 1000); 
          alert("You have successfully registered and logged in!");
            // Show full page LoadingOverlay
           $.LoadingOverlay("show");
          $.ajax({
            type: "POST",
            url: "<?php echo e(url('property/subscribe/subcategory')); ?>",
            data: {sub_category_id: sub_category_id, main_category_id:main_category_id,_token:_token},
            success: function(response) 
            {

              var obj = jQuery.parseJSON(JSON.stringify(response));   
           
                if(obj.success==true)
                {	
                	   // Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000); 
                  alert("You have successfully subscribed the category!");		
                  $('#userLoginModel').modal('toggle');
                  window.location.reload();
                  
                } else {                 
                	// Hide it after 2 seconds
	 				setTimeout(function(){
    				$.LoadingOverlay("hide");
	 				}, 1000); 
					printErrorMsg(obj.validator);
					
                }                  
              
            }
           
          });
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



///////




});

</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.propertyFront', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>