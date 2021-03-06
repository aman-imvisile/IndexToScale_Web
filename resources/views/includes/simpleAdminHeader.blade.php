	<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix"  style="position:relative;">
             <a href="{{url('admin/profile/edit/'.Auth::user()->id)}}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <div class="profile_pic">
                <div class="polygon-each-img-wrap  pr-0 "> 
                    <svg class="clip-svg">
            			<defs>
              				<clipPath id="polygon-clip-hexagon" clipPathUnits="objectBoundingBox">
                				<polygon points="0.5 0, 1 0.25, 1 0.75, 0.5 1, 0 0.75, 0 0.25" />
              				</clipPath>
            			</defs>
            		</svg>
             		<img src="{{Auth::user()->profile_image}}" class="polygon-clip-hexagon profile_img">
             	</div>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->username}}  <span class=" fa fa-angle-down"></span></h2>
              </div>
              
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu menu-drp-left" style="">
                    <li><a href=""> Profile</a></li>
                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
            </div>
            <!-- /menu profile quick info -->
			    <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="{{url('admin/inbox')}}"><i class="fa fa-inbox"></i> Inbox <span class="fa fa-chevron-right"></span></a></li>
                  
                    <ul class="nav child_menu">
                    	<li class="add-btn"><a href="{{url('admin/user/create')}}" class="btn btn-primary">Add User</a></li>
                    	@foreach($adminusers_data as $username)
							<li><a href="{{url('admin/user/list/'.$username->id)}}">{{ $username->username}}</a></li>
  						@endforeach
                    </ul>
                  </li>
                  @if(count($privileges)>0)
                  <li><a href="javascript:void(0)"><i class="fa fa-sitemap"></i>Categories <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    	<li class="add-btn"><a href="{{url('admin/maincategory/create')}}" class="btn btn-primary">add category</a></li>
                    	@foreach($main_category_data as $categoryname)
                    	@if(in_array($categoryname->id,$privileges))	
						<li>	
																
							@if(count($categoryname->subcategories) > 0)
							<a href="javascript:void(0)">{{ $categoryname->main_category_name}} <span class="fa fa-chevron-right"></span></a>
							@else
							<a href="{{url('admin/property/list/'.$categoryname->id)}}">{{ $categoryname->main_category_name}}</a>
							@endif
							@if(count($categoryname->subcategories) > 0)
							<ul class="nav sub_menu">
                    			<li class="add-btn"><a href="#" class="btn btn-primary">add subcategory</a></li>
								@foreach($categoryname->subcategories as $subcategoryname)
                            	<li class="sub_menu"><a href="{{url('admin/property/list/'.$categoryname->id.'/'.$subcategoryname->id)}}">{{ $subcategoryname->category_name}}</a></li>
                            	@endforeach
                          	</ul>
                          	@endif
						</li>
						@endif
  						@endforeach
                    </ul>
                  </li>         
                  @endif
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Analytics <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Activity <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Index <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Personalities <span class="fa fa-chevron-right"></span></a></li>
                </ul>
              </div>
            </div><!-- /sidebar menu -->
             <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
			<div class="nav_menu">
            	<nav>
					<div class="col-sm-2">
        				<h1 style="font-size:18px;">
        					<span class="left-arrowa" style=";"><i class="fa fa-angle-left" aria-hidden="true" ></i></span>
         					<span class="left-arrowa" style=""><i class="fa fa-angle-right" aria-hidden="true" ></i></span>
        					@yield('menu_title')
            			</h1>
					</div>
        			<div class="col-sm-8">
        				<form class="" style="width:100%;">
                			<div class="input-group" style="width:100%;     margin-top: 10px;">
                    			<input type="text" class="form-control head-search" placeholder="Search">
                    			<!--<span class="input-group-btn">
                        			<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    			</span>-->
                                <span class="fa fa-microphone search_micro"></span>
                			</div>
            			</form>
        			</div>
        			<div class="col-sm-2 " style="border: 0;">
            			<a href="#" class="site_title"><img src="{{ URL::asset('public/admin/build/images/logo.png') }}" class="img-responsive" alt="logo"></a>
        			</div>
    			</nav>
                <div class="clearfix"></div>
        <!-- /top navigation -->