@extends('layouts.admin')
@section('title', 'All Finance Types')
@section('menu_title', 'Finance')
@section('content')
	@include('admin.finance.header')
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>@if($finance_type == 1)	All Subscription Packages @endif
                  			@if($finance_type == 2)	Pay Per Click Rate @endif
                  			@if($finance_type == 3)	Indexing Money for Users @endif </h2>
						<a href="{{url('admin/finance/create')}}" class="btn btn-primary pull-right">Add New Finance</a>
                  		@if(Session::has('message'))
							<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
                    	<div class="clearfix"></div>
					</div>
                  	@if($finance_type == 1)
                  		@include('admin.components.finance_splist')
                  	@endif
                  	@if($finance_type == 2)
                  		@include('admin.components.finance_ppclist')
                  	@endif
                  	@if($finance_type == 3)
                  		@include('admin.components.finance_imlist')
                  	@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop