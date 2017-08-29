<?php $__env->startSection('title', 'Add New Property'); ?>
<?php $__env->startSection('menu_title', 'Categories'); ?>
<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('admin.property.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Add New Property</h2>
						<div class="clearfix"></div>
					</div>
					<div class="container">
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li style="padding: 5px;margin-bottom: 2px;" class='alert alert-danger'><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	<br />
						<?php if(Session::has('message')): ?>
							<p style="padding: 5px;margin-bottom: 2px;" class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
						<?php endif; ?>
						<form id="propertyForm" method="post" action="<?php echo e(url('admin/property/create')); ?>"  enctype="multipart/form-data" accept-charset="utf-8">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
									<!-- SmartWizard html -->
							<div id="smartwizard">
								<ul>
									<li><a href="#step-1">Step 1<br /><small>Property Information</small></a></li>
									<li><a href="#step-2">Step 2<br /><small>Basic Information</small></a></li>            
									<li><a href="#step-3">Step 3<br /><small>Property Extra links  </small></a></li>
								</ul>            
								<div class="container-fluid">
									<div id="step-1">
										<h2 class="StepTitle wizard_steps_title text-center">Step 1 : Property Information</h2>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group col-md-6">
												<label for="email">Address:</label>
												<input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address"  required>
												<div id="map"></div>
												<div id="infowindow-content">
													<img src="" width="16" height="16" id="place-icon">
													<span id="place-name"  class="title"></span><br>
													<span id="place-address"></span>
												</div>
												<?php if($errors->has('address')): ?>
													<div class="help-block with-errors"><?php echo e($errors->first('address')); ?></div>
												<?php endif; ?>
												<input id="latitude" type="hidden" name="latitude" value="30.7333">
												<input id="longitude" type="hidden" name="longitude" value="76.7794">                            
											</div>
											<div class="form-group col-md-6">
												<label for="name">Area:</label>
												<input id="area" class="form-control col-md-7 col-xs-12" type="text" name="area" required>
												<?php if($errors->has('area')): ?>
													<div class="alert"><?php echo e($errors->first('area')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Street Number:</label>
												<input id="street_number" class="form-control col-md-7 col-xs-12" type="text" name="street_number" required>
												<?php if($errors->has('street_number')): ?>
													<div class="alert"><?php echo e($errors->first('street_number')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Street Name:</label>
												<input id="street_name" class="form-control col-md-7 col-xs-12" type="text" name="street_name" required>
												<?php if($errors->has('street_name')): ?>
													<div class="alert"><?php echo e($errors->first('street_name')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Pin Code:</label>
												<input id="postal_code" class="form-control col-md-7 col-xs-12" type="text" name="pincode" required>
												<?php if($errors->has('pincode')): ?>
													<div class="alert"><?php echo e($errors->first('pincode')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">City:</label>
												<input id="locality" class="form-control col-md-7 col-xs-12" type="text" name="city" required>
												<?php if($errors->has('city')): ?>
													<div class="alert"><?php echo e($errors->first('city')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Country:</label>
												<input id="country" class="form-control col-md-7 col-xs-12" type="text" name="country" required>
												<?php if($errors->has('country')): ?>
													<div class="alert"><?php echo e($errors->first('country')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Select Property Category:</label>
												<select required class="form-control col-md-7 col-xs-12" name="category" >
													<option value="">Choose option</option>
													<?php if(count($propertyCategories)): ?>
														<?php $__currentLoopData = $propertyCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($category->id); ?>"> <?php echo e($category->category_name); ?> </option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endif; ?>   
												</select>
												<?php if($errors->has('category')): ?>
													<div class="alert"><?php echo e($errors->first('category')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Property Name:</label>
												<input type="text" id="property_name" name="property_name" required="required" class="form-control col-md-7 col-xs-12" >
												<?php if($errors->has('property_name')): ?>
													<div class="alert"><?php echo e($errors->first('property_name')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">No. of Beds:</label>
												<input id="num_beds" class="form-control col-md-7 col-xs-12" type="number" name="num_beds" required>
												<?php if($errors->has('num_beds')): ?>
													<div class="alert"><?php echo e($errors->first('num_beds')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">No. of Bathrooms:</label>
												<input id="num_baths" class="form-control col-md-7 col-xs-12" type="number" name="num_baths" required>
												<?php if($errors->has('num_baths')): ?>
													<div class="alert"><?php echo e($errors->first('num_baths')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="address">Floor Area:<small> (in meters)</small></label>
												<input id="floor_area_meters" class="form-control col-md-7 col-xs-12" type="text" name="floor_area_meters" required>
												<?php if($errors->has('floor_area_meters')): ?>
													<div class="alert"><?php echo e($errors->first('floor_area_meters')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="name">Property Images:</label>
												<input id="images" class="form-control col-md-7 col-xs-12" type="file" name="images[]" multiple required> 
												<?php if($errors->has('images')): ?>
													<div class="alert"><?php echo e($errors->first('images')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="address">Privacy</label>
												<input id="privacy" class="form-control col-md-7 col-xs-12" type="text" name="privacy" required>
												<?php if($errors->has('privacy')): ?>
													<div class="alert"><?php echo e($errors->first('privacy')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-5">
												<div id='preview' class="preview"></div>   
											</div>
										</div>
									</div>
									<br>
									<div id="step-2">
										<h2 class="StepTitle wizard_steps_title text-center">Step 2 : Basic Information</h2>
										<div id="form-step-1" role="form" data-toggle="validator">
											<div class="form-group col-md-6">
												<label for="approx_geo">Approx Geo:</label>
												<input id="approx_geo" class="form-control col-md-7 col-xs-12" type="text" name="approx_geo" required>
												<?php if($errors->has('approx_geo')): ?>
													<div class="alert"><?php echo e($errors->first('approx_geo')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="neighbourhood ">Neighbourhood</label>
												<input id="neighbourhood " class="form-control col-md-7 col-xs-12" type="text" name="neighbourhood" required>
												<?php if($errors->has('neighbourhood')): ?>
													<div class="alert"><?php echo e($errors->first('neighbourhood')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="transport">Transport</label>
												<input id="transport" class="form-control col-md-7 col-xs-12" type="text" name="transport" required>
												<?php if($errors->has('transport')): ?>
													<div class="alert"><?php echo e($errors->first('transport')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="address">Amenities</label>
												<input id="amenities" class="form-control col-md-7 col-xs-12" type="text" name="amenities" required>
												<?php if($errors->has('amenities')): ?>
													<div class="alert"><?php echo e($errors->first('amenities')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="address">Interior</label>
												<input id="interior" class="form-control col-md-7 col-xs-12" type="text" name="interior" required>
												<?php if($errors->has('interior')): ?>
													<div class="alert"><?php echo e($errors->first('interior')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="address">Exterior</label>
												<input id="exterior" class="form-control col-md-7 col-xs-12" type="text" name="exterior" required>
												<?php if($errors->has('exterior')): ?>
													<div class="alert"><?php echo e($errors->first('exterior')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">Floor Area</label>
												<input id="floor_area" class="form-control col-md-7 col-xs-12" type="text" name="floor_area" required>
												<?php if($errors->has('floor_area')): ?>
													<div class="alert"><?php echo e($errors->first('floor_area')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">Prestige</label>
												<input id="prestige" class="form-control col-md-7 col-xs-12" type="text" name="prestige" required>
												<?php if($errors->has('prestige')): ?>
													<div class="alert"><?php echo e($errors->first('prestige')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="area_safety ">Area Safety</label>
												<input id="area_safety " class="form-control col-md-7 col-xs-12" type="text" name="area_safety" required>
												<?php if($errors->has('area_safety')): ?>
													<div class="alert"><?php echo e($errors->first('area_safety')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">Lot</label>
												<input id="lot" class="form-control col-md-7 col-xs-12" type="text" name="lot" required>
												<?php if($errors->has('lot')): ?>
													<div class="alert"><?php echo e($errors->first('lot')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="views">views</label>
												<input id="views" class="form-control col-md-7 col-xs-12" type="text" name="views" required>
												<?php if($errors->has('views')): ?>
													<div class="alert"><?php echo e($errors->first('views')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">Sea-side</label>
												<input id="seaside" class="form-control col-md-7 col-xs-12" type="text" name="seaside" required>
												<?php if($errors->has('seaside')): ?>
													<div class="alert"><?php echo e($errors->first('seaside')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">River-side</label>
												<input id="riverside" class="form-control col-md-7 col-xs-12" type="text" name="riverside" required>
												<?php if($errors->has('riverside')): ?>
													<div class="alert"><?php echo e($errors->first('riverside')); ?></div>
												<?php endif; ?>
											</div>
											<div class="form-group col-md-6">
												<label for="terms">Internet-Speed</label>
												<input id="internet_speed" class="form-control col-md-7 col-xs-12" type="text" name="internet_speed" required>
												<?php if($errors->has('internet_speed')): ?>
													<div class="alert"><?php echo e($errors->first('internet_speed')); ?></div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<br>
									<div id="step-3" class="">
										<h2 class="StepTitle wizard_steps_title text-center">Step 5 : Property Extra links</h2>
										<div id="form-step-2" role="form" data-toggle="validator">
											<div id="linksdata">
												<div class="form-group col-md-6">
													<label for="terms">Url </label>
													<input  class="form-control col-md-7 col-xs-12" type="text" name="url[]" required>
													<?php if($errors->has('url')): ?>
														<div class="alert"><?php echo e($errors->first('url')); ?></div>
													<?php endif; ?>
												</div>
												<div class="form-group col-md-6">
													<label for="terms">Name/Price</label>                      
													<input  class="form-control col-md-7 col-xs-12" type="text" name="main_title[]" required>
													<?php if($errors->has('main_title')): ?>
														<div class="alert"><?php echo e($errors->first('main_title')); ?></div>
													<?php endif; ?>
												</div>
												<div class="form-group col-md-6">
													<label for="terms">Small Title</label>                      
													<input class="form-control col-md-7 col-xs-12" type="text" name="small_title[]" required>
													<?php if($errors->has('small_title')): ?>
														<div class="alert"><?php echo e($errors->first('small_title')); ?></div>
													<?php endif; ?>
												</div>
												<div class="form-group col-md-6">
													<label for="icon_image ">Image</label>
													<input class="form-control col-md-7 col-xs-12" type="file" name="icon_image[]" required>
													<?php if($errors->has('icon_image')): ?>
														<div class="alert"><?php echo e($errors->first(icon_image)); ?></div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<button type="button" id="addMore" class="btn btn-info">Add More links(+)</button>
									</div><br>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
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

			document.getElementById('use-strict-bounds').addEventListener('click', function() {
				console.log('Checkbox clicked! New state=' + this.checked);
				autocomplete.setOptions({strictBounds: this.checked});
			});
		}
		/////Get Zipcode from the address
	</script>
</div>
<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>