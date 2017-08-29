<!doctype html>
<html>
	<head>
   	 @include('includes.head')
	</head>
	<body>
		@include('includes.header')
   	 	@yield('content')
		@yield('script')
		@include('includes.footer')

	</body>
</html>


 