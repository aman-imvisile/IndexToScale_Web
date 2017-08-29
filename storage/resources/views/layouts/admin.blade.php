<!DOCTYPE html>
<html lang="en">
  <head>
   	 @include('includes.adminhead')
	</head>
	<body class="nav-md">
		@if(Auth::check())
		@if(Auth::user()->user_type=='1')
		  @include('includes.adminheader')		 
		@elseif(Auth::user()->user_type=='2')
		  @include('includes.simpleAdminHeader')  
		@endif 
		@endif  
		
   	 	  @yield('content')
		  @include('includes.adminfooter')
	</body>
</html>