@extends('layouts.admin')
@section('title', 'Add New Property Category')
@section('menu_title', 'Categories')
@section('content')
	@include('admin.property.header')
	</div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
          <h2>Add New Property Category</h2>
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
			<form id='registrationForm' action="{{url('admin/property/category/create')}} "  class="form-horizontal form-label-left input_mask" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<div class="col-md-8 col-sm-10 col-xs-12 form-group">
            		<label for="category_name">Category Name</label>
					<input type="text" class="form-control" name='category_name' id="inputSuccess2" placeholder="Category Name" >
					<!-- <span class="fa fa-user form-control-feedback left" aria-hidden="true"><font color="red">*</font></span> -->
				</div>
				<div class="col-md-8 col-sm-10 col-xs-12 form-group">
					<label for="name">Select Property Category:</label>
					<select required class="form-control col-md-7 col-xs-12" name="category" >
						<option value="">Choose option</option>
						@if(count($propertyCategories))
						@foreach($propertyCategories as $category)
							<option value="{{$category->id}}"> {{$category->category_name}} </option>
						@endforeach
						@endif   
					</select>
				</div>
                <div class="col-md-8 col-sm-10 col-xs-12 form-group">
            		<label for="category_image">Category Image</label>
                    <input type="file" class="form-control" name='category_image' id="profile_image" placeholder="Category Image">
                    <!-- <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span> -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  	 <img src='#' id='preview' alt='preview' width="14%" class="has-feedback-left"/>        
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