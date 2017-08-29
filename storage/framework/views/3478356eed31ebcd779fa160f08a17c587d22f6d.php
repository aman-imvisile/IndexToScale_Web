<!DOCTYPE html>
<html lang="en">
  <head>
	<?php echo $__env->make('includes.adminhead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
  <body class="login">
	 <?php echo $__env->yieldContent('content'); ?>
  </body>
</html>