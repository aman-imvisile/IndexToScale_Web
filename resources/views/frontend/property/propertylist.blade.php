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
    	<div class="residential_grid">
        	<ul class="residential_grid_ul">
            	  @if(count($properties))
            	<input type="hidden" id="main_cat_id" value="{{$categories['main_cat_id']}}">
            	<input type="hidden" id="sub_cat_id" value="{{$categories['sub_cat_id']}}">
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
            		 @if($key==3)
                 	 
                 	 @break;
                 	 @endif
                        	<li>
                        	      	<div class="col-sm-3 col-xs-3">
                                    	<img  src="{{$links->icon_image}}" class="img-responsive">
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
                      @if(count($property->PropertyLinks)>3)
                        <p property-id="{{$property->id}}"  class="blue_color property-detail-view"><i>+{{count($property->PropertyLinks)-3}} more</i></p>
                        <div class="clearfix"></div>
                        @endif
                      </div>
                 </li> 
                 @endforeach                
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
@endsection
@section('script')
@include('frontend.components.propertyFilter')

@endsection
