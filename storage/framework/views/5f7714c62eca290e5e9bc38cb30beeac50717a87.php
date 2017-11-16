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
            			

            		<a href="<?php echo e(url('admin/property/export/xls')); ?>"><button class="btn btn-success">Download Excel xls</button></a>
     	            <a href="<?php echo e(url('admin/property/export/xlsx')); ?>"><button class="btn btn-success">Download Excel xlsx</button></a>
		            <a href="<?php echo e(url('admin/property/export/csv')); ?>"><button class="btn btn-success">Download CSV</button></a>
		                
        			<form style="border: 4px solid #a1a1a1;margin-top: 10px; margin-bottom: 10px;padding: 10px; " class="form-horizontal" action="<?php echo e(url('admin/property/import')); ?>" method="post" enctype="multipart/form-data" style="float: left;margin-bottom: 8px;">
                	<?php echo e(csrf_field()); ?>

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
                      		<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleproperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<tr>
                                    <td><input type="checkbox"></td>                          			
                          			<td><img alt='userpic' src="<?php echo e($singleproperty->image); ?>" width='30px' height='30px'></td>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($singleproperty->address); ?></td>
                          			<td><?php echo e($singleproperty->property_name); ?></td>
                          			<td><?php echo e($singleproperty->latitude); ?></td>
                          			<td><?php echo e($singleproperty->longitude); ?></td>  
                                    <td></td>
<!--                           			<td><a href="<?php echo e(url('admin/property/edit/'.$singleproperty->id)); ?>" class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="<?php echo e(url('admin/property/delete/'.$singleproperty->id)); ?>" class='btn btn-danger'><i class='fa fa-trash'></i></a></td>-->
                                    <td></td>
                                    <td></td>
                                    <td><img alt='userpic'  src="<?php echo e($singleproperty->image); ?>" width='30px' height='30px' style=" padding:2px; border:1px solid #000;"></td>
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
<script type="text/javascript">
$('#import-property').on('click',function(){
$("#import-file").trigger('click');
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>