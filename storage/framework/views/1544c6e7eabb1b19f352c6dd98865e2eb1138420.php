<?php $__env->startSection('title', 'Property Categories'); ?>
<?php $__env->startSection('content'); ?>

<section class="section1">
<div id="btn-property-detail" class="togle-butn-right">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>
<input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
    	<div class="residential_grid">
        	<ul class="residential_grid_ul">
            	  <?php if(count($properties)): ?>
            	<input type="hidden" id="main_cat_id" value="<?php echo e($categories['main_cat_id']); ?>">
            	<input type="hidden" id="sub_cat_id" value="<?php echo e($categories['sub_cat_id']); ?>">
               	  <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            	<li>
                    <div class="residential_img property-detail-view" property-id="<?php echo e($property->id); ?>">
                    <img  src="<?php echo e($property->image); ?>" class="img-responsive">
                    
                     <div class="property_name">
                     	<p><?php echo e($property->property_name); ?></p>
                     </div>
                     <div class="property_number">
                     	<div class="hb-md-margin"><span class="hb1 hb-md1  color-bg1 color_white">90</span></div>
                     </div>
                      </div>
                     <div class="property_list">
                     <ul>
                     <?php if(count($property->PropertyLinks)): ?>
            	 	 <?php $__currentLoopData = $property->PropertyLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            		 <?php if($key==3): ?>
                 	 
                 	 <?php break; ?>;
                 	 <?php endif; ?>
                        	<li>
                        	      	<div class="col-sm-3 col-xs-3">
                                    	<img  src="<?php echo e($links->icon_image); ?>" class="img-responsive">
                                    </div>
                                    <div class="col-sm-9 col-xs-9 text-right">
                                    	<h4><?php echo e($links->main_title); ?></h4>
                                        <h5><?php echo e($links->small_title); ?></h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                 	
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                      <?php endif; ?>        
                      </ul>                     
                      <?php if(count($property->PropertyLinks)>3): ?>
                        <p property-id="<?php echo e($property->id); ?>"  class="blue_color property-detail-view"><i>+<?php echo e(count($property->PropertyLinks)-3); ?> more</i></p>
                        <div class="clearfix"></div>
                        <?php endif; ?>
                      </div>
                 </li> 
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
				<?php else: ?>
				<li>No record  found!</li>
				<?php endif; ?>
               	
                 
                 
                 
                
                
                </ul>
            
        
        </div>
            </div>

    </div>
  </div>
  
 <section id="view-single-property" style="display:none;" class="filter_result">
 
</section>
<section class="filter_right" style="display:none;">

      <ul class="nav nav-tabs responsive">
        <li class="active"><a href="#home-test-new">Filters</a></li>
        <li><a href="#profile-test-new">Indexes</a></li>
      </ul>
      <div class="tab-content responsive">
            
       <div class="tab-pane active" id="home-test-new">
          <input class="filter-property" type="checkbox" name="short_let" value="short let "> short let<br>
          <input class="filter-property"  type="checkbox" name="to_let" value="to let "> To let<br>
		  <input class="filter-property" type="checkbox" name="for_sale" value="for sale"> For sale<br>
	   </div>
		
		<div class="tab-pane" id="profile-test-new">
		
		</div>
		
      </div>

  </section> 

</section>
<section class="bottom-left">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <div class="hex_ques" style="top:;">
           <div class="hb-md-margin"><span class="hb1 hb-md1 hb-custom1 ">+</span></div>
       </div>
       
       
       <div class="ques_menu" style="display: none;">
       <ul>
          <li><span class=""><img src="images/inex_s.png"></span>   Get Our browser button to index faster</li>
           <li><span class="icon-file_upload"></span>   Upload</li>
           <li>   <span class="icon-link3"> </span>Set Visit Link</li>
           <li>  <span class="icon-globe"></span>Index from Websites</li>
         
       </ul>
       </div>
      </div>
    </div>
    
    
    <div class="row">
      <div class="col-sm-12">
       <div class="hex_help" style="top:;">
           <div class="hb-md-margin"><span class="hb1 hb-md1 hb-custom1 ">?</span></div>
       </div>
       
       <div class="help_menu" style="display: none;">
       <ul>
           <li>About</li>
           <li>Blog</li>
           <li>Business</li>
           <li>Careers</li>
           <li>Developers</li>
           <li>Help</li>
           <li>Terms & Privacy</li>
           <div class="divider"></div>
           <div class="logout">Logout</div>
       </ul>
       </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('frontend.components.propertyFilter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.propertyFront', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>