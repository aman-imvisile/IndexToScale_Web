<header class="header1">

  <div class="container-fluid">
       <div class="row">
    <?php if(Auth::check()): ?>
      <div class="col-sm-3">
        <div class="col-sm-3">
          <div class="polygon-each-img-wrap  pr-0 "> <svg class="clip-svg">
            <defs>
              <clipPath id="polygon-clip-hexagon" clipPathUnits="objectBoundingBox">
                <polygon points="0.5 0, 1 0.25, 1 0.75, 0.5 1, 0 0.75, 0 0.25" />
              </clipPath>
            </defs>
            </svg> <img src="<?php echo e(Auth::user()->profile_image); ?>" alt="demo-clip-heptagon" id="user-info" class="polygon-clip-hexagon"> </div>
        </div>
        <div class="col-sm-3 alert2 ">
          <h1> <a href="">
            <div class="hexagon" id="hexagon"></div>
            </a> </h1>
        </div>
        <div class="col-sm-3 alert2 dropdown">
          <h1 data-toggle="dropdown"> <span class="icon-flash_on"> </span></h1>
        </div>
        <div class="  col-sm-3 alert2 dropdown">
          <h1 data-toggle="dropdown"><span class="icon-heart-o"> </span></h1>
          <div class="dropdown-menu">
            <h4 class="text-center lib-text">Library</h4>
          </div>
        </div>
      </div>
      <div class=" col-sm-7 px-0">
      <div class="input-group " style="width:100%;">
          <input type="text" class="form-control head-search" >
          <span class="icon-microphone search_micro"></span> </div>
      </div>
	
      <?php else: ?>
       <div class="col-sm-1">
    
         <button type="button" id="user-login" class="btn btn-info">Sign in</button>       
    
        </div>
		<div class=" col-sm-9 px-0">
        <div class="input-group " style="width:100%;">
          <input type="text" class="form-control head-search" >
          <span class="icon-microphone search_micro"></span> </div>
      </div>
   	
     <?php endif; ?>
        
      
    <div class="col-sm-2 logo"> <img src="<?php echo e(URL::asset('public/frontend/images/logo.png')); ?>" class="img-responsive"> </div>
    </div>
     <div class="row">
      <div class="col-sm-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            	
              <li class=""><a href="<?php echo e(url('/')); ?>">Home</a></li>    
            <?php if(count($main_category_data)): ?>
            <?php $__currentLoopData = $main_category_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>          
             <li class="dropdown mega-dropdown active" > 
<!--               <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo e(url('property/list/'.$category->main_category_id.'/'.$category->id)); ?>"><?php echo e($category->main_category_name); ?> <span class="caret"></span></a> -->
               <a class="dropdown-toggle"  href="<?php echo e(url('subcategory/'.$category->id)); ?>"><?php echo e($category->main_category_name); ?> </a>
            <ul class="dropdown-menu mega-dropdown-menu ">
           <div class="row"> 
           <div class="col-sm-12">
            <li class="resi_menu">
           		<div class="">
               		<img src="http://www.decoradvisor.net/wp-content/uploads/2013/05/appealathon-home-perth.jpeg" class="img-responsive">
                </div>
                <div class="text-center">
                	<h4>For Sale</h4>
                </div>
             </li>
            <li class="resi_menu">
           		<div class="">
               		<img src="http://www.decoradvisor.net/wp-content/uploads/2013/05/appealathon-home-perth.jpeg" class="img-responsive">
                </div>
                <div class="text-center">
                	<h4>For Sale</h4>
                </div>
             </li>
            <li class="resi_menu">
           		<div class="">
               		<img src="http://www.decoradvisor.net/wp-content/uploads/2013/05/appealathon-home-perth.jpeg" class="img-responsive">
                </div>
                <div class="text-center">
                	<h4>For Sale</h4>
                </div>
             </li>
             </div>
             </div>
             <hr>
              <div class="row"> 
              <div class="col-sm-12">
            <li class="col-sm-2 resi_detail border-right">
           		<h4> Saved Searches (2)</h4>
                <h3>Perfect House for after</h3>
                	<p><strong>213 : </strong> 89</p>
                    	<p><strong>213</strong> Filters | Indexes <strong> 89</strong></p>
                       
                <h3 style="margin-top:20px;">31 New Post</h3> 
                
             </li>
            <li class="col-sm-2 resi_detail border-right">
           		<h4> Saved Searches (2)</h4>
                <h3>Perfect House for after</h3>
                	<p><strong>213 : </strong> 89</p>
                    	<p><strong>213</strong> Filters | Indexes <strong> 89</strong></p>
                       
                <h3 style="margin-top:20px;">31 New Post</h3> 
                
             </li>
            <li class="col-sm-2 resi_detail border-right">
           		<h4> Saved Searches (2)</h4>
                <h3>Perfect House for after</h3>
                	<p><strong>213 : </strong> 89</p>
                    	<p><strong>213</strong> Filters | Indexes <strong> 89</strong></p>
                       
                <h3 style="margin-top:20px;">31 New Post</h3> 
                
             </li>             
            <li class="col-sm-2 resi_detail border-right">
           		
                
             </li>             
            <li class="col-sm-2 resi_detail border-right">
           		
                
             </li>
             </div>
             </div>
             
             
          </ul>
              </li>          
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </ul>
          
            
		  <h2 class="result-num"><span>45,678</span> : 2,223,123</h2>
          </div>
        </nav>
      </div>
    </div>
       <div  id="menu-prop" class="menu-prop" style="display:none;">
        <ul>
            <li><a class="active" href="">Personality</a></li>
            <li> <a href="<?php echo e(url('frontend/user/logout')); ?>">Signout</a></li>
        </ul>
    </div>
    
  </div>
  
</header>