@extends('layouts.login')
@section('title', 'Login')
@section('content')
<div>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
          	@if(Session::has('message'))
			<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			@endif
            <form action="{{url('admin/login')}} " method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<h1>Index:Scale</h1>
              <div>
                <input type="email" class="form-control" name='email' placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name='password' placeholder="Password" required="" />
              </div>
              <div>
                <button type='submit' class="btn btn-default submit" name="login">Log in</button>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
	</div>
</div>
@stop           