@extends('layouts.propertyFront')
@section('title', 'Property Categories')
@section('content')

<section class="section1">
<div id="btn-property-detail" class="togle-butn-right">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>
<input type="hidden" id="_token" value="{{ csrf_token() }}">
<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12">
      	<input type="hidden" id="main_cat_id" value="{{$categories['main_cat_id']}}">
        <input type="hidden" id="sub_cat_id" value="{{$categories['sub_cat_id']}}">
    	<div class="residential_grid">
        	<ul class="residential_grid_ul">
               @if(count($properties))
               @foreach($properties as $property)
               <li>
                    <div class="residential_img property-detail-view" property-id="{{$property->id}}">
                    <img  src="{{$property->image}}" class="img-responsive">
                    
                     <div class="property_name">
                     	<p>{{$property->property_name}}</p>
                     </div>
                     <div class="property_number">
                     	<div class="hb-md-margin"><span class="hb1 hb-md1  color-bg1 color_white">90</span></div>
                     </div>
                      </div>
                     <div class="property_list">
                     <ul>
                     @if(count($property->PropertyLinks))
            	 	 @foreach($property->PropertyLinks as $key=>$links)
            	 	 <!-- If properties extra links length >3 then it break the loops -->
            		 	@if($key==3)
                 	 	@break;
                 	    @endif
                        	<li>
                             	<div class="col-sm-3 col-xs-3">
                                    <img src="{{$links->icon_image}}" class="img-responsive">
                                    </div>
                                    <div class="col-sm-9 col-xs-9 text-right">
                                    	<h4>{{$links->main_title}}</h4>
                                        <h5>{{$links->small_title}}</h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                          @endforeach                        
                      @endif        
                      </ul>             
                      <!-- If properties extra links length >3 then here it shows the more button-->        
                      @if(count($property->PropertyLinks)>3)
                        <p property-id="{{$property->id}}"  class="blue_color property-detail-view"><i>+{{count($property->PropertyLinks)-3}} more</i></p>
                        <div class="clearfix"></div>
                        @endif
                      </div>
                 </li> 
               @endforeach    
              {{ $properties->links() }}            
			   @else
			   <li>No record  found!</li>
			   @endif               	
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
            	<i class="more-less  fa fa-plus"></i>  Location  </h4>
            <div id="collapse1" class="panel-collapse  collapse">
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
            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapseOne" class="padd-filter ">
            	<i class="more-less  fa fa-plus"></i>  Status  </h4>
            <div id="collapse2" class="panel-collapse  collapse in">
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
        </div>

	   </div>
		
		<div class="tab-pane" id="profile-test-new">
		
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
@endsection
@section('script')
@include('frontend.components.propertyFilter')

@endsection
