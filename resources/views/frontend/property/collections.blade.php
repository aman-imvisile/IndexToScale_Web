@extends('layouts.propertyFront')
@section('title', 'Property Categories')
@section('content')

<section class="section1">
<div id="btn-property-detail" class="togle-butn-right">
      <i class="fa fa-chevron-left" aria-hidden="true"></i>
</div>
<input type="hidden" id="_token" value="{{ csrf_token() }}">
<div class="container-fluid">

   
    <div class="col-sm-12">
    
    	<div class="residential_grid">
			
			
			<div class="coll-wrapper" style="padding-left:7%;">
			<div class="collections-heading">
				Only you can see what you've saved
			</div>
				<div class="coll-new">
					<a href="#">
						<i class="fa fa-plus" aria-hidden="true"></i>
						<p>Create new</p>
					</a>
				</div>
				<div class="coll-rel">
					<img src="http://image.newarrivaldress.com/images/201510/goods_img/105756_P_1445483878435.jpg"/>
					<a class="coll-abs" href="#">
						My Wedding Outfits
					</a>
				</div>
				<div class="coll-rel">
					<img src="http://wdy.h-cdn.co/assets/16/25/980x1470/gallery-1466538019-gettyimages-92063303-1.jpg"/>
					<a class="coll-abs" href="#">
						Diets
					</a>
				</div>
				<div class="coll-rel">
					<img src="https://www-redrow-co-uk.azureedge.net/fe/v2/dist/images/homepage/36588.jpg"/>
					<a class="coll-abs" href="#">
						Looking for a new home
					</a>
				</div>
				<div class="coll-rel">
					<img src="https://img-aws.ehowcdn.com/560x560/photos.demandstudios.com/getty/article/110/183/75461527.jpg"/>
					<a class="coll-abs" href="#">
						My Work Out
					</a>
				</div>
				<div class="coll-rel">
					<img src="http://sunshinestacey.com/wp-content/uploads/2017/06/shutterstock_beach-holiday-400x280.jpg"/>
					<a class="coll-abs" href="#">
						Summer Holidays
					</a>
				</div>
				<div class="coll-rel">
					<img src="https://www-redrow-co-uk.azureedge.net/fe/v2/dist/images/homepage/36588.jpg"/>
					<a class="coll-abs" href="#">
						Looking for a rental
					</a>
				</div>
				<div class="coll-rel">
					<img src="https://www-redrow-co-uk.azureedge.net/fe/v2/dist/images/homepage/36588.jpg"/>
					<a class="coll-abs" href="#">
						Favorite London Homes
					</a>
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
@endsection
@section('script')
@include('frontend.components.propertyFilter')

@endsection
