<nav class="navbar navbar-default menu-page">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">Summary</a></li>
			<?php $__currentLoopData = $usertype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleusertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class="dropdown ut<?php echo e($singleusertype->id); ?>"><a href="<?php echo e(url('admin/users/list/'.$singleusertype->id)); ?>"><?php echo e($singleusertype->usertype_name); ?></a></li>
           	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</nav>