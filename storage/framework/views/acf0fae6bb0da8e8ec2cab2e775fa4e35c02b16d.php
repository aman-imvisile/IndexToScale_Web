<?php $__env->startSection('title', 'All Admin Users'); ?>
<?php $__env->startSection('menu_title', 'Staff'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.admin_users.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Admin Personal Info</h2>
                    <?php if(Session::has('message')): ?>
						<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
					<?php endif; ?>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12 user_profile_info">
						<div class="col-md-4 col-sm-4 col-xs-4">
                        	<div class="polygon-each-img-wrap1  pr-0 "> 
                        		<svg class="clip-svg">
            						<defs>
              							<clipPath id="polygon-clip-hexagon" clipPathUnits="objectBoundingBox">
                							<polygon points="0.5 0, 1 0.25, 1 0.75, 0.5 1, 0 0.75, 0 0.25" />
              							</clipPath>
            						</defs>
            					</svg>
             					<img src="<?php echo e($activity_Details->profile_image); ?>" alt="heptagon" class="polygon-clip-hexagon">
             				</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							Fullname<p><?php echo e($activity_Details->fullname); ?></p>
							Email<p><?php echo e($activity_Details->email); ?></p>
							Privileges<p><?php echo e($activity_Details->privileges); ?></p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4">
							Username<p><?php echo e($activity_Details->username); ?></p>
							Address<p><?php echo e($activity_Details->address); ?></p>
							Permission<p><?php echo e($activity_Details->permission); ?></p>
						</div>
					</div>
					<h2 class="activity-details">Admin Activity Details</h2>
					<div class="user_activity_info" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
                        	<li role="presentation" class="active"><a href="#tab_content1_Today" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Today</a></li>
                        	<li role="presentation" class=""><a href="#tab_content2_Weekly" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Weekly</a></li>
                        	<li role="presentation" class=""><a href="#tab_content3_Monthly" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Monthly</a></li>
                        	<li role="presentation" class=""><a href="#tab_content4_Yearly" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Yearly</a></li>
                      	</ul>
                      	<div id="myTabContent" class="tab-content">
                        	<div role="tabpanel" class="tab-pane fade active in" id="tab_content1_Today" aria-labelledby="home-tab">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        				<li role="presentation" class="active"><a href="#Today_India" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">India</a></li>
                        				<li role="presentation" class=""><a href="#Today_UK" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">UK</a></li>
                        				<li role="presentation" class=""><a href="#Today_USA" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">USA</a></li>
                      				</ul>
                      				<div id="myTabContent" class="tab-content">
                        				<div role="tabpanel" class="tab-pane fade active in" id="Today_India" aria-labelledby="home-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Today_UK" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Today_USA" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                      				</div>
                    			</div>
							</div>
                        	<div role="tabpanel" class="tab-pane fade" id="tab_content2_Weekly" aria-labelledby="profile-tab">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        				<li role="presentation" class="active"><a href="#Weekly_India" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">India</a></li>
                        				<li role="presentation" class=""><a href="#Weekly_UK" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">UK</a></li>
                        				<li role="presentation" class=""><a href="#Weekly_USA" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">USA</a></li>
                      				</ul>
                      				<div id="myTabContent" class="tab-content">
                        				<div role="tabpanel" class="tab-pane fade active in" id="Weekly_India" aria-labelledby="home-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Weekly_UK" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Weekly_USA" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                      				</div>
                    			</div>
                        	</div>
                        	<div role="tabpanel" class="tab-pane fade" id="tab_content3_Monthly" aria-labelledby="profile-tab">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        				<li role="presentation" class="active"><a href="#Monthly_India" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">India</a></li>
                        				<li role="presentation" class=""><a href="#Monthly_UK" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">UK</a></li>
                        				<li role="presentation" class=""><a href="#Monthly_USA" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">USA</a></li>
                      				</ul>
                      				<div id="myTabContent" class="tab-content">
                        				<div role="tabpanel" class="tab-pane fade active in" id="Monthly_India" aria-labelledby="home-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Monthly_UK" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Monthly_USA" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                      				</div>
                    			</div>
                        	</div>
                        	<div role="tabpanel" class="tab-pane fade" id="tab_content4_Yearly" aria-labelledby="profile-tab">
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      				<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        				<li role="presentation" class="active"><a href="#Yearly_India" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">India</a></li>
                        				<li role="presentation" class=""><a href="#Yearly_UK" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">UK</a></li>
                        				<li role="presentation" class=""><a href="#Yearly_USA" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">USA</a></li>
                      				</ul>
                      				<div id="myTabContent" class="tab-content">
                        				<div role="tabpanel" class="tab-pane fade active in" id="Yearly_India" aria-labelledby="home-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Yearly_UK" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                        				<div role="tabpanel" class="tab-pane fade" id="Yearly_USA" aria-labelledby="profile-tab">
                          					<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
											<p>Total post: 10</p>
                        				</div>
                      				</div>
                    			</div>
                        	</div>
                      	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>