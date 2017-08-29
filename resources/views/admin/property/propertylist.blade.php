@extends('layouts.admin')
@section('title', 'Property details')
@section('menu_title', 'Categories')
@section('content')
	@include('admin.property.header')
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Home <span class="fa fa-chevron-right"></span> Property <span class="fa fa-chevron-right"></span> Residential</h2>
						
						 <a href="{{url('admin/property/create')}}" class="btn btn-primary pull-right">Add Property</a>
                         	<div class="clearfix"></div>
                  		@if(Session::has('message'))
							<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
                    	<div class="clearfix"></div>
					</div>
                  	<div class="x_content">
                    <div class="import-export">
						 <button type="button" id="export-property"  class="btn btn-success">Export</button>
						 <button type="button" id="import-property" class="btn btn-success">Import</button>
						</div>
                    	<!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                    	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
                         			<th>#S.No.</th>
                          			<th>Image</th>
                          			<th>Name</th>
                          			<th>Latitude</th>
                          			<th>Longitude</th>
                          			<th>Address</th>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
							<tbody><?php $i = 1; ?>
                      		@foreach($properties as $singleproperty)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td><img alt='userpic' src="{{ $singleproperty->image }}" width='100px'></td>
                          			<td>{{ $singleproperty->property_name}}</td>
                          			<td>{{ $singleproperty->latitude}}</td>
                          			<td>{{ $singleproperty->longitude }}</td>
                          			<td>{{ $singleproperty->address }}</td>
                           			<td><a href="{{url('admin/property/edit/'.$singleproperty->id)}}" class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="{{url('admin/property/delete/'.$singleproperty->id)}}" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
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
