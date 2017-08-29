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
			<form id='registrationForm' action="{{url('admin/finance/create')}} "  class="form-horizontal" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="main_title">Main Title</label>
					<input type="text" class="form-control" name='main_title' id="inputSuccess2" placeholder="Main Title" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="sub_title">Sub Title</label>
					<input type="text" class="form-control" name='sub_title' id="inputSuccess2" placeholder="Sub Title" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="monthly_price">Monthly Price</label>
					<input type="text" class="form-control" name='monthly_price' id="inputSuccess2" placeholder="Monthly Price" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="yearly_price">Yearly Price</label>
					<input type="text" class="form-control" name='yearly_price' id="inputSuccess2" placeholder="Yearly Price" >
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 form-group">
            		<label for="finance_type">Finance Type</label>
                    <select required="required" class="form-control col-md-7 col-xs-12" name="finance_type" >
                    <option value="">Select Finance Type</option>
                    	<option value="1">Subscription packages</option>
                    	<option value="2">Pay Per Click Rate</option>
                    	<option value="3">Indexing Money for Users</option>
                    </select>
                </div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="indexes">Indexes</label>
					<input type="text" class="form-control" name='indexes' id="inputSuccess2" placeholder="Indexes" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="updates">Updates</label>
                    <select class="form-control col-md-7 col-xs-12" name="updates" >
                    <option value="">Select Updates Type</option>
                    	<option value="Yearly">Yearly</option>
                    	<option value="Monthly">Monthly</option>
                    	<option value="Weekly">Weekly</option>
                    	<option value="Daily">Daily</option>
                    	<option value="Instant">Instant</option>
                    </select>
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="trackings">Trackings</label>
					<input type="text" class="form-control" name='trackings' id="inputSuccess2" placeholder="Trackings" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="summary_chart">Summary Chart</label>
					<input type="text" class="form-control" name='summary_chart' id="inputSuccess2" placeholder="Summary Chart" >
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="personalities">Personalities</label>
                    <select class="form-control col-md-7 col-xs-12" name="personalities" >
                    <option value="">Select Personalities Type</option>
                    	<option value="Pre-set">Pre-set</option>
                    	<option value="Editable">Editable</option>
                    </select>
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="forecast_strategy">Forecast Strategy</label>
                    <select class="form-control col-md-7 col-xs-12" name="forecast_strategy" >
                    <option value="">Select Forecast Strategy Type</option>
                    	<option value="Forecast & Strategy">Yes</option>
                    	<option value="NULL">No</option>
                    </select>
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
            		<label for="early_bird">Early Bird</label>
					<input type="text" class="form-control" name='early_bird' id="inputSuccess2" placeholder="Early Bird" >
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