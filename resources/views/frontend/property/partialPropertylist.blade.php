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