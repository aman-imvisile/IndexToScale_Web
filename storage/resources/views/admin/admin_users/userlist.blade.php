@extends('layouts.admin')
@section('title', 'All Admin Users')
@section('menu_title', 'Staff')
@section('content')
	@include('admin.admin_users.header')
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>All Admin Users</h2>
						<a href="{{url('admin/user/create')}}" class="btn btn-primary pull-right">Add New Admin</a>
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
                          			<th>Profile Image</th>
                          			<th>Fullname</th>
                          			<th>Username</th>
                          			<th>Email</th>
                          			<th style="width: 220px;">Address</th>
                          			@if($users[0]->user_type!=3)<th>Admin Privileges</th>@endif
                           			<th>Action</th>
                        		</tr>
                      		</thead>
                      		<tbody><?php $i = 1; ?>
                      			@foreach($users as $userdetail)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td><img alt='userpic' src="{{$userdetail->profile_image}}" width='100px'></td>
                          			<td>{{ ucfirst(trans($userdetail->fullname))}}</td>
                          			<td>{{ ucfirst(trans($userdetail->username))}}</td>
                          			<td>{{ $userdetail->email}}</td>
                          			<td><div class="address-scroll">{{ $userdetail->address}}</div></td>
                          			@if($users[0]->user_type!=3)<td><ul>@foreach(explode(',', $userdetail->privileges) as $adminPrivileges)
										@if ($adminPrivileges==1) 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Property Privilages</li>
										@endif
										@if ($adminPrivileges==2) 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Fashion Privilages</li>
										@endif
										@if ($adminPrivileges==3) 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Movies Privilages</li>
										@endif
										@if ($adminPrivileges==0) 
										<li style="font-size: 12px;"> No Privilages</li>
										@endif
  										@endforeach
                          			 </ul>
									</td>@endif
                           			<td><a href="{{url('admin/user/edit/'.$userdetail->id)}} " class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="{{url('admin/user/delete/'.$userdetail->id)}} " class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
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