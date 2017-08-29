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
			<?php $__currentLoopData = $finance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $financedetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($i++); ?></td>
				<td><?php echo e($financedetail->main_title); ?></td>
				<td><?php echo e($financedetail->sub_title); ?></td>
				<td><?php echo e($financedetail->monthly_price); ?></td>
				<td><?php echo e($financedetail->yearly_price); ?></td>
				<td><?php echo e($financedetail->indexes); ?></td>
				<td><?php echo e($financedetail->updates); ?></td>
				<td><?php echo e($financedetail->trackings); ?></td>
				<td><?php echo e($financedetail->summary_chart); ?></td>
				<td><?php echo e($financedetail->personalities); ?></td>
				<td><?php echo e($financedetail->forecast_strategy); ?></td>
				<td><?php echo e($financedetail->early_bird); ?></td>
				<td><a href="<?php echo e(url('admin/finance/edit/'.$financedetail->id)); ?> " class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="<?php echo e(url('admin/finance/delete/'.$financedetail->id)); ?> " class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>