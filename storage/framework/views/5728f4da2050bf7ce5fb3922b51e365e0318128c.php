<?php $__env->startSection('title', 'Add New User'); ?>
<?php $__env->startSection('menu_title', 'Staff'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.admin_users.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
           <h2>Add New User</h2>
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
			<form id='registrationForm' action="<?php echo e(url('admin/user/create')); ?> "  class="form-horizontal form-label-left input_mask" method='post' enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control has-feedback-left" name='fullname' id="inputSuccess2" placeholder="Fullname" >
					<span class="fa fa-user form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
				</div>
            	<div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="text" class="form-control has-feedback-left" name='username' id="inputSuccess2" placeholder="Username" >
					<span class="fa fa-user form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
				</div>
                <div class="item col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left" name='email' id="inputSuccess4" placeholder="Email" >
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><font color="red">*</font></span>
                </div>
				<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <select required="required" class="form-control col-md-7 col-xs-12" name="user_type" >
                    <option value="">Select User Type</option>
                    <?php if(count($userTypes)): ?>
                    <?php $__currentLoopData = $userTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<option value="<?php echo e($type->id); ?>"> <?php echo e($type->usertype_name); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>   
                    </select>
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
					<label>Privileges: </label>
                    <input type="checkbox" name="privileges[]" value="1" class="flat" /> Properties
                    <input type="checkbox" name="privileges[]" value="2" class="flat" /> Fashion
                    <input type="checkbox" name="privileges[]" value="3" class="flat" /> Movies
                </div> 
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label>Permission: </label>
                    <input type="checkbox" name="permission[]" id="hobby2" value="1" checked class="flat" /> Add
                    <input type="checkbox" name="permission[]" id="hobby3" value="2" class="flat" /> Edit
                    <input type="checkbox" name="permission[]" id="hobby4" value="3" class="flat" /> Delete
                </div>   
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="file" class="form-control  has-feedback-left" name='profile_image' id="profile_image" placeholder="profile_image">
                    <span class="fa fa-image form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  	 <img src='#' id='preview' alt='preview' width="14%" class="has-feedback-left"/>        
                </div>
                <div class="form-group">
                	<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    	<button type="button" class="btn btn-primary">Cancel</button>
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