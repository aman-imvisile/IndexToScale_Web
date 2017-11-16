<!doctype html>
<html>
	<head>
   	 @include('includes.head')
	</head>

	<body>
		 <div class="loader"></div> 
		@include('includes.propertyCategoryHeader')
   	 	@yield('content')
		@yield('script')
		@include('includes.footer')

	</body>
</html>


 