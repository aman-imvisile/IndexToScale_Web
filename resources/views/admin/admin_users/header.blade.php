<nav class="navbar navbar-default menu-page">
	<div class="navbar-header">
		<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div id="navbarCollapse" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{url('admin/user/summary')}}">Summary</a></li>
			@foreach($usertype as $singleusertype)
			<li class="dropdown ut{{ $singleusertype->id}}"><a href="{{url('admin/users/list/'.$singleusertype->id)}}">{{ $singleusertype->usertype_name}}</a></li>
           	@endforeach
		</ul>
	</div>
</nav>