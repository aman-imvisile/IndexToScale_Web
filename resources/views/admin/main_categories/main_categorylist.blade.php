@extends('layouts.admin')
@section('title', 'Main Categories Detail')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>All Main Categories Details</h2>
						<a href="{{url('admin/maincategory/create')}}" class="btn btn-primary pull-right">Add New Main Category</a>
                    	<div class="clearfix"></div>
					</div>
                  	<div class="x_content">
                  	@if(Session::has('message'))
						<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
					@endif
                    	<!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                    	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
                         			<th>#S.No.</th>
                          			<th>Image</th>
                          			<th>Name</th>
                           			<th>Total Subscriptions</th>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
							<tbody><?php $i = 1; ?>
                      		@foreach($main_categories as $main_category_data)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td><img alt='Main Category Image' src="{{$main_category_data->main_category_image}}" width='75px'></td>
                          			<td>{{ $main_category_data->main_category_name}}</td>
                          			<td>{{ $main_category_data->total_subscriptions}}</td>
                           			<td><a href='' class='btn btn-primary'><i class='fa fa-edit'></i></a>
                        		</tr>
                        	@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop