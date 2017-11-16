@extends('layouts.productsadmin')
@section('title', 'Products')
@section('menu_title', 'products')
@section('content')

	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
                  	<div class="x_content">
                    <div class="import-export">               

		                
        			<form style="border: 4px solid #a1a1a1;margin-top: 10px; margin-bottom: 10px;padding: 10px; " class="form-horizontal" action="{{url('products/import')}}" method="post" enctype="multipart/form-data" style="float: left;margin-bottom: 8px;">
                	{{csrf_field()}}
                	<input  style="" id="import-file" type="file" name="imported-file"/>   
             		<button type="submit"  class="btn btn-success">Import</button>
            		</form>	
            		
					</div>
					
                    	<!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                    	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
                         			<th>#S.No.</th>
                          			<th>Sku</th>
                          			<th>Name</th>
                          			<th>Description</th>
                          			<th>Price</th>
                          			<th>Image</th>
                          			<th>Category</th>
                        		</tr>
                      		</thead>
							<tbody><?php $i = 1; ?>
                      		@foreach($products as $produuct)
                        		<tr>
                          			<td>{{ $i++ }}</td>
                          			<td>{{ $produuct->sku}}</td>
                          			<td>{{ $produuct->name}}</td>
                          			<td>{{ $produuct->desc}}</td>
                          			<td>{{ $produuct->currency}} {{ $produuct->price }}</td>
                          			<td><img height="50" width="50" src="{{$produuct->image}}"></td>
                           			<td>{{ $produuct->category }}</td>
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
