<div class="x_content">
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>#ID</th>
				<th>Main Title</th>
				<th>Sub Title</th>
				<th>Monthly Price</th>
				<th>Yearly Price</th>
				<th>Indexes</th>
				<th>Updates</th>
				<th>Trackings</th>
				<th>Summary Chart</th>
				<th>Personalities</th>
				<th>Forecast Strategy</th>
				<th>Early Bird</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody><?php $i = 1; ?>
			@foreach($finance as $financedetail)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $financedetail->main_title}}</td>
				<td>{{ $financedetail->sub_title}}</td>
				<td>{{ $financedetail->monthly_price}}</td>
				<td>{{ $financedetail->yearly_price}}</td>
				<td>{{ $financedetail->indexes}}</td>
				<td>{{ $financedetail->updates}}</td>
				<td>{{ $financedetail->trackings}}</td>
				<td>{{ $financedetail->summary_chart}}</td>
				<td>{{ $financedetail->personalities}}</td>
				<td>{{ $financedetail->forecast_strategy}}</td>
				<td>{{ $financedetail->early_bird}}</td>
				<td><a href="{{url('admin/finance/edit/'.$financedetail->id)}} " class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="{{url('admin/finance/delete/'.$financedetail->id)}} " class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>