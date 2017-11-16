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
      	<input type="hidden" id="main_cat_id" value="<?php echo e($categories['main_cat_id']); ?>">
        <input type="hidden" id="sub_cat_id" value="<?php echo e($categories['sub_cat_id']); ?>">
    	<div class="residential_grid">
        	<ul class="residential_grid_ul">
               <?php if(count($properties)): ?>
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
            	 	 <!-- If properties extra links length >3 then it break the loops -->
            		 	<?php if($key==3): ?>
                 	 	<?php break; ?>;
                 	    <?php endif; ?>
                        	<li>
                             	<div class="col-sm-3 col-xs-3">
                                    <img src="<?php echo e($links->icon_image); ?>" class="img-responsive">
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
                      <!-- If properties extra links length >3 then here it shows the more button-->        
                      <?php if(count($property->PropertyLinks)>3): ?>
                        <p property-id="<?php echo e($property->id); ?>"  class="blue_color property-detail-view"><i>+<?php echo e(count($property->PropertyLinks)-3); ?> more</i></p>
                        <div class="clearfix"></div>
                        <?php endif; ?>
                      </div>
                 </li> 
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
              <?php echo e($properties->links()); ?>            
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
 

</section>

<section class="filter_right" style="display:block;">
	<ul class="nav nav-tabs responsive index_tab">
      <li class="active"><a href="residential_grid.html"><i class="fa fa-align-justify" aria-hidden="true"></i></a></li>
      <li><a href="map_list"><i class="fa fa-map-marker" aria-hidden="true"></i></a></li>
    </ul>
      <ul class="nav nav-tabs responsive index_tab">
        <li class="active"><a href="#home-test-new"><span style="padding-right: 25px;">12</span>Filters</a></li>
        <li><a href="#profile-test-new">Indexes<span  style="padding-left: 25px;">12</span></a></li>
      </ul>
      <div class="tab-content responsive">
            
       <div class="tab-pane active" id="home-test-new">
          <div class="panel-group " id="accordion">
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  VIEW <br><small>list,Recently Added.</small> </h4>
            <div id="collapse1" class="panel-collapse  collapse">
              <div class="panel-body panel-content">
                <div class="row">
                    <div class="col-sm-6 panel-headings"><h6>Mode</h6></div>
                    <div class="col-sm-6 panel-links"><a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <span class="sort">Sort By</span>
                        <select class="custom-select d-block my-3">
                            <option selected>Recently Added</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 personality-bar">
                            <h6>My Personality <span class="indexes">2+,6 indexes <i class="fa fa-sort" aria-hidden="true"></i></span></h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>  
                  </div>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  Location <br><small>London</small> </h4>
            <div id="collapse2" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapseOne" class="padd-filter ">
            	<i class="more-less  fa fa-plus"></i>  Status <br><small>For Sale(500k -1M</small>  </h4>
            <div id="collapse3" class="panel-collapse  collapse in">
              <div class="panel-body">
              <ul class="status_check">
              	
                   <li>
                   <input class="filter-property css-checkbox" id="short_let" type="checkbox" name="short_let" value="short let "> 
                   <label for="short_let" class="css-label">short let</label>
                   </li>
                   <li>
          		   <input class="filter-property css-checkbox" id="to_let" type="checkbox" name="to_let" value="to let "> 
          		   <label for="to_let" class="css-label">To let</label>
          		   </li>
          		   <li>
		  		   <input class="filter-property css-checkbox" id="for_sale" type="checkbox" name="for_sale" value="for sale"> 
		  		   <label for="for_sale" class="css-label">For sale<span class="num-opac">(23,400)</span></label>
		  		   <p> <i class="fa fa-gbp" aria-hidden="true"></i>0 - <i class="fa fa-gbp" aria-hidden="true"></i>234569 <span class="num-opac">(23,400)</span></p>
                         <p> <i class="fa fa-gbp" aria-hidden="true"></i>0 - <i class="fa fa-gbp" aria-hidden="true"></i>234569 <span class="num-opac">(23,400)</span></p>
                          <p> <i class="fa fa-gbp" aria-hidden="true"></i>0 - <i class="fa fa-gbp" aria-hidden="true"></i>234569</p>
                       	    <div class="col-sm-4 ">                        
                        	<input type="text" class="input-text"> <span class="curr-syb"> <i class="fa fa-gbp" aria-hidden="true"></i></span> 
                            </div>
                            <div class="col-sm-2 text-center no-padd">
                            to 
                            </div>
                            <div class="col-sm-4 ">
                            <input type="text" class="input-text"> <span class="curr-syb"> <i class="fa fa-gbp" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-sm-2">
                            <button type="submit" class="sub-right">
                              <i class="fa fa-chevron-circle-right"></i>
                            </button>
                            </div>
		  		   </li>
                 
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  TYPE <br><small>Apartment</small> </h4>
            <div id="collapse4" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  ROOMS<br><small>5+ Bedrooms, Kitchen, Basement, Parking</small>  </h4>
            <div id="collapse5" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  STYLE <br><small>Modern Exterior, Gothic Interior</small> </h4>
            <div id="collapse6" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-plus"></i>  VISIT <br><small>Airbnb.co.uk,</small> </h4>
            <div id="collapse7" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-lock"></i>  STAGE  </h4>
            <div id="collapse8" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-lock"></i>  CONDITION  </h4>
            <div id="collapse9" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-lock"></i>  ROOMS  </h4>
            <div id="collapse10" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-lock"></i>  AMINITIES  </h4>
            <div id="collapse11" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
              <div class="accor-heading">
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="true" aria-controls="collapseOne" class="padd-filter collapsed">
            	<i class="more-less  fa fa-lock"></i>  FACILITES  </h4>
            <div id="collapse12" class="panel-collapse  collapse">
              <div class="panel-body">
              <ul class="status_check">
              		<li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG1" class="css-checkbox" />
                        <label for="checkboxG1" class="css-label">Option 1</label>
                    </li>
                    <li>
                        <input type="checkbox" name="checkboxG1" id="checkboxG2" class="css-checkbox" />
                        <label for="checkboxG2" class="css-label">Option 1</label>
                    </li>
                    </ul>
              </div>
            </div>
          </div>
        </div>

	   </div>
		
		<div class="tab-pane" id="profile-test-new">
		   <div class="row">
               <div id="slider"></div>
                <div class="col-sm-12">
                    <h4>NEIGHBOURHOOD<span>(345,221)</span> <span>35 99</span></h4>
                    

               </div>
            </div>
		</div>
		
      </div>

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
<script>
    function collision($div1, $div2) {
      var x1 = $div1.offset().left;
      var w1 = 40;
      var r1 = x1 + w1;
      var x2 = $div2.offset().left;
      var w2 = 40;
      var r2 = x2 + w2;
        
      if (r1 < x2 || x1 > r2) return false;
      return true;
      
    }
    
// // slider call

$('#slider').slider({
	range: true,
	min: 0,
	max: 500,
	values: [ 75, 300 ],
	slide: function(event, ui) {
		
		$('.ui-slider-handle:eq(0) .price-range-min').html('$' + ui.values[ 0 ]);
		$('.ui-slider-handle:eq(1) .price-range-max').html('$' + ui.values[ 1 ]);
		$('.price-range-both').html('<i>$' + ui.values[ 0 ] + ' - </i>$' + ui.values[ 1 ] );
		
		//
		
    if ( ui.values[0] == ui.values[1] ) {
      $('.price-range-both i').css('display', 'none');
    } else {
      $('.price-range-both i').css('display', 'inline');
    }
        
        //
		
		if (collision($('.price-range-min'), $('.price-range-max')) == true) {
			$('.price-range-min, .price-range-max').css('opacity', '0');	
			$('.price-range-both').css('display', 'block');		
		} else {
			$('.price-range-min, .price-range-max').css('opacity', '1');	
			$('.price-range-both').css('display', 'none');		
		}
		
	}
});

$('.ui-slider-range').append('<span class="price-range-both value"><i>$' + $('#slider').slider('values', 0 ) + ' - </i>' + $('#slider').slider('values', 1 ) + '</span>');

$('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">$' + $('#slider').slider('values', 0 ) + '</span>');

$('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">$' + $('#slider').slider('values', 1 ) + '</span>');
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('frontend.components.propertyFilter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.propertyFront', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>