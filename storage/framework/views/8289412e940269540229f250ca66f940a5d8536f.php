<!DOCTYPE html>
<html lang="en">
  <head>
   	 <?php echo $__env->make('includes.adminhead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>
	<body class="nav-md">
		<?php if(Auth::check()): ?>
		<?php if(Auth::user()->user_type=='1'): ?>
		  <?php echo $__env->make('includes.adminheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>		 
		<?php elseif(Auth::user()->user_type=='2'): ?>
		  <?php echo $__env->make('includes.simpleAdminHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
		<?php endif; ?> 
		<?php endif; ?>  
		
   	 	  <?php echo $__env->yieldContent('content'); ?>
		  <?php echo $__env->make('includes.adminfooter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
</html>