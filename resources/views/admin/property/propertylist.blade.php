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
            			

            		<a href="{{ url('admin/property/export/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
     	            <a href="{{ url('admin/property/export/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
		            <a href="{{ url('admin/property/export/csv') }}"><button class="btn btn-success">Download CSV</button></a>
		                
        			<form style="border: 4px solid #a1a1a1;margin-top: 10px; margin-bottom: 10px;padding: 10px; " class="form-horizontal" action="{{url('admin/property/import')}}" method="post" enctype="multipart/form-data" style="float: left;margin-bottom: 8px;">
                	{{csrf_field()}}
                	<input  style="" id="import-file" type="file" name="imported-file"/>   
             		<button type="submit"  class="btn btn-success">Import</button>
            		</form>	
            		<div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <select class="form-control" id="">
                                    <option>Delete</option>
                                    <option>edit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                               <button type="button" class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                        <div class="col-sm-9 text-right">
                            <span><i class="fa fa-2x fa-sliders" aria-hidden="true"></i></span>
                        </div>
                    </div>
                        
					</div>
					       
                    	<!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                    	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
                                    
                         			<th><input type="checkbox"></th>
                          			<th>IMAGE</th>
                                    <th>OI</th>
                          			<th>ADDRESS</th>
                          			<th>ROOMS</th>
                          			<th>BEDS</th>
                          			<th>BATHS</th>
                           			<th>INDEXES</th>
                                    <th>INDEX%</th>
                                    <th>RATINGS</th>
                                    <th>ADS</th>
                        		</tr>
                      		</thead>
							<tbody><?php $i = 1; ?>
                      		@foreach($properties as $singleproperty)
                        		<tr>
                                    <td><input type="checkbox"></td>                          			
                          			<td><img alt='userpic' src="{{ $singleproperty->image }}" width='30px' height='30px'></td>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $singleproperty->address }}</td>
                          			<td>{{ $singleproperty->property_name}}</td>
                          			<td>{{ $singleproperty->latitude}}</td>
                          			<td>{{ $singleproperty->longitude }}</td>  
                                    <td></td>
<!--                           			<td><a href="{{url('admin/property/edit/'.$singleproperty->id)}}" class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="{{url('admin/property/delete/'.$singleproperty->id)}}" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>-->
                                    <td></td>
                                    <td></td>
                                    <td><img alt='userpic'  src="{{ $singleproperty->image }}" width='30px' height='30px' style=" padding:2px; border:1px solid #000;"></td>
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
<script type="text/javascript">
$('#import-property').on('click',function(){
$("#import-file").trigger('click');
});

</script>
@stop
