<header class="header1 head-home">
  <div class="container-fluid">
    <div class="row">
    @if(Auth::check())
      <div class="col-sm-3 col-xs-12">
        <div class="col-sm-3 col-xs-3">
          <div class="polygon-each-img-wrap  pr-0 "> <svg class="clip-svg">
            <defs>
              <clipPath id="polygon-clip-hexagon" clipPathUnits="objectBoundingBox">
                <polygon points="0.5 0, 1 0.25, 1 0.75, 0.5 1, 0 0.75, 0 0.25" />
              </clipPath>
            </defs>
            </svg> <img src="{{Auth::user()->profile_image}}" id="user-info" alt="demo-clip-heptagon" class="polygon-clip-hexagon"> </div>
        </div>
        <div class="col-sm-3 col-xs-3 alert2 ">
          <h1> <a href="">
            <div class="hexagon" id="hexagon"></div>
            </a> </h1>
        </div>
        <div class="col-sm-3 col-xs-3 alert2 dropdown">
          <h1 data-toggle="dropdown"> <span class="icon-flash_on"> </span></h1>
        </div>
        <div class="  col-sm-3 col-xs-3 alert2 dropdown">
          <h1 data-toggle="dropdown"><span class="icon-heart-o"> </span></h1>
          <div class="dropdown-menu">
           @include('includes.library')
		   
		   
          </div>
        </div>
      </div>
      <div class=" col-sm-7 col-xs-12 px-0">
      <div class="input-group " style="width:100%;">
          <input type="text" class="form-control head-search" >
          <span class="icon-microphone search_micro"></span> </div>
      </div>
	
      @else
       <div class="col-sm-1 col-xs-3">
    
         <button type="button" id="user-login" class="btn btn-info btn-submit-reg">Sign in</button>       
    
        </div>
		<div class=" col-sm-9 col-xs-9 px-0">
        <div class="input-group " style="width:100%;">
          <input type="text" class="form-control head-search" >
          <span class="icon-microphone search_micro"></span> </div>
      </div>
   	
     @endif
        
      
<div class="col-sm-2 col-xs-12 logo"> <img src="{{URL::asset('public/frontend/images/logo.png')}}" class="img-responsive"> </div>
    </div>
    <div  id="menu-prop" class="menu-prop" style="display:none;">
        <ul>
            <li><a class="active" href="">Personality</a></li>
            <li> <a href="{{url('frontend/user/logout')}}">Signout</a></li>
        </ul>
    </div>
    
    </div>
  </div>
  
  
  <!--- sign in section-->
  <section class="filter_right sign-in"  style="display:none">
    
	   <div class="signin-block">
            <div class="col-sm-12 signin-block-content">
                
                <form>
                    <h5>Sign in</h5>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col-sm-10">
                           <button type="button" class="btn btn-secondary btn-lg btn-block custom-btn">Enter</button>
                        </div>
                    </div>  
                   <p> <a href="#">Forget email?</a></p><br><br><br>
                    <p> <a href="#">Sign up</a></p><br><br>
                    <div class="form-group row">
                        <div class="col-sm-7">
                           <select class="form-control custom-select" id="">
                               <option>English(United Kingdom)</option>
                               <option>a</option>
                               <option>b</option>
                            </select>
                        </div>
                        <div class="col-sm-5">
                            <ul class="sign-in-menu">
                                <li><a href="#">Help</a></li>                       
                                <li><a href="#">Privacy</a></li> 
                                <li><a href="#">Terms</a></li>     
                            </ul>
                        </div>
                    </div>  
                </form>
           </div>
        </div>   
  </section>
  
<!--sign in end------->
  
  
</header>