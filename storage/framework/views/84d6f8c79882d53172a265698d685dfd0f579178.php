<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div>
	<div class="login_wrapper">
		<div class="animate form login_form">
			<section class="login_content">
          	<?php if(Session::has('message')): ?>
			<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
			<?php endif; ?>
            <form action="<?php echo e(url('admin/login')); ?> " method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            	<h1>Index:Scale</h1>
              <div>
                <input type="email" class="form-control" name='email' placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name='password' placeholder="Password" required="" />
              </div>
              <div>
                <button type='submit' class="btn btn-default submit" name="login">Log in</button>
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
        </div>
	</div>
</div>
<?php $__env->stopSection(); ?>           
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>