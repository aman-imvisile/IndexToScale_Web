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
			<li class="active"><a href="<?php echo e(url('admin/category/summary')); ?>">Summary</a></li>
			<?php $__currentLoopData = $maincategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li class="dropdown">
				<?php if(count($categoryname->subcategories) > 0): ?>
					<a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle"><?php echo e($categoryname->main_category_name); ?> <i class="fa fa-angle-down"></i></a>
				<?php else: ?>
					<a href="javascript:void(0)"><?php echo e($categoryname->main_category_name); ?></a>
				<?php endif; ?>
				<?php if(count($categoryname->subcategories) > 0): ?>
				<ul class="dropdown-menu">
					<?php $__currentLoopData = $categoryname->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><a href="<?php echo e(url('admin/property/list/'.$categoryname->id.'/'.$subcategoryname->id)); ?>"><?php echo e($subcategoryname->category_name); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		    	</ul>
		    	<?php endif; ?>
           	</li>
           	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>
</nav>