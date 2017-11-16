<?php $__env->startSection('title', 'Property Categories'); ?>
<?php $__env->startSection('content'); ?>

<section class="section1">
<div id="btn-property-detail" class="togle-butn-right">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>
<input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
<div class="container-fluid">

   
    <div class="col-sm-12">
    
    	<div class="residential_grid">
			<div class="search-wrap">
				<img src="http://media.point2.com/p2a/themeresource/9fa1/eb5a/1dfe/1a27c23ec44255224764/original.jpg"/>
				<div class="search-abs">
					<h1>A House for my mother</h1>
					<div class="inner-wrap">
						<h3>personality</h3>
						<p>default (60-99)<span class="search-hex pull-right"><span class="sm-hex"></span></span></p>
						<div class="filter">
							<h3>personality<span class="pul-right">3</span></h3>
							<p>+8 bedrooms</p>
							<p>+12 bedrooms</p>
							<p>futuristic</p>
						</div>
						<div class="index">
							<h3>indexes<span class="pul-right">1</span></h3>
							<p>interior (95-99)</p>
						</div>
						<div class="ratio text-right">
							<span>2,456,400</span>:28,403,402
						</div>
					</div>
				</div>
			</div>
        
        
        </div>
            </div>

    </div>
  </div>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <div class="hex_ques" style="top:;">
           <div class="hb-md-margin"><span class="hb1 hb-md1 hb-custom1 ">+</span></div>
       </div>
       
       
       <div class="ques_menu" style="display: none;">
       <ul>
          <li><span class=""><img src="images/inex_s.png"></span>Get Our browser button to index faster</li>
           <li><span class="icon-file_upload"></span>   Upload</li>
           <li><span class="icon-link3"> </span>Set Visit Link</li>
           <li><span class="icon-globe"></span>Index from Websites</li>         
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