<header class="header1 head-home">
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
            </svg> <img src="<?php echo e(Auth::user()->profile_image); ?>" id="user-info" alt="demo-clip-heptagon" class="polygon-clip-hexagon"> </div>
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
    
         <button type="button" id="user-login" class="btn btn-info btn-submit-reg">Sign in</button>       
    
        </div>
		<div class=" col-sm-9 px-0">
        <div class="input-group " style="width:100%;">
          <input type="text" class="form-control head-search" >
          <span class="icon-microphone search_micro"></span> </div>
      </div>
   	
     <?php endif; ?>
        
      
      <div class="col-sm-2 logo"> <img src="<?php echo e(URL::asset('public/frontend/images/logo.png')); ?>" class="img-responsive"> </div>
    </div>
    <div  id="menu-prop" class="menu-prop" style="display:none;">
        <ul>
            <li><a class="active" href="">Personality</a></li>
            <li> <a href="<?php echo e(url('frontend/user/logout')); ?>">Signout</a></li>
        </ul>
    </div>
    
    </div>
  </div>
</header>