<?php $__env->startSection('title', 'Add New Main Category'); ?>
<?php $__env->startSection('menu_title', 'Categories'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.property.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
          <h2>Add New Main Category</h2>
           <div class="clearfix"></div>
        </div>
		  <div class="x_content">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li style="padding: 5px;margin-bottom: 2px;" class='alert alert-danger'><?php echo e($error); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<br />
			<?php if(Session::has('message')): ?>
				<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
			<?php endif; ?>
			<br />
			<form id='registrationForm' action="<?php echo e(url('admin/maincategory/create')); ?> "  class="form-horizontal" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            	<div class="col-md-7 col-sm-6 col-xs-12 form-group">
            		<label for="main_category_name">Main Category Name</label>
					<input type="text" class="form-control" name='main_category_name' id="inputSuccess2" placeholder="Main Category Name" >
				</div> 
                <div class="col-md-7 col-sm-6 col-xs-12 form-group">
            		<label for="main_category_image">Image</label>
                    <input type="file" class="form-control" name='main_category_image' id="main_category_image">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  	 <img src='#' id='preview' alt='preview' width="14%"/>        
                </div>
                <div class="form-group">
                	<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						<button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
               </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>