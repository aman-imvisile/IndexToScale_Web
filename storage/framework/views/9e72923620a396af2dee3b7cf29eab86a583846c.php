<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
          <h2>Welcome <?php echo e($users['username']); ?></h2><a href="<?php echo e(url('admin/user/list')); ?>" class="btn btn-primary pull-right">Back</a>
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
			<form id='registrationForm' action="<?php echo e(url('admin/profile/update')); ?> "  class="form-horizontal form-label-left input_mask" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          		<input type="hidden" value="<?php echo e($users['id']); ?>" name="id">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control has-feedback-left" name='username' id="inputSuccess2" placeholder="Username" value="<?php echo e($users['username']); ?>">
					<span class="fa fa-user form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
					<?php if($errors->has('username')): ?>
						<div class="alert"><?php echo e($errors->first('username')); ?></div>
					<?php endif; ?>
				</div>
                <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left" name='email' id="inputSuccess4" placeholder="Email"  value="<?php echo e($users['email']); ?>">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
					<?php if($errors->has('email')): ?>
						<div class="alert"><?php echo e($errors->first('email')); ?></div>
					<?php endif; ?>
                </div>			
                <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control  has-feedback-left "  data-validate-length="6,8"  name="password" id="password" placeholder="Password " >
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
                </div>
				<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="password" class="form-control has-feedback-left" name='confirm_password' data-validate-linked="password" id="password2" placeholder="Confirm Password" >
                    <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="file" class="form-control  has-feedback-left" name='profile_image' id="profile_image" placeholder="profile_image">
                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
					<?php if($errors->has('profile_image')): ?>
						<div class="alert"><?php echo e($errors->first('profile_image')); ?></div>
					<?php endif; ?>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  	 <img src="<?php echo e($users['profile_image']); ?>" id="preview" alt="preview" width="14%" class="has-feedback-left"/>        
                </div>
                <div class="ln_solid"></div>
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