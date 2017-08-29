@extends('layouts.propertyFront')
@section('title', 'Subcategories')
@section('content')
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
            <li> <a href="{{url('/')}}" class="cat_link"> <img src="{{$MainCategory->main_category_image}}" class="img-responsive">
              <div class="catlist_text">
                <h2>{{$MainCategory->main_category_name}}</h2>
              </div>
              <div class="property_back"> <span class="icon-arrow_back"></span> </div>
              </a> </li>
       
           <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
           @if(count($SubCategories))
            @foreach($SubCategories as $category)
            <li class="cat-img">                
            <a class="cat_link" href="{{url('property/list/'.$category->main_category_id.'/'.$category->id)}}"> <img src="{{$category->category_image}}" class="img-responsive">            
             <div class="hex_img" style="top: -5px;">
                <div  class="hb-md-margin"><span class="hb hb-md hb-custom hb-flickr"><img src="{{URL::asset('public/frontend/images/family.png')}}" class="family_img"></span></div>
              </div>
              <div class="catlist_text">
                <h2>{{$category->category_name}}</h2>
              </div>
              @if($category->id==$subscriptionMaxCount->id) 
               <div class="cls-pop-text popular_text"> Popular </div>
              @endif
              </a>              
              <div class="switch1">
                <input id="cmn-toggle-5" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                <label class="subcription-data">               
                @if(isset($category->subscription_status_type) && !empty ($category->subscription_status_type) && $category->subscription_status_type==1)
                <span main-cat-id="{{$category->main_category_id}}" id="{{$category->id}}" class="subscribe-number">{{$category->total_subscriptions_counts}}</span>
                <span main-cat-id="{{$category->main_category_id}}" id="{{$category->id}}" class="subscribe-unsbscribe subscribe-check">demo</span>                
                @else               
                <span main-cat-id="{{$category->main_category_id}}" id="{{$category->id}}" class="subscription-count">{{$category->total_subscriptions_counts}}</span>
                <span main-cat-id="{{$category->main_category_id}}" id="{{$category->id}}" class="subscribe-unsbscribe subscribe">Subscribe</span>
                </span> 
                @endif             
                </label>             
              </div>               
            </li>
            @endforeach
             @else
             <li>
              <h2>No record found!</h2>
             </li>
             @endif 
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

  <!-- include user login register Modal while subscription start -->
	
	@include('frontend.components.login_register_modal_sub')
	
    <!-- user login register Modal End -->

</section>
@endsection
@section('script')
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
            url: "{{url('property/subscribe/subcategory')}}",
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
        url: "{{url('frontend/user/login')}}",
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
            url: "{{url('property/subscribe/subcategory')}}",
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
        url: "{{url('frontend/user/register')}}",
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
            url: "{{url('property/subscribe/subcategory')}}",
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
@endsection



