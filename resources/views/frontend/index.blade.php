@extends('layouts.front')
@section('title', 'categories')
@section('content')
<section class="section1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 recent">
        <div class="pull-left">
          <p> <i class="fa fa-th" aria-hidden="true"></i> Recently Used <i class="fa fa-caret-down" aria-hidden="true"></i> </p>
        </div>
        <div class="pull-right">
          <p>8/32</p>
        </div>
      </div>
      <div class="clearfix"></div>
      
      <div class="col-sm-12">
        <div class="category_list">
          <ul>
         <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
           @if(count($mainCategories))
          	@foreach($mainCategories as $category)
            <li> <a class="cat_link" href="{{url('subcategory/'.$category->id)}}"> <img src="{{$category->main_category_image}}" class="img-responsive">
              <div class="catlist_text">
                <h2>{{$category->main_category_name}}</h2>
              </div>
              @if($category->id==$subscriptionMaxCount->id) 
               <div class="popular_text"> Popular </div>
              @endif
              </a>              
              <div class="switch1">
                 <input id="cmn-toggle-5" class="cmn-toggle cmn-toggle-round-flat" type="checkbox">
                <label class="subcription-data">      
             
                         
                @if(isset($category->subCategoryTotalSubscription) && !empty ($category->subCategoryTotalSubscription) && $category->subscription_status_type==1)
               
                <span id="{{$category->id}}" class="subscribe-number">{{$category->subCategoryTotalSubscription}}</span>
                <span id="{{$category->id}}" class="subscribe-unsbscribe subscribe-check">demo</span>                
                @else               
                <span id="{{$category->id}}" class="mainsubscription-count">{{$category->subCategoryTotalSubscription}}</span>
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
  
</section>
@endsection
@section('script')

@endsection



