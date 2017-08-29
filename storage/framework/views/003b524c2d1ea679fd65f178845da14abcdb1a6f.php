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
           	<li class="dropdown"><a href="<?php echo e(url('admin/finance/list/1')); ?>">Subscription packages</a></li>
			<li class="dropdown"><a href="<?php echo e(url('admin/finance/list/2')); ?>">Pay Per Click Rate</a></li>
  			<li class="dropdown"><a href="<?php echo e(url('admin/finance/list/3')); ?>">Indexing Money for Users</a></li>
		</ul>
	</div>
</nav>