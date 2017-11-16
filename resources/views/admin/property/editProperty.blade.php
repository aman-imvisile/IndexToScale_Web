@extends('layouts.admin')
@section('title', 'Edit New Property')
@section('menu_title', 'Staff')
@section('content')
    @include('admin.admin_users.header')
    </div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Edit Property</h2>
			<div class="clearfix"></div>
		  </div>
    <div class="container">
    	@foreach ($errors->all() as $error)
				<li style="padding: 5px;margin-bottom: 2px;" class='alert alert-danger'>{{ $error }}</li>
			@endforeach
			<br />
        @if(Session::has('message'))
				<p style="padding: 5px;margin-bottom: 2px;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
		@endif
        <form id="propertyForm" method="post" action="{{url('admin/property/update')}}"  enctype="multipart/form-data" accept-charset="utf-8">
          	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<input type="hidden" value="{{$property['id']}}" name="id">
        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Property Information</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Basic Information</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Property Extra links</small></a></li>           
            </ul>            
            <div class="container-fluid">
                <div id="step-1">
                      <h2 class="StepTitle wizard_steps_title text-center">Step 1 : Property Information</h2>
                      <div id="form-step-0" role="form" data-toggle="validator">
                      <input type="hidden" value="{{$property['id']}}" name="property_id">
                      
                        <div class="form-group col-md-6">
                        <label for="email">Address:</label>
                        <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="{{$property['address']}}" required>
                          <div id="map"></div>
    					<div id="infowindow-content">
     					<img src="" width="16" height="16" id="place-icon">
      					<span id="place-name"  class="title"></span><br>
      				   <span id="place-address"></span>
						@if($errors->has('address'))
						<div class="help-block with-errors">{{ $errors->first('address') }}</div>
						@endif
						<input id="latitude" type="hidden" name="latitude" value="30.7333">
						<input id="longitude" type="hidden" name="longitude" value="76.7794">                            
                        </div>
                           </div>
                        <div class="form-group col-md-6">
                        <label for="name">Street Number:</label>
                        <input id="street_number" class="form-control col-md-7 col-xs-12" value="{{$property['street_number']}}" type="text" name="street_number" required>
						@if($errors->has('street_number'))
						<div class="alert">{{ $errors->first('street_number') }}</div>
						@endif
                        </div>
                        <div class="form-group col-md-6">
                        <label for="name">Street Name:</label>
                        <input id="street_name" class="form-control col-md-7 col-xs-12" value="{{$property['street_name']}}" type="text" name="street_name" required>
						@if($errors->has('street_name'))
						<div class="alert">{{ $errors->first('street_name') }}</div>
						@endif
                        </div>
                        
                    	<div class="form-group col-md-6">
                        <label for="name">Pin Code:</label>
                        <input id="postal_code" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['pincode']}}" name="pincode" required>
						@if($errors->has('pincode'))
						<div class="alert">{{ $errors->first('pincode') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="name">Area:</label>
                      		<input id="area" class="form-control col-md-7 col-xs-12" value="{{$property['area']}}" type="text" name="area" required>
						@if($errors->has('area'))
						<div class="alert">{{ $errors->first('area') }}</div>
						@endif
                        </div>
                        
                       <div class="form-group col-md-6">
                       <label for="name">City:</label>
                       	<input id="locality" class="form-control col-md-7 col-xs-12" value="{{$property['city']}}" type="text" name="city" required>
						@if($errors->has('city'))
						<div class="alert">{{ $errors->first('city') }}</div>
						@endif
                        </div>
                        
						<div class="form-group col-md-6">
                        <label for="name">Country:</label>
                         <input id="country" class="form-control col-md-7 col-xs-12" value="{{$property['country']}}" type="text" name="country" required>
						@if($errors->has('country'))
						<div class="alert">{{ $errors->first('country') }}</div>
						@endif
                        </div>
                        
                 
                    
                
                
                        <div class="form-group col-md-6">
                            <label for="name">Select Property Category:</label>
                      		<select required="required" class="form-control col-md-7 col-xs-12" name="category" >
                            <option value="">Choose option</option>
                            @if(count($propertyCategories))
                            @foreach($propertyCategories as $category)
                            @if($category->id==$property['sub_category_id'])
                            <option selected  value="{{$category->id}}"> {{$category->category_name}} </option>
                            @else 
                            <option value="{{$category->id}}"> {{$category->category_name}} </option>
                            @endif
                            @endforeach
                            @endif
                          </select>
						@if($errors->has('category'))
						<div class="alert">{{ $errors->first('category') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="name">Property Name:</label>
                     	<input type="text" id="property_name" name="property_name" value="{{$property['property_name']}}"  required="required" class="form-control col-md-7 col-xs-12" >
						@if($errors->has('property_name'))
						<div class="alert">{{ $errors->first('property_name') }}</div>
						@endif
                        </div>
                        <div class="form-group col-md-6">
							<label for="use_for">Property Use For:</label>
							<input type="text" id="use_for" name="use_for" value="{{$property['use_for']}}" required="required" placeholder="to let, for sale, short let" class="form-control col-md-7 col-xs-12" >
							@if($errors->has('use_for'))
							<div class="alert">{{ $errors->first('use_for') }}</div>
							@endif
						</div>                        
                        <div class="form-group col-md-6">
                        <label for="name">No. of Beds:</label>
                      	<input id="num_beds" class="form-control col-md-7 col-xs-12" type="number" value="{{$property['num_beds']}}"  name="num_beds" required>
						@if($errors->has('num_beds'))
						<div class="alert">{{ $errors->first('num_beds') }}</div>
						@endif
                        </div>
                        
                        	<div class="form-group col-md-6">
                        <label for="name">No. of Bathrooms:</label>
                      	<input id="num_baths" class="form-control col-md-7 col-xs-12" type="number" value="{{$property['num_baths']}}" name="num_baths" required>
						@if($errors->has('num_baths'))
						<div class="alert">{{ $errors->first('num_baths') }}</div>
						@endif
                        </div>
                        
                      
                        
                       <div class="form-group col-md-6">
                       <label for="name">Property Images:</label>
              	       <input id="images" class="form-control col-md-7 col-xs-12" type="file" name="images[]" multiple> 
						@if($errors->has('images'))
						<div class="alert">{{ $errors->first('images') }}</div>
						@endif
					
                        </div>
                        
                        <div class="form-group col-md-6">
                        <div id='preview' class="preview">
                        @if(count($property['property_images']))
                        <?php $i=1; ?>
                        @foreach($property['property_images'] as $Proimage)
                        <img src="{{$Proimage['image']}}" alt="" class="thumb"  /> 
                        <span class="remove_img_preview"></span>
                        @if($i==4)
                        <br>
                        <?php $i=1; ?>
                        @endif
                        <?php $i++; ?>
                        @endforeach
                        @endif
                  	  
                  	 	</div>
                  	 	   
                	   </div>
                        
                    </div>	
                </div>
                <div id="step-2">
                     <h2 class="StepTitle wizard_steps_title text-center">Step 2 : Basic Information</h2>
                    <div id="form-step-1" role="form" data-toggle="validator">
                  	         <div class="form-group col-md-6">
                        <label for="address">Floor Area:<small> (in meters)</small></label>
                        <input id="floor_area_meters" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['floor_area_meters']}}" name="floor_area_meters" required>
						@if($errors->has('floor_area_meters'))
						<div class="alert">{{ $errors->first('floor_area_meters') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="approx_geo">Approx Geo:</label>
                        <input id="approx_geo" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['approx_geo']}}"  name="approx_geo" required>
						@if($errors->has('approx_geo'))
						<div class="alert">{{ $errors->first('approx_geo') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="neighbourhood ">Neighbourhood</label>
                        <input id="neighbourhood " class="form-control col-md-7 col-xs-12" type="text" value="{{$property['neighbourhood']}}"  name="neighbourhood" required>
						@if($errors->has('neighbourhood'))
						<div class="alert">{{ $errors->first('neighbourhood') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="transport">Transport</label>
                        <input id="transport" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['transport']}}" name="transport" required>
						@if($errors->has('transport'))
						<div class="alert">{{ $errors->first('transport') }}</div>
						@endif
                        </div>
                        
                         <div class="form-group col-md-6">
                        <label for="address">Amenities</label>
                        <input id="amenities" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['amenities']}}" name="amenities" required>
						@if($errors->has('amenities'))
						<div class="alert">{{ $errors->first('amenities') }}</div>
						@endif
                        </div>
                        
                             <div class="form-group col-md-6">
                            <label for="address">Interior</label>
                         	<input id="interior" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['interior']}}" name="interior" required>
						@if($errors->has('interior'))
						<div class="alert">{{ $errors->first('interior') }}</div>
						@endif
                        </div>
                        
                        
                             <div class="form-group col-md-6">
                            <label for="address">Exterior</label>
                          	<input id="exterior" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['exterior']}}" name="exterior" required>
						@if($errors->has('exterior'))
						<div class="alert">{{ $errors->first('exterior') }}</div>
						@endif
                        </div>
                        
                        
                             <div class="form-group col-md-6">
                            <label for="address">Privacy</label>
                           	<input id="privacy" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['privacy']}}" name="privacy" required>
						@if($errors->has('privacy'))
						<div class="alert">{{ $errors->first('privacy') }}</div>
						@endif
                        </div>
                        
                                     <div class="form-group col-md-6">
                            <label for="terms">Floor Area</label>
                         <input id="floor_area" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['floor_area']}}"  name="floor_area" required>
						@if($errors->has('floor_area'))
						<div class="alert">{{ $errors->first('floor_area') }}</div>
						@endif
                        </div>
                        
                           <div class="form-group col-md-6">
                            <label for="terms">Prestige</label>
                      
							<input id="prestige" class="form-control col-md-7 col-xs-12" value="{{$property['prestige']}}"  type="text" name="prestige" required>
						@if($errors->has('prestige'))
						<div class="alert">{{ $errors->first('prestige') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="area_safety ">Area Safety</label>
                        <input id="area_safety " class="form-control col-md-7 col-xs-12" value="{{$property['area_safety']}}" type="text" name="area_safety" required>
						@if($errors->has('area_safety'))
						<div class="alert">{{ $errors->first('area_safety') }}</div>
						@endif
                        </div>
                        
                        
                           <div class="form-group col-md-6">
                            <label for="terms">Lot</label>
                      	<input id="lot" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['lot']}}"  name="lot" required>
						@if($errors->has('lot'))
						<div class="alert">{{ $errors->first('lot') }}</div>
						@endif
                        </div>
                        
                             <div class="form-group col-md-6">
                            <label for="views">views</label>
                      	<input id="views" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['views']}}" name="views" required>
						@if($errors->has('views'))
						<div class="alert">{{ $errors->first('views') }}</div>
						@endif
                        </div> 
                        
                           <div class="form-group col-md-6">
                            <label for="terms">Sea-side</label>
                         	<input id="seaside" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['seaside']}}" name="seaside" required>
						@if($errors->has('seaside'))
						<div class="alert">{{ $errors->first('seaside') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="terms">River-side</label>
                        <input id="riverside" class="form-control col-md-7 col-xs-12" type="text" value="{{$property['riverside']}}" name="riverside" required>
						@if($errors->has('riverside'))
						<div class="alert">{{ $errors->first('riverside') }}</div>
						@endif
                        </div>
                        
                        
                        <div class="form-group col-md-6">
                        <label for="terms">Internet-Speed</label>
                         <input id="internet_speed" class="form-control col-md-7 col-xs-12" type="text"  value="{{$property['internet_speed']}}"  name="internet_speed" required>
						 @if($errors->has('internet_speed'))
						 <div class="alert">{{ $errors->first('internet_speed') }}</div>
						 @endif
                        </div>                 
                        
                        
                    </div>
                </div>
           
                <div id="step-3" class="">
                   <h2 class="StepTitle wizard_steps_title text-center">Step 5 : Property Extra links</h2>
                 
                    <div id="form-step-2" role="form" data-toggle="validator">
               		
                     @foreach($property['property_links'] as $key=>$value)
                	    
                     	@if($key==0)
                     	<div id="linksdata">
                        <div class="form-group col-md-6">
                        <label for="terms">Url </label>
                        <input  class="form-control col-md-7 col-xs-12" value="{{$value['url']}}" type="text" name="url[]" required>
						@if($errors->has('url'))
						<div class="alert">{{ $errors->first('url') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="terms">Name/Price</label>                      
						<input  class="form-control col-md-7 col-xs-12" type="text" value="{{$value['main_title']}}"  name="main_title[]" required>
						@if($errors->has('main_title'))
						<div class="alert">{{ $errors->first('main_title') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="terms">Small Title</label>                      
						<input class="form-control col-md-7 col-xs-12" type="text" value="{{$value['small_title']}}" name="small_title[]" required>
						@if($errors->has('small_title'))
						<div class="alert">{{ $errors->first('small_title') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="icon_image ">Image</label>
                        <input class="form-control col-md-7 col-xs-12" type="file" value=""  name="icon_image[]">
						@if($errors->has('icon_image'))
						<div class="alert">{{ $errors->first(icon_image) }}</div>
						@endif
                        </div>
                        <div class="form-group ">
                        <div id="linkPreview" class="preview">
               
                        <img src="{{$value['icon_image']}}" alt="" class="thumb"  /> 
                        <span class="remove_img_preview"></span>
                    
                        </div>
                        </div>
                        <input type="hidden" value="{{$value['id']}}"   name="linkId[]" > 
                        </div>    
                        @else    
                        
                        <div class="extraTab"><h2 class="extra-link">Add Extra link</h2>
                        <input type="hidden" value="{{$value['id']}}"   name="linkId[]" > 
                    	 <div class="form-group col-md-6">
                        <label for="terms">Url </label>
                        <input  class="form-control col-md-7 col-xs-12" value="{{$value['url']}}" type="text" name="url[]" required>
						@if($errors->has('url'))
						<div class="alert">{{ $errors->first('url') }}</div>
						@endif
                        </div>
                                                
                        <div class="form-group col-md-6">
                        <label for="terms">Name/Price</label>                      
						<input  class="form-control col-md-7 col-xs-12" type="text" value="{{$value['main_title']}}"  name="main_title[]" required>
						@if($errors->has('main_title'))
						<div class="alert">{{ $errors->first('main_title') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="terms">Small Title</label>                      
						<input class="form-control col-md-7 col-xs-12" type="text" value="{{$value['small_title']}}" name="small_title[]" required>
						@if($errors->has('small_title'))
						<div class="alert">{{ $errors->first('small_title') }}</div>
						@endif
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="icon_image ">Image</label>
                        <input class="form-control col-md-7 col-xs-12" type="file" value="{{$value['icon_image']}}"  name="icon_image[]" >
						@if($errors->has('icon_image'))
						<div class="alert">{{ $errors->first(icon_image) }}</div>
						@endif
                        </div>
                         <div class="form-group col-md-6">
                        <div id="linkPreview" class="preview">
               
                        <img src="{{$value['icon_image']}}" alt="" class="thumb"  /> 
                        <span class="remove_img_preview"></span>
                    
                        </div>
                        </div>
                          <div class="form-group ">
                        <span class="removeMore btn btn-danger">Remove </span>
                        </div>
                        
                        
                        
                        </div>
                        
                        @endif
                       @endforeach
                     
                        
                        
                        
                    </div>
                    
                    <button type="button" id="addMore" class="btn btn-info">Add More links(+)</button>
                </div>
            </div>
        </div>
        
        </form>
        
    </div>
	  
		</div>
	  </div>
	</div>
  </div>
   <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        
        var componentForm = {      
        locality: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };
        var card = document.getElementById('pac-card');
        var input = document.getElementById('address');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          console.log(place);
          var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
     var mesg = "Address: " + address;
    mesg += "\nLatitude: " + latitude;
    mesg += "\nLongitude: " + longitude;
    
  
   document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
    
         for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }

    
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
      
      /////Get Zipcode from the address

      
  
      
    </script>
    </div>
<!-- /page content -->
@stop