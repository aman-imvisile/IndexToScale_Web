@extends('layouts.admin')
@section('title', 'All Property Categories')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>All Property Categories</h2>
                  		@if(Session::has('message'))
							<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
                    	<div class="clearfix"></div>
					</div>
                  	<div class="x_content">
                    	<!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                    	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>#ID</th>
                          			<th>Category Image</th>
                          			<th>Category Name</th>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
                      		<tbody>
                      		<?php $i = 1; ?>
                      			@foreach($propertyCategoryList as $categoryDetails)
                        		<tr>
                          			<td>{{ $i++}}</td>
                          			<td><img alt='userpic' src="{{ $url = Storage::url('app/'.$categoryDetails->category_image)}}" width='100px'></td>
                          			<td>{{ $categoryDetails->category_name}}</td>
                           			<td><a href='' class='btn btn-primary'><i class='fa fa-edit'></i></a><a class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
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