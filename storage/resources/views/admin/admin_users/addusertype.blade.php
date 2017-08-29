@extends('layouts.admin')
@section('title', 'Add New Admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
          <h2>Add New Admin</h2>
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
			<form id='registrationForm' action="{{url('admin/userType/add')}} "  class="form-horizontal" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            		<label for="type_name">User Type</label>
					<input type="text" class="form-control" name='usertype_name' id="inputSuccess2" placeholder="User Type" >
				</div>
                <div class="form-group">
                	<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    	<button type="button" class="btn btn-primary">Cancel</button>
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