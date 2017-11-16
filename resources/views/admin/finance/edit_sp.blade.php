@extends('layouts.admin')
@section('title', 'Add New Finance')
@section('menu_title', 'Finance')
@section('content')
	@include('admin.finance.header')
	</div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
           <h2>Add New Finance</h2>
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
			<form id='registrationForm' action="{{url('admin/finance/update')}} "  class="form-horizontal" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$finance['id']}}">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="main_title">Main Title</label>
					<input type="text" class="form-control" name='main_title' placeholder="Main Title" value="{{$finance['main_title']}}">
					@if($errors->has('main_title'))
						<div class="alert">{{ $errors->first('main_title') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="sub_title">Sub Title</label>
					<input type="text" class="form-control" name='sub_title' placeholder="Sub Title" value="{{$finance['sub_title']}}">
					@if($errors->has('sub_title'))
						<div class="alert">{{ $errors->first('sub_title') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="monthly_price">Monthly Price</label>
					<input type="text" class="form-control" name='monthly_price' placeholder="Monthly Price" value="{{$finance['monthly_price']}}">
					@if($errors->has('monthly_price'))
						<div class="alert">{{ $errors->first('monthly_price') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="yearly_price">Yearly Price</label>
					<input type="text" class="form-control" name='yearly_price' placeholder="Yearly Price" value="{{$finance['yearly_price']}}">
					@if($errors->has('yearly_price'))
						<div class="alert">{{ $errors->first('yearly_price') }}</div>
					@endif
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 form-group">
            		<label for="finance_type">Finance Type</label>
                    <select required="required" class="form-control col-md-7 col-xs-12" name="finance_type" readonly>
                    	<option value="">Select Finance Type</option>
                    	<option @if($finance['finance_type']==1) selected="selected" @endif value="1">Subscription packages</option>
                    	<option @if($finance['finance_type']==2) selected="selected" @endif value="2">Pay Per Click Rate</option>
                    	<option @if($finance['finance_type']==3) selected="selected" @endif value="3">Indexing Money for Users</option>
                    </select>
					@if($errors->has('finance_type'))
						<div class="alert">{{ $errors->first('finance_type') }}</div>
					@endif
                </div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="indexes">Indexes</label>
					<input type="text" class="form-control" name='indexes' placeholder="Indexes" value="{{$finance['indexes']}}">
					@if($errors->has('indexes'))
						<div class="alert">{{ $errors->first('indexes') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="updates">Updates</label>
                    <select class="form-control col-md-7 col-xs-12" name="updates" >
                    	<option value="">Select Updates Type</option>
                    	<option @if($finance['updates']=="Yearly" ) selected="selected" @endif value="Yearly">Yearly</option>
                    	<option @if($finance['updates']=="Monthly" ) selected="selected" @endif value="Monthly">Monthly</option>
                    	<option @if($finance['updates']=="Weekly" ) selected="selected" @endif value="Weekly">Weekly</option>
                    	<option @if($finance['updates']=="Daily" ) selected="selected" @endif value="Daily">Daily</option>
                    	<option @if($finance['updates']=="Instant" ) selected="selected" @endif value="Instant">Instant</option>
                    </select>
					@if($errors->has('updates'))
						<div class="alert">{{ $errors->first('updates') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="trackings">Trackings</label>
					<input type="text" class="form-control" name='trackings' placeholder="Trackings" value="{{$finance['trackings']}}">
					@if($errors->has('trackings'))
						<div class="alert">{{ $errors->first('trackings') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="summary_chart">Summary Chart</label>
					<input type="text" class="form-control" name='summary_chart' placeholder="Summary Chart" value="{{$finance['summary_chart']}}">
					@if($errors->has('summary_chart'))
						<div class="alert">{{ $errors->first('summary_chart') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="personalities">Personalities</label>
                    <select class="form-control col-md-7 col-xs-12" name="personalities" >
                    	<option value="">Select Personalities Type</option>
                    	<option value="Pre-set" @if($finance['personalities']=="Pre-set") selected="selected" @endif >Pre-set</option>
                    	<option value="Editable" @if($finance['personalities']=="Editable") selected="selected" @endif >Editable</option>
                    </select>
					@if($errors->has('personalities'))
						<div class="alert">{{ $errors->first('personalities') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="forecast_strategy">Forecast Strategy</label>
                    <select class="form-control col-md-7 col-xs-12" name="forecast_strategy" >
                    	<option value="">Select Forecast Strategy Type</option>
                    	<option value="Forecast & Strategy" @if($finance['forecast_strategy']=="Forecast & Strategy") selected="selected" @endif>Yes</option>
                    	<option value="NULL" @if($finance['forecast_strategy']=="NULL") selected="selected" @endif >No</option>
                    </select>
					@if($errors->has('forecast_strategy'))
						<div class="alert">{{ $errors->first('forecast_strategy') }}</div>
					@endif
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="early_bird">Early Bird</label>
					<input type="text" class="form-control" name='early_bird' placeholder="Early Bird" value="{{$finance['early_bird']}}">
					@if($errors->has('early_bird'))
						<div class="alert">{{ $errors->first('early_bird') }}</div>
					@endif
				</div>
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