<!doctype html>
<html>
	<head>
   	 <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>

	<body>
		 <div class="loader"></div> 
		<?php echo $__env->make('includes.propertyCategoryHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   	 	<?php echo $__env->yieldContent('content'); ?>
		<?php echo $__env->yieldContent('script'); ?>
		<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</body>
</html>


 