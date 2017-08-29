@extends('layouts.admin')
@section('title', 'Update Admin User')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
          <h2>Update User Details</h2><a href="{{url('admin/user/list')}}" class="btn btn-primary pull-right">Back</a>
           <div class="clearfix"></div>
        </div>
		  <div class="x_content">
			@foreach ($errors->all() as $error)
				<li style="padding: 5px;margin-bottom: 2px;" class='alert alert-danger'>{{ $error }}</li>
			@endforeach
			<br />
			@if(Session::has('message'))
				<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
			<br />
			<form id='registrationForm' action="{{url('admin/user/create')}} "  class="form-horizontal form-label-left input_mask" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
          		<input type="hidden" value="{{$users['id']}}" name="id">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control has-feedback-left" name='username' id="inputSuccess2" placeholder="Username" value="{{$users['username']}}">
					<span class="fa fa-user form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
					@if($errors->has('username'))
						<div class="alert">{{ $errors->first('username') }}</div>
					@endif
				</div>
                <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left" name='email' id="inputSuccess4" placeholder="Email"  value="{{$users['email']}}">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
					@if($errors->has('email'))
						<div class="alert">{{ $errors->first('email') }}</div>
					@endif
                </div>
				<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label>Privileges: </label>
					@foreach(explode(',', $userdetail->privileges) as $adminPrivileges)
					
					@endforeach
                    <input type="checkbox" name="privileges[]" value="1" class="flat" /> Properties
                    <input type="checkbox" name="privileges[]" value="2" class="flat" /> Fashion
                    <input type="checkbox" name="privileges[]" value="3" class="flat" /> Movies
					@if($errors->has('privileges'))
						<div class="alert">{{ $errors->first('privileges') }}</div>
					@endif
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label>Permission: </label>
                    <input type="checkbox" name="permission[]" id="hobby2" value="1" class="flat" /> Add
                    <input type="checkbox" name="permission[]" id="hobby3" value="2" class="flat" /> Edit
                    <input type="checkbox" name="permission[]" id="hobby4" value="3" class="flat" /> Delete
					@if($errors->has('permission'))
						<div class="alert">{{ $errors->first('permission') }}</div>
					@endif
                </div>    
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="file" class="form-control  has-feedback-left" name='profile_image' id="profile_image" placeholder="profile_image">
                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
					@if($errors->has('profile_image'))
						<div class="alert">{{ $errors->first('profile_image') }}</div>
					@endif
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  	 <img src='#' id='preview' alt='preview' width="14%" class="has-feedback-left"/>        
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                	<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						<button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
               </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- /page content -->
@stop