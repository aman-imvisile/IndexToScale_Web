<?php $__env->startSection('title', 'Property details'); ?>
<?php $__env->startSection('menu_title', 'Categories'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.property.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
						
						 <a href="<?php echo e(url('admin/property/create')); ?>" class="btn btn-primary pull-right">Add Property</a>
                         	<div class="clearfix"></div>
                  		<?php if(Session::has('message')): ?>
							<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
						<?php endif; ?>
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
                      		<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleproperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<tr>
                          			<td><?php echo e($i++); ?></td>
                          			<td><img alt='userpic' src="<?php echo e($singleproperty->image); ?>" width='100px'></td>
                          			<td><?php echo e($singleproperty->property_name); ?></td>
                          			<td><?php echo e($singleproperty->latitude); ?></td>
                          			<td><?php echo e($singleproperty->longitude); ?></td>
                          			<td><?php echo e($singleproperty->address); ?></td>
                           			<td><a href="<?php echo e(url('admin/property/edit/'.$singleproperty->id)); ?>" class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="<?php echo e(url('admin/property/delete/'.$singleproperty->id)); ?>" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
                        		</tr>
                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>