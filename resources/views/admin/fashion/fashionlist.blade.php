@extends('layouts.admin')
@section('title', 'Fashion Details')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Fashion Details</h2>
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
									<th>#S.No.</th>
                          			<th>Image</th>
                          			<th>Fashion Title</th>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
							<tbody><?php $i = 1; ?>
                      		@foreach($fashion as $singlefashion)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td><img alt='userpic' src="{{ $url = Storage::url('app/'.$singlefashion->image)}}" width='100px'></td>
                          			<td>{{ $singlefashion->title}}</td>
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