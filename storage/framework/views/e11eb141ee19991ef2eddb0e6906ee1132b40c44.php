<?php $__env->startSection('title', 'All Admin Users'); ?>
<?php $__env->startSection('menu_title', 'Staff'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.admin_users.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>All Admin Users</h2>
						<a href="<?php echo e(url('admin/user/create')); ?>" class="btn btn-primary pull-right">Add New Admin</a>
                  		<?php if(Session::has('message')): ?>
							<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
						<?php endif; ?>
                    	<div class="clearfix"></div>
					</div>
                  	<div class="x_content">
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      		<thead>
                        		<tr>
									<th>#ID</th>
                          			<th>Profile Image</th>
                          			<th>Fullname</th>
                          			<th>Username</th>
                          			<th>Email</th>
                          			<th style="width: 220px;">Address</th>
                          			<?php if($users[0]->user_type!=3): ?><th>Admin Privileges</th><?php endif; ?>
                           			<th>Action</th>
                        		</tr>
                      		</thead>
                      		<tbody><?php $i = 1; ?>
                      			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<tr>
                          			<td><?php echo e($i++); ?></td>
                          			<td><img alt='userpic' src="<?php echo e($userdetail->profile_image); ?>" width='100px'></td>
                          			<td><?php echo e(ucfirst(trans($userdetail->fullname))); ?></td>
                          			<td><?php echo e(ucfirst(trans($userdetail->username))); ?></td>
                          			<td><?php echo e($userdetail->email); ?></td>
                          			<td><div class="address-scroll"><?php echo e($userdetail->address); ?></div></td>
                          			<?php if($users[0]->user_type!=3): ?><td><ul><?php $__currentLoopData = explode(',', $userdetail->privileges); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adminPrivileges): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($adminPrivileges==1): ?> 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Property Privilages</li>
										<?php endif; ?>
										<?php if($adminPrivileges==2): ?> 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Fashion Privilages</li>
										<?php endif; ?>
										<?php if($adminPrivileges==3): ?> 
										<li style="font-size: 12px;"><input type="checkbox" checked disabled name="privilages"> Movies Privilages</li>
										<?php endif; ?>
										<?php if($adminPrivileges==0): ?> 
										<li style="font-size: 12px;"> No Privilages</li>
										<?php endif; ?>
  										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          			 </ul>
									</td><?php endif; ?>
                           			<td><a href="<?php echo e(url('admin/user/edit/'.$userdetail->id)); ?> " class='btn btn-primary'><i class='fa fa-edit'></i></a><a href="<?php echo e(url('admin/user/delete/'.$userdetail->id)); ?> " class='btn btn-danger'><i class='fa fa-trash'></i></a></td>
                        		</tr>
                        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>