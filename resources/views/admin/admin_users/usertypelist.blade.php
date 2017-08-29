@extends('layouts.admin')
@section('title', 'All Admin Users')
@section('content')
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>All Admin Users</h2>
						<a href="{{url('admin/user/addusertype')}}" class="btn btn-primary pull-right">Add New User Type</a>
                  		@if(Session::has('message'))
							<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
                    	<div class="clearfix"></div>
					</div>
                  	<div class="x_content">
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      		<thead>
                        		<tr>
									<th>#ID</th>
                          			<th>User Type</th>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
                      		<tbody><?php $i = 1; ?>
                      			@foreach($usertype as $userdetail)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td>{{ $userdetail->usertype_name}}</td>
                           			<td><a href="{{url('admin/userType/edit/'.$userdetail->id)}} " class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="{{url('admin/usertype/delete/'.$userdetail->id)}} " class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
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