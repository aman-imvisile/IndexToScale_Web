	<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix"  style="position:relative;">
             <a href="<?php echo e(url('admin/profile/edit/'.Auth::user()->id)); ?>" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <div class="profile_pic">
                <div class="polygon-each-img-wrap  pr-0 "> 
                    <svg class="clip-svg">
            			<defs>
              				<clipPath id="polygon-clip-hexagon" clipPathUnits="objectBoundingBox">
                				<polygon points="0.5 0, 1 0.25, 1 0.75, 0.5 1, 0 0.75, 0 0.25" />
              				</clipPath>
            			</defs>
            		</svg>
             		<img src="<?php echo e(Auth::user()->profile_image); ?>" class="polygon-clip-hexagon profile_img">
             	</div>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo e(Auth::user()->username); ?>  <span class=" fa fa-angle-down"></span></h2>
              </div>
              
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu menu-drp-left" style="">
                    <li><a href=""> Profile</a></li>
                    <li><a href="<?php echo e(url('admin/logout')); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
            </div>
            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="<?php echo e(url('admin/inbox')); ?>"><i class="fa fa-inbox"></i> Inbox <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-users"></i>Staff <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    	<li class="add-btn"><a href="<?php echo e(url('admin/user/create')); ?>" class="btn btn-primary">Add User</a></li>
                    	<?php $__currentLoopData = $adminusers_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(url('admin/user/list/'.$username->id)); ?>"><?php echo e($username->username); ?></a></li>
  						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>
                
                  <li><a href="javascript:void(0)"><i class="fa fa-sitemap"></i>Categories <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    	<li class="add-btn"><a href="<?php echo e(url('admin/maincategory/create')); ?>" class="btn btn-primary">add category</a></li>
                    	<?php $__currentLoopData = $main_category_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	
						<li>
							<?php if(count($categoryname->subcategories) > 0): ?>
							<a href="javascript:void(0)"><?php echo e($categoryname->main_category_name); ?> <span class="fa fa-chevron-right"></span></a>
							<?php else: ?>
							<a href="<?php echo e(url('admin/property/list/'.$categoryname->id)); ?>"><?php echo e($categoryname->main_category_name); ?></a>
							<?php endif; ?>
							<?php if(count($categoryname->subcategories) > 0): ?>
							<ul class="nav sub_menu">
                    			<li class="add-btn"><a href="#" class="btn btn-primary">add subcategory</a></li>
								<?php $__currentLoopData = $categoryname->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoryname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            	<li class="sub_menu"><a href="<?php echo e(url('admin/property/list/'.$categoryname->id.'/'.$subcategoryname->id)); ?>"><?php echo e($subcategoryname->category_name); ?></a></li>
                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          	</ul>
                          	<?php endif; ?>
						</li>
					
  						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  </li>

                  <li><a href="javascript:void(0)"><i class="fa fa-money"></i> Finances <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    	<li class="add-btn"><a href="<?php echo e(url('admin/finance/create')); ?>" class="btn btn-primary">Add Finance</a></li>
                    	<li><a href="<?php echo e(url('admin/finance/list/1')); ?>">Subscription packages</a></li>
						<li><a href="<?php echo e(url('admin/finance/list/2')); ?>">Pay Per Click Rate</a></li>
  						<li><a href="<?php echo e(url('admin/finance/list/3')); ?>">Indexing Money for Users</a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-database"></i> Database <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-volume-down"></i> Advertising <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Analytics <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Activity <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Index <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-sliders"></i> Filters <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Personalities <span class="fa fa-chevron-right"></span></a></li>
                </ul>
              </div>
            </div><!-- /sidebar menu -->
             <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
			<div class="nav_menu">
            	<nav>
					<div class="col-sm-2">
        				<h1 style="font-size:18px;">
        					<span class="left-arrowa" style=";"><i class="fa fa-angle-left" aria-hidden="true" ></i></span>
         					<span class="left-arrowa" style=""><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
        					<?php echo $__env->yieldContent('menu_title'); ?>
            			</h1>
					</div>
        			<div class="col-sm-8">
        				<form class="" style="width:100%;">
                			<div class="input-group" style="width:100%;     margin-top: 10px;">
                    			<input type="text" class="form-control head-search" placeholder="Search">
                    			<!--<span class="input-group-btn">
                        			<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    			</span>-->
                                <span class="fa fa-microphone search_micro"></span>
                			</div>
            			</form>
        			</div>
        			<div class="col-sm-2 " style="border: 0;">
            			<a href="#" class="site_title"><img src="<?php echo e(URL::asset('public/admin/build/images/logo.png')); ?>" class="img-responsive" alt="logo"></a>
        			</div>
    			</nav>
                <div class="clearfix"></div>
        <!-- /top navigation -->