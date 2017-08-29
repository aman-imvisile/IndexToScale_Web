<?php $__env->startSection('title', 'All Finance Types'); ?>
<?php $__env->startSection('menu_title', 'Finance'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.finance.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><?php if($finance_type == 1): ?>	All Subscription Packages <?php endif; ?>
                  			<?php if($finance_type == 2): ?>	Pay Per Click Rate <?php endif; ?>
                  			<?php if($finance_type == 3): ?>	Indexing Money for Users <?php endif; ?> </h2>
						<a href="<?php echo e(url('admin/finance/create')); ?>" class="btn btn-primary pull-right">Add New Finance</a>
                  		<?php if(Session::has('message')): ?>
							<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
						<?php endif; ?>
                    	<div class="clearfix"></div>
					</div>
                  	<?php if($finance_type == 1): ?>
                  		<?php echo $__env->make('admin.components.finance_splist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  	<?php endif; ?>
                  	<?php if($finance_type == 2): ?>
                  		<?php echo $__env->make('admin.components.finance_ppclist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  	<?php endif; ?>
                  	<?php if($finance_type == 3): ?>
                  		<?php echo $__env->make('admin.components.finance_imlist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  	<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>