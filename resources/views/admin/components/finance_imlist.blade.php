<div class="x_content">
	<form id='registrationForm' action="{{url('admin/finance/update')}} "  class="form-horizontal" method='post' enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_token" value="{{$finance[0]->id}}">
		<div class="item col-md-6 col-sm-6 col-xs-12 form-group ">
			<label for="monthly_price">Indexing Money for Users's Price</label>
			<input type="text" class="form-control" name='monthly_price' id="inputSuccess2" placeholder="Monthly Price" value="{{$finance[0]->monthly_price}}">
		</div>
		<div class="form-group">
			<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
				<button class="btn btn-primary" type="reset">Reset</button>
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
	   </div>
	</form>
</div>